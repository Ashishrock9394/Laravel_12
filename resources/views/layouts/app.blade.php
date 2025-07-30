<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Styles -->
     <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/main.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <title>@yield('title', 'Default Title')</title>
    @livewireStyles
</head>
<body>

    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')

    <!-- CSRF Token for AJAX -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    @livewireScripts
    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/main.min.js"></script>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://kit.fontawesome.com/591c524be6.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    // CSRF for all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Notification Polling
    function fetchNotifications() {
        $.get("{{ route('notifications.fetch') }}").done(function (data) {
            let list = '';
            if (data.notifications.length > 0) {
                $('#notification-count').text(data.count).show();

                data.notifications.forEach(n => {
                    list += `<li>
                        <a class="dropdown-item" href="/notifications/read/${n.id}">
                            🔔 ${n.data.message}
                        </a>
                    </li>`;
                });
            } else {
                $('#notification-count').hide();
                list = '<li><span class="dropdown-item">No new notifications</span></li>';
            }
            $('#notification-list').html(list);
        }).fail(function (xhr) {
            console.error("Notification fetch failed:", xhr.responseText);
        });
    }

    // (Optional) Manual mark as read — not used anymore in dropdown clicks
    function markNotificationsRead() {
        $.get("{{ route('notifications.markAsRead') }}", function () {
            $('#notification-count').hide();
        });
    }

    setInterval(fetchNotifications, 10000); // Fetch every 10 seconds
    fetchNotifications(); // Initial fetch
</script>


    <script>
        // Logout confirmation
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

    <!-- SweetAlert Message Dispatch from Session -->
    @if (session('success'))
    <script>
        window.dispatchEvent(new CustomEvent('swal:success', {
            detail: { message: @json(session('success')) }
        }));
    </script>
    @endif

    @if (session('error'))
    <script>
        window.dispatchEvent(new CustomEvent('swal:error', {
            detail: { message: @json(session('error')) }
        }));
    </script>
    @endif
    

    @if ($errors->any())
    <script>
        window.dispatchEvent(new CustomEvent('swal:validation', {
            detail: { errors: {!! json_encode($errors->all()) !!} }
        }));
    </script>
    @endif

    <!-- SweetAlert Event Handlers -->
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

        window.addEventListener('swal:validation', event => {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: 'Validation Error',
                html: event.detail.errors.join('<br>'),
                showConfirmButton: false,
                timer: 3000,
            });
        });
    </script>

</body>
</html>
