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

        .offset-md-2 {
            margin-left: 16.666667%;
        }

        @include('amp.styles')
        @stack('custom-css')
    </style>
    @stack('structure-data')
</head>
<!-- AMP html magic which is like normal html (almost) -->
<body class="<?php echo isset($pageclass) ? $pageclass : 'homepg'; ?>">

<main class="app-container">
    <header>
        <div class="top-bar" style="max-height: 33px;">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="top-nav ta-right">
                            <ul class="inline unstyled">
                                <li style="border:none;"><a href="tel:+18332126742" class="contact-number"><span
                                            class="icon-phone" aria-hidden="true"></span>&nbsp;+1-833-212-6742</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="primary-header" style="max-height: 141px;">
            <div class="container">
                <div class="row">
                    <div class="offset-md-2 col-xs-8">
                            <amp-img src="{{ asset('images/osha-outreach-courses.png') }}"
                                     alt="OSHA Outreach Courses Header Logo" layout="responsive" width="310px"
                                     height="60px"></amp-img>
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
                </div>
                <div class="col-md-3 offset-md-1">
                    <a href="mailto:help@oshaoutreachcourses.com"
                       class="about-desc">help@oshaoutreachcourses.com</a>
                    <p class="about-desc">
                        <span class="d-block">
                            <span class="about-desc">Call:</span>
                            <a href="tel:+18332126742" class="about-desc"> +1-833-212-6742</a>
                        </span>
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
