@extends('admin.layouts.admin')

@section('title')
 -ویرایش دسته بندی

@endsection

@section('content')
    <livewire:admin.coupons.edit :coupon="$coupon">
@endsection
