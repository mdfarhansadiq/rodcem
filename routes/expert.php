<?php
    // expert All Route Are Here ....

    //dashboard
    //Profile
    //location
    //settings
    //order
    //user order
    //subscription
    //document

    // Dashboard
//

use App\Http\Controllers\Premium\Expert\PremiumExpertAuthController;
use App\Http\Controllers\Premium\Expert\PremiumExpertPortfolioController;
use App\Http\Controllers\Premium\Expert\PremiumExpertProfileController;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'expert', 'as' => 'expert.', 'middleware' => 'expert'], function(){

    // Dashboard
    Route::get('dashboard', [PremiumExpertProfileController::class, 'dashboard'])->name('dashboard');
    // orders
    Route::get('all/orders', [PremiumExpertProfileController::class, 'orders'])->name('orders');
    //location
    Route::get('location', [PremiumExpertProfileController::class, 'location'])->name('location');
    Route::post('location', [PremiumExpertProfileController::class, 'location_update'])->name('location.update');
    //password
    Route::get('password/change', [PremiumExpertProfileController::class, 'password_change'])->name('password.change');
    Route::post('password/change', [PremiumExpertProfileController::class, 'password_change_update'])->name('password.change.update');
    //profile
    Route::get('profiles', [PremiumExpertProfileController::class, 'profile'])->name('profile');
    Route::post('profiles', [PremiumExpertProfileController::class, 'profile_update'])->name('profile.update');

    // Portfolio
    Route::resource('projects', PremiumExpertPortfolioController::class);
});

// Authentication
Route::group(['middleware' => 'guest'], function () {
    Route::post('expert/login', [PremiumExpertAuthController::class, 'login']);
    Route::post('expert/register', [PremiumExpertAuthController::class, 'register'])->name('expert.register');
});

    Route::post('expert/logout', [PremiumExpertAuthController::class, 'logout'])->name('expert.logout')->middleware('expert');

?>
