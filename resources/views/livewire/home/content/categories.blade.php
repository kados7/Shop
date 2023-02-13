<div>
    <div class="row p-5" style="background: #F5F5F5">
        <div class="d-flex flex-row justify-content-center">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="btn btn-lg bnt-pills active" id="pills-mens-tab" data-bs-toggle="pill" data-bs-target="#Mens" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                        مردانه
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="btn btn-lg bnt-pills" id="pills-women-tab" data-bs-toggle="pill" data-bs-target="#Womens" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                        زنانه
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="btn btn-lg bnt-pills" id="pills-children-tab" data-bs-toggle="pill" data-bs-target="#Children" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                        بچگانه
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="Mens" role="tabpanel" aria-labelledby="pills-mens-tab">
                <div class="position-relative">
                    <img class="pill-img my-2 mx-1" width="100%" src="{{url(env('BANNER_IMAGES_UPLOAD_PATH').'/'.$category_banners1->first()->image)}}">
                    <span class="pill-img position-absolute bottom-0 end-0 p-3 bg-white">{{$category_banners1->first()->button_text}}</span>
                </div>
                <div class="d-flex flex-row">
                    @foreach ($category_banners1 as $category_banner)
                            @if ($loop->first) @continue @endif
                            <span class="position-relative  mx-1">
                                <img class="pill-img" width="100%" src="{{url(env('BANNER_IMAGES_UPLOAD_PATH').'/'.$category_banner->image)}}">
                                <span class="pill-img position-absolute bottom-0 end-0 p-3 bg-white">{{$category_banner->button_text}}</span>
                            </span>
                    @endforeach
                </div>

            </div>
            <div class="tab-pane fade" id="Womens" role="tabpanel" aria-labelledby="pills-women-tab">
                <div class="position-relative">
                    <img class="pill-img my-2 mx-1" width="100%" src="{{url(env('BANNER_IMAGES_UPLOAD_PATH').'/'.$category_banners2->first()->image)}}">
                    <span class="pill-img position-absolute bottom-0 end-0 p-3 bg-white">{{$category_banners2->first()->button_text}}</span>
                </div>
                <div class="d-flex flex-row">
                    @foreach ($category_banners2 as $category_banner)
                            @if ($loop->first) @continue @endif
                            <span class="position-relative  mx-1">
                                <img class="pill-img" width="100%" src="{{url(env('BANNER_IMAGES_UPLOAD_PATH').'/'.$category_banner->image)}}">
                                <span class="pill-img position-absolute bottom-0 end-0 p-3 bg-white">{{$category_banner->button_text}}</span>
                            </span>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="Children" role="tabpanel" aria-labelledby="pills-children-tab">
                piiil children

            </div>
        </div>
    </div>


</div>
