<?php

namespace App\Http\Controllers;

use App\DataTables\PendaftarDataTable;
use App\Models\Ekstrakurikuler;
use App\Models\Kelas;
use App\Models\Pendaftar;
use Illuminate\Http\Request;

class PendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PendaftarDataTable $datatables)
    {
        return $datatables->render('pendaftar.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $kelas = Kelas::orderBy('nama')->get();

        $ekstrakurikuler = Ekstrakurikuler::when($request->user()->can('is-ekstrakurikuler'), function ($query) use ($request) {
            $query->where('id', $request->user()->ekstrakurikuler->id);
        })->get();

        return view('pendaftar.create', [
            'ekstrakurikuler' => $ekstrakurikuler,
            'kelas' => $kelas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ekstrakurikuler_id' => 'required|exists:ekstrakurikuler,id',
            'kelas_id' => 'required|exists:kelas,id',
            'nama' => 'required',
            'tgl_lahir' => 'required|date',
            'nisn' => 'required|numeric|unique:pendaftar,nisn',
            'no_hp' => 'required|numeric|unique:pendaftar,no_hp'
        ]);

        Pendaftar::create($validated);

        return redirect(route('pendaftar.index'))->with('success', 'Pendaftar berhasil ditambah!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendaftar $pendaftar)
    {
        $kelas = Kelas::orderBy('nama')->get();
        $ekstrakurikuler = Ekstrakurikuler::all();

        return view('pendaftar.update', [
            'ekstrakurikuler' => $ekstrakurikuler,
            'kelas' => $kelas,
            'pendaftar' => $pendaftar
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pendaftar $pendaftar)
    {
        $validated = $request->validate([
            'ekstrakurikuler_id' => 'required|exists:ekstrakurikuler,id',
            'kelas_id' => 'required|exists:kelas,id',
            'nama' => 'required',
            'tgl_lahir' => 'required|date',
            'nisn' => 'required|numeric|unique:pendaftar,nisn,' . $pendaftar->id,
            'no_hp' => 'required|numeric|unique:pendaftar,no_hp,' . $pendaftar->id
        ]);

        $pendaftar->update($validated);

        return redirect(route('pendaftar.index'))->with('success', 'Pendaftar berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendaftar $pendaftar)
    {
        $pendaftar->delete();

        return redirect(route('pendaftar.index'))->with('success', 'Pendaftar berhasil dihapus!');
    }
}
