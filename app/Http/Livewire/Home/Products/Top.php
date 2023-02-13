<?php

namespace App\Http\Livewire\Home\Products;

use App\Http\Controllers\app\WishlistController;
use App\Http\Controllers\CartController;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\Wishlist;
use Darryldecode\Cart\Cart;
use Darryldecode\Cart\CartCondition;
use Livewire\Component;

class Top extends Component
{
    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];
    public $product;
    public $variation;
    public $selected_variation_value;
    public $mustBeRegistered = false;


    public function mount(){
        $this->variation = $this->product->getProductMinPriceVariation();
        $this->selected_variation_value = $this->variation->value;
    }

    public function updatedSelectedVariationValue(){
        $this->variation = $this->product->product_variations()->where('value',$this->selected_variation_value )->first();
        // dd( $this->variation->getVariationMinPrice());
    }


    public function add_to_wishlist($product_id ){
        if(auth()->check()){
            WishlistController::add_to_wishlist($product_id, auth()->id());
            $this->emit('refreshComponent');
        }
        else{
            $this->mustBeRegistered = true;
        }
    }

    public function delete_from_wishlist($product_id){
        WishlistController::delete_from_wishlist($product_id, auth()->id());
        $this->emit('refreshComponent');

    }


    public function add_session($product_id){
        if(session()->has('compare')){
            if(count((session()->get('compare'))) < 4){
                session()->push('compare',$product_id);
                $this->compare_added = true;
            }
            else{
                $this->compare_cant_add = true;
            }
        }
        else{
            session()->put('compare',[$product_id]);
            $this->compare_added = true;
        }
    }
    public $compare_added = false;
    public $compare_cant_add = false;


    public function add_to_cart($product_id,$variation_id){
        CartController::add($product_id,$variation_id);
        $this->emit('refreshComponent');
    }

    public function render()
    {
        return view('livewire.home.products.top');
    }
}
