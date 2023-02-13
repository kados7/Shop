<?php

namespace App\Http\Livewire\Home;

use App\Models\Product;
use Livewire\Component;

class Compare extends Component
{
    public function delete_from_compare($product_id){
        foreach(session()->get('compare') as $index => $id){
            if($product_id == $id){
                session()->pull('compare.'.$index);
            }
        }

        // dd(session()->get('compare'));
    }

    public function render()
    {
        return view('livewire.home.compare',[
            'products' => Product::findOrFail(session()->get('compare')),
        ]);
    }
}
