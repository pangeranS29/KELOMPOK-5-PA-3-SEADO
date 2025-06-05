<?php

namespace App\Http\Controllers\Admin;

use App\Models\PilihPaket;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use App\Http\Requests\PilihPaketRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PilihPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response\|\Illuminate\Http\JsonResponse
     */
    public function index()
    {
        //Script untuk Datatables,Ajax
        if (request()->ajax()) {
            $query = PilihPaket::query();

            return DataTables::of($query)
                ->addColumn('action', function ($pilihpakets) {
                    return '
                        <a class="block w-full px-2 py-1 mb-1 text-xs text-center text-white transition duration-500 bg-gray-700 border border-gray-700 rounded-md select-none ease hover:bg-gray-800 focus:outline-none focus:shadow-outline"
                            href="' . route('admin.pilihpakets.edit', $pilihpakets->id) . '">
                           Edit
                        </a>';
                })
                ->addColumn('status', function ($pilihpakets) {
                    return $pilihpakets->status_paket == 'aktif'
                        ? '<span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-200 rounded-full">Aktif</span>'
                        : '<span class="px-2 py-1 text-xs font-semibold text-red-800 bg-red-200 rounded-full">Nonaktif</span>';
                })
                ->rawColumns(['action', 'status'])
                ->make();
        }

        //Script untuk return halaman view pilihpaket
        return view('admin.pilihpakets.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pilihpakets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PilihPaketRequest $request)
    {
        // Data sudah divalidasi oleh PilihPaketRequest
        $data = $request->validated();
        $data['status_paket'] = $request->status_paket ?? 'aktif';
        PilihPaket::create($data);

        return redirect()->route('admin.pilihpakets.index')->with('success', 'Paket berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PilihPaket $pilihpaket)
    {
        return view('admin.pilihpakets.edit', compact('pilihpaket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PilihPaketRequest $request, string $id)
    {
        $pilihpakets = PilihPaket::findOrFail($id);
        $data = $request->validated();
        $data['status_paket'] = $request->status_paket;
        $pilihpakets->update($data);
        return redirect()->route('admin.pilihpakets.index')->with('success', 'Paket berhasil diperbarui!');
    }
}
