@extends('layout.app')

@section('title', 'Pengaduan Warga')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<style>
/* ================= HERO SECTION ================= */
#curhat-hero {
    background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
    padding: 80px 0;
    text-align: center;
    position: relative;
    overflow: hidden;
}

#curhat-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="2" fill="rgba(217,119,6,0.1)"/></svg>');
    opacity: 0.4;
}

#curhat-hero h1 {
    font-weight: 800;
    letter-spacing: 1px;
    color: #78350f;
    position: relative;
    z-index: 1;
}

#curhat-hero p {
    max-width: 650px;
    margin: 15px auto 0;
    color: #92400e;
    position: relative;
    z-index: 1;
    font-size: 1.1rem;
}

/* ================= INFO CARDS ================= */
.info-section {
    margin-top: -50px;
    position: relative;
    z-index: 10;
}

.info-card {
    background: #fff;
    border-radius: 16px;
    padding: 25px;
    text-align: center;
    box-shadow: 0 10px 30px rgba(245, 158, 11, 0.15);
    transition: all .3s ease;
    height: 100%;
}

.info-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(245, 158, 11, 0.25);
}

.info-icon {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 15px;
}

.info-icon i {
    font-size: 30px;
    color: #d97706;
}

.info-card h6 {
    font-weight: 700;
    color: #78350f;
    margin-bottom: 8px;
}

.info-card p {
    font-size: 13px;
    color: #64748b;
    margin: 0;
}

/* ================= FORM SECTION ================= */
.form-section {
    padding: 80px 0 60px;
}

.form-container {
    background: #fff;
    border-radius: 24px;
    padding: 50px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.08);
    position: relative;
}

.form-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 6px;
    background: linear-gradient(90deg, #f59e0b, #d97706);
    border-radius: 24px 24px 0 0;
}

.form-header {
    text-align: center;
    margin-bottom: 40px;
    padding-bottom: 30px;
    border-bottom: 2px solid #f1f5f9;
}

.form-header h3 {
    font-weight: 800;
    color: #78350f;
    margin-bottom: 10px;
}

.form-header p {
    color: #64748b;
    margin: 0;
}

/* ================= FORM INPUTS ================= */
.form-label {
    font-weight: 700;
    color: #334155;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.form-label i {
    color: #f59e0b;
    font-size: 16px;
}

.form-control, .form-select {
    border: 2px solid #e2e8f0;
    border-radius: 12px;
    padding: 12px 18px;
    font-size: 15px;
    transition: all .3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: #f59e0b;
    box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.1);
}

.form-control::placeholder {
    color: #cbd5e1;
}

/* ================= FILE INPUT ================= */
.file-input-wrapper {
    position: relative;
}

.file-input-label {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 30px;
    border: 2px dashed #cbd5e1;
    border-radius: 12px;
    background: #fffbeb;
    cursor: pointer;
    transition: all .3s ease;
}

.file-input-label:hover {
    border-color: #f59e0b;
    background: #fef3c7;
}

.file-input-label i {
    font-size: 32px;
    color: #f59e0b;
}

.file-input-label span {
    color: #64748b;
    font-weight: 600;
}

input[type="file"] {
    position: absolute;
    opacity: 0;
    width: 100%;
    height: 100%;
    cursor: pointer;
}

/* ================= ALERTS ================= */
.alert {
    border: none;
    border-radius: 12px;
    padding: 16px 20px;
    margin-bottom: 30px;
}

.alert-success {
    background: linear-gradient(135deg, #d1fae5, #a7f3d0);
    color: #065f46;
    border-left: 4px solid #10b981;
}

.alert-danger {
    background: linear-gradient(135deg, #fee2e2, #fecaca);
    color: #991b1b;
    border-left: 4px solid #ef4444;
}

/* ================= SUBMIT BUTTON ================= */
.btn-submit {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 15px 50px;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: #fff;
    border: none;
    border-radius: 30px;
    font-weight: 700;
    font-size: 16px;
    transition: all .3s ease;
    box-shadow: 0 8px 20px rgba(245, 158, 11, 0.4);
}

.btn-submit:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 30px rgba(245, 158, 11, 0.5);
    background: linear-gradient(135deg, #d97706, #b45309);
}

.btn-submit i {
    font-size: 18px;
}

/* ================= HELPER TEXT ================= */
.form-text {
    font-size: 12px;
    color: #94a3b8;
    margin-top: 6px;
}

/* ================= RESPONSIVE ================= */
@media (max-width: 768px) {
    #curhat-hero {
        padding: 60px 0;
    }
    
    #curhat-hero h1 {
        font-size: 1.8rem;
    }
    
    .info-section {
        margin-top: -30px;
    }
    
    .form-container {
        padding: 30px 20px;
    }
    
    .btn-submit {
        width: 100%;
        padding: 15px 30px;
    }
}
</style>

<!-- Hero Section -->
<section id="curhat-hero">
    <div class="container">
        <h1 data-aos="fade-down">RUANG CURHAT WARGA DESA LAWEYAN</h1>
        <p data-aos="fade-up">
            Sampaikan laporan Anda agar desa dapat menangani dengan cepat dan tepat
        </p>
    </div>
</section>

<!-- Info Cards -->
<div class="container info-section">
    <div class="row g-4" data-aos="fade-up">
        <div class="col-md-4">
            <div class="info-card">
                <div class="info-icon">
                    <i class="bi bi-shield-check"></i>
                </div>
                <h6>Aman & Terpercaya</h6>
                <p>Data Anda dijamin kerahasiaannya</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-card">
                <div class="info-icon">
                    <i class="bi bi-lightning-charge"></i>
                </div>
                <h6>Respon Cepat</h6>
                <p>Tim kami siap menanggapi laporan</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-card">
                <div class="info-icon">
                    <i class="bi bi-chat-heart"></i>
                </div>
                <h6>Mudah & Praktis</h6>
                <p>Proses pelaporan yang sederhana</p>
            </div>
        </div>
    </div>
</div>

<!-- Form Section -->
<section class="form-section" style="background: #f8fafc;">
    <div class="container" data-aos="fade-up" data-aos-delay="150">

        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="form-container">

                    <!-- Form Header -->
                    <div class="form-header">
                        <h3>Form Pengaduan Warga</h3>
                        <p>Isi formulir di bawah ini dengan lengkap dan jelas</p>
                    </div>

                    <!-- Alerts -->
                    @if(session('success'))
                        <div class="alert alert-success" data-aos="zoom-in">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger" data-aos="shake">
                            <strong><i class="bi bi-exclamation-triangle-fill me-2"></i>Terjadi kesalahan:</strong>
                            <ul class="mt-2 mb-0">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Form -->
                    <form action="{{ route('ruang_curhat.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <!-- Status Pelapor -->
                            <div class="col-lg-6 mb-4">
                                <label class="form-label">
                                    <i class="bi bi-person-badge"></i>
                                    Status Pelapor
                                </label>
                                <select class="form-select" name="status_pelapor" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="Warga Desa">Warga Desa</option>
                                    <option value="Non Warga">Bukan Warga Desa</option>
                                </select>
                            </div>

                            <!-- Nama Lengkap -->
                            <div class="col-lg-6 mb-4">
                                <label class="form-label">
                                    <i class="bi bi-person"></i>
                                    Nama Lengkap
                                </label>
                                <input type="text" 
                                       class="form-control" 
                                       name="nama_lengkap" 
                                       placeholder="Masukkan nama lengkap Anda"
                                       required>
                            </div>

                            <!-- Nomor HP -->
                            <div class="col-lg-6 mb-4">
                                <label class="form-label">
                                    <i class="bi bi-telephone"></i>
                                    Nomor HP
                                </label>
                                <input type="text" 
                                       class="form-control" 
                                       name="nomor_hp" 
                                       placeholder="Contoh: 08123456789"
                                       required>
                                <small class="form-text">Nomor yang dapat dihubungi</small>
                            </div>

                            <!-- Alamat -->
                            <div class="col-lg-6 mb-4">
                                <label class="form-label">
                                    <i class="bi bi-geo-alt"></i>
                                    Alamat
                                </label>
                                <textarea class="form-control" 
                                          name="alamat" 
                                          rows="3"
                                          placeholder="Masukkan alamat lengkap Anda"></textarea>
                            </div>

                            <!-- Isi Pengaduan -->
                            <div class="col-12 mb-4">
                                <label class="form-label">
                                    <i class="bi bi-chat-square-text"></i>
                                    Isi Pengaduan
                                </label>
                                <textarea class="form-control" 
                                          name="isi_pengaduan" 
                                          rows="6" 
                                          placeholder="Jelaskan pengaduan Anda dengan detail..."
                                          required></textarea>
                                <small class="form-text">Jelaskan masalah yang ingin Anda laporkan secara detail</small>
                            </div>

                            <!-- Foto Pendukung -->
                            <div class="col-12 mb-4">
                                <label class="form-label">
                                    <i class="bi bi-camera"></i>
                                    Foto Pendukung (Opsional)
                                </label>
                                <div class="file-input-wrapper">
                                    <label class="file-input-label">
                                        <i class="bi bi-cloud-upload"></i>
                                        <div>
                                            <span class="d-block">Klik untuk upload foto</span>
                                            <small class="text-muted d-block mt-1">Format: JPG, PNG (Max 2MB)</small>
                                        </div>
                                    </label>
                                    <input type="file" 
                                           class="form-control" 
                                           name="foto_pendukung"
                                           accept="image/*">
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12 text-center mt-3">
                                <button type="submit" class="btn-submit">
                                    <i class="bi bi-send-fill"></i>
                                    Kirim Pengaduan
                                </button>
                            </div>

                        </div>
                    </form>

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

    // File input preview
    document.querySelector('input[type="file"]').addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name;
        if (fileName) {
            const label = document.querySelector('.file-input-label span');
            label.textContent = fileName;
        }
    });
</script>

@endsection