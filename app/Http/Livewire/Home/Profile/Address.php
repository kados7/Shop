<?php

namespace App\Http\Livewire\Home\Profile;

use App\Models\UserAddress;
use Livewire\Component;

class Address extends Component
{
    public $submit_new_address = false;
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
        'province_id' => 'required|integer',
        'city_id' => 'required|integer',
        'address' => 'required|string',
    ];

    public function store_address(){
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
        alert()->success('ذخیره شد','آدرس جدید با موفقیت اضافه شد');
        return redirect(route('home.user_profile.address'));
    }

    public function delete_address($address_id){
        $address_row = UserAddress::findOrFail($address_id);
        $address_row->delete();
    }

    public function render()
    {
        return view('livewire.home.profile.address',[
            'addresses' => UserAddress::where('user_id' , auth()->id())->get()
        ]);
    }
}
