<?php

namespace App\Http\Livewire\Admin\Product;

use App\Http\Controllers\app\UploadController;
use App\Models\Product;
use App\Models\ProductImage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditImages extends Component
{
    use WithFileUploads;

    public $product;

    public $primary_image;
    public $images;

    public $all_preimages=[];
    public $is_submited;

    protected $listeners = [
        'imagesAdded' => 'showImages',
        'refreshComponent' => '$refresh'
    ];

    public function mount(Product $product){
        $this->primary_image = $product->primary_image;
    }

    public function updatedPrimaryImage(){
        $this->is_submited = false;
    }

    public function newPrimaryImage(){
        $this->product->update([
            'primary_image'=> $this->primary_image,
        ]);
        $this->is_submited = true;
    }

    public function uploadImages(){

        $images_file_name = UploadController::product_images_upload($this->all_preimages);

        foreach ($images_file_name as $image_name) {
            ProductImage::create([
                'product_id' => $this->product->id ,
                'image' => $image_name
            ]);
        }
        $this->emit('refreshComponent');
    }
    public $deleteImageSure =[] ;
    public function deleteImage($image_id){
        ProductImage::destroy([
            'id' => $image_id,
        ]);
        $this->emit('refreshComponent');
    }

    public function render()
    {
        return view('livewire.admin.product.edit-images');
    }
}
