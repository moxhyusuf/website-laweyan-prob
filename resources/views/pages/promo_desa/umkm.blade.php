@extends('layout.app')

@section('title', 'UMKM Desa')

@section('content')

{{-- ================= PAGE TITLE ================= --}}
<div class="page-title" data-aos="fade">
    <div class="container">
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li class="current">UMKM Desa</li>
            </ol>
        </nav>
    </div>
</div>

{{-- ================= UMKM LIST ================= --}}
<section class="section ">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2 class="fw-bold">UMKM DESA</h2>
            <p class="text-muted">Produk unggulan pelaku UMKM lokal</p>
        </div>

        <div class="umkm-grid">
            @forelse ($umkm as $row)
            <div class="umkm-card" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 80 }}">

                {{-- IMAGE --}}
                <div class="umkm-image">
                    <img src="{{ $row->media->count()
                        ? asset('storage/'.$row->media->first()->file_path)
                        : asset('assets/img/no-image.png') }}"
                        alt="{{ $row->nama }}">

                    <span class="price-badge">
                        Rp{{ number_format($row->harga, 0, ',', '.') }}
                    </span>
                </div>

                {{-- BODY --}}
                <div class="umkm-body">
                    <h3>{{ $row->nama }}</h3>
                    <p class="deskripsi">
                        {{ Str::limit($row->deskripsi, 90) }}
                    </p>
                </div>

                {{-- ACTION --}}
                <div class="umkm-action">
                    <a href="{{ route('umkm.detail', $row->id) }}" class="btn-detail">
                        Detail
                    </a>

                    <a href="https://wa.me/{{ $row->wa }}?text=Halo,%20saya%20ingin%20bertanya%20tentang%20produk%20{{ urlencode($row->nama) }}"
                       target="_blank"
                       class="btn-wa">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                </div>

            </div>
            @empty
                <p class="text-center text-muted">Data UMKM belum tersedia</p>
            @endforelse
        </div>

    </div>
</section>

{{-- ================= CSS ================= --}}
<style>
.umkm-grid{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(260px,1fr));
    gap:22px;
}

.umkm-card{
    background:#fff;
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 10px 25px rgba(0,0,0,.12);
    transition:.35s ease;
    display:flex;
    flex-direction:column;
}

.umkm-card:hover{
    transform:translateY(-8px);
    box-shadow:0 18px 40px rgba(0,0,0,.18);
}

.umkm-image{
    position:relative;
    overflow:hidden;
}

.umkm-image img{
    width:100%;
    height:220px;
    object-fit:cover;
    transition:.5s ease;
}

.umkm-card:hover .umkm-image img{
    transform:scale(1.08);
}

.price-badge{
    position:absolute;
    bottom:12px;
    left:12px;
    background:#ffb703;
    color:#000;
    font-weight:700;
    padding:6px 12px;
    border-radius:10px;
    font-size:14px;
}

.umkm-body{
    padding:14px 16px;
    flex-grow:1;
}

.umkm-body h3{
    font-size:18px;
    font-weight:700;
    margin-bottom:6px;
}

.deskripsi{
    font-size:14px;
    color:#555;
    line-height:1.6;
}

.umkm-action{
    display:flex;
    gap:10px;
    padding:14px 16px;
    border-top:1px solid #eee;
}

.btn-detail{
    flex:1;
    background:#0d6efd;
    color:#fff;
    padding:10px;
    text-align:center;
    border-radius:12px;
    font-weight:600;
    text-decoration:none;
}

.btn-detail:hover{
    background:#0b5ed7;
}

.btn-wa{
    width:46px;
    background:#25D366;
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:12px;
    font-size:20px;
    text-decoration:none;
}

.btn-wa:hover{
    background:#1ebe57;
}

@media(max-width:576px){
    .umkm-image img{height:200px;}
}
</style>

@endsection
