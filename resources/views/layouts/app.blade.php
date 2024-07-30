<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title', 'Dashboard') - {{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/png">

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <nav class="sb-topnav navbar navbar-expand navbar-light bg-light shadow-sm">
        <a class="navbar-brand d-flex align-items-center justify-content-center gap-2" href="{{ route('dashboard') }}">
            <img src="{{ asset('images/logo.png') }}" alt="logo" height="30">
            <span style="font-size: 18px; font-weight: 500">SMAN 1 MONTASIK</span>
        </a>

        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
            <i class="fas fa-bars"></i>
        </button>

        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></div>

        <div class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <div class="d-flex align-items-center">
                <span class="d-none d-md-inline me-2">{{ auth()->user()->name }}</span>
                <i class="fas fa-user fa-fw"></i>
            </div>
        </div>
    </nav>

    <div id="layoutSidenav">
        @include('layouts.navigation')

        <div id="layoutSidenav_content">
            <main class="overflow-auto" style="height: calc(100dvh - 56px); background: #ececec">
                <div class="container-fluid px-4 pb-4">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>

    @stack('scripts')
</body>

</html>
