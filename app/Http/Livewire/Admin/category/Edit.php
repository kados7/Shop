<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Attribute;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];

    //Variable  for submit form in CATEGORIES database
    public $category;
    public $name;
    public $slug;
    public $parent_id;
    public $is_active;
    public $icon;
    public $new_icon;
    public $description;


    //Variable  for submit form in ATTRIBUTES database
    public $is_filter_ids =[];
    public $is_variation_id;

    public function mount(Category $category){
        $this->parent_id = $category->parent_id;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->is_active = true;
        $this->icon = $category->icon;
        $this->description = $category->description;

        $this->is_variation_id;
        $this->is_filter_ids = [];
        foreach($category->attributes as $attribute){
            $attribute_id = $attribute->id;
            $is_filter= $attribute->pivot->is_filter;
            $is_variation= $attribute->pivot->is_variation;
            $this->is_filter_ids [$attribute_id] = $attribute_id ;

            if($is_variation == 1){
                $this->is_variation_id = $attribute_id ;
            }
        }

        // dd($this->is_filter_ids, $this->is_variation_id);
        // dd($attribute_id,$is_filter, $is_variation);
    }

    protected $rules= [
        'name'=> 'required|min:3',
        'slug'=> ['required','min:3'],
        'parent_id'=> 'required|integer',
        'is_active' => 'boolean',
        // 'description' => 'string',
        'icon' => 'nullable',
        'is_filter_ids'=> 'array',
        'is_variation_id'=> 'exclude_if:parent_id,0|required|integer',
    ];

    public function updateCategory($category_id){
        // dd($this->is_filter_ids, $this->is_variation_id);
        $this->validate();

        if($this->new_icon){
            $icon_name = Carbon::now()->microsecond . $this->new_icon->getClientOriginalName();
            $this->new_icon->storeAs('images/category', $icon_name , 'public');
        }
        else{
            $icon_name =$this->category->icon;
        }

        try {
            DB::beginTransaction();

            $category = Category::findOrFail($category_id);
            $category->update([
                'name'=> $this->name,
                'slug'=> $this->slug,
                'parent_id'=> $this->parent_id,
                'is_active'=> $this->is_active,
                'description'=> $this->description,
                'icon'=> $icon_name,
            ]);


            if ($this->is_filter_ids) {

                $this->category->attributes()->detach();
                foreach ($this->is_filter_ids as $attribute_id) {
                    $attributeRow= Attribute::findOrFail($attribute_id);

                    $attributeRow->categories()->attach($category_id , [
                        'is_filter' => ($this->is_variation_id != $attribute_id and in_array($attribute_id,$this->is_filter_ids)) ? 1 : 0 ,
                        'is_variation' => $this->is_variation_id == $attribute_id ? 1 : 0
                    ]);
                }
            }

            DB::commit();

        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ایجاد دسته بندی', $ex->getMessage())->persistent('حله');
        }

        return redirect(route('admin.categories.index'));

    }


    public $showNewAttributeDiv = false;
    public $new_attribute_name;
    public function storeAttribute(){
        Attribute::create([
            'name' => $this->new_attribute_name
        ]);
        $this->emit('refreshComponent');

    }

    public function render()
    {
        return view('livewire.admin.category.edit',[
            'categories'=> Category::all(),
            'attributes'=> Attribute::all(),
        ]);
    }
}
