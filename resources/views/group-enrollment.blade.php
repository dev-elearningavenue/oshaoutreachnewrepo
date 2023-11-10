@inject('arrays','App\Http\Utilities\Arrays')
@extends('layouts.master')

@section('title', isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Group Enrollment Application | '.config('app.name') )

@section('styles')
    @if(isset($page['seo_tags']))
        @foreach($page['seo_tags'] as $meta_name => $meta_content)
            @if($meta_name != 'title')
                <meta name="{{ $meta_name }}" content="{{ $meta_content }}"/>
            @endif
        @endforeach
    @endif
    <meta property="og:title"
          content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Group Enrollment Application' }}">
    <meta property="twitter:title"
          content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Group Enrollment Application' }}">
    <meta property="og:description"
          content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'Group Enrollment Application' }}">
    <meta property="twitter:description"
          content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'Group Enrollment Application' }}">
    <meta property="og:image" content="{{ url('/images/osha-outreach-courses.png') }}">
    <meta property="twitter:image" content="{{ url('/images/osha-outreach-courses.png') }}">
    <!-- Meta Tags for Social Media -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="OSHA Outreach Courses">
    <meta property="fb:app_id" content="817832821974771"/>
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:site" content="@OshaOutreach">
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "BreadcrumbList",
        "name": "Breadcrumb",
        "itemListElement": {
            "@type": "ListItem",
            "position": 1,
            "name": "{{ isset($page['h1_heading']) ? $page['h1_heading'] : 'Group Enrollment Application' }}"
        }
    }

    </script>
    @if(env('PROMOTIONS') == true)
        <style>
            .password-help-text {
                color: #005384;
                font-weight: 900;
                font-size: 12px;
            }

            .toggle-password, .toggle-password-confirmation {
                position: absolute;
                top: 50%;
                right: 2%;
                z-index: 8;
            }

            @media (max-width: 767px) {
                .group-enrollment-intro .title {
                    font-size: 24px;
                }

                .hero-banner.\--inner-banner {
                    height: auto;
                }
            }

            .group-enrollment-intro .subtitle {
                font-size: 26px;
                color: #005384;
                margin: 10px 0 0;
            }

            @media (max-width: 767px) {
                .group-enrollment-intro .subtitle {
                    font-size: 20px;
                }
            }

            #discount-banner img {
                margin: 0 auto;
            }

            #discount-banner {
                max-width: 768px;
                width: 100%;
                margin: 0 auto 40px auto;
                display: block;
            }

            #discount-banner-mobile {
                display: none;
            }

            @media (max-width: 425px) {
                #discount-banner {
                    display: none;
                }

                #discount-banner-mobile {
                    display: block;
                    margin: 0 auto 20px auto;
                }
            }
        </style>
    @endif
@endsection

@section('content')

    {{--<section class="hero-banner --inner-banner"
             style="background-image: url('{{ asset('images/group-enrollment-banner.jpg') }}')">
        <div class="inner-content">
            <div class="container">
                <h1 class="title">{{ isset($page['h1_heading']) ? $page['h1_heading'] : 'Group Enrollment Application' }}</h1>
            </div>
        </div>
    </section>--}}

    <div class="page-heading">
        <h1 class="title mbpx-0">{{ isset($page['h1_heading']) ? $page['h1_heading'] : 'Group Enrollment' }}</h1>
        <p class="subtitle"></p>
    </div>

    @if($form_submit)
        <section class="group-enrollment-intro sec-padding">
            <div class="container">
                <h3 class="title">Thankyou</h3>
                <p class="subtitle">Your form has been submit, One of our account manager will contact you soon.</p>
            </div>
        </section>
    @else

        <section class="group-enrollment-intro">
            <div class="container">
                <div class="row mb-2">
                    <div class="box --course-objectives col-md-12 mtpx-20">
                        <p class="desc" style="text-align: center; font-size: 15px !important;">OSHA Outreach Courses brings out to you the most
                            amazing discount benefit from the bulk enrollment discount. Bulk enrollment
                            discounts are available for the most in-demand and desired courses including OSHA 10 and
                            OSHA 30. Through OSHA Outreach Courses
                            avail great discounts from bulk enrollment which is specially designed to accommodate
                            companies and workers who wish to enroll in bulk.
                            OSHA 10-Hour and OSHA 30-Hour courses are OSHA certified and industry-approved courses that
                            provide hands-on knowledge and help
                            companies to achieve optimum safety. Get optimum safety at a great discounted price! Enroll
                            now!</p>
                    </div>
                </div>

{{--                <div class="row">--}}
{{--                    <div class="">--}}
{{--                        <picture id="discount-banner">--}}
{{--                            <source srcset="{{ asset('/images/group-discount-banner.webp') }}" type="image/webp">--}}
{{--                            <source srcset="{{ asset('/images/group-discount-banner.jpg') }}" type="image/jpg">--}}
{{--                            <img src="{{ asset('/images/group-discount-banner.jpg') }}" alt="Group Enrollment Discount Offer">--}}
{{--                        </picture>--}}
{{--                        <picture id="discount-banner-mobile">--}}
{{--                            <source srcset="{{ asset('/images/group-discount-banner-mobile.webp') }}" type="image/webp">--}}
{{--                            <source srcset="{{ asset('/images/group-discount-banner-mobile.jpg') }}" type="image/jpg">--}}
{{--                            <img src="{{ asset('/images/group-discount-banner-mobile.jpg') }}"--}}
{{--                                 alt="Group Enrollment Discount Offer">--}}
{{--                        </picture>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="row no-gutter group-enrollment-pricing" style="border-collapse: collapse">
                    <div class="col-md-12">
                        <h3 class="ta-center fc-white bg-black static">
                            Discounted Rates<span>&nbsp;&nbsp;&nbsp;<i class="xicon icon-circle-up"></i></span>
                        </h3>
                        <h3 class="ta-center fc-white bg-black clickable">
                            View Discounted Rates&nbsp;&nbsp;&nbsp;<i class="xicon icon-circle-down"></i>
                        </h3>
                    </div>

                    <div class="col-md-6 col-sm-12 discounted_rates">
                        <a href="#"><strong
                                    class="ta-center course float-left w-100">ALL OSHA 10-HOUR COURSES</strong></a>
                        <p class="desc fc-black pricing float-left w-50 ta-center"><span
                                    class="heading font-weight-900">Quantity</span></p>
                        <p class="desc fc-black pricing float-right w-50 ta-center"><span class="heading font-weight-900">Price</span>
                        </p>
                        <p class="desc pricing float-left w-50 ta-center"><span>2-15</span></p>
                        <p class="desc pricing w-50 float-right ta-center"><span class="font-weight-900 fc-dark-red">$49</span></p>
                        <p class="desc pricing float-left w-50 ta-center"><span>16+</span></p>
                        <p class="desc pricing w-50 float-right ta-center"><span class="font-weight-900 fc-dark-red">$48</span></p>
{{--                        <p class="desc pricing float-left w-50 ta-center"><span class="font-weight-900">100+</span></p>--}}
{{--                        <p class="desc pricing w-50 float-right ta-center"><span class="font-weight-900 fc-dark-red">$45</span></p>--}}
                    </div>

                    <div class="col-md-6 col-sm-12 discounted_rates">
                        <a href="#"><strong
                                    class="ta-center course float-left w-100" style="background-color: #2779AB !important;">ALL OSHA 30-HOUR COURSES</strong></a>
                        <p class="desc fc-black pricing float-left w-50 ta-center"><span
                                    class="heading font-weight-900">Quantity</span></p>
                        <p class="desc fc-black pricing float-right w-50 ta-center"><span class="heading font-weight-900">Price</span>
                        </p>
                        <p class="desc pricing float-left w-50 ta-center"><span>2-15</span></p>
                        <p class="desc pricing w-50 float-right ta-center"><span class="font-weight-900 fc-dark-red">$99</span></p>
                        <p class="desc pricing float-left w-50 ta-center"><span>16+</span></p>
                        <p class="desc pricing w-50 float-right ta-center"><span class="font-weight-900 fc-dark-red">$99</span></p>
{{--                        <p class="desc pricing float-left w-50 ta-center"><span class="font-weight-900">100+</span></p>--}}
{{--                        <p class="desc pricing w-50 float-right ta-center"><span class="font-weight-900 fc-dark-red">$100</span></p>--}}
                    </div>
                </div>

                {{--<h3 class="title">Group Enrollment Application</h3>--}}
                {{--<p class="subtitle">Complete group enrollment application to enroll with group discounts up to 5%.</p>--}}
                <br><br>
                {{--                {!! Form::open(['route' => 'group-enrollment.post', 'method' => 'post', 'class' => 'group-enrollment-form', 'id' => 'group_enrollment_form']) !!}--}}
                <form method="POST" class="group-enrollment-form" id="group_enrollment_form">
                    {{ csrf_field() }}
                    <input type="hidden" name="guoid"
                           value="{{ \Carbon\Carbon::now()->timezone('Canada/Eastern')->format('Ymdhi') . mt_rand(1, 9) . mt_rand(1, 9) . mt_rand(1, 9) }}">
{{--                    <input type="hidden" name="web_credit" value="0"/>--}}
                    <div class="row">
                        <div class="col-md-8">
                            <div class="group-user-details">
                                {{-- Login Div Section --}}
                                @include('partials._login_alert')
                                {{-- Login Div Section --}}


                                {{-- Add Courses Section --}}
                                <div class="row mbpx-20">
                                    <div class="col-md-12">
                                        <h5 class="mbpx-0">Add Courses</h5>
                                        <p id="error-msg-add-courses" class="ta-left fc-red fw-bold"
                                           style="display:none;">Please add courses.</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-xs-12 col-sm-6">
                                        <div class="control-group focused">
                                            <strong class="fs-large course_title">OSHA 10-Hour<br>Construction</strong>
                                            <input type="number" id="osha_10_construction_qty"
                                                   name="osha_10_construction_qty" class="osha_10_courses course_qty"
                                                   value="0" min="0" max="200" step="1"
                                                   onkeyup="this.value=this.value.replace(/[^0-9]/g,'');">
                                            <span class="fs-large float-right ptpx-13">x</span>
                                            <small class="qty">Qty</small>
                                        </div>
                                        <small id="osha_10c_error" class="fc-red float-left">Quantity must be greater
                                            than 1</small>
                                    </div>

                                    <div class="col-md-6 col-xs-12 col-sm-6">
                                        <div class="control-group focused">
                                            <strong class="fs-large course_title">OSHA 10-Hour<br>General
                                                Industry</strong>
                                            <input type="number" id="osha_10_general_qty" name="osha_10_general_qty"
                                                   class="osha_10_courses course_qty" value="0" min="0" max="200"
                                                   step="1" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');">
                                            <span class="fs-large float-right ptpx-13">x</span>
                                            <small class="qty">Qty</small>
                                        </div>
                                        <small id="osha_10g_error" class="fc-red float-left">Quantity must be greater
                                            than 1</small>
                                    </div>

                                    <div class="col-md-6 col-xs-12 col-sm-6">
                                        <div class="control-group focused">
                                            <strong class="fs-large course_title">OSHA 30-Hour<br>Construction</strong>
                                            <input type="number" id="osha_30_construction_qty"
                                                   name="osha_30_construction_qty" class="osha_30_courses course_qty"
                                                   value="0" min="0" max="200" step="1"
                                                   onkeyup="this.value=this.value.replace(/[^0-9]/g,'');">
                                            <span class="fs-large float-right ptpx-13">x</span>
                                            <small class="qty">Qty</small>
                                        </div>
                                        <small id="osha_30c_error" class="fc-red float-left">Quantity must be greater
                                            than 1</small>
                                    </div>
                                </div>
                                {{-- Add Courses Section --}}

                                {{-- Company Details Section --}}
                                <div id="company-details-section">
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <h5 class="mbpx-30">Company Details</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="control-group focused">
                                                <label class="form-label">Company Name</label>
                                                {{ Form::text('company_name', null, ['class' => $errors->has('company_name') ? 'form-field error' : 'form-field', 'required' => 'required', 'id' => 'company_name']) }}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="control-group focused">
                                                <label class="form-label">Company Type</label>
                                                {{ Form::select('company_type', ["Partnership" => "Partnership", "Sole Proprietorship" => "Sole Proprietorship", "LLC" => "LLC", "Corporation" => "Corporation"]) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Company Details Section --}}

                                {{-- User Details Section --}}
                                <div id="user-details-section">
                                    <div class="row mt-1">
                                        <div class="col-md-12">
                                            <h5 class="mbpx-30">User Details</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="control-group focused">
                                                <label class="form-label">First Name</label>
                                                {{ Form::text('first_name', null, ['class' => $errors->has('first_name') ? 'form-field error' : 'form-field', 'required' => 'required', 'id' => 'first_name']) }}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="control-group focused">
                                                <label class="form-label">Last Name</label>
                                                {{ Form::text('last_name', null, ['class' => $errors->has('last_name') ? 'form-field error' : 'form-field', 'required' => 'required', 'id' => 'last_name']) }}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="control-group focused">
                                                <label class="form-label">Password <span class="password-help-text">(must contain at least 1 letter and 1 number)</span></label>
                                                {{ Form::password('password', ['id'=>'password', 'class' => $errors->has('password') ? 'form-field error ' : 'form-field', 'autocomplete' => 'password-new-6472', 'required' => 'required', 'maxlength' => 15]) }}
                                                <span class="xicon icon-show toggle-password"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="control-group focused">
                                                <label class="form-label">Confirm Password</label>
                                                {{ Form::password('password_confirmation', ['id'=>'password_confirmation','class' => $errors->has('password_confirmation') ? 'form-field error ' : 'form-field', 'autocomplete' => 'password-new-confirm-6472', 'required' => 'required', 'maxlength' => 15]) }}
                                                <span class="xicon icon-show toggle-password-confirmation"></span>
                                            </div>
                                        </div>
    {{--                                    <div class="col-md-6">--}}
    {{--                                        <div class="control-group focused">--}}
    {{--                                            <label class="form-label">Contact Person</label>--}}
    {{--                                            {{ Form::text('contact_person', null, ['class' => $errors->has('contact_person') ? 'form-field error' : 'form-field', 'required' => 'required', 'id' => 'contact_person']) }}--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}

                                        <div class="col-md-6">
                                            <div class="control-group focused">
                                                <label class="form-label">Phone</label>
                                                {{ Form::text('phone', null, ['class' => $errors->has('phone') ? 'form-field error' : 'form-field', 'id' => 'phone', 'required' => 'required', 'id' => 'phone']) }}
                                                <p id="error-msg-phone" class="ta-right"></p>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="control-group focused">
                                                <label class="form-label">Email</label>
                                                {{ Form::email('email', null, ['class' => $errors->has('email') ? 'form-field error' : 'form-field', 'required' => 'required', 'id' => 'email']) }}
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="control-group focused">
                                                <label class="form-label">Address</label>
                                                {{ Form::text('address', null, ['class' => $errors->has('address') ? 'form-field error' : 'form-field', 'required' => 'required', 'id' => 'address']) }}
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="control-group focused">
                                                <label class="form-label">City</label>
                                                {{ Form::text('city', null, ['class' => $errors->has('city') ? 'form-field error' : 'form-field', 'required' => 'required', 'id' => 'city']) }}
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="control-group focused">
                                                <label class="form-label">State</label>
                                                {{ Form::select('state', $arrays::states(), 'AL', ['class' => $errors->has('state') ? 'form-field error ' : 'form-field', 'id' => 'state']) }}
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="control-group focused">
                                                <label class="form-label">Zip Code</label>
                                                {{ Form::text('zip_code', null, ['class' => $errors->has('zip_code') ? 'form-field error' : 'form-field', 'required' => 'required', 'id' => 'zip_code']) }}
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="control-group focused mt-2">
                                                <button class="btn --btn-primary form-field w-100" type="submit" id="next-step-btn">
                                                    Proceed to Payment&nbsp;&nbsp;&nbsp;&nbsp;<i class="xicon icon-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- User Details Section --}}

                                {{-- Proceed to Payment (User Logged in) --}}
                                <div class="row" id="proceed-logged-in-div" style="display: none;">
                                    <div class="col-md-12">
                                        <div class="control-group focused mt-2">
                                            <button class="btn --btn-primary form-field w-100"
                                                    id="proceed-btn-logged-in">
                                                Proceed to Payment&nbsp;&nbsp;&nbsp;&nbsp;<i
                                                        class="xicon icon-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                {{-- Proceed to Payment (User Logged in) --}}

                            </div>

                            <div class="group-payment-details hidden">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="mbpx-30">Checkout</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 text-sm-center push-md-2">
                                        <div class="buy-now" style="display: block;">
                                            <div id="paypal-button-container"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="mbpx-20">Cart</h5>
                                </div>
                            </div>
                            <div class="shopping-cart cart-form">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>
                                            <span class="fs-large ml-3">Total: <strong class="fc-primary">$0.00</strong></span>
                                            <span class="fs-medium float-right mr-3">0 Item(s)</span><br/>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- Proceed to payment/Back buttons --}}
                    <div class="row mtpx-20">
                        <div class="col-md-4">
                            <div class="control-group ta-left">
                                <button class="btn --btn-primary --btn-small" type="button" id="prev-step-btn">
                                    <i class="xicon icon-arrow-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;Back
                                </button>
                            </div>
                        </div>
                        {{--                        <div class="col-md-4">--}}
                        {{--                            <div class="control-group ta-right">--}}
                        {{--                                <button class="btn --btn-primary --btn-small" type="submit" id="next-step-btn">--}}
                        {{--                                    Proceed to Payment&nbsp;&nbsp;&nbsp;&nbsp;<i class="xicon icon-arrow-right"></i>--}}
                        {{--                                </button>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>
                    {{-- Proceed to payment/Back buttons --}}
                    <input type="hidden" name="form_step" value="1" id="form_step">
                </form>
                {{--                {!! Form::close() !!}--}}
            </div>

            {{-- @include('partials._whyus_without_desc') --}}
            @include('partials._comparison_features')

            <div class="container">
                <div class="row">
                    <div class="box --course-objectives col-md-12 mtpx-20">
                        {{--<p class="desc" style="text-align: left;">At OSHA Outreach Courses, we welcome a group of--}}
                        {{--employees to benefit from the world’s leading agency in OSHA 10 and OSHA 30 training. The--}}
                        {{--courses are specifically designed to accommodate workers as well as companies who can invest--}}
                        {{--their time and energy for a 10-hour or 30-hour training with us.</p>--}}

                        <p class="desc" style="text-align: left;">With OSHA Outreach, you have the chance to excel in
                            accordance with the guidelines of the Construction and General Industry. It is imperative
                            for workers to comply with health and safety standards. It is not merely intended for an
                            individual’s safety, but for the safety of fellow men as well as, your own family’s
                            well-being.</p>

                        <p class="desc" style="text-align: left;">Not being able to comply can result in a penalty,
                            being fired from the job, business shut down, and in the worst case, loss of life.</p>

                        <p class="desc" style="text-align: left;">OSHA corporate enrollment encompasses training worth
                            of 10-hour and 30-hour known as OSHA 10 and OSHA 30, respectively. OSHA bulk enrollment
                            discount of up to 5% is applied when 6 or more people enroll for training with OSHA Outreach
                            Courses.</p>

                        <p class="desc" style="text-align: left;">In order to stay ahead of the curve, learn and adhere
                            to the best practices with OSHA Outreach Courses.</p>

                        <div class="col-md-8">
                            <p class="note fc-primary">We will apply discounted pricing structure based on
                                the number of students and courses.</p>
                            <small class="note d-inline-block mbpx-40" style="text-align: left;"><strong>P.S.</strong>:
                                Due to the COVID-19 pandemic, the response times may be subject to the staff’s
                                availability.
                            </small>
                        </div>

                        <div class="col-md-4 ta-right">
                            <a href="tel:+18332126742" class="btn --btn-primary">Call Us Now!</a>
                        </div>
                        {{--<p class="desc" style="text-align: left;">Get in touch by filling out the form below and one of our representatives will get back to you shortly.</p>--}}

                        <br>
                    </div>

                </div>

                {{--<img class="w-99 m-auto mbpx-40" style="max-width: 900px;" src="{{ asset('/images/group_enrollment_discount_chart.png') }}" alt="Group Enrollment Discount Chart">--}}
            </div>

            @include('partials._our_clients')
        </section>

    @endif
    <style>
        form.group-enrollment-form input[type=number].course_qty {
            width: 35px;
            padding: 0 0 0 5px;
            float: right;
            margin-left: 10px;
        }

        .group-enrollment-pricing .col-md-3 {
            border-right: 1px solid #FFFFFF;
        }

        .group-enrollment-pricing .col-md-3:last-of-type {
            border-right: none;
        }

        .group-enrollment-pricing h3 {
            font-size: 20px;
            margin-top: -25px;
            padding: 4px;
        }

        .group-enrollment-pricing .course {
            border-top: 1px solid #000000;
            font-size: 18px !important;
            background-color: #4399CE;
            display: block;
            min-height: 33px;
            vertical-align: middle;
            color: white;
        }

        .group-enrollment-pricing .pricing {
            border: 1px solid #C0C0C0;
            font-size: 16px;
            padding: 4px;
            text-align: center;
            font-weight: 600 !important;
        }

        .group-enrollment-pricing .pricing.float-right {
            border: 1px solid #C0C0C0;
        }

        .group-enrollment-pricing .pricing .heading {
            font-size: 16px;
        }

        .group-enrollment-pricing .pricing span {
            /*margin-left: 10px;*/
            width: 95px;
            display: inline-block;
        }

        form .control-group.focused label.form-label {
            font-size: 16px;
            font-weight: 600;
        }

        form.group-enrollment-form {
            margin-bottom: 0 !important;
        }

        form.group-enrollment-form select, form.group-enrollment-form input {
            margin-top: 5px;
        }

        #prev-step-btn {
            display: none;
        }

        .font-weight-900 {
            font-weight: 900 !important;
        }

        .fc-dark-red {
            color: #C12127;
        }

        #next-step-btn, #prev-step-btn {
            border: none;
            font-size: 14px;
            /*padding: 10px 20px;*/
        }

        strong.course_title {
            width: 205px;
            float: left;
            line-height: 1;
            margin-top: 6px;
            font-weight: 600;
        }

        .group-user-details small.qty {
            padding-top: 20px;
            float: right;
            margin-right: 10px;
            font-weight: bold;
        }

        @media (min-width: 576px) and (max-width: 767px) {
            .col-md-6.col-xs-12.col-sm-6 {
                width: 100%;
            }
        }

        @media (min-width: 768px) and (max-width: 991px) {
            .group-enrollment-form > .row > .col-md-8 {
                width: 100%;
            }

            .group-enrollment-form > .row > .col-md-4 {
                width: 50%;
                /*margin: 10px auto;*/
            }
        }

        @media (min-width: 992px) and (max-width: 1199px) {
            .group-enrollment-pricing .course {
                /*height: 55px;*/
                vertical-align: middle;
            }
        }

        @media (max-width: 991px) {
            .group-enrollment-pricing h3 {
                font-size: 18px;
            }

            .group-enrollment-pricing .course {
                font-size: 16px;
            }

            .group-enrollment-pricing .pricing {
                font-size: 16px;
            }

            .group-enrollment-pricing .pricing span {
                width: auto;
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

        span small.fw-light.fc-primary.price-lt {
            position: relative;
        }

        small.fw-light.fc-primary.price-lt:before {
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
@endsection

@if(!$form_submit)
    @section('scripts')
        <script src="{{ asset('/src/js/intlTelInput.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('/src/css/intlTelInput.min.css') }}">
        <script>
            window.cartAmount = 0;
            window.cart = [];

            $(document).ready(function () {

                /* If User is logged In */
                if(outreachProfileCookie) {
                    $(".loginDiv").hide();
                    $("#company-details-section").hide();
                    $("#user-details-section").hide();
                    $("#proceed-logged-in-div").show();
                }

                // Click func for logged in user proceed btn
                $('#proceed-btn-logged-in').click(function (e) {
                    var form_step = $('#form_step').val();
                    var cartAmount = window.cartAmount;

                    if (cartAmount == 0) {
                        $('#error-msg-add-courses').show();
                    } else {
                        updateOrder(true).done(function () {
                            $('#error-msg-add-courses').hide();

                            // getStep(form_step);
                            getStep(2);
                        }).fail(function() {
                            alert("Something Went Wrong, Please Refresh the page & Try Again");
                        })
                    }
                });
                /* If User is logged In */

                $('.toggle-password').on('click', function() {
                    if($(this).hasClass('icon-show')) {
                        $('#password').prop("type", "text");
                        $(this).removeClass('icon-show').addClass('icon-hide');
                    } else if($(this).hasClass('icon-hide')) {
                        $('#password').prop("type", "password");
                        $(this).removeClass('icon-hide').addClass('icon-show');
                    }
                })

                $('.toggle-password-confirmation').on('click', function() {
                    if($(this).hasClass('icon-show')) {
                        $('#password_confirmation').prop("type", "text");
                        $(this).removeClass('icon-show').addClass('icon-hide');
                    } else if($(this).hasClass('icon-hide')) {
                        $('#password_confirmation').prop("type", "password");
                        $(this).removeClass('icon-hide').addClass('icon-show');
                    }
                })

                window.phoneInput = document.querySelector("#phone");
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

                $(window).resize(function () {
                    //if($('.group-enrollment-pricing h3.static').is(':visible') === false){
                    resizeTable();
                    //}
                });

                function resizeTable() {
                    var width = $(window).width();
                    if (width <= 575) {
                        $('.group-enrollment-pricing .discounted_rates, .group-enrollment-pricing h3.static').hide();
                        $('.group-enrollment-pricing h3.clickable').show();
                        $('.group-enrollment-pricing h3.static span').show();
                    } else {
                        $('.group-enrollment-pricing .discounted_rates, .group-enrollment-pricing h3.static').show();
                        $('.group-enrollment-pricing h3.clickable').hide();
                        $('.group-enrollment-pricing h3.static span').hide();
                    }
                }

                $('.group-enrollment-pricing h3.clickable').click(function () {
                    $('.group-enrollment-pricing .discounted_rates, .group-enrollment-pricing h3.static').show();
                    $('.group-enrollment-pricing h3.clickable').hide();
                });

                $('.group-enrollment-pricing h3.static').click(function () {
                    if ($(window).width() <= 575) {
                        $('.group-enrollment-pricing .discounted_rates, .group-enrollment-pricing h3.static').hide();
                        $('.group-enrollment-pricing h3.clickable').show();
                        $('.group-enrollment-pricing h3.static span').show();
                    }
                });

                resizeTable();

                $('#osha_10c_error, #osha_10ce_error, #osha_10g_error, #osha_30c_error').css({'visibility': 'hidden'});

                // Temporary
                // Paypal Integration
                paypal.Buttons({
                    style: {
                        layout: 'vertical',
                        color: 'gold',
                        shape: 'rect',
                        label: 'pay'
                    },
                    onInit: function (data, actions) {
                    },
                    onClick: function (data, actions) {
                    },
                    createOrder: function (data, actions) {
                        // var first_name, last_name;
                        var first_name = $('#first_name').val().replace(/[^a-zA-Z ]/g, '');
                        // var name = $('#contact_person').val().replace(/[^a-zA-Z ]/g, '');
                        var email = $('#email').val().replace(/[^a-zA-Z_\-0-9@.]/g, '');
                        var phone = iti.getNumber().replace(/[^0-9]/g, '');
                        var zip_code = $('#zip_code').val().replace(/[^0-9]/g, '');

                        // Set up the transaction
                        var paypalCreateOrderObj = {
                            application_context: {
                                brand_name: 'OSHA Outreach Courses',
                                user_action: 'PAY_NOW',
                                shipping_preference: "NO_SHIPPING"
                            },
                            intent: 'CAPTURE',
                            payer: {
                                name: {
                                    given_name: first_name,
                                    //surname: 'saad'
                                },
                                address: {
                                    postal_code: zip_code,
                                    country_code: 'US'
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
                                    value: parseFloat(window.cartAmount).toFixed(2),
                                    breakdown: {
                                        item_total: {
                                            currency_code: "USD",
                                            value: parseFloat(window.cartAmount).toFixed(2)
                                        }
                                    }
                                },
                                description: 'Group Enrollment Purchase from OSHA Outreach Courses',
                                items: window.cart
                            }]
                        };

                        if(outreachProfileCookie) {
                            var loggedInUserData = JSON.parse(outreachProfileCookie);

                            paypalCreateOrderObj.payer = {
                                email_address: loggedInUserData.email,
                            }
                        }

                        // Set up the transaction
                        return actions.order.create(paypalCreateOrderObj);
                    },
                    onApprove: function (data, actions) {
                        $('.loader').show();

                        var data = $('#group_enrollment_form').serializeArray();
                        // console.log(data);
                        // Replacing contact_no with full number
                        var formData = {};
                        data.forEach(function (item) {
                            if (item.name === 'phone') {
                                item.value = iti.getNumber();
                            }
                            formData[item.name] = item.value;
                        });
                        // console.log(data);


                        // Capture the funds from the transaction
                        return actions.order.capture().then(function (details) {
                            // console.log(data);
                            // console.log(details);
                            // Show a success message to your buyer
                            // alert('Transaction completed by ' + details.payer.name.given_name);
                            // alert('Processing...');
                            if (details.status == 'COMPLETED' || details.status == 'APPROVED') {
                                $('.loader').show();
                                // Call your server to save the transaction
                                return fetch('/paypal/capture-group-transaction', {
                                    method: 'post',
                                    headers: {
                                        'content-type': 'application/json',
                                        "Accept": "application/json, text-plain, */*",
                                        "X-Requested-With": "XMLHttpRequest",
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    body: JSON.stringify({
                                        orderID: data.orderID,
                                        guoid: $('input[name=guoid]').val(),
                                        details: details
                                    })
                                })
                                    .then(status)
                                    .then(function (response) {
                                        if (response.status === 200) {
                                            response.json().then(function (data) {
                                                console.log(data);
                                                if (data.status) {
                                                    sendOrderLog({data, actions, details}, {{LOG_STATUS_SUCCESS}})
                                                        .then(function () {
                                                            window.location.href = '{{ url('group-enrollment/success?guoid=') }}' + data.guoid;
                                                            return true;
                                                        });
                                                } else {
                                                    // alert('Please try again after refreshing the page.');
                                                    sendOrderLog({
                                                        data,
                                                        actions,
                                                        details
                                                    }, {{LOG_STATUS_FAILED_AJAX_FAILURE}})
                                                        .then(function () {
                                                            window.location.href = '{{ route('group-enrollment.failure') }}?reason=AJAXFailure';
                                                            return false;
                                                        });
                                                }
                                            });
                                        } else {
                                            // alert('Please try again after refreshing the page.');
                                            sendOrderLog({data, actions, details}, {{LOG_STATUS_FAILED_INTERNAL_FAILURE}})
                                                .then(function () {
                                                    {{--window.location.href = '{{ route('group-enrollment.failure') }}?reason=internalFailure';--}}
                                                    return false;
                                                });
                                        }
                                    });
                            } else {
                                // alert('Please try again after refreshing the page.');
                                sendOrderLog({data, actions, details}, {{LOG_STATUS_FAILED_TO_CAPTURE}})
                                    .then(function () {
                                        window.location.href = '{{ route('group-enrollment.failure') }}?reason=failedToCapture';
                                        return false;
                                    });
                            }
                        });
                    },
                    onError: function (err) {
                        // Show an error page here, when an error occurs
                        // console.log(err);
                        sendOrderLog(err, {{LOG_STATUS_ERROR}})
                            .then(function () {
                                window.location.href = '{{ route('payment.failure') }}?reason=ErrorFailure';
                                return false;
                            });
                        // alert('Please try again after refreshing the page.');
                    },
                    onCancel: function () {
                        // alert('User Cancelled');
                    }
                }).render('#paypal-button-container');

                $('#osha_10_construction_qty, #osha_10_general_qty, #osha_30_construction_qty').change(function () {
                    updateCart();
                });
                $('#osha_10_construction_qty, #osha_10_general_qty, #osha_30_construction_qty').keyup(function () {
                    updateCart();
                });

                function updateCart() {
                    var osha_10_construction_qty = parseInt($('#osha_10_construction_qty').val());
                    var osha_10_general_qty = parseInt($('#osha_10_general_qty').val());
                    var osha_30_construction_qty = parseInt($('#osha_30_construction_qty').val());

                    window.cart = [];

                    var osha_10_qty = 0;
                    if (osha_10_construction_qty > 1) {
                        osha_10_qty += osha_10_construction_qty;
                    }

                    if (osha_10_general_qty > 1) {
                        osha_10_qty += osha_10_general_qty;
                    }

                    var osha_30_qty = 0;
                    if (osha_30_construction_qty > 1) {
                        osha_30_qty += osha_30_construction_qty;
                    }

                    var total_qty = osha_10_qty + osha_30_qty;
                    var total_amount = 0;
                    var total_discount = 0;

                    if (total_qty > 0) {
                        $('#error-msg-add-courses').hide();
                    }

                    var osha_10_price_original = 59.00;
                    var osha_10_price = osha_10_price_original;
                    /*if(osha_10_qty >= 100){
                        osha_10_price = 45.00;
                    } else if(osha_10_qty >= 50){
                        osha_10_price = 48.00;
                    } else */
                    // if (osha_10_qty >= 100) {
                    //     osha_10_price = 45.00;
                    // } else
                    if (osha_10_qty >= 16) {
                        osha_10_price = 48.00;
                    } else if (osha_10_qty >= 2) {
                        osha_10_price = 49.00;
                    }


                    var osha_30_price_original = 139.00;
                    var osha_30_price = osha_30_price_original;
                    /*if(osha_30_qty >= 100){
                        osha_30_price = 100.00;
                    } else if(osha_30_qty >= 50){
                        osha_30_price = 110.00;
                    } else */
                    // if (osha_30_qty >= 100) {
                    //     osha_30_price = 100.00;
                    // } else
                    if (osha_30_qty >= 2) {
                        osha_30_price = 99.00;
                    }

                    var html = '<table class="table table-bordered">';

                    if (osha_10_construction_qty > 1) {
                        var subtotal = osha_10_price_original * osha_10_construction_qty;
                        var total = osha_10_price * osha_10_construction_qty;
                        var discount = subtotal - total;
                        total_discount += discount;
                        html += '<tr>';
                        html += '<td>';
                        html += '<span class="fs-medium fw-bold">OSHA 10 Hour Construction</span><br/>';
                        html += '<span class="fs-large w-65 float-left">Price: <strong class="fc-red">$' + osha_10_price.toLocaleString(undefined, {minimumFractionDigits: 2}) + '</strong>' +
                            '&nbsp;<small class="fw-light fc-primary price-lt">$' + osha_10_price_original.toLocaleString(undefined, {minimumFractionDigits: 2}) + '</small></span>';
                        html += '<span class="fs-medium w-30 float-right">Qty: <strong class="fc-primary">' + osha_10_construction_qty + '</strong></span><br/>';
                        html += '<span class="fs-medium float-left">Subtotal: <strong class="fc-primary">$' + (parseFloat(total).toLocaleString(undefined, {minimumFractionDigits: 2})) + '</strong></span><br/>';
                        // html += '<span class="fs-medium">Discount: <strong class="fc-primary">$'+(parseFloat(discount).toLocaleString(undefined, {minimumFractionDigits: 2}))+'</strong></span><br/>';
                        // html += '<span class="fs-medium">Total: <strong class="fc-primary">$'+(parseFloat(total).toLocaleString(undefined, {minimumFractionDigits: 2}))+'</strong></span>';
                        html += '</td>';
                        html += '</tr>';
                        total_amount += total;
                        window.cart.push({
                            name: 'OSHA 10 Hour Construction',
                            unit_amount: {
                                currency_code: 'USD',
                                value: osha_10_price
                            },
                            quantity: osha_10_construction_qty,
                            sku: 'SKU-0001'
                        });
                        $('#osha_10c_error').css({'visibility': 'hidden'});
                    } else if (osha_10_construction_qty == 1) {
                        $('#osha_10c_error').css({'visibility': 'visible'});
                    } else {
                        $('#osha_10c_error').css({'visibility': 'hidden'});
                    }

                    if (osha_10_general_qty > 1) {
                        var subtotal = osha_10_price_original * osha_10_general_qty;
                        var total = osha_10_price * osha_10_general_qty;
                        var discount = subtotal - total;
                        total_discount += discount;
                        html += '<tr>';
                        html += '<td>';
                        html += '<span class="fs-medium fw-bold">OSHA 10 Hour General Industry</span><br/>';
                        html += '<span class="fs-large w-65 float-left">Price: <strong class="fc-red">$' + osha_10_price.toLocaleString(undefined, {minimumFractionDigits: 2}) + '</strong>' +
                            '&nbsp;<small class="fw-light fc-primary price-lt">$' + osha_10_price_original.toLocaleString(undefined, {minimumFractionDigits: 2}) + '</small></span>';
                        html += '<span class="fs-medium w-30 float-right">Qty: <strong class="fc-primary">' + osha_10_general_qty + '</strong></span><br/>';
                        html += '<span class="fs-medium float-left">Subtotal: <strong class="fc-primary">$' + (parseFloat(total).toLocaleString(undefined, {minimumFractionDigits: 2})) + '</strong></span><br/>';
                        // html += '<span class="fs-medium">Discount: <strong class="fc-primary">$'+(parseFloat(discount).toLocaleString(undefined, {minimumFractionDigits: 2}))+'</strong></span><br/>';
                        // html += '<span class="fs-medium">Total: <strong class="fc-primary">$'+(parseFloat(total).toLocaleString(undefined, {minimumFractionDigits: 2}))+'</strong></span>';
                        html += '</td>';
                        html += '</tr>';
                        total_amount += total;
                        window.cart.push({
                            name: 'OSHA 10 Hour General Industry',
                            unit_amount: {
                                currency_code: 'USD',
                                value: osha_10_price
                            },
                            quantity: osha_10_general_qty,
                            sku: 'SKU-0003'
                        });
                        $('#osha_10g_error').css({'visibility': 'hidden'});
                    } else if (osha_10_general_qty == 1) {
                        $('#osha_10g_error').css({'visibility': 'visible'});
                    } else {
                        $('#osha_10g_error').css({'visibility': 'hidden'});
                    }

                    if (osha_30_construction_qty > 1) {
                        var subtotal = osha_30_price_original * osha_30_construction_qty;
                        var total = osha_30_price * osha_30_construction_qty;
                        var discount = subtotal - total;
                        total_discount += discount;
                        html += '<tr>';
                        html += '<td>';
                        html += '<span class="fs-medium fw-bold">OSHA 30 Hour Construction</span><br/>';
                        html += '<span class="fs-large w-65 float-left">Price: <strong class="fc-red">$' + osha_30_price.toLocaleString(undefined, {minimumFractionDigits: 2}) + '</strong>' +
                            '&nbsp;<small class="fw-light fc-primary price-lt">$' + osha_30_price_original.toLocaleString(undefined, {minimumFractionDigits: 2}) + '</small></span>';
                        html += '<span class="fs-medium w-30 float-right">Qty: <strong class="fc-primary">' + osha_30_construction_qty + '</strong></span><br/>';
                        html += '<span class="fs-medium float-left">Subtotal: <strong class="fc-primary">$' + (parseFloat(total).toLocaleString(undefined, {minimumFractionDigits: 2})) + '</strong></span><br/>';
                        // html += '<span class="fs-medium">Discount: <strong class="fc-primary">$'+(parseFloat(discount).toLocaleString(undefined, {minimumFractionDigits: 2}))+'</strong></span><br/>';
                        // html += '<span class="fs-medium">Total: <strong class="fc-primary">$'+(parseFloat(total).toLocaleString(undefined, {minimumFractionDigits: 2}))+'</strong></span>';
                        html += '</td>';
                        html += '</tr>';
                        total_amount += total;
                        window.cart.push({
                            name: 'OSHA 30 Hour Construction',
                            unit_amount: {
                                currency_code: 'USD',
                                value: osha_30_price
                            },
                            quantity: osha_30_construction_qty,
                            sku: 'SKU-0002'
                        });
                        $('#osha_30c_error').css({'visibility': 'hidden'});
                    } else if (osha_30_construction_qty == 1) {
                        $('#osha_30c_error').css({'visibility': 'visible'});
                    } else {
                        $('#osha_30c_error').css({'visibility': 'hidden'});
                    }

                    html += '<tr>';
                    html += '<td class="bg-lgrey">';
                    if (total_discount > 0) {
                        html += '<span class="fs-large ml-3">You just saved: <strong style="color:green;" ">$' + total_discount.toLocaleString(undefined, {minimumFractionDigits: 2}) + '</strong></span><br/>';
                    }
                    html += '<span class="fs-large ml-3 fw-bold">Total: <strong class="fc-primary">$' + total_amount.toLocaleString(undefined, {minimumFractionDigits: 2}) + '</strong></span>';
                    html += '<span class="fs-medium float-right mr-3">' + total_qty + ' Course(s)</span><br/>';

                    // html += '<span class="fs-large ml-3">Discount: <strong class="fc-primary">- $5.00</strong></span><br/>';
                    // html += '<span class="fs-large ml-3">Total: <strong class="fc-primary">$63.00</strong></span>';

                    html += '</td>';
                    html += '</tr>';
                    html += '</table>';

                    window.cartAmount = total_amount;
                    window.cartDiscount = total_discount;
                    // console.log(window.cart);
                    @if(request()->test == true)
                        window.cart = [{
                        name: 'OSHA 10 Hour Construction',
                        unit_amount: {
                            currency_code: 'USD',
                            value: 0.25
                        },
                        quantity: 1,
                        sku: 'SKU-0001'
                    }, {
                        name: 'OSHA 10 Hour Construction (Español)',
                        unit_amount: {
                            currency_code: 'USD',
                            value: 0.25
                        },
                        quantity: 1,
                        sku: 'SKU-0007'
                    }, {
                        name: 'OSHA 10 Hour General Industry',
                        unit_amount: {
                            currency_code: 'USD',
                            value: 0.25
                        },
                        quantity: 1,
                        sku: 'SKU-0003'
                    }, {
                        name: 'OSHA 30 Hour Construction',
                        unit_amount: {
                            currency_code: 'USD',
                            value: 0.25
                        },
                        quantity: 1,
                        sku: 'SKU-0002'
                    }];
                    window.cartAmount = 1;
                    window.cartDiscount = 100;
                    @endif

                    console.log(window.cart);

                    $('.shopping-cart.cart-form').html(html);
                }

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
                            uoid: $('input[name=guoid]').val(),
                            text: text,
                            status: status,
                            type: {{LOG_TYPE_GROUP}},
                        })
                    });
                    return response.json();
                }
            });

            function checkFormUserDetails() {
                console.log('Inside checkFor User Details')
                var password = document.getElementById('password');
                var passwordConfirmation = document.getElementById('password_confirmation');
                var re = /(?=.*[a-zA-Z])(?=.*\d).+/;

                if (password.value.length < 8) {
                    password.setCustomValidity('Password must contains at least 8 characters.');
                    return false;
                } else if (!re.test(password.value)) {
                    password.setCustomValidity('Password must contains at least 1 number and 1 letter.');
                    return false;
                } else {
                    password.setCustomValidity('');

                    if (password.value === passwordConfirmation.value) {
                        passwordConfirmation.setCustomValidity('');
                    } else {
                        passwordConfirmation.setCustomValidity('Passwords must match');
                        return false;
                    }
                }

                return !!$('form')[0].checkValidity();
            }

            $('#password, #password_confirmation').on('blur change keyup', checkFormUserDetails)

            $('.group-enrollment-form').submit(function (e) {
                e.preventDefault();

                var form_step = $('#form_step').val();
                console.log(cartAmount);
                if (iti.isValidNumber() !== true || !checkFormUserDetails()) {
                    return false;
                } else if (cartAmount == 0) {
                    $('#error-msg-add-courses').show();
                } else {
                    updateOrder(true).done(function () {
                        $('#error-msg-add-courses').hide();

                        $('#form_step').val(++form_step);
                        // getStep(form_step);
                        getStep(2);
                    }).fail(function() {
                        alert("Something Went Wrong, Please Refresh the page & Try Again");
                    })
                }
            });

            $('#prev-step-btn').click(function () {
                var form_step = $('#form_step').val();
                $('#form_step').val(--form_step);
                // getStep(form_step);
                getStep(1);
            });

            function getStep(step_no) {
                if (step_no == 1) {
                    $('#prev-step-btn').hide();

                    $('.group-user-details').show();
                    $('.group-payment-details').hide();

                    $('#next-step-btn').show();
                    // $('#next-step-btn').html('Payment Details&nbsp;&nbsp;&nbsp;&nbsp;<i class="xicon icon-arrow-right"></i>');

                    $('html, body').animate({scrollTop: $('.group-user-details').offset().top - 50}, 'slow');

                } else if (step_no == 2) {
                    updateOrder();

                    $('#prev-step-btn').show();
                    // $('#prev-step-btn').html('<i class="xicon icon-arrow-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;Order Details');

                    $('.group-user-details').hide();
                    $('.group-payment-details').show();

                    $('#next-step-btn').hide();

                    $('html, body').animate({scrollTop: $('.group-payment-details').offset().top - 50}, 'slow');
                }
            }

            function orderRequest(data, refresh) {
                var formData = $.param(data);

                if(refresh) {
                    return $.post("{{ route('group_order.ajax') }}", formData);
                } else {
                    $.post("{{ route('group_order.ajax') }}", formData,
                        function (result, status) {
                            // TODO: uncomment later
                            // console.log(result, status);
                            if (result == 'refresh') {
                                // TODO: resolve issue here
                                window.location = '{{ url('/') }}';
                            }
                        });
                }
            }

            function updateOrder(refresh = false) {
                var data = [];
                if(outreachProfileCookie) {
                    var outreachProfileCookieObj = JSON.parse(outreachProfileCookie);

                    console.log(outreachProfileCookieObj, 1334);

                    data.push(
                        {name: "_token", value: $("#group_enrollment_form  input[name='_token']").val()},
                        {name: "guoid", value: $("#group_enrollment_form  input[name='guoid']").val()},
                        {name: "osha_10_construction_qty", value: $('#osha_10_construction_qty').val()},
                        {name: "osha_10_general_qty", value: $('#osha_10_general_qty').val()},
                        {name: "osha_30_construction_qty", value:$('#osha_30_construction_qty').val()},
                        {name: 'applyDiscount', value: true},
                        {name: "first_name", value: outreachProfileCookieObj['firstName']},
                        {name: "last_name", value: outreachProfileCookieObj['lastName']},
                        {name: "company_name", value: outreachProfileCookieObj['companyName']},
                        {name: "company_type", value: outreachProfileCookieObj['companyType']},
                        {name: "email", value: outreachProfileCookieObj['email']},
                        {name: "phone", value: outreachProfileCookieObj['contactNo']},
                        {name: "password", value: ""},
                        {name: "password_confirmation", value: ""},
                        {name: "country", value: outreachProfileCookieObj['country']},
                        {name: "zip_code", value: outreachProfileCookieObj['zipCode']},
                        {name: "city", value: outreachProfileCookieObj['city']},
                        {name: "state", value: outreachProfileCookieObj['state']},
                        {name: "address", value: outreachProfileCookieObj['address']},
                        {name: "user_lms_id", value: outreachProfileCookieObj['_id']},
                        {name: "username", value: outreachProfileCookieObj['userName']},
                    )

                    return orderRequest(data, refresh);
                } else {
                    if (iti.isValidNumber() == true || $('#email').val().trim() != '') {

                        data = $('#group_enrollment_form').serializeArray();

                        // apply Discount on Group Enrollment Page
                        data.push({name: 'applyDiscount', value: true});

                        // Replacing contact_no with full number
                        data.forEach(function (item) {
                            if (item.name === 'phone') {
                                item.value = iti.getNumber();
                            }
                        });

                        return orderRequest(data, refresh);
                    }
                }
            }

            setInterval(function () {
                updateOrder();
            }, 5000);

        </script>
        <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_CLIENT_ID') }}"></script>
    @endsection
@endif
