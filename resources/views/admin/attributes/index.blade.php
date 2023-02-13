@extends('admin.layouts.admin')

@section('title')
    ویژگی ها
@endsection

@section('content')

    <!-- Content Row -->
    <div class="row ">
        <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white rounded">
            <div class="d-flex justify-content-between mb-4">
                <h5 class="font-weight-bold">لیست ویژگی ها ({{ $attributes->total() }})</h5>
                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.attributes.create') }}">
                    <i class="fa fa-plus"></i>
                    ایجاد ویژگی جدید
                </a>
            </div>

            <div>
                <table class="table table-bordered table-striped text-center">

                    <thead>
                        <tr>
                            <th>id</th>
                            <th>نام</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attributes as $attribute)
                            <tr>
                                <th>
                                    {{ $attribute->id }}
                                </th>
                                <th>
                                    {{ $attribute->name }}
                                </th>
                                <th>
                                    <a class="btn btn-sm btn-outline-success" href="{{ route('admin.attributes.show' , ['attribute' => $attribute->id]) }}">نمایش</a>
                                    <a class="btn btn-sm btn-outline-info mr-3" href="{{ route('admin.attributes.edit' , ['attribute' => $attribute->id]) }}">ویرایش</a>                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
