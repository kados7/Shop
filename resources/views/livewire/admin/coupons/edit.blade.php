<div>
    <div>
        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
                <div class="mb-4 text-center text-md-right">
                    <h5 class="font-weight-bold">ایجاد کوپن</h5>
                </div>
                <hr>
                @include('admin.sections.errors')
                <form wire:submit.prevent="update_coupon()" method="POST">
                    @csrf

                    <div class="form row">
                        <div class="form-group col-md-4">
                            <label for="name">نام کوپن</label>
                            <input wire:model.lazy="name" class="form-control" type="text">
                        </div>

                        <div class="form-group col-md-5">
                            <label for="code">کد</label>
                            <input wire:model.lazy="code" class="form-control" type="text">
                        </div>

                        <div class="form-group col-md-4 my-3">
                            <label for="type">نوع کوپن</label>
                            <select wire:model="type" class="form-control">
                                <option value="amount">مبلغی</option>
                                <option value="percentage">درصدی</option>
                            </select>
                        </div>
                        @if ($type == 'amount')
                            <div class="form-group col-md-5 my-3">
                                <label for="amount">مبلغ</label>
                                <input wire:model.lazy="amount" class="form-control" type="number">
                            </div>
                        @else
                            <div class="form-group col-md-3 my-3">
                                <label for="percentage">درصد</label>
                                <input wire:model.lazy="percentage" class="form-control" type="number">
                            </div>

                            <div class="form-group col-md-3 my-3">
                                <label for="max_percentage_amount">حداکثر مبلغ برای نوع درصدی</label>
                                <input wire:model.lazy="max_percentage_amount" class="form-control" type="number">
                            </div>
                        @endif


                        <div class="form-group col-md-4 my-3">
                            <label for="expired_at">تاریخ انقضا</label>
                            <input wire:model.lazy="expired_at" class="form-control" type="date">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="attribute"> توضیحات </label>
                            <textarea wire:model.lazy="description" class="form-control"></textarea>
                        </div>


                    </div>

                    <button class="btn btn-outline-primary mt-5" type="submit">ثبت</button>
                    <a href="{{ route('admin.coupons.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
                </form>
            </div>

        </div>
    </div>

</div>
