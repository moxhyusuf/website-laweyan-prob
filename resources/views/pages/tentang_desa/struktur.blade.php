@extends('layout.app')

@section('title', 'Struktur Pemerintahan')

@section('content')

<main class="main">

    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li class="current">Struktur Pemerintahan</li>
                </ol>
            </nav>
        </div>
    </div>

</main>

<section id="struktural" class="about section">
    <div class="container section-title" data-aos="fade-up">
        <h2>STRUKTUR PEMERINTAHAN DESA LAWEYAN</h2>
    </div>

    <div class="container">

        @forelse($struktur as $item)
            <div class="row justify-content-center mb-4">
                <img 
                    src="{{ asset('storage/' . $item->gambar) }}"
                    class="img-fluid"
                    alt="Struktur Desa">
            </div>
        @empty
            <p class="text-center text-muted">Belum ada data struktur.</p>
        @endforelse

    </div>
</section>

@endsection
