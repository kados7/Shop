<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Transaction;
use Livewire\Component;

class Show extends Component
{
    public $order;
    public function render()
    {
        return view('livewire.admin.orders.show',[
            'transaction' => Transaction::where('order_id', $this->order->id)->first(),
        ]);
    }
}
