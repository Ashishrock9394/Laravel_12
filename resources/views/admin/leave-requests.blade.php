@extends('layouts.admin')

@section('title', 'Leave Requests')

@section('content')
<div class="content-wrapper">
    <!-- Page header -->
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0">Leave Requests</h1>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        @livewire('admin.leave-table')
    </section>
</div>
@endsection
