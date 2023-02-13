<div>
<!-- Content Row -->
<div class="row">

    <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
        <div class="mb-4 text-center text-md-right">
            <h5 class="font-weight-bold">ایجاد بنر</h5>
        </div>
        <hr>
        @include('admin.sections.errors')
        <form wire:submit.prevent="store_banner()" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form row">

                <div class="form-group col-md-3">
                    <label for="primary_image"> انتخاب تصویر </label>
                    <div class="custom-file">
                        <input wire:model.lazy="image"
                        type="file" class="form-control form-control-sm my-2">
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <label for="title">عنوان</label>
                    <input wire:model.lazy="title" class="form-control" type="text">
                </div>

                <div class="form-group col-md-3">
                    <label for="text">متن</label>
                    <input wire:model.lazy="text" class="form-control" type="text">
                </div>

                <div class="form-group col-md-3">
                    <label for="priority">الویت</label>
                    <input wire:model.lazy="priority" class="form-control" type="number">
                </div>

                <div class="form-group col-md-3">
                    <label for="is_active">وضعیت</label>
                    <select wire:model="is_active" class="form-control">
                        <option value="1">فعال</option>
                        <option value="0">غیرفعال</option>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="type">نوع بنر</label>
                    <input wire:model.lazy="type" class="form-control" type="text">
                </div>

                <div class="form-group col-md-3">
                    <label for="button_text">متن دکمه</label>
                    <input wire:model.lazy="button_text" class="form-control" type="text">
                </div>

                <div class="form-group col-md-3">
                    <label for="button_link">لینک دکمه</label>
                    <input wire:model.lazy="button_link" class="form-control" type="text">
                </div>

                <div class="form-group col-md-3">
                    <label for="button_icon">آیکون دکمه</label>
                    <input wire:model.lazy="button_icon" class="form-control" type="text">
                </div>


            </div>

            <button class="btn btn-outline-primary mt-5" type="submit">ثبت</button>
            <a href="{{ route('admin.banners.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
        </form>
    </div>

</div>
</div>
