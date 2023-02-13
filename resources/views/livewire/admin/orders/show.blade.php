<div>
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">سفارش : {{ $order->id }}</h5>
            </div>
            <hr>

            <div class="row">
                <div class="form-group col-md-3">
                    <label>نام کاربر</label>
                    <input class="form-control" type="text"
                        value="{{ $order->user->name == null ? 'کاربر' : $order->user->name }}" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>کد کوپن</label>
                    <input class="form-control" type="text"
                        value="{{ $order->coupon_id == null ? 'استفاده نشده' : $order->coupon->name }}" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>وضعیت</label>
                    <input class="form-control" type="text" value="{{ $order->status }}" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>مبلغ</label>
                    <input class="form-control" type="text" value="{{ $order->total_amount }}" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>هزینه ارسال</label>
                    <input class="form-control" type="text" value="{{ $order->delivery_amount }}" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>مبلغ کد تخفیف</label>
                    <input class="form-control" type="text" value="{{ $order->coupon_amount }}" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>مبلغ پرداختی</label>
                    <input class="form-control" type="text" value="{{ $order->paying_amount }}" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>نوع پرداخت</label>
                    <input class="form-control" type="text" value="{{ $order->payment_type }}" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>وضعیت پرداخت</label>
                    <input class="form-control" type="text" value="{{ $order->payment_status }}" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>تاریخ ایجاد</label>
                    <input class="form-control" type="text" value="{{ verta($order->created_at) }}" disabled>
                </div>

                <div class="form-group col-md-12">
                    <label>آدرس</label>
                    <textarea rows="4" class="form-control" disabled>
                        {{ $order->address->address }}
                        کد پستی : {{ $order->address->postal_code }}
                         شماره تماس : {{ $order->address->cellphone }}
                         شهر  : {{ $order->address->city_id }} - {{ $order->address->province_id }}

                    </textarea>
                </div>

                @if ($transaction->getRawOriginal('status'))
                    <div class="col-md-12">
                        <hr>
                        <h5 class="text-danger">مشخصات تراکنش</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام کاربر</th>
                                    <th>شماره سفارش</th>
                                    <th>مبلغ</th>
                                    <th>ref_id</th>
                                    <th>نام درگاه پرداخت</th>
                                    <th>وضعیت</th>
                                    {{-- <th>عملیات</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>
                                        {{ $transaction->id}}
                                    </th>
                                    <th>
                                        {{ $transaction->user->name == null ? 'کاربر' : $transaction->user->name }}
                                    </th>
                                    <th>
                                        {{ $transaction->order_id }}
                                    </th>
                                    <th>
                                        {{ number_format($transaction->amount) }}
                                    </th>
                                    <th>
                                        {{ $transaction->ref_id }}
                                    </th>
                                    <th>
                                        {{ $transaction->geteway_name }}
                                    </th>
                                    <th>
                                        {{ $transaction->status }}
                                    </th>
                                    {{-- <th>
                                        <a class="btn btn-sm btn-outline-success"
                                            href="{{ route('admin.transactions.show', ['transaction' => $transaction->id]) }}">نمایش</a>
                                        <a class="btn btn-sm btn-outline-info mr-3"
                                            href="{{ route('admin.transactions.edit', ['transaction' => $transaction->id]) }}">ویرایش</a>
                                    </th> --}}
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endif

                <div class="col-md-12">
                    <hr>
                    <h5 class="text-danger">محصولات</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped text-center">
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
                                            <a href="{{ route('admin.products.show', ['product' => $item->product->id]) }}">
                                                <img width="70"
                                                    src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $item->product->primary_image) }}"
                                                    alt="">
                                            </a>
                                        </td>
                                        <td class="product-name"><a
                                                href="{{ route('admin.products.show', ['product' => $item->product->id]) }}">
                                                {{ $item->product->name }} </a></td>
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
                </div>
            </div>

            <a href="{{ route('admin.orders.index') }}" class="btn btn-dark mt-5">بازگشت</a>

        </div>

    </div>
</div>
