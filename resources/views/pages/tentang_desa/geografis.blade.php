@extends('layout.app')

@section('title', 'geografis')
@section('content')

<!-- Section SEJARAH DESA LAWEYAN -->
<main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html"></a></li>
                    <li class="current"></li>
                </ol>
            </nav>

        </div>
    </div><!-- End Page Title -->



</main>

<section id="geografis" class="about section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>🌍 Geografis Desa</h2>
    </div>
    <!-- End Section Title -->

    <div class="container">

        <!-- Deskripsi + Peta -->
        <div class="row g-4 mb-5">
            <div class="col-md-6">
                <div class="card shadow p-4 h-100">
                    <p>
                        Laweyan merupakan salah satu desa yang berada di wilayah Kecamatan Sumberasih,
                        berlokasi 12 km di arah barat Kota Kabupaten Probolinggo. Desa ini memiliki luas
                        <strong>186 Ha</strong>, terdiri dari <span class="text-success fw-bold">105 Ha tanah sawah 🌾</span>
                        dan <span class="text-warning fw-bold">81 Ha tanah kering 🌳</span>.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Peta Google Maps -->
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12645.844993083345!2d113.16366148015034!3d-7.7903470349008845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7b2be4f496587%3A0xe0ef5625f39a1563!2sLaweyan%2C%20Kec.%20Sumberasih%2C%20Kabupaten%20Probolinggo%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1757560871726!5m2!1sid!2sid"
                    width="100%" height="300" style="border:0;"
                    allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>

        <!-- Batas Wilayah -->
        <div class="row g-3">
            <div class="col-md-6">
                <div class="card p-3 bg-primary-subtle">
                    <h5>🧭 Sebelah Utara</h5>
                    <p>Kelurahan Triwung Kidul, Kecamatan Kademangan, Kota Probolinggo</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-3 bg-primary-subtle">
                    <h5>🧭 Sebelah Timur</h5>
                    <p>Desa Pohsangit Leres, Kecamatan Sumberasih</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-3 bg-primary-subtle">
                    <h5>🧭 Sebelah Selatan</h5>
                    <p>Desa Muneng Kidul, Kecamatan Sumberasih</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-3 bg-primary-subtle">
                    <h5>🧭 Sebelah Barat</h5>
                    <p>Desa Muneng, Kecamatan Sumberasih</p>
                </div>
            </div>
        </div>

    </div>

</section>

@endsection