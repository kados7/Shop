<div>
    <div class="container">
        <div class="row border p-3">
            <div class="col-md-3 p-3">
                <img width="200px" src="{{url(env('POST_THUMBNAILS_UPLOAD_PATH')).'/'. $post->thumbnail}}">
                <li>منتشر شده در {{$post->created_at->diffForHumans()}}</li>
                <li>توسط {{$post->user->name}}</li>
                <li>موضوع {{$post->category->name}}</li>
            </div>
            <div class="col-md-9 p-3">
                <div>
                    <a class="btn" href="/post/{{$post->slug}}">{{$post->title}}</a>
                </div>
                <div class="my-2 p-2">
                    {{$post->body}}
                </div>
            </div>
        </div>
    </div>
</div>
