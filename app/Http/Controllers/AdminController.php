<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // Fungsi untuk dashboard Admin
    public function dashboard()
    {
        return view('admin.dashboard'); // Ganti dengan nama view yang sesuai
    }

    // Menampilkan halaman pengaturan
    public function settings()
    {
        // Anda dapat menambahkan logika untuk mengambil data pengaturan dari database jika diperlukan
        return view('admin.settings'); // Ganti dengan nama view yang sesuai
    }

    // Memperbarui pengaturan
    public function updateSettings(Request $request)
    {
        // Validasi data pengaturan
        $request->validate([
            'site_name' => 'required|string|max:255',
            'site_email' => 'required|email',
            'maintenance_mode' => 'required|boolean',
        ]);

        // Simpan pengaturan ke database atau file konfigurasi
        foreach ($request->all() as $key => $value) {
            DB::table('settings')->updateOrInsert(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return redirect()->route('admin.settings')->with('success', 'Settings updated successfully.');
    }

    // Menampilkan daftar proposal yang diajukan oleh mahasiswa
    public function statusPengajuan()
    {
        $proposals = Proposal::all(); // Menampilkan semua proposal
        return view('admin.status-pengajuan', compact('proposals'));
    }

    // Menerima proposal
    public function acceptProposal($id)
    {
        $proposal = Proposal::findOrFail($id);
        $proposal->status = 'accepted';  // Ubah status menjadi diterima
        $proposal->save();

        return redirect()->route('admin.status-pengajuan')->with('success', 'Proposal accepted.');
    }

    // Menolak proposal
    public function rejectProposal($id)
    {
        $proposal = Proposal::findOrFail($id);
        $proposal->status = 'rejected';  // Ubah status menjadi ditolak
        $proposal->save();

        return redirect()->route('admin.status-pengajuan')->with('success', 'Proposal rejected.');
    }

    // Mengirim proposal untuk revisi
    public function revisionProposal($id)
    {
        $proposal = Proposal::findOrFail($id);
        $proposal->status = 'revision';  // Ubah status menjadi revisi
        $proposal->save();

        return redirect()->route('admin.status-pengajuan')->with('success', 'Proposal sent for revision.');
    }

    // Menampilkan daftar pengguna
    public function manageUsers()
    {
        $users = User::all(); // Menampilkan semua pengguna
        return view('admin.manage-users', compact('users'));
    }

    // Menampilkan form untuk membuat pengguna baru
    public function createUser()
    {
        return view('admin.create-user'); // Ganti dengan nama view yang sesuai
    }

    // Menyimpan pengguna baru
    public function storeUser(Request $request)
    {
        // Validasi data pengguna
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Simpan pengguna baru ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.manage-users')->with('success', 'User created successfully.');
    }

    // Menampilkan form untuk mengedit pengguna
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit-user', compact('user')); // Ganti dengan nama view yang sesuai
    }

    // Memperbarui pengguna
    public function updateUser(Request $request, $id)
    {
        // Validasi data pengguna
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Temukan pengguna dan perbarui data
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('admin.manage-users')->with('success', 'User updated successfully.');
    }

    // Menghapus pengguna
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.manage-users')->with('success', 'User deleted successfully.');
    }
}