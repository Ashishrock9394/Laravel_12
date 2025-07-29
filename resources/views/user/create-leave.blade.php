@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Request Leave</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.create-leave') }}" method="POST" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label for="startDate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="startDate" name="start_date" required>
                            <div class="invalid-feedback">
                                Please provide a valid start date.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="endDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="endDate" name="end_date" required>
                            <div class="invalid-feedback">
                                Please provide a valid end date.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="reason" class="form-label">Reason for Leave</label>
                            <textarea class="form-control" id="reason" name="reason" rows="4" placeholder="Describe your reason..." required></textarea>
                            <div class="invalid-feedback">
                                Please provide a reason for your leave.
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Submit Leave Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection