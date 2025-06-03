<?php

namespace App\Http\Controllers\Admin;

use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\BeritaRequest;

class BeritaController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = Berita::query();

            return DataTables::of($query)
                ->addColumn('action', function ($berita) {
                    return '
                    <div class="flex space-x-2">
                        <a href="' . route('admin.beritas.edit', $berita->id) . '"
                            class="action-btn bg-blue-500 hover:bg-blue-600 text-white">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>
                        <form class="delete-form" action="' . route('admin.beritas.destroy', $berita->id) . '" method="POST">
                            ' . csrf_field() . method_field('DELETE') . '
                            <button type="submit"
                                class="action-btn bg-red-500 hover:bg-red-600 text-white delete-btn"
                                data-id="' . $berita->id . '">
                                <i class="fas fa-trash mr-1"></i> Hapus
                            </button>
                        </form>
                    </div>';
                })
                ->editColumn('dipublikasikan', function ($berita) {
                    return $berita->dipublikasikan
                        ? '<span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-200 rounded-full">Publikasi</span>'
                        : '<span class="px-2 py-1 text-xs font-semibold text-red-800 bg-red-200 rounded-full">Draft</span>';
                })
                ->editColumn('tanggal_publikasi', function ($berita) {
                    return $berita->tanggal_publikasi
                        ? $berita->tanggal_publikasi->format('d M Y H:i')
                        : '-';
                })
                ->rawColumns(['action', 'dipublikasikan'])
                ->make();
        }

        return view('admin.berita.index');
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(BeritaRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['judul']);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Pindahkan ke public/berita
            $file->move(public_path('berita'), $filename);

            // Simpan nama file ke DB
            $data['gambar'] = $filename;
        }

        Berita::create($data);

        return redirect()->route('admin.beritas.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function show(Berita $berita)
    {
        return view('admin.berita.show', compact('berita'));
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(BeritaRequest $request, Berita $berita)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['judul']);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($berita->gambar && file_exists(public_path('berita/' . $berita->gambar))) {
                File::delete(public_path('berita/' . $berita->gambar));
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('berita'), $filename);

            $data['gambar'] = $filename;
        }

        $berita->update($data);

        return redirect()->route('admin.beritas.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->gambar && file_exists(public_path('berita/' . $berita->gambar))) {
            File::delete(public_path('berita/' . $berita->gambar));
        }

        $berita->delete();

        return redirect()->route('admin.beritas.index')->with('success', 'Berita berhasil dihapus!');
    }
}
