@extends('layout.app')

@section('title', 'Galeri Desa')

@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="current">Galeri Desa</li>
                </ol>
            </nav>
            <h1>Galeri Desa</h1>
        </div>
    </div>

    <section id="portfolio" class="portfolio section">
        <div class="container">

            <!-- FILTER -->
            <ul class="portfolio-filters isotope-filters text-center mb-4"
                data-aos="fade-up" data-aos-delay="100">
                <li data-filter="*" class="filter-active">Semua</li>
                <li data-filter=".kegiatan">Kegiatan</li>
                <li data-filter=".event">Event</li>
                <li data-filter=".pembangunan">Pembangunan</li>
                <li data-filter=".lain-lain">Lain-lain</li>
            </ul>

            <!-- GALERI -->
            <div class="row gy-4 isotope-container"
                 data-aos="fade-up" data-aos-delay="200">

                @foreach ($item as $row)
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item {{ strtolower($row->kategori) }}">
                        <img src="{{ asset('storage/' . $row->gambar) }}"
                             class="img-fluid" alt="{{ $row->judul }}">

                        <div class="portfolio-info">
                            <h4>{{ $row->judul }}</h4>
                            <p>{{ $row->deskripsi }}</p>

                            <a href="{{ asset('storage/' . $row->gambar) }}"
                               class="glightbox preview-link"
                               data-gallery="portfolio-gallery"
                               title="{{ $row->judul }}">
                                <i class="bi bi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>

</main>
@endsection
