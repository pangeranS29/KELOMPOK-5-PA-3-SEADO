<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\DetailPaket;

class DetailController extends Controller
{
    public function index($id)
    {
        // Ambil data utama beserta relasinya
        $detail_paket = DetailPaket::with(['pilihpaket'])->findOrFail($id);


        $similiarItems = DetailPaket::with(['pilihpaket'])
            ->where('id', '!=', $id)
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('detail', [
            'detail_paket' => $detail_paket,
            'similiarItems' => $similiarItems
        ]);

    }


}
