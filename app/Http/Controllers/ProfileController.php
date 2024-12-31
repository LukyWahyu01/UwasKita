<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user(); // Mendapatkan data pengguna yang sedang login
        return view('profile.index', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user(); // Ambil data pengguna yang sedang login
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
            // Role tidak perlu validasi atau perubahan
        ]);

        $user = auth()->user();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            // Tidak ada pembaruan pada role
        ]);

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
}
