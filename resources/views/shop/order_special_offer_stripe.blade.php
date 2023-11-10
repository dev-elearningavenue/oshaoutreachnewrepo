@inject('arrays','App\Http\Utilities\Arrays')
@extends('layouts.master')

@section('title', isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Order Details | '.config('app.name') )

@section('styles')
    @if(isset($page['seo_tags']))
        @foreach($page['seo_tags'] as $meta_name => $meta_content)
            <meta name="{{ $meta_name }}" content="{{ $meta_content }}"/>
        @endforeach
    @endif
@endsection

@section('content')
    <div class="page-heading">
        <h1 class="title mbpx-0">{{ isset($page['h1_heading']) ? $page['h1_heading'] : 'Order Details' }}</h1>
        <p class="subtitle"></p>
    </div>

    <section class="sec-padding cart-form mtpx-30">
        <div class="container">
            <div class="col-md-8">
                {{--                {!! Form::open(['route' => 'order_special-offer.complete', 'method' => 'post']) !!}--}}
                <form method="POST" id="order_special-offer_form">
                    {{ csrf_field() }}
                    <input type="hidden" name="uoid" value="{{ $uoid }}"/>
                    {{--                    <input type="hidden" name="web_credit" value="0"/>--}}
                    <div class="user-details">
                        <div class="row">
                            <div class="col-md-6 text-sm-center push-md-6">
                                <input type="submit" class="btn --btn-primary float-md-right mbpx-20 complete_order"
                                       value="Payment Details">
                            </div>
                            <div class="col-md-6 pull-md-6">
                                <h3 class="title mbpx-20 d-inline-block">User Details</h3>
                            </div>
                        </div>
                        <div class="row mtpx-20">
                            <div class="col-md-6">
                                <div class="control-group focused">
                                    <label class="form-label">First Name</label>
                                    {{ Form::text('first_name', old('first_name', $order->first_name), ['id' => 'first_name','class' => $errors->has('first_name') ? 'form-field error ' : 'form-field', 'autocomplete' => 'off', 'required' => 'required']) }}
                                    @if ($errors->has('first_name'))
                                        <p class="error-msg ta-right">{{ $errors->first('first_name') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="control-group focused">
                                    <label class="form-label">Last Name</label>
                                    {{ Form::text('last_name', old('last_name', $order->last_name), ['id' => 'last_name','class' => $errors->has('last_name') ? 'form-field error ' : 'form-field', 'autocomplete' => 'off', 'required' => 'required']) }}
                                    @if ($errors->has('last_name'))
                                        <p class="error-msg ta-right">{{ $errors->first('last_name') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mtpx-20">
                            <div class="col-md-6">
                                <div class="control-group focused">
                                    <label class="form-label">E-Mail</label>
                                    {{ Form::email('email', old('email', $order->email) , ['id' => 'email', 'class' => $errors->has('email') ? 'form-field error ' : 'form-field', 'autocomplete' => 'off', 'required' => 'required']) }}
                                    @if ($errors->has('email'))
                                        <p class="error-msg ta-right">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="control-group focused">
                                    <label class="form-label">Contact #</label>
                                    {{ Form::text('contact_no', old('contact_no', $order->contact_no), ['id'=>'contact_no', 'class' => $errors->has('contact_no') ? 'form-field error ' : 'form-field', 'autocomplete' => 'off', 'required' => 'required', 'minlength' => '10', 'maxlength' => '15']) }}
                                    @if ($errors->has('contact_no'))
                                        <p class="error-msg ta-right">{{ $errors->first('contact_no') }}</p>
                                    @endif
                                    <p id="error-msg-phone" class="ta-right"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row mtpx-20">
                            <div class="col-md-6">
                                <div class="control-group focused">
                                    <label class="form-label">Password</label>
                                    {{ Form::password('password', ['id' => 'password', 'class' => $errors->has('password') ? 'form-field error ' : 'form-field', 'autocomplete' => 'off', 'required' => 'required']) }}
                                    @if ($errors->has('password'))
                                        <p class="error-msg ta-right">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="control-group focused">
                                    <label class="form-label">Confirm Password</label>
                                    {{ Form::password('password_confirmation', ['id' => 'password_confirmation', 'class' => $errors->has('password_confirmation') ? 'form-field error ' : 'form-field', 'autocomplete' => 'off', 'required' => 'required']) }}
                                    @if ($errors->has('password_confirmation'))
                                        <p class="error-msg ta-right">{{ $errors->first('password_confirmation') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mtpx-20">
                            <div class="col-md-12">
                                <div class="control-group focused">
                                    <label class="form-label">Street Address</label>
                                    {{ Form::text('address', old('address', $order->address), ['class' => $errors->has('address') ? 'form-field error ' : 'form-field', 'required' => 'required']) }}
                                    @if ($errors->has('address'))
                                        <p class="error-msg ta-right">{{ $errors->first('address') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mtpx-20">
                            <div class="col-md-6">
                                <div class="control-group focused">
                                    <label class="form-label">ZIP/Postal Code</label>
                                    {{ Form::text('zip_code', old('zip_code', $order->zip_code), ['id' => 'zip_code', 'class' => $errors->has('zip_code') ? 'form-field error ' : 'form-field', 'required' => 'required']) }}
                                    @if ($errors->has('zip_code'))
                                        <p class="error-msg ta-right">{{ $errors->first('zip_code') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="control-group focused">
                                    <label class="form-label">City</label>
                                    {{ Form::text('city', old('city', $order->city), ['id' => 'city', 'class' => $errors->has('city') ? 'form-field error ' : 'form-field', 'required' => 'required']) }}
                                    @if ($errors->has('city'))
                                        <p class="error-msg ta-right">{{ $errors->first('city') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mtpx-20">
                            <div class="col-md-6">
                                <div class="control-group focused">
                                    <label class="form-label">State/Province</label>
                                    {{ Form::select('state', $arrays::states(), 'AL', ['id' => 'state', 'class' => $errors->has('state') ? 'form-field error ' : 'form-field', 'id' => 'state_select', 'required' => 'required']) }}
                                    @if ($errors->has('state'))
                                        <p class="error-msg ta-right">{{ $errors->first('state') }}</p>
                                    @endif
                                    {{--{{ Form::text('state', old('state', $order->state), ['class' => 'form-field', 'id' => 'state']) }}--}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="control-group focused">
                                    <label class="form-label">Country</label>
                                    {{--{{ Form::select('country', $arrays::countries(), $order->country, ['class' => $errors->has('country') ? 'form-field error ' : 'form-field', 'id' => 'country']) }}--}}
                                    {{ Form::text('country', 'United States', ['id' => 'country', 'readonly' => 'readonly']) }}
                                    {{--@if ($errors->has('country'))--}}
                                    {{--<p class="error-msg ta-right">{{ $errors->first('country') }}</p>--}}
                                    {{--@endif--}}
                                </div>
                            </div>
                        </div>
                        {{--                        <div class="row mtpx-20">--}}
                        {{--                            <div class="col-md-6">--}}
                        {{--                                <div class="control-group focused">--}}
                        {{--                                    <label class="form-label">Is this course for your employee?</label>--}}
                        {{--                                    {{ Form::select('course_for', ['' => 'Select', 0 => 'No', 1 => 'Yes'], old('course_for', $order->course_for), ['class' => $errors->has('course_for') ? 'form-field error ' : 'form-field', 'id' => 'course_for', 'required' => 'required']) }}--}}
                        {{--                                    @if ($errors->has('course_for'))--}}
                        {{--                                        <p class="error-msg ta-right">Required</p>--}}
                        {{--                                    @endif--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <div class="row">
                            <div class="col-md-6 mbpx-20">
                                <label class="fw-medium"><input type="checkbox" name="terms_conditions" id="terms_conditions" required/> &nbsp;I agree to the <a
                                        href="{{ route('terms-and-conditions') }}" target="_blank" class="fc-primary">terms
                                        and conditions</a>.</label>
                            </div>
                            <div class="col-md-6 text-sm-center">
                                <input type="submit" class="btn --btn-primary float-md-right mbpx-20 complete_order"
                                       value="Payment Details">
                            </div>
                        </div>
                    </div>
                    <div class="payment-details" style="display: none;">
                        <div class="row">
                            <div class="col-md-6 text-sm-center push-md-6">
                                <button type="button" class="btn --btn-primary float-md-right mbpx-20 ud-btn user_details_btn">
                                    <i class="xicon icon-arrow-left"></i> User Details
                                </button>
                            </div>
                            <div class="col-md-6 pull-md-6">
                                <h3 class="title mbpx-20 d-inline-block">Payment Details</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 text-sm-center push-md-2">
                                <div class="buy-now" style="display: block;">
                                    <form id="payment-form">
                                        <div id="card-element"><!--Stripe.js injects the Card Element--></div>
                                        <button type="submit" class="pay-now-btn">
                                            <div class="spinner hidden" id="spinner"></div>
                                            <span id="button-text">Pay now</span>
                                        </button>
                                        <p id="card-error" role="alert"></p>
                                        <p class="result-message hidden">
                                            Payment made successfully
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="accepted-payment-methods-payment-details">
                            <div class="offset-md-3 col-md-6 text-center">
                                <img
                                loading="lazy" src="https://res.cloudinary.com/elearning-avenue24/image/upload/v1629970736/assets/images/payment-icon_v0bukh_vyudz2_euyopm.png"
                                    alt="Accepted Payment Methods"
                                    title="Visa, Mastercard, AMEX, JCB"
                                >
                            </div>
                        </div>
                    </div>
                </form>
                {{--                {!! Form::close() !!}--}}
            </div>

            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title mbpx-10">Cart Details</h3>
                    </div>
                </div>
                <div class="shopping-cart cart-form">
                    <span class="fs-large ml-3">Total: <strong
                            class="fc-primary">${{number_format($order->amount,2)}}</strong> <span
                            style="text-decoration: line-through">${{ number_format($total,2) }}</span></span>
                    <span class="fs-medium float-right mr-3">{{ count($products) }} Item(s)</span>
                    <table class="table table-bordered">
                        @foreach($products as $product)
                            <tr>
                                <td>
                                    <span class="fs-medium">{{ $product['item']['title'] }}</span><br/>
                                    <span class="fs-medium">Qty: &nbsp;
                                       {{--  <a href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}" class="">
                                            <span class="icon-minus-solid" aria-hidden="true"></span>
                                        </a> --}}&nbsp;
                                        <strong class="fc-primary">{{ $product['qty'] }}</strong>&nbsp;
                                     {{--    <a href="{{ route('product.increaseByOne', ['id' => $product['item']['id']]) }}" class="">
                                            <span class="icon-add-solid" aria-hidden="true"></span>
                                        </a> --}}
                                    </span><br/>
                                    <span class="fs-medium">Price/Unit: <strong
                                            class="fc-primary">${{ number_format($product['item']['price'], 2) }}</strong></span>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : ''  }}">
                        {{ Session::get('error') }}
                    </div>
                </div>
                @include('partials._reviews_sa')
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('/src/js/intlTelInput.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/src/css/intlTelInput.min.css') }}">
    <style>
        .ud-btn {
            padding: 8px 40px !important;
            font-size: 16px !important;
            font-weight: normal !important;
            border: none !important;
        }

        div#accepted-payment-methods-payment-details .offset-md-3.col-md-6 {
            display: flex;
            align-items: center;
        }

        div#accepted-payment-methods-payment-details span {
            width: 50%
        }

        @media (max-width: 767px) {
            div#accepted-payment-methods-payment-details .offset-md-3.col-md-6 {
                margin-bottom: 15px;
                justify-content: center;
            }

            #alert {
                width: 70% !important;
            }
        }

        .iti__flag {
            background-image: url("{{ asset('/src/images/flags.png') }}");
        }

        @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
            .iti__flag {
                background-image: url("{{ asset('/src/images/flags@2x.png') }}");
            }
        }

        ul.iti__country-list {
            z-index: 101;
        }

        #error-msg-phone {
            color: red;
            font-size: 14px;
            position: absolute;
            right: 0;
        }


        input[type=button].btn.--btn-primary {
            border: 2px solid #005384;
            padding: 8px 40px;
            font-size: 16px;
        }

        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            opacity: 0.9;
            background: url('{{asset('/loader.gif')}}') center no-repeat #e9e9e9;
        }

        /* Stripe element changes */
        .pay-now-btn {
            background: #005384 !important;
            color: #ffffff;
            font-family: Arial, sans-serif;
            border-radius: 0 0 4px 4px;
            border: 0;
            padding: 12px 16px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            display: block;
            transition: all 0.2s ease;
            box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);
            width: 100%;
        }

        .pay-now-btn:hover {
            filter: contrast(115%);
        }

        .pay-now-btn:hover:disabled,
        .pay-now-btn:disabled {
            opacity: 0.5;
            cursor: default;
        }

        /* spinner/processing state, errors */
        .spinner,
        .spinner:before,
        .spinner:after {
            border-radius: 50%;
        }

        .spinner {
            color: #ffffff;
            font-size: 22px;
            text-indent: -99999px;
            margin: 0px auto;
            position: relative;
            width: 20px;
            height: 20px;
            box-shadow: inset 0 0 0 2px;
            -webkit-transform: translateZ(0);
            -ms-transform: translateZ(0);
            transform: translateZ(0);
        }

        .spinner:before,
        .spinner:after {
            position: absolute;
            content: "";
        }

        .spinner:before {
            width: 10.4px;
            height: 20.4px;
            /*background: #5469d4;*/
            border-radius: 20.4px 0 0 20.4px;
            top: -0.2px;
            left: -0.2px;
            -webkit-transform-origin: 10.4px 10.2px;
            transform-origin: 10.4px 10.2px;
            -webkit-animation: loading 2s infinite ease 1.5s;
            animation: loading 2s infinite ease 1.5s;
        }

        .spinner:after {
            width: 10.4px;
            height: 10.2px;
            background: #ffffff;
            border-radius: 0 10.2px 10.2px 0;
            top: -0.1px;
            left: 10.2px;
            -webkit-transform-origin: 0px 10.2px;
            transform-origin: 0px 10.2px;
            -webkit-animation: loading 2s infinite ease;
            animation: loading 2s infinite ease;
        }

        @-webkit-keyframes loading {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes loading {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @media only screen and (max-width: 600px) {
            form {
                width: 80vw;
            }
        }


        /*Card styling*/

        .buy-now .StripeElement {
            border-radius: 4px 4px 0 0;
            padding: 12px;
            border: 1px solid rgba(0, 58, 92, .1);
            max-height: 44px;
            width: 100%;
            background: #fff;
            box-sizing: border-box;
            /*margin-bottom: 25px;*/
        }

        .buy-now #card-error {
            margin: 25px auto;
        }

        .buy-now #card-error:not(:empty) {
            text-align: center;
            margin: 25px auto;
            color: red;
            padding: 15px;
            border: 1px solid red;
        }

        .buy-now .result-message {
            text-align: center;
            margin: 25px auto;
            color: green;
            border: 1px solid green;
            padding: 15px;
        }

        /*Card styling*/
    </style>
    <script>
        var stripe_rendered = false;

        $(document).ready(function () {
            window.phoneInput = document.querySelector("#contact_no");
            window.iti = intlTelInput(phoneInput, {
                initialCountry: "us",
                utilsScript: "{{ asset('src/js/utils.js') }}",
                separateDialCode: true
            });

            // here, the index maps to the error code returned from getValidationError - see readme
            window.errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

            // on blur: validate
            phoneInput.addEventListener('blur', function () {
                validatePhoneNumber();
            });

            window.validatePhoneNumber = function () {
                if (phoneInput.value.trim()) {
                    if (iti.isValidNumber()) {
                        $('#error-msg-phone').html('');
                        return true;
                    } else {
                        var errorCode = iti.getValidationError();
                        if (errorCode == -99) {
                            errorCode = 4;
                        }
                        $('#error-msg-phone').parent().find('.error-msg.ta-right').remove();
                        $('#error-msg-phone').html(errorMap[errorCode]);
                        return errorMap[errorCode];
                    }
                }
            }

            $(window).load(function () {
                // Focus Error Msg
                if ($('p.error-msg').length > 0) {
                    $(window).scrollTop($('p.error-msg:first').offset().top - 10)
                }
            });

            $('#password, #password_confirmation').change(function () {
                $('#password').val($('#password').val().substring(0, 10));
                $('#password_confirmation').val($('#password_confirmation').val().substring(0, 10));
            });

            $('#password, #password_confirmation').blur(function () {
                $('#password').val($('#password').val().substring(0, 10));
                $('#password_confirmation').val($('#password_confirmation').val().substring(0, 10));
            });


            $('#order_special-offer_form').submit(function (e) {
                checkForm();
                // e.preventDefault();
                return false;
            });

            // go back to user details from paypal buttons
            $('.user_details_btn').click(function () {
                stripe_rendered = false;
                $('.payment-details').hide();
                $('.user-details').show();
                $('html, body').animate({scrollTop: $('h1.title').offset().top}, 'slow');
            });


            $('.complete_order').click(function () {
                if (checkForm() && $('.error-msg').length === 0) {

                    // Show Payment Form
                    // $('.complete_order').hide();
                    // $('.submitting_order').show();
                    $('.user-details').hide();
                    $('.payment-details').show();
                    $('html, body').animate({scrollTop: $('h1.title').offset().top}, 'slow');
                    $('.increase_by_one, .decrease_by_one').hide();

                    if (!stripe_rendered) {
                        renderStripeElements()
                    }

                    return false;
                }
            });

            function renderStripeElements() {
                // Disable the button until we have Stripe set up on the page
                $(".pay-now-btn").prop('disabled', true);

                var stripe = Stripe("{{ env('STRIPE_PUBLISHABLE_KEY') }}");

                // The items the customer wants to buy
                var purchase = {
                    items: [{id: "xl-tshirt"}],
                    uoid: $('input[name=uoid]').val(),
                };

                fetch("/get-payment-intent", {
                    method: "POST",
                    headers: {
                        'content-type': 'application/json',
                        "Accept": "application/json, text-plain, */*",
                        "X-Requested-With": "XMLHttpRequest",
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(purchase),
                })
                    .then(function (result) {
                        return result.json();
                    })
                    .then(function (data) {
                        stripe_rendered = true;
                        var elements = stripe.elements();
                        var style = {
                            base: {
                                color: "#32325d",
                                fontFamily: "Arial, sans-serif",
                                fontSmoothing: "antialiased",
                                fontSize: "16px",
                                "::placeholder": {
                                    color: "#32325d",
                                },
                            },
                            invalid: {
                                fontFamily: "Arial, sans-serif",
                                color: "#fa755a",
                                iconColor: "#fa755a",
                            },
                        };

                        var card = elements.create("card", {hidePostalCode: true, style: style});
                        // Stripe injects an iframe into the DOM
                        card.mount("#card-element");

                        card.on("change", function (event) {
                            // Disable the Pay button if there are no card details in the Element
                            $(".pay-now-btn").prop("disabled", event.empty);
                            $("#card-error").text(event.error ? event.error.message : "");
                            // $("#card-error").removeClass(event.error ? "hidden" : "");
                        });

                        $(".pay-now-btn").on("click", function (event) {
                            event.preventDefault();
                            // Complete payment when the submit button is clicked
                            payWithCard(stripe, card, data.clientSecret);
                        })

                    });
            }

            /* Stripe Helper Functions */

            // Calls stripe.confirmCardPayment
            var payWithCard = function (stripe, card, clientSecret) {
                loading(true);
                stripe
                    .confirmCardPayment(clientSecret, {
                        payment_method: {
                            card: card,
                        },
                    })
                    .then(function (result) {
                        if (result.error) {
                            // Show error to your customer
                            showError(result.error.message);
                        } else {
                            // The payment succeeded!
                            orderComplete(result.paymentIntent.id, result);
                        }
                    });
            };

            /* ------- UI helpers ------- */

            // Shows a success message when the payment is complete
            var orderComplete = function (paymentIntentId, paymentResult) {

                const orderDetailsStripe = {...paymentResult, paymentMethod: "Stripe"};

                // Stripe Button Loader
                loading(false);

                // Show Success Message
                $(".result-message").removeClass("hidden");

                // Disable Pay now btn
                $(".pay-now-btn").prop("disabled", true)

                $('.loader').show();

                // Stop Updating Order
                clearInterval(updateOrderInterval);

                // Mark Order as Paid
                return fetch('/paypal/capture-transaction-stripe', {
                    method: 'post',
                    headers: {
                        'content-type': 'application/json',
                        "Accept": "application/json, text-plain, */*",
                        "X-Requested-With": "XMLHttpRequest",
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        orderID: paymentIntentId,
                        uoid: $('input[name=uoid]').val(),
                        details: orderDetailsStripe
                    })
                })
                    .then(status)
                    .then(function (response) {
                        if (response.status === 200) {
                            response.json().then(function (data) {
                                if (data.status) {
                                    sendOrderLog({
                                        data,
                                        payment_gateway: "stripe",
                                        details: orderDetailsStripe
                                    }, {{LOG_STATUS_SUCCESS}})
                                        .then(function () {
                                            window.location.href = '{{ url('/success?uoid=') }}' + data.uoid;
                                            return true;
                                        });
                                } else {
                                    // $('.loader').hide();
                                    // alert('Please try again after refreshing the page.');
                                    sendOrderLog({
                                        data,
                                        payment_gateway: "stripe",
                                        details: orderDetailsStripe
                                    }, {{LOG_STATUS_FAILED_AJAX_FAILURE}})
                                        .then(function () {
                                            window.location.href = '{{ route('payment.failure') }}?reason=AJAXFailure';
                                            return false;
                                        });
                                }
                            });
                        } else {
                            // $('.loader').hide();
                            // alert('Please try again after refreshing the page.');
                            sendOrderLog({
                                data: {},
                                payment_gateway: "stripe",
                                details: orderDetailsStripe
                            }, {{LOG_STATUS_FAILED_INTERNAL_FAILURE}})
                                .then(function () {
                                    window.location.href = '{{ route('payment.failure') }}?reason=internalFailure';
                                    return false;
                                });
                        }
                    });

            };

            // Show the customer the error from Stripe if their card fails to charge
            var showError = function (errorMsgText) {
                loading(false);
                var errorMsg = $("#card-error");
                errorMsg.text(errorMsgText);
                setTimeout(function () {
                    errorMsg.text("");
                }, 4000);
            };

            // Show a spinner on payment submission
            var loading = function (isLoading) {
                if (isLoading) {
                    // Disable the button and show a spinner
                    $(".pay-now-btn").prop("disabled", true);
                    $("#spinner").removeClass("hidden");
                    $("#button-text").addClass("hidden");
                } else {
                    $(".pay-now-btn").prop("disabled", false);
                    $("#spinner").addClass("hidden");
                    $("#button-text").removeClass("hidden");
                }
            };

            /* Stripe Helper Functions */

            function updateOrder() {
                if (iti.isValidNumber() == true || $('#email').val().trim() != '') {
                    var data = $('#order_special-offer_form').serializeArray();
                    // Replacing contact_no with full number
                    data.forEach(function (item) {
                        if (item.name === 'contact_no') {
                            item.value = iti.getNumber();
                        }
                    });
                    var formData = $.param(data);
                    $.post("{{ route('special.order.ajax') }}", formData,
                        function (result) {
                            order = result;
                        });
                }
            }

            var updateOrderInterval = setInterval(function () {
                updateOrder();
            }, 5000);

            async function sendOrderLog(text, status) {
                const response = await fetch('/orders/logs', {
                    method: 'post',
                    headers: {
                        'content-type': 'application/json',
                        "Accept": "application/json, text-plain, */*",
                        "X-Requested-With": "XMLHttpRequest",
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        uoid: $('input[name=uoid]').val(),
                        text: text,
                        status: status,
                        type: {{LOG_TYPE_INDIVIDUAL}},
                    })
                });
                return response.json();
            }

            // Focuse CourseFor Field
            $('#course_for').parent().addClass('focused');


        });
    </script>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        function printErrorMsg(msg) {
            // Remove All Error Messages
            $('.error-msg').remove();
            if (msg) {
                $.each(msg, function (key, value) {
                    $('#' + key).after('<p class="error-msg ta-right">' + value[0] + '</p>');
                });
            }
        }

        function checkForm() {
            var terms_conditions = document.getElementById('terms_conditions');
            var password1 = document.getElementById('password');
            var password2 = document.getElementById('password_confirmation');

            var re = /(?=.*[a-zA-Z])(?=.*\d).+/;

            var contactNoValidated = validatePhoneNumber();
            if (iti.isValidNumber() === false) {
                if (contactNoValidated) {
                    contact_no.setCustomValidity(contactNoValidated);
                } else {
                    contact_no.setCustomValidity('Required');
                }
                return false;
            } else {
                contact_no.setCustomValidity('');
            }

            if (password1.value.length < 8) {
                password1.setCustomValidity('Password must contains at least 8 characters.');
                return false;
            } else if (!re.test(password1.value)) {
                password1.setCustomValidity('Password must contains at least 1 number and 1 letter.');
                return false;
            } else {
                password1.setCustomValidity('');

                if (password1.value === password2.value) {
                    password2.setCustomValidity('');
                } else {
                    password2.setCustomValidity('Passwords must match');
                    return false;
                }
            }

            if (!terms_conditions.checked) {
                terms_conditions.setCustomValidity('Required');
                return false;
            } else {
                terms_conditions.setCustomValidity('');
            }

            return $('#order_special-offer_form')[0].checkValidity();
        }

        // Form Validations
        window.validate = function () {
            // Limit password to 10 characters
            $('#password').val($('#password').val().substring(0, 10));
            $('#password_confirmation').val($('#password_confirmation').val().substring(0, 10));

            var data = $('#order_special-offer_form').serializeArray();

            // Replacing contact_no with full number
            data.forEach(function (item) {
                if (item.name === 'contact_no') {
                    item.value = iti.getNumber();
                }
            });
            var formData = $.param(data);
            $.ajax({
                url: "{{ route('order.validate') }}",
                type: 'POST',
                data: formData,
                success: function (data) {
                    validatePhoneNumber();
                    if ($.isEmptyObject(data.error) && iti.isValidNumber() === true) {
                        $('.error-msg').remove();
                    } else {
                        printErrorMsg(data.error);
                    }
                }
            });
        };

        $('#order_special-offer_form .form-field').blur(window.validate);
        $('#password, #password_confirmation, #contact_no, #terms_conditions').blur(checkForm);
        $('#password, #password_confirmation, #contact_no, #terms_conditions').change(checkForm);
        $('#password, #password_confirmation, #contact_no, #terms_conditions').keyup(checkForm);
    </script>
    <script>
        if (!$('#payment-alert').is(':visible')) {
            $('#accepted-payment-methods').on('click', function () {
                if(!$('.payment-details').is(':visible')) {
                    $("#payment-alert").fadeTo(2000, 500).slideUp(500, function () {
                        $("#payment-alert").slideUp(1500);
                    });
                }
            })
        }
    </script>
    {{-- Shopper Approved review script --}}
    <script type="text/javascript">
        var sa_interval = 2000;

        function saLoadScript(src) {
            var js = window.document.createElement('script');
            js.src = src;
            js.type = 'text/javascript';
            document.getElementsByTagName("head")[0].appendChild(js);
        }

        if (typeof (shopper_first) == 'undefined')
            saLoadScript('https://www.shopperapproved.com/widgets/testimonial/3.0/33391-120102659-120525525-120528879-120465733-120418102-119902415-119860298-117883461-117795166.js');
        shopper_first = true;
    </script>
    {{-- Shopper Approved review script --}}
@endsection
