@extends('admin.layouts.admin')

@section('title')
ویرایش پست
@endsection

@section('content')
    <livewire:admin.posts.edit :post="$post">
@endsection


