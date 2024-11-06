<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta20
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Admin | @yield('title')</title>
    <!-- CSS files -->
    <link href="{{ asset('./dist/css/tabler.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('./dist/css/tabler-flags.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('./dist/css/tabler-payments.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('./dist/css/tabler-vendors.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('./dist/css/demo.min.css?1692870487') }}" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.5/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
</head>

<body>
    <script src="{{ asset('./dist/js/demo-theme.min.js?1692870487') }}"></script>
    <div class="page">
        <!-- Navbar -->
        <header class="navbar navbar-expand-md d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                    aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="#" class="text-decoration-none">
                        <span class="text-primary">360<sup>o</sup></span> APP
                    </a>
                </h1>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="d-none d-md-flex pe-3">
                        <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode"
                            data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                            </svg>
                        </a>
                        <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode"
                            data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                <path
                                    d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                            </svg>
                        </a>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                            aria-label="Open user menu">
                            <span class="avatar avatar-sm"
                                style="background-image: url({{ asset('./static/avatars/000m.jpg') }})"></span>
                            <div class="d-none d-xl-block ps-2">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="mt-1 small text-secondary">{{ Auth::user()->role }}</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <header class="navbar-expand-md">
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="navbar">
                    <div class="container-xl">
                        <ul class="navbar-nav">
                            <!-- Dashboard Menu -->
                            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('dashboard') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <i class="ti ti-dashboard fs-2"></i>
                                    </span>
                                    <span class="nav-link-title">
                                        Dashboard
                                    </span>
                                </a>
                            </li>

                            <!-- Formulir Kuisioner Menu, visible to all roles -->
                            <li class="nav-item {{ request()->routeIs('quiz.index') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('quiz.index') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <i class="ti ti-list-details fs-2"></i>
                                    </span>
                                    <span class="nav-link-title">
                                        Formulir Kuisioner
                                    </span>
                                </a>
                            </li>

                            <!-- Menu hanya untuk Admin -->
                            @if (auth()->user()->hasRole('admin'))
                                <li class="nav-item {{ request()->routeIs('kuisioner.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('kuisioner.index') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="ti ti-message-question fs-2"></i>
                                        </span>
                                        <span class="nav-link-title">
                                            Kuisioner
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('respon.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('respon.index') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="ti ti-users fs-2"></i>
                                        </span>
                                        <span class="nav-link-title">
                                            Responden
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('kriteria.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('kriteria.index') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="ti ti-ruler-measure-2 fs-2"></i>
                                        </span>
                                        <span class="nav-link-title">
                                            Kriteria
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('analisis.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('analisis.index') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="ti ti-presentation-analytics fs-2"></i>
                                        </span>
                                        <span class="nav-link-title">
                                            Hasil Analisis
                                        </span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <div class="page-wrapper">
            <!-- Page header -->
            <!-- Page body -->
            @yield('content')
            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-lg-auto ms-lg-auto">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item"><a href="https://tabler.io/docs" target="_blank"
                                        class="link-secondary" rel="noopener">Documentation</a></li>
                                <li class="list-inline-item"><a href="./license.html"
                                        class="link-secondary">License</a></li>
                                <li class="list-inline-item"><a href="https://github.com/tabler/tabler"
                                        target="_blank" class="link-secondary" rel="noopener">Source code</a></li>
                                <li class="list-inline-item">
                                    <a href="https://github.com/sponsors/codecalm" target="_blank"
                                        class="link-secondary" rel="noopener">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon text-pink icon-filled icon-inline" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                        </svg>
                                        Sponsor
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright &copy; 2023
                                    <a href="." class="link-secondary">Tabler</a>.
                                    All rights reserved.
                                </li>
                                <li class="list-inline-item">
                                    <a href="./changelog.html" class="link-secondary" rel="noopener">
                                        v1.0.0-beta20
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('./dist/libs/apexcharts/dist/apexcharts.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('./dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('./dist/libs/jsvectormap/dist/maps/world.js?1692870487') }}" defer></script>
    <script src="{{ asset('./dist/libs/jsvectormap/dist/maps/world-merc.js?1692870487') }}" defer></script>
    <!-- Tabler Core -->
    <script src="{{ asset('./dist/js/tabler.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('./dist/js/demo.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('./dist/libs/tinymce/tinymce.min.js?1692870487') }}" defer></script>
    <script>
        new DataTable('#example', {
            responsive: true
        });
    </script>
    @stack('analyze')
</body>

</html>
