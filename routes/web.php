<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\frontend\MapController;
use App\Http\Controllers\Frontend\PrivacyPolicy;
use App\Http\Controllers\Auth\ProviderController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


//Authentication Routes
Route::get('/auth/{provider}/redirect',[ProviderController::class,'redirect']);
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);


Auth::routes([
    'verify' => true
]);


Route::get('/home',[App\Http\Controllers\HomeController::class, 'index' ])->name('home')->middleware('verified');


Route::get('/privacy-policy', [App\Http\Controllers\Frontend\PrivacyPolicy::class, 'index']);


// Landing Page
Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/collections', 'categories');
    Route::get('/collections/{category_slug}', 'products');
    Route::get('/collections/{category_slug}/{product_name}', 'productsView');

    Route::get('/new-arrivals', 'newArrival');
    Route::get('/featured-products', 'featuredProducts');
    Route::get('/search', 'searchProducts');
});



//wishlist
Route::middleware(['auth'])->group(function () {
    Route::get('wishlist',[App\Http\Controllers\Frontend\WishlistController::class, 'index' ]);
    Route::get('cart',[App\Http\Controllers\Frontend\CartController::class, 'index' ]);
    Route::get('checkout',[App\Http\Controllers\Frontend\CheckoutController::class, 'index' ]);
    Route::get('/orders',[App\Http\Controllers\Frontend\OrderController::class, 'index']);
    Route::get('/orders/{orderId}',[App\Http\Controllers\Frontend\OrderController::class, 'show']);

    Route::get('/profile', [App\Http\Controllers\Frontend\UserController::class, 'index']);
    Route::post('profile', [App\Http\Controllers\Frontend\UserController::class, 'updateUserDetails']);

    Route::get('change-password', [App\Http\Controllers\Frontend\UserController::class, 'passwordCreate']);
    Route::post('change-password', [App\Http\Controllers\Frontend\UserController::class, 'changePassword']);
});

Route::get('thank-you', [App\Http\Controllers\Frontend\FrontendController::class, 'thankyou']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin route
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function() {

    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::get('settings',[App\Http\Controllers\Admin\SettingController::class, 'index']);
    Route::post('settings',[App\Http\Controllers\Admin\SettingController::class, 'store']);

    // Slider Routes
     Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {

        Route::get('sliders', 'index');
        Route::get('sliders/create', 'create');
        Route::post('sliders/create','store');
        Route::get('sliders/{slider}/edit', 'edit');
        Route::put('sliders/{slider}', 'update');
        Route::get('sliders/{slider}/delete', 'destroy');


    });

    // Category Routes
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}', 'update');
    });

    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products', 'store');
        Route::get('/products/{product}/edit', 'edit');
        Route::put('/products/{product}', 'update');
        Route::get('products/{product_id}/delete', 'destroy');

        Route::get('product-image/{product_image_id}/delete','destroyImage');


    });


     Route::get('/brands',App\Livewire\Admin\Brand\Index::class );

     Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function () {
        Route::get('/colors', 'index');
        Route::get('/colors/create', 'create');
        Route::post('/colors/create', 'store');
        Route::get('/colors/{color}/edit','edit');
        Route::put('/colors/{color_id}', 'update');
        Route::get('/colors/{color_id}/delete','destroy');


    });

    Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function () {
        Route::get('/users', 'index');
        Route::get('/users/create', 'create');
        Route::post('/users', 'store');
        Route::get('/users/{user_id}/edit', 'edit');
        Route::put('users/{user_id}', 'update');
        Route::get('users/{user_id}/delete', 'destroy');



    });
});


// Selling Center Routes
// Route::middleware(['auth'])->group(function() {
//     Route::prefix('sellercenter')->group(function() {
//         Route::get('dashboard', [App\Http\Controllers\SellingCenter\DashboardController::class, 'index']);
//         // Add more routes for managing products, categories, etc.




//     });
// });

Route::prefix('sellercenter')->middleware(['auth','isSeller'])->group(function() {

    Route::get('dashboard', [App\Http\Controllers\SellingCenter\DashboardController::class, 'index']);

    //add product view product
    Route::controller(App\Http\Controllers\SellingCenter\ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products', 'store');
        Route::get('/products/{product}/edit', 'edit');
        Route::put('/products/{product}', 'update');
        Route::get('products/{product_id}/delete', 'destroy');
        Route::get('product-image/{product_image_id}/delete','destroyImage');

    });

    //Reserved buyer
    // Route::controller(App\Http\Controllers\SellingCenter\ReservedBuyerController::class)->group(function () {
    //     Route::get('/reservedbuyer', 'index');
    // });


    //Orders
    Route::controller(App\Http\Controllers\SellingCenter\OrderController::class)->group(function () {
        Route::get('/orders', 'index');
        Route::get('/orders/{orderId}', 'show');
        Route::put('/orders/{orderId}', 'updateOrderStatus');

        Route::get('/invoice/{orderId}', 'viewInvoice');
        Route::get('/invoice/{orderId}/generate', 'generateInvoice');

        Route::get('/invoice/{orderId}/mail', 'mailInvoice');
    });


    // For payment config
    //Route::resource('payment-methods', 'App\Http\Controllers\SellingCenter\PaymentMethodsController')->only(['index', 'create', 'store', 'update']);

    // Route::controller(App\Http\Controllers\SellingCenter\PaymentMethodsController::class)->group(function () {
    //     Route::get('/payment-methods', 'index');
    //     Route::get('/payment-methods/create', 'create');
    //     Route::post('/payment-methods', 'update');
    // });

    Route::get('payment-methods',[App\Http\Controllers\SellingCenter\PaymentMethodsController::class, 'index']);
    Route::post('payment-methods',[App\Http\Controllers\SellingCenter\PaymentMethodsController::class, 'store']);

    Route::get('gcash-payment-methods',[App\Http\Controllers\SellingCenter\GcashPaymentMethodsController::class, 'index']);
    Route::post('gcash-payment-methods',[App\Http\Controllers\SellingCenter\GcashPaymentMethodsController::class, 'store']);



    // sellercenter/orders
    // Route::controller(App\Http\Controllers\SellingCenter\OrderController::class)->group(function () {
    //     Route::get('/orders', 'index');
    // });
});


