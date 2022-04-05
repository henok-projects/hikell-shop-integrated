<?php

use Carbon\Carbon;
use \App\Models\Site;
use \App\Models\User;
use \App\Models\Video;
use \App\Models\Report;
use \App\Models\Payment;
use \App\Models\Category;
use \App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdolController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\TwoFAController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FunctionsController;
use App\Http\Controllers\IdolRoundController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\RemoveUsersController;
use App\Http\Controllers\EnrolledUserController;
use App\Http\Controllers\VideoPaymentController;
use App\Http\Controllers\RemoveContentController;
use App\Http\Controllers\StripeConnectController;
use App\Http\Controllers\SocialShareButtonsController;
use App\Http\Controllers\Auth\RegisteredUserController;

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\StockComponent;
use App\Http\Livewire\WishlistComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\AddStockComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\UserOrderComponent;
use App\Http\Livewire\AllProductComponent;
use App\Http\Livewire\Stocklist;
use App\Http\Livewire\EditProduct;



Route::get('/',HomeComponent::class)->middleware(['auth']);
Route::get('/shop',ShopComponent::class)->middleware(['auth']);
Route::get('/stocklist',Stocklist::class)->middleware(['auth']);
Route::get('/orders',UserOrderComponent::class)->middleware(['auth']);
Route::get('/cart',CartComponent::class)->middleware(['auth'])->name('product.cart');
Route::get('/allproduct',AllProductComponent::class)->middleware(['auth'])->name('product.allproduct');
Route::get('/checkout',CheckoutComponent::class);
Route::get('/editproduct/{slug}',EditProduct::class)->middleware(['auth'])->name('product.edit');
Route::get('/uploadtostock',AddStockComponent::class)->middleware(['auth'])->name('product.addtostock');
Route::get('/product/{slug}', DetailsComponent::class)->middleware(['auth'])->name('product.details');
Route::get('/wishlist',WishlistComponent::class)->middleware(['auth'])->name('product.wishlist');


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/connect', function () {
    return view('connect');
})->name('connect');

Route::get('/paypal', function () {
    return view('paypal');
})->name('paypal');

Route::get('users_dashboard', function () {
    return view('layouts.dashboard');
})->name('users_dashboard');
Route::get('/upload', function () {
    $categories = Category::all();
    $movieCategories = $categories->filter(function ($cat) {
        return $cat->for == "movie";
    });
    $nonmovieCategories = $categories->filter(function ($cat) {
        return $cat->for == "non-movie";
    });
    $size = "max-w-xl";
    $countries = FunctionsController::countries();
    return view('upload', compact(['movieCategories', 'nonmovieCategories', 'countries', 'size']));
})->middleware(['auth'])->name('upload');

Route::get('/upload/hgt', [VideoController::class, 'upload_hgt'])->middleware(['auth'])->name('upload.hgt');

Route::get('/enroll', function () {
    return view('enroll');
})->middleware(['auth'])->name('enroll');

Route::get('/enroll/guidelines', function () {
    return view('enroll_guidelines');
})->middleware(['auth'])->name('enroll.guides');


Route::get('/eklink', function () {
    return view('eklink');
})->middleware(['auth'])->name('eklink');


Route::get('/media', function () {
    return view('media');
});
Route::get('/applyek', function () {
    return view('apply_ek.index');
})->middleware(['auth']);

Route::post('/search', [AjaxController::class, 'search'])->name('search.videos');

Route::post('/report', [AjaxController::class, 'report_video'])->name('report');
Route::post('/video/save', [AjaxController::class, 'save_video'])->name('download.video');

Route::get('/payment-failed', function (Request $request) {
    echo $request->all();
});

Route::get('/payment', function (Request $request) {
    return view('payment');
});

Route::get('/upgrade/storage', function (Request $request) {
    return view('upgrade_storage');
})->middleware('auth');
Route::post('/upgrade/storage', function (Request $request) {
    return view('upgrade_storage');
})->middleware('auth');

Route::get('/ek/subscribe', function (Request $request) {
    return view('apply_ek.subscribe');
})->middleware('auth')->name('subscribe.ek');

Route::get('/site/subscribe', function (Request $request) {
    return view('sites.subscribe');
})->middleware('auth')->name('site.subscribe');

Route::get('/subscribe/site', function (Request $request) {
    $site = filled('origin_site') ? Site::where('site_name', request('origin-site'))->first() : null;
    return view('subscribe_site', compact('site'));
})->middleware('auth')->name('subscribe.site');


Route::get('/paid/site/{session_id}/{source}', [PaymentController::class, 'add_site']);
Route::get('/paid/ek/{session_id}/{source}', [PaymentController::class, 'add_ek']);


Route::post('/checkout-launch-site', function (Request $request) {
    if (auth()->user()->site)
        return redirect()->back()->withErrors([
            'message' => 'You already created a site. If you want to create another site for EK or to sell your videos you can use another Hikel account.'
        ]);

    \Stripe\Stripe::setApiKey(env('sk_token'));
    // The price ID passed from the front end.
    //   $priceId = $_POST['priceId'];
    $priceId = $request->priceId;
    $origin_site = $request->origin_site;

    $link = filled('origin_site') ? '?origin-site=' . $origin_site : '';

    $session = \Stripe\Checkout\Session::create([
        'success_url' => url('/paid/site/{CHECKOUT_SESSION_ID}' . $link),
        'cancel_url' => url('/payment-failed'),
        'payment_method_types' => ['card'],
        'mode' => 'subscription',
        'line_items' => [[
            'price' => $priceId,
            // For metered billing, do not pass quantity
            'quantity' => 1,
        ]],
    ]);

    if ($session) {
        // do the referals here since it was a successful payment
        // pay site owner 5% of the amount
        return redirect($session->url);
    }
    // return view('media');
});

Route::post('/checkout-ek', function (Request $request) {
    if (auth()->user()->site)
        return redirect()->back()->withErrors([
            'message' => 'You already created a site. If you want to create another site for EK you can use another Hikel account.'
        ]);

    \Stripe\Stripe::setApiKey(env('sk_token'));
    $priceId = $request->priceId;
    $origin_site = $request->origin_site;

    $link = filled('origin_site') ? '?origin-site=' . $origin_site : '';

    $session = \Stripe\Checkout\Session::create([
        'success_url' => url('/paid/ek/{CHECKOUT_SESSION_ID}/stripe' . $link),
        'cancel_url' => url('/payment-failed'),
        'payment_method_types' => ['card'],
        'mode' => 'subscription',
        'line_items' => [[
            'price' => $priceId,
            // For metered billing, do not pass quantity
            'quantity' => 1,
        ]],
    ]);

    if ($session) {
        // do the referals here since it was a successful payment
        // pay site owner 5% of the amount
        return redirect($session->url);
    }
    // return view('media');
});

Route::post('/stripe/create-customer', function (Request $request) {

    $email = $request->email;
    $name = $request->name;
    $source = $request->source;

    $stripe = new \Stripe\StripeClient(env('sk_token'));
    $customer = $stripe->customers->create([
        'name' => $name,
        'email' => $email,
    ]);

    if ($customer && $source === "connect") {
        \Stripe\Stripe::setApiKey(env('sk_token'));

        $account_id = env('connected_acc');

        // create token for customer, to connect to the account id of the connected account.
        $token = \Stripe\Token::create([
            'customer' => $customer->id
        ], [
            'stripe_account' => $account_id,
        ]);
        $customer = \Stripe\Customer::create([
            'source' => $token->id,
        ], [
            'stripe_account' => $account_id,
        ]);
    }

    if ($customer)
        return response()->json($customer);

    return response()->json(['message' => "Unable to create customer"]);
});

Route::post('/stripe/create-subscription', function (Request $request) {

    $paymentMethodId = $request->paymentMethodId;
    $customerId = $request->customerId;
    $priceId = $request->priceId;
    $source = $request->source;
    $origin_site = $request->origin_site;

    if ($source === "connect") {
        // make a connect subscription on the site owners connected account.
        // we should get connected account id from DB.
        $account_id = env('connected_acc');
        \Stripe\Stripe::setApiKey(env('sk_token'));

        $subscription = \Stripe\Subscription::create([
            "customer" => $customerId,
            "items" => [
                // we should get priceId from DB, which is generated when the site was created with sub_fee set.
                ["price" => $priceId],
            ],
            "expand" => ["latest_invoice.payment_intent"],
        ], ["stripe_account" => $account_id]);
        //   If subscription is successful, add subscriber to site subscribers list in DB.
    }

    $stripe = new \Stripe\StripeClient(env('sk_token'));

    try {
        $payment_method = $stripe->paymentMethods->retrieve(
            $paymentMethodId
        );
        $payment_method->attach([
            'customer' => $customerId,
        ]);
    } catch (Exception $e) {
        echo $e->getMessage();
        return response()->json($e);
    }


    if ($payment_method) {
        // Set the default payment method on the customer
        $stripe->customers->update($customerId, [
            'invoice_settings' => [
                'default_payment_method' => $paymentMethodId
            ]
        ]);

        // Create the subscription
        $subscription = $stripe->subscriptions->create([
            'customer' => $customerId,
            'items' => [
                [
                    'price' => $priceId,
                ],
            ],
            'expand' => ['latest_invoice.payment_intent'],
        ]);

        if ($subscription)
            return response()->json(['sub' => $subscription, 'origin_site' => $origin_site]);
        else echo $subscription;
    }

    return response()->json(['message' => "Unable to create subscription"]);
});

Route::get(
    '/watch/{video_id}',

    [HomeController::class, 'watch']
)->where('video_id', '[a-zA-Z0-9]{15}$')->middleware(['auth'])->name('watch');

/// VIDEO AJAX BUTTONS ROUTE
// 1. Reuse
Route::post('video/reuse', [AjaxController::class, 'reuse'])->name('reuse');
/// VIDEO MANAGEMENT
/// DASHBOARD
Route::get('/user/{menu?}/{content?}', [DashboardController::class, 'index'])
    ->where(['menu' => '[A-Za-z]+', 'content' => '[A-Za-z]+'])
    ->name('user');
/// PROMOTION MANAGMENT
Route::resource('/promotion',  PromotionController::class)->middleware(['auth']);
Route::post('/promotion/pay',  [PromotionController::class, 'pay'])->middleware(['auth']);
Route::post('/goldenbuzzer',  [VoteController::class, 'pay'])->middleware(['auth']); // goldenbuzzer payment confirmation
Route::post('/enroll/pay',  [EnrolledUserController::class, 'pay'])->middleware(['auth']); // enrollment payment confirmation
Route::post('/video/pay',  [VideoPaymentController::class, 'pay'])->middleware(['auth']); // video payment confirmation
Route::post('/paid/storage/upgrade',  [PaymentController::class, 'upgrade_storage'])->middleware(['auth']);



// REMOVE SITE AND ACCOUNT
Route::group(['middleware' => 'auth', 'prefix' => 'terminate', 'as' => 'terminate.'], function () {
    Route::delete('/site/{id}', [RemoveContentController::class, 'index'])->where(['id' => '[a-zA-Z0-9]+'])->name('site');
    Route::delete('/user/{id}', [RemoveUsersController::class, 'delete'])->where(['id' => '[A-Za-z0-9]+'])->name('user');
});

/// UPDATE DAHSBOARD - PASSWORD & PROFILE
Route::group(['middleware' => 'auth', 'prefix' => 'setting', 'as' => 'setting.'], function () {
    Route::put('/profile/{id}', [DashboardController::class, 'updateProfile'])->where(['id' => '[a-zA-Z0-9]+'])->name('profile');
    Route::put('/password/{id}', [DashboardController::class, 'updatePassword'])->where(['id' => '[a-zA-Z0-9]+'])->name('password');
});

/// STATIC PAGE ROUTES
Route::get('support/{menu?}', [SupportController::class, 'index'])->where(['menu' => '[A-Za-z]+'])->name('support');
Route::get('/terms', function () {
    return view('terms');
});
Route::get('/privacy', function () {
    return view('privacy');
});
Route::get('/about', function () {
    return view('about');
});

/// EBOOK MANAGEMENT and ROUTE
Route::get('/book/upload', function () {
    if (!auth()->user()->site)
        return redirect()->back();

    if (auth()->user()->site->plan->first()->plan == "basic")
        return redirect()->back();
    return view('book.upload');
})->middleware(['auth'])->name('book.upload');


Route::post('/site/book/store', [BookController::class, 'store'])->middleware(['auth'])->name('site.book.store');
Route::put('/site/{site_name}/book/update', [BookController::class, 'update'])->middleware(['auth'])->name('site.book.update');
Route::get('/site/{site_name}/book/{id}/edit', [BookController::class, 'edit'])->middleware(['auth'])->name('site.book.edit');
Route::get('/site/{site_name}/book/{id}/delete', [BookController::class, 'destroy'])->middleware(['auth'])->name('site.book.delete');
Route::get('/site/{site_name}/book/read', [BookController::class, 'bookview'])->middleware(['auth'])->name('site.book.read');

/// PODCAST MANAGMENT AND ROUTE
Route::get('/podcast/create', function () {
    if (!auth()->user()->site)
        return redirect()->back();

    if (auth()->user()->site->plan->first()->plan == "premium")
        return view('podcast.create');
})->middleware(['auth'])->name('podcast.create');
// Route::resource('/podcast',  PodcastController::class)->middleware(['auth']);
Route::post('/site/podcast/store', [PodcastController::class, 'store'])->middleware(['auth'])->name('site.podcast.store');
Route::put('/site/{site_name}/podcast/update', [PodcastController::class, 'update'])->middleware(['auth'])->name('site.podcast.update');
Route::get('/podcast/{podcast_id}/watch', [PodcastController::class, 'watch'])->where('podcast_id', '[a-zA-Z0-9]{15}$')->middleware(['auth'])->name('watch.podcast');
Route::get('/site/{site_name}/podcast/{id}/edit', [PodcastController::class, 'edit'])->middleware(['auth'])->name('site.podcast.edit');
Route::get('/site/{site_name}/podcast/{id}/delete', [PodcastController::class, 'destroy'])->middleware(['auth'])->name('site.podcast.delete');

Route::get('/balance', function () {
    $payments = Payment::where('user_id', auth()->user()->user_id)->get();
    return view('balance', compact('payments'));
})->middleware(['auth'])->name('balance');

Route::get('/settings', function () {
    return view('settings.index');
})->middleware(['auth'])->name('settings');

Route::get('/settings/password', function () {
    return view('settings.password');
})->middleware(['auth'])->name('settings.password');

// Route::post('/upload', [VideoController::class, 'store'])->middleware(['auth'])->name('upload_store');
Route::post('/hgtupload', [VideoController::class, 'submit_hgt'])->middleware(['auth'])->name('submit.hgt');

Route::post('/like', [VideoController::class, 'like'])->middleware(['auth']);
Route::post('/unlike', [VideoController::class, 'unlike'])->middleware(['auth']);
Route::post('/dislike', [VideoController::class, 'dislike'])->middleware(['auth']);
Route::post('/undislike', [VideoController::class, 'undislike'])->middleware(['auth']);
Route::post('/comment', [CommentController::class, 'store'])->middleware(['auth'])->name('add.comment');
//Route::post('/settings/general', [RegisteredUserController::class, 'update'])->middleware(['auth'])->name('general_settings');
//Route::post('/settings/password', [RegisteredUserController::class, 'update_password'])->middleware(['auth'])->name('update_password');
//Routing to Custom Site
Route::post('/site/name', [SiteController::class, 'create'])->middleware(['auth'])->name('name_site');
Route::get('/site/{site_name}/{user?}', [SiteController::class, 'show'])->middleware(['auth'])->name('show_site');
Route::get('/site/{site_name}/videos', [SiteController::class, 'videos'])->middleware(['auth'])->name('site.videos');
Route::get('/site/{site_name}/downloads', [SiteController::class, 'downloads'])->middleware(['auth'])->name('site.downloads');
// Route::get('/site/{site_name}/dashboard', [SiteController::class, 'dashboard'])->middleware(['auth'])->name('site.index');
Route::get('/site/{site_name}/reused', [SiteController::class, 'reused'])->middleware(['auth'])->name('site.reused');
Route::resource('/site', SiteController::class)->middleware(['auth']);
Route::get('/launch_site', [PlanController::class, 'launch_site'])->middleware(['auth'])->name('site.launch');
Route::post('/vote', [VideoController::class, 'vote'])->middleware(['auth']);
Route::post('/unvote', [VideoController::class, 'unvote'])->middleware(['auth']);

//admin panel route
// Route::resource('/admin_panel', AdminPanelController::class)->middleware(['auth']);

// we need 'admin' middleware group here
Route::get('/admin_panel', function () {
    return view('admin_panel.index');
})->middleware(['auth'])->name('admin_panel.index');

Route::get('/admin_panel/hgt/', [IdolController::class, 'index'])->middleware(['auth'])->name('admin_panel.hgt.index');
Route::post('/admin_panel/hgt/', [IdolController::class, 'store'])->middleware(['auth'])->name('admin_panel.hgt.store');
Route::get('/admin_panel/hgt/{idol_id}', [IdolController::class, 'show'])->middleware(['auth'])->name('admin_panel.hgt.show');
Route::post('/admin_panel/hgt/{idol_id}', [IdolRoundController::class, 'store'])->middleware(['auth'])->name('admin_panel.hgt.round.store');

Route::get('/launched_sites', function () {
    $sites = Site::where('service', 'launch-site')->leftJoin('users', 'sites.user_id', '=', 'users.user_id')
        ->get([
            'sites.site_id', 'sites.site_name', 'sites.page_title', 'sites.user_id', 'users.email',
            'users.first_name', 'users.last_name', 'users.username'
        ]);
    // echo $sites;
    return view('admin_panel.site', compact(['sites']));
})->middleware(['auth']);

Route::get('/applied_eks', function () {
    $sites = Site::where('service', 'apply-ek')->leftJoin('users', 'sites.user_id', '=', 'users.user_id')
        ->get([
            'sites.site_id', 'sites.site_name', 'sites.page_title', 'sites.user_id', 'users.email',
            'users.first_name', 'users.last_name', 'users.username'
        ]);
    // echo $sites;
    return view('admin_panel.eks', compact(['sites']));
})->middleware(['auth']);

Route::get('/all_ads', function () {
    $ads = Promotion::with('publisher');
    return view('admin_panel.ads', compact(['ads']));
})->middleware(['auth']);


Route::get('/reports',[ReportsController::class, 'index'])->middleware(['auth'])->name('admin.reports');


Route::get('/all_videos', function () {
    $videos = Video::leftJoin('categories', 'videos.category_id', '=', 'categories.id')
        ->get([
            'categories.id', 'categories.name', 'videos.video_id', 'videos.user_id',
            'videos.allow_reuse', 'videos.title', 'videos.description', 'videos.tags',
             'videos.buy_fee', 'videos.rent_fee'
        ]);
    // echo $videos;
    return view('admin_panel.video', compact(['videos']));
})->middleware(['auth']);
Route::get('/all_users', function () {
    $users = User::all();
    return view('admin_panel.user', compact(['users']));
})->middleware(['auth']);

require __DIR__ . '/auth.php';


Route::post('/video/upload', [VideoController::class, 'store'])->middleware(['auth'])->name('upload_store');
Route::get('/video/{video_id}/edit', [VideoController::class, 'edit'])->middleware(['auth'])->name('video_edit');
Route::get('/reused/{video_id}/edit', [VideoController::class, 'edit_reused'])->middleware(['auth'])->name('reused_video_edit');
//Route::post('/video/{video_id}/delete', [VideoController::class, 'destroy'])->middleware(['auth'])->name('video.delete');
Route::patch('/video/{upload}/update', [VideoController::class, 'update'])->middleware(['auth'])->name('update.video');
Route::patch('/reused/{upload}/update', [VideoController::class, 'update_reused'])->middleware(['auth'])->name('update.reused.video');

Route::post('/settings/general', [RegisteredUserController::class, 'update'])->middleware(['auth'])->name('general_settings');
Route::post('/settings/password', [RegisteredUserController::class, 'update_password'])->middleware(['auth'])->name('update_password');



Route::get('/2fa', function () {
    return view('2fa');
})->middleware(['auth'])->name('2fa');
Route::get('2fa', [TwoFAController::class, 'index'])->name('2fa.index');
Route::post('2fa', [TwoFAController::class, 'store'])->name('2fa.post');
Route::get('2fa/reset', [TwoFAController::class, 'resend'])->name('2fa.resend');

//Mesfin's Route starts from here.
Route::resource('/stripeConnect', StripeConnectController::class)->middleware(['auth']);
Route::post(
    '/request_connect',
    [StripeConnectController::class, 'requestConnect']
)
    ->middleware(['auth']);
Route::get('/form/{account_id?}', [StripeConnectController::class, "form"])->middleware(['auth'])->name("stripeConnect.form");
Route::post(
    '/create-resource',
    [StripeConnectController::class, 'createResource']
)
    ->middleware(['auth']);

Route::get('/pricing/{siteName?}', [StripeConnectController::class, "pricingList"])->middleware(['auth'])->name("stripeConnect.pricingList");
Route::get('/ek-pricing/{siteName?}', [
    StripeConnectController::class,
    "ekPricing"
])->middleware(['auth'])->name("stripeConnect.ekPricing");

Route::post(
    '/createConnectedCustomer/{caid?}/{redirect_url?}',
    [StripeConnectController::class, 'createConnectedCustomer']
)
    ->middleware(['auth']);
Route::post('/paymentIntent', [
    StripeConnectController::class,
    "stripePaymentIntent"
])->middleware(['auth'])->name("stripeConnect.paymentIntent");


Route::get(
    '/subscribe/{caid?}/{customerId?}/{priceId?}/{amount?}/{redirect_url?}/{type?}',
    [StripeConnectController::class, 'stripeSubscriptions']
)->middleware(['auth']);


Route::get(
    '/subscribe-any-service/{name?}/{amount?}/{caid?}/{redirect_url?}',
    [StripeConnectController::class, 'subscribeAnyService']
);
Route::get(
    '/subscription_pricing/{caid}/{redirect_url?}',
    [StripeConnectController::class, "videoPricingList"]
)->middleware(['auth'])->name("stripeConnect.videoSubscription");

//Route::get('/social-media-share', [SocialShareButtonsController::class, 'ShareWidget']);
//Route::get('/leaderboard', 'CardController@leaderboard');