<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Beranda') - {{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/png">

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg bg-light shadow-sm" style="min-height: 60px; z-index: 999">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center justify-content-center gap-2"
                href="{{ route('beranda') }}">
                <img src="{{ asset('images/logo.png') }}" alt="logo" height="30">
                <span style="font-size: 18px; font-weight: 500">SMAN 1 MONTASIK</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('beranda') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ekstrakurikuler') }}">Ekstrakurikuler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('galeri') }}">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tentang') }}">Tentang</a>
                    </li>

                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a target="_blank" href="{{ route('dashboard') }}" class="nav-link">
                                    Dashboard
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a target="_blank" href="{{ route('login') }}" class="nav-link">
                                    Login
                                </a>
                            </li>

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a target="_blank" href="{{ route('register') }}" class="nav-link">
                                        Register
                                    </a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div style="min-height: calc(100dvh - 120px)">
        @yield('content')
    </div>

    <footer style="background: #ededed">
        <div class="container text-center py-3">
            <small>
                &copy; SMAN 1 MONTASIK {{ date('Y') }}
            </small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
