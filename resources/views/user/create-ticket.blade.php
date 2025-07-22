@extends('layouts.app')
@section('title', 'Home Page')
@section('content')

<!-- create tickets -->
<div class="container m-5">
    <h2 class="mb-4">Create Ticket</h2>
    <form action="{{ route('user.create-ticket') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Ticket</button>
    </form>
</div>

@endsection 
