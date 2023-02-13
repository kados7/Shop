<?php

namespace App\Http\Livewire\Home\Search;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    protected $queryString = [
        'search'
    ];

    public $search;
    public $search_term;

    public function updatedSearchTerm($search_term){
        // $this->search = explode(' ', $search_term);
        $this->search = preg_split('/\s+/', $search_term, -1, PREG_SPLIT_NO_EMPTY);
    }

    public function render()
    {
        return view('livewire.home.search.index',[

            'products' => Product::when($this->search , function($all_products){

                $all_products
                    ->orWhere(function ($products) {
                        foreach ($this->search as $term) {
                            $products->where('name', 'like', '%'.trim($term).'%');
                            $products->orWhere('name', 'like', '%'.trim($term).'%');
                        }
                    })
                    ->orWhereHas('product_attributes',function($products_att){
                        foreach ($this->search as $term) {
                            $products_att->where('value', trim($term));
                            $products_att->orWhere('value', 'LiKE', '%'.trim($term).'%' );
                        }
                    });

            })->get()
        ]);
    }
}
