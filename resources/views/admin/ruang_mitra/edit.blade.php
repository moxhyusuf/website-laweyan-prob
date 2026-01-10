@extends('layouts.app')

@section('title', 'Edit Mitra')

@section('content')

<div class="container-fluid mt-4">

    <h3 class="fw-bold">Edit Mitra</h3>

    <div class="card shadow-sm mt-4">
        <div class="card-body">

            <form action="{{ route('admin.ruang_mitra.update', $mitra->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Nama --}}
                <div class="mb-3">
                    <label for="nama_mitra" class="form-label">Nama Mitra</label>
                    <input type="text" name="nama_mitra" class="form-control"
                        value="{{ $mitra->nama_mitra }}" required>
                </div>

                {{-- Keterangan --}}
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="4">{{ $mitra->keterangan }}</textarea>
                </div>

                {{-- Foto --}}
                <div class="mb-3">
                    <label class="form-label">Foto Saat Ini</label><br>
                    <img src="{{ asset('storage/' . $mitra->foto) }}" width="150" class="rounded mb-3">
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Ganti Foto (Opsional)</label>
                    <input type="file" name="foto" class="form-control">
                </div>

                <button type="submit" class="btn btn-success mt-2">Simpan Perubahan</button>
                <a href="{{ route('admin.ruang_mitra.index') }}" class="btn btn-secondary mt-2">Kembali</a>
            </form>

        </div>
    </div>

</div>

@endsection
