<?php

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/', [CustomerController::class, 'CustomerIndex'])->name('customer.index');
// Route::get('/categories/{id}', [CustomerController::class, 'CustomerCategoryProduct'])->name('customer.category.product');
// Route::get('/products', [CustomerController::class, 'CustomerProduct'])->name('customer.product');
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

