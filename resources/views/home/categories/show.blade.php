@extends('home.layouts.home')
@section('title')
     {{$category->name}}
@endsection

@section('content')


    <livewire:home.categories.breadcrumb :category="$category">

    <livewire:home.categories.filter :category="$category">

    <livewire:home.categories.product :category="$category">



@endsection
