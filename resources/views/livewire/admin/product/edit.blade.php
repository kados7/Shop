<div>
    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="d-flex flex-row mb-4 justify-content-between text-md-right">
                <img class="card-img-top" style="width: 100px"
                                src="{{ url(env('PRODUCT_IMAGES_UPLOAD_PATH') . $product->primary_image) }}"
                                alt="{{ $product->name }}" >
                <h5 class="font-weight-bold">ویرایش  {{ $product->name }}</h5>
                <div>
                    <a class="btn btn-sm btn-outline-dark text-black" href="{{route('admin.products.images_edit' , ['product'=> $product->id])}}"> ویرایش تصاویر </a><br>
                    <a class="btn btn-sm btn-outline-dark text-black mt-1" href="{{route('admin.products.category_edit' , ['product'=> $product->id])}}"> ویرایش دسته بندی و ویژگی </a>
                </div>
            </div>
            <hr>

            @include('admin.sections.errors')

            <form wire:submit.prevent="updateProduct()" enctype="multipart/form-data" method="POST">
                @csrf
                @method('put')
                <div class="form row">

                    <div class="form-group col-md-4 my-2">
                        <label for="name">نام</label>
                        <input wire:model="name" class="form-control" type="text"">
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
                        <select wire:model.lazy="is_active" class="form-control">
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

                    {{--  Description SECTION --}}
                    <div class="form-group col-md-7 mt-2 ">
                        <label for="description">توضیحات</label>
                        <textarea wire:model.lazy="description" class="form-control" rows="4"></textarea>
                    </div>

                    {{-- Delivery Section --}}
                    <div class="col-md-12">
                        <hr>
                        <p>هزینه ارسال : </p>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="delivery_amount">هزینه ارسال</label>
                        <input wire:model="delivery_amount" class="form-control" type="text">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="delivery_amount_per_product">هزینه ارسال به ازای محصول اضافی</label>
                        <input wire:model="delivery_amount_per_product" class="form-control" type="text" ">
                    </div>

                </div>

                <button class="btn btn-outline-primary mt-5" type="submit">ویرایش</button>
                <a href="" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>

    </div>

</div>
