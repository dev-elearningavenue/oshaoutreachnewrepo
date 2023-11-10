<?php



use App\Http\Controllers\AdminController;
use App\Http\Controllers\CallLogController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeedsController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StatePromotionsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;
use App\Models\Product;


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

//Route::get('/', function () {
//    $content = file_get_contents('https://oshaoutreachcourses.puresafety.com/OnDemand/Home/Training/' . 1);
//    $dom = new Dom;
//    $html = $dom->loadFromFile('https://oshaoutreachcourses.puresafety.com/OnDemand/Home/Training/' . 1);
//    $element = $html->find('dd.details-CEU');
//
//    dd(trim($html->find('dd.details-CEU')[0]->text()));
//    dd(\App\Models\User::with('orders')->limit(2)->get());
//    return view('welcome');
//});

//Route::get('/home', [HomeController::class, 'index'])->name('home');

//Auth::routes();
//
//Auth::routes([
//    'register' => false,
//    'login' => false
//]);

Route::get('/clear-cache-now',function(){
  
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    $exitCode = Artisan::call('cache:clear');
    dd($exitCode);
});

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

 

Route::get('verify-certificate', [HomeController::class, 'verifyCertificate']);

// Emptying Cache
Route::get('clear-cache', function () {
 
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
   
//    Artisan::call('optimize:clear');
////    session()->forget('bdm_id');
    Cache::flush();
//
   

    $fileName = 'orders_NOT_GI.csv';
//    $orders = Order::where('uoid', '202108160739724')->get();
    $orders = Order::where('payment_status', 1)->get();

    $headers = array(
        "Content-type" => "text/csv",
        "Content-Disposition" => "attachment; filename=$fileName",
        "Pragma" => "no-cache",
        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
        "Expires" => "0"
    );

    $columns = array('ID', 'FIRST NAME', 'LAST NAME', 'PHONE NUMBER', 'EMAIL', 'ZIP CODE', 'CITY', 'STATE', 'COUNTRY', 'TRANSACTION VALUE', 'CART ITEMS', 'ORDER DATE');

    $callback = function () use ($orders, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($orders as $order) {
            try {
                $cart = new App\Models\Cart(unserialize($order->cart));
            } catch (\Exception $ex) {
                $cart = new App\Models\Cart();
            }

            if ($cart->items !== null && !in_array(3, array_keys($cart->items))) {
                $productsInCart = '';
                foreach ($cart->items as $product) {
                    $productsInCart .= ','.$product['item']['title'];
                }

                $row['ID'] = $order->id;
                $row['FIRST NAME'] = $order->first_name;
                $row['LAST NAME'] = $order->last_name;
                $row['PHONE NUMBER'] = $order->contact_no;
                $row['EMAIL'] = $order->email;
                $row['ZIP CODE'] = $order->zip_code;
                $row['CITY'] = $order->city;
                $row['STATE'] = $order->state;
                $row['COUNTRY'] = $order->country;
                $row['TRANSACTION VALUE'] = $order->amount;
                $row['CART ITEMS'] = $productsInCart;
                $row['ORDER DATE'] = $order->created_at;

                fputcsv($file,
                    array(
                        $row['ID'], $row['FIRST NAME'], $row['LAST NAME'], $row['PHONE NUMBER'], $row['EMAIL'],
                        $row['ZIP CODE'], $row['CITY'], $row['STATE'], $row['COUNTRY'], $row['TRANSACTION VALUE'],
                        $row['CART ITEMS'], $row['ORDER DATE']
                    ));
            }

        }

        fclose($file);
    };

    return response()->stream($callback, 200, $headers);

})->middleware('auth');

//Route::get('tsms', 'HomeController@testSMS');

// WP API for Courses with Prices
Route::get('hcgrcwp', [HomeController::class, 'getRelatedCoursesWithPrice']);

/* routes exempted from bdm_middleware */
Route::get('/add-to-cart/{id}', [ProductController::class, 'getAddToCart'])->name('product.addToCart');
Route::get('/reduce/{id}', [ProductController::class, 'getReduceByOne'])->name('product.reduceByOne');
Route::get('/increase/{id}', [ProductController::class, 'getIncreaseByOne'])->name('product.increaseByOne');
Route::get('/remove/{id}', [ProductController::class, 'getRemoveItem'])->name('product.remove');
Route::get('/order-details-osha30-discount', [ProductController::class, 'courseInCart'])->name('product.osha30InCart');
Route::get('/order-details-osha10-discount', [ProductController::class, 'courseInCart'])->name('product.osha10InCart');
Route::get('/osha30-scholarship-discount', [ProductController::class, 'courseInCart'])->name('product.osha30Scholarship');
/* commented because normal and promotion carts are now merged -- begin */

/* routes to be deleted after 1st March 2022 */
Route::get('/{bdm_id}', function($bdm_id){
		return redirect("/?bdm={$bdm_id}"); }
	)->where('bdm_id', '1');
	Route::get('/group-enrollment/{bdm_id}', function($bdm_id){
		return redirect("/group-enrollment/?bdm={$bdm_id}"); }
	)->where('bdm_id', '1');
    Route::get('/group-enrollment-offer/{bdm_id}', function($bdm_id){
        return redirect("/group-enrollment-offer/?bdm={$bdm_id}"); }
    )->where('bdm_id', '1');
	Route::get('/osha-30-hour-construction/{bdm_id}', function($bdm_id){
		return redirect("/osha-30-hour-construction/?bdm={$bdm_id}"); }
	)->where('bdm_id', '1');
	Route::get('/new-york-osha-30-hour-construction/{bdm_id}', function($bdm_id){
		return redirect("/new-york-osha-30-hour-construction/?bdm={$bdm_id}"); }
	)->where('bdm_id', '1');
	Route::get('/osha-10-hour-construction/{bdm_id}', function($bdm_id){
		return redirect("/osha-10-hour-construction/?bdm={$bdm_id}"); }
	)->where('bdm_id', '1');
	Route::get('/osha-10-hour-general-industry/{bdm_id}', function($bdm_id){
		return redirect("/osha-10-hour-general-industry/?bdm={$bdm_id}"); }
	)->where('bdm_id', '1');
	Route::get('/new-york-osha-10-hour-construction/{bdm_id}', function($bdm_id){
		return redirect("/new-york-osha-10-hour-construction/?bdm={$bdm_id}"); }
	)->where('bdm_id', '1');
	Route::get('/osha-10-construction-spanish/{bdm_id}', function($bdm_id){
		return redirect("/osha-10-construction-spanish/?bdm={$bdm_id}"); }
	)->where('bdm_id', '1');
	Route::get('/new-york-osha-10-hour-general/{bdm_id}', function($bdm_id){
		return redirect("/new-york-osha-10-hour-general/?bdm={$bdm_id}"); }
	)->where('bdm_id', '1');
	Route::get('/new-york-osha-10-hour-construction-spanish/{bdm_id}', function($bdm_id){
		return redirect("/new-york-osha-10-hour-construction-spanish/?bdm={$bdm_id}"); }
	)->where('bdm_id', '1');

    Route::get('/osha-10-hour-online/{bdm_id}', function($bdm_id){
        return redirect("/osha-10-hour-online/?bdm={$bdm_id}"); }
    )->where('bdm_id', '1');

    Route::get('/osha-30-hour-online/{bdm_id}', function($bdm_id){
        return redirect("/osha-30-hour-online/?bdm={$bdm_id}"); }
    )->where('bdm_id', '1');

    /* Redirect Old Course links to new links */
    Route::get('/osha-10-equivalent-construction-international/{bdm_id}', function($bdm_id){
        return redirect("/osha-10-hour-construction/?bdm={$bdm_id}"); }
    )->where('bdm_id', '1');

    Route::get('/osha-10-equivalent-general-industry-international/{bdm_id}', function($bdm_id){
        return redirect("/osha-10-hour-general-industry/?bdm={$bdm_id}"); }
    )->where('bdm_id', '1');

    Route::get('/osha-30-equivalent-international/{bdm_id}', function($bdm_id){
        return redirect("/osha-30-hour-construction/?bdm={$bdm_id}"); }
    )->where('bdm_id', '1');

    Route::get('/osha-10-equivalent-construction-international', function(){
        return redirect("/osha-10-hour-construction"); }
    );

    Route::get('/osha-10-equivalent-general-industry-international', function(){
        return redirect("/osha-10-hour-general-industry"); }
    );

    Route::get('/osha-30-equivalent-international', function(){
        return redirect("/osha-30-hour-construction"); }
    );
    /* Redirect Old Course links to new links */

    if (env('PROMOTIONS') == true) {
        Route::get('/promotions/{bdm_id}', function($bdm_id){
            return redirect("/promotions/?bdm={$bdm_id}"); }
        )->where('bdm_id', '1');
    }
/* routes to be deleted after 1st March 2022 */



//if (env('PROMOTIONS') == true) {
//    Route::get('/promotions/enroll-now/{product}',
//        [ProductController::class, 'promotionsEnrollNow'])->name('promotions.enroll_now');
//} else {
//    Route::get('/promotions/enroll-now/{product}', [HomeController::class, 'index'])->name('promotions.enroll_now');
//}
/* commented because normal and promotion carts are now merged -- end */
/* routes exempted from bdm_middleware */

/* Add BDM Id to Non OES courses */
Route::get('/{courseSlug}/{bdm_id}', function($courseSlug, $bdm_id){

    $course = Product::where('slug', $courseSlug)->where('published', STATUS_ACTIVE)->first();

    if(empty($course)) {
        abort(404);
    }

    $slug = $course->slug;

    return redirect("/$slug/?bdm={$bdm_id}"); }
)->where('bdm_id', '1');
/* Add BDM Id to Non OES courses */

/* Admin Routes */
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'guest'], function () {
        /*Route::get('/signup', [
            'uses' => 'UserController@getSignup',
            'as' => 'user.signup'
        ]);

        Route::post('/signup', [
            'uses' => 'UserController@postSignup',
            'as' => 'user.signup'
        ]);
        */
        Route::get('/signin', [
            AdminController::class, 'getSignin',
        ])->name('admin.signin');

        Route::post('/signin', [
            AdminController::class, 'postSignin',
        ])->name('admin.signin');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/logout', function () {
            Auth::logout();

            return redirect('admin/signin');
        });
        /*Route::get('/profile', [
            'uses' => 'UserController@getProfile',
            'as' => 'user.profile'
        ]);*/
        //        Route::get('/logout', [
        //            'uses' => 'UserController@getLogout',
        //            'as' => 'user.logout'
        //        ]);
        Route::resource('coupons', CouponsController::class);
        Route::post('/offer-discount', [
            AdminController::class, 'offerDiscount',
        ])->name('admin.offer_discount');

        Route::get('/', [
            AdminController::class, 'index',
        ])->name('admin.dashboard');

        Route::get('/orders', [
            AdminController::class, 'orders',
        ])->name('admin.orders');

        Route::get('/deleted-orders', [
            AdminController::class, 'getDeletedOrders',
        ])->name('admin.get-deleted-orders')
            ->middleware('admin:admin');

        Route::get('/zero_dollar_orders', [
            AdminController::class, 'zeroDollarOrders',
        ])->name('admin.zero_dollar_orders');

        Route::get('/orders/json', [
           AdminController::class, 'getAllOrders',
        ])->name('admin.orders.json');

        Route::get('/orders/download', [
           AdminController::class, 'ordersDownload',
        ])->name('admin.orders.download');

        Route::get('/orders/download_bdm', [
            AdminController::class, 'ordersDownloadBDM',
        ])->name('admin.orders.download_bdm');

        Route::get('/orders/{uoid}/{log_type}/logs', [
            AdminController::class, 'orderLogs',
        ])->name('admin.orders.logs');

        Route::get('/orders/{uoid}/user-detail-logs', [
            AdminController::class, 'userDetailLogs',
        ])->name('admin.user_detail.logs');

        Route::get('/orders/delete/{order}', [
            AdminController::class, 'deleteOrder',
        ])->name('admin.delete-order')
            ->middleware('admin:admin');

        Route::get('/orders/restore/{order}', [
            AdminController::class, 'restoreOrder',
        ])->name('admin.restore-order')
            ->middleware('admin:admin');


        Route::get('/group-enrollments-enquiries', [
           AdminController::class, 'groupEnrollmentsEnquiries',
        ])->name('admin.group_enrollments_enquiries');

        Route::get('/group-enrollments-enquiries/download', [
            AdminController::class, 'groupEnrollmentsEnquiriesDownload',
        ])->name('admin.group_enrollments_enquiries.download');

        Route::get('/courses', [
            AdminController::class, 'courses'
        ])->name('admin.courses');

        Route::get('/courses/{course}/edit', [
            AdminController::class, 'coursesEdit'
        ])->name('admin.courses_edit');

        Route::post('/courses/{course}/update', [
            AdminController::class, 'coursesUpdate'
        ])->name('admin.courses_update');

        Route::get('/pages', [
            AdminController::class, 'pages'
        ])->name('admin.pages');

        Route::get('/pages/{page}/edit', [
            AdminController::class, 'pagesEdit',
        ])->name('admin.pages_edit');

        Route::post('/pages/{page}/update', [
            AdminController::class, 'pagesUpdate',
        ])->name('admin.pages_update');

        Route::get('/group_slabs', [
            AdminController::class, 'listGroupSlabs',
        ])->name('admin.group_slabs');

        Route::get('/group_slabs/{groupSlab}/edit', [
            AdminController::class, 'editGroupSlab',
        ])->name('admin.group_slabs_edit');

        Route::post('/group_slabs/{groupSlab}/update', [
            AdminController::class, 'updateGroupSlab',
        ])->name('admin.group_slabs_update');

        Route::get('/remove-unpaid-orders-of-paid-orders', [
            AdminController::class, 'removeUnpaidOrdersOfPaidOrders'
        ])->name('admin.remove_unpaid_orders_of_paid_orders');

        Route::get('/regenerate-sitemap', [
            AdminController::class, 'regenerateSitemap'
        ])->name('admin.regenerate_sitemap');

        Route::get('/optimize-cache-clear', [
            AdminController::class, 'optimizeCacheClear'
        ])->name('admin.optimize_cache_clear');

        Route::get('/orders/{order}', [
            AdminController::class, 'getOrderById'
        ])->name('admin.get_order_by_id');

        Route::post('/orders/{order}', [
            AdminController::class, 'updateOrderById'
        ])->name('admin.update_order_by_id');

        Route::get('/group-enquiry/{enquiry}', [
            AdminController::class, 'getEnquiryById',
        ])->name('admin.get_enquiry_by_id');

        Route::post('/group-enquiry/{enquiry}', [
            AdminController::class, 'updateEnquiryById',
        ])->name('admin.update_enquiry_by_id');

        Route::post('/orders/{order}/send-success-communitcations', [
            AdminController::class, 'sendSuccessCommunications'
        ])->name('admin.orders.send-success-communications');

        // mark order as paid
        Route::post('/orders/{order}/mark-as-paid', [
            AdminController::class, 'markOrderAsPaid'
        ])->name('admin.orders.mark-as-paid')
            ->middleware('admin:admin');

        //Upload Leeds List
        Route::post('/upload-leeds-list', [AdminController::class, 'uploadLeedsList'])
            ->name('admin.upload_leeds_list')
            ->middleware('admin:admin');

        //Image Uploads
        Route::post('/cloudinary-image-upload', [AdminController::class, 'cloudinaryImageUpload'])
            ->name('admin.cloudinary_upload')
            ->middleware('admin:admin');

        Route::post('/cloudinary-image-delete', [AdminController::class, 'deleteCloudinaryImage'])
            ->name('admin.cloudinary_delete')
            ->middleware('admin:admin');
        //Image Uploads

        // Call Logs Routes
        Route::get('/call_logs', [CallLogController::class, 'index'])->name('admin.call_logs');
        Route::post('/call_logs/store', [CallLogController::class, 'store'])->name('admin.call_logs.store');

        //Leeds List Routes
        Route::get('/leeds_list', [LeedsController::class, 'index'])->name('bdm.leeds_list');
        Route::patch('/leeds_list/{leed}', [LeedsController::class, 'update'])->name('bdm.update_leeds_list');

        // begin User Routes
        Route::group(['middleware' => 'admin'], function () {
            Route::get('/users', [UsersController::class, 'index'])->name('admin.users');
            Route::get('/users/create', [UsersController::class, 'create'])->name('admin.users.create');
            Route::get('/users/edit/{user}', [UsersController::class, 'edit'])->name('admin.users.edit');
            Route::post('/users/update/{user}', [UsersController::class, 'update'])->name('admin.users.update');
            Route::post('/users/store', [UsersController::class, 'store'])->name('admin.users.store');
        });

        Route::resource('state-promotion', StatePromotionsController::class);

        // end User Routes
    });
});
/* Admin Routes */

/* American Recruits Routes */
Route::get('/american-recruits-signup-form', [HomeController::class, 'americanRecruitsSignup'])->name('american-recruits.signup');
Route::get('/american-recruits-signup-form/email-verify', [HomeController::class, 'americanRecruitsEmailVerify'])->name('american-recruits.emailVerify');
/* American Recruits Routes */

/* bdm_middleware routes */

Route::group(['middleware' => 'bdm_param_check'], function() {
 
    Route::get('/', [ProductController::class, 'getIndex'])->name('home');
  
// Update Articles
    Route::get('update-latest-articles', function () {
        $content = json_decode(file_get_contents('https://www.oshaoutreachcourses.com/blog/wp-json/wp/v2/posts?per_page=5&_embed'));
        $posts = [];
        foreach ($content as $post) {
            $posts[] = [
                'title' => $post->title->rendered,
                'publish_date' => $post->date,
                'featured_image' => $post->featured_image_url,
                'featured_image_thumbnail' => $post->_embedded->{'wp:featuredmedia'}[0]->media_details->sizes->medium->source_url ?? $post->featured_image_url,
                'link' => $post->link,
                'excerpt' => \Illuminate\Support\Str::words(strip_tags($post->excerpt->rendered), 30, '...'),
            ];
        }

        $file = base_path('public/articles.json');
//        if(file_exists($file)) unlink($file);
//        file_put_contents($file, json_encode($posts));
        Storage::put( $file, json_encode($posts));
        dd(Storage::get( $file));
    });

    Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about-us');
    Route::get('/partner-with-us', [HomeController::class, 'partnerWithUs'])->name('partner-with-us');
    Route::get('/scholarship', [HomeController::class, 'scholarshipPage'])->name('scholarship');
    Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
    Route::get('/terms-and-conditions', [HomeController::class, 'termsAndConditions'])
        ->name('terms-and-conditions');

    Route::get('/refund-policy', [HomeController::class, 'refundPolicy'])
        ->name('refund-policy');

    Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])
        ->name('privacy-policy');

    Route::get('/group-enrollment', [HomeController::class, 'groupEnrollment'])
        ->name('group-enrollment');

    Route::get('/group-discount', [HomeController::class, 'groupDiscountManager'])
        ->name('group-discount');

    Route::get('/group-enrollment-offer', function() {  return redirect('/group-enrollment');  })
        ->name('group-enrollment-offer');

//Route::get('/group-enrollment-new', 'HomeController@groupEnrollmentNew')
//    ->name('group-enrollment-new');
    Route::post('/group-enrollment/thank-you', [HomeController::class, 'groupEnrollmentPost'])
        ->name('group-enrollment.post');

    Route::get('/group-enrollment/thank-you', [HomeController::class, 'groupEnrollmentThankyou'])
        ->name('group-enrollment.thankyou');

    Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact-us');

    Route::post('/contact-us', [HomeController::class, 'contactPost'])
        ->name('contact-us.post');

    Route::middleware('throttle:10,1')->post('/partner-with-us', [HomeController::class, 'partnerWithUsPost'])
        ->name('partner-with-us.post');

//Route::get('/thankyou', 'HomeController@thankyou')->name('thankyou');
    Route::get('/testimonials', [HomeController::class, 'testimonials'])->name('testimonials');
    Route::get('/reviews', [HomeController::class, 'reviews'])->name('reviews');

    Route::get('/osha-10-hour-online', [ProductController::class, 'osha10HourOnline'])
        ->name('osha-10-hour-online')
        ->middleware('special_discount');
    Route::get('/osha-30-hour-online', [ProductController::class, 'osha30HourOnline'])
        ->name('osha-30-hour-online')
        ->middleware('special_discount');

    Route::get('/free-study-guide-osha10-30', [HomeController::class, 'freeStudyGuide'])->name('free-study-guide-osha10-30');
    Route::get('/free-signup', [HomeController::class, 'freeSignUp'])->name('free-signup');
    Route::get('/review-us', [HomeController::class, 'reviewUs'])->name('review-us');

//Route::get('/shopping-cart', [
//    'uses' => 'ProductController@getCart',
//    'as' => 'product.shoppingCart'
//]);
    Route::get('/shopping-cart', function () {
        return redirect()->route('order.details');
    })->name('product.shoppingCart');

    Route::get('/sitemap', [HomeController::class, 'sitemap'])->name('sitemap');
//Route::get('/generate_sitemap', 'HomeController@generateSiteMap');
    Route::get('/sitemap.html', [HomeController::class, 'sitemap'])->name('sitemap.html');
//    Route::get('/sitemap.xml', [HomeController::class, 'sitemapXml'])->name('sitemap.xml');

    Route::get('/checkout', [ProductController::class, 'getCheckout'])->name('checkout');

// continue

    Route::post('/applyCoupon', [ProductController::class, 'applyCoupon'])->name('coupon.apply');

    Route::get('/removeCoupon', [ProductController::class, 'removeCoupon'])->name('coupon.remove');

    Route::post('/getCoupon', [ProductController::class, 'getCoupon'])->name('coupon.get');

    Route::get('/order-details', [ProductController::class, 'getOrderDetails'])->name('order.details');

    Route::get('/order-details-new', [
        ProductController::class, 'getOrderDetailsNew',
    ])->name('order.details.new');
    /*Route::post('/order-details', [
        'uses' => 'ProductController@postOrderDetails',
        'as' => 'order.details',
    //    'middleware' => 'auth'
    ]);*/
    /** Special Offer **/
    Route::get('/order-special-offer/{uoid}', [
        ProductController::class, 'getOrderSpecialOffer'
    ])->name('order_special-offer.details');

    Route::post('/order-details-offer', [
        ProductController::class, 'postOrderOfferComplete'
    ])->name('order_special-offer.complete');

    Route::post('/order-complete', [
        ProductController::class, 'postOrderComplete'
    ])->name('order.complete');

    Route::post('/order-ajax', [
        ProductController::class, 'postOrderAjax'
    ])->name('order.ajax');

    Route::post('/get-payment-intent', [
        ProductController::class, 'getStripePaymentIntent'
    ])->name('payment.intent');

    Route::post('/get-payment-intent-group', [
        ProductController::class, 'getStripePaymentIntentGroup'
    ])->name('payment.group_intent');

    Route::post('/special-order-ajax', [
        ProductController::class, 'postSpecialOrderAjax'
    ])->name('special.order.ajax');

    Route::post('/order-validate', [
        ProductController::class,'validateOrder'
    ])->name('order.validate');

    Route::post('/group-order-ajax', [
        ProductController::class, 'postGroupOrderAjax'
    ])->name('group_order.ajax');

    if (env('PROMOTIONS') == true) {
        Route::get('/promotions', [HomeController::class,'promotions'])
            ->name('promotions')
            ->middleware('special_discount');

        /* commented because normal and promotion cart are now merged -- begin */
//        Route::get('/promotions/checkout/', [ProductController::class, 'promotionsCheckout'])
//            ->name('promotions.checkout');
//        Route::post('/promotions-order-ajax',
//            [ProductController::class, 'postPromotionsOrderAjax'])
//            ->name('promotions.order_ajax');
//        Route::post('paypal/capture-promotions-transaction',
//            [PaypalController::class, 'capturePromotionsTransaction']);
//        Route::get('/promotions/success', [PaypalController::class, 'promotionsSuccess'])
//            ->name('promotions.success');
//        Route::get('/promotions/failure', [PaypalController::class, 'promotionsFailure'])
//            ->name('promotions.failure');
        /* commented because normal and promotion cart are now merged -- end */

    } else {
        Route::get('/promotions', [HomeController::class, 'index'])->name('promotions');

        /* commented because normal and promotion cart are now merged -- begin */
//        Route::get('/promotions/checkout/', [ProductController::class, 'promotionsCheckout'])
//            ->name('promotions.checkout');
//        Route::post('/promotions-order-ajax',
//            [ProductController::class, 'postPromotionsOrderAjax'])
//            ->name('promotions.order_ajax');
//        Route::post('paypal/capture-promotions-transaction',
//            [PaypalController::class, 'capturePromotionsTransaction']);
//        Route::get('/promotions/success', [PaypalController::class, 'promotionsSuccess'])
//            ->name('promotions.success');
//        Route::get('/promotions/failure', [PaypalController::class, 'promotionsFailure'])
//            ->name('promotions.failure');
        /* commented because normal and promotion cart are now merged -- end */
    }

    Route::post('/orders/logs', [ProductController::class, 'postOrderLog'])->name('orders.logs');

    Route::get('/success', [PaypalController::class, 'success'])->name('success');
    Route::get('/failure', [PaypalController::class, 'failure'])->name('payment.failure');

    Route::post('paypal/capture-group-transaction', [PaypalController::class, 'captureGroupTransaction']);
    Route::post('paypal/capture-group-transaction-stripe', [PaypalController::class, 'captureGroupTransactionStripe']);

    Route::get('/group-enrollment/success', [PaypalController::class, 'groupOrderSuccess'])->name('group-enrollment.success');
    Route::get('/group-enrollment/failure', [PaypalController::class, 'groupOrderFailure'])->name('group-enrollment.failure');

    Route::get('/unsubscribe-spark-post', [HomeController::class, 'unsubSparkPost'])->name('unsub-spark-post');

    Route::get('paypal/ec-checkout', [PaypalController::class, 'getExpressCheckout']);
    Route::get('paypal/ec-checkout-success',
        [PaypalController::class, 'getExpressCheckoutSuccess']);
    Route::post('paypal/capture-transaction', [PaypalController::class, 'captureTransaction']);
    Route::post('paypal/capture-transaction-stripe', [PaypalController::class, 'captureTransactionStripe']);
    Route::view('stripe/capture-redirect-payments/{id}', 'shop.redirect-payments');
    Route::get('stripe/capture-redirect-payments-group', [PaypalController::class, 'captureRedirectPaymentGroup']);

    Route::get('/lms', [HomeController::class, 'lms'])->name('lms');
    Route::post('/check_login', [HomeController::class, 'check_login']);

    Route::group(['middleware' => 'unique_event'], function () {
        Route::get('/osha-10-hour-construction', [ProductController::class, 'oshaCourseSingle'])->name('course.osha-10-hour-construction');
        Route::get('/osha-30-hour-construction', [ProductController::class, 'oshaCourseSingle'])->name('course.osha-30-hour-construction');
        Route::get('/osha-10-hour-general-industry', [ProductController::class, 'oshaCourseSingle'])->name('course.osha-10-hour-general');
        Route::get('/osha-10-construction-spanish', [ProductController::class, 'oshaCourseSingle'])->name('course.osha-10-construction-spanish');
        Route::get('/new-york-osha-10-hour-construction', [ProductController::class, 'oshaCourseSingle'])->name('course.new-york-osha-10-hour-construction');
        Route::get('/new-york-osha-30-hour-construction', [ProductController::class, 'oshaCourseSingle'])->name('course.new-york-osha-30-hour-construction');
        Route::get('/new-york-osha-10-hour-general', [ProductController::class, 'oshaCourseSingle'])->name('course.new-york-osha-10-hour-general');
        Route::get('/new-york-osha-10-hour-construction-spanish', [ProductController::class, 'oshaCourseSingle'])->name('course.new-york-osha-10-hour-construction-spanish');
        Route::get('/new-york-osha-30-hour-construction-spanish', [ProductController::class, 'oshaCourseSingle'])->name('course.new-york-osha-30-hour-construction-spanish');
        Route::get('/osha-30-hour-construction-spanish', [ProductController::class, 'oshaCourseSingle'])->name('course.osha-30-hour-construction-spanish');
    });

    Route::group(['prefix' => 'amp'], function () {
        Route::get('/', [ProductController::class, 'getIndex'])->name('amp.home');
        Route::get('/contact-us', [ProductController::class, 'getIndex'])->name('amp.contact-us');
    });


    // All Courses Page
    Route::get('/courses', [ProductController::class, 'courses'])->name('courses')->middleware('unique_event');
    //Single Course Promotion Page

    // state promotion pages
    Route::get('states-requirements/{statePromotion:slug?}/{bdm_id}', function(\App\Models\StatePromotions $statePromotion, $bdm_id){
        return redirect("/{statePromotion:slug}/?bdm={$bdm_id}"); }
    )->where('bdm_id', '1');

    Route::get('states-requirements/{statePromotion:slug?}', [HomeController::class, 'statePromotions'])
        ->name('statePromotions.single');

    Route::get('video-reviews/{videoReview:slug?}', [HomeController::class, 'videoReviews'])
        ->name('videoReviews.single');

    // Single Course Page
    Route::get('/{slug}', [ProductController::class, 'courseSingle'])->name('course.single')->middleware('unique_event');
});
/* bdm_middleware routes */


// Testing Cache
//Route::get('save-in-cache', function(){
//    Cache::forever('foo','bar');
//});
//
//Route::get('get-in-cache', function(){
//    dump(Cache::get('foo'));
//});
// Upload Courses with JSON (JSON is in public directory)
/*
Route::get('update_course', function(){
//    $courses = json_decode(file_get_contents('english_course.json'));
//    $courses = json_decode(file_get_contents('spanish_course.json'));
//
////    dd($courses);
    $counter = 0;
    foreach($courses->list as $course) {
//        $product = new App\Product();
//        $product->title = $course->Title;
//        $product->description = $course->TrainingDesc;
//        $product->price = $course->Pricing;
//        $product->slug = $course->UrlName;
//        $product->course_id = $course->TrainingID;
//        $product->language = $course->LanguageList;
        $product = App\Product::where('course_id', $course->TrainingID)->first();
        if($product) {
            $counter++;
            $product->description = $course->TrainingDesc;
            $product->save();
        }
    }
    dd($counter);
});*/


