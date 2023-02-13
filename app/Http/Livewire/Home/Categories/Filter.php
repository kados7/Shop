<?php

namespace App\Http\Livewire\Home\Categories;

use App\Models\Category;
use Livewire\Component;

class Filter extends Component
{
    public $category;
    public $filter_attributes;
    public $variation_attributes;
    protected $listeners = ['refreshComponent' => '$refresh' , 'refresh_filters'];


    public function mount(Category $category)
    {
        $this->filter_attributes =$category->attributes()->where('is_filter',1)->get();
        $this->variation_attributes =$category->attributes()->where('is_variation',1)->get();
    }


    public $filter_value= [];
    public function set_product_attribute_filters($id){
        // dd($this->filter_value);
        $this->emit('set_product_attribute_filters' , $this->filter_value, $id);
    }

    public $variation_value=[];
    public function set_product_variation_filters($id){
        $this->emit('set_product_variation_filters' , $this->variation_value , $id);
    }
    public function sorted_by($sort_item){
        $this->emit('set_sorted_by_filters' , $sort_item);
    }




    public function refresh_filters(){
        $this->variation_value= null;
    }

    public function render(Category $category)
    {
        return view('livewire.home.categories.filter');
    }
}
