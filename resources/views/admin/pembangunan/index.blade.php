@extends('layouts.app')

@section('title', 'Data Pembangunan')

@section('content')

<div class="container-fluid mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">Data Pembangunan</h3>
        <a href="{{ route('admin.pembangunan.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%">No</th>
                            <th>Judul</th>
                            <th>Keterangan</th>
                            <th width="15%">Foto</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>
                                    @if ($item->media->count())
                                        <img src="{{ asset('storage/' . $item->media->first()->file_path) }}"
                                            class="img-thumbnail"
                                            width="100">
                                    @else
                                        <span class="text-muted">Tidak ada foto</span>
                                    @endif
                                </td>

                                <td>
                                   <a href="{{ route('admin.pembangunan.show', $item->id) }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                   <a href="{{ route('admin.pembangunan.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>

                                    <form action="{{ route('admin.pembangunan.destroy', $item->id) }}" 
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"> <i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada data pembangunan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
