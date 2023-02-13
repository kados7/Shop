<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.orders.index',[
            'orders' => Order::paginate(10),
        ]);
    }
}
