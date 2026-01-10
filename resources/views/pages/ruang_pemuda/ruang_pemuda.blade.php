@extends('layout.app')

@section('title', 'Ruang Pemuda')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<style>
/* ================= HERO PEMUDA ================= */
#pemuda-hero {
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    padding: 80px 0;
    text-align: center;
    position: relative;
    overflow: hidden;
}

#pemuda-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="2" fill="rgba(255,255,255,0.1)"/></svg>');
    opacity: 0.3;
}

#pemuda-hero h1 {
    font-weight: 800;
    letter-spacing: 1px;
    color: #fff;
    position: relative;
    z-index: 1;
}

#pemuda-hero p {
    max-width: 650px;
    margin: 15px auto 0;
    color: rgba(255,255,255,0.95);
    position: relative;
    z-index: 1;
}

/* ================= STATS SECTION ================= */
.stats-section {
    background: #fff;
    margin-top: -50px;
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 10px 40px rgba(245, 158, 11, 0.15);
    position: relative;
    z-index: 10;
}

.stat-item {
    text-align: center;
    padding: 15px;
}

.stat-item h3 {
    font-size: 2.5rem;
    font-weight: 800;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 5px;
}

.stat-item p {
    color: #6c757d;
    font-size: 0.95rem;
    margin: 0;
}

/* ================= PEMUDA CARD ================= */
.pemuda-card {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    border: 2px solid transparent;
    transition: all .4s ease;
    height: 100%;
    position: relative;
}

.pemuda-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 5px;
    background: linear-gradient(90deg, #f59e0b, #d97706);
    transform: scaleX(0);
    transition: transform .4s ease;
}

.pemuda-card:hover::before {
    transform: scaleX(1);
}

.pemuda-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 50px rgba(245, 158, 11, 0.25);
    border-color: #f59e0b;
}

/* ================= IMAGE SECTION ================= */
.pemuda-image-wrapper {
    position: relative;
    padding: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #fffbeb, #fef3c7);
}

.pemuda-image {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    border: 5px solid #fff;
    box-shadow: 0 8px 25px rgba(245, 158, 11, 0.3);
    transition: all .4s ease;
}

.pemuda-card:hover .pemuda-image {
    transform: scale(1.1) rotate(5deg);
    box-shadow: 0 12px 35px rgba(245, 158, 11, 0.5);
}

/* ================= BADGE ================= */
.badge-category {
    position: absolute;
    top: 15px;
    right: 15px;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: #fff;
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    box-shadow: 0 4px 15px rgba(245, 158, 11, 0.4);
}

/* ================= CONTENT SECTION ================= */
.pemuda-content {
    padding: 25px 30px 30px;
}

.pemuda-title {
    font-size: 1.35rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 12px;
    transition: color .3s ease;
}

.pemuda-card:hover .pemuda-title {
    color: #f59e0b;
}

.pemuda-description {
    color: #64748b;
    font-size: 14.5px;
    line-height: 1.7;
    margin-bottom: 20px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* ================= BUTTON ================= */
.btn-detail {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 24px;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: #fff;
    border: none;
    border-radius: 25px;
    font-weight: 600;
    font-size: 14px;
    transition: all .3s ease;
    box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
}

.btn-detail:hover {
    transform: translateX(5px);
    box-shadow: 0 6px 20px rgba(245, 158, 11, 0.5);
    color: #fff;
    background: linear-gradient(135deg, #d97706, #b45309);
}

.btn-detail i {
    transition: transform .3s ease;
}

.btn-detail:hover i {
    transform: translateX(5px);
}

/* ================= EMPTY STATE ================= */
.empty-state {
    padding: 80px 20px;
    text-align: center;
}

.empty-state i {
    font-size: 100px;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 20px;
}

.empty-state h5 {
    color: #2d3748;
    font-weight: 700;
    margin-bottom: 10px;
}

.empty-state p {
    color: #64748b;
}

/* ================= RESPONSIVE ================= */
@media (max-width: 768px) {
    .pemuda-image-wrapper {
        padding: 20px;
    }
    
    .pemuda-image {
        width: 120px;
        height: 120px;
    }
    
    .stats-section {
        margin-top: -30px;
        padding: 20px 15px;
    }
    
    .stat-item h3 {
        font-size: 2rem;
    }
}
</style>

<!-- Hero Section -->
<section id="pemuda-hero">
    <div class="container">
        <h1 data-aos="fade-down">RUANG PEMUDA DESA LAWEYAN</h1>
        <p data-aos="fade-up">
            Wadah aspirasi, kreativitas, dan prestasi pemuda desa untuk membangun generasi yang lebih baik
        </p>
    </div>
</section>

<!-- Stats Section -->
<div class="container" style="margin-top: -30px;">
    <div class="stats-section" data-aos="fade-up">
        <div class="row">
            <div class="col-md-4">
                <div class="stat-item">
                    <h3>{{ count($item) }}+</h3>
                    <p>Pemuda Aktif</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-item">
                    <h3>15+</h3>
                    <p>Komunitas</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-item">
                    <h3>50+</h3>
                    <p>Kegiatan</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pemuda Section -->
<section id="ruang-pemuda" class="py-5" style="background:#f8f9fa">
    <div class="container">

        <div class="row g-4">
            @forelse ($item as $index => $pemuda)
            <div class="col-lg-6" 
                 data-aos="fade-up" 
                 data-aos-delay="{{ $index * 100 }}">
                
                <div class="pemuda-card shadow-sm">
                    
                    <!-- Badge Category -->
                    <span class="badge-category">
                        <i class="bi bi-star-fill me-1"></i> Aktif
                    </span>

                    <div class="row g-0">
                        <!-- Image Section -->
                        <div class="col-md-5">
                            <div class="pemuda-image-wrapper">
                                <img src="{{ asset('storage/ruang_pemuda/'.$pemuda->img) }}"
                                     class="pemuda-image"
                                     alt="{{ $pemuda->nama }}">
                            </div>
                        </div>

                        <!-- Content Section -->
                        <div class="col-md-7">
                            <div class="pemuda-content">
                                <h5 class="pemuda-title">{{ $pemuda->nama }}</h5>
                                
                                <p class="pemuda-description">
                                    {{ $pemuda->keterangan }}
                                </p>

                                <a href="{{ route('ruang_pemuda.show', $pemuda->id) }}"
                                   class="btn-detail">
                                    Lihat Detail
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @empty
            
            <!-- Empty State -->
            <div class="col-12">
                <div class="empty-state">
                    <i class="bi bi-people-fill"></i>
                    <h5>Belum Ada Data Pemuda</h5>
                    <p class="text-muted">Informasi pemuda akan ditampilkan di sini</p>
                </div>
            </div>
            
            @endforelse
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