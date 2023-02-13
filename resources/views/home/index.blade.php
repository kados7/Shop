@extends('home.layouts.home')
@section('title')
     فروشگاه استایل
@endsection

@section('content')
    @if (App\Models\Banner::where('type' , 'slider')->where('is_active' , 1)->exists())
        <livewire:home.content.slider>
    @endif

    {{-- <livewire:home.content.cover1> --}}

    <livewire:home.content.products>

    <livewire:home.content.categories>

    {{-- <livewire:home.content.cover2> --}}

    {{-- <livewire:home.content.banners> --}}





@endsection
