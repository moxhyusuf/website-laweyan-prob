@extends('layout.app')

@section('title', 'Detail Pembangunan')

@section('content')

<style>
:root {
    --primary-color: #f59e0b;
    --primary-dark: #d97706;
    --primary-light: #fbbf24;
    --accent-color: #ea580c;
    --text-dark: #78350f;
    --text-gray: #92400e;
    --text-light: #a16207;
    --bg-light: #fffbeb;
    --bg-white: #ffffff;
    --border-color: #fde68a;
}

/* ================= PAGE TITLE ================= */
.page-title {
    background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 50%, #ea580c 100%);
    padding: 80px 0 60px;
    margin-bottom: 0;
    position: relative;
    overflow: hidden;
}

.page-title::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    opacity: 0.4;
}

.page-title .container {
    position: relative;
    z-index: 1;
}

.page-title .breadcrumbs ol {
    display: flex;
    gap: 10px;
    padding: 0;
    margin: 0;
    list-style: none;
}

.page-title .breadcrumbs ol li {
    color: rgba(255,255,255,.85);
    font-size: 14px;
}

.page-title .breadcrumbs ol li a {
    color: #fff;
    text-decoration: none;
    transition: opacity .2s;
    font-weight: 500;
}

.page-title .breadcrumbs ol li a:hover {
    opacity: .8;
}

.page-title .breadcrumbs ol li::after {
    content: '/';
    margin-left: 10px;
    color: rgba(255,255,255,.6);
}

.page-title .breadcrumbs ol li:last-child::after {
    display: none;
}

/* ================= DETAIL SECTION ================= */
.pembangunan-detail-section {
    background: #f8f9fa;
    padding: 60px 0 80px;
}

.detail-card {
    background: var(--bg-white);
    border-radius: 20px;
    padding: 0;
    border: 1px solid var(--border-color);
    box-shadow: 0 8px 30px rgba(245, 158, 11, .12);
    overflow: hidden;
}

/* ================= CAROUSEL ================= */
.carousel-wrapper {
    position: relative;
    border-radius: 20px 20px 0 0;
    overflow: hidden;
    background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
}

.carousel-inner {
    border-radius: 0;
}

.carousel-item img {
    width: 100%;
    height: 500px;
    object-fit: cover;
    display: block;
}

.carousel-control-prev,
.carousel-control-next {
    width: 50px;
    height: 50px;
    background: rgba(245, 158, 11, .9);
    border-radius: 50%;
    top: 50%;
    transform: translateY(-50%);
    opacity: 0;
    transition: all .3s ease;
}

.carousel-wrapper:hover .carousel-control-prev,
.carousel-wrapper:hover .carousel-control-next {
    opacity: 1;
}

.carousel-control-prev {
    left: 20px;
}

.carousel-control-next {
    right: 20px;
}

.carousel-control-prev:hover,
.carousel-control-next:hover {
    background: var(--primary-dark);
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    width: 20px;
    height: 20px;
}

.carousel-indicators {
    margin-bottom: 20px;
}

.carousel-indicators [data-bs-target] {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, .5);
    border: 2px solid rgba(255, 255, 255, .8);
    transition: all .3s ease;
}

.carousel-indicators .active {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
    transform: scale(1.2);
}

/* ================= CONTENT AREA ================= */
.detail-content {
    padding: 45px;
}

.detail-title {
    font-size: 2.2rem;
    font-weight: 800;
    color: var(--text-dark);
    line-height: 1.3;
    margin-bottom: 25px;
    position: relative;
    padding-bottom: 20px;
}

.detail-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
    border-radius: 2px;
}

.detail-description {
    font-size: 16.5px;
    line-height: 1.9;
    color: #374151;
    margin-bottom: 35px;
    padding: 25px;
    background: var(--bg-light);
    border-radius: 12px;
    border-left: 4px solid var(--primary-color);
}

.detail-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-bottom: 30px;
    padding: 20px;
    background: #f9fafb;
    border-radius: 12px;
}

.detail-meta-item {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 14px;
    color: #6b7280;
}

.detail-meta-item i {
    color: var(--primary-color);
    font-size: 18px;
}

.detail-meta-item strong {
    color: var(--text-dark);
}

/* ================= BUTTON ================= */
.btn-back {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 14px 32px;
    background: var(--primary-color);
    color: #fff;
    border: none;
    border-radius: 12px;
    font-size: 15px;
    font-weight: 600;
    text-decoration: none;
    transition: all .3s ease;
    box-shadow: 0 4px 12px rgba(245, 158, 11, .25);
    margin-top: 10px;
}

.btn-back:hover {
    background: var(--primary-dark);
    color: #fff;
    transform: translateX(-4px);
    box-shadow: 0 6px 20px rgba(245, 158, 11, .4);
}

.btn-back i {
    font-size: 18px;
    transition: transform .3s ease;
}

.btn-back:hover i {
    transform: translateX(-4px);
}

/* ================= NO IMAGE STATE ================= */
.no-image-state {
    height: 500px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
    border-radius: 20px 20px 0 0;
}

.no-image-state i {
    font-size: 80px;
    color: var(--border-color);
    margin-bottom: 20px;
}

.no-image-state p {
    font-size: 18px;
    color: #9ca3af;
    font-weight: 600;
}

/* ================= IMAGE COUNTER ================= */
.image-counter {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(0, 0, 0, .7);
    color: #fff;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
    z-index: 10;
    backdrop-filter: blur(10px);
}

/* ================= RESPONSIVE ================= */
@media (max-width: 991px) {
    .page-title {
        padding: 70px 0 50px;
    }
    
    .pembangunan-detail-section {
        padding: 40px 0 60px;
    }
    
    .carousel-item img {
        height: 400px;
    }
    
    .detail-content {
        padding: 35px 30px;
    }
    
    .detail-title {
        font-size: 1.9rem;
    }
}

@media (max-width: 767px) {
    .page-title {
        padding: 60px 0 40px;
    }
    
    .pembangunan-detail-section {
        padding: 30px 0 50px;
    }
    
    .carousel-item img {
        height: 300px;
    }
    
    .no-image-state {
        height: 300px;
    }
    
    .no-image-state i {
        font-size: 60px;
    }
    
    .detail-content {
        padding: 28px 24px;
    }
    
    .detail-title {
        font-size: 1.6rem;
    }
    
    .detail-description {
        font-size: 15px;
        padding: 20px;
    }
    
    .carousel-control-prev,
    .carousel-control-next {
        width: 40px;
        height: 40px;
    }
    
    .carousel-control-prev {
        left: 10px;
    }
    
    .carousel-control-next {
        right: 10px;
    }
}

/* ================= ANIMATION ================= */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.detail-card {
    animation: fadeIn .6s ease-out;
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}
</style>

<main class="main">

    {{-- HEADER --}}
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ route('pembangunan.frontend') }}">Pembangunan Desa</a></li>
                    <li class="current">{{ Str::limit($pembangunan->judul, 50) }}</li>
                </ol>
            </nav>
        </div>
    </div>

</main>

<section class="pembangunan-detail-section">
    <div class="container">

        <div class="detail-card">

            {{-- GALERI FOTO --}}
            <div class="carousel-wrapper" data-aos="fade-up">

                @if ($pembangunan->media->count())
                    
                    {{-- Image Counter --}}
                    <div class="image-counter">
                        <i class="bi bi-images"></i>
                        {{ $pembangunan->media->count() }} Foto
                    </div>

                    <div id="carouselPembangunan" class="carousel slide" data-bs-ride="carousel">
                        
                        {{-- Carousel Inner --}}
                        <div class="carousel-inner">
                            @foreach ($pembangunan->media as $key => $media)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/'.$media->file_path) }}"
                                         alt="Foto Pembangunan {{ $key + 1 }}"
                                         loading="lazy">
                                </div>
                            @endforeach
                        </div>

                        {{-- Controls --}}
                        @if($pembangunan->media->count() > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselPembangunan" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselPembangunan" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                                <span class="visually-hidden">Next</span>
                            </button>

                            {{-- Indicators --}}
                            <div class="carousel-indicators">
                                @foreach ($pembangunan->media as $key => $media)
                                    <button type="button" 
                                            data-bs-target="#carouselPembangunan" 
                                            data-bs-slide-to="{{ $key }}" 
                                            class="{{ $key == 0 ? 'active' : '' }}"
                                            aria-label="Slide {{ $key + 1 }}">
                                    </button>
                                @endforeach
                            </div>
                        @endif

                    </div>

                @else
                    <div class="no-image-state">
                        <i class="bi bi-image"></i>
                        <p>Tidak ada foto pembangunan tersedia</p>
                    </div>
                @endif

            </div>

            {{-- DESKRIPSI --}}
            <div class="detail-content" data-aos="fade-up" data-aos-delay="100">

                <h1 class="detail-title">
                    {{ $pembangunan->judul }}
                </h1>

                {{-- Meta Info (Optional - jika ada data tambahan) --}}
                {{-- <div class="detail-meta">
                    <div class="detail-meta-item">
                        <i class="bi bi-calendar-check"></i>
                        <span><strong>Tahun:</strong> 2024</span>
                    </div>
                    <div class="detail-meta-item">
                        <i class="bi bi-geo-alt"></i>
                        <span><strong>Lokasi:</strong> Desa Laweyan</span>
                    </div>
                    <div class="detail-meta-item">
                        <i class="bi bi-cash-stack"></i>
                        <span><strong>Anggaran:</strong> Rp 500.000.000</span>
                    </div>
                </div> --}}

                <div class="detail-description">
                    {{ $pembangunan->keterangan }}
                </div>

                <a href="{{ url()->previous() }}" class="btn-back">
                    <i class="bi bi-arrow-left"></i>
                    Kembali ke Daftar
                </a>

            </div>

        </div>

    </div>
</section>

@endsection