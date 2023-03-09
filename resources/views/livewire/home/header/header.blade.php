<div>
    {{-- <nav class="d-flex flex-row justify-content-around z-1" style="background:#EFEFF0">
        <a class="text-decoration-none small" style="color: #6D6D6D" href="#">Help and contact</a>
        <a class="text-decoration-none small" style="color: #6D6D6D" href="#">Help and contact</a>
        <a class="text-decoration-none small" style="color: #6D6D6D" href="#">Help and contact</a>
    </nav> --}}
{{-- <div class="vh-100" style="background-size: cover; background-image:url('http://127.0.0.1:8000/storage/images/banner/1672958953-kids1.jpg')"> --}}
        <header class="d-flex flex-row justify-content-around mt-1">
            <!-- Profile + BAG + Like + Notification -->
            <div class="col-md-3 d-flex flex-row align-items-center" >
                <!-- Notification -->
                @if (auth()->check())
                    <div class="position-relative">
                        <div class="nav-item dropdown no-arrow mx-1 me-3">
                            <div class="nav-item dropdown no-arrow">
                                <a class="dropdown-toggle nav-link" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                    </svg>
                                    <span class="position-absolute top-0 start-100 translate-middle bg-danger badge rounded-pill">
                                        <span style="font-size:12px ; color:white">
                                            + {{auth()->user()->unreadNotifications()->count()}}
                                        </span>
                                    </span>
                                </a>
                                <div class="dropdown-menu" style="width:300px; border-color:black; border-radius:0px">
                                    <h6 class="dropdown-header">مرکز پیام</h6>
                                    @foreach ( auth()->user()->unreadNotifications as $unreadNotification )
                                    {{-- {{dd($notification->id)}} --}}
                                        <div class="dropdown-item d-flex justify-content-start align-items-center mt-1" style="background:rgba(231, 231, 231, 0.432) ">
                                            <a class="dropdown-item d-flex justify-content-start align-items-center" href="{{$unreadNotification->data['link']}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                                </svg>
                                                <div class="text-end mx-3">
                                                    <span style="font-size:11px ; color:rgb(255, 0, 0)">{{$unreadNotification->created_at->diffForHumans()}}</span>
                                                    <p style="font-size:13px ; color:black">{{$unreadNotification->data['message']}}</p>
                                                </div>
                                            </a>

                                        </div>
                                    @endforeach
                                    @if (auth()->user()->unreadNotifications()->count() != 0)
                                        <button wire:click.defer="allNotificationsReaded()" type="button" class="btn btn-sm"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="فهمیدم همشونو پاک کن !">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                                                <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                                                <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                                            </svg>
                                        </button>
                                        @endif
                                        <a class="dropdown-item text-center small text-gray-500" href="#">نمایش تمامی پیام ها</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- BAG -->
                <div class="position-relative">
                    <a class="btn btn-sm dropdown " data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                            <path d="M8 1a2 2 0 0 1 2 2v2H6V3a2 2 0 0 1 2-2zm3 4V3a3 3 0 1 0-6 0v2H3.36a1.5 1.5 0 0 0-1.483 1.277L.85 13.13A2.5 2.5 0 0 0 3.322 16h9.355a2.5 2.5 0 0 0 2.473-2.87l-1.028-6.853A1.5 1.5 0 0 0 12.64 5H11zm-1 1v1.5a.5.5 0 0 0 1 0V6h1.639a.5.5 0 0 1 .494.426l1.028 6.851A1.5 1.5 0 0 1 12.678 15H3.322a1.5 1.5 0 0 1-1.483-1.723l1.028-6.851A.5.5 0 0 1 3.36 6H5v1.5a.5.5 0 1 0 1 0V6h4z"/>
                        </svg>
                        @if (! \Cart::isEmpty())
                            <span class="position-absolute top-0 start-100 translate-middle bg-black badge rounded-pill">
                                <span style="font-size:12px ; color:white">
                                    {{\Cart::getContent()->count()}}
                                </span>
                            </span>
                        @endif
                    </a>
                    <div class="dropdown-menu p-1 text-end" style="width:400px; border-color:black; border-radius:0px">
                        @if ( \Cart::isEmpty())
                            <span class="text-black p-2">
                                سبد خرید شما خالی است.
                            </span>
                        @else
                            <div class="d-flex flex-row justify-content-between p-2 my-1">
                                <span class="text-muted mx-2" style="font-size:14px"> {{\Cart::getContent()->count()}} کالا</span>
                                <a class="btn btn-sm" href="/cart" >مشاهده سبد خرید
                                    <svg class="text-primary" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                    </svg>
                                </a>
                            </div>
                            <hr>
                            @foreach (\Cart::getContent() as $item)
                                <div class="d-flex flex-row position-relative border-bottom p-2" >
                                    <button wire:click="delete_from_cart('{{$item->id}}')" type="button" class="btn-close btn-sm position-absolute top-0 start-0" aria-label="Close"></button>
                                    <a href="{{url('product').'/'.$item->associatedModel->slug}}">
                                        <img width="50px" src="{{url(env('PRODUCT_IMAGES_UPLOAD_PATH')).'/'.$item->associatedModel->primary_image}}">
                                    </a>
                                    <div class="mx-2">
                                        <a class="btn btn-sm" href="{{url('product').'/'.$item->associatedModel->slug}}">
                                            <span style="font-size:13px">{{$item->name}}</span>
                                        </a>
                                        <br>
                                        <span style="font-size:12px">{{\App\Models\Attribute::findOrFail($item->attributes->attribute_id)->name}}</span>
                                        <span style="font-size:12px">{{$item->attributes->value}}</span>
                                        <p style="font-size:11px">{{number_format($item->price)}} تومان</p>
                                    </div>
                                </div>
                            @endforeach
                            <div class="d-flex flex-row position-relative border-bottom p-2 justify-content-between" >
                                <div>
                                    <span style="color:black;font-size:12px">مبلغ قابل پرداخت :</span><br>
                                    <span style="color:#EF5A88;font-size:16px">{{number_format(\Cart::getTotal())}} تومان</span>
                                </div>
                                <a href="{{route('home.checkout.index')}}" class="btn btn-lg px-4" style="background: #EF5A88 ; color:white ; border-radius:0px">ثبت سفارش</a>
                            </div>

                        @endif

                    </div>
                </div>
                <!-- Profile -->

                <a class="btn btn-sm dropdown dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                    </svg>
                </a>
                <div class="dropdown-menu p-2 text-end" style="width:250px; border-color:black; border-radius:0px">
                    @auth
                        <span class="text-xs  font-bold uppercase">
                            خوش آمدید ، {{auth()->user()->name}}
                        </span>
                        <div class="dropdown-divider" style="background: #f5f2f3"></div>

                        <a class="dropdown-item" href="{{route('admin.dashboard.index')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                            </svg>
                            <span style="color: black ; font-size:14px">پنل مدیریت</span>
                        </a>



                        <a class="dropdown-item" href="{{route('home.user_profile.index')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                            </svg>
                            <span style="color: black ; font-size:14px">حساب کاربری</span>
                        </a>

                        <a class="dropdown-item" href="{{route('home.user_profile.orders')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                            </svg>
                            <span style="color: black ; font-size:14px">سفارش های من</span>
                        </a>

                        <a class="dropdown-item" href="{{route('home.user_profile.wishlist')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-suit-heart" viewBox="0 0 16 16">
                                <path d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z"/>
                            </svg>
                            <span style="color: black ; font-size:14px">لیست علاقه مندی ها</span>
                        </a>

                        <div class="dropdown-divider" style="background: #f5f2f3"></div>
                        <button class="dropdown-item" wire:click="logout">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                            </svg>
                            <span style="color: black ; font-size:14px">خروج از حساب کاربری</span>
                        </button>

                    @else
                     <h6>وارد حساب کاربری خود شوید</h6>
                     @include('admin.sections.errors')
                        <form method="POST" action="/login" class="px-4 py-3">
                            @csrf
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control"  placeholder="ایمیل">
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password"class="form-control" id="exampleDropdownFormPassword1" placeholder="پسورد">
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="dropdownCheck">
                                    <label class="form-check-label" for="dropdownCheck">
                                        مرا بخاطر داشته باش
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">ورود</button>
                        </form>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/register">ثبت نام</a>
                        <a class="dropdown-item" href="/forget">رمز عبور را فراموش کرده ام</a>
                    @endauth
                </div>

            </div>

            <!-- center Women Men Kids -->
            <div class="col-md-3 d-flex flex-row justify-content-center rounded">
                <a href="/" class="btn px-2 py-1 "><strong class="h5">فروشگاه</strong></a>
                <a href="/" class="btn px-2 py-1 mx-2 bg-black text-white"><strong class="h5">سجاد</strong></a>
                <a href="/" class="btn px-2 py-1  "><strong class="h5">استایل</strong></a>
            </div>

            <!-- Search -->

            <div class="col-md-3 text-center mt-1" role="search">
                <div class="search container">
                    <input wire:model="search_term" class="search input border-0" type="text" placeholder="جستوجو در میان محصولات">
                </div>
                <div class="position-relative" id="searchDiv">
                    <div class="position-absolute top-0 start-0 p-2 rounded" style="background: rgb(255, 255, 255) ;z-index:2">
                        @foreach ($searchProducts as $searchProduct)
                            <div class="d-flex flex-row p-2 mt-1" style="background: wheat">
                                <a class="mx-1" href="/product/{{$searchProduct->slug}}">
                                    <img class="rounded" width="70" src="{{url(env('PRODUCT_IMAGES_UPLOAD_PATH')).'/'.$searchProduct->primary_image}}">
                                </a>
                                <a class="mx-1 text-decoration-none text-black" href="/product/{{$searchProduct->slug}}">{{$searchProduct->name}}</a>
                            </div>
                        @endforeach
                        @if ($haveSearch)
                            <div>
                                <button wire:click="link_to_search_page()" href="{{route('home.search.index')}}" class="btn btn-sm my-1 btn-primary">
                                    جستجوی بیشتر
                                </button>
                            </div>
                        @endif
                        <div wire:loading>
                            <div class="d-flex align-items-center">
                                <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </header>
        {{-- Header Menu --}}
        @if (! request()->is('admin*'))
            <div class="d-flex flex-row justify-content-center" style="position: relative ; z-index:2">
                @foreach ($parent_categories as $parent_category)
                    <div class="p-2 bd-highlight">
                        <div>
                            <div class="dropdown">
                                <button class="dropbtn">{{$parent_category->name}}</button>
                                <div class="dropdown-content vw-100 p-3">
                                    <div class="dropdown-childeren d-flex flex-row text-center">
                                        @if(count($parent_category->children))
                                            @foreach($parent_category->children as $child_category)
                                            <div class="dropdown2 ">
                                                <button class="dropbtn2 btn btn-sm text-black">{{$child_category->name}}</button>
                                                <div class="dropdown-content2 vw-100 p-3 ">
                                                    <div class="dropdown-childeren2 row ">

                                                        <div class="col-md-3">
                                                            @foreach($child_category->children as $sub_category)
                                                                <li><a href="/main/{{$sub_category->slug}}">{{$sub_category->name}}</a></li>
                                                            @endforeach
                                                        </div>
                                                        <div class="col-md-3">
                                                        </div>


                                                        <div class="col-md-6">
                                                            <img height="300" src="{{url(env('CATEGORY_IMAGES_UPLOAD_PATH')).'/'.$child_category->icon}}">
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>

                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        @endif





</div>
