<?php

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\VendorAuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



Route::get('admin-login', [AdminAuthController::class, 'adminLogin'])->name('admin.login');
Route::post('admin-login-post', [AdminAuthController::class, 'adminLoginPost'])->name('admin.login.post');

// Admin Dashboard (protected route)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('dashboard', [AdminAuthController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('logout', [AdminAuthController::class, 'adminLogout'])->name('admin.logout');
    Route::get('profile', [AdminAuthController::class, 'adminProfile'])->name('admin.profile');
    Route::post('profile-store', [AdminAuthController::class, 'adminProfileStore'])->name('admin.profile.store');
    Route::get('change-password', [AdminAuthController::class, 'adminChangePassword'])->name('admin.change.password');
    Route::post('update-password', [AdminAuthController::class, 'adminUpdatePassword'])->name('admin.update.password');
});


Route::get('vendor-login', [VendorAuthController::class, 'vendorLogin'])->name('vendor.login');
Route::post('vendor-login-post', [VendorAuthController::class, 'vendorLoginPost'])->name('vendor.login.post');

// Vendor Dashboard (protected route)
Route::middleware(['auth', 'role:vendor'])->group(function () {
    Route::get('dashboard', [VendorAuthController::class, 'vendorDashboard'])->name('vendor.dashboard');
    Route::get('logout', [VendorAuthController::class, 'vendorLogout'])->name('vendor.logout');
    Route::get('profile', [VendorAuthController::class, 'vendorProfile'])->name('vendor.profile');
    Route::post('profile-store', [VendorAuthController::class, 'vendorProfileStore'])->name('vendor.profile.store');
    Route::get('change-password', [VendorAuthController::class, 'vendorChangePassword'])->name('vendor.change.password');
    Route::post('update-password', [VendorAuthController::class, 'vendorUpdatePassword'])->name('vendor.update.password');
});


Route::get('/test-log', function () {
    try {
        throw new Exception('Test exception log');
    } catch (Exception $e) {
        Log::error('Test error log: ' . $e->getMessage());
    }

    return 'Check your log file';
});

