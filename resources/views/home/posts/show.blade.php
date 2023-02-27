@extends('home.layouts.home')
@section('title')
    {{$post->title}}
@endsection

@section('content')

<livewire:home.post.show :post="$post">

@endsection
