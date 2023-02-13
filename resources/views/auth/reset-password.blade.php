@extends('home.layouts.home')
@section('title')
    تغییر رمز عبور
@endsection

@section('content')

    <div class="card mx-auto" style="width: 300px;">
       <div class="card-header h5 text-white bg-primary">تغییر رمز </div>

       @if ($errors->any())
       <p>something went wrong</p>
       @foreach ($errors->all() as $error)
       <div class="alert alert-danger" role="alert">
           * {{$error}}
       </div>
       @endforeach
       @endif

       @if (session('status'))
       <div class="mb-4 font-medium text-sm text-green-600">
           {{ session('status') }}
       </div>
   @endif

       <div class="card-body px-5">
           <p class="card-text py-2">
            ایمیل خود را وارد کنید  .
           </p>
           <form method="POST" action="/reset-password">
               @csrf
               <input type="hidden" name="token" value="{{request()->route('token')}}">
           <div class="form-outline">
               <label class="form-label" for="typeEmail">ایمیل :</label>
               <input type="email" id="email" name="email" class="form-control my-1" value="{{old('email' , $request->email )}}" />

               <label class="form-label" for="password">رمز جدید:</label>
               <input type="password" id="password" name="password" class="form-control my-1" />

               <label class="form-label" for="password">تکرار رمز جدید :</label>
               <input type="password" id="password_confirmation" name="password_confirmation" class="form-control my-1" />


           </div>
           <button type="submit" class="btn btn-primary w-100">تغییر رمز عبور</button>
           </form>
           <div class="d-flex justify-content-between mt-4">
               <a class="" href="/login">ورود</a>
               <a class="" href="/register">ثبت نام</a>
           </div>
       </div>
   </div>

@endsection
