@extends('layout.app')

@section('title', 'Detail Ruang Pemuda')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<style>
/* ================= HERO IMAGE ================= */
.pemuda-hero-detail {
    position: relative;
    height: 500px;
    overflow: hidden;
    margin-bottom: -100px;
}

.pemuda-hero-detail::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.7) 100%);
    z-index: 1;
}

.pemuda-hero-detail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.hero-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 60px 0 120px;
    z-index: 2;
}

.hero-breadcrumb {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 20px;
}

.hero-breadcrumb a {
    color: rgba(255,255,255,0.8);
    text-decoration: none;
    font-size: 14px;
    transition: color .3s;
}

.hero-breadcrumb a:hover {
    color: #fff;
}

.hero-breadcrumb span {
    color: rgba(255,255,255,0.5);
}

.hero-title {
    font-size: 3rem;
    font-weight: 800;
    color: #fff;
    margin: 0;
    text-shadow: 0 4px 20px rgba(0,0,0,0.3);
}

/* ================= CONTENT CARD ================= */
.content-card {
    background: #fff;
    border-radius: 24px;
    padding: 50px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.08);
    position: relative;
    z-index: 10;
}

/* ================= META INFO ================= */
.meta-info {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    padding: 30px 0;
    border-bottom: 2px solid #f3f4f6;
    margin-bottom: 40px;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 12px;
}

.meta-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    display: flex;
    align-items: center;
    justify-content: center;
}

.meta-icon i {
    font-size: 20px;
    color: #d97706;
}

.meta-text {
    display: flex;
    flex-direction: column;
}

.meta-label {
    font-size: 12px;
    color: #9ca3af;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 600;
}

.meta-value {
    font-size: 16px;
    color: #1f2937;
    font-weight: 700;
}

/* ================= CONTENT BODY ================= */
.content-body {
    font-size: 1.1rem;
    line-height: 1.9;
    color: #374151;
}

.content-body p {
    margin-bottom: 1.5rem;
}

.content-body strong {
    color: #1f2937;
    font-weight: 700;
}

/* ================= TAGS ================= */
.tags-section {
    margin-top: 50px;
    padding-top: 40px;
    border-top: 2px solid #f3f4f6;
}

.tags-label {
    font-size: 14px;
    color: #6b7280;
    font-weight: 600;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.tag-item {
    display: inline-block;
    padding: 8px 18px;
    background: linear-gradient(135deg, #fffbeb, #fef3c7);
    color: #92400e;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
    margin-right: 10px;
    margin-bottom: 10px;
    transition: all .3s;
}

.tag-item:hover {
    background: linear-gradient(135deg, #fde68a, #fcd34d);
    transform: translateY(-2px);
}

/* ================= SHARE SECTION ================= */
.share-section {
    margin-top: 40px;
    padding: 30px;
    background: #f9fafb;
    border-radius: 16px;
    text-align: center;
}

.share-title {
    font-size: 16px;
    color: #374151;
    font-weight: 700;
    margin-bottom: 20px;
}

.share-buttons {
    display: flex;
    justify-content: center;
    gap: 15px;
    flex-wrap: wrap;
}

.share-btn {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    color: #fff;
    transition: all .3s;
    text-decoration: none;
}

.share-btn:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

.share-btn.facebook {
    background: #1877f2;
}

.share-btn.twitter {
    background: #1da1f2;
}

.share-btn.whatsapp {
    background: #25d366;
}

.share-btn.linkedin {
    background: #0077b5;
}

/* ================= BACK BUTTON ================= */
.back-button {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 12px 28px;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: #fff;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 600;
    transition: all .3s;
    box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
    margin-top: 30px;
}

.back-button:hover {
    transform: translateX(-5px);
    box-shadow: 0 6px 20px rgba(245, 158, 11, 0.5);
    color: #fff;
}

.back-button i {
    transition: transform .3s;
}

.back-button:hover i {
    transform: translateX(-5px);
}

/* ================= RESPONSIVE ================= */
@media (max-width: 768px) {
    .pemuda-hero-detail {
        height: 350px;
        margin-bottom: -80px;
    }
    
    .hero-title {
        font-size: 2rem;
    }
    
    .content-card {
        padding: 30px 20px;
    }
    
    .meta-info {
        gap: 20px;
    }
    
    .content-body {
        font-size: 1rem;
    }
}
</style>

<!-- Hero Section with Image -->
<div class="pemuda-hero-detail">
    <img src="{{ asset('storage/ruang_pemuda/'.$item->img) }}" alt="{{ $item->nama }}">
    
    <div class="hero-overlay">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <!-- Breadcrumb -->
                    <div class="hero-breadcrumb" data-aos="fade-down">
                        <a href="{{ url('/') }}">
                            <i class="bi bi-house-door"></i> Beranda
                        </a>
                        <span>/</span>
                        <a href="{{ url('/ruang_pemuda') }}">Ruang Pemuda</a>
                        <span>/</span>
                        <span style="color: #fff">Detail</span>
                    </div>
                    
                    <!-- Title -->
                    <h1 class="hero-title" data-aos="fade-up">
                        {{ $item->nama }}
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Section -->
<section class="py-5" style="background: #f9fafb;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                
                <div class="content-card" data-aos="fade-up">
                    
                    <!-- Meta Information -->
                    <div class="meta-info">
                        <div class="meta-item">
                            <div class="meta-icon">
                                <i class="bi bi-calendar-check"></i>
                            </div>
                            <div class="meta-text">
                                <span class="meta-label">Tanggal Dibuat</span>
                                <span class="meta-value">{{ $item->created_at->format('d M Y') }}</span>
                            </div>
                        </div>
                        
                        <div class="meta-item">
                            <div class="meta-icon">
                                <i class="bi bi-person-circle"></i>
                            </div>
                            <div class="meta-text">
                                <span class="meta-label">Kategori</span>
                                <span class="meta-value">Pemuda Aktif</span>
                            </div>
                        </div>
                        
                        <div class="meta-item">
                            <div class="meta-icon">
                                <i class="bi bi-eye"></i>
                            </div>
                            <div class="meta-text">
                                <span class="meta-label">Status</span>
                                <span class="meta-value">Aktif</span>
                            </div>
                        </div>
                    </div>

                    <!-- Content Body -->
                    <div class="content-body">
                        {!! nl2br(e($item->keterangan)) !!}
                    </div>

                    <!-- Tags Section -->
                    <div class="tags-section">
                        <div class="tags-label">
                            <i class="bi bi-tags"></i>
                            Tags:
                        </div>
                        <span class="tag-item">#PemudaDesa</span>
                        <span class="tag-item">#Laweyan</span>
                        <span class="tag-item">#GenerasiMuda</span>
                        <span class="tag-item">#KomunitasPemuda</span>
                    </div>

                    <!-- Share Section -->
                    <div class="share-section">
                        <div class="share-title">
                            <i class="bi bi-share"></i> Bagikan Informasi Ini
                        </div>
                        <div class="share-buttons">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" 
                               target="_blank" 
                               class="share-btn facebook">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $item->nama }}" 
                               target="_blank" 
                               class="share-btn twitter">
                                <i class="bi bi-twitter"></i>
                            </a>
                            <a href="https://wa.me/?text={{ $item->nama }} {{ url()->current() }}" 
                               target="_blank" 
                               class="share-btn whatsapp">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ url()->current() }}" 
                               target="_blank" 
                               class="share-btn linkedin">
                                <i class="bi bi-linkedin"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Back Button -->
                    <div class="text-center">
                        <a href="{{ url('/ruang_pemuda') }}" class="back-button">
                            <i class="bi bi-arrow-left"></i>
                            Kembali ke Ruang Pemuda
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true
    });
</script>

@endsection