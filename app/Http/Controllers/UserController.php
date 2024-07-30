<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'required|numeric',
            'hak_akses' => 'required|in:ADMIN,EKSTRAKURIKULER',
            'password' => 'required|confirmed'
        ]);

        User::create($validated);

        return redirect(route('users.index'))
            ->with('success', 'User berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.update', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'no_hp' => 'required|numeric',
            'hak_akses' => 'required|in:ADMIN,EKSTRAKURIKULER',
            'password' => 'nullable|confirmed'
        ]);

        if (!$validated['password']) {
            $validated['password'] = $user->password;
        }

        $user->update($validated);

        return redirect(route('users.index'))->with('success', 'User berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('success', 'User berhasil dihapus.');
    }
}
