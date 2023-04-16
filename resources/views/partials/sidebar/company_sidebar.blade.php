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
                <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Main
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('projects', [Session::get('company_id')]) }}">{{__('Projects')}}</a>
                        <a class="nav-link" href="#">Calendar</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Reports
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            {{__('Task reports')}}
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="login.html">{{__('Task report 1')}}</a>
                                <a class="nav-link" href="register.html">{{__('Task report 2')}}</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                            {{__('Project reports')}}
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="401.html">{{__('Project report 1')}}</a>
                                <a class="nav-link" href="404.html">{{__('Project report 2')}}</a>
                                <a class="nav-link" href="500.html">{{__('Project report 3')}}</a>
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
            <div class="small">Current company: {{ Session::get('company_name') }}</div>
        </div>
    </nav>
</div>
<div id="layoutSidenav_content">
    <main>
        @yield('content')
    </main>
</div>
