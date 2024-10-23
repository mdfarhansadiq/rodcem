<?php

use App\Http\Controllers\Premium\Auth\PremiumLoginController;
use App\Http\Controllers\Premium\Frontend\PremiumUserProfileController;
use App\Http\Controllers\User\UserOrderController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => 'user'], function () {
    // Route::get('dashboard', [PremiumUserProfileController::class, 'dashboard'])->name('dashboard');
    // Route::get('porfile', [PremiumUserProfileController::class, 'profile'])->name('profile');
    // Route::get('location', [PremiumUserProfileController::class, 'location'])->name('location');
    // Route::get('orders', [PremiumUserProfileController::class, 'orders'])->name('orders');
    // Route::get('setting', [PremiumUserProfileController::class, 'setting'])->name('setting');

    // Dashboard
    Route::get('dashboard', [PremiumUserProfileController::class, 'dashboard'])->name('dashboard');

    // orders
    // Route::get('all/orders', [PremiumUserProfileController::class, 'orders'])->name('orders');

    //location
    Route::get('location', [PremiumUserProfileController::class, 'location'])->name('location');
    Route::post('location', [PremiumUserProfileController::class, 'location_update'])->name('location.update');

    //password
    Route::get('password/change', [PremiumUserProfileController::class, 'password_change'])->name('password.change');
    Route::post('password/change', [PremiumUserProfileController::class, 'password_change_update'])->name('password.change.update');

    //profile
    Route::get('profiles', [PremiumUserProfileController::class, 'profile'])->name('profile');
    Route::post('profiles', [PremiumUserProfileController::class, 'profile_update'])->name('profile.update');
});

//Authentication
Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [PremiumLoginController::class, 'login_form'])->name('login');
    Route::post('login', [PremiumLoginController::class, 'login'])->name('login.check');
    Route::get('register', [PremiumLoginController::class, 'register_form'])->name('register');
    Route::post('register', [PremiumLoginController::class, 'register'])->name('register.store');

    //Forget Password
    Route::get('forget/password', [PremiumLoginController::class, 'forget_password_form'])->name('forget.password.form');
    Route::post('forget/password', [PremiumLoginController::class, 'forget_password'])->name('forget.password');

    //Otp Password
    Route::get('otp', [PremiumLoginController::class, 'otp_form'])->name('otp.form');
    Route::post('otp', [PremiumLoginController::class, 'otp'])->name('otp');

    //Reset Password
    Route::get('resert/password', [PremiumLoginController::class, 'resert_password_form'])->name('resert.password.form');
    Route::post('resert/password', [PremiumLoginController::class, 'resert_password'])->name('resert.password');
});

Route::post('logout', [PremiumLoginController::class, 'logout'])->name('logout');

//Users Order
Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => 'auth'], function () {
    Route::post('order/generate/', [UserOrderController::class, 'order_generate'])->name('order.generate');
    Route::get('orders', [UserOrderController::class, 'orders'])->name('orders');
    Route::get('order/details/{id}', [UserOrderController::class, 'details'])->name('order.details');
    Route::get('order/cancel/{id}', [UserOrderController::class, 'cancel'])->name('order.cancel');
    Route::get('order/confirm/{id}', [UserOrderController::class, 'confirm'])->name('order.confirm');
    Route::post('order/payment/slip/{id}', [UserOrderController::class, 'payment_slip_store'])->name('payment.slip.store');
    Route::get('order/receive/{id}', [UserOrderController::class, 'product_receive'])->name('order.receive');

    //user nearby agent
    Route::get('agents', [UserOrderController::class, 'agents'])->name('agents');
});

// Route::get('user-order-details', [UserOrderController::class, 'order_details']);
?>
