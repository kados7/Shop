@extends('home.layouts.home')
@section('title')
    فراموشی رمز عبور
@endsection

@section('content')
 <div class="card mx-auto" style="width: 600px;">
    <div class="card-header h5 text-black bg-white">دریافت رمز جدید</div>

    @if ($errors->any())
    <p>something went wrong</p>
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        * {{$error}}
    </div>
    @endforeach
    @endif

    @if (session('status'))
    <div class="mb-4">
        {{ session('status') }}
    </div>
    @endif

    <div class="card-body px-5">
        <p class="card-text py-2">
            برای دریافت رمز جدید ایمیل خود را وارد کنید
        </p>
        <form method="POST" action="/forgot-password">
            @csrf
        <div >
            <label class="form-label" for="typeEmail">ایمیل :</label>
            <input type="email" id="email" name="email" class="form-control my-1" />
        </div>
        <button type="submit" class="btn btn-primary w-100">بازیابی رمز عبور</button>
        </form>
        <div class="d-flex justify-content-between mt-4">
            <a class="btn btn-primary" href="/login">ورود</a>
            <a class="btn btn-primary" href="/register">ثبت نام</a>
        </div>
    </div>
</div>

@endsection
