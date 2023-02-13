@extends('admin.layouts.admin')

@section('title')
 -ویرایش مجوز

@endsection

@section('content')

    <livewire:admin.permissions.edit :permission="$permission">
@endsection
