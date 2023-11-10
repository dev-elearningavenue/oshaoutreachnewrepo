<!doctype html>
<html class="no-js" lang="en-us">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico"/>
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32"/>
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16"/>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="robots" content="noindex, nofollow"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700|Source+Sans+Pro:400,600,700"
          rel="stylesheet" media="screen">
    {{-- TODO: Update version after change in style.css --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('src/css/style.css') }}?v=1.0" media="screen"/>
    <style>
        .no-js #loader {
            display: none;
        }

        .js #loader {
            display: block;
            position: absolute;
            left: 100px;
            top: 0;
        }

        .no-webp .pre-loading {
            background: url("/images/osha-outreach-courses.png") center no-repeat #fff;
        }

        .webp .pre-loading {
            background: url("/images/osha-outreach-courses.webp") center no-repeat #fff;
        }

        .promotion-bar.row {
            background-color: {{ env("PROMOTION_BG_COLOR") }};
            margin-bottom: 40px;
        }

        .promotion-bar img {
            max-width: 768px;
            margin: 0 auto;
            width: 100%;
        }

        #sale-inner-top-bar {
            display: block;
        }

        #sale-inner-top-bar-mobile {
            display: none;
        }

        @media (max-width: 425px) {
            #sale-inner-top-bar {
                display: none;
            }

            #sale-inner-top-bar-mobile {
                display: block;
            }
        }
    </style>
    <style>
        @stack('custom-css')
    </style>
    @if(config('app.env') == 'production')
        @if(!empty($WEB_CREDIT))
            <!-- BEGIN JIVOSITE CODE {literal} -->
            <script type='text/javascript'>
                (function () {
                    var widget_id = 'lD5H1YS4Om';
                    var s = document.createElement('script');
                    s.type = 'text/javascript';
                    s.async = true;
                    s.src = '//code.jivosite.com/script/widget/' + widget_id;
                    var ss = document.getElementsByTagName('script')[0];
                    ss.parentNode.insertBefore(s, ss);
                })();
            </script>
            <!-- {/literal} END JIVOSITE CODE -->
        @else
            <!-- Google Tag Manager -->
            <script>(function (w, d, s, l, i) {
                    w[l] = w[l] || [];
                    w[l].push({
                        'gtm.start':
                            new Date().getTime(), event: 'gtm.js'
                    });
                    var f = d.getElementsByTagName(s)[0],
                        j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                    j.async = true;
                    j.src =
                        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                    f.parentNode.insertBefore(j, f);
                })(window, document, 'script', 'dataLayer', 'GTM-M2QZGDM');</script>
            <!-- End Google Tag Manager -->

            <!--BEGIN: Microsoft Advertising UET Javascript tag.-->
            <script>(function (w, d, t, r, u) {
                    var f, n, i;
                    w[u] = w[u] || [], f = function () {
                        var o = {ti: "20128794"};
                        o.q = w[u], w[u] = new UET(o), w[u].push("pageLoad")
                    }, n = d.createElement(t), n.src = r, n.async = 1, n.onload = n.onreadystatechange = function () {
                        var s = this.readyState;
                        s && s !== "loaded" && s !== "complete" || (f(), n.onload = n.onreadystatechange = null)
                    }, i = d.getElementsByTagName(t)[0], i.parentNode.insertBefore(n, i)
                })(window, document, "script", "//bat.bing.com/bat.js", "uetq");</script>
            <!--END: Microsoft Advertising UET Javascript tag-->

            <meta name="google-site-verification" content="R3O-GwQBBR_mmIIKNIx47u8Z5HIBEb9dZ6-sYmbPwZU"/>
            <meta name="google-site-verification" content="EVVoH-BPn04dS-rAkJll_DWNtqgbylRahB-KU5HXhZU"/>
        @endif

        @php
            $gtag_ID = 'G-374122451';
        @endphp
        @if ($WEB_CREDIT == 1)
            @php
                $gtag_ID = 'UA-73532257-10';
            @endphp
        @elseif ($WEB_CREDIT == 2)
            @php
                $gtag_ID = 'UA-73532257-11';
            @endphp
        @elseif ($WEB_CREDIT == 3)
            @php
                $gtag_ID = 'UA-73532257-12';
            @endphp
        @endif
        <!-- Global site tag (gtag.js) - Google Ads: 945079766 -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $gtag_ID }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }

            gtag('js', new Date());

            gtag('config', '{{$gtag_ID}}');
            @if(empty($WEB_CREDIT))
            gtag('config', 'AW-945079766');
            @endif

            // gtag('config', 'AW-945079766/UzXgCJux7MgBENaL08ID', {
            //     'phone_conversion_number': '+1-833-212-6742'
            // });
            @if(Route::currentRouteName() == 'promotions.success' && $order->is_gtag_submitted != true)

            @php
                $order_amount = 0;
                $order_amount = $order->amount
            @endphp

            var order_amount = parseFloat('{{ $order_amount }}');
            var order_uid = '{{ $order->uoid }}';

            @php
                $total_products = 0
            @endphp

            function GetRevenueValue() {
                return order_amount;
            }

            var bingTimer = setInterval(function () {
                if (window.uetq) {
                    // <!-- Bing Track Variable Revenue -->
                    window.uetq = window.uetq || [];
                    // window.uetq.push('event', 'Purchase', {'revenue_value': GetRevenueValue(), 'currency': 'USD'});
                    window.uetq.push('event', '', {'revenue_value': GetRevenueValue(), 'currency': 'USD'});

                    clearInterval(bingTimer);
                }
            }, 100);

            // <!-- Event snippet for Purchase - Adwords conversion page -->
            gtag('event', 'conversion', {
                'send_to': 'AW-945079766/Yq-QCKmk7MgBENaL08ID',
                'value': order_amount,
                'currency': 'USD',
                'transaction_id': order_uid
            });

            gtag('event', 'purchase', {
                "transaction_id": order_uid,
                "affiliation": "OSHA Outreach Courses",
                'value': order_amount,
                "currency": "USD",
                "tax": 0,
                "shipping": 0,
                "items": [
                        @foreach($cart->items as $key => $product)
                    {
                        "id": 'SKU-{{ str_pad($product['item']['id'], 4, '0', STR_PAD_LEFT) }}',
                        "name": '{{ $product['item']['title'] }}',
                        "brand": "OSHA",
                        "category": "Online Courses",
                        "quantity": '{{ $product['qty'] }}',
                        "price": '{{ $product['item']['price'] }}'
                    },
                    @php
                        $total_products = $total_products + $product['qty']
                    @endphp
                    @endforeach
                ]
            });

            var twitterTimer = setInterval(function () {
                if (window.twq) {
                    // <!-- Twitter Conversion Tracking -->
                    window.twq('track', 'Purchase', {
                        //required parameters
                        value: order_amount,
                        currency: 'USD',
                        num_items: '{{ $total_products }}'
                    });
                    clearInterval(twitterTimer);
                }
            }, 100);

            var facebookTimer = setInterval(function () {
                if (window.fbq) {
                    // <!-- Event snippet for Purchase - Facebook Pixel Code -->
                    window.fbq('track', 'Purchase',
                        // begin parameter object data
                        {
                            value: order_amount,
                            currency: 'USD',
                            contents: [
                                    @foreach($cart->items as $key => $product)
                                {
                                    "id": 'SKU-{{ str_pad($product['item']['id'], 4, '0', STR_PAD_LEFT) }}',
                                    "quantity": '{{ $product['qty'] }}',
                                },
                                @endforeach
                            ],
                            content_type: 'product',
                            transaction_id: order_uid,
                        }
                        // end parameter object data
                    );
                    clearInterval(facebookTimer);
                }
            }, 100);
        </script>
        <script type='text/javascript'>
            @php
                $order->is_gtag_submitted = true;
                $order->save()
            @endphp
            @endif
        </script>
    @endif
    @yield('styles')
</head>
<body class="<?php echo isset($pageclass) ? $pageclass : 'homepg'; ?>">
@if(empty($WEB_CREDIT))
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M2QZGDM"
                height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
    @endif
<!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a
        href="http://browsehappy.com/">upgrade
        your browser</a> to improve your experience.</p>
    <![endif]-->
    {{--<div class="pre-loading"></div>--}}
    <div class="loader" style="display: none;"></div>
    <main class="app-container">
        {{-- Top bar --}}
{{--        <div class="row promotion-bar" style="z-index:99999;">--}}
{{--            <div class="col-md-12">--}}
{{--                @if(Route::currentRouteName() !== "free-signup")--}}
{{--                    <div id="sale-top-bar" class="ta-center">--}}
{{--                        <span>{{  env('PROMOTION_TEXT') }}</span>--}}
{{--                        <a href="{{ route('free-signup') }}">--}}
{{--                            SIGNUP NOW--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}
        {{-- Top bar --}}
        <header class="top-bar">
            <div class="container">
                @if(env('PROMOTIONS') == true)
                    <style>
                        .promotion-bar.row {
                            background-color: {{ env("PROMOTION_BG_COLOR") }};
                            margin: 0;
                            z-index: 99999;
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
                            width: 100%;
                            height: auto;
                            padding: 0.5rem;
                            font-weight: 900;
                            font-size: 1rem;
                            color: {{ env('PROMOTION_TEXT_COLOR') }};
                        }

                        #sale-top-bar a {
                            background: #fdbb33;
                            padding: 5px 15px;
                            border-radius: 5px;
                            display: inline-block;
                        }

                        #sale-top-bar a:hover {
                            background: #f5c769;
                        }

                        #sale-top-bar-mobile {
                            display: none;
                        }

                        #sale-top-bar-mobile-textual {
                            display: none;
                        }

                        .sticky-header + .top-bar {
                            padding-top: 60px;
                        }

                        @media (max-width: 500px) {
                            header.top-bar {
                                /* margin-top: 58px; */
                            }

                            .row.promotion-bar {
                                position: fixed;
                                z-index: 9999;
                            }
                        }

                        @media (max-width: 500px) {
                            #sale-top-bar {
                                display: block;
                                text-align: center;
                                padding: 2px;
                                line-height: 1.4;
                                font-weight: bold;
                                margin: 0;
                                text-transform: uppercase;
                                color: {{ env('PROMOTION_TEXT_COLOR') }};
                            }
                        }

                        @media (max-width: 425px) {
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
                                text-decoration: underline;
                                font-weight: 900 !important;
                                color: {{ env('PROMOTION_TEXT_COLOR') }};
                            }

                            .row.promotion-bar {
                                border-bottom: 2px solid white !important;
                            }

                            .sticky-header + .top-bar {
                                padding-top: 76px;
                            }
                        }

                        @media screen and (max-width: 332px) {
                            header.top-bar {
                                /* margin-top: 80px; */
                            }
                        }

                        @media screen and (max-width: 248px) {
                            header.top-bar {
                                /* margin-top: 90px; */
                            }

                            .top-bar .top-nav ul {
                                display: flex;
                            }

                            .top-bar .top-nav li {
                                padding: 0 5px
                            }
                        }

                        @media screen and (max-width: 183px) {
                            header.top-bar {
                                /* margin-top: 110px; */
                            }

                            .top-bar .top-nav ul {
                                flex-wrap: wrap;
                                justify-content: center;
                            }

                            .top-bar .top-nav li {
                                padding: 0 5px
                            }
                        }

                        @media screen and (max-width: 168px) {
                            header.top-bar {
                                /* margin-top: 130px; */
                            }
                        }

                    </style>
                @endif

                <div class="row">
                    <div class="hidden-sm-down col-xs-12 col-md-7 col-lg-6">
                        <div class="top-nav ta-left">
                            <ul class="inline unstyled">
                                <li class="hidden-xs-down" style="border:0;"><a
                                        href="mailto:help@oshaoutreachcourses.com" class="contact-number"><span
                                            class="icon-email" aria-hidden="true"></span>&nbsp;help@oshaoutreachcourses.com</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-5 col-lg-6">
                        <div class="top-nav ta-right">
                            <ul class="inline unstyled">
                                {{--                                <li><a href="/promotions#group-enrollment" class="contact-number">Group Discount</a>--}}
                                {{--                                </li>--}}
                                <li style="border:0"><a href="tel:+18332126742" class="contact-number"><span
                                            class="icon-phone" aria-hidden="true"></span>&nbsp;+1-833-212-6742</a>
                                </li>
                                <li style="border-left: 1px solid;">
                                    <a href="{{ url('lms') }}{{ isset($_GET['uoid']) ? '?uoid='.$_GET['uoid'] : '' }}">
                                        <i class="icon-user" aria-hidden="true"></i>
                                        &nbsp;Login
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <header class="primary-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xs-8">
                        <a href="{{ route('home') }}" class="header-logo" id="header-logo">
                            <picture>
                                <source srcset="{{ asset('/images/osha-outreach-courses.webp') }}" type="image/webp">
                                <source srcset="{{ asset('/images/osha-outreach-courses.png') }}" type="image/png">
                                <img src="{{ asset('/images/osha-outreach-courses.png') }}" alt="OSHA Outreach Courses"
                                     title="OSHA Outreach Courses">
                            </picture>
                        </a>
                    </div>
                    <div class="col-md-8 col-xs-4">
                        <nav class="hidden-sm-down">
                            <ul class="unstyled inline navigation">
                                {{-- <li>
                                    <a href="{{ route('home') }}">Home</a>
                                </li> --}}
                                <li>
                                    <a href="{{ route('promotions') }}#courses">Courses</a>
                                </li>
                                <li>
                                    <a href="{{ route('promotions') }}#promotions-table">Features</a>
                                </li>
                                <li>
                                    <a href="{{ route('promotions') }}#reviews">Reviews</a>
                                </li>
                                <li>
                                    <a href="{{ route('promotions') }}#group-enrollment">Group Discount</a>
                                </li>
                                {{--<li>
                                    <a href="{{ route('group-enrollment') }}">Group Discount</a>
                                </li>--}}
                            </ul>
                        </nav>
                        <!-- Mobile Navigation Button Start-->
                        <div class="mobile-nav-btn float-xs-right hidden-md-up">
                            <span class="lines"></span>
                            <span class="lines"></span>
                            <span class="lines"></span>
                            <span class="lines"></span>
                        </div>
                        <!-- Mobile Navigation Button End-->
                        <!-- Mobile Navigation START -->
                        <nav class="mobile-nav ta-center">
                            <ul class="unstyled mobile-navigation">
                                <li>
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('promotions') }}#courses">Courses</a>
                                </li>
                                <li>
                                    <a href="{{ route('promotions') }}#group-enrollment">Group Discount</a>
                                </li>
                                <li>
                                    <a href="{{ route('promotions') }}#why-us">Why us?</a>
                                </li>
                                <li>
                                    <a href="{{ route('reviews') }}">Reviews</a>
                                </li>
                                {{--<li>
                                    <a href="{{ route('group-enrollment') }}">Group Discount</a>
                                </li>--}}
                            </ul>
                        </nav>
                        <!-- Mobile Navigation END -->
                    </div>
                </div>
            </div>
        </header>

        @yield('content')
        {{--state footer here--}}
        @php
            $statePartialOptions = [];

            if(Route::currentRouteName() == 'statePromotions.single') {
                $statePartialOptions['blueBackground'] = true;
            }
        @endphp
        {{--@include('partials._states_footer', $statePartialOptions)--}}
        <footer class="primary-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 offset-md-1">
                        <div class="footer-logo">
                            <picture>
                                <source srcset="{{ asset('/images/footer-logo.webp') }}" type="image/webp">
                                <source srcset="{{ asset('/images/footer-logo.png') }}" type="image/png">
                                <img
                                    loading="lazy"
                                    src="{{ asset('/images/footer-logo.png') }}" alt="OSHA Outreach Courses"
                                    title="OSHA Safety Training">
                            </picture>
                        </div>
                        <p class="about-desc hidden-sm-down">
                            OSHA Outreach courses are provided in partnership with HSI, an OSHA-authorized online
                            Outreach provider.
                        </p>
                        <div class="social-links">
                            <p class="title">Follow us</p>
                            <ul class="unstyled inline">
                                <li>
                                    <a
                                        rel="noreferrer nofollow"
                                        href="https://www.facebook.com/OSHAOutreachCourses/"
                                        target="_blank"
                                    >
                                        <i class="xicon icon-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a
                                        rel="noreferrer nofollow"
                                        href="https://twitter.com/oshaoutreach"
                                        target="_blank"
                                    >
                                        <i class="xicon icon-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a
                                        rel="noreferrer nofollow"
                                        href="https://www.youtube.com/c/OshaOutreachCourses"
                                        target="_blank"
                                    >
                                        <i class="xicon icon-play"></i>
                                    </a>
                                </li>
                                <li>
                                    <a
                                        rel="noreferrer nofollow"
                                        href="https://www.linkedin.com/company/osha-outreach-courses/"
                                        target="_blank"
                                    >
                                        <i class="xicon icon-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a
                                        rel="noreferrer nofollow"
                                        href="https://www.instagram.com/oshaoutreach/"
                                        target="_blank"
                                    >
                                        <i class="xicon icon-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a
                                        rel="noreferrer nofollow"
                                        href="https://www.pinterest.com/oshaoutreachcourses/"
                                        target="_blank"
                                    >
                                        <i class="xicon icon-pinterest"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mtpx-15 hidden-sm-down">
                            <div class="trustedsite-trustmark" style="margin-right: 10px" data-type="202"
                                 data-width="120"
                                 data-height="50"></div>
                            {{--                            <div class="mfes-trustmark" data-type="102" data-width="120" data-height="50"></div>--}}
                        </div>

                    </div>
                    <div class="col-md-4 offset-md-1">
                        <h4 class="f-title hidden-sm-down">Contact</h4>
                        <a href="mailto:help@oshaoutreachcourses.com"
                           class="about-desc">help@oshaoutreachcourses.com</a>
                        <p class="about-desc mtpx-20 mbpx-20"><span class="hidden-sm-down"> Got Questions?</span>
                            <span class="d-block"><span class="about-desc">Call:</span><a href="tel:+18332126742"
                                                                                          class="about-desc"> +1-833-212-6742</a></span>
                        </p>
                        <div class="mtpx-15 hidden-sm-up">
                            <div class="trustedsite-trustmark" style="margin-right: 10px" data-type="202"
                                 data-width="120"
                                 data-height="50"></div>
                            <div class="mfes-trustmark" data-type="102" data-width="120" data-height="50"></div>
                        </div>
                        <p class="about-desc hidden-sm-down mtpx-20">Our OSHA catalog of self-paced, online safety
                            training
                            and courses are created for safety managers, safety trainers, construction employees,
                            employees
                            that deal with safety hazards or hazards in work environment, and general workforce
                            employees.</p>
                    </div>
                </div>
            </div>
        </footer>
        <div class="copyright">
            <p>Copyright &copy; {{ date('Y') }} <span class="fc-white"> OSHA Outreach Courses</span></p>
        </div>
    </main>

    <!-- <div class="overlay-bg"></div> -->
    <script type="text/javascript" src="{{ asset('src/js/functions.js') }}"></script>
    <script type="text/javascript" src="{{ asset('src/js/SmoothScroll.js') }}"></script>
    <script type="text/javascript" src="{{ asset('src/js/script.js?ver=20201218') }}"></script>
    <script type="text/javascript">
        // Select all links with hashes
        $('a[href*="#"]')
            // Remove links that don't actually link to anything
            .not('[href="#"]')
            .not('[href="#0"]')
            .click(function (event) {
                // On-page links
                if (
                    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                    &&
                    location.hostname == this.hostname
                ) {
                    // Figure out element to scroll to
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    // Does a scroll target exist?
                    if (target.length) {
                        // Only prevent default if animation is actually gonna happen
                        event.preventDefault();
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 1000, function () {
                            // Callback after animation
                            // Must change focus!
                            var $target = $(target);
                            $target.focus();
                            if ($target.is(":focus")) { // Checking if the target was focused
                                return false;
                            } else {
                                $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                                $target.focus(); // Set focus again
                            }
                            ;
                        });
                    }
                }
            });

        /*$(window).load(function () {
            // Animate loader off screen
            $(".pre-loading").fadeOut("slow");
        });*/
        $(document).ready(function () {
            /*setTimeout(function(){
                // Animate loader off screen
                $(".pre-loading").fadeOut("slow");
            }, 1500);*/
            $('.mobile-navigation li a').click(function () {
                $('.mobile-nav-btn, .mobile-nav').toggleClass('nav-active');
            })
        });
    </script>
    {{-- For Topbar --}}
    <script type="text/javascript">
        $(document).ready(function () {
            // remove no-webp class if js enabled
            $('html').removeClass('no-webp');

            // When the user scrolls the page, execute myFunction
            window.onscroll = function () {
                userIsScrolling()
            };

            // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
            function userIsScrolling() {
                if ($(window).scrollTop() > 100) {
                    $('.promotion-bar').addClass("sticky-header");
                } else {
                    $('.promotion-bar').removeClass("sticky-header");
                }
            }
        });
    </script>
    {{-- For Topbar --}}
    <!-- JIVO chat red close button -->
    <script>
        $(window).load(function () {
            setTimeout(function () {
                var imageUrl = 'data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2228%22%20height%3D%2228%22%20viewBox%3D%220%200%2028%2028%22%3E%0A%20%20%20%20%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%20transform%3D%22translate(2%202)%22%3E%0A%20%20%20%20%20%20%20%20%3Ccircle%20cx%3D%2212%22%20cy%3D%2212%22%20r%3D%2212%22%20fill%3D%22%23FFF%22%20opacity%3D%221%22%2F%3E%0A%20%20%20%20%20%20%20%20%3Ccircle%20cx%3D%2212%22%20cy%3D%2212%22%20r%3D%2212.75%22%20stroke%3D%22%23ff0000%22%20stroke-width%3D%221.5%22%20opacity%3D%221%22%2F%3E%0A%20%20%20%20%20%20%20%20%3Cg%20fill%3D%22%23ff0000%22%20opacity%3D%221%22%20transform%3D%22translate(6%206)%22%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%3Crect%20width%3D%221.611%22%20height%3D%2213.9%22%20x%3D%225.435%22%20y%3D%22-.941%22%20rx%3D%22.806%22%20transform%3D%22rotate(45%206.24%206.01)%22%2F%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%3Crect%20width%3D%221.611%22%20height%3D%2213.9%22%20x%3D%225.435%22%20y%3D%22-.941%22%20rx%3D%22.806%22%20transform%3D%22scale(-1%201)%20rotate(45%200%20-9.058)%22%2F%3E%0A%20%20%20%20%20%20%20%20%3C%2Fg%3E%0A%20%20%20%20%3C%2Fg%3E%0A%3C%2Fsvg%3E%0A'
                $('#jivo_close_button>jdiv').attr('style', "background-image: url(\'" + imageUrl + "\');");
            }, 3000);
        });
    </script>
    <!-- JIVO chat red close button -->
    <!-- Seal Shopper Approved -->
    <a href="https://www.shopperapproved.com/reviews/oshaoutreachcourses.com/" class="shopperlink"><img
            src="https://www.shopperapproved.com/newseals/33391/white-mini-icon.gif" style="border: 0"
            alt="Customer Reviews"
            oncontextmenu="var d = new Date(); alert('Copying Prohibited by Law - This image and all included logos are copyrighted by Shopper Approved \251 '+d.getFullYear()+'.'); return false;"/></a>
    <script type="text/javascript">(function () {
            var js = window.document.createElement("script");
            js.src = "https://www.shopperapproved.com/seals/certificate.js";
            js.type = "text/javascript";
            document.getElementsByTagName("head")[0].appendChild(js);
        })();</script>
    <!-- Seal Shopper Approved -->

    {{-- Exit Popup Work --}}
    {{-- @include('partials._exit_popup') --}}
    {{-- Exit Popup Work --}}

    <style>
        .no-webp .primary-footer {
            background-image: url("/images/footer-watermark.png");
        }

        .webp .primary-footer {
            background-image: url("/images/footer-watermark.webp");
        }

        #trustedsite-tm-image {
            display: none;
        }
    </style>
    @yield('scripts')
    @stack('script')
    @if(env('PROMOTIONS') == true)
        <script type="text/javascript">
            $(document).ready(function () {
                // remove no-webp class if js enabled
                $('html').removeClass('no-webp');

                // When the user scrolls the page, execute myFunction
                window.onscroll = function () {
                    userIsScrolling()
                };

                // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
                function userIsScrolling() {
                    if ($(window).scrollTop() > 100) {
                        $('.promotion-bar').addClass("sticky-header");
                    } else {
                        $('.promotion-bar').removeClass("sticky-header");
                    }
                }
            });
        </script>
    @endif
</body>
</html>
