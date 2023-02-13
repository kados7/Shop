@extends('admin.layouts.admin')

@section('title')
 -ویرایش کاربر

@endsection

@section('content')

<livewire:admin.users.edit :user="$user">

@endsection
