@extends('admin.layouts.admin')

@section('title')
    دسته بندی ها
@endsection

@section('content')
    <!-- Content Row -->
    <div class="row ">
        <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white rounded">
            <div class="d-flex justify-content-between mb-4">
                <h5 class="font-weight-bold">لیست دسته بندی ها ({{$categories->total()}})</h5>
                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.categories.create') }}">
                    <i class="fa fa-plus"></i>
                    ایجاد دسته بندی
                </a>
            </div>

            <div>
                <table class="table table-hover table-bordered text-center">

                    <thead>
                        <tr>
                            <th>id</th>
                            <th>نام</th>
                            <th>نام انگلیسی</th>
                            <th>دسته بندی والد <small class="text-danger">(id)</small></th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
            <!--  ForEach For Parents -->

                    @foreach ($categories as $parent_category )
                    @if ($parent_category->parent_id == 0)
                    <tr class="table-danger">
                        <th>
                            {{$parent_category->id}}
                        </th>
                        <th>
                            <span class="text-primary">{{$parent_category->name}}</span>
                        </th>
                        <th>
                            <span class="text-primary">{{$parent_category->slug}}</span>
                        </th>
                        <th>
                            <span class="text-primary">والد ({{$parent_category->parent_id}})</span>
                        </th>

                        <th>
                            <span class="{{$parent_category->getRawOriginal('is_active') ? "text-success" : "text-danger" }}">{{$parent_category->is_active}}</span>

                        </th>

                        <th>
                            <a class="btn btn-sm btn-outline-success" href="{{route('admin.categories.show',['category'=>$parent_category->id])}}">نمایش</a>
                            <a class="btn btn-sm btn-outline-info mr-3" href="{{route('admin.categories.edit',['category'=>$parent_category->id])}}">ویرایش</a>
                        </th>
                    </tr>

            <!-- New ForEach For Childrens -->

                    @if ($parent_category->children)
                        @foreach ($parent_category->children as $child_category)
                            <tr class="table-warning">
                                <th>
                                    {{$child_category->id}}
                                </th>
                                <th>
                                    {{$child_category->name}}
                                </th>
                                <th>
                                    {{$child_category->slug}}
                                </th>
                                <th>
                                    @if($child_category->parent)
                                    {{$child_category->parent->name}} <small class="text-danger">({{$child_category->parent_id}})</small>
                                    @else
                                        <span class="text-primary">والد ({{$child_category->parent_id}})</span>

                                    @endif
                                </th>

                                <th>
                                    <span class="{{$child_category->getRawOriginal('is_active') ? "text-success" : "text-danger" }}">{{$child_category->is_active}}</span>

                                </th>

                                <th>
                                    <a class="btn btn-sm btn-outline-success" href="{{route('admin.categories.show',['category'=>$child_category->id])}}">نمایش</a>
                                    <a class="btn btn-sm btn-outline-info mr-3" href="{{route('admin.categories.edit',['category'=>$child_category->id])}}">ویرایش</a>
                                </th>
                            </tr>
                        <!-- New ForEach For Subcategory -->

                            @if ($child_category->children)
                                @foreach ($child_category->children as $sub_category )
                                    <tr class="table-light">
                                        <th>
                                            {{$sub_category->id}}
                                        </th>
                                        <th>
                                            {{$sub_category->name}}
                                        </th>
                                        <th>
                                            {{$sub_category->slug}}
                                        </th>
                                        <th>
                                            @if($sub_category->parent)
                                            {{$sub_category->parent->name}} <small class="text-danger">({{$sub_category->parent_id}})</small>
                                            @else
                                                <span class="text-primary">والد ({{$sub_category->parent_id}})</span>

                                            @endif
                                        </th>

                                        <th>
                                            <span class="{{$sub_category->getRawOriginal('is_active') ? "text-success" : "text-danger" }}">{{$sub_category->is_active}}</span>

                                        </th>

                                        <th>
                                            <a class="btn btn-sm btn-outline-success" href="{{route('admin.categories.show',['category'=>$sub_category->id])}}">نمایش</a>
                                            <a class="btn btn-sm btn-outline-info mr-3" href="{{route('admin.categories.edit',['category'=>$sub_category->id])}}">ویرایش</a>
                                        </th>
                                    </tr>
                                @endforeach
                            @endif
                        @endforeach
                    @endif
                @endif
            <!-- End ForEach For Childrens -->

                        @endforeach
            <!-- End ForEach For parents -->

                    </tbody>
                </table>
            </div>
        </div>
    @endsection
