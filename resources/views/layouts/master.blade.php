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
            @if(Route::currentRouteName() == "review-us")
                <meta name="robots" content="noindex, nofollow"/>
            @endif
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link
                href="https://fonts.googleapis.com/css?family=Poppins:400,600,700|Source+Sans+Pro:400,600,700&display=swap"
                rel="stylesheet" media="screen">
            {{-- TODO: Update version after change in style.css --}}
            <link rel="stylesheet" type="text/css" href="{{ asset('src/css/style.css') }}?v=2.1" media="screen"/>

        @if(Route::currentRouteName() !== "group-discount")
            <script type="application/ld+json">
{
"@context": "https://schema.org",
"@graph": [{
        "@type": "Organization",
        "additionalType": "EducationalOrganization",
        "@id": "{{ url('/') }}#organization",
        "name": "OSHA Outreach Courses",
        "description": "OSHA Outreach Courses is an online training platform for OSHA courses. It provides OSHA-approved 10 & 30-hour online training for construction & general industry in multiple languages. Get an Official DOL Card Now.",
        "url": "{{ url('/') }}",
        "Brand": {
            "@type": "Brand",
            "name": "{{ env('BRAND_NAME', 'OSHA Outreach Courses') }}",
            "url": "{{ url('/') }}"
        },
        "logo": "{{ url('/images/osha-outreach-courses.png') }}",
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+1 (833) 212-6742",
            "email": "help@oshaoutreachcourses.com",
            "url": "{{ url('/') }}",
            "availableLanguage": "English",
            "contactType": "customer service",
            "contactOption": "TollFree"
        },
        "sameAs": [
            "https://www.linkedin.com/company/osha-outreach-courses/",
            "https://www.facebook.com/OSHAOutreachCourses/",
            "https://twitter.com/oshaoutreach",
            "https://www.youtube.com/c/OshaOutreachCourses",
            "https://www.pinterest.com/oshaoutreachcourses/",
            "https://www.instagram.com/oshaoutreach/"

        ],
        "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "{{ $GLOB_SA_RATING['ratingValue'] }}",
            "reviewCount": "{{ $GLOB_SA_RATING['reviewCount'] }}"
        },
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "17350 TX-249 Ste 220 19204",
            "addressLocality": "Houston, TX",
            "addressRegion": "TX",
            "postalCode": "77064",
            "addressCountry": "USA"
        }

    },
    {
        "@type": "WebSite",
        "url": "{{ url('/') }}",
        "potentialAction": {
            "@type": "SearchAction",
            "query": "{{ url('/') }}/courses?keyword={course_name}&language=all",
            "query-input": "required name=course_name",
            "target": {
                "@type": "EntryPoint",
                "urlTemplate": "{{ url('/') }}/courses?keyword={course_name}&language=all",
                "inLanguage": "en-US"
            }
        }
    }
    @stack('structured-data')
]
}
</script>
        @endif
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

                /* dropdown css */
                .headerDropdown{
                    position:relative;
                    padding-right:15px;
                }
                .headerDropdown .selected span:before{
                    position: absolute;
                    content:'';
                    right:0px;
                    top:0;
                    bottom:0;
                    margin:auto;
                    border-left: solid 5px transparent;
                    border-right: solid 5px transparent;
                    border-top: solid 5px #000;
                    width:0px;
                    height:0px;
                }
                .headerDropdown .selected span:hover:before{
                    border-top: solid 5px #005384;
                }

                .headerDropdown .options{
                    z-index: 999;
                    position: relative;
                }
                .headerDropdown .options ul{
                    background:#fff none repeat scroll 0 0;
                    display:none;
                    list-style:none;
                    position:absolute;
                    right:-11px;
                    padding:5px;
                    top:100%;
                    border-radius: 5px;
                    width:auto;
                    box-shadow:0px 0px 10px -5px rgba(0,0,0,0.2);
                    min-width:170px;
                    border:1px solid #d7d7d7;
                }

                .headerDropdown .options ul li{
                    display: block;
                    border: none;
                    padding: 0;
                }
                .headerDropdown .options ul li a{
                    padding:5px 10px;
                    display:block;
                    text-decoration:none;
                    text-align: left;
                    color:#3179ac;
                }

                .headerDropdown .options ul li a:hover{
                    background:#3179ac;
                    color:#fff;
                    border-radius: 5px;
                    transition:0.2s ease;
                }
                /* dropdown css */
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
            {{-- Exit Popup Work --}}
{{--            <section class="exitPopup x-modal hide">--}}
{{--                <div class="modal-content">--}}
{{--                    <a href="javascript:;" class="close-btn modal-close">--}}
{{--                        x--}}
{{--                    </a>--}}
{{--                    <div class="exitPopUpTop">--}}
{{--                        <h3>Leaving Already?</h3>--}}
{{--                        <h2>We're here to help you!</h2>--}}
{{--                    </div>--}}
{{--                    <div class="exitPopUpBottom">--}}
{{--                        <p>--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 249.219 238.995">--}}
{{--                                <path--}}
{{--                                        d="M31.169,243.546c-1.275-2.033-10.067-6.259-10.067-6.259-3.472-1.723-29.011-14.232-33.811-15.955-4.107-1.474-8.762-3.146-12.931,3.062-3.177,4.693-12.452,15.526-15.472,18.94-2.121,2.412-4.061,3.2-8.762.85-.785-.383-23.53-10.106-39.22-23.985-13.918-12.287-23.557-27.48-27.055-33.444-2.159-3.64-.75-5.332,1.9-7.993,1.642-1.6,8.842-10.316,9.413-11.154,1.148-1.745,3.2-5.941,3.2-5.941,2.075-4.1.785-7.671-.379-10.025-.831-1.619-13.922-33.157-15.17-36.123-3.732-8.907-7.717-9.371-11.53-9.152-1.853.134-19.181.268-24.7,6.259l-.972,1.03c-5.416,5.73-16.693,17.658-16.693,40.736a62.293,62.293,0,0,0,2.6,17.076c3.219,11.124,9.512,23.292,17.834,34.428.184.233,12.862,17.842,19.2,25.141,20.05,23.09,42.7,40.143,65.552,49.073,29.2,11.407,41.662,14.014,48.736,14.014,3.1,0,9.612-1.573,11.028-1.707,8.919-.8,30.125-11.843,34.573-24.253C32.658,256.435,32.742,246.18,31.169,243.546Z"--}}
{{--                                        transform="translate(249.601 -51.664) rotate(17)" fill="currentColor"></path>--}}
{{--                            </svg>--}}
{{--                            <span class="tracking-wider inline-block">Give us a call</span>--}}
{{--                        </p>--}}
{{--                        <a href="tel:+18332126742">--}}
{{--                            +1-833-212-6742</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </section>--}}
            {{-- Exit Popup Work --}}
            @if(env('PROMOTIONS') == true)
                {{--@if(!in_array(Route::currentRouteName(), ['group-enrollment']))
                <a href="{{ route('group-enrollment') }}" class="side-tag">
                    <picture>
                        <source srcset="{{ asset('/images/side-tag.webp') }}" type="image/webp">
                        <source srcset="{{ asset('/images/side-tag.png') }}" type="image/png">
                        <img src="{{ asset('images/side-tag.png')}}" alt="Group Discount Available">
                    </picture>
                </a>
                @endif--}}
                <style>
                    @media screen and (max-width:270px){
                        header.top-bar {
                            /* margin-top: 60px; */
                        }
                    }

                    .promotion-bar.row {
                        background-color: {{ env("PROMOTION_BG_COLOR") }};
                        margin: 0;
                        z-index: 99999;
                    }

                    /*header.top-bar {*/
                    /*    margin-top: 62px !important;*/
                    /*}*/

                    /*.row.promotion-bar {*/
                    /*    position: fixed;*/
                    /*    top: 0;*/
                    /*    width: 100%;*/
                    /*    margin: 0;*/
                    /*    z-index: 999;*/
                    /*}*/

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
                        height:auto;
                        padding: 0.5rem;
                        font-weight: 900;
                        font-size: 1rem;
                        color: {{ env('PROMOTION_TEXT_COLOR') }};
                    }
                    #sale-top-bar a {
                        background: #fdbb33;
                        padding: 5px 15px;
                        border-radius:5px;
                        display: inline-block;
                    }
                    #sale-top-bar a:hover{
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
                            /* margin-top: 42px; */
                        }

                        .row.promotion-bar {
                            position: fixed;
                            z-index: 999999;
                            width: 100%;
                            left:0;
                            top:0;
                            right:0;
                        }
                    }

                    @media (max-width: 500px) {
                        #sale-top-bar {
                            display: block;
                            text-align: center;
                            padding: 0.5rem;
                            line-height: 1.4;
                            font-weight: bold;
                            margin: 0;
                            font-size: 13px;
                            text-transform: uppercase;
                            color: {{ env('PROMOTION_TEXT_COLOR') }};
                        }
                    }

                    @media (max-width: 425px) {
                        /*#sale-top-bar-mobile {*/
                        /*    display: block;*/
                        /*}*/
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
                    @media screen and (max-width:300px){
                        header.top-bar {
                            /* margin-top: 60px; */
                        }
                    }
                    {{-- Exit Popup Work --}}
                    /*.exitPopup.hide{*/
                    /*    display: none;*/
                    /*}*/
                    /*.exitPopup {*/
                    /*    height: 100vh;*/
                    /*    display: flex;*/
                    /*    z-index: 99999999;*/
                    /*    justify-content: center;*/
                    /*    align-items: center;*/
                    /*}*/

                    /*.exitPopup .modal-content a.close-btn.modal-close {*/
                    /*    height: 15px;*/
                    /*    width: 15px;*/
                    /*    display: flex;*/
                    /*    justify-content: center;*/
                    /*    align-items: center;*/
                    /*    transition: ease all 0.25s;*/
                    /*}*/

                    /*.exitPopup .modal-content .exitPopUpTop {*/
                    /*    padding: 15px 30px;*/
                    /*    text-align: center;*/
                    /*}*/

                    /*.exitPopup .modal-content .exitPopUpTop h3 {*/
                    /*    color: #1c82c4;*/
                    /*    font-size: 20px;*/
                    /*    font-weight: 500;*/
                    /*    letter-spacing: 2px;*/
                    /*}*/

                    /*.exitPopup .modal-content .exitPopUpTop h2 {*/
                    /*    font-weight: 300;*/
                    /*}*/

                    /*.exitPopup .modal-content .exitPopUpBottom {*/
                    /*    background: #1c82c4;*/
                    /*    padding: 15px 30px;*/
                    /*    text-align: center;*/
                    /*}*/

                    /*.exitPopup .modal-content .exitPopUpBottom p {*/
                    /*    color: #fff;*/
                    /*    font-weight: 700;*/
                    /*    font-size: 22px;*/
                    /*    letter-spacing: 2px;*/
                    /*    display: flex;*/
                    /*    justify-content: center;*/
                    /*    align-items: center;*/
                    /*    margin-bottom: 15px;*/
                    /*}*/

                    /*.exitPopup .modal-content .exitPopUpBottom p svg {*/
                    /*    width: 30px;*/
                    /*    margin: 0px;*/
                    /*}*/

                    /*.exitPopup .modal-content .exitPopUpBottom a {*/
                    /*    border-radius: 25px;*/
                    /*    background: #fecd07;*/
                    /*    font-size: 22px;*/
                    /*    padding: 6px 30px;*/
                    /*    margin-bottom: 15px;*/
                    /*    display: inline-block;*/
                    /*    border: 1px solid #fecd07;*/
                    /*    font-weight: 900;*/
                    /*    transition: ease all 0.25s;*/
                    /*}*/

                    /*.exitPopup .modal-content .exitPopUpBottom a:hover {*/
                    /*    background: rgba(0, 0, 0, 0);*/
                    /*    color: #ffffff;*/
                    /*}*/

                    /*@media (max-width:767px) {*/
                    /*    .exitPopup .modal-content .exitPopUpTop h3 {*/
                    /*        font-size: 16px;*/
                    /*    }*/

                    /*    .exitPopup .modal-content .exitPopUpTop h2 {*/
                    /*        font-size: 25px;*/
                    /*    }*/

            /*    .exitPopup .modal-content .exitPopUpTop {*/
            /*        padding: 15px 20px;*/
            /*    }*/
            /*}*/
            {{-- Exit Popup Work --}}
        </style>
        {{-- <div class="row promotion-bar">
            <div class="col-md-12"> --}}
                {{-- @if(Route::currentRouteName() !== "promotions")
                    <div id="sale-top-bar" class="ta-center">
                        <span>{{  env('PROMOTION_TEXT') }}</span>
                        <a href="{{ route('promotions') }}">
                            ENROLL NOW
    {{--                        {{ request()->cookie('special') ? '$60' : '$39' }}
                        </a>
                    </div>
                @endif --}}
{{--                        <a href="{{ route('promotions') }}" style="text-decoration: none;">--}}
{{--                            <picture id="sale-top-bar">--}}
{{--                                <source--}}
{{--                                    srcset="{{ asset('/images/promotions/'.env('PROMOTION_NAME').'/homepage-topbanner-desktop-768x60.webp') }}"--}}
{{--                                    type="image/webp">--}}
{{--                                <source--}}
{{--                                    srcset="{{ asset('/images/promotions/'.env('PROMOTION_NAME').'/homepage-topbanner-desktop-768x60.jpg') }}"--}}
{{--                                    type="image/jpeg">--}}
{{--                                <img--}}
{{--                                    src="{{ asset('/images/promotions/'.env('PROMOTION_NAME').'/homepage-topbanner-desktop-768x60.jpg') }}"--}}
{{--                                    alt="{{ env('PROMOTION_TEXT') }}" title="{{ env('PROMOTION_TEXT') }}">--}}
{{--                            </picture>--}}
{{--                        </a>--}}
                        {{--                            <picture id="sale-top-bar-mobile">--}}
                        {{--                                <source--}}
                        {{--                                    srcset="{{ asset('/images/promotions/'.env('PROMOTION_NAME').'/homepage-topbanner-mobile-425x82.webp') }}"--}}
                        {{--                                    type="image/webp">--}}
                        {{--                                <source--}}
                        {{--                                    srcset="{{ asset('/images/promotions/'.env('PROMOTION_NAME').'/homepage-topbanner-mobile-425x82.jpg') }}"--}}
                        {{--                                    type="image/jpeg">--}}
                        {{--                                <img--}}
                        {{--                                    src="{{ asset('/images/promotions/'.env('PROMOTION_NAME').'/homepage-topbanner-mobile-425x82.jpg') }}"--}}
                        {{--                                    alt="{{ env('PROMOTION_TEXT') }}" title="{{ env('PROMOTION_TEXT') }}">--}}
                        {{--                            </picture>--}}
{{--                        <div id="sale-top-bar-mobile-textual">--}}
{{--                            <span>{{ env('PROMOTION_TEXT') }} on OSHA 10-Hour & 30-Hour Online Training</span>--}}
{{--                            <a href="{{ route('promotions') }}">ENROLL NOW</a>--}}
{{--                        </div>--}}
            {{-- </div>
        </div> --}}
            @endif
            @include('partials.navigation')
            @yield('content')

            @if(Route::currentRouteName() !== "free-signup")
                {{-- @include('partials._keep_informed_footer') --}}
                @include('partials._join_mailing_list_footer')
            @endif
    @if(str_contains(url()->current(), 'states-requirements'))
        {{--state footer here--}}
        @include('partials._states_footer')
    @endif
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
{{--                    <p class="about-desc hidden-sm-down">--}}
{{--                        OSHA Outreach courses are provided in partnership with HSI, an OSHA-authorized online Outreach provider.--}}
{{--                    </p>--}}
                    <p class="about-desc">
                        OSHA Outreach courses are provided in partnership with
                    </p>
                    <div class="home_banner_hsi_logo">
                        <img src="https://res.cloudinary.com/elearning-avenue24/image/upload/v1674123232/assets/oc_images/HSI-OSHA-Authorized-Training-Provider-Seal_v7xpum.png" alt="">
                    </div>
                    <a href="https://www.shopperapproved.com/reviews/oshaoutreachcourses.com/"
                       onclick="window.open($(this).prop('href'),'shopperapproved','width=620,height='+$(window).height()); return false;"
                        class="shopperlinkCustom">
                        <img
                        src="https://www.shopperapproved.com/award/images/33391-bottom-medal-black.png"
                        loading="lazy"
                        style="border: 0" alt="Shopper Award"
                            oncontextmenu="var d = new Date(); alert('Copying Prohibited by Law - This image and all included logos are copyrighted by shopperapproved \251 '+d.getFullYear()+'.'); return false;"
                        />
                        <script type="text/javascript" defer>
                            (function () {
                                var js = window.document.createElement("script");
                                js.src = "//www.shopperapproved.com/seals/certificate.js";
                                js.type = "text/javascript";
                                document.getElementsByTagName("head")[0].appendChild(js);
                            })();
                        </script>
                    </a>
                        <div class="trustedsite-trustmark" style="margin-right: 10px" data-type="202"
                             data-width="120"
                             data-height="50"></div>
                        {{--                                <div class="mfes-trustmark" data-type="102" data-width="120" data-height="50"></div>--}}

                        </div>
                        <div class="col-md-3 offset-md-1 hidden-sm-down">
                            <h4 class="f-title">RESOURCES</h4>
                            <ul class="unstyled f-nav">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('videoReviews.single') }}">Video Reviews</a></li>
                                <li><a href="{{ route('statePromotions.single') }}">State Requirements</a></li>
                                {{--<li>
                                    <a href="{{ route('course.osha-10-hour-construction') }}">OSHA 10-Hour Construction</a>
                                </li>
                                <li>
                                    <a href="{{ route('course.osha-10-construction-spanish') }}">OSHA 10 Construction
                                        (Spanish)</a>
                                </li>
                                <li>
                                    <a href="{{ route('course.osha-30-hour-construction') }}">OSHA 30-Hour Construction</a>
                                </li>
                                <li>
                                    <a href="{{ route('course.osha-10-hour-general') }}">OSHA 10-Hour General Industry</a>
                                </li>--}}
                                {{--<li>--}}
                                {{--<a href="{{ route('course.osha-30-hour-general') }}">OSHA 30-Hour General Industry</a>--}}
                                {{--</li>--}}
                                {{--<li>
                                    <a href="{{ route('course.new-york-osha-10-hour-construction') }}">New York 10-Hour
                                        Construction</a>
                                </li>
                                <li>
                                    <a href="{{ route('course.new-york-osha-30-hour-construction') }}">New York 30-Hour
                                        Construction</a>
                                </li>--}}
                                <li>
                                    <a href="{{ route('osha-10-hour-online') }}">OSHA 10-Hour Online</a>
                                </li>
                                <li>
                                    <a href="{{ route('osha-30-hour-online') }}">OSHA 30-Hour Online</a>
                                </li>
                                <li>
                                    <a href="{{ route('faq') }}">FAQ</a>
                                </li>
                                <li>
                                    <a href="{{  route('partner-with-us')  }}">Partner With Us</a>
                                </li>
                                <li><a href="{{ route('group-enrollment') }}">Group Discount</a></li>
                                <li><a href="{{ route('about-us') }}">About us</a></li>
                                <li><a href="{{ url('blog') }}/" target="_blank">Blog</a></li>
                                {{-- <li><a href="{{ route('contact-us') }}">Contact</a></li> --}}
                            </ul>
                            <h4 class="f-title mb-0">We Accept</h4>
                            <img
                            src="https://res.cloudinary.com/elearning-avenue24/image/upload/v1629970736/assets/images/payment-icon_v0bukh2_1_twdppa_pfezha.png"
                                loading="lazy"
                                alt="Accepted Payment Methods"
                                title="Visa, Mastercard, AMEX, JCB"
                            >
{{--                            <picture>--}}
{{--                                <source srcset="{{ asset('/images/payment-methods.webp') }}" type="image/webp">--}}
{{--                                <source srcset="{{ asset('/images/payment-methods.png') }}" type="image/png">--}}
{{--                                <img src="{{ asset('/images/payment-methods.png') }}" alt="Accepted Payment Methods"--}}
{{--                                     title="Paypal, Visa, Mastercard">--}}
{{--                            </picture>--}}
                        </div>
                        <div class="col-md-3 offset-md-1">
                            <h4 class="f-title hidden-sm-down">Contact</h4>
                            <a href="mailto:help@oshaoutreachcourses.com"
                               class="about-desc">help@oshaoutreachcourses.com</a>
                            <p class="about-desc mtpx-20 mbpx-20"><span class="hidden-sm-down"> Got Questions?</span>
                            <span class="d-block">
                                <span class="about-desc">Call:</span>
                                <a href="tel:+18332126742" class="about-desc"> +1-833-212-6742</a>
                            </span>
                            </p>
                            <div class="social-links">
                                <p class="title">Follow us</p>
                                <ul class="unstyled inline">
                                    <li>
                                        <a href="https://www.facebook.com/OSHAOutreachCourses/" rel="noreferrer nofollow"
                                           target="_blank" title="Facebook">
                                            <i class="xicon icon-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/oshaoutreach" rel="noreferrer nofollow" target="_blank"
                                           title="Twitter">
                                            <i class="xicon icon-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.youtube.com/c/OshaOutreachCourses" rel="noreferrer nofollow"
                                           target="_blank" title="Youtube">
                                            <i class="xicon icon-play"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.linkedin.com/company/osha-outreach-courses/"
                                           rel="noreferrer nofollow" target="_blank" title="Linkedin">
                                            <i class="xicon icon-linkedin"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/oshaoutreach/" rel="noreferrer nofollow"
                                           target="_blank" title="Instagram">
                                            <i class="xicon icon-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.pinterest.com/oshaoutreachcourses/" rel="noreferrer nofollow"
                                           target="_blank" title="Pinterest">
                                            <i class="xicon icon-pinterest"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <p class="about-desc mtpx-20 mbpx-20">
                                We are here to help
                                <a href="{{ route('contact-us') }}">
                                    <button type="button" id="footer_contact_us_btn" class="btn --btn-small"
                                            type="button"
                                            style="background-color: #a7a8a8; margin-bottom: 5px;color: black; padding: 5px; font-size: 12px; display: block;">
                                        Contact Us
                                    </button>
                                </a>
                                <div class="footer_google_play_text ">
                                <a
                                    rel="noreferrer nofollow"
                                    href="https://play.google.com/store/apps/details?id=com.elearningavenue.osha_outreach_blog&pli=1">
                                    <p>Download our blog App and stay informed on health & safety trends!</p>
                                </a>
                                </div>

                                <div class="footer_google_play_img">
                                <a
                                    rel="noreferrer nofollow"
                                    href="https://play.google.com/store/apps/details?id=com.elearningavenue.osha_outreach_blog">
                                    <img src="https://www.oshaoutreachcourses.com/blog/wp-content/themes/writing-child/images/google-play-badge.png" alt="">
                                </a>
                                </div>
                                <style>
                                   .footer_google_play_img {
                                        max-width: 150px;
                                    }
                                     .footer_google_play_text p{
                                        color: #a7a8a8;
                                    }
                                    .footer_google_play_img{
                                        margin-top: 10px;

                                    }
                                    #footer_contact_us_btn{
                                        margin-top:10px;
                                    }
                                    .footer_google_play_text p:hover{
                                        text-decoration: underline;
                                    }
                                    @media (max-width: 767px) {
                                    .footer_google_play_img{
                                        margin: 10px auto;

                                    }
                                    #footer_contact_us_btn{
                                        margin: 10px auto ;
                                    }
                                }
                                @media (max-width: 425px) {

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
                <a href="{{ route('terms-and-conditions') }}">Terms &amp; Conditions</a> |
                <a href="{{ route('refund-policy') }}">Refund Policy</a> |
                <a href="{{ route('privacy-policy') }}">Privacy Policy</a>
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
        {{--  For Navigation Login Cond  --}}
        <script>
            function getCookie(cname) {
                let name = cname + "=";
                let decodedCookie = decodeURIComponent(document.cookie);
                let ca = decodedCookie.split(';');
                for(let i = 0; i <ca.length; i++) {
                    let c = ca[i];
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                        return c.substring(name.length, c.length);
                    }
                }
                return "";
            }

            const navigationLIElem = $("#profile");
            const outreachProfileCookie = getCookie("osha-outreach-profile");

            if(outreachProfileCookie) {
                const outreachProfile = JSON.parse(outreachProfileCookie);

            //     navigationLIElem.html(`
            // <a title="Goto Dashboard" href="https://lms.oshaoutreachcourses.com" target="_blank">
            //     <i class="icon-user" aria-hidden="true"></i>
            //     &nbsp;${outreachProfile.firstName}
            // </a>`
            //     )

                /* Dropdown */

            navigationLIElem.html(`
            <div class="headerDropdown">
              <div class="selected">
                <span> <i class="icon-user" aria-hidden="true"></i>&nbsp;${outreachProfile.firstName}</span>
              </div>
              <div class="options">
                <ul>
                  <li><a href="https://lms.oshaoutreachcourses.com">LMS</a></li>
                  <li><a class="logout">Logout</a></li>
                </ul>
              </div>
            </div>
            `)

            //TOGGLING NESTED ul
            $(".headerDropdown .selected span").click(function() {
                $(".headerDropdown .options ul").toggle();
            });

            //SELECT OPTIONS AND HIDE OPTION AFTER SELECTION
            $(".headerDropdown .options ul li a").click(function() {
                var text = $(this).html();
                $(".headerDropdown .selected span").html(text);
                $(".headerDropdown .options ul").hide();
            });


            //HIDE OPTIONS IF CLICKED ANYWHERE ELSE ON PAGE
            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("headerDropdown"))
                    $(".headerDropdown .options ul").hide();
            });

            $("a.logout").on('click', function() {
                document.cookie = `osha-outreach-token=; expires=Thu, 01 Jan 1970 00:00:00 UTC;domain={{env('COOKIE_DOMAIN')}};path=/`;
                document.cookie = `osha-outreach-profile=; expires=;domain={{env('COOKIE_DOMAIN')}}; path=/`;
                localStorage.removeItem("key");
                localStorage.removeItem("orignal_key");
                window.location.href = "{{env('APP_URL')}}";
            });

            /* Dropdown */
            } else {
                navigationLIElem.html(`
            <a href="{{ url('lms') }}{{ isset($_GET['uoid']) ? '?uoid='.$_GET['uoid'] : '' }}">
                <i class="icon-user" aria-hidden="true"></i>
                &nbsp;Login
            </a>`
                )
            }

        </script>
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

            @media (max-width: 500px) {
                .trustedsite-trustmark {
                    display: none!important;
                }
            }
        </style>
        {{-- Exit Popup --}}
        @if(!in_array(Route::currentRouteName(), ['lms', 'admin.signin']))
            {{-- @include('partials._exit_popup') --}}
        @endif
        {{-- Exit Popup --}}

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

                /*jdiv#jcont, #jvlabelWrap {*/
                /*    bottom: 60px !important;*/
                /*}*/

                .main_Lb > jdiv:nth-child(3) {
                    height: 86% !important;
                }

        .main_Lb > jdiv:nth-child(4) {
            height: 0% !important;
        }
    </style>
@endif
@yield('scripts')
@stack('script')
{{--<!-- BEGIN GCR Badge Code -->
<script src="https://apis.google.com/js/platform.js?onload=renderBadge"
        async defer>
</script>

        <script>
            window.renderBadge = function() {
                var ratingBadgeContainer = document.createElement("div");
                document.body.appendChild(ratingBadgeContainer);
                window.gapi.load('ratingbadge', function() {
                    window.gapi.ratingbadge.render(
                        ratingBadgeContainer, {
                            "merchant_id": 290196617,
                            "position": "BOTTOM_LEFT"
                        });
                });
            }
        </script>
        <!-- END GCR Badge Code -->--}}

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
        <!-- Seal Shopper Approved LightBlue -->
        {{--        <a href="https://www.shopperapproved.com/reviews/oshaoutreachcourses.com/" class="shopperlink"><img--}}
        {{--                src="https://www.shopperapproved.com/newseals/33391/4398cf-mini-icon.gif" style="border: 0"--}}
        {{--                alt="Customer Reviews"--}}
        {{--                oncontextmenu="var d = new Date(); alert('Copying Prohibited by Law - This image and all included logos are copyrighted by Shopper Approved \251 '+d.getFullYear()+'.'); return false;"/></a>--}}
        {{--        <script type="text/javascript">(function () {--}}
        {{--                var js = window.document.createElement("script");--}}
        {{--                js.src = "https://www.shopperapproved.com/seals/certificate.js";--}}
        {{--                js.type = "text/javascript";--}}
        {{--                document.getElementsByTagName("head")[0].appendChild(js);--}}
        {{--            })();</script>--}}
        <!-- Seal Shopper Approved LightBlue -->

        <!-- Seal Shopper Approved Plain -->
        <a href="https://www.shopperapproved.com/reviews/oshaoutreachcourses.com/" class="shopperlink"><img
                src="https://www.shopperapproved.com/newseals/33391/white-mini-icon.gif" style="border: 0"
                width="136"
                height="48"
                alt="Customer Reviews"
                oncontextmenu="var d = new Date(); alert('Copying Prohibited by Law - This image and all included logos are copyrighted by Shopper Approved \251 '+d.getFullYear()+'.'); return false;"/></a>
        <script type="text/javascript">(function () {
                var js = window.document.createElement("script");
                js.src = "https://www.shopperapproved.com/seals/certificate.js";
                js.type = "text/javascript";
                document.getElementsByTagName("head")[0].appendChild(js);
            })();</script>
        <!-- Seal Shopper Approved Plain -->

        {{-- Exit Popup Work --}}
{{--        <script type="text/javascript">--}}
{{--            var mouseX = 0;--}}
{{--            var mouseY = 0;--}}
{{--            var theFrame;--}}
{{--            $(document).ready(function() {--}}
{{--                var opened = false;--}}
{{--                $(document).mousemove(function(e) {--}}

{{--                    if (e.clientY <= 10 && !opened) {--}}
{{--                        opened = true;--}}
{{--                        $('.exitPopup').removeClass("hide");--}}
{{--                    }--}}
{{--                });--}}

{{--                $('.exitPopup  .modal-content a.close-btn.modal-close').click(function() {--}}
{{--                    $('.exitPopup').addClass("hide");--}}
{{--                    setInterval(() => opened = false, 120000)--}}
{{--                });--}}

{{--            });--}}
{{--            var idleTime = 0;--}}
{{--            $(document).ready(function() {--}}
{{--                // Increment the idle time counter every 2 minutes.--}}
{{--                var idleInterval = setInterval(timerIncrement, 120000);--}}

{{--                // Zero the idle timer on mouse movement.--}}
{{--                $(this).mousemove(function(e) {--}}
{{--                    idleTime = 0;--}}
{{--                });--}}
{{--                $(this).keypress(function(e) {--}}
{{--                    idleTime = 0;--}}
{{--                });--}}
{{--            });--}}

{{--            function timerIncrement() {--}}
{{--                idleTime = idleTime + 1;--}}
{{--                if (idleTime > 2) { // 20 minutes--}}
{{--                    $('.exitPopup').removeClass("hide");--}}
{{--                }--}}
{{--            }--}}
{{--        </script>--}}
        {{-- Exit Popup Work --}}
        </body>
        </html>



