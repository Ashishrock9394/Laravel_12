@extends('layouts.app')
@section('title', 'Signup Page')
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
                <form action="{{ route('register.submit')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-4">
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" name="first_name" class="form-control" required />
                            <label class="form-label" for="first_name">First name</label>
                        </div>
                        </div>
                        <div class="col-md-6 mb-4">
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" name="last_name" class="form-control" required/>
                            <label class="form-label" for="last_name">Last name</label>
                        </div>
                        </div>
                    </div>

                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="email" name="email" class="form-control" required/>
                        <label class="form-label" for="email">Email address</label>
                    </div>

                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="password" name="password" class="form-control" required/>
                        <label class="form-label" for="password">Password</label>
                    </div>
                    
                    <!-- Confirm Password input --> 
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="password" name="password_confirmation" class="form-control" required/>
                        <label class="form-label" for="password_confirmation">Confirm Password</label>
                    </div>  

                    <!-- Checkbox -->
                    <div class="form-check d-flex justify-content-center mb-4">
                        <input class="form-check-input me-2" type="checkbox" name="subscribe" checked />
                        <label class="form-check-label" for="subscribe">
                        Subscribe to our newsletter
                        </label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">
                        Sign up
                    </button>

                    <!-- Already have an account link -->
                    <div class="text-center mb-4">
                        <p>
                            Already have an account?
                            <a href="{{ route('login') }}" class="text-decoration-none text-primary">Sign In</a>
                        </p>
                    </div>

                    <!-- Signup buttons -->
                    <div class="text-center">
                        <p>or sign up with:</p>
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
