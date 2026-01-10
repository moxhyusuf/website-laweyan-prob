@extends('layout.app')

@section('title', $prestasi->judul)

@section('content')

<main class="main">

    {{-- HEADER --}}
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ route('prestasi.index') }}">Prestasi Desa</a></li>
                    <li class="current">{{ $prestasi->judul }}</li>
                </ol>
            </nav>
        </div>
    </div>

</main>

{{-- ================= DETAIL PRESTASI ================= --}}
<section class="py-5" style="background:#f4f7fb">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="card border-0 shadow rounded-4 p-4 p-lg-5">

                    <div class="row g-4 align-items-start">

                        {{-- FOTO --}}
                        <div class="col-md-5">
                            <div class="detail-img-wrapper">
                                <img src="{{ asset('storage/'.$prestasi->foto_utama) }}"
                                     alt="Prestasi Desa">
                            </div>
                        </div>

                        {{-- KONTEN --}}
                        <div class="col-md-7">

                            <h2 class="fw-bold mb-3 text-dark">
                                {{ $prestasi->judul }}
                            </h2>

                            <div class="text-muted small mb-3">
                                <i class="bi bi-calendar-event me-2"></i>
                                {{ \Carbon\Carbon::parse($prestasi->tanggal)->translatedFormat('d F Y') }}
                            </div>

                            <div class="prestasi-content">
                                {!! nl2br(e($prestasi->deskripsi)) !!}
                            </div>

                            <div class="mt-4">
                                <a href="{{ route('prestasi.index') }}"
                                   class="btn btn-outline-primary">
                                    ← Kembali ke Prestasi
                                </a>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>
</section>

{{-- ================= STYLE ================= --}}
<style>
.detail-img-wrapper{
    width:100%;
    height:100%;
    max-height:260px;
    overflow:hidden;
    border-radius:12px;
    border:3px solid #0d6efd;
}
.detail-img-wrapper img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.prestasi-content{
    font-size:15.5px;
    line-height:1.9;
    color:#555;
}
</style>

@endsection
