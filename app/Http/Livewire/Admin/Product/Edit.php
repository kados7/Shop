<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductVariation;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Edit extends Component
{
    public $product;
    public $name ;
    public $brand_id ;
    public $is_active ;
    public $description;
    public $delivery_amount;
    public $delivery_amount_per_product;


    public function mount(Product $product){
        $this->name = $product->name;
        $this->brand_id = $product->brand_id;
        $this->is_active = $product->getRawOriginal('is_active');
        $this->description = $product->description;
        $this->delivery_amount = $product->delivery_amount;
        $this->delivery_amount_per_product = $product->delivery_amount_per_product;

        foreach($product->tags as $product_tag){
            $this->Product_tags[$this->tag_id] = $product_tag->name;
            $this->tag_id +=1;
        }

    }

//Validation Rules
    protected $rules = [
        'name' => 'required|min:3',
        'brand_id' => 'required|integer',
        'is_active' => 'required|boolean',
        'description' => 'required|string',
        'delivery_amount' => 'required|integer',
        'delivery_amount_per_product' => 'integer',

    ];

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
    public $Product_tags = [];
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

    // UPDATE Product of Database
    public function updateProduct(){

        $this->validate();
        try {
            DB::beginTransaction();
            $this->product->update([
                'name'=> $this->name,
                'brand_id'=> $this->brand_id,
                'is_active'=> $this->is_active,
                'description'=> $this->description,
                'delivery_amount'=> $this->delivery_amount,
                'delivery_amount_per_product'=> $this->delivery_amount_per_product,
            ]);

            //Tags
            $this->product->tags()->detach();

            if($this->Product_tags){
                foreach ($this->Product_tags as $tag_name) {
                    if(Tag::where('name' , $tag_name)->exists()){
                        $tag_in_db = Tag::where('name' , $tag_name)->first();
                        $this->product->tags()->attach($tag_in_db->id);
                    }
                    else{
                        $new_tag_in_db = Tag::create([
                            'name' => $tag_name
                        ]);
                        $this->product->tags()->attach($new_tag_in_db->id);
                    }
                }
            }

            DB::commit();
            // dd('ok');
        }catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ویرایش  محصول', $ex->getMessage())->persistent('حله');
            dd('Problem');
        }

        alert()->success('محصول با موفقیت ویرایش شد');
        return redirect(route('admin.products.index'));
    }

    public function render()
    {
        return view('livewire.admin.product.edit',[
            'brands' => Brand::all(),
            'tags' => Tag::all(),
            'categories' => Category::all(),
            // where('parent_id','!=' , '0')->get(),
        ]);
    }
}
