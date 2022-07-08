<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Chat Broadcast Auth
Broadcast::routes(['middleware' => ['auth:sanctum']]);

// Default Routes
Route::get('/index', [App\Http\Controllers\API\AuthController::class, 'index'])->name('api');

Route::get('/check-email/{email}', [App\Http\Controllers\API\AuthController::class, 'checkEmail']);

Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);

Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);
Route::get('/login/google', [App\Http\Controllers\API\AuthController::class, 'googleLogin']);
Route::get('/login/google/callback', [App\Http\Controllers\API\AuthController::class, 'googleCallback']);

Route::post('/forgot-password', [App\Http\Controllers\API\AuthController::class, 'forgotPassword']);
Route::get('/reset-password/{token}', [App\Http\Controllers\API\AuthController::class, 'resetPassword'])
    ->name('reset-password');
Route::post('/reset-password', [App\Http\Controllers\API\AuthController::class, 'submitResetPassword']);

// Email verification
Route::get('/email/verify/{id}/{hash}', [App\Http\Controllers\API\VerificationController::class, '__invoke'])
    ->middleware(['throttle:6,1'])
    ->name('verification.verify');

// Location routes
Route::name('location')->group(function () {
    Route::get('/location/province', [App\Http\Controllers\API\Location\LocationController::class, 'getProvince'])
        ->name('.get-province');
    Route::get('/location/city', [App\Http\Controllers\API\Location\LocationController::class, 'getCity'])
        ->name('.get-city');
    Route::get('/location/district', [App\Http\Controllers\API\Location\LocationController::class, 'getDistrict'])
        ->name('.get-district');
    Route::get('/location/get-courier', [App\Http\Controllers\API\Location\LocationController::class, 'getCourier'])
        ->name('.get-courier');
});

// Product category routes
Route::name('product-category')->group(function () {
    Route::get('/product-category', [App\Http\Controllers\API\Product\ProductCategoryController::class, 'index']);
});

// Product routes
Route::get('/product/show-all', [App\Http\Controllers\API\Product\ProductController::class, 'showAll']);
Route::get('/product/show', [App\Http\Controllers\API\Product\ProductController::class, 'show']);

//Midtrans Notification
Route::post('/midtrans/payment-notification', [App\Http\Controllers\API\Midtrans\MidtransController::class, 'checkPayment']);

// Auth access routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    //run websocket
    Route::get('/sockets/serve', [App\Http\Controllers\API\Chat\ConversationsController::class, 'startSocket']);
    //Chat
    Route::get('/conversation/list/member', [App\Http\Controllers\API\Chat\ConversationsController::class, 'show_member_chat']);
    Route::get('/conversation/list/store', [App\Http\Controllers\API\Chat\ConversationsController::class, 'show_store_chat']);
    Route::post('/conversation/detail', [App\Http\Controllers\API\Chat\ConversationsController::class, 'show']);
    Route::post('/conversation/{conversation}/message', [App\Http\Controllers\API\Chat\ConversationsController::class, 'store']);

    // User routes
    Route::get('/user/my-profile', [App\Http\Controllers\API\User\ProfileController::class, 'index']);
    Route::post('/user/my-profile/store', [App\Http\Controllers\API\User\ProfileController::class, 'store']);
    Route::post('/user/change-password', [App\Http\Controllers\API\User\ProfileController::class, 'changePassword']);

    // Member routes
    Route::post('/member/check-pin', [App\Http\Controllers\API\User\ProfileController::class, 'checkPin']);
    Route::post('/member/change-pin', [App\Http\Controllers\API\User\ProfileController::class, 'changePin']);
    Route::get('/member/followed-stores', [App\Http\Controllers\API\User\ProfileController::class, 'followedStores']);
    Route::post('/member/followed-stores/update', [App\Http\Controllers\API\User\ProfileController::class, 'updateFollowedStores']);
    Route::get('/member/transaction', [App\Http\Controllers\API\Member\TransactionController::class, 'index']);
    Route::get('/member/transaction/detail/{id}', [App\Http\Controllers\API\Member\TransactionController::class, 'detail']);
    Route::post('/member/transaction/add-waybill_cost', [App\Http\Controllers\API\Member\TransactionController::class, 'addWayBillCost']);
    Route::post('/member/transaction/add-waybill_number', [App\Http\Controllers\API\Member\TransactionController::class, 'addWayBillNumber']);
    Route::post('/member/transaction/complete/{transaction}', [App\Http\Controllers\API\Member\TransactionController::class, 'completeTransaction']);

    //Notification
    Route::get('/member/notification', [App\Http\Controllers\API\User\NotificationController::class, 'getNotification']);

    //Midtrans
    Route::post('/midtrans/getToken/topup', [App\Http\Controllers\API\Midtrans\MidtransController::class, 'topUp']);
    Route::get('/midtrans/getToken/transaction/{transaction_id}', [App\Http\Controllers\API\Midtrans\MidtransController::class, 'getToken']);

    // Member address routes
    Route::get('/member/addresses', [App\Http\Controllers\API\Member\MemberAddressController::class, 'index']);
    Route::get('/member/address/{id}', [App\Http\Controllers\API\Member\MemberAddressController::class, 'show']);
    Route::post('/member/address/store', [App\Http\Controllers\API\Member\MemberAddressController::class, 'store']);
    Route::get('/member/address/delete/{id}', [App\Http\Controllers\API\Member\MemberAddressController::class, 'delete']);

    // Store routes
    Route::get('/store', [App\Http\Controllers\API\Store\StoreController::class, 'index']);
    Route::post('/store/create', [App\Http\Controllers\API\Store\StoreController::class, 'store']);
    Route::post('/store/update', [App\Http\Controllers\API\Store\StoreController::class, 'store']);
    Route::post('/store/generate-slug', [App\Http\Controllers\API\Store\StoreController::class, 'generateSlug']);
    Route::get('/store/view', [App\Http\Controllers\API\Store\StoreController::class, 'view']);
    Route::get('/store/view-products/{status}', [App\Http\Controllers\API\Store\StoreController::class, 'viewProducts']);
    Route::post('/store/update-couriers', [App\Http\Controllers\API\Store\StoreController::class, 'updateCouriers']);
    Route::get('/store/get-courier', [App\Http\Controllers\API\Location\LocationController::class, 'getMemberCourier']);

    // Product routes
    Route::post('/product/store', [App\Http\Controllers\API\Product\ProductController::class, 'store']);
    Route::get('/product/filter', [App\Http\Controllers\API\Product\ProductController::class, 'filter']);
    Route::post('/product/bid/submit', [App\Http\Controllers\API\Product\ProductController::class, 'submitBid']);

    //Wishlist
    Route::get('/product/wishlist', [App\Http\Controllers\API\Product\WishlistController::class, 'index']);
    Route::post('/product/wishlist/update', [App\Http\Controllers\API\Product\WishlistController::class, 'updateWishlist']);

    // RajaOngkir routes
    Route::get('/delivery/cost', [App\Http\Controllers\API\Location\LocationController::class, 'getCost']);

    // Setting routes
    Route::name('setting')->group(function () {
        Route::get('/setting/entity/get', [App\Http\Controllers\API\Setting\EntityController::class, 'get'])->name('.entity.get');
    });

    // Logout route
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);

    // Resend link to verify email
    Route::post('/email/verify/resend', [App\Http\Controllers\API\VerificationController::class, 'resend'])
        ->middleware(['throttle:6,1'])
        ->name('verification.send');
});
