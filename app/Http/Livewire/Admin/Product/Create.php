<?php

namespace App\Http\Livewire\Admin\Product;

use App\Http\Controllers\app\UploadController;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductImage;
use App\Models\ProductVariation;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

// Variable of Form
    public $name;
    public $brand_id;
    public $is_active=true;
    public $Product_tags= [];
    public $description;
    public $primary_image;
    public $images;
    public $category_id;
    public $attribute_ids=[];
    public $variationInput_values=[];
    public $variationInput_prices=[];
    public $variationInput_quantities=[];
    public $variationInput_skus=[];
    public $delivery_amount;
    public $delivery_amount_per_product;

    // NEW Brand
    public $showNewBrandDiv = false;
    public $new_brand_name;

    public function storeBrand(){
        $new_brand = Brand::create([
            'name' => $this->new_brand_name,
            'is_active' => true,
        ]);
        $this->new_brand_name = null ;
        $this->brand_id = $new_brand->id;
        $this->showNewBrandDiv=  false;
    }

    // NEW Tag
    public $showNewTagDiv = false;
    public $new_tag_name;
    public $tag_id = 1;

    public function storeTag(){
        $this->Product_tags[$this->tag_id] = $this->new_tag_name;
        $this->new_tag_name = null ;
        // $this->tags_id[] = $new_tag->id;
        // $this->showNewTagDiv=  false;
        $this->tag_id += 1;
    }

    public function deleteTag($tag_id){
        unset($this->Product_tags[$tag_id]);
    }

// Variable of Attribute's Inputes
    public $filteredAttributes;
    public $variationAttribute;
    public $variationInputs = [];
    public $i = 0;




    public function updatedCategoryId(){
        $this->getAttributes($this->category_id);
    }

//get related Attributes based on Category
    public function getAttributes($categoryId){
        $category=Category::find($categoryId);

        $filteredAttributes = $category->attributes()->wherePivot('is_filter' , true)->get();
        $variationAttribute = $category->attributes()->wherePivot('is_variation' , true)->first();

        $this->filteredAttributes = $filteredAttributes ;
        $this->variationAttribute = $variationAttribute ;
    }

// ADD INPUT for Variation
    public function addVariationInput($i){
        $x = $i + 1;
        $this->i = $x;
        array_push($this->variationInputs ,$i);
    }

// remove INPUT for Variation
    public function removeVariationInput($i)
    {
        unset($this->variationInputs[$i]);
    }

//Validation Rules
    protected $rules = [
        'name' => 'required|min:3',
        'brand_id' => 'required|integer',
        'is_active' => 'required|boolean',
        // 'tags_id' => 'required|array',
        'description' => 'required|string',
        'primary_image' => 'required|mimes:jpg,bmp,png | max:1024',
        'images.*' => 'mimes:jpg,jpeg,webp,bmp,png | max:1024',
        'category_id' => 'required',
        'attribute_ids' => 'required',
        'variationInput_values' => 'required',
        'variationInput_prices' => 'required',
        'variationInput_quantities' => 'required',
        'variationInput_skus' => 'nullable',
        'delivery_amount' => 'required|integer',
        'delivery_amount_per_product' => 'required|integer'
    ];

// Store Product to Database
    public function store_product(){

        $this->validate();

        try {
            DB::beginTransaction();
            $primary_image_file_name= UploadController::product_primary_image_upload($this->primary_image);
            $images_file_name = UploadController::product_images_upload($this->images);

            $new_product=Product::create([
                'brand_id'=> $this->brand_id,
                'category_id'=> $this->category_id,
                'name'=> $this->name,
                'primary_image'=> $primary_image_file_name,
                'description'=> $this->description,
                'is_active'=> $this->is_active,
                'delivery_amount'=> $this->delivery_amount,
                'delivery_amount_per_product'=> $this->delivery_amount_per_product,
            ]);

            //Tags
            if($this->Product_tags){
                foreach ($this->Product_tags as $tag_name) {
                    if(Tag::where('name' , $tag_name)->exists()){
                        $tag_in_db = Tag::where('name' , $tag_name)->first();
                        $new_product->tags()->attach($tag_in_db->id);
                    }
                    else{
                        $new_tag_in_db = Tag::create([
                            'name' => $tag_name
                        ]);
                        $new_product->tags()->attach($new_tag_in_db->id);
                    }
                }
            }

            foreach ($images_file_name as $image_name) {
                ProductImage::create([
                    'product_id' => $new_product->id ,
                    'image' => $image_name
                ]);
            }

            foreach ($this->attribute_ids as $attribute_id => $value) {
                ProductAttribute::create([
                    'attribute_id' => $attribute_id ,
                    'product_id' => $new_product->id,
                    'value' => $value
                ]);
            }

            for ($i=0; $i < count($this->variationInput_values) ; $i++) {
                ProductVariation::create([
                    'attribute_id' => $this->variationAttribute->id,
                    'product_id' => $new_product->id,
                    'value' => $this->variationInput_values[$i],
                    'price' => $this->variationInput_prices[$i],
                    'quantity' => $this->variationInput_quantities[$i],
                    'sku' => $this->variationInput_skus[$i],
                ]);
            }

            DB::commit();

        }catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ایجاد  محصول', $ex->getMessage())->persistent('حله');
            dd('Problem');
        }
        return redirect(route('admin.products.index'));

    }

    public function render()
    {
        return view('livewire.admin.product.create',[
            'brands' =>  Brand::all(),
            'tags' => Tag::all(),
            'categories'=> Category::where('parent_id','!=' , 0)->get(),
        ]);
    }
}
