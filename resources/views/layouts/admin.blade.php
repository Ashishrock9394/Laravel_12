<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet">

    <!-- AdminLTE CSS -->     
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    @livewireStyles

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

    <!-- Navbar -->
    @include('layouts.partials.navbar')

    <!-- Sidebar -->
    @include('layouts.partials.sidebar')

    <!-- Content -->
    @yield('content')

    <!-- Footer -->
    @include('layouts.partials.footer')

</div>

<!-- Scripts -->
@livewireScripts

<!-- Scripts -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

    <script src="https://kit.fontawesome.com/591c524be6.js" crossorigin="anonymous"></script>     
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- jQuery  CDN (optional) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.getElementById('logout-btn')?.addEventListener('click', function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure you want to logout?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, logout'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    });
</script>

<script>
    window.addEventListener('swal:success', event => {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: event.detail.message,
            showConfirmButton: false,
            timer: 2000,
        });
    });

    window.addEventListener('swal:error', event => {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: event.detail.message,
            showConfirmButton: false,
            timer: 2000,
        });
    });
</script>


</body>
</html>