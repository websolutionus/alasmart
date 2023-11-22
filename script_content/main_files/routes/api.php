<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomeController;

// frontend start

use App\Http\Controllers\Api\User\PaymentController;
use App\Http\Controllers\Api\User\CartController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\User\WishlistController;
use App\Http\Controllers\Api\User\WithdrawController;
use App\Http\Controllers\Admin\CountryStateController;
use App\Http\Controllers\Api\User\UserProfileController;
use App\Http\Controllers\Api\ContactWithAuthorController;
use App\Http\Controllers\Api\User\AuthorProfileController;

Route::group(['middleware' => ['demo','XSS']], function () {

Route::group(['middleware' => ['maintainance']], function () {


    Route::get('/website-setup', [HomeController::class, 'website_setup'])->name('website-setup');

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about-us');
    Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact-us');
    Route::post('/send-contact-message', [HomeController::class, 'sendContactMessage'])->name('send-contact-message');
    
    Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
    Route::get('/terms-and-conditions', [HomeController::class, 'termsAndCondition'])->name('terms-and-conditions');
    Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacy-policy');

    Route::get('/all-categories', [HomeController::class, 'all_categories'])->name('all-categories');
    Route::get('/best-sell-products', [HomeController::class, 'best_sell_products'])->name('best-sell-products');
    Route::get('/products', [HomeController::class, 'product'])->name('products');
    Route::get('/product/{slug}', [HomeController::class, 'product_detail'])->name('product-detail');
    Route::post('/product-comment', [HomeController::class, 'productComment'])->name('product-comment');
    Route::post('/product-review', [HomeController::class, 'productReview'])->name('product-review');

    Route::get('seller-profile/{slug}', [AuthorProfileController::class, 'profile'])->name('author-profile');
    Route::get('seller-portfolio/{slug}', [AuthorProfileController::class, 'portfolio'])->name('author-portfolio');
    Route::post('contact-with-author', [ContactWithAuthorController::class, 'contactWithAuthor'])->name('contact-with-author');


    //SSLCOMMERZ END
    Route::post('/store-login', [LoginController::class, 'storeLogin'])->name('store-login');
    Route::get('/register', [RegisterController::class, 'registerPage'])->name('register');
    Route::post('/store-register', [RegisterController::class, 'storeRegister'])->name('store-register');
    Route::post('/resend-register', [RegisterController::class, 'resend_register_code'])->name('resend-register');
    Route::post('/user-verification', [RegisterController::class, 'userVerification'])->name('user-verification');
    Route::post('/send-forget-password', [LoginController::class, 'sendForgetPassword'])->name('send-forget-password');

    Route::post('/store-reset-password', [LoginController::class, 'storeResetPasswordPage'])->name('store-reset-password');
    
    Route::get('/user-logout', [LoginController::class, 'userLogout'])->name('user.logout');


    //profile

    Route::get('dashboard', [UserProfileController::class, 'dashboard'])->name('dashboard');
    Route::get('my-profile', [UserProfileController::class, 'my_profile'])->name('my-profile');
    Route::get('portfolio', [UserProfileController::class, 'portfolio'])->name('portfolio');
    Route::get('download', [UserProfileController::class, 'download'])->name('download');
    Route::get('collection', [UserProfileController::class, 'collection'])->name('collection');

    Route::post('/user-product-review', [UserProfileController::class, 'productReview'])->name('user-product-review');


    Route::get('edit-profile', [UserProfileController::class, 'profileEdit'])->name('edit-profile');
    Route::post('user-update-profile', [UserProfileController::class, 'updateProfile'])->name('update-profile');
    Route::post('update-user-photo', [UserProfileController::class, 'updateUserPhoto'])->name('update-user-photo');
    Route::post('update-password', [UserProfileController::class, 'updatePassword'])->name('update-password');
    Route::get('download-script/{id}', [UserProfileController::class, 'download_script'])->name('download-script');
    Route::get('download-variant/{id}', [UserProfileController::class, 'download_variant'])->name('download-variant');

    Route::get('select-product-type', [UserProfileController::class, 'select_product_type'])->name('select-product-type');
    Route::get('product-create', [UserProfileController::class, 'product_create'])->name('product-create');
    Route::post('product-store', [UserProfileController::class, 'store'])->name('product-store');
    Route::post('store-image-type-product', [UserProfileController::class, 'store_image_type_product'])->name('store-image-type-product');
    Route::get('product-edit/{id}', [UserProfileController::class, 'edit'])->name('product-edit');
    Route::post('product-update/{id}', [UserProfileController::class, 'update'])->name('product-update');
    Route::post('image-product-update/{id}', [UserProfileController::class, 'image_product_update'])->name('image-product-update');
    Route::get('product-variant/{id}', [UserProfileController::class, 'product_variant'])->name('product-variant');

    Route::get('payment-success', [UserProfileController::class, 'payment_success'])->name('payment-success');

    Route::post('store-product-variant/{product_id}', [UserProfileController::class, 'store_product_variant'])->name('store-product-variant');

    Route::post('update-product-variant/{variant_id}', [UserProfileController::class, 'update_product_variant'])->name('update-product-variant');

    Route::delete('delete-product-variant/{variant_id}', [UserProfileController::class, 'delete_product_variant'])->name('delete-product-variant');

    Route::delete('delete-product/{id}', [UserProfileController::class, 'delete_product'])->name('delete-product');

    Route::get('download-existing-file/{file_name}', [UserProfileController::class, 'download_existing_file'])->name('download-existing-file');

    Route::get('wishlist', [WishlistController::class, 'wishlist'])->name('wishlist');
    Route::post('/add/wishlist/{product_id}', [WishlistController::class, 'add_wishlist'])->name('add-wishlist');
    Route::delete('/delete/wishlist/{id}', [WishlistController::class, 'delete_wishlist'])->name('delete-wishlist');

    //withdraw
    Route::get('/withdraw', [WithdrawController::class, 'index'])->name('withdraw');
    Route::get('/get-withdraw-account-info/{id}', [WithdrawController::class, 'getWithDrawAccountInfo']);
    Route::post('/withdraw-store', [WithdrawController::class, 'store'])->name('withdraw.store');





    // add to cart start
    Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
    Route::delete('/cart-remove/{cart_id}', [CartController::class, 'cartRemove'])->name('cart-remove');

    Route::get('/mini-cart', [CartController::class, 'miniCart'])->name('mini-cart');

    Route::get('/cart-view', [CartController::class, 'cartView'])->name('cart-view');

    Route::get('/cart-item', [CartController::class, 'cartItem'])->name('cart-item');
    Route::post('/coupon-apply', [CartController::class, 'couponApply'])->name('coupon-apply');

    Route::get('/coupon-remove', [CartController::class, 'couponRemove'])->name('coupon-remove');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    // add to cart end


    //payment start
    Route::get('/payment-info', [PaymentController::class, 'payment_info'])->name('payment-info');

    Route::post('/bank-payment', [PaymentController::class, 'bankPayment'])->name('bank-payment');

    Route::post('/pay-with-stripe', [PaymentController::class, 'payWithStripe'])->name('pay-with-stripe');
    Route::get('/payment-api/razorpay-webview', [PaymentController::class, 'razorpay_webview'])->name('razorpay-webview');

    //payment end

});

});



