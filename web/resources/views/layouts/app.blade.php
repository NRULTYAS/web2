<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Sistem Informasi Sekolah')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5dc; /* Warna cream */
        }

        .navbar {
            background-color: #f5f5dc; /* Warna cream */
            border-bottom: 2px solid #8B4513; /* Coklat tua */
        }

        .navbar .nav-link {
            color: #8B4513 !important; /* Coklat tua */
        }

        .navbar .nav-link.active {
            font-weight: bold;
        }

        .btn-link.nav-link {
            color: #8B4513 !important;
        }

        .container {
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand text-dark fw-bold" href="/">SDN 1 KERTAJAYA</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                        @if(Auth::user()->role === 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/admin/dashboard') }}">Dashboard Admin</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/siswa/dashboard') }}">Dashboard Siswa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/siswa/pengumuman') }}">Pengumuman</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link" style="display:inline;">Logout</button>
                            </form>
                        </li>
                    @endauth

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    {{-- Konten halaman --}}
    <div class="container">
        @yield('content')
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
