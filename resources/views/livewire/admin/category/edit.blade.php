<div>
    <!-- Content Row -->
    <div class="row">
        @include('admin.sections.errors')
        <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white">
            <div class="mb-4">
                <h5 class="font-weight-bold">ویرایش دسته بندی - {{$category->name}}</h5>
            </div>
            <hr>
            <form wire:submit.prevent="updateCategory({{$category->id}})" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form row">
                    <div class="form-group col-md-3 mb-3">
                        <label for="name">نام</label>
                        <input wire:model="name" type="text"
                                class="form-control"  value="{{old('name')}}">
                    </div>
                    <div class="form-group col-md-3  mb-3">
                        <label for="slug">نام انگلیسی</label>
                        <input wire:model="slug" type="text"
                                class="form-control"  value="{{old('slug')}}">
                    </div>

                    <div class="form-group col-md-3  mb-3">
                        <label for="is_active">دسته بندی والد</label>
                        <select wire:model="parent_id" class="form-control">
                            <option value="0">بدون دسته والد</option>
                            @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3  mb-3">
                        <label for="is_active">وضعیت</label>
                        <select wire:model="is_active" class="form-control">
                            <option value="1" selected>فعال</option>
                            <option value="0">غیر فعال</option>
                        </select>
                    </div>
                    @if (App\Models\Category::where('id' , $parent_id)->exists())
                        <div class="form-group col-md-5 rounded  mb-3" style="background: #e8f0f8">
                            <label>ویژگی ها :</label><br>

                            @foreach ($attributes as $attribute )
                                <li>
                                    <input wire:model="is_filter_ids.{{$attribute->id}}" type="checkbox"
                                            class="form-check-input" value="{{$attribute->id}}">
                                    <label class="form-check-label text-danger">
                                        {{$attribute->name}}
                                    </label>
                                </li>
                            @endforeach
                            @if ($showNewAttributeDiv)
                                <div class="d-flex flex-row justify-content-between">
                                    <input wire:model="new_attribute_name" type="text" class="form-control">
                                    <button wire:click="storeAttribute()" class="btn btn-sm btn-outline-primary mx-1" type="button">
                                        افزودن
                                    </button>
                                </div>
                              @endif
                            <button wire:click="$toggle('showNewAttributeDiv')" class="btn btn-lg my-2" type="button">+</button>

                        </div>

                        <div class="form-group col-md-5 rounded  mb-3 mx-2" style="background: #d8ecff">
                            <label>قیمت دهی بر اساس ویژگی</label>
                            <select wire:model="is_variation_id" class="form-control" id="is_active" name="is_active">
                                    <option>انتخاب ویژگی</option>
                                @foreach ($attributes as $attribute )
                                    @if (in_array($attribute->id , $is_filter_ids ))
                                        <option value="{{$attribute->id}}">{{$attribute->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    @endif


                    <div class="form-group col-md-5">
                        <label for="attribute">آیکون</label>
                        <input wire:model.lazy="new_icon" class="form-control" type="file">

                    </div>
                    <div class="col-md-2">
                        <div class="card">
                            <p class="text-center pt-2">تصویر دسته بندی : </p>
                            @if ($new_icon)
                                <img class="card-img-top" class="my-2" src="{{$new_icon->temporaryUrl()}}">
                            @else
                                <img class="card-img-top"
                                    src="{{ url(env('CATEGORY_IMAGES_UPLOAD_PATH') . $icon) }}"
                                    alt="{{ $category->name }}">
                            @endif
                        </div>
                    </div>
                    <div wire:loading>

                        <div class="d-flex align-items-center">
                            <strong>Loading...</strong>
                            <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
                          </div>

                    </div>
                    <div class="form-group col-md-12">
                        <label for="attribute"> توضیحات دسته بندی</label>
                        <textarea wire:model.lazy="description" class="form-control">{{old('description')}}</textarea>
                    </div>
                </div>

                <button class="btn btn-outline-primary mt-5" type="submit">ثبت</button>
                <a href="{{ route('admin.brands.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>

    </div>
</div>
