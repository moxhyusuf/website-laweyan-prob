@extends('layouts.app')

@section('title', 'Tambah Ruang Pemuda')


@section('content')
<div class="container mt-4">

    <h3 class="fw-bold mb-4">Tambah Data Ruang Pemuda</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.ruang_pemuda.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Nama -->
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" value="{{ old('nama') }}" class="form-control" required>
                    @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Keterangan -->
                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="4">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Gambar -->
                <div class="mb-3">
                    <label class="form-label">Upload Gambar</label>
                    <input type="file" name="img" class="form-control">
                    <small class="text-muted d-block">Format: JPG, PNG, maksimal 2MB.</small>
                    @error('img')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Tombol Submit dan Kembali -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('admin.ruang_pemuda.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
