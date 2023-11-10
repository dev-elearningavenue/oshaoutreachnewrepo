<?php

namespace App\Http\Controllers;

use App\Http\Traits\CartFormatForEmailTrait;
use App\Http\Traits\LmsApiTrait;
use App\Jobs\SendGroupOrderSuccessEmail;
use App\Jobs\SendGroupOrderSuccessSMS;
use App\Jobs\SendPromotionsOrderSuccessEmail;
use App\Jobs\SendPromotionsOrderSuccessSMS;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Mail;
use Session;
use App\Models\Cart;
use App\Models\Order;
use App\Models\SEO_Tag;
use App\Models\Product;
use App\Models\Payments;
use App\Models\GroupEnrollmentEnquiries;
use App\Jobs\SendSuccessSMS;
use App\Jobs\SendSuccessEmail;
use App\Jobs\SendOrderToLMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\AdaptivePayments;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Core\ProductionEnvironment;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;
use App\Http\Utilities\Arrays;
use App\Http\Traits\ConversionApiTrait;
use Stripe\StripeClient;

class PaypalController extends Controller
{
    use ConversionApiTrait, LmsApiTrait, CartFormatForEmailTrait;

    /**
     * @var ExpressCheckout
     */
    protected $provider;

    public function __construct(private StripeClient $stripe)
    {
        $this->provider = new ExpressCheckout();
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getExpressCheckout(Request $request)
    {
        if (Session::has('payment_details')) {
            $cart = $this->getCheckoutData();
            try {
                $response = $this->provider->setExpressCheckout($cart, false);
                if ($response['paypal_link'] != null)
                    return redirect($response['paypal_link']);
                else {
                    Session::put(['code' => 'danger', 'message' => $response['L_LONGMESSAGE0']]);
                    return redirect('/failure');
                }
            } catch (\Exception $e) {
                Session::put(['code' => 'danger', 'message' => "Error processing PayPal payment for Order!!"]);
                return redirect('/failure');
            }
        } else {
            Session::put(['code' => 'danger', 'message' => "Your Payment is not ready."]);
            return redirect('/failure');
        }
    }

    /**
     * Process payment on PayPal.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getExpressCheckoutSuccess(Request $request)
    {
        $token = $request->get('token');

        // Verify Express Checkout Token
        $response = $this->provider->getExpressCheckoutDetails($token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {

            //            $oldCart = Session::get('cart');
            //            $cart = new Cart($oldCart);

            if (Session::get('old_uoid')) {
                $old_order = Order::where('uoid', Session::get('old_uoid'))->first();
                if ($old_order) {
                    $old_order->discount = 0;
                    $old_order->save();
                }
                Session::forget('old_uoid');
            }

            $order = Order::where('uoid', Session::get('uoid'))->first();
            //            dd(Session::get('uoid'));
            $paypal = new PaypalController();
            $payment_details = $paypal->getPaymentDetails($request);
            //            dd($payment_details);
            if (isset($payment_details['transactionResponse']['PAYMENTINFO_0_TRANSACTIONID'])) {
                // Update Order Status
                $order->transaction_reference = $payment_details['transactionResponse']['PAYMENTINFO_0_TRANSACTIONID'];
                $order->payment_details = serialize($payment_details['transactionResponse']);
                $order->amount = $payment_details['transactionResponse']['PAYMENTINFO_0_AMT'];
                $order->payment_status = $payment_details['status'];
                $order->save();

                $cart = new Cart(unserialize($order->cart));

                // Send Order Successful Email
                /*Mail::send('emails.order-successful', ['order' => $order, 'cart' => $cart], function ($mail) use ($order){
                    $mail->to($order->email)
                    ->to('support@oshaoutreachcourses.com')
                        ->replyTo($order->email)
                        //->bcc('saad.5690@gmail.com')
                        ->subject('Your order#'.$order->uoid.' has been successfully placed');
                });*/

                // Send Order Successful Email
                dispatch(new SendSuccessEmail($order));

                // Send Order Success SMS
                dispatch(new SendSuccessSMS($order));

                // Send Order to LMS
                dispatch(new SendOrderToLMS($order->id));

                $returnPage = 'success' . '?uoid=' . Session::get('uoid');

                // Clear all session Data
                $request->session()->flush();
            } else {
                $returnPage = 'failure';
            }
        } else {
            $returnPage = 'failure';
        }

        return redirect($returnPage);
    }


    public function completePayment()
    {
        return view('payment.success', compact('response'));
    }

    /**
     * Set cart data for processing payment on PayPal.
     *
     *
     * @return array
     */
    protected function getCheckoutData()
    {
        $data = [];
        // Get Invoice details from the session
        $payment_details = Session::get('payment_details');

        // Assign items for the invoice
        $data['items'] = $payment_details['item_list'];

        $data['return_url'] = url('/paypal/ec-checkout-success');
        //        if (Session::has('uoid')) {
        $data['invoice_id'] = Session::get('uoid');
        //        } else {
        //            $data['invoice_id'] = date('Ymdhi').mt_rand(1,9).mt_rand(1,9).mt_rand(1,9);
        //        }
        $data['invoice_description'] = "OSHA Outreach Course Purchase details";
        $data['cancel_url'] = $payment_details['failure_url'];
        $data['total'] = $payment_details['total_amount'];
        $data['success_return_url'] = $payment_details['success_url'];
        return $data;
    }

    /**
     * Get statusof the payment from the session variables
     * This function will work for success and failure transactions
     * @return Array with messages
     */
    public function getStatus()
    {
        $response = [];
        if (Session::has('code')) {
            $response['code'] = Session::get('code');
            Session::forget('code');
        }

        if (Session::has('message')) {
            $response['message'] = Session::get('message');
            Session::forget('message');
        }

        return $response;
    }

    /**
     * For success payments load this page with details
     */
    public function success(Request $request)
    {
        // Empty Cart
        Session::forget('cart');

        // Forget Form Fields
        Session::forget('form_fields');

        // Forget UOID
        Session::forget('uoid');

        // Empty Payment Details
        Session::forget('payment_details');

        //Empty Sale Session
        Session::forget('comingFromSalePage');

        $response = $this->getStatus();
        $page = SEO_Tag::getAllTagsByPage('payment_success');
        $order_id = $request->get('order_id');

        return view(
            'payment.success',
            compact('response','page', 'order_id')
        );
    }

    /**
     * Function will work for the failure transactions
     */
    public function failure()
    {
        Session::forget('uoid');
        $response = $this->getStatus();

        $page = SEO_Tag::getAllTagsByPage('payment_failed');

        return view('payment.failure', compact('response', 'page'));
    }

    public function getPaymentDetails(Request $request)
    {
        $cart = $this->getCheckoutData();
        $token = $request->get('token');
        $payerID = $request->get('PayerID');

        $transaction_response = $this->provider->doExpressCheckoutPayment($cart, $token, $payerID);
        $status = "";
        if (isset($transaction_response['PAYMENTINFO_0_PAYMENTSTATUS'])) {
            $status = $transaction_response['PAYMENTINFO_0_PAYMENTSTATUS'];
        }

        if (strcasecmp($status, 'Completed') == 0 || strcasecmp($status, 'Processed') == 0) {
            // Do the action for success payments
            Session::put(['code' => 'success', 'message' => "Order has been paid successfully!"]);
            $payment_status = 1;
            $returnPage = $cart['success_return_url'];
        } elseif (strcasecmp($status, 'Pending') == 0) {
            // Do for the pending transactions
            Session::put(['code' => 'warning', 'message' => "Your payment under processing"]);
            $payment_status = 2;
            $returnPage = $cart['success_return_url'];
        } else {
            // Do for the failure transactions
            Session::put(['code' => 'danger', 'message' => "Error processing PayPal payment for Order!"]);
            $payment_status = 3;
            $returnPage = $cart['cancel_url'];
        }

        return [
            'status' => $payment_status,
            'returnPage' => $returnPage,
            'transactionResponse' => $transaction_response
        ];
    }

    public function captureTransaction(Request $request)
    {
        $orderId = $request->orderID;

        if (!empty($orderId)) {
            $order = Order::where('uoid', $request->input('uoid'))->first();

            $order->transaction_reference = $request->orderID;
            $status = false;

            // Checking Payment Details for Status
            if (strcasecmp($request->details['status'], 'Completed') == 0 || strcasecmp($request->details['status'], 'Processed') == 0) {
                $order->payment_status = 1;
                $status = true;
            } else if (strcasecmp($request->details['status'], 'Pending') == 0) {
                $order->payment_status = 2;
                $status = true;
            } else {
                $order->payment_status = 3;
            }

            $temp_first_name = explode(' ', trim($order->first_name))[0];
            $temp_last_name = explode(' ', trim($order->last_name))[0];

            if(!isset($order->username)) {
                $username = strtolower(preg_replace('/[^a-zA-Z]+/', '', $temp_first_name));
                $username .= '.' . strtolower(preg_replace('/[^a-zA-Z]+/', '', $temp_last_name)) . mt_rand(11, 99);
                $order->username = $username;
            }

            $order->payment_details = serialize($request->details);
            $order->amount = $request->details['purchase_units'][0]['amount']['value'];
            $order->is_completed = STATUS_ACTIVE;
            $order->save();

            if ($status) {
                // Send Order Successful Email
                dispatch(new SendSuccessEmail($order));

                // Send Order Success SMS
                dispatch(new SendSuccessSMS($order));

                // Send Order to LMS
                dispatch(new SendOrderToLMS($order->id));
            }

            return response()->json(['status' => $status, 'uoid' => $order->uoid]);
        }
    }

    public function captureRedirectPayment(Request $request) {
        try {
            $paymentIntent = $request->get('payment_intent');

            $paymentIntentObj = $this->stripe->paymentIntents->retrieve($paymentIntent);

            $orderUoid = $paymentIntentObj->offsetGet("metadata")->order_id ?? null;
            $paymentStatus = $paymentIntentObj->offsetGet('status');
            $orderAmount = number_format($paymentIntentObj->offsetGet('amount') / 100, 2, '.', "");
            $paymentIntentArray = $paymentIntentObj->getLastResponse()->json;

            if($orderUoid) {
                $order = Order::query()
                    ->where('uoid', $orderUoid)
                    ->where('payment_status', 0)
                    ->first();

                $order->transaction_reference = $paymentIntent;

                // Checking Payment Details for Status
                if ($paymentStatus === 'succeeded') {
                    $order->payment_status = 1;

                    if(!isset($order->username)) {
                        $order->username = generateUserName($order->first_name, $order->last_name);
                    }

                    $order->payment_details = serialize($paymentIntentArray);
                    $order->amount = $orderAmount;
                    $order->is_completed = STATUS_ACTIVE;
                    $order->save();

                    // Send Order Successful Email
                    dispatch(new SendSuccessEmail($order));

                    // Send Order Success SMS
                    dispatch(new SendSuccessSMS($order));

                    // Send Order to LMS
                    dispatch(new SendOrderToLMS($order->id));

                    return redirect(url('/success?uoid='. $order->uoid));
                }

                $order->payment_status = 3;
                $order->save();
                return redirect(url('/failure?reason=PAYMENT_FAILURE'));
            }

            return redirect(url('/failure?reason=ORDER_NOT_FOUND'));

        } catch (\Exception $e) {
            return redirect(url('/failure?reason=AJAXFailure'));
        }

    }

    public function captureRedirectPaymentGroup(Request $request)
    {
        try {
            $paymentIntent = $request->get('payment_intent');

            $paymentIntentObj = $this->stripe->paymentIntents->retrieve($paymentIntent);

            $orderUoid = $paymentIntentObj->offsetGet("metadata")->order_id ?? null;
            $paymentStatus = $paymentIntentObj->offsetGet('status');
            $orderAmount = number_format($paymentIntentObj->offsetGet('amount') / 100, 2, '.', "");
            $paymentIntentArray = $paymentIntentObj->getLastResponse()->json;

            $group_order = GroupEnrollmentEnquiries::where('guoid', $orderUoid)
                ->where('payment_status', 0)
                ->firstOrFail();

            $group_order->transaction_reference = $paymentIntent;

            // Checking Payment Details for Status
            if ($paymentStatus === 'succeeded') {
                $group_order->payment_status = 1;

                if (!isset($order->username)) {
                    $group_order->username = generateUserName($group_order->first_name, $group_order->last_name);
                }

                $group_order->payment_details = serialize($paymentIntentArray);
                $group_order->amount = $orderAmount;
                $group_order->save();

                // Send Order Successful Email
                dispatch(new SendGroupOrderSuccessEmail($group_order));

                // Send Order Success SMS
                dispatch(new SendGroupOrderSuccessSMS($group_order));

                // Send Order to LMS
                dispatch(new SendOrderToLMS($group_order->id));

                return redirect(url('/group-enrollment/success?guoid=' . $group_order->guoid));
            }

            $group_order->payment_status = 3;
            $group_order->save();

            return redirect(url('/group-enrollment/failure?reason=PAYMENT_FAILURE'));

        } catch (\Exception $e) {
            $reason = str_contains($e->getMessage(), "No query results") ? "ORDER_NOT_FOUND" : "AJAXFailure";
            return redirect(url("/group-enrollment/failure?reason=$reason"));
        }

    }

    public function captureTransactionStripe(Request $request)
    {
        $orderId = $request->orderID;

        if (!empty($orderId)) {
            $order = Order::where('uoid', $request->input('uoid'))->first();

            $order->transaction_reference = $request->orderID;
            $status = false;

            // Checking Payment Details for Status
            if ($request->details['paymentIntent']['status'] === 'succeeded') {
                $order->payment_status = 1;
                $status = true;
            } else {
                $order->payment_status = 3;
            }

            $temp_first_name = explode(' ', trim($order->first_name))[0];
            $temp_last_name = explode(' ', trim($order->last_name))[0];

            if(!isset($order->username)) {
                $username = strtolower(preg_replace('/[^a-zA-Z]+/', '', $temp_first_name));
                $username .= '.' . strtolower(preg_replace('/[^a-zA-Z]+/', '', $temp_last_name)) . mt_rand(11, 99);
                $order->username = $username;
            }

            $order->payment_details = serialize($request->details);
            $order->amount = number_format($request->details['paymentIntent']['amount'] / 100, 2, '.', "");
            $order->is_completed = STATUS_ACTIVE;
            $order->save();

            if ($status) {
                // Send Order Successful Email
                dispatch(new SendSuccessEmail($order));

                // Send Order Success SMS
                dispatch(new SendSuccessSMS($order));

                // Send Order to LMS
                dispatch(new SendOrderToLMS($order->id));
            }

            return response()->json(['status' => $status, 'uoid' => $order->uoid]);
        }
    }


    public function captureSpecialTransaction(Request $request)
    {
        $orderId = $request->orderID;

        if (!empty($orderId)) {
            $order = Order::where('uoid', $request->input('uoid'))->first();

            $order->transaction_reference = $request->orderID;
            $status = false;

            // Checking Payment Details for Status
            if (strcasecmp($request->details['status'], 'Completed') == 0 || strcasecmp($request->details['status'], 'Processed') == 0) {
                $order->payment_status = 1;
                $status = true;
            } else if (strcasecmp($request->details['status'], 'Pending') == 0) {
                $order->payment_status = 2;
                $status = true;
            } else {
                $order->payment_status = 3;
            }

            $temp_first_name = explode(' ', trim($order->first_name))[0];
            $temp_last_name = explode(' ', trim($order->last_name))[0];
            $username = strtolower(preg_replace('/[^a-zA-Z]+/', '', $temp_first_name));
            $username .= '.' . strtolower(preg_replace('/[^a-zA-Z]+/', '', $temp_last_name)) . mt_rand(11, 99);
            $order->username = $username;

            $order->payment_details = serialize($request->details);
            $order->amount = $request->details['purchase_units'][0]['amount']['value'];
            $order->is_completed = STATUS_ACTIVE;
            $order->save();

            if ($status) {
                // Send Order Successful Email
                dispatch(new SendSuccessEmail($order));

                // Send Order Success SMS
                dispatch(new SendSuccessSMS($order));

                // Send Order to LMS
                dispatch(new SendOrderToLMS($order->id));
            }

            return response()->json(['status' => $status, 'uoid' => $order->uoid]);
        }
    }


    public function captureGroupTransaction(Request $request)
    {
        $group_order = GroupEnrollmentEnquiries::where('guoid', $request->guoid)->first();
        if (!empty($group_order)) {
            $group_order->transaction_reference = $request->orderID;
            $status = false;

            // Checking Payment Details for Status
            if (strcasecmp($request->details['status'], 'Completed') == 0 || strcasecmp($request->details['status'], 'Processed') == 0) {
                $group_order->payment_status = 1;
                $status = true;
            } else if (strcasecmp($request->details['status'], 'Pending') == 0) {
                $group_order->payment_status = 2;
                $status = true;
            } else {
                $group_order->payment_status = 3;
            }

            $temp_first_name = explode(' ', trim($group_order->first_name))[0];
            $temp_last_name = explode(' ', trim($group_order->last_name))[0];

            if(!isset($group_order->username)) {
                $username = strtolower(preg_replace('/[^a-zA-Z]+/', '', $temp_first_name));
                $username .= '.' . strtolower(preg_replace('/[^a-zA-Z]+/', '', $temp_last_name)) . mt_rand(11, 99);
                $group_order->username = $username;
            }

            $group_order->payment_details = serialize($request->details);
            $group_order->amount = $request->details['purchase_units'][0]['amount']['value'];
            $group_order->save();

            if ($status) {
                // Send Order Successful Email
                dispatch(new SendGroupOrderSuccessEmail($group_order));

                // Send Order Success SMS
                dispatch(new SendGroupOrderSuccessSMS($group_order));

                // Send Group Order to LMS
                dispatch(new SendOrderToLMS($group_order->id, true));

            }

            return response()->json(['status' => $status, 'guoid' => $group_order->guoid]);
        }
    }

    public function captureGroupTransactionStripe(Request $request)
    {
        $groupOrderId = $request->guoid;
        $transactionId = $request->orderID;

        if (!empty($groupOrderId)) {
            $group_order = GroupEnrollmentEnquiries::where('guoid', $groupOrderId)->first();

            $group_order->transaction_reference = $transactionId;
            $status = false;

            // Checking Payment Details for Status
            if ($request->details['paymentIntent']['status'] === 'succeeded') {
                $group_order->payment_status = 1;
                $status = true;
            } else {
                $group_order->payment_status = 3;
            }

            $temp_first_name = explode(' ', trim($group_order->first_name))[0];
            $temp_last_name = explode(' ', trim($group_order->last_name))[0];

            if(!isset($group_order->username)) {
                $username = strtolower(preg_replace('/[^a-zA-Z]+/', '', $temp_first_name));
                $username .= '.' . strtolower(preg_replace('/[^a-zA-Z]+/', '', $temp_last_name)) . mt_rand(11, 99);
                $group_order->username = $username;
            }

            $group_order->payment_details = serialize($request->details);
            $group_order->amount = number_format($request->details['paymentIntent']['amount'] / 100, 2, '.', "");
            $group_order->save();

            if ($status) {
                // Send Order Successful Email
                dispatch(new SendGroupOrderSuccessEmail($group_order));

                // Send Order Success SMS
                dispatch(new SendGroupOrderSuccessSMS($group_order));

                // Send Group Order to LMS
                dispatch(new SendOrderToLMS($group_order->id, true));

            }

            return response()->json(['status' => $status, 'guoid' => $group_order->guoid]);
        } else {
            return response()->json(['status' => 1, 'message' => "Group Order ID does not exists"], 404);
        }
    }

    /**
     * For success payments load this page with details
     */
    public function groupOrderSuccess(Request $request)
    {
        $response = $this->getStatus();

        if (!empty($request->get('guoid'))) {
            $group_order = GroupEnrollmentEnquiries::where('guoid', $request->get('guoid'))->first();

            if ($group_order && $group_order->payment_status) {
                $cart = unserialize($group_order->cart);

                $page = SEO_Tag::getAllTagsByPage('payment_group_order_success');

                /* FB Conversion API */
                if($group_order->is_gtag_submitted !== 1) {
                    $this->fbPurchaseEvent($group_order, 'group_purchase', 'guoid');
                }
                /* FB Conversion API */

                return view(
                    'payment.group_order_success',
                    compact('response', 'group_order', 'cart', 'page')
                );
            }
        }

        return redirect('/');
    }

    /**
     * Function will work for the failure transactions
     */
    public function groupOrderFailure()
    {
        $response = $this->getStatus();

        $page = SEO_Tag::getAllTagsByPage('payment_group_order_failure');

        return view('payment.group_order_failure', compact('response', 'page'));
    }


    public function capturePromotionsTransaction(Request $request)
    {
        $orderId = $request->orderID;

        if (!empty($orderId)) {
            $order = Order::where('uoid', $request->input('uoid'))->first();

            $order->transaction_reference = $request->orderID;
            $status = false;

            // Checking Payment Details for Status
            if (strcasecmp($request->details['status'], 'Completed') == 0 || strcasecmp($request->details['status'], 'Processed') == 0) {
                $order->payment_status = 1;
                $status = true;
            } else if (strcasecmp($request->details['status'], 'Pending') == 0) {
                $order->payment_status = 2;
                $status = true;
            } else {
                $order->payment_status = 3;
            }

            $temp_first_name = explode(' ', trim($order->first_name))[0];
            $temp_last_name = explode(' ', trim($order->last_name))[0];
            $username = strtolower(preg_replace('/[^a-zA-Z]+/', '', $temp_first_name));
            $username .= '.' . strtolower(preg_replace('/[^a-zA-Z]+/', '', $temp_last_name)) . mt_rand(11, 99);
            $order->username = $username;

            $order->payment_details = serialize($request->details);
            $order->amount = $request->details['purchase_units'][0]['amount']['value'];
            $order->is_completed = STATUS_ACTIVE;
            $order->save();

            if ($status) {
                // Send Order Successful Email
                dispatch(new SendPromotionsOrderSuccessEmail($order));

                // Send Order Success SMS
                dispatch(new SendPromotionsOrderSuccessSMS($order));

                // Send Order to LMS
                dispatch(new SendOrderToLMS($order->id));
            }

            return response()->json(['status' => $status, 'uoid' => $order->uoid]);
        }
    }

    public function promotionsSuccess(Request $request)
    {
        // Empty Cart
        Session::forget('promotions_cart');

        if (!empty($request->get('uoid'))) {
            $order = Order::where('uoid', $request->get('uoid'))->first();
            if ($order && $order->payment_status) {
                $cart = new Cart(unserialize($order->cart));

                $page = SEO_Tag::getAllTagsByPage('promotions_success');

                return view(
                    'promotions.success',
                    compact('order', 'cart', 'page')
                );
            }
        }

        return redirect('/');
    }

    /**
     * Function will work for the failure transactions
     */
    public function promotionsFailure()
    {
        // Empty Cart
        Session::forget('promotions_cart');

        $page = SEO_Tag::getAllTagsByPage('payment_failed');

        return view('promotions.failure', compact('page'));
    }

    /**
     * @param $order
     * @return void
     */
    private function fbPurchaseEvent($order, $contentName = 'purchase', $order_id_field = 'uoid')
    {
        try {
            $conversionApiUser = [
                'ip' => request()->ip(),
                'userAgent' => request()->userAgent(),
                'email' => $order->email ?? '',
                'phone' => $order->contact_no ?? '',
                'firstname' => $order->firstName ?? '',
                'lastname' => $order->lastName ?? '',
                'eventSourceURL' => url()->current(),
                'city' => $order->city ?? '',
                'state' => $order->state ?? '',
                'countryCode' => strtolower(array_search($order->country, Arrays::countries())),
                'event_id' => $order->{$order_id_field},
                'order_id' => $order->{$order_id_field}
            ];

            $conversionApiCustomData = @unserialize($order->cart);

            if ($conversionApiCustomData == false) {
                $conversionApiCustomData = [];
            }

            $conversionEvent = $this->create_conversion_event($conversionApiUser, $order->amount, 'Purchase', $conversionApiCustomData, $contentName);
            $this->conversionEventsArr[] = $conversionEvent;
            $this->executeConversionEventsAsync();

        } catch (\Exception $e) {
            Log::error($e->getMessage().' '.'Error in FB Pixel Purchase Event');
        }
    }
}
