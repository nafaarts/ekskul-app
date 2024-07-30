<?php

namespace App\Http\Controllers;

use App\DataTables\EkstrakurikulerDataTable;
use App\Models\Ekstrakurikuler;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EkstrakurikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(EkstrakurikulerDataTable $dataTable)
    {
        return $dataTable->render('ekstrakurikuler.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ekstrakurikuler.create', [
            'admin' => User::where('hak_akses', 'EKSTRAKURIKULER')->doesntHave('ekstrakurikuler')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'admin' => 'required|exists:users,id',
            'nama' => 'required|max:255',
            'deskripsi' => 'required',
            'gambar' => 'required|image'
        ]);

        if ($validated['gambar']) {
            $request->file('gambar')->store('public/ekstrakurikuler');
            $imageName = $request->file('gambar')->hashName('ekstrakurikuler');
        }

        Ekstrakurikuler::create([
            ...$validated,
            'user_id' => $validated['admin'],
            'slug' => str()->slug($validated['nama']),
            'gambar' => $imageName
        ]);

        return redirect(route('ekstrakurikuler.index'))->with('success', 'Ekstrakurikuler berhasil ditambah.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ekstrakurikuler $ekstrakurikuler)
    {
        return view('ekstrakurikuler.update', [
            'ekstrakurikuler' => $ekstrakurikuler,
            'admin' => User::where('hak_akses', 'EKSTRAKURIKULER')->whereDoesntHave('ekstrakurikuler', function (Builder $query) use ($ekstrakurikuler) {
                $query->whereNot('id', $ekstrakurikuler->id);
            })->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ekstrakurikuler $ekstrakurikuler)
    {
        $validated = $request->validate([
            'admin' => 'required|exists:users,id',
            'nama' => 'required|max:255',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image'
        ]);

        if (@$validated['gambar']) {
            $oldPath = 'public/' . $ekstrakurikuler->gambar;
            if (Storage::exists($oldPath) && $ekstrakurikuler->gambar) {
                Storage::delete($oldPath);
            }

            $request->file('gambar')->store('public/ekstrakurikuler');
            $imageName = $request->file('gambar')->hashName('ekstrakurikuler');
        } else {
            $imageName = $ekstrakurikuler->gambar;
        }

        $ekstrakurikuler->update([
            ...$validated,
            'user_id' => $validated['admin'],
            'slug' => str()->slug($validated['nama']),
            'gambar' => $imageName
        ]);

        return redirect(route('ekstrakurikuler.index'))->with('success', 'Ekstrakurikuler berhasil ditambah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ekstrakurikuler $ekstrakurikuler)
    {
        $oldPath = 'public/' . $ekstrakurikuler->gambar;
        if (Storage::exists($oldPath) && $ekstrakurikuler->gambar) {
            Storage::delete($oldPath);
        }

        $ekstrakurikuler->delete();

        return back()->with('success', 'Ekstrakurikuler berhasil dihapus!');
    }
}
