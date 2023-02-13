<div>
    <div class="row p-5">
        <div class="col-md-2">@include('home.profiles.aside')</div>

        <div class="col-md-10 py-3 px-5">
            <div>
                <span class="text-black h5">علاقه مندی های شما ({{$wishlist->total()}})</span>
            </div>

            @if ($wishlist->count() == 0)
                <div class="mt-4">
                    <span class="text-muted h6">هیچ علاقه مندی ای ثبت نشده است</span>
                </div>
            @else
            <div class="mt-4">
                @foreach ($wishlist as $wish_item )
                <div class="row my-3">
                    <div class="col-md-1">
                        <a href="{{url('product/'.$wish_item->product->slug)}}">
                            <img width="100%" src="{{url(env('PRODUCT_IMAGES_UPLOAD_PATH')).'/'.$wish_item->product->primary_image}}">
                        </a>
                    </div>
                    <div class="col-md-5">
                        <a class="btn btn-sm" href="{{url('product/'.$wish_item->product->slug)}}">
                            <h6 class="text-black">{{$wish_item->product->name}}</h6>
                        </a>
                        <div>
                            <a class="btn btn-sm" href="{{url('main/'.$wish_item->product->category->slug)}}">
                                <span class="text_muted text-black" style="font-size:11px ;background: #F5F5F5">
                                    {{$wish_item->product->category->name}}
                                </span>
                            </a>
                            <span style="font-size:12px">{{number_format($wish_item->product->min_price_check->price)}} تومان</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button wire:click="delete_from_wishlist({{$wish_item->product_id}})" class="btn btn-wichlist p-1" type="button"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="حذف از لیست علاقه مندی ها">
                                حذف از لیست
                        </button>
                    </div>
                </div>

            @endforeach
            </div>

            @endif


        </div>
    </div>
</div>
