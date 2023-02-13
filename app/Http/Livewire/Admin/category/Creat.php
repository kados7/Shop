<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Attribute;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Creat extends Component
{
    use WithFileUploads;
    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];

    //Variable  for submit form in CATEGORIES database
    public $name;
    public $slug;
    public $parent_id;
    public $is_active = 1;
    public $icon;
    public $description;


    //Variable  for submit form in ATTRIBUTES database
    public $is_filter_ids =[];
    public $is_variation_id;

    public function mount(){
        $this->parent_id = 0;
    }

    protected $rules= [
        'name'=> 'required|min:3',
        'slug'=> 'required|min:3|unique:categories,slug',
        'parent_id'=> 'required|integer',
        'is_active' => 'boolean',
        // 'description' => 'string',
        'icon' => 'nullable|image',
        'is_filter_ids'=> 'array',
        'is_variation_id'=> 'exclude_if:parent_id,0|required|integer',
    ];

    public function store(){
        $this->validate();
        $icon_name = Carbon::now()->microsecond . $this->icon->getClientOriginalName();
        $this->icon->storeAs('images/category', $icon_name , 'public');

        try {
            DB::beginTransaction();

            $category = Category::create([
                'name'=> $this->name,
                'slug'=> $this->slug,
                'parent_id'=> $this->parent_id,
                'is_active'=> $this->is_active,
                'description'=> $this->description,
                'icon'=> $icon_name,
            ]);

            if ($this->is_filter_ids) {
                foreach ($this->is_filter_ids as $attribute_id) {
                    $attributeRow= Attribute::findOrFail($attribute_id);
                    $attributeRow->categories()->attach($category->id , [
                        'is_filter' => ($this->is_variation_id != $attribute_id and in_array($attribute_id,$this->is_filter_ids)) ? 1 : 0 ,
                        'is_variation' => $this->is_variation_id == $attribute_id ? 1 : 0
                    ]);
                }
            }

            DB::commit();

        } catch (\Exception $ex) {
            DB::rollBack();
            dd('nooo');
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
        return view('livewire.admin.category.creat',[
            'categories'=> Category::all(),
            'attributes'=> Attribute::all(),
        ]);
    }
}
