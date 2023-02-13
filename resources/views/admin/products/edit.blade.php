@extends('admin.layouts.admin')

@section('title')
 -ویرایش محصول {{$product->name}}

@endsection

@section('content')

    @if (request()->routeIs('admin.products.edit'))
        <livewire:admin.product.edit :product="$product" />

    @elseif(request()->routeIs('admin.products.images_edit'))
        <livewire:admin.product.edit-images :product="$product" />
    @else
        <livewire:admin.product.edit-category :product="$product" />
    @endif


@endsection
