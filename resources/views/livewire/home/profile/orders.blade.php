<div>
    <div class="row p-5">
        <div class="col-md-2">@include('home.profiles.aside')</div>

        <div class="col-md-10 py-3 px-5">
            <div>
                <span class="text-black h5"> سفارش های شما ({{$orders->total()}})</span>
            </div>

            @if ($orders->count() == 0)
                <div class="mt-4">
                    <span class="text-muted h6">هیچ سفارشی ثبت نشده است</span>
                </div>
            @else
            <div class="mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">تاریخ</th>
                            <th scope="col">وضعیت</th>
                            <th scope="col">کد تخفیف</th>
                            <th scope="col">جمع کل</th>
                            <th scope="col">عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order )
                        <tr>
                            <th scope="row">{{$order->id}}</th>
                            <td>{{verta($order->updated_at)->format('%d %B، %Y') }}</td>
                            <td class="{{$order->getRaworiginal('status') == 1 ? 'text-success' : 'text-danger'}}">{{$order->status}}</td>
                            <td>{{number_format($order->coupon_amount)}} تومان</td>
                            <td>{{number_format($order->paying_amount)}} تومان</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#order-item-{{$order->id}}">
                                    نمایش جزئیات
                                </button>
                            </td>
                        </tr>

                      @endforeach

                    </tbody>
                  </table>

            </div>

            @foreach ($orders as $order )

            <!-- Modal -->
            <div class="modal fade" id="order-item-{{$order->id}}" tabindex="-1" aria-labelledby="order-item-{{$order->id}}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> تصویر محصول </th>
                                        <th> نام محصول </th>
                                        <th> فی </th>
                                        <th> تعداد </th>
                                        <th> قیمت کل </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderItems as $item)
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="{{ route('home.products.show' , ['product' => $item->product->slug]) }}">
                                                    <img width="70" src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $item->product->primary_image) }}" alt="">
                                                </a>
                                            </td>
                                            <td class="product-name"><a href="{{ route('home.products.show' , ['product' => $item->product->slug]) }}"> {{ $item->product->name }} </a></td>
                                            <td class="product-price-cart"><span class="amount">
                                                    {{ number_format($item->price) }}
                                                    تومان
                                                </span></td>
                                            <td class="product-quantity">
                                                {{ $item->quantity }}
                                            </td>
                                            <td class="product-subtotal">
                                                {{ number_format($item->subtotal) }}
                                                تومان
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            @endif


        </div>
    </div>
</div>
