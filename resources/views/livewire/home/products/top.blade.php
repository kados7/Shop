<div>
    <div class="row px-5">
        <div class="col-md-7">

            <!-- Gallery -->


            <div class="col-12 p-2">

                <div >
                    <img width="100%" src="{{url(env('PRODUCT_IMAGES_UPLOAD_PATH')).'/'.$product->primary_image}}">
                </div>

                    <div class="d-flex flex-row justify-content-center" >
                        @foreach ($product->product_images as $image)
                            <a type="button" data-bs-toggle="modal" data-bs-target="#image-{{$loop->index}}">
                                <img class="float-end mx-2" src="{{url(env('PRODUCT_IMAGES_UPLOAD_PATH')).'/'.$image->image}}"
                                 width="120" alt="{{$product->name}}">
                            </a>

                            <!-- Modal -->
                            <div class="modal modal-lg fade" id="image-{{$loop->index}}" tabindex="-1" aria-labelledby="image-{{$loop->index}}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img class="float-end mx-2" src="{{url(env('PRODUCT_IMAGES_UPLOAD_PATH')).'/'.$image->image}}"
                                                width="100%" alt="{{$product->name}}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        @endforeach
                    </div>
            </div>


        </div>

        <!-- Brand + Title +Star+ Price + Expert + Tags -->
        <div class="col-md-5 p-5">

            <!-- share + star count + comment count -->
            <div class="d-flex flex-row mb-5">

                <a href="#comments" class="btn" style="font-size : 18px">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                            <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                        </svg>
                    </span>
                    {{$product->rates_avarage()}}
                </a>

                <a href="#comments" class="btn" style="font-size : 18px">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
                            <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                        </svg>
                    </span>
                    {{$product->comments()->count()}}
                </a>

                <div class="mx-4 me-auto">
                    <button wire:click="add_session({{$product->id}})" class="btn p-2" data-bs-toggle="tooltip" data-bs-placement="top" title="مقایسه محصول">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-grid-fill" viewBox="0 0 16 16">
                            <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3z"/>
                        </svg>
                    </button>
                    <button class="btn p-2" data-bs-toggle="tooltip" data-bs-placement="top" title="به اشتراک گذاری">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
                            <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>
                        </svg>
                    </button>
                </div>
            </div>
            @if ($compare_added)
                <div class="alert alert-success" role="alert">
                    محصول به لیست مقایسه اضافه شد.
                    <a target="_blank" class="btn btn-primary" href="/compare">صفحه مقایسه</a>
                </div>
            @endif
            @if ($compare_cant_add)
                <div class="alert alert-danger" role="alert">
                    نمیتوان بیش از 4 محصول به لیست مقایسه اضافه کرد
                    <a target="_blank" class="btn btn-primary" href="/compare">صفحه مقایسه</a>
                </div>
            @endif
            <!--END share + star count + comment count -->

            <!--Product Name + Brand + Category -->
            <div class="mb-5">
                <div class="p-2">
                    <h1 class="text-black h4">{{$product->name}}</h1>
                </div>
                <div class="p-2">
                    <span class="text-black h5">برند {{$product->brand->name}} |</span>
                    <span>
                        <a class="btn h6 px-1" href="/main/{{$product->category->slug}}"> {{$product->category->name}} </a>
                    </span>
                </div>
            </div>
            <!-- END Product Name + Brand + Category -->

            <!--Product Price + Sale_Price + Garanty -->
            <div class="row p-1 my-5">
                <div class="col-md-6">
                    <div class="mt-4 mb-2">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                            </svg>
                        </span>
                        <span style="font-size:13px">
                            آماده ارسال
                        </span>
                    </div>

                    <div class="my-2">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-check" viewBox="0 0 16 16">
                                <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
                                <path d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                        </span>
                        <span style="font-size:13px">
                            گارانتی اصالت و سلامت فیزیکی کال
                        </span>
                    </div>
                </div>

                <div class="col-md-6 text-start">
                    {{-- {{dd($variation_quantity,$variation_value,$variation_price,$variation_sale_price)}} --}}
                    @if ($variation->quantity)
                        @if ($variation->hasVariationDiscount())
                            <div>
                                <span class="text-black h2">{{number_format($variation->sale_price)}}</span>
                                <strong class="text-black h5">تومان</strong>
                            </div>
                            <div class="my-2">
                                <del class="text-muted h4">{{number_format($variation->price)}}</del>
                                <span class="bg-dark text-white py-1 px-2 h6">{{number_format($variation->variationDiscount(),1)}} %</span>

                            </div>
                        @else
                            <div>
                                <span class="text-black h2">{{number_format($variation->price)}}</span>
                                <strong class="text-black h5">تومان</strong>
                            </div>
                        @endif

                    @else
                        <span class="bg-dark text-white px-4 py-2">ناموجود</span>
                    @endif

                </div>
            </div>
            <!--END Product Price + Sale_Price + Garanty -->


            <div class="row p-1 my-5">
                <!--Variation -->
                <div class="mb-2">
                    <span>{{$product->product_variations->first()->attribute->name}} :</span>
                    <span>{{$variation->value}}</span>
                </div>

                <div class="p-3" style="background: #EFEFF0">
                    <select wire:model="selected_variation_value" class="form-select variaton-select" aria-label="variaton-select">
                        @foreach ($product->product_variations as $variationz)
                            <option value="{{$variationz->value}}">{{$variationz->value}}</option>
                        @endforeach
                    </select>
                </div>
                <!--END Variation -->

                <!--Add to CARD -->
                <div class="col-md-10 my-3">
                    <div class="d-grid">
                        <button wire:click="add_to_cart({{$product->id.','. $variation->id}})" class="btn btn-add-card py-3" type="button">افزودن به سبد خرید</button>
                    </div>
                </div>
                <div class="col-md-2 my-3">
                @if (auth()->check())
                    @if ($product->userWishlistCheck(auth()->id()))
                        <button wire:click="delete_from_wishlist({{$product->id}})" class="btn btn-wichlist p-3" type="button"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="حذف از لیست علاقه مندی ها">
                            <svg style="color:red" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                                <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"/>
                            </svg>
                        </button>
                    @else
                        <button wire:click="add_to_wishlist({{$product->id}})" class="btn btn-wichlist p-3" type="button"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="افزودن به لیست علاقه مندی ها">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-suit-heart" viewBox="0 0 16 16">
                                <path d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z"/>
                            </svg>
                        </button>
                    @endif
                @else
                    <button class="btn btn-wichlist p-3" type="button"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="ابتدا باید وارد حساب کاربری شوید">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-suit-heart" viewBox="0 0 16 16">
                            <path d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z"/>
                        </svg>
                    </button>
                @endif

                </div>
                <!--END Add to CARD -->
                @if ($mustBeRegistered)
                <div class="alert alert-secondary" role="alert">
                    برای افزودن به لیست علاقه مندی ها ابتدا باید وارد سایت شوید.
                </div>
            @endif
            </div>
        </div>
    </div>
    <div class="col-md-12 p-5">
        <hr>
    </div>
</div>
