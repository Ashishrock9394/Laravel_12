@extends('layouts.app')
@section('title', 'Home Page')
@section('content')

<!-- profile -->
<div class="container mt-5">  
      <h2 class="mb-4">User Profile</h2>
      <div class="card">
      <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text">Email: {{ $user->email }}</p>
            <p class="card-text">Joined on: {{ $user->created_at->format('d M Y') }}</p>
      </div>
      </div>
</div>
@endsection 
