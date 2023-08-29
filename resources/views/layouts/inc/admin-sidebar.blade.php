<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                {{-- <div class="sb-sidenav-menu-heading">Core</div> --}}
                <a class="nav-link" href="{{ url('/admin') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                @if (Auth::user()->role_id == 1)
                    <div class="sb-sidenav-menu-heading">Prison Records</div>
                    <a class="nav-link" href="{{ url('admin/inmates') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                        Inmate List
                    </a>
                    <a class="nav-link" href="{{ url('admin/health_records') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                        Health Records
                    </a>
                    <a class="nav-link" href="{{ url('admin/visits') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                        Visit Records
                    </a>
                @endif
                @if (Auth::user()->role_id == 5)
                    <a class="nav-link" href="{{ url('admin/health_records') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                        Health Records
                    </a>
                    <a class="nav-link" href="{{ url('admin/visits') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                        Visit Records
                    </a>
                    <div class="sb-sidenav-menu-heading">Configuration</div>
                    <a class="nav-link" href="{{ url('admin/diseases') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                        Diseases List
                    </a>
                @endif
                @if (Auth::user()->role_id == 1)
                <div class="sb-sidenav-menu-heading">Configuration</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                    data-bs-target="#collapseCellBlock" aria-expanded="false" aria-controls="collapseCellBlock">
                    <div class="sb-nav-link-icon"><i class="fas fa-border-all"></i></div>
                    Cell Block
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseCellBlock" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('admin/add-cellblock') }}">Add Cell Block</a>
                        <a class="nav-link" href="{{ url('admin/cellblocks') }}">Cell Block List</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCrime"
                    aria-expanded="false" aria-controls="collapseCrime">
                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                    Crime
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseCrime" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('admin/add-crime') }}">Add Crime</a>
                        <a class="nav-link" href="{{ url('admin/crime') }}">Crime List</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseDisease"
                    aria-expanded="false" aria-controls="collapseDisease">
                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                    Diseases
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseDisease" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('admin/add-disease') }}">Add Disease</a>
                        <a class="nav-link" href="{{ url('admin/diseases') }}">Diseases List</a>
                    </nav>
                </div>

                <div class="sb-sidenav-menu-heading">Accounts</div>
                <a class="nav-link" href="{{ url('admin/users') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                    Users
                </a>
                <a class="nav-link" href="{{ url('admin/roles') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                    Roles
                </a>
                <div class="sb-sidenav-menu-heading">Requests</div>
                <a class="nav-link" href="{{ url('admin/pending_requests') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                    Pending Requests
                </a>
                <a class="nav-link" href="{{ url('admin/approved_requests') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                    Approved Requests
                </a>
                <a class="nav-link" href="{{ url('admin/rejected_requests') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                    Rejected Requests
                </a>
                @endif
                
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->name }}
        </div>
    </nav>
</div>
