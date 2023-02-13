<?php

namespace App\Http\Livewire\Admin\Banners;

use App\Http\Controllers\app\UploadController;
use App\Models\Banner;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];
    public $banner;

    public $image;
    public $new_image;
    public $title;
    public $text;
    public $background;
    public $priority;
    public $is_active;
    public $type;
    public $button_text;
    public $button_link;
    public $button_icon;
    public $is_updated;

    public function mount(Banner $banner){
        $this->image = $banner->image;
        $this->title = $banner ->title;
        $this->text = $banner ->text;
        $this->background = $banner ->background;
        $this->priority = $banner ->priority;
        $this->is_active = $banner ->is_active;
        $this->type = $banner ->type;
        $this->button_text = $banner ->button_text;
        $this->button_link = $banner ->button_link;
        $this->button_icon = $banner ->button_icon;

        $this->is_updated = false;
    }

    public function update_image(){
        // dd($this->image,$this->new_image);
        $image=UploadController::banner_image_upload($this->new_image);

        $this->banner->update([
            'image' =>  $image,
        ]);
        $this->image = $image;
        $this->emit('refreshComponent');
    }

    public function update_banner(){
        $this->banner->update([
            'title' => $this->title,
            'text' => $this->text,
            'background' => $this->background,
            'priority' => $this->priority,
            'is_active' => $this->is_active,
            'type' => $this->type,
            'button_text' => $this->button_text,
            'button_link' => $this->button_link,
            'button_icon' => $this->button_icon,
        ]);
        $this->is_updated = true;
        $this->emit('refreshComponent');
    }

    public function render()
    {
        return view('livewire.admin.banners.edit');
    }
}
