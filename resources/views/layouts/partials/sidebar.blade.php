<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <span class="brand-text font-weight-bold">Welcome {{ Str::before(Auth::user()->name, ' ') }}</span>
    </a>
    <div class="sidebar">
        <nav>
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
                  <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>Dashboard</p>
                        </a>
                  </li>
                  <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                              <i class="nav-icon fas fa-users"></i>
                              <p>Users</p>
                        </a>
                  </li>
                  <li class="nav-item">
                        <a href="{{ route('admin.leave-requests.index') }}" class="nav-link {{ request()->is('admin/leave-requests*') ? 'active' : '' }}">
                              <i class="nav-icon fas fa-ticket-alt"></i>
                              <p>Leave Requests</p>
                        </a>
                  </li> 
                  <li class="nav-item">
                        <a href="{{ route('admin.tickets.index') }}" class="nav-link {{ request()->is('admin/tickets*') ? 'active' : '' }}">
                              <i class="nav-icon fas fa-ticket-alt"></i>
                              <p>Tickets</p>
                        </a>
                  </li> 
                  <li class="nav-item">
                        <a href="{{ route('admin.queries.index') }}" class="nav-link {{ request()->is('admin/queries*') ? 'active' : '' }}">
                              <i class="nav-icon fas fa-question-circle"></i>
                              <p>Queries</p>
                        </a>
                  </li>
                  <li class="nav-item">
                        <a href="{{ route('admin.contacts.index') }}" class="nav-link {{ request()->is('admin/contacts*') ? 'active' : '' }}">
                              <i class="nav-icon fas fa-address-book"></i>
                              <p>Contacts</p>
                        </a>
                  </li>
            </ul>
        </nav>
    </div>
</aside>
