@extends('layouts.app')

@section('title', 'Kelembagaan')
@section('page-title', 'Data Kelembagaan')

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('admin.kelembagaan.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Lembaga</th>
                    <th>Jumlah</th>
                    <th>L</th>
                    <th>P</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelembagaans as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->lembaga }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->l }}</td>
                    <td>{{ $item->p }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        <a href="{{ route('admin.kelembagaan.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.kelembagaan.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection