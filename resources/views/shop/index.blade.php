@extends('layouts.master')

@section('title', isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Home | '.config('app.name') )

@push('custom-css')
.banner_points_wrapper {
    text-transform:uppercase;
}


.stateSect.bg-secondary {
background-color: white;
}

.banner-box {
margin: 0 2px;
max-width: 258px;
}

.banner-box.margin-auto {
margin: 0 auto;
}

.related-course-slider .banner-box.margin-auto {
margin: 0px auto 20px;
}

.banner-box figure {
position: relative;
}

.banner-box .content {
position: absolute;
bottom: 20px;
left: 16px;
}

.banner-box .content .title {
color: #ffffff;
font-size: 24px;
font-weight: bold;
line-height: 1;
}

.banner-box .content .title span {
display: block;
font-size: 18px;
font-weight: normal;
}

@media (max-width: 991px) {
.hero-banner .banner-box {
max-width: 258px;
margin: 0 auto 20px;
}
}

@media (max-width: 767px) {
.hero-banner .banner-box {
max-width: 100%;
margin: 0 auto 20px;
display: table;
width: 100%;
}

.hero-banner .banner-box a{
display: table-cell;
width: 50%;
vertical-align: top;
}

.hero-banner .banner-box .banner-bottom {
display: table-cell;
width: 50%;
vertical-align: top;
}

.hero-banner .banner-box .content .title {
font-size: 20px;
color: #000000;
}

.hero-banner .banner-box .content .title span {
font-size: 14px;
}

.hero-banner .banner-box .banner-bottom .banner-btn {
font-size: 16px;
padding: 10px 5px;
height: 60px;
vertical-align: middle;
}

.hero-banner .banner-box .banner-bottom .banner-price {
font-size: 20px;
padding: 10px 5px;
height: 68px;
vertical-align: middle;
}

.hero-banner .banner-box figure img {
display: none;
}

.hero-banner .banner-box figure .content {
position: relative;
background-color: #ffffff;
left: 0;
bottom: 0;
border: 1px solid #000000;
padding: 15px 10px 10px;
height: 68px;
}
}
#price-comparison-table{
border-spacing: 0px;
border-collapse: collapse;
margin-bottom: 0;
margin: 10px auto;
text-align: center;
background:#fff;
}
#price-comparison-table tr:first-of-type th:first-of-type{
font-weight: normal;
line-height:1;
font-size: 18px;
}
#price-comparison-table td:first-of-type img{
margin: 0 auto;
width: 60%;
}
#price-comparison-table.table-bordered th, #price-comparison-table.table-bordered td{
border: 1px solid #cccccc;
vertical-align: middle;
}
#price-comparison-table .ooc-row{
background-color: #FDBB33;
font-weight: bold;
font-size: 30px;
line-height:1;
}
#price-comparison-table th{
font-size: 22px;
}
#price-comparison-table td{
font-size: 24px;
}

.banner-box .banner-bottom .banner-price.fc-red{
color: #ff0000;
}

@media (max-width: 425px) {
#price-comparison-table tr th,
#price-comparison-table tr td{
padding: 0;
}

#price-comparison-table tr:first-of-type th:first-of-type{
font-weight: normal;
font-size: 12px;
}
#price-comparison-table td:first-of-type img{
margin: 7px auto;
width: 80%;
}

#price-comparison-table tr td:nth-child(2),
#price-comparison-table tr td:nth-child(3){
width: 80px;
}

#price-comparison-table tr#ooc-row td:nth-child(2),
#price-comparison-table tr#ooc-row td:nth-child(3){
font-size: 30px;
}

#price-comparison-table tr#ooc-row img{
width: 90%;
margin: 15px auto;
}

#price-comparison-table th{
font-size: 18px;
}
#price-comparison-table td{
font-size: 20px;
}
}

.home-intro .title {
margin-bottom: 25px;
}
.view-all-courses {
float: none;
display: table !important;
margin-bottom: 30px;
}

.mobile-view td span.fs-large {
display: block;
font-weight: normal;
position: relative;
width: fit-content;
margin: auto;
}

{{-- For diagonal line --}}
section.home-banner .courses-wrapper ul li .course-box a .row .pricing span {
position: relative;
}

span.fs-medium.lt-price:before {
display: block;
content: "";
position: absolute;
left: 0;
top: 57%;
width: 100%;
height: 1.5px;
background-color: #fc4a1a;
transform: rotate(
-22deg
);
}

td.ooc-mb-row, td.ooc-row {
position: relative;
}

.ooc-row span.fs-large.lt-price:before {
display: block;
content: "";
position: absolute;
left: 22%;
top: 59%;
width: 18%;
height: 1.5px;
background-color: #fc4a1a;
transform: rotate(
-22deg
);
}

.ooc-mb-row span.fs-large.lt-price:before {
display: block;
content: "";
position: absolute;
left: 0;
top: 46%;
width: 100%;
height: 1.5px;
background-color: #fc4a1a;
transform: rotate(
-22deg
);
}
{{-- For diagonal line --}}
{{-- For laguage modal --}}
.lang {
width: 30px;
height: 20px;
display: inline-block;
margin: 0px 5px -5px;
border: 1px solid #000;
}

.no-webp .lang.lang-en {
background: url('{{ asset('images/flags_sprites.png') }}') -90px -0;
}

.no-webp .lang.lang-es {
background: url('{{ asset('images/flags_sprites.png') }}') -120px -0;
}

.webp .lang.lang-en {
background: url('{{ asset('images/flags_sprites.webp') }}') -90px -0;
}

.webp .lang.lang-es {
background: url('{{ asset('images/flags_sprites.webp') }}') -120px -0;
}
{{-- For laguage modal --}}
.videoPopUpBox{
background: #fff;
padding-top:50px;
cursor: pointer;
padding: 20px;
border: 1px solid #eee;
box-shadow: 0px 0px 10px 0px rgb(0 0 0 / 20%);
z-index: 0;
position: relative;
}
.videoPopUpBox h4 {
display: flex;
font-size:22px;
}
.videoPopUpBox h4 svg {
width: 50px;
margin-right: 15px;
}
#videoReviewMain {
font-family: 'Open Sans', sans-serif;
display: none;
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
z-index:99999999999;
}
#videoReviewMain .underlay {
width: 100%;
height: 100%;
position: absolute;
top: 0;
left: 0;
background-color: rgba(0,0,0,0.5);
cursor: pointer;
-webkit-animation: fadein 0.5s;
animation: fadein 0.5s;
}
#videoReviewMain .modal {
width: 600px;
height: 400px;
background-color: #f0f1f2;
z-index: 1;
position: absolute;
margin: auto;
top: 0;
right: 0;
bottom: 0;
left: 0;
border-radius: 4px;
-webkit-animation: popin 0.3s;
animation: popin 0.3s;
}
#videoReviewMain .modal-title {
font-size: 18px;
background-color: #252525;
color: #fff;
padding: 10px;
margin: 0;
border-radius: 4px 4px 0 0;
text-align: center;
}
#videoReviewMain h3 {
color: #fff;
font-size: 1em;
margin: 0.2em;
text-transform: uppercase;
font-weight: 500;
}
#videoReviewMain .modal-body {
padding: 20px 35px;
font-size: 0.9em;
}
#videoReviewMain p {
color: #344a5f;
line-height: 1.3em;
}
#videoReviewMain form {
text-align: center;
margin-top: 35px;
}
#videoReviewMain form input[type=text] {
padding: 12px;
font-size: 1.2em;
width: 300px;
border-radius: 4px;
border: 1px solid #ccc;
-webkit-font-smoothing: antialiased;
}
#videoReviewMain form input[type=submit] {
text-transform: uppercase;
font-weight: bold;
padding: 12px;
font-size: 1.1em;
border-radius: 4px;
color: #fff;
background-color: #4ab471;
border: none;
cursor: pointer;
-webkit-font-smoothing: antialiased;
}
#videoReviewMain form p {
text-align: left;
margin-left: 35px;
opacity: 0.8;
margin-top: 1px;
padding-top: 1px;
font-size: 0.9em;
}
#videoReviewMain .modal-footer {
position: absolute;
bottom: 20px;
text-align: center;
width: 100%;
}
#videoReviewMain .modal-footer p {
text-transform: capitalize;
cursor: pointer;
display: inline;
border-bottom: 1px solid #344a5f;
}
@-webkit-keyframes fadein {
0% {
opacity: 0;
}

100% {
opacity: 1;
}
}
@-ms-keyframes fadein {
0% {
opacity: 0;
}

100% {
opacity: 1;
}
}
@keyframes fadein {
0% {
opacity: 0;
}

100% {
opacity: 1;
}
}
@-webkit-keyframes popin {
0% {
-webkit-transform: scale(0);
transform: scale(0);
opacity: 0;
}

85% {
-webkit-transform: scale(1.05);
transform: scale(1.05);
opacity: 1;
}

100% {
-webkit-transform: scale(1);
transform: scale(1);
opacity: 1;
}
}
@-ms-keyframes popin {
0% {
-ms-transform: scale(0);
transform: scale(0);
opacity: 0;
}

85% {
-ms-transform: scale(1.05);
transform: scale(1.05);
opacity: 1;
}

100% {
-ms-transform: scale(1);
transform: scale(1);
opacity: 1;
}
}
@keyframes popin {
0% {
-webkit-transform: scale(0);
-ms-transform: scale(0);
transform: scale(0);
opacity: 0;
}

85% {
-webkit-transform: scale(1.05);
-ms-transform: scale(1.05);
transform: scale(1.05);
opacity: 1;
}

100% {
-webkit-transform: scale(1);
-ms-transform: scale(1);
transform: scale(1);
opacity: 1;
}
}
.videoReviewWrapper {
z-index: 999999;
position: absolute;
width: 900px;
top:0;
bottom:0;
left:0;
right:0;
background:#fff;
padding:15px;
height:fit-content;
height:-webkit-fit-content;
height:-moz-fit-content;
margin:auto;
}
section.bg-secondary.sec-padding.whyus-without-desc {
padding-top: 90px;
}

.videoReviewWrapper iframe {
height: 400px;
}
#videoReviewMain .videoReviewWrapper .videoDesc h3 {
color: #000;
font-size: 30px;
line-height: 1;
font-weight: 700;
}

#videoReviewMain .videoReviewWrapper .videoDesc .reviewBox {
border: 1px solid #ddd;
padding: 15px;
margin-bottom: 15px;
border-radius: 5px;
}

#videoReviewMain .videoReviewWrapper .videoDesc .reviewBox p {
color: #000;
font-size: 18px;
}

#videoReviewMain .videoReviewWrapper .videoDesc .reviewBox p:not(:last-child){
margin-bottom: 15px;
}
#videoReviewMain span.videpReviewCloseBtn {
right: 30px;
position: absolute;
top: 30px;
display: inline-block;
padding: 10px 20px;
-webkit-transition: 0.4s;
-moz-transition: 0.4s;
-o-transition: 0.4s;
transition: 0.4s;
font-size: 16px;
text-transform: uppercase;
font-weight: 600;
background: #fdbb33;
cursor: pointer;
z-index: 9999999999999;
border-radius: 5px;
}
.reviewVideoWrapper {
background:
url(https://i.ytimg.com/vi/Y7h4UzOisFY/sd2.jpg?sqp=-oaymwEoCIAFEOAD8quKqQMcGADwAQH4AeYCgALgA4oCDAgAEAEYZyBnKGcwDw==&rs=AOn4CLDcVX9tgSbSCY2OOmPu591SvJ5B7Q);
background-size: cover;
background-position: center;
background-repeat: no-repeat;
}
@media screen and (max-width:991px){
.videoReviewWrapper {
width: 500px;
}
.videoReviewWrapper iframe {
height: 300px;
}
}
@media screen and (max-width:500px){
.videoPopUpBox h4 {
font-size: 13px;
flex-wrap: wrap;
justify-content: center;
text-align: center;
}
.videoReviewWrapper {
width: 80%;
}
.videoReviewWrapper iframe {
height: 200px;
}
.videoPopUpBox h4 svg {
margin-bottom: 25px;
}
}
@endpush

@section('styles')
@if(isset($page['seo_tags']))
@foreach($page['seo_tags'] as $meta_name => $meta_content)
@if($meta_name != 'title')
<meta name="{{ $meta_name }}" content="{{ $meta_content }}" />
@endif
@endforeach
@endif
<meta property="og:title" content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Home' }}">
<meta property="twitter:title" content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Home' }}">
{{--    <meta property="og:description"--}}
{{--          content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'Home' }}">--}}
<meta property="og:description"
    content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'Home' }}">
<meta property="twitter:description"
    content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'Home' }}">
<meta property="og:image" content="{{ url('/images/promotions/'.env('PROMOTION_NAME').'/og-image-promotions.jpg') }}">
<meta property="twitter:image"
    content="{{ url('/images/promotions/'.env('PROMOTION_NAME').'/og-image-promotions.jpg') }}">
<!-- Meta Tags for Social Media -->
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="website" />
<meta property="og:site_name" content="OSHA Outreach Courses">
<meta property="fb:app_id" content="817832821974771" />
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ url()->current() }}">
<meta property="twitter:site" content="@OshaOutreach">

{{--    <script src="{{ asset("src/js/timer.js") }}"></script>--}}
<script>
function showEnrollLangModalHP(modalId) {
    $('body').addClass('modal-open');
    $('.shopperlink').hide();

    $('#' + modalId).fadeIn(250);
}
</script>
@endsection

@section('content')

<section class="home-banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-6">
                <div class="banner-desc">
                    <h1>
                        Premier OSHA Outreach Training Provider
                    </h1>
                    {{-- <p>
                        Spreading OSHA Safety Culture For More Than 15 Years! As The Top Provider Of OSHA Outreach
                        Courses,
                        We Are Committed To Providing Everyone With A Safe And Healthy Workplace.
                    </p> --}}
                    <div class="banner_points_and_btn_wrapper">
                    <div class="banner_points_wrapper">
                        {{-- <ul>
                            <li>OSHA DOL card delivered to your doorstep</li>
                            <li>Instant certificate upon course completion</li>
                            <li>Free Training on DEMO Course</li>
                            <li>Free LMS Access (Business & Personal)</li>
                            <li>One free course on checkout (Active Shooter / Human Trafficking)</li>
                            <li>Extraordinary discount on group enrollment</li>
                        </ul> --}}
                        <div class="banner_img_p_wrapper banner_points_mb">
                            <div class="banner_tic_img_wrapper">
                            <img src="{{ asset('/images/check-mark.png') }}">
                            </div>
                            <div class="banner_points_p_wrapper ">
{{--                            <p>OSHA DOL card delivered to your doorstep</p>--}}
                                <p>PLASTIC DOL CARD</p>
                            </div>
                            </div>

                            <div class="banner_img_p_wrapper banner_points_mb">
                            <div class="banner_tic_img_wrapper">
                                <img src="{{ asset('/images/check-mark.png') }}">
                            </div>
                            <div class="banner_points_p_wrapper">
{{--                            <p>Instant certificate upon course completion</p>--}}
                                <p>INSTANT CERTIFICATE</p>
                            </div>
                            </div>
                            <div class="banner_img_p_wrapper banner_points_mb">
                            <div class="banner_tic_img_wrapper">
                                <img src="{{ asset('/images/check-mark.png') }}">
                            </div>
                            <div class="banner_points_p_wrapper">
{{--                            <p>Free Training on DEMO Course </p>--}}
                                <p>FREE STUDY GUIDE </p>
                            </div>
                            </div>
                            <div class="banner_img_p_wrapper banner_points_mb">
                            <div class="banner_tic_img_wrapper">
                                <img src="{{ asset('/images/check-mark.png') }}">
                            </div>
                            <div class="banner_points_p_wrapper">
{{--                            <p>Free LMS Access (Business & Personal) </p>--}}
                                <p>BUY NOW PAY LATER </p>
                            </div>
                            </div>

                            <div class="banner_img_p_wrapper banner_points_mb">
                            <div class="banner_tic_img_wrapper">
                                <img src="{{ asset('/images/check-mark.png') }}">
                            </div>
                            <div class="banner_points_p_wrapper">
{{--                            <p>One free course on checkout (Active Shooter / Human Trafficking)</p>--}}
                                <p>ONE FREE COURSE AT CHECKOUT</p>
                            </div>
                            </div>
                            <div class="banner_img_p_wrapper ">
                            <div class="banner_tic_img_wrapper">
                                <img src="{{ asset('/images/check-mark.png') }}">
                            </div>
                            <div class="banner_points_p_wrapper">
{{--                            <p>Extraordinary discount on group enrollment</p>--}}
                                <p>GROUP DISCOUNT ON BULK</p>
                            </div>
                            </div>
                    </div>
{{--                    <div class="btn-wrapper">--}}
{{--                        <a href="{{ route('promotions')}}">--}}
{{--                            --}}{{-- View All Courses --}}
{{--                            START TRAINING--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                        <div class="home_banner_hsi_logo">--}}
{{--                            <img src="https://res.cloudinary.com/elearning-avenue24/image/upload/v1674123232/assets/oc_images/HSI-OSHA-Authorized-Training-Provider-Seal_v7xpum.png" alt="">--}}
{{--                        </div>--}}

                </div>
                </div>
            </div>
            {{-- <div class="col-12 col-md-12 col-lg-6 bannerImageWrapper_bg_color"> --}}
            <div class="col-12 col-md-12 col-lg-6 ">
                <div class="bannerImageWrapper">
{{--                    <a href="{{  url('/promotions')  }}" aria-label="Click here for Discounts on OSHA Courses">--}}
                        <div class="desktop_right_sec_home_banner">
                        {{-- <div class="sign_up_title_desc_wrapper">
                        <div class="sign_up_title_home_banner">
                            <h2>SIGN UP FOR <span class="sign_up_free_color"> <i>FREE</i> </span> TODAY
                            </h2>
                        </div>
                        <div>
                            <p>Experience The Most Trusted Osha Training Solution.
                            </p>
                        </div>
                    </div> --}}
                        <div class="home_banner_right_img_device">
                            {{-- <img src="/images/homepage-banner-desktop-device-img" alt=""> --}}
                            {{-- <img src="{{ asset('/images/homepage-banner-desktop-device-imgg.png') }}"
                            class="home_banner_right_img_device" alt=""> --}}
                        </div>
                    </div>
                        {{-- <img loading="lazy" src="{{ asset('/images/homeBannerImages/homepage-banner-desktop.webp') }}"
                            class="homeBannerDesktopImage" alt="Exclusive Discounts on OSHA Courses"> --}}
                        {{-- <img loading="lazy" src="{{ asset('/images/homepage-banner-desktop_price.webp') }}"
                            class="homeBannerDesktopImage" alt="Exclusive Discounts on OSHA Courses"> --}}

                        {{-- <img loading="lazy" src="{{ asset('/images/homepage-banner-desktop-right.png') }}"
                            class="homeBannerDesktopImage" alt="Exclusive Discounts on OSHA Courses"> --}}

                        {{-- <img loading="lazy" src="{{ asset('/images/homepage-banner-desktop-right.png') }}"
                            class="homeBannerTabImage" alt="Exclusive Discounts on OSHA Courses"> --}}

                            {{-- <img src="{{ asset('/images/homepage-banner-mobile-one.jpg') }}"
                               class="homeBannerMobImage" alt=""> --}}
                            {{-- <img src="{{ asset('/images/homepage-banner-mobile-two.jpg') }}"
                               class="homeBannerMobImage" alt=""> --}}
                        {{-- <img loading="lazy" src="{{ asset('/images/homepage-banner-desktop-720x323.jpg') }}"
                            class="homeBannerTabImage" alt="Exclusive Discounts on OSHA Courses"> --}}
                         {{-- <img src="{{ asset('/images/homepage-banner-mobile.jpg') }}"
                            class="homeBannerMobImage" alt=""> --}}

                    {{--start price osha10 $70 and osha30 $150--}}
                    <img loading="lazy" src="{{ asset('/images/homeBannerImages/homepage-banner-desktop.webp') }}"
                         class="homeBannerDesktopImage" alt="Exclusive Discounts on OSHA Courses">
                    <img loading="lazy" src="{{ asset('/images/homeBannerImages/homepage-banner-tab.webp') }}"
                         class="homeBannerTabImage" alt="Exclusive Discounts on OSHA Courses">
                    <img src="{{ asset('/images/homeBannerImages/Outreach-Homepage-Banner_500w$150-$70.webp') }}"
                         class="homeBannerMobImage" alt="">
                    {{--end price osha10 $70 and osha30 $150--}}

                    {{--start price osha10 $55 and osha30 $129--}}

{{--                            <img loading="lazy" src="{{ asset('/images/homeBannerImages/homepage-banner-desktop_price.webp') }}"--}}
{{--                            class="homeBannerDesktopImage" alt="Exclusive Discounts on OSHA Courses">--}}
{{--                        <img loading="lazy" src="{{ asset('/images/homeBannerImages/homepage-banner-tab-price.webp') }}"--}}
{{--                            class="homeBannerTabImage" alt="Exclusive Discounts on OSHA Courses">--}}
{{--                         <img src="{{ asset('/images/homeBannerImages/Outreach-Homepage-Banner_500w.webp') }}"--}}
{{--                            class="homeBannerMobImage" alt="">--}}
                    {{--end price osha10 $55 and osha30 $129--}}

                            {{-- <img src="{{ asset('/images/homeBannerImages/homepage-banner-mob-price.webp') }}"
                            class="homeBannerMobImage" alt=""> --}}


                            <div class="homeBannerMobImage">
                                {{-- <img loading="lazy" src="{{ asset('/images/homepage-banner-mobile.jpg') }}"
                                class="homeBannerTabImage" alt="Exclusive Discounts on OSHA Courses"> --}}

                            {{-- <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 320 296.6" style="enable-background:new 0 0 320 296.6;" xml:space="preserve">
                                <style type="text/css">
                                    .svgClass1{fill:#1583C4;}
                                    .svgClass2{fill:#FDBB11;}
                                    .svgClass3{fill:#EDEDED;}
                                    .svgClass4{fill:#FCFCFC;stroke:#1F1E1F;stroke-width:4;stroke-miterlimit:10;}
                                    .svgClass5{fill:none;stroke:#1F1E1F;stroke-width:4;stroke-miterlimit:10;}
                                    .svgClass6{fill:none;}
                                    .svgClass7{fill:#FCFCFC;}
                                    .svgClass8{fill:#1F1E1F;}
                                    .svgClass9{fill:#FFFFFF;}
                                    .svgClass10{fill:none;stroke:#1F1E1F;stroke-width:1.5;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                                    .svgClass20{clip-path:url(#SVGID_12_);fill:#1583C4;}
                                    .svgClass21{clip-path:url(#SVGID_12_);}
                                    .svgClass22{fill:#F4F4F4;}
                                    .svgClass23{clip-path:url(#SVGID_12_);fill:none;}
                                    .svgClass24{clip-path:url(#SVGID_14_);fill:#1583C4;}
                                    .svgClass25{clip-path:url(#SVGID_14_);}
                                    .svgClass26{clip-path:url(#SVGID_14_);fill:none;}
                                    .svgClass27{fill:#936616;}
                                    .svgClass28{clip-path:url(#SVGID_16_);fill:#1583C4;}
                                    .svgClass29{clip-path:url(#SVGID_16_);}
                                    .svgClass30{clip-path:url(#SVGID_16_);fill:none;}
                                    .svgClass31{clip-path:url(#SVGID_18_);fill:#1583C4;}
                                    .svgClass32{clip-path:url(#SVGID_18_);}
                                    .svgClass33{clip-path:url(#SVGID_18_);fill:none;}
                                    .svgClass34{clip-path:url(#SVGID_20_);fill:#1583C4;}
                                    .svgClass35{clip-path:url(#SVGID_20_);}
                                    .svgClass36{clip-path:url(#SVGID_20_);fill:none;}
                                </style>
                                <g id="BACKGROUND">
                                </g>
                                <g id="OBJECTS">
                                    <g>
                                        <defs>
                                            <rect id="SVGID_11_" x="-564.1" y="390.7" width="328.5" height="893.7"/>
                                        </defs>
                                        <clipPath id="SVGID_2_">
                                            <use xlink:href="#SVGID_11_" style="overflow:visible;"/>
                                        </clipPath>
                                        <path style="clip-path:url(#SVGID_2_);fill:#1583C4;" d="M-129.2,867.2L-129.2,867.2c-179.6,0-325.1-145.6-325.1-325.1v0    c0-179.6,145.6-325.1,325.1-325.1h0c179.6,0,325.1,145.6,325.1,325.1v0C195.9,721.6,50.3,867.2-129.2,867.2z"/>
                                    </g>
                                    <g>
                                        <defs>
                                            <rect id="SVGID_13_" x="-4.3" y="-3" width="328.5" height="302.5"/>
                                        </defs>
                                        <clipPath id="SVGID_4_">
                                            <use xlink:href="#SVGID_13_" style="overflow:visible;"/>
                                        </clipPath>
                                        <path style="clip-path:url(#SVGID_4_);fill:#1583C4;" d="M430.6,473.4L430.6,473.4c-179.6,0-325.1-145.6-325.1-325.1v0    c0-179.6,145.6-325.1,325.1-325.1h0c179.6,0,325.1,145.6,325.1,325.1v0C755.7,327.9,610.1,473.4,430.6,473.4z"/>
                                        <g style="clip-path:url(#SVGID_4_);">
                                            <path class="svgClass22" d="M304.3,248.2c0,9.9-8,17.9-17.9,17.9H35.3c-9.9,0-17.9-8-17.9-17.9V33.6c0-9.9,8-17.9,17.9-17.9h251.1     c9.9,0,17.9,8,17.9,17.9V248.2z"/>
                                        </g>
                                        <rect x="-113.4" y="-3.6" style="clip-path:url(#SVGID_4_);fill:none;" width="500.9" height="500.9"/>
                                        <rect x="-113.4" y="-5.3" style="clip-path:url(#SVGID_4_);fill:none;" width="626.1" height="331.3"/>
                                        <rect x="-113.4" y="-4.6" style="clip-path:url(#SVGID_4_);fill:none;" width="626.1" height="328.7"/>
                                        <g style="clip-path:url(#SVGID_4_);">
                                            <polygon class="svgClass2" points="254.4,263.2 269.9,247.1 254.6,247.1 65.2,247.1 50.1,247.1 65,263.3 65,263.4 50.1,279.5      65.2,279.5 254.6,279.5 269.9,279.5 254.4,263.3    "/>
                                            <g>
                                                <path d="M84.4,258.7h1.8v9.1h-2.1v-6.9l-1.6,0.4l-0.5-1.8L84.4,258.7z"/>
                                                <path d="M93.9,266.7c-0.7,0.9-1.6,1.3-2.7,1.3s-2.1-0.4-2.7-1.3s-1-2-1-3.4c0-1.4,0.3-2.6,1-3.5s1.6-1.3,2.7-1.3      s2.1,0.4,2.7,1.3c0.7,0.9,1,2,1,3.5C94.9,264.7,94.6,265.8,93.9,266.7z M89.6,263.2c0,1.8,0.5,2.7,1.6,2.7s1.6-0.9,1.6-2.7      s-0.5-2.7-1.6-2.7S89.6,261.4,89.6,263.2z"/>
                                                <path d="M102.2,266.7c-0.7,0.9-1.6,1.3-2.7,1.3s-2.1-0.4-2.7-1.3s-1-2-1-3.4c0-1.4,0.3-2.6,1-3.5s1.6-1.3,2.7-1.3      s2.1,0.4,2.7,1.3c0.7,0.9,1,2,1,3.5C103.1,264.7,102.8,265.8,102.2,266.7z M97.8,263.2c0,1.8,0.5,2.7,1.6,2.7s1.6-0.9,1.6-2.7      s-0.5-2.7-1.6-2.7S97.8,261.4,97.8,263.2z"/>
                                                <path d="M107.7,262.3c-0.4,0.4-1,0.6-1.6,0.6s-1.2-0.2-1.6-0.6s-0.7-1-0.7-1.6c0-0.6,0.2-1.1,0.7-1.6s1-0.6,1.6-0.6      s1.2,0.2,1.6,0.6s0.6,0.9,0.6,1.6C108.3,261.3,108.1,261.8,107.7,262.3z M104.9,266.4l5.9-6.5l0.9,0.5l-5.9,6.5L104.9,266.4z       M105.6,261.2c0.1,0.1,0.3,0.2,0.5,0.2s0.4-0.1,0.5-0.2s0.2-0.3,0.2-0.5c0-0.2-0.1-0.4-0.2-0.5c-0.1-0.1-0.3-0.2-0.5-0.2      c-0.2,0-0.4,0.1-0.5,0.2c-0.1,0.1-0.2,0.3-0.2,0.5C105.4,260.9,105.4,261.1,105.6,261.2z M112.3,267.3c-0.4,0.4-1,0.6-1.6,0.6      c-0.6,0-1.2-0.2-1.6-0.6c-0.4-0.4-0.7-1-0.7-1.6s0.2-1.1,0.7-1.6c0.4-0.4,1-0.6,1.6-0.6c0.6,0,1.2,0.2,1.6,0.6      c0.4,0.4,0.6,1,0.6,1.6S112.8,266.9,112.3,267.3z M110.2,266.2c0.1,0.1,0.3,0.2,0.5,0.2s0.4-0.1,0.5-0.2s0.2-0.3,0.2-0.5      c0-0.2-0.1-0.4-0.2-0.5c-0.1-0.1-0.3-0.2-0.5-0.2c-0.2,0-0.4,0.1-0.5,0.2c-0.1,0.1-0.2,0.3-0.2,0.5S110.1,266.1,110.2,266.2z"/>
                                                <path d="M125.3,266.6c-0.9,0.9-2,1.4-3.4,1.4c-1.3,0-2.4-0.5-3.4-1.4c-0.9-0.9-1.4-2-1.4-3.4c0-1.3,0.5-2.5,1.4-3.4      c0.9-0.9,2-1.4,3.4-1.4c1.3,0,2.4,0.5,3.4,1.4s1.4,2,1.4,3.4C126.6,264.6,126.2,265.7,125.3,266.6z M120,265.2      c0.5,0.5,1.1,0.8,1.9,0.8c0.8,0,1.4-0.3,1.9-0.8s0.8-1.2,0.8-2c0-0.8-0.3-1.5-0.8-2c-0.5-0.5-1.1-0.8-1.9-0.8      c-0.8,0-1.4,0.3-1.9,0.8c-0.5,0.5-0.8,1.2-0.8,2C119.2,264,119.5,264.7,120,265.2z"/>
                                                <path d="M133.4,260.7h-3.5v1.8h3.4v2h-3.4v3.4h-2.1v-9.1h5.5V260.7z"/>
                                                <path d="M140.1,260.7h-3.5v1.8h3.4v2h-3.4v3.4h-2.1v-9.1h5.5V260.7z"/>
                                                <path d="M141.4,258.7h2.1v9.1h-2.1V258.7z"/>
                                                <path d="M149.4,268c-1.4,0-2.5-0.5-3.4-1.4c-0.9-0.9-1.3-2-1.3-3.4c0-1.3,0.4-2.5,1.3-3.4c0.9-0.9,2-1.4,3.4-1.4      c0.8,0,1.6,0.2,2.3,0.6c0.7,0.4,1.2,0.9,1.6,1.5l-1.8,1c-0.2-0.4-0.5-0.6-0.9-0.8c-0.4-0.2-0.8-0.3-1.3-0.3      c-0.8,0-1.5,0.2-1.9,0.7c-0.5,0.5-0.7,1.2-0.7,2s0.2,1.5,0.7,2c0.5,0.5,1.1,0.7,1.9,0.7c0.5,0,0.9-0.1,1.3-0.3      c0.4-0.2,0.7-0.5,0.9-0.8l1.8,1c-0.4,0.7-0.9,1.2-1.6,1.5C151,267.8,150.2,268,149.4,268z"/>
                                                <path d="M154.3,258.7h2.1v9.1h-2.1V258.7z"/>
                                                <path d="M163.7,267.8l-0.5-1.4h-3.4l-0.5,1.4h-2.3l3.1-9.1h2.7l3.1,9.1H163.7z M160.5,264.4h2.1l-1.1-3.4L160.5,264.4z"/>
                                                <path d="M168.9,265.8h3.3v2h-5.3v-9.1h2.1V265.8z"/>
                                                <path d="M180,258.7c1.3,0,2.3,0.4,3.2,1.3s1.3,2,1.3,3.3c0,1.3-0.4,2.4-1.3,3.3s-1.9,1.3-3.2,1.3h-3.7v-9.1H180z M180,265.8      c0.7,0,1.3-0.2,1.8-0.7c0.4-0.5,0.7-1.1,0.7-1.9c0-0.8-0.2-1.4-0.7-1.9c-0.4-0.5-1-0.7-1.8-0.7h-1.6v5.1H180z"/>
                                                <path d="M193.3,266.6c-0.9,0.9-2,1.4-3.4,1.4c-1.3,0-2.4-0.5-3.4-1.4c-0.9-0.9-1.4-2-1.4-3.4c0-1.3,0.5-2.5,1.4-3.4      c0.9-0.9,2-1.4,3.4-1.4c1.3,0,2.4,0.5,3.4,1.4s1.4,2,1.4,3.4C194.7,264.6,194.2,265.7,193.3,266.6z M188.1,265.2      c0.5,0.5,1.1,0.8,1.9,0.8c0.8,0,1.4-0.3,1.9-0.8s0.8-1.2,0.8-2c0-0.8-0.3-1.5-0.8-2c-0.5-0.5-1.1-0.8-1.9-0.8      c-0.8,0-1.4,0.3-1.9,0.8c-0.5,0.5-0.8,1.2-0.8,2C187.3,264,187.5,264.7,188.1,265.2z"/>
                                                <path d="M198,265.8h3.3v2h-5.3v-9.1h2.1V265.8z"/>
                                                <path d="M209.7,268c-1.4,0-2.5-0.5-3.4-1.4c-0.9-0.9-1.3-2-1.3-3.4c0-1.3,0.4-2.5,1.3-3.4c0.9-0.9,2-1.4,3.4-1.4      c0.8,0,1.6,0.2,2.3,0.6c0.7,0.4,1.2,0.9,1.6,1.5l-1.8,1c-0.2-0.4-0.5-0.6-0.9-0.8c-0.4-0.2-0.8-0.3-1.3-0.3      c-0.8,0-1.5,0.2-1.9,0.7c-0.5,0.5-0.7,1.2-0.7,2s0.2,1.5,0.7,2c0.5,0.5,1.1,0.7,1.9,0.7c0.5,0,0.9-0.1,1.3-0.3      c0.4-0.2,0.7-0.5,0.9-0.8l1.8,1c-0.4,0.7-0.9,1.2-1.6,1.5C211.3,267.8,210.6,268,209.7,268z"/>
                                                <path d="M220.4,267.8l-0.5-1.4h-3.4l-0.5,1.4h-2.3l3.1-9.1h2.7l3.1,9.1H220.4z M217.2,264.4h2.1l-1.1-3.4L217.2,264.4z"/>
                                                <path d="M228.3,267.8l-1.7-3h-1v3h-2.1v-9.1h3.7c0.9,0,1.6,0.3,2.2,0.9c0.6,0.6,0.9,1.3,0.9,2.2c0,0.6-0.2,1.1-0.5,1.5      c-0.3,0.5-0.7,0.8-1.2,1.1l1.9,3.4H228.3z M225.6,260.6v2.3h1.6c0.3,0,0.5-0.1,0.7-0.3c0.2-0.2,0.3-0.5,0.3-0.8      c0-0.3-0.1-0.6-0.3-0.8c-0.2-0.2-0.5-0.3-0.7-0.3H225.6z"/>
                                                <path d="M235.2,258.7c1.3,0,2.3,0.4,3.2,1.3s1.3,2,1.3,3.3c0,1.3-0.4,2.4-1.3,3.3s-1.9,1.3-3.2,1.3h-3.7v-9.1H235.2z       M235.2,265.8c0.7,0,1.3-0.2,1.8-0.7c0.4-0.5,0.7-1.1,0.7-1.9c0-0.8-0.2-1.4-0.7-1.9c-0.4-0.5-1-0.7-1.8-0.7h-1.6v5.1H235.2z"/>
                                            </g>
                                            <circle cx="74.9" cy="263.3" r="1.6"/>
                                            <circle cx="247" cy="263.3" r="1.6"/>
                                        </g>
                                        <g style="clip-path:url(#SVGID_4_);">
                                            <g>
                                                <g>
                                                    <path class="svgClass8" d="M179.2,50.2c-0.9,0.9-2.1,1.4-3.4,1.4s-2.5-0.5-3.4-1.4c-0.9-0.9-1.4-2.1-1.4-3.4c0-1.3,0.5-2.5,1.4-3.4       s2.1-1.4,3.4-1.4s2.5,0.5,3.4,1.4c0.9,0.9,1.4,2.1,1.4,3.4C180.6,48.1,180.1,49.3,179.2,50.2z M173.2,49.4c0.7,0.7,1.5,1,2.6,1       s1.9-0.3,2.6-1s1-1.6,1-2.6c0-1-0.3-1.9-1-2.6c-0.7-0.7-1.5-1-2.6-1s-1.9,0.3-2.6,1c-0.7,0.7-1,1.6-1,2.6       C172.1,47.8,172.5,48.7,173.2,49.4z"/>
                                                    <path class="svgClass8" d="M184.7,51.6c-0.9,0-1.6-0.2-2.2-0.6c-0.6-0.4-1-1-1.3-1.7l1.1-0.6c0.4,1.1,1.2,1.7,2.5,1.7       c0.6,0,1.1-0.1,1.5-0.4s0.5-0.6,0.5-1c0-0.4-0.2-0.8-0.5-1s-0.9-0.5-1.7-0.7c-0.4-0.1-0.7-0.2-0.9-0.3s-0.5-0.2-0.8-0.3       c-0.3-0.2-0.5-0.3-0.7-0.5c-0.2-0.2-0.3-0.4-0.4-0.6c-0.1-0.3-0.2-0.6-0.2-0.9c0-0.8,0.3-1.4,0.9-1.9c0.6-0.5,1.3-0.7,2.1-0.7       c0.7,0,1.4,0.2,1.9,0.6c0.5,0.4,1,0.9,1.2,1.5l-1,0.6c-0.4-1-1.1-1.4-2.1-1.4c-0.5,0-0.9,0.1-1.2,0.4c-0.3,0.2-0.5,0.6-0.5,1       c0,0.4,0.1,0.7,0.4,0.9c0.3,0.2,0.8,0.4,1.5,0.7c0.3,0.1,0.4,0.1,0.5,0.2s0.3,0.1,0.5,0.2c0.2,0.1,0.4,0.2,0.5,0.2       s0.2,0.1,0.4,0.2c0.2,0.1,0.3,0.2,0.4,0.3c0.1,0.1,0.2,0.2,0.3,0.3c0.1,0.1,0.2,0.3,0.3,0.4c0.1,0.1,0.1,0.3,0.1,0.5       s0.1,0.4,0.1,0.6c0,0.8-0.3,1.5-0.9,1.9C186.5,51.4,185.7,51.6,184.7,51.6z"/>
                                                    <path class="svgClass8" d="M195.1,42.1h1.2v9.3h-1.2v-4.2h-4.5v4.2h-1.2v-9.3h1.2v4h4.5V42.1z"/>
                                                    <path class="svgClass8" d="M204.5,51.4l-0.8-2.1h-4.2l-0.8,2.1h-1.3l3.5-9.3h1.4l3.5,9.3H204.5z M199.9,48.2h3.3l-1.7-4.6L199.9,48.2       z"/>
                                                    <path class="svgClass8" d="M175.4,58.6c0.6,0.2,1.1,0.5,1.4,1c0.4,0.5,0.5,1,0.5,1.6c0,1-0.3,1.7-1,2.3c-0.7,0.6-1.5,0.8-2.4,0.8       c-0.7,0-1.4-0.2-2-0.5c-0.6-0.3-1-0.8-1.3-1.5l1.8-1.1c0.2,0.7,0.7,1,1.4,1c0.4,0,0.7-0.1,0.9-0.3c0.2-0.2,0.3-0.4,0.3-0.7       c0-0.3-0.1-0.5-0.3-0.7s-0.5-0.3-0.9-0.3h-0.4l-0.8-1.2l1.7-2.1H171v-2h6v1.7L175.4,58.6z"/>
                                                    <path class="svgClass8" d="M184.7,63c-0.7,0.9-1.6,1.3-2.8,1.3c-1.2,0-2.1-0.4-2.8-1.3s-1-2.1-1-3.5s0.3-2.6,1-3.5s1.6-1.3,2.8-1.3       c1.2,0,2.1,0.4,2.8,1.3s1,2.1,1,3.5S185.4,62.2,184.7,63z M180.3,59.5c0,1.8,0.6,2.8,1.7,2.8c1.1,0,1.7-0.9,1.7-2.8       s-0.6-2.8-1.7-2.8C180.8,56.8,180.3,57.7,180.3,59.5z"/>
                                                    <path class="svgClass8" d="M195.3,54.9h2.1v9.3h-2.1v-3.7h-2.9v3.7h-2.1v-9.3h2.1v3.6h2.9V54.9z"/>
                                                    <path class="svgClass8" d="M206.9,63c-0.9,0.9-2.1,1.4-3.4,1.4S201,63.9,200,63s-1.4-2.1-1.4-3.4s0.5-2.5,1.4-3.4s2.1-1.4,3.4-1.4       s2.5,0.5,3.4,1.4s1.4,2.1,1.4,3.4S207.8,62,206.9,63z M201.5,61.5c0.5,0.5,1.2,0.8,1.9,0.8c0.8,0,1.4-0.3,1.9-0.8       c0.5-0.5,0.8-1.2,0.8-2s-0.3-1.5-0.8-2c-0.5-0.5-1.2-0.8-1.9-0.8c-0.8,0-1.4,0.3-1.9,0.8c-0.5,0.5-0.8,1.2-0.8,2       S201,61,201.5,61.5z"/>
                                                    <path class="svgClass8" d="M215.6,63.5c-0.7,0.6-1.5,0.9-2.6,0.9s-1.9-0.3-2.6-0.9c-0.7-0.6-1-1.4-1-2.3v-6.3h2.1V61       c0,0.9,0.5,1.3,1.5,1.3c1,0,1.5-0.4,1.5-1.3v-6.1h2.1v6.3C216.6,62.1,216.2,62.9,215.6,63.5z"/>
                                                    <path class="svgClass8" d="M223,64.2l-1.8-3.1h-1v3.1h-2.1v-9.3h3.7c0.9,0,1.6,0.3,2.3,0.9s0.9,1.4,0.9,2.3c0,0.6-0.2,1.1-0.5,1.6       c-0.3,0.5-0.7,0.9-1.2,1.1l2,3.4H223z M220.2,56.9v2.4h1.6c0.3,0,0.5-0.1,0.8-0.3c0.2-0.2,0.3-0.5,0.3-0.9       c0-0.3-0.1-0.6-0.3-0.9c-0.2-0.2-0.5-0.3-0.8-0.3H220.2z"/>
                                                </g>
                                                <g>
                                                    <g>
                                                        <g>
                                                            <path class="svgClass7" d="M263.3,87.7h-92.5c-0.8,0-1.4-0.6-1.4-1.4V70.2c0-0.6,0.5-1,1-1h98.1c0.6,0,1,0.5,1,1v11.3         C269.4,84.9,266.7,87.7,263.3,87.7z"/>
                                                        </g>
                                                        <g>
                                                            <path class="svgClass8" d="M263.3,88.5h-92.5c-1.2,0-2.2-1-2.2-2.2V70.2c0-1,0.8-1.8,1.8-1.8h98.1c1,0,1.8,0.8,1.8,1.8v11.3         C270.3,85.4,267.1,88.5,263.3,88.5z M170.4,70c-0.1,0-0.2,0.1-0.2,0.2v16.1c0,0.3,0.3,0.6,0.6,0.6h92.5c3,0,5.4-2.4,5.4-5.4         V70.2c0-0.1-0.1-0.2-0.2-0.2H170.4z"/>
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <path class="svgClass1" d="M179.2,81.6c-0.9,0-1.6-0.3-2.2-0.9s-0.9-1.3-0.9-2.2s0.3-1.6,0.9-2.2c0.6-0.6,1.3-0.9,2.2-0.9        c0.5,0,1,0.1,1.5,0.4c0.5,0.2,0.8,0.6,1.1,1l-1.2,0.7c-0.1-0.2-0.3-0.4-0.6-0.5c-0.2-0.1-0.5-0.2-0.8-0.2        c-0.5,0-1,0.2-1.3,0.5c-0.3,0.3-0.5,0.8-0.5,1.3s0.2,1,0.5,1.3c0.3,0.3,0.7,0.5,1.3,0.5c0.3,0,0.6-0.1,0.8-0.2        c0.2-0.1,0.4-0.3,0.6-0.5l1.2,0.7c-0.3,0.4-0.6,0.8-1.1,1C180.3,81.5,179.8,81.6,179.2,81.6z"/>
                                                        <path class="svgClass1" d="M189.3,80.7c-0.6,0.6-1.3,0.9-2.2,0.9c-0.9,0-1.6-0.3-2.2-0.9c-0.6-0.6-0.9-1.3-0.9-2.2        c0-0.9,0.3-1.6,0.9-2.2c0.6-0.6,1.3-0.9,2.2-0.9c0.9,0,1.6,0.3,2.2,0.9c0.6,0.6,0.9,1.3,0.9,2.2        C190.2,79.3,189.9,80.1,189.3,80.7z M185.8,79.7c0.3,0.3,0.7,0.5,1.2,0.5c0.5,0,0.9-0.2,1.2-0.5s0.5-0.8,0.5-1.3        c0-0.5-0.2-1-0.5-1.3s-0.8-0.5-1.2-0.5c-0.5,0-0.9,0.2-1.2,0.5s-0.5,0.8-0.5,1.3C185.3,79,185.5,79.4,185.8,79.7z"/>
                                                        <path class="svgClass1" d="M196.2,75.5h1.4v6h-1l-2.3-3.3v3.3h-1.4v-6h1l2.3,3.3V75.5z"/>
                                                        <path class="svgClass1" d="M202.5,81.6c-0.6,0-1.1-0.1-1.5-0.4s-0.7-0.6-0.9-1.1l1.2-0.7c0.2,0.6,0.7,0.8,1.3,0.8        c0.5,0,0.8-0.2,0.8-0.5c0-0.2-0.1-0.3-0.3-0.4c-0.2-0.1-0.5-0.2-1-0.3c-0.3-0.1-0.5-0.1-0.7-0.2s-0.4-0.2-0.6-0.3        c-0.2-0.1-0.3-0.3-0.4-0.5c-0.1-0.2-0.1-0.5-0.1-0.7c0-0.6,0.2-1,0.6-1.3s0.9-0.5,1.4-0.5c0.5,0,0.9,0.1,1.3,0.3        c0.4,0.2,0.7,0.6,0.9,1l-1.2,0.7c-0.1-0.2-0.2-0.4-0.4-0.5s-0.4-0.2-0.6-0.2c-0.2,0-0.4,0-0.5,0.1c-0.1,0.1-0.2,0.2-0.2,0.3        c0,0.1,0.1,0.3,0.2,0.4s0.4,0.2,0.9,0.4c0.2,0.1,0.4,0.1,0.6,0.2c0.1,0,0.3,0.1,0.5,0.2c0.2,0.1,0.4,0.2,0.5,0.3        c0.1,0.1,0.2,0.3,0.3,0.5c0.1,0.2,0.1,0.4,0.1,0.7c0,0.6-0.2,1-0.6,1.3C203.7,81.4,203.2,81.6,202.5,81.6z"/>
                                                        <path class="svgClass1" d="M211.1,75.5v1.3h-1.5v4.7h-1.4v-4.7h-1.5v-1.3H211.1z"/>
                                                        <path class="svgClass1" d="M216.7,81.5l-1.1-2H215v2h-1.4v-6h2.4c0.6,0,1.1,0.2,1.5,0.6s0.6,0.9,0.6,1.5c0,0.4-0.1,0.7-0.3,1        c-0.2,0.3-0.5,0.6-0.8,0.7l1.3,2.2H216.7z M215,76.7v1.5h1c0.2,0,0.3-0.1,0.5-0.2c0.1-0.1,0.2-0.3,0.2-0.5        c0-0.2-0.1-0.4-0.2-0.5c-0.1-0.1-0.3-0.2-0.5-0.2H215z"/>
                                                        <path class="svgClass1" d="M224.6,81c-0.4,0.4-1,0.6-1.7,0.6c-0.7,0-1.2-0.2-1.7-0.6c-0.4-0.4-0.7-0.9-0.7-1.5v-4.1h1.4v3.9        c0,0.6,0.3,0.8,0.9,0.8s0.9-0.3,0.9-0.8v-3.9h1.4v4.1C225.3,80.1,225.1,80.6,224.6,81z"/>
                                                        <path class="svgClass1" d="M231,81.6c-0.9,0-1.6-0.3-2.2-0.9s-0.9-1.3-0.9-2.2s0.3-1.6,0.9-2.2c0.6-0.6,1.3-0.9,2.2-0.9        c0.5,0,1,0.1,1.5,0.4c0.5,0.2,0.8,0.6,1.1,1l-1.2,0.7c-0.1-0.2-0.3-0.4-0.6-0.5c-0.2-0.1-0.5-0.2-0.8-0.2        c-0.5,0-1,0.2-1.3,0.5c-0.3,0.3-0.5,0.8-0.5,1.3s0.2,1,0.5,1.3c0.3,0.3,0.7,0.5,1.3,0.5c0.3,0,0.6-0.1,0.8-0.2        c0.2-0.1,0.4-0.3,0.6-0.5l1.2,0.7c-0.3,0.4-0.6,0.8-1.1,1C232,81.5,231.5,81.6,231,81.6z"/>
                                                        <path class="svgClass1" d="M240.1,75.5v1.3h-1.5v4.7h-1.4v-4.7h-1.5v-1.3H240.1z"/>
                                                        <path class="svgClass1" d="M242.6,75.5h1.4v6h-1.4V75.5z"/>
                                                        <path class="svgClass1" d="M252,80.7c-0.6,0.6-1.3,0.9-2.2,0.9c-0.9,0-1.6-0.3-2.2-0.9c-0.6-0.6-0.9-1.3-0.9-2.2        c0-0.9,0.3-1.6,0.9-2.2c0.6-0.6,1.3-0.9,2.2-0.9c0.9,0,1.6,0.3,2.2,0.9c0.6,0.6,0.9,1.3,0.9,2.2        C252.9,79.3,252.6,80.1,252,80.7z M248.5,79.7c0.3,0.3,0.7,0.5,1.2,0.5c0.5,0,0.9-0.2,1.2-0.5s0.5-0.8,0.5-1.3        c0-0.5-0.2-1-0.5-1.3s-0.8-0.5-1.2-0.5c-0.5,0-0.9,0.2-1.2,0.5s-0.5,0.8-0.5,1.3C248,79,248.2,79.4,248.5,79.7z"/>
                                                        <path class="svgClass1" d="M258.9,75.5h1.4v6h-1l-2.3-3.3v3.3h-1.4v-6h1l2.3,3.3V75.5z"/>
                                                    </g>
                                                </g>
                                                <g>
                                                    <path class="svgClass2" d="M276.6,71.4H229V41.8h58.5v18.7C287.5,66.5,282.6,71.4,276.6,71.4z"/>
                                                    <g>
                                                        <path class="svgClass8" d="M277.6,72.3h-46.2c-1.7,0-3.1-1.4-3.1-3.1V43.4c0-1.3,1.1-2.4,2.4-2.4h55.1c1.3,0,2.4,1.1,2.4,2.4v18.1        C288.3,67.5,283.5,72.3,277.6,72.3z M230.8,42.7c-0.4,0-0.8,0.3-0.8,0.8v25.8c0,0.8,0.6,1.4,1.4,1.4h46.2c5,0,9.1-4.1,9.1-9.1        V43.4c0-0.4-0.3-0.8-0.8-0.8H230.8z"/>
                                                    </g>
                                                    <g>
                                                        <path class="svgClass8" d="M248.7,56.2c0,1.1-0.3,2-1,2.6s-1.6,1.1-2.6,1.2v1.6h-1.2v-1.6c-1-0.1-1.9-0.4-2.6-0.9s-1.2-1.2-1.6-2        l2.5-1.4c0.4,0.9,0.9,1.4,1.7,1.5v-2.5c0,0-0.1,0-0.1,0c-0.1,0-0.1,0-0.1,0c-0.4-0.2-0.7-0.3-1-0.4c-0.3-0.1-0.6-0.3-0.9-0.5        s-0.6-0.5-0.8-0.7s-0.4-0.6-0.5-1c-0.1-0.4-0.2-0.8-0.2-1.3c0-1.1,0.4-2,1.1-2.6s1.6-1,2.6-1.1v-1.6h1.2v1.6        c1.7,0.2,2.8,1.1,3.5,2.6l-2.4,1.4c-0.2-0.6-0.6-1-1.1-1.2v2.4c0.1,0,0.3,0.1,0.6,0.2s0.6,0.2,0.7,0.3c0.1,0,0.3,0.1,0.6,0.3        c0.3,0.1,0.5,0.3,0.6,0.4c0.1,0.1,0.3,0.3,0.5,0.5s0.3,0.4,0.4,0.6c0.1,0.2,0.2,0.4,0.2,0.7C248.7,55.6,248.7,55.9,248.7,56.2        z M243,50.8c0,0.4,0.3,0.7,0.8,1v-1.9C243.3,50.1,243,50.4,243,50.8z M245.1,57.2c0.5-0.1,0.8-0.5,0.8-0.9        c0-0.4-0.3-0.7-0.8-1V57.2z"/>
                                                        <path class="svgClass8" d="M252.5,47.3h2.5v12.5h-2.9v-9.5l-2.2,0.6l-0.7-2.4L252.5,47.3z"/>
                                                        <path class="svgClass8" d="M261.3,51.7c1.2,0,2.2,0.4,3.1,1.1c0.8,0.7,1.2,1.8,1.2,3.1c0,1.3-0.4,2.3-1.3,3.1        c-0.9,0.7-2,1.1-3.2,1.1c-1,0-1.9-0.2-2.7-0.7c-0.8-0.4-1.4-1.1-1.7-2l2.5-1.4c0.3,0.9,1,1.3,2,1.3c0.6,0,1-0.1,1.3-0.4        c0.3-0.3,0.4-0.6,0.4-1s-0.1-0.7-0.4-1c-0.3-0.3-0.7-0.4-1.2-0.4h-3.9l0.5-7.2h7.2V50h-4.5l-0.1,1.7H261.3z"/>
                                                        <path class="svgClass8" d="M275.3,58.3c-0.9,1.2-2.1,1.8-3.7,1.8s-2.8-0.6-3.7-1.8c-0.9-1.2-1.3-2.8-1.3-4.7c0-2,0.4-3.5,1.3-4.7        c0.9-1.2,2.1-1.8,3.7-1.8s2.8,0.6,3.7,1.8c0.9,1.2,1.3,2.8,1.3,4.7C276.7,55.6,276.2,57.1,275.3,58.3z M269.4,53.6        c0,2.5,0.7,3.7,2.2,3.7s2.2-1.2,2.2-3.7s-0.7-3.7-2.2-3.7S269.4,51.1,269.4,53.6z"/>
                                                    </g>
                                                    <g>
                                                        <path class="svgClass27" d="M254.7,66.7c0,0.4-0.1,0.8-0.4,1c-0.3,0.3-0.6,0.4-1,0.5v0.6h-0.5v-0.6c-0.4,0-0.7-0.1-1-0.3        c-0.3-0.2-0.5-0.5-0.6-0.8l1-0.6c0.1,0.3,0.4,0.5,0.7,0.6v-1c0,0,0,0,0,0c0,0,0,0,0,0c-0.1-0.1-0.3-0.1-0.4-0.2        s-0.2-0.1-0.3-0.2c-0.1-0.1-0.2-0.2-0.3-0.3c-0.1-0.1-0.1-0.2-0.2-0.4c-0.1-0.1-0.1-0.3-0.1-0.5c0-0.4,0.1-0.8,0.4-1        c0.3-0.2,0.6-0.4,1-0.4v-0.6h0.5v0.6c0.7,0.1,1.1,0.4,1.4,1l-0.9,0.6c-0.1-0.2-0.2-0.4-0.4-0.5v0.9c0,0,0.1,0,0.2,0.1        c0.1,0.1,0.2,0.1,0.3,0.1c0,0,0.1,0.1,0.2,0.1c0.1,0.1,0.2,0.1,0.2,0.2s0.1,0.1,0.2,0.2c0.1,0.1,0.1,0.2,0.2,0.2        c0,0.1,0.1,0.2,0.1,0.3C254.7,66.4,254.7,66.5,254.7,66.7z M252.4,64.5c0,0.1,0.1,0.3,0.3,0.4v-0.7        C252.5,64.2,252.4,64.4,252.4,64.5z M253.2,67c0.2-0.1,0.3-0.2,0.3-0.4c0-0.2-0.1-0.3-0.3-0.4V67z"/>
                                                        <path class="svgClass27" d="M256.2,63.2h1v4.9H256v-3.7l-0.9,0.2l-0.3-1L256.2,63.2z"/>
                                                        <path class="svgClass27" d="M260.8,65.5c0.4,0.3,0.6,0.7,0.6,1.2c0,0.5-0.2,0.8-0.5,1.1c-0.3,0.3-0.8,0.4-1.3,0.4s-1-0.1-1.3-0.4        c-0.3-0.3-0.5-0.6-0.5-1.1c0-0.5,0.2-0.9,0.6-1.2c-0.3-0.2-0.5-0.6-0.5-1c0-0.5,0.2-0.8,0.5-1.1c0.3-0.3,0.7-0.4,1.2-0.4        c0.5,0,0.9,0.1,1.2,0.4c0.3,0.3,0.5,0.6,0.5,1.1C261.3,64.9,261.1,65.3,260.8,65.5z M259.1,67c0.1,0.1,0.3,0.2,0.5,0.2        s0.4-0.1,0.5-0.2s0.2-0.2,0.2-0.4s-0.1-0.3-0.2-0.4s-0.3-0.2-0.5-0.2s-0.4,0.1-0.5,0.2c-0.1,0.1-0.2,0.2-0.2,0.4        S259,66.9,259.1,67z M260,64.3c-0.1-0.1-0.2-0.1-0.4-0.1c-0.2,0-0.3,0-0.4,0.1c-0.1,0.1-0.1,0.2-0.1,0.3c0,0.1,0,0.3,0.1,0.3        c0.1,0.1,0.2,0.1,0.4,0.1c0.2,0,0.3,0,0.4-0.1c0.1-0.1,0.1-0.2,0.1-0.3C260.1,64.5,260.1,64.3,260,64.3z"/>
                                                        <path class="svgClass27" d="M265.4,64.8c0,0.4-0.1,0.7-0.3,1l-1.5,2.3h-1.3l1.1-1.5c-0.5,0-0.9-0.2-1.2-0.5        c-0.3-0.3-0.5-0.7-0.5-1.2c0-0.5,0.2-0.9,0.5-1.2c0.3-0.3,0.8-0.5,1.3-0.5c0.5,0,1,0.2,1.3,0.5        C265.2,63.9,265.4,64.3,265.4,64.8z M263.1,64.3c-0.1,0.1-0.2,0.3-0.2,0.5c0,0.2,0.1,0.4,0.2,0.5c0.1,0.1,0.3,0.2,0.5,0.2        c0.2,0,0.4-0.1,0.5-0.2c0.1-0.1,0.2-0.3,0.2-0.5c0-0.2-0.1-0.4-0.2-0.5c-0.1-0.1-0.3-0.2-0.5-0.2        C263.4,64.1,263.2,64.2,263.1,64.3z"/>
                                                        <path class="svgClass27" d="M251,66.5v-0.3h14.6v0.3H251z"/>
                                                    </g>
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path class="svgClass8" d="M52.3,50.2c-0.9,0.9-2.1,1.4-3.4,1.4s-2.5-0.5-3.4-1.4c-0.9-0.9-1.4-2.1-1.4-3.4c0-1.3,0.5-2.5,1.4-3.4       s2.1-1.4,3.4-1.4s2.5,0.5,3.4,1.4c0.9,0.9,1.4,2.1,1.4,3.4C53.7,48.1,53.2,49.3,52.3,50.2z M46.3,49.4c0.7,0.7,1.5,1,2.6,1       s1.9-0.3,2.6-1s1-1.6,1-2.6c0-1-0.3-1.9-1-2.6c-0.7-0.7-1.5-1-2.6-1s-1.9,0.3-2.6,1c-0.7,0.7-1,1.6-1,2.6       C45.3,47.8,45.6,48.7,46.3,49.4z"/>
                                                    <path class="svgClass8" d="M57.9,51.6c-0.9,0-1.6-0.2-2.2-0.6c-0.6-0.4-1-1-1.3-1.7l1.1-0.6c0.4,1.1,1.2,1.7,2.5,1.7       c0.6,0,1.1-0.1,1.5-0.4s0.5-0.6,0.5-1c0-0.4-0.2-0.8-0.5-1s-0.9-0.5-1.7-0.7C57.3,47.1,57,47,56.8,47s-0.5-0.2-0.8-0.3       c-0.3-0.2-0.5-0.3-0.7-0.5c-0.2-0.2-0.3-0.4-0.4-0.6c-0.1-0.3-0.2-0.6-0.2-0.9c0-0.8,0.3-1.4,0.9-1.9c0.6-0.5,1.3-0.7,2.1-0.7       c0.7,0,1.4,0.2,1.9,0.6c0.5,0.4,1,0.9,1.2,1.5l-1,0.6c-0.4-1-1.1-1.4-2.1-1.4c-0.5,0-0.9,0.1-1.2,0.4c-0.3,0.2-0.5,0.6-0.5,1       c0,0.4,0.1,0.7,0.4,0.9c0.3,0.2,0.8,0.4,1.5,0.7c0.3,0.1,0.4,0.1,0.5,0.2s0.3,0.1,0.5,0.2c0.2,0.1,0.4,0.2,0.5,0.2       s0.2,0.1,0.4,0.2c0.2,0.1,0.3,0.2,0.4,0.3c0.1,0.1,0.2,0.2,0.3,0.3c0.1,0.1,0.2,0.3,0.3,0.4c0.1,0.1,0.1,0.3,0.1,0.5       s0.1,0.4,0.1,0.6c0,0.8-0.3,1.5-0.9,1.9C59.6,51.4,58.8,51.6,57.9,51.6z"/>
                                                    <path class="svgClass8" d="M68.3,42.1h1.2v9.3h-1.2v-4.2h-4.5v4.2h-1.2v-9.3h1.2v4h4.5V42.1z"/>
                                                    <path class="svgClass8" d="M77.6,51.4l-0.8-2.1h-4.2l-0.8,2.1h-1.3l3.5-9.3h1.4l3.5,9.3H77.6z M73.1,48.2h3.3l-1.7-4.6L73.1,48.2z"/>
                                                    <path class="svgClass8" d="M46.1,54.9H48v9.3h-2.1v-7.1l-1.7,0.5l-0.5-1.8L46.1,54.9z"/>
                                                    <path class="svgClass8" d="M55.9,63c-0.7,0.9-1.6,1.3-2.8,1.3c-1.2,0-2.1-0.4-2.8-1.3s-1-2.1-1-3.5s0.3-2.6,1-3.5s1.6-1.3,2.8-1.3       c1.2,0,2.1,0.4,2.8,1.3s1,2.1,1,3.5S56.6,62.2,55.9,63z M51.4,59.5c0,1.8,0.6,2.8,1.7,2.8c1.1,0,1.7-0.9,1.7-2.8       s-0.6-2.8-1.7-2.8C52,56.8,51.4,57.7,51.4,59.5z"/>
                                                    <path class="svgClass8" d="M66.5,54.9h2.1v9.3h-2.1v-3.7h-2.9v3.7h-2.1v-9.3h2.1v3.6h2.9V54.9z"/>
                                                    <path class="svgClass8" d="M78.1,63c-0.9,0.9-2.1,1.4-3.4,1.4s-2.5-0.5-3.4-1.4s-1.4-2.1-1.4-3.4s0.5-2.5,1.4-3.4s2.1-1.4,3.4-1.4       s2.5,0.5,3.4,1.4s1.4,2.1,1.4,3.4S79,62,78.1,63z M72.7,61.5c0.5,0.5,1.2,0.8,1.9,0.8c0.8,0,1.4-0.3,1.9-0.8       c0.5-0.5,0.8-1.2,0.8-2s-0.3-1.5-0.8-2c-0.5-0.5-1.2-0.8-1.9-0.8c-0.8,0-1.4,0.3-1.9,0.8c-0.5,0.5-0.8,1.2-0.8,2       S72.2,61,72.7,61.5z"/>
                                                    <path class="svgClass8" d="M86.7,63.5c-0.7,0.6-1.5,0.9-2.6,0.9s-1.9-0.3-2.6-0.9c-0.7-0.6-1-1.4-1-2.3v-6.3h2.1V61       c0,0.9,0.5,1.3,1.5,1.3c1,0,1.5-0.4,1.5-1.3v-6.1h2.1v6.3C87.8,62.1,87.4,62.9,86.7,63.5z"/>
                                                    <path class="svgClass8" d="M94.2,64.2l-1.8-3.1h-1v3.1h-2.1v-9.3H93c0.9,0,1.6,0.3,2.3,0.9s0.9,1.4,0.9,2.3c0,0.6-0.2,1.1-0.5,1.6       c-0.3,0.5-0.7,0.9-1.2,1.1l2,3.4H94.2z M91.4,56.9v2.4H93c0.3,0,0.5-0.1,0.8-0.3c0.2-0.2,0.3-0.5,0.3-0.9       c0-0.3-0.1-0.6-0.3-0.9c-0.2-0.2-0.5-0.3-0.8-0.3H91.4z"/>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path class="svgClass7" d="M136.4,87.7H43.9c-0.8,0-1.4-0.6-1.4-1.4V70.2c0-0.6,0.5-1,1-1h98.1c0.6,0,1,0.5,1,1v11.3        C142.6,84.9,139.8,87.7,136.4,87.7z"/>
                                                    </g>
                                                    <g>
                                                        <path class="svgClass8" d="M136.4,88.5H43.9c-1.2,0-2.2-1-2.2-2.2V70.2c0-1,0.8-1.8,1.8-1.8h98.1c1,0,1.8,0.8,1.8,1.8v11.3        C143.4,85.4,140.3,88.5,136.4,88.5z M43.5,70c-0.1,0-0.2,0.1-0.2,0.2v16.1c0,0.3,0.3,0.6,0.6,0.6h92.5c3,0,5.4-2.4,5.4-5.4        V70.2c0-0.1-0.1-0.2-0.2-0.2H43.5z"/>
                                                    </g>
                                                </g>
                                                <g>
                                                    <path class="svgClass1" d="M52.4,82c-0.9,0-1.6-0.3-2.2-0.9s-0.9-1.3-0.9-2.2s0.3-1.6,0.9-2.2c0.6-0.6,1.3-0.9,2.2-0.9       c0.5,0,1,0.1,1.5,0.4c0.5,0.2,0.8,0.6,1.1,1l-1.2,0.7c-0.1-0.2-0.3-0.4-0.6-0.5c-0.2-0.1-0.5-0.2-0.8-0.2c-0.5,0-1,0.2-1.3,0.5       c-0.3,0.3-0.5,0.8-0.5,1.3s0.2,1,0.5,1.3c0.3,0.3,0.7,0.5,1.3,0.5c0.3,0,0.6-0.1,0.8-0.2c0.2-0.1,0.4-0.3,0.6-0.5l1.2,0.7       c-0.3,0.4-0.6,0.8-1.1,1C53.4,81.9,52.9,82,52.4,82z"/>
                                                    <path class="svgClass1" d="M62.4,81.1c-0.6,0.6-1.3,0.9-2.2,0.9c-0.9,0-1.6-0.3-2.2-0.9c-0.6-0.6-0.9-1.3-0.9-2.2       c0-0.9,0.3-1.6,0.9-2.2c0.6-0.6,1.3-0.9,2.2-0.9c0.9,0,1.6,0.3,2.2,0.9c0.6,0.6,0.9,1.3,0.9,2.2C63.4,79.8,63.1,80.5,62.4,81.1       z M59,80.2c0.3,0.3,0.7,0.5,1.2,0.5c0.5,0,0.9-0.2,1.2-0.5s0.5-0.8,0.5-1.3c0-0.5-0.2-1-0.5-1.3s-0.8-0.5-1.2-0.5       c-0.5,0-0.9,0.2-1.2,0.5s-0.5,0.8-0.5,1.3C58.5,79.4,58.7,79.8,59,80.2z"/>
                                                    <path class="svgClass1" d="M69.3,75.9h1.4v6h-1l-2.3-3.3v3.3H66v-6h1l2.3,3.3V75.9z"/>
                                                    <path class="svgClass1" d="M75.6,82c-0.6,0-1.1-0.1-1.5-0.4s-0.7-0.6-0.9-1.1l1.2-0.7c0.2,0.6,0.7,0.8,1.3,0.8c0.5,0,0.8-0.2,0.8-0.5       c0-0.2-0.1-0.3-0.3-0.4c-0.2-0.1-0.5-0.2-1-0.3c-0.3-0.1-0.5-0.1-0.7-0.2S74.2,79,74,78.8c-0.2-0.1-0.3-0.3-0.4-0.5       c-0.1-0.2-0.1-0.5-0.1-0.7c0-0.6,0.2-1,0.6-1.3s0.9-0.5,1.4-0.5c0.5,0,0.9,0.1,1.3,0.3c0.4,0.2,0.7,0.6,0.9,1l-1.2,0.7       c-0.1-0.2-0.2-0.4-0.4-0.5s-0.4-0.2-0.6-0.2c-0.2,0-0.4,0-0.5,0.1c-0.1,0.1-0.2,0.2-0.2,0.3c0,0.1,0.1,0.3,0.2,0.4       s0.4,0.2,0.9,0.4c0.2,0.1,0.4,0.1,0.6,0.2c0.1,0,0.3,0.1,0.5,0.2c0.2,0.1,0.4,0.2,0.5,0.3c0.1,0.1,0.2,0.3,0.3,0.5       c0.1,0.2,0.1,0.4,0.1,0.7c0,0.6-0.2,1-0.6,1.3C76.8,81.8,76.3,82,75.6,82z"/>
                                                    <path class="svgClass1" d="M84.2,75.9v1.3h-1.5v4.7h-1.4v-4.7h-1.5v-1.3H84.2z"/>
                                                    <path class="svgClass1" d="M89.9,81.9l-1.1-2h-0.7v2h-1.4v-6h2.4c0.6,0,1.1,0.2,1.5,0.6s0.6,0.9,0.6,1.5c0,0.4-0.1,0.7-0.3,1       c-0.2,0.3-0.5,0.6-0.8,0.7l1.3,2.2H89.9z M88.1,77.2v1.5h1c0.2,0,0.3-0.1,0.5-0.2c0.1-0.1,0.2-0.3,0.2-0.5       c0-0.2-0.1-0.4-0.2-0.5c-0.1-0.1-0.3-0.2-0.5-0.2H88.1z"/>
                                                    <path class="svgClass1" d="M97.8,81.4c-0.4,0.4-1,0.6-1.7,0.6c-0.7,0-1.2-0.2-1.7-0.6c-0.4-0.4-0.7-0.9-0.7-1.5v-4.1h1.4v3.9       c0,0.6,0.3,0.8,0.9,0.8s0.9-0.3,0.9-0.8v-3.9h1.4v4.1C98.4,80.6,98.2,81.1,97.8,81.4z"/>
                                                    <path class="svgClass1" d="M104.1,82c-0.9,0-1.6-0.3-2.2-0.9s-0.9-1.3-0.9-2.2s0.3-1.6,0.9-2.2c0.6-0.6,1.3-0.9,2.2-0.9       c0.5,0,1,0.1,1.5,0.4c0.5,0.2,0.8,0.6,1.1,1l-1.2,0.7c-0.1-0.2-0.3-0.4-0.6-0.5c-0.2-0.1-0.5-0.2-0.8-0.2c-0.5,0-1,0.2-1.3,0.5       c-0.3,0.3-0.5,0.8-0.5,1.3s0.2,1,0.5,1.3c0.3,0.3,0.7,0.5,1.3,0.5c0.3,0,0.6-0.1,0.8-0.2c0.2-0.1,0.4-0.3,0.6-0.5l1.2,0.7       c-0.3,0.4-0.6,0.8-1.1,1C105.2,81.9,104.7,82,104.1,82z"/>
                                                    <path class="svgClass1" d="M113.3,75.9v1.3h-1.5v4.7h-1.4v-4.7h-1.5v-1.3H113.3z"/>
                                                    <path class="svgClass1" d="M115.7,75.9h1.4v6h-1.4V75.9z"/>
                                                    <path class="svgClass1" d="M125.1,81.1c-0.6,0.6-1.3,0.9-2.2,0.9c-0.9,0-1.6-0.3-2.2-0.9c-0.6-0.6-0.9-1.3-0.9-2.2       c0-0.9,0.3-1.6,0.9-2.2c0.6-0.6,1.3-0.9,2.2-0.9c0.9,0,1.6,0.3,2.2,0.9c0.6,0.6,0.9,1.3,0.9,2.2       C126,79.8,125.7,80.5,125.1,81.1z M121.6,80.2c0.3,0.3,0.7,0.5,1.2,0.5c0.5,0,0.9-0.2,1.2-0.5s0.5-0.8,0.5-1.3       c0-0.5-0.2-1-0.5-1.3s-0.8-0.5-1.2-0.5c-0.5,0-0.9,0.2-1.2,0.5s-0.5,0.8-0.5,1.3C121.1,79.4,121.3,79.8,121.6,80.2z"/>
                                                    <path class="svgClass1" d="M132,75.9h1.4v6h-1l-2.3-3.3v3.3h-1.4v-6h1l2.3,3.3V75.9z"/>
                                                </g>
                                                <path class="svgClass2" d="M150,71.4h-47.8V41.8h58.5v18.9C160.6,66.7,155.8,71.4,150,71.4z"/>
                                                <g>
                                                    <path class="svgClass8" d="M150.7,72.3h-46.2c-1.7,0-3.1-1.4-3.1-3.1V43.4c0-1.3,1.1-2.4,2.4-2.4H159c1.3,0,2.4,1.1,2.4,2.4v18.1       C161.5,67.5,156.6,72.3,150.7,72.3z M103.9,42.7c-0.4,0-0.8,0.3-0.8,0.8v25.8c0,0.8,0.6,1.4,1.4,1.4h46.2c5,0,9.1-4.1,9.1-9.1       V43.4c0-0.4-0.3-0.8-0.8-0.8H103.9z"/>
                                                </g>
                                                <g>
                                                    <path class="svgClass8" d="M126.5,56.2c0,1.1-0.3,2-1,2.6s-1.6,1.1-2.6,1.2v1.6h-1.2v-1.6c-1-0.1-1.9-0.4-2.6-0.9s-1.2-1.2-1.6-2       l2.5-1.4c0.4,0.9,0.9,1.4,1.7,1.5v-2.5c0,0-0.1,0-0.1,0c-0.1,0-0.1,0-0.1,0c-0.4-0.2-0.7-0.3-1-0.4c-0.3-0.1-0.6-0.3-0.9-0.5       s-0.6-0.5-0.8-0.7s-0.4-0.6-0.5-1c-0.1-0.4-0.2-0.8-0.2-1.3c0-1.1,0.4-2,1.1-2.6s1.6-1,2.6-1.1v-1.6h1.2v1.6       c1.7,0.2,2.8,1.1,3.5,2.6l-2.4,1.4c-0.2-0.6-0.6-1-1.1-1.2v2.4c0.1,0,0.3,0.1,0.6,0.2s0.6,0.2,0.7,0.3c0.1,0,0.3,0.1,0.6,0.3       c0.3,0.1,0.5,0.3,0.6,0.4c0.1,0.1,0.3,0.3,0.5,0.5s0.3,0.4,0.4,0.6c0.1,0.2,0.2,0.4,0.2,0.7C126.4,55.6,126.5,55.9,126.5,56.2z        M120.8,50.8c0,0.4,0.3,0.7,0.8,1v-1.9C121,50.1,120.8,50.4,120.8,50.8z M122.8,57.2c0.5-0.1,0.8-0.5,0.8-0.9       c0-0.4-0.3-0.7-0.8-1V57.2z"/>
                                                    <path class="svgClass8" d="M126.8,47.3h8.2v2.4l-4.1,10.1h-3l3.9-9.7h-5V47.3z"/>
                                                    <path class="svgClass8" d="M144.4,58.3c-0.9,1.2-2.1,1.8-3.7,1.8s-2.8-0.6-3.7-1.8c-0.9-1.2-1.3-2.8-1.3-4.7c0-2,0.4-3.5,1.3-4.7       c0.9-1.2,2.1-1.8,3.7-1.8s2.8,0.6,3.7,1.8c0.9,1.2,1.3,2.8,1.3,4.7C145.7,55.6,145.3,57.1,144.4,58.3z M138.4,53.6       c0,2.5,0.7,3.7,2.2,3.7s2.2-1.2,2.2-3.7s-0.7-3.7-2.2-3.7S138.4,51.1,138.4,53.6z"/>
                                                </g>
                                                <g>
                                                    <path class="svgClass27" d="M128.6,66.7c0,0.4-0.1,0.8-0.4,1c-0.3,0.3-0.6,0.4-1,0.5v0.6h-0.5v-0.6c-0.4,0-0.7-0.1-1-0.3       c-0.3-0.2-0.5-0.5-0.6-0.8l1-0.6c0.1,0.3,0.4,0.5,0.7,0.6v-1c0,0,0,0,0,0c0,0,0,0,0,0c-0.1-0.1-0.3-0.1-0.4-0.2       s-0.2-0.1-0.3-0.2c-0.1-0.1-0.2-0.2-0.3-0.3c-0.1-0.1-0.1-0.2-0.2-0.4c-0.1-0.1-0.1-0.3-0.1-0.5c0-0.4,0.1-0.8,0.4-1       c0.3-0.2,0.6-0.4,1-0.4v-0.6h0.5v0.6c0.7,0.1,1.1,0.4,1.4,1l-0.9,0.6c-0.1-0.2-0.2-0.4-0.4-0.5v0.9c0,0,0.1,0,0.2,0.1       c0.1,0.1,0.2,0.1,0.3,0.1c0,0,0.1,0.1,0.2,0.1c0.1,0.1,0.2,0.1,0.2,0.2s0.1,0.1,0.2,0.2c0.1,0.1,0.1,0.2,0.2,0.2       c0,0.1,0.1,0.2,0.1,0.3C128.6,66.4,128.6,66.5,128.6,66.7z M126.4,64.5c0,0.1,0.1,0.3,0.3,0.4v-0.7       C126.5,64.2,126.4,64.4,126.4,64.5z M127.2,67c0.2-0.1,0.3-0.2,0.3-0.4c0-0.2-0.1-0.3-0.3-0.4V67z"/>
                                                    <path class="svgClass27" d="M131.9,65.5c0.4,0.3,0.6,0.7,0.6,1.2c0,0.5-0.2,0.8-0.5,1.1c-0.3,0.3-0.8,0.4-1.3,0.4s-1-0.1-1.3-0.4       c-0.3-0.3-0.5-0.6-0.5-1.1c0-0.5,0.2-0.9,0.6-1.2c-0.3-0.2-0.5-0.6-0.5-1c0-0.5,0.2-0.8,0.5-1.1c0.3-0.3,0.7-0.4,1.2-0.4       c0.5,0,0.9,0.1,1.2,0.4c0.3,0.3,0.5,0.6,0.5,1.1C132.4,64.9,132.3,65.3,131.9,65.5z M130.3,67c0.1,0.1,0.3,0.2,0.5,0.2       s0.4-0.1,0.5-0.2s0.2-0.2,0.2-0.4s-0.1-0.3-0.2-0.4s-0.3-0.2-0.5-0.2s-0.4,0.1-0.5,0.2c-0.1,0.1-0.2,0.2-0.2,0.4       S130.2,66.9,130.3,67z M131.2,64.3c-0.1-0.1-0.2-0.1-0.4-0.1c-0.2,0-0.3,0-0.4,0.1c-0.1,0.1-0.1,0.2-0.1,0.3       c0,0.1,0,0.3,0.1,0.3c0.1,0.1,0.2,0.1,0.4,0.1c0.2,0,0.3,0,0.4-0.1c0.1-0.1,0.1-0.2,0.1-0.3C131.3,64.5,131.3,64.3,131.2,64.3z       "/>
                                                    <path class="svgClass27" d="M136.6,64.8c0,0.4-0.1,0.7-0.3,1l-1.5,2.3h-1.3l1.1-1.5c-0.5,0-0.9-0.2-1.2-0.5c-0.3-0.3-0.5-0.7-0.5-1.2       c0-0.5,0.2-0.9,0.5-1.2c0.3-0.3,0.8-0.5,1.3-0.5c0.5,0,1,0.2,1.3,0.5C136.4,63.9,136.6,64.3,136.6,64.8z M134.3,64.3       c-0.1,0.1-0.2,0.3-0.2,0.5c0,0.2,0.1,0.4,0.2,0.5c0.1,0.1,0.3,0.2,0.5,0.2c0.2,0,0.4-0.1,0.5-0.2c0.1-0.1,0.2-0.3,0.2-0.5       c0-0.2-0.1-0.4-0.2-0.5c-0.1-0.1-0.3-0.2-0.5-0.2C134.6,64.1,134.4,64.2,134.3,64.3z"/>
                                                    <path class="svgClass27" d="M125,66.5v-0.3h11.8v0.3H125z"/>
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path class="svgClass8" d="M177.2,109.3h1.2v9.3h-1l-4.8-7v7h-1.2v-9.3h1l4.8,6.9V109.3z"/>
                                                    <path class="svgClass8" d="M187,109.3l-3.3,5.5v3.8h-1.2v-3.8l-3.3-5.5h1.4l2.5,4.4l2.5-4.4H187z"/>
                                                    <path class="svgClass8" d="M198.6,117.4c-0.9,0.9-2.1,1.4-3.4,1.4s-2.5-0.5-3.4-1.4c-0.9-0.9-1.4-2.1-1.4-3.4c0-1.3,0.5-2.5,1.4-3.4       s2.1-1.4,3.4-1.4s2.5,0.5,3.4,1.4c0.9,0.9,1.4,2.1,1.4,3.4C200,115.3,199.5,116.4,198.6,117.4z M192.6,116.5       c0.7,0.7,1.5,1,2.6,1s1.9-0.3,2.6-1s1-1.6,1-2.6c0-1-0.3-1.9-1-2.6c-0.7-0.7-1.5-1-2.6-1s-1.9,0.3-2.6,1c-0.7,0.7-1,1.6-1,2.6       C191.5,115,191.9,115.8,192.6,116.5z"/>
                                                    <path class="svgClass8" d="M203.8,118.8c-0.9,0-1.6-0.2-2.2-0.6c-0.6-0.4-1-1-1.3-1.7l1.1-0.6c0.4,1.1,1.2,1.7,2.5,1.7       c0.6,0,1.1-0.1,1.5-0.4s0.5-0.6,0.5-1c0-0.4-0.2-0.8-0.5-1s-0.9-0.5-1.7-0.7c-0.4-0.1-0.7-0.2-0.9-0.3s-0.5-0.2-0.8-0.3       c-0.3-0.2-0.5-0.3-0.7-0.5c-0.2-0.2-0.3-0.4-0.4-0.6c-0.1-0.3-0.2-0.6-0.2-0.9c0-0.8,0.3-1.4,0.9-1.9c0.6-0.5,1.3-0.7,2.1-0.7       c0.7,0,1.4,0.2,1.9,0.6c0.5,0.4,1,0.9,1.2,1.5l-1,0.6c-0.4-1-1.1-1.4-2.1-1.4c-0.5,0-0.9,0.1-1.2,0.4c-0.3,0.2-0.5,0.6-0.5,1       c0,0.4,0.1,0.7,0.4,0.9c0.3,0.2,0.8,0.4,1.5,0.7c0.3,0.1,0.4,0.1,0.5,0.2s0.3,0.1,0.5,0.2c0.2,0.1,0.4,0.2,0.5,0.2       s0.2,0.1,0.4,0.2c0.2,0.1,0.3,0.2,0.4,0.3c0.1,0.1,0.2,0.2,0.3,0.3c0.1,0.1,0.2,0.3,0.3,0.4c0.1,0.1,0.1,0.3,0.1,0.5       s0.1,0.4,0.1,0.6c0,0.8-0.3,1.5-0.9,1.9C205.5,118.6,204.8,118.8,203.8,118.8z"/>
                                                    <path class="svgClass8" d="M213.8,109.3h1.2v9.3h-1.2v-4.2h-4.5v4.2h-1.2v-9.3h1.2v4h4.5V109.3z"/>
                                                    <path class="svgClass8" d="M222.9,118.6l-0.8-2.1h-4.2l-0.8,2.1h-1.3l3.5-9.3h1.4l3.5,9.3H222.9z M218.3,115.4h3.3l-1.7-4.6       L218.3,115.4z"/>
                                                    <path class="svgClass8" d="M173,122.1h1.9v9.3h-2.1v-7.1l-1.7,0.5l-0.5-1.8L173,122.1z"/>
                                                    <path class="svgClass8" d="M182.8,130.2c-0.7,0.9-1.6,1.3-2.8,1.3c-1.2,0-2.1-0.4-2.8-1.3s-1-2.1-1-3.5c0-1.5,0.3-2.6,1-3.5       s1.6-1.3,2.8-1.3c1.2,0,2.1,0.4,2.8,1.3s1,2.1,1,3.5C183.8,128.2,183.4,129.3,182.8,130.2z M178.3,126.7c0,1.8,0.6,2.8,1.7,2.8       c1.1,0,1.7-0.9,1.7-2.8c0-1.8-0.6-2.8-1.7-2.8C178.9,123.9,178.3,124.9,178.3,126.7z"/>
                                                    <path class="svgClass8" d="M193.3,122.1h2.1v9.3h-2.1v-3.7h-2.9v3.7h-2.1v-9.3h2.1v3.6h2.9V122.1z"/>
                                                    <path class="svgClass8" d="M204.9,130.2c-0.9,0.9-2.1,1.4-3.4,1.4s-2.5-0.5-3.4-1.4s-1.4-2.1-1.4-3.4c0-1.4,0.5-2.5,1.4-3.4       s2.1-1.4,3.4-1.4s2.5,0.5,3.4,1.4s1.4,2.1,1.4,3.4C206.4,128.1,205.9,129.2,204.9,130.2z M199.6,128.7c0.5,0.5,1.2,0.8,1.9,0.8       c0.8,0,1.4-0.3,1.9-0.8c0.5-0.5,0.8-1.2,0.8-2s-0.3-1.5-0.8-2c-0.5-0.5-1.2-0.8-1.9-0.8c-0.8,0-1.4,0.3-1.9,0.8       c-0.5,0.5-0.8,1.2-0.8,2S199.1,128.2,199.6,128.7z"/>
                                                    <path class="svgClass8" d="M213.6,130.7c-0.7,0.6-1.5,0.9-2.6,0.9s-1.9-0.3-2.6-0.9s-1-1.4-1-2.3v-6.3h2.1v6.1c0,0.9,0.5,1.3,1.5,1.3       c1,0,1.5-0.4,1.5-1.3v-6.1h2.1v6.3C214.6,129.3,214.3,130.1,213.6,130.7z"/>
                                                    <path class="svgClass8" d="M221,131.4l-1.8-3.1h-1v3.1h-2.1v-9.3h3.7c0.9,0,1.6,0.3,2.3,0.9s0.9,1.4,0.9,2.3c0,0.6-0.2,1.1-0.5,1.6       c-0.3,0.5-0.7,0.9-1.2,1.1l2,3.4H221z M218.3,124v2.4h1.6c0.3,0,0.5-0.1,0.8-0.3c0.2-0.2,0.3-0.5,0.3-0.9       c0-0.3-0.1-0.6-0.3-0.9c-0.2-0.2-0.5-0.3-0.8-0.3H218.3z"/>
                                                </g>
                                                <g>
                                                    <g>
                                                        <g>
                                                            <path class="svgClass7" d="M263.3,154.9h-92.5c-0.8,0-1.4-0.6-1.4-1.4v-16.1c0-0.6,0.5-1,1-1h98.1c0.6,0,1,0.5,1,1v11.3         C269.4,152.1,266.7,154.9,263.3,154.9z"/>
                                                        </g>
                                                        <g>
                                                            <path class="svgClass8" d="M263.3,155.7h-92.5c-1.2,0-2.2-1-2.2-2.2v-16.1c0-1,0.8-1.8,1.8-1.8h98.1c1,0,1.8,0.8,1.8,1.8v11.3         C270.3,152.5,267.1,155.7,263.3,155.7z M170.4,137.2c-0.1,0-0.2,0.1-0.2,0.2v16.1c0,0.3,0.3,0.6,0.6,0.6h92.5         c3,0,5.4-2.4,5.4-5.4v-11.3c0-0.1-0.1-0.2-0.2-0.2H170.4z"/>
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <path class="svgClass1" d="M179.2,148.8c-0.9,0-1.6-0.3-2.2-0.9s-0.9-1.3-0.9-2.2s0.3-1.6,0.9-2.2c0.6-0.6,1.3-0.9,2.2-0.9        c0.5,0,1,0.1,1.5,0.4c0.5,0.2,0.8,0.6,1.1,1l-1.2,0.7c-0.1-0.2-0.3-0.4-0.6-0.5c-0.2-0.1-0.5-0.2-0.8-0.2        c-0.5,0-1,0.2-1.3,0.5c-0.3,0.3-0.5,0.8-0.5,1.3s0.2,1,0.5,1.3c0.3,0.3,0.7,0.5,1.3,0.5c0.3,0,0.6-0.1,0.8-0.2        c0.2-0.1,0.4-0.3,0.6-0.5l1.2,0.7c-0.3,0.4-0.6,0.8-1.1,1C180.3,148.6,179.8,148.8,179.2,148.8z"/>
                                                        <path class="svgClass1" d="M189.3,147.9c-0.6,0.6-1.3,0.9-2.2,0.9c-0.9,0-1.6-0.3-2.2-0.9c-0.6-0.6-0.9-1.3-0.9-2.2        c0-0.9,0.3-1.6,0.9-2.2c0.6-0.6,1.3-0.9,2.2-0.9c0.9,0,1.6,0.3,2.2,0.9c0.6,0.6,0.9,1.3,0.9,2.2        C190.2,146.5,189.9,147.3,189.3,147.9z M185.8,146.9c0.3,0.3,0.7,0.5,1.2,0.5c0.5,0,0.9-0.2,1.2-0.5s0.5-0.8,0.5-1.3        c0-0.5-0.2-1-0.5-1.3s-0.8-0.5-1.2-0.5c-0.5,0-0.9,0.2-1.2,0.5s-0.5,0.8-0.5,1.3C185.3,146.2,185.5,146.6,185.8,146.9z"/>
                                                        <path class="svgClass1" d="M196.2,142.6h1.4v6h-1l-2.3-3.3v3.3h-1.4v-6h1l2.3,3.3V142.6z"/>
                                                        <path class="svgClass1" d="M202.5,148.8c-0.6,0-1.1-0.1-1.5-0.4s-0.7-0.6-0.9-1.1l1.2-0.7c0.2,0.6,0.7,0.8,1.3,0.8        c0.5,0,0.8-0.2,0.8-0.5c0-0.2-0.1-0.3-0.3-0.4c-0.2-0.1-0.5-0.2-1-0.3c-0.3-0.1-0.5-0.1-0.7-0.2s-0.4-0.2-0.6-0.3        c-0.2-0.1-0.3-0.3-0.4-0.5c-0.1-0.2-0.1-0.5-0.1-0.7c0-0.6,0.2-1,0.6-1.3s0.9-0.5,1.4-0.5c0.5,0,0.9,0.1,1.3,0.3        c0.4,0.2,0.7,0.6,0.9,1l-1.2,0.7c-0.1-0.2-0.2-0.4-0.4-0.5s-0.4-0.2-0.6-0.2c-0.2,0-0.4,0-0.5,0.1c-0.1,0.1-0.2,0.2-0.2,0.3        c0,0.1,0.1,0.3,0.2,0.4s0.4,0.2,0.9,0.4c0.2,0.1,0.4,0.1,0.6,0.2c0.1,0,0.3,0.1,0.5,0.2c0.2,0.1,0.4,0.2,0.5,0.3        c0.1,0.1,0.2,0.3,0.3,0.5c0.1,0.2,0.1,0.4,0.1,0.7c0,0.6-0.2,1-0.6,1.3C203.7,148.6,203.2,148.8,202.5,148.8z"/>
                                                        <path class="svgClass1" d="M211.1,142.6v1.3h-1.5v4.7h-1.4V144h-1.5v-1.3H211.1z"/>
                                                        <path class="svgClass1" d="M216.7,148.6l-1.1-2H215v2h-1.4v-6h2.4c0.6,0,1.1,0.2,1.5,0.6s0.6,0.9,0.6,1.5c0,0.4-0.1,0.7-0.3,1        c-0.2,0.3-0.5,0.6-0.8,0.7l1.3,2.2H216.7z M215,143.9v1.5h1c0.2,0,0.3-0.1,0.5-0.2c0.1-0.1,0.2-0.3,0.2-0.5        c0-0.2-0.1-0.4-0.2-0.5c-0.1-0.1-0.3-0.2-0.5-0.2H215z"/>
                                                        <path class="svgClass1" d="M224.6,148.2c-0.4,0.4-1,0.6-1.7,0.6c-0.7,0-1.2-0.2-1.7-0.6c-0.4-0.4-0.7-0.9-0.7-1.5v-4.1h1.4v3.9        c0,0.6,0.3,0.8,0.9,0.8s0.9-0.3,0.9-0.8v-3.9h1.4v4.1C225.3,147.3,225.1,147.8,224.6,148.2z"/>
                                                        <path class="svgClass1" d="M231,148.8c-0.9,0-1.6-0.3-2.2-0.9s-0.9-1.3-0.9-2.2s0.3-1.6,0.9-2.2c0.6-0.6,1.3-0.9,2.2-0.9        c0.5,0,1,0.1,1.5,0.4c0.5,0.2,0.8,0.6,1.1,1l-1.2,0.7c-0.1-0.2-0.3-0.4-0.6-0.5c-0.2-0.1-0.5-0.2-0.8-0.2        c-0.5,0-1,0.2-1.3,0.5c-0.3,0.3-0.5,0.8-0.5,1.3s0.2,1,0.5,1.3c0.3,0.3,0.7,0.5,1.3,0.5c0.3,0,0.6-0.1,0.8-0.2        c0.2-0.1,0.4-0.3,0.6-0.5l1.2,0.7c-0.3,0.4-0.6,0.8-1.1,1C232,148.6,231.5,148.8,231,148.8z"/>
                                                        <path class="svgClass1" d="M240.1,142.6v1.3h-1.5v4.7h-1.4V144h-1.5v-1.3H240.1z"/>
                                                        <path class="svgClass1" d="M242.6,142.6h1.4v6h-1.4V142.6z"/>
                                                        <path class="svgClass1" d="M252,147.9c-0.6,0.6-1.3,0.9-2.2,0.9c-0.9,0-1.6-0.3-2.2-0.9c-0.6-0.6-0.9-1.3-0.9-2.2        c0-0.9,0.3-1.6,0.9-2.2c0.6-0.6,1.3-0.9,2.2-0.9c0.9,0,1.6,0.3,2.2,0.9c0.6,0.6,0.9,1.3,0.9,2.2        C252.9,146.5,252.6,147.3,252,147.9z M248.5,146.9c0.3,0.3,0.7,0.5,1.2,0.5c0.5,0,0.9-0.2,1.2-0.5s0.5-0.8,0.5-1.3        c0-0.5-0.2-1-0.5-1.3s-0.8-0.5-1.2-0.5c-0.5,0-0.9,0.2-1.2,0.5s-0.5,0.8-0.5,1.3C248,146.2,248.2,146.6,248.5,146.9z"/>
                                                        <path class="svgClass1" d="M258.9,142.6h1.4v6h-1l-2.3-3.3v3.3h-1.4v-6h1l2.3,3.3V142.6z"/>
                                                    </g>
                                                </g>
                                                <g>
                                                    <path class="svgClass2" d="M277.5,138.6H229V109h58.5v19.6C287.5,134.1,283,138.6,277.5,138.6z"/>
                                                    <g>
                                                        <path class="svgClass8" d="M277.6,139.5h-46.2c-1.7,0-3.1-1.4-3.1-3.1v-25.8c0-1.3,1.1-2.4,2.4-2.4h55.1c1.3,0,2.4,1.1,2.4,2.4v18.1        C288.3,134.6,283.5,139.5,277.6,139.5z M230.8,109.8c-0.4,0-0.8,0.3-0.8,0.8v25.8c0,0.8,0.6,1.4,1.4,1.4h46.2        c5,0,9.1-4.1,9.1-9.1v-18.1c0-0.4-0.3-0.8-0.8-0.8H230.8z"/>
                                                    </g>
                                                    <g>
                                                        <path class="svgClass8" d="M253.7,123.4c0,1.1-0.3,2-1,2.6s-1.6,1.1-2.6,1.2v1.6h-1.2v-1.6c-1-0.1-1.9-0.4-2.6-0.9s-1.2-1.2-1.6-2        l2.5-1.4c0.4,0.9,0.9,1.4,1.7,1.5V122c0,0-0.1,0-0.1,0c-0.1,0-0.1,0-0.1,0c-0.4-0.2-0.7-0.3-1-0.4c-0.3-0.1-0.6-0.3-0.9-0.5        s-0.6-0.5-0.8-0.7s-0.4-0.6-0.5-1c-0.1-0.4-0.2-0.8-0.2-1.3c0-1.1,0.4-2,1.1-2.6s1.6-1,2.6-1.1v-1.6h1.2v1.6        c1.7,0.2,2.8,1.1,3.5,2.6l-2.4,1.4c-0.2-0.6-0.6-1-1.1-1.2v2.4c0.1,0,0.3,0.1,0.6,0.2s0.6,0.2,0.7,0.3c0.1,0,0.3,0.1,0.6,0.3        c0.3,0.1,0.5,0.3,0.6,0.4c0.1,0.1,0.3,0.3,0.5,0.5s0.3,0.4,0.4,0.6c0.1,0.2,0.2,0.4,0.2,0.7        C253.7,122.8,253.7,123.1,253.7,123.4z M248,118c0,0.4,0.3,0.7,0.8,1v-1.9C248.3,117.3,248,117.5,248,118z M250.1,124.4        c0.5-0.1,0.8-0.5,0.8-0.9c0-0.4-0.3-0.7-0.8-1V124.4z"/>
                                                        <path class="svgClass8" d="M254.1,114.5h8.2v2.4l-4.1,10.1h-3l3.9-9.7h-5V114.5z"/>
                                                        <path class="svgClass8" d="M271.6,125.5c-0.9,1.2-2.1,1.8-3.7,1.8s-2.8-0.6-3.7-1.8c-0.9-1.2-1.3-2.8-1.3-4.7c0-2,0.4-3.5,1.3-4.7        c0.9-1.2,2.1-1.8,3.7-1.8s2.8,0.6,3.7,1.8c0.9,1.2,1.3,2.8,1.3,4.7C273,122.7,272.5,124.3,271.6,125.5z M265.7,120.8        c0,2.5,0.7,3.7,2.2,3.7s2.2-1.2,2.2-3.7s-0.7-3.7-2.2-3.7S265.7,118.3,265.7,120.8z"/>
                                                    </g>
                                                    <g>
                                                        <path class="svgClass27" d="M255.9,133.8c0,0.4-0.1,0.8-0.4,1c-0.3,0.3-0.6,0.4-1,0.5v0.6H254v-0.6c-0.4,0-0.7-0.1-1-0.3        c-0.3-0.2-0.5-0.5-0.6-0.8l1-0.6c0.1,0.3,0.4,0.5,0.7,0.6v-1c0,0,0,0,0,0c0,0,0,0,0,0c-0.1-0.1-0.3-0.1-0.4-0.2        s-0.2-0.1-0.3-0.2c-0.1-0.1-0.2-0.2-0.3-0.3c-0.1-0.1-0.1-0.2-0.2-0.4c-0.1-0.1-0.1-0.3-0.1-0.5c0-0.4,0.1-0.8,0.4-1        c0.3-0.2,0.6-0.4,1-0.4v-0.6h0.5v0.6c0.7,0.1,1.1,0.4,1.4,1l-0.9,0.6c-0.1-0.2-0.2-0.4-0.4-0.5v0.9c0,0,0.1,0,0.2,0.1        c0.1,0.1,0.2,0.1,0.3,0.1c0,0,0.1,0.1,0.2,0.1c0.1,0.1,0.2,0.1,0.2,0.2s0.1,0.1,0.2,0.2c0.1,0.1,0.1,0.2,0.2,0.2        c0,0.1,0.1,0.2,0.1,0.3C255.9,133.6,255.9,133.7,255.9,133.8z M253.7,131.7c0,0.1,0.1,0.3,0.3,0.4v-0.7        C253.8,131.4,253.7,131.5,253.7,131.7z M254.5,134.2c0.2-0.1,0.3-0.2,0.3-0.4c0-0.2-0.1-0.3-0.3-0.4V134.2z"/>
                                                        <path class="svgClass27" d="M259.2,132.7c0.4,0.3,0.6,0.7,0.6,1.2c0,0.5-0.2,0.8-0.5,1.1c-0.3,0.3-0.8,0.4-1.3,0.4s-1-0.1-1.3-0.4        c-0.3-0.3-0.5-0.6-0.5-1.1c0-0.5,0.2-0.9,0.6-1.2c-0.3-0.2-0.5-0.6-0.5-1c0-0.5,0.2-0.8,0.5-1.1c0.3-0.3,0.7-0.4,1.2-0.4        c0.5,0,0.9,0.1,1.2,0.4c0.3,0.3,0.5,0.6,0.5,1.1C259.7,132.1,259.5,132.5,259.2,132.7z M257.6,134.1c0.1,0.1,0.3,0.2,0.5,0.2        s0.4-0.1,0.5-0.2s0.2-0.2,0.2-0.4s-0.1-0.3-0.2-0.4s-0.3-0.2-0.5-0.2s-0.4,0.1-0.5,0.2c-0.1,0.1-0.2,0.2-0.2,0.4        S257.5,134,257.6,134.1z M258.4,131.4c-0.1-0.1-0.2-0.1-0.4-0.1c-0.2,0-0.3,0-0.4,0.1c-0.1,0.1-0.1,0.2-0.1,0.3        c0,0.1,0,0.3,0.1,0.3c0.1,0.1,0.2,0.1,0.4,0.1c0.2,0,0.3,0,0.4-0.1c0.1-0.1,0.1-0.2,0.1-0.3        C258.6,131.6,258.5,131.5,258.4,131.4z"/>
                                                        <path class="svgClass27" d="M263.8,132c0,0.4-0.1,0.7-0.3,1l-1.5,2.3h-1.3l1.1-1.5c-0.5,0-0.9-0.2-1.2-0.5c-0.3-0.3-0.5-0.7-0.5-1.2        c0-0.5,0.2-0.9,0.5-1.2c0.3-0.3,0.8-0.5,1.3-0.5c0.5,0,1,0.2,1.3,0.5C263.7,131.1,263.8,131.5,263.8,132z M261.5,131.5        c-0.1,0.1-0.2,0.3-0.2,0.5c0,0.2,0.1,0.4,0.2,0.5c0.1,0.1,0.3,0.2,0.5,0.2c0.2,0,0.4-0.1,0.5-0.2c0.1-0.1,0.2-0.3,0.2-0.5        c0-0.2-0.1-0.4-0.2-0.5c-0.1-0.1-0.3-0.2-0.5-0.2C261.8,131.3,261.7,131.4,261.5,131.5z"/>
                                                        <path class="svgClass27" d="M252.2,133.7v-0.3H264v0.3H252.2z"/>
                                                    </g>
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path class="svgClass8" d="M52.3,117.4c-0.9,0.9-2.1,1.4-3.4,1.4s-2.5-0.5-3.4-1.4c-0.9-0.9-1.4-2.1-1.4-3.4c0-1.3,0.5-2.5,1.4-3.4       s2.1-1.4,3.4-1.4s2.5,0.5,3.4,1.4c0.9,0.9,1.4,2.1,1.4,3.4C53.7,115.3,53.2,116.4,52.3,117.4z M46.3,116.5c0.7,0.7,1.5,1,2.6,1       s1.9-0.3,2.6-1s1-1.6,1-2.6c0-1-0.3-1.9-1-2.6c-0.7-0.7-1.5-1-2.6-1s-1.9,0.3-2.6,1c-0.7,0.7-1,1.6-1,2.6       C45.3,115,45.6,115.8,46.3,116.5z"/>
                                                    <path class="svgClass8" d="M57.9,118.8c-0.9,0-1.6-0.2-2.2-0.6c-0.6-0.4-1-1-1.3-1.7l1.1-0.6c0.4,1.1,1.2,1.7,2.5,1.7       c0.6,0,1.1-0.1,1.5-0.4s0.5-0.6,0.5-1c0-0.4-0.2-0.8-0.5-1s-0.9-0.5-1.7-0.7c-0.4-0.1-0.7-0.2-0.9-0.3s-0.5-0.2-0.8-0.3       c-0.3-0.2-0.5-0.3-0.7-0.5c-0.2-0.2-0.3-0.4-0.4-0.6c-0.1-0.3-0.2-0.6-0.2-0.9c0-0.8,0.3-1.4,0.9-1.9c0.6-0.5,1.3-0.7,2.1-0.7       c0.7,0,1.4,0.2,1.9,0.6c0.5,0.4,1,0.9,1.2,1.5l-1,0.6c-0.4-1-1.1-1.4-2.1-1.4c-0.5,0-0.9,0.1-1.2,0.4c-0.3,0.2-0.5,0.6-0.5,1       c0,0.4,0.1,0.7,0.4,0.9c0.3,0.2,0.8,0.4,1.5,0.7c0.3,0.1,0.4,0.1,0.5,0.2s0.3,0.1,0.5,0.2c0.2,0.1,0.4,0.2,0.5,0.2       s0.2,0.1,0.4,0.2c0.2,0.1,0.3,0.2,0.4,0.3c0.1,0.1,0.2,0.2,0.3,0.3c0.1,0.1,0.2,0.3,0.3,0.4c0.1,0.1,0.1,0.3,0.1,0.5       s0.1,0.4,0.1,0.6c0,0.8-0.3,1.5-0.9,1.9C59.6,118.6,58.8,118.8,57.9,118.8z"/>
                                                    <path class="svgClass8" d="M68.3,109.3h1.2v9.3h-1.2v-4.2h-4.5v4.2h-1.2v-9.3h1.2v4h4.5V109.3z"/>
                                                    <path class="svgClass8" d="M77.6,118.6l-0.8-2.1h-4.2l-0.8,2.1h-1.3l3.5-9.3h1.4l3.5,9.3H77.6z M73.1,115.4h3.3l-1.7-4.6L73.1,115.4z       "/>
                                                    <path class="svgClass8" d="M46.1,122.1H48v9.3h-2.1v-7.1l-1.7,0.5l-0.5-1.8L46.1,122.1z"/>
                                                    <path class="svgClass8" d="M55.9,130.2c-0.7,0.9-1.6,1.3-2.8,1.3c-1.2,0-2.1-0.4-2.8-1.3s-1-2.1-1-3.5c0-1.5,0.3-2.6,1-3.5       s1.6-1.3,2.8-1.3c1.2,0,2.1,0.4,2.8,1.3s1,2.1,1,3.5C56.9,128.2,56.6,129.3,55.9,130.2z M51.4,126.7c0,1.8,0.6,2.8,1.7,2.8       c1.1,0,1.7-0.9,1.7-2.8c0-1.8-0.6-2.8-1.7-2.8C52,123.9,51.4,124.9,51.4,126.7z"/>
                                                    <path class="svgClass8" d="M66.5,122.1h2.1v9.3h-2.1v-3.7h-2.9v3.7h-2.1v-9.3h2.1v3.6h2.9V122.1z"/>
                                                    <path class="svgClass8" d="M78.1,130.2c-0.9,0.9-2.1,1.4-3.4,1.4s-2.5-0.5-3.4-1.4s-1.4-2.1-1.4-3.4c0-1.4,0.5-2.5,1.4-3.4       s2.1-1.4,3.4-1.4s2.5,0.5,3.4,1.4s1.4,2.1,1.4,3.4C79.5,128.1,79,129.2,78.1,130.2z M72.7,128.7c0.5,0.5,1.2,0.8,1.9,0.8       c0.8,0,1.4-0.3,1.9-0.8c0.5-0.5,0.8-1.2,0.8-2s-0.3-1.5-0.8-2c-0.5-0.5-1.2-0.8-1.9-0.8c-0.8,0-1.4,0.3-1.9,0.8       c-0.5,0.5-0.8,1.2-0.8,2S72.2,128.2,72.7,128.7z"/>
                                                    <path class="svgClass8" d="M86.7,130.7c-0.7,0.6-1.5,0.9-2.6,0.9s-1.9-0.3-2.6-0.9s-1-1.4-1-2.3v-6.3h2.1v6.1c0,0.9,0.5,1.3,1.5,1.3       c1,0,1.5-0.4,1.5-1.3v-6.1h2.1v6.3C87.8,129.3,87.4,130.1,86.7,130.7z"/>
                                                    <path class="svgClass8" d="M94.2,131.4l-1.8-3.1h-1v3.1h-2.1v-9.3H93c0.9,0,1.6,0.3,2.3,0.9s0.9,1.4,0.9,2.3c0,0.6-0.2,1.1-0.5,1.6       c-0.3,0.5-0.7,0.9-1.2,1.1l2,3.4H94.2z M91.4,124v2.4H93c0.3,0,0.5-0.1,0.8-0.3c0.2-0.2,0.3-0.5,0.3-0.9c0-0.3-0.1-0.6-0.3-0.9       c-0.2-0.2-0.5-0.3-0.8-0.3H91.4z"/>
                                                </g>
                                                <g>
                                                    <g>
                                                        <g>
                                                            <path class="svgClass7" d="M136.4,154.9H43.9c-0.8,0-1.4-0.6-1.4-1.4v-16.1c0-0.6,0.5-1,1-1h98.1c0.6,0,1,0.5,1,1v11.3         C142.6,152.1,139.8,154.9,136.4,154.9z"/>
                                                        </g>
                                                        <g>
                                                            <path class="svgClass8" d="M136.4,155.7H43.9c-1.2,0-2.2-1-2.2-2.2v-16.1c0-1,0.8-1.8,1.8-1.8h98.1c1,0,1.8,0.8,1.8,1.8v11.3         C143.4,152.5,140.3,155.7,136.4,155.7z M43.5,137.2c-0.1,0-0.2,0.1-0.2,0.2v16.1c0,0.3,0.3,0.6,0.6,0.6h92.5         c3,0,5.4-2.4,5.4-5.4v-11.3c0-0.1-0.1-0.2-0.2-0.2H43.5z"/>
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <path class="svgClass1" d="M54.6,145.7v0.5c0,0.9-0.3,1.6-0.8,2.1s-1.3,0.8-2.1,0.8c-0.9,0-1.7-0.3-2.3-0.9        c-0.6-0.6-0.9-1.3-0.9-2.2c0-0.9,0.3-1.6,0.9-2.2c0.6-0.6,1.4-0.9,2.2-0.9c0.6,0,1.1,0.1,1.5,0.4c0.5,0.3,0.8,0.6,1.1,1        L53,145c-0.1-0.2-0.3-0.4-0.6-0.5s-0.6-0.2-0.9-0.2c-0.5,0-0.9,0.2-1.3,0.5s-0.5,0.8-0.5,1.3c0,0.5,0.2,0.9,0.5,1.3        c0.3,0.3,0.8,0.5,1.4,0.5c0.8,0,1.3-0.3,1.5-0.9h-1.6v-1.2H54.6z"/>
                                                        <path class="svgClass1" d="M57.4,147.7h2.4v1.3H56v-6h3.7v1.3h-2.4v1h2.1v1.3h-2.1V147.7z"/>
                                                        <path class="svgClass1" d="M64.5,143.1h1.4v6h-1l-2.3-3.3v3.3h-1.4v-6h1l2.3,3.3V143.1z"/>
                                                        <path class="svgClass1" d="M68.9,147.7h2.4v1.3h-3.8v-6h3.7v1.3h-2.4v1h2.1v1.3h-2.1V147.7z"/>
                                                        <path class="svgClass1" d="M75.9,149.1l-1.1-2h-0.7v2h-1.4v-6h2.4c0.6,0,1.1,0.2,1.5,0.6s0.6,0.9,0.6,1.5c0,0.4-0.1,0.7-0.3,1        c-0.2,0.3-0.5,0.6-0.8,0.7l1.3,2.2H75.9z M74.1,144.3v1.5h1c0.2,0,0.3-0.1,0.5-0.2c0.1-0.1,0.2-0.3,0.2-0.5        c0-0.2-0.1-0.4-0.2-0.5c-0.1-0.1-0.3-0.2-0.5-0.2H74.1z"/>
                                                        <path class="svgClass1" d="M82.5,149.1l-0.3-0.9H80l-0.3,0.9h-1.5l2-6h1.7l2,6H82.5z M80.4,146.8h1.4l-0.7-2.2L80.4,146.8z"/>
                                                        <path class="svgClass1" d="M86.5,147.7h2.1v1.3h-3.5v-6h1.4V147.7z"/>
                                                        <path class="svgClass1" d="M92.7,143.1H94v6h-1.4V143.1z"/>
                                                        <path class="svgClass1" d="M99,143.1h1.4v6h-1l-2.3-3.3v3.3h-1.4v-6h1l2.3,3.3V143.1z"/>
                                                        <path class="svgClass1" d="M104.5,143.1c0.8,0,1.5,0.3,2.1,0.9s0.8,1.3,0.8,2.1s-0.3,1.6-0.8,2.1s-1.2,0.9-2.1,0.9h-2.4v-6H104.5z         M104.5,147.7c0.5,0,0.9-0.2,1.2-0.5c0.3-0.3,0.4-0.7,0.4-1.2c0-0.5-0.1-0.9-0.4-1.2c-0.3-0.3-0.7-0.5-1.2-0.5h-1v3.4H104.5z"/>
                                                        <path class="svgClass1" d="M112.7,148.6c-0.4,0.4-1,0.6-1.7,0.6c-0.7,0-1.2-0.2-1.7-0.6c-0.4-0.4-0.7-0.9-0.7-1.5v-4.1h1.4v3.9        c0,0.6,0.3,0.8,0.9,0.8s0.9-0.3,0.9-0.8v-3.9h1.4v4.1C113.3,147.8,113.1,148.3,112.7,148.6z"/>
                                                        <path class="svgClass1" d="M117.1,149.2c-0.6,0-1.1-0.1-1.5-0.4s-0.7-0.6-0.9-1.1l1.2-0.7c0.2,0.6,0.7,0.8,1.3,0.8        c0.5,0,0.8-0.2,0.8-0.5c0-0.2-0.1-0.3-0.3-0.4c-0.2-0.1-0.5-0.2-1-0.3c-0.3-0.1-0.5-0.1-0.7-0.2s-0.4-0.2-0.6-0.3        c-0.2-0.1-0.3-0.3-0.4-0.5c-0.1-0.2-0.1-0.5-0.1-0.7c0-0.6,0.2-1,0.6-1.3s0.9-0.5,1.4-0.5c0.5,0,0.9,0.1,1.3,0.3        c0.4,0.2,0.7,0.6,0.9,1L118,145c-0.1-0.2-0.2-0.4-0.4-0.5s-0.4-0.2-0.6-0.2c-0.2,0-0.4,0-0.5,0.1c-0.1,0.1-0.2,0.2-0.2,0.3        c0,0.1,0.1,0.3,0.2,0.4s0.4,0.2,0.9,0.4c0.2,0.1,0.4,0.1,0.6,0.2c0.1,0,0.3,0.1,0.5,0.2c0.2,0.1,0.4,0.2,0.5,0.3        c0.1,0.1,0.2,0.3,0.3,0.5c0.1,0.2,0.1,0.4,0.1,0.7c0,0.6-0.2,1-0.6,1.3C118.3,149,117.7,149.2,117.1,149.2z"/>
                                                        <path class="svgClass1" d="M124.4,143.1v1.3h-1.5v4.7h-1.4v-4.7H120v-1.3H124.4z"/>
                                                        <path class="svgClass1" d="M128.8,149.1l-1.1-2H127v2h-1.4v-6h2.4c0.6,0,1.1,0.2,1.5,0.6s0.6,0.9,0.6,1.5c0,0.4-0.1,0.7-0.3,1        c-0.2,0.3-0.5,0.6-0.8,0.7l1.3,2.2H128.8z M127,144.3v1.5h1c0.2,0,0.3-0.1,0.5-0.2c0.1-0.1,0.2-0.3,0.2-0.5        c0-0.2-0.1-0.4-0.2-0.5c-0.1-0.1-0.3-0.2-0.5-0.2H127z"/>
                                                        <path class="svgClass1" d="M136.3,143.1l-2,3.7v2.3h-1.4v-2.3l-2-3.7h1.6l1.1,2.3l1.1-2.3H136.3z"/>
                                                    </g>
                                                </g>
                                                <g>
                                                    <path class="svgClass2" d="M150,138.6h-47.9V109h58.5v19C160.6,133.9,155.9,138.6,150,138.6z"/>
                                                    <g>
                                                        <path class="svgClass8" d="M150.7,139.5h-46.2c-1.7,0-3.1-1.4-3.1-3.1v-25.8c0-1.3,1.1-2.4,2.4-2.4H159c1.3,0,2.4,1.1,2.4,2.4v18.1        C161.5,134.6,156.6,139.5,150.7,139.5z M103.9,109.8c-0.4,0-0.8,0.3-0.8,0.8v25.8c0,0.8,0.6,1.4,1.4,1.4h46.2        c5,0,9.1-4.1,9.1-9.1v-18.1c0-0.4-0.3-0.8-0.8-0.8H103.9z"/>
                                                    </g>
                                                    <g>
                                                        <path class="svgClass8" d="M126.5,123.4c0,1.1-0.3,2-1,2.6s-1.6,1.1-2.6,1.2v1.6h-1.2v-1.6c-1-0.1-1.9-0.4-2.6-0.9s-1.2-1.2-1.6-2        l2.5-1.4c0.4,0.9,0.9,1.4,1.7,1.5V122c0,0-0.1,0-0.1,0c-0.1,0-0.1,0-0.1,0c-0.4-0.2-0.7-0.3-1-0.4c-0.3-0.1-0.6-0.3-0.9-0.5        s-0.6-0.5-0.8-0.7s-0.4-0.6-0.5-1c-0.1-0.4-0.2-0.8-0.2-1.3c0-1.1,0.4-2,1.1-2.6s1.6-1,2.6-1.1v-1.6h1.2v1.6        c1.7,0.2,2.8,1.1,3.5,2.6l-2.4,1.4c-0.2-0.6-0.6-1-1.1-1.2v2.4c0.1,0,0.3,0.1,0.6,0.2s0.6,0.2,0.7,0.3c0.1,0,0.3,0.1,0.6,0.3        c0.3,0.1,0.5,0.3,0.6,0.4c0.1,0.1,0.3,0.3,0.5,0.5s0.3,0.4,0.4,0.6c0.1,0.2,0.2,0.4,0.2,0.7        C126.4,122.8,126.5,123.1,126.5,123.4z M120.8,118c0,0.4,0.3,0.7,0.8,1v-1.9C121,117.3,120.8,117.5,120.8,118z M122.8,124.4        c0.5-0.1,0.8-0.5,0.8-0.9c0-0.4-0.3-0.7-0.8-1V124.4z"/>
                                                        <path class="svgClass8" d="M126.8,114.5h8.2v2.4l-4.1,10.1h-3l3.9-9.7h-5V114.5z"/>
                                                        <path class="svgClass8" d="M144.4,125.5c-0.9,1.2-2.1,1.8-3.7,1.8s-2.8-0.6-3.7-1.8c-0.9-1.2-1.3-2.8-1.3-4.7c0-2,0.4-3.5,1.3-4.7        c0.9-1.2,2.1-1.8,3.7-1.8s2.8,0.6,3.7,1.8c0.9,1.2,1.3,2.8,1.3,4.7C145.7,122.7,145.3,124.3,144.4,125.5z M138.4,120.8        c0,2.5,0.7,3.7,2.2,3.7s2.2-1.2,2.2-3.7s-0.7-3.7-2.2-3.7S138.4,118.3,138.4,120.8z"/>
                                                    </g>
                                                    <g>
                                                        <path class="svgClass27" d="M128.6,133.8c0,0.4-0.1,0.8-0.4,1c-0.3,0.3-0.6,0.4-1,0.5v0.6h-0.5v-0.6c-0.4,0-0.7-0.1-1-0.3        c-0.3-0.2-0.5-0.5-0.6-0.8l1-0.6c0.1,0.3,0.4,0.5,0.7,0.6v-1c0,0,0,0,0,0c0,0,0,0,0,0c-0.1-0.1-0.3-0.1-0.4-0.2        s-0.2-0.1-0.3-0.2c-0.1-0.1-0.2-0.2-0.3-0.3c-0.1-0.1-0.1-0.2-0.2-0.4c-0.1-0.1-0.1-0.3-0.1-0.5c0-0.4,0.1-0.8,0.4-1        c0.3-0.2,0.6-0.4,1-0.4v-0.6h0.5v0.6c0.7,0.1,1.1,0.4,1.4,1l-0.9,0.6c-0.1-0.2-0.2-0.4-0.4-0.5v0.9c0,0,0.1,0,0.2,0.1        c0.1,0.1,0.2,0.1,0.3,0.1c0,0,0.1,0.1,0.2,0.1c0.1,0.1,0.2,0.1,0.2,0.2s0.1,0.1,0.2,0.2c0.1,0.1,0.1,0.2,0.2,0.2        c0,0.1,0.1,0.2,0.1,0.3C128.6,133.6,128.6,133.7,128.6,133.8z M126.4,131.7c0,0.1,0.1,0.3,0.3,0.4v-0.7        C126.5,131.4,126.4,131.5,126.4,131.7z M127.2,134.2c0.2-0.1,0.3-0.2,0.3-0.4c0-0.2-0.1-0.3-0.3-0.4V134.2z"/>
                                                        <path class="svgClass27" d="M131.9,132.7c0.4,0.3,0.6,0.7,0.6,1.2c0,0.5-0.2,0.8-0.5,1.1c-0.3,0.3-0.8,0.4-1.3,0.4s-1-0.1-1.3-0.4        c-0.3-0.3-0.5-0.6-0.5-1.1c0-0.5,0.2-0.9,0.6-1.2c-0.3-0.2-0.5-0.6-0.5-1c0-0.5,0.2-0.8,0.5-1.1c0.3-0.3,0.7-0.4,1.2-0.4        c0.5,0,0.9,0.1,1.2,0.4c0.3,0.3,0.5,0.6,0.5,1.1C132.4,132.1,132.3,132.5,131.9,132.7z M130.3,134.1c0.1,0.1,0.3,0.2,0.5,0.2        s0.4-0.1,0.5-0.2s0.2-0.2,0.2-0.4s-0.1-0.3-0.2-0.4s-0.3-0.2-0.5-0.2s-0.4,0.1-0.5,0.2c-0.1,0.1-0.2,0.2-0.2,0.4        S130.2,134,130.3,134.1z M131.2,131.4c-0.1-0.1-0.2-0.1-0.4-0.1c-0.2,0-0.3,0-0.4,0.1c-0.1,0.1-0.1,0.2-0.1,0.3        c0,0.1,0,0.3,0.1,0.3c0.1,0.1,0.2,0.1,0.4,0.1c0.2,0,0.3,0,0.4-0.1c0.1-0.1,0.1-0.2,0.1-0.3        C131.3,131.6,131.3,131.5,131.2,131.4z"/>
                                                        <path class="svgClass27" d="M136.6,132c0,0.4-0.1,0.7-0.3,1l-1.5,2.3h-1.3l1.1-1.5c-0.5,0-0.9-0.2-1.2-0.5c-0.3-0.3-0.5-0.7-0.5-1.2        c0-0.5,0.2-0.9,0.5-1.2c0.3-0.3,0.8-0.5,1.3-0.5c0.5,0,1,0.2,1.3,0.5C136.4,131.1,136.6,131.5,136.6,132z M134.3,131.5        c-0.1,0.1-0.2,0.3-0.2,0.5c0,0.2,0.1,0.4,0.2,0.5c0.1,0.1,0.3,0.2,0.5,0.2c0.2,0,0.4-0.1,0.5-0.2c0.1-0.1,0.2-0.3,0.2-0.5        c0-0.2-0.1-0.4-0.2-0.5c-0.1-0.1-0.3-0.2-0.5-0.2C134.6,131.3,134.4,131.4,134.3,131.5z"/>
                                                        <path class="svgClass27" d="M125,133.7v-0.3h11.8v0.3H125z"/>
                                                    </g>
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path class="svgClass8" d="M179.2,184.6c-0.9,0.9-2.1,1.4-3.4,1.4s-2.5-0.5-3.4-1.4c-0.9-0.9-1.4-2.1-1.4-3.4c0-1.3,0.5-2.5,1.4-3.4       s2.1-1.4,3.4-1.4s2.5,0.5,3.4,1.4c0.9,0.9,1.4,2.1,1.4,3.4C180.6,182.5,180.1,183.6,179.2,184.6z M173.2,183.7       c0.7,0.7,1.5,1,2.6,1s1.9-0.3,2.6-1s1-1.6,1-2.6c0-1-0.3-1.9-1-2.6c-0.7-0.7-1.5-1-2.6-1s-1.9,0.3-2.6,1c-0.7,0.7-1,1.6-1,2.6       C172.1,182.2,172.5,183,173.2,183.7z"/>
                                                    <path class="svgClass8" d="M184.4,186c-0.9,0-1.6-0.2-2.2-0.6c-0.6-0.4-1-1-1.3-1.7l1.1-0.6c0.4,1.1,1.2,1.7,2.5,1.7       c0.6,0,1.1-0.1,1.5-0.4s0.5-0.6,0.5-1c0-0.4-0.2-0.8-0.5-1s-0.9-0.5-1.7-0.7c-0.4-0.1-0.7-0.2-0.9-0.3s-0.5-0.2-0.8-0.3       c-0.3-0.2-0.5-0.3-0.7-0.5c-0.2-0.2-0.3-0.4-0.4-0.6c-0.1-0.3-0.2-0.6-0.2-0.9c0-0.8,0.3-1.4,0.9-1.9c0.6-0.5,1.3-0.7,2.1-0.7       c0.7,0,1.4,0.2,1.9,0.6c0.5,0.4,1,0.9,1.2,1.5l-1,0.6c-0.4-1-1.1-1.4-2.1-1.4c-0.5,0-0.9,0.1-1.2,0.4c-0.3,0.2-0.5,0.6-0.5,1       c0,0.4,0.1,0.7,0.4,0.9c0.3,0.2,0.8,0.4,1.5,0.7c0.3,0.1,0.4,0.1,0.5,0.2s0.3,0.1,0.5,0.2c0.2,0.1,0.4,0.2,0.5,0.2       s0.2,0.1,0.4,0.2c0.2,0.1,0.3,0.2,0.4,0.3c0.1,0.1,0.2,0.2,0.3,0.3c0.1,0.1,0.2,0.3,0.3,0.4c0.1,0.1,0.1,0.3,0.1,0.5       s0.1,0.4,0.1,0.6c0,0.8-0.3,1.5-0.9,1.9C186.1,185.7,185.4,186,184.4,186z"/>
                                                    <path class="svgClass8" d="M194.5,176.5h1.2v9.3h-1.2v-4.2h-4.5v4.2h-1.2v-9.3h1.2v4h4.5V176.5z"/>
                                                    <path class="svgClass8" d="M203.5,185.8l-0.8-2.1h-4.2l-0.8,2.1h-1.3l3.5-9.3h1.4l3.5,9.3H203.5z M198.9,182.6h3.3l-1.7-4.6       L198.9,182.6z"/>
                                                    <path class="svgClass8" d="M173,189.2h1.9v9.3h-2.1v-7.1l-1.7,0.5l-0.5-1.8L173,189.2z"/>
                                                    <path class="svgClass8" d="M182.8,197.4c-0.7,0.9-1.6,1.3-2.8,1.3c-1.2,0-2.1-0.4-2.8-1.3s-1-2.1-1-3.5s0.3-2.6,1-3.5       s1.6-1.3,2.8-1.3c1.2,0,2.1,0.4,2.8,1.3s1,2.1,1,3.5S183.4,196.5,182.8,197.4z M178.3,193.9c0,1.8,0.6,2.8,1.7,2.8       c1.1,0,1.7-0.9,1.7-2.8s-0.6-2.8-1.7-2.8C178.9,191.1,178.3,192,178.3,193.9z"/>
                                                    <path class="svgClass8" d="M193.3,189.2h2.1v9.3h-2.1v-3.7h-2.9v3.7h-2.1v-9.3h2.1v3.6h2.9V189.2z"/>
                                                    <path class="svgClass8" d="M204.9,197.3c-0.9,0.9-2.1,1.4-3.4,1.4s-2.5-0.5-3.4-1.4s-1.4-2.1-1.4-3.4s0.5-2.5,1.4-3.4       s2.1-1.4,3.4-1.4s2.5,0.5,3.4,1.4s1.4,2.1,1.4,3.4S205.9,196.4,204.9,197.3z M199.6,195.9c0.5,0.5,1.2,0.8,1.9,0.8       c0.8,0,1.4-0.3,1.9-0.8c0.5-0.5,0.8-1.2,0.8-2s-0.3-1.5-0.8-2c-0.5-0.5-1.2-0.8-1.9-0.8c-0.8,0-1.4,0.3-1.9,0.8       c-0.5,0.5-0.8,1.2-0.8,2S199.1,195.4,199.6,195.9z"/>
                                                    <path class="svgClass8" d="M213.6,197.9c-0.7,0.6-1.5,0.9-2.6,0.9s-1.9-0.3-2.6-0.9s-1-1.4-1-2.3v-6.3h2.1v6.1c0,0.9,0.5,1.3,1.5,1.3       c1,0,1.5-0.4,1.5-1.3v-6.1h2.1v6.3C214.6,196.5,214.3,197.3,213.6,197.9z"/>
                                                    <path class="svgClass8" d="M221,198.6l-1.8-3.1h-1v3.1h-2.1v-9.3h3.7c0.9,0,1.6,0.3,2.3,0.9s0.9,1.4,0.9,2.3c0,0.6-0.2,1.1-0.5,1.6       c-0.3,0.5-0.7,0.9-1.2,1.1l2,3.4H221z M218.3,191.2v2.4h1.6c0.3,0,0.5-0.1,0.8-0.3c0.2-0.2,0.3-0.5,0.3-0.9       c0-0.3-0.1-0.6-0.3-0.9c-0.2-0.2-0.5-0.3-0.8-0.3H218.3z"/>
                                                </g>
                                                <g>
                                                    <g>
                                                        <g>
                                                            <path class="svgClass7" d="M263.3,222h-92.5c-0.8,0-1.4-0.6-1.4-1.4v-16.1c0-0.6,0.5-1,1-1h98.1c0.6,0,1,0.5,1,1v11.3         C269.4,219.3,266.7,222,263.3,222z"/>
                                                        </g>
                                                        <g>
                                                            <path class="svgClass8" d="M263.3,222.9h-92.5c-1.2,0-2.2-1-2.2-2.2v-16.1c0-1,0.8-1.8,1.8-1.8h98.1c1,0,1.8,0.8,1.8,1.8v11.3         C270.3,219.7,267.1,222.9,263.3,222.9z M170.4,204.4c-0.1,0-0.2,0.1-0.2,0.2v16.1c0,0.3,0.3,0.6,0.6,0.6h92.5         c3,0,5.4-2.4,5.4-5.4v-11.3c0-0.1-0.1-0.2-0.2-0.2H170.4z"/>
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <path class="svgClass1" d="M179.2,215.9c-0.9,0-1.6-0.3-2.2-0.9s-0.9-1.3-0.9-2.2s0.3-1.6,0.9-2.2c0.6-0.6,1.3-0.9,2.2-0.9        c0.5,0,1,0.1,1.5,0.4c0.5,0.2,0.8,0.6,1.1,1l-1.2,0.7c-0.1-0.2-0.3-0.4-0.6-0.5c-0.2-0.1-0.5-0.2-0.8-0.2        c-0.5,0-1,0.2-1.3,0.5c-0.3,0.3-0.5,0.8-0.5,1.3s0.2,1,0.5,1.3c0.3,0.3,0.7,0.5,1.3,0.5c0.3,0,0.6-0.1,0.8-0.2        c0.2-0.1,0.4-0.3,0.6-0.5l1.2,0.7c-0.3,0.4-0.6,0.8-1.1,1C180.3,215.8,179.8,215.9,179.2,215.9z"/>
                                                        <path class="svgClass1" d="M187.4,215c-0.6,0.6-1.3,0.9-2.2,0.9c-0.9,0-1.6-0.3-2.2-0.9c-0.6-0.6-0.9-1.3-0.9-2.2        c0-0.9,0.3-1.6,0.9-2.2c0.6-0.6,1.3-0.9,2.2-0.9c0.9,0,1.6,0.3,2.2,0.9c0.6,0.6,0.9,1.3,0.9,2.2        C188.3,213.7,188,214.4,187.4,215z M184,214.1c0.3,0.3,0.7,0.5,1.2,0.5c0.5,0,0.9-0.2,1.2-0.5s0.5-0.8,0.5-1.3        c0-0.5-0.2-1-0.5-1.3s-0.8-0.5-1.2-0.5c-0.5,0-0.9,0.2-1.2,0.5s-0.5,0.8-0.5,1.3C183.5,213.4,183.6,213.8,184,214.1z"/>
                                                        <path class="svgClass1" d="M192.4,209.8h1.4v6h-1l-2.3-3.3v3.3h-1.4v-6h1l2.3,3.3V209.8z"/>
                                                        <path class="svgClass1" d="M196.8,215.9c-0.6,0-1.1-0.1-1.5-0.4s-0.7-0.6-0.9-1.1l1.2-0.7c0.2,0.6,0.7,0.8,1.3,0.8        c0.5,0,0.8-0.2,0.8-0.5c0-0.2-0.1-0.3-0.3-0.4c-0.2-0.1-0.5-0.2-1-0.3c-0.3-0.1-0.5-0.1-0.7-0.2s-0.4-0.2-0.6-0.3        c-0.2-0.1-0.3-0.3-0.4-0.5c-0.1-0.2-0.1-0.5-0.1-0.7c0-0.6,0.2-1,0.6-1.3s0.9-0.5,1.4-0.5c0.5,0,0.9,0.1,1.3,0.3        c0.4,0.2,0.7,0.6,0.9,1l-1.2,0.7c-0.1-0.2-0.2-0.4-0.4-0.5s-0.4-0.2-0.6-0.2c-0.2,0-0.4,0-0.5,0.1c-0.1,0.1-0.2,0.2-0.2,0.3        c0,0.1,0.1,0.3,0.2,0.4s0.4,0.2,0.9,0.4c0.2,0.1,0.4,0.1,0.6,0.2c0.1,0,0.3,0.1,0.5,0.2c0.2,0.1,0.4,0.2,0.5,0.3        c0.1,0.1,0.2,0.3,0.3,0.5c0.1,0.2,0.1,0.4,0.1,0.7c0,0.6-0.2,1-0.6,1.3C198,215.8,197.5,215.9,196.8,215.9z"/>
                                                        <path class="svgClass1" d="M203.6,209.8v1.3H202v4.7h-1.4v-4.7h-1.5v-1.3H203.6z"/>
                                                        <path class="svgClass1" d="M207.3,215.8l-1.1-2h-0.7v2h-1.4v-6h2.4c0.6,0,1.1,0.2,1.5,0.6s0.6,0.9,0.6,1.5c0,0.4-0.1,0.7-0.3,1        c-0.2,0.3-0.5,0.6-0.8,0.7l1.3,2.2H207.3z M205.5,211.1v1.5h1c0.2,0,0.3-0.1,0.5-0.2c0.1-0.1,0.2-0.3,0.2-0.5        c0-0.2-0.1-0.4-0.2-0.5c-0.1-0.1-0.3-0.2-0.5-0.2H205.5z"/>
                                                        <path class="svgClass1" d="M213.3,215.4c-0.4,0.4-1,0.6-1.7,0.6c-0.7,0-1.2-0.2-1.7-0.6c-0.4-0.4-0.7-0.9-0.7-1.5v-4.1h1.4v3.9        c0,0.6,0.3,0.8,0.9,0.8s0.9-0.3,0.9-0.8v-3.9h1.4v4.1C214,214.5,213.8,215,213.3,215.4z"/>
                                                        <path class="svgClass1" d="M217.8,215.9c-0.9,0-1.6-0.3-2.2-0.9s-0.9-1.3-0.9-2.2s0.3-1.6,0.9-2.2c0.6-0.6,1.3-0.9,2.2-0.9        c0.5,0,1,0.1,1.5,0.4c0.5,0.2,0.8,0.6,1.1,1l-1.2,0.7c-0.1-0.2-0.3-0.4-0.6-0.5c-0.2-0.1-0.5-0.2-0.8-0.2        c-0.5,0-1,0.2-1.3,0.5c-0.3,0.3-0.5,0.8-0.5,1.3s0.2,1,0.5,1.3c0.3,0.3,0.7,0.5,1.3,0.5c0.3,0,0.6-0.1,0.8-0.2        c0.2-0.1,0.4-0.3,0.6-0.5l1.2,0.7c-0.3,0.4-0.6,0.8-1.1,1C218.9,215.8,218.4,215.9,217.8,215.9z"/>
                                                        <path class="svgClass1" d="M225.1,209.8v1.3h-1.5v4.7h-1.4v-4.7h-1.5v-1.3H225.1z"/>
                                                        <path class="svgClass1" d="M225.7,209.8h1.4v6h-1.4V209.8z"/>
                                                        <path class="svgClass1" d="M233.1,215c-0.6,0.6-1.3,0.9-2.2,0.9c-0.9,0-1.6-0.3-2.2-0.9c-0.6-0.6-0.9-1.3-0.9-2.2        c0-0.9,0.3-1.6,0.9-2.2c0.6-0.6,1.3-0.9,2.2-0.9c0.9,0,1.6,0.3,2.2,0.9c0.6,0.6,0.9,1.3,0.9,2.2        C234,213.7,233.7,214.4,233.1,215z M229.7,214.1c0.3,0.3,0.7,0.5,1.2,0.5c0.5,0,0.9-0.2,1.2-0.5s0.5-0.8,0.5-1.3        c0-0.5-0.2-1-0.5-1.3s-0.8-0.5-1.2-0.5c-0.5,0-0.9,0.2-1.2,0.5s-0.5,0.8-0.5,1.3C229.2,213.4,229.3,213.8,229.7,214.1z"/>
                                                        <path class="svgClass1" d="M238.1,209.8h1.4v6h-1l-2.3-3.3v3.3h-1.4v-6h1l2.3,3.3V209.8z"/>
                                                        <path class="svgClass1" d="M243.5,216.7c-0.6-1.3-0.9-2.5-0.9-3.9s0.3-2.6,0.9-3.9h1.3c-0.6,1.3-0.9,2.5-0.9,3.9s0.3,2.6,0.9,3.9        H243.5z"/>
                                                        <path class="svgClass1" d="M246.8,214.5h2.4v1.3h-3.8v-6h3.7v1.3h-2.4v1h2.1v1.3h-2.1V214.5z"/>
                                                        <path class="svgClass1" d="M252.1,215.9c-0.6,0-1.1-0.1-1.5-0.4s-0.7-0.6-0.9-1.1l1.2-0.7c0.2,0.6,0.7,0.8,1.3,0.8        c0.5,0,0.8-0.2,0.8-0.5c0-0.2-0.1-0.3-0.3-0.4c-0.2-0.1-0.5-0.2-1-0.3c-0.3-0.1-0.5-0.1-0.7-0.2s-0.4-0.2-0.6-0.3        c-0.2-0.1-0.3-0.3-0.4-0.5c-0.1-0.2-0.1-0.5-0.1-0.7c0-0.6,0.2-1,0.6-1.3s0.9-0.5,1.4-0.5c0.5,0,0.9,0.1,1.3,0.3        c0.4,0.2,0.7,0.6,0.9,1l-1.2,0.7c-0.1-0.2-0.2-0.4-0.4-0.5s-0.4-0.2-0.6-0.2c-0.2,0-0.4,0-0.5,0.1c-0.1,0.1-0.2,0.2-0.2,0.3        c0,0.1,0.1,0.3,0.2,0.4s0.4,0.2,0.9,0.4c0.2,0.1,0.4,0.1,0.6,0.2c0.1,0,0.3,0.1,0.5,0.2c0.2,0.1,0.4,0.2,0.5,0.3        c0.1,0.1,0.2,0.3,0.3,0.5c0.1,0.2,0.1,0.4,0.1,0.7c0,0.6-0.2,1-0.6,1.3C253.3,215.8,252.7,215.9,252.1,215.9z"/>
                                                        <path class="svgClass1" d="M257.2,209.8c0.6,0,1.1,0.2,1.5,0.6s0.6,0.9,0.6,1.5s-0.2,1.1-0.6,1.5c-0.4,0.4-0.9,0.6-1.5,0.6h-0.9v1.9        h-1.4v-6H257.2z M257.2,212.7c0.2,0,0.4-0.1,0.5-0.2c0.1-0.1,0.2-0.3,0.2-0.5c0-0.2-0.1-0.4-0.2-0.5c-0.1-0.1-0.3-0.2-0.5-0.2        h-0.9v1.5H257.2z"/>
                                                        <path class="svgClass1" d="M260.8,216.7h-1.3c0.6-1.3,0.9-2.5,0.9-3.9s-0.3-2.6-0.9-3.9h1.3c0.6,1.3,0.9,2.5,0.9,3.9        S261.5,215.4,260.8,216.7z"/>
                                                    </g>
                                                </g>
                                                <g>
                                                    <path class="svgClass2" d="M278,205.8h-49v-29.6h58.5v20.1C287.5,201.6,283.2,205.8,278,205.8z"/>
                                                    <g>
                                                        <path class="svgClass8" d="M277.6,206.6h-46.2c-1.7,0-3.1-1.4-3.1-3.1v-25.8c0-1.3,1.1-2.4,2.4-2.4h55.1c1.3,0,2.4,1.1,2.4,2.4v18.1        C288.3,201.8,283.5,206.6,277.6,206.6z M230.8,177c-0.4,0-0.8,0.3-0.8,0.8v25.8c0,0.8,0.6,1.4,1.4,1.4h46.2        c5,0,9.1-4.1,9.1-9.1v-18.1c0-0.4-0.3-0.8-0.8-0.8H230.8z"/>
                                                    </g>
                                                    <g>
                                                        <path class="svgClass8" d="M253.7,190.6c0,1.1-0.3,2-1,2.6s-1.6,1.1-2.6,1.2v1.6h-1.2v-1.6c-1-0.1-1.9-0.4-2.6-0.9s-1.2-1.2-1.6-2        l2.5-1.4c0.4,0.9,0.9,1.4,1.7,1.5v-2.5c0,0-0.1,0-0.1,0c-0.1,0-0.1,0-0.1,0c-0.4-0.2-0.7-0.3-1-0.4c-0.3-0.1-0.6-0.3-0.9-0.5        s-0.6-0.5-0.8-0.7s-0.4-0.6-0.5-1c-0.1-0.4-0.2-0.8-0.2-1.3c0-1.1,0.4-2,1.1-2.6s1.6-1,2.6-1.1v-1.6h1.2v1.6        c1.7,0.2,2.8,1.1,3.5,2.6l-2.4,1.4c-0.2-0.6-0.6-1-1.1-1.2v2.4c0.1,0,0.3,0.1,0.6,0.2s0.6,0.2,0.7,0.3c0.1,0,0.3,0.1,0.6,0.3        c0.3,0.1,0.5,0.3,0.6,0.4c0.1,0.1,0.3,0.3,0.5,0.5s0.3,0.4,0.4,0.6c0.1,0.2,0.2,0.4,0.2,0.7        C253.7,190,253.7,190.3,253.7,190.6z M248,185.2c0,0.4,0.3,0.7,0.8,1v-1.9C248.3,184.4,248,184.7,248,185.2z M250.1,191.6        c0.5-0.1,0.8-0.5,0.8-0.9c0-0.4-0.3-0.7-0.8-1V191.6z"/>
                                                        <path class="svgClass8" d="M254.1,181.7h8.2v2.4l-4.1,10.1h-3l3.9-9.7h-5V181.7z"/>
                                                        <path class="svgClass8" d="M271.6,192.7c-0.9,1.2-2.1,1.8-3.7,1.8s-2.8-0.6-3.7-1.8c-0.9-1.2-1.3-2.8-1.3-4.7c0-2,0.4-3.5,1.3-4.7        c0.9-1.2,2.1-1.8,3.7-1.8s2.8,0.6,3.7,1.8c0.9,1.2,1.3,2.8,1.3,4.7C273,189.9,272.5,191.5,271.6,192.7z M265.7,188        c0,2.5,0.7,3.7,2.2,3.7s2.2-1.2,2.2-3.7s-0.7-3.7-2.2-3.7S265.7,185.5,265.7,188z"/>
                                                    </g>
                                                    <g>
                                                        <path class="svgClass27" d="M255.9,201c0,0.4-0.1,0.8-0.4,1c-0.3,0.3-0.6,0.4-1,0.5v0.6H254v-0.6c-0.4,0-0.7-0.1-1-0.3        c-0.3-0.2-0.5-0.5-0.6-0.8l1-0.6c0.1,0.3,0.4,0.5,0.7,0.6v-1c0,0,0,0,0,0c0,0,0,0,0,0c-0.1-0.1-0.3-0.1-0.4-0.2        s-0.2-0.1-0.3-0.2c-0.1-0.1-0.2-0.2-0.3-0.3c-0.1-0.1-0.1-0.2-0.2-0.4c-0.1-0.1-0.1-0.3-0.1-0.5c0-0.4,0.1-0.8,0.4-1        c0.3-0.2,0.6-0.4,1-0.4v-0.6h0.5v0.6c0.7,0.1,1.1,0.4,1.4,1l-0.9,0.6c-0.1-0.2-0.2-0.4-0.4-0.5v0.9c0,0,0.1,0,0.2,0.1        c0.1,0.1,0.2,0.1,0.3,0.1c0,0,0.1,0.1,0.2,0.1c0.1,0.1,0.2,0.1,0.2,0.2s0.1,0.1,0.2,0.2c0.1,0.1,0.1,0.2,0.2,0.2        c0,0.1,0.1,0.2,0.1,0.3C255.9,200.8,255.9,200.9,255.9,201z M253.7,198.9c0,0.1,0.1,0.3,0.3,0.4v-0.7        C253.8,198.6,253.7,198.7,253.7,198.9z M254.5,201.4c0.2-0.1,0.3-0.2,0.3-0.4c0-0.2-0.1-0.3-0.3-0.4V201.4z"/>
                                                        <path class="svgClass27" d="M259.2,199.9c0.4,0.3,0.6,0.7,0.6,1.2c0,0.5-0.2,0.8-0.5,1.1c-0.3,0.3-0.8,0.4-1.3,0.4s-1-0.1-1.3-0.4        c-0.3-0.3-0.5-0.6-0.5-1.1c0-0.5,0.2-0.9,0.6-1.2c-0.3-0.2-0.5-0.6-0.5-1c0-0.5,0.2-0.8,0.5-1.1c0.3-0.3,0.7-0.4,1.2-0.4        c0.5,0,0.9,0.1,1.2,0.4c0.3,0.3,0.5,0.6,0.5,1.1C259.7,199.3,259.5,199.6,259.2,199.9z M257.6,201.3c0.1,0.1,0.3,0.2,0.5,0.2        s0.4-0.1,0.5-0.2s0.2-0.2,0.2-0.4s-0.1-0.3-0.2-0.4s-0.3-0.2-0.5-0.2s-0.4,0.1-0.5,0.2c-0.1,0.1-0.2,0.2-0.2,0.4        S257.5,201.2,257.6,201.3z M258.4,198.6c-0.1-0.1-0.2-0.1-0.4-0.1c-0.2,0-0.3,0-0.4,0.1c-0.1,0.1-0.1,0.2-0.1,0.3        c0,0.1,0,0.3,0.1,0.3c0.1,0.1,0.2,0.1,0.4,0.1c0.2,0,0.3,0,0.4-0.1c0.1-0.1,0.1-0.2,0.1-0.3        C258.6,198.8,258.5,198.7,258.4,198.6z"/>
                                                        <path class="svgClass27" d="M263.8,199.2c0,0.4-0.1,0.7-0.3,1l-1.5,2.3h-1.3l1.1-1.5c-0.5,0-0.9-0.2-1.2-0.5        c-0.3-0.3-0.5-0.7-0.5-1.2c0-0.5,0.2-0.9,0.5-1.2c0.3-0.3,0.8-0.5,1.3-0.5c0.5,0,1,0.2,1.3,0.5        C263.7,198.3,263.8,198.7,263.8,199.2z M261.5,198.7c-0.1,0.1-0.2,0.3-0.2,0.5c0,0.2,0.1,0.4,0.2,0.5c0.1,0.1,0.3,0.2,0.5,0.2        c0.2,0,0.4-0.1,0.5-0.2c0.1-0.1,0.2-0.3,0.2-0.5c0-0.2-0.1-0.4-0.2-0.5c-0.1-0.1-0.3-0.2-0.5-0.2        C261.8,198.5,261.7,198.6,261.5,198.7z"/>
                                                        <path class="svgClass27" d="M252.2,200.9v-0.3H264v0.3H252.2z"/>
                                                    </g>
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path class="svgClass8" d="M50.3,176.5h1.2v9.3h-1l-4.8-7v7h-1.2v-9.3h1l4.8,6.9V176.5z"/>
                                                    <path class="svgClass8" d="M60.2,176.5l-3.3,5.5v3.8h-1.2V182l-3.3-5.5h1.4l2.5,4.4l2.5-4.4H60.2z"/>
                                                    <path class="svgClass8" d="M71.7,184.6c-0.9,0.9-2.1,1.4-3.4,1.4s-2.5-0.5-3.4-1.4c-0.9-0.9-1.4-2.1-1.4-3.4c0-1.3,0.5-2.5,1.4-3.4       s2.1-1.4,3.4-1.4s2.5,0.5,3.4,1.4c0.9,0.9,1.4,2.1,1.4,3.4C73.1,182.5,72.6,183.6,71.7,184.6z M65.7,183.7c0.7,0.7,1.5,1,2.6,1       s1.9-0.3,2.6-1s1-1.6,1-2.6c0-1-0.3-1.9-1-2.6c-0.7-0.7-1.5-1-2.6-1s-1.9,0.3-2.6,1c-0.7,0.7-1,1.6-1,2.6       C64.7,182.2,65,183,65.7,183.7z"/>
                                                    <path class="svgClass8" d="M76.9,186c-0.9,0-1.6-0.2-2.2-0.6c-0.6-0.4-1-1-1.3-1.7l1.1-0.6c0.4,1.1,1.2,1.7,2.5,1.7       c0.6,0,1.1-0.1,1.5-0.4s0.5-0.6,0.5-1c0-0.4-0.2-0.8-0.5-1s-0.9-0.5-1.7-0.7c-0.4-0.1-0.7-0.2-0.9-0.3s-0.5-0.2-0.8-0.3       c-0.3-0.2-0.5-0.3-0.7-0.5c-0.2-0.2-0.3-0.4-0.4-0.6c-0.1-0.3-0.2-0.6-0.2-0.9c0-0.8,0.3-1.4,0.9-1.9c0.6-0.5,1.3-0.7,2.1-0.7       c0.7,0,1.4,0.2,1.9,0.6c0.5,0.4,1,0.9,1.2,1.5l-1,0.6c-0.4-1-1.1-1.4-2.1-1.4c-0.5,0-0.9,0.1-1.2,0.4c-0.3,0.2-0.5,0.6-0.5,1       c0,0.4,0.1,0.7,0.4,0.9c0.3,0.2,0.8,0.4,1.5,0.7c0.3,0.1,0.4,0.1,0.5,0.2s0.3,0.1,0.5,0.2c0.2,0.1,0.4,0.2,0.5,0.2       s0.2,0.1,0.4,0.2c0.2,0.1,0.3,0.2,0.4,0.3c0.1,0.1,0.2,0.2,0.3,0.3c0.1,0.1,0.2,0.3,0.3,0.4c0.1,0.1,0.1,0.3,0.1,0.5       s0.1,0.4,0.1,0.6c0,0.8-0.3,1.5-0.9,1.9C78.7,185.7,77.9,186,76.9,186z"/>
                                                    <path class="svgClass8" d="M87,176.5h1.2v9.3H87v-4.2h-4.5v4.2h-1.2v-9.3h1.2v4H87V176.5z"/>
                                                    <path class="svgClass8" d="M96,185.8l-0.8-2.1h-4.2l-0.8,2.1H89l3.5-9.3h1.4l3.5,9.3H96z M91.5,182.6h3.3l-1.7-4.6L91.5,182.6z"/>
                                                    <path class="svgClass8" d="M48.5,193c0.6,0.2,1.1,0.5,1.4,1c0.4,0.5,0.5,1,0.5,1.6c0,1-0.3,1.7-1,2.3c-0.7,0.6-1.5,0.8-2.4,0.8       c-0.7,0-1.4-0.2-2-0.5c-0.6-0.3-1-0.8-1.3-1.5l1.8-1.1c0.2,0.7,0.7,1,1.4,1c0.4,0,0.7-0.1,0.9-0.3c0.2-0.2,0.3-0.4,0.3-0.7       c0-0.3-0.1-0.5-0.3-0.7s-0.5-0.3-0.9-0.3h-0.4l-0.8-1.2l1.7-2.1h-3.4v-2h6v1.7L48.5,193z"/>
                                                    <path class="svgClass8" d="M57.9,197.4c-0.7,0.9-1.6,1.3-2.8,1.3c-1.2,0-2.1-0.4-2.8-1.3s-1-2.1-1-3.5s0.3-2.6,1-3.5s1.6-1.3,2.8-1.3       c1.2,0,2.1,0.4,2.8,1.3s1,2.1,1,3.5S58.5,196.5,57.9,197.4z M53.4,193.9c0,1.8,0.6,2.8,1.7,2.8c1.1,0,1.7-0.9,1.7-2.8       s-0.6-2.8-1.7-2.8C54,191.1,53.4,192,53.4,193.9z"/>
                                                    <path class="svgClass8" d="M68.4,189.2h2.1v9.3h-2.1v-3.7h-2.9v3.7h-2.1v-9.3h2.1v3.6h2.9V189.2z"/>
                                                    <path class="svgClass8" d="M80,197.3c-0.9,0.9-2.1,1.4-3.4,1.4s-2.5-0.5-3.4-1.4s-1.4-2.1-1.4-3.4s0.5-2.5,1.4-3.4s2.1-1.4,3.4-1.4       s2.5,0.5,3.4,1.4s1.4,2.1,1.4,3.4S81,196.4,80,197.3z M74.7,195.9c0.5,0.5,1.2,0.8,1.9,0.8c0.8,0,1.4-0.3,1.9-0.8       c0.5-0.5,0.8-1.2,0.8-2s-0.3-1.5-0.8-2c-0.5-0.5-1.2-0.8-1.9-0.8c-0.8,0-1.4,0.3-1.9,0.8c-0.5,0.5-0.8,1.2-0.8,2       S74.2,195.4,74.7,195.9z"/>
                                                    <path class="svgClass8" d="M88.7,197.9c-0.7,0.6-1.5,0.9-2.6,0.9s-1.9-0.3-2.6-0.9s-1-1.4-1-2.3v-6.3h2.1v6.1c0,0.9,0.5,1.3,1.5,1.3       c1,0,1.5-0.4,1.5-1.3v-6.1h2.1v6.3C89.7,196.5,89.4,197.3,88.7,197.9z"/>
                                                    <path class="svgClass8" d="M96.1,198.6l-1.8-3.1h-1v3.1h-2.1v-9.3H95c0.9,0,1.6,0.3,2.3,0.9s0.9,1.4,0.9,2.3c0,0.6-0.2,1.1-0.5,1.6       c-0.3,0.5-0.7,0.9-1.2,1.1l2,3.4H96.1z M93.4,191.2v2.4H95c0.3,0,0.5-0.1,0.8-0.3c0.2-0.2,0.3-0.5,0.3-0.9       c0-0.3-0.1-0.6-0.3-0.9c-0.2-0.2-0.5-0.3-0.8-0.3H93.4z"/>
                                                </g>
                                                <g>
                                                    <g>
                                                        <g>
                                                            <path class="svgClass7" d="M136.4,222H43.9c-0.8,0-1.4-0.6-1.4-1.4v-16.1c0-0.6,0.5-1,1-1h98.1c0.6,0,1,0.5,1,1v11.3         C142.6,219.3,139.8,222,136.4,222z"/>
                                                        </g>
                                                        <g>
                                                            <path class="svgClass8" d="M136.4,222.9H43.9c-1.2,0-2.2-1-2.2-2.2v-16.1c0-1,0.8-1.8,1.8-1.8h98.1c1,0,1.8,0.8,1.8,1.8v11.3         C143.4,219.7,140.3,222.9,136.4,222.9z M43.5,204.4c-0.1,0-0.2,0.1-0.2,0.2v16.1c0,0.3,0.3,0.6,0.6,0.6h92.5         c3,0,5.4-2.4,5.4-5.4v-11.3c0-0.1-0.1-0.2-0.2-0.2H43.5z"/>
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <g>
                                                            <path class="svgClass1" d="M51.5,216.4c-0.9,0-1.6-0.3-2.2-0.9s-0.9-1.3-0.9-2.2s0.3-1.6,0.9-2.2c0.6-0.6,1.3-0.9,2.2-0.9         c0.5,0,1,0.1,1.5,0.4c0.5,0.2,0.8,0.6,1.1,1l-1.2,0.7c-0.1-0.2-0.3-0.4-0.6-0.5c-0.2-0.1-0.5-0.2-0.8-0.2         c-0.5,0-1,0.2-1.3,0.5c-0.3,0.3-0.5,0.8-0.5,1.3s0.2,1,0.5,1.3c0.3,0.3,0.7,0.5,1.3,0.5c0.3,0,0.6-0.1,0.8-0.2         c0.2-0.1,0.4-0.3,0.6-0.5l1.2,0.7c-0.3,0.4-0.6,0.8-1.1,1C52.6,216.2,52.1,216.4,51.5,216.4z"/>
                                                            <path class="svgClass1" d="M61.6,215.5c-0.6,0.6-1.3,0.9-2.2,0.9c-0.9,0-1.6-0.3-2.2-0.9c-0.6-0.6-0.9-1.3-0.9-2.2         c0-0.9,0.3-1.6,0.9-2.2c0.6-0.6,1.3-0.9,2.2-0.9c0.9,0,1.6,0.3,2.2,0.9c0.6,0.6,0.9,1.3,0.9,2.2         C62.5,214.1,62.2,214.9,61.6,215.5z M58.2,214.5c0.3,0.3,0.7,0.5,1.2,0.5c0.5,0,0.9-0.2,1.2-0.5s0.5-0.8,0.5-1.3         c0-0.5-0.2-1-0.5-1.3s-0.8-0.5-1.2-0.5c-0.5,0-0.9,0.2-1.2,0.5s-0.5,0.8-0.5,1.3C57.7,213.8,57.8,214.2,58.2,214.5z"/>
                                                            <path class="svgClass1" d="M68.5,210.3h1.4v6h-1l-2.3-3.3v3.3h-1.4v-6h1l2.3,3.3V210.3z"/>
                                                            <path class="svgClass1" d="M74.8,216.4c-0.6,0-1.1-0.1-1.5-0.4s-0.7-0.6-0.9-1.1l1.2-0.7c0.2,0.6,0.7,0.8,1.3,0.8         c0.5,0,0.8-0.2,0.8-0.5c0-0.2-0.1-0.3-0.3-0.4c-0.2-0.1-0.5-0.2-1-0.3c-0.3-0.1-0.5-0.1-0.7-0.2s-0.4-0.2-0.6-0.3         c-0.2-0.1-0.3-0.3-0.4-0.5c-0.1-0.2-0.1-0.5-0.1-0.7c0-0.6,0.2-1,0.6-1.3s0.9-0.5,1.4-0.5c0.5,0,0.9,0.1,1.3,0.3         c0.4,0.2,0.7,0.6,0.9,1l-1.2,0.7c-0.1-0.2-0.2-0.4-0.4-0.5s-0.4-0.2-0.6-0.2c-0.2,0-0.4,0-0.5,0.1c-0.1,0.1-0.2,0.2-0.2,0.3         c0,0.1,0.1,0.3,0.2,0.4s0.4,0.2,0.9,0.4c0.2,0.1,0.4,0.1,0.6,0.2c0.1,0,0.3,0.1,0.5,0.2c0.2,0.1,0.4,0.2,0.5,0.3         c0.1,0.1,0.2,0.3,0.3,0.5c0.1,0.2,0.1,0.4,0.1,0.7c0,0.6-0.2,1-0.6,1.3C76,216.2,75.5,216.4,74.8,216.4z"/>
                                                            <path class="svgClass1" d="M83.4,210.3v1.3h-1.5v4.7h-1.4v-4.7H79v-1.3H83.4z"/>
                                                            <path class="svgClass1" d="M89,216.2l-1.1-2h-0.7v2h-1.4v-6h2.4c0.6,0,1.1,0.2,1.5,0.6s0.6,0.9,0.6,1.5c0,0.4-0.1,0.7-0.3,1         c-0.2,0.3-0.5,0.6-0.8,0.7l1.3,2.2H89z M87.3,211.5v1.5h1c0.2,0,0.3-0.1,0.5-0.2c0.1-0.1,0.2-0.3,0.2-0.5         c0-0.2-0.1-0.4-0.2-0.5c-0.1-0.1-0.3-0.2-0.5-0.2H87.3z"/>
                                                            <path class="svgClass1" d="M96.9,215.8c-0.4,0.4-1,0.6-1.7,0.6c-0.7,0-1.2-0.2-1.7-0.6c-0.4-0.4-0.7-0.9-0.7-1.5v-4.1h1.4v3.9         c0,0.6,0.3,0.8,0.9,0.8s0.9-0.3,0.9-0.8v-3.9h1.4v4.1C97.6,214.9,97.4,215.4,96.9,215.8z"/>
                                                            <path class="svgClass1" d="M103.3,216.4c-0.9,0-1.6-0.3-2.2-0.9s-0.9-1.3-0.9-2.2s0.3-1.6,0.9-2.2c0.6-0.6,1.3-0.9,2.2-0.9         c0.5,0,1,0.1,1.5,0.4c0.5,0.2,0.8,0.6,1.1,1l-1.2,0.7c-0.1-0.2-0.3-0.4-0.6-0.5c-0.2-0.1-0.5-0.2-0.8-0.2         c-0.5,0-1,0.2-1.3,0.5c-0.3,0.3-0.5,0.8-0.5,1.3s0.2,1,0.5,1.3c0.3,0.3,0.7,0.5,1.3,0.5c0.3,0,0.6-0.1,0.8-0.2         c0.2-0.1,0.4-0.3,0.6-0.5l1.2,0.7c-0.3,0.4-0.6,0.8-1.1,1C104.4,216.2,103.9,216.4,103.3,216.4z"/>
                                                            <path class="svgClass1" d="M112.4,210.3v1.3h-1.5v4.7h-1.4v-4.7H108v-1.3H112.4z"/>
                                                            <path class="svgClass1" d="M114.9,210.3h1.4v6h-1.4V210.3z"/>
                                                            <path class="svgClass1" d="M124.3,215.5c-0.6,0.6-1.3,0.9-2.2,0.9c-0.9,0-1.6-0.3-2.2-0.9c-0.6-0.6-0.9-1.3-0.9-2.2         c0-0.9,0.3-1.6,0.9-2.2c0.6-0.6,1.3-0.9,2.2-0.9c0.9,0,1.6,0.3,2.2,0.9c0.6,0.6,0.9,1.3,0.9,2.2         C125.2,214.1,124.9,214.9,124.3,215.5z M120.8,214.5c0.3,0.3,0.7,0.5,1.2,0.5c0.5,0,0.9-0.2,1.2-0.5s0.5-0.8,0.5-1.3         c0-0.5-0.2-1-0.5-1.3s-0.8-0.5-1.2-0.5c-0.5,0-0.9,0.2-1.2,0.5s-0.5,0.8-0.5,1.3C120.3,213.8,120.5,214.2,120.8,214.5z"/>
                                                            <path class="svgClass1" d="M131.2,210.3h1.4v6h-1l-2.3-3.3v3.3h-1.4v-6h1l2.3,3.3V210.3z"/>
                                                        </g>
                                                    </g>
                                                </g>
                                                <g>
                                                    <path class="svgClass2" d="M150.3,205.8h-48.2v-29.6h58.5v19.3C160.6,201.2,156,205.8,150.3,205.8z"/>
                                                    <g>
                                                        <path class="svgClass8" d="M150.7,206.6h-46.2c-1.7,0-3.1-1.4-3.1-3.1v-25.8c0-1.3,1.1-2.4,2.4-2.4H159c1.3,0,2.4,1.1,2.4,2.4v18.1        C161.5,201.8,156.6,206.6,150.7,206.6z M103.9,177c-0.4,0-0.8,0.3-0.8,0.8v25.8c0,0.8,0.6,1.4,1.4,1.4h46.2        c5,0,9.1-4.1,9.1-9.1v-18.1c0-0.4-0.3-0.8-0.8-0.8H103.9z"/>
                                                    </g>
                                                    <g>
                                                        <path class="svgClass8" d="M121.9,190.6c0,1.1-0.3,2-1,2.6s-1.6,1.1-2.6,1.2v1.6H117v-1.6c-1-0.1-1.9-0.4-2.6-0.9s-1.2-1.2-1.6-2        l2.5-1.4c0.4,0.9,0.9,1.4,1.7,1.5v-2.5c0,0-0.1,0-0.1,0c-0.1,0-0.1,0-0.1,0c-0.4-0.2-0.7-0.3-1-0.4c-0.3-0.1-0.6-0.3-0.9-0.5        s-0.6-0.5-0.8-0.7s-0.4-0.6-0.5-1c-0.1-0.4-0.2-0.8-0.2-1.3c0-1.1,0.4-2,1.1-2.6s1.6-1,2.6-1.1v-1.6h1.2v1.6        c1.7,0.2,2.8,1.1,3.5,2.6l-2.4,1.4c-0.2-0.6-0.6-1-1.1-1.2v2.4c0.1,0,0.3,0.1,0.6,0.2s0.6,0.2,0.7,0.3c0.1,0,0.3,0.1,0.6,0.3        c0.3,0.1,0.5,0.3,0.6,0.4c0.1,0.1,0.3,0.3,0.5,0.5s0.3,0.4,0.4,0.6c0.1,0.2,0.2,0.4,0.2,0.7        C121.8,190,121.9,190.3,121.9,190.6z M116.2,185.2c0,0.4,0.3,0.7,0.8,1v-1.9C116.4,184.4,116.2,184.7,116.2,185.2z         M118.2,191.6c0.5-0.1,0.8-0.5,0.8-0.9c0-0.4-0.3-0.7-0.8-1V191.6z"/>
                                                        <path class="svgClass8" d="M125.7,181.7h2.5v12.5h-2.9v-9.5l-2.2,0.6l-0.7-2.4L125.7,181.7z"/>
                                                        <path class="svgClass8" d="M134.5,186.1c1.2,0,2.2,0.4,3.1,1.1c0.8,0.7,1.2,1.8,1.2,3.1c0,1.3-0.4,2.3-1.3,3.1        c-0.9,0.7-2,1.1-3.2,1.1c-1,0-1.9-0.2-2.7-0.7c-0.8-0.4-1.4-1.1-1.7-2l2.5-1.4c0.3,0.9,1,1.3,2,1.3c0.6,0,1-0.1,1.3-0.4        c0.3-0.3,0.4-0.6,0.4-1s-0.1-0.7-0.4-1c-0.3-0.3-0.7-0.4-1.2-0.4h-3.9l0.5-7.2h7.2v2.7h-4.5l-0.1,1.7H134.5z"/>
                                                        <path class="svgClass8" d="M148.5,192.7c-0.9,1.2-2.1,1.8-3.7,1.8s-2.8-0.6-3.7-1.8c-0.9-1.2-1.3-2.8-1.3-4.7c0-2,0.4-3.5,1.3-4.7        c0.9-1.2,2.1-1.8,3.7-1.8s2.8,0.6,3.7,1.8c0.9,1.2,1.3,2.8,1.3,4.7C149.8,189.9,149.4,191.5,148.5,192.7z M142.5,188        c0,2.5,0.7,3.7,2.2,3.7s2.2-1.2,2.2-3.7s-0.7-3.7-2.2-3.7S142.5,185.5,142.5,188z"/>
                                                    </g>
                                                    <g>
                                                        <path class="svgClass27" d="M127,201c0,0.4-0.1,0.8-0.4,1c-0.3,0.3-0.6,0.4-1,0.5v0.6h-0.5v-0.6c-0.4,0-0.7-0.1-1-0.3        c-0.3-0.2-0.5-0.5-0.6-0.8l1-0.6c0.1,0.3,0.4,0.5,0.7,0.6v-1c0,0,0,0,0,0c0,0,0,0,0,0c-0.1-0.1-0.3-0.1-0.4-0.2        s-0.2-0.1-0.3-0.2c-0.1-0.1-0.2-0.2-0.3-0.3c-0.1-0.1-0.1-0.2-0.2-0.4c-0.1-0.1-0.1-0.3-0.1-0.5c0-0.4,0.1-0.8,0.4-1        c0.3-0.2,0.6-0.4,1-0.4v-0.6h0.5v0.6c0.7,0.1,1.1,0.4,1.4,1L126,199c-0.1-0.2-0.2-0.4-0.4-0.5v0.9c0,0,0.1,0,0.2,0.1        c0.1,0.1,0.2,0.1,0.3,0.1c0,0,0.1,0.1,0.2,0.1c0.1,0.1,0.2,0.1,0.2,0.2s0.1,0.1,0.2,0.2c0.1,0.1,0.1,0.2,0.2,0.2        c0,0.1,0.1,0.2,0.1,0.3C127,200.8,127,200.9,127,201z M124.7,198.9c0,0.1,0.1,0.3,0.3,0.4v-0.7        C124.8,198.6,124.7,198.7,124.7,198.9z M125.5,201.4c0.2-0.1,0.3-0.2,0.3-0.4c0-0.2-0.1-0.3-0.3-0.4V201.4z"/>
                                                        <path class="svgClass27" d="M128.5,197.5h1v4.9h-1.1v-3.7l-0.9,0.2l-0.3-1L128.5,197.5z"/>
                                                        <path class="svgClass27" d="M133.1,199.9c0.4,0.3,0.6,0.7,0.6,1.2c0,0.5-0.2,0.8-0.5,1.1c-0.3,0.3-0.8,0.4-1.3,0.4s-1-0.1-1.3-0.4        c-0.3-0.3-0.5-0.6-0.5-1.1c0-0.5,0.2-0.9,0.6-1.2c-0.3-0.2-0.5-0.6-0.5-1c0-0.5,0.2-0.8,0.5-1.1c0.3-0.3,0.7-0.4,1.2-0.4        c0.5,0,0.9,0.1,1.2,0.4c0.3,0.3,0.5,0.6,0.5,1.1C133.6,199.3,133.4,199.6,133.1,199.9z M131.4,201.3c0.1,0.1,0.3,0.2,0.5,0.2        s0.4-0.1,0.5-0.2s0.2-0.2,0.2-0.4s-0.1-0.3-0.2-0.4s-0.3-0.2-0.5-0.2s-0.4,0.1-0.5,0.2c-0.1,0.1-0.2,0.2-0.2,0.4        S131.3,201.2,131.4,201.3z M132.3,198.6c-0.1-0.1-0.2-0.1-0.4-0.1c-0.2,0-0.3,0-0.4,0.1c-0.1,0.1-0.1,0.2-0.1,0.3        c0,0.1,0,0.3,0.1,0.3c0.1,0.1,0.2,0.1,0.4,0.1c0.2,0,0.3,0,0.4-0.1c0.1-0.1,0.1-0.2,0.1-0.3        C132.4,198.8,132.4,198.7,132.3,198.6z"/>
                                                        <path class="svgClass27" d="M137.7,199.2c0,0.4-0.1,0.7-0.3,1l-1.5,2.3h-1.3l1.1-1.5c-0.5,0-0.9-0.2-1.2-0.5        c-0.3-0.3-0.5-0.7-0.5-1.2c0-0.5,0.2-0.9,0.5-1.2c0.3-0.3,0.8-0.5,1.3-0.5c0.5,0,1,0.2,1.3,0.5        C137.5,198.3,137.7,198.7,137.7,199.2z M135.4,198.7c-0.1,0.1-0.2,0.3-0.2,0.5c0,0.2,0.1,0.4,0.2,0.5c0.1,0.1,0.3,0.2,0.5,0.2        c0.2,0,0.4-0.1,0.5-0.2c0.1-0.1,0.2-0.3,0.2-0.5c0-0.2-0.1-0.4-0.2-0.5c-0.1-0.1-0.3-0.2-0.5-0.2        C135.7,198.5,135.5,198.6,135.4,198.7z"/>
                                                        <path class="svgClass27" d="M123.3,200.9v-0.3h14.6v0.3H123.3z"/>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                    <g>
                                        <defs>
                                            <rect id="SVGID_15_" x="-564.1" y="-3" width="328.5" height="302.5"/>
                                        </defs>
                                        <clipPath id="SVGID_6_">
                                            <use xlink:href="#SVGID_15_" style="overflow:visible;"/>
                                        </clipPath>
                                        <path style="clip-path:url(#SVGID_6_);fill:#1583C4;" d="M-129.2,473.4L-129.2,473.4c-179.6,0-325.1-145.6-325.1-325.1v0    c0-179.6,145.6-325.1,325.1-325.1h0c179.6,0,325.1,145.6,325.1,325.1v0C195.9,327.9,50.3,473.4-129.2,473.4z"/>
                                    </g>
                                    <g>
                                        <defs>
                                            <rect id="SVGID_17_" x="-765.7" y="-494.4" width="731.7" height="369.1"/>
                                        </defs>
                                        <clipPath id="SVGID_8_">
                                            <use xlink:href="#SVGID_17_" style="overflow:visible;"/>
                                        </clipPath>
                                        <path style="clip-path:url(#SVGID_8_);fill:#1583C4;" d="M-26.7,14.8L-26.7,14.8c-179.6,0-325.1-145.6-325.1-325.1v0    c0-179.6,145.6-325.1,325.1-325.1h0c179.6,0,325.1,145.6,325.1,325.1v0C298.5-130.8,152.9,14.8-26.7,14.8z"/>
                                    </g>
                                </g>
                            </svg> --}}
                            </div>
{{--                    </a>--}}
                </div>
            </div>
        </div>
    </div>

    {{--start satisfied --}}
    @include('partials._our_clients')
    {{--end satisfied --}}



    {{--why to enroll video section here--}}
    {{-- @include('partials._why_to_enroll_video_section', ['classes' => 'ptpx-50', 'slug' => 'rusty-osha-30']) --}}

    {{--slider--}}
    <div class="home-courses-feature">
    @include('partials._promotional_courses_slider')
    </div>
</section>
  {{-- start table --}}
  <div class="home-comparison-feature">
  @include('partials._comparison_features')
</div>
  {{-- end table --}}

{{-- start journey section --}}
@include('partials._start_your_journey', ['title' => 'Group Discount for Corporate Accounts ', 'btn_text' => 'CALCULATE NOW', 'btnLink' => "/group-enrollment"])
{{-- end journey section --}}
@include('partials._reviews_sa')



{{-- @include('partials._whyus_without_desc', ['backgroundWhite' => false]) --}}
<div class="home_bpl_section">
@include('partials._bpl_scholarship_partnerwithus')
</div>

<div class="bg-secondary ">
    @include('partials._faqs')
</div>
{{-- @include('partials._our_clients') --}}



@include('partials._latest_articles', ['classes' => ''])

<div class="home-courses-feature">
    <div class="page-heading">
        <h2 class="title">VIDEO TESTIMONIAL</h2>
    </div>
@include('partials._video_reviews_slider')
</div>

{{--why to enroll video section here--}}
@stack('modal_content')


@endsection
