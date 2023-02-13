<?php

namespace App\Http\Livewire\Admin\Banners\Index;

use App\Models\Banner;
use Livewire\Component;

class Slider extends Component
{
    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];

    public function delete_banner($id){
        $banner= Banner::findOrFail($id);
        $banner->delete();

        // alert()->success('ثبت شد','بنر  با موفقیت ویرایش شد');
        $this->emit('refreshComponent');

    }
    public function render()
    {
        return view('livewire.admin.banners.index.slider',[
            'banners' => Banner::latest()->paginate(20),
            'sliders' => Banner::where('type' , 'slider')->paginate(20),
        ]);
    }
}
