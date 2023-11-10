@inject('arrays','App\Http\Utilities\Arrays')

@extends('layouts.master')

@section('title', isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Order Details | '.config('app.name') )

@section('styles')
    @if(isset($page['seo_tags']))
        @foreach($page['seo_tags'] as $meta_name => $meta_content)
            @if(!str_contains($meta_name, 'custom_'))
                <meta name="{{ $meta_name }}" content="{{ $meta_content }}"/>
            @endif
        @endforeach
    @endif
@endsection

@section('content')
    <div id="alert"
         class="alert alert-success c-alert-danger"
         style="display: none;">
        <i class="xicon icon-notification"></i>
    </div>

    <div class="page-heading">
        <h1 class="title mbpx-0">{{ isset($page['h1_heading']) ? $page['h1_heading'] : 'Order Details' }}</h1>
        <p class="subtitle"></p>
    </div>

    <section class="sec-padding cart-form mtpx-30">
        <div class="container">
            <div class="col-md-8">

                <form method="POST" id="order_details_form">
                {{ csrf_field() }}

                <!-- progressbar -->
                    <div>
                        <ul id="progressbar">
                            <li class="active" id="step_1">User Details</li>
                            <li id="step_2">Account Details</li>
                            <li id="step_3">Payment Details</li>
                        </ul>
                    </div>
                    <input type="hidden" name="uoid" value="{{ $uoid }}"/>
                    {{--                    <input type="hidden" name="web_credit" value="0"/>--}}
                    {{--Custom Banner for Sale--}}
                    @if(isset($page['seo_tags']['custom_show_banner']) && $page['seo_tags']['custom_show_banner'] == "yes")
                        <div class="custom-banner mb-2 mt-0">
                            <img class="w-100 h-100" src="{{ $page['seo_tags']['custom_desktop_banner'] }}" alt="Sale Banner" />
                        </div>
                    @endif
                    {{--Custom Banner for Sale--}}
                    <div class="user-details">
                        <input type="hidden" name="user_details" value="true">
                        <div class="row">
                            <div class="col-md-6"> {{-- pull-md-6 --}}
                                <h3 class="title mbpx-20 d-inline-block">User Details</h3>
                            </div>
                        </div>
                        <div class="row mtpx-20">
                            <div class="col-md-6">
                                <div class="control-group focused">
                                    <label class="form-label">First Name</label>
                                    {{ Form::text('first_name', old('first_name', isset($form_fields['first_name']) ? $form_fields['first_name'] : ''), ['id' => 'first_name', 'class' => $errors->has('first_name') ? 'form-field error ' : 'form-field', 'autocomplete' => 'off', 'required' => 'required']) }}
                                    @if ($errors->has('first_name'))
                                        <p class="error-msg ta-right">{{ $errors->first('first_name') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="control-group focused">
                                    <label class="form-label">Last Name</label>
                                    {{ Form::text('last_name', old('last_name', isset($form_fields['last_name']) ? $form_fields['last_name'] : ''), ['id' => 'last_name', 'class' => $errors->has('last_name') ? 'form-field error ' : 'form-field', 'autocomplete' => 'off', 'required' => 'required']) }}
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
                                    {{ Form::email('email', old('email', isset($form_fields['email']) ? $form_fields['email'] : ''), ['id'=>'email', 'class' => $errors->has('email') ? 'form-field error ' : 'form-field', 'autocomplete' => 'off', 'required' => 'required']) }}
                                    @if ($errors->has('email'))
                                        <p class="error-msg ta-right">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="control-group focused">
                                    <label class="form-label">Contact #</label>
                                    {{ Form::text('contact_no', old('contact_no', isset($form_fields['contact_no']) ? $form_fields['contact_no'] : ''), ['id'=>'contact_no', 'class' => $errors->has('contact_no') ? 'form-field error ' : 'form-field', 'autocomplete' => 'contact-no-new-6472', 'required' => 'required']) }}
                                    @if ($errors->has('contact_no'))
                                        <p class="error-msg ta-right">{{ $errors->first('contact_no') }}</p>
                                    @endif
                                    <p id="error-msg-phone" class="ta-right"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row mbpx-10">
                            <div class="col-md-6"> {{-- pull-md-6 --}}
                                <h3 class="fs-large mbpx-20">Create Account Password</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="control-group focused">
                                    <label class="form-label">Password <span class="password-help-text">(must contain at least 1 letter and 1 number)</span></label>
                                    {{ Form::password('password', ['id'=>'password', 'class' => $errors->has('password') ? 'form-field error ' : 'form-field', 'autocomplete' => 'password-new-6472', 'required' => 'required', 'maxlength' => 15]) }}
                                    <span class="xicon icon-show toggle-password"></span>
                                    @if ($errors->has('password'))
                                        <p class="error-msg ta-right">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="control-group focused">
                                    <label class="form-label">Confirm Password</label>
                                    {{ Form::password('password_confirmation', ['id'=>'password_confirmation','class' => $errors->has('password_confirmation') ? 'form-field error ' : 'form-field', 'autocomplete' => 'password-new-confirm-6472', 'required' => 'required', 'maxlength' => 15]) }}
                                    <span class="xicon icon-show toggle-password-confirmation"></span>
                                    @if ($errors->has('password_confirmation'))
                                        <p class="error-msg ta-right">{{ $errors->first('password_confirmation') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="offset-md-6 col-md-6 text-sm-center">
                                <input type="hidden" name="course_for" value="0"/>
                                <button type="submit" class="action-button float-md-right mbpx-20 complete_order">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Account Details --}}
                    <div class="account-details" style="display: none;">
                        <input type="hidden" name="user_details" value="false" disabled>
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="title mbpx-20 d-inline-block">Account Details</h3>
                            </div>
                        </div>
                        <div class="row mtpx-20">
                            <div class="col-md-12">
                                <div class="control-group focused">
                                    <label class="form-label">Street Address</label>
                                    {{ Form::text('address', old('address', isset($form_fields['address']) ? $form_fields['address'] : ''), ['id' => 'address', 'class' => $errors->has('address') ? 'form-field error ' : 'form-field', 'required' => 'required', 'disabled' => 'disabled']) }}
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
                                    {{ Form::text('zip_code', old('zip_code', isset($form_fields['zip_code']) ? $form_fields['zip_code'] : ''), ['id' => 'zip_code', 'class' => $errors->has('zip_code') ? 'form-field error ' : 'form-field', 'required' => 'required', 'disabled' => 'disabled']) }}
                                    @if ($errors->has('zip_code'))
                                        <p class="error-msg ta-right">{{ $errors->first('zip_code') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="control-group focused">
                                    <label class="form-label">City</label>
                                    {{ Form::text('city', old('city', isset($form_fields['city']) ? $form_fields['city'] : ''), ['id' => 'city', 'class' => $errors->has('city') ? 'form-field error ' : 'form-field', 'required' => 'required', 'disabled' => 'disabled']) }}
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
                                    {{-- If Order contains International course, then change the state field to text --}}
                                    @if($international_courses_included)
                                        {{ Form::text('state', null, ['id' => 'state', 'class' => $errors->has('state') ? 'form-field error ' : 'form-field', 'id' => 'state', 'required' => 'required', 'minlength' => '3', 'autocomplete' => 'off', 'disabled' => 'disabled']) }}
                                    @else
                                        {{ Form::select('state', $arrays::states(), old('state', isset($form_fields['state']) ? $form_fields['state'] : ''), ['id' => 'state', 'class' => $errors->has('state') ? 'form-field error ' : 'form-field', 'id' => 'state_select', 'required' => 'required', 'disabled' => 'disabled']) }}
                                    @endif
                                    @if ($errors->has('state'))
                                        <p class="error-msg ta-right">{{ $errors->first('state') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="control-group focused">
                                    <label class="form-label">Country</label>
                                    {{-- If Order contains International course, then change the country field to dropdown --}}
                                    @if($international_courses_included)
                                        {{ Form::select('country', $arrays::countries(), 'US', ['id' => 'country', 'class' => $errors->has('country') ? 'form-field error ' : 'form-field', 'id' => 'country']) }}
                                        @if ($errors->has('country'))
                                            <p class="error-msg ta-right">{{ $errors->first('country') }}</p>
                                        @endif
                                    @else
                                        {{ Form::text('country', 'United States', ['id' => 'country', 'readonly' => 'readonly']) }}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mtpx-15">
                                <label class="fw-medium"><input name="terms_conditions" id="terms_conditions"
                                                                class="form-field" type="checkbox" required disabled/>
                                    &nbsp;I
                                    agree to the <a href="{{ route('terms-and-conditions') }}" target="_blank"
                                                    class="fc-primary">terms and conditions</a>.</label>
                            </div>
                            <div class="w-auto ml-auto">
                                <button type="button" class="action-button-previous mbpx-20 user_details_btn">
                                    Previous
                                </button>
                                <button type="submit" class="action-button mbpx-20 complete_order_payment">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                    {{-- Account Details --}}


                    <div class="payment-details" style="display: none;">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="title mbpx-20 d-inline-block">Payment Details</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 text-sm-center push-md-2">
                                <div class="buy-now" style="display: block;">
                                    <form id="payment-form" style="z-index: 99999">
                                        <div id="payment-element"><!-- Mount the Payment Element here --></div>
                                        <button type="submit" class="pay-now-btn">
                                            <div class="spinner hidden" id="spinner"></div>
                                            <span id="button-text">Pay now</span>
                                        </button>
{{--                                        <p class="fs-small fw-semi-bold ta-center ml-3 mr-3 mt-3">--}}
{{--                                            Note: Do not refresh the page during payment processing;--}}
{{--                                            stay a few seconds on the page while we set up your LMS account.--}}
{{--                                            Thank you!--}}
{{--                                        </p>--}}
                                        <p id="card-error" role="alert"></p>
                                        <p class="result-message hidden">
                                            Payment made successfully
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="offset-md-2 col-md-8 text-sm-center">
                                <button type="button" class="action-button-previous m-auto mbpx-20 account_details_btn">
                                    Previous
                                </button>
                            </div>
                        </div>
                        <div class="row" id="accepted-payment-methods-payment-details">
                            <div class="offset-md-3 col-md-6 text-center">
                                <img
                                        src="https://res.cloudinary.com/elearning-avenue24/image/upload/v1629970736/assets/images/payment-icon_v0bukh_vyudz2_euyopm.png"
                                        alt="Accepted Payment Methods"
                                        title="Visa, Mastercard, AMEX, JCB"
                                >
{{--                                <span class="fc-grey">We accept: </span>--}}
{{--                                <picture>--}}
{{--                                    <source srcset="{{ asset('/images/payment-methods.webp') }}" type="image/webp">--}}
{{--                                    <source srcset="{{ asset('/images/payment-methods.png') }}" type="image/png">--}}
{{--                                    <img src="{{ asset('/images/payment-methods.png') }}"--}}
{{--                                         alt="Accepted Payment Methods">--}}
{{--                                </picture>--}}
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-4">
                <div class="cartWrapper">
                    <div class="headingParentWrapper">
                        <div class="row" style="display: flex;">
                            <div class="col-md-6">
                        <h3 class="title">Cart</h3>
                            </div>
                            <div class="col-md-6" style="display: flex;justify-content: flex-end;align-items: center;">
                                <span class="float-right fs-medium fc-primary">
                                    {{ count($products) }} Item(s)
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="shoppingParentWrapper">
                        <div class="headingWrapper">
                            <p><b>Courses</b></p>
                        </div>
                        <div class="shopping-cart cart-form">
                            @foreach($products as $course)
                            <div class="cartItem">
                                <span class="fs-medium fw-bold">{{ $course['item']['title'] }}</span><br/>
                                <span class="fs-medium">Qty: &nbsp;
                                        @if(!in_array($course['item']['id'], [COURSE_FREE_INFECTION_CONTROL, COURSE_FREE_PANDEMIC_COVID_19]) )
                                            <a href="{{ route('product.reduceByOne', ['id' => $course['item']['id']]) }}"
                                            class="decrease_by_one">
                                            <span class="icon-minus-solid" aria-hidden="true"></span>
                                        </a>&nbsp;
                                        @endif
                                        <strong class="fc-primary">{{ $course['qty'] }}</strong>&nbsp;
                                        @if(!in_array($course['item']['id'], [COURSE_FREE_INFECTION_CONTROL, COURSE_FREE_PANDEMIC_COVID_19]) )
                                        <a href="{{ route('product.increaseByOne', ['id' => $course['item']['id']]) }}"
                                        class="increase_by_one">
                                        <span class="icon-add-solid" aria-hidden="true"></span>
                                    </a>
                                    @endif
                                </span><br/>
                                <span class="fs-medium" style="line-height: 1;">Price/Unit:
                                    @if(!empty($course['item']['discounted_price']))
                                        <strong
                                        class="fc-primary h5">${{ number_format($course['item']['discounted_price'], 2) }}</strong>
                                        <small
                                        class="price-lt">${{ number_format($course['item']['price'], 2) }}</small>
                                        @else
                                        <strong
                                        class="fc-primary">${{ number_format($course['item']['price'], 2) }}</strong>
                                    @endif
                                </span>
                            </div>
                            @endforeach
                    </div>
                    </div>
                    <div class="free-course-box">
                    <div class="headingWrapper">
                        <p><b>Free Course(s)</b></p>
                    </div>
                        @if($free_course_group === false)
                            {{--  Is Group Customer --}}
                            <p class="fs-medium mbpx-10">
                                @if($free_course_qty > 1)
                                    Please select
                                    <span class="free-course-qty">
                                        {{ $free_course_qty }}
                                    </span>
                                    free courses
                                @else
                                    Please select a free course
                                @endif
                            </p>
                            <div class="fs-medium" id="free-course-multiselect"></div>
                            <span class="fs-medium"></span>
                            {{--  Is Group Customer --}}
                        @else
                            <span class="fs-medium">
                                You have {{ $free_course_qty }} Free Course(s),
                                you can assign them from our LMS
                            </span>
                            <br />
                        @endif
                    </div>
                    @if(!$cart->disallowCoupon)
                    <div class="couponWrapper">
                        <div class="headingWrapper">
                            <p><b>Discount</b></p>
                        </div>
{{--                        <div class="row">--}}
{{--                            <div class="col-md-12">--}}
{{--                                <!-- <h3 class="title mbpx-10">Coupon</h3> -->--}}
{{--                                <p class="fs-medium mbpx-10">--}}
{{--                                    Use Promo Code <strong class="fc-red">OSHA21</strong> to Save <strong>$21</strong>--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        {!! Form::open(['route' => 'coupon.apply', 'method' => 'post']) !!}
                        <div class="row">
                            <div class="col-12 prpx-0">
                                <div class="control-group focused">
                                    @if(empty($cart->coupon))
                                        {{ Form::text('coupon_code', null, ['autocomplete' => 'off','placeholder'=>'Promo Code','class' => $errors->has('coupon_code') ? 'form-field error ' : 'form-field']) }}
                                        <input type="submit" class="btn --btn-primary" style="padding: 11px 20px;" value="Apply">
                                    @else
                                        <input autocomplete="off" placeholder="{{ $cart->coupon->code }}" readonly="readonly" class="form-field" name="coupon_code" type="text">
                                        <a href="{{ route('coupon.remove') }}">
                                            <button type="button" class="removeCoupon btn --btn-danger" style="padding: 11px 20px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z"/>
                                                </svg>
                                            </button>
                                        </a>
                                    @endif
                                </div>
                                @if ($coupon_error)
                                    <p class="coupon-code-error error-msg">Invalid discount code.</p>
                                @endif
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    @endif
                    @if($cart->discount || $cart->couponDiscount)
                        <div class="cartTotalCalc">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="headingWrapper">
                                        <p><b>Your Order</b></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <span class="fs-medium">
                                    Sub Total:
                                </span>
                                    <strong class="float-right fs-medium fc-primary">${{ number_format($total,2) }}</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <span class="fs-medium">
                                    Discount:
                                </span>
                                    <strong
                                        class="float-right fs-medium fc-red">${{ number_format($cart->discount,2) }}</strong>
                                </div>
                            </div>
                            @if($cart->couponDiscount)
                                <div class="row">
                                    <div class="col-md-12">
                            <span class="fs-medium">Promo Code:
                                </span>
                                        <strong
                                            class="float-right fs-medium fc-red">${{ number_format($cart->couponDiscount,2) }}</strong>
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="totalWrap">
                                    <span class="fs-large fw-bold">
                                        Total Payable:
                                    </span>
                                        <strong
                                            class="float-right fc-green h4">${{ number_format($total - ($cart->discount + $cart->couponDiscount),2) }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-12">
                                <span class="fs-large fw-bold">
                                    Total Payable:
                                </span>
                                <strong
                                    class="fc-red h4">${{ number_format($total,2) }}</strong>
                            </div>
                        </div>

                        <span class="fs-medium float-right mr-3">{{ count($products) }} Item(s)</span>
                    @endif


                        <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : ''  }}">
                            {{ Session::get('error') }}
                        </div>
                    </div>
                
                @include('partials._reviews_sa')
            </div>
        </div>
    </section>
    @if(!session()->has('comingFromSalePage'))
        @include('partials._related_courses')
    @endif
    @stack('related_courses_lang_modals')
    <style>
        .prpx-0 {
            padding-right: 0 !important;
        }

        .plpx-0 {
            padding-left: 0 !important;
        }

        .coupon-code-error{
            position: relative;
            left:0;
            right:0;
            text-align: center;
        }

        {{-- For language modal --}}
        .lang {
            width: 30px;
            height: 20px;
            display: inline-block;
            margin: 0px 5px -5px;
            border: 1px solid #000;
        }

        .no-webp .lang.lang-en {
            background: url('{{ asset('images/flags_sprites.png') }}') -90px -0;
        }

        .no-webp .lang.lang-es {
            background: url('{{ asset('images/flags_sprites.png') }}') -120px -0;
        }

        .webp .lang.lang-en {
            background: url('{{ asset('images/flags_sprites.webp') }}') -90px -0;
        }

        .webp .lang.lang-es {
            background: url('{{ asset('images/flags_sprites.webp') }}') -120px -0;
        }
        .couponWrapper .control-group.focused {
            display: flex;
            padding:0 15px;
            margin-bottom:0;
        }
        {{-- For language modal --}}
    </style>
@endsection

@section('scripts')
    <script src="{{ asset('/src/js/intlTelInput.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/src/css/intlTelInput.min.css') }}">

    {{--  Selectize.js, load only for Normal user  --}}
    @if($free_course_group === false)
        <script src="{{ asset('/src/js/selectize-standalone.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('/src/css/selectize.min.css') }}">
    @endif

    <style>
        .iti__flag {
            background-image: url("{{ asset('/src/images/flags.png') }}");
        }

        @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
            .iti__flag {
                background-image: url("{{ asset('/src/images/flags@2x.png') }}");
            }
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

        ul.iti__country-list {
            z-index: 101;
        }

        #error-msg-phone {
            color: red;
            font-size: 14px;
            position: absolute;
            right: 0;
        }

        .removeCoupon.btn.--btn-primary {
            border: 2px solid #005384;
            padding: 8px 40px;
            font-size: 16px;
        }

        .removeCoupon.btn.--btn-danger svg {
            height: 15.8px;
            width: 15px;
            fill:#fff;
        }
        .removeCoupon.btn.--btn-danger {
            border: 2px solid #EF4444;
            background-color: #EF4444;
            color: white;
            display: flex;
            align-items:Center;
            justify-content:Center;
            padding: 9px 40px;
            /* padding-bottom:9px; */
            font-size: 16px;
            border-radius: 25px;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            cursor: pointer !important;
            padding: 10px 15px !important;
            font-size: 13px !important;
            font-weight: bold;
            border: 0 none !important;
        }

        div#accepted-payment-methods-payment-details .offset-md-3.col-md-6 {
            display: flex;
            align-items: center;
        }

        div#accepted-payment-methods-payment-details span {
            width: 50%
        }

        span.fs-medium small {
            position: relative;
        }

        small.price-lt:before {
            display: block;
            content: "";
            position: absolute;
            left: 5%;
            top: 46%;
            width: 100%;
            height: 1px;
            background-color: #fc4a1a;
            transform: rotate(
                -17deg
            );
        }
    </style>
    <script>
        var stripe_rendered = false;

        $(document).ready(function () {
            @if($free_course_group === false)
            // Free Course Multiselect
            const maxItems = parseInt("{{ $free_course_qty }}");
            var selectize = $("#free-course-multiselect").selectize({
                options: [
                    {name: "Active Shooter", value: "63c958133a6d120a3e590956"},
                    {name: "Human Trafficking Awareness", value: "63c958133a6d120a3e590957"},
                ],
                placeholder: "Select Free Course(s)",
                items: [],
                valueField: "value",
                labelField: "name",
                searchField: ["name"],
                plugins: maxItems > 1 ? ['remove_button'] : [],
                closeAfterSelect: true,
                singleOverride: true,
                maxItems: maxItems,
                create: false,
                persist: false,
                onChange: function(val) {
                    const selectedItems = this.items;

                    var formData = {
                        free_courses: selectedItems.length > 0 ? JSON.stringify(selectedItems) : null,
                        _token: $("input[name=_token]").val()
                    }
                    $.post("{{ route('order.ajax') }}", formData,
                        function (result) {
                            if (result === 'redirect') {
                                window.location.reload();
                            }
                            order = result;
                        });
                }
            });
            @endif


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
        });

        $(window).load(function () {
            // Focus Error Msg
            if ($('p.error-msg').length > 0) {
                $(window).scrollTop($('p.error-msg:first').offset().top - 10)
            }
        });

        $('#password, #password_confirmation').change(function () {
            $('#password').val($('#password').val().substring(0, 15));
            $('#password_confirmation').val($('#password_confirmation').val().substring(0, 15));
        });

        $('#password, #password_confirmation').blur(function () {
            $('#password').val($('#password').val().substring(0, 15));
            $('#password_confirmation').val($('#password_confirmation').val().substring(0, 15));
        });

        function checkFormUserDetails() {
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

            if ($('form')[0].checkValidity()) {
                {{--fbq('track', 'InitiateCheckout', {value: '{{ $total }}',currency: 'USD'});--}}
                    return true;
            }

            return false;

        }

        function checkFormAccntDetails() {
            var terms_conditions = document.getElementById('terms_conditions');

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

            if ($('.user-details').is(':visible')) {
                checkFormUserDetails();
            } else if ($('.account-details').is(':visible')) {
                checkFormAccntDetails();
            }

            // e.preventDefault();
            return false;
        });

        $(document).ready(function () {
            // Show Payment Details Div Directly if User is logged In

            /* go back to user details form section */
            function gotoUserDetails() {
                $(".account-details :input").attr("disabled", true);
                $('.payment-details').hide();
                $('.account-details').hide();
                $('#step_2').removeClass('active')
                $('.user-details').show();
                $('html, body').animate({scrollTop: $('h1.title').offset().top}, 'slow');
                $('.increase_by_one, .decrease_by_one').show();
            }

            $('.user_details_btn').click(function () {
                gotoUserDetails();
            });

            $('#step_1').click(function () {
                if ($('.account-details').is(':visible')) {
                    gotoUserDetails();
                }
            });
            /* go back to user details form section */

            /* go back to account details form section */
            function gotoAccountDetails() {
                @if($free_course_group === false)
                $("#free-course-multiselect")[0].selectize.enable()
                @endif
                $('.payment-details').hide();
                $('.account-details').show();
                $('.user-details').hide();
                // show payment method images on right
                $('#accepted-payment-methods').show();
                $('#step_3').removeClass('active');
                $('html, body').animate({scrollTop: $('h1.title').offset().top}, 'slow');
                $('.increase_by_one, .decrease_by_one').show();
            }

            $('.account_details_btn').click(function () {
                stripe_rendered = false;
                gotoAccountDetails();
            });

            $('#step_2').click(function () {
                if ($('.payment-details').is(':visible')) {
                    gotoAccountDetails();
                }
            });
            /* go back to account details form section */


            var order = {};

            $('.complete_order').click(function () {
                if (checkFormUserDetails() && $('.user-details .error-msg').length === 0 && order.id && order.uoid) {

                    $(".account-details :input").attr("disabled", false)
                    $('.user-details').hide();
                    $('.account-details').show();
                    $('#step_2').addClass('active');
                    $('html, body').animate({scrollTop: $('h1.title').offset().top}, 'slow');
                    $('.increase_by_one, .decrease_by_one').hide();

                    return false;
                }
            });

            async function renderStripeElements() {
                // Disable the button until we have Stripe set up on the page
                $(".pay-now-btn").prop('disabled', true);

                var stripe = Stripe("{{ env('STRIPE_PUBLISHABLE_KEY') }}");

                // The items the customer wants to buy
                var purchase = {
                    items: [{id: "xl-tshirt"}],
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

                        var elements = stripe.elements({
                            clientSecret: data.clientSecret,
                        })

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

                        /* Get Address and billing details */
                        const userDetailsObj = {
                            firstName: $("#first_name").val(),
                            lastName: $("#last_name").val(),
                            phone: window.iti.getNumber(),
                            city: $("#city").val(),
                            addressLine1: $("#address").val(),
                            postal_code: $("#zip_code").val(),
                            state: $("#state").val(),
                            email: $("#email").val()
                        }

                        var card = elements.create("payment",
                            {
                                defaultValues: {
                                    billingDetails: {
                                        name: `${userDetailsObj.firstName} ${userDetailsObj.lastName}`,
                                        email: userDetailsObj.email,
                                        phone: userDetailsObj.phone,
                                        address: {
                                            line1: userDetailsObj.addressLine1,
                                            line2: "",
                                            city: userDetailsObj.city,
                                            state: userDetailsObj.state,
                                            country: "US",
                                            postal_code: userDetailsObj.postal_code
                                        }
                                    }
                                }
                            }
                        );
                        card.mount("#payment-element");

                        // Stripe injects an iframe into the DOM
                        // // Stripe injects an iframe into the DOM
                        // card.mount("#card-element");

                        card.on("change", function (event) {
                            // get payment method
                            window.paymentMethod = event.value.type

                            // Disable the Pay button if there are no card details in the Element
                            $(".pay-now-btn").prop("disabled", event.empty);
                            $("#card-error").text(event.error ? event.error.message : "");
                            // $("#card-error").removeClass(event.error ? "hidden" : "");
                        });

                        $(".pay-now-btn").on("click", function (event) {
                            event.preventDefault();
                            // Complete payment when the submit button is clicked
                            payWithCard(stripe, card, data.clientSecret, elements, userDetailsObj);
                        })

                    });
            }

            /* Stripe Helper Functions */

            // Calls stripe.confirmCardPayment
            // If the card requires authentication Stripe shows a pop-up modal to
            // prompt the user to enter authentication details without leaving your page.
            var payWithCard = function (stripe, card, clientSecret, elements, userDetailsObj) {

                loading(true);

                // Trigger form validation and wallet collection
                elements.submit().then(({error: submitError}) => {
                    if (submitError) {
                        // handleError(submitError);
                        $("#card-error").text(submitError);
                    }
                })

                stripe
                    .confirmPayment({
                        elements,
                        confirmParams: {
                            return_url: "{{ url('stripe/capture-redirect-payments') }}",
                            shipping: {
                                address: {
                                    city: userDetailsObj.city,
                                    country: "US",
                                    line1: userDetailsObj.addressLine1,
                                    // line2: "Somewhere",
                                    postal_code: userDetailsObj.postal_code,
                                    state: userDetailsObj.state
                                },
                                name: `${userDetailsObj.firstName} ${userDetailsObj.lastName}`,
                                phone: userDetailsObj.phone
                            },
                            payment_method_data: {
                                billing_details: {
                                    address: {
                                        city: userDetailsObj.city,
                                        country: "US",
                                        line1: userDetailsObj.addressLine1,
                                        // line2: "Somewhere",
                                        postal_code: userDetailsObj.postal_code,
                                        state: userDetailsObj.state
                                    },
                                    email: userDetailsObj.email,
                                    name: `${userDetailsObj.firstName} ${userDetailsObj.lastName}`,
                                    phone: userDetailsObj.phone
                                }
                            }
                        },
                        redirect: "if_required",
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

            function beforeUnloadListener(event) {
                event.preventDefault();
                return event.returnValue = "Are you sure you want to exit?";
            }

            // Show a spinner on payment submission
            var loading = function (isLoading) {
                if (isLoading) {
                    // Disable the button and show a spinner
                    $(".pay-now-btn").prop("disabled", true);

                    $("#spinner").show(0, function () {
                        if(window.paymentMethod === "card") {
                            addEventListener("beforeunload", beforeUnloadListener, {capture: true});
                        }
                    });

                    $("#button-text").hide();
                } else {
                    $(".pay-now-btn").prop("disabled", false);

                    $("#spinner").hide(0, function () {
                        removeEventListener("beforeunload", beforeUnloadListener, {capture: true});
                    });

                    $("#button-text").show();
                }
            };
            /* Stripe Helper Functions */

            $('.complete_order_payment').click(function () {

                if (order.allDetailsSaved === false) {
                    showAlert('Please fill all details to proceed', 'danger');
                }

                if (checkFormAccntDetails() && $('.account-details .error-msg').length === 0 && order.id && order.uoid && order.allDetailsSaved === true) {

                    /*
                        Disable Selectize when Payment Form is shown,
                        only for normal checkout
                    */
                    @if($free_course_group === false)
                    $("#free-course-multiselect")[0].selectize.disable()
                    @endif
                    // Show Payment Form
                    // $('.complete_order').hide();
                    // $('.submitting_order').show();
                    $('.account-details').hide();
                    $('.payment-details').show();
                    // hide payment methods on right
                    $('#accepted-payment-methods').hide();
                    $('#step_3').addClass('active');
                    $('html, body').animate({scrollTop: $('h1.title').offset().top}, 'slow');
                    $('.increase_by_one, .decrease_by_one').hide();

                    if (!stripe_rendered) {
                        renderStripeElements()
                    }

                    return false;
                }
            });

            function updateOrder() {
                if (iti.isValidNumber() == true || $('#email').val().trim() != '') {

                    var data = $('#order_details_form').serializeArray();

                    // Replacing contact_no with full number
                    data.forEach(function (item) {
                        if (item.name === 'contact_no') {
                            item.value = iti.getNumber();
                        }
                    });
                    var formData = $.param(data);

                    $.post("{{ route('order.ajax') }}", formData,
                        function (result) {
                            if (result === 'redirect') {
                                window.location.reload();
                            }
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
        });
    </script>

    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('src/js/jquery.ba-throttle-debounce.min.js') }}"></script>
    <script>
        $('.toggle-password').on('click', function () {
            if ($(this).hasClass('icon-show')) {
                $('#password').prop("type", "text");
                $(this).removeClass('icon-show').addClass('icon-hide');
            } else if ($(this).hasClass('icon-hide')) {
                $('#password').prop("type", "password");
                $(this).removeClass('icon-hide').addClass('icon-show');
            }
        })

        $('.toggle-password-confirmation').on('click', function () {
            if ($(this).hasClass('icon-show')) {
                $('#password_confirmation').prop("type", "text");
                $(this).removeClass('icon-show').addClass('icon-hide');
            } else if ($(this).hasClass('icon-hide')) {
                $('#password_confirmation').prop("type", "password");
                $(this).removeClass('icon-hide').addClass('icon-show');
            }
        })

        function printErrorMsg(msg) {
            // Remove All Error Messages
            $('.error-msg').remove();
            if (msg) {
                $.each(msg, function (key, value) {
                    $('#' + key).after('<p class="error-msg ta-right">' + value[0] + '</p>');
                });
            }
        }

        function showAlert(message, type = 'success') {
            var alertDiv = $('#alert');

            alertDiv.append('<strong>' + message + '</strong>');

            if (type === 'danger')
                alertDiv.attr('class', 'alert c-alert-danger');
            else
                alertDiv.attr('class', 'alert alert-success');

            alertDiv.fadeIn(1500);
            alertDiv.fadeTo(2000, 500).slideUp(500, function () {
                alertDiv.slideUp(1500);
                $('#alert strong').remove();
                // window.location.reload();
            });
        }

        // Form Validations
        window.validate = function () {
            // Limit password to 10 characters
            $('#password').val($('#password').val().substring(0, 15));
            $('#password_confirmation').val($('#password_confirmation').val().substring(0, 15));

            var data = $('#order_details_form').serializeArray();

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

        $('#order_details_form .form-field').blur(window.validate);


        $('#contact_no, #terms_conditions').blur(checkFormUserDetails);
        $('#password, #password_confirmation').blur(checkFormAccntDetails);

        $('#contact_no, #terms_conditions').change(checkFormUserDetails);
        $('#password, #password_confirmation').change(checkFormAccntDetails);

        $('#contact_no, #terms_conditions').keyup(checkFormUserDetails);
        $('#password, #password_confirmation').keyup(checkFormAccntDetails);
        // $('#terms_conditions').change(window.validate);
        // $('#terms_conditions').change(window.validate);

        // Added to remove error on changing password confirmation
        $('#password_confirmation, #password').keyup($.debounce(500, window.validate));


        function status(res) {
            if (!res.ok) {
                throw new Error(res.statusText);
            }
            return res;
        }
    </script>
    {{--    <script>--}}
    {{--        if (!$('#payment-alert').is(':visible')) {--}}
    {{--            $('#accepted-payment-methods').on('click', function () {--}}
    {{--                if(!$('.payment-details').is(':visible')) {--}}
    {{--                    $("#payment-alert").fadeTo(2000, 500).slideUp(500, function () {--}}
    {{--                        $("#payment-alert").slideUp(1500);--}}
    {{--                    });--}}
    {{--                }--}}
    {{--            })--}}
    {{--        }--}}
    {{--    </script>--}}
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
            saLoadScript(
                'https://www.shopperapproved.com/widgets/testimonial/3.0/33391-134875132-134836734-140727333-139765614-139684707-139493782-138707651-' +
                '139042896-138845769-136006660-137160903-136783770-136570262-135845352-134875132-134836734-134715480-132690742-130329121-130541346.js'
            );
        shopper_first = true;
    </script>
    {{-- Shopper Approved review script --}}
    <style>
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            opacity: 0.7;
            background: url('{{asset('/loader.gif')}}') center no-repeat #e9e9e9;
        }

        /*progressbar*/
        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            /*CSS counters to number the steps*/
            counter-reset: step;
            padding: 15px;
        }

        #progressbar li {
            list-style-type: none;
            color: black;
            text-align: center;
            text-transform: uppercase;
            font-size: 12px;
            width: 33.33%;
            float: left;
            position: relative;
            letter-spacing: 1px;
        }

        #progressbar li:before {
            content: counter(step);
            counter-increment: step;
            width: 24px;
            height: 24px;
            line-height: 26px;
            display: block;
            font-size: 12px;
            color: white;
            background: lightblue;
            border-radius: 25px;
            position: relative;
            margin: 0 auto 10px auto;
            z-index: 111;
        }

        /*progressbar connectors*/
        #progressbar li:after {
            content: '';
            width: 100%;
            height: 3px;
            background: lightblue;
            position: absolute;
            left: -50%;
            top: 9px;
            z-index: 1; /*put it behind the numbers*/
        }

        #progressbar li:first-child:after {
            /*connector not needed before the first step*/
            content: none;
        }

        /*marking active/completed steps green*/
        /*The number of the step and the connector before it = green*/
        #progressbar li.active:before, #progressbar li.active:after {
            background: #005384;
            color: white;
        }

        #progressbar li.active:hover {
            color: #005384;
            text-decoration: underline;
            cursor: pointer;
        }

        .action-button {
            width: 100px;
            background: #005384 !important;
            font-weight: bold;
            color: white !important;
            border: 0 none !important;
            border-radius: 25px;
            cursor: pointer !important;
            padding: 10px 5px !important;
            margin: 10px 5px;
            font-size: 13px !important;
        }

        .action-button:hover, .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #005384;
        }

        .action-button-previous {
            width: 100px;
            background: lightblue !important;
            font-weight: bold;
            color: white !important;
            border: 0 none !important;
            border-radius: 25px;
            cursor: pointer !important;
            padding: 10px 5px !important;
            margin: 10px 5px;
            font-size: 13px !important;
        }

        .action-button-previous:hover, .action-button-previous:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px lightblue;
        }

        .toggle-password, .toggle-password-confirmation {
            position: absolute;
            top: 0;
            bottom: 0;
            height: fit-content;
            height: -moz-fit-content;
            height: -webkit-fit-content;
            right: 2%;
            margin: auto;
            z-index: 8;
        }

        .password-help-text {
            color: #005384;
            font-weight: 900;
        }

        #alert {
            margin: auto;
            position: fixed;
            right: 0;
            left: 0;
            top: 12%;
            width: 40%;
            text-align: center;
            font-size: 15px;
            z-index: 9999;
        }

        .alert-success {
            background-color: #04AA6D;
            color: white;
        }

        .c-alert-danger {
            background-color: #f44336;
            color: white;
        }

        @media (max-width: 1200px) {
            form .control-group.focused .form-label, .cart-form .control-group.focused .form-label {
                line-height: 1;
            }

            form .control-group, .cart-form .control-group {
                padding-top: 15px;
            }
        }

        /* Stripe element changes */
        .pay-now-btn {
            /*background: #5469d4 !important;*/
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
            .row.related-course-slider.slick-initialized.slick-slider {
                max-width: 300px;
                margin: auto;
            }
        }


        /*Card styling*/

        .buy-now .StripeElement {
            border-radius: 4px 4px 0 0;
            padding: 12px;
            border: 1px solid rgba(0, 58, 92, .1);
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
        .cartWrapper .free-course-box .selectize-input{
            border-radius: 25px;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
            font-size: 13px !important;
            padding: 8px 15px !important;
            font-family: "Poppins", sans-serif;
            height: 100%;
        }
        .cartWrapper .free-course-box .selectize-input:not(.has-items) input{
            width:100%!important;
        }
        .couponWrapper form input[type="text"]{
            border-radius: 25px;
            border-top-right-radius: 0;
            font-family: "Poppins", sans-serif;
            border-bottom-right-radius: 0;
            padding: 7px 15px !important;
            font-size: 13px !important;
            width: calc(100%);
            height: 100%;
        }
        .couponWrapper form input[type="text"]::placeholder,
        .cartWrapper input#free-course-multiselect-selectized::placeholder{
            font-size: 13px !important;
            color:#1d1d1d;
        }
        .couponWrapper form input[type="submit"] {
            border-radius: 25px;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            cursor: pointer !important;
            padding: 10px 15px !important;
            font-size: 13px !important;
            font-weight: bold;
            border: 0 none !important;
        }
        .couponWrapper form input[type="submit"] {
            background: #005384 !important;
            color: white !important;
        }

        .cart-form  .iti {
            width: 100%;
        }
    </style>
@endsection
