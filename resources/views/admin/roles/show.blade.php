@extends('admin.layouts.admin')

@section('title')
   نقش {{$role->name}}
@endsection

@section('content')
    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold"> نمایش نقش {{ $role->name }}</h5>
            </div>
            <hr>

            @include('admin.sections.errors')

            <form action="{{ route('admin.roles.store') }}" method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="name">نام</label>
                        <input class="form-control" name="name" disabled type="text" value="{{ $role->name }}">
                    </div>

                    <div class="accordion col-md-12 mt-3" id="accordionPermission">
                        <div class="card">
                            <div class="card-header p-1" id="headingOne">
                                <h6 class="mb-0">
                                        مجوز های دسترسی
                                </h6>
                            </div>

                                <div class="card-body row">
                                    @foreach ($role->permissions as $permission)
                                        <div class="col-md-3">
                                            <span>{{ $permission->name }}</span>
                                        </div>
                                    @endforeach
                                </div>
                        </div>
                    </div>
                </div>

                <a href="{{ route('admin.roles.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>

    </div>
@endsection
