<div> <!-- Content Row -->
    <div class="row">
        @include('admin.sections.errors')
        <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white">
            <div class="d-flex flex-row mb-4 justify-content-between text-md-right">
                <img class="card-img-top" style="width: 100px"
                                src="{{ url(env('PRODUCT_IMAGES_UPLOAD_PATH') . $product->primary_image) }}"
                                alt="{{ $product->name }}" >
                <h5 class="font-weight-bold"> ویرایش محصول  : {{$product->name}}</h5>
                <div>
                    <a class="btn btn-sm btn-outline-dark text-black" href="{{route('admin.products.edit' , ['product'=> $product->id])}}"> ویرایش محصول </a><br>
                    <a class="btn btn-sm btn-outline-dark text-black mt-1" href="{{route('admin.products.images_edit' , ['product'=> $product->id])}}"> ویرایش تصاویر </a>
                </div>
            </div>
            <div class="mb-4">
            </div>

            <form wire:submit.prevent="store_product()" enctype="multipart/form-data">
                @csrf

                <div class="form row">

                    <!-- Category and ATTRIBUTES SECTION -->

                    <div class="col-md-12">
                        <hr>
                        <strong>● دسته بندی و ویژگی ها :</strong>
                    </div>

                    <div class="form-group col-md-4 my-3">
                        <label for="tag">انتخاب دسته بندی</label>
                        <div class="form-check">
                            <select wire:model="category_id" class="form-control my-1">
                                <option >انتخاب کنید</option>
                                @foreach ($categories as $category)
                                    <option  value="{{$category->id}}">{{$category->name}} - {{$category->parent->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-md-12"></div>
                        <p class="text-dark">✔ ویژگی های فیلتر کننده : </p>

                        @foreach ( $filteredAttributes as $filteredAttribute)
                            <div class="form-group col-md-3 my-2 p-1" style="background: #b9fff6">
                                <label for="name">{{$filteredAttribute->name}}</label>
                                <input wire:model="attribute_ids.{{$filteredAttribute->id}}"
                                        type="text" class="form-control my-1">
                            </div>
                        @endforeach

                    <div class="col-md-12"></div>

                        <p class="text-dark">✔ افزودن قیمت و موجودی بر اساس متغیر <u class="text-danger">{{$variationAttribute->name}} </u> :</p>
@if ($variationInputs)


                        @foreach($variationInputs as $i => $id)
                        <span style="font-size: 8px">{{$id}}</span>
                            <div class="row align-items-end mt-2 rounded p-2 mb-1" style="background: #f6ff7d">
                                <div class="form-group col-md-2">
                                    <label for="name">نام متغیر</label>
                                    <input wire:model.lazy="variationInput_values.{{$id}}" class="form-control" type="text">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="name">قیمت </label>
                                    <input wire:model.lazy="variationInput_prices.{{$id}}" class="form-control" type="text">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="name">تعداد موجود در انبار</label>
                                    <input wire:model.lazy="variationInput_quantities.{{$id}}" class="form-control"  type="text">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="name">شناسه انبار </label>
                                    <input wire:model.lazy="variationInput_skus.{{$id}}" class="form-control" type="text">
                                </div>
                                {{-- Sale Section --}}
                                    <p class="text-danger rounded"> حراج : </p>

                                <div class="form-group col-md-3">
                                    <label> قیمت حراجی </label>
                                    <input wire:model.defer="variationInput_sale_prices.{{$id}}" type="text"
                                        class="form-control">
                                </div>

                                <div class="form-group col-md-4">
                                    <label> تاریخ شروع حراجی </label>
                                    <input wire:model.defer="variationInput_date_on_sale_froms.{{$id}}" type="datetime-local"
                                            class="form-control">
                                </div>

                                <div class="form-group col-md-4">
                                    <label> تاریخ پایان حراجی </label>
                                    <input wire:model.defer="variationInput_date_on_sale_tos.{{$id}}" type="datetime-local"
                                             class="form-control">
                                </div>
                                <div class="col-md-1">
                                    <button class="btn btn-danger btn-sm" wire:click.prevent="removeVariationInput({{$i}},{{$id}})">حذف</button>

                                </div>

                            </div>
                        @endforeach
@endif
                        <div>
                            <button wire:click="addVariationInput({{$i}})"
                                    class="btn" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-plus text-success" viewBox="0 0 16 16">
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                            </button>
                        </div>

                </div>



                <button class="btn btn-outline-primary mt-5" type="submit">ثبت</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>

        </div>

    </div>
    </div>

