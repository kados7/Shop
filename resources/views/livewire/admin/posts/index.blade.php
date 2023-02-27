<div>
    <div class="row ">
        <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white rounded">
            <div class="d-flex justify-content-between mb-4">
                {{-- <h5 class="font-weight-bold">لیست پست ها ({{$posts->total()}})</h5> --}}
                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.posts.create') }}">
                    ایجاد پست جدید
                </a>
            </div>

            <div>
                <table class="table table-bordered table-striped text-center table-hover table-responsive">

                    <thead>
                        <tr>
                            <th>id</th>
                            <th>نام</th>
                            <th>نویسنده</th>
                            <th>دسته بندی</th>
                            <th>تاریخ انتشار</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <th>
                                    {{ $post->id }}
                                </th>
                                <th>
                                    <a href="/post/{{$post->slug}}">{{ $post->title }}</a>
                                </th>
                                <th>
                                    {{ $post->user->name }}
                                </th>
                                <th>
                                    {{ $post->category->name }}
                                </th>
                                <th>
                                    {{ $post->created_at->diffForHumans() }}

                                </th>

                                <th>
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-outline-success mx-1 rounded" href="{{ route('admin.posts.show' , ['post' => $post->id]) }}">نمایش</a>

                                        <a class="btn btn-sm btn-info mx-1 rounded" href="{{route('admin.posts.edit' , ['post'=> $post->id])}}"> ویرایش محصول </a></li>

                                    </div>

                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $posts->links() }}
    </div>
</div>
