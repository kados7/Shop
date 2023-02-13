<?php

namespace App\Http\Livewire\Admin\Banners\Index;

use App\Models\Banner;
use Livewire\Component;
use PhpParser\Node\Stmt\Foreach_;

class CategoryBanner extends Component
{
    // public $category_banners_type = [];
    // public $category_banners1;
    // public $category_banners2;

    public function mount(){
        // $this->category_banners1 = Banner::where('type' , 'category_banner1')->paginate(20);
        // $this->category_banners2 = Banner::where('type' , 'category_banner2')->paginate(20);

    }
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
        // $category_banners1 = Banner::where('type' , 'category_banner1')->paginate(20);
        // $category_banners2 = Banner::where('type' , 'category_banner2')->paginate(20);

        // $category_banners_type = [
        //     'category_banners1' => Banner::where('type' , 'category_banner1')->paginate(20),
        //     'category_banners2'  => Banner::where('type' , 'category_banner2')->paginate(20)
        // ];

        return view('livewire.admin.banners.index.category-banner',[
            'category_banners_type' => [
                Banner::where('type' , 'category_banner1')->paginate(20),
                Banner::where('type' , 'category_banner2')->paginate(20)
            ],
            // 'category_banners1' => Banner::where('type' , 'category_banner1')->paginate(20),

        ]);
    }
}
