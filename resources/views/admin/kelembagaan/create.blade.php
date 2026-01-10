@extends('layouts.app')

@section('title', 'Tambah Data Kelembagaan')
@section('page-title', 'Tambah Data Kelembagaan')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Form Tambah Data Kelembagaan</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.kelembagaan.store') }}" method="POST">
            @csrf

            <div class="row">
                <!-- Nama -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                </div>

                <!-- Lembaga -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Lembaga</label>
                        <input type="text" name="lembaga" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Jumlah -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" required>
                    </div>
                </div>

                <!-- Laki-laki -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Laki-laki (L)</label>
                        <input type="number" name="l" class="form-control" required>
                    </div>
                </div>

                <!-- Perempuan -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Perempuan (P)</label>
                        <input type="number" name="p" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Keterangan -->
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan"
                                  class="form-control"
                                  rows="3"
                                  placeholder="Keterangan tambahan (opsional)"></textarea>
                    </div>
                </div>
            </div>

            <div class="text-right mt-3">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('admin.kelembagaan.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
