@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="leaves m-4">
            <h4 class="text-center">Leave Requests</h4>
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Reason</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leaves as $leave)
                        <tr>
                            <td>{{ $leave->start_date}}</td>
                            <td>{{$leave->end_date}}</td>
                            <td>{{ $leave->reason }}</td>
                            <td>
                                <span class="badge 
                                    {{ $leave->status === 'approved' ? 'bg-success' : '' }}
                                    {{ $leave->status === 'pending' ? 'bg-warning text-dark' : '' }}
                                    {{ $leave->status === 'rejected' ? 'bg-danger' : '' }}
                                ">
                                    {{ $leave->status }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @endsection