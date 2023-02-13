<?php

namespace App\Http\Livewire\Home\Profile;

use App\Models\User;
use App\Models\Wishlist as ModelsWishlist;
use Livewire\Component;

class Wishlist extends Component
{

    public function delete_from_wishlist($product_id){
        if(auth()->check()){
            $wishRow= ModelsWishlist::where('product_id' , $product_id)
                                ->where('user_id' , auth()->id())->first();
            $wishRow->delete();
            $this->emit('refreshComponent');
        }
    }
    public function render()
    {
        return view('livewire.home.profile.wishlist',[
            'wishlist' => ModelsWishlist::where('user_id',auth()->id())->paginate(20),
        ]);
    }
}
