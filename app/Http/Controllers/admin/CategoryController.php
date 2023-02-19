<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny' , Category::class);

        return view('admin.categories.index', [
            'categories' => Category::orderBy('parent_id')->paginate(20)
            // latest()->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create' , Category::class);

        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create' , Category::class);

        $request-> validate([
            'name'=> 'required|min:3',
            'slug'=> 'required|min:3|unique:categories,slug',
            'parent_id'=> 'required|integer',
            'description' => 'string',
            'is_active' => 'boolean',
            'attribute_ids'=> 'array',
            'is_filters'=> 'array',
        ]);

        try {
            DB::beginTransaction();

        $category = Category::create([
            'name'=> $request->name,
            'slug'=> $request->slug,
            'parent_id'=> $request->parent_id,
            'is_active'=> $request->is_active,
            'description'=> $request->description,
            'icon'=> $request->icon,
        ]);

        if ($request->attribute_ids) {
            foreach ($request->attribute_ids as $attribute_id) {
                $attributerow= Attribute::findOrFail($attribute_id);
                $attributerow->categories()->attach($category->id , [
                    'is_filter' =>  in_array($attribute_id,$request->is_filters) ? 1 : 0 ,
                    'is_variation' => $request->is_variation == $attribute_id ? 1 : 0
                ]);
             }
        }

        DB::commit();
    } catch (\Exception $ex) {
        DB::rollBack();
        alert()->error('مشکل در ایجاد دسته بندی', $ex->getMessage())->persistent('حله');
        return redirect()->back();
    }



        return redirect(route('admin.categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $this->authorize('view' , $category);

        return view('admin.categories.show',[
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $this->authorize('update' , $category);

        return view('admin.categories.edit',[
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->authorize('update' , $category);

        $request-> validate([
            'name'=> 'required|min:3',
            'slug' => 'required|unique:categories,slug,'.$category->id,
            'parent_id'=> 'required|integer',
            'description' => 'string',
            'is_active' => 'boolean',
            'attribute_ids'=> 'array',
            'is_filters'=> 'array',
        ]);

        try {
            DB::beginTransaction();

            $category->update([
            'name'=> $request->name,
            'slug'=> $request->slug,
            'parent_id'=> $request->parent_id,
            'is_active'=> $request->is_active,
            'description'=> $request->description,
            'icon'=> $request->icon,
            ]);

            $category->attributes()->detach();

            if ($request->attribute_ids) {
                foreach ($request->attribute_ids as $attribute_id) {
                    $attributerow= Attribute::findOrFail($attribute_id);
                    $attributerow->categories()->attach($category->id , [
                        'is_filter' =>  in_array($attribute_id,$request->is_filters) ? 1 : 0 ,
                        'is_variation' => $request->is_variation == $attribute_id ? 1 : 0
                    ]);
                }
            }
            DB::commit();

        }catch (\Exception $ex) {
                DB::rollBack();
                alert()->error('مشکل در ایجاد دسته بندی', $ex->getMessage())->persistent('حله');
                return redirect()->back();
        }



        return redirect(route('admin.categories.index'));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
