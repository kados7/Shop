@extends('admin.layouts.admin')

@section('title')
 -افزودن تگ

@endsection

@section('content')

    <!-- Content Row -->
    <div class="row">
        @include('admin.sections.errors')
        <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white">
            <div class="mb-4">
                <h5 class="font-weight-bold">افزودن تگ</h5>
            </div>
            <hr>
            <form action="{{ route('admin.tags.store') }}" method="POST">
                @csrf

                <div class="form row">
                    <div class="form-group col-md-3">
                        <label for="name">نام</label>
                        <input class="form-control" id="name" name="name" type="text">
                    </div>
                </div>

                <button class="btn btn-outline-primary mt-5" type="submit">ثبت</button>
                <a href="{{ route('admin.tags.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>

    </div>

@endsection
