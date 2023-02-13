<div>
    <div class="banners-container m-2 vh-100">

        <div class="one bg-primary"    style="background-image: url('{{url(env('BANNER_IMAGES_UPLOAD_PATH')).'/'.$main_banners[0]['image']}}')">
            <a class="btn" href="{{$main_banners[0]['button_link']}}">{{$main_banners[0]['button_text']}}</a>
        </div>

        <div class="two bg-danger"     style="background-image: url('{{url(env('BANNER_IMAGES_UPLOAD_PATH')).'/'.$main_banners[1]['image']}}')">
            <a class="btn" href="{{$main_banners[1]['button_link']}}">{{$main_banners[1]['button_text']}}</a>
        </div>

        <div class="three bg-success"  style="background-image: url('{{url(env('BANNER_IMAGES_UPLOAD_PATH')).'/'.$main_banners[2]['image']}}')">
            <a class="btn" href="{{$main_banners[2]['button_link']}}">{{$main_banners[2]['button_text']}}</a>
        </div>

        <div class="four bg-warning"   style="background-image: url('{{url(env('BANNER_IMAGES_UPLOAD_PATH')).'/'.$main_banners[3]['image']}}')">
            <a class="btn" href="{{$main_banners[3]['button_link']}}">{{$main_banners[3]['button_text']}}</a>
        </div>

        <div class="five bg-secondary" style="background-image: url('{{url(env('BANNER_IMAGES_UPLOAD_PATH')).'/'.$main_banners[4]['image']}}')">
            <a class="btn" href="{{$main_banners[0]['button_link']}}">{{$main_banners[4]['button_text']}}</a>
        </div>

    </div>

</div>
