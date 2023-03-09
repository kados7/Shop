@extends('home.layouts.home')
@section('title')
    تیکت ها
@endsection

@section('content')

<livewire:home.profile.ticket-show :ticket="$ticket">

@endsection
