<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    {{-- url title --}}
    <title>@yield('title')</title>

    <!-- FONTS -->
    <link href="{{ asset('css/font-family/stylesheet.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/material/css/materialdesignicons.min.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('plugins/material/css/material.css') }}" rel="stylesheet" /> --}}
    <link href="{{ asset('plugins/simplebar/simplebar.css') }}" rel="stylesheet" />

    {{-- Bootstrap adn CSS --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/library/cdn.bootstrap@5.3.0.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/library/style.css') }}">

    <!-- FAVICON -->
    <link href="{{ asset('images/dashboard/favicon.png') }}" rel="shortcut icon" />

    {{-- custom stylesheet --}}
    @yield('stylesheet') 
</head>

<body class="navbar-fixed sidebar-fixed" id="body">

    <!-- ====================================
                ——— WRAPPER
    ===================================== -->
    <div class="wrapper">

        {{-- sidebar --}}
        @include('dashboard.partials.sidebar')

        <!-- ====================================
                    ——— PAGE WRAPPER
        ===================================== -->
        <div class="page-wrapper">

            <!-- Header -->
            @include('dashboard.partials.header')

            <!-- ====================================
                    ——— CONTENT WRAPPER
            ===================================== -->
            <div class="content-wrapper">
                <div class="content">
                    @yield('content')
                </div>
            </div>

            <!-- Footer -->
            @include('dashboard.partials.footer')

        </div>
    </div>

    <!-- jquery adn bootstrap -->
    <script src="{{ asset('js/library/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- scroll sidebar -->
    <script src="{{ asset('plugins/simplebar/simplebar.min.js') }}"></script>
    <!-- for btn hide and show sidebar to small or large -->
    <script src="{{ asset('js/dashboard/mono.js') }}"></script>

    {{-- Global Access Helper --}}
    <script>
        const ApiUrl     = "{!! url('api') !!}",
              WebsiteUrl = "{!! url('') !!}",
              ApiToken   = "{!! csrf_token() !!}";
    </script>
    {{-- custom script --}}
    @yield('script') 
</body>

</html>