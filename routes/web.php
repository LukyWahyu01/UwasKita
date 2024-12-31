<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController as ControllersDashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route untuk halaman utama (welcome)
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk halaman login (menggunakan controller LoginController)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Rute untuk halaman register menggunakan RegisterController
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Rute setelah login, berdasarkan role (menggunakan middleware role:admin dan role:mahasiswa)
Route::middleware(['auth'])->group(function () {
    // Admin Routes
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', [ControllersDashboardController::class, 'admin'])->name('admin.dashboard');
        Route::get('/admin/status-pengajuan', [AdminController::class, 'statusPengajuan'])->name('admin.status-pengajuan');
        Route::post('/admin/proposals/{id}/accept', [AdminController::class, 'acceptProposal'])->name('admin.proposals.accept');
        Route::post('/admin/proposals/{id}/reject', [AdminController::class, 'rejectProposal'])->name('admin.proposals.reject');
        Route::post('/admin/proposals/{id}/revision', [AdminController::class, 'revisionProposal'])->name('admin.proposals.revision');
        
        // Manage Users
        Route::get('/admin/manage-users', [AdminController::class, 'manageUsers'])->name('admin.manage-users');
        Route::get('/admin/users/create', [AdminController::class, 'createUser'])->name('admin.create-user');
        Route::post('/admin/users', [AdminController::class, 'storeUser'])->name('admin.store-user');
        Route::get('/admin/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.edit-user');
        Route::put('/admin/users/{id}', [AdminController::class, 'updateUser'])->name('admin.update-user');
        Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.delete-user');
        
        // Settings
        Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');
        Route::put('/admin/settings', [AdminController::class, 'updateSettings'])->name('admin.settings.update');
    });

    // Mahasiswa Routes
    Route::middleware('role:mahasiswa')->group(function () {
        Route::get('/mahasiswa', [ControllersDashboardController::class, 'mahasiswa'])->name('mahasiswa.dashboard');
    });

    // Rute untuk halaman daftar proposal
    Route::prefix('proposals')->group(function () {
        Route::get('/', [ProposalController::class, 'index'])->name('proposals.index');
        Route::get('create', [ProposalController::class, 'create'])->name('proposals.create');
        Route::post('/', [ProposalController::class, 'store'])->name('proposals.store');
        Route::get('{id}', [ProposalController::class, 'show'])->name('proposals.show');
        Route::get('{id}/edit', [ProposalController::class, 'edit'])->name('proposals.edit');
        Route::put('{id}', [ProposalController::class, 'update'])->name('proposals.update');
        Route::delete('{id}', [ProposalController::class, 'destroy'])->name('proposals.destroy');
        Route::post('{id}/submit', [ProposalController::class, 'submit'])->name('proposals.submit');
    });
});

// Rute Auth default (seperti logout, forgot password, dll)
Auth::routes();

// Rute untuk halaman home setelah login, jika menggunakan HomeController
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rute untuk profil pengguna
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
