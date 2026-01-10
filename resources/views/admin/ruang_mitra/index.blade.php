@extends('layouts.app')

@section('title', 'Data Mitra')

@section('content')

<div class="container-fluid mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">Data Mitra</h3>

        <a href="{{ route('admin.ruang_mitra.create') }}" class="btn btn-primary">
            + Tambah Mitra
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped align-middle">
                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th>Nama Mitra</th>
                        <th>Keterangan</th>
                        <th>Foto</th>
                        <th width="200">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_mitra }}</td>
                        <td>{{ Str::limit($item->keterangan, 60) }}</td>
                        <td>
                            @if($item->foto)
                                <img src="{{ asset('storage/'.$item->foto) }}"
                                    width="70" class="rounded">
                            @else
                                <small class="text-muted fst-italic">Belum ada</small>
                            @endif
                        </td>
                       <td class="text-center">
    {{-- EDIT --}}
    <a href="{{ route('admin.ruang_mitra.edit', $item->id) }}"
       class="btn btn-sm btn-warning"
       title="Edit">
        <i class="fas fa-edit"></i>
    </a>

    {{-- HAPUS --}}
    <form action="{{ route('admin.ruang_mitra.destroy', $item->id) }}"
          method="POST"
          class="d-inline"
          onsubmit="return confirm('Hapus data ini?')">
        @csrf
        @method('DELETE')

        <button class="btn btn-sm btn-danger" title="Hapus">
            <i class="fas fa-trash-alt"></i>
        </button>
    </form>
</td>


                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-danger">
                            Belum ada mitra yang ditambahkan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

</div>

@endsection
