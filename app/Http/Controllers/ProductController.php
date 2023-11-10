<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\GroupEnrollmentEnquiries;
use App\Http\Utilities\Arrays;
use App\Models\OrderLog;
use App\Models\SEO_Tag;
use App\Models\FAQ;
use App\Models\UserDetailLogs;
use Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use PHPHtmlParser\Dom;
use Session;
use Stripe\StripeClient;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Mail;

//use Sunra\PhpSimple\HtmlDomParser;
use Validator;
use Illuminate\Support\Facades\Cache;
use \Torann\GeoIP\Facades\GeoIP;
use App\Http\Traits\ConversionApiTrait;

class ProductController extends Controller
{
    use ConversionApiTrait;

    public function __construct(private StripeClient $stripe)
    {
    }

    /* Return web Credit value */
    private function webCredit($default = '')
    {
        return session()->get('bdm_id') ?? $default;
    }

    public function getIndex()
    {

    
        $coursesForSlider = Product::select('id', 'title', 'price', 'discounted_price', 'imagePath', 'course_id', 'slug', 'lms')
            ->where('published', STATUS_ACTIVE)
            ->where('lms', LMS_TYPE_OSHA_OUTREACH)
            ->orWhereIn('id', [9,2313,2311])
            ->get();
         
        $page = SEO_Tag::getAllTagsByPage('home');

//        $products = Product::whereIn('id', [1, 2, 3, 7])->get();
//        $promotionCourses = SEO_Tag::getPromotionCourses($page);
//        $promotionCourses = $promotionCourses->take(6);

        $faqs = FAQ::where('page_name', 'home')->get();
     

        return view('shop.index', compact( 'page', 'faqs', 'coursesForSlider'));
    }

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::where('published', 1)->find($id);
        $disallowCoupon = false;
        $specialCookie = null;

        if (!$product) {
            return redirect()->route('home');
        }

        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        if (str_contains(url()->previous(), 'osha-30-sale')) {
//            $product->discounted_price = 99;
            session(['comingFromSalePage' => 'osha-30-sale']);
            $oldCart = null;
        } else if (str_contains(url()->previous(), 'osha-10-construction-sale')) {
//            $product->discounted_price = 49;
            session(['comingFromSalePage' => 'osha-10-construction-sale']);
            $oldCart = null;
        } else if (str_contains(url()->previous(), 'osha-10-general-sale')) {
//            $product->discounted_price = 49;
            session(['comingFromSalePage' => 'osha-10-general-sale']);
            $oldCart = null;
        } else if (str_contains(url()->previous(), 'promotions') || str_contains(url()->previous(), 'osha-10-hour-online') || str_contains(url()->previous(), 'osha-30-hour-online')) {
            $specialCookie = request()->cookie('special');
            if($product->promotion_price && isset($specialCookie)) {
                $disallowCoupon = true;
                $product->discounted_price = $product->promotion_price[$specialCookie] ?? $product->promotion_price[0];
            }
            session(['comingFromSalePage' => 'promotions']);

            $oldCart = null;
        } else {
            session()->forget('comingFromSalePage');
        }

        $cart = new Cart($oldCart);

        $cart->add($product, $product->id, $disallowCoupon, $specialCookie ?? 0);

        // Offering Free Course
        /*if ($id == COURSE_OSHA_10_HOUR_CONSTRUCTION) {
            $free_product = Product::find(COURSE_FREE_INFECTION_CONTROL);
            $cart->add($free_product, $free_product->id);
        } elseif ($id == COURSE_OSHA_30_HOUR_CONSTRUCTION) {
            $free_product = Product::find(COURSE_FREE_PANDEMIC_COVID_19);
            $cart->add($free_product, $free_product->id);
        }*/

        $request->session()->put('cart', $cart);
//        return redirect()->route('product.shoppingCart');

        // When Adding a Product, Coupon Code will be applied
        /*if(empty($cart->discount)){
            return $this->couponImplementation('WEBDISCOUNT');
        }*/

        return redirect()->route('order.details');
    }

    public function courseInCart(Request $request)
    {
        $routeName = Route::currentRouteName();
        $product = null;
        $coupon = null;

        if($routeName == "product.osha30InCart") {
            $product = Product::where('published', 1)->find(2);
            $coupon = "FREEOSHA30";
        }

        if($routeName == "product.osha10InCart") {
            $product = Product::where('published', 1)->find(1);
            $coupon = "FREEOSHA10";
        }

        /* Scholarship Discount */
        if($routeName == "product.osha30Scholarship") {
            $product = Product::where('published', 1)->find(2);
            $coupon = "SCHOLARSHIP99";
        }

        if (!$product) {
            return redirect()->route('home');
        }

//        $oldCart = Session::has('cart') ? Session::get('cart') : null;
//
//        $cart = new Cart($oldCart);

        /* Reset Old Card */
        $cart = new Cart();

        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);

        // apply coupon also
        return $this->couponImplementation($coupon);

    }

    public function getReduceByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        // Decrease Free Course as well
        /*if ($id == COURSE_OSHA_10_HOUR_CONSTRUCTION) {
            $cart->reduceByOne(COURSE_FREE_INFECTION_CONTROL);
        } elseif ($id == COURSE_OSHA_30_HOUR_CONSTRUCTION) {
            $cart->reduceByOne(COURSE_FREE_PANDEMIC_COVID_19);
        }*/

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
//        return redirect()->route('product.shoppingCart');
        return redirect()->route('order.details');
    }

    public function getIncreaseByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->increaseByOne($id);

        // Increase Free Course as well
        /*if ($id == COURSE_OSHA_10_HOUR_CONSTRUCTION) {
            $cart->increaseByOne(COURSE_FREE_INFECTION_CONTROL);
        } elseif ($id == COURSE_OSHA_30_HOUR_CONSTRUCTION) {
            $cart->increaseByOne(COURSE_FREE_PANDEMIC_COVID_19);
        }*/

        Session::put('cart', $cart);

//        return redirect()->route('product.shoppingCart');
        return redirect()->route('order.details');
    }

    public function getRemoveItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

//        return redirect()->route('product.shoppingCart');
        return redirect()->route('order.details');
    }

    public function getCart()
    {
//        if (!Session::has('cart')) {
//            return view('shop.shopping-cart');
//        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
//        dd($cart);
        return view('shop.shopping-cart', compact('cart'));
    }

    public function getCoupon(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required'
        ]);

        try {
            $coupon = Coupon::query()
                ->select('code', 'type', 'amount', 'bdm')
                ->where('code', $request->coupon_code)
                ->where('status', STATUS_ACTIVE)->first();

            return response()->json(['coupon' => $coupon]);
        } catch(\Exception $e) {
            return response()->json(['message' => "Something went wrong"], 500);
        }
    }


    public function applyCoupon(Request $request)
    {
        return $this->couponImplementation($request->coupon_code);
    }

    public function removeCoupon(Request $request)
    {
        return $this->couponImplementation();
    }

    protected function couponImplementation($coupon_code = false)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $response = false;
        if ($coupon_code && !$cart->disallowCoupon) {
            $response = $cart->applyCoupon($coupon_code);
        } else {
            $response = $cart->removeCoupon();
        }
        Session::put('cart', $cart);


        $redirect_url = '/order-details';
        if (!$response) {
            $redirect_url .= "?coupon_error=1";
        }

        return redirect($redirect_url);
    }

    public function getOrderDetails(Request $request)
    {
//        if (!Session::has('cart')) {
//            return view('shop.shopping-cart');
//        }

        // Generating Unique Order ID (UOID)
        if (!Session::has('uoid') || (Session::has('uoid') && empty(Session::get('uoid')))) {
            $unique_order_id = \Carbon\Carbon::now()->timezone('Canada/Eastern')->format('Ymdhi') . mt_rand(1, 9) . mt_rand(1, 9) . mt_rand(1, 9);
            Session::put('uoid', $unique_order_id);
        } else {
            $unique_order_id = Session::get('uoid');
        }

//        dd(Session::get('uoid'));

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $page = SEO_Tag::getAllTagsByPage('order_details');

        //Added check for null condition
        if ($cart->items == null || count($cart->items) == 0) {
            // Prevent buyer from seeing normal header/footer
            if (session()->has('comingFromSalePage')) {
                return redirect('/'.session('comingFromSalePage'));
            }
            return view('shop.shopping-cart', compact('cart', 'page'));
        }

        // Check Coupon Error
        $coupon_error = false;
        if ($request->coupon_error) {
            $coupon_error = $request->coupon_error;
        }

        // GET FORM VALUES
        $form_fields = Session::get('form_fields');

        $faqs = FAQ::where('page_name', 'order_details')->get();

        $courses = Arrays::relatedCourses();

        $international_courses_included = true;

        // Remove Items already in Cart
        foreach ($cart->items as $item_id => $item) {
            if ($item_id <= 20) {
                $international_courses_included = false;
            }
            unset($courses[$item_id]);
        }

        $related_courses = [];
        foreach ($courses as $course_id => $course) {
            $related_courses[] = $course_id;
        }

        /* FB Conversion API */
        $unique_event_id = session('unique_event_id');

        try {
            $conversionApiUser = [
                'ip' => request()->ip(),
                'userAgent' => request()->userAgent(),
                'email' => $form_fields['email'] ?? '',
                'phone' => $form_fields['contact_no'] ?? '',
                'firstname' => $form_fields['firstName'] ?? '',
                'lastname' => $form_fields['lastName'] ?? '',
                'eventSourceURL' => url()->current(),
                'city' => $form_fields['city'] ?? '',
                'state' => $form_fields['state'] ?? '',
                'countryCode' => strtolower(array_search($form_fields['country'] ?? '', Arrays::countries())),
                'event_id' => $unique_event_id
            ];

            $conversionEvent = $this->create_conversion_event($conversionApiUser, ($cart->totalPrice - $cart->discount), 'AddToCart', $cart, 'checkout');
            $this->conversionEventsArr[] = $conversionEvent;
            $this->executeConversionEventsAsync();

        } catch (\Exception $e) {
            Log::error($e->getMessage().' '.'Error in FB Pixel AddToCart Event');
        }
        /* FB Conversion API */

        /*Free Course Qty Work;Remove when not needed*/
        $freeCourseQty = 0;
        $freeCourseGroup = false;
        foreach ($cart->items as $item) {

            // If any course Qty is Greater than 1, set $freeCourseGroup to true
            if($item['qty'] > 1 && $freeCourseGroup === false) {
                $freeCourseGroup = true;
            }

            // Increment Free Course Qty, Normal user cannot get more than 3 courses.
            if(($freeCourseGroup === false && $freeCourseQty < 2) || ($freeCourseGroup === true)) {
                $freeCourseQty += $item['qty'];
            }
        }

        // For Paypal: shop.order_details_test
        // For Stripe: shop.order_details_stripe
        return view('shop.order_details_stripe_api', ['free_course_qty' => $freeCourseQty, 'free_course_group' => $freeCourseGroup, 'total' => $cart->totalPrice, 'products' => $cart->items, 'cart' => $cart, 'uoid' => $unique_order_id, 'form_fields' => $form_fields, 'coupon_error' => $coupon_error, 'page' => $page, 'faqs' => $faqs, 'related_courses' => $related_courses, 'international_courses_included' => $international_courses_included]);
    }

    public function getOrderDetailsNew(Request $request)
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }

        // Generating Unique Order ID (UOID)
        if (!Session::has('uoid')) {
            $unique_order_id = \Carbon\Carbon::now()->timezone('Canada/Eastern')->format('Ymdhi') . mt_rand(1, 9) . mt_rand(1, 9) . mt_rand(1, 9);
            Session::put('uoid', $unique_order_id);
        } else {
            $unique_order_id = Session::get('uoid');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        if (count($cart->items) == 0) {
            return view('shop.shopping-cart', compact('cart'));
        }

        // Check Coupon Error
        $coupon_error = false;
        if ($request->coupon_error) {
            $coupon_error = $request->coupon_error;
        }

        // GET FORM VALUES
        $form_fields = SESSION::get('form_fields');

        $page = SEO_Tag::getAllTagsByPage('order_details');

        $faqs = FAQ::where('page_name', 'order_details')->get();

        $courses = Arrays::relatedCourses();

        $international_courses_included = true;

        // Remove Items already in Cart
        foreach ($cart->items as $item_id => $item) {
            if ($item_id <= 20) {
                $international_courses_included = false;
            }
            unset($courses[$item_id]);
        }

        $related_courses = [];
        foreach ($courses as $course_id => $course) {
            $related_courses[] = $course_id;
        }

        return view('shop.order_details', ['total' => $cart->totalPrice, 'products' => $cart->items, 'cart' => $cart, 'uoid' => $unique_order_id, 'form_fields' => $form_fields, 'coupon_error' => $coupon_error, 'page' => $page, 'faqs' => $faqs, 'related_courses' => $related_courses, 'international_courses_included' => $international_courses_included]);
    }

    public function getOrderSpecialOffer($uoid)
    {
        $order = Order::where('uoid', $uoid)->first();

        if(!$order) {
            abort(404);
        }

        $orderCart = clone unserialize($order->cart);

        /* Rebuild cart with new prices */
        $cartItems = $orderCart->items;

        $newCart = new Cart();

        foreach ($cartItems as $productId => $cartItem) {
            $product = Product::query()
                ->where('published', 1)
                ->select('id', 'title', 'slug', 'price', 'discounted_price', 'course_id', 'language')
                ->find($productId);

            if(!$product) {
                continue;
            }

            $newCart->addForReminder($product, $productId, $cartItem['qty']);
        }
        if($orderCart->coupon instanceof Coupon && $newCart->items) {
            $couponCode = $orderCart->coupon->code;
            $newCart->applyCoupon($couponCode);
        }
        /* Rebuild cart with new prices */

        session()->put('cart', $newCart);
        session()->put('uoid', $order->uoid);

        $form_fields = [
            'first_name' => $order->first_name,
            'last_name' => $order->last_name,
            'email' => $order->email,
            'contact_no' => $order->contact_no,
            'password' => $order->password,
            'password_confirmation' => $order->password_confirmation,
            'address' => $order->address,
            'zip_code' => $order->zip_code,
            'state' => $order->state,
            'city' => $order->city,
            'country' => $order->country,
            'course_for' => $order->course_for,
            'terms_conditions' => $order->terms_conditions,
            'client_of' => $order->client_of
        ];

        session()->put('form_fields', $form_fields);

        return redirect()->route('order.details');
    }

    function postSpecialOrderAjax(Request $request)
    {
        $order = Order::where('uoid', $request->input('uoid'))->first();

        $order->first_name = $request->input('first_name');
        $order->last_name = $request->input('last_name');
        $order->email = $request->input('email');
        $order->contact_no = $request->input('contact_no');
        $order->password = $request->input('password');
        $order->address = $request->input('address');
        $order->zip_code = $request->input('zip_code');
        $order->state = $request->input('state');
        $order->city = $request->input('city');
        $order->country = $request->input('country');//'United States';
        $order->course_for = $request->input('course_for');

        $order->save();
        return response()->json(['web' => $this->webCredit(), 'id' => $order->id, 'uoid' => $order->uoid]);
    }

    function postOrderAjax(Request $request)
    {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        // if session is not created properly, redirect.
        if (empty(Session::get('uoid'))) {
            return 'redirect';
        }

        $order = Order::where('uoid', Session::get('uoid'))->first();

        if (empty($order)) {
            $order = new Order();
            $order->uoid = Session::get('uoid');
        }

        if($order->payment_status != 0) {
            return response()->json(['web' => $this->webCredit(), 'id' => $order->id, 'uoid' => $order->uoid]);
        }

        // Set free courses
        if($request->has('free_courses')) {
            $order->free_courses = $request->get('free_courses');
            $order->save();

            return response()->json(['free_course_saved' => true, 'web' => $this->webCredit(), 'id' => $order->id, 'uoid' => $order->uoid]);
        }

        $order->cart = serialize($cart);
        $order->first_name = $request->input('first_name');
        $order->last_name = $request->input('last_name');
        $order->email = $request->input('email');
        $order->contact_no = $request->input('contact_no');
        $order->password = $request->input('password');
        $order->address = $request->input('address');
        $order->zip_code = $request->input('zip_code');
        $order->state = $request->input('state');
        $order->city = $request->input('city');
        $order->country = $request->input('country');//'United States';
        $order->course_for = $request->input('course_for');
        $order->user_lms_id = $request->input('user_lms_id');
        $order->username = $request->input('username');
        $order->user_type = $request->input('user_type', 4);

        $order->client_of = (int) $this->webCredit('0');

        if ($cart->discount) {
            $order->amount = round($cart->totalPrice - $cart->discount, 2);
        } else {
            $order->amount = round($cart->totalPrice, 2);
        }

        /*for coupon discount*/
        if(!empty($cart->coupon)) {
            /*Subtract coupons discount*/
            $order->amount = round($order->amount - $cart->couponDiscount, 2);

            /*Check if coupon has bdm, if so add order in bdm*/
            if(isset($cart->coupon->bdm)) {
                $order->client_of = (int) $cart->coupon->bdm;
            }
        }


        $order->save();

        UserDetailLogs::create([
            'uoid' => $order->uoid,
            'order_details' => json_encode($order)
        ]);

        //check all details are saved in DB
        $fieldsToCompare = ['cart', 'first_name', 'last_name', 'email', 'contact_no', 'password', 'address', 'zip_code', 'state', 'city', 'country'];
        $freshOrder = collect($order->fresh())->only($fieldsToCompare);
        $orderCollection = collect($order)->only($fieldsToCompare);

        $differenceArray = ($freshOrder->diffAssoc($orderCollection)->toArray());

        if(!empty($differenceArray)) {
            $allDetailsSaved = false;
        }

        return response()->json(['web' => $this->webCredit(), 'id' => $order->id, 'uoid' => $order->uoid, 'allDetailsSaved' => $allDetailsSaved ?? true]);
    }

    /**
     * @throws \Stripe\Exception\ApiErrorException
     */
    private function find_or_create_customer($order)
    {
        // Find Customer with Email
        $existingCustomer = $this->stripe->customers->search([
            'query' => "email: '$order->email'",
            'limit' => 1
        ]);

        // Return existing customer if exists
        if(!empty($existingCustomer->data)) {
            return $existingCustomer->data[0];
        }

        return $this->stripe->customers->create([
            'name' => $order->first_name,
            'email' => $order->email,
            'phone' => $order->contact_no
        ]);
    }

    public function getStripePaymentIntent(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $orderUoid = $request->get('uoid', Session::get('uoid'));

            $order = Order::where('uoid', $orderUoid)->first();

            if ($order) {
                $customer = $this->find_or_create_customer($order);

                $paymentIntent = $this->stripe->paymentIntents->create([
                    'amount' => $order->amount * 100, // value in cents
                    'currency' => 'usd',
                    'payment_method_types' => ['card', 'afterpay_clearpay'],
                    'customer' => $customer->id,
                    'metadata' => [
                        'order_id' => $order->uoid,
                    ],
                ]);

                return response()->json(['clientSecret' => $paymentIntent->client_secret]);
            } else {
                return response()->json(['error' => "Order does not exist"]);
            }

        } catch (\Exception $e) {

            return response()->json(['error' => $e->getMessage()], 500);
        }

        return response()->json(['web' => $this->webCredit(), 'id' => $order->id, 'uoid' => $order->uoid, 'allDetailsSaved' => $allDetailsSaved ?? true]);
    }

    public function getStripePaymentIntentGroup(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'guoid' => "required|string"
        ]);

        try {
            $groupOrder = GroupEnrollmentEnquiries::where('guoid', $request->get('guoid'))->first();

            if ($groupOrder) {
                $customer = $this->find_or_create_customer($groupOrder);

                $paymentIntent = $this->stripe->paymentIntents->create([
                    'amount' => ($groupOrder->amount - $groupOrder->discount) * 100, // value in cents
                    'currency' => 'usd',
                    'payment_method_types' => ['card', 'afterpay_clearpay'],
                    'customer' => $customer->id,
                    'metadata' => [
                        'order_id' => $groupOrder->guoid,
                        'order_type' => "Group"
                    ],
                ]);

                return response()->json(['clientSecret' => $paymentIntent->client_secret]);
            } else {
                return response()->json(['error' => "Order does not exist"]);
            }

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }

    function postOrderComplete(Request $request)
    {

        // SET inputs in Session
        $form_fields = [];
        $form_fields['first_name'] = $request->input('first_name');
        $form_fields['last_name'] = $request->input('last_name');
        $form_fields['email'] = $request->input('email');
        $form_fields['contact_no'] = $request->input('contact_no');
        $form_fields['password'] = $request->input('password');
        $form_fields['password_confirmation'] = $request->input('password_confirmation');
        $form_fields['address'] = $request->input('address');
        $form_fields['zip_code'] = $request->input('zip_code');
        $form_fields['state'] = $request->input('state');
        $form_fields['city'] = $request->input('city');
        $form_fields['country'] = $request->input('country'); //'United States';
        $form_fields['course_for'] = $request->input('course_for');
        $form_fields['client_of'] = $this->webCredit('0');
        SESSION::put('form_fields', $form_fields);

        $this->validate($request, [
            'first_name' => array(
                'required',
                'regex:/[a-zA-Z_ ]+/',
                'min:3',
                'max:30'
            ),
            'last_name' => array(
                'required',
                'regex:/[a-zA-Z_ ]+/',
                'min:3',
                'max:30'
            ),
            'email' => 'email:rfc,filter|required',
            'contact_no' => 'required|min:10|max:15',
            'password' => 'required|min:8|max:15|confirmed|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/',
            'address' => 'required',
            'zip_code' => 'required',
            'state' => 'required',
            'city' => 'required',
//            'country' => 'required',
            'course_for' => 'required'
        ],
            [
                'password.regex' => 'Password must contains 1 number and 1 letter.'
            ]);

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $order = Order::where('uoid', Session::get('uoid'))->first();
        if (empty($order)) {
            $order = new Order();
            $order->uoid = Session::get('uoid');
        }
        $order->cart = serialize($cart);
        $order->first_name = $request->input('first_name');
        $order->last_name = $request->input('last_name');
        $order->email = $request->input('email');
        $order->contact_no = $request->input('contact_no');
        $order->password = $request->input('password');
        $order->address = $request->input('address');
        $order->zip_code = $request->input('zip_code');
        $order->state = $request->input('state');
        $order->city = $request->input('city');
        $order->country = $request->input('country');//'United States';
        $order->course_for = $request->input('course_for');
        $order->uoid = Session::get('uoid');
        if ($cart->discount) {
            $order->amount = round($cart->totalPrice - $cart->discount, 2);
        } else {
            $order->amount = round($cart->totalPrice, 2);
        }
        $order->is_completed = STATUS_ACTIVE;
        $temp_first_name = explode(' ', $order->first_name)[0];
        $temp_last_name = explode(' ', $order->last_name)[0];
        $order->username = strtolower(preg_replace('/\s+/', '.', $temp_first_name)) . '.' . strtolower(preg_replace('/\s+/', '.', $temp_last_name)) . mt_rand(11, 99);
        $order->client_of = $this->webCredit('0');
        $order->save();

        // Paypal Item Variable
        $paymentItemList = [];

        // Add Each package as an item for Paypal invoice
        foreach ($cart->items as $product) {
            $paymentItemList[] = [
                'name' => $product['item']['title'],
                'price' => number_format($product['item']['price'], 2),
                'qty' => $product['qty']
            ];
        }

        if ($cart->discount > 0) {
            // Add total discount amount for the paypal invoicing
            $paymentItemList[] = [
                'name' => 'Discount',
                'price' => number_format(-1 * $cart->discount, 2),
                'qty' => 1
            ];

            $order->coupon_code = $cart->coupon->code;
            $order->discounted_price = $cart->totalPrice - $cart->discount;
            $order->save();
        }

        if ($order->amount > 0) {
            // Setup Order Details in Session
            Session::put([
                'payment_details' => [
                    'total_amount' => round($cart->totalPrice - $cart->discount,
                        2),
                    'item_list' => $paymentItemList,
                    'success_url' => url('/success'),
                    'failure_url' => url('/failure')
                ]
            ]);

            return redirect('/paypal/ec-checkout');
        } else {
            // Change Order Status to Paid
            $order->payment_status = 1;
            $order->save();

            // Send Order Successful Email
            Mail::send('emails.order-successful', ['order' => $order, 'cart' => $cart], function ($mail) use ($order) {
                $mail->to($order->email)
                    ->to('support@oshaoutreachcourses.com')
                    ->replyTo($order->email)
                    //->bcc('saad.5690@gmail.com')
                    ->subject('Your order#' . $order->uoid . ' has been successfully placed');
            });

            $returnPage = 'success' . '?uoid=' . $order->uoid;

            // Clear all session Data
            $request->session()->flush();

            return redirect('/success' . '?uoid=' . $order->uoid);
        }
    }

    function postOrderOfferComplete(Request $request)
    {
        $this->validate($request, [
            'first_name' => array(
                'required',
                'regex:/[a-zA-Z_ ]+/',
                'min:3',
                'max:30'
            ),
            'last_name' => array(
                'required',
                'regex:/[a-zA-Z_ ]+/',
                'min:3',
                'max:30'
            ),
            'email' => 'email:rfc,filter|required',
            'contact_no' => 'required|min:10|max:15',
            'password' => 'required|min:8|max:15|confirmed|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/',
            'address' => 'required',
            'zip_code' => 'required',
            'state' => 'required',
            'city' => 'required',
//            'country' => 'required',
            'course_for' => 'required'
        ],
            [
                'password.regex' => 'Password must contains 1 number and 1 letter.'
            ]);

        $unique_order_id = \Carbon\Carbon::now()->timezone('Canada/Eastern')->format('Ymdhi') . mt_rand(1, 9) . mt_rand(1, 9) . mt_rand(1, 9);
        Session::put('uoid', $unique_order_id);

        $old_order = Order::where('uoid', $request->input('uoid'))->first();
        Session::put('old_uoid', $request->input('uoid'));

        $order = $old_order->replicate();
        $order->first_name = $request->input('first_name');
        $order->last_name = $request->input('last_name');
        $order->email = $request->input('email');
        $order->contact_no = $request->input('contact_no');
        $order->password = $request->input('password');
        $order->address = $request->input('address');
        $order->zip_code = $request->input('zip_code');
        $order->state = $request->input('state');
        $order->city = $request->input('city');
        $order->country = $request->input('country');//'United States';
        $order->course_for = $request->input('course_for');
        $order->uoid = $unique_order_id;
        $order->is_completed = STATUS_ACTIVE;
        $temp_first_name = explode(' ', $order->first_name)[0];
        $temp_last_name = explode(' ', $order->last_name)[0];
        $order->username = strtolower(preg_replace('/\s+/', '.', $temp_first_name)) . '.' . strtolower(preg_replace('/\s+/', '.', $temp_last_name)) . mt_rand(11, 99);
//        $order->client_of  = empty($this->webCredit()) ? '0': $this->webCredit();
        $order->save();

        $order->cart = unserialize($order->cart);

        //  Paypal Item Variable
        $paymentItemList = [];

        // // Add Each package as an item for Paypal invoice
        foreach ($order->cart->items as $product) {
            $paymentItemList[] = [
                'name' => $product['item']['title'],
                'price' => $product['item']['price'],
                'qty' => $product['qty']
            ];
        }

        // Add total discount amount for the paypal invoicing
        $paymentItemList[] = [
            'name' => 'Discount',
            'price' => number_format(-1 * $order->amount * $order->discount / 100, 2),
            'qty' => 1
        ];

        $discounted_price = $order->amount - $order->amount * $order->discount / 100;
        // Setup Order Details in Session
        Session::put(['payment_details' => [
            'total_amount' => number_format($discounted_price, 2),
            'item_list' => $paymentItemList,
            'success_url' => url('/success'),
            'failure_url' => url('/failure')
        ]
        ]);

        return redirect('/paypal/ec-checkout');
    }

    function validateOrder(Request $request)
    {
        // SET inputs in Session
        $form_fields = [];
        $form_fields['first_name'] = $request->input('first_name');
        $form_fields['last_name'] = $request->input('last_name');
        $form_fields['email'] = $request->input('email');
        $form_fields['contact_no'] = $request->input('contact_no');
        $form_fields['password'] = $request->input('password');
        $form_fields['password_confirmation'] = $request->input('password_confirmation');
        $form_fields['address'] = $request->input('address');
        $form_fields['zip_code'] = $request->input('zip_code');
        $form_fields['state'] = $request->input('state');
        $form_fields['city'] = $request->input('city');
        $form_fields['country'] = $request->input('country'); //'United States';
        $form_fields['course_for'] = $request->input('course_for');
        $form_fields['terms_conditions'] = $request->input('terms_conditions');
        $form_fields['client_of'] = $this->webCredit('0');
        SESSION::put('form_fields', $form_fields);


        if ($request->input('user_details') == "true") {
            $validator = Validator::make($request->all(), [
                'first_name' => array(
                    'required',
                    'regex:/[a-zA-Z_ ]+/',
                    'min:3',
                    'max:30'
                ),
                'last_name' => array(
                    'required',
                    'regex:/[a-zA-Z_ ]+/',
                    'min:3',
                    'max:30'
                ),
                'email' => 'email:rfc,filter|required',
                'contact_no' => 'required',
                'course_for' => 'required',
                'password' => 'required|min:8|max:15|confirmed|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/',
            ],
                [
                    'password.regex' => 'Password must contains 1 number and 1 letter.',
                ]
            );
        } else if ($request->input('user_details') == "false") {
            $validator = Validator::make($request->all(), [
                'address' => 'required',
                'zip_code' => 'required',
                'state' => 'required',
                'city' => 'required',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'user_details' => 'required',
            ]);
        }


        if ($validator->passes()) {
            return response()->json(['success' => 'true']);
        }
        return response()->json(['error' => $validator->errors()]);
    }

    function courses(Request $request)
    {
        $language = "";
        $keyword = "";

        $languages = [];
        $courses_with_count = \DB::table('products')
            ->select('language', \DB::raw('count(*) as courses'))
            ->where('lms', LMS_TYPE_OSHA_OUTREACH)
            ->where('published', STATUS_ACTIVE)
            ->orWhereIn('id', [9, 2311, 2313]);

        $courses = Product::where('id', '!=', 99)
            ->where('lms', LMS_TYPE_OSHA_OUTREACH)
            ->where('published', STATUS_ACTIVE)
            ->orWhereIn('id', [9, 2311, 2313]);

        if ($request->keyword) {
            $keyword = trim($request->keyword);

            if (in_array($keyword, ["b3NoYS0zMC", "b3NoYS0xMC"])) {
                abort(404);
            }

            if(strpos($keyword, " ") !== false)  {
                $courses = $courses->whereRaw("MATCH(title) AGAINST('$keyword')");

                $courses_with_count = $courses_with_count->whereRaw("MATCH(title) AGAINST('$keyword')");
            } else {
                $courses = $courses->where(function ($q) use ($keyword) {
                    $q->orWhere('title', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('search_terms', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('description', 'LIKE', '%' . $keyword . '%');
                });

                $courses_with_count = $courses_with_count->where(function ($q) use ($keyword) {
                    $q->orWhere('title', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('description', 'LIKE', '%' . $keyword . '%');
                });
            }
        } else {
            $language = "all";
        }

        if (config('app.env') == 'production') {
            // Hide OSHA 10,30 equivalent courses for US audience
            $visitor_geoip = geoip($_SERVER["REMOTE_ADDR"]);
//        dd($visitor_geoip);
            if (isset($visitor_geoip->iso_code) && $visitor_geoip->iso_code == 'US') {
                $courses = $courses->whereNotIn('id', [105, 106, 644]);
                $courses_with_count = $courses_with_count->whereNotIn('id', [105, 106, 644]);
            }
        }

        if (!isset($_GET['language'])) {
            $language = 'English';
        }
        if (!empty($request->language)) {
            $language = $request->language;
        }

        if ($language != 'all') {
            $courses = $courses->where('language', $language);
//            $courses_with_count = $courses_with_count->where('language', $language);
        }

        $courses->orderByRaw("
            CASE
                WHEN lms = 1
                    THEN 0
                ELSE id
            END
        ");

        $courses = $courses->paginate(16);

        $courses_with_count = $courses_with_count
            ->groupBy('language')
            ->orderByDesc('courses')
            ->get();
//                dd($courses_with_count);
        $total_courses = 0;
        foreach ($courses_with_count as $cc) {
            $languages[$cc->language] = $cc->language . " (" . $cc->courses . ")";
            $total_courses += $cc->courses;
        }

        $page = SEO_Tag::getAllTagsByPage('courses');

        return view('shop.courses', compact('courses', 'languages', 'language', 'keyword', 'page', 'total_courses'));
    }

    function courseSingle(Request $request, $slug)
    {
        $course = Product::where('slug', $slug)->first();
        if (empty($course)) {
            return redirect()->route('home');
        }

        /*if course is published send to course page otherwise send to homepage*/
        if($course->published === STATUS_DISABLED) {
            return redirect(route('home'));
        }

        /* FB Conversion API */
        $unique_event_id = session('unique_event_id');

        try {
            $conversionApiUser = [
                'ip' => request()->ip(),
                'userAgent' => request()->userAgent(),
                'eventSourceURL' => url()->current(),
                'event_id' => $unique_event_id
            ];

            $conversionApiPrice = $course->discounted_price > 0 ? $course->discounted_price : $course->price;
            $conversionApiCustomData = ['course_id' => $course->id];

            $conversionEvent = $this->create_conversion_event($conversionApiUser, $conversionApiPrice, 'ViewContent', $conversionApiCustomData, $course->title, 'Course');
            $this->conversionEventsArr[] = $conversionEvent;
            $this->executeConversionEventsAsync();
        } catch (\Exception $e) {
            Log::error($e->getMessage().' '.'Error in FB Pixel ViewContent Event');
        }

        /* FB Conversion API */

        $course_id = $course->course_id;

        if (Cache::has('course_' . $course_id)) {
            $course_content = Cache::get('course_' . $course_id);
        } else {
            $course_content = [];

            $course_content['title'] = $course->title;

            $course_content['slug'] = $slug;

            $course_content['id'] = $course->id;

            $course_content['training_id'] = $course_id;

            $course_content['price'] = number_format($course->price, 2);
            $course_content['discounted_price'] = number_format($course->discounted_price, 2);


            $course_content['description'] = $course->description;

            $course_content['lang'] = $course->language;

            if (preg_match("/.*osha.*/i", $course->title)) {
                $course_content['image'] = asset($course->imagePath) . ".jpg";
                $course_content['ceu'] = "";
                if (preg_match("/.*osha 10.*/i", $course->title)) {
                    $course_content['time'] = "10 hr";
                } else {
                    $course_content['time'] = "30 hr";
                }

                if($course->id === 2317) {
                    $course_content['time'] = "40 hr";
                }
            } else {
                $dom = new Dom;
                $html = $dom->loadFromFile('https://oshaoutreachcourses.puresafety.com/OnDemand/Home/Training/' . $course_id);
                $course_content['time'] = trim($html->find('dd.time')[0]->text());
                $course_content['ceu'] = trim($html->find('dd.details-CEU')[0]->text());
            }

            $course_content['lessons'] = [];

            if (!empty($course->outline)) {
                $course_content['outline'] = [];
                $course_parts = explode("###", $course->outline);
                if (substr_count($course->outline, "###") > 0) {
                    // Remove Empty Index
                    array_shift($course_parts);
                } else {
                    $course_parts = ["0<br />" . $course->outline];
                }
//                dd($course_parts);
                foreach ($course_parts as $course_part) {
                    $outlines = explode("<br />", $course_part);
                    $title = array_shift($outlines);
                    $counter = -1;
                    $course_lessons = [];
                    foreach ($outlines as $outline) {
                        if (!empty($outline)) {
                            if (strpos($outline, "===") === 0) {
                                $course_lessons[$counter]['list'][] = trim(ltrim($outline, "="));
                            } else {
                                $counter++;
                                $course_lessons[$counter] = ['title' => ltrim($outline, "="), 'list' => []];
                            }
                        }
                    }
                    $course_lessons['count'] = count($course_lessons);

                    if ($course_lessons['count'] % 2 == 1) {
                        $course_lessons['ul_1_length'] = floor($course_lessons['count'] / 2) + 1;
                        $course_lessons['ul_2_length'] = $course_lessons['ul_1_length'] + floor($course_lessons['count'] / 2);
                    } else {
                        $course_lessons['ul_1_length'] = floor($course_lessons['count'] / 2);
                        $course_lessons['ul_2_length'] = $course_lessons['ul_1_length'] + floor($course_lessons['count'] / 2);
                    }

                    $course_content['outline'][] = ['title' => $title, 'lessons' => $course_lessons];
                }
            }
//            $course_content['outline']['count'] = count($course_content['outline']);
//            dd($course_content['outline']);

            if (!empty($course->learning_objective)) {
                $learning_objectives = explode("<br />", $course->learning_objective);
                $counter = 0;
                foreach ($learning_objectives as $learning_objective) {
                    if (!empty($learning_objective)) {
                        $course_content['objective'][] = $learning_objective;
                        $counter++;
                    }
                }
                $course_content['objective']['count'] = $counter;

                if ($course_content['objective']['count'] % 2 == 1) {
                    $course_content['objective']['ul_1_length'] = floor($course_content['objective']['count'] / 2) + 1;
                    $course_content['objective']['ul_2_length'] = $course_content['objective']['ul_1_length'] + floor($course_content['objective']['count'] / 2);
                } else {
                    $course_content['objective']['ul_1_length'] = floor($course_content['objective']['count'] / 2);
                    $course_content['objective']['ul_2_length'] = $course_content['objective']['ul_1_length'] + floor($course_content['objective']['count'] / 2);
                }

            }

            $course_variants = [];
            if (!empty($course->variants)) {
                foreach (json_decode($course->variants) as $variant) {
                    $slug = Product::where('id', $variant->sku)->first()->slug;

                    $course_variants[] = [
                        "language" => ucwords($variant->language),
                        "slug" => $slug,
                        "sku" => $variant->sku
                    ];
                }
            }

            $course_content['variants'] = $course_variants;

            Cache::forever('course_' . $course_id, $course_content);
        }
//        dd($course_content);

//        $faqs = FAQ::where('page_name', $course->slug)->get();
        $faqs = FAQ::where('product_id', $course->id)->get();

        if (isset($course->related_courses) && !empty($course->related_courses)) {
            $related_courses = json_decode($course->related_courses);
        } else {
            $related_courses = [];
        }

        return view('shop.course-single', compact('course', 'course_content', 'faqs', 'related_courses'));
    }

    function oshaCourseSingle(Request $request)
    {
        $temp = $request->path();
        $slug = explode('/', $temp)[0];
        return $this->courseSingle($request, $slug);
    }

    function courseSale(Request $request)
    {
        $promotionCourseSlugArr = [
            'osha-10-construction-sale' => 'osha-10-hour-construction',
            'osha-10-general-sale' => 'osha-10-hour-general-industry',
            'osha-30-sale' => 'osha-30-hour-construction',
        ];
        $pageUrl = request()->segment(1);
        $promotionCourseSlug = $promotionCourseSlugArr[$pageUrl];

        if($promotionCourseSlug == 'osha-30-hour-construction') {
            $promotionCoursePrice = 150;
        } else {
            $promotionCoursePrice = 70;
        }


        $course = Product::where('slug', $promotionCourseSlug)->where('published', STATUS_ACTIVE)->first();

        /* FB Conversion API */
        $unique_event_id = session('unique_event_id');

        try {
            $conversionApiUser = [
                'ip' => request()->ip(),
                'userAgent' => request()->userAgent(),
                'eventSourceURL' => url()->current(),
                'event_id' => $unique_event_id
            ];

            $conversionApiPrice = $promotionCoursePrice;
            $conversionApiCustomData = ['course_id' => $course->id];

            $conversionEvent = $this->create_conversion_event($conversionApiUser, $conversionApiPrice, 'ViewContent', $conversionApiCustomData, $course->title, 'Course');
            $this->conversionEventsArr[] = $conversionEvent;
            $this->executeConversionEventsAsync();
        } catch (\Exception $e) {
            Log::error($e->getMessage().' '.'Error in FB Pixel ViewContent Event');
        }

        /* FB Conversion API */

        $course_id = $course->course_id;

        $course_content = [];

        $course_content['title'] = $course->title;
        $course_content['slug'] = $promotionCourseSlug;
        $course_content['id'] = $course->id;
        $course_content['training_id'] = $course_id;
        $course_content['price'] = number_format($course->price, 2);
        $course_content['discounted_price'] = number_format($promotionCoursePrice, 2);
        $course_content['description'] = $course->description;
        $course_content['lang'] = $course->language;

        if (preg_match("/.*osha.*/i", $course->title)) {
            $course_content['image'] = asset($course->imagePath) . ".jpg";
            $course_content['ceu'] = "";
            if (preg_match("/.*osha 10.*/i", $course->title)) {
                $course_content['time'] = "10 hr";
            } else {
                $course_content['time'] = "30 hr";
            }

            if($course->id === 2317) {
                $course_content['time'] = "40 hr";
            }
        }

        $course_content['lessons'] = [];

        if (!empty($course->learning_objective)) {
            $learning_objectives = explode("<br />", $course->learning_objective);
            $counter = 0;
            foreach ($learning_objectives as $learning_objective) {
                if (!empty($learning_objective)) {
                    $course_content['objective'][] = $learning_objective;
                    $counter++;
                }
            }
            $course_content['objective']['count'] = $counter;

            if ($course_content['objective']['count'] % 2 == 1) {
                $course_content['objective']['ul_1_length'] = floor($course_content['objective']['count'] / 2) + 1;
                $course_content['objective']['ul_2_length'] = $course_content['objective']['ul_1_length'] + floor($course_content['objective']['count'] / 2);
            } else {
                $course_content['objective']['ul_1_length'] = floor($course_content['objective']['count'] / 2);
                $course_content['objective']['ul_2_length'] = $course_content['objective']['ul_1_length'] + floor($course_content['objective']['count'] / 2);
            }

        }

        $faqs = FAQ::where('page_name', $course->slug)->get();

        return view('shop.course-single-sale', compact('course', 'course_content', 'faqs'));
    }

    function osha10and30(Request $request)
    {
        $courses = Product::query()
            ->where('lms', LMS_TYPE_OSHA_OUTREACH)
            ->where('published', STATUS_ACTIVE)
            ->get();

        $osha10 = [];
        $osha30 = [];
        $bundle = [];

        foreach ($courses as $course) {
            if(preg_match("/.*10 & 30.*/i", $course->title)) {
                $bundle[] = $course;
            }
            else if(preg_match("/.*osha 10.*/i", $course->title)) {
                $osha10[] = $course;
            } else if(preg_match("/.*osha 30.*/i", $course->title)) {
                $osha30[] = $course;
            }
        }

        $page = SEO_Tag::getAllTagsByPage('osha_10_and_30');

        return view('shop.osha-10-and-30', compact('courses', 'page', 'osha10', 'osha30', 'bundle'));
    }

    function osha10HourOnline(Request $request)
    {
        $courses = Product::query()
            ->where('lms', LMS_TYPE_OSHA_OUTREACH)
            ->where('published', STATUS_ACTIVE)
            ->where('duration', 10)
            ->orWhereIn('id', [9,2313])
            ->get();
		
        $faqs = FAQ::where('page_name', 'osha-10-hour-online')->get();

        $page = SEO_Tag::getAllTagsByPage('osha_10_hour_online');

        return view('shop.osha-10', compact('courses', 'page', 'faqs'));
    }

    function osha30HourOnline(Request $request)
    {
        $courses = Product::query()
            ->where('lms', LMS_TYPE_OSHA_OUTREACH)
            ->where('published', STATUS_ACTIVE)
            ->where('duration', 30)
            ->orWhere('id', 2311)
            ->get();

        $faqs = FAQ::where('page_name', 'osha-30-hour-online')->get();

        $page = SEO_Tag::getAllTagsByPage('osha_30_hour_online');

        return view('shop.osha-30', compact('courses', 'page', 'faqs'));
    }

    function postGroupOrderAjax(Request $request)
    {
        try {
            $fromGroupDiscountPage = $request->get('from');
            // if session is not created properly, redirect.
            if (empty($request->get('guoid'))) {
                return 'refresh';
            }

            $group_order = GroupEnrollmentEnquiries::where('guoid', $request->get('guoid'))->first();

            if (empty($group_order)) {
                $group_order = new GroupEnrollmentEnquiries();
                $group_order->guoid = $request->get('guoid');
            }

            /* OSHA 10 */
            $osha_10_construction_qty = (int)$request->get('osha_10_construction_qty');
            $osha_10_general_qty = (int)$request->get('osha_10_general_qty');
            $osha_10_construction_sp_qty = (int)$request->get('osha_10_construction_sp_qty');
            $osha_10_general_sp_qty = (int)$request->get('osha_10_general_sp_qty');
            $ny_osha_10_general_sp_qty = (int)$request->get('ny_osha_10_general_sp_qty');
            $ny_osha_10_construction_qty = (int)$request->get('ny_osha_10_construction_qty');
            $ny_osha_10_general_qty = (int)$request->get('ny_osha_10_general_qty');
            $ny_osha_10_construction_sp_qty = (int)$request->get('ny_osha_10_construction_sp_qty');

            /* OSHA 30 */
            $osha_30_construction_qty = (int)$request->get('osha_30_construction_qty');
            $osha_30_general_qty = (int)$request->get('osha_30_general_qty');
            $osha_30_construction_sp_qty = (int)$request->get('osha_30_construction_sp_qty');
            $osha_30_general_sp_qty = (int)$request->get('osha_30_general_sp_qty');
            $ny_osha_30_construction_qty = (int)$request->get('ny_osha_30_construction_qty');
            $ny_osha_30_general_qty = (int)$request->get('ny_osha_30_general_qty');
            $ny_osha_30_construction_sp_qty = (int)$request->get('ny_osha_30_construction_sp_qty');

            /* Bundle */
            $osha_10_30_construction_qty = (int)$request->get('osha_10_30_construction_qty');

            /* Coupon Code */
            $applyAddedDiscount = $request->get('applyDiscount');

            $osha_10_qty = 0;
            if ($osha_10_construction_qty >= 1) {
                $osha_10_qty += $osha_10_construction_qty;
            }
            if ($osha_10_general_qty >= 1) {
                $osha_10_qty += $osha_10_general_qty;
            }
            if ($osha_10_construction_sp_qty >= 1) {
                $osha_10_qty += $osha_10_construction_sp_qty;
            }
            if ($osha_10_general_sp_qty >= 1) {
                $osha_10_qty += $osha_10_general_sp_qty;
            }
            if ($ny_osha_10_general_sp_qty >= 1) {
                $osha_10_qty += $ny_osha_10_general_sp_qty;
            }
            if ($ny_osha_10_construction_qty >= 1) {
                $osha_10_qty += $ny_osha_10_construction_qty;
            }
            if ($ny_osha_10_general_qty >= 1) {
                $osha_10_qty += $ny_osha_10_general_qty;
            }
            if ($ny_osha_10_construction_sp_qty >= 1) {
                $osha_10_qty += $ny_osha_10_construction_sp_qty;
            }

            $osha_30_qty = 0;
            if ($osha_30_construction_qty >= 1) {
                $osha_30_qty += $osha_30_construction_qty;
            }
            if ($osha_30_general_qty >= 1) {
                $osha_30_qty += $osha_30_general_qty;
            }
            if ($osha_30_construction_sp_qty >= 1) {
                $osha_30_qty += $osha_30_construction_sp_qty;
            }
            if ($osha_30_general_sp_qty >= 1) {
                $osha_30_qty += $osha_30_general_sp_qty;
            }
            if ($ny_osha_30_construction_qty >= 1) {
                $osha_30_qty += $ny_osha_30_construction_qty;
            }
            if ($ny_osha_30_general_qty >= 1) {
                $osha_30_qty += $ny_osha_30_general_qty;
            }
            if ($ny_osha_30_construction_sp_qty >= 1) {
                $osha_30_qty += $ny_osha_30_construction_sp_qty;
            }

            $bundle_qty = 0;
            if ($osha_10_30_construction_qty >= 1) {
                $bundle_qty += $osha_10_30_construction_qty;
            }

            /*Commented min 2 condition*/
            /*if(($osha_10_qty + $osha_30_qty) < 2) {
                return response()->json(['message' => "You can purchase a minimum of 2 courses"], 422);
            }*/

            /* OSHA 10 Discounts */
            define('OSHA_10_ORIGINAL_PRICE', 89.00);
            $osha_10_price = 70.00;

            if ($osha_10_qty > 1 && $osha_10_qty <= 5) {
                $osha_10_price = 60.00;
            } else if ($osha_10_qty > 5 && $osha_10_qty <= 15) {
                $osha_10_price = 55.00;
            } else if ($osha_10_qty > 15) {
                $osha_10_price = 50.00;
            }

            /* OSHA 30 Discounts */
            define('OSHA_30_ORIGINAL_PRICE', 189.00);
            $osha_30_price = 150.00;

            if ($osha_30_qty > 1 && $osha_30_qty <= 5) {
                $osha_30_price = 140.00;
            } else if ($osha_30_qty > 5 && $osha_30_qty <= 15) {
                $osha_30_price = 135.00;
            } else if ($osha_30_qty > 15) {
                $osha_30_price = 130.00;
            }

            /* Bundle 10 & 30 Discounts */
            define('BUNDLE_ORIGINAL_PRICE', 249.00);
            $bundle_price = 200.00;

            if ($bundle_qty > 1 && $bundle_qty <= 5) {
                $bundle_price = 190.00;
            } else if ($bundle_qty > 5 && $bundle_qty <= 15) {
                $bundle_price = 180.00;
            } else if ($bundle_qty > 15) {
                $bundle_price = 170.00;
            }

            if($fromGroupDiscountPage) {
                $osha_10_price = 55.00;
                $osha_30_price = 99.00;
                $bundle_price = 180.00;
            }


            $cart = [
                'items' => [],
                'coupon' => null,
                'couponDiscount' => 0
            ];

            $total_discount = 0;
            $total_amount = 0;

            /*OSHA 10*/
            if ($osha_10_construction_qty >= 1) {
                $total = OSHA_10_ORIGINAL_PRICE * $osha_10_construction_qty;
                $subtotal = $osha_10_price * $osha_10_construction_qty;
                $discount = $total - $subtotal;
                $total_discount += $discount;
                $total_amount += $total;

                $cart['items'][] = [
                    'title' => 'OSHA 10 Hour Construction',
                    'price' => $osha_10_price,
                    'subtotal' => round($subtotal, 2),
                    'quantity' => $osha_10_construction_qty,
                    'discount' => $discount,
                    'original_price' => OSHA_10_ORIGINAL_PRICE,
                    'id' => 1
                ];
            }
            if ($osha_10_general_qty >= 1) {
                $total = OSHA_10_ORIGINAL_PRICE * $osha_10_general_qty;
                $subtotal = $osha_10_price * $osha_10_general_qty;
                $discount = $total - $subtotal;
                $total_discount += $discount;
                $total_amount += $total;

                $cart['items'][] = [
                    'title' => 'OSHA 10 Hour General Industry',
                    'price' => $osha_10_price,
                    'subtotal' => round($subtotal, 2),
                    'quantity' => $osha_10_general_qty,
                    'discount' => $discount,
                    'original_price' => OSHA_10_ORIGINAL_PRICE,
                    'id' => 3
                ];
            }
            if ($osha_10_construction_sp_qty >= 1) {
                $total = OSHA_10_ORIGINAL_PRICE * $osha_10_construction_sp_qty;
                $subtotal = $osha_10_price * $osha_10_construction_sp_qty;
                $discount = $total - $subtotal;
                $total_discount += $discount;
                $total_amount += $total;

                $cart['items'][] = [
                    'title' => 'OSHA 10 Hour Construction Spanish',
                    'price' => $osha_10_price,
                    'subtotal' => round($subtotal, 2),
                    'quantity' => $osha_10_construction_sp_qty,
                    'discount' => $discount,
                    'original_price' => OSHA_10_ORIGINAL_PRICE,
                    'id' => 7
                ];
            }
            if ($osha_10_general_sp_qty >= 1) {
                $total = OSHA_10_ORIGINAL_PRICE * $osha_10_general_sp_qty;
                $subtotal = $osha_10_price * $osha_10_general_sp_qty;
                $discount = $total - $subtotal;
                $total_discount += $discount;
                $total_amount += $total;

                $cart['items'][] = [
                    'title' => 'OSHA 10 Hour General Industry Spanish',
                    'price' => $osha_10_price,
                    'subtotal' => round($subtotal, 2),
                    'quantity' => $osha_10_general_sp_qty,
                    'discount' => $discount,
                    'original_price' => OSHA_10_ORIGINAL_PRICE,
                    'id' => 2312
                ];
            }
            if ($ny_osha_10_general_sp_qty >= 1) {
                $total = OSHA_10_ORIGINAL_PRICE * $ny_osha_10_general_sp_qty;
                $subtotal = $osha_10_price * $ny_osha_10_general_sp_qty;
                $discount = $total - $subtotal;
                $total_discount += $discount;
                $total_amount += $total;

                $cart['items'][] = [
                    'title' => 'NY OSHA 10 Hour General Industry Spanish',
                    'price' => $osha_10_price,
                    'subtotal' => round($subtotal, 2),
                    'quantity' => $ny_osha_10_general_sp_qty,
                    'discount' => $discount,
                    'original_price' => OSHA_10_ORIGINAL_PRICE,
                    'id' => 2313
                ];
            }
            if ($ny_osha_10_construction_qty >= 1) {
                $total = OSHA_10_ORIGINAL_PRICE * $ny_osha_10_construction_qty;
                $subtotal = $osha_10_price * $ny_osha_10_construction_qty;
                $discount = $total - $subtotal;
                $total_discount += $discount;
                $total_amount += $total;

                $cart['items'][] = [
                    'title' => 'NY OSHA 10 Hour Construction',
                    'price' => $osha_10_price,
                    'subtotal' => round($subtotal, 2),
                    'quantity' => $ny_osha_10_construction_qty,
                    'discount' => $discount,
                    'original_price' => OSHA_10_ORIGINAL_PRICE,
                    'id' => 5
                ];
            }
            if ($ny_osha_10_general_qty >= 1) {
                $total = OSHA_10_ORIGINAL_PRICE * $ny_osha_10_general_qty;
                $subtotal = $osha_10_price * $ny_osha_10_general_qty;
                $discount = $total - $subtotal;
                $total_discount += $discount;
                $total_amount += $total;

                $cart['items'][] = [
                    'title' => 'NY OSHA 10 Hour General Industry',
                    'price' => $osha_10_price,
                    'subtotal' => round($subtotal, 2),
                    'quantity' => $ny_osha_10_general_qty,
                    'discount' => $discount,
                    'original_price' => OSHA_10_ORIGINAL_PRICE,
                    'id' => 8
                ];
            }
            if ($ny_osha_10_construction_sp_qty >= 1) {
                $total = OSHA_10_ORIGINAL_PRICE * $ny_osha_10_construction_sp_qty;
                $subtotal = $osha_10_price * $ny_osha_10_construction_sp_qty;
                $discount = $total - $subtotal;
                $total_discount += $discount;
                $total_amount += $total;

                $cart['items'][] = [
                    'title' => 'NY OSHA 10 Hour Construction Spanish',
                    'price' => $osha_10_price,
                    'subtotal' => round($subtotal, 2),
                    'quantity' => $ny_osha_10_construction_sp_qty,
                    'discount' => $discount,
                    'original_price' => OSHA_10_ORIGINAL_PRICE,
                    'id' => 9
                ];
            }

            /*OSHA 30*/
            if ($osha_30_construction_qty >= 1) {
                $total = OSHA_30_ORIGINAL_PRICE * $osha_30_construction_qty;
                $subtotal = $osha_30_price * $osha_30_construction_qty;
                $discount = $total - $subtotal;
                $total_discount += $discount;
                $total_amount += $total;

                $cart['items'][] = [
                    'title' => 'OSHA 30 Hour Construction',
                    'price' => $osha_30_price,
                    'subtotal' => round($subtotal, 2),
                    'quantity' => $osha_30_construction_qty,
                    'discount' => $discount,
                    'original_price' => OSHA_30_ORIGINAL_PRICE,
                    'id' => 2
                ];
            }
            if ($osha_30_general_qty >= 1) {
                $total = OSHA_30_ORIGINAL_PRICE * $osha_30_general_qty;
                $subtotal = $osha_30_price * $osha_30_general_qty;
                $discount = $total - $subtotal;
                $total_discount += $discount;
                $total_amount += $total;

                $cart['items'][] = [
                    'title' => 'OSHA 30 Hour General Industry',
                    'price' => $osha_30_price,
                    'subtotal' => round($subtotal, 2),
                    'quantity' => $osha_30_general_qty,
                    'discount' => $discount,
                    'original_price' => OSHA_30_ORIGINAL_PRICE,
                    'id' => 2314
                ];
            }
            if ($osha_30_construction_sp_qty >= 1) {
                $total = OSHA_30_ORIGINAL_PRICE * $osha_30_construction_sp_qty;
                $subtotal = $osha_30_price * $osha_30_construction_sp_qty;
                $discount = $total - $subtotal;
                $total_discount += $discount;
                $total_amount += $total;

                $cart['items'][] = [
                    'title' => 'OSHA 30 Hour Construction Spanish',
                    'price' => $osha_30_price,
                    'subtotal' => round($subtotal, 2),
                    'quantity' => $osha_30_construction_sp_qty,
                    'discount' => $discount,
                    'original_price' => OSHA_30_ORIGINAL_PRICE,
                    'id' => 2310
                ];
            }
            if ($osha_30_general_sp_qty >= 1) {
                $total = OSHA_30_ORIGINAL_PRICE * $osha_30_general_sp_qty;
                $subtotal = $osha_30_price * $osha_30_general_sp_qty;
                $discount = $total - $subtotal;
                $total_discount += $discount;
                $total_amount += $total;

                $cart['items'][] = [
                    'title' => 'OSHA 30 Hour General Industry Spanish',
                    'price' => $osha_30_price,
                    'subtotal' => round($subtotal, 2),
                    'quantity' => $osha_30_general_sp_qty,
                    'discount' => $discount,
                    'original_price' => OSHA_30_ORIGINAL_PRICE,
                    'id' => 2315
                ];
            }
            if ($ny_osha_30_construction_qty >= 1) {
                $total = OSHA_30_ORIGINAL_PRICE * $ny_osha_30_construction_qty;
                $subtotal = $osha_30_price * $ny_osha_30_construction_qty;
                $discount = $total - $subtotal;
                $total_discount += $discount;
                $total_amount += $total;

                $cart['items'][] = [
                    'title' => 'NY OSHA 30 Hour Construction',
                    'price' => $osha_30_price,
                    'subtotal' => round($subtotal, 2),
                    'quantity' => $ny_osha_30_construction_qty,
                    'discount' => $discount,
                    'original_price' => OSHA_30_ORIGINAL_PRICE,
                    'id' => 6
                ];
            }
            if ($ny_osha_30_general_qty >= 1) {
                $total = OSHA_30_ORIGINAL_PRICE * $ny_osha_30_general_qty;
                $subtotal = $osha_30_price * $ny_osha_30_general_qty;
                $discount = $total - $subtotal;
                $total_discount += $discount;
                $total_amount += $total;

                $cart['items'][] = [
                    'title' => 'NY OSHA 30 Hour General Industry',
                    'price' => $osha_30_price,
                    'subtotal' => round($subtotal, 2),
                    'quantity' => $ny_osha_30_general_qty,
                    'discount' => $discount,
                    'original_price' => OSHA_30_ORIGINAL_PRICE,
                    'id' => 2316
                ];
            }
            if ($ny_osha_30_construction_sp_qty >= 1) {
                $total = OSHA_30_ORIGINAL_PRICE * $ny_osha_30_construction_sp_qty;
                $subtotal = $osha_30_price * $ny_osha_30_construction_sp_qty;
                $discount = $total - $subtotal;
                $total_discount += $discount;
                $total_amount += $total;

                $cart['items'][] = [
                    'title' => 'NY OSHA 30 Hour Construction Spanish',
                    'price' => $osha_30_price,
                    'subtotal' => round($subtotal, 2),
                    'quantity' => $ny_osha_30_construction_sp_qty,
                    'discount' => $discount,
                    'original_price' => OSHA_30_ORIGINAL_PRICE,
                    'id' => 2311
                ];
            }

            /*Bundle*/
            if ($osha_10_30_construction_qty >= 1) {
                $total = BUNDLE_ORIGINAL_PRICE * $osha_10_30_construction_qty;
                $subtotal = $bundle_price * $osha_10_30_construction_qty;
                $discount = $total - $subtotal;
                $total_discount += $discount;
                $total_amount += $total;

                $cart['items'][] = [
                    'title' => 'OSHA 10 & 30 Hour Construction (Bundle)',
                    'price' => $bundle_price,
                    'subtotal' => round($subtotal, 2),
                    'quantity' => $osha_10_30_construction_qty,
                    'discount' => $discount,
                    'original_price' => OSHA_30_ORIGINAL_PRICE,
                    'id' => 2317
                ];
            }

            $group_order->client_of = $this->webCredit('0');

            /*Coupon Discount*/
            if($request->coupon_code && !$fromGroupDiscountPage) {
                $coupon = Coupon::query()
                    ->select('code', 'type', 'amount', 'bdm')
                    ->where('code', $request->coupon_code)
                    ->where('status', STATUS_ACTIVE)->first();

                /*for coupon discount*/
                if($coupon) {
                    /*add coupon in cart*/
                    $cart['coupon'] = $coupon;

                    /*calculate coupon discount*/
                    if($coupon->type == COUPON_TYPE_FIXED){
                        $cart['couponDiscount'] = $coupon->amount;
                    } else {
                        $cart['couponDiscount'] = ($total_amount - $total_discount) * ($coupon->amount / 100);
                    }

                    /*Check if coupon has bdm, if so add order in bdm*/
                    if(isset($coupon->bdm)) {
                        $group_order->client_of = (int) $coupon->bdm;
                    }
                }
            }


            $group_order->cart = serialize($cart);
            $group_order->company_name = $request->input('company_name');
            $group_order->company_type = $request->input('company_type');
            $group_order->first_name = $request->input('first_name', null);
            $group_order->last_name = $request->input('last_name', null);
            $group_order->password = $request->input('password', null);
            $group_order->email = $request->input('email');
            $group_order->contact_no = $request->input('phone');
            $group_order->address = $request->input('address');
            $group_order->zip_code = $request->input('zip_code');
            $group_order->state = $request->input('state');
            $group_order->city = $request->input('city');
            $group_order->username = $request->get("username");
            $group_order->user_lms_id = $request->get("user_lms_id");
//        $group_order->country    = $request->input('country');//'United States';

            $group_order->amount = round($total_amount, 2);
            $group_order->discount = round($total_discount + $cart['couponDiscount'], 2);

            // Calculate and Save Free course Qty
            $group_order->free_course_qty = $osha_10_qty + $osha_30_qty + $bundle_qty;

            $group_order->save();
            return response()->json(['web' => $this->webCredit(), 'id' => $group_order->id, 'guoid' => $group_order->guoid]);
        } catch (\Exception $e) {
            // Save Order to Log which is not saved in DB due to API failure
            $this->saveOrderLog($request->all(), LOG_STATUS_SAVE_AJAX_FAILURE, $request->get("guoid", ""), LOG_TYPE_GROUP);
            return response()->json(['message' => "Something went wrong"], 500);
        }
    }

    public function promotionsEnrollNow(Request $request, Product $product)
    {
//        $oldCart = Session::has('cart') ? Session::get('cart') : null;
//        $cart = new Cart($oldCart);
        $cart = new Cart();

//        if(!in_array($product->id, [118,505,119,128,507,146,514,192,533,206,1616,289,1620,339,584,312,107,160,346,428,1522,1596,222,547,350,109,119,353,535,99])){
//            return redirect()->route('promotions');
//        }
        if (!in_array($product->id, [1, 2, 3, 5, 6, 7, 8, 9, 99])) {
            return redirect()->route('promotions');
        }

        $cart->add($product, $product->id);


//        if(in_array($product->id, [2,6])){ // If 30 Hours courses
//            $cart->discount = 5;
//        } else {
//            $cart->discount = 2;
//        }

        // Calculate 5% discount
//        $cart->discount = number_format($product->price * 0.05, 2);

        $cart->discount = 7;

        Session::put('promotions_cart', $cart);
//        Session::put('cart', $cart);

        return redirect()->route('promotions.checkout');
//        return redirect()->route('order.details');
    }

    public function promotionsCheckout(Request $request)
    {
        if (!Session::has('promotions_cart')) {
            return redirect()->route('promotions');
        }
        $oldCart = Session::get('promotions_cart');
        $cart = new Cart($oldCart);

        if (count($cart->items) == 0) {
            return redirect()->route('promotions');
        }

        $unique_order_id = \Carbon\Carbon::now()->timezone('Canada/Eastern')->format('Ymdhi') . mt_rand(1, 9) . mt_rand(1, 9) . mt_rand(1, 9);

        $page = SEO_Tag::getAllTagsByPage('order_details');

        return view('promotions.checkout', ['total' => $cart->totalPrice, 'products' => $cart->items, 'cart' => $cart, 'uoid' => $unique_order_id, 'page' => $page]);
    }

    function postPromotionsOrderAjax(Request $request)
    {
        $oldCart = Session::get('promotions_cart');
        $cart = new Cart($oldCart);

        // if $amount == 0, die because its updating the records with falsy values
        if ($cart->totalPrice == 0) {
            return 'Price must be greater than 0';
        }

        $order = Order::where('uoid', $request->get('uoid'))->first();

        if (empty($order)) {
            $order = new Order();
            $order->uoid = $request->get('uoid');
        }

        $order->cart = serialize($cart);
        $order->first_name = $request->input('first_name');
        $order->last_name = $request->input('last_name');
        $order->email = $request->input('email');
        $order->contact_no = $request->input('contact_no');
        $order->password = $request->input('password');
        $order->address = $request->input('address');
        $order->zip_code = $request->input('zip_code');
        $order->state = $request->input('state');
        $order->city = $request->input('city');
        $order->country = $request->input('country');//'United States';
        $order->course_for = $request->input('course_for');
        $order->amount = round($cart->totalPrice, 2);
        $order->discount = round($cart->discount, 2);
        $order->discounted_price = round($cart->totalPrice - $cart->discount, 2);
        $order->client_of = $this->webCredit('0');

        $order->save();
        return response()->json(['web' => $this->webCredit(), 'id' => $order->id, 'uoid' => $order->uoid]);
    }

    private function saveOrderLog($text, $status, $uoid, $type = LOG_TYPE_INDIVIDUAL)
    {
        $log = new OrderLog();
        $log->uoid = $uoid;
        $log->text = json_encode($text);
        $log->web = $this->webCredit();
        $log->status = $status;
        $log->type = $type;
        $log->save();

        return true;
    }

    function postOrderLog(Request $request)
    {
        $log = new OrderLog();
        $log->uoid = $request->uoid;
        $log->text = json_encode($request->text);
        $log->web = $this->webCredit();
        $log->status = $request->status;
        $log->type = $request->type;
        $log->save();

        return response()->json(['web' => $this->webCredit(), 'uoid' => $request->uoid]);
    }

    public function fetchSaProductRatings()
    {
        Log::info('fetchSaProductRatings Task started');

        $shoppersApprovedId = env('SHOPPER_APPROVED_ID');
        $shoppersApprovedToken = env('SHOPPER_APPROVED_TOKEN');

        try {
            // Fetch average Ratings for courses which have ratings
            $response = Http::get('https://api.shopperapproved.com/aggregates/products/' . $shoppersApprovedId, [
                'token' => $shoppersApprovedToken,
                'xml' => false,
                'fastmode' => false
            ]);

            if ($response->status() == 200) {
                $apiResponse = $response->json();

                if (!empty($apiResponse['product_totals'])) {
                    $productRatings = $apiResponse['product_totals'];

                    foreach ($productRatings as $key => $productRating) {
                        $productId = ltrim($key, '0');

                        $product = Product::find($productId);

                        if ($product) {
                            $product->sa_rating = json_encode($productRating);

                            // fetch a review for product and save in DB
                            $reviewApiResponse = Http::get('https://api.shopperapproved.com/products/reviews/' . $shoppersApprovedId . '/' . $key, [
                                'token' => $shoppersApprovedToken,
                                'xml' => false,
                                'fastmode' => false,
                                'limit' => 1,
                                'page' => 1,
                                'sort' => 'highest'
                            ]);

                            if($reviewApiResponse->status() == 200 && !empty($reviewApiResponse->json())) {
                                $reviewApiJsonResponse = $reviewApiResponse->json();
                                // for unknown index
                                $reviewResIndex = array_key_first($reviewApiResponse->json());

                                $product->sa_review = json_encode($reviewApiJsonResponse[$reviewResIndex]);
                            }

                            $product->save();
                        }
                    }
                }

                Log::info('fetchSaProductRatings: Task Successfully Executed');
            }

        } catch (\Exception $e) {
            Log::alert('fetchSaProductRatings Err: '.$e->getMessage());
        }

        Log::info('fetchSaProductRatings Task Completed');

    }

}
