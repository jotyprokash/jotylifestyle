<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CampaignController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\TrashController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SettingsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Frontend Catalog
Route::get('/', [CatalogController::class, 'index'])->name('home');
Route::get('/popular', [CatalogController::class, 'popular'])->name('popular');
Route::get('/product/{id}', [CatalogController::class, 'show'])->name('product.show');
Route::get('/search', [CatalogController::class, 'search'])->name('search');

// Authentication
Auth::routes();

// Static Pages
Route::view('/contact', 'others.contact')->name('contact');
Route::view('/aboutus', 'others.aboutus')->name('about');
Route::view('/guide', 'others.guide')->name('guide');
Route::view('/terms', 'others.terms')->name('terms');
Route::view('/policy', 'others.policy')->name('policy');
Route::view('/loading', 'others.loading')->name('loading');

// User Profile (Authenticated)
Route::middleware(['auth'])->group(function () {
    Route::get('/user', function () { return view('user.user'); })->name('user.dashboard');
    Route::get('/update', [ProfileController::class, 'edit'])->name('update');
    Route::post('/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/changepassword', [ProfileController::class, 'showPasswordForm'])->name('changepassword');
    Route::post('/changepassword', [ProfileController::class, 'updatePassword'])->name('password.update');
    
    // User Orders
    Route::get('/orders', [OrderController::class, 'orders'])->name('user.orders'); // Wait, I need to move this to a UserController or similar if it's user-side
    // Re-check: original was PageController@orders
});

// Cart & Checkout
Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cartadd');
    Route::get('/cart/delete/{id}', [CartController::class, 'remove'])->name('cartdelete');
    Route::get('/cart/incr/{id}', [CartController::class, 'increment'])->name('cartincr');
    Route::get('/cart/decr/{id}', [CartController::class, 'decrement'])->name('cartdecr');
    Route::get('/buy/now/{id}', [CartController::class, 'buyNow'])->name('buynow');

    Route::get('/shippinginfo', [CheckoutController::class, 'shippingForm'])->name('checkout.shipping');
    Route::post('/payment', [CheckoutController::class, 'storeShipping'])->name('shippinginfo');
    Route::get('/payment', [CheckoutController::class, 'paymentForm'])->name('checkout.payment');
    Route::post('/orderreview', [CheckoutController::class, 'storePayment'])->name('payment');
    Route::get('/orderreview', [CheckoutController::class, 'review'])->name('checkout.review');
    Route::post('/thankyou', [CheckoutController::class, 'process'])->name('orderreview');
    Route::get('/thankyou', function () { return view('cart.thankyou'); })->name('checkout.thankyou');
});

// Admin Area
Route::middleware(['isadmin'])->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Users & Admins
    Route::get('/viewusers', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/viewuser/{id}', [UserController::class, 'show'])->name('admin.users.show');
    Route::get('/deleteuser/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/viewadmins', [UserController::class, 'admins'])->name('admin.admins.index');
    Route::get('/searchusers/results', [UserController::class, 'search'])->name('searchusers');

    // Products
    Route::get('/viewproducts', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/addproducts', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/addproducts', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/addproducts/{catname}', [ProductController::class, 'findSubcategories'])->name('admin.products.subcategories');
    Route::get('/viewproductsinfo/{id}', [ProductController::class, 'show'])->name('admin.products.show');
    Route::get('/updateproducts/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::post('/updateproducts/{id}', [ProductController::class, 'update'])->name('updateproducts');
    Route::get('/deleteproducts/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

    // Campaigns
    Route::get('/viewcamproducts', [CampaignController::class, 'index'])->name('admin.campaign.index');
    Route::get('/addcamproducts', [CampaignController::class, 'create'])->name('admin.campaign.create');
    Route::post('/addcamproducts', [CampaignController::class, 'store'])->name('admin.campaign.store');
    Route::get('/viewcamproductsinfo/{id}', [CampaignController::class, 'show'])->name('admin.campaign.show');
    Route::get('/updatecamproducts/{id}', [CampaignController::class, 'edit'])->name('admin.campaign.edit');
    Route::post('/updatecamproducts/{id}', [CampaignController::class, 'update'])->name('updatecamproducts');
    Route::get('/deletecamproducts/{id}', [CampaignController::class, 'destroy'])->name('admin.campaign.destroy');

    // Categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::post('/addcategories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/deletecategories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    Route::get('/updatecategories/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::post('/updatecategories/{id}', [CategoryController::class, 'update'])->name('updatecategories');

    // SubCategories
    Route::get('/subcategories', [SubCategoryController::class, 'index'])->name('admin.subcategories.index');
    Route::get('/addsubcategories', [SubCategoryController::class, 'create'])->name('admin.subcategories.create');
    Route::post('/addsubcategories', [SubCategoryController::class, 'store'])->name('admin.subcategories.store');
    Route::get('/deletesubcategories/{id}', [SubCategoryController::class, 'destroy'])->name('admin.subcategories.destroy');
    Route::get('/updatesubcategories/{id}', [SubCategoryController::class, 'edit'])->name('admin.subcategories.edit');
    Route::post('/updatesubcategories/{id}', [SubCategoryController::class, 'update'])->name('updatesubcategories');

    // Orders
    Route::get('/pending', [OrderController::class, 'index'])->name('admin.orders.pending')->defaults('status', 'pending');
    Route::get('/processing', [OrderController::class, 'index'])->name('admin.orders.processing')->defaults('status', 'processing');
    Route::get('/picked', [OrderController::class, 'index'])->name('admin.orders.picked')->defaults('status', 'picked');
    Route::get('/delivered', [OrderController::class, 'index'])->name('admin.orders.delivered')->defaults('status', 'delivered');
    Route::get('/cancelled', [OrderController::class, 'index'])->name('admin.orders.cancelled')->defaults('status', 'cancelled');
    Route::get('/vieworder/{id}', [OrderController::class, 'show'])->name('admin.orders.show');
    Route::post('/vieworder/{id}', [OrderController::class, 'update'])->name('updateorder');
    Route::get('/track', function () { return view('admin.orders.track'); })->name('admin.orders.track');
    Route::get('/track/results', [OrderController::class, 'track'])->name('track');

    // Trash
    Route::get('/trashbox', [TrashController::class, 'index'])->name('admin.trash.index');
    Route::get('/killproducts/{id}', [TrashController::class, 'killProducts'])->name('admin.trash.kill.products');
    Route::get('/restoreproducts/{id}', [TrashController::class, 'restoreProducts'])->name('admin.trash.restore.products');
    Route::get('/killcategories/{id}', [TrashController::class, 'killCategories'])->name('admin.trash.kill.categories');
    Route::get('/restorecategories/{id}', [TrashController::class, 'restoreCategories'])->name('admin.trash.restore.categories');
    // ... other kill/restore routes can be added similarly

    // Settings
    Route::get('/settings', [SettingsController::class, 'edit'])->name('admin.settings.edit');
    Route::post('/settings', [SettingsController::class, 'update'])->name('updatesettings');
});
