@extends('admin.layouts.admin')

@section('title')
مشاهده پست
@endsection

@section('content')
    <livewire:admin.posts.show :post="$post">
@endsection


