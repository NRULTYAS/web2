<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa - SDN 1 KERTAJAYA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5dc;
        }

        .register-container {
            margin-top: 80px;
        }

        .card {
            border: 1px solid #8B4513;
            background-color: #fff8dc;
        }

        .btn-register {
            background-color: #8B4513;
            color: white;
        }

        .btn-register:hover {
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
                <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                <li class="nav-item"><a class="nav-link active" href="/register">Daftar</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Form Register -->
<div class="container register-container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h4>Sign in</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="/register">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Aktif</label>
                            <input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Sandi</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-register">Daftar</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-muted text-center">
                    Sudah punya akun? <a href="/login">Login di sini</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
