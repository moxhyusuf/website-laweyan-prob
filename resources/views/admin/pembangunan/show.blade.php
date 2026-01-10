@extends('layouts.app')

@section('title', 'Detail Pembangunan')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">
        <h3 class="fw-bold">Detail Pembangunan</h3>
        <a href="{{ route('admin.pembangunan.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-borderless">
                <tr>
                    <th width="20%">Judul</th>
                    <td>: {{ $pembangunan->judul }}</td>
                </tr>
                <tr>
                    <th>Keterangan</th>
                    <td>: {{ $pembangunan->keterangan }}</td>
                </tr>
            </table>

            <hr>

            <h5 class="fw-bold mb-3">Dokumentasi Foto</h5>

            @if ($pembangunan->media->count())
                <div class="row">
                    @foreach ($pembangunan->media as $media)
                        <div class="col-md-3 mb-3">
                            <img src="{{ asset('storage/' . $media->file_path) }}"
                                 class="img-fluid rounded shadow-sm">
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-muted">Tidak ada foto dokumentasi.</p>
            @endif

        </div>
    </div>

</div>
@endsection
