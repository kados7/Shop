<?php

namespace App\Http\Livewire\Home\Content;

use App\Models\Banner;
use Livewire\Component;

class Banners extends Component
{
    public function render()
    {
        return view('livewire.home.content.banners',[
            'main_banners' => Banner::where('type','main-banner')->get()->toArray()
        ]);
    }
}
