<div>

    <div class="mx-5 my-2">
        <span><a class="btn btn-sm text-muted" href="{{url('/')}}">فروشگاه اینترنتی سجاد استایل</a>/</span>
        @if ($product->category->parent)
            <span><a class="btn btn-sm text-muted" href="{{route('home.categories.show' , ['category' => $product->category->parent->slug])}}">{{$product->category->parent->name}}</a>/</span>
        @endif
        <span><a class="btn btn-sm text-muted" href="{{route('home.categories.show' , ['category' => $product->category->slug])}}">{{$product->category->name}}</a>/</span>

        <span><a class="btn btn-sm text-black" >{{$product->name}}</a></span>
        @role('super-admin')
            <a class="btn btn-sm btn-dark" href="{{route('admin.products.edit' , $product->id)}}">ویرایش محصول(admin)</a>
        @endrole

    </div>


    <div class="d-flex flex-row my-4 mx-5">
        @foreach ($product->category->children as $child )
            <div class="mx-2">
                <img width="90" src="{{url('/storage/images/template/category')}}">
                <h6 class="text-center mt-2 mx-2 h6 " style="color:black" >
                    <a class="btn" href="{{route('home.categories.show' , ['category' => $child->slug])}}"> {{$child ->name}} </a>
                </h6>
            </div>
        @endforeach
    </div>



</div>
