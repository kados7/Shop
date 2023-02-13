<div>
    {{-- {{dd($category_banners_type)}} --}}
    @foreach ( $category_banners_type as $category_banner_type)



    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="d-flex flex-column text-center flex-md-row justify-content-md-between mb-4">
                <h5 class="font-weight-bold mb-3 mb-md-0">لیست بنر دسته بندی ها ({{ $category_banner_type->total() }})</h5>
                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.banners.create') }}">
                    <i class="fa fa-plus"></i>
                    ایجاد بنر
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>تصویر</th>
                            <th>عنوان</th>
                            <th>متن</th>
                            <th>رنگ پس زمینه</th>
                            <th>الویت</th>
                            <th>وضعیت</th>
                            <th>نوع</th>
                            <th>متن دکمه</th>
                            <th>لینک دکمه</th>
                            <th>آیکون دکمه</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category_banner_type as $category_banner1)
                            <tr>
                                <th>
                                    {{ $category_banner1->id }}
                                </th>
                                <th>
                                    <a href="{{ url( env('BANNER_IMAGES_UPLOAD_PATH').$category_banner1->image ) }}" target="_blank">
                                        <img width="100px" src="{{ url( env('BANNER_IMAGES_UPLOAD_PATH').$category_banner1->image ) }}">
                                    </a>
                                </th>
                                <th>
                                    {{ $category_banner1->title }}
                                </th>
                                <th>
                                    {{ $category_banner1->text }}
                                </th>
                                <th>
                                    {{ $category_banner1->background }}
                                </th>
                                <th>
                                    {{ $category_banner1->priority }}
                                </th>
                                <th>
                                    <span
                                        class="{{ $category_banner1->getRawOriginal('is_active') ? 'text-success' : 'text-danger' }}">
                                        {{ $category_banner1->is_active }}
                                    </span>
                                </th>
                                <th>
                                    {{ $category_banner1->type }}
                                </th>
                                <th>
                                    {{ $category_banner1->button_text }}
                                </th>
                                <th>
                                    {{ $category_banner1->button_link }}
                                </th>
                                <th>
                                    {{ $category_banner1->button_icon }}
                                </th>

                                <th>
                                    <!-- Button trigger Delete-modal -->
                                    <button data-bs-toggle="modal" data-bs-target="#delete_modal-{{$category_banner1->id}}"
                                        class="btn btn-sm btn-outline-danger" type="button">حذف</button>
                                        <!-- Delete _ Modal -->
                                    <div class="modal fade" id="delete_modal-{{$category_banner1->id}}" tabindex="-1" aria-labelledby="delete_modal_lable" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"> مطمئن هستید ؟</h5>
                                                </div>
                                                    <div class="modal-body">
                                                        آیا میخواهید بنر {{$category_banner1->title}} را حذف کنید ؟
                                                    </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                                                <button wire:click="delete_banner({{$category_banner1->id}})" data-bs-dismiss="modal" type="button" class="btn btn-primary">ثبت تغییرات</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Edit Button -->
                                    <a class="btn btn-sm btn-outline-info mr-3 mt-2"
                                        href="{{ route('admin.banners.edit', ['banner' => $category_banner1->id]) }}">ویرایش</a>

                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- <div class="d-flex justify-content-center mt-5">
                {{ $banners->render() }}
            </div> --}}
        </div>
    </div>
    @endforeach

</div>
