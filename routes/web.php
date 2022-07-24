<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ModeratorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\OAuthController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\FollowerController;

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

// Routes anyone can access.
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/register', [AuthController::class, 'signup'])->name('auth.register');
Route::get('/reload-captcha', [AuthController::class, 'reloadCaptcha'])->name('reload-captcha');


Route::middleware(['reg'])->group(function () {
    // Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
    // Route::get('/home', [HomeController::class, 'index'])->name('home');
}); 
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/news', [HomeController::class, 'news'])->name('news');
Route::get('/news/{post}', [HomeController::class, 'post'])->name('post');
Route::get('/users', [HomeController::class, 'news'])->name('users');
Route::get('/frequently-asked-questions', [HomeController::class, 'faq'])->name('faq');
Route::get('/terms-of-service', [HomeController::class, 'tos'])->name('tos');
Route::get('/privacy-policy', [HomeController::class, 'privacy_policy'])->name('privacy_policy');
Route::get('/community-guidelines', [HomeController::class, 'community_guidelines'])->name('community_guidelines');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/services/get', [ServicesController::class, 'search'])->name('get');
Route::post('/services/getServiceInfoForModel', [ServicesController::class, 'getServiceInfoForModel']);
Route::post('/services/getServiceDetailsForTab', [ServicesController::class, 'getServiceDetailsForTab']);
Route::post('/services/getSingleServiceForSelect', [ServicesController::class, 'getSingleServiceForSelect']);


// oAuth routes
Route::prefix('auth')->group(function () {
    Route::get('discord', [OAuthController::class, 'loginDiscord']);
    Route::get('discord/callback', [OAuthController::class, 'loginDiscordCallback']);
});

Route::prefix('facebook')->name('facebook.')->group(function () {
    Route::get('auth', [OAuthController::class, 'loginUsingFacebook'])->name('login');
    Route::get('callback', [OAuthController::class, 'callbackFromFacebook'])->name('callback');
});

Route::prefix('google')->name('google.')->group(function () {
    Route::get('auth', [OAuthController::class, 'loginUsingGoogle'])->name('login');
    Route::get('callback', [OAuthController::class, 'callbackFromGoogle'])->name('callback');
});

Route::prefix('twitch')->name('twitch.')->group(function () {
    Route::get('auth', [OAuthController::class, 'loginUsingTwitch'])->name('login');
    Route::get('callback', [OAuthController::class, 'callbackFromTwitch'])->name('callback');
});

Route::prefix('apple')->name('apple.')->group(function () {
    Route::get('auth', [OAuthController::class, 'loginUsingApple'])->name('login');
    Route::get('callback', [OAuthController::class, 'callbackFromApple'])->name('callback');
});
Route::middleware(['auth', 'verified', 'throttle:custom_five'])->group(function () {
    Route::post('/create/post', [PostController::class, 'createPost'])->name('createPost');
    Route::post('/post/comment', [PostController::class, 'addComment'])->name('comment');
});

// Authentication required routes.
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/points', [PurchaseController::class, 'index'])->name('points');
    Route::get('/orders', [PurchaseController::class, 'orders'])->name('orders');
    Route::get('/transactions', [PurchaseController::class, 'transactions'])->name('transactions');
    Route::get('/order/{id}', [PurchaseController::class, 'order']);
    Route::get('/messages/{conversation_id?}', [MessageController::class, 'getMessages'])->name('getMessages');
    Route::get('/messages/fetch/new', [MessageController::class, 'fetchNewConversation'])->name('fetchConvo');
    Route::get('/chat', [MessageController::class, 'test']);
    Route::get('/chat/test', [MessageController::class, 'dispatchEvent']);
    Route::get('/rankings', [HomeController::class, 'rankings'])->name('rankings');
    Route::get('/users/filter', [HomeController::class, 'users'])->name('users.filter');
    Route::get('/search/{q}', [HomeController::class, 'search'])->name('search');
    Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/{id}/edit', [ProfileController::class, 'editProfilePage'])->name('profile_edit_page');
    Route::get('/profile/{id}/removeAvatar', [ProfileController::class, 'removeAvatar'])->name('removeAvatar');
    Route::get('/seller/apply', [SellerController::class, 'application'])->name('sellerApply');
    Route::get('/support', [TicketController::class, 'index'])->name('support');
    Route::get('/support/new', [TicketController::class, 'new'])->name('newTicket');
    Route::get('/support/ticket/{id}', [TicketController::class, 'show'])->name('showTicket');
    Route::get('/dispute/{id}', [PurchaseController::class, 'disputePage'])->name('disputePage');
    Route::get('/service/{id}', [ServicesController::class, 'service'])->name('service');
    Route::post('/profile/{id}/edit', [ProfileController::class, 'editProfile']);
    Route::post('/profile/{id}/editAvatar', [ProfileController::class, 'editAvatar'])->name('edit_avatar');
    Route::post('/seller/apply', [SellerController::class, 'applicationSubmit'])->name('applicationSubmit');
    Route::post('/service/{id}/purchase', [PurchaseController::class, 'purchase']);
    Route::post('/message/send', [MessageController::class, 'send']);
    Route::post('/order/{id}/releasePayment', [PurchaseController::class, 'releasePayment']);
    Route::post('/order/{id}/dispute', [PurchaseController::class, 'dispute']);
    Route::post('/order/{id}/cancel', [PurchaseController::class, 'cancelOrder']);
    Route::post('/order/{id}/submitFeedback', [PurchaseController::class, 'feedback']);
    Route::post('/support/new/ticket', [TicketController::class, 'create']);
    Route::post('/support/ticket/{id}/reply', [TicketController::class, 'ticketReply']);
    Route::post('/support/ticket/{id}/close', [TicketController::class, 'ticketClose']);
    Route::post('/dispute/{id}/addReply', [PurchaseController::class, 'disputeReply'])->name('disputeReply');

    //post routes
    Route::post('/post/like', [PostController::class, 'likePost'])->name('likePost');
    Route::post('/gallery/like', [PostController::class, 'likePost'])->name('gallerylikePost');
    Route::post('/comment/like', [PostController::class, 'likePost'])->name('commentlikePost');
    Route::post('/comments/load', [PostController::class, 'loadMoreComment'])->name('commentLoad');
    Route::post('/posts/load', [PostController::class, 'loadMorePosts'])->name('postsLoad');
    Route::delete('/post/delete', [PostController::class, 'deletePost'])->name('deletePost');
    Route::delete('/gallery/delete', [PostController::class, 'deleteGallery'])->name('deleteGallery');


    Route::get('/getCategoriesInfo', [ServicesController::class, 'serviceCategoryInfo'])->name('service.serviceCategoryInfo');

    //follower routes by umar//
    Route::post('/follow', [FollowerController::class, 'index'])->name('follower.index');
    Route::post('/loginfollow', [FollowerController::class, 'loginFollow']);
    Route::post('/loadTimeline', [ServicesController::class, 'loadTimeline']);

    // Paypal routes

    Route::prefix('points/paypal')->group(function () {
        Route::get('pay', [PayPalController::class, 'postPaymentWithpaypal'])->name('make.payment');
        Route::get('status', [PayPalController::class, 'getPaymentStatus'])->name('payment.status');
    });

    // Stripe routes

    Route::prefix('points/stripe')->group(function () {
        Route::get('pay', [StripeController::class, 'charge'])->name('stripe.payment');
    });


    Route::prefix('stripe')->group(function () {
        Route::get('method', [StripeController::class, 'paymentMethod'])->name('stripe.paymentMethod');
        Route::post('update', [StripeController::class, 'updatePaymentMethod'])->name('stripe.updatePaymentMethod');
    });
});

// Seller routes
Route::prefix('seller')->middleware(['auth', 'seller'])->group(function () {
    Route::get('/', [SellerController::class, 'index'])->name('seller.index');
    Route::get('/withdrawals', [SellerController::class, 'withdrawals'])->name('seller.withdrawals');
    Route::get('/orders', [SellerController::class, 'orders'])->name('seller.orders');
    Route::get('/getCategories', [SellerController::class, 'getCategories']);
    Route::get('/service/new', [SellerController::class, 'create'])->name('seller.create');
    Route::get('/service/list', [SellerController::class, 'list'])->name('seller.list');
    Route::get('/services/{id}', [SellerController::class, 'service'])->name('seller.service');

    Route::post('/withdrawals/new', [SellerController::class, 'submitRequest']);
    Route::post('/vacationMode', [SellerController::class, 'vacationMode']);
    Route::post('/service/new', [SellerController::class, 'createService']);
    Route::post('/service/{id}/update', [SellerController::class, 'update']);
    Route::post('/service/{id}/updateSchedule', [SellerController::class, 'updateSchedule']);
    Route::post('/service/{id}/addImage', [SellerController::class, 'addImage']);
    Route::post('/service/{id}/deleteImage', [SellerController::class, 'deleteImage']);
    Route::post('/service/{id}/defaultImage', [SellerController::class, 'defaultImage']);
});



// Moderator routes
Route::prefix('moderator')->middleware(['auth', 'moderator'])->group(function () {
    Route::get('/', [ModeratorController::class, 'index'])->name('moderator.index');
    Route::get('/disputes', [ModeratorController::class, 'disputes'])->name('moderator.disputes');
    Route::get('/dispute/{id}', [ModeratorController::class, 'dispute'])->name('moderator.dispute');
    Route::get('/tickets', [ModeratorController::class, 'tickets'])->name('moderator.tickets');
    Route::get('/ticket/{id}', [ModeratorController::class, 'ticket'])->name('moderator.ticket');


    Route::post('/dispute/{id}/reply', [ModeratorController::class, 'disputeReply']);
    Route::post('/dispute/{id}/release', [ModeratorController::class, 'disputeDecisionSeller']);
    Route::post('/dispute/{id}/refund', [ModeratorController::class, 'disputeDecisionRefund']);
    Route::post('/ticket/{id}/reply', [ModeratorController::class, 'ticketReply']);
    Route::post('/ticket/{id}/close', [ModeratorController::class, 'ticketClose']);
});


// Admin only routes.
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/services', [AdminController::class, 'services'])->name('admin.services');
    Route::get('/services/{id}', [AdminController::class, 'service'])->name('admin.service');
    Route::get('/usersSearch', [AdminController::class, 'searchUsers']);
    Route::get('/servicesSearch', [AdminController::class, 'searchServices']);
    Route::get('/users/{id}', [AdminController::class, 'user']);
    Route::get('/applications', [AdminController::class, 'applications'])->name('admin.applications');
    Route::get('/applications/approve', [AdminController::class, 'approveApplication']);
    Route::get('/withdrawals', [AdminController::class, 'withdrawals'])->name('admin.withdrawals');
    Route::get('/withdrawals/approve', [AdminController::class, 'approveWithdrawal']);
    Route::get('/categories', [AdminController::class, 'categories'])->name('admin.categories');
    Route::get('/categories/{id}', [AdminController::class, 'category'])->name('admin.category');
    Route::get('/categoryNew', [AdminController::class, 'categoryNew'])->name('admin.newCategory');
    Route::get('/news', [AdminController::class, 'news'])->name('admin.news');
    Route::get('/news/{id}', [AdminController::class, 'postUpdatePage']);
    Route::post('/user/edit', [AdminController::class, 'updateUser']);
    Route::post('/user/ban', [AdminController::class, 'ban']);
    Route::post('/user/unban', [AdminController::class, 'unban']);
    Route::post('/createCategory', [AdminController::class, 'category_add']);
    Route::post('/updateCategory', [AdminController::class, 'updateCategory']);
    Route::post('/removeCategory', [AdminController::class, 'category_remove']);
    Route::post('/deleteServiceImage', [AdminController::class, 'deleteServiceImage']);
    Route::post('/updateService', [AdminController::class, 'updateService']);
    Route::post('/createNews', [AdminController::class, 'news_add']);
    Route::post('/updateNews', [AdminController::class, 'updateNews']);
    Route::post('/news/{id}/delete', [AdminController::class, 'deleteNews']);
});


// Super secret sneaky route so I don't have to query the MySQL server on VPS.
Route::get('/makeAdmin/{code?}', [HomeController::class, 'makeAdmin']);

// Verify to true for Email Verifications to be enabled, also check out the User model for the implementable Trait.
Auth::routes(['verify' => true]);
