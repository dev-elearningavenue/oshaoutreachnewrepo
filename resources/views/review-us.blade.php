@extends('layouts.master')

@section('title', isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Reviews | ' . config('app.name'))

@section('styles')
    @if (isset($page['seo_tags']))
        @foreach ($page['seo_tags'] as $meta_name => $meta_content)
            @if ($meta_name != 'title')
                <meta name="{{ $meta_name }}" content="{{ $meta_content }}" />
            @endif
        @endforeach
    @endif
    <meta property="og:title" content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Reviews' }}">
    <meta property="twitter:title" content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Reviews' }}">
    <meta property="og:description"
        content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'Reviews' }}">
    <meta property="twitter:description"
        content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'Reviews' }}">
    <meta property="og:image" content="{{ url('/images/reviews_og.png') }}">
    <meta property="twitter:image" content="{{ url('/images/reviews_og.png') }}">
    <!-- Meta Tags for Social Media -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="OSHA Outreach Courses">
    <meta property="fb:app_id" content="817832821974771" />
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
            "name": "{{ isset($page['h1_heading']) ? $page['h1_heading'] : 'Reviews' }}"
        }
    }

    </script>
@endsection

@section('content')

    <div class="review_us_banner_section">
        <div class="review_us_banner_wrapper">

        </div>
    </div>
    <style>
        .review_us_banner_section {
            background-image: url(/images/review-us-banner.png);
            width: 100%;
            height: 400px;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }
    </style>

    <section class="feedback">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div>
                        <h1>We Value Your Feedback</h1>
                    </div>
                    <div class="">
                        <p>we are committed to providing you with the best OSHA Online Training experience possible, and
                            your feedback is incredibly important to us.</p>
                    </div>
                    <div>
                        <small>We kindly ask you to take a moment to share your thoughts by leaving a review on the
                            following platforms:</small>
                    </div>
                </div>

            </div>
            <div class="row feedback_images">
                <div class="col-12 col-sm-4">
                    <div>
                        <div class="img_wrapper">
                            <img src="{{ asset('/images/shopper-approved-logo.png') }}" alt="">
                        </div>
                        <div>
                            <a href="https://www.shopperapproved.com/surveys/full.php?id=33391" target="_blank">RATE US</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="feedback_mobile_trustilot">
                        <div class="img_wrapper">
                            <img src="{{ asset('/images/trust-logo.png') }}" alt="">
                        </div>
                        <div>
                            <a href="https://www.trustpilot.com/evaluate/www.oshaoutreachcourses.com" target="_blank">RATE
                                US</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div>
                        <div class="img_wrapper">
                            <img src="{{ asset('/images/google-review-logo.png') }}" alt="">
                        </div>
                        <div>
                            <a href="https://g.page/r/CUuH4BgmXwizEB0/review" target="_blank">RATE US</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <style>
        .feedback ::selection {
            color: white !important;
            background-color: black !important;
            text-shadow: 0px 0px 0px rgb(255 255 255);
        }

        .feedback ::-moz-selection {
            color: white !important;
            background-color: black !important;
            text-shadow: 0px 0px 0px rgb(255 255 255);
        }

        .feedback {
            padding: 70px 0px;
        }

        .feedback h1 {
            background: var(--Gradient-One, linear-gradient(90deg, #0093E5 0.14%, #00C3C3 99.28%));
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-align: center;
            font-family: Poppins;
            font-size: 48px;
            font-style: normal;
            font-weight: 700;
            line-height: 50px;
            margin-bottom: 25px;
        }

        .feedback p {
            color: #434343;
            text-align: center;
            font-family: Poppins;
            font-size: 24px;
            font-style: normal;
            font-weight: 500;
            line-height: 39px;
            text-transform: capitalize;
            margin: 0 auto;
            width: 90%;
        }

        .feedback small {
            color: #434343;
            text-align: center;
            font-family: Poppins;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 39px;
            display: block;
            margin: 25px 0px;
        }

        .feedback_images {
            text-align: center;
        }

        .feedback_images .img_wrapper {
            width: 100%;
        }

        .feedback_images .img_wrapper img {
            width: 80%;
            margin: 0 auto;
        }

        .feedback_images a {
            border-radius: 45px;
            background: #000;
            color: #FFF;
            font-family: Poppins;
            font-size: 18px;
            font-style: normal;
            font-weight: 800;
            line-height: normal;
            letter-spacing: 1.8px;
            text-transform: uppercase;
            text-align: center;
            width: 70%;
            display: inline-block;
            padding: 12px 0px;
            margin-top: 35px;
            border: 1px solid #000000;
            transition: ease all 0.25s;
        }

        .feedback_images a:hover {
            background: #FFF;
            color: #000;
            border: 1px solid #000000;
        }

        @media (max-width: 768px) {
            .review_us_banner_section {
                height: 200px;
            }

            .feedback h1 {
                margin-bottom: 10px;
                font-size: 30px;
            }

            .feedback {
                padding: 30px 0px;
            }

            .feedback p {
                font-size: 20px;
                font-weight: 500;
                line-height: 30px;
            }

            .feedback small {
                line-height: 30px;
                margin: 20px 0px;
            }

            .feedback_images a {
                margin-top: 30px;
                width: 85%;
                padding: 5px 0px;
                font-size: 16px;
            }
        }

        @media (max-width: 576px) {
            .feedback_images a {
                margin-top: 15px;
            }

            .feedback_images .img_wrapper img {
                width: auto;
            }

            .feedback {
                padding: 30px 30px;
            }

            .feedback h1 {
                margin-bottom: 10px;
                font-size: 25px;
                line-height: normal;
            }

            .feedback p {
                font-size: 18px;
                line-height: normal;
            }

            .feedback small {
                line-height: normal;
                font-size: 15px;
            }

            .feedback_mobile_trustilot {
                margin: 30px 0px;
            }

            .feedback_images a {
                width: 50%;
            }
        }
    </style>

    <section>
        <div class="container join_youtube">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div>
                        <div>
                            <h2>Join Our Youtube Community for Exclusive Content</h2>
                        </div>
                        <div>
                            <a href="https://accounts.google.com/ServiceLogin?service=youtube&uilel=3&passive=true&continue=https%3A%2F%2Fwww.youtube.com%2Fsignin%3Faction_handle_signin%3Dtrue%26app%3Ddesktop%26hl%3Den%26next%3D%252Fchannel%252FUC6hlVORDb31JeAPypuSUdbQ%253Fsub_confirmation%253D1%2526feature%253Dsubscribe-embed-click%26feature%3Dsubscribe&hl=en"
                                target="_blank">SUBSCRIBE NOW</a>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-6">
                    <div class="join_youtube_img_wrapper">
                        <img src="{{ asset('/images/join-youtube.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .join_youtube {
            border-radius: 20px;
            background: linear-gradient(90deg, #E50000 0.14%, #5A0000 99.28%);
            margin-bottom: 70px;
        }

        .join_youtube h2 {
            color: #FFF;
            font-family: Poppins;
            font-size: 44px;
            font-style: normal;
            font-weight: 700;
            line-height: 55px;
        }

        .join_youtube {
            background: linear-gradient(90deg, #E50000 0.14%, #5A0000 99.28%);
            padding: 0px 30px 0 60px;
            border-radius: 20px;
        }

        .join_youtube_img_wrapper {
            width: 100%;
        }

        .join_youtube_img_wrapper img {
            width: 90%;
            padding: 30px 20px;
            margin: 0 auto;
        }

        .join_youtube .row {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .join_youtube a {
            border-radius: 45px;
            background: #000;
            color: #FFF;
            font-family: Poppins;
            font-size: 18px;
            font-style: normal;
            font-weight: 800;
            line-height: normal;
            letter-spacing: 1.8px;
            text-transform: uppercase;
            text-align: center;
            width: 70%;
            display: inline-block;
            padding: 12px 0px;
            margin-top: 40px;
            transition: ease all 0.25s;
        }

        .join_youtube a:hover {
            background: #FFF;
            color: #000;
        }

        @media (max-width: 992px) {
            .join_youtube_img_wrapper img {
                width: 100%;
            }

            .join_youtube h2 {
                font-size: 30px;
                line-height: 36px;
            }

            .join_youtube a {
                margin-top: 14px;
                font-size: 16px;

            }

        }

        @media (max-width: 768px) {
            .join_youtube h2 {
                font-size: 25px;
            }

            .join_youtube .row {
                flex-direction: column;
            }

            .join_youtube_img_wrapper img {
                width: 80%;
            }

            .join_youtube {
                padding: 30px 30px 0px 30px;
                text-align: center;
            }

            .join_youtube a {
                width: 50%;
            }

        }

        @media (max-width: 576px) {
            .join_youtube_img_wrapper img {
                width: 100%;
            }

            .join_youtube h2 {
                font-size: 20px;
                line-height: 30px;
            }

            .join_youtube a {
                width: auto;
                padding: 10px 20px;
            }

            .join_youtube {
                margin: 0px 30px 30px 30px;

            }
        }
    </style>

@endsection

@section('scripts')
    <script type="text/javascript">
        var sa_review_count = 15;
        var sa_date_format = 'F j, Y';
        var sa_product_foreign = '';

        function saLoadScript(src) {
            var js = window.document.createElement("script");
            js.src = src;
            js.type = "text/javascript";
            document.getElementsByTagName("head")[0].appendChild(js);
        }

        saLoadScript("https://www.shopperapproved.com/merchant/33391.js");
    </script>

@endsection

{{-- @endsection --}}
