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


    public function checkout(){
        return view('home.checkout');
    }


}
