@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="content-wrapper">
    <!-- Page header -->
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0">Admin Dashboard</h1>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Dashboard Info Boxes -->
            <div class="row">
                <!-- Users -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $userCount }}</h3>
                            <p>Total Users</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{ route('admin.users.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Tickets -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $ticketCount }}</h3>
                            <p>Total Tickets</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-ticket-alt"></i>
                        </div>
                        <a href="{{ route('admin.tickets.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                
                <!-- Leave Requests -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $leaveCount }}</h3>
                            <p>Leave Requests</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-address-book"></i>
                        </div>
                        <a href="{{ route('admin.leave-requests.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Queries -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $queryCount }}</h3>
                            <p>Total Queries</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-question-circle"></i>
                        </div>
                        <a href="{{ route('admin.queries.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Contacts -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $contactCount }}</h3>
                            <p>Total Contacts</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-address-book"></i>
                        </div>
                        <a href="{{ route('admin.contacts.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- You can add charts, tables, or recent activity below -->
        </div>
    </section>
</div>
@endsection
