<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kelembagaan;
use Illuminate\Http\Request;

class KelembagaanController extends Controller
{
        public function frontend()
    {
        $kelembagaans = Kelembagaan::all();
        return view('pages.tentang_desa.kelembagaan', compact('kelembagaans'));
    }

    public function index()
    {
        $kelembagaans = Kelembagaan::all();
        return view('admin.kelembagaan.index', compact('kelembagaans'));
    }

    public function create()
{
    return view('admin.kelembagaan.create');
}

        public function store(Request $request)
        {
            $request->validate([
                'nama' => 'required|string|max:255',
                'lembaga' => 'required|string|max:255',
                'jumlah' => 'required|numeric',
                'l' => 'required|numeric',
                'p' => 'required|numeric',
                'keterangan' => 'nullable|string',
            ]);

            Kelembagaan::create([
                'nama' => $request->nama,
                'lembaga' => $request->lembaga,
                'jumlah' => $request->jumlah,
                'l' => $request->l,
                'p' => $request->p,
                'keterangan' => $request->keterangan,
            ]);

            return redirect()->route('admin.kelembagaan.index')
                            ->with('success', 'Data kelembagaan berhasil ditambahkan!');
        }


                public function edit($id)
            {
                $data = Kelembagaan::findOrFail($id);
                return view('admin.kelembagaan.edit', compact('data'));
            }

            public function update(Request $request, $id)
            {
                $request->validate([
                    'nama' => 'required|string|max:255',
                    'lembaga' => 'required|string|max:255',
                    'jumlah' => 'required|numeric',
                    'l' => 'required|numeric',
                    'p' => 'required|numeric',
                    'keterangan' => 'nullable|string',
                ]);

                $data = Kelembagaan::findOrFail($id);

                $data->update([
                    'nama' => $request->nama,
                    'lembaga' => $request->lembaga,
                    'jumlah' => $request->jumlah,
                    'l' => $request->l,
                    'p' => $request->p,
                    'keterangan' => $request->keterangan,
                ]);

                return redirect()->route('admin.kelembagaan.index')
                                ->with('success', 'Data kelembagaan berhasil diperbarui!');
            }


    public function destroy(Kelembagaan $kelembagaan)
    {
        $kelembagaan->delete();
        return redirect()->route('admin.kelembagaan.index')->with('success', 'Data berhasil dihapus');
    }
}
