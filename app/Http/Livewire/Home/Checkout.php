<?php

namespace App\Http\Livewire\Home;

use App\Http\Controllers\CartController;
use App\Http\Controllers\home\PaymentController;
use App\Models\ProvinceCities;
use App\Models\UserAddress;
use Livewire\Component;

class Checkout extends Component
{
    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];
    public $select_address;

    public function mount(){
        if(UserAddress::where('user_id', auth()->id())->exists()){
            $this->select_address = UserAddress::where('user_id', auth()->id())->first()->id ;
        }
        $this->peyment_method = 'pay' ;
    }

    public $submit_new_address_area = false;
    public $title;
    public $cellphone;
    public $postal_code;
    public $province_id;
    public $city_id;
    public $address;

    protected $rules =[
        'title' => 'string',
        'cellphone' => 'required|string',
        'postal_code' => 'required|integer',
        // 'province_id' => 'required|integer',
        'city_id' => 'required|integer',
        'address' => 'required|string',
    ];

    public function submit_new_address(){
        $this->validate();
        UserAddress::create([
            'user_id' => auth()->id(),
            'title'=> $this->title,
            'cellphone'=> $this->cellphone,
            'postal_code'=> $this->postal_code,
            'province_id'=> $this->province_id,
            'city_id'=> $this->city_id,
            'address'=> $this->address,
        ]);
        $this->submit_new_address_area = false;
    }

    public $coupon_code;
    public $coupon_amount = 0;
    public $coupon_message = false;
    public function submit_coupon(){
        $coupon = CartController::coupon_check($this->coupon_code);
        if (is_integer($coupon)){
            $this->coupon_amount = $coupon;
            session()->put('coupon' , $coupon);
        }
        else{
            $coupon;
            session()->has('coupon') ? session()->forget('coupon'): null;
        }

        if($this->coupon_amount != 0){
            $this->coupon_message= true;
        }

    }

    public $peyment_method;

    public function render()
    {
        return view('livewire.home.checkout',[
            'addresses'=> UserAddress::where('user_id', auth()->id())->get(),
            'provinces' => ProvinceCities::where('parent' , 0)->get(),
            'cities' => ProvinceCities::where('parent' , $this->province_id)->get()
        ]);
    }
}
