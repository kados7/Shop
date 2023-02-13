<div>

<div style="background: #D2451E;">
    <div class="container">
        <div class="row px-5 pt-5">
            <div class="col-8">
                <div class="d-flex flex-column bd-highlight">
                    <div class="mb-auto py-5 bd-highlight text-white">
                        <h1>{{$cover1->title}}</h1>
                        <h3>{{$cover1->text}}</h3>

                    </div>
                    <div class="p-2 bd-highlight text-white my-4">
                        <a href="{{$cover1->button_link}}" class="btn" target="_blank">
                            <strong>{{$cover1->button_text}}</strong>
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                              </svg>
                        </a>
                    </div>
                  </div>
            </div>
            <div class="col-4">
                <img height="350px" class="mt-5" src="{{url(env('BANNER_IMAGES_UPLOAD_PATH')).'/'.$cover1->image}}">
            </div>
        </div>
    </div>

</div>
<div style="background: #7E2912">
    <nav    class="container d-flex flex-row align-items-center text-white"
            style="font-family: 'Trebuchet MS', sans-serif; font-size:18px ; height:70px ">
        <span class="mx-2">سایر برند ها :</span>
        @foreach ($brands as $brand )
            <a class="btn text-white" href="{{url($brand->slug)}}"><span class="mx-2">{{$brand->name}}</span></a>
        @endforeach

    </nav>
</div>

</div>
