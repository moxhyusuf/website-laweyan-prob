@extends('layouts.app')

@section('title', 'Tambah Mitra')

@section('content')

<div class="container-fluid mt-4">

    <h3 class="fw-bold">Tambah Mitra</h3>

    <div class="card shadow-sm mt-4">
        <div class="card-body">

            <form action="{{ route('admin.ruang_mitra.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Nama --}}
                <div class="mb-3">
                    <label for="nama_mitra" class="form-label">Nama Mitra</label>
                    <input type="text" name="nama_mitra" class="form-control" required>
                </div>

                {{-- Keterangan --}}
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="4"></textarea>
                </div>

                {{-- Foto --}}
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" name="foto" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                <a href="{{ route('admin.ruang_mitra.index') }}" class="btn btn-secondary mt-2">Kembali</a>
            </form>

        </div>
    </div>

</div>

@endsection
