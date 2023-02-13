<div>
    <!-- Content Row -->
    <div class="row ">
        <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white rounded">
            <div class="d-flex justify-content-between mb-4">
                <h5 class="font-weight-bold">لیست کوپن ها ({{$coupons->total()}})</h5>
                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.coupons.create') }}">
                    ایجاد کوپن
                </a>
            </div>

            <div>
                <table class="table table-hover table-bordered text-center">

                    <thead>
                        <tr>
                            <th>id</th>
                            <th>نام</th>
                            <th>کد</th>
                            <th>نوع</th>
                            <th>مبلغ</th>
                            <th>درصد</th>
                            <th>بیشترین مبلغ</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
            <!--  ForEach For Parents -->

                    @foreach ($coupons as $coupon )
                    <tr>
                        <th>
                            {{$coupon->id}}
                        </th>
                        <th>
                            <span>{{$coupon->name}}</span>
                        </th>
                        <th>
                            <span>{{$coupon->code}}</span>
                        </th>
                        <th>
                            <span>{{$coupon->type}}</span>
                        </th>
                        <th>
                            <span>{{$coupon->amount}}</span>
                        </th>
                        <th>
                            <span>{{$coupon->percentage}}</span>
                        </th>
                        <th>
                            <span>{{$coupon->max_percentage_amount}}</span>
                        </th>
                        <th>
                            <span>{{$coupon->expired_at}}</span>
                        </th>
                        <th>
                            <a class="btn btn-sm btn-outline-info mr-3" href="{{route('admin.coupons.edit',['coupon'=>$coupon->id])}}">ویرایش</a>
                            <button wire:click="delete_coupon({{$coupon->id}})" class="btn btn-sm btn-danger mr-3"">حذف</button>
                        </th>
                    </tr>

                    @endforeach
            <!-- End ForEach For parents -->

                    </tbody>
                </table>
            </div>
        </div>
</div>
