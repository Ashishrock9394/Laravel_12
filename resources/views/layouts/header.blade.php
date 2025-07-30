<!-- Header Section -->
<header class="header bg-light py-2">
    <div class="container-xl">
        <div class="contact-info d-md-flex justify-content-between small text-muted">
            <p class="mb-0">
                <i class="fa-solid fa-phone-volume me-1"></i> +91-9198552556 | +91-8181080712
            </p>
            <p class="mb-0">
                <i class="fa-solid fa-envelope me-1"></i>
                <a href="mailto:ashishkumar9394@gmail.com" class="text-decoration-none text-muted">
                    ashishkumar9394@gmail.com
                </a>
            </p>
        </div>
    </div>
</header>

<!-- Navbar Section -->
<nav class="navbar navbar-expand-md bg-body-tertiary">
    <div class="container-xl">
        <a class="navbar-brand" href="#">
            <img src="https://codingyaar.com/wp-content/uploads/coding-yaar-logo.png" alt="Logo" height="40">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Home</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ROute ('about')}}">About</a></li>
                @if (Auth::check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Ticket</a>
                    <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('user.create-ticket') }}">Create Ticket</a></li>
                            <li><a class="dropdown-item" href="{{ route('user.view-tickets') }}">View Tickets</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Leaves</a>
                    <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('user.create-leave') }}">Request Leave</a></li>
                            <li><a class="dropdown-item" href="{{ route('user.view-leaves') }}">View Requests</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">Query</a></li>
                @endif

                <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>

                <!-- Notification Bell -->
                @if (Auth::check())
                    <li class="nav-item dropdown" id="notificationDropdown">
                        <a class="nav-link fs-7" data-bs-toggle="dropdown" href="#">
                            🔔
                            <span class="badge bg-danger" id="notification-count" style="display: none;"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" id="notification-list">
                            <li><span class="dropdown-item fs-6">Loading...</span></li>
                        </ul>
                    </li>
                @endif
            </ul>

            <!-- Search and Auth Icons -->
            <div class="d-flex align-items-center ms-md-3">
                <form class="d-flex me-3" role="search">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                </form>

                @if (Auth::check())
                    <div class="dropdown user-icons d-flex align-items-center">
                        <a href="#" class="dropdown-toggle d-flex align-items-center text-decoration-none text-dark me-1 fs-6"
                            id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user me-1"></i>
                            {{ Str::before(Auth::user()->name, ' ') }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <button class="dropdown-item" onclick="location.href='{{ route('user.profile') }}'">
                                    <i class="fa-solid fa-id-badge me-1 fs-6"></i> Profile
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item text-danger" id="logout-btn">
                                    <i class="fa-solid fa-right-from-bracket me-1"></i> Logout
                                </button>
                            </li>
                        </ul>

                        <!-- Hidden Logout Form -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                @else
                    <div class="user-icons d-flex">
                        <a href="{{ route('login') }}" class="me-3"><i class="fa-solid fa-user-tie fs-5"></i></a>
                        <a href="{{ route('register') }}"><i class="fa-solid fa-user-plus fs-5"></i></a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</nav>