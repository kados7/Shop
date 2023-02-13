<?php

namespace App\Http\Livewire\Home;

use App\Http\Controllers\CartController;
use App\Models\Coupon;
use Darryldecode\Cart\Cart as CartCart;
use Darryldecode\Cart\Facades\CartFacade;
use Livewire\Component;

class Cart extends Component
{
    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];

    public $cart_quantity=[];

    public function mount(){
        $cart_quantity = [];
        foreach(CartFacade::getContent() as $item){
            $cart_quantity[$item->id]= $item->quantity ;
        }
        $this->cart_quantity = $cart_quantity;
    }

    public function updatedCartQuantity($quantity , $rowId){
        CartController::update($rowId , $quantity);
        $this->emit('refreshComponent');
    }

    public function delete_from_cart($rowId){
        CartController::delete($rowId);
    }

    public function render()
    {
        return view('livewire.home.cart');
    }
}
