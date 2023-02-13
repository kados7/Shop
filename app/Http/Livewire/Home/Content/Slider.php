<?php

namespace App\Http\Livewire\Home\Content;

use App\Models\Banner;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Slider extends Component
{
    public function mount(){
        // $directory_images = Storage::allFiles('public/images/banner');
        // $images_link = [];
        // foreach( $directory_images as $directory_image){
        //     $images_link[]=route('home.index') .'/'. str_replace('public', 'storage' , $directory_image);
        // }
        // dd($images_link);
    }
    public function render()
    {
        return view('livewire.home.content.slider',[
            'sliders' => Banner::where('type' , 'slider')->where('is_active' , 1)->get(),
        ]);
    }
}
