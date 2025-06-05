<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetailPaket;

class LandingController extends Controller
{
    public function index()
    {
        // Ambil detail_paket yang hanya memiliki relasi pilihpaket dengan status 'aktif'
        $detail_pakets = DetailPaket::with(['pilihpaket' => function($query) {
                $query->where('status_paket', 'aktif');
            }])
            ->whereHas('pilihpaket', function($query) {
                $query->where('status_paket', 'aktif');
            })
            ->latest()
            ->get();

        return view('landing', [
            'detail_pakets' => $detail_pakets
        ]);
    }
}
