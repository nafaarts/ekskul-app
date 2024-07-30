<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\Kelas;
use App\Models\Pendaftar;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        $ekstrakurikuler = Ekstrakurikuler::all();
        $kelas = Kelas::orderBy('nama')->get();

        return view('daftar', [
            'ekstrakurikuler' => $ekstrakurikuler,
            'kelas' => $kelas
        ]);
    }

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

        return redirect(route('daftar.index'))->with('success', 'Terima Kasih, Data Anda berhasil disimpan');
    }
}
