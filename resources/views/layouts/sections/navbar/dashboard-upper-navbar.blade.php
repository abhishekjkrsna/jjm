<nav class="navbar navbar-expand bg-white shadow mb-4 topbar static-top navbar-light">
    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop"
            type="button"><i class="fas fa-bars"></i></button>
        <span class="h3 text-muted">UPICON Dashboard</span>
        <ul class="navbar-nav flex-nowrap ms-auto">
            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false"
                    data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">

                </div>
            </li>
            <div class="d-none d-sm-block topbar-divider">
            </div>
            <li class="nav-item">
                <a class="nav-link fw-bold" href="{{ route('logout') }} "
                    onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout
                </a>
                <form id="frm-logout" action="{{ route('logout') }}" method="POST" class="d-none">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>
</nav>
