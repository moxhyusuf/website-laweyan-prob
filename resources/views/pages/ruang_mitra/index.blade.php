@extends('layout.app')

@section('title', 'Ruang Mitra')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<style>
/* ================= HERO MITRA ================= */
#mitra-hero {
    background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
    padding: 80px 0;
    text-align: center;
    position: relative;
    overflow: hidden;
}

#mitra-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="2" fill="rgba(217,119,6,0.1)"/></svg>');
    opacity: 0.4;
}

#mitra-hero h1 {
    font-weight: 800;
    letter-spacing: 1px;
    color: #78350f;
    position: relative;
    z-index: 1;
}

#mitra-hero p {
    max-width: 650px;
    margin: 15px auto 0;
    color: #92400e;
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

/* ================= CARD MITRA ================= */
.mitra-card {
    background: #fff;
    border-radius: 20px;
    padding: 40px 30px;
    height: 100%;
    text-align: center;
    border: 2px solid transparent;
    transition: all .4s ease;
    position: relative;
    overflow: hidden;
}

.mitra-card::before {
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

.mitra-card:hover::before {
    transform: scaleX(1);
}

.mitra-card:hover {
    border-color: #f59e0b;
    transform: translateY(-10px);
    box-shadow: 0 20px 50px rgba(245, 158, 11, 0.25);
}

/* ================= LOGO WRAPPER ================= */
.logo-wrapper {
    position: relative;
    width: 140px;
    height: 140px;
    margin: 0 auto 30px;
}

.logo-bg {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 160px;
    height: 160px;
    background: linear-gradient(135deg, #fffbeb, #fef3c7);
    border-radius: 50%;
    opacity: 0.5;
    transition: all .4s ease;
}

.mitra-card:hover .logo-bg {
    transform: translate(-50%, -50%) scale(1.1);
    opacity: 0.8;
}

.mitra-logo {
    position: relative;
    width: 140px;
    height: 140px;
    border-radius: 50%;
    object-fit: cover;
    border: 5px solid #fff;
    box-shadow: 0 8px 25px rgba(245, 158, 11, 0.3);
    transition: all .4s ease;
    z-index: 2;
}

.mitra-card:hover .mitra-logo {
    transform: scale(1.05) rotate(5deg);
    box-shadow: 0 12px 35px rgba(245, 158, 11, 0.5);
    border-color: #fde68a;
}

/* ================= CONTENT ================= */
.mitra-card h5 {
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 15px;
    font-size: 1.3rem;
    transition: color .3s ease;
}

.mitra-card:hover h5 {
    color: #f59e0b;
}

.mitra-card p {
    font-size: 14.5px;
    color: #64748b;
    line-height: 1.7;
    margin-bottom: 20px;
    min-height: 60px;
}

/* ================= BADGE STATUS ================= */
.badge-mitra {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 18px;
    border-radius: 25px;
    font-size: 12px;
    font-weight: 600;
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    color: #92400e;
    margin-top: 10px;
    transition: all .3s ease;
    box-shadow: 0 4px 15px rgba(245, 158, 11, 0.2);
}

.mitra-card:hover .badge-mitra {
    background: linear-gradient(135deg, #fde68a, #fcd34d);
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(245, 158, 11, 0.4);
}

/* ================= PARTNERSHIP TYPE ================= */
.partnership-type {
    position: absolute;
    top: 20px;
    right: 20px;
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 15px rgba(245, 158, 11, 0.4);
}

.partnership-type i {
    color: #fff;
    font-size: 18px;
}

/* ================= EMPTY STATE ================= */
.empty-state {
    padding: 100px 20px;
    text-align: center;
}

.empty-state i {
    font-size: 100px;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 25px;
    display: block;
}

.empty-state h5 {
    color: #2d3748;
    font-weight: 700;
    margin-bottom: 10px;
    font-size: 1.5rem;
}

.empty-state p {
    color: #64748b;
    font-size: 1.1rem;
}

/* ================= RESPONSIVE ================= */
@media (max-width: 768px) {
    .stats-section {
        margin-top: -30px;
        padding: 20px 15px;
    }
    
    .stat-item h3 {
        font-size: 2rem;
    }
    
    .logo-wrapper {
        width: 120px;
        height: 120px;
    }
    
    .mitra-logo {
        width: 120px;
        height: 120px;
    }
    
    .logo-bg {
        width: 140px;
        height: 140px;
    }
}
</style>

<!-- Hero Section -->
<section id="mitra-hero">
    <div class="container">
        <h1 data-aos="fade-down">RUANG MITRA DESA LAWEYAN</h1>
        <p data-aos="fade-up">
            Menampilkan informasi kemitraan Desa Laweyan bersama instansi, lembaga, dan perusahaan dalam membangun desa yang lebih maju.
        </p>
    </div>
</section>

<!-- Stats Section -->
<div class="container" style="margin-top: -30px;">
    <div class="stats-section" data-aos="fade-up">
        <div class="row">
            <div class="col-md-4">
                <div class="stat-item">
                    <h3>{{ count($mitra) }}+</h3>
                    <p>Mitra Aktif</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-item">
                    <h3>10+</h3>
                    <p>Instansi</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-item">
                    <h3>25+</h3>
                    <p>Program Kemitraan</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mitra Section -->
<section id="mitra" class="section py-5" style="background:#f8f9fa">
    <div class="container">

        <div class="row justify-content-center g-4">

            @forelse ($mitra as $index => $item)

                <div class="col-lg-4 col-md-6"
                    data-aos="fade-up"
                    data-aos-delay="{{ $index * 100 }}">

                    <div class="mitra-card shadow-sm">

                        <!-- Partnership Type Icon -->
                        <div class="partnership-type">
                            <i class="bi bi-award-fill"></i>
                        </div>

                        <!-- Logo Mitra with Background -->
                        <div class="logo-wrapper">
                            <div class="logo-bg"></div>
                            <img src="{{ asset('storage/' . $item->foto) }}"
                                class="mitra-logo"
                                alt="{{ $item->nama_mitra }}">
                        </div>

                        <!-- Nama Mitra -->
                        <h5>{{ $item->nama_mitra }}</h5>

                        <!-- Keterangan -->
                        <p>{{ \Illuminate\Support\Str::limit($item->keterangan, 100) }}</p>

                        <!-- Badge -->
                        <span class="badge-mitra">
                            <i class="bi bi-patch-check-fill"></i>
                            Mitra Resmi
                        </span>

                    </div>
                </div>

            @empty

                <!-- Empty State -->
                <div class="col-12">
                    <div class="empty-state">
                        <i class="bi bi-building"></i>
                        <h5>Belum Ada Data Mitra</h5>
                        <p class="text-muted">Informasi kemitraan akan ditampilkan di sini</p>
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