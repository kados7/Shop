<?php

namespace App\Http\Livewire\Home\Content;

use App\Models\Banner;
use App\Models\Brand;
use Livewire\Component;

class Cover1 extends Component
{
    public function render()
    {
        return view('livewire.home.content.cover1',[
            'cover1'=> Banner::where('type', 'cover1')->first(),
            'brands' => Brand::all(),
        ]);
    }
}
