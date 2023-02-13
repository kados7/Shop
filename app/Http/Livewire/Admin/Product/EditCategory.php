<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductVariation;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
class EditCategory extends Component
{
    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];

// Variable of Inputes for bind to database
    public $product;

// Variable of Form
    public $category_id;
    public $attribute_ids=[];


    public $variationInput_values=[];
    public $variationInput_prices=[];
    public $variationInput_quantities=[];
    public $variationInput_skus=[];
    public $variationInput_sale_prices=[];
    public $variationInput_date_on_sale_froms=[];
    public $variationInput_date_on_sale_tos=[];
// Variable to show Attribue
    public $is_selected= true;

// Variable of Attribute's Inputes
    public $filteredAttributes;
    public $variationAttribute;
    public $variationInputs=[];
    public $i;

public function mount(Product $product){
    $this->category_id = $product->category_id;

    $category=Category::find($product->category_id);
    $this->filteredAttributes = $category->attributes()->wherePivot('is_filter' , true)->get();
    $this->variationAttribute = $category->attributes()->wherePivot('is_variation' , true)->first();

    $this->attribute_ids=$product->product_attributes()->pluck('value','attribute_id')->toArray();

    $this->variationInput_values = $product->product_variations->pluck( 'value','id')->toArray();
    $this->variationInput_prices = $product->product_variations->pluck( 'price','id')->toArray();
    $this->variationInput_quantities = $product->product_variations->pluck( 'quantity','id')->toArray();
    $this->variationInput_skus = $product->product_variations->pluck( 'sku','id')->toArray();
    $this->variationInput_sale_prices = $product->product_variations->pluck( 'sale_price','id')->toArray();
    $this->variationInput_date_on_sale_froms = $product->product_variations->pluck( 'date_on_sale_from','id')->toArray();
    $this->variationInput_date_on_sale_tos = $product->product_variations->pluck( 'date_on_sale_to','id')->toArray();

    $this->i = count($this->variationInput_values);

    foreach($this->variationInput_values as $id => $value){
        $this->variationInputs[] =  $id;
    }
}

    public function updatedCategoryId(){
        $this->attribute_ids=null ;

        // $this->i = 0;
        // $this->variationInputs = null;

        $this->variationInput_values = null;
        $this->variationInput_prices = null;
        $this->variationInput_quantities = null;
        $this->variationInput_skus = null;
        $this->variationInput_sale_prices = null;
        $this->variationInput_date_on_sale_froms = null;
        $this->variationInput_date_on_sale_tos = null;
        $this->getAttributes($this->category_id);
        $this->is_selected = true;

    }

//get related Attributes based on Category
    public function getAttributes($categoryId){
        $category=Category::find($categoryId);

        $this->filteredAttributes = $category->attributes()->wherePivot('is_filter' , true)->get();
        $this->variationAttribute = $category->attributes()->wherePivot('is_variation' , true)->first();
    }

    // ADD INPUT for Variation
    public function addVariationInput($i){
        $x = $i + 1;
        $this->i = $x;
        $this->variationInputs[] = $i;
    }

// remove INPUT for Variation
    public function removeVariationInput($i,$id)
    {
        unset($this->variationInputs[$i]);
        unset($this->variationInput_values[$id]);
        unset($this->variationInput_prices[$id]);
        unset($this->variationInput_quantities[$id]);
        unset($this->variationInput_skus[$id]);
        unset($this->variationInput_sale_prices[$id]);
        unset($this->variationInput_date_on_sale_froms[$id]);
        unset($this->variationInput_date_on_sale_tos[$id]);
    }

//Validation Rules
    protected $rules = [
        'name' => 'required|min:3',
        'brand_id' => 'required|integer',
        'is_active' => 'required|boolean',
        'tags_id' => 'required|array',
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
        // dd([
        //     '$this->variationInputs' => $this->variationInputs,
        //     'category_id' => $this->category_id,
        //     'i'=> $this->i,
        //     'attribute_ids'=> $this->attribute_ids,
        //     'filteredAttributes'=> $this->filteredAttributes,
        //     'product->product_attributes'=> $this->product->product_attributes,
        //     'variationInput_values'=> $this->variationInput_values,
        //     'variationInput_prices'=> $this->variationInput_prices,
        //     'variationInput_quantities'=> $this->variationInput_quantities,
        //     'variationInput_skus'=> $this->variationInput_skus,
        //     'variationInput_sale_prices'=> $this->variationInput_sale_prices,
        //     'date_on_sale_froms'=> $this->variationInput_date_on_sale_froms,
        //     'date_on_sale_tos'=> $this->variationInput_date_on_sale_tos,
        // ]);

        try {
            DB::beginTransaction();

            $this->product->update([
                'category_id'=> $this->category_id
            ]);

            ProductAttribute::where('product_id', $this->product->id)->delete();
            foreach ($this->attribute_ids as $id => $value) {
                ProductAttribute::create([
                    'attribute_id' => $id ,
                    'product_id' => $this->product->id,
                    'value' => $value
                ]);
            }

            ProductVariation::where('product_id', $this->product->id)->delete();
            foreach ($this->variationInputs as $input_id) {
                // dd($input_id);
                ProductVariation::create([
                    'attribute_id' => $this->variationAttribute->id,
                    'product_id' => $this->product->id,
                    'value' => $this->variationInput_values[$input_id],
                    'price' => $this->variationInput_prices[$input_id],
                    'quantity' => $this->variationInput_quantities[$input_id] ?? null,
                    'sku' => $this->variationInput_skus[$input_id] ?? null,
                    'sale_price' => $this->variationInput_sale_prices[$input_id] ?? null,
                    'date_on_sale_from' => $this->variationInput_date_on_sale_froms[$input_id] ?? null,
                    'date_on_sale_to' => $this->variationInput_date_on_sale_tos[$input_id] ?? null,

                ]);
                // $productVariation->save();
            }

            DB::commit();
            // dd('ok');

        }catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ایجاد  محصول', )->persistent('حله');
            dd($ex->getMessage());
        }
        alert()->success('محصول با موفقیت ویرایش شد');
        return redirect(route('admin.products.index'));

    }



    public function render()
    {
        return view('livewire.admin.product.edit-category',[
            'categories' => Category::where('parent_id','!=' , 0)->get(),
        ]);
    }
}
