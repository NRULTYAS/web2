<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SDN 1 KERTAJAYA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5dc;
        }

        .login-container {
            margin-top: 100px;
        }

        .card {
            border: 1px solid #8B4513;
            background-color: #fff8dc;
        }

        .btn-login {
            background-color: #8B4513;
            color: white;
        }

        .btn-login:hover {
            background-color: #a0522d;
        }

        .navbar {
            background-color: #f5f5dc;
            border-bottom: 2px solid #8B4513;
            z-index: 9999;
        }

        .navbar .nav-link {
            color: #8B4513;
        }

        .navbar .nav-link.active {
            font-weight: bold;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="/">SDN 1 KERTAJAYA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/">Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="/#gallery">Galeri</a></li>
                <li class="nav-item"><a class="nav-link" href="/#kontak">Kontak</a></li>
                <li class="nav-item"><a class="nav-link active" href="/login">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="/register">Daftar</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Login Form -->
<div class="container login-container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h4>Login Akun</h4>
                </div>
                <div class="card-body">

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email / Username</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan email atau username" value="{{ old('email') }}" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan kata sandi" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-login">Login</button>
                        </div>
                        <div class="text-center mt-3">
                            <p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-muted text-center">
                    SDN 1 KERTAJAYA &copy; {{ date('Y') }}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
