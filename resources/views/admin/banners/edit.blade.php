@extends('admin.layouts.admin')

@section('title')
 -ویرایش بنر

@endsection

@section('content')

<livewire:admin.banners.edit :banner="$banner">

@endsection
