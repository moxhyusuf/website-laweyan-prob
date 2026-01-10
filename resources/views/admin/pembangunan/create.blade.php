@extends('layouts.app')

@section('title', 'Tambah Pembangunan')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">
        <h3 class="fw-bold">Tambah Data Pembangunan</h3>
        <a href="{{ route('admin.pembangunan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.pembangunan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" name="judul" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Keterangan</label>
        <textarea name="keterangan" rows="4" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Foto</label>
        <input type="file" name="foto[]" class="form-control" multiple>
        <small class="text-muted">Bisa memilih lebih dari satu foto</small>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>


        </div>
    </div>

</div>
@endsection
