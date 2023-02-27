<div>
    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white">
            <div class="d-flex flex-row mb-4">
                <div class="col-md-2 mx-2">
                    <div class="card">
                        <img class="card-img-top"
                         src="{{url(env('POST_THUMBNAILS_UPLOAD_PATH')).'/'.$post->thumbnail}}"
                            alt="{{ $post->title }}">
                    </div>
                </div>
                <h5 class="font-weight-bold">{{ $post->title }}</h5>
            </div>
            <hr>

            <div class="row">
                <div class="form-group col-md-3">
                    <label>نام</label>
                    <input class="form-control" type="text" value="{{ $post->title }}" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>موضوع</label>
                    <input class="form-control" type="text" value="{{ $post->category->name }}" disabled>
                </div>

                <div class="form-group col-md-3">
                    <label>وضعیت</label>
                    <input class="form-control" type="text" value="{{ $post->is_active }}" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>تاریخ ایجاد</label>
                    <input class="form-control" type="text" value="{{ $post->created_at->diffForHumans() }}" disabled>
                </div>
                {{-- <div class="form-group col-md-12">
                    <label>تگ ها</label>
                    <input class="form-control" type="text" value="@foreach ($tags as $tag ){{$tag->name}} {{$loop->last? '': ','}} @endforeach" disabled>
                </div> --}}
                <div class="form-group col-md-12 py-3 px-5">
                    {{ $post->body }}
                </div>
            </div>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-dark mt-5">بازگشت</a>

        </div>

    </div>
</div>
