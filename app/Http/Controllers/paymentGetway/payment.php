<?php

namespace App\Http\Controllers\paymentGetway;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductVariation;
use App\Models\Transaction;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Support\Facades\DB;

class Payment {

    public function createOrder($address_id , $amounts , $token){
        try {
            DB::beginTransaction();

            $order= Order::create([
                'user_id' => auth()->id(),
                'address_id' => $address_id,
                // 'coupon_id' =>
                'status' => 0,
                'total_amount' => $amounts['total_amount'],
                'delivery_amount' => $amounts['delivery_amount'],
                'coupon_amount' => $amounts['coupon_amount'],
                'paying_amount' => $amounts['paying_amount'],
                'payment_type' => 'online',
                'payment_status' => 0,
            ]);

            foreach(CartFacade::getContent() as $item){
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->attributes->product_id,
                    'product_variation_id' => $item->attributes->id,
                    'price' => $item->price,
                    'quantity' => $item->quantity,
                    'subtotal' => $item->price * $item->quantity,
                ]);
            }

            Transaction::create([
                'user_id' => auth()->id(),
                'order_id' => $order->id,
                'amount' => $amounts['paying_amount'],
                'token' => $token,
                'geteway_name' => 'pay',
                'status' => 0,
            ]);

            DB::commit();
            return ['success' => 'all right'];
        }
        catch (\Exception $ex) {
            DB::rollBack();
            return ['error' => $ex->getMessage()];
        }
    }
    public function UpdateOrder($token){
        try {
            DB::beginTransaction();
        $transaction = Transaction::where('token', $token)->firstOrFail();
        $transaction->update([
            'status' => 1,
        ]);

        $order = Order::where('id', $transaction->order_id)->firstOrFail();
        $order->update([
            'status' =>1,
            'payment_status' =>1,
        ]);

        foreach(CartFacade::getContent() as $item){
            $variation =ProductVariation::where('id', $item->attributes->id)->first();
            $variation->update([
                'quantity' => $variation->quantity - $item->quantity,
            ]);
        }
        CartFacade::clear();

        DB::commit();
        return ['success' => 'all right'];

        }
        catch (\Exception $ex) {
            DB::rollBack();
            return ['error' => $ex->getMessage()];
        }
    }


}
