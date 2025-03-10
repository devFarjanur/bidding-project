<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\Auth\VendorAuthController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Vendor\VendorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

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
    Route::get('admin/sub-list', [AdminController::class, 'subcategoryList'])->name('admin.subcategory.list');
    //bid
    Route::get('admin/bid-list', [AdminController::class, 'bidList'])->name('admin.bid.list');
    Route::get('admin/bid-request-pending', [AdminController::class, 'pendingBidList'])->name('admin.pending.bid.list');
    Route::get('admin/accept-bid', [AdminController::class, 'acceptBidList'])->name('admin.accept.bid.list');
    Route::get('admin/reject-bid', [AdminController::class, 'rejectBidList'])->name('admin.reject.bid.list');
});


Route::get('vendor/login', [VendorAuthController::class, 'vendorLogin'])->name('vendor.login');
Route::post('vendor/login/post', [VendorAuthController::class, 'vendorLoginPost'])->name('vendor.login.post');

Route::get('vendor/registration', [VendorAuthController::class, 'vendorRegistration'])->name('vendor.registration');
Route::get('vendor/registration/post', [VendorAuthController::class, 'vendorRegistrationPost'])->name('vendor.registration.post');


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
    Route::get('vendor/sub-list', [VendorController::class, 'subcategoryList'])->name('vendor.subcategory.list');
    Route::get('vendor/add-subcategory', [VendorController::class, 'addSubcategory'])->name('vendor.add.subcategory');
    // bid
    Route::get('vendor/bid-request', [VendorController::class, 'bidRequestList'])->name('vendor.bid.request.list');
    Route::get('vendor/bid-request/details/{id}', [VendorController::class, 'bidRequestDetails'])->name('vendor.bid.request.details');
    Route::get('vendor/bid-submit', [VendorController::class, 'submitBid'])->name('vendor.submit.bid');
    Route::get('vendor/accept-bid', [VendorController::class, 'acceptBid'])->name('vendor.accept.bid');

});





Route::get('/login', [CustomerAuthController::class, 'customerLogin'])->name('login');
Route::post('/login', [CustomerAuthController::class, 'customerLoginStore'])->name('login.store');
Route::get('/register', [CustomerAuthController::class, 'customerRegister'])->name('register');
Route::post('/register', [CustomerAuthController::class, 'customerRegisterStore'])->name('register.store');



Route::get('/', [CustomerController::class, 'CustomerIndex'])->name('customer.index');
Route::get('/bid-request', [CustomerController::class, 'CustomerProduct'])->name('customer.product');
Route::get('/get-subcategories/{category_id}', [CustomerController::class, 'getSubcategories'])->name('get.subcategories');


Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::post('/bid-request-store', [CustomerController::class, 'customerBidRequest'])->name('customer.bid.request');
    Route::get('/my-account', [CustomerController::class, 'CustomerMyaccount'])->name('customer.myaccount');
    Route::post('/logout', [CustomerAuthController::class, 'customerLogout'])->name('customer.logout');
});

// Route::get('/categories/{id}', [CustomerController::class, 'CustomerCategoryProduct'])->name('customer.category.product');
// Route::get('/product/{id}', [CustomerController::class, 'CustomerProductDetials'])->name('customer.product.details');
// Route::get('/about-us', [CustomerController::class, 'CustomerAbout'])->name('customer.about');
// Route::get('/contact', [CustomerController::class, 'CustomerContact'])->name('customer.contact');
// Route::get('/wishlist', [CustomerController::class, 'CustomerWishList'])->name('customer.wishlist');
// Route::get('/cart', [CustomerController::class, 'CustomerCart'])->name('customer.cart');


// Route::get('/order/success/{orderNumber}', [CustomerController::class, 'OrderSuccess'])->name('order.success');


// Route::middleware(['auth'])->group(function () {
//     Route::get('/checkout', [CustomerController::class, 'CustomerCheckout'])->name('customer.checkout');
//     Route::post('/checkout/addresses/add', [CustomerController::class, 'addAddress'])->name('address.add');
//     Route::put('/checkout/addresses/edit/{id}', [CustomerController::class, 'editAddress'])->name('address.edit');
//     Route::delete('/checkout/addresses/delete/{id}', [CustomerController::class, 'deleteAddress'])->name('address.delete');
//     Route::post('/order', [CustomerController::class, 'OrderStore'])->name('order.store');
//     Route::patch('/order/{order}/status', [CustomerController::class, 'updateStatus'])->name('order.updateStatus');
//     Route::patch('/order/{order}/payment-status', [CustomerController::class, 'updatePaymentStatus'])->name('order.updatePaymentStatus');
//     Route::get('/invoice', [CustomerController::class, 'CustomerInvoice'])->name('customer.invoice');
//     Route::get('/myaccount', [CustomerController::class, 'CustomerMyaccount'])->name('customer.myaccount');
//     Route::post('/update-profile', [CustomerController::class, 'updateProfile'])->name('update.profile');
//     Route::post('/change-password', [CustomerController::class, 'changePassword'])->name('change.password');
//     Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
//     Route::post('/wishlist/stock', [CustomerController::class, 'getProductStock'])->name('wishlist.stock');
// });


// // SSLCOMMERZ Start
// Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
// Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

// Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
// Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

// Route::post('/success', [SslCommerzPaymentController::class, 'success']);

// Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
// Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

// Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
// //SSLCOMMERZ END


// Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
// Route::post('/login', [AuthenticatedSessionController::class, 'store']);
// Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
// Route::post('/register', [RegisteredUserController::class, 'store']);











Route::get('/test-log', function () {
    try {
        throw new Exception('Test exception log');
    } catch (Exception $e) {
        Log::error('Test error log: ' . $e->getMessage());
    }

    return 'Check your log file';
});

