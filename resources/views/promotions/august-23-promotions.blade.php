@extends('layouts.promotional_sale')
@section('title', env('PROMOTION_PAGE_TITLE') . ' | ' . config('app.name') )

@section('styles')
    <meta name="robots" content="noindex, nofollow"/>
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
    <!-- Meta Tags for Social Media -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="OSHA Outreach Courses">
    <meta property="fb:app_id" content="817832821974771"/>
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:site" content="@OshaOutreach">
    @php
        $coverImgUrl = "/images/promotions/". env('PROMOTION_NAME') ."/homepage-banner-desktop-1920x500.webp";
        $desktopImgUrl = "/images/promotions/" . env('PROMOTION_NAME') . "/homepage-banner-mobile-900x500.webp";
        $mobileImgUrl = asset('images/promotions/'. env('PROMOTION_NAME') .'/homepage-banner-mobile-425x250.webp');

        if(request()->cookie('special')) {
            $coverImgUrl = "/images/promotions/". env('PROMOTION_NAME') ."/homepage-banner-desktop-disc-1920x500.webp";
            $desktopImgUrl = "/images/promotions/" . env('PROMOTION_NAME') . "/homepage-banner-mobile-disc-900x500.webp";
            $mobileImgUrl = asset('images/promotions/'. env('PROMOTION_NAME') .'/homepage-banner-mobile-disc-425x250.webp');
        }
    @endphp
    <style>
        .newPromotionBannernew {
            background-image: linear-gradient(to right, #a6daff, #1a9fff);
            padding: 50px 0px;
        }

        .banner_award {
            color: #165180 !important;
            font-size: 30px;
        }

        .banner_awarded_wrapper {
            display: flex;
            margin-bottom: 25px;
        }

        section.video_review_section {
            width: 100%;
            padding: 0 35px 0 15px;
        }





        .banner_celebration {

            font-weight: 500;
        }

        .banner_1500_img {
            width: 250px;
            margin-right: 25px;
        }

        .banner_1500_img img {
            object-fit: cover;
        }

        .banner_powerd_by {
            color: #165180 !important;
            font-size: 20px;
            text-transform: uppercase;
            font-weight: 900;
            letter-spacing: 2px;
        }

        .banner_power_img {
            width: 300px;
        }

        .banner_power_img img {
            object-fit: cover;
        }

        h2.banner_yourself.text-uppercase {
            text-align: center;
            text-transform: uppercase;
            font-size: 22px;
            letter-spacing: 3.5px;
            font-weight: bold;
        }





        .banner_5star {
            text-align: center;
        }

        .banner_5star a {
            color: #165180 !important;
            text-align: center;
            display: inline-block;
            font-size: 16px;
            text-decoration: underline;
            font-weight: 600;
            color: #000000;
            transition: ease all 0.25s;
        }

        .banner_5star a:hover {

            color: rgb(255, 255, 255) !important;

        }

        .banner_right_section {
            padding-left: 30px;
        }

        @media only screen and (max-width: 1400px) {


            .banner_title_wrapper {
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            .banner_award {
                font-size: 25px;
            }

            .banner_celebration {
                font-size: 18px;
            }

        }


        @media only screen and (max-width: 992px) {
            .training_course_description p{
                text-align: center;
            }
            .banner_right_section {
            padding-left: 0px;
            }
            .banner_title_wrapper{
                text-align: center;
                margin-top: 20px;

            }
            .banner_awarded_wrapper{
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;

            }
            .banner_right_section {
                margin-top: 40px;
            }

            .banner_power_img {
                 margin: 0 auto;

            }

            .banner_powerd_by {
                text-align: center;
            }
            .banner_1500_img{
                width: auto;
                margin:0px;

            }
        }

        @media only screen and (max-width: 767px) {
            .hear_your_self_video_wrapper {

              margin: 20px 0px 0 0;
}

            .banner_award {
                font-size: 25px;
            }

            .banner_celebration {

                font-size: 20px;
            }

            .banner_powerd_by {

                font-size: 16px;
            }
            .plus_free_course{
                margin:0 auto !important;
            }






        }

        @media only screen and (max-width: 600px) {
            .hear_yourself_video iframe{
                height: auto;
            }
            .banner_award {
                font-size: 25px;
            }

            .banner_celebration {
                font-size: 22px;
            }
        }

        @media only screen and (max-width: 576px) {
            .plus_free_course{
                margin:0 auto;
            }


        }

        @media only screen and (max-width: 450px) {
            .plus_free_course{
                margin:0 auto;
            }
            .hear_yourself_video iframe{
                height: auto;
            }
            .banner_power_img{
                width:240px;
            }


        }


        section.newPromotionBanner > .row {
            display: flex;
        }


        section.newPromotionBanner .reviewsSlider {
            display: flex;
            flex-wrap: wrap;
            height: 100%;
            justify-content: center;
            align-items: center;
            background: #BDE7F9;
            padding: 15px 0;
            color: #000000;
        }

        section.newPromotionBanner .reviewsSlider .container {
            width: 100%;
        }

        section.newPromotionBanner section.video_review_section a {
            position: relative;
        }

        /*section.newPromotionBanner section.video_review_section .mt-2.padding-0 {*/
        /*    display: none;*/
        /*}*/

        section.newPromotionBanner section.video_review_section p.reviewsCourseName {
            display: none;
        }

        section.newPromotionBanner section.video_review_section iframe {
            width: 100%;
            /* height: 250px; */
        }

        section.newPromotionBanner section.video_review_section .videoSliderItem {
            padding: 0 15px;
        }

        section.newPromotionBanner .reviewsSlider .headDesc h4 {
            text-align: center;
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
            background: url({{ asset("images/promotions/promBannerBG.jpg")}});
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

        section.promBanner .desc h2 {
            font-size: 40px;
            font-family: "Poppins";
            margin: 15px 0;
            letter-spacing: 1px;
            color: rgb(255, 255, 255);
            text-transform: uppercase;
            line-height: 1.2;
            text-align: left;
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

        .newPromotionBanner .col-12.col-md-6 {
            padding: 0;
        }

        .newPromotionBanner .bannerImgWrapper {
            width: 100%;
            background: url({{ $coverImgUrl }});
            height: 450px;
            position: relative;
            background-size: cover;
            background-position: center;
        }

        .newPromotionBanner img {
            display: none
        }

        .newPromotionBanner a {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 11
        }

        @media (max-width: 1600px) {
            .newPromotionBanner {
                height: 450px;
            }
        }

        @media (max-width: 1300px) {
            .newPromotionBanner .bannerImgWrapper {
                background: url({{ $desktopImgUrl }});
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
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

        @media (max-width: 1099px) {
            section.newPromotionBanner .reviewsSlider .headDesc h4 {
                font-size: 20px;
            }
        }

        @media (max-width: 991px) {
            section.newPromotionBanner .reviewsSlider .headDesc h4 {
                font-size: 16px;
                margin-bottom: 15px;
            }
        }

        @media (max-width: 767px) {
            section.video_review_section {
                padding: 0 50px;
            }

            .newPromotionBanner .bannerImgWrapper {
                height: auto;
            }

            section.newPromotionBanner > .row {
                flex-wrap: wrap;
            }

            .videoSliderItem .video-item {
                max-width: 75%;
                margin: 0 auto;
            }

            .group-discount,
            .group-discount .col-md-3 {
                text-align: center;
            }
        }

        @media (max-width: 425px) {
            #sale-banner {
                display: none;
            }

            .why-us p.desc {
                font-size: 14px;
                font-family: "Poppins";
                color: rgb(0, 0, 0);
                line-height: 1.667;
                text-align: center;
            }

            section.video_review_section {
                padding: 0
            }

            section.newPromotionBanner .reviewsSlider {
                padding: 30px 30px 15px;
            }

            section.newPromotionBanner .reviewsSlider .headDesc h4 > br {
                display: none;
            }

            #sale-banner-mobile {
                display: block;
            }

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

            section.promBanner .desc h2 {
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


        @media (max-width: 500px) {
            header.top-bar {
                /* margin-top: 0 !important; */
            }
        }
    </style>
@endsection

@section('content')
    <section class="newPromotionBannernew">
        <div class="container">
            <div class="row">

                <div class="col-12 col-lg-6 col-md-12 col-sm-12">
                    <div class="banner_awarded_wrapper">
                        <div class="banner_1500_img"><img
                                src="https://www.shopperapproved.com/award/images/33391-bottom-medal-black.png" alt="">
                        </div>

                        <div class="banner_title_wrapper">
                            <h2 class="text-uppercase banner_award">AWARD WINNING COMPANY</h2>
                            <h4 class="banner_celebration">Celebrating It's
                                <b> Silver Jubilee </b>of <b>25k Customers</b> by Offering a <b>Huge Discount.</b></h4>
                        </div>
                    </div>
                    <p class="banner_powerd_by">powered by</p>
                    <div class="banner_power_img">
                        <img
                            src="https://res.cloudinary.com/elearning-avenue24/image/upload/v1674123232/assets/oc_images/HSI-OSHA-Authorized-Training-Provider-Seal_v7xpum.png"
                            alt=""></div>
                </div>


                <div class="col-12 col-lg-6 col-md-12 col-sm-12">
                    <div class="banner_right_section">
                        <div>
                            <h2 class="banner_yourself text-uppercase">hear yourself</h2>
                        </div>

                        @include('partials._video_reviews_static', ['promotional' => true])

                        <div class="banner_5star"><a target="_blank" href="{{ route('videoReviews.single') }}">Watch More 5-Star Reviews</a></div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--Courses Section--}}
    @include('partials._course_boxes_like_promo_with_headings_new')
    {{--Courses Section--}}

    @include('partials._reviews_sa_images', ['reviewsId' => true, 'backgroundWhite' => true])

    {{--GE Benefits Section--}}
    @include('partials._ge_benefits')
    {{--GE Benefits Section--}}

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js"></script>
    {{--<script src="{{ asset('src/js/timer.js') }}"></script>--}}
    <script>
        function createCookie(name, value, days) {
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                var expires = "; expires=" + date.toGMTString();
            } else var expires = "";
            document.cookie = name + "=" + value + expires + "; path=/";
        }

        createCookie('promotions-disable', 1, 1);
        /*$('#timer').countdown('2021/01/11')
            .on('update.countdown', function(event) {
            var format = '%H:%M:%S';
            if(event.offset.totalDays > 0) {
                format = '%D DAY ' + format;
            }
            $(this).html(event.strftime(format));
        });*/
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
    </script>
@endsection
