<?php

namespace App\Http\Livewire\Home\Content;

use App\Models\Product;
use Livewire\Component;

class Cover2 extends Component
{
    public function render()
    {
        return view('livewire.home.content.cover2',[
            'products'=>Product::all()
        ]);
    }
}
