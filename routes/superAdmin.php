<?php

use App\Http\Controllers\SuperAdmin\BannerAdController;
use App\Http\Controllers\SuperAdmin\CkEditorImageUploadController;
use App\Http\Controllers\SuperAdmin\OneTimePaymentController;
use App\Http\Controllers\SuperAdmin\RegistrationInfoController;
use App\Http\Controllers\SuperAdmin\videoController;
use Illuminate\Support\Facades\Route;

Route::prefix('super')->middleware('super')->group(function () {
    // become agent
    Route::get('become/agent', [RegistrationInfoController::class, 'become_agent'])->name('become.agent');
    Route::post('become/agent', [RegistrationInfoController::class, 'become_agent_update'])->name('become.agent.update');

    //Why sell
    Route::get('why/sell', [RegistrationInfoController::class, 'why_sell'])->name('agent.why.selll');
    Route::post('why/sell', [RegistrationInfoController::class, 'why_sell_update'])->name('agent.why.selll.update');

    // Business Info
    Route::get('business/info', [RegistrationInfoController::class, 'business_info'])->name('agent.business.info');
    Route::post('business/info', [RegistrationInfoController::class, 'business_info_update'])->name('agent.business.info.update');

    // become expert
    Route::get('become/expert', [RegistrationInfoController::class, 'become_expert'])->name('become.expert');
    Route::post('become/expert', [RegistrationInfoController::class, 'become_expert_update'])->name('become.expert.update');

    // become company
    Route::get('become/company', [RegistrationInfoController::class, 'become_company'])->name('become.company');
    Route::post('become/company', [RegistrationInfoController::class, 'become_company_update'])->name('become.company.update');

    Route::resource('videos', videoController::class);

    Route::post('image/upload', [CkEditorImageUploadController::class, 'storeImage'])->name('image.upload');
});

Route::prefix('super/ad/')->as('super.ad.')->middleware('super')->group(function () {

    // slider banner
    Route::get('slider/banner/', [BannerAdController::class, 'slider_banner'])->name('slider.banner');
    Route::post('slider/banner/store', [BannerAdController::class, 'slider_banner_store'])->name('slider.banner.store');
    Route::post('slider/banner/update/{id}', [BannerAdController::class, 'slider_banner_update'])->name('slider.banner.update');
    Route::get('slider/banner/delete/{id}', [BannerAdController::class, 'slider_banner_delete'])->name('slider.banner.delete');

    // First Middle Banner
    Route::get('first/middle/banner/', [BannerAdController::class, 'first_middle_banner'])->name('first.middle.banner');
    Route::post('first/middle/banner/update', [BannerAdController::class, 'first_middle_banner_update'])->name('first.middle.banner.update');

    // Second Middle Banner
    Route::get('second/middle/banner/', [BannerAdController::class, 'second_middle_banner'])->name('second.middle.banner');
    Route::post('second/middle/banner/update', [BannerAdController::class, 'second_middle_banner_update'])->name('second.middle.banner.update');

    // Third Middle Banner
    Route::get('third/middle/banner/', [BannerAdController::class, 'third_middle_banner'])->name('third.middle.banner');
    Route::post('third/middle/banner/update', [BannerAdController::class, 'third_middle_banner_update'])->name('third.middle.banner.update');

    // Fourth Middle Banner
    Route::get('fourth/middle/banner/', [BannerAdController::class, 'fourth_middle_banner'])->name('fourth.middle.banner');
    Route::post('fourth/middle/banner/update', [BannerAdController::class, 'fourth_middle_banner_update'])->name('fourth.middle.banner.update');

    // First Left Middle Banner
    Route::get('first/left/banner/', [BannerAdController::class, 'first_left_banner'])->name('first.left.banner');
    Route::post('first/left/banner/update', [BannerAdController::class, 'first_left_banner_update'])->name('first.left.banner.update');

    // Second Left Middle Banner
    Route::get('second/left/banner/', [BannerAdController::class, 'second_left_banner'])->name('second.left.banner');
    Route::post('second/left/banner/update', [BannerAdController::class, 'second_left_banner_update'])->name('second.left.banner.update');

    // Customer Comment
    Route::get('customer_comment', [BannerAdController::class, 'customer_comment'])->name('customer.comment');
    Route::post('customer_comment_update', [BannerAdController::class, 'customer_comment_update'])->name('customer.comment.update');

});

Route::group(['prefix' => 'one/time/payment/setting', 'as' => 'one.time.paymnet.setting.', 'middleware' => 'super'], function(){
    Route::get('index', [OneTimePaymentController::class, 'index'])->name('index');
    Route::post('index/update', [OneTimePaymentController::class, 'update'])->name('update');
});
