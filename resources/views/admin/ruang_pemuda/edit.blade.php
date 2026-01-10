@extends('layouts.app')

@section('title', 'Edit Ruang Pemuda')


@section('content')
<div class="container mt-4">

    <h3 class="fw-bold mb-4">Edit Data Ruang Pemuda</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.ruang_pemuda.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Nama -->
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" value="{{ old('nama', $data->nama) }}" class="form-control" required>
                    @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Keterangan -->
                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="4">{{ old('keterangan', $data->keterangan) }}</textarea>
                    @error('keterangan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Gambar Sebelumnya -->
                <div class="mb-3">
                    <label class="form-label">Gambar Sebelumnya</label><br>
                    @if ($data->img)
                        <img src="{{ asset('storage/ruang_pemuda/' . $data->img) }}" width="120" class="mb-2 rounded">
                    @else
                        <p class="text-muted">Belum ada gambar.</p>
                    @endif
                </div>

                <!-- Upload Gambar Baru -->
                <div class="mb-3">
                    <label class="form-label">Upload Gambar Baru (opsional)</label>
                    <input type="file" name="img" class="form-control">
                    <small class="text-muted d-block">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                    @error('img')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Tombol Update dan Kembali -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('admin.ruang_pemuda.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Update
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
