<div>
    <div class="row p-5">
        <!-- Right Side -->
        @include('admin.sections.errors')

        <div class="col-md-7">
            <!-- Coupon -->
            <div>
                <form wire:submit.prevent="submit_coupon()">
                <lable class="text-black my-3 h6">کد تخفیف دارید ؟</lable><br>
                <input wire:model.defer="coupon_code" class="col-md-9 mx-5" type="text" placeholder="کد تخفیف را وارد کنید">
                <button class="btn btn-sm">ثبت</button>
                </form>
                @if ($coupon_message)
                    <div class="alert alert-warning" role="alert">
                        تخفیف اعمال شد
                    </div>
                @endif
            </div>
             <!-- Address -->
            <h1 class="text-black my-3 h6">انتخاب آدرس</h1>
            @foreach ($addresses as $user_address)
                <div class="row p-2 mx-5 my-2 border rounded">
                    <div class="col-md-1">
                        <span class="text-muted" style="font-size: 9px">انتخاب</span>
                        <input wire:model="select_address" value="{{$user_address->id}}" class="form-check-input" type="radio">
                    </div>
                    <div class="col-md-7">
                        <h6 class="text-black">{{$user_address->title}}</h6>
                        <div class="my-3">
                            {{$user_address->province->title}} -
                            {{$user_address->city->title}} -
                            <p>{{$user_address->address}}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <span class="text-muted">کد پستی : </span>
                        <span>{{$user_address->postal_code}}</span><br>

                        <span class="text-muted"> شماره تماس : </span>
                        <span>{{$user_address->cellphone}}</span><br>
                    </div>
                </div>
            @endforeach

            <!-- Add new Address -->
            <div class="d-flex flex-row">
                <button wire:click="$toggle('submit_new_address_area')" class="btn btn-sm btn-outline-danger mx-5">
                  افزودن آدرس جدید
              </button>
          </div>
            <div class="row p-5">
                @if ($submit_new_address_area)
                <span class="text-black h6">آدرس جدید</span>
                @include('admin.sections.errors')

                    <form wire:submit.prevent="submit_new_address()">
                        <div class="form row">
                            <div class="form-group col-md-4 mb-3">
                                <label for="name">عنوان</label>
                                <input wire:model.defer="title" type="text"
                                        class="form-control" placeholder="منزل ، محل کار یا ...">
                            </div>
                            <div class="form-group col-md-4 mb-3">
                                <label for="name">شماره تماس</label>
                                <input wire:model.defer="cellphone" type="text"
                                        class="form-control">
                            </div>
                            <div class="form-group col-md-4 mb-3">
                                <label for="postal_code">کد پستی</label>
                                <input wire:model.defer="postal_code" type="number"
                                        class="form-control">
                            </div>
                            <div class="form-group col-md-3 mb-3">
                                <label for="province_id">استان</label>
                                <select wire:model.lazy="province_id"class="form-control">
                                    <option>استان</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{$province->id}}">{{$province->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3 mb-3">
                                <label for="city_id">شهر</label>
                                <select wire:model.lazy="city_id"class="form-control">

                                    @foreach ($cities as $city)
                                        <option value="{{$city->id}}">{{$city->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-12 mb-3">
                                <label for="address">آدرس</label>
                                <textarea wire:model="address"
                                        class="form-control" ></textarea>
                            </div>


                        </div>
                        <button type="submit" class="btn btn-sm btn-danger">ذخیره</button>
                    </form>
                    <hr class="my-3">
                @endif
            </div>

        </div>
        <div class="col-md-5 border rounded p-2">
            @if ( \Cart::isEmpty())
                <span class="text-black p-2">
                    سبد خرید شما خالی است.
                </span>
            @else
            @foreach (\Cart::getContent() as $item)
                <div class="row position-relative rounded align-items-center p-1 my-2" >
                    <div class="col-md-1">
                        <a href="{{url('product').'/'.$item->associatedModel->slug}}">
                            <img width="50px" src="{{url(env('PRODUCT_IMAGES_UPLOAD_PATH')).'/'.$item->associatedModel->primary_image}}">
                        </a>
                    </div>
                    <div class="col-md-5">
                        <div class="mx-2">
                            <span style="font-size:13px;color:black"">{{$item->name}}</span>
                            <span style="font-size:12px">{{\App\Models\Attribute::findOrFail($item->attributes->attribute_id)->name}}</span>
                            <span style="font-size:12px">{{$item->attributes->value}}</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <span class="text-black" style="font-size:14px">{{$item->quantity}} عدد</span>
                    </div>
                    <div class="col-md-3">
                        <span class="text-black" style="font-size:14px">{{number_format($item->price * $item->quantity)}} تومان</span><br>
                    </div>

                </div>

            @endforeach
            <!-- Price / Sale_Price / Total_Price -->
                <hr>
                @php
                    $total_price_amount=0;
                    foreach(\Cart::getContent() as $item){
                        $total_price_amount +=$item->quantity * $item->attributes->price ;
                    }

                    $total_sale_amount=0;
                    foreach(\Cart::getContent() as $item){
                        if($item->attributes->sale_price){
                            $total_sale_amount +=$item->quantity * ($item->attributes->price - $item->attributes->sale_price) ;
                        }
                    }
                @endphp
                <div class="d-flex flex-row justify-content-between px-5">
                    <div>
                        <span style="font-size:16px; color:#F04D7D">مجموع تخفیف ها</span><br>
                        @if ($coupon_amount)
                            <span style="font-size:16px; color:red">کد تخفیف</span><br>
                        @endif
                        <span class="text-black" style="font-size:18px">مبلغ نهایی</span><br>

                    </div>

                    <div>
                        <span style="font-size:16px; color:#F04D7D">{{number_format(($total_sale_amount))}} تومان</span><br>
                        @if ($coupon_amount)
                            <span style="font-size:16px; color:red">{{number_format(($coupon_amount))}} تومان</span><br>
                        @endif
                        <span class="text-black" style="font-size:18px">{{number_format(\Cart::getTotal() - $coupon_amount)}} تومان</span><br>
                    </div>
                </div>
                <hr>
                <div class="my-3">
                    <h6> انتخاب روش پرداخت :</h6>
                    <input wire:model="peyment_method" value="pay" class="form-check-input" type="radio">
                    <span>زرین پال</span>


                </div>
                <div>
                    <form method="POST" action="{{route('home.payment.index')}}">
                        @csrf
                        <input type="hidden" name="payment_method" value="{{$peyment_method}}">
                        <input type="hidden" name="address_id" value="{{$select_address}}">
                    <button type="submit" class="btn btn-lg px-4 my-3" style="background: #EF5A88 ; color:white ; border-radius:0px">
                        ثبت سفارش
                    </button>
                    </form>

                </div>

            @endif
        </div>
    </div>
</div>
