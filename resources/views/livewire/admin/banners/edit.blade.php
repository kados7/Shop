<div>
    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-6 mb-4 p-4 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">ویرایش بنر</h5>
            </div>
            <hr>
            @include('admin.sections.errors')
            <form wire:submit.prevent="update_banner()" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form row">
                    <div class="form-group col-md-6 border rounded">
                        <label for="primary_image">تصویر بنر</label>
                        <div><img width="90%" src="{{url(env('BANNER_IMAGES_UPLOAD_PATH').$image)}}" class="my-3 rounded"></div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="primary_image">  انتخاب تصویر جدید </label>
                        <div class="custom-file">
                            <input wire:model.lazy="new_image"
                            type="file" class="form-control form-control-sm my-2">

                            <button wire:click="update_image()" class="btn btn-outline-primary mt-5" type="button"> ثبت تصویر جدید</button>

                        </div>
                        <div wire:loading>

                            <div class="d-flex align-items-center">
                                <strong>Loading...</strong>
                                <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
                              </div>

                        </div>

                    </div>
                    <div class="form-group col-md-3 bg-info p-2">
                        <label for="type">نوع بنر</label>
                        <input wire:model.lazy="type" class="form-control" type="text">
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
                        <label for="text">رنگ پس زمینه باکس</label>
                        <input wire:model.lazy="background" class="form-control" type="color">
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

                <button class="btn btn-outline-primary mt-5" type="submit"> ثبت اطلاعات</button>
                <a href="{{ route('admin.banners.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
                @if($is_updated)
                    <div class="alert alert-success my-2" role="alert">
                        تغییرات ثبت شد !
                    </div>
                @endif
            </form>
        </div>

    </div>
</div>
