@extends('layout.app')

@section('title', 'Beranda Desa Laweyan')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<style>
/* ================= HERO SECTION ================= */
#hero {
    position: relative;
    width: 100%;
    height: 100vh;
    overflow: hidden;
}

/* Background Carousel */
#heroBackground {
    position: absolute;
    inset: 0;
    z-index: 1;
}

#heroBackground .carousel-inner,
#heroBackground .carousel-item,
#heroBackground .bg-slide {
    width: 100%;
    height: 100vh;
}

.bg-slide {
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    transition: transform 8s ease;
}

#heroBackground .carousel-item.active .bg-slide {
    animation: kenBurns 8s ease-out forwards;
}

@keyframes kenBurns {
    from { transform: scale(1); }
    to { transform: scale(1.1); }
}

/* Overlay Gradient */
#hero::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, 
        rgba(62, 61, 59, 0.5) 0%, 
        rgba(100, 94, 94, 0.6) 50%, 
        rgba(0, 0, 0, 0.7) 100%);
    z-index: 2;
}

/* Hero Content - Centered */
.hero-content {
    position: relative;
    z-index: 3;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: #fff;
    padding: 0 20px;
}

.hero-text-wrapper {
    max-width: 900px;
    margin: 0 auto;
}

/* Hero Typography */
.hero-subtitle {
    font-size: 1rem;
    font-weight: 600;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: #fde68a;
    margin-bottom: 20px;
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.8s ease;
}

.hero-subtitle.show {
    opacity: 1;
    transform: translateY(0);
}

#heroJudul1 {
    font-size: 4rem;
    font-weight: 900;
    letter-spacing: 2px;
    line-height: 1.2;
    margin-bottom: 15px;
    text-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s ease 0.2s;
}

#heroJudul1.show {
    opacity: 1;
    transform: translateY(0);
}

#heroJudul2 {
    font-size: 4rem;
    font-weight: 900;
    letter-spacing: 2px;
    line-height: 1.2;
    margin-bottom: 25px;
    background: linear-gradient(135deg, #fde68a, #fcd34d);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: none;
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s ease 0.4s;
}

#heroJudul2.show {
    opacity: 1;
    transform: translateY(0);
}

#heroSubtitle {
    font-size: 1.25rem;
    line-height: 1.8;
    color: rgba(255, 255, 255, 0.95);
    margin-bottom: 35px;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.8s ease 0.6s;
}

#heroSubtitle.show {
    opacity: 1;
    transform: translateY(0);
}

/* Hero Buttons */
.hero-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.8s ease 0.8s;
}

.hero-buttons.show {
    opacity: 1;
    transform: translateY(0);
}

.btn-hero-primary {
    padding: 15px 40px;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: #fff;
    border: none;
    border-radius: 50px;
    font-weight: 700;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    box-shadow: 0 10px 30px rgba(245, 158, 11, 0.4);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 10px;
}

.btn-hero-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(245, 158, 11, 0.6);
    background: linear-gradient(135deg, #d97706, #b45309);
    color: #fff;
}

.btn-hero-outline {
    padding: 15px 40px;
    background: rgba(255, 255, 255, 0.1);
    border: 2px solid rgba(255, 255, 255, 0.8);
    color: #fff;
    border-radius: 50px;
    font-weight: 700;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 10px;
}

.btn-hero-outline:hover {
    background: rgba(255, 255, 255, 0.2);
    border-color: #fff;
    transform: translateY(-3px);
    color: #fff;
}

/* Scroll Indicator */
.scroll-indicator {
    position: absolute;
    bottom: 40px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 3;
    animation: bounce 2s infinite;
}

.scroll-indicator i {
    font-size: 2rem;
    color: #fff;
    opacity: 0.8;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% { transform: translateX(-50%) translateY(0); }
    40% { transform: translateX(-50%) translateY(-10px); }
    60% { transform: translateX(-50%) translateY(-5px); }
}

/* ================= SECTION STYLES ================= */
.section {
    padding: 80px 0;
}

.section-header {
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

/* ================= SEJARAH SECTION ================= */
#sejarah {
    background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
}

.sejarah-card {
    background: #fff;
    border-radius: 24px;
    padding: 50px;
    box-shadow: 0 20px 60px rgba(245, 158, 11, 0.15);
    height: 100%;
}

.sejarah-card h3 {
    font-size: 2rem;
    font-weight: 800;
    color: #1f2937;
    margin-bottom: 10px;
}

.sejarah-card h3 span {
    color: #f59e0b;
}

.sejarah-content {
    margin-top: 30px;
}

.sejarah-quote {
    font-size: 1.5rem;
    font-weight: 700;
    color: #f59e0b;
    margin-bottom: 20px;
    position: relative;
    padding-left: 30px;
}

.sejarah-quote::before {
    content: '"';
    position: absolute;
    left: 0;
    top: -10px;
    font-size: 4rem;
    color: #fde68a;
    opacity: 0.5;
}

.sejarah-text {
    font-size: 1.05rem;
    line-height: 1.9;
    color: #4b5563;
    text-align: justify;
    margin-bottom: 25px;
}

.read-more-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #f59e0b;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s ease;
}

.read-more-link:hover {
    gap: 12px;
    color: #d97706;
}

.sejarah-img-wrapper {
    position: relative;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
}

.sejarah-img-wrapper::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(245, 158, 11, 0.3), transparent);
    z-index: 1;
}

.sejarah-img-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.sejarah-img-wrapper:hover img {
    transform: scale(1.05);
}

/* ================= KEPALA DESA SECTION ================= */
#kades {
    background: #f8f9fa;
}

.kades-card {
    background: #fff;
    border-radius: 24px;
    padding: 50px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
}

.kades-img-wrapper {
    position: relative;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(245, 158, 11, 0.2);
}

.kades-img-wrapper::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, transparent 50%, rgba(245, 158, 11, 0.2));
    z-index: 1;
}

.kades-img-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.kades-badge {
    display: inline-block;
    padding: 8px 20px;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: #fff;
    border-radius: 30px;
    font-size: 0.85rem;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    margin-bottom: 15px;
}

.kades-name {
    font-size: 2rem;
    font-weight: 800;
    color: #1f2937;
    margin-bottom: 20px;
}

.kades-profile {
    font-size: 1.05rem;
    line-height: 1.9;
    color: #4b5563;
    margin-bottom: 30px;
}

.sambutan-box {
    background: linear-gradient(135deg, #fffbeb, #fef3c7);
    border-radius: 16px;
    padding: 30px;
    border-left: 5px solid #f59e0b;
}

.sambutan-box h5 {
    font-weight: 800;
    color: #78350f;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.sambutan-box h5 i {
    color: #f59e0b;
}

.sambutan-text {
    font-size: 1.05rem;
    line-height: 1.9;
    color: #4b5563;
    text-align: justify;
}

/* ================= BERITA SECTION ================= */
#berita {
    background: #fff;
}

.berita-header {
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    padding: 25px 35px;
    border-radius: 16px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 40px;
    box-shadow: 0 10px 30px rgba(245, 158, 11, 0.15);
}

.berita-header h4 {
    margin: 0;
    font-weight: 800;
    color: #78350f;
}

.berita-main-card {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    height: 100%;
}

.berita-main-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.12);
}

.berita-main-img {
    position: relative;
    height: 350px;
    overflow: hidden;
}

.berita-main-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.berita-main-card:hover .berita-main-img img {
    transform: scale(1.1);
}

.berita-main-body {
    padding: 35px;
}

.berita-date {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #f59e0b;
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 15px;
}

.berita-main-title {
    font-size: 1.6rem;
    font-weight: 800;
    color: #1f2937;
    margin-bottom: 15px;
    line-height: 1.4;
}

.berita-main-excerpt {
    font-size: 1rem;
    line-height: 1.7;
    color: #64748b;
    margin-bottom: 25px;
}

.btn-read-more {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 28px;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: #fff;
    border: none;
    border-radius: 30px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-read-more:hover {
    transform: translateX(5px);
    box-shadow: 0 8px 20px rgba(245, 158, 11, 0.4);
    color: #fff;
}

/* Berita Side */
.berita-side-item {
    background: #fff;
    border-radius: 12px;
    padding: 15px;
    display: flex;
    gap: 15px;
    align-items: center;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    text-decoration: none;
}

.berita-side-item:hover {
    transform: translateX(5px);
    box-shadow: 0 8px 20px rgba(245, 158, 11, 0.15);
}

.berita-side-img {
    width: 100px;
    height: 75px;
    border-radius: 8px;
    overflow: hidden;
    flex-shrink: 0;
}

.berita-side-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.berita-side-content h6 {
    font-size: 0.95rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 8px;
    line-height: 1.4;
}

.berita-side-date {
    color: #f59e0b;
    font-size: 0.85rem;
    font-weight: 600;
}

/* ================= RESPONSIVE ================= */
@media (max-width: 768px) {
    #heroJudul1, #heroJudul2 {
        font-size: 2.5rem;
    }
    
    #heroSubtitle {
        font-size: 1.1rem;
    }
    
    .hero-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .btn-hero-primary, .btn-hero-outline {
        width: 100%;
        max-width: 300px;
    }
    
    .sejarah-card, .kades-card {
        padding: 30px;
    }
    
    .berita-main-img {
        height: 250px;
    }
}
</style>

{{-- ================= HERO SECTION ================= --}}
@php
    $heroAktif = $heroSlides->first();
@endphp

<section id="hero">
    <!-- Background Slider -->
    <div id="heroBackground"
         class="carousel slide carousel-fade"
         data-bs-ride="carousel"
         data-bs-interval="5000">
        <div class="carousel-inner">
            @foreach ($heroSlides as $key => $slide)
                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}"
                     data-judul1="{{ $slide->judul_1 }}"
                     data-judul2="{{ $slide->judul_2 }}"
                     data-subtitle="{{ $slide->subtitle }}">
                    <div class="bg-slide"
                         style="background-image:url('{{ asset('storage/'.$slide->gambar) }}')">
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Hero Content - Centered -->
    <div class="hero-content">
        <div class="hero-text-wrapper">
            @if($heroAktif)
                
                <h1 id="heroJudul1" class="show">{{ $heroAktif->judul_1 }}</h1>
                <h1 id="heroJudul2" class="show">{{ $heroAktif->judul_2 }}</h1>
                <p id="heroSubtitle" class="show">{{ $heroAktif->subtitle }}</p>
            @endif

            <div class="hero-buttons show">
                <a href="#sejarah" class="btn-hero-primary">
                    Jelajahi Desa
                    <i class="bi bi-arrow-right"></i>
                </a>
                <a href="https://youtu.be/P7Vt3pb8fYI?si=LkfVCq3ZsF0s4l0z" target="_blank" class="btn-hero-outline">
                    <i class="bi bi-info-circle"></i>
                    Profil Desa
                </a>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="scroll-indicator">
        <i class="bi bi-chevron-down"></i>
    </div>
</section>

{{-- ================= SEJARAH SECTION ================= --}}
<section id="sejarah" class="section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="sejarah-card">
                    <h3><span>Sejarah</span> Desa Laweyan</h3>
                    <div class="sejarah-content">
                        <div class="sejarah-quote">Asal-Usul</div>
                        @if($sejarah)
                            <p class="sejarah-text">
                                {{ \Illuminate\Support\Str::limit(strip_tags($sejarah->sejarah), 350) }}
                            </p>
                            <a href="{{ route('sejarah') }}" class="read-more-link">
                                Baca Selengkapnya
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        @else
                            <p class="sejarah-text">Data sejarah belum tersedia.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                @if($sejarah && $sejarah->img)
                    <div class="sejarah-img-wrapper">
                        <img src="{{ asset('storage/'.$sejarah->img) }}" alt="Sejarah Desa Laweyan">
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- ================= KEPALA DESA SECTION ================= --}}
<section id="kades" class="section">
    <div class="container">
        @if($kepdes)
        <div class="row align-items-center g-5">
            <div class="col-lg-5" data-aos="fade-right" data-aos-duration="1000">
                <div class="kades-img-wrapper">
                    <img src="{{ asset('storage/'.$kepdes->foto) }}" alt="Kepala Desa Laweyan">
                </div>
            </div>

            <div class="col-lg-7" data-aos="fade-left" data-aos-duration="1000">
                <div class="kades-card">
                    <span class="kades-badge">Kepala Desa</span>
                    <h2 class="kades-name">{{ $kepdes->nama }}</h2>
                    <p class="kades-profile">{!! nl2br(e($kepdes->profil)) !!}</p>

                    @if(!empty($kepdes->sambutan))
                    <div class="sambutan-box">
                        <h5>
                            <i class="bi bi-megaphone-fill"></i>
                            Sambutan Kepala Desa
                        </h5>
                        <p class="sambutan-text">{!! nl2br(e($kepdes->sambutan)) !!}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @else
            <p class="text-center text-muted">Data kepala desa belum tersedia.</p>
        @endif
    </div>
</section>

{{-- ================= BERITA SECTION ================= --}}
<section id="berita" class="section">
    <div class="container">
        <div class="berita-header" data-aos="fade-up">
            <h4>Berita Terbaru</h4>
            <a href="{{ route('berita') }}" class="btn btn-dark">Lihat Semua</a>
        </div>

        <div class="row g-4">
            @if($berita->count() > 0)
            <!-- Main Berita -->
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                <div class="berita-main-card">
                    <div class="berita-main-img">
                        <img src="{{ asset('storage/'.$berita[0]->image) }}" alt="{{ $berita[0]->judul }}">
                    </div>
                    <div class="berita-main-body">
                        <div class="berita-date">
                            <i class="bi bi-calendar3"></i>
                            {{ \Carbon\Carbon::parse($berita[0]->tgl_berita)->format('d M Y') }}
                        </div>
                        <h3 class="berita-main-title">{{ $berita[0]->judul }}</h3>
                        <p class="berita-main-excerpt">
                            {{ Str::limit(strip_tags($berita[0]->isi), 180) }}
                        </p>
                        <a href="{{ route('berita.detail', $berita[0]->id_berita) }}" class="btn-read-more">
                            Baca Selengkapnya
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Side Berita -->
            <div class="col-lg-4">
                <div class="d-flex flex-column gap-4">
                    @foreach($berita->skip(1)->take(3) as $index => $item)
                    <a href="{{ route('berita.detail', $item->id_berita) }}" 
                       class="berita-side-item"
                       data-aos="fade-up" 
                       data-aos-delay="{{ ($index + 2) * 100 }}">
                        <div class="berita-side-img">
                            <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->judul }}">
                        </div>
                        <div class="berita-side-content">
                            <h6>{{ Str::limit($item->judul, 60) }}</h6>
                            <div class="berita-side-date">
                                {{ \Carbon\Carbon::parse($item->tgl_berita)->format('d M Y') }}
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

{{-- ================= SCRIPTS ================= --}}
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
      duration: 800,
      easing: 'ease-in-out',
      once: true
  });
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.getElementById('heroBackground');
    const j1  = document.getElementById('heroJudul1');
    const j2  = document.getElementById('heroJudul2');
    const sub = document.getElementById('heroSubtitle');
    const animated = [j1, j2, sub];

    // Saat slide mulai pindah
    carousel.addEventListener('slide.bs.carousel', () => {
        animated.forEach(el => {
            el.classList.remove('show');
        });
    });

    // Setelah slide aktif
    carousel.addEventListener('slid.bs.carousel', e => {
        const slide = e.relatedTarget;
        
        j1.textContent  = slide.dataset.judul1 || '';
        j2.textContent  = slide.dataset.judul2 || '';
        sub.textContent = slide.dataset.subtitle || '';

        setTimeout(() => {
            animated.forEach(el => {
                el.classList.add('show');
            });
        }, 150);
    });
});
</script>

@endsection