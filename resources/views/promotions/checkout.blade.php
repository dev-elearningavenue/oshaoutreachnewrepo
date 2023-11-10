@inject('arrays','App\Http\Utilities\Arrays')
@extends('layouts.promotional_sale')

@section('title')
    {{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Promotions Checkout | '.config('app.name') }}
@endsection

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

{{--                {!! Form::open(['method' => 'post', 'id' => 'order_details_form']) !!}--}}
                <form method="POST" id="order_details_form">
                    {{ csrf_field() }}
                    <input type="hidden" name="uoid" value="{{ $uoid }}"/>
{{--                    <input type="hidden" name="web_credit" value="0"/>--}}
                    <div class="user-details">
                        <div class="row">
                            <div class="col-md-6 text-sm-center push-md-6">
                                <button type="button" class="btn --btn-primary float-md-right mbpx-20 complete_order">
                                    Payment Details <i class="xicon icon-arrow-right"></i></button>
                                {{--<input type="button" class="btn --btn-primary float-md-right mbpx-20 submitting_order" value="Submitting Order..." style="display: none;">--}}
                            </div>
                            <div class="col-md-6 pull-md-6">
                                <h3 class="title mbpx-20 d-inline-block">User Details</h3>
                            </div>
                        </div>
                        <div class="row mtpx-20">
                            <div class="col-md-6">
                                <div class="control-group focused">
                                    <label class="form-label">First Name</label>
                                    {{ Form::text('first_name', null, ['id' => 'first_name', 'class' => $errors->has('first_name') ? 'form-field error ' : 'form-field', 'autocomplete' => 'off', 'required' => 'required']) }}
                                    @if ($errors->has('first_name'))
                                        <p class="error-msg ta-right">{{ $errors->first('first_name') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="control-group focused">
                                    <label class="form-label">Last Name</label>
                                    {{ Form::text('last_name', null, ['id' => 'last_name', 'class' => $errors->has('last_name') ? 'form-field error ' : 'form-field', 'autocomplete' => 'off', 'required' => 'required']) }}
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
                                    {{ Form::email('email', null, ['id'=>'email', 'class' => $errors->has('email') ? 'form-field error ' : 'form-field', 'autocomplete' => 'off', 'required' => 'required']) }}
                                    @if ($errors->has('email'))
                                        <p class="error-msg ta-right">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="control-group focused">
                                    <label class="form-label">Contact #</label>
                                    {{ Form::text('contact_no', null, ['id'=>'contact_no', 'class' => $errors->has('contact_no') ? 'form-field error ' : 'form-field', 'autocomplete' => 'contact-no-new-6472', 'required' => 'required']) }}
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
                                    {{ Form::password('password', ['id'=>'password', 'class' => $errors->has('password') ? 'form-field error ' : 'form-field', 'autocomplete' => 'password-new-6472', 'required' => 'required', 'maxlength' => 10]) }}
                                    @if ($errors->has('password'))
                                        <p class="error-msg ta-right">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="control-group focused">
                                    <label class="form-label">Confirm Password</label>
                                    {{ Form::password('password_confirmation', ['id'=>'password_confirmation','class' => $errors->has('password_confirmation') ? 'form-field error ' : 'form-field', 'autocomplete' => 'password-new-confirm-6472', 'required' => 'required', 'maxlength' => 10]) }}
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
                                    {{ Form::text('address', null, ['id' => 'address', 'class' => $errors->has('address') ? 'form-field error ' : 'form-field', 'required' => 'required']) }}
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
                                    {{ Form::text('zip_code', null, ['id' => 'zip_code', 'class' => $errors->has('zip_code') ? 'form-field error ' : 'form-field', 'required' => 'required']) }}
                                    @if ($errors->has('zip_code'))
                                        <p class="error-msg ta-right">{{ $errors->first('zip_code') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="control-group focused">
                                    <label class="form-label">City</label>
                                    {{ Form::text('city', null, ['id' => 'city', 'class' => $errors->has('city') ? 'form-field error ' : 'form-field', 'required' => 'required']) }}
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
                                    {{ Form::select('state', $arrays::states(), null, ['id' => 'state', 'class' => $errors->has('state') ? 'form-field error ' : 'form-field', 'required' => 'required']) }}
                                    @if ($errors->has('state'))
                                        <p class="error-msg ta-right">{{ $errors->first('state') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="control-group focused">
                                    <label class="form-label">Country</label>
                                    {{ Form::text('country', 'United States', ['id' => 'country', 'readonly' => 'readonly']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row mtpx-20">
                            <div class="col-md-6">
                                <input type="hidden" name="course_for" value="0"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mbpx-20">
                                <label class="fw-medium"><input name="terms_conditions" id="terms_conditions"
                                                                class="form-field" type="checkbox" required/> &nbsp;I
                                    agree to the <a href="{{ route('terms-and-conditions') }}" target="_blank"
                                                    class="fc-primary">terms and conditions</a>.</label>
                            </div>
                            <div class="col-md-6 text-sm-center">
                                <button type="button" class="btn --btn-primary float-md-right mbpx-20 complete_order">
                                    Payment Details <i class="xicon icon-arrow-right"></i></button>
                                {{--<input type="button" class="btn --btn-primary float-md-right mbpx-20 submitting_order" value="Submitting Order..." style="display: none;">--}}
                            </div>
                        </div>
                    </div>
                    <div class="payment-details" style="display: none;">
                        <div class="row">
                            <div class="col-md-6 text-sm-center push-md-6">
                                <button type="button" class="btn --btn-primary float-md-right mbpx-20 user_details_btn">
                                    <i class="xicon icon-arrow-left"></i> User Details
                                </button>
                            </div>
                            <div class="col-md-6 pull-md-6">
                                <h3 class="title mbpx-20 d-inline-block">Payment Details</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 text-sm-center push-md-2">
                                <div class="buy-now" style="display: block;text-align: center;">
                                    <div id="paypal-button-container"></div>
                                </div>
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
                    @if($cart->discount)
                        <span class="fs-large ml-3">Sub Total: <strong
                                class="fc-primary">${{ number_format($total,2) }}</strong></span>
                        <span class="fs-medium float-right mr-3">{{ count($products) }} Item(s)</span><br/>
                        <span class="fs-large ml-3">Discount: <strong
                                class="fc-primary">- ${{ number_format($cart->discount,2) }}</strong></span><br/>
                        <span class="fs-large ml-3">Total: <strong
                                class="fc-primary">${{ number_format($total - $cart->discount,2) }}</strong></span>
                    @else
                        <span class="fs-large ml-3">Total: <strong
                                class="fc-primary">${{ number_format($total,2) }}</strong></span>
                        <span class="fs-medium float-right mr-3">{{ count($products) }} Item(s)</span>
                    @endif

                    <table class="table table-bordered">
                        @foreach($products as $course)
                            <tr>
                                <td>
                                    <span class="fs-medium">{{ $course['item']['title'] }}</span><br/>
                                    <span class="fs-medium">Qty: &nbsp;
                                        <strong class="fc-primary">{{ $course['qty'] }}</strong>&nbsp;
                                    </span><br/>
                                    <span class="fs-medium">Price/Unit:
                                        <strong
                                            class="fc-red h5">${{ number_format($course['item']['price'] - $cart->discount, 2) }}</strong>
                                        <small
                                            style="text-decoration: line-through;">${{ number_format($course['item']['price'], 2) }}</small>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : ''  }}">
                        {{ Session::get('error') }}
                    </div>
                </div>
                @include('partials._reviews')
            </div>
        </div>
    </section>
    @include('partials._related_courses')
    <style>
        .prpx-0 {
            padding-right: 0 !important;
        }

        .plpx-0 {
            padding-left: 0 !important;
        }
    </style>
@endsection

@section('scripts')
    <script src="{{ asset('/src/js/intlTelInput.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/src/css/intlTelInput.min.css') }}">
    <style>
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
    </style>
    <script>
        var paypal_rendered = false;
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
                console.log(iti.getNumber());
                if (phoneInput.value.trim()) {
                    if (iti.isValidNumber()) {
                        $('#error-msg-phone').html('');
                        return true;
                    } else {
                        var errorCode = iti.getValidationError();
                        // console.log(errorCode);
                        if (errorCode == -99) {
                            errorCode = 4;
                        }
                        $('#error-msg-phone').parent().find('.error-msg.ta-right').remove();
                        $('#error-msg-phone').html(errorMap[errorCode]);
                        return errorMap[errorCode];
                    }
                }
            }
        });
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

            if ($('form')[0].checkValidity()) {
                {{--fbq('track', 'InitiateCheckout', {value: '{{ $total }}',currency: 'USD'});--}}
                    return true;
            }

            return false;
        }

        $('#order_details_form').submit(function (e) {
            checkForm();
            // e.preventDefault();
            return false;
        });

        $(document).ready(function () {
            $('.user_details_btn').click(function () {
                $('.payment-details').hide();
                $('.user-details').show();
                $('html, body').animate({scrollTop: $('h1.title').offset().top}, 'slow');
                $('.increase_by_one, .decrease_by_one').show();
            });

            var order = {};

            $('.complete_order').click(function () {
                if (checkForm() && $('.error-msg').length === 0 && order.id && order.uoid) {

                    // Show Payment Form
                    console.log("Payment Form Shown");
                    // $('.complete_order').hide();
                    // $('.submitting_order').show();
                    $('.user-details').hide();
                    $('.payment-details').show();
                    $('html, body').animate({scrollTop: $('h1.title').offset().top}, 'slow');
                    $('.increase_by_one, .decrease_by_one').hide();

                    if (!paypal_rendered) {
                        // Paypal Integration
                        paypal.Buttons({
                            style: {
                                shape: 'rect',
                                color: 'gold',
                                layout: 'vertical',
                                label: 'checkout'
                            },
                            createOrder: function (data, actions) {

                                var first_name = $('#first_name').val().replace(/[^a-zA-Z ]/g, '');
                                var last_name = $('#last_name').val().replace(/[^a-zA-Z ]/g, '');
                                var email = $('#email').val().replace(/[^a-zA-Z_\-0-9@.]/g, '');
                                var phone = iti.getNumber().replace(/[^0-9]/g, '');
                                // var address = $('#address').val().replace(/[^a-zA-Z0-9 ]/g, '');
                                var zip_code = $('#zip_code').val().replace(/[^0-9]/g, '');
                                // var city = $('#city').val().replace(/[^a-zA-Z ]/g, '');
                                // var state = $('#state').val().replace(/[^a-zA-Z ]/g, '');
                                var country = $('#country').val().replace(/[^a-zA-Z ]/g, '');
                                if (country == 'United States') {
                                    country = 'US';
                                }

                                // $('.loader').show();
                                // Set up the transaction
                                return actions.order.create({
                                    application_context: {
                                        brand_name: 'OSHA Outreach Courses',
                                        user_action: 'PAY_NOW',
                                        shipping_preference: "NO_SHIPPING"
                                    },
                                    intent: 'CAPTURE',
                                    payer: {
                                        name: {
                                            given_name: first_name,
                                            surname: last_name
                                        },
                                        address: {
                                            // address_line_1: address,
                                            // address_line_2: '',
                                            // admin_area_2: city,
                                            // admin_area_1: state,
                                            postal_code: zip_code,
                                            country_code: country
                                        },
                                        email_address: email,
                                        phone: {
                                            phone_type: "MOBILE",
                                            phone_number: {
                                                national_number: phone
                                            }
                                        }
                                    },
                                    purchase_units: [{
                                        amount: {
                                            currency_code: "USD",
                                            value: '{{ number_format($total - $cart->discount,2) }}',
                                            breakdown: {
                                                item_total: {
                                                    currency_code: "USD",
                                                    value: '{{ number_format($total,2) }}'
                                                },
                                                discount: {
                                                    currency_code: "USD",
                                                    value: "{{ number_format($cart->discount, 2) }}"
                                                }
                                            }
                                        },
                                        description: 'Promotional Purchase from OSHA Outreach Courses',
                                        items: [
                                                @foreach($products as $course)
                                            {
                                                name: '{{ $course['item']['title'] }}',
                                                unit_amount: {
                                                    currency_code: 'USD',
                                                    value: '{{ number_format($course['item']['price'], 2) }}'
                                                },
                                                quantity: {{ $course['qty'] }},
                                                sku: 'SKU-{{ str_pad($course['item']['id'], 4, '0', STR_PAD_LEFT) }}'
                                            },
                                            @endforeach
                                        ]
                                    }]
                                });
                            },
                            onApprove: function (data, actions) {

                                $('.loader').show();
                                // Capture the funds from the transaction
                                return actions.order.capture()
                                    .then(function (details) {
                                        // console('Payment Processing...');
                                        if (details.status == 'COMPLETED' || details.status == 'APPROVED') {
                                            $('.loader').show();
                                            // Call your server to save the transaction
                                            return fetch('/paypal/capture-promotions-transaction', {
                                                method: 'post',
                                                headers: {
                                                    'content-type': 'application/json',
                                                    "Accept": "application/json, text-plain, */*",
                                                    "X-Requested-With": "XMLHttpRequest",
                                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                },
                                                body: JSON.stringify({
                                                    orderID: data.orderID,
                                                    uoid: $('input[name=uoid]').val(),
                                                    details: details
                                                })
                                            })
                                                .then(status)
                                                .then(function (response) {
                                                    if (response.status === 200) {
                                                        response.json().then(function (data) {
                                                            // console.log(data);
                                                            if (data.status) {
                                                                sendOrderLog({
                                                                    data,
                                                                    actions,
                                                                    details
                                                                }, {{LOG_STATUS_SUCCESS}})
                                                                    .then(function () {
                                                                        window.location.href = '{{ url('/promotions/success?uoid=') }}' + data.uoid;
                                                                        return true;
                                                                    });
                                                            } else {
                                                                // $('.loader').hide();
                                                                // alert('Please try again after refreshing the page.');
                                                                sendOrderLog({
                                                                    data,
                                                                    actions,
                                                                    details
                                                                }, {{LOG_STATUS_FAILED_AJAX_FAILURE}})
                                                                    .then(function () {
                                                                        window.location.href = '{{ route('promotions.failure') }}?reason=AJAXFailure';
                                                                        return false;
                                                                    });
                                                            }
                                                        });
                                                    } else {
                                                        // $('.loader').hide();
                                                        // alert('Please try again after refreshing the page.');
                                                        sendOrderLog({
                                                            data,
                                                            actions,
                                                            details
                                                        }, {{LOG_STATUS_FAILED_INTERNAL_FAILURE}})
                                                            .then(function () {
                                                                window.location.href = '{{ route('promotions.failure') }}?reason=internalFailure';
                                                                return false;
                                                            });
                                                    }
                                                });
                                        } else {
                                            // $('.loader').hide();
                                            // alert('Please try again after refreshing the page.');
                                            sendOrderLog({data, actions, details}, {{LOG_STATUS_FAILED_TO_CAPTURE}})
                                                .then(function () {
                                                    window.location.href = '{{ route('promotions.failure') }}?reason=failedToCapture';
                                                    return false;
                                                });
                                        }
                                    });
                            },
                            onError: function (err) {
                                // Show an error page here, when an error occurs
                                console.log(err);
                                sendOrderLog(err, {{LOG_STATUS_ERROR}})
                                    .then(function () {
                                        {{--window.location.href = '{{ route('promotions.failure') }}?reason=ErrorFailure';--}}
                                            return false;
                                    });
                            },
                            onCancel: function () {
                                // $('.loader').hide();
                                // alert('User Cancelled');
                            }
                        }).render('#paypal-button-container')
                            .then(function () {
                                paypal_rendered = true;
                            });
                    }

                    return false;
                }
            });

            function updateOrder() {
                if (iti.isValidNumber() == true || $('#email').val().trim() != '') {

                    var data = $('#order_details_form').serializeArray();
                    // console.log(data);
                    // Replacing contact_no with full number
                    data.forEach(function (item) {
                        if (item.name === 'contact_no') {
                            item.value = iti.getNumber();
                        }
                    });
                    // console.log(data);
                    var formData = $.param(data);
                    // console.log(formData);
                    $.post("{{ route('promotions.order_ajax') }}", formData,
                        function (result) {
                            console.log(result);
                            order = result;
                        });
                }
            }

            setInterval(function () {
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
                        type: {{LOG_TYPE_PROMOTION}},
                    })
                });
                return response.json();
            }
        });
    </script>

    <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_CLIENT_ID') }}"></script>
    <script>
        function printErrorMsg(msg) {
            // Remove All Error Messages
            $('.error-msg').remove();
            // console.log(msg);
            if (msg) {
                $.each(msg, function (key, value) {
                    // console.log(key);
                    // console.log(value);
                    $('#' + key).after('<p class="error-msg ta-right">' + value[0] + '</p>');
                });
            }
        }

        // Form Validations
        window.validate = function () {
            // Limit password to 10 characters
            $('#password').val($('#password').val().substring(0, 10));
            $('#password_confirmation').val($('#password_confirmation').val().substring(0, 10));

            var data = $('#order_details_form').serializeArray();
            // console.log(data);
            // Replacing contact_no with full number
            data.forEach(function (item) {
                if (item.name === 'contact_no') {
                    item.value = iti.getNumber();
                }
            });
            // console.log(data);
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

        $('#order_details_form .form-field').blur(window.validate);
        $('#password, #password_confirmation, #contact_no, #terms_conditions').blur(checkForm);
        $('#password, #password_confirmation, #contact_no, #terms_conditions').change(checkForm);
        $('#password, #password_confirmation, #contact_no, #terms_conditions').keyup(checkForm);
        // $('#terms_conditions').change(window.validate);
        // $('#terms_conditions').change(window.validate);

        function status(res) {
            if (!res.ok) {
                throw new Error(res.statusText);
            }
            return res;
        }
    </script>
    <style>
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
    </style>
@endsection
