<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet">

      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
      <title>@yield('title', 'Default Title')</title>
</head>
<body>

    @include('layouts.header')

        @yield('content')

    @include('layouts.footer')

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    <script src="https://kit.fontawesome.com/591c524be6.js" crossorigin="anonymous"></script>     
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- jQuery  CDN (optional) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- CSRF for AJAX -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function fetchNotifications() {
            $.get("{{ route('notifications.fetch') }}").done(function (data)  {
                let list = '';
                if (data.notifications.length > 0) {
                    $('#notification-count').text(data.count).show();
                    data.notifications.forEach(n => {
                        list += `<li>
                            <a class="dropdown-item" href="/tickets/${n.data.ticket_id}" onclick="markNotificationsRead()">
                                Your ticked id: ${n.data.ticket_id} has been ${n.data.message}
                            </a>
                        </li>`;
                    });
                } else {
                    $('#notification-count').hide();
                    list = '<li><span class="dropdown-item">No new notifications</span></li>';
                }
                $('#notification-list').html(list);
            }).fail(function (xhr, status, error) {
                console.error("Notification fetch failed:", xhr.responseText);
            });
        }

        function markNotificationsRead() {
            $.post("{{ route('notifications.markAsRead') }}", {}, function () {
                $('#notification-count').hide();
            });
        }

        // Poll every 10s
        setInterval(fetchNotifications, 10000);
        fetchNotifications(); // Initial call
    </script>

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

@if (session('success'))
<script>
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success',
        title: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 2000,
    });
</script>
@endif

@if (session('error'))
<script>
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'error',
        title: '{{ session('error') }}',
        showConfirmButton: false,
        timer: 2000,
    });
</script>
@endif

@if ($errors->any())
<script>
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'error',
        title: 'Validation Error',
        html: `{!! implode('<br>', $errors->all()) !!}`,
        showConfirmButton: false,
        timer: 3000,
    });
</script>
@endif




</body>
</html>
