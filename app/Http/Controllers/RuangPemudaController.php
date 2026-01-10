<?php

namespace App\Http\Controllers;

use App\Models\RuangPemuda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RuangPemudaController extends Controller
{
    public function frontend()
    {
        $item = RuangPemuda::latest()->get();
        return view('pages.ruang_pemuda.ruang_pemuda', compact('item'));
    }

    public function show($id)
{
    $item = RuangPemuda::findOrFail($id);
    return view('pages.ruang_pemuda.show', compact('item'));
}


    public function index()
    {
        $data = RuangPemuda::latest()->get();
        return view('admin.ruang_pemuda.index', compact('data'));
    }

    // ==========================
    //   FORM EDIT
    // ==========================
    public function edit($id)
    {
        $data = RuangPemuda::findOrFail($id);
        return view('admin.ruang_pemuda.edit', compact('data'));
    }

    // ==========================
    //   PROSES UPDATE
    // ==========================
    public function update(Request $request, $id)
    {
        $data = RuangPemuda::findOrFail($id);

        $request->validate([
            'nama'       => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'img'        => 'nullable|image|max:2048'
        ]);

        // Update field biasa
        $data->nama = $request->nama;
        $data->keterangan = $request->keterangan;

        // Jika upload gambar baru
        if ($request->hasFile('img')) {

            // Hapus gambar lama jika ada
            if ($data->img && Storage::disk('public')->exists('ruang_pemuda/' . $data->img)) {
                Storage::disk('public')->delete('ruang_pemuda/' . $data->img);
            }

            // Upload gambar baru
            $path = $request->file('img')->store('ruang_pemuda', 'public');
            $data->img = basename($path); // hanya simpan nama file di DB
        }

        $data->save();

        return redirect()->route('admin.ruang_pemuda.index')
            ->with('success', 'Data berhasil diperbarui!');
    }

    public function create()
    {
        return view('admin.ruang_pemuda.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'keterangan' => 'nullable',
            'img' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $filename = null;

        if ($request->hasFile('img')) {
            $filename = time() . '.' . $request->img->getClientOriginalExtension();
            $request->img->storeAs('ruang_pemuda', $filename, 'public');
        }


        RuangPemuda::create([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'img' => $filename,
        ]);

        return redirect()->route('admin.ruang_pemuda.index')
            ->with('success', 'Data berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $item = RuangPemuda::findOrFail($id);

        // Hapus gambar jika ada
        if ($item->img && file_exists(public_path('storage/ruang_pemuda/' . $item->img))) {
            unlink(public_path('storage/ruang_pemuda/' . $item->img));
        }

        // Hapus data
        $item->delete();

        return redirect()->route('admin.ruang_pemuda.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
