<?php

namespace App\Http\Livewire\Home\Profile;

use App\Models\Order;
use Livewire\Component;

class Orders extends Component
{
    public function render()
    {
        return view('livewire.home.profile.orders',[
            'orders'=> Order::where('user_id' , auth()->id())->paginate()
        ]);
    }
}
