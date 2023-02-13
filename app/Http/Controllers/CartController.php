<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Product;
use App\Models\ProductVariation;
use Carbon\Carbon;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        return view('home.cart');
    }

    public static function add($product_id,$variation_id){
        $product = Product::findOrfail($product_id);
        $variation = ProductVariation::findOrFail($variation_id);

        CartFacade::add(array(
            'id' => $variation->id, // inique row ID
            'name' => $product->name,
            'price' => $variation->sale_price ? $variation->sale_price : $variation->price,
            'quantity' => 1,
            'attributes' => $variation->toArray(),
            'associatedModel' => $product,
        ));
    }

    public static function delete($rowId){
        CartFacade::remove($rowId);
    }

    public static function update($rowId , $quantity){
        // dd($rowId , $quantity);
        CartFacade::update($rowId,[
            'quantity' => array(
                'relative' => false,
                'value' => $quantity
            ),
        ]);
    }

    public static function coupon_check($code){
        if(! auth()->check()){
            alert()->warning('وارد حساب کاربری شوید','برای استفاده از کد تخفیف ابتدا وارد سایت شوید');
            return 0;
        }
        else{
            if(! Coupon::where('code' , $code)->where('expired_at', '>' , Carbon::now())->exists()){
                alert()->warning('کد وجود ندارد',' کد وارد شده صحیح نیست یا تاریخ آن گذشته است');
                return redirect(route('home.checkout.index'));
                       }
            else{
                if(Coupon::where('code' , $code)->where('type', 'amount')->exists()){
                    $coupon_amount = Coupon::where('code' , $code)->first()->amount;
                    return $coupon_amount;
                }
                else{
                    $amount = (CartFacade::getTotal() * Coupon::where('code', $code)->first()->percentage) / 100 ;
                    ($amount > Coupon::where('code', $code)->first()->max_percentage_amount ) ?
                        $coupon_amount = Coupon::where('code', $code)->first()->max_percentage_amount : $coupon_amount = $amount ;
                    return $coupon_amount;
                }
            }
        }
    }

    public function checkout(){
        return view('home.checkout');
    }


}
