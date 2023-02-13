<div>
    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-5 bg-white">
            <div class="d-flex flex-row mb-4 justify-content-between text-md-right">
                <img class="card-img-top" style="width: 100px"
                                src="{{ url(env('PRODUCT_IMAGES_UPLOAD_PATH') . $product->primary_image) }}"
                                alt="{{ $product->name }}" >
                <h5 class="font-weight-bold">ویرایش تصاویر محصول : {{ $product->name }}</h5>
                <div>
                    <a class="btn btn-sm btn-outline-dark text-black" href="{{route('admin.products.edit' , ['product'=> $product->id])}}"> ویرایش محصول </a>
                    <a class="btn btn-sm btn-outline-dark text-black mt-1" href="{{route('admin.products.category_edit' , ['product'=> $product->id])}}"> ویرایش دسته بندی و ویژگی </a>
                </div>
            </div>

            <hr>

            @include('admin.sections.errors')
            <div class="form row">
                <div class="col-md-12 mb-2">
                    <h5> تمام تصاویر : </h5>
                </div>
                <form wire:submit.prevent="newPrimaryImage()" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        @foreach ($product->product_images as $image)
                            <div class="col-md-3  hovered_div ">
                                @if (array_key_exists($image->id, $deleteImageSure) and $deleteImageSure[$image->id] == true )
                                    <p class="p1 text-black">مطمئنی که میخوای عکسو حذف کنی ؟ راه برگشتی نیستا !</p>
                                    <button wire:click="deleteImage({{$image->id}})" class="btn btn-sm btn-danger" type="button">❌واقعا میخوام حذف شه❌</button>
                                    <button wire:click="$toggle('deleteImageSure.{{$image->id}}')" class="btn btn-sm btn-primary mt-2" type="button"> نه نمیخوام </button>

                                    @else
                                    <img src="{{ url(env('PRODUCT_IMAGES_UPLOAD_PATH') . $image->image) }}"
                                    alt="{{ $product->name }}" width="100%" >
                                    <div class="overlay_select rounded">

                                        <label for="{{$primary_image}}">✔ انتخاب تصویر اصلی</label>
                                        <input wire:model.lazy="primary_image"
                                                type="radio" value="{{$image->image}}">
                                    </div>

                                    <div class="overlay_delete rounded">
                                        <button wire:click="$toggle('deleteImageSure.{{$image->id}}')" class="btn btn-sm btn-outline-light" type="button">❌ حذف </button>
                                    </div>
                                @endif



                            </div>

                        @endforeach
                    </div>

                    <div class="col-md-2">
                        <div class="card">
                            <p class="text-center pt-2">تصویر اصلی : </p>
                            <img class="card-img-top"
                                src="{{ url(env('PRODUCT_IMAGES_UPLOAD_PATH') . $primary_image) }}"
                                alt="{{ $product->name }}">
                        </div>
                    </div>
                    <button class="btn btn-sm btn-primary">✔ ثبت تغییر تصویر اصلی</button>
                    @if ($is_submited)
                        <span class="mx-3">ثبت شد !</span>
                    @endif
                </form>

                <div wire:loading>

                    <div class="d-flex align-items-center">
                        <strong>Loading...</strong>
                        <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
                      </div>

                </div>

                <div class="col-12 col-md-12 mb-1">
                    <hr>
                </div>

                <div class="col-12 col-md-12 ">
                </div>
                <form wire:submit.prevent="uploadImages()" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-4 my-2">
                        <label for="images">انتخاب تصاویر محصول</label>
                        <input wire:model.lazy="all_preimages"
                                type="file" class="form-control form-control-sm my-2" multiple>
                    </div>
                    <button class="btn btn-sm btn-primary" type="submit">آپلود تصاویر </button>
                </form>
            </div>

        </div>

    </div>
</div>

