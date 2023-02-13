<div>
    <div class="row p-5">

        @if (!session()->get('compare'))
            <div class="alert alert-danger" role="alert">
                کالایی برای مقایسه وجود ندارد
            </div>
        @else


        <div class="table-responsive border">
            <table class="table table-striped fa-check text-successtable-border border-light">
              <thead class="border-light">
                <tr>
                    <th style="background: #e2d6d6"></th>
                    @foreach ($products as $product)
                        <th scope="col text-center">
                            <div class="position-relative">
                                <a href="{{url('/product').'/'.$product->slug}}">
                                    <img width="150px" src="{{url(env('PRODUCT_IMAGES_UPLOAD_PATH')).'/'.$product->primary_image}}">
                                </a>
                                <button wire:click="delete_from_compare({{$product->id}})"
                                    class="position-absolute top-0 end-0 btn-close" type="button" aria-label="Close">
                                </button>
                            </div>

                                <div class="mt-1">{{$product->name}}</div>
                                <div class="mt-1">{{$product->min_price_check->price}} تومان</div>
                                <div class="mt-1">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                    </svg>
                                </span>
                                {{$product->rates_avarage()}}
                        </th>
                    @endforeach
                </tr>




                <tr>
                        <th style="background: #e2d6d6">برند</th>
                    @foreach ($products as $product)
                        <th scope="col text-center">
                                <div class="mt-1">{{$product->brand->name}}</div>
                        </th>
                    @endforeach
                </tr>





                <tr>
                    <th style="background: #e2d6d6">مشخصات</th>
                        @foreach ($products as $product)
                        <th>
                            @if ($loop->first)
                                @foreach ($product->product_attributes as $product_attribute)
                                <div class="mt-2">
                                    <span class="ms-5 text-danger">{{$product_attribute->attribute->name}}:</span>
                                    <span>{{$product_attribute->value}}</span>
                                </div>
                                @endforeach
                            @else
                                @foreach ($product->product_attributes as $product_attribute)
                                <div class="mt-2">
                                    <span>{{$product_attribute->value}}</span>
                                </div>
                                @endforeach
                            @endif

                        </th>
                    @endforeach
                </tr>






                <tr>
                    <th style="background: #e2d6d6">
                        {{$product->product_variations->first()->attribute->name}}
                    </th>
                    @foreach ($products as $product)
                        <th>
                            @foreach ($product->product_variations as $product_variation)
                            <div class="mt-2 ">
                                <span>{{$product_variation->value}}</span>
                                <span class="text-muted me-3" style="font-size:11px">موجودی ({{$product_variation->quantity}})</span>
                                <br>
                            </div>
                            @endforeach
                        </th>
                    @endforeach
                </tr>

              </tbody>
            </table>
          </div>
        @endif
    </div>
</div>
