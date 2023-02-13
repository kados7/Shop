<?php

namespace App\Http\Livewire\Home\Products;

use Livewire\Component;

class Detail extends Component
{
    public $product;
    public function render()
    {
        return view('livewire.home.products.detail');
    }
}
