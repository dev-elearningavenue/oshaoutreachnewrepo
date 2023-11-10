@php
    $amp_param = isset(request()->outputType) && request()->outputType == 'amp' ? ['outputType' => 'amp'] : [];
@endphp
    <!doctype html>
<html ⚡ lang="en">
<head>
    <meta charset="utf-8">
    <!-- Add the AMP project boilerplate JS -->
    <link rel="preload" as="script" href="https://cdn.ampproject.org/v0.js">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    @yield('preload')
    <link rel="preload" href="{{ asset('images/header-logo.png') }}" as="image">
    <link rel="preload" href="{{ asset('images/osha-outreach-courses.png') }}" as="image">
    <link rel="preload" as="script" href="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js">

    @stack('component-script')
    <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
    <!-- Add canonical URL, even if the site is entirely AMP -->
    <link rel="canonical" href="{{ $canonical_url ? $canonical_url : url('/') }}">
    <!-- Scale responsiveness -->
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <title>@yield('title')</title>
    <meta name="keywords" content="<?php echo isset($keywords) ? $keywords : '' ?>"/>
    <meta name="description"
          content="Welcome to OSHA outreach courses! We specialize in online safety training for OSHA. Our interactive online courses include the OSHA 10-hour and OSHA 30-hour for construction and general industry."/>
    <link rel="icon" type="image/x-icon" href="/favicon.ico"/>
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32"/>
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16"/>

    <link rel="preconnect dns-prefetch" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700|Source+Sans+Pro:400,600,700"
          rel="stylesheet">

    @if(config('app.env') == 'production')
        <meta name="google-site-verification" content="R3O-GwQBBR_mmIIKNIx47u8Z5HIBEb9dZ6-sYmbPwZU"/>
        <link rel="preload" as="script" href="https://cdn.ampproject.org/v0/amp-analytics-0.1.js">
        <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
    @endif

<!-- Boilerplate CSS  -->
    <style amp-boilerplate>body {
            -webkit-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            -moz-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            -ms-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            animation: -amp-start 8s steps(1, end) 0s 1 normal both
        }

        @-webkit-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }

        @-moz-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }

        @-ms-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }

        @-o-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }

        @keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }</style>
    <noscript>
        <style amp-boilerplate>body {
                -webkit-animation: none;
                -moz-animation: none;
                -ms-animation: none;
                animation: none
            }</style>
    </noscript>

    <!-- Custom CSS -->
    <style amp-custom>
        .mobile-nav-btn {
            display: inline-block;
            width: 30px;
            height: 25px;
            z-index: 1000;
            color: #292a2d;
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            transform: rotate(0deg);
            -webkit-transition: 0.5s ease-in-out;
            -moz-transition: 0.5s ease-in-out;
            -o-transition: 0.5s ease-in-out;
            transition: 0.5s ease-in-out;
            cursor: pointer;
            margin-top: 10px;
            float: right;
            position: relative;
            right: 8%;
            background: none;
            border: none;
        }

        .mobile-nav-btn .lines:nth-child(1) {
            top: 1px;
            width: 80%;
        }

        .mobile-nav-btn .lines:nth-child(2), .mobile-nav-btn .lines:nth-child(3) {
            top: 11px;
        }

        .mobile-nav-btn .lines:nth-child(4) {
            top: 21px;
            width: 60%;
        }

        .mobile-nav-btn .lines {
            display: block;
            position: absolute;
            height: 2px;
            width: 100%;
            background: #2f2e32;
            border-radius: 3px;
            opacity: 1;
            left: 0;
            -webkit-transform: rotate(
                0deg
            );
            -moz-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            transform: rotate(
                0deg
            );
            -webkit-transition: 0.25s ease-in-out;
            -moz-transition: 0.25s ease-in-out;
            -o-transition: 0.25s ease-in-out;
            transition: 0.25s ease-in-out;
        }

        amp-sidebar#amp_menu_sidebar, .mobile-nav {
            width: 100%;
        }

        .mobile-nav {
            /*position: fixed;*/
            /*width: 0%;*/
            height: 100%;
            top: 0;
            left: 0;
            z-index: 999;
            background: #005384;
            -webkit-transition: 0.6s;
            -moz-transition: 0.6s;
            -o-transition: 0.6s;
            transition: 0.6s;
            padding: 20%;
            font-size: 1.2rem;
        }

        .mobile-nav .mobile-navigation a {
            color: #ffffff;
            font-size: 18px;
            margin-bottom: 6px;
            padding-bottom: 6px;
            display: block;
            position: relative;
        }

        @if(env('PROMOTIONS') == true)
            .promotion-bar.row {
                background-color: {{ env("PROMOTION_BG_COLOR") }};
                position: fixed;
                top: 0;
                left: 0;
                z-index: 9999;
                border-bottom: 2px solid white;
                width: 100%;
                margin: 0;
            }

            .top-bar {
                margin-top: 32px;
            }

            .promotion-bar img {
                max-width: 768px;
                margin: 0 auto;
                width: 100%;
            }

            .sticky-header {
                position: fixed;
                top: 0;
                width: 100%;
                margin: 0;
                z-index: 999;
            }

            #sale-top-bar {
                display: block;
            }

            .sticky-header + .top-bar {
                padding-top: 60px;
            }

            #sale-top-bar-mobile-textual {
                display: block;
                text-align: center;
                padding: 2px;
                line-height: 1.4;
                font-weight: bold;
                margin: 0;
                font-size: 13px;
                text-transform: uppercase;
                color: {{ env('PROMOTION_TEXT_COLOR') }};
            }

            #sale-top-bar-mobile-textual > a {
                background: #fdbb33;
                padding: 5px 15px;
                border-radius:5px;
                display: inline-block;
            }
            #sale-top-bar-mobile-textual > a:hover{
                background: #f5c769;
            }


            .sticky-header + .top-bar {
                padding-top: 76px;
            }

            .hidden {
                display: none;
            }
        @endif
        @include('amp.styles')
        @stack('custom-css')
    </style>
    @stack('structure-data')
</head>
<!-- AMP html magic which is like normal html (almost) -->
<body class="<?php echo isset($pageclass) ? $pageclass : 'homepg'; ?>">
<!-- Mobile Navigation START -->
<amp-sidebar id="amp_menu_sidebar" layout="nodisplay" side="left">
    <nav class="mobile-nav ta-center">
        <ul class="unstyled mobile-navigation">
            <li>
                <a href="{{ route('home',$amp_param) }}">Home</a>
            </li>
            <li>
                <a href="{{ route('about-us',$amp_param) }}">About us</a>
            </li>
            <li>
                <a href="{{ route('osha-10-hour-online',$amp_param) }}" class="fw-bold">OSHA 10 Hour</a>
            </li>
            <li>
                <a href="{{ route('osha-30-hour-online',$amp_param) }}" class="fw-bold">OSHA 30 Hour</a>
            </li>
            <li><a href="{{ route('courses',$amp_param) }}">All Courses</a></li>
            <li>
                <a href="{{ route('group-enrollment') }}">Group Enrollment</a>
            </li>
            <li>
                <a href="{{ url('blog') }}/">Blog</a>
            </li>
            <li>
                <a class="fw-bold" href="{{  route('american-recruits.signup')  }}">American Recruits</a>
            </li>
            <li>
                <a href="{{ route('contact-us') }}">Contact</a>
            </li>
            <li>
                <a href="{{ route('faq',$amp_param) }}">FAQ</a>
            </li>
        </ul>
    </nav>
</amp-sidebar>
<!-- Mobile Navigation END -->
<main class="app-container">
    <header>
                @if(env('PROMOTIONS') == true && Route::currentRouteName() !== 'promotions')
                    <div class="row promotion-bar">
                        <div class="col-xs-12">
                                {{--                                <div id="sale-top-bar-mobile">--}}
                                {{--                                    <amp-img--}}
                                {{--                                        src="{{ asset('/images/promotions/'.env('PROMOTION_NAME').'/homepage-topbanner-mobile-425x82.jpg') }}"--}}
                                {{--                                        alt="{{ env('PROMOTION_TEXT') }}"--}}
                                {{--                                        title="{{ env('PROMOTION_TEXT') }}"--}}
                                {{--                                        layout="responsive"--}}
                                {{--                                        width="310px"--}}
                                {{--                                        height="60px"--}}
                                {{--                                    >--}}
                                {{--                                    </amp-img>--}}
                                {{--                                </div>--}}
                                <div id="sale-top-bar-mobile-textual">
                                    <span>{{  env('PROMOTION_TEXT') }}</span>
                                    <a href="{{ route('promotions') }}?outputType=amp">CLICK HERE</a>
                                </div>
                        </div>
                    </div>
                @endif
        <div class="top-bar" style="max-height: 33px;">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="top-nav ta-right">
                            <ul class="inline unstyled">
                                <li style="border:none;"><a href="tel:+18332126742" class="contact-number"><span
                                            class="icon-phone" aria-hidden="true"></span>&nbsp;+1-833-212-6742</a></li>
                                <li style="border-left: 1px solid;"><a
                                        href="{{ url('lms') }}{{ isset($_GET['uoid']) ? '?uoid='.$_GET['uoid'] : '' }}"><i
                                            class="icon-user" aria-hidden="true"></i>&nbsp;Login</a></li>
                                <li>
                                    <a href="{{ route('order.details') }}" class="shopping-cart" title="Shopping Cart">
                                        <i class="icon-cart" aria-hidden="true">
                                            <small
                                                class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '0' }}</small>
                                        </i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="primary-header" style="max-height: 141px;">
            <div class="container">
                <div class="row">
                    <div class="col-xs-8">
                        <a href="{{ route('home', $amp_param) }}" class="header-logo" id="header-logo">
                            <amp-img src="{{ asset('images/osha-outreach-courses.png') }}"
                                     alt="OSHA Outreach Courses Header Logo" layout="responsive" width="310px"
                                     height="60px"></amp-img>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <!-- Mobile Navigation Button Start-->
                        <button class="mobile-nav-btn float-xs-right" on="tap:amp_menu_sidebar">
                            <span class="lines"></span>
                            <span class="lines"></span>
                            <span class="lines"></span>
                            <span class="lines"></span>
                        </button>
                        <!-- Mobile Navigation Button End-->
                    </div>
                </div>
            </div>
        </div>
    </header>
    @yield('content')
    <footer class="primary-footer" style="background-image: url('{{ asset("/images/footer-watermark.png") }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('home',$amp_param) }}" class="footer-logo">
                        <amp-img alt="OSHA Outreach Courses" class="m-auto"
                                 width="317px"
                                 height="62px"
                                 src="{{ asset('/images/footer-logo.webp') }}">
                        </amp-img>
                    </a>
                    <div class="social-links">
                        <p class="title">Follow us</p>
                        <ul class="unstyled inline">
                            <li><a href="https://www.facebook.com/OSHAOutreachCourses/" rel="noreferrer"
                                   target="_blank"><i
                                        class="xicon icon-facebook"></i></a></li>
                            <li><a href="https://twitter.com/oshaoutreach" rel="noreferrer" target="_blank"><i
                                        class="xicon icon-twitter"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/osha-outreach-courses/" rel="noreferrer"
                                   target="_blank"><i
                                        class="xicon icon-linkedin"></i></a></li>
                            <li><a href="https://www.instagram.com/oshaoutreach/" rel="noreferrer" target="_blank"><i
                                        class="xicon icon-instagram"></i></a></li>
                            <li><a href="https://www.pinterest.com/oshaoutreachcourses/" rel="noreferrer"
                                   target="_blank"><i
                                        class="xicon icon-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 offset-md-1">
                    <a href="mailto:help@oshaoutreachcourses.com"
                       class="about-desc">help@oshaoutreachcourses.com</a>
                    <p class="about-desc">
                        <span class="d-block">
                            <span class="about-desc">Call:</span>
                            <a href="tel:+18332126742" class="about-desc"> +1-833-212-6742</a>
                        </span>
                        <br>
                        We are here to help
                        <a href="{{ route('contact-us',$amp_param) }}">
                            <button type="button" class="btn --btn-small" type="button"
                                    style="background-color: #a7a8a8; margin: 0 auto 5px auto;color: black; padding: 5px; font-size: 12px; display: block;">
                                Contact Us
                            </button>
                        </a>
                    </p>
                    <div class="mtpx-15 hidden-sm-up">
                        <div class="trustedsite-trustmark" style="margin-right: 10px" data-type="202" data-width="120"
                             data-height="50"></div>
                        <div class="mfes-trustmark" data-type="102" data-width="120" data-height="50"></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="copyright">
        <p>Copyright &copy; {{ date('Y') }} <span class="fc-white"> OSHA Outreach Courses</span></p>
    </div>
</main>
@if(config('app.env') == 'production')
    <amp-analytics type="gtag" data-credentials="include">
        <script type="application/json">
            {
              "vars" : {
                "gtag_id": "G-374122451",
                "config" : {
                  "G-374122451": { "groups": "default" }
                }
              }
            }


        </script>
    </amp-analytics>
@endif
</body>
</html>
