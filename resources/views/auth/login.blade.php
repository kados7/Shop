@extends('home.layouts.home')
@section('title')
    ثبت نام
@endsection

@section('content')

<section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5">

              <h3 class="mb-5">ورود به حساب کاربری</h3>

                @if ($errors->any())
                    <p>something went wrong</p>
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        * {{$error}}
                    </div>
                    @endforeach
                @endif
                <form method="POST" action="/login" class="mx-1 mx-md-4" >
                    @csrf
              <div class="form-outline mb-4">
                <label class="form-label" for="email">ایمیل</label>
                <input type="email"  id="email" name="email" class="form-control form-control-lg" value="{{old('email')}}" />
              </div>

              <div class="form-outline mb-4">
                <label class="form-label" for="password">رمز عبور</label>
                <input type="password" id="password" name="password" class="form-control form-control-lg" />
              </div>

              <!-- Checkbox -->
              <div class="d-flex mb-4">
                <input class="form-check-input mx-1" type="checkbox" value="" id="form1Example3" />
                <label class="form-check-label" for="form1Example3">رمز بخاطر سپرده شود</label>
              </div>

              <button type="submit" class="btn btn-primary btn-lg btn-block" >ورود</button>
                </form>
                <a href="forgot-password" class="btn btn-secondary btn-sm m-4">فراموشی رمز عبور</a>

              <hr class="my-4">
              <button class="btn btn btn-block btn-primary mb-2" style="background-color: #dd4b39;"
                type="submit"><i class="fab fa-google p-2"></i>ورود با حساب گوگل</button>
              <button class="btn btn btn-block btn-primary mb-2" style="background-color: #3b5998;"
                type="submit"><i class="fab fa-facebook-f p-2"></i>ورود با حساب فیس بوک</button>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
