<?php

namespace App\Http\Livewire\Home\Content;

use App\Models\Banner;
use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{
    public function render()
    {
        return view('livewire.home.content.categories',[
            'category_banners1' => Banner::where('type' , 'category_banner1')->where('is_active' , 1)->orderBy('priority')->get(),
            'category_banners2' => Banner::where('type' , 'category_banner2')->where('is_active' , 1)->orderBy('priority')->get(),

        ]);
    }
}
