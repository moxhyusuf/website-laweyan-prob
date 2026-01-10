@extends('layouts.app')

@section('title', 'Ruang Pemuda')
@section('page-title', 'Ruang Pemuda')

@section('content')
<div class="container mt-4">


    <a href="{{ route('admin.ruang_pemuda.create') }}" class="btn btn-primary btn-sm mb-3">Tambah Data</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>
                    @if ($item->img)
                    <img src="{{ asset('storage/ruang_pemuda/' . $item->img) }}" width="80">
                    @else
                    <span class="text-muted">Tidak ada</span>
                    @endif
                </td>
               <td class="text-center">
    <a href="{{ route('admin.ruang_pemuda.edit', $item->id) }}" 
       class="btn btn-warning btn-sm me-1">
        <i class="bi bi-pencil"></i>
    </a>

    <form action="{{ route('admin.ruang_pemuda.destroy', $item->id) }}" 
          method="POST" 
          class="d-inline"
          onsubmit="return confirm('Hapus data ini?')">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm">
            <i class="bi bi-trash"></i>
        </button>
    </form>
</td>

            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center text-muted">Belum ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection