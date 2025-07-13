<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SDN 1 KERTAJAYA - Sistem Informasi Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f5f5dc; /* Warna cream */
            scroll-behavior: smooth; /* Efek scroll halus */
        }

        .navbar {
            background-color: #f5f5dc; /* Warna cream */
            border-bottom: 2px solid #8B4513; /* Coklat tua */
            z-index: 9999;
        }

        .navbar .nav-link {
            color: #8B4513; /* Coklat tua */
        }

        .navbar .nav-link.active {
            font-weight: bold;
        }

        .gallery-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s;
        }

        .gallery-img:hover {
            transform: scale(1.05);
        }

        h1, h2, h5 {
            font-family: 'Arial', sans-serif; /* Font modern */
        }

        footer {
            background-color: #8B4513; /* Coklat tua */
            color: white;
        }

        .bg-gallery {
            background-color: #e8cba0; /* Coklat muda untuk galeri */
        }

        .section {
            padding: 5rem 0; /* Padding untuk setiap section */
        }

        .logo {
            width: 250px; /* Ukuran logo diperbesar */
        }

        .contact-card {
            background-color: #f5f5dc; /* Warna cream untuk kartu kontak */
            border: 1px solid #8B4513; /* Coklat tua */
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s;
        }

        .contact-card:hover {
            transform: scale(1.05);
        }

        .contact-icon {
            font-size: 2rem;
            color: #8B4513; /* Coklat tua */
        }

        .map-container {
            margin-top: 20px;
            border: 1px solid #8B4513; /* Coklat tua */
            border-radius: 10px;
            overflow: hidden;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#home">SDN 1 KERTAJAYA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="#home">Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="#gallery">Galeri</a></li>
                <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Beranda dan Profil -->
<section id="home" class="section text-center bg-light">
    <div class="container">
        <h1 class="mb-3">SELAMAT DATANG DI SISTEM INFORMASI SEKOLAH</h1>
        <p class="lead">SDN 1 KERTAJAYA - Terwujudnya peserta didik yang agamis, cerdas, cakap, kreatif, dan mandiri.</p>
        
        <h2 class="mb-4">Profil Sekolah</h2>
        <img src="{{ asset('images/logo.jpg') }}" alt="Logo Sekolah" class="logo mb-4">
      <div class="row mt-4">
    <!-- Visi -->
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body text-start">
                <h5 class="card-title">Visi</h5>
                <p class="card-text">Terwujudnya peserta didik yang agamis, cerdas, cakap, kreatif, dan mandiri.</p>
            </div>
        </div>
    </div>

    <!-- Misi -->
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body text-start">
                <h5 class="card-title">Misi</h5>
                <ol class="card-text">
                    <li>Membangun nilai-nilai luhur dalam iman, takwa, dan budi pekerti.</li>
                    <li>Mengembangkan keunggulan pendidikan berbasis teknologi & informasi.</li>
                    <li>Meningkatkan ilmu pengetahuan, teknologi, sosial, budaya, dan ekonomi.</li>
                    <li>Mengimplementasikan profil pelajar Pancasila dalam kehidupan.</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- Tujuan -->
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body text-start">
                <h5 class="card-title">Tujuan</h5>
                <p>Menanamkan dasar kecerdasan, akhlak, keterampilan, dan kepribadian yang mencerminkan pelajar Pancasila.</p>
                <ul>
                    <li>Mengamalkan ajaran agama melalui pembiasaan dan kegiatan belajar.</li>
                    <li>Menumbuhkan sikap disiplin, budi pekerti, dan kepedulian sosial.</li>
                    <li>Menghasilkan prestasi akademik dan non-akademik tingkat daerah/nasional.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

    </div>
</section>

<!-- Galeri -->
<section id="gallery" class="section bg-gallery">
    <div class="container">
        <h2 class="text-center mb-4">Galeri Sekolah</h2>
        <div class="row">
            @for ($i = 1; $i <= 6; $i++)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/foto' . $i . '.jpeg') }}" class="gallery-img card-img-top" alt="Galeri {{ $i }}">
                </div>
            </div>
            @endfor
        </div>
    </div>
</section>

<!-- Kontak -->
<section id="kontak" class="section bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Kontak Sekolah</h2>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="contact-card">
                    <i class="fas fa-envelope contact-icon"></i>
                    <h5>Email</h5>
                    <p>sdn1kertajaya@example.com</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="contact-card">
                    <i class="fas fa-phone contact-icon"></i>
                    <h5>Telepon</h5>
                    <p>0821-1234-5678</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="contact-card">
                    <i class="fab fa-instagram contact-icon"></i>
                    <h5>Instagram</h5>
                    <p>@sdn1kertajaya</p>
                </div>
            </div>
        </div>
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.3422868620396!2d107.48987187499586!3d-6.8495092931487696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e358111b5be5%3A0xb6713b9128265106!2sSD%20Negeri%201%20Kertajaya!5e0!3m2!1sid!2sid!4v1751458576621!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="text-white text-center py-3">
    <div class="container">
        &copy; {{ date('Y') }} SDN 1 KERTAJAYA. All rights reserved.
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
