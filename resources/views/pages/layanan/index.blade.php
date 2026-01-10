@extends('layout.app')

@section('title', 'Layanan Desa Laweyan')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<style>
/* ================= HERO LAYANAN ================= */
#layanan-hero {
    background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
    padding: 100px 0;
    text-align: center;
    position: relative;
    overflow: hidden;
}

#layanan-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="2" fill="rgba(217,119,6,0.1)"/></svg>');
    opacity: 0.4;
}

#layanan-hero h1 {
    font-weight: 800;
    letter-spacing: 1.5px;
    color: #78350f;
    position: relative;
    z-index: 1;
    margin-bottom: 15px;
}

#layanan-hero p {
    max-width: 700px;
    margin: 0 auto;
    color: #92400e;
    position: relative;
    z-index: 1;
    font-size: 1.15rem;
    line-height: 1.7;
}

/* ================= STATS SECTION ================= */
.stats-section {
    background: #fff;
    margin-top: -60px;
    border-radius: 24px;
    padding: 40px;
    box-shadow: 0 20px 60px rgba(245, 158, 11, 0.15);
    position: relative;
    z-index: 10;
}

.stat-box {
    text-align: center;
    padding: 20px;
    position: relative;
}

.stat-box::after {
    content: '';
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 1px;
    height: 60%;
    background: linear-gradient(to bottom, transparent, #f59e0b, transparent);
}

.stat-box:last-child::after {
    display: none;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 800;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    line-height: 1;
    margin-bottom: 8px;
}

.stat-label {
    color: #64748b;
    font-size: 0.95rem;
    font-weight: 600;
}

/* ================= SECTION TITLE ================= */
.section-title-wrapper {
    text-align: center;
    margin-bottom: 60px;
}

.section-subtitle {
    color: #f59e0b;
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 2px;
    text-transform: uppercase;
    margin-bottom: 15px;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: #1f2937;
    margin-bottom: 15px;
}

.section-description {
    color: #64748b;
    font-size: 1.1rem;
    max-width: 600px;
    margin: 0 auto;
}

/* ================= CARD LAYANAN ================= */
.layanan-card {
    background: #fff;
    border-radius: 24px;
    padding: 45px 35px;
    height: 100%;
    text-align: center;
    border: 2px solid transparent;
    transition: all .4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.layanan-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 6px;
    background: linear-gradient(90deg, #f59e0b, #d97706);
    transform: scaleX(0);
    transition: transform .4s ease;
}

.layanan-card:hover::before {
    transform: scaleX(1);
}

.layanan-card::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(245, 158, 11, 0.1), transparent);
    transform: translate(-50%, -50%);
    transition: width .6s ease, height .6s ease;
}

.layanan-card:hover::after {
    width: 500px;
    height: 500px;
}

.layanan-card:hover {
    border-color: #f59e0b;
    transform: translateY(-12px);
    box-shadow: 0 25px 60px rgba(245, 158, 11, 0.25);
}

/* ================= ICON WRAPPER ================= */
.layanan-icon-wrapper {
    position: relative;
    margin: 0 auto 30px;
    width: 110px;
    height: 110px;
}

.icon-bg {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 130px;
    height: 130px;
    background: linear-gradient(135deg, #fffbeb, #fef3c7);
    border-radius: 50%;
    opacity: 0;
    transition: all .4s ease;
}

.layanan-card:hover .icon-bg {
    opacity: 1;
    transform: translate(-50%, -50%) scale(1.1);
}

.layanan-icon {
    position: relative;
    width: 110px;
    height: 110px;
    border-radius: 50%;
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 8px 25px rgba(245, 158, 11, 0.3);
    transition: all .4s ease;
    z-index: 2;
}

.layanan-card:hover .layanan-icon {
    transform: scale(1.1) rotate(10deg);
    box-shadow: 0 12px 35px rgba(245, 158, 11, 0.5);
}

.layanan-icon i {
    font-size: 48px;
    color: #d97706;
    transition: all .3s ease;
}

.layanan-card:hover .layanan-icon i {
    color: #92400e;
    transform: scale(1.1);
}

/* ================= CONTENT ================= */
.layanan-card h5 {
    font-weight: 700;
    font-size: 1.4rem;
    color: #1f2937;
    margin-bottom: 15px;
    position: relative;
    z-index: 3;
    transition: color .3s ease;
}

.layanan-card:hover h5 {
    color: #f59e0b;
}

.layanan-card p {
    font-size: 15px;
    color: #64748b;
    line-height: 1.7;
    margin-bottom: 25px;
    position: relative;
    z-index: 3;
    min-height: 60px;
}

/* ================= BUTTON ================= */
.btn-layanan {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 30px;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: #fff;
    border: none;
    border-radius: 30px;
    font-weight: 700;
    font-size: 15px;
    transition: all .3s ease;
    box-shadow: 0 6px 20px rgba(245, 158, 11, 0.3);
    position: relative;
    z-index: 3;
    text-decoration: none;
}

.btn-layanan:hover {
    transform: translateX(5px);
    box-shadow: 0 8px 25px rgba(245, 158, 11, 0.5);
    background: linear-gradient(135deg, #d97706, #b45309);
    color: #fff;
}

.btn-layanan i {
    transition: transform .3s ease;
}

.btn-layanan:hover i {
    transform: translateX(5px);
}

/* ================= CATEGORY BADGE ================= */
.category-badge {
    position: absolute;
    top: 20px;
    right: 20px;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: #fff;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    z-index: 3;
    box-shadow: 0 4px 15px rgba(245, 158, 11, 0.4);
}

/* ================= RESPONSIVE ================= */
@media (max-width: 768px) {
    #layanan-hero {
        padding: 70px 0;
    }
    
    #layanan-hero h1 {
        font-size: 2rem;
    }
    
    .stats-section {
        margin-top: -40px;
        padding: 30px 20px;
    }
    
    .stat-number {
        font-size: 2rem;
    }
    
    .stat-box::after {
        display: none;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .layanan-card {
        padding: 35px 25px;
    }
}
</style>

<!-- Hero Section -->
<section id="layanan-hero">
    <div class="container">
        <h1 data-aos="fade-down">PELAYANAN DESA LAWEYAN</h1>
        <p data-aos="fade-up" data-aos-delay="100">
            Akses mudah dan cepat untuk berbagai layanan administrasi desa yang tersedia untuk masyarakat
        </p>
    </div>
</section>

<!-- Stats Section -->
<div class="container" style="margin-top: -40px;">
    <div class="stats-section" data-aos="fade-up">
        <div class="row">
            <div class="col-md-4">
                <div class="stat-box">
                    <div class="stat-number">15+</div>
                    <div class="stat-label">Jenis Layanan</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-box">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Akses Online</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-box">
                    <div class="stat-number">1000+</div>
                    <div class="stat-label">Pengguna Aktif</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Layanan Section -->
<section class="section py-5" style="background: #f8f9fa;">
    <div class="container">

        <!-- Section Title -->
        <div class="section-title-wrapper" data-aos="fade-up">
            <div class="section-subtitle">Layanan Kami</div>
            <h2 class="section-title">Pilihan Layanan Tersedia</h2>
            <p class="section-description">
                Berbagai layanan administrasi desa yang dapat Anda akses dengan mudah
            </p>
        </div>

        <div class="row g-4">

            <!-- NON KEPENDUDUKAN -->
            <div class="col-md-6 col-lg-4" data-aos="zoom-in">
                <div class="layanan-card shadow-sm">
                    <span class="category-badge">Populer</span>
                    
                    <div class="layanan-icon-wrapper">
                        <div class="icon-bg"></div>
                        <div class="layanan-icon">
                            <i class="bi bi-file-earmark-text-fill"></i>
                        </div>
                    </div>
                    
                    <h5>Non Kependudukan</h5>
                    <p>
                        Surat keterangan usaha, izin kegiatan, dan layanan administrasi lainnya yang mendukung kegiatan masyarakat
                    </p>
                    
                    <a href="#" class="btn-layanan">
                        Lihat Layanan
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- KEPENDUDUKAN -->
            <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="150">
                <div class="layanan-card shadow-sm">
                    <span class="category-badge">Terbaru</span>
                    
                    <div class="layanan-icon-wrapper">
                        <div class="icon-bg"></div>
                        <div class="layanan-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                    </div>
                    
                    <h5>Kependudukan</h5>
                    <p>
                        Layanan KTP, KK, akta kelahiran, surat pindah, dan berbagai dokumen kependudukan lainnya
                    </p>
                    
                    <a href="#" class="btn-layanan">
                        Lihat Layanan
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- SOSIAL -->
            <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="300">
                <div class="layanan-card shadow-sm">
                    <span class="category-badge">Aktif</span>
                    
                    <div class="layanan-icon-wrapper">
                        <div class="icon-bg"></div>
                        <div class="layanan-icon">
                            <i class="bi bi-heart-pulse-fill"></i>
                        </div>
                    </div>
                    
                    <h5>Sosial & Kemasyarakatan</h5>
                    <p>
                        Bantuan sosial, program kemasyarakatan, dan informasi kegiatan warga desa
                    </p>
                    
                    <a href="#" class="btn-layanan">
                        Lihat Layanan
                        <i class="bi bi-arrow-right"></i>
                    </a>
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