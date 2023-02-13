@extends('home.layouts.home')
@section('title')
    تایید ایمیل
@endsection


<section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5">

                <h3 class="mb-5">احراز هویت با ایمیل</h3>

                @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
                @endif


                <p> احراز هویت شما با موفیت انجام شد و ثبت نام شما کامل گردید. </p>
                <form method="POST" action="{{route('verification.send')}}" class="mx-1 mx-md-4" >
                    @csrf
                <button type="submit" class="btn btn-success">{{__('Resend Verification Email')}}</button>
                </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


</x-template.layout />
