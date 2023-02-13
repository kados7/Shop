@extends('admin.layouts.admin')

@section('title')
 -ویرایش گروه کاربری (نقش)

@endsection

@section('content')

    <livewire:admin.roles.edit :role="$role">
@endsection
