<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\VendorAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Vendor\VendorController;
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



Route::get('admin/login', [AdminAuthController::class, 'adminLogin'])->name('admin.login');
Route::post('admin/login-post', [AdminAuthController::class, 'adminLoginPost'])->name('admin.login.post');

// Admin Dashboard (protected route)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminAuthController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('admin/logout', [AdminAuthController::class, 'adminLogout'])->name('admin.logout');
    Route::get('admin/profile', [AdminAuthController::class, 'adminProfile'])->name('admin.profile');
    Route::post('admin/profile-store', [AdminAuthController::class, 'adminProfileStore'])->name('admin.profile.store');
    Route::get('admin/change-password', [AdminAuthController::class, 'adminChangePassword'])->name('admin.change.password');
    Route::post('admin/update-password', [AdminAuthController::class, 'adminUpdatePassword'])->name('admin.update.password');
    // customer
    Route::get('admin/customer-list', [AdminController::class, 'customerList'])->name('admin.customer.list');
    // vendor
    Route::get('admin/vendor-request', [AdminController::class, 'vendorRequestList'])->name('admin.vendor.request.list');
    Route::get('admin/vendor-list', [AdminController::class, 'vendorLIst'])->name('admin.vendor.list');
    Route::get('admin/vendor-active', [AdminController::class, 'vendorActiveList'])->name('admin.vendor.active.list');
    Route::get('admin/vendor-inactive', [AdminController::class, 'vendorInactiveList'])->name('admin.vendor.incative.list');
    Route::get('admin/vendor-reject', [AdminController::class, 'vendorRejectList'])->name('admin.vendor.reject.list');
    // category
    Route::get('admin/category-list', [AdminController::class, 'categoryList'])->name('admin.category.list');
    // subcategory
    Route::get('admin/subcategory-list', [AdminController::class, 'subcategoryList'])->name('admin.subcategory.list');
    //bid
    Route::get('admin/bid-list', [AdminController::class, 'bidList'])->name('admin.bid.list');
    Route::get('admin/bid-request-pending', [AdminController::class, 'pendingBidList'])->name('admin.pending.bid.list');
    Route::get('admin/accept-bid', [AdminController::class, 'acceptBidList'])->name('admin.accept.bid.list');
    Route::get('admin/reject-bid', [AdminController::class, 'rejectBidList'])->name('admin.reject.bid.list');
});


Route::get('vendor-login', [VendorAuthController::class, 'vendorLogin'])->name('vendor.login');
Route::post('vendor-login-post', [VendorAuthController::class, 'vendorLoginPost'])->name('vendor.login.post');

Route::get('vendor-registration', [VendorAuthController::class, 'vendorRegistration'])->name('vendor.registration');
Route::get('vendor-registration-post', [VendorAuthController::class, 'vendorRegistrationPost'])->name('vendor.registration.post');


// Vendor Dashboard (protected route)
Route::middleware(['auth', 'role:vendor'])->group(function () {
    Route::get('vendor/dashboard', [VendorAuthController::class, 'vendorDashboard'])->name('vendor.dashboard');
    Route::get('vendor/logout', [VendorAuthController::class, 'vendorLogout'])->name('vendor.logout');
    Route::get('vendor/profile', [VendorAuthController::class, 'vendorProfile'])->name('vendor.profile');
    Route::post('vendor/profile-store', [VendorAuthController::class, 'vendorProfileStore'])->name('vendor.profile.store');
    Route::get('vendor/change-password', [VendorAuthController::class, 'vendorChangePassword'])->name('vendor.change.password');
    Route::post('vendor/update-password', [VendorAuthController::class, 'vendorUpdatePassword'])->name('vendor.update.password');
    // customer
    Route::get('vendor/customer-list', [VendorController::class, 'customerList'])->name('vendor.customer.list');
    //Category
    Route::get('vendor/category-list', [VendorController::class, 'categoryList'])->name('vendor.category.list');
    // subcategory
    Route::get('vendor/subcategory-list', [VendorController::class, 'subcategoryList'])->name('vendor.subcategory.list');
    Route::get('vendor/add-subcategory', [VendorController::class, 'addSubcategory'])->name('vendor.add.subcategory');
    // bid
    Route::get('vendor/bid-request', [VendorController::class, 'bidRequestList'])->name('vendor.bid.request.list');
    Route::get('vendor/bid-request/details/{id}', [VendorController::class, 'bidRequestDetails'])->name('vendor.bid.request.details');
    Route::get('vendor/accept-bid', [VendorController::class, 'acceptBid'])->name('vendor.accept.bid');
});


Route::get('/test-log', function () {
    try {
        throw new Exception('Test exception log');
    } catch (Exception $e) {
        Log::error('Test error log: ' . $e->getMessage());
    }

    return 'Check your log file';
});

