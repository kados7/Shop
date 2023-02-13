<div>
    <div class="row my-5 mx-5 px-5">
        <div class="col-md-6 mt-1 " role="search">
        <div class="search container">
            <input wire:model="search_term" class="form-control border-top-0 border-start-0 border-end-0" type="text" placeholder="جستوجو در میان محصولات">
        </div>
    </div>
    <div class="row my-5">
        @foreach ($products as $product)

        <div class="col-md-6 col-lg-3 mb-4 mt-2 mb-md-0" >
            <div class="card position-relative" style="background: #F6F6F6">
                <div class="bg-white position-absolute top-0 end-0" style="z-index:1">
                    <a class="btn btn-sm p-2" href="/main/{{$product->category->slug}}" class="text-muted">
                        {{$product->brand->name}}
                    </a>
                </div>
                <div class="bg-white position-absolute top-0 start-0" style="z-index:1">
                    @if (auth()->check())
                        @if ($product->userWishlistCheck(auth()->id()))
                            <button wire:click="delete_from_wishlist({{$product->id}})" class="btn p-1" type="button"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="حذف از لیست علاقه مندی ها">
                                <svg style="color:red" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                                    <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"/>
                                </svg>
                            </button>
                        @else
                            <button wire:click="add_to_wishlist({{$product->id}})" class="btn p-1" type="button"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="افزودن به لیست علاقه مندی ها">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-suit-heart" viewBox="0 0 16 16">
                                    <path d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z"/>
                                </svg>
                            </button>
                        @endif
                    @else
                        <button class="btn p-1" type="button"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="ابتدا باید وارد حساب کاربری شوید">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-suit-heart" viewBox="0 0 16 16">
                                <path d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z"/>
                            </svg>
                        </button>
                    @endif
                </div>
                <div class="hovered_product">
                    <a href="/product/{{$product->slug}}">
                        <img src="{{url(env('PRODUCT_IMAGES_UPLOAD_PATH')).'/'.$product->primary_image}}"
                        class="card-img-top" />
                    </a>
                    <div class="overlay_variation pt-3 px-3">
                        @foreach ($product->product_variations as $variation)
                            <span class="mx-2">{{$variation->value}}</span>
                        @endforeach
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <p style="font-size:14px ;color:black">{{$product->name}}</p>
                        <p class="text-dark mb-0" style="font-size:13px">
                            {{$product->rates_avarage()}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                            </svg>
                        </p>
                    </div>

                    <div class="d-flex justify-content-between mb-2">
                        <p class="text-muted mb-0">x<span class="fw-bold"></span></p>
                        <p>
                            @if ($product->hasProductQuantity())
                                @if ($product->sale_check)
                                    <del class="text-muted mx-2" >{{number_format($product->sale_check->price)}}</del>
                                    <strong style="color:black ; font-size:16px">{{number_format($product->sale_check->sale_price)}} تومان</strong>
                                @else
                                        <strong style="color:black ; font-size:16px">{{number_format($product->min_price_check->price)}} تومان</strong>
                                @endif

                            @else
                                <strong class="px-3 py-1 bg-dark text-white">ناموجود </strong>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

    </div>
</div>
