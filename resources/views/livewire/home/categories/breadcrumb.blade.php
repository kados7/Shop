<div>

    <div class="mx-5 my-2">
        <span><a class="btn btn-sm text-muted" href="{{url('/')}}">فروشگاه اینترنتی سجاد استایل</a>/</span>
        @if ($category->parent)
            <span><a class="btn btn-sm text-muted" href="{{route('home.categories.show' , ['category' => $category->parent->slug])}}">{{$category->parent->name}}</a>/</span>
        @endif
        <span><a class="btn btn-sm text-dark" href="{{route('home.categories.show' , ['category' => $category->slug])}}">{{$category->name}}</a></span>

    </div>

    <div class="d-flex flex-row my-4 mx-5">
        <h1 class="text-end mt-2 mx-2 h2" style="color:black" > {{$category->name}}</h1>

        <div class="col-md-3 d-flex text-center mt-1 mx-4" role="search">
            <div class="search container">
                <input wire:model.lazy="search" class="search input border-0" type="text" placeholder="جستوجو در محصولات زیر ...">
            </div>
        </div>
    </div>
    <div class="d-flex flex-row my-4 mx-5">
        @foreach ($category->children as $child )
            <div class="mx-2">
                <img width="90" src="{{url('/storage/images/template/category')}}">
                <h6 class="text-center mt-2 mx-2 h6 " style="color:black" >
                    <a class="btn" href="{{route('home.categories.show' , ['category' => $child->slug])}}"> {{$child ->name}} </a>
                </h6>
            </div>
        @endforeach
    </div>


</div>
