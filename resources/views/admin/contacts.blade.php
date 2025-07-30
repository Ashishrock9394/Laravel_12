@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="content-wrapper">
    <!-- Page header -->
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0">Contact List</h1>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        @livewire('admin.contact-table')
    </section>
</div>
@endsection
