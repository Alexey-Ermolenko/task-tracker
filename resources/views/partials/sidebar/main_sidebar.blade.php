<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Main</div>
                <a class="nav-link" href="{{ route('main') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fa-solid fa-chart-simple"></i>
                    </div>
                    {{__('Main')}}
                </a>
                <a class="nav-link" href="{{ route('companies') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fa-solid fa-landmark"></i>
                    </div>
                    {{__('Companies')}}
                </a>
                <div class="sb-sidenav-menu-heading">Menu</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Reports
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Charts
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="login.html">Chart report 1</a>
                                <a class="nav-link" href="register.html">Chart report 2</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                            Tables
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="401.html">Table report 1</a>
                                <a class="nav-link" href="404.html">Table report 2</a>
                                <a class="nav-link" href="500.html">Table report 3</a>
                            </nav>
                        </div>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Activity</div>
                <a class="nav-link" href="{{ route('calendar') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Calendar
                </a>
                <a class="nav-link" href="{{ route('settings') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Settings
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div> ({{ Auth::user()->name }})
        </div>
    </nav>
</div>
<div id="layoutSidenav_content">
    <main>
        @yield('content')
    </main>
</div>
