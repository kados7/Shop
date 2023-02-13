<div>
    <!-- Content Row -->
    <div class="row ">
        <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white rounded">
            <div class="d-flex justify-content-between mb-4">
                <h5 class="font-weight-bold">لیست سفارش ها ({{$orders->total()}})</h5>
            </div>

            <div>
                <table class="table table-hover table-bordered text-center">

                    <thead>
                        <tr>
                            <th>id</th>
                            <th>کاربر</th>
                            <th>تاریخ</th>
                            <th>وضعیت پرداخت</th>
                            <th>تخفیف</th>
                            <th>مبلغ کل</th>
                            <th>نوع پرداخت</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
            <!--  ForEach For Parents -->

                    @foreach ($orders as $order )
                    <tr>
                        <th>
                            {{$order->id}}
                        </th>
                        <th>
                            <span>{{$order->user->name}}</span>
                        </th>
                        <th>
                            <span>{{verta($order->updated_at)->format('%d %B، %Y') }}</span>
                        </th>
                        <th>
                            <span>{{$order->status}}</span>
                        </th>
                        <th>
                            <span>{{number_format($order->coupon_amount)}} تومان</span>
                        </th>
                        <th>
                            <span>{{number_format($order->paying_amount)}} تومان</span>
                        </th>
                        <th>
                            <span>{{$order->payment_type}}</span>
                        </th>

                        <th>

                            <a class="btn btn-sm btn-outline-info mr-3" href="{{route('admin.orders.show',['order'=>$order->id])}}">مشاهده</a>
                            {{-- <button wire:click="delete_coupon({{$coupon->id}})" class="btn btn-sm btn-danger mr-3"">حذف</button> --}}
                        </th>
                    </tr>

                    @endforeach
            <!-- End ForEach For parents -->

                    </tbody>
                </table>
            </div>
        </div>
</div>
