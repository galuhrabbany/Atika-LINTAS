<style>
    .nav-link-hover {
        position: relative;
        transition: color 0.3s ease;
    }

    .nav-link-hover::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 0%;
        height: 2px;
        background-color: #ffc107;
        /* Kuning */
        transition: width 0.3s ease;
    }

    .nav-link-hover:hover {
        color: #ffc107 !important;
        /* Teks jadi kuning */
    }

    .nav-link-hover:hover::after {
        width: 100%;
    }

    .navbar-brand:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease;
        color: #ffeb3b !important;
    }
</style>

<!-- resources/views/partials/navbar.blade.php -->
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background: linear-gradient(90deg, #1b5e20, #2e7d32);">
    <div class="container">
        <a class="navbar-brand fw-bold text-warning d-flex align-items-center" href="#">
            <i class="fa-solid fa-leaf me-2"></i> {{ $title ?? 'WebGIS' }}
        </a>
        <button class="navbar-toggler border-warning" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item mx-2">
                    <a class="nav-link nav-link-hover" href="{{ route('home') }}">
                        <i class="fa-solid fa-house me-1 text-warning"></i> Beranda
                    </a>
                </li>
                @auth
                <li class="nav-item mx-2">
                    <a class="nav-link nav-link-hover" href="{{ route('map') }}">
                        <i class="fa-solid fa-map-location-dot me-1 text-warning"></i> Form Laporan
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link nav-link-hover" href="{{ route('table') }}">
                        <i class="fa-solid fa-table me-1 text-warning"></i> Riwayat Laporan
                    </a>
                </li>

                    <li class="nav-item mx-2">
                        <a class="nav-link nav-link-hover" href="{{ route('data') }}">
                            <i class="fa-solid fa-circle-info me-1 text-warning"></i>Kontak & Informasi
                        </a>
                    </li>
                    <li class="nav-item mx-2">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn nav-link text-danger fw-semibold" type="submit">
                                <i class="fa-solid fa-right-from-bracket me-1"></i> Logout
                            </button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li class="nav-item mx-2">
                        <a class="nav-link nav-link-hover" href="{{ route('login') }}">
                            <i class="fa-solid fa-right-to-bracket text-warning me-1"></i> Login
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
