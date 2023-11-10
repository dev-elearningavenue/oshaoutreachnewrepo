@extends('layouts.master')

@section('title', $page['seo_tags']['title'] ?? "OSHA Outreach Courses" )

@section('styles')
    @php
        $priceValidUntil = date('Y-m-d', strtotime('12/31'));
    @endphp
    @if(isset($page['seo_tags']))
        @foreach($page['seo_tags'] as $meta_name => $meta_content)
            @if($meta_name != 'title')
                <meta name="{{ $meta_name }}" content="{{ $meta_content }}"/>
            @endif
        @endforeach
    @endif
    <meta property="og:title" content="{{ env('PROMOTION_PAGE_TITLE') }}">
    <meta property="twitter:title" content="{{ env('PROMOTION_TEXT') }}">
    <meta property="og:description"
          content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : env('PROMOTION_TEXT') }}">
    <meta property="twitter:description"
          content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : env('PROMOTION_TEXT') }}">
    <meta property="og:image"
          content="{{ url('/images/promotions/'. env('PROMOTION_NAME') .'/og-image-promotions.jpg') }}">
    <meta property="twitter:image"
          content="{{ url('/images/promotions/'. env('PROMOTION_NAME') .'/og-image-promotions.jpg')  }}">
    <link rel="canonical" href="{{url()->current()}}">
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
        "name": "{{ isset($page['h1_heading']) ? $page['h1_heading'] : env('PROMOTION_TEXT') }}"
    }
}

    </script>

    @foreach($courses as $course)
        <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Course",
    "name": "{{ $course->title }}",
    "description": "{{ strip_tags($course->description) }}",
    "provider": {
        "@type": "Organization",
        "name": "OSHA Outreach Courses",
        "logo": {
            "url": "{{ url('/images/osha-outreach-courses.png') }}",
            "width": 310,
            "height": 60,
            "@type": "ImageObject"
        },
        "sameAs": "{{ url('/') }}"
    }
}

        </script>
        <script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "Product",
    "name": "{{ $course->title }}",
    "description": "{{ strip_tags($course->description) }}",
    "image": ["{{ asset($course->imagePath.'.jpg') }}"],
    "sku": "SKU-{{ str_pad($course->id, 4, '0', STR_PAD_LEFT) }}",
    "offers": {
        "@type": "Offer",
        "url": "{{ url()->full() }}",
        "priceCurrency": "USD",
        "price": "{{ $course->discounted_price }}",
        "priceValidUntil": "{{ $priceValidUntil }}",
        "availability": "https://schema.org/InStock"
    }
}

        </script>
    @endforeach
    <style>
        /* StatePage Styling */
        .stateBanner {
            background: url("{{ $statePromotion->banner_img }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding: 50px 0;
            z-index: 1;
            position: relative;
        }

        .stateBanner:before {
            position: absolute;
            content: '';
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
            background: rgba(0, 0, 0, .6);
        }

        .stateBanner .desc h1 {
            font-size: 50px;
            font-family: "Source Sans Pro";
            color: rgb(255, 255, 255);
            line-height: 1.2;
            text-align: center;
            text-transform: uppercase;
        }

        section.stateDescSect,
        section.StateheadingSect {
            padding: 50px 0;
        }

        section.StateheadingSect .desc p {
            font-size: 18px;
            text-align: center;
        }

        section.stateDescSect .desc h2 {
            margin-bottom: 10px;
            font-size: 26px;
        }

        section.stateDescSect .desc h5 {
            margin-top: 20px;
            margin-bottom: 20px;
            font-size: 20px;
        }

        section.stateDescSect .desc ul li,
        section.stateDescSect .desc p {
            font-size: 18px;
            /* margin-bottom: 15px;
            margin-top: 10px; */
        }

        section.stateDescSect .desc ul {
            padding-left: 20px;
        }
        section.StateheadingSect figure.image.image_resized {
            margin: auto;
        }
        section.StateheadingSect figure.image.image_resized.image-style-side {
            margin-right:0;
        }
        /* StatePage Styling */
        @media screen and (max-width: 768px) {
            .stateBanner .desc h1 {
                font-size: 30px;
            }
        }

        #sale-banner {
            width: 100%;
            display: block;
        }

        #sale-banner img {
            width: 100%;
        }

        #sale-banner-mobile {
            display: none;
        }

        .why-us img {
            display: inline-block;
        }

        .why-us > p.desc {
            font-size: 1.1rem;
        }

        .why-us .item {
            padding: 0 50px;
        }

        .why-us .item p {
            font-weight: bold;
        }

        .group-discount .col-md-3 {
            text-align: right;
        }

        .group-discount .find-more-btn {
            background-color: #ffb900;
        }

        .group-discount .find-more-btn:hover,
        .course .btn.\--btn-small.enroll-now-btn:hover {
            color: #FFFFFF;
            opacity: 1;
        }

        @media (max-width: 767px) {

            .group-discount,
            .group-discount .col-md-3 {
                text-align: center;
            }

            .course-outline-popup div.popup-inner-div div.col-md-6 {
                padding-left: 40px;
            }

            .course-outline-popup div.popup-inner-div div.col-md-6:nth-child(1) {
                padding-bottom: 0;
            }

            .course-outline-popup div.popup-inner-div div.col-md-6:nth-child(2) {
                padding-top: 0;
            }

            #countdown-timer {
                font-size: 1.5rem;
            }

            #countdown-timer h6 {
                font-size: 1rem;
            }
        }

        @media (max-width: 575px) {
            .row.course {
                margin: 20px 15px;
            }
        }

        @media (max-width: 425px) {
            #sale-banner {
                display: none;
            }

            #sale-banner-mobile {
                display: block;
            }
        }

        #price-comparison-table {
            border-spacing: 0px;
            border-collapse: collapse;
            margin-bottom: 0;
            margin: 10px auto;
            text-align: center;
        }

        #price-comparison-table tr:first-of-type th:first-of-type {
            font-weight: normal;
            line-height: 1;
            font-size: 18px;
        }

        #price-comparison-table td:first-of-type img {
            margin: 0 auto;
            width: 60%;
        }

        #price-comparison-table.table-bordered th,
        #price-comparison-table.table-bordered td {
            border: 1px solid #cccccc;
            vertical-align: middle;
        }

        #price-comparison-table .ooc-row {
            background-color: #FDBB33;
            font-weight: bold;
            font-size: 30px;
            line-height: 1;
        }

        #price-comparison-table th {
            font-size: 22px;
        }

        #price-comparison-table td {
            font-size: 24px;
        }

        @media (max-width: 425px) {

            #price-comparison-table tr th,
            #price-comparison-table tr td {
                padding: 0;
            }

            #price-comparison-table tr:first-of-type th:first-of-type {
                font-weight: normal;
                font-size: 12px;
            }

            #price-comparison-table td:first-of-type img {
                margin: 7px auto;
                width: 80%;
            }

            #price-comparison-table tr td:nth-child(2),
            #price-comparison-table tr td:nth-child(3) {
                width: 80px;
            }

            #price-comparison-table tr#ooc-row td:nth-child(2),
            #price-comparison-table tr#ooc-row td:nth-child(3) {
                font-size: 30px;
            }

            #price-comparison-table tr#ooc-row img {
                width: 90%;
                margin: 15px auto;
            }

            #price-comparison-table th {
                font-size: 18px;
            }

            #price-comparison-table td {
                font-size: 20px;
            }
        }

        section.promBanner {
            position: relative;
            padding: 35px 0;
        }

        section.promBanner:before {
            position: absolute;
            content: '';
            height: 100%;
            width: 50%;
            top: 0;
            left: 0;
            bottom: 0;
            background: -moz-linear-gradient(0deg, rgb(30, 134, 196) 18%, rgb(116, 206, 255) 100%);
            background: -webkit-linear-gradient(0deg, rgb(30, 134, 196) 18%, rgb(116, 206, 255) 100%);
            background: -ms-linear-gradient(0deg, rgb(30, 134, 196) 18%, rgb(116, 206, 255) 100%);
            background-size: cover;
            background-position: center left;
            background-repeat: no-repeat;
        }

        section.promBanner:after {
            position: absolute;
            content: '';
            top: 0;
            right: 0;
            bottom: 0;
            height: 100%;
            width: 50%;
            background: url({{ asset("images/promotions/promBannerBG.jpg") }});
            background-size: cover;
            background-position: 0% 30%;
            background-repeat: no-repeat;
        }

        section.promBanner .desc h4 {
            font-size: 21px;
            font-family: "Poppins";
            color: rgb(0, 76, 121);
            line-height: 1.2;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-align: left;
        }

        section.promBanner .desc h1 {
            font-size: 40px;
            font-family: "Poppins";
            margin: 15px 0;
            letter-spacing: 1px;
            color: rgb(255, 255, 255);
            text-transform: uppercase;
            line-height: 1.2;
            text-align: left;
        }

        section.promBanner .course-box {
            border: 3px solid #000;
            border-bottom-right-radius: 20px;
            display: inline-block;
            width: fit-content;
            width: -moz-fit-content;
            width: -webkit-fit-content;
            overflow: hidden;
        }

        section.promBanner .course-box:first-child {
            margin-right: 15px
        }

        section.promBanner .course-box h3.name {
            font-size: 25px;
            font-family: "Source Sans Pro";
            color: rgb(0 0 0);
            line-height: 1.2;
            background: #fff;
            padding: 10px 5px;
            display: block;
            font-weight: 600;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }

        section.promBanner .course-box h3.name b {
            font-weight: 900;
            margin-left: 5px;
        }

        section.promBanner .course-box .pricing {
            background: #ff1a1a;
            height: 100%;
            border-top: 3px solid #000;
            text-align: center;
            margin: 0;
            padding: 0px 15px;
        }

        section.promBanner .course-box .pricing span.lt-price {
            color: #a51616;
            font-size: 26px;
            font-family: "Source Sans Pro";
            line-height: 1.2;
            font-weight: 800;
            text-decoration: line-through;
        }

        section.promBanner .course-box .pricing h5 {
            font-size: 42px;
            font-family: "Source Sans Pro";
            color: rgb(255 255 255);
            display: inline-block;
        }

        section.promBanner .course-box .cta-button {
            background: #db0000;
            text-align: center;
            height: 100%;
            justify-content: center;
            align-items: center;
            display: flex;
            border-top: 3px solid #000;
            border-left: 3px solid #000;
        }

        section.courses {
            background: #efefef;
            padding: 50px 0;
        }

        section.courses .heading2 {
            margin-top: 50px;
        }

        section.courses .heading h3 {
            font-size: 21px;
            font-family: "Poppins";
            color: rgb(0, 0, 0);
            font-weight: bold;
            line-height: 1.2;
            max-width: 750px;
            margin: auto;
            margin-bottom: 35px;
            text-align: center;
        }

        section.courses .courseBox {
            background: #ffffff;
            box-shadow: 0px 6px 9px 0px rgba(0, 0, 0, 0.13);
            padding: 20px;
            padding-bottom: 20px;
        }

        section.courses .courseBox .courseDesc .name {
            font-size: 24px;
            font-family: "Poppins";
            color: rgb(0, 0, 0);
            font-weight: bold;
            text-transform: uppercase;
            line-height: 1.2;
            text-align: left;
            margin-bottom: 5px;
        }

        section.courses .courseBox .courseDesc .desc p {
            font-size: 16px;
            font-family: "Source Sans Pro";
            color: rgb(124, 124, 124);
            line-height: 1.5;
            text-align: left;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        section.courses .courseBox .courseDesc .desc a.readMoreLink {
            font-size: 16px;
            font-family: "Source Sans Pro";
            position: relative;
            color: rgb(62, 157, 215);
            line-height: 1.2;
            text-align: left;
            margin: 5px 0;
            display: inline-block;
        }

        section.courses .courseBox .courseDesc .desc a.readMoreLink:after {
            content: '';
            position: absolute;
            width: 100%;
            transform: scaleX(0);
            height: 2px;
            bottom: 0px;
            left: 0;
            background-color: rgb(62, 157, 215);;
            transform-origin: bottom right;
            transition: transform 0.25s ease-out;
        }

        section.courses .courseBox .courseDesc .desc a.readMoreLink:hover:after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }

        section.courses .courseBox .courseDesc .courseFeatures {
            padding-bottom: 15px;
            margin-bottom: 15px;
            border-bottom: 1px solid rgb(232, 232, 232);
        }

        section.courses .courseBox .courseDesc .courseFeatures p {
            font-size: 11px;
            font-family: "Poppins";
            color: rgb(124, 124, 124);
            text-transform: uppercase;
            font-weight: bold;
            margin-top: 10px;
            letter-spacing: 2px;
            line-height: 1.2;
            text-align: left;
        }

        section.courses .courseBox .courseDesc .courseFeatures h5 {
            font-size: 16px;
            font-family: "Poppins";
            color: rgb(255, 174, 0);
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 10px;
            line-height: 1.2;
            text-align: left;
        }

        section.courses .courseBox .courseDesc .courseFeatures ul li {
            list-style: none;
            margin-top: 10px;
            font-size: 14px;
            font-family: "Poppins";
            text-transform: uppercase;
            color: rgb(124, 124, 124);
            font-weight: bold;
            line-height: 1.2;
            text-align: left;
        }

        section.courses .courseBox .courseFooter .pricing {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            align-items: flex-end
        }

        section.courses .courseBox .courseFooter .pricing span.lt-price {
            font-size: 18px;
            font-family: "Poppins";
            color: rgb(130, 130, 130);
            font-weight: bold;
            margin-right: 5px;
            text-decoration: line-through;
            line-height: 1.2;
            text-align: left;
        }

        section.courses .courseBox .courseFooter .pricing h5 {
            font-size: 30px;
            font-family: "Poppins";
            color: rgb(255, 26, 26);
            font-weight: bold;
            line-height: 1;
            margin: 0;
            text-align: left;
        }

        section.courses .courseBox .courseFooter .row,
        section.courses .courseBox .courseFooter .row > div {
            margin: 0;
            padding: 0;
        }

        section.courses .courseBox .courseFooter .pricing {
            padding-right: 10px;
        }

        section.courses .courseBox .courseFooter .buyNowCta {
            padding-left: 10px;
        }

        section.courses .courseBox .courseFooter .buyNowCta a {
            border-radius: 10px;
            background-color: rgb(255, 174, 0);
            display: block;
            text-align: center;
            border: 1px solid rgb(255, 174, 0);
            padding: 10px 5px;
            font-size: 14px;
            font-family: "Poppins";
            color: rgb(0, 0, 0);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: bold;
            line-height: 1.2;
            transition: ease all 0.25s;
        }

        section.courses .courseBox .courseFooter .buyNowCta a:hover {
            background-color: rgba(255, 174, 0, 0);
        }
        section.courses .courseBox .courseFooter .buyNowCta a:before{
            content: 'Buy Now';
        }

        section.promBanner .col-md-6 {
            padding: 0;
        }

        section.promBanner .col-md-6 .row {
            margin: 0;
        }

        #price-comparison-table {
            border-spacing: 0px;
            border-collapse: collapse;
            margin-bottom: 0;
            margin: 10px auto;
            text-align: center;
            background: #fff;
        }

        .imgWrapper {
            display: none;
        }

        #price-comparison-table span.fs-large.lt-price {
            position: relative;
        }

        #price-comparison-table span.fs-large.lt-price:before {
            display: block;
            content: "";
            position: absolute;
            left: 0;
            top: 49%;
            width: 100%;
            height: 1.5px;
            background-color: #fc4a1a;
            transform: rotate(-22deg);
        }

        section.promBanner .desc {
            margin: 0 -15px;
        }

        section.promBanner .desc .row {
            margin: 0;
        }

        @media (min-width: 992px) {
            .container {
                width: 970px;
                max-width: 100%;
            }
        }

        @media (min-width: 1200px) {
            .container {
                width: 1030px;
                max-width: 100%;
            }
        }

        @media (min-width: 1400px) {
            .container {
                width: 1220px;
                max-width: 100%;
            }
        }

        @media (max-width: 1200px) {

            section.courses .courseBox .courseFooter .pricing h5 {
                font-size: 24px;
            }

            section.courses .courseBox .courseFooter > .row {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            section.courses .courseBox .courseFooter .pricing span.lt-price {
                font-size: 16px;
            }
        }

        section.courses .col-md-12.col-lg-4:not(:last-child) .courseBox {
            margin-bottom: 30px
        }

        @media (max-width: 992px) {


            .col-sm-6 {
                float: left;
                width: 50%;
            }

            .imgWrapper {
                display: block;
                margin: 0 -15px;
            }

            section.promBanner .desc .row {
                margin: 0;
            }

            section.promBanner .desc {
                padding: 20px 0;
                margin: 0;
            }

            section.promBanner .desc,
            section.promBanner .desc h4 {
                text-align: center;
            }

            section.promBanner .desc h1 {
                font-size: 34px;
                text-align: center;
            }

            section.promBanner > div,
            section.promBanner {
                z-index: 9;
                padding: 0;
                width: 100%;
                margin: 0;
                position: relative;
            }

            section.promBanner:before {
                height: 100%;
                top: 0;
                width: 100%;
            }

            section.promBanner:after {
                display: none;
            }
        }

        .newPromotionBanner {
            width: 100%;

        background:

        url
        (
        @php echo "/images/promotions/". env('PROMOTION_NAME') ."/homepage-banner-desktop-1920x500.webp"@endphp)
        ;
        height:
        450px;
        position:
        relative;
        background-size:
        cover;
        background-position:
        center;
        }

        .newPromotionBanner
        img
        {
        display:
        none
        }

        .newPromotionBanner
        a
        {
        position:
        absolute;
        top:
        0;
        bottom:
        0;
        left:
        0;
        right:
        0;
        z-index:
        11
        }

        section.courses>div>.row
        {
        display:
        flex;
        flex-wrap:
        wrap;
        }

        section.courses>div>.row>.col-md-12.col-lg-4
        {
        margin-bottom:
        30px;
        }

        section.courses
        .courseBox
        {
        height:
        100%;
        margin-bottom:
        15px;
        }

        section.courses
        .courseBox
        {
        position:
        relative;
        padding-bottom:
        50px;
        }

        section.courses
        .courseBox
        .courseFooter
        {
        position:
        absolute;
        left:
        20px;
        right:
        20px;
        bottom:
        20px;
        }

        @media
        (
        max-width:
        1600px
        )
        {
        .newPromotionBanner {
            height: 450px;
        }

        }

        @media (max-width: 991px) {
            .newPromotionBanner {
                height: 400px;
            }
        }

        @media (max-width: 767px) {
            .newPromotionBanner {
                background: none;
                height: auto;
            }

            .newPromotionBanner a {
                position: relative;
            }

            .newPromotionBanner img {
                width: 100%;
                display: block
            }
        }

        /*.courses .courseBox {*/
        /*    margin-bottom: 30px;*/
        /*}*/
    </style>
@endsection

@section('content')

    {{--Banner Section--}}
    <section class="stateBanner">
        <div class="container">
            <div class="desc">
                <h1>
                    {{ $statePromotion->heading }}
                </h1>
            </div>
        </div>
    </section>
    {{--Banner Section--}}

    <section class="StateheadingSect">
        <div class="container">
            <div class="desc">
                {!! $statePromotion->excerpt !!}
            </div>
        </div>
    </section>
    {{--Courses Section--}}
    <section class="courses" id="courses">
        {{--why to enroll video section here--}}
        @include('partials._why_to_enroll_video_section', ['classes' => 'mbpx-50', 'slug' => 'marcos-osha-30'])
        <div class="container">
            <div class="row">
                @foreach($courses as $course)
                    <div class="col-md-12 col-lg-4">
                        <div class="courseBox">
                            <div class="courseDesc">
                                <p class="name">
                                   <a href="{{ url('/' . $course->slug) }}">
                                       {{ $course->title }}
                                   </a>
                                </p>
                            </div>
                            <div class="courseFooter">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="pricing">
                                            <span class="lt-price">${{ $course->price }}</span>
                                            <h5>${{ $course->discounted_price }}</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="buyNowCta">
                                            <a href="{{ url('/add-to-cart/'. $course->id) }}">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{--Courses Section--}}

    <section class="stateDescSect">
        <div class="container">
            <!-- <div class="row">
                <div class="col-12 col-md-5 col-xl-4">
                    <img src="{{ $statePromotion->content_img }}"
                         alt="OSHA Training Obligations You Need To Know For {{ $statePromotion->name }}" class="mb-5">
                </div>
                <div class="col-12"> -->
                    <div class="desc">
                        {!! $statePromotion->obligations !!}
                    </div>
                <!-- </div>
            </div> -->
        </div>
    </section>

    <section class="stateDescSect bg-secondary">
        <div class="container">
            <div class="desc">
                {!! $statePromotion->advantages !!}
            </div>
        </div>
    </section>

    @include('partials._faqs')

@endsection

@section('scripts')
    <script>
        $(window).load(function () {
            resizeDivs();
            $(window).resize(function () {
                resizeDivs();
            });
        });

        function resizeDivs() {
            if ($(window).width() > 991) {
                $('.course').each(function () {
                    var height = $(this).find('.image-div').height() - 20;
                    console.log(height);
                    $(this).find('.desc-div').height(height);
                })
            } else {
                $('.course').each(function () {
                    $(this).find('.desc-div').removeAttr('style');
                });
            }
        }

        $('.close').click(function (e) {
            $('body').removeClass('modal-open');
            $('.shopperlink').show();
            $(this).parent().parent().parent().hide();
            //Enable Smooth Scroll js
            var isChrome = /chrome/i.test(window.navigator.userAgent);
            var isMouseWheelSupported = 'onmousewheel' in document;
            if (isMouseWheelSupported && isChrome) {
                addEvent("mousedown", mousedown);
                addEvent("mousewheel", wheel);
                addEvent("load", init);
            }
            ;
            //Enable Smooth Scroll js
            e.stopPropagation();
            e.preventDefault();
        });
        $('.close-btn-back').click(function (e) {
            $('body').removeClass('modal-open');
            $('.shopperlink').show();
            $(this).parent().parent().parent().parent().hide();
            //Enable Smooth Scroll js
            var isChrome = /chrome/i.test(window.navigator.userAgent);
            var isMouseWheelSupported = 'onmousewheel' in document;
            if (isMouseWheelSupported && isChrome) {
                addEvent("mousedown", mousedown);
                addEvent("mousewheel", wheel);
                addEvent("load", init);
            }
            //Enable Smooth Scroll js
            e.stopPropagation();
            e.preventDefault();
        });
        $('.course-outline-btn').click(function (e) {
            e.preventDefault();
            $(this).siblings('.course-outline-popup').show();
            $('body').addClass('modal-open');
            //Disable Smooth Scroll js
            removeEvent("mousedown", mousedown);
            removeEvent("mousewheel", wheel);
            removeEvent("load", init);
            //Disable Smooth Scroll js
            $('.shopperlink').hide();
        });
    </script>

    {{--why to enroll video section here--}}
    @stack('modal_content')

@endsection
