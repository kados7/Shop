@extends('home.layouts.home')
@section('title')

@endsection


<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/profile">Profile</a></li>
                <li class="breadcrumb-item active" aria-current="page">User password</li>
            </ol>
            </nav>
        </div>
        </div>

        <div class="row">
            <div class="col-sm">
                <div class="card mb-4 mb-md-0">
                <p class="display-6 ms-3 mt-2">Confirm your password</p>
                <div class="card-body">
                    <form method="POST" action="/user/confirm-password" class="mx-1 mx-md-4" >
                        @csrf

                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="password">Enter Your Password</label>
                            <input type="password" id="password" name="password" class="form-control"/>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn my-2">confirm Password</button>

                    </form>
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
                            </div>
                        </div>

                </div>
                </div>
            </div>

            </div>
        </div>
        </div>
    </div>
    </section>

@endsection
