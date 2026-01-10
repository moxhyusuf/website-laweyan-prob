@extends('layout.app')

@section('title', 'Profil Kepala Desa')

@section('content')

<!-- Page Title -->
<div class="page-title" data-aos="fade">
    <div class="container">
        <h1 class="text-center fw-bold">Profil Kepala Desa</h1>
    </div>
</div>

<section id="kades" class="section pt-4">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

        @if ($kades)

        <div class="row align-items-center shadow-lg p-4 rounded-4 bg-white">

            <!-- FOTO KADES -->
            <div class="col-lg-5 text-center mb-4 mb-lg-0">
                <img
                    src="{{ $kades->foto ? asset('storage/'.$kades->foto) : '/assets/img/default-user.png' }}"
                    class="img-fluid rounded-4 shadow"
                    style="max-height: 420px; object-fit: cover;"
                    alt="Foto Kepala Desa">
            </div>

            <!-- DATA KADES -->
            <div class="col-lg-7">

                <h2 class="fw-bold mb-3 text-primary text-uppercase">
                    {{ $kades->nama }}
                </h2>

                @if ($kades->periode_mulai || $kades->periode_selesai)
                <p class="text-muted mb-2">
                    <strong>Periode:</strong>
                    {{ $kades->periode_mulai ? date('d F Y', strtotime($kades->periode_mulai)) : '-' }}
                    -
                    {{ $kades->periode_selesai ? date('d F Y', strtotime($kades->periode_selesai)) : 'Sekarang' }}
                </p>
                @endif

                @if ($kades->alamat)
                <p class="mb-3"><strong>Alamat:</strong> {{ $kades->alamat }}</p>
                @endif

                <!-- Sambutan -->
                @if ($kades->sambutan)
                <div class="p-3 mb-4 rounded-3" style="background:#f8fafc;">
                    <h5 class="fw-bold text-primary">Sambutan Kepala Desa</h5>
                    <p class="mb-0">{{ $kades->sambutan }}</p>
                </div>
                @endif

                <div class="row">
                    <!-- Visi -->
                    @if ($kades->visi)
                    <div class="col-md-6 mb-3">
                        <div class="p-3 rounded-3 shadow-sm" style="background:#f1f5f9;">
                            <h5 class="fw-bold text-success">Visi</h5>
                            <p class="mb-0">{{ $kades->visi }}</p>
                        </div>
                    </div>
                    @endif

                    <!-- Misi -->
                    @if ($kades->misi)
                    <div class="col-md-6 mb-3">
                        <div class="p-3 rounded-3 shadow-sm" style="background:#f1f5f9;">
                            <h5 class="fw-bold text-info">Misi</h5>
                            <p class="mb-0">{{ $kades->misi }}</p>
                        </div>
                    </div>
                    @endif
                </div>

            </div>
        </div>

        @else
        <!-- Jika data kosong -->
        <div class="alert alert-warning text-center p-4">
            <strong>Data Kepala Desa belum tersedia.</strong>
        </div>
        @endif

    </div>
</section>

@endsection
