@extends('admin.layouts.admin')

@section('title')
    ویرایش تیکت
@endsection

@section('content')
    <livewire:admin.ticket-priority.edit :ticketPriority="$ticketPriority">
@endsection
