@extends('layouts.single-sale-master')

@php
    $meta_tag = $course->seoTags()->where('meta_name', 'title')->first();
    if(!empty($meta_tag)){
    $meta_title = $meta_tag->meta_content;
    } else {
    $meta_title = $course_content['title'].' | OSHA Outreach Courses';
    }

    function getLanguageISO($language){
    $language = strtolower($language);
    if ($language === 'english') {
    $iso_code = 'en';
    } elseif ($language === 'spanish') {
    $iso_code = 'es';
    } elseif ($language === 'canadian french') {
    $iso_code = 'fr-ca';
    } elseif ($language === 'portuguese') {
    $iso_code = 'pt';
    } elseif ($language === 'german') {
    $iso_code = 'de';
    } elseif ($language === 'chinese') {
    $iso_code = 'zh';
    } elseif ($language === 'dutch') {
    $iso_code = 'nl';
    } elseif ($language === 'polish') {
    $iso_code = 'pl';
    } elseif ($language === 'thai') {
    $iso_code = 'th';
    } elseif ($language === 'french') {
    $iso_code = 'fr';
    } elseif ($language === 'japanese') {
    $iso_code = 'ja';
    } elseif ($language === 'czech') {
    $iso_code = 'cs';
    } elseif ($language === 'italian') {
    $iso_code = 'it';
    } elseif ($language === 'korean') {
    $iso_code = 'ko';
    } elseif ($language === 'russian') {
    $iso_code = 'ru';
    } elseif ($language === 'hungarian') {
    $iso_code = 'hu';
    } else {
    $iso_code = 'ar';
    }
    return $iso_code;
    }
@endphp
@section('title', $meta_title)

@section('language', getLanguageISO($course->language))

@section('styles')
    <link rel="canonical" href="{{ url()->full() }}"/>
    <link rel="alternate" hreflang="{{ getLanguageISO($course->language) }}" href="{{ url()->full() }}"/>
    @if(getLanguageISO($course->language) == "en")
        <link rel="alternate" hreflang="x-default" href="{{ url()->full() }}"/>
    @endif
    {{--    @include('partials._meta_tags')--}}
    {{--  Meta Tags go here  --}}
    <meta property="og:title" content="{{ $course_content['title'] }} | {{ env('PROMOTION_TEXT') }}">
    <meta property="twitter:title" content="{{ $course_content['title'] }} | {{ env('PROMOTION_TEXT') }}">
    <meta name="description"
          content="This {{ $course_content['title'] }} Online Training Course Is Authorized by OSHA For Educating Construction Workers Managers about OSHA Safety Norms. Get your Training in ${{ $course_content['discounted_price'] }} Only."/>
    <meta property="og:description"
          content="This {{ $course_content['title'] }} Online Training Course Is Authorized by OSHA For Educating Construction Workers Managers about OSHA Safety Norms. Get your Training in ${{ $course_content['discounted_price'] }} Only.">
    <meta property="twitter:description"
          content="This {{ $course_content['title'] }} Online Training Course Is Authorized by OSHA For Educating Construction Workers Managers about OSHA Safety Norms. Get your Training in ${{ $course_content['discounted_price'] }} Only.">
{{--    @if($course->id == 1)--}}
{{--        <meta property="og:image" content="{{ asset('/images/promotions/special-sale-new/OG-special-10h-construction-sp-sale.jpg') }}">--}}
{{--        <meta property="twitter:image" content="{{ asset('/images/promotions/special-sale-new/OG-special-10h-construction-sp-sale.jpg') }}">--}}
{{--    @elseif($course->id == 2)--}}
{{--        <meta property="og:image" content="{{ asset('/images/promotions/special-sale-99/og-Osha-30-promotions-$99.png') }}">--}}
{{--        <meta property="twitter:image" content="{{ asset('/images/promotions/special-sale-99/og-Osha-30-promotions-$99.png') }}">--}}
{{--    @elseif($course->id == 3)--}}
{{--        <meta property="og:image" content="{{ asset('/images/promotions/special-sale-new/OG-special-10h-gi--sp-sale.jpg') }}">--}}
{{--        <meta property="twitter:image" content="{{ asset('/images/promotions/special-sale-new/OG-special-10h-gi--sp-sale.jpg') }}">--}}
{{--    @endif--}}
    @if($course->id == 1)
        <meta property="og:image" content="{{ asset('/images/osha-10-30-og/og-10-hour-construction.jpg') }}">
        <meta property="twitter:image" content="{{ asset('/images/osha-10-30-og/og-10-hour-construction.jpg') }}">
    @elseif($course->id == 2)
        <meta property="og:image" content="{{ asset('/images/osha-10-30-og/og-30-hour-construction.jpg') }}">
        <meta property="twitter:image" content="{{ asset('/images/osha-10-30-og/og-30-hour-construction.jpg') }}">
    @elseif($course->id == 3)
        <meta property="og:image" content="{{ asset('/images/osha-10-30-og/og-10-hour-general-industry.jpg') }}">
        <meta property="twitter:image" content="{{ asset('/images/osha-10-30-og/og-10-hour-general-industry.jpg') }}">
    @endif
    <!-- Meta Tags for Social Media -->
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="OSHA Outreach Courses">
    <meta property="fb:app_id" content="817832821974771"/>
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->full() }}">
    <meta property="twitter:site" content="@OshaOutreach">
    <meta name="robots" content="noindex">
    {{--  Meta Tags go here  --}}
    <style>
        .home-intro .title {
            font-size: 22px;
            font-weight: 600;
            text-transform: unset !important;
            margin-bottom: 40px;
        }

        /*.box.\--outline-box ul > li {*/
        /*    padding-right: 20px;*/
        /*}*/

        /*.box.\--outline-box li ol li {*/
        /*    margin-bottom: 0px;*/
        /*    margin-top: 0px;*/
        /*}*/

        @if(in_array($course->id, [1,2,9,7,3,6,5,8]))
        .osha30-info-img {
            border-radius: 25px;
            box-shadow: 0px 0px 18px -3px rgb(0 0 0 / 30%);
        }

        .col-md-3.img-container {
            padding: 0;
        }

        .img-overlay {
            position: relative;
            border-radius: 25px;
            cursor: pointer;
            overflow: hidden;
            padding: 15px;
        }

        .img-overlay:before {
            position: absolute;
            content: "\e986";
            top: 15px;
            bottom: 15px;
            left: 15px;
            right: 15px;
            font-size: 35px;
            display: flex;
            justify-content: center;
            opacity: 0;
            align-items: center;
            transition: .5s ease;
            background-color: #e6e6e6;
            font-family: "osha" !important;
            speak: none;
            font-style: normal;
            font-weight: normal;
            font-variant: normal;
            text-transform: none;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            border-radius: 25px;
        }

        .img-container:hover .img-overlay:before {
            opacity: 0.5;
        }

        .course-outline-popup {
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            left: 0;
            top: 0;
            right: 0;
            margin: 0 auto;
            height: 100%;
            width: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 9999;
            /*overflow-y: scroll;*/
        }

        .course-outline-popup div.popup-inner-div {
            margin: 0 auto;
            position: absolute;
            left: 0;
            right: 0;
            top: 5%;
            background: #ffff;
            width: 90%;
            text-align: center;
            max-width: 800px;
            bottom: 5%;
            height: 90%;
            overflow: hidden;
            overflow-y: auto;
            padding: 0 5px;
        }

        body.modal-open {
            overflow: hidden;
            /*position: fixed;*/
        }

        .popclosebtn {
            position: absolute;
            top: 8px;
            right: 10px;
            padding: 0 !important;
        }

        .popclosebtn a {
            color: #fff;
        }

        .page-heading .subtitle-sp {
            font-size: 18px;
            text-align: center;
            position: relative;
            padding-bottom: 30px;
        }

        .page-heading .subtitle-sp:after {
            content: "";
            width: 60px;
            height: 2px;
            background-color: #005384;
            position: absolute;
            bottom: 0;
            left: 0;
            margin: 0 auto;
        }


        @media (max-width: 767px) {
            .osha30-info-img {
                margin: auto;
                width: 75%;
            }

            .page-heading h2.title.course-t.mbpx-10 {
                margin-left: 0 !important;
            }
        }

        @endif

        @if($course->lms === LMS_TYPE_OSHA_OUTREACH) .course-outline ul li > h4 {
            cursor: pointer;
        }

        .course-outline ul li > h4:after {
            position: absolute;
            display: inline-block;
            bottom: 4px;
            background-repeat: no-repeat;
            content: '\e90a';
            width: 18px;
            height: 12px;
            font-size: 14px;
            font-family: "osha" !important;
            speak: none;
            font-style: normal;
            font-weight: normal;
            font-variant: normal;
            text-transform: none;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .course-outline ul li > h4.open:after {
            content: '\e909';
        }

        @endif .home-intro .price-time {
            margin: 0 !important;
        }

        .home-intro .price-time .xicon {
            width: 16px;
            display: inline-block;
            text-align: center;
        }

        #main-banner-mobile {
            display: block;
            text-align: center;
        }

        #main-banner {
            display: none;
        }

        .green_bullets,
        .blue_bullets {
            display: block;
            margin-bottom: 10px;
        }

        .green_bullets > span,
        .blue_bullets > span {
            display: block;
        }

        .green_bullets {
            font-size: 16px;
            font-weight: 600;
        }

        .hero-banner .title {
            position: absolute;
            text-align: center;
            width: calc(100% - 30px);
            max-width: 100%;
            background: rgba(0, 0, 0, 0.6);
            color: #ffffff;
            height: 100%;
            padding-top: 30px;
            font-size: 26px;
        }

        @media (max-width: 575px) {

            .green_bullets,
            .blue_bullets .price-time .xicon,
            .blue_bullets .price-time span,
            .blue_bullets .price-time strong {
                font-size: 14px;
                font-weight: 600;
            }

            .home-intro .title {
                font-size: 18px !important;
            }

            #course-info-div > span:nth-child(n+5) {
                margin-left: 25% !important;
            }

            .blue_bullets {
                display: flex;
                justify-content: initial;
                flex-wrap: wrap;
                align-items: flex-end;
                text-align: center;
            }

        }

        @media (min-width: 576px) {

            .hero-banner .title {
                width: 510px;
            }


        }

        @media (max-width: 767px) {
            .hero-banner .title {
                position: relative;
                width: 100%;
            }

            .inner-banner {
                height: 150px;
            }
        }

        @media (min-width: 768px) {
            .hero-banner .title {
                width: 690px;
                padding-top: 40px;
            }

            .green_bullets,
            .blue_bullets {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-evenly;
            }

            #main-banner {
                display: block;
                text-align: center;
            }

            #main-banner-mobile {
                display: none;
            }
        }

        @media (min-width: 992px) {
            .hero-banner .title {
                width: 930px;
                padding-top: 55px;
                font-size: 28px;
            }

            .green_bullets,
            .blue_bullets {
                flex-wrap: nowrap;
            }
        }

        @media (min-width: 1200px) {
            .hero-banner .title {
                width: 990px;
                padding-top: 60px;
                font-size: 45px;
                position: relative;
            }
        }

        .videoWrapper {
            border: 4px solid #FFF;
            position: relative;
            padding-bottom: 56.25%;
            /* 16:9 */
            height: 0;
            /* falls back to 16/9, but otherwise uses ratio from HTML */
            padding-bottom: calc(var(--aspect-ratio, .5625) * 100%);
        }

        .videoWrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        {{-- For diagonal line--}}
        small.price-lt:before {
            display: block;
            content: "";
            position: absolute;
            left: 5%;
            top: 51%;
            width: 100%;
            height: 1px;
            background-color: #fc4a1a;
            transform: rotate(-12deg);
        }

        span small.price-lt {
            position: relative;
        }
        {{-- For diagonal line--}}
    </style>
    @if($course->id == 1)
        @php($youtube_video_code = "pulpxmUCxtA")
        @php($youtube_video_heading = "Watch OSHA 10 Hour Construction Video")
        @php($youtube_duration = "PT1M21S")
        @php($youtube_upload_date = "2021-04-08")
    @elseif($course->id == 2)
        @php($youtube_video_code = "S7zaVBJjsXQ")
        @php($youtube_video_heading = "Watch OSHA 30 Hour Construction Video")
        @php($youtube_duration = "PT1M29S")
        @php($youtube_upload_date = "2021-04-19")
    @elseif($course->id == 3)
        @php($youtube_video_code = "b6_Dib9s0B0")
        @php($youtube_video_heading = "Watch OSHA 10 Hour General Industry Video")
        @php($youtube_duration = "PT1M28S")
        @php($youtube_upload_date = "2021-04-26")
    @endif
@endsection

@section('content')
    @if(preg_match("/.*osha 10.*/i", $course->title))
        @php(define('OSHA_COURSE_HOUR', 10))
    @else
        @php(define('OSHA_COURSE_HOUR', 30))
    @endif

    <section class="hero-banner --inner-banner mb-0">
        <div class="inner-banner saleBanner"
             style="background-image: url('{{ asset('/images/banner/'.$course_content['slug'].'.jpg') }}');">
            <div class="container">
                <h1 class="">
                    {{ env('PROMOTION_TEXT') }}
                </h1>
                <h2 class="">
                        <span class="heading">
                        {{ $course_content['title'] }}
                            Authorized Online Training
                        </span>
                    <div class="course-box">
                        <h3 class="name">Best Prices Possible </h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="pricing">
                                    <span class="fs-medium lt-price">${{ $course_content['price'] }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="pricing actual-pricing">
                                    ${{ $course_content['discounted_price'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                </h2>
            </div>
        </div>
    </section>

    <section class="home-intro sec-padding ptpx-30">
        <div class="container">
            <p class="title">
                @if($course->id == 1)
                    OSHA 10-Hour Construction course is designed for construction entry level workers to understand
                    safety associated with the Construction Industry.
                @elseif($course->id == 2)
                    OSHA 30-Hour Construction Industry Outreach Training course is a comprehensive safety program
                    designed for supervisors and managers involved in the Construction Industry.
                @elseif($course->id == 3)
                    OSHA 10-Hour General Industry course is designed for General Industry entry level workers to
                    understand safety associated with General Industry.
                @endif
            </p>

            <div class="row mbpx-10">
                <div class="col-md-12 col-xs-12 blue_bullets ta-left" id="course-info-div">
                    <span class="col-lg-4 col-md-6 col-xs-6 price-time" style="margin-top: 1% !important;">
                        <i class="xicon icon-dollar"></i> <span class="">PRICE</span>
                        <div>
                            <strong>
                                <span class="hidden-xs-down">$</span>
                                @if($course_content['discounted_price'] > 0)
                                    {{ $course_content['discounted_price'] }}
                                    <small class="price-lt" style="color:#000;font-size: 12px;">${{ $course_content['price'] }}
                                </small>
                                @else
                                    {{ $course_content['price'] }}
                                @endif
                            </strong>
                        </div>
                    </span>
                    <span class="col-lg-4 col-md-6 col-xs-6 price-time" style="margin-top: 1% !important;">
                        <i class="xicon icon-clock"></i>
                        <span class="">DURATION</span>
                        <div><strong>{{ $course->duration }} hour(s)</strong></div>
                    </span>
                    @if($course_content['lang'])
                        <span class="col-lg-4 col-md-6 col-xs-6 price-time" style="margin-top: 1% !important;"><i
                                class="xicon icon-language"></i> <span class="">LANGUAGE</span>
                            <div>
                                <strong>
                                    {{ $course_content['lang'] }}
                                </strong>
                            </div>
                        </span>
                    @endif
                    @if($course_content['ceu'] !== '')
                        <span class="col-lg-4 col-md-6 col-xs-6 price-time" style="margin-top: 1% !important;">
                            <i class="xicon icon-credit"></i> <span class="">CEU</span>
                            <div>
                                <strong>
                                    <span class="hidden-md-up">CEU </span>
                                    {{ number_format($course_content['ceu'], 1) }}
                                </strong>
                            </div>
                        </span>
                    @endif
                    {{-- Ratings --}}
                    <span class="col-lg-4 col-md-6 col-xs-6 price-time" id="ratings"
                          style="margin-top: 1% !important; display: none">
                        <i class="xicon icon-star-full"></i>
                        <span class="">RATINGS
                        </span>
                        <div id="product_just_stars" class="reg"></div>
                    </span>
                    {{-- Ratings --}}
                </div>
                <div class="col-md-12 offset-xs-3 col-xs-8 green_bullets ta-left hidden-md-up">
                            <span>@if(preg_match("/.*osha 30.*|.*osha 10.*/i", $course->title))
                                    <img src="{{ asset('images/green-tick.png') }}"
                                         alt="Bullet Points Green Tick"
                                         title="Bullet Points Green Tick"
                                         class="bullet-points-tick"> OSHA Authorized DOL Card
                                @else
                                    <img src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                                         title="Bullet Points Green Tick" class="bullet-points-tick"> Complete Online
                                @endif</span>
                    <span><img src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                               title="Bullet Points Green Tick"
                               class="bullet-points-tick"> Completion Certificate</span>
                    <span><img src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                               title="Bullet Points Green Tick" class="bullet-points-tick"> Job Aid (Study guide)</span>
                </div>
            </div>

            <a href="{{ route('product.addToCart', ['id' => $course_content['id']]) }}"
               class="btn --btn-primary enroll_now_btn enrollBtnText"></a>
        </div>
    </section>

    @if(in_array($course->id, [1,2,3,5,6,8]))
        @php($course_title = $course_content['title'])
        @php($course_description = $course_content['description'])
        @foreach($course->seoTags as $seo_tag)
            @if($seo_tag->meta_name == 'title')
                @php($course_title = $seo_tag->meta_content)
            @elseif($seo_tag->meta_name == 'description')
                @php($course_description = $seo_tag->meta_content)
            @endif
        @endforeach
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "VideoObject",
                "name": "{{ $course_title }}",
                "description": "{{ strip_tags($course_description) }}",
                "thumbnailUrl": [
                    "https://i.ytimg.com/vi_webp/{{$youtube_video_code}}/maxresdefault.webp"
                ],
                "uploadDate": "{{ $youtube_upload_date }}",
                "duration": "{{ $youtube_duration }}",
                "contentUrl": "https://www.youtube.com/watch?v={{$youtube_video_code}}&ab_channel=OshaOutreachCourses",
                "embedUrl": "https://www.youtube.com/embed/{{$youtube_video_code}}",
                "interactionStatistic": {
                    "@type": "InteractionCounter",
                    "interactionType": {
                        "@type": "http://schema.org/WatchAction"
                    },
                    "userInteractionCount": 5647018
                 },
                "regionsAllowed": "US,NL"
            }












        </script>
        <section class="bg-secondary sec-padding" style="background-color: #1d81c2;">
            <div class="container pr-5 pl-5" style="max-width:800px;">
                <div class="page-heading mbpx-40">
                    <h2 class="title mbpx-0 fc-white" style="font-size: 26px;">Learn More About OSHA Outreach Courses</h2>
                </div>

                <div class="videoWrapper" style="--aspect-ratio: 9 / 16;" data-nosnippet>
                    <iframe
                        src="https://www.youtube.com/embed/{{ $youtube_video_code }}?cc_load_policy=1&modestbranding=1&color=white&iv_load_policy=3"
                        srcdoc="
                                    <style>
                                        *{padding:0;margin:0;overflow:hidden}
                                        html,body{height:100%}
                                        img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}
                                        span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}
                                        video{width:100%;}
                                    </style>
                                    <a href=https://www.youtube.com/embed/{{ $youtube_video_code }}?autoplay=1&cc_load_policy=1&modestbranding=1&color=white&iv_load_policy=3>
                                        <img src=https://img.youtube.com/vi/{{ $youtube_video_code }}/hqdefault.jpg alt='Learn More About Us'>
                                        <span>▶</span>
                                    </a>"
                        frameborder="0"
                        allowfullscreen
                        title="Learn More About Us"
                    ></iframe>
                </div>
            </div>
        </section>
    @endif

    {{-- @include('partials._whyus_without_desc', ['noLinks' => true]) --}}
    @include('partials._comparison_features')

    {{-- Description/Infographic Section --}}
    <section class="container sec-padding">

        <div class="col-md-9">

            @if($course->id == 3)
                <div class="page-heading mbpx-40">
                    <h2 class="title course-t mbpx-10" style="text-align: left !important;">Overview</h2>
                    <p class="subtitle-sp"></p>
                </div>

            @else
                <div class="page-heading mbpx-40">
                    <h2 class="title course-t mbpx-10" style="text-align: left !important;">Overview</h2>
                    <p class="subtitle-sp"></p>
                </div>
            @endif

            <div class="box --course-objectives-sp">
                <p>
                    {!! $course_content['description'] !!}
                </p>
            </div>
        </div>

        @if($course->id == 1)
            <div class="col-md-3 img-container">
                <div class="img-overlay">
                    <img class="osha30-info-img"
                         src="{{ asset('images/osha-10-construction.jpg') }}"
                         alt="OSHA 10 Construction"
                    >
                </div>
            </div>

            <div class="course-outline-popup" style="display: none;">
                <div class="popclosebtn">
                    <a href="#" title="Click to close"
                       class="fs-large float-right close">
                        <i class="icon-close-solid" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="popup-inner-div">
                    <div>
                        <img src="{{ asset('images/osha-10-construction.jpg') }}"
                             alt="OSHA 10 Construction"
                        >
                    </div>
                </div>
            </div>
        @elseif($course->id == 2)
            <div class="col-md-3 img-container">
                <div class="img-overlay">
                    <img class="osha30-info-img"
                         src="{{ asset('images/osha-30-construction.jpg') }}"
                         alt="OSHA 30 Construction"
                    >
                </div>
            </div>

            <div class="course-outline-popup" style="display: none;">
                <div class="popclosebtn">
                    <a href="#" title="Click to close"
                       class="fs-large float-right close">
                        <i class="icon-close-solid" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="popup-inner-div">
                    <div>
                        <img src="{{ asset('images/osha-30-construction.jpg') }}"
                             alt="OSHA 30 Construction"
                        >
                    </div>
                </div>
            </div>
        @elseif($course->id == 3)
            <div class="col-md-3 img-container">
                <div class="img-overlay">
                    <img class="osha30-info-img"
                         src="{{ asset('images/osha-10-general-industry.jpg') }}"
                         alt="osha 10 general"
                    >
                </div>
            </div>

            <div class="course-outline-popup" style="display: none;">
                <div class="popclosebtn">
                    <a href="#" title="Click to close"
                       class="fs-large float-right close">
                        <i class="icon-close-solid" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="popup-inner-div">
                    <div>
                        <img src="{{ asset('images/osha-10-general-industry.jpg') }}"
                             alt="osha 10 general"
                        >
                    </div>
                </div>
            </div>
        @endif
    </section>
    {{-- Description/Infographic Section --}}

    @if(isset($course_content['objective']) && $course_content['objective']['count'])
        <section class="bg-secondary sec-padding">
            <div class="container">
                <div class="page-heading mbpx-40">
                    <h2 class="title mbpx-10">Learning Objectives</h2>
                    <p class="subtitle"></p>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="box --course-objectives">
                            <ul class="unstyled">
                                @for($i = 1; $i <= $course_content['objective']['ul_1_length']; $i++) @if(isset($course_content['objective'][$i-1]))
                                    <li>{{ $course_content['objective'][$i-1]}}</li>
                                @endif
                                @endfor
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="box --course-objectives">
                            <ul class="unstyled">
                                @for($i = $course_content['objective']['ul_1_length'] + 1; $i <= $course_content['objective']['ul_2_length']; $i++) @if(isset($course_content['objective'][$i-1]))
                                    <li>{{ $course_content['objective'][$i-1]}}</li>
                                @endif
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @include('partials._faqs')

    @stack('related_courses_lang_modals')

    @include('partials._reviews_sa')

    @include('partials._ctaNew')

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.usp-col').matchHeight();

            $('.img-overlay').click(function (e) {
                e.preventDefault();
                $('.course-outline-popup').fadeIn(300);
                $('body').addClass('modal-open');
                $('.shopperlink').hide();

            });

            $('.popclosebtn, .course-outline-popup').click(function (e) {
                $('body').removeClass('modal-open');
                $('.course-outline-popup').fadeOut(300);
                $('.shopperlink').show();

                e.preventDefault();
            });

            $(".course-outline-popup .popup-inner-div").click(function (e) {
                e.stopPropagation();
            });
        });
    </script>
    {{--Include Product Review Script--}}
    <script type="text/javascript">
        var sa_product = "{{ str_pad($course->id, 4, '0', STR_PAD_LEFT) }}";
        (function (w, d, t, f, o, s, a) {
            o = 'shopperapproved';
            if (!w[o]) {
                w[o] = function () {
                    (w[o].arg = w[o].arg || []).push(arguments)
                };
                s = d.createElement(t), a = d.getElementsByTagName(t)[0];
                s.async = 1;
                s.src = f;
                a.parentNode.insertBefore(s, a)
            }
        })(window, document, 'script', "//www.shopperapproved.com/product/33391/" + sa_product + ".js");

        /* show stars if present */
        $(window).load(function () {
            setTimeout(function () {
                if ($('#product_just_stars').is(':empty') === false) {
                    // $('#ratings').fadeIn('fast', 'swing');
                    $('#ratings').show();
                } else {
                    // for center aligning last element
                    $('#ratings').remove();
                }
            }, 500);
        });
    </script>
    {{--Include Product Review Script--}}
@endsection
