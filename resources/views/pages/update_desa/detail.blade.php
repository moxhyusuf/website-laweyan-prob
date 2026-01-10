@extends('layout.app')

@section('title', $berita->judul)

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
    padding: 60px 0 40px;
    margin-bottom: 50px;
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

.page-title .breadcrumbs {
    display: flex;
    gap: 10px;
    align-items: center;
    flex-wrap: wrap;
    margin-bottom: 0;
}

.page-title .breadcrumbs a,
.page-title .breadcrumbs span {
    color: rgba(255,255,255,.9);
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
}

.page-title .breadcrumbs a:hover {
    color: #fff;
    text-decoration: underline;
}

.page-title .breadcrumbs .separator {
    color: rgba(255,255,255,.6);
    margin: 0 5px;
}

/* ================= DETAIL BERITA ================= */
.berita-detail-section {
    background: #f8f9fa;
    padding: 0 0 80px;
}

.berita-detail {
    background: var(--bg-white);
    border-radius: 18px;
    padding: 40px;
    border: 1px solid var(--border-color);
    box-shadow: 0 4px 20px rgba(245, 158, 11, .08);
}

.berita-detail-img {
    margin-bottom: 35px;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 8px 24px rgba(0,0,0,.1);
}

.berita-detail-img img {
    width: 100%;
    height: 450px;
    object-fit: cover;
    display: block;
    transition: transform .5s ease;
}

.berita-detail-img:hover img {
    transform: scale(1.05);
}

.berita-detail-title {
    font-size: 2.4rem;
    font-weight: 800;
    line-height: 1.3;
    color: var(--text-dark);
    margin-bottom: 20px;
}

.berita-detail-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 24px;
    padding: 18px 24px;
    background: var(--bg-light);
    border-radius: 12px;
    margin-bottom: 35px;
    border-left: 4px solid var(--primary-color);
}

.berita-detail-meta span {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    color: var(--text-gray);
    font-weight: 600;
}

.berita-detail-meta i {
    color: var(--primary-color);
    font-size: 16px;
}

.berita-detail-content {
    font-size: 16.5px;
    line-height: 1.9;
    color: #374151;
}

.berita-detail-content p {
    margin-bottom: 20px;
}

.berita-back-btn {
    margin-top: 45px;
    padding-top: 35px;
    border-top: 2px solid var(--border-color);
}

.btn-back {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 13px 28px;
    background: var(--primary-color);
    color: #fff;
    border: none;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    transition: all .3s ease;
    box-shadow: 0 2px 8px rgba(245, 158, 11, .25);
}

.btn-back:hover {
    background: var(--primary-dark);
    color: #fff;
    transform: translateX(-4px);
    box-shadow: 0 4px 12px rgba(245, 158, 11, .35);
}

.btn-back i {
    font-size: 16px;
    transition: transform .3s ease;
}

.btn-back:hover i {
    transform: translateX(-4px);
}

/* ================= SIDEBAR ================= */
.sidebar-box {
    background: var(--bg-white);
    padding: 28px;
    border-radius: 16px;
    border: 1px solid var(--border-color);
    margin-bottom: 25px;
    box-shadow: 0 4px 20px rgba(245, 158, 11, .08);
    position: sticky;
    top: 100px;
}

.sidebar-box h5 {
    font-weight: 800;
    font-size: 20px;
    color: var(--text-dark);
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 3px solid var(--border-color);
    position: relative;
}

.sidebar-box h5::after {
    content: '';
    position: absolute;
    bottom: -3px;
    left: 0;
    width: 60px;
    height: 3px;
    background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
}

.sidebar-berita {
    display: flex;
    gap: 14px;
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-bottom: 1px solid #f3f4f6;
    text-decoration: none;
    color: inherit;
    transition: all .3s ease;
}

.sidebar-berita:last-child {
    border-bottom: none;
    padding-bottom: 0;
    margin-bottom: 0;
}

.sidebar-berita:hover {
    transform: translateX(5px);
}

.sidebar-berita-img {
    width: 85px;
    height: 70px;
    border-radius: 10px;
    overflow: hidden;
    flex-shrink: 0;
    box-shadow: 0 2px 8px rgba(0,0,0,.1);
}

.sidebar-berita-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .3s ease;
}

.sidebar-berita:hover .sidebar-berita-img img {
    transform: scale(1.1);
}

.sidebar-berita-content h6 {
    font-size: 14px;
    font-weight: 700;
    line-height: 1.4;
    color: #1f2937;
    margin-bottom: 6px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.sidebar-berita:hover h6 {
    color: var(--primary-color);
}

.sidebar-berita-content small {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 12px;
    color: #9ca3af;
    font-weight: 600;
}

.sidebar-berita-content small i {
    font-size: 11px;
}

/* ================= RESPONSIVE ================= */
@media (max-width: 991px) {
    .page-title {
        padding: 50px 0 35px;
    }
    
    .berita-detail {
        padding: 30px 25px;
    }
    
    .berita-detail-title {
        font-size: 2rem;
    }
    
    .berita-detail-img img {
        height: 350px;
    }
    
    .sidebar-box {
        position: static;
        margin-top: 40px;
    }
}

@media (max-width: 767px) {
    .page-title {
        padding: 40px 0 30px;
        margin-bottom: 30px;
    }
    
    .berita-detail {
        padding: 25px 20px;
        border-radius: 14px;
    }
    
    .berita-detail-title {
        font-size: 1.6rem;
    }
    
    .berita-detail-img img {
        height: 250px;
    }
    
    .berita-detail-meta {
        gap: 16px;
        padding: 14px 18px;
    }
    
    .berita-detail-content {
        font-size: 15px;
    }
    
    .sidebar-box {
        padding: 22px;
    }
}

/* ================= ANIMATION ================= */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.berita-detail {
    animation: fadeIn .6s ease-out;
}

.sidebar-box {
    animation: fadeIn .8s ease-out;
}
</style>

<main class="main">

    {{-- HEADER WITH BREADCRUMB --}}
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <a href="{{ url('/') }}">Beranda</a>
                <span class="separator">/</span>
                <a href="{{ route('berita') }}">Berita</a>
                <span class="separator">/</span>
                <span>{{ Str::limit($berita->judul, 50) }}</span>
            </nav>
        </div>
    </div>

    <section class="berita-detail-section">
        <div class="container">
            <div class="row">

                {{-- KONTEN UTAMA --}}
                <div class="col-lg-8">

                    <article class="berita-detail" data-aos="fade-up">

                        {{-- Gambar Utama --}}
                        @if($berita->image)
                            <div class="berita-detail-img">
                                <img src="{{ asset('storage/'.$berita->image) }}"
                                     alt="{{ $berita->judul }}"
                                     loading="lazy">
                            </div>
                        @endif

                        {{-- Judul --}}
                        <h1 class="berita-detail-title">
                            {{ $berita->judul }}
                        </h1>

                        {{-- Meta Info --}}
                        <div class="berita-detail-meta">
                            <span>
                                <i class="bi bi-person-circle"></i>
                                {{ $berita->nmpenulis }}
                            </span>
                            <span>
                                <i class="bi bi-calendar-event"></i>
                                {{ \Carbon\Carbon::parse($berita->tgl_berita)->format('d M Y') }}
                            </span>
                        </div>

                        {{-- Konten Berita --}}
                        <div class="berita-detail-content">
                            {!! nl2br(e($berita->narasiberita)) !!}
                        </div>

                        {{-- Tombol Kembali --}}
                        <div class="berita-back-btn">
                            <a href="{{ route('berita') }}" class="btn-back">
                                <i class="bi bi-arrow-left"></i>
                                Kembali ke Daftar Berita
                            </a>
                        </div>

                    </article>

                </div>

                {{-- SIDEBAR --}}
                <div class="col-lg-4">

                    <div class="sidebar-box" data-aos="fade-up" data-aos-delay="100">
                        <h5>
                            <i class="bi bi-newspaper"></i>
                            Berita Terbaru
                        </h5>

                        @forelse($beritaTerbaru ?? [] as $item)
                            <a href="{{ route('berita.detail', $item->id_berita) }}"
                               class="sidebar-berita">

                                <div class="sidebar-berita-img">
                                    <img src="{{ asset('storage/'.$item->image) }}"
                                         alt="{{ $item->judul }}"
                                         loading="lazy">
                                </div>

                                <div class="sidebar-berita-content">
                                    <h6>{{ Str::limit($item->judul, 60) }}</h6>
                                    <small>
                                        <i class="bi bi-calendar3"></i>
                                        {{ \Carbon\Carbon::parse($item->tgl_berita)->format('d M Y') }}
                                    </small>
                                </div>

                            </a>
                        @empty
                            <p class="text-muted text-center small">
                                <em>Belum ada berita lainnya</em>
                            </p>
                        @endforelse

                    </div>

                </div>

            </div>
        </div>
    </section>

</main>

@endsection