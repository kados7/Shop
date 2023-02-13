<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;

class EditAllAttributes extends Component
{
    public $attribute;
    public $category;
    public $item;

    public function mount(){
        if(in_array($this->attribute->id , $this->category->attributes->pluck('id')->toArray() )){
            $this->item = true;
        }
    }
    public function updatedItem (){
        if($this->item == true){
            $this->emit('itemChecked', $this->attribute->id , $this->attribute->name );
        }
        else{
            $this->emit('itemUnChecked' ,$this->attribute->id , $this->attribute->name );
        }
    }

    public function render()
    {
        return view('livewire.admin.category.edit-all-attributes');
    }
}
