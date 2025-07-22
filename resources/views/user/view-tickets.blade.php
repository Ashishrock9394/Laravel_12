@extends('layouts.app')
@section('title', 'Home Page')
@section('content')

<!-- create tickets -->
<div class="container mt-5">
    <h2 class="mb-4 text-center"> Tickets </h2>
                  <table class="table table-bordered table-striped">
                  <thead class="table-dark">
                        <tr>
                              <th>Ticket ID</th>
                              <th>Subject</th>
                              <th>Description</th>
                              <th>Status</th>
                              <th>Created At</th>
                        </tr>
                  </thead>
                  <tbody>
                        @foreach($tickets as $ticket)
                              <tr>
                              <td>{{ $ticket->id }}</td>
                              <td>{{ $ticket->subject }}</td>
                              <td>{{ $ticket->message }}</td>
                              <td>{{ $ticket->status }}</td>
                              <td>{{ $ticket->created_at }}</td>
                              </tr>
                        @endforeach
                  </tbody>
                  </table>
    
</div>

@endsection 
