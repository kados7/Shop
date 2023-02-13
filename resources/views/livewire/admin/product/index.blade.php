<div>
    <!-- Content Row -->
    <div class="row ">
        <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white rounded">
            <div class="d-flex justify-content-between mb-4">
                <h5 class="font-weight-bold">لیست محصولات ({{$products->total()}})</h5>
                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.products.create') }}">
                    <i class="fa fa-plus"></i>
                    ایجاد محصول جدید
                </a>
            </div>

            <div>
                <table class="table table-bordered table-striped text-center table-hover table-responsive">

                    <thead>
                        <tr>
                            <th>id</th>
                            <th>نام</th>
                            <th>برند</th>
                            <th>دسته بندی</th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th>
                                    {{ $product->id }}
                                </th>
                                <th>
                                    {{ $product->name }}
                                </th>
                                <th>
                                    {{ $product->brand->name }}
                                </th>
                                <th>
                                    {{ $product->category->name }}
                                </th>
                                <th>
                                    <span class="{{ $product->getRawOriginal('is_active') ? 'text-success' : 'text-danger' }}">
                                        {{ $product->is_active }}</span>

                                </th>

                                <th>
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-outline-success mx-1 rounded" href="{{ route('admin.products.show' , ['product' => $product->id]) }}">نمایش</a>
                                        <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle rounded" data-bs-toggle="dropdown" aria-expanded="false">
                                          عملیات
                                        </button>
                                        <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="{{route('admin.products.edit' , ['product'=> $product->id])}}"> ویرایش محصول </a></li>
                                          <li><a class="dropdown-item" href="{{route('admin.products.images_edit' , ['product'=> $product->id])}}"> ویرایش تصاویر </a></li>
                                          <li><a class="dropdown-item" href="{{route('admin.products.category_edit' , ['product'=> $product->id])}}"> ویرایش دسته بندی و ویژگی </a></li>
                                        </ul>
                                      </div>

                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $products->links() }}
    </div>
</div>
