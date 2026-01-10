<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MitraController extends Controller
{
    public function frontend()
{
    $mitra = Mitra::get();
    return view('pages.ruang_mitra.index', compact('mitra'));

}

    public function index()
    {
        $data = Mitra::latest()->get();
        return view('admin.ruang_mitra.index', compact('data'));
    }

    public function edit($id)
    {
        $mitra = Mitra::findOrFail($id);
        return view('admin.ruang_mitra.edit', compact('mitra'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_mitra' => 'required',
            'keterangan' => 'nullable',
            'foto' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $mitra = Mitra::findOrFail($id);

        // jika ada upload foto baru
        if ($request->hasFile('foto')) {

            // hapus foto lama
            if ($mitra->foto && Storage::disk('public')->exists($mitra->foto)) {
                Storage::disk('public')->delete($mitra->foto);
            }

            // save foto baru
            $foto = $request->file('foto')->store('ruang_mitra', 'public');
        } else {
            $foto = $mitra->foto;
        }

        $mitra->update([
            'nama_mitra' => $request->nama_mitra,
            'keterangan' => $request->keterangan,
            'foto'       => $foto,
        ]);

        return redirect()->route('admin.ruang_mitra.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function create()
    {
        return view('admin.ruang_mitra.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nama_mitra' => 'required',
        'keterangan' => 'nullable',
        'foto'       => 'required|image|mimes:png,jpg,jpeg|max:2048',
    ]);

    $foto = $request->file('foto')->store('ruang_mitra', 'public');

Mitra::create([
    'nama_mitra' => $request->nama_mitra,
    'keterangan' => $request->keterangan,
    'foto'       => $foto,
]);


    return redirect()->route('admin.ruang_mitra.index')
        ->with('success', 'Data berhasil ditambahkan');
}

public function destroy($id)
{
    $mitra = Mitra::findOrFail($id);

    if ($mitra->foto && Storage::disk('public')->exists($mitra->foto)) {
        Storage::disk('public')->delete($mitra->foto);
    }

    $mitra->delete();

    return redirect()->route('admin.ruang_mitra.index')
        ->with('success', 'Data berhasil dihapus!');
}

}
