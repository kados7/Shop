<?php

namespace App\Http\Livewire\Admin\Coupons;

use App\Models\Coupon;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];
    use WithPagination;

    public function delete_coupon($coupon_id){
        $coupon_row = Coupon::findOrFail($coupon_id);
        $coupon_row->delete();

    }
    public function render()
    {
        return view('livewire.admin.coupons.index' ,[
            'coupons' => Coupon::paginate(20),
        ]);
    }
}
