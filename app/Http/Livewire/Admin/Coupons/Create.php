<?php

namespace App\Http\Livewire\Admin\Coupons;

use App\Models\Coupon;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $code;
    public $type;
    public $amount;
    public $percentage;
    public $max_percentage_amount;
    public $expired_at;
    public $description;

    public function mount(){
        $this->type = 'amount';
    }


    protected $rules=[
        'name'=> 'required|string',
        'code'=> 'required|unique:coupons,code',
        'type'=> 'required',
        'amount'=> 'required_if:type,=,amount',
        'percentage'=> 'required_if:type,=,percentage',
        'expired_at'=> 'required'
    ];

    public function store_coupon(){
        $this->validate();

        Coupon::create([
            'name' => $this->name,
            'code' => $this->code,
            'type' => $this->type,
            'amount' => $this->amount,
            'percentage' => $this->percentage,
            'max_percentage_amount' => $this->max_percentage_amount,
            'expired_at' => $this->expired_at,
            'description' => $this->description,
        ]);
        alert()->success('ذخیره شد','کوپن جدید با موفقیت اضافه شد');
        return redirect(route('admin.coupons.index'));
    }
    public function render()
    {
        return view('livewire.admin.coupons.create');
    }
}
