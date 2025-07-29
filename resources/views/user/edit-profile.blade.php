@extends('layouts.app')
@section('title', 'Home Page')
@section('content')

<div class="container">
      <div class="row justify-content-center">
            <div class="col-md-8 m-5">
                  <div class="card">
                        <div class="card-header text-center">{{ __('Edit Profile') }}</div>
            
                        <div class="card-body">
                              <form method="POST" action="{{ route('profile.update') }}">
                                    @csrf
                        
                                    <div class="form-group row">
                                          <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                        
                                          <div class="col-md-6">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
                        
                                                @error('name')
                                                      <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                      </span>
                                                @enderror
                                          </div>
                                    </div> 
                                    <div class="form-group row">
                                          <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}</label>
                        
                                          <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">
                        
                                                @error('email')
                                                      <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                      </span>
                                                @enderror
                                          </div>
                                    </div>
                                    <div class="form-group row">
                                          <lable for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Profile Photo') }}</lable>
                                          <div class="col-md-6">
                                                <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" accept="image/*">
                        
                                                @error('photo')
                                                      <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                      </span>
                                                @enderror   
                                          </div>
                                    </div>

                                    <div class="form-group row">
                                          <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                      {{ __('Update Profile') }}
                                                </button>
                                          </div>      
                                    </div>   
                              </form>     
                        </div>
                  </div>
            </div>
      </div> 
</div>


@endsection