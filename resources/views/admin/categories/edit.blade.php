@extends('admin.layouts.admin')

@section('title')
 -ویرایش دسته بندی

@endsection

@section('content')
    <livewire:admin.category.edit :category="$category">
@endsection
