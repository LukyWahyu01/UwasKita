<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Halaman Dashboard Admin
    public function admin()
    {
        return view('admin.dashboard');
    }

    // Halaman Dashboard Mahasiswa
    public function mahasiswa()
    {
        return view('mahasiswa.dashboard');
    }
}

