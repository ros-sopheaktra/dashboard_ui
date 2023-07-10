{{-- header --}}
<header class="main-header" id="header">
    <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
        <!-- Sidebar toggle button -->
        <button id="sidebar-toggler" class="sidebar-toggle">
            <span class="sr-only">Toggle navigation</span>
        </button>

        <span class="page-title">@yield('page-title')</span>

        <div class="navbar-right ">
            <ul class="nav navbar-nav">
                <!-- User Account -->
                <li class="dropdown user-menu">
                    <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <img src="{{ asset('images/dashboard/user-xs-01.jpg') }}" class="user-image"
                            alt="User Image" />
                        {{-- <span class="d-none d-lg-inline-block">{{ ucwords( Auth::user()->username ) }}</span> --}}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a class="dropdown-link-item" href="#">
                                <i class="mdi mdi-account-outline"></i>
                                <span class="nav-text">My Profile</span>
                            </a>
                        </li>

                        <li class="dropdown-footer">
                            <a class="dropdown-link-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"> 
                              <i class="mdi mdi-logout"></i> Log Out </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>


</header>