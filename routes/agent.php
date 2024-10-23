<?php
    // Agent All Route Are Here ....


use App\Http\Controllers\Premium\Agent\PremiumAgentAuthController;
use App\Http\Controllers\Premium\Agent\PremiumAgentController;
use App\Http\Controllers\Premium\Agent\PremiumAgentSubscriptoion;
use App\Http\Controllers\Premium\PremiumAgentOrdercontroller;
use App\Http\Controllers\SuperAdmin\OneTimePaymentController;
use App\Models\AgentSubscription;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'agent', 'as' => 'agent.', 'middleware' => ['agent', 'agentSubscription']], function(){

    // Dashboard
    Route::get('dashboard', [PremiumAgentController::class, 'dashboard'])->name('dashboard');

    // orders
    // Route::get('all/orders', [PremiumAgentController::class, 'orders'])->name('orders');

    //location
    Route::get('location', [PremiumAgentController::class, 'location'])->name('location');
    Route::post('location', [PremiumAgentController::class, 'location_update'])->name('location.update');

    //password
    Route::get('password/change', [PremiumAgentController::class, 'password_change'])->name('password.change');
    Route::post('password/change', [PremiumAgentController::class, 'password_change_update'])->name('password.change.update');

    //profile
    Route::get('profiles', [PremiumAgentController::class, 'profile'])->name('profile');
    Route::post('profiles', [PremiumAgentController::class, 'profile_update'])->name('profile.update');

    // Subscription
    Route::get('subscription/index', [PremiumAgentSubscriptoion::class, 'index'])->name('subscription.index');
    Route::get('subscription/payment/{id}', [PremiumAgentSubscriptoion::class, 'subscription_payment'])->name('subscription.payment');
    Route::post('subscription/success/{id}', [PremiumAgentSubscriptoion::class, 'success'])->name('subscription.success');
    // Route::post('subscription/success/{id}', [PremiumAgentSubscriptoion::class, 'success'])->name('subscription.success')->middleware('backPrevent');
    Route::post('subscription/fail', [PremiumAgentSubscriptoion::class, 'fail'])->name('subscription.fail');
    Route::get('subscription/invoice', [PremiumAgentSubscriptoion::class, 'subscription_invoice'])->name('subscription.invoice');

    Route::get('subscription/cancel', [PremiumAgentSubscriptoion::class, 'payment_cancel'])->name('subscription.cancel');

});

    // Authentication
    Route::post('agent/login', [PremiumAgentAuthController::class, 'login']);
    Route::post('agent/register', [PremiumAgentAuthController::class, 'register'])->name('agent.register');
    Route::post('agent/logout', [PremiumAgentAuthController::class, 'logout'])->name('agent.logout')->middleware('agent');

// Agent Order
Route::group(['prefix' => 'agent', 'as' => 'agent.', 'middleware' => 'agent'], function(){
    Route::get('all/orders', [PremiumAgentOrdercontroller::class, 'orders'])->name('orders');
    Route::get('order/details/{id}', [PremiumAgentOrdercontroller::class, 'details'])->name('order.details');
    Route::post('price/set', [PremiumAgentOrdercontroller::class, 'price_set'])->name('price.set');
    Route::get('order/placed/{id}', [PremiumAgentOrdercontroller::class, 'agent_place_order'])->name('order.place');
    Route::get('order/cancel/{id}', [PremiumAgentOrdercontroller::class, 'order_cancel'])->name('order.cancel');
    Route::post('order/payment/slip/{id}', [PremiumAgentOrdercontroller::class, 'payment_slip_store'])->name('payment.slip.store');
    Route::post('order/client/{id}', [PremiumAgentOrdercontroller::class, 'order_client'])->name('order.client');
    Route::get('order/receive/{id}', [PremiumAgentOrdercontroller::class, 'product_receive'])->name('order.receive');
});

    Route::get('one/time/payment', [OneTimePaymentController::class, 'agent_payment_pay'])->name('agent.one.time.payment.pay')->middleware('agent');
    Route::post('one/time/payment/success',[OneTimePaymentController::class, 'success'])->name('payment.success')->middleware('agent')->middleware('agent');
    Route::get('one/time/invoice', [OneTimePaymentController::class, 'one_time_payment_invoice'])->name('one.time.payment.invoice')->middleware('agent');
    Route::post('one/time/payment/fail',[OneTimePaymentController::class, 'fail'])->name('fail');


?>
