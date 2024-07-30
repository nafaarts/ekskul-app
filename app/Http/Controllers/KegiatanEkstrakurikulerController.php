<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\KegiatanEkstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanEkstrakurikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kegiatan = KegiatanEkstrakurikuler::when($request->user()->can('is-ekstrakurikuler'), function ($query) use ($request) {
            $query->where('ekstrakurikuler_id', $request->user()->ekstrakurikuler->id);
        })->paginate(12);

        $ekstrakurikuler = Ekstrakurikuler::when($request->user()->can('is-ekstrakurikuler'), function ($query) use ($request) {
            $query->where('id', $request->user()->ekstrakurikuler->id);
        })->get();

        return view('kegiatan.index', [
            'kegiatan' => $kegiatan,
            'ekstrakurikuler' => $ekstrakurikuler
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ekstrakurikuler' => 'required|exists:ekstrakurikuler,id',
            'gambar' => 'required|image',
            'deskripsi' => 'required'
        ]);

        if ($validated['gambar']) {
            $request->file('gambar')->store('public/kegiatan');
            $imageName = $request->file('gambar')->hashName('kegiatan');
        }

        KegiatanEkstrakurikuler::create([
            'ekstrakurikuler_id' => $validated['ekstrakurikuler'],
            'gambar' => $imageName,
            'deskripsi' => $validated['deskripsi']
        ]);

        return redirect(route('kegiatan.index'))->with('success', 'Kegiatan berhasil ditambah!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KegiatanEkstrakurikuler $kegiatan)
    {
        $validated = $request->validate([
            'ekstrakurikuler' => 'required|exists:ekstrakurikuler,id',
            'gambar' => 'nullable|image',
            'deskripsi' => 'required'
        ]);

        if (@$validated['gambar']) {
            $oldPath = 'public/' . $kegiatan->gambar;
            if (Storage::exists($oldPath) && $kegiatan->gambar) {
                Storage::delete($oldPath);
            }

            $request->file('gambar')->store('public/kegiatan');
            $imageName = $request->file('gambar')->hashName('kegiatan');
        } else {
            $imageName = $kegiatan->gambar;
        }

        $kegiatan->update([
            'ekstrakurikuler_id' => $validated['ekstrakurikuler'],
            'gambar' => $imageName,
            'deskripsi' => $validated['deskripsi']
        ]);

        return redirect(route('kegiatan.index'))->with('success', 'Kegiatan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KegiatanEkstrakurikuler $kegiatan)
    {
        $oldPath = 'public/' . $kegiatan->gambar;
        if (Storage::exists($oldPath) && $kegiatan->gambar) {
            Storage::delete($oldPath);
        }

        $kegiatan->delete();

        return back()->with('success', 'Kegiatan berhasil dihapus!');
    }
}
