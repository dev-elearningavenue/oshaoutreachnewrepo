<!doctype html>
@if(strpos(Route::currentRouteName(), 'course.') !== false)
    <html class="no-js no-webp" lang="@yield('language')">
    @else
        <html class="no-js no-webp" lang="en-us">
        @endif
        <head>
            <meta charset="UTF-8">
            <title>@yield('title')</title>
            <link rel="icon" type="image/x-icon" href="/favicon.ico"/>
            <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32"/>
            <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16"/>
            <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
            <link
                href="https://fonts.googleapis.com/css?family=Poppins:400,600,700|Source+Sans+Pro:400,600,700&display=swap"
                rel="stylesheet" media="screen">
            {{-- TODO: Update version after change in style.css --}}
            <link rel="stylesheet" type="text/css" href="{{ asset('src/css/style.css') }}?v=1.0" media="screen"/>
            <script type="application/ld+json">
                {
                  "@context": "https://schema.org",
                  "@type": "Organization",
                  "url": "{{ url('/') }}",
                  "logo": "{{ url('/images/osha-outreach-courses.png') }}"
                }
            </script>
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

                #trustedsite-tm-image {
                    display: none;
                }
            </style>

            @if(strpos(Route::currentRouteName(), 'course.') === false)
                @if(Route::currentRouteName() == 'courses' && route('courses') !== url()->full())
                @else
                <!-- Canonical Links -->
                    <link rel="canonical" href="{{ url()->full() }}"/>
                    {{-- @if(Route::currentRouteName() == 'courses' && !empty($courses))
                         @if($courses->currentPage() != 1)
                             <link rel="prev" href="{{ $courses->url($courses->currentPage() - 1) }}">
                         @endif
                         @if($courses->hasMorePages())
                             <link rel="next" href="{{ $courses->nextPageUrl() }}">
                         @endif
                     @endif--}}
                    <link rel="alternate" hreflang="en-us" href="{{ url()->full() }}"/>
                    <link rel="alternate" hreflang="x-default" href="{{ url()->full() }}"/>
                @endif
            @endif
            @if($WEB_CREDIT == '')
                @include('layouts._master_header')
            @else
                @include('layouts._bdm_header')
            @endif
            @yield('styles')
            <style>
                @stack('custom-css')
            </style>
            <meta name="p:domain_verify" content="38cc9707ae391842799041422a8b1d6b"/>
        </head>
        <body class="<?php echo isset($pageclass) ? $pageclass : 'homepg'; ?>">
        <!-- Google Tag Manager (noscript) -->
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M2QZGDM"
                    height="0" width="0" style="display:none;visibility:hidden"></iframe>
        </noscript>
        <!-- End Google Tag Manager (noscript) -->
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a
            href="http://browsehappy.com/">upgrade
            your browser</a> to improve your experience.</p>
        <![endif]-->
        {{--<div class="pre-loading" style="position: fixed; left: 0px; top: 0px; width: 100%; height: 100%; z-index: 9999;"></div>--}}
        <div class="loader" style="display: none;"></div>
        <main class="app-container">
            @include('partials.navigation', ['promotionNav' => true])
            @yield('content')
            <footer class="primary-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="footer-logo">
                                <picture>
                                    <source srcset="{{ asset('/images/footer-logo.webp') }}" type="image/webp">
                                    <source srcset="{{ asset('/images/footer-logo.png') }}" type="image/png">
                                    <img src="{{ asset('/images/footer-logo.png') }}" alt="OSHA Outreach Courses"
                                    loading="lazy"
                                         title="OSHA Safety Training">
                                </picture>
                            </div>
                            <div class="mtpx-15 hidden-sm-down">
                                <div class="trustedsite-trustmark" style="margin-right: 10px" data-type="202"
                                     data-width="120"
                                     data-height="50"></div>
                                {{--                                <div class="mfes-trustmark" data-type="102" data-width="120" data-height="50"></div>--}}
                            </div>

                        </div>
                        <div class="col-md-3 offset-md-1 hidden-sm-down">
                            <h4 class="fc-title mb-0">We Accept</h4>
                            <picture>
                                <source srcset="{{ asset('/images/payment-methods.webp') }}" type="image/webp">
                                <source srcset="{{ asset('/images/payment-methods.png') }}" type="image/png">
                                <img
                                    loading="lazy" 
                                    src="{{ asset('/images/payment-methods.png') }}" alt="Accepted Payment Methods"
                                     title="Paypal, Visa, Mastercard">
                            </picture>
                        </div>
                        <div class="col-md-3 offset-md-1">
                            <h4 class="fc-title hidden-sm-down">Contact</h4>
                            <a href="mailto:help@oshaoutreachcourses.com"
                               class="about-desc">help@oshaoutreachcourses.com</a>
                            <p class="about-desc mtpx-20 mbpx-20"><span class="hidden-sm-down"> Got Questions?</span>
                                <span class="d-block">
                <span class="about-desc">Call:</span>
                <a href="tel:+18332126742" class="about-desc"> +1-833-212-6742</a>
            </span>
                                <br>
                                <style>@media (max-width: 425px) {
                                        #footer_contact_us_btn {
                                            margin: 0 auto 5px auto;
                                        }
                                    }</style>
                            </p>
                            <div class="mtpx-15 hidden-sm-up">
                                <div class="trustedsite-trustmark" style="margin-right: 10px" data-type="202"
                                     data-width="120"
                                     data-height="50"></div>
                                <div class="mfes-trustmark" data-type="102" data-width="120" data-height="50"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <div class="copyright ta-center">
                <p>Copyright &copy; {{ date('Y') }} <span class="fc-white"> OSHA Outreach Courses</span></p>
            </div>
        </main>


        <form action="{{ url('/applyCoupon') }}" id="coupon_form" method="post" style="display: none;">
            {!! csrf_field() !!}
            <input type="hidden" name="coupon_code" value="OSHA2020DISCOUNT">
        </form>

        <!-- <div class="overlay-bg"></div> -->
        <script type="text/javascript" src="{{ asset('src/js/functions.js') }}"></script>
        {{--<script>
            Modernizr.on('webp', function(result) {
                if (result) {
                    // supported
                } else {
                    // not-supported
                }
            });
        </script>--}}
        {{--<script type="text/javascript" src="{{ asset('src/js/SmoothScroll.js') }}"></script>--}}
        <script type="text/javascript" src="{{ asset('src/js/script.js?ver=20190314') }}"></script>
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
        @if(env('PROMOTIONS') == true && false)
            @if(!in_array(Route::currentRouteName(), ["course.single", "courses", "order.details"]))
                <style>
                    #sale-popup {
                        display: block;
                    }

                    #sale-popup-mobile {
                        display: none;
                    }

                    @media (max-width: 425px) {
                        #sale-popup {
                            display: none;
                        }

                        #sale-popup-mobile {
                            display: block;
                        }
                    }
                </style>
                <!-- Promotions Popup -->
                <div id="promotions-modal" style="display: none;">
                    <div class="inner-div">
                        <a href="#" title="Click to close" class="fs-large float-right close">X</a>
                        <a href="{{ route('promotions') }}">
                            <picture id="sale-popup">
                                <source
                                    srcset="{{ asset('/images/promotions/'.env('PROMOTION_NAME').'/homepage-popup-desktop-700x372.webp') }}"
                                    type="image/webp">
                                <source
                                    srcset="{{ asset('/images/promotions/'.env('PROMOTION_NAME').'/homepage-popup-desktop-700x372.png') }}"
                                    type="image/png">
                                <img
                                    src="{{ asset('/images/promotions/'.env('PROMOTION_NAME').'/homepage-popup-desktop-700x372.png') }}"
                                    alt="{{env('PROMOTION_Text')}} Promotions Popup"
                                    title="{{env('PROMOTION_Text')}} Promotions Popup">
                            </picture>
                            <picture id="sale-popup-mobile">
                                <source
                                    srcset="{{ asset('/images/promotions/'.env('PROMOTION_NAME').'/homepage-popup-mobile-400x331.webp') }}"
                                    type="image/webp">
                                <source
                                    srcset="{{ asset('/images/promotions/'.env('PROMOTION_NAME').'/homepage-popup-mobile-400x331.png') }}"
                                    type="image/png">
                                <img
                                    src="{{ asset('/images/promotions/'.env('PROMOTION_NAME').'/homepage-popup-mobile-400x331.png') }}"
                                    alt="{{env('PROMOTION_Text')}} Promotions Popup"
                                    title="{{env('PROMOTION_Text')}} Promotions Popup">
                            </picture>
                        </a>
                    </div>
                </div>
                <script>
                    function createCookie(name, value, days) {
                        if (days) {
                            var date = new Date();
                            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                            var expires = "; expires=" + date.toGMTString();
                        } else var expires = "";
                        document.cookie = name + "=" + value + expires + "; path=/";
                    }

                    function readCookie(name) {
                        var nameEQ = name + "=";
                        var ca = document.cookie.split(';');
                        for (var i = 0; i < ca.length; i++) {
                            var c = ca[i];
                            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
                        }
                        return null;
                    }

                    // console.log(readCookie('promotions-disable'));
                    if (readCookie('promotions-disable') === null) {
                        setTimeout(function () {
                            $('#promotions-modal').show();
                        }, 15000);
                    }

                    $(document).ready(function () {
                        $('#promotions-modal .close').click(function (e) {
                            hidePromotionsPopup(e);
                        });
                        $('#promotions-modal').on('click', function (e) {
                            if (e.target !== this)
                                return;
                            hidePromotionsPopup(e);
                        });

                        function hidePromotionsPopup(e) {
                            $('#promotions-modal').hide();
                            createCookie('promotions-disable', 1, 1);
                            e.stopPropagation();
                            e.preventDefault();
                        }
                    });
                </script>
            @endif
        @endif
        <style>
            .no-webp .primary-footer {
                background-image: url("/images/footer-watermark.png");
            }

            .webp .primary-footer {
                background-image: url("/images/footer-watermark.webp");
            }

            #promotions-modal {
                position: fixed;
                display: flex;
                justify-content: center;
                align-items: center;
                position: fixed;
                left: 0;
                top: 0;
                right: 0;
                margin: 0 auto;
                height: 100vh;
                width: 100%;
                background: rgba(0, 0, 0, 0.9);
                z-index: 1000;
            }

            #promotions-modal .inner-div {
                margin: 0 auto;
                position: absolute;
                left: 0;
                right: 0;
                top: 50%;
                -ms-transform: translateY(-50%);
                transform: translateY(-50%);
                max-width: 700px;
            }

            #promotions-modal .inner-div img {
                margin: 0 auto;
            }

            #promotions-modal .inner-div .close {
                position: absolute;
                right: 15px;
                top: 7px;
                font-weight: bold;
                color: #ffffff;
            }

            .copyright a {
                color: #a7a8a8;
            }

            @media (min-width: 768px) {
                .copyright p {
                    display: inline-block;
                    margin-right: 40px;
                }
            }
        </style>
        @if(false && config('app.env') == 'production' && !in_array(Route::currentRouteName(), ["course.single", "courses", "lms"]))
            <!-- Congratulation Popup -->
            <div class="congratulations-popup" id="ouibounce-modal" style="display: none;">
                <div>
                    <picture>
                        <source srcset="{{ asset('images/giftbox.webp') }}" type="image/webp">
                        <source srcset="{{ asset('images/giftbox.png') }}" type="image/png">
                        <img src="{{ asset('images/giftbox.png')}}"
                             alt="Congratulations- You received a special discount.">
                    </picture>
                    <h4>CONGRATULATIONS</h4>
                    <p>You received a special discount </p>
                    <button class="avail-btn" id="cp-accept-btn">Click Here TO AVAIL</button>
                    <button class="thanks-btn" id="cp-decline-btn">No, THANKS</button>
                </div>
            </div>
            <script src="{{ asset('src/js/ouibounce.min.js') }}"></script>
            <script>
                setTimeout(function () {
                    // if you want to use the 'fire' or 'disable' fn,
                    // you need to save OuiBounce to an object
                    var _ouibounce = ouibounce(document.getElementById('ouibounce-modal'), {
                        aggressive: false,
                        sitewide: true,
                        cookieDomain: '.oshaoutreachcourses.com',
                        cookieName: 'OOC2020Cookie',
                        cookieExpire: 15,
                        timer: 0,
                        callback: function () {
                            // console.log('ouibounce fired!');
                            $('#ouibounce-modal').show();
                        }
                    });

                    $('body').on('click', function () {
                        //$('#ouibounce-modal').hide();
                    });

                    $('#ouibounce-modal #cp-decline-btn').on('click', function () {
                        //_ouibounce.disable({ cookieExpire: 15, sitewide: true });
                        $('#ouibounce-modal').hide();
                    });

                    $('#ouibounce-modal #cp-accept-btn').on('click', function () {
                        // Redirect to /Order Details after apply coupon first
                        _ouibounce.disable({cookieExpire: 15, sitewide: true});

                        // Activate Coupon
                        $('#coupon_form').submit();
                    });

                    $('#ouibounce-modal .modal').on('click', function (e) {
                        e.stopPropagation();
                    });
                }, 30000);
            </script>
        @endif
        <script type="text/javascript">
            /*$(window).load(function () {
                // Animate loader off screen
                $(".pre-loading").fadeOut("slow");
            });*/
            /*$(document).ready(function () {
                setTimeout(function(){
                    // Animate loader off screen
                    $(".pre-loading").fadeOut("slow");
                }, 1500);
            });*/
        </script>
        @if(strpos(Route::currentRouteName(), 'course.') !== false)
            <style>
                @media (max-width: 1024px) {
                    #st-2 {
                        display: none;
                    }
                }

                /* jdiv#jcont, #jvlabelWrap {
                    bottom: 60px !important;
                } */

                .main_Lb > jdiv:nth-child(3) {
                    height: 86% !important;
                }

                .main_Lb > jdiv:nth-child(4) {
                    height: 0% !important;
                }
            </style>
        @endif
        @yield('scripts')
        <!-- BEGIN GCR Language Code -->
        <script>
            window.___gcfg = {
                lang: 'en_US'
            };
        </script>
        <!-- END GCR Language Code -->
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

        <!-- Seal Shopper Approved Plain -->
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
        <!-- Seal Shopper Approved Plain -->
        </body>
        </html>



