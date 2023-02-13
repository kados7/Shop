@extends('admin.layouts.admin')

@section('title')
    برند ها
@endsection

@section('content')

    <!-- Content Row -->
    <div class="row ">
        <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white rounded">
            <div class="d-flex justify-content-between mb-4">
                <h5 class="font-weight-bold">لیست برند ها ({{ $brands->total() }})</h5>
                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.brands.create') }}">
                    <i class="fa fa-plus"></i>
                    ایجاد برند
                </a>
            </div>

            <div>
                <table class="table table-bordered table-striped text-center">

                    <thead>
                        <tr>
                            <th>id</th>
                            <th>نام</th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                            <tr>
                                <th>
                                    {{ $brand->id }}
                                </th>
                                <th>
                                    {{ $brand->name }}
                                </th>
                                <th>
                                    <span class="{{ $brand->getRawOriginal('is_active') ? 'text-success' : 'text-danger' }}">
                                        {{ $brand->is_active }}
                                    </span>
                                </th>
                                <th>
                                    <a class="btn btn-sm btn-outline-success" href="{{ route('admin.brands.show' , ['brand' => $brand->id]) }}">نمایش</a>
                                    <a class="btn btn-sm btn-outline-info mr-3" href="{{ route('admin.brands.edit' , ['brand' => $brand->id]) }}">ویرایش</a>                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
