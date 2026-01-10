@extends('layouts.app')

@section('title', 'Edit Pembangunan')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">
        <h3 class="fw-bold">Edit Data Pembangunan</h3>
        <a href="{{ route('admin.pembangunan.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.pembangunan.update', $pembangunan->id) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- JUDUL --}}
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text"
                           name="judul"
                           class="form-control"
                           value="{{ old('judul', $pembangunan->judul) }}"
                           required>
                </div>

                {{-- KETERANGAN --}}
                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan"
                              rows="4"
                              class="form-control">{{ old('keterangan', $pembangunan->keterangan) }}</textarea>
                </div>

                {{-- FOTO LAMA --}}
                <div class="mb-3">
                    <label class="form-label">Foto Saat Ini</label>

                    @if ($pembangunan->media->count())
                        <div class="row">
                            @foreach ($pembangunan->media as $media)
                                <div class="col-md-3 mb-3">
                                    <div class="card shadow-sm h-100">

                                        <img src="{{ asset('storage/' . $media->file_path) }}"
                                             class="rounded-top w-100"
                                             style="height:160px; object-fit:cover;"
                                             alt="Foto Pembangunan">

                                        <div class="card-body p-2">

                                            {{-- GANTI FOTO --}}
                                            <input type="file"
                                                   name="replace_photo[{{ $media->id }}]"
                                                   class="form-control form-control-sm mb-2">

                                            {{-- HAPUS FOTO --}}
                                            <button type="button"
                                                    class="btn btn-danger btn-sm w-100 btn-hapus-foto"
                                                    data-id="{{ $media->id }}">
                                                Hapus Foto
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted">Belum ada foto</p>
                    @endif
                </div>

                {{-- TAMBAH FOTO --}}
                <div class="mb-3">
                    <label class="form-label">Tambah Foto Baru</label>
                    <input type="file"
                           name="foto[]"
                           class="form-control"
                           multiple>
                </div>

                <button type="submit" class="btn btn-primary">
                    Update Data
                </button>

            </form>

        </div>
    </div>

</div>

{{-- SCRIPT LANGSUNG DI SINI --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Ambil semua tombol hapus
    const btnHapusFoto = document.querySelectorAll('.btn-hapus-foto');
    
    btnHapusFoto.forEach(function(btn) {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            
            if (!confirm('Yakin ingin menghapus foto ini?')) return;
            
            // Disable button
            this.disabled = true;
            this.textContent = 'Menghapus...';
            
            // Kirim request DELETE
            fetch('/admin/media/' + id, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    alert('Foto berhasil dihapus');
                    location.reload();
                } else {
                    alert('Gagal menghapus foto: ' + (data.message || ''));
                    this.disabled = false;
                    this.textContent = 'Hapus Foto';
                }
            })
            .catch(err => {
                console.error('Error:', err);
                alert('Terjadi kesalahan saat menghapus foto');
                this.disabled = false;
                this.textContent = 'Hapus Foto';
            });
        });
    });
});
</script>
@endsection