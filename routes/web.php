<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\ShoppingController;
use App\Http\Controllers\Frontend\CustomerController;
use App\Http\Controllers\Frontend\MemberController;
use App\Http\Controllers\Frontend\AgentController;
use App\Http\Controllers\Frontend\BkashController;
use App\Http\Controllers\Frontend\ShurjopayControllers;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\ChildcategoryController;
use App\Http\Controllers\Admin\OrderStatusController;
use App\Http\Controllers\Admin\ExpenseCategoriesController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\PixelsController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ApiIntegrationController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\BannerCategoryController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CreatePageController;
use App\Http\Controllers\Admin\CampaignController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\CustomerManageController;
use App\Http\Controllers\Admin\ShippingChargeController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\TagManagerController;
use App\Http\Controllers\Admin\CouponCodeController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\MemberManageController;
use App\Http\Controllers\Admin\AgentManageController;

Auth::routes();

Route::get('/cc', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "Cleared!";
});

Route::get('/migrate', function () {
    Artisan::call('migrate');
    return "Migrated!";
});

// Route::post('/customer/coupon', [CustomerController::class, 'customer_coupon'])->name('customer.coupon');
// Route::post('/customer/coupon-remove', [CustomerController::class, 'coupon_remove'])->name('customer.coupon_remove');

Route::get('barcodess', [ProductController::class, 'barcodess'])->name('barcodess.update');

Route::group(['namespace' => 'Frontend', 'middleware' => ['ipcheck', 'check_refer']], function () {
    Route::get('/', [FrontendController::class, 'index'])->name('home');
    Route::get('category/{category}', [FrontendController::class, 'category'])->name('category');
    Route::get('subcategory/{subcategory}', [FrontendController::class, 'subcategory'])->name('subcategory');
    Route::get('products/{slug}', [FrontendController::class, 'products'])->name('products');
    Route::get('members', [FrontendController::class, 'members'])->name('members');
    Route::get('details/{id}', [FrontendController::class, 'details'])->name('details');
    Route::get('packages', [FrontendController::class, 'packages'])->name('packages');
    Route::get('about-us', [FrontendController::class, 'aboutUs'])->name('aboutUs');


    Route::get('member/register-online', [FrontendController::class, 'register_online'])->name('member.registerOnline');
    Route::get('member/register-ofline', [FrontendController::class, 'register_ofline'])->name('member.registerOfline');
    Route::get('livesearch', [FrontendController::class, 'livesearch'])->name('livesearch');
    Route::get('search', [FrontendController::class, 'search'])->name('search');
    Route::get('site/contact-us', [FrontendController::class, 'contact'])->name('contact');
    Route::get('join-agent', [FrontendController::class, 'joinAgent'])->name('joinAgent');
    Route::get('agent-account', [FrontendController::class, 'agentAC'])->name('agentAC');
    Route::get('/page/{slug}', [FrontendController::class, 'page'])->name('page');
    Route::get('districts', [FrontendController::class, 'districts'])->name('districts');
    Route::get('/coupon', [FrontendController::class, 'coupon_show'])->name('coupon.view');
    Route::get('/campaign/{slug}', [FrontendController::class, 'campaign'])->name('campaign');
    Route::get('/campaign-stock-check', [FrontendController::class, 'campaign_stock'])->name('campaign.stock_check');
    Route::get('/offer', [FrontendController::class, 'offers'])->name('offers');
    Route::get('stock-check', [FrontendController::class, 'stock_check'])->name('stock_check');
    Route::get('/payment-success', [FrontEndController::class, 'payment_success'])->name('payment_success');
    Route::get('/payment-cancel', [FrontEndController::class, 'payment_cancel'])->name('payment_cancel');
    Route::get('member/register', [FrontendController::class, 'register'])->name('member.register');
    Route::get('member/login', [FrontendController::class, 'login'])->name('member.login');
    Route::get('agent/login', [FrontendController::class, 'agent_login'])->name('agent.login');


    Route::get('agent/register', [FrontendController::class, 'agent_register'])->name('agent.register');
    Route::post('/member/register-post', [MemberController::class, 'register'])->name('member_register');
    Route::get('/member/verify', [MemberController::class, 'memberVerifyForm'])->name('verify_form');
});

Route::group(['prefix' => 'customer', 'namespace' => 'Frontend', 'middleware' => ['ipcheck', 'check_refer']], function () {
    // Route::get('/login', [CustomerController::class, 'login'])->name('customer.login');
    // Route::post('/signin', [CustomerController::class, 'signin'])->name('customer.signin');
    // Route::get('/register', [CustomerController::class, 'register'])->name('customer.register');
    // Route::post('/store', [CustomerController::class, 'store'])->name('customer.store');
    // Route::get('/verify', [CustomerController::class, 'verify'])->name('customer.verify');
    // Route::post('/verify-account', [CustomerController::class, 'account_verify'])->name('customer.account.verify');
    // Route::post('/resend-otp', [CustomerController::class, 'resendotp'])->name('customer.resendotp');
    // Route::post('/logout', [CustomerController::class, 'logout'])->name('customer.logout');
    // Route::post('/post/review', [CustomerController::class, 'review'])->name('customer.review');
    // Route::get('/forgot-password', [CustomerController::class, 'forgot_password'])->name('customer.forgot.password');
    // Route::post('/forgot-verify', [CustomerController::class, 'forgot_verify'])->name('customer.forgot.verify');
    // Route::get('/forgot-password/reset', [CustomerController::class, 'forgot_reset'])->name('customer.forgot.reset');
    // Route::post('/forgot-password/store', [CustomerController::class, 'forgot_store'])->name('customer.forgot.store');
    // Route::post('/forgot-password/resendotp', [CustomerController::class, 'forgot_resend'])->name('customer.forgot.resendotp');
    // Route::get('/checkout', [CustomerController::class, 'checkout'])->name('customer.checkout');
    // Route::post('/order-save', [CustomerController::class, 'order_save'])->name('customer.ordersave');
    // Route::get('/order-success/{id}', [CustomerController::class, 'order_success'])->name('customer.order_success');
    // Route::get('/order-track', [CustomerController::class, 'order_track'])->name('customer.order_track');
    // Route::get('/order-track/result', [CustomerController::class, 'order_track_result'])->name('customer.order_track_result');
});
// member normal routes
Route::group(['prefix' => 'member', 'namespace' => 'Frontend', 'middleware' => ['ipcheck', 'check_refer']], function () {
    Route::post('/signin', [MemberController::class, 'signin'])->name('member.signin');
    Route::post('/store', [MemberController::class, 'store'])->name('member.store');
    Route::get('/verify', [MemberController::class, 'verify'])->name('member.verify');
    Route::post('/verify-account', [MemberController::class, 'account_verify'])->name('member.account.verify');
    Route::post('/resend-otp', [MemberController::class, 'resendotp'])->name('member.resendotp');
    Route::post('/logout', [MemberController::class, 'logout'])->name('member.logout');
    Route::post('/post/review', [MemberController::class, 'review'])->name('member.review');
    Route::get('/forgot-password', [MemberController::class, 'forgot_password'])->name('member.forgot.password');
    Route::post('/forgot-verify', [MemberController::class, 'forgot_verify'])->name('member.forgot.verify');
    Route::get('/forgot-password/reset', [MemberController::class, 'forgot_reset'])->name('member.forgot.reset');
    Route::post('/forgot-password/store', [MemberController::class, 'forgot_store'])->name('member.forgot.store');
    Route::post('/forgot-password/resendotp', [MemberController::class, 'forgot_resend'])->name('member.forgot.resendotp');
});
// customer auth
Route::group(['prefix' => 'customer', 'namespace' => 'Frontend', 'middleware' => ['customer', 'ipcheck', 'check_refer']], function () {

    // Route::get('/account', [CustomerController::class, 'account'])->name('customer.account');
    // Route::get('/orders', [CustomerController::class, 'orders'])->name('customer.orders');
    // Route::get('/invoice', [CustomerController::class, 'invoice'])->name('customer.invoice');
    // Route::get('/pdf-reader', [CustomerController::class, 'pdfreader'])->name('customer.pdfreader');
    // Route::get('/invoice/order-note', [CustomerController::class, 'order_note'])->name('customer.order_note');
    // Route::get('/profile-edit', [CustomerController::class, 'profile_edit'])->name('customer.profile_edit');
    // Route::post('/profile-update', [CustomerController::class, 'profile_update'])->name('customer.profile_update');
    // Route::get('/change-password', [CustomerController::class, 'change_pass'])->name('customer.change_pass');
    // Route::post('/password-update', [CustomerController::class, 'password_update'])->name('customer.password_update');
});

// agent normal routes
Route::group(['prefix' => 'agent', 'namespace' => 'Frontend', 'middleware' => ['ipcheck', 'check_refer']], function () {
    Route::post('/signin', [AgentController::class, 'signin'])->name('agent.signin');
    Route::post('/store', [AgentController::class, 'store'])->name('agent.store');
    Route::get('/verify', [AgentController::class, 'verify'])->name('agent.verify');
    Route::post('/verify-account', [AgentController::class, 'account_verify'])->name('agent.account.verify');
    Route::post('/resend-otp', [AgentController::class, 'resendotp'])->name('agent.resendotp');
    Route::post('/logout', [AgentController::class, 'logout'])->name('agent.logout');
    Route::post('/post/review', [AgentController::class, 'review'])->name('agent.review');
    Route::get('/forgot-password', [AgentController::class, 'forgot_password'])->name('agent.forgot.password');
    Route::post('/forgot-verify', [AgentController::class, 'forgot_verify'])->name('agent.forgot.verify');
    Route::get('/forgot-password/reset', [AgentController::class, 'forgot_reset'])->name('agent.forgot.reset');
    Route::post('/forgot-password/store', [AgentController::class, 'forgot_store'])->name('agent.forgot.store');
    Route::post('/forgot-password/resendotp', [AgentController::class, 'forgot_resend'])->name('agent.forgot.resendotp');
});

// customer auth
Route::group(['prefix' => 'agent', 'namespace' => 'Frontend', 'middleware' => ['agent', 'ipcheck', 'check_refer']], function () {
    Route::get('/account', [AgentController::class, 'account'])->name('agent.account');
    Route::get('/orders', [AgentController::class, 'orders'])->name('agent.orders');
    Route::get('/invoice', [AgentController::class, 'invoice'])->name('agent.invoice');
    Route::get('/invoice/order-note', [AgentController::class, 'order_note'])->name('agent.order_note');
    Route::get('/profile-edit', [AgentController::class, 'profile_edit'])->name('agent.profile_edit');
    Route::post('/profile-update', [AgentController::class, 'profile_update'])->name('agent.profile_update');
    Route::get('/change-password', [AgentController::class, 'change_pass'])->name('agent.change_pass');
    Route::post('/password-update', [AgentController::class, 'password_update'])->name('agent.password_update');

    Route::get('/member-create', [AgentController::class, 'member_create'])->name('agent.member_create');
    Route::post('/member-store', [AgentController::class, 'member_store'])->name('agent.member_store');
    Route::get('/member-edit/{id}', [AgentController::class, 'member_edit'])->name('agent.member_edit');
    Route::post('/member-update', [AgentController::class, 'member_update'])->name('agent.member_update');
    Route::get('/my-members', [AgentController::class, 'my_members'])->name('agent.my_members');
});

Route::group(['namespace' => 'Frontend', 'middleware' => ['ipcheck', 'check_refer']], function () {

    Route::get('bkash/checkout-url/pay', [BkashController::class, 'pay'])->name('url-pay');
    Route::any('bkash/checkout-url/create', [BkashController::class, 'create'])->name('url-create');
    Route::get('bkash/checkout-url/callback', [BkashController::class, 'callback'])->name('url-callback');
    Route::get('/payment-success', [ShurjopayControllers::class, 'payment_success'])->name('payment_success');
    Route::get('/payment-cancel', [ShurjopayControllers::class, 'payment_cancel'])->name('payment_cancel');
});

Route::group(['namespace' => 'frontEnd', 'prefix' => 'member', 'middleware' => ['member']], function () {
    // all protected routes here
    Route::get('/account', [MemberController::class, 'account'])->name('member.account');
    Route::get('/logout', [MemberController::class, 'logout'])->name('member.logout');
    Route::get('/profile-edit', [MemberController::class, 'editProfile'])->name('member.editprofile');
    Route::post('/profile-update', [MemberController::class, 'updateProfile'])->name('member.updateprofile');
    Route::get('/delete-image-one/{id}', [MemberController::class, 'deleteImageOne'])->name('member.delete.imageone');
    Route::get('/delete-image-two/{id}', [MemberController::class, 'deleteImageTwo'])->name('member.delete.imagetwo');
    Route::get('/delete-image-three/{id}', [MemberController::class, 'deleteImageThree'])->name('member.delete.imagethree');

    Route::get('/partner-expectation', [MemberController::class, 'partnerExpectation'])->name('member.partnerexp');
    Route::post('/partner-expectation-save', [MemberController::class, 'partnerExpectationStore'])->name('member.partnerexpsave');
    Route::post('/member_publish', [MemberController::class, 'member_publish'])->name('member.member_publish');
    Route::post('/make-premium', [MemberController::class, 'make_premium'])->name('member.make_premium');

    Route::get('/partner-expectation-edit', [MemberController::class, 'partnerExpectationEdit'])->name('member.partnerexpedit');
    Route::post('/partner-expectation-update', [MemberController::class, 'partnerExpectationUpdate'])->name('member.partnerexpupdate');

    Route::get('wishlist', [MemberController::class, 'wishlist'])->name('member.wishlist');
});

// unathenticate admin route
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['customer', 'ipcheck', 'check_refer']], function () {
    Route::get('locked', [DashboardController::class, 'locked'])->name('locked');
    Route::post('unlocked', [DashboardController::class, 'unlocked'])->name('unlocked');
});

// ajax route
Route::get('/ajax-product-subcategory', [ProductController::class, 'getSubcategory']);
Route::get('/ajax-product-childcategory', [ProductController::class, 'getChildcategory']);

// auth route
Route::group(['namespace' => 'Admin', 'middleware' => ['auth', 'lock', 'check_refer'], 'prefix' => 'admin'], function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('change-password', [DashboardController::class, 'changepassword'])->name('change_password');
    Route::post('new-password', [DashboardController::class, 'newpassword'])->name('new_password');
    Route::get('send-sms', [DashboardController::class, 'send_sms'])->name('admin.send_sms');
    Route::post('send-sms-post', [DashboardController::class, 'send_sms_post'])->name('admin.send_sms_post');


    // users route
    Route::get('users/manage', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users/save', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('users/update', [UserController::class, 'update'])->name('users.update');
    Route::post('users/inactive', [UserController::class, 'inactive'])->name('users.inactive');
    Route::post('users/active', [UserController::class, 'active'])->name('users.active');
    Route::post('users/destroy', [UserController::class, 'destroy'])->name('users.destroy');

    // roles
    Route::get('roles/manage', [RoleController::class, 'index'])->name('roles.index');
    Route::get('roles/{id}/show', [RoleController::class, 'show'])->name('roles.show');
    Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('roles/save', [RoleController::class, 'store'])->name('roles.store');
    Route::get('roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::post('roles/update', [RoleController::class, 'update'])->name('roles.update');
    Route::post('roles/destroy', [RoleController::class, 'destroy'])->name('roles.destroy');

    // permissions
    Route::get('permissions/manage', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('permissions/{id}/show', [PermissionController::class, 'show'])->name('permissions.show');
    Route::get('permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('permissions/save', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('permissions/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::post('permissions/update', [PermissionController::class, 'update'])->name('permissions.update');
    Route::post('permissions/destroy', [PermissionController::class, 'destroy'])->name('permissions.destroy');

    // settings route
    Route::get('settings/manage', [GeneralSettingController::class, 'index'])->name('settings.index');
    Route::get('settings/create', [GeneralSettingController::class, 'create'])->name('settings.create');
    Route::post('settings/save', [GeneralSettingController::class, 'store'])->name('settings.store');
    Route::get('settings/{id}/edit', [GeneralSettingController::class, 'edit'])->name('settings.edit');
    Route::post('settings/update', [GeneralSettingController::class, 'update'])->name('settings.update');
    Route::post('settings/inactive', [GeneralSettingController::class, 'inactive'])->name('settings.inactive');
    Route::post('settings/active', [GeneralSettingController::class, 'active'])->name('settings.active');
    Route::post('settings/destroy', [GeneralSettingController::class, 'destroy'])->name('settings.destroy');

    // settings route
    Route::get('social-media/manage', [SocialMediaController::class, 'index'])->name('socialmedias.index');
    Route::get('social-media/create', [SocialMediaController::class, 'create'])->name('socialmedias.create');
    Route::post('social-media/save', [SocialMediaController::class, 'store'])->name('socialmedias.store');
    Route::get('social-media/{id}/edit', [SocialMediaController::class, 'edit'])->name('socialmedias.edit');
    Route::post('social-media/update', [SocialMediaController::class, 'update'])->name('socialmedias.update');
    Route::post('social-media/inactive', [SocialMediaController::class, 'inactive'])->name('socialmedias.inactive');
    Route::post('social-media/active', [SocialMediaController::class, 'active'])->name('socialmedias.active');
    Route::post('social-media/destroy', [SocialMediaController::class, 'destroy'])->name('socialmedias.destroy');

    // contact route
    Route::get('contact/manage', [ContactController::class, 'index'])->name('contact.index');
    Route::get('contact/create', [ContactController::class, 'create'])->name('contact.create');
    Route::post('contact/save', [ContactController::class, 'store'])->name('contact.store');
    Route::get('contact/{id}/edit', [ContactController::class, 'edit'])->name('contact.edit');
    Route::post('contact/update', [ContactController::class, 'update'])->name('contact.update');
    Route::post('contact/inactive', [ContactController::class, 'inactive'])->name('contact.inactive');
    Route::post('contact/active', [ContactController::class, 'active'])->name('contact.active');
    Route::post('contact/destroy', [ContactController::class, 'destroy'])->name('contact.destroy');

    // banner category route
    Route::get('banner-category/manage', [BannerCategoryController::class, 'index'])->name('banner_category.index');
    Route::get('banner-category/create', [BannerCategoryController::class, 'create'])->name('banner_category.create');
    Route::post('banner-category/save', [BannerCategoryController::class, 'store'])->name('banner_category.store');
    Route::get('banner-category/{id}/edit', [BannerCategoryController::class, 'edit'])->name('banner_category.edit');
    Route::post('banner-category/update', [BannerCategoryController::class, 'update'])->name('banner_category.update');
    Route::post('banner-category/inactive', [BannerCategoryController::class, 'inactive'])->name('banner_category.inactive');
    Route::post('banner-category/active', [BannerCategoryController::class, 'active'])->name('banner_category.active');
    Route::post('banner-category/destroy', [BannerCategoryController::class, 'destroy'])->name('banner_category.destroy');

    // banner  route
    Route::get('banner/manage', [BannerController::class, 'index'])->name('banners.index');
    Route::get('banner/create', [BannerController::class, 'create'])->name('banners.create');
    Route::post('banner/save', [BannerController::class, 'store'])->name('banners.store');
    Route::get('banner/{id}/edit', [BannerController::class, 'edit'])->name('banners.edit');
    Route::post('banner/update', [BannerController::class, 'update'])->name('banners.update');
    Route::post('banner/inactive', [BannerController::class, 'inactive'])->name('banners.inactive');
    Route::post('banner/active', [BannerController::class, 'active'])->name('banners.active');
    Route::post('banner/destroy', [BannerController::class, 'destroy'])->name('banners.destroy');

    // contact route
    Route::get('page/manage', [CreatePageController::class, 'index'])->name('pages.index');
    Route::get('page/create', [CreatePageController::class, 'create'])->name('pages.create');
    Route::post('page/save', [CreatePageController::class, 'store'])->name('pages.store');
    Route::get('page/{id}/edit', [CreatePageController::class, 'edit'])->name('pages.edit');
    Route::post('page/update', [CreatePageController::class, 'update'])->name('pages.update');
    Route::post('page/inactive', [CreatePageController::class, 'inactive'])->name('pages.inactive');
    Route::post('page/active', [CreatePageController::class, 'active'])->name('pages.active');
    Route::post('page/destroy', [CreatePageController::class, 'destroy'])->name('pages.destroy');

    // Order route
    Route::get('reviews', [ReviewController::class, 'index'])->name('reviews.index');
    Route::get('review/pending', [ReviewController::class, 'pending'])->name('reviews.pending');
    Route::post('review/inactive', [ReviewController::class, 'inactive'])->name('reviews.inactive');
    Route::post('review/active', [ReviewController::class, 'active'])->name('reviews.active');
    Route::get('review/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('review/save', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('review/{id}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
    Route::post('review/update', [ReviewController::class, 'update'])->name('reviews.update');
    Route::post('review/destroy', [ReviewController::class, 'destroy'])->name('reviews.destroy');

    // district routes
    Route::get('district/manage', [DistrictController::class,'index'])->name('districts.index');
    Route::get('district/{id}/edit', [DistrictController::class,'edit'])->name('districts.edit');
    Route::post('district/update', [DistrictController::class,'update'])->name('districts.update');
    Route::post('district/charge-update', [DistrictController::class,'district_charge'])->name('districts.charge');

    // member manage routes
    Route::get('member/manage', [MemberManageController::class, 'index'])->name('members.index');
    Route::get('member/{id}/edit', [MemberManageController::class, 'edit'])->name('members.edit');
    Route::get('member/profile', [MemberManageController::class, 'profile'])->name('members.profile');
    Route::post('member/update', [MemberManageController::class, 'update'])->name('members.update');
    Route::post('member/inactive', [MemberManageController::class, 'inactive'])->name('members.inactive');
    Route::post('member/active', [MemberManageController::class, 'active'])->name('members.active');
    Route::post('member/adminlog', [MemberManageController::class, 'adminlog'])->name('members.adminlog');
    
    // agent manage routes
    Route::get('agent/manage', [AgentManageController::class, 'index'])->name('agents.index');
    Route::get('agent/{id}/edit', [AgentManageController::class, 'edit'])->name('agents.edit');
    Route::get('agent/profile', [AgentManageController::class, 'profile'])->name('agents.profile');
    Route::post('agent/update', [AgentManageController::class, 'update'])->name('agents.update');
    Route::post('agent/inactive', [AgentManageController::class, 'inactive'])->name('agents.inactive');
    Route::post('agent/active', [AgentManageController::class, 'active'])->name('agents.active');
    Route::post('agent/adminlog', [AgentManageController::class, 'adminlog'])->name('agents.adminlog');
});
