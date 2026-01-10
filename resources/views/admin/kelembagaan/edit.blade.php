@extends('layouts.app')

@section('title', 'Edit Data Kelembagaan')
@section('page-title', 'Edit Data Kelembagaan')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Form Edit Data Kelembagaan</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.kelembagaan.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Nama -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text"
                               name="nama"
                               class="form-control"
                               value="{{ $data->nama }}"
                               required>
                    </div>
                </div>

                <!-- Lembaga -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Lembaga</label>
                        <input type="text"
                               name="lembaga"
                               class="form-control"
                               value="{{ $data->lembaga }}"
                               required>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Jumlah -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number"
                               name="jumlah"
                               class="form-control"
                               value="{{ $data->jumlah }}"
                               required>
                    </div>
                </div>

                <!-- Laki-laki -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Laki-laki (L)</label>
                        <input type="number"
                               name="l"
                               class="form-control"
                               value="{{ $data->l }}"
                               required>
                    </div>
                </div>

                <!-- Perempuan -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Perempuan (P)</label>
                        <input type="number"
                               name="p"
                               class="form-control"
                               value="{{ $data->p }}"
                               required>
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
                                  placeholder="Keterangan tambahan (opsional)">{{ $data->keterangan }}</textarea>
                    </div>
                </div>
            </div>

            <div class="text-right mt-3">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Update
                </button>
                <a href="{{ route('admin.kelembagaan.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
