<?php

namespace App\Http\Livewire\Home\Content;

use App\Http\Controllers\app\PriceController;
use App\Http\Controllers\app\WishlistController;
use App\Models\Product;
use App\Models\Wishlist;
use Livewire\Component;

class Products extends Component
{
    public function mount() {

    }

    public function add_to_wishlist($product_id ){
        WishlistController::add_to_wishlist($product_id, auth()->id());
    }

    public function delete_from_wishlist($product_id){
        WishlistController::delete_from_wishlist($product_id, auth()->id());
    }

    public function render()
    {
        return view('livewire.home.content.products',[
            'products' =>Product::where('is_active', 1)->latest()->with('category' , 'brand' , 'product_variations')->get(),
        ]);
    }
}
