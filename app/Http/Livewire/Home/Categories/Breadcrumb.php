<?php

namespace App\Http\Livewire\Home\Categories;

use Livewire\Component;

class Breadcrumb extends Component
{
    public $category;
    public $search;

    public function updatedSearch(){
        $this->emit('set_search' , $this->search);
    }


    public function render()
    {
        return view('livewire.home.categories.breadcrumb');
    }
}
