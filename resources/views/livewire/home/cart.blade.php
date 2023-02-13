<div>
    <div class="container p-5">

        @if ( \Cart::isEmpty())
            <span class="text-black p-2">
                سبد خرید شما خالی است.
            </span>
        @else
        <div wire:loading>

            <div class="d-flex align-items-center">
                <strong>Loading...</strong>
                <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
              </div>

        </div>
            @foreach (\Cart::getContent() as $item)
                <div class="row position-relative border rounded align-items-center p-1 my-2" >
                    <div class="col-md-2">
                        <button wire:click="delete_from_cart('{{$item->id}}')" type="button" class="btn-close btn-sm position-absolute top-0 start-0" aria-label="Close"></button>
                        <a href="{{url('product').'/'.$item->associatedModel->slug}}">
                            <img width="150px" src="{{url(env('PRODUCT_IMAGES_UPLOAD_PATH')).'/'.$item->associatedModel->primary_image}}">
                        </a>
                    </div>
                    <div class="col-md-3">
                        <div class="mx-2">
                            <span style="font-size:20px;color:black">{{$item->associatedModel->brand->name}}</span>
                            <br>
                            <span style="font-size:16px;color:black"">{{$item->name}}</span>
                            <br>
                            <span style="font-size:14px">{{\App\Models\Attribute::findOrFail($item->attributes->attribute_id)->name}}</span>
                            <span style="font-size:14px">{{$item->attributes->value}}</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mx-3">
                            <label>تعداد</label>
                            <input wire:model="cart_quantity.{{$item->id}}" style="width:50px ; border-radius:5px ; background:#ebebeb" type="number" min="1" max="{{$item->attributes->quantity}}"/>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <span class="text-muted" style="font-size:16px">قیمت :</span>
                        <br>
                        @if ($item->attributes->sale_price)
                            <span style="font-size:16px; color:#F04D7D">تخفیف  :</span>
                        @endif
                        <hr class="my-1">
                        <span class="text-black" style="font-size:18px">قیمت نهایی  :</span>
                    </div>
                    <div class="col-md-2">
                        <span class="text-muted" style="font-size:16px">{{number_format($item->attributes->price * $item->quantity)}} تومان</span>
                        <br>
                        @if ($item->attributes->sale_price)
                            <span style="font-size:16px; color:#F04D7D">{{number_format(($item->attributes->price - $item->attributes->sale_price)* $item->quantity)}} تومان</span><br>
                        @endif
                        <hr class="my-1">
                        <span class="text-black" style="font-size:18px">{{number_format($item->price * $item->quantity)}} تومان</span><br>
                    </div>
                </div>

            @endforeach
            <div class="row p-2 rounded" style="background:#f8f8f8">

                <div class="col-md-7"></div>
                <div class="col-md-2">
                    <span class="text-muted" style="font-size:16px">جمع کل سفارش :</span><br>
                    <span class="my-4" style="font-size:16px; color:#F04D7D">تخفیف محصول  :</span><br>

                    <hr class="my-1">
                    <span class="text-black" style="font-size:18px">قیمت نهایی  :</span>

                </div>
                <div class="col-md-2">
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
                    <span class="text-muted" style="font-size:16px">{{number_format($total_price_amount)}} تومان</span><br>
                    <span style="font-size:16px; color:#F04D7D">{{number_format(($total_sale_amount))}} تومان</span><br>

                    <hr class="my-1">
                    <span class="text-black" style="font-size:18px">{{number_format(\Cart::getTotal())}} تومان</span><br>
                    <a href="{{route('home.checkout.index')}}" class="btn btn-lg px-4 my-3" style="background: #EF5A88 ; color:white ; border-radius:0px">ثبت سفارش</a>

                </div>
            </div>
        @endif

    </div>
</div>
