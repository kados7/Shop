<div>
    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">ایجاد پرمیژن</h5>
            </div>
            <hr>

            @include('admin.sections.errors')

            <form wire:submit.prevent="storePermission()" method="POST">
                @csrf

                <div class="form row">
                    <div class="form-group col-md-3">
                        <label for="name">نام</label>
                        <input wire:model="name" class="form-control" name="name" type="text">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="name">توانایی</label>
                        <input wire:model="ability" class="form-control" name="ability" type="text">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="name">توضیحات</label>
                        <textarea wire:model="description" class="form-control" name="description" type="text"></textarea>
                    </div>
                </div>

                <button class="btn btn-outline-primary mt-5" type="submit">ثبت</button>
                <a href="{{ route('admin.permissions.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>

    </div>
</div>
