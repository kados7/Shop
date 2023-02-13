@extends('home.layouts.home')
@section('title')
    {{$product->name}}
@endsection

@section('content')

    <livewire:home.products.breadcrumb :product="$product">

    <livewire:home.products.top :product="$product">

    <livewire:home.products.detail :product="$product">

    <livewire:home.products.comment :product="$product">



@endsection
