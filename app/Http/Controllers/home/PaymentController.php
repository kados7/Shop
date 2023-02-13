<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Http\Controllers\paymentGetway\Pay;
use App\Http\Controllers\paymentGetway\Payment;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductVariation;
use App\Models\Transaction;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function payment(Request $request){

        // بررسی وجود تغییر در قیمت یا تعداد محصول
        $check = (new PaymentController)->last_check();
        if(array_key_exists('error',$check)){
            alert()->warning('!!  ', $check['error']);
            return redirect(route('home.checkout.index'));
        }

        $request->validate([
            'payment_method' => 'required' ,
            'address_id' => 'required'
        ]);

        if($request->payment_method == 'pay'){
            // dd('pay');
            $pay = new Pay;
            $execute_pay = $pay->execute($request->address_id , $this->getAmounts());
            if (array_key_exists('error', $execute_pay)) {
                alert()->error($execute_pay['error'], 'دقت کنید')->persistent('حله');
                return redirect()->back();
            } else {
                return redirect()->to($execute_pay['success']);
            }
        }

    }



    public function paymentVerify(Request $request){
        $api = 'test';
        $token = $request->token;
        $pay = new Pay;
        $result = json_decode($pay->verify($api,$token));
        // dd($request->all());
        if(isset($result->status)){
            if($result->status == 1){
                $payment= new Payment;
                $update_order= $payment->UpdateOrder($request->token);
                if(array_key_exists('error',$update_order)){
                    alert()->warning('!!  ', $update_order['error']);
                    return redirect(route('home.checkout.index'));
                }
                echo "<h1>تراکنش با موفقیت انجام شد</h1>";
            } else {
                echo "<h1>تراکنش با خطا مواجه شد</h1>";
            }
        } else {
            if($_GET['status'] == 0){
                echo "<h1>تراکنش با خطا مواجه شد</h1>";
            }
        }
    }

    public function last_check(){
        if(CartFacade::isEmpty()){
            return ['error' => 'سبد خرید شما خالی است'];
        }
        foreach (CartFacade::getContent() as $item){
            $variation = ProductVariation::where('id',$item->id)->first();
            $price= $variation->sale_price ? $variation->sale_price : $variation->price;
            // dd($price , $item->price);
            if(!($item->price == $price)){
                CartFacade::update($item->id,[
                    'price' => $price
                ]);
                return ['error' => "قیمت محصول $item->name تغییر کرده است"];
            }

            if(($item->quantity) > ($variation->quantity)){
                CartFacade::remove($item->id);
                return ['error' => 'تعداد موجودی انبار کمتر از مقدار مورد نظر شما است'];
            }
        }



        return ['success'=>'success'];
    }

    public function getAmounts(){
        return [
            'total_amount' => CartFacade::getTotal(),
            'delivery_amount' => 0,
            'coupon_amount' => session()->has('coupon') ? session()->get('coupon') : 0,
            'paying_amount' => CartFacade::getTotal() - ( session()->has('coupon') ? session()->get('coupon') : 0 ),
        ];
    }

}
