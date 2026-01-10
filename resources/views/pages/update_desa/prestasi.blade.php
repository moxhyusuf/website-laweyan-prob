@extends('layout.app')

@section('title', 'Prestasi Desa')

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
    --shadow-sm: 0 1px 3px rgba(245,158,11,.08);
    --shadow-md: 0 4px 12px rgba(245,158,11,.08);
    --shadow-lg: 0 10px 30px rgba(245,158,11,.12);
}

/* ================= PAGE TITLE ================= */
.page-title {
    background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 50%, #ea580c 100%);
    padding: 80px 0 60px;
    margin-bottom: 60px;
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

.page-title h1 {
    color: #fff;
    font-size: 42px;
    font-weight: 800;
    margin-top: 12px;
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

/* ================= SECTION HEADER ================= */
#prestasi {
    background: #f8f9fa;
    padding: 30px 0 80px;
}

.section-header {
    text-align: center;
    margin-bottom: 40px;
    padding-top: 0;
}

.section-header h2 {
    font-size: 38px;
    font-weight: 800;
    color: var(--text-dark);
    margin-bottom: 15px;
    position: relative;
    display: inline-block;
}

.section-header h2::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
    border-radius: 2px;
}

.section-header p {
    font-size: 16px;
    color: #6c757d;
    max-width: 600px;
    margin: 25px auto 0;
    line-height: 1.6;
}

/* ================= CARD PRESTASI ================= */
.prestasi-card {
    background: var(--bg-white);
    border-radius: 18px;
    border: 1px solid var(--border-color);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    height: 100%;
    transition: all .3s cubic-bezier(.4,0,.2,1);
    position: relative;
}

.prestasi-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
    transform: scaleX(0);
    transition: transform .3s ease;
}

.prestasi-card:hover::before {
    transform: scaleX(1);
}

.prestasi-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(245, 158, 11, .15);
    border-color: var(--primary-light);
}

/* ================= IMAGE WRAPPER ================= */
.prestasi-img-wrapper {
    width: 100%;
    height: 240px;
    overflow: hidden;
    background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
    flex-shrink: 0;
    position: relative;
}

.prestasi-img-wrapper::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,.3), transparent 60%);
    opacity: 0;
    transition: opacity .3s ease;
}

.prestasi-card:hover .prestasi-img-wrapper::after {
    opacity: 1;
}

.prestasi-img-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    display: block;
    transition: transform .5s cubic-bezier(.4,0,.2,1);
}

.prestasi-card:hover .prestasi-img-wrapper img {
    transform: scale(1.1);
}

/* ================= CARD CONTENT ================= */
.prestasi-card .card-body {
    padding: 28px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}

.prestasi-card h5 {
    font-size: 20px;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 12px;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    min-height: 56px;
}

.prestasi-card .date-info {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 13px;
    color: var(--primary-color);
    font-weight: 600;
    margin-bottom: 14px;
    padding: 6px 12px;
    background: var(--bg-light);
    border-radius: 8px;
    width: fit-content;
}

.prestasi-card .date-info i {
    font-size: 14px;
}

.prestasi-card .description {
    font-size: 14.5px;
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 20px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    flex-grow: 1;
}

/* ================= BUTTON ================= */
.btn-detail {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 24px;
    background: var(--primary-color);
    color: #fff;
    border: none;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    transition: all .3s ease;
    align-self: flex-start;
    margin-top: auto;
    box-shadow: 0 2px 8px rgba(245, 158, 11, .25);
}

.btn-detail:hover {
    background: var(--primary-dark);
    color: #fff;
    transform: translateX(4px);
    box-shadow: 0 4px 12px rgba(245, 158, 11, .35);
}

.btn-detail i {
    font-size: 16px;
    transition: transform .3s ease;
}

.btn-detail:hover i {
    transform: translateX(4px);
}

/* ================= EMPTY STATE ================= */
.empty-state {
    text-align: center;
    padding: 80px 20px;
}

.empty-state i {
    font-size: 80px;
    color: var(--border-color);
    margin-bottom: 20px;
    display: block;
}

.empty-state p {
    font-size: 18px;
    color: #94a3b8;
    font-style: italic;
}

/* ================= BADGE (optional) ================= */
.prestasi-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: rgba(255, 255, 255, .95);
    color: var(--primary-color);
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    z-index: 2;
    box-shadow: 0 2px 8px rgba(0,0,0,.1);
}

/* ================= RESPONSIVE ================= */
@media (max-width: 991px) {
    .page-title {
        padding: 70px 0 50px;
    }
    
    .page-title h1 {
        font-size: 32px;
    }
    
    .section-header h2 {
        font-size: 32px;
    }
    
    #prestasi {
        padding: 25px 0 60px;
    }
}

@media (max-width: 767px) {
    .prestasi-img-wrapper {
        height: 220px;
    }
    
    .prestasi-card .card-body {
        padding: 24px;
    }
    
    .page-title h1 {
        font-size: 28px;
    }
    
    .section-header h2 {
        font-size: 28px;
    }
    
    #prestasi {
        padding: 20px 0 60px;
    }
}

/* ================= ANIMATION ================= */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.prestasi-card {
    animation: fadeInUp .6s ease-out;
}
</style>

<main class="main">

    {{-- HEADER --}}
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li class="current">Prestasi Desa</li>
                </ol>
            </nav>
            <h1>Prestasi Desa</h1>
        </div>
    </div>

</main>

<section id="prestasi">

    <div class="container">

        {{-- SECTION HEADER --}}
        <div class="section-header" data-aos="fade-up">
            <h2>Prestasi & Penghargaan Desa</h2>
            <p>
                Dokumentasi berbagai prestasi dan pencapaian yang telah diraih untuk kemajuan dan kebanggaan masyarakat desa.
            </p>
        </div>

        {{-- CARDS GRID --}}
        <div class="row g-4">

            @forelse ($prestasi as $item)

            <div class="col-lg-4 col-md-6"
                 data-aos="zoom-in"
                 data-aos-delay="{{ $loop->iteration * 100 }}">

                <div class="prestasi-card">

                    {{-- FOTO --}}
                    <div class="prestasi-img-wrapper">
                        <img src="{{ asset('storage/'.$item->foto_utama) }}"
                             alt="{{ $item->judul }}"
                             loading="lazy">
                    </div>

                    {{-- KONTEN --}}
                    <div class="card-body">

                        <h5>{{ $item->judul }}</h5>

                        <div class="date-info">
                            <i class="bi bi-calendar-event"></i>
                            {{ $item->tanggal }}
                        </div>

                        <p class="description">
                            {{ $item->deskripsi }}
                        </p>

                        <a href="{{ route('prestasi.show', $item->id) }}"
                           class="btn-detail">
                            Lihat Detail
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>
                </div>
            </div>

            @empty

            <div class="col-12">
                <div class="empty-state">
                    <i class="bi bi-trophy"></i>
                    <p>Belum ada data prestasi yang tersedia</p>
                </div>
            </div>

            @endforelse

        </div>

    </div>

</section>

@endsection