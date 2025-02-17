<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Level;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('level')->get();
        return view('pages.permissions.index', compact('users'));
    }

    public function create()
    {
        $levels = Level::all();
        return view('users.create', compact('levels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:user,username',
            'password' => 'required|min:6',
            'nama_user' => 'required',
            'id_level' => 'required|exists:level,id_level',
        ]);

        User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'nama_user' => $request->nama_user,
            'id_level' => $request->id_level,
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit(User $user)
    {
        $levels = Level::all();
        return view('pages.permissions.update', compact('user', 'levels'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required|unique:user,username,' . $user->id_user . ',id_user',
            'nama_user' => 'required',
            'id_level' => 'required|exists:level,id_level',
        ]);

        $user->update([
            'username' => $request->username,
            'nama_user' => $request->nama_user,
            'id_level' => $request->id_level,
        ]);

        return redirect()->route('permissions.index')->with('success', 'User berhasil diperbarui!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('permissions.index')->with('success', 'User berhasil dihapus!');
    }
}
