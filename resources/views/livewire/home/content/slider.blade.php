<div>
    {{-- <div class="vh-100">
        <div id="slider_top" class="carousel slide carousel-fade" data-bs-ride="carousel" style="position: relative ; z-index-0">

            <div class="carousel-inner">
                @foreach ($sliders as $slider )
                    <div class="carousel-item {{$loop->last ? 'active': ' '}}">
                        <div class="d-block w-100 vh-100" style="background-size: cover ;background-image: url('{{url(env('BANNER_IMAGES_UPLOAD_PATH')).'/'.$slider->image}}')">
                            <div class="row h-100 m-5 align-items-center" >
                                <div class="col-md-6 " >
                                    <div class="d-flex flex-column d-flex align-items-center m-5 p-3 col-md-6 border rounded" style="background: #DBD7CE">
                                        <h5 style="font-family: IRANSANSWEB ; color:black">{{$slider->title}}</h5>
                                        <p  style="font-family: IRANSANSWEB ; color:black">{{$slider->text}}</p>
                                        <a href="{{$slider->button_link}}" target="_blank" class="col-md-12 btn" style="background : #E6B99A ;color:black">
                                            <span class="ms-5">{{$slider->button_text}}</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="mt-5 ">
                                        <button class="btn btn-sm btn-outline-primary" type="button" data-bs-target="#slider_top" data-bs-slide="next"> بعدی</button>
                                        <button class="btn btn-sm btn-outline-primary" type="button" data-bs-target="#slider_top" data-bs-slide="prev">قبلی</button>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

<br><br> --}}

    <div class="vh-100 ">
        <div id="slider_top" class="carousel slide carousel-fade" data-bs-ride="carousel" style="position: relative ; z-index-0">
            <div class="carousel-inner">
                @foreach ($sliders as $slider )
                    <div class="carousel-item {{$loop->last ? 'active': ' '}}">
                        <div class="d-block w-100 vh-100 p-5" style="background-size: cover ;background-image: url('{{url(env('BANNER_IMAGES_UPLOAD_PATH')).'/'.$slider->image}}')">
                            <div class="slider-grid-parent p-5 border">

                                <div class="div1"></div>
                                <div class="div2"></div>
                                <div class="div3"></div>
                                <div class="div4">
                                    <div  class="d-flex flex-column align-items-center border p-4 mx-5" style="background:{{$slider->background}} ">
                                        <h5 style="font-family: IRANSANSWEB ; color:black">{{$slider->title}}</h5>
                                        <p  style="font-family: IRANSANSWEB ; color:black">{{$slider->text}}</p>
                                        <a href="{{$slider->button_link}}" target="_blank" class="col-md-12 btn" style="background : #E6B99A ;color:black">
                                            <span class="ms-5">{{$slider->button_text}}</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                            </svg>
                                        </a>
                                    </div><br><br>
                                </div>
                                <div class="div5"></div>
                                <div class="div6"></div>
                                <div class="div7 align-self-center justify-self-center mx-auto">
                                    <button class="btn btn-sm btn-outline-primary" type="button" data-bs-target="#slider_top" data-bs-slide="next"> بعدی</button>
                                    <button class="btn btn-sm btn-outline-primary" type="button" data-bs-target="#slider_top" data-bs-slide="prev">قبلی</button>
                                </div>
                                <div class="div8"></div>
                                <div class="div9"></div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
