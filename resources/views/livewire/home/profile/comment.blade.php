<div>
    <div class="row p-5">
        <div class="col-md-2">@include('home.profiles.aside')</div>

        <div class="col-md-10 py-3 px-5">
            <div>
                <span class="text-black h5">لیست نظرات شما</span>
            </div>
            @if (auth()->user()->comments->count() == 0)
                <div class="mt-4">
                    <span class="text-muted h6">هیچ نظری ثبت نشده است</span>
                </div>
            @else
            <div class="mt-4">
                <span class="text-black h6">دیدگاه های شما ({{$comments->total()}})</span>

                @foreach ($comments as $comment )
                <div class="row my-5">
                    <div class="col-md-2">
                        <a href="{{url('product/'.$comment->product->slug)}}">
                            <img width="100%" src="{{url(env('PRODUCT_IMAGES_UPLOAD_PATH')).'/'.$comment->product->primary_image}}">
                        </a>
                    </div>
                    <div class="col-md-7">
                        <div class="mb-2">
                            <a href="{{url('product/'.$comment->product->slug)}}" class="btn btn-outline-success">{{$comment->product->name}}</a>
                        </div>

                        <h6 class="text-black">{{$comment->title}}</h6>
                        <div class="d-flex flex-row my-2">
                            <span class="text-muted ms-2" style="font-size:12px ; background:#F5F5F5">{{$comment->user->name}}</span>
                            <span class="text-muted ms-2" style="font-size:12px"> کاربر سجاد استایل </span>
                            <span class="text-muted mx-2" style="font-size:12px">{{$comment->created_at->diffForHumans()}}</span>
                            <span class="text-muted mx-2 rounded px-1" style="font-size:12px ; background:#F5F5F5">خریدار</span>
                        </div>
                        <div class="my-3">
                            <p>{{$comment->text}}</p>
                        </div>
                    </div>
                    <div class="col-md-3 text-start">
                        <div>

                            @if ($comment->is_recommended == 1)
                                <span style="font-size:12px ; color:#16D39A"> خرید این محصول را پیشنهاد می‌کنم </span>
                                <span style="font-size:12px ; color:#16D39A">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                        <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
                                    </svg>
                                </span>
                            @else
                                <span style="font-size:12px ; color:#FFA87D">از خرید این محصول مطمئن نیستم</span>
                                <span style="font-size:12px ; color:#FFA87D">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-lg" viewBox="0 0 16 16">
                                        <path d="M7.005 3.1a1 1 0 1 1 1.99 0l-.388 6.35a.61.61 0 0 1-1.214 0L7.005 3.1ZM7 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z"/>
                                    </svg>
                                </span>
                            @endif

                        </div>

                        <div class="mt-3">
                            <span  style="font-size:13px">XXL</span>
                            <span class="text-muted" style="font-size:14px">: سایز</span>
                        </div>
                    </div>
                </div>
                <hr class="my-3">
            @endforeach
            </div>

            @endif


        </div>
    </div>
</div>
