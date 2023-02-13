<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public static function getProductMinPriceVariation($product_id){
        $product= Product::find($product_id);
        $each_variation_min_price=[];
        foreach($product->product_variations as $variation){
            if($variation->sale_price and Carbon::now() > $variation->date_on_sale_from and Carbon::now() < $variation->date_on_sale_to and $variation->quantity>0){
                $each_variation_min_price[$variation->id] = $variation->sale_price < $variation->price ? $variation->sale_price : $variation->price ;
            }
            else{
                $each_variation_min_price[$variation->id] = $variation->price;
            }
        }
        asort($each_variation_min_price);
        $minprice_id = array_key_first($each_variation_min_price);

         return $product->product_variations()->where('id', $minprice_id)->first();
    }
}
