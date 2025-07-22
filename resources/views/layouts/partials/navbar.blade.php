<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" id="logout-btn" class="btn btn-outline-danger btn-sm">Logout</button>
            </form>
        </li>
    </ul>
</nav>
