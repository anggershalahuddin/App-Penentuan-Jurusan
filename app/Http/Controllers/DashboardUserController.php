<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardUserController extends Controller
{
    public function updateAccount(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
            'no_telp' => 'required|string|max:15',
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:0,1', // Admin atau User
        ]);

        // Dapatkan user yang sedang login
        $user = Auth::user();

        // Update data user
        $user->nama = $request->input('nama');
        $user->username = $request->input('username');
        $user->no_telp = $request->input('no_telp');

        if ($request->input('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->role = $request->input('role');

        // Simpan perubahan ke database
        $user->save();

        return redirect()->back()->with('success', 'Akun berhasil diperbarui!');
    }
}
