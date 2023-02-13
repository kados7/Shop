<?php

namespace App\Http\Livewire\Admin\Banners;

use App\Http\Controllers\app\UploadController;
use App\Models\Banner;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $image;
    public $title;
    public $text;
    public $priority;
    public $is_active;
    public $type;
    public $button_text;
    public $button_link;
    public $button_icon;


    public function mount(){
        $this->is_active = true;
    }

    protected $rules=[
        'image' => 'required | mimes:jpg,jpeg,webp,bmp,png | max:2048',
        'priority' => 'required|integer',
        'type' => 'required'
    ];

    public function store_banner(){

        $image = UploadController::banner_image_upload($this->image);

        Banner::create([
            'image' =>  $image,
            'title' => $this->title,
            'text'=> $this->text ,
            'priority'=> $this->priority,
            'is_active'=> $this->is_active,
            'type'=> $this->type,
            'button_text'=> $this->button_text,
            'button_link'=> $this->button_text,
            'button_icon'=> $this->button_icon,
        ]);
        alert()->success('ثبت شد','بنر  با موفقیت ایجاد شد');
        return redirect(route('admin.banners.index'));
    }
    public function render()
    {
        return view('livewire.admin.banners.create');
    }
}
