<?php

namespace App\Http\Livewire\Home\Header;

use App\Http\Controllers\CartController;
use App\Models\Category;
use App\Models\Notification;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];

    public $sub_categories;
    public function mount(){
        $this->sub_categories = Category::pluck('name','id')->toArray();
        $categories = [];
        // dd($this->categories);
    }

    public $search;
    public $search_term;
    public $haveSearch = false;

    public function updatedSearchTerm($search_term){
        $this->search = preg_split('/\s+/', $search_term, -1, PREG_SPLIT_NO_EMPTY);
        if($this->search_term){
            $this->haveSearch = true;
        }else{
            $this->haveSearch = false;
        }
    }


    public function link_to_search_page(){
        $search_to_redirect='';
        foreach($this->search as $key => $search){
            $search_to_redirect = $search_to_redirect.'search['.$key.']='.$search.'&' ;
        }
        // dd($search_to_redirect);
        return redirect('/search?'.$search_to_redirect);
    }

    public function notificationMarkAsRead($notification_id){

        // dd($notification_id);
        // $notification = Notification::find($notification);
        $notification_id->markAsRead();
    }

    public function allNotificationsReaded(){
        foreach(auth()->user()->unreadNotifications as $unreadNotification){
            $unreadNotification->markAsRead();
        }
    }

    public function delete_from_cart($item_id){
        // dd($item_id);
        CartController::delete($item_id);
        $this->emit('refreshComponent');
    }

    public function logout(){
        auth()->logout();
    }

    public $is_child_category = false;
    public $selected_category;

    public function showSubCategories($category_id){
        $this->is_child_category = true;
        $this->selected_category= Category::find($category_id);

    }

    public function render()
    {
        return view('livewire.home.header.header',[
            'parent_categories' => Category::where('parent_id' , 0)->get(),

            'searchProducts' => $this->haveSearch ?
                Product::when($this->search , function($all_products){
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
                : []
        ]);
    }
}
