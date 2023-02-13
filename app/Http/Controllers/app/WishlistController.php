<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public static function add_to_wishlist($product_id , $user_id){

        if(auth()->check()){
            Wishlist::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
            ]);
        }

    }

    public static function delete_from_wishlist($product_id , $user_id){
        if(auth()->check()){

            $wishRow= Wishlist::where('product_id' , $product_id)
                                ->where('user_id' , $user_id)->first();
            $wishRow->delete();
        }
    }
}
