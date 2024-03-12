<nav class="navbar align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 navbar-dark">
    <div class="container-fluid d-flex flex-column p-0">
        <p class="h2 m-3 fw-bold text-light">
            <img src="{{ asset('assets/img/upicon.png') }}" class="d-inline-block align-top upicon-logo" height="25">
            {{-- <span>Menu</span> --}}
        </p>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item">
                <a class="nav-link" href="/dashboard">
                    <span class="text-capitalize fw-bold">Dashboard</span>
                </a>
            </li>
            @foreach (['add-project', 'add-vertical', 'add-vendor', 'associate-vendor', 'add-team', 'add-member', 'add-user', 'add-role'] as $item)
                <li class="nav-item">
                    <a class="nav-link" href="/{{ 'dashboard/' . $item }}">
                        <span class="text-capitalize">@php echo str_replace('-', ' ', $item) @endphp</span>
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle"
                type="button"></button></div>
    </div>
</nav>
