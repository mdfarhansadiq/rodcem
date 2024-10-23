<?php
// All Frontend Route Are Here...


use App\Http\Controllers\PageController;
use App\Http\Controllers\Premium\Frontend\PremiumFrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PremiumFrontendController::class, 'front'])->name('front');
Route::get('/search', [PremiumFrontendController::class, 'search'])->name('search'); // Global Search
Route::get('/shop', [PremiumFrontendController::class, 'shop'])->name('shop');
Route::get('/product/{slug}', [PremiumFrontendController::class, 'product_details'])->name('product.details');
Route::get('companies', [PremiumFrontendController::class, 'companies'])->name('companies');
Route::get('company/{slug}', [PremiumFrontendController::class, 'company_shop'])->name('company.shop');
Route::get('/expert/{slug}', [PremiumFrontendController::class, 'expert_by_category'])->name('expert.by.category');
Route::get('/search/expert/name/specific/category', [PremiumFrontendController::class, 'search_expert_name_specific_category'])->name('search.expert.name.specific.category');
Route::get('/search/expert/name/all/category', [PremiumFrontendController::class, 'search_expert_name_all_category'])->name('seach.expert.name.all.category');


//Registration
Route::get('agent/register', [PremiumFrontendController::class, 'agent_register'])->name('agent.register');
Route::get('expert/register', [PremiumFrontendController::class, 'expert_register'])->name('expert.register');
Route::get('company/register', [PremiumFrontendController::class, 'company_register'])->name('company.register');

// Pages
Route::get('about-us', [PremiumFrontendController::class, 'about_us'])->name('about.us');
Route::get('contact/us', [PremiumFrontendController::class, 'contact_us'])->name('contact.us');
Route::get('faq', [PremiumFrontendController::class, 'faq'])->name('faq');

Route::get('policy', [PremiumFrontendController::class, 'policy'])->name('our.policy');
Route::get('terms/condation', [PremiumFrontendController::class, 'terms_condation'])->name('terms.condation');
Route::get('cancellation/policy', [PremiumFrontendController::class, 'cancellation_policy'])->name('cancellation.policy');
Route::get('refund/policy', [PremiumFrontendController::class, 'refund_policy'])->name('refund.policy');
Route::get('return/policy', [PremiumFrontendController::class, 'return_policy'])->name('return.policy');

// Blog
Route::get('our-blog', [PremiumFrontendController::class, 'our_blog'])->name('our.blog');
Route::get('blog/{slug}', [PremiumFrontendController::class, 'blog_details'])->name('our.blog.details');

// Expert
Route::get('experts', [PremiumFrontendController::class, 'experts'])->name('experts');
Route::get('expert/details/{slug}', [PremiumFrontendController::class, 'expert_details'])->name('expert.details');

//CART
// Route::group(['middleware' => 'user'],function(){
Route::get('/add-to-cart/{product_id}', [PageController::class, 'addToCart'])->name('add.to.cart');
Route::post('/add-to-cart/details', [PageController::class, 'addToCart_details'])->name('add.to.cart.details');
Route::get('/view-cart', [PageController::class, 'view_cart'])->name('cart');
Route::get('/remove/cart/iteam/{id}', [PageController::class, 'remove_cart_iteam'])->name('cart.product.remove');
Route::post('/update/cart/{id}', [PageController::class, 'update_cart'])->name('cart.update');

//cart quentity increment
Route::get('product/qty/increment', [PageController::class, 'qty_increment'])->name('qty.increment');
Route::get('product/qty/decrement', [PageController::class, 'qty_decrement'])->name('qty.decrement');
Route::get('product/qty/update', [PageController::class, 'qty_update'])->name('qty.update');

//Order Place Route
Route::post('/place-order', [PageController::class, 'place_order'])->name('palce.order');
// });
