<?php

namespace App\Http\Controllers;

use App\Models\Pembangunan;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PembangunanController extends Controller
{
    /* ================= FRONTEND ================= */

    public function frontend()
    {
        $pembangunan = Pembangunan::with('media')->latest()->get();
        return view('pages.update_desa.bangunan', compact('pembangunan'));
    }

    public function frontendDetail($id)
    {
        $pembangunan = Pembangunan::with('media')->findOrFail($id);

        return view('pages.update_desa.pembangunan_detail', compact('pembangunan'));

    }


    /* ================= ADMIN ================= */

    public function index()
    {
        $data = Pembangunan::with('media')->get();
        return view('admin.pembangunan.index', compact('data'));
    }

    public function create()
    {
        return view('admin.pembangunan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'keterangan'=> 'nullable|string',
            'foto.*'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $pembangunan = Pembangunan::create([
            'judul'      => $request->judul,
            'keterangan' => $request->keterangan,
        ]);

        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                $path = $file->store('pembangunan', 'public');

                Media::create([
                    'parent_id'   => $pembangunan->id,
                    'parent_type' => Pembangunan::class,
                    'file_path'   => $path,
                ]);
            }
        }

        return redirect()
            ->route('admin.pembangunan.index')
            ->with('success', 'Data pembangunan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pembangunan = Pembangunan::with('media')->findOrFail($id);
        return view('admin.pembangunan.edit', compact('pembangunan'));
    }

    public function update(Request $request, $id)
{
    $pembangunan = Pembangunan::findOrFail($id);

    $request->validate([
        'judul'              => 'required|string|max:255',
        'keterangan'         => 'nullable|string',
        'foto.*'             => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'replace_photo.*'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    /* =========================
       UPDATE DATA UTAMA
    ========================= */
    $pembangunan->update([
        'judul'      => $request->judul,
        'keterangan' => $request->keterangan,
    ]);

    /* =========================
       GANTI FOTO SATUAN
    ========================= */
    if ($request->hasFile('replace_photo')) {
        foreach ($request->file('replace_photo') as $mediaId => $file) {

            $media = Media::find($mediaId);
            if (!$media) continue;

            if (Storage::disk('public')->exists($media->file_path)) {
                Storage::disk('public')->delete($media->file_path);
            }

            $path = $file->store('pembangunan', 'public');

            $media->update([
                'file_path' => $path
            ]);
        }
    }

    /* =========================
       TAMBAH FOTO BARU
    ========================= */
    if ($request->hasFile('foto')) {
        foreach ($request->file('foto') as $file) {
            $path = $file->store('pembangunan', 'public');

            Media::create([
                'parent_id'   => $pembangunan->id,
                'parent_type' => Pembangunan::class,
                'file_path'   => $path,
            ]);
        }
    }

    return redirect()
        ->route('admin.pembangunan.index')
        ->with('success', 'Data pembangunan berhasil diperbarui');
}


    public function show($id)
    {
        $pembangunan = Pembangunan::with('media')->findOrFail($id);
        return view('admin.pembangunan.show', compact('pembangunan'));
    }

    public function destroy($id)
    {
        $pembangunan = Pembangunan::with('media')->findOrFail($id);

        foreach ($pembangunan->media as $media) {
            if (Storage::disk('public')->exists($media->file_path)) {
                Storage::disk('public')->delete($media->file_path);
            }
            $media->delete();
        }

        $pembangunan->delete();

        return redirect()
            ->route('admin.pembangunan.index')
            ->with('success', 'Data pembangunan beserta fotonya berhasil dihapus');
    }

  public function destroyMedia(Media $media)
    {
        try {
            // Hapus file dari storage
            if (Storage::disk('public')->exists($media->file_path)) {
                Storage::disk('public')->delete($media->file_path);
            }
            
            // Hapus record dari database
            $media->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Foto berhasil dihapus'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus foto: ' . $e->getMessage()
            ], 500);
        }
    }
}
