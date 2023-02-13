<div>
    <div style="background: #1245B2;">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="d-flex flex-column bd-highlight">
                        <div class="mb-auto py-5 bd-highlight text-white">
                            <h1>Tommy Hilfiger</h1>
                            <h3>Our season to shine</h3>

                        </div>
                        <div class="p-2 bd-highlight text-white my-4">
                            <strong>Discover More</strong>  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                              </svg>
                        </div>
                      </div>
                </div>
                <div class="col-6">
                    <img class="mt-5" src="/storage/images/template/cover2.jpg">
                </div>
            </div>
        </div>

    </div>


    <div style="background: #0B296B;">

        <div id="cover2carouselControls" class="carousel slide " data-bs-ride="carousel">
            <div class="carousel-inner ">
                <div class="carousel-item active">
                    <div class="d-flex flex-row align-items-start justify-content-center my-5 ">
                        @foreach ($products as $product)
                        @if ($product->category->id == 5 and $loop->iteration <= 6)
                            <div class="card mx-1 border-0" style="width: 15%;">
                                <a href="/product/{{$product->slug}}">
                                    <img src="{{url(env('PRODUCT_IMAGES_UPLOAD_PATH')).'/'.$product->primary_image}}" class="card-img-top" alt="...">
                                </a>
                                <div class="card-body " style="background: #0B296B">
                                <h5 class="text-white">{{$product->name}}</h5>
                                <p class="card-text text-white">$</p>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex flex-row align-items-center justify-content-center my-5">

                        @foreach ($products as $product)
                        @if ( $product->category->id == 7 and $loop->iteration > 6 and $loop->iteration < 12)
                            <div class="card mx-1 border-0 " style="width: 15%;">
                                <a href="/product/{{$product->slug}}">
                                    <img src="{{url(env('PRODUCT_IMAGES_UPLOAD_PATH')).$product->primary_image}}" class="card-img-top" alt="{{$product->name}}">
                                </a>
                                <div class="card-body " style="background: #0B296B">
                                    <h5 class="card-title text-white">{{$product->name}}</h5>
                                    <p class="card-text text-white">$ {{$product->price}}</p>
                                </div>
                            </div>
                            @endif
                        @endforeach

                    </div>
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#cover2carouselControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon bg-black" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#cover2carouselControls" data-bs-slide="next">
              <span class="carousel-control-next-icon bg-black" aria-hidden="true"></span>
            </button>
        </div>

    </div>
</div>
