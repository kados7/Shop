@extends('admin.layouts.admin')

@section('title')
    سفارش
@endsection

@section('content')
    <livewire:admin.orders.show :order="$order">
@endsection


