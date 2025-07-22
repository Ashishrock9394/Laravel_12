@extends('layouts.app')
@section('title', 'Login Page')
@section('content') 

<!-- Section: Design Block -->
<section class="">
  <!-- Jumbotron -->
  <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h1 class="my-5 display-3 fw-bold ls-tight">
            The best offer <br />
            <span class="text-primary">for your business</span>
          </h1>
          <p style="color: hsl(217, 10%, 50.8%)">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Eveniet, itaque accusantium odio, soluta, corrupti aliquam
            quibusdam tempora at cupiditate quis eum maiores libero
            veritatis? Dicta facilis sint aliquid ipsum atque?
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-3 px-md-5">
                <h2 class="text-center text-primary">Welcome</h2>
                <form action="{{ route('login.submit')}}" method="POST">
                    @csrf
                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="email" name="email" class="form-control" />
                        <label class="form-label" for="email">Email address</label>
                    </div>

                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="password" name="password" class="form-control" />
                        <label class="form-label" for="password">Password</label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-3">
                        Sign in
                    </button>

                    <!-- Don't have an account link -->
                    <div class="text-center mb-4">
                        <p>
                            Don't have an account?
                            <a href="{{ route('register') }}" class="text-decoration-none text-primary">Sign up</a>
                        </p>
                    </div>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>or sign in with:</p>
                        <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                          <i class="fab fa-facebook-f"></i>
                        </button>
                        <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                          <i class="fab fa-google"></i>
                        </button>
                        <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                          <i class="fab fa-twitter"></i>
                        </button>
                        <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                          <i class="fab fa-github"></i>
                        </button>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->
@endsection 
