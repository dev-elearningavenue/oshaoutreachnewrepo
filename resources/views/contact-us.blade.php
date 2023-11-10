@extends('layouts.master')

@section('title', isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Contact Us | ' . config('app.name'))
@push('custom-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
          integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endpush
@section('styles')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    @if (isset($page['seo_tags']))
        @foreach ($page['seo_tags'] as $meta_name => $meta_content)
            @if ($meta_name != 'title')
                <meta name="{{ $meta_name }}" content="{{ $meta_content }}"/>
            @endif
        @endforeach
    @endif
    <meta property="og:title"
          content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Contact Us' }}">
    <meta property="twitter:title"
          content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Contact Us' }}">
    <meta property="og:description"
          content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'Contact Us' }}">
    <meta property="twitter:description"
          content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'Contact Us' }}">
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
            "name": "{{ isset($page['h1_heading']) ? $page['h1_heading'] : 'Contact Us' }}"
        }
    }

    </script>
@endsection

@section('content')

    <section class="hero-banner --inner-banner"
             style="background-image: url('{{ asset('images/contact-banner.jpg') }}')">
        <div class="inner-content">
            <div class="container">
                <h1 class="title">{{ isset($page['h1_heading']) ? $page['h1_heading'] : 'Contact Us' }}</h1>
            </div>
        </div>
    </section>

    @if ($form_submit)
        <section class="group-enrollment-intro sec-padding">
            <div class="container ">
                <h3 class="title">Thankyou</h3>
                <p class="subtitle">Your form has been submitted, we will contact you soon.</p>
            </div>
        </section>
    @else
        <section class="group-enrollment-intro sec-padding">
            <div class="container ">
                <div class="padding_mobile_sec">
                    @if(session()->has('error_msg'))
                        <h3 class="title fc-red">{{ session('error_msg') }}</h3>
                    @else
                        <h3 class="title">We would love to hear from you</h3>
                    @endif
                    <p class="subtitle">Please fill out the information below to have a Safety Professional contact
                        you.</p>
                </div>
            </div>
        </section>

        <div class="container">
            {!! Form::open(['route' => 'contact-us.post', 'method' => 'post', 'class' => 'group-enrollment-form']) !!}

            <div class="row contact_form_row">
                <div class="col-lg-4 col-12-12 contact_form_left_sec">
                    <div class="phone_icon_wrapper">
                        <div><span class="icon-phone"></span></div>
                        <div><b>Call Us</b>
                            <div>
                                <a href="tel:+18332126742">+1-833-212-6742</a>
                            </div>
                        </div>
                    </div>

                    <div class="email_icon_wrapper">
                        <div><span class="icon-email"></span></div>
                        <div><b>Email</b>
                            <div><a href="mailto:help@oshaoutreachcourses.com">help@oshaoutreachcourses.com</a></div>
                        </div>
                    </div>

                    <div class="map_icon_wrapper">
                        <div>
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 384 512"
                                 class="contact_location" height="22" width="22" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z">
                                </path>
                            </svg>
                        </div>
                        <div><b>Address</b>
                            <div><a href="https://maps.app.goo.gl/VZbyky5PaMBnXp1a8" target="_blank">
                                    17350 TX-249 Ste 220 19204, Houston, TX 77064, United States

                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="iframe_wrapper">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13827.097728057966!2d-95.5416506!3d29.9571662!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259cb9dbebb97%3A0xb3085f2618e0874b!2sOSHA%20Outreach%20Courses!5e0!3m2!1sen!2s!4v1696426665090!5m2!1sen!2s"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 contact_form_right_sec">

                    <div>

                        <div class="control-group focused">
                            <label class="form-label">First Name</label>
                            {{ Form::text('first_name', null, ['class' => $errors->has('first_name') ? 'form-field error ' : 'form-field']) }}
                            @if ($errors->has('first_name'))
                                <p class="error-msg ta-right">{{ $errors->first('first_name') }}</p>
                            @endif
                        </div>

                        <div class="control-group focused">
                            <label class="form-label">Last Name</label>
                            {{ Form::text('last_name', null, ['class' => $errors->has('last_name') ? 'form-field error' : 'form-field']) }}
                            @if ($errors->has('last_name'))
                                <p class="error-msg ta-right">{{ $errors->first('last_name') }}</p>
                            @endif
                        </div>
                        <div class="control-group focused">
                            <label class="form-label">Email</label>
                            {{ Form::text('email', null, ['class' => $errors->has('email') ? 'form-field error' : 'form-field']) }}
                            @if ($errors->has('email'))
                                <p class="error-msg ta-right">{{ $errors->first('email') }}</p>
                            @endif
                        </div>

                        <div class="control-group focused">
                            <label class="form-label">Phone Number</label>
                            {{ Form::text('phone', null, ['class' => $errors->has('phone') ? 'form-field error' : 'form-field']) }}
                            @if ($errors->has('phone'))
                                <p class="error-msg ta-right">{{ $errors->first('phone') }}</p>
                            @endif
                        </div>

                        <div class="control-group focused">
                            <label class="form-label">Message</label>
                            {{ Form::textarea('message', null, ['class' => $errors->has('message') ? 'form-field error' : 'form-field']) }}
                            @if ($errors->has('message'))
                                <p class="error-msg">{{ $errors->first('message') }}</p>
                            @endif
                        </div>

                        <div class="captcha_submit_wrapper">
                            <div>
                                <div class="g-recaptcha ta-left"
                                     data-sitekey="6Ld0AZUUAAAAAIjZ8e5MGt4VzAODXJ-IwidgDKm0">
                                </div>
                                <br/>
                                <div>
                                    @if ($errors->has('g-recaptcha-response'))
                                        <p class="error-msg" style="position:relative;float:left;">Kindly complete
                                            captcha.
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <div class="control-group ta-right">
                                <input type="submit" value="Submit">
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <style>
                .contact_form_left_sec .contact_location,
                .contact_form_left_sec .icon-phone,
                .contact_form_left_sec .icon-email {
                    font-size: 22px;
                    color: #00579E;
                    margin-right: 15px;
                }

                .phone_icon_wrapper,
                .email_icon_wrapper,
                .map_icon_wrapper {
                    display: flex;
                    margin-bottom: 20px;
                }

                .contact_form_left_sec b,
                .contact_form_left_sec a {
                    font-size: 16px;
                }

                .iframe_wrapper {
                    margin-top: 40px;
                }

                .contact_form_right_sec label {
                    font-size: 16px !important;
                    margin-bottom: 10px !important;
                    display: inline-block;
                }

                form .form-label,
                .cart-form .form-label {
                    position: unset !important;
                }

                .captcha_submit_wrapper {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                }

                @media screen and (max-width: 992px) {
                    .contact_form_row {
                        display: flex;
                        flex-direction: column-reverse;
                    }

                }

                @media screen and (max-width: 500px) {
                    .captcha_submit_wrapper {

                        align-items: baseline;
                        flex-direction: column;
                        margin-bottom: 20px;
                    }

                    .contact_form_row {
                        padding: 0 10px 0 10px;
                    }

                    .padding_mobile_sec {
                        padding: 0 10px 0 10px;

                    }

                    form.group-enrollment-form, .cart-form.group-enrollment-form {
                        margin-bottom: 30px;
                    }
                }
            </style>


            {{-- {!! Form::open(['route' => 'contact-us.post', 'method' => 'post', 'class' => 'group-enrollment-form']) !!}
            <div class="row">
                <div class="col-md-6">
                    <div class="control-group focused">
                        <label class="form-label">First Name</label>
                        {{ Form::text('first_name', null, ['class' => $errors->has('first_name') ? 'form-field error ' : 'form-field']) }}
                        @if ($errors->has('first_name'))
                            <p class="error-msg ta-right">{{ $errors->first('first_name') }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="control-group focused">
                        <label class="form-label">Last Name</label>
                        {{ Form::text('last_name', null, ['class' => $errors->has('last_name') ? 'form-field error' : 'form-field']) }}
                        @if ($errors->has('last_name'))
                            <p class="error-msg ta-right">{{ $errors->first('last_name') }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="control-group focused">
                        <label class="form-label">Email</label>
                        {{ Form::text('email', null, ['class' => $errors->has('email') ? 'form-field error' : 'form-field']) }}
                        @if ($errors->has('email'))
                            <p class="error-msg ta-right">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="control-group focused">
                        <label class="form-label">Phone Number</label>
                        {{ Form::text('phone', null, ['class' => $errors->has('phone') ? 'form-field error' : 'form-field']) }}
                        @if ($errors->has('phone'))
                            <p class="error-msg ta-right">{{ $errors->first('phone') }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="control-group focused">
                        <label class="form-label">Message</label>
                        {{ Form::textarea('message', null, ['class' => $errors->has('message') ? 'form-field error' : 'form-field']) }}
                        @if ($errors->has('message'))
                            <p class="error-msg">{{ $errors->first('message') }}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="g-recaptcha ta-left" data-sitekey="6Ld0AZUUAAAAAIjZ8e5MGt4VzAODXJ-IwidgDKm0"></div><br />
                    @if ($errors->has('g-recaptcha-response'))
                        <p class="error-msg" style="position:relative;float:left;">Kindly complete captcha.</p>
                    @endif
                </div>
                <div class="col-md-6">
                    <div class="control-group ta-right">
                        <input type="submit" value="Submit">
                    </div>
                </div>
            </div>
            {!! Form::close() !!} --}}

            {{-- <div class="row">
                <div class="col-lg-4">
                    <div class="box --contact-box" data-img="url('{{ asset('images/location-icon.png') }}')">
                        <h6 class="title">Office Location</h6>
                        <p class="desc">12/A Locous Creek Ave, Port Jefferson Station, NY 12775</p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="box --contact-box" data-img="url('{{ asset('images/phone-icon.png') }}')">
                        <h6 class="title">Contact Number</h6>
                        <p class="desc">+88 01912704287 <br />+ 88 02 9292162</p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="box --contact-box" data-img="url('{{ asset('images/contact-icon.png') }}')">
                        <h6 class="title">Office Location</h6>
                        <p class="desc">Info@oshaoutreachcourses.com contact@oshaoutreachcourses.com</p>
                    </div>
                </div>
            </div> --}}
        </div>


    @endif

    {{-- <address class="setmap">New York City, New York, United States</address> --}}



@endsection
