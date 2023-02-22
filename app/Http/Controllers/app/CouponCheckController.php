<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponCheckController extends Controller
{

    public static function couponExists($code){

        return (Coupon::where('code' , $code)->where('expired_at', '>' , Carbon::now())->exists() )?  true :  false ;

    }

}

