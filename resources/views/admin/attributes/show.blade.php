@extends('admin.layouts.admin')

@section('title')
    نمایش ویژگی - {{ $attribute->name }}
@endsection

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white">
            <div class="mb-4">
                <h5 class="font-weight-bold">ویژگی : {{ $attribute->name }}</h5>
            </div>
            <hr>

            <div class="row">
                <div class="form-group col-md-3">
                    <label>نام</label>
                    <input class="form-control" type="text" value="{{ $attribute->name }}" disabled>
                </div>

                <div class="form-group col-md-3">
                    <label>تاریخ ایجاد</label>
                    <input class="form-control" type="text" value="{{ verta($attribute->created_at) }}" disabled>
                </div>

            </div>

            <a href="{{ route('admin.attributes.index') }}" class="btn btn-dark mt-5">بازگشت</a>

        </div>

    </div>

@endsection
