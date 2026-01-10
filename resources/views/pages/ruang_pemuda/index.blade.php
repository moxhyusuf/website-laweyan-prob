@extends('layout.app')

@section('title', 'Ruang Pemuda')
@section('content')

<main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="current">Ruang Pemuda</li>
                </ol>
            </nav>
        </div>
    </div>

</main>

<section id="testimonials" class="testimonials section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Ruang Pemuda</h2>
        <p>Kumpulan kegiatan dan ruang yang digunakan oleh pemuda Desa Laweyan.</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">

            <script type="application/json" class="swiper-config">
                {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                        "delay": 5000
                    },
                    "slidesPerView": "auto",
                    "pagination": {
                        "el": ".swiper-pagination",
                        "type": "bullets",
                        "clickable": true
                    }
                }
            </script>

            <div class="swiper-wrapper">

                @foreach ($item as $row)
                <div class="swiper-slide">
                    <div class="testimonial-item">

                        <img src="{{ asset('storage/ruang_pemuda/' . $row->img) }}"
                            class="testimonial-img"
                            alt="{{ $row->nama }}">

                        <h3>{{ $row->nama }}</h3>
                        <h4>{{ $row->keterangan }}</h4>

                        <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>

                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>{{ $row->keterangan }}</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>

                    </div>
                </div>
                @endforeach

            </div>

            <div class="swiper-pagination"></div>
        </div>

    </div>

</section>

@endsection