<?php

namespace App\Http\Livewire\Home\Categories;

use App\Models\Category;
use App\Models\Wishlist;
use Livewire\Component;
use Livewire\WithPagination;

class Product extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $category;
    // protected $products;

    protected $listeners = [
        'refreshComponent' => '$refresh' ,
        'set_product_variation_filters' ,
        'set_product_attribute_filters' ,
        'set_sorted_by_filters',
        'set_search',
        'refresh_filters'];
    protected $queryString = ['val_fil','att_fil','sort_fil' , 'search'];

    public $val_fil=[];
    public $att_fil=[];
    public $sort_fil ;
    public $search ;

    public function refresh_filters(){
        $this->val_fil = null ;
        $this->att_fil = null;
        $this->search = null;
        $this->filter_badges= null;
    }
    public function add_to_wishlist($product_id){

        if(auth()->check()){
            Wishlist::create([
                'user_id' => auth()->id(),
                'product_id' => $product_id,
            ]);
            $this->emit('refreshComponent');
        }
        else{
            $this->mustBeRegistered = true;
        }

    }

    public function delete_from_wishlist($product_id){
        if(auth()->check()){

            $wishRow= Wishlist::where('product_id' , $product_id)
                                ->where('user_id' , auth()->id())->first();
            $wishRow->delete();
            $this->emit('refreshComponent');
        }
    }

// product_Variation_filters
    public function set_product_variation_filters($queryString_value,$id){
        $this->val_fil = $queryString_value;
        $this->show_badges();
    }
// product_attribute_filters
    public function set_product_attribute_filters($queryString_value , $id){
        $this->att_fil = $queryString_value;
        $this->show_badges();
    }
// sorted_by_filters
    public function set_sorted_by_filters($sort_item){
        $this->sort_fil = $sort_item;
    }
// sorted_by_filters
    public function set_search($search_term){
        $this->search = $search_term;
    }

    public function show_badges(){
        $this->filter_badges = array_merge($this->val_fil , $this->att_fil);
    }

    public $filter_badges;




    public function render()
    {

        return view('livewire.home.categories.product' , [
            'products' => $this->category->products()

            ->when($this->val_fil or $this->att_fil or $this->sort_fil or $this->search , function($products){
                return $products->filter($this->val_fil , $this->att_fil , $this->sort_fil)
                                ->search($this->search);
            })

            ->orderBy('updated_at' , 'desc')->paginate(8)
        ]);
    }
}
