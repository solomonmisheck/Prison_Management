<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                {{-- <div class="sb-sidenav-menu-heading">Core</div> --}}
                <a class="nav-link" href="{{ url('/') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Prison Records</div>
                <a class="nav-link" href="{{ url('inmates') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                    Inmate List
                </a>
                <a class="nav-link" href="{{ url('health_records') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                    Health Records
                </a>
                <a class="nav-link" href="{{ url('visits') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                    Visit Records
                </a>
                <a class="nav-link" href="{{ url('requests') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                    My Requests
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->name }}
        </div>
    </nav>
</div>
