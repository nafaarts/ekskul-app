<?php

namespace App\Http\Controllers;

use App\DataTables\KelasDataTable;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KelasDataTable $datatables)
    {
        return $datatables->render('kelas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|unique:kelas,nama'
        ]);

        Kelas::create($validated);

        return redirect(route('kelas.index'))->with('success', 'Kelas berhasil ditambah!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kela)
    {
        return view('kelas.update', [
            'kelas' => $kela
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kela)
    {
        $validated = $request->validate([
            'nama' => 'required|unique:kelas,nama,' . $kela->id
        ]);

        $kela->update($validated);

        return redirect(route('kelas.index'))->with('success', 'Kelas berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kela)
    {
        $kela->delete();

        return redirect(route('kelas.index'))->with('success', 'Kelas berhasil dihapus!');
    }
}
