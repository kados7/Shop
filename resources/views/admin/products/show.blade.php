@extends('admin.layouts.admin')

@section('title')
    نمایش محصول
@endsection

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white">
            <div class="mb-4">
                <h5 class="font-weight-bold">محصول : {{ $product->name }}</h5>
            </div>
            <hr>

            <div class="row">
                <div class="form-group col-md-3">
                    <label>نام</label>
                    <input class="form-control" type="text" value="{{ $product->name }}" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>نام برند</label>
                    <input class="form-control" type="text" value="{{ $product->brand->name }}" disabled>
                </div>

                <div class="form-group col-md-3">
                    <label>وضعیت</label>
                    <input class="form-control" type="text" value="{{ $product->is_active }}" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>تاریخ ایجاد</label>
                    <input class="form-control" type="text" value="{{ verta($product->created_at) }}" disabled>
                </div>
                <div class="form-group col-md-12">
                    <label>تگ ها</label>
                    <input class="form-control" type="text" value="@foreach ($tags as $tag ){{$tag->name}} {{$loop->last? '': ','}} @endforeach" disabled>



                </div>
                <div class="form-group col-md-12">
                    <label>توضیحات</label>
                    <textarea class="form-control" rows="3" disabled>{{ $product->description }}</textarea>
                </div>

                {{-- Delivery Section --}}
                <div class="col-md-12">
                    <hr>
                    <p>هزینه ارسال : </p>
                </div>
                <div class="form-group col-md-3">
                    <label>هزینه ارسال</label>
                    <input class="form-control" type="text" value="{{ $product->delivery_amount }}" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>هزینه ارسال به ازای محصول اضافی</label>
                    <input class="form-control" type="text" value="{{ $product->delivery_amount_per_product }}" disabled>
                </div>

                {{-- Attributes & Variations --}}
                <div class="col-md-12">
                    <hr>
                    <div class="form-group col-md-3 mb-2">
                        <label>نام دسته بندی</label>
                        <input class="form-control" type="text" value="{{ $product->category->name }}" disabled>
                    </div>
                    <p>ویژگی ها : </p>

                </div>


                @foreach ($attributes as $attribute)
                    <div class="form-group col-md-3">
                        <label> {{$attribute->attribute->name}}</label>
                        <input class="form-control" type="text" value="{{$attribute->value}}" disabled>
                    </div>
                @endforeach

                    <div class="col-md-12">
                        <hr>
                        @foreach ($variations as $variation)


                        <div class="d-flex flex-row align-items-center">
                            <p class="mx-2"> ✔ قیمت و موجودی برای متغیر <strong >{{$variation->attribute->name}} ( <span class="text-danger">{{$variation->value}}</span> ) :   </strong></p>
                                <a class="btn btn-outline-primary btn-sm" data-bs-toggle="collapse" href="#collapse--{{$variation->value}}" role="button" aria-expanded="false">
                                    نمایش
                                </a>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="collapse" id="collapse--{{$variation->value}}">
                            <div class="card card-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label> قیمت </label>
                                        <input type="text" disabled class="form-control" value="{{$variation->price}}">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label> تعداد </label>
                                        <input type="text" disabled class="form-control" value="{{$variation->quantity}}">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label> sku </label>
                                        <input type="text" disabled class="form-control" value="{{$variation->sku}}">
                                    </div>

                                    {{-- Sale Section --}}
                                    <div class="col-md-12 mt-2">
                                        <p> حراج : </p>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label> قیمت حراجی </label>
                                        <input type="text" value="{{$variation->sale_price}}" disabled
                                            class="form-control">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label> تاریخ شروع حراجی </label>
                                        <input type="text"
                                            value="{{$variation->date_on_sale_from}}"
                                            disabled class="form-control">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label> تاریخ پایان حراجی </label>
                                        <input type="text"
                                            value="{{$variation->date_on_sale_to}}"
                                            disabled class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- Images --}}
                <div class="col-md-12">
                    <hr>
                    <p>تصاویر محصول : </p>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <img class="card-img-top"
                         src="{{url(env('PRODUCT_IMAGES_UPLOAD_PATH')).'/'.$product->primary_image}}"
                            alt="{{ $product->name }}">
                    </div>
                </div>

                <div class="col-md-12">
                    <hr>
                </div>
                <div class="d-flex flex-row">
                @foreach ($images as $image)

                        <img class="mx-1 rounded" width="24%"
                        src="{{url(env('PRODUCT_IMAGES_UPLOAD_PATH')).'/'.$image->image}}"
                            alt="{{ $image->image }}">

                @endforeach
                </div>
            </div>

            <a href="{{ route('admin.products.index') }}" class="btn btn-dark mt-5">بازگشت</a>

        </div>

    </div>

@endsection
