<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Utama</div>
                <a class="nav-link  @if (request()->routeIs('dashboard')) active @endif" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-fw fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                @can('is-admin')
                    <a class="nav-link @if (request()->routeIs('ekstrakurikuler*')) active @endif"
                        href="{{ route('ekstrakurikuler.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-fw fa-folder"></i></div>
                        Esktrakulikuler
                    </a>
                @endcan
                <a class="nav-link @if (request()->routeIs('kegiatan*')) active @endif"
                    href="{{ route('kegiatan.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-fw fa-image"></i></div>
                    Galeri Kegiatan
                </a>
                @can('is-admin')
                    <a class="nav-link @if (request()->routeIs('kelas*')) active @endif" href="{{ route('kelas.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-fw fa-landmark"></i></div>
                        Kelas
                    </a>
                @endcan
                <a class="nav-link @if (request()->routeIs('pendaftar*')) active @endif"
                    href="{{ route('pendaftar.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-fw fa-file-signature"></i></div>
                    Pendaftar
                </a>
                @can('is-admin')
                    <a class="nav-link @if (request()->routeIs('users*')) active @endif" href="{{ route('users.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-fw fa-users"></i></div>
                        User
                    </a>
                @endcan


                <div class="sb-sidenav-menu-heading">Aksi</div>
                {{-- <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-fw fa-file"></i></div>
                    Halaman
                </a> --}}
                <a class="nav-link @if (request()->routeIs('profile.edit')) active @endif" href="{{ route('profile.edit') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-fw fa-user-edit"></i></div>
                    Profil
                </a>
                <a class="nav-link" href="javascript:void(0)" onclick="document.getElementById('logout-form').submit()">
                    <div class="sb-nav-link-icon"><i class="fas fa-fw fa-right-from-bracket"></i></div>
                    Keluar
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer text-white">
            <small class="d-block small">Logged in as:</small>
            <strong>{{ Auth::user()->name }}</strong>
        </div>
    </nav>
</div>

<form method="POST" action="{{ route('logout') }}" id="logout-form">
    @csrf
</form>
