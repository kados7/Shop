<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public static function product_primary_image_upload($primary_image){
        $primary_image_name = Carbon::now()->timestamp .'-'. $primary_image->getClientOriginalName();
        $primary_image ->storeAs('images\product',$primary_image_name , 'public');

        return $primary_image_name ;
    }

    public static function product_images_upload($images_in_array){

        $array_of_images = [];
        foreach ($images_in_array as $image) {
            $image_name = Carbon::now()->timestamp .'-'. $image->getClientOriginalName();
            $image->storeAs('images\product',$image_name , 'public');
            array_push($array_of_images , $image_name);
        }
        return $array_of_images ;
    }

    public static function banner_image_upload($image){
        $banner_image_name = Carbon::now()->timestamp .'-'. $image->getClientOriginalName();
        $image ->storeAs('images\banner',$banner_image_name , 'public');

        return $banner_image_name ;
    }
}
