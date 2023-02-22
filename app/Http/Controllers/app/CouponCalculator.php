<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;

class CouponCalculator
{
    protected $coupon_code;
    protected $coupon_type;

    public function __construct($code){
        $this->coupon_code =$code;
        $this->coupon_type = Coupon::where('code' , $code)->first()->type;
    }

    public function calculateCouponAmount(){
        switch ($this->coupon_type) {
            case 'amount':
                return $this->amountCoupon();
                break;
            case 'percentage':
                return $this->percentageCoupon();
                break;
        }
    }

    public function amountCoupon(){
        $coupon_amount = Coupon::where('code' , $this->coupon_code)->first()->amount;
        return $coupon_amount;
    }

    public function percentageCoupon(){

        $amount = (CartFacade::getTotal() * Coupon::where('code', $this->coupon_code)->first()->percentage) / 100 ;
        ($amount > Coupon::where('code', $this->coupon_code)->first()->max_percentage_amount ) ?
            $coupon_amount = Coupon::where('code', $this->coupon_code)->first()->max_percentage_amount : $coupon_amount = $amount ;
        return $coupon_amount;

    }
}
