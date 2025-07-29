@extends('layouts.app')
@section('title', 'Home Page')
@section('content')


<section>
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-12 col-xl-4">

        <div class="card" style="border-radius: 15px;">
          <div class="card-body text-center">
            <div class="mt-3 mb-4">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp"
                class="rounded-circle img-fluid" style="width: 100px;" />
            </div>
            <h4 class="mb-2">{{ $user->name }}</h4>
            <p class="text-muted mb-4">Email <span class="mx-2">|</span> <a
                href="#!"> {{ $user->email }}</a></p>
            <p class="text-muted mb-4">Joined on <span class="mx-2">|</span> <a
                href="#!"> {{ $user->created_at->format('d M Y') }}</a></p>
            <div class="mb-4 pb-2">
              <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary btn-floating">
                <i class="fab fa-facebook-f fa-lg"></i>
              </button>
              <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary btn-floating">
                <i class="fab fa-twitter fa-lg"></i>
              </button>
              <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary btn-floating">
                <i class="fab fa-skype fa-lg"></i>
              </button>
            </div>
            <button onclick="window.location='{{ route('profile.edit') }}'" type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-rounded btn-lg">
              Edit Profile
            </button>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
@endsection 
