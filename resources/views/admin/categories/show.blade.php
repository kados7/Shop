@extends('admin.layouts.admin')

@section('title')
     دسته بندی - {{ $category->name }}
@endsection

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white">
            <div class="mb-4">
                <h5 class="font-weight-bold">نمایش دسته بندی : {{ $category->name }}</h5>
            </div>
            <hr>

            <div class="row">
                <div class="form-group col-md-3">
                    <label>نام</label>
                    <input class="form-control" type="text" value="{{ $category->name }}" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label> نام انگلیسی</label>
                    <input class="form-control" type="text" value="{{ $category->slug }}" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label> دسته بندی والد </label>
                    @if ($category->parent)
                        <input class="form-control" type="text" value="{{ $category->parent->name }}" disabled>
                    @else
                        <input class="form-control" type="text" value="والد" disabled>
                    @endif
                </div>

                <div class="form-group col-md-3">
                    <label>وضعیت</label>
                    <input class="form-control" type="text" value="{{ $category->is_active }}" disabled>
                </div>

                <div class="form-group col-md-3 my-3">
                    <label> آیکون </label>
                    <input class="form-control" type="text" value="{{ $category->icon }}" disabled>
                </div>

                <div class="form-group col-md-3 my-3">
                    <label>تاریخ ایجاد</label>
                    <input class="form-control" type="text" value="{{ verta($category->created_at) }}" disabled>
                </div>
                <div class="form-group col-md-6 my-3">
                    <label> توضیحات</label>
                    <textarea class="form-control" rows="5" disabled>{{ $category->description }}</textarea>
                </div>
                <hr>

                <div class="form-group col-md-6 my-3 p-2 rounded" style="background: #E8F0F8">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ویژگی ها :</th>
                            <th scope="col">ویژگی های فیلتر :</th>
                            <th scope="col">ویژگی متغیر :</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($category->attributes as $key => $attribute )
                            <tr>
                                <td>{{$key+1 }} - {{$attribute->name}}</td>
                                <td class="text-success"><strong>{{$attribute->pivot->is_filter ? '✓' : ''}}</strong></td>
                                <td class="text-success"><strong>{{$attribute->pivot->is_variation ? '✓' : ''}}</strong></td>
                            </tr>
                        @endforeach
                        </tbody>
                      </table>
                </div>
            </div>

            <a href="{{ route('admin.categories.index') }}" class="btn btn-dark mt-5">بازگشت</a>

        </div>

    </div>

@endsection
