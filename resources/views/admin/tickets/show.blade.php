@extends('admin.layouts.admin')

@section('title')
    {{$ticket->title}}
@endsection

@section('content')
    <livewire:admin.tickets.show :ticket="$ticket">
@endsection
