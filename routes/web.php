<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SPMBController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Home / Landing
Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->role === 'administrator') {
            return redirect('/admin/dashboard');
        }
        return redirect('/dashboard');
    }
    return view('welcome');
})->name('home');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'storeRegister']);
Route::match(['get','post'], '/logout', [AuthController::class, 'logout'])->name('logout');

// CAPTCHA
Route::get('/captcha/generate', [AuthController::class, 'generateCaptcha']);

// SPMB Registration (public, tanpa login). URL pendaftaran: /spmb/daftar
Route::get('/spmb/daftar', [SPMBController::class, 'showRegistrationForm'])->name('spmb.register');
Route::post('/spmb/daftar', [SPMBController::class, 'submitRegistration'])->name('spmb.register.submit');

// Authenticated Routes
Route::middleware('auth')->group(function () {

    // User Dashboard
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    // SPMB Routes (authenticated)
    Route::prefix('spmb')->name('spmb.')->group(function () {
        // VULN: RBAC - These routes are accessible by any authenticated user
        // even though they should be admin-only. The middleware check is missing.
        Route::get('/status', [SPMBController::class, 'showStatus'])->name('status');
        Route::get('/pendaftar/{id}', [SPMBController::class, 'detail'])->name('detail');

        // Public status check (no auth needed)
        Route::get('/cek-status', [SPMBController::class, 'cekStatusForm'])->name('cek_status');
        Route::post('/cek-status', [SPMBController::class, 'cekStatus'])->name('cek_status.submit');

        // Upload berkas persyaratan (hanya administrator)
        Route::get('/upload', [UploadController::class, 'index'])->name('upload')->middleware('role:administrator');
        Route::post('/upload', [UploadController::class, 'store'])->name('upload.store')->middleware('role:administrator');
        Route::get('/upload/{id}/hapus', [UploadController::class, 'destroy'])->name('upload.delete')->middleware('role:administrator');
    });

    // Admin Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        // VULN: RBAC - The route is defined but the admin middleware
        // is intentionally NOT applied to all routes consistently
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard')
            ->middleware('role:administrator');

        Route::get('/pendaftar', [AdminController::class, 'daftarPendaftar'])->name('pendaftar');
        Route::get('/pendaftar/{id}', [AdminController::class, 'detailPendaftar'])->name('pendaftar.detail');
        Route::get('/pendaftar/{id}/edit', [AdminController::class, 'editPendaftar'])->name('pendaftar.edit');
        Route::post('/pendaftar/{id}/update', [AdminController::class, 'updatePendaftar'])->name('pendaftar.update');
        Route::post('/pendaftar/{id}/status', [AdminController::class, 'updateStatus'])->name('pendaftar.update-status');
        Route::delete('/pendaftar/{id}', [AdminController::class, 'deletePendaftar'])->name('pendaftar.delete');

        Route::get('/users', [AdminController::class, 'daftarUser'])->name('users');
        Route::get('/users/{id}/edit', [AdminController::class, 'editUser'])->name('users.edit');
        Route::post('/users/{id}/update', [AdminController::class, 'updateUser'])->name('users.update');
    });
});
