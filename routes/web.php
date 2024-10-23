<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Agent\AgentClientController;
use App\Http\Controllers\Agent\AgentDocumentController;
use App\Http\Controllers\Agent\AgentNotificationController;
use App\Http\Controllers\Agent\AgentProfileController;
use App\Http\Controllers\Agent\AgentSearchController;
use App\Http\Controllers\Agent\AgentSubscriptionController;
use App\Http\Controllers\Agent\AgentUserOrderController;
use App\Http\Controllers\Agent\Portfolio\AgentAboutController;
use App\Http\Controllers\Agent\Portfolio\AgentBannerController;
use App\Http\Controllers\Agent\Portfolio\AgentChooseUsController;
use App\Http\Controllers\Agent\Portfolio\AgentContactController;
use App\Http\Controllers\Agent\Portfolio\AgentImageController;
use App\Http\Controllers\Agent\Portfolio\AgentServiceCategoryController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Auth\AgentLoginController;
use App\Http\Controllers\Auth\AgentRegisterController;
use App\Http\Controllers\Auth\CompanyLoginController;
use App\Http\Controllers\Auth\SuperLoginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Auth\CompanyRegisterController;
use App\Http\Controllers\Auth\ExpertLoginController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Company\CategoryController;
use App\Http\Controllers\Company\ComapnySearchController;
use App\Http\Controllers\Company\CompanyBannerSettingController;
use App\Http\Controllers\Company\CompanyNotificationController;
use App\Http\Controllers\Company\CompanyProductController;
use App\Http\Controllers\Company\CompanyProfileController;
use App\Http\Controllers\Company\ProductController;
use App\Http\Controllers\Company\UnitController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\Expert\ExpertProfileController;
use App\Http\Controllers\Expert\Portfolio\ExpertAboutController;
use App\Http\Controllers\Expert\Portfolio\ExpertBannerController;
use App\Http\Controllers\Expert\Portfolio\ExpertExperienceController;
use App\Http\Controllers\Expert\Portfolio\ExperEducationController;
use App\Http\Controllers\Expert\Portfolio\ExpertProjectCategoryController;
use App\Http\Controllers\Expert\Portfolio\ExpertProjectController;
use App\Http\Controllers\Expert\Portfolio\ExpertServiceController;
use App\Http\Controllers\Expert\PortfolioController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\FindController;
use App\Http\Controllers\FrontAgentPortfolioController;
use App\Http\Controllers\Frontend\Expert\ExpertPortfolioController;
use App\Http\Controllers\FrontendSearchController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LocationFindingController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentSlipController;
use App\Http\Controllers\SuperAdmin\AboutUsController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\Super\ComapnyApprovalController;
use App\Http\Controllers\SuperAdmin\AgentApprovalController;
use App\Http\Controllers\SuperAdmin\AgentDocumentManagementBySuperAdminController;
use App\Http\Controllers\SuperAdmin\BannerSettingController;
use App\Http\Controllers\SuperAdmin\BenefitController;
use App\Http\Controllers\SuperAdmin\ExpertApprovalController;
use App\Http\Controllers\SuperAdmin\GeneralSettingController;
use App\Http\Controllers\SuperAdmin\NewsCategoryController;
use App\Http\Controllers\SuperAdmin\PortfolioApporvalController;
use App\Http\Controllers\SuperAdmin\ProductCategoryController;
use App\Http\Controllers\SuperAdmin\SubscriberController;
use App\Http\Controllers\SuperAdmin\SubscriptionSettingController;
use App\Http\Controllers\SuperAdmin\SuperAdminSearchController;
use App\Http\Controllers\SuperAdmin\SuperAgentController;
use App\Http\Controllers\SuperAdmin\SuperAgentServiceController;
use App\Http\Controllers\SuperAdmin\SuperCompanyCategoryController;
use App\Http\Controllers\SuperAdmin\SuperCompanyController;
use App\Http\Controllers\SuperAdmin\SuperEngineerCategoryController;
use App\Http\Controllers\SuperAdmin\SuperExpertController;
use App\Http\Controllers\SuperAdmin\SuperImageSettingController;
use App\Http\Controllers\SuperAdmin\SuperNewsController;
use App\Http\Controllers\SuperAdmin\SuperNotificationController;
use App\Http\Controllers\SuperAdmin\SuperOrderController;
use App\Http\Controllers\SuperAdmin\SuperProductCategoryController;
use App\Http\Controllers\SuperAdmin\SuperProfileController;
use App\Http\Controllers\SuperAdmin\SuperSliderController;
use App\Http\Controllers\SuperAdmin\TremsAndCondationController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\User\UserOrderController;
use App\Http\Controllers\User\UserProfileController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// test google drive backup
Route::get('google', function(){
    Storage::disk('google')->put('text.txt', 'Hi I am Hacker!');
    return 'done';
});

//Notification
Route::get('all/notification', [NotificationController::class, 'index'])->name('all.notification');

Route::get('optimize', function () {
    Artisan::call('optimize:clear');
    Artisan::call('config:clear');
    return 'done';
});






Route::get('test', function () {
    return 'hi';
});

Route::get('/our/news', [NewsController::class, 'news'])->name('news');
Route::get('/news/details/{slug}', [NewsController::class, 'details'])->name('news.details');

//Subscriber Store
Route::post('subscriber/store', [SubscriberController::class, 'store'])->name('subscriber.store');


// Location Finding
Route::get('all/district', [LocationFindingController::class, 'district'])->name('all.district');
Route::get('all/upazila', [LocationFindingController::class, 'upazila'])->name('all.upazila');
Route::get('all/union', [LocationFindingController::class, 'union'])->name('all.union');

//Frontend Search Controller
Route::get('search_items', [FrontendSearchController::class, 'search_items'])->name('front.search.items');
Route::get('search', [FrontendSearchController::class, 'search'])->name('front.search');
// Route::get('agent/test-down/test', function () {  Artisan::call('down'); return 'done'; });

//All product Search
Route::get('product/search', [FrontendSearchController::class, 'product_search'])->name('front.product.search');


// invoice
Route::get('user/invoice', [TestController::class, 'invoice']);

Route::get('invoice/{id}', [InvoiceController::class, 'invoice'])->name('invoice');

Route::get('agent-portfolio', [FrontAgentPortfolioController::class, 'index']);

// Route::get('/', [PageController::class, 'front'])->name('front');
// Route::get('/categories', [PageController::class, 'category'])->name('categories');
// Route::get('/services', [PageController::class, 'service'])->name('services');

// //Experts
// Route::get('/experts', [PageController::class, 'expert_list'])->name('experts');
// Route::get('/experts/{name}', [ExpertPortfolioController::class, 'portfolio'])->name('expert.portfolio');
// Route::get('expert/expert/{slug}', [PageController::class, 'categoryByexpert'])->name('category.by.expert');

// // Agent
// Route::get('/agents', [PageController::class, 'agents'])->name('agents');
// Route::get('agents/{slug}', [PageController::class, 'agent_details'])->name('agent.details');

// //Agent User Contact Message
// Route::post('agetn/contact', [AgentContactController::class, 'store'])->name('agent.portfolio.contact.store');


// //About Us
// Route::get('/about-us', [PageController::class, 'about'])->name('about');
// Route::get('/contact-us', [PageController::class, 'contact'])->name('contact');

// //Banner Setting
// Route::get('banner/setting', [BannerSettingController::class, 'index'])->name('banner.setting.index');
// Route::post('banner/setting/update', [BannerSettingController::class, 'update'])->name('banner.setting.update');

// //company in frontend
// Route::get('/company/list', [PageController::class, 'company'])->name('company');
// Route::get('company/shop', [PageController::class, 'shop']);
Route::get('companies/{company}', [PageController::class, 'product'])->name('product');
// Route::get('product/{slug}', [PageController::class, 'product_details'])->name('product.details');
// Route::get('caompany/category/{slug}', [PageController::class, 'category_product'])->name('company.category.product');

// //Company By Category
// Route::get('company/category/{slug}', [PageController::class, 'categoryByCompany'])->name('category.by.company');
Route::get('company-search', [FrontendSearchController::class, 'company_search'])->name('companySearch');

//Shop
Route::get('shop', [EcommerceController::class, 'index'])->name('ecommerce.index');
Route::get('shop/details/', [EcommerceController::class, 'details'])->name('ecommerce.details');
Route::get('category/product/{slug}', [EcommerceController::class, 'category_product'])->name('category.product');

Route::get('/expert/profile', [PageController::class, 'profile'])->name('front.profile');
Route::get('policy', [PageController::class, 'policy'])->name('policy');
Route::get('terms/condation', [PageController::class, 'terms_condation'])->name('terms_condation');
Route::get('test-admin', function () {  Artisan::call('db:seed TestSeeder'); return 'done'; });

Route::get('agent/find/', [FindController::class, 'agent'])->name('find.agent');
Route::get('expert/find/', [FindController::class, 'expert'])->name('find.expert');

//user profile
// Route::get('user-profile', [UserProfileController::class, 'index'])->name('user.profile.index')->middleware('auth');
// Route::post('user/profile/update', [UserProfileController::class, 'update'])->name('user.profile.update');
// Route::post('user/location', [UserProfileController::class, 'location'])->name('user.location.update');
// Route::post('user/password/update', [UserProfileController::class, 'password_update'])->name('user.password.update');




//shop now
Route::get('/shop-now/{product_id}', [PageController::class, 'shop_now'])->name('shop.now');

//Checkout
Route::get('checkout/{id}', [CheckoutController::class, 'checkout'])->name('checkout');



//Contact Message Store
Route::post('/contact/store', [ContactController::class, 'contact_store'])->name('contact.store');

//User Authentication route
// Auth::routes();

//Frontend Home
Route::get('/home', [HomeController::class, 'index'])->name('home');




//Super Login
Route::get('super/login', [SuperLoginController::class, 'showLoginForm'])->name('Super.login')->middleware('guest');
Route::post('super/login', [SuperLoginController::class, 'login'])->name('Super.login.submit')->middleware('guest');

//Super prefix
Route::prefix('super')->middleware('super')->group(function () {
    Route::post('/logout', [SuperLoginController::class, 'logout'])->name('Super.logout');
    Route::get('/home', [SuperAdminController::class, 'index'])->name('super.dashboard');

    //Company List
    Route::get('/companies', [SuperAdminController::class, 'companyList'])->name('companies.list');

    // Super Company Register
    Route::get('comapny/register', [SuperCompanyController::class, 'company_register_form'])->name('super.company.register.form');
    Route::post('comapny/register', [SuperCompanyController::class, 'company_register'])->name('super.company.register');
    // Comapny Delete
    Route::get('comapny/delete/{id}', [SuperCompanyController::class, 'company_delete'])->name('super.company.delete');

    // comapny view
    Route::get('comapny/view/{id}', [SuperCompanyController::class, 'company_view'])->name('super.company.view');

    //Comapny Approval
    Route::get('company/approval/{slug}', [ComapnyApprovalController::class, 'approval',])->name('super.company.approval');
    Route::post('company/deactive/{slug}', [ComapnyApprovalController::class, 'deactive',])->name('super.company.deactive');



    //Agent List
    Route::get('/agents', [SuperAdminController::class, 'agentList'])->name('agents.list');

    // Super Company Register
    Route::get('agent/register', [SuperAgentController::class, 'agent_register_form'])->name('super.agent.register.form');
    Route::post('agent/register', [SuperAgentController::class, 'agent_register'])->name('super.agent.register');

    // Agent Delete
    Route::get('agent/delete/{id}', [SuperAgentController::class, 'agent_delete'])->name('super.agent.delete');

    // comapny view
    Route::get('agent/view/{id}', [SuperAgentController::class, 'agent_view'])->name('super.agent.view');

    // Agent Approval
    Route::get('agent/approval/{slug}', [AgentApprovalController::class, 'approval',])->name('super.agent.approval');
    Route::post('agent/deactive/{slug}', [AgentApprovalController::class, 'deactive',])->name('super.agent.deactive');




    //Expert List
    Route::get('/expert/list', [ExpertController::class, 'expert_list'])->name('expert.list');

    // Super Company Register
    Route::get('expert/register', [SuperExpertController::class, 'expert_register_form'])->name('super.expert.register.form');
    Route::post('expert/register', [SuperExpertController::class, 'expert_register'])->name('super.expert.register');

    // Expert Delete
    Route::get('expert/delete/{id}', [SuperExpertController::class, 'expert_delete'])->name('super.expert.delete');

    // comapny view
    Route::get('expert/view/{id}', [SuperExpertController::class, 'expert_view'])->name('super.expert.view');

    //Expert Approval
    Route::get('expert/approval/{slug}', [ExpertApprovalController::class, 'approval',])->name('super.expert.approval');
    Route::post('expert/deactive/{slug}', [ExpertApprovalController::class, 'deactive',])->name('super.expert.deactive');

    Route::resource('benifit', BenefitController::class);

    //Portfolio Approval Controller
    Route::get('all/portfolio', [PortfolioApporvalController::class, 'index'])->name('super.portfolio.approval.index');
    Route::post('all/message/update', [PortfolioApporvalController::class, 'message_update'])->name('super.portfolio.approval.message');
    Route::get('portfolio/approve/{id}', [PortfolioApporvalController::class, 'approve'])->name('super.portfolio.approve');

    // Profile
    Route::get('admin-profile/', [SuperProfileController::class, 'index'])->name('super.profile.index');
    Route::post('profile/update', [SuperProfileController::class, 'update'])->name('super.profile.update');
    Route::post('profile/password/update', [SuperProfileController::class, 'password_update'])->name('super.password.update');

    //contatc message
    Route::get('contacts', [ContactController::class, 'index'])->name('super.contact.index');
    Route::get('contacts/status/', [ContactController::class, 'status'])->name('super.contact.status');
    Route::get('contacts/delete/{id}', [ContactController::class, 'delete'])->name('super.contact.delete');
    Route::post('contacts/reply/{id}', [ContactController::class, 'reply'])->name('super.contact.reply');


    //Super Admin order
    Route::get('order/', [SuperOrderController::class, 'index'])->name('super.order.index');
    Route::get('order/{id}', [SuperOrderController::class, 'details'])->name('super.order.details');
    Route::get('order/approved/{id}', [SuperOrderController::class, 'approved'])->name('super.order.approved');
    Route::post('order/cancel/{id}', [SuperOrderController::class, 'order_cancel'])->name('super.order.cancel');

    //Subscription Setting
    Route::get('subscription/setting', [SubscriptionSettingController::class, 'index'])->name('super.subscription.setting.index');
    Route::post('subscription/store', [SubscriptionSettingController::class, 'store'])->name('super.subscription.store');
    Route::post('subscription/update/{id}', [SubscriptionSettingController::class, 'update'])->name('super.subscription.update');
    Route::get('subscription/delete/{id}', [SubscriptionSettingController::class, 'delete'])->name('super.subscription.delete');

    // Route::get()->name('super.one.time.payment.setting');

    // Product Category by Super admin
    Route::resource('category', ProductCategoryController::class);

    //Slider
    Route::resource('sliders', SliderController::class);

    // Home Page Slider
    Route::get('super/slider/index', [SuperSliderController::class, 'index'])->name('super.slider.index');
    Route::post('super/slider/store', [SuperSliderController::class, 'store'])->name('super.slider.store');
    Route::post('super/slider/update/{id}', [SuperSliderController::class, 'update'])->name('super.slider.update');
    Route::get('super/slider/delete/{id}', [SuperSliderController::class, 'delete'])->name('super.slider.delete');

    //Subscribers
    Route::get('subscriber/index', [SubscriberController::class, 'index'])->name('super.subscriber.index');
    Route::get('subscriber/delete/{id}', [SubscriberController::class, 'delete'])->name('super.subscriber.delete');

    // Route::prefix('expert')->name('super.')->group(function(){
    //   Route::resource('/websitesetting', WebsiteSettingController::class);
    // });

    //Agent Document Many By Super Admin
    Route::get('agent/documnet/{slug}', [AgentDocumentManagementBySuperAdminController::class, 'index'])->name('super.agent.document.index');
    Route::post('agent/documnet/update/{slug}', [AgentDocumentManagementBySuperAdminController::class, 'update'])->name('super.agent.document.update');

    //About Us
    Route::get('about/us', [AboutUsController::class, 'about_us'])->name('super.about.us');
    Route::post('about/us', [AboutUsController::class, 'update'])->name('super.about.us.update');

    //Terms and Condation
    Route::get('terms-condation', [TremsAndCondationController::class, 'trems_condation'])->name('super.terms.condation');
    Route::post('terms-condation', [TremsAndCondationController::class, 'trems_condation_update'])->name('super.terms.condation.update');

    // policy
    Route::get('privacy', [AboutUsController::class, 'privacy'])->name('super.privacy');
    Route::post('privacy/update', [AboutUsController::class, 'privacy_update'])->name('super.privacy.update');



    //Cancellation Policy
    Route::get('cancellation/policy', [AboutUsController::class, 'cancellation_policy'])->name('super.cancellation.policy');
    Route::post('cancellation/policy/update', [AboutUsController::class, 'cancellation_policy_update'])->name('super.privacy.cancellation.update');

    //Return Policy
    Route::get('refund/policy', [AboutUsController::class, 'refund_policy'])->name('super.refund.policy');
    Route::post('refund/policy/update', [AboutUsController::class, 'refund_policy_update'])->name('super.privacy.refund.update');

    //Refund Policy
    Route::get('return/policy', [AboutUsController::class, 'return_policy'])->name('super.return.policy');
    Route::post('return/policy/update', [AboutUsController::class, 'return_policy_update'])->name('super.privacy.return.update');

    //Super Search Controller
    Route::get('order-search', [SuperAdminSearchController::class, 'order_search'])->name('super.order.search');
    Route::get('order-date-filter', [SuperAdminSearchController::class, 'order_date_filter'])->name('super.order.date.filter');
    Route::get('company/search', [SuperAdminSearchController::class, 'company_search'])->name('super.company.search');
    Route::get('agent/search', [SuperAdminSearchController::class, 'agent_search'])->name('super.agent.search');
    Route::get('expert/search', [SuperAdminSearchController::class, 'expert_search'])->name('super.expert.search');

    //General setting
    Route::get('general/setting', [GeneralSettingController::class, 'index'])->name('general.setting.index');
    Route::post('general/setting', [GeneralSettingController::class, 'update'])->name('general.setting.update');


    // Super Notification to order
    Route::get('notification/all', [SuperNotificationController::class, 'all_notification'])->name('super.all.notification');
    Route::get('notification/read', [SuperNotificationController::class, 'make_read'])->name('super.notification.read');

    //Product Category
    Route::get('product-category', [SuperProductCategoryController::class, 'index'])->name('super.product.category.index');
    Route::post('product/category/store', [SuperProductCategoryController::class, 'store'])->name('super.product.category.store');
    Route::post('product-category/update/{id}', [SuperProductCategoryController::class, 'update'])->name('super.product.category.update');
    Route::get('product/category/delete/{id}', [SuperProductCategoryController::class, 'delete'])->name('super.product.category.delete');

    //Company Category
    Route::get('company-category', [SuperCompanyCategoryController::class, 'index'])->name('super.company.category.index');
    Route::post('company/category/store', [SuperCompanyCategoryController::class, 'store'])->name('super.company.category.store');
    Route::post('company-category/update/{id}', [SuperCompanyCategoryController::class, 'update'])->name('super.company.category.update');
    Route::get('company/category/delete/{id}', [SuperCompanyCategoryController::class, 'delete'])->name('super.company.category.delete');

    //Engineer Category
    Route::get('expert-category', [SuperEngineerCategoryController::class, 'index'])->name('super.expert.category.index');
    Route::post('expert/category/store', [SuperEngineerCategoryController::class, 'store'])->name('super.expert.category.store');
    Route::post('expert-category/update/{id}', [SuperEngineerCategoryController::class, 'update'])->name('super.expert.category.update');
    Route::get('expert/category/delete/{id}', [SuperEngineerCategoryController::class, 'delete'])->name('super.expert.category.delete');

    // Image Setting
    Route::get('image/setting', [SuperImageSettingController::class, 'index'])->name('super.image.setting.index');
    Route::post('service/image/update', [SuperImageSettingController::class, 'service_image_update'])->name('super.service.image.update');
    Route::get  ('joinus/image/index', [SuperImageSettingController::class, 'join_us_image_index'])->name('super.join.us.image.index');
    Route::post('joinus/image/update', [SuperImageSettingController::class, 'join_us_image_update'])->name('super.join.us.image.update');

    //News
    Route::resource('newscategory', NewsCategoryController::class);
    Route::resource('news', SuperNewsController::class);
    //headine
    Route::get('headline', [SuperNewsController::class, 'headline'])->name('super.headline');
    Route::post('headline_store',[ SuperNewsController::class, 'headline_store'])->name('super.headline.store');
});

//Agent Portfolio In Super
Route::group(['prefix' => 'super/agent', 'as' => 'super.agent.', 'middleware' => 'super'], function () {
    Route::resource('categories', AgentServiceCategoryController::class);
    Route::resource('service', SuperAgentServiceController::class);
});




// Comapny Login and register
Route::group(['prefix' => 'company', 'as' => 'company.', 'middleware' => 'guest'], function () {
    Route::get('/register', [CompanyRegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [CompanyRegisterController::class, 'register'])->name('register');
    // Route::get('/login', [CompanyLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [CompanyLoginController::class, 'login'])->name('login.submit');
});

//   Route::get('test-migrate-fresh', function () {  Artisan::call('migrate:fresh'); return 'done'; });

  Route::post('company/logout', [CompanyLoginController::class, 'logout'])->name('company.logout')->middleware('company');

//Company
Route::prefix('company')->name('company.')->middleware('company')->group(function () {
    Route::get('/home', [CompanyController::class, 'index'])->name('dashboard');
    Route::resource('unit', UnitController::class);
    Route::resource('category', CategoryController::class);
    // Route::resource('product', ProductController::class);
    Route::resource('product', CompanyProductController::class);
    Route::get('product/price/index', [CompanyProductController::class, 'price_index'])->name('product.price.index');
    Route::post('product/update/{slug}', [CompanyProductController::class, 'price_update'])->name('product.price.update');

    //comapny profile
    Route::get('profile/index/', [CompanyProfileController::class, 'index'])->name('profile.index');
    Route::post('profile/update', [CompanyProfileController::class, 'update'])->name('profile.update');
    Route::post('profile/password/update', [CompanyProfileController::class, 'password_update'])->name('password.update');

    // compnay order
    Route::get('/orders/index', [OrderController::class, 'get_company_orders'])->name('order.index');
    Route::get('/order/details/{order_detail_id}', [OrderController::class, 'set_products_prices_view'])->name('order.details');
    Route::post('/order/details/action', [OrderController::class, 'set_products_prices']);
    Route::get('order/company/approve/{id}', [OrderController::class, 'company_order_approve'])->name('order.approve');
    Route::post('/order/cancel/{id}', [OrderController::class, 'order_cancle'])->name('order.cancel');
    Route::get('payment/receive/{id}', [OrderController::class, 'payment_receive'])->name('payment.receive');
    Route::get('payment/deliver/{id}', [OrderController::class, 'payment_deliver'])->name('payment.deliver');


    //Comapny Banner Setting
    Route::get('banner/index', [CompanyBannerSettingController::class, 'index'])->name('banner.setting.index');
    Route::post('banner-sidebar', [CompanyBannerSettingController::class, 'sidebar'])->name('banner.setting.sidebar');
    Route::post('banner-small', [CompanyBannerSettingController::class, 'small_banner'])->name('banner.setting.small');

    //Company Search Controller
    Route::get('order-search', [ComapnySearchController::class, 'order_search'])->name('order.search');
    Route::get('order-date-filter', [ComapnySearchController::class, 'order_date_filter'])->name('order.date.filter');

    // Company Notification
    Route::get('notification/all', [CompanyNotificationController::class, 'all_notification'])->name('all.notification');
    Route::get('notification/read', [CompanyNotificationController::class, 'make_read'])->name('notification.read');
});

// Agent Login and register
// Route::group(['prefix' => 'agent', 'as' => 'agent.', 'middleware' => 'guest'], function () {
//     Route::get('/register', [AgentRegisterController::class, 'showRegistrationForm'])->name('register');
//     Route::post('/register', [AgentRegisterController::class, 'register'])->name('register');
//     Route::get('/login', [AgentLoginController::class, 'showLoginForm'])->name('login');
//     Route::post('/login', [AgentLoginController::class, 'login'])->name('login.submit');
// });

//Agent
// Route::prefix('agent')->name('agent.')->middleware('agent')->group(function () {

//     Route::get('/home', [AgentController::class, 'index'])->name('dashboard');
//     Route::get('/profile', [AgentController::class, 'edit'])->name('profile');
//     Route::post('/profile/update', [AgentController::class, 'update'])->name('profile.update');

//     Route::post('logout', [AgentLoginController::class, 'logout'])->name('logout');

//     //Order
//     Route::resource('order', OrderController::class);
//     Route::get('order/delete/{id}', [OrderController::class, 'oder_delete'])->name('order.delete');
//     Route::post('agent/price/setup/', [OrderController::class, 'agent_price_setup'])->name('agent.price.setup');
//     // Agent Product Delete Form Order
//     Route::get('Product/delete/{id}', [OrderController::class, 'delete'])->name('product.delete');
//     //Agent Place Order
//     Route::get('place/order/{id}', [OrderController::class, 'agent_place_order'])->name('place.order');

//     //company orders
//     Route::get('/order/get-products/{company_id}', [OrderController::class, 'get_products']);
//     Route::get('/order/set-time-location/{order_id}', [OrderController::class, 'set_delivery_time_location_view']);
//     Route::post('/order/set-time-location/{order_id}', [OrderController::class, 'set_delivery_time_location']);
//     Route::post('/order/set-products-quantities', [OrderController::class, 'set_products_quantities']);
//     Route::get('/order/set-products-prices/{order_id}', [OrderController::class, 'set_product_prices_view']);
//     Route::post('/order/set-products-prices', [OrderController::class, 'set_product_prices']);
//     //Agent order cancel
//     Route::get('order/cancel/{id}', [OrderController::class, 'agent_order_cancel'])->name('order.cancel');


//     //payment Reset
//     Route::post('paymnet/slip/store/{id}', [PaymentSlipController::class, 'store'])->name('paymnet.slip.store');
//     // Product Receive
//     Route::get('product/receive/{id}', [OrderController::class, 'product_receive'])->name('product.receive');

//     //User Orders
//     Route::get('user/orders', [AgentUserOrderController::class, 'orders_list'])->name('user.orders');
//     Route::get('user/order/details/{id}', [AgentUserOrderController::class, 'details'])->name('user.order.details');

//     // Profile
//     Route::get('profile/index', [AgentProfileController::class, 'index'])->name('profile.index');
//     Route::post('profile/update', [AgentProfileController::class, 'update'])->name('profile.update');
//     Route::post('location', [AgentProfileController::class, 'location'])->name('location.update');
//     Route::post('profile/password/update', [AgentProfileController::class, 'password_update'])->name('password.update');

//     //Subscription
//     Route::get('supscripion/index', [AgentSubscriptionController::class, 'index'])->name('subscription.index');


//     //Agent Document Create and Update
//     Route::get('documnet/{slug}', [AgentDocumentController::class, 'index'])->name('document.index');
//     Route::post('documnet/update/{slug}', [AgentDocumentController::class, 'update'])->name('document.update');

//     //Create New Client
//     Route::post('client/store/{id}', [AgentClientController::class, 'store'])->name('client.store');

//     //Agent Search Controller
//     Route::get('order-search', [AgentSearchController::class, 'order_search'])->name('order.search');
//     Route::get('order-date-filter', [AgentSearchController::class, 'order_date_filter'])->name('order.date.filter');

//     //Agent User Order Search Controller
//     Route::get('user/order-search', [AgentUserOrderController::class, 'order_search'])->name('user.order.search');
//     Route::get('user/order-date-filter', [AgentUserOrderController::class, 'order_date_filter'])->name('user.order.date.filter');

//     // Agent Notification
//     Route::get('notification/all', [AgentNotificationController::class, 'all_notification'])->name('all.notification');
//     Route::get('notification/read', [AgentNotificationController::class, 'make_read'])->name('notification.read');

// });

//Agent Portfolio
Route::group(['prefix' => 'agent/portfolio', 'as' => 'agent.portfolio.', 'middleware' => 'agent'], function () {
    //Banner
    Route::get('banner/index', [AgentBannerController::class, 'index'])->name('banner');
    Route::post('banner-update', [AgentBannerController::class, 'update'])->name('banner.update');

    //About
    Route::get('about/index', [AgentAboutController::class, 'index'])->name('about');
    Route::post('about-update', [AgentAboutController::class, 'update'])->name('about.update');

    //Service Category
    Route::get('service/category', [AgentServiceCategoryController::class, 'index'])->name('category');
    Route::post('service-category/update', [AgentServiceCategoryController::class, 'update'])->name('category.update');

    //Choose Us
    Route::resource('chooes', AgentChooseUsController::class);

    //Image Setting
    Route::get('image-setting', [AgentImageController::class, 'index'])->name('image');
    Route::post('image-update', [AgentImageController::class, 'update'])->name('image.update');

    //Contact message
    Route::get('contact', [AgentContactController::class, 'index'])->name('contact.message');
    Route::get('contact/delete/{id}', [AgentContactController::class, 'delete'])->name('contact.delete');
});


// Agent Login and register
// Route::group(['prefix' => 'expert', 'as' => 'expert.', 'middleware' => 'guest'], function () {
//     Route::get('/register', [ExpertLoginController::class, 'showRegisterForm'])->name('register');
//     Route::post('/register', [ExpertLoginController::class, 'register'])->name('register.submit');
//     Route::get('/login', [ExpertLoginController::class, 'showLoginForm'])->name('login');
//     Route::post('/login', [ExpertLoginController::class, 'login'])->name('login.submit');
// });

// //Expert
// Route::prefix('expert')->name('expert.')->middleware('expert')->group(function () {

//     Route::get('/home', [ExpertController::class, 'index'])->name('dashboard');
//     Route::post('/logout', [ExpertLoginController::class, 'logout'])->name('logout');
//     Route::resource('portfolio', PortfolioController::class);

//     // Profile
//     Route::get('profile/index', [ExpertProfileController::class, 'index'])->name('profile.index');
//     Route::post('profile/update', [ExpertProfileController::class, 'update'])->name('profile.update');
//     Route::post('location', [ExpertProfileController::class, 'location'])->name('location.update');
//     Route::post('profile/password/update', [ExpertProfileController::class, 'password_update'])->name('password.update');
// });

//Expert Portfolio
// Route::prefix('expert/portfolio/')->name('expert.portfolio.')->middleware('expert')->group(function () {
//     // banner
//     Route::get('banner/index', [ExpertBannerController::class, 'index'])->name('banner.index');
//     Route::post('banner/update', [ExpertBannerController::class, 'update'])->name('banner.update');

//     // about
//     Route::get('about/index', [ExpertAboutController::class, 'index'])->name('about.index');
//     Route::post('about/update', [ExpertAboutController::class, 'update'])->name('about.update');

//     //Education
//     Route::get('education/index', [ExperEducationController::class, 'index'])->name('education.index');
//     Route::post('education/store', [ExperEducationController::class, 'store'])->name('education.store');
//     Route::post('education/update/{slug}', [ExperEducationController::class, 'update'])->name('education.update');
//     Route::get('education/delete/{slug}', [ExperEducationController::class, 'delete'])->name('education.delete');

//     //Experience
//     Route::get('experience/index', [ExpertExperienceController::class, 'index'])->name('experience.index');
//     Route::post('experience/store', [ExpertExperienceController::class, 'store'])->name('experience.store');
//     Route::post('experience/update/{slug}', [ExpertExperienceController::class, 'update'])->name('experience.update');
//     Route::get('experience/delete/{slug}', [ExpertExperienceController::class, 'delete'])->name('experience.delete');

//     //Services
//     Route::get('service/index', [ExpertServiceController::class, 'index'])->name('service.index');
//     Route::post('service/store', [ExpertServiceController::class, 'store'])->name('service.store');
//     Route::post('service/update/{slug}', [ExpertServiceController::class, 'update'])->name('service.update');
//     Route::get('service/delete/{slug}', [ExpertServiceController::class, 'delete'])->name('service.delete');


//     //Project  category
//     Route::get('project/category/index', [ExpertProjectCategoryController::class, 'index'])->name('project.category.index');
//     Route::post('project/category/store', [ExpertProjectCategoryController::class, 'store'])->name('project.category.store');
//     Route::post('project/category/update/{slug}', [ExpertProjectCategoryController::class, 'update'])->name('project.category.update');
//     Route::get('project/category/delete/{slug}', [ExpertProjectCategoryController::class, 'delete'])->name('project.category.delete');

//     //Project
//     Route::get('project/index', [ExpertProjectController::class, 'index'])->name('project.index');
//     Route::post('project/store', [ExpertProjectController::class, 'store'])->name('project.store');
//     Route::post('project/update/{slug}', [ExpertProjectController::class, 'update'])->name('project.update');
//     Route::get('project/delete/{slug}', [ExpertProjectController::class, 'delete'])->name('project.delete');
// });
