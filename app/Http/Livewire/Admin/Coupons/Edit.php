<?php

namespace App\Http\Livewire\Admin\Coupons;

use App\Models\Coupon;
use Carbon\Carbon;
use Livewire\Component;

class Edit extends Component
{
    public $coupon;

    public $name;
    public $code;
    public $type;
    public $amount;
    public $percentage;
    public $max_percentage_amount;
    public $expired_at;
    public $description;

    public function mount(Coupon $coupon){
        $this->name = $coupon->name;
        $this->code = $coupon->code;
        $this->type = $coupon->type;
        $this->amount = $coupon->amount;
        $this->percentage = $coupon->percentage;
        $this->max_percentage_amount = $coupon->max_percentage_amount;
        $this->expired_at = Carbon::parse($coupon->expired_at)->toDateString();
        $this->description =$coupon->description;
    }

    protected $rules=[
        'name'=> 'required|string',
        'code'=> 'required|unique:coupons,code',
        'type'=> 'required',
        'amount'=> 'required_if:type,=,amount',
        'percentage'=> 'required_if:type,=,percentage',
        'expired_at'=> 'required'
    ];

    public function update_coupon(){
        $this->validate();
        $coupon_row =Coupon::findOrFail($this->coupon->id);
        $coupon_row->update([
            'name' => $this->name,
            'code' => $this->code,
            'type' => $this->type,
            'amount' => $this->amount,
            'percentage' => $this->percentage,
            'max_percentage_amount' => $this->max_percentage_amount,
            'expired_at' => $this->expired_at,
            'description' => $this->description,
        ]);
        alert()->success('ذخیره شد','کوپن جدید با موفقیت ویرایش شد');
        return redirect(route('admin.coupons.index'));
    }
    public function render()
    {
        return view('livewire.admin.coupons.edit');
    }
}
