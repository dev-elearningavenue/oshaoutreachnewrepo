<?php

namespace App\Http\Controllers;

use App\Http\Utilities\Arrays;
use App\Models\FAQ;
use App\Models\GroupEnrollmentEnquiries;
use App\Models\Review;
use App\Models\SEO_Tag;
use App\Models\StatePromotions;
use App\Models\VideoReview;
use Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Mail;
use Session;
use Storage;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use App\Http\Requests\GroupEnrollmentFormRequest;
use App\Models\Verify;

class HomeController extends Controller
{
    public function index()
    {
    
        return redirect()->route('home');
    }

    public function verifyCertificate(Request $request)
	{
 		 $page = SEO_Tag::getAllTagsByPage('about_us');
         
         $verify=null;
         if($request->has('certificate_number')){
              
            $verify = Verify::where('certificate_number',$request->certificate_number)->get();
         }
        
           
		return view('verify-certificate', compact('page','verify'));
	}

  

    public function aboutUs()
    {
        $page = SEO_Tag::getAllTagsByPage('about_us');

        return view('about-us', compact('page'));
    }

    public function partnerWithUs()
    {
        $page = SEO_Tag::getAllTagsByPage('partner_with_us');

        return view('partner-with-us', compact('page'));
    }

    public function scholarshipPage()
    {
        $page = SEO_Tag::getAllTagsByPage('scholarship');

        return view('scholarship', compact('page'));
    }

    public function faq()
    {
        $page = SEO_Tag::getAllTagsByPage('faq');
        $faqs = FAQ::where('page_name', 'home')->get();

        return view('faq', compact('page', 'faqs'));
    }

    public function termsAndConditions()
    {
        $page = SEO_Tag::getAllTagsByPage('terms_and_conditions');

        return view('terms-and-conditions', compact('page'));
    }

    public function refundPolicy()
    {
        $page = SEO_Tag::getAllTagsByPage('refund_policy');

        return view('refund-policy', compact('page'));
    }

    public function privacyPolicy()
    {
        $page = SEO_Tag::getAllTagsByPage('privacy_policy');

        return view('privacy-policy', compact('page'));
    }

    public function groupEnrollment()
    {
        $form_submit = false;

        if (!empty(Session::get('errors'))) {
            // Error
        } else {
            // No Error or First Time
            // Clear Group Enrollment Enquiry ID
            Session::forget('group_enrollment_enquiry_id');
        }

        $page = SEO_Tag::getAllTagsByPage('group_enrollment');

        return view('group-enrollment-stripe_api', compact('form_submit', 'page'));
    }

    public function groupDiscountManager()
    {
        $form_submit = false;

        if (!empty(Session::get('errors'))) {
            // Error
        } else {
            // No Error or First Time
            // Clear Group Enrollment Enquiry ID
            Session::forget('group_enrollment_enquiry_id');
        }

        $page = SEO_Tag::getAllTagsByPage('group_enrollment');

        return view('group-discount-manager-stripe', compact('form_submit', 'page'));
    }


    public function groupEnrollmentOffer()
    {
        $form_submit = false;

        // set session for BDM
        session(['bdm_id' => 2]);

        if (!empty(Session::get('errors'))) {
            // Error
        } else {
            // No Error or First Time
            // Clear Group Enrollment Enquiry ID
            Session::forget('group_enrollment_enquiry_id');
        }

        $page = SEO_Tag::getAllTagsByPage('group_enrollment');

        return view('group-enrollment-offer-stripe', compact('form_submit', 'page'));
    }

    public function groupEnrollmentNew()
    {
        $form_submit = false;

        if (!empty(Session::get('errors'))) {
            // Error
        } else {
            // No Error or First Time
            // Clear Group Enrollment Enquiry ID
            Session::forget('group_enrollment_enquiry_id');
        }

        $page = SEO_Tag::getAllTagsByPage('group_enrollment');

        return view('group-enrollment-new', compact('form_submit', 'page'));
    }

    public function groupEnrollmentPost(GroupEnrollmentFormRequest $groupEnrollment)
    {
        //        $form_submit = true;

        $enquiry_id = Session::get('group_enrollment_enquiry_id');
        // Clear Group Enrollment Enquiry ID
        Session::forget('group_enrollment_enquiry_id');

        $data = $groupEnrollment->all();

        Mail::send('emails.group-enrollment', ['data' => $data], function ($mail) use ($data) {
            $mail->to('support@oshaoutreachcourses.com')
                ->replyTo($data['email'])
                ->subject('Group Enrollment Form Submission');
        });
        //        return view('group-enrollment', compact('form_submit'));
        return redirect()->route('group-enrollment.thankyou', ['success_id=' . $enquiry_id]);
    }

    public function groupEnrollmentThankyou()
    {
        $form_submit = true;

        $page = SEO_Tag::getAllTagsByPage('group_enrollment_thankyou');

        return view('group-enrollment', compact('form_submit', 'page'));
    }

    public function contactUs()
    {
        $form_submit = false;

        $page = SEO_Tag::getAllTagsByPage('contact_us');

        return view('contact-us', compact('form_submit', 'page'));
    }

    public function contactPost(ContactFormRequest $contactForm)
    {
        try {
            $form_submit = true;
            $data = $contactForm->all();

            // Send data to DB
            $response = Http::post(
                env('LMS_API_URL') . '/shop/contact',
                [
                    'name' => $data['first_name'] . ' ' . $data['last_name'],
                    'email' => $data['email'],
                    'contactNo' => $data['phone'],
                    'message' => $data['message'],
                    'form' => 1 // Query / Contact us form
                ]
            );

            Mail::send('emails.contact-us', ['data' => $data], function ($mail) use ($data) {
                $mail->to('help@oshaoutreachcourses.com')
                    ->replyTo($data['email'])
                    ->subject('Contact Form Submission');
            });

            $page = SEO_Tag::getAllTagsByPage('contact_us_thankyou');

            return view('contact-us', compact('form_submit', 'page'));
        } catch (\Exception $e) {
            $error = "Something went wrong, Please Submit the form again.";
            return redirect()->back()->with(['error_msg' => $error]);
        }

    }

    public function partnerWithUsPost(Request $request)
    {
        $request->validate([
            'first_name' => array(
                'required',
                'regex:/[a-zA-Z_ ]+/',
                'min:2',
                'max:30'
            ),
            'last_name' => array(
                'nullable',
                'regex:/[a-zA-Z_ ]+/',
                'min:2',
                'max:30'
            ),
            'email' => 'required|email',
            'phone' => 'required|min:10|max:30',
            'g-recaptcha-response' => 'required|recaptcha'
        ]);

        try {
            $data = $request->all();

            // Send data to DB
            $response = Http::post(
                env('LMS_API_URL') . '/shop/contact',
                [
                    'name' => $data['first_name'] . ' ' . $data['last_name'],
                    'email' => $data['email'],
                    'contactNo' => $data['phone'],
                    'form' => 4 // Partner with us form type
                ]
            );

            Mail::send('emails.partner-with-us', ['data' => $data], function ($mail) use ($data) {
                $mail->to('support@oshaoutreachcourses.com')
                    ->replyTo($data['email'])
                    ->subject('Partner With Us Form Submission');
            });

            return response()->json(['msg' => 'Partner with us form submitted']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong']);
        }

    }

    public function thankyou()
    {
        return view('thankyou');
    }

    function testimonials()
    {
        return redirect()->route('reviews');
    }

    function reviews()
    {
        $reviews = Review::orderBy('id', 'desc')->get();

        $page = SEO_Tag::getAllTagsByPage('reviews');

        return view('reviews', compact('reviews', 'page'));
    }

    public function generateSiteMap()
    {
        $pages = $this->sitemapPages();

        $content_xml = '<?xml version="1.0" encoding="UTF-8"?>
        <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        foreach ($pages as $page) {
            $content_xml .= '<url>
                    <loc>' . $page['link'] . '</loc>
                    <lastmod>' . \Carbon\Carbon::now()->subHours(5)->tz('UTC')->toAtomString() . '</lastmod>
                    <changefreq>weekly</changefreq>
                    <priority>0.6</priority>
                </url>';
        }
        $content_xml .= '</urlset>';

        Storage::put('sitemap.xml', $content_xml);

        return redirect()->route('sitemap.xml');
    }

    public function sitemap()
    {
        $pages = $this->sitemapPages();

        return view('sitemap.html', compact('pages'));
    }

    public function unsubSparkPost()
    {
        return view('shop.unsub-spark-post');
    }

    protected function sitemapPages()
    {
        $pages = [
            ['name' => 'Home', 'link' => route('home')],
            ['name' => 'About us', 'link' => route('about-us')],
            ['name' => 'OSHA 10 & 30 Hour', 'link' => route('osha-10-and-30')],
            ['name' => 'Our Reviews', 'link' => route('reviews')],
            ['name' => 'Group Enrollment', 'link' => route('group-enrollment')],
            ['name' => 'Contact Us', 'link' => route('contact-us')]
            //            ['name' => 'OSHA 10-Hour Construction', 'link' => route('course.osha-10-hour-construction')],
            //            ['name' => 'OSHA 10 Construction (Spanish)', 'link' => route('course.osha-10-construction-spanish')],
            //            ['name' => 'OSHA 30-Hour Construction', 'link' => route('course.osha-30-hour-construction')],
            //            ['name' => 'OSHA 10-Hour General Industry', 'link' => route('course.osha-10-hour-general')],
            ////            ['name' => 'OSHA 30-Hour General Industry', 'link' => route('course.osha-30-hour-general')],
            //            ['name' => 'New York OSHA 10-Hour Construction', 'link' => route('course.new-york-osha-10-hour-construction')],
            //            ['name' => 'New York OSHA 30-Hour Construction', 'link' => route('course.new-york-osha-30-hour-construction')]
        ];

        $courses = Product::where('id', '!=', 99)
            ->where('published', STATUS_ACTIVE)
            ->get();
        foreach ($courses as $course) {
            $pages[] = ['name' => $course->title, 'link' => route('course.single', [$course->slug])];
        }

        $states = StatePromotions::query()
            ->where('published', STATUS_ACTIVE)
            ->get();

        foreach ($states as $state) {
            $pages[] = ['name' => 'State Requirements: ' . $state->name, 'link' => url('states-requirements/' . $state->slug)];
        }

        $videoReviews = VideoReview::all();

        foreach ($videoReviews as $videoReview) {
            $pages[] = ['name' => 'Video Reviews: ' . $videoReview->name, 'link' => url('video-reviews/' . $videoReview->slug)];
        }

        $pages[] = ['name' => 'Courses', 'link' => route('courses')];

        //        for($page_no = 1; $page_no <= 31; $page_no++) {
        //            $pages[] = [
        //                'name' => 'Courses Page # '.$page_no,
        //                'link' => route('courses') . "?page={$page_no}"];
        //        }

        $posts = json_decode(file_get_contents('https://www.oshaoutreachcourses.com/blog/wp-json/get-all-articles-titles-with-links/v1/all'));
        foreach ($posts as $post) {
            $pages[] = ['name' => 'Blog: ' . $post->title, 'link' => $post->link];
        }

        return $pages;
    }

    public function sitemapXml()
    {
        /*$sitemap_xml_path = Storage::get('sitemap.xml');
        return response($sitemap_xml_path)->header('Content-Type', 'text/xml');*/

        $carbon = new \Carbon\Carbon();
        $pages = $this->sitemapPages();

        return response()
            ->view('sitemap.xml', compact('carbon', 'pages'))
            ->header('Content-Type', 'text/xml');
    }

    function lms(Request $request)
    {
        $username = '';
        $password = '';

        $uoid = $request->get('uoid');
        $guoid = $request->get('guoid');
        $loginToken = $request->get('loginToken');

        if (!empty($uoid)) {
            $order = Order::where('uoid', $uoid)->first();
            if ($order) {
                $username = $order->username;
                $password = $order->password;
            }
        }

        if (!empty($guoid)) {
            $order = GroupEnrollmentEnquiries::where('guoid', $guoid)->first();
            if ($order) {
                $username = $order->username;
                $password = $order->password;
            }
        }

        if (!empty($loginToken)) {
            $post_data = [
                'userToken' => $loginToken
            ];

            $response = Http::post(env('LMS_API_URL') . '/usertoken', $post_data);

            if ($response->successful()) {
                $userCredentials = json_decode($response->body())->credentials;

                $username = $userCredentials->userName;
                $password = $userCredentials->password;
            }
        }

        $page = SEO_Tag::getAllTagsByPage('lms');

        $coursesForSlider = Product::select('id', 'title', 'price', 'discounted_price', 'imagePath', 'course_id', 'slug')
            ->where('lms', LMS_TYPE_OSHA_OUTREACH)
            ->get();

        return view('lms', compact('username', 'password', 'page', 'coursesForSlider'));
    }

    function check_login(Request $request)
    {


        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, "http://stackoverflow.com");
        // curl_exec($ch);
        // $ip = curl_getinfo($ch,CURLINFO_PRIMARY_IP);
        // curl_close($ch);
        // echo $ip;
        // die('asdsa');
       
        $curl = curl_init();

        $username = $request->input('username');
        $password = $request->input('password');
     
        /*For LMS Login Start*/
        $type = 2;
        curl_setopt_array($curl, array(
            CURLOPT_URL => env('LMS_API_URL') . "/signin",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('userName' => $username, 'password' => $password),
        ));
     
        $response = curl_exec($curl);
          
        $err = curl_error($curl);

        curl_close($curl);

        $decoded_response = json_decode($response);
      
       
        if (isset($decoded_response->token)) {
            return response()->json(['response' => $decoded_response, 'type' => $type]);
        }

        /*For LMS Login End*/
        /*For PureSafety login Start*/
        else {
        

            $order = Order::where('username', $username)
                ->where('password', $password)
                ->where('payment_status', 1)
                ->first();

             
            $pureSafetyRequestResponse = Http::post("https://oshaoutreachcourses.puresafety.com/OnDemand/Home/Login", [
                'LoginName' => $username,
                'Password' => $password,
                'CompanyName' => 'OSHA Outreach',
                'FormName' => 'Login'
            ]);
          
            /*if html contains logout link, means user is authenticated*/
            if (str_contains($pureSafetyRequestResponse->body(), '/Login/Logout')) {
                $type = 1;
                return response()->json(['response' => "Pure Safety Login Success", 'type' => $type, 'order_id' => $order->id ?? ""]);
            }
        
        }
        /*For PureSafety login End*/

        return response()->json(['response' => 'The user name or password you entered is incorrect', 'success' => false]);
    }


    public function getRelatedCoursesWithPrice(Request $request)
    {
        if (Cache::has('hcgrcwp_cache')) {
            $related_courses = Cache::get('hcgrcwp_cache');
        } else {
            $related_courses = Arrays::relatedCourses();

            foreach ($related_courses as $course_id => $course) {
                $product = Product::find($course_id);
                if ($product) {
                    $related_courses[$course_id]['price'] = $product->price;
                    $related_courses[$course_id]['discounted_price'] = $product->discounted_price;
                    $related_courses[$course_id]['slug'] = $product->slug;
                    $related_courses[$course_id]['enroll_now_link'] = $product->lms == LMS_TYPE_OSHA_OUTREACH
                        ? route('product.addToCart', ['id' => $product->id])
                        : "https://oshaoutreachcourses.puresafety.com/Ondemand/ShoppingCart/AddToCart/301-" . $product->course_id;
                } else {
                    unset($related_courses[$course_id]['price']);
                }
            }

            Cache::forever('hcgrcwp_cache', $related_courses);
        }

        return response()->json(compact('related_courses'));
    }

    public function promotions(Request $request)
    {
        $page = SEO_Tag::getAllTagsByPage('promotions');
        $courses = SEO_Tag::getPromotionCourses($page, ['group_title', 'promotion_page_excerpt', 'imagePath']);
//        $courses = Product::whereIn(
//            'id',
//            [
//                118, 505, 119, 128, 507, 146, 514, 192, 533, 206, 1616, 289, 1620, 339, 584,
//                312, 107, 160, 346, 428, 1522, 1596, 222, 547, 350, 109, 119, 353, 535
//            ]
//        )->orderBy('title')->get();

        return view('promotions.august-22-promotions', compact('page', 'courses'));
    }

    public function statePromotions(StatePromotions $statePromotion)
    {
        if (!$statePromotion->id) {
            $pageName = "State Requirements";
            $page = [
                'h1_heading' => $pageName,
                'img_alt' => $pageName,
                'seo_tags' => [
                    'title' => $pageName . ' | ' . 'OSHA Outreach Courses',
                    'description' => $pageName
                ]
            ];

            return view('promotions.state_promotions_index', compact('page', 'statePromotion'));
        }

        if ($statePromotion->published == 0) {
            abort(404);
        }

        $coursesArr = explode(',', $statePromotion->courses);

        $courses = Product::select('id', 'title', 'slug', 'description', 'price', 'discounted_price', 'imagePath')->whereIn('id', $coursesArr)->get();

        $faqs = FAQ::where('page_name', 'home')->get();

        $page = [
            'h1_heading' => $statePromotion->heading,
            'img_alt' => $statePromotion->heading,
            'seo_tags' => [
                'title' => $statePromotion->heading . ' | ' . 'OSHA Outreach Courses',
                'description' => substr_replace(strip_tags($statePromotion->excerpt), "...", 80)
            ]
        ];

        return view('promotions.state_promotions', compact('page', 'statePromotion', 'courses', 'faqs'));
    }

    public function videoReviews(VideoReview $videoReview)
    {
        if (!$videoReview->id) {
            $pageName = "Video Reviews";
            $page = [
                'h1_heading' => $pageName,
                'img_alt' => $pageName,
                'seo_tags' => [
                    'title' => $pageName . ' | ' . 'OSHA Outreach Courses',
                    'description' => $pageName
                ]
            ];

            $videoReviews = DB::table('video_reviews')
                ->select('name', 'video_reviews.slug', 'title')
                ->join('products', 'video_reviews.course_id', '=', 'products.id')
                ->get();

            return view('promotions.review_page_index', compact('page', 'videoReviews'));
        }


        $reviewerCourse = Product::query()->select('id', 'title')->find($videoReview->course_id);

        $page = [
            'h1_heading' => $videoReview->name . ' Review',
            'img_alt' => $videoReview->name . ' Review',
            'seo_tags' => [
                'title' => $videoReview->name . ' Review' . ' | ' . 'OSHA Outreach Courses',
                'description' => substr_replace(strip_tags($videoReview->msg), "...", 80)
            ]
        ];

        return view('promotions.static_review_page', compact('page', 'videoReview', 'reviewerCourse'));
    }

    public function fetchShoppersApprovedRatings()
    {
        Log::info('fetchShoppersApprovedRatings Task started');

        $shoppersApprovedId = env('SHOPPER_APPROVED_ID');
        $shoppersApprovedToken = env('SHOPPER_APPROVED_TOKEN');

        try {
            $response = Http::get('https://api.shopperapproved.com/aggregates/reviews/' . $shoppersApprovedId, [
                'token' => $shoppersApprovedToken,
                'xml' => false
            ]);

            if ($response->status() == 200) {
                $dBRecord = SEO_Tag::where('meta_name', 'sa_reviews')->first();

                if (!$dBRecord) {
                    $dBRecord = new SEO_Tag;
                    $dBRecord->meta_name = 'sa_reviews';
                    $dBRecord->page_type = PAGE_TYPE_STATIC;
                }

                $dBRecord->meta_content = json_encode($response->json());

                $dBRecord->save();

                Log::info('fetchShoppersApprovedRatings: Task Successfully Executed');

            }
        } catch (\Exception $e) {
            Log::alert('fetchShoppersApprovedRatings Err: ' . $e->getMessage());
        }

        Log::info('fetchShoppersApprovedRatings Task Completed');

    }

    public function americanRecruitsSignup() {
        return view('american-recruits.signup');
    }

    public function americanRecruitsEmailVerify() {
        return view('american-recruits.verify');
    }

    function freeSignUp(Request $request)
    {
        return view('shop.free-signup');
    }

    function freeStudyGuide(Request $request)
    {
        return view('shop.free-study-guide');
    }

    function reviewUs(Request $request)
    {
        return view('review-us');
    }
}
