<div> <!-- Content Row -->
<div class="row">
    @include('admin.sections.errors')
    <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white">
        <div class="mb-4">
            <h5 class="font-weight-bold">افزودن محصول</h5>
        </div>

        <hr>
        <form wire:submit.prevent="store_product()" enctype="multipart/form-data">
            @csrf

            <div class="form row">
                <div class="form-group col-md-4 my-2">
                    <label for="name">نام</label>
                    <input wire:model.defer="name" class="form-control my-1" type="text">
                </div>

                <div class="form-group col-md-4 my-2">
                    <label for="brand_id">برند</label>
                    <select wire:model.defer="brand_id" class="form-control my-1">
                        <option>انتخاب برند</option>
                        @foreach ($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                    </select>
                    @if ($showNewBrandDiv)
                        <div class="d-flex flex-row justify-content-between">
                            <input wire:model="new_brand_name" type="text" class="form-control">
                            <button wire:click="storeBrand()" class="btn btn-sm btn-outline-primary mx-1" type="button">
                                افزودن
                            </button>
                        </div>
                    @endif
                    <button wire:click="$toggle('showNewBrandDiv')" class="btn btn-sm mt-1" type="button">+ افزودن برند</button>


                </div>

                <div class="form-group col-md-4 my-2">
                    <label for="is_active">وضعیت</label>
                    <select wire:model.defer="is_active" class="form-control my-1">
                        <option value="1">فعال</option>
                        <option value="0">غیرفعال</option>
                    </select>
                </div>

                <!-- TAG SECTION -->

                <div class="form-group col-md-5 my-2 rounded p-1" style="background:rgba(209, 209, 209, 0.26)">
                    <label for="tag">تگ ها</label><br>
                    @foreach ($Product_tags as $tag_id => $Product_tag)
                        <button wire:click="deleteTag({{$tag_id}})" class="btn btn-sm rounded-pill position-relative" style="background:wheat" type="button"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="حذف">
                            <span style="font-size: 12px ;">{{$tag_id}}-{{$Product_tag}}</span>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger text-white p-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                                <span class="visually-hidden">unread messages</span>
                              </span>
                        </button>
                    @endforeach

                    @if ($showNewTagDiv)
                        <div class="d-flex flex-row justify-content-between mt-1">
                            <input wire:model="new_tag_name" type="text" class="form-control">
                            <button wire:click="storeTag()" class="btn btn-sm btn-outline-primary mx-1" type="button">
                                افزودن
                            </button>
                        </div>
                    @endif
                    <button wire:click="$toggle('showNewTagDiv')" class="btn btn-sm mt-1" type="button">+ افزودن تگ</button>


                </div>
                <div class="form-group col-md-7 my-2">
                    <label for="description">توضیحات</label>
                    <textarea wire:model.lazy="description" class="form-control my-1">{{ old('description') }}</textarea>
                </div>

                <!-- PRODUCT IMAGE SECTION -->

                <div class="col-md-12">
                    <hr>
                    <strong>● تصاویر محصول :</strong>
                </div>

                <div class="form-group col-md-3 my-2"  style="background:rgba(209, 209, 209, 0.26)">
                    <label for="primary_image"> انتخاب تصویر اصلی محصول</label>
                    <input  wire:model.lazy="primary_image"
                            type="file" class="form-control form-control-sm my-2">

                    @if ($primary_image)
                        <img width="100%" src="{{$primary_image->temporaryUrl()}}">
                    @endif
                </div>
                <div class="form-group col-md-9 my-2"  style="background:rgba(209, 209, 209, 0.26)">
                    <label for="images">انتخاب تصاویر محصول</label>
                    <input wire:model.lazy="images"
                            type="file" class="form-control form-control-sm my-2" multiple>
                    <div class="d-flex flex-row">
                        @if ($images)
                            @foreach ( $images as $image )
                                <img class="mx-1 rounded" width="100%" src="{{$image->temporaryUrl()}}">
                            @endforeach
                        @endif
                    </div>
                </div>
                <!-- Category and ATTRIBUTES SECTION -->

                <div class="col-md-12">
                    <hr>
                    <strong>● دسته بندی و ویژگی ها :</strong>
                </div>

                <div class="form-group col-md-4 my-3">
                    <label for="tag">انتخاب دسته بندی</label>
                    <div class="form-check">
                        <select wire:model="category_id" class="form-control my-1" id="category_id" name="category_id">
                            <option>انتخاب کنید</option>
                            @foreach ($categories as $category)
                                <option  value="{{$category->id}}">{{$category->name}} - {{$category->parent->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12"></div>
                    @if ($category_id)
                    <p class="text-danger">✔ ویژگی های فیلتر کننده : </p>
                        @foreach ( $filteredAttributes as $filteredAttribute)
                            <div class="form-group col-md-3 my-2">
                                <label for="name">{{$filteredAttribute->name}}</label>
                                <input wire:model="attribute_ids.{{$filteredAttribute->id}}"
                                        type="text" class="form-control my-1">
                            </div>
                        @endforeach

                <div class="col-md-12"></div>

                    <p class="text-danger">✔ افزودن قیمت و موجودی بر اساس متغیر {{$variationAttribute->name}} :</p>

                    @foreach($variationInputs as $key => $value)
                        <div class="row align-items-end mt-2">
                            <div class="form-group col-md-2">
                                <label for="name">نام متغیر</label>
                                <input wire:model.lazy="variationInput_values.{{$key}}" class="form-control" type="text">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="name">قیمت </label>
                                <input wire:model.lazy="variationInput_prices.{{$key}}" class="form-control" type="text">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="name">تعداد موجود در انبار</label>
                                <input wire:model.lazy="variationInput_quantities.{{$key}}" class="form-control"  type="text">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="name">شناسه انبار </label>
                                <input wire:model.lazy="variationInput_skus.{{$key}}" class="form-control" type="text">
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-danger btn-sm" wire:click.prevent="removeVariationInput({{$key}})">حذف</button>

                            </div>

                        </div>
                    @endforeach

                    <div>
                        <button wire:click="addVariationInput({{$i}})"
                                class="btn" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-plus text-success" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                        </button>
                    </div>
                @endif

                <!-- DELIVERY SECTION -->
                <div class="col-md-12">
                    <hr>
                    <strong>● هزینه ارسال : </strong>
                </div>

                <div class="form-group col-md-4 mt-3">
                    <label for="delivery_amount">هزینه ارسال یک محصول</label>
                    <input wire:model.lazy="delivery_amount"
                            type="text" class="form-control">
                </div>

                <div class="form-group col-md-4 mt-3">
                    <label for="delivery_amount_per_product">هزینه ارسال به ازای محصول اضافی</label>
                    <input wire:model.lazy="delivery_amount_per_product"
                            type="text" class="form-control">
                </div>

            </div>



            <button class="btn btn-outline-primary mt-5" type="submit">ثبت</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
        </form>

    </div>

</div>
</div>

