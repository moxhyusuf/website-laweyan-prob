<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KesanPesan;
use App\Models\Umkm;
use App\Models\Pembangunan;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'jumlahBerita'      => Berita::count(),
            'jumlahUmkm'        => Umkm::count(),
            'jumlahPembangunan' => Pembangunan::count(),
            'jumlahCurhat'      => KesanPesan::count(),

            'beritaTerbaru' => Berita::latest()->take(3)->get(),
            'curhatTerbaru' => KesanPesan::latest()->take(3)->get(),
        ]);

    }
}
