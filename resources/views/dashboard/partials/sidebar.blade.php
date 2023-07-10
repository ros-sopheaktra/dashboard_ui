<!-- ====================================
     ——— LEFT SIDEBAR WITH OUT FOOTER
===================================== -->
<aside class="left-sidebar sidebar-dark" id="left-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('images/dashboard/logo.png') }}" alt="Mono">
                <span class="brand-name">LOGO</span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-left" data-simplebar style="height: 100%;">
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                {{-- dashboard --}}
                <li>
                    <a class="sidenav-item-link" href="{{ route('dashboard') }}">
                        <i class="mdi mdi-view-grid"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>

                {{-- booking --}}
                <li>
                    <a class="sidenav-item-link" href="#">
                        <i class="mdi mdi-account"></i>
                        <span class="nav-text">Bookings</span>
                    </a>
                </li>

                {{-- setting --}}
                <li>
                    <a class="sidenav-item-link" href="#">
                        <i class="mdi mdi-settings"></i>
                        <span class="nav-text">Setting</span>
                    </a>
                </li>

                {{-- <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#customization" aria-expanded="false" aria-controls="customization">
                        <i class="mdi mdi-square-edit-outline"></i>
                        <span class="nav-text">Customization</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="customization" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="#">
                                    <span class="nav-text">Navbar</span>
                                </a>
                            </li>

                            <li>
                                <a class="sidenav-item-link" href="#">
                                    <span class="nav-text">Sidebar</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="#">
                                    <span class="nav-text">Styling</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li> --}}

            </ul>
        </div>
    </div>
</aside>