@extends('layouts.master')

@section('title', isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Reviews | '.config('app.name') )

@section('styles')
    @if(isset($page['seo_tags']))
        @foreach($page['seo_tags'] as $meta_name => $meta_content)
            @if($meta_name != 'title')
                <meta name="{{ $meta_name }}" content="{{ $meta_content }}"/>
            @endif
        @endforeach
    @endif
    <meta property="og:title"
          content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Reviews' }}">
    <meta property="twitter:title"
          content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Reviews' }}">
    <meta property="og:description"
          content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'Reviews' }}">
    <meta property="twitter:description"
          content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'Reviews' }}">
    <meta property="og:image" content="{{ url('/images/reviews_og.png') }}">
    <meta property="twitter:image" content="{{ url('/images/reviews_og.png') }}">
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
            "name": "{{ isset($page['h1_heading']) ? $page['h1_heading'] : 'Reviews' }}"
        }
    }



    </script>
@endsection

@section('content')
    <div class="page-heading">
        <h1 class="title mbpx-0">
            HERE IS WHAT OUR LEARNERS ARE SAYING
{{--            {{ isset($page['h1_heading']) ? $page['h1_heading'] : 'Reviews' }}--}}
        </h1>
        <p class="subtitle"></p>
    </div>

    @include('partials._video_reviews_slider')

    <div id="shopper_review_page" class="container">
        <div id="review_header"></div>
        <div id="merchant_page"></div>
        <div id="review_image">
            <a href="https://www.shopperapproved.com/reviews/oshaoutreachcourses.com/"
               target="_blank"
               rel="nofollow"
            >
            </a>
        </div>
    </div>

    @include('partials._our_clients')

    <style>
        #review_header {
            text-align: center;
            margin-top: 15px;
        }

        #review_image .sa_logo {
            padding-right: 15px;
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
{{--    <script>--}}
{{--        $(window).bind("load", function () {--}}
{{--            setTimeout(function() {--}}
{{--                alert('All scripts finished loading');--}}

{{--                --}}
{{--            }, 200)--}}
{{--        });--}}
{{--    </script>--}}
@endsection

{{--@section('content')--}}
{{--<div class="page-heading">--}}
{{--    <h1 class="title mbpx-0">{{ isset($page['h1_heading']) ? $page['h1_heading'] : 'Reviews' }}</h1>--}}
{{--    <p class="subtitle"></p>--}}
{{--</div>--}}

{{--<section class="sec-padding page-testimonial">--}}
{{--    <div class="container">--}}
{{--        @foreach($reviews as $review)--}}
{{--            <div class="row testimonial">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="testimonial-logo testimonial_{{ $review->logo }}" id="testimonial-{{ $review->id }}"></div>--}}
{{--                    <strong>{{ $review->user }} @ {{ $review->company }}</strong><br>--}}
{{--                    @for($i = 1; $i <= 5; $i++)--}}
{{--                        @if($i <= $review->rating)--}}
{{--                            <i class="xicon icon-star-full"></i>--}}
{{--                        @else--}}
{{--                            <i class="xicon icon-star-empty"></i>--}}
{{--                        @endif--}}
{{--                    @endfor--}}
{{--                    <br>--}}
{{--                    <p>{{ $review->comment }}</p>--}}
{{--                    <p class="subtitle"></p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--</section>--}}

{{--<style>--}}
{{--    .page-testimonial .row.testimonial{--}}
{{--        max-width: unset;--}}
{{--    }--}}
{{--    .row.testimonial .subtitle {--}}
{{--        font-size: 18px;--}}
{{--        text-align: center;--}}
{{--        position: relative;--}}
{{--        padding-bottom: 30px;--}}
{{--    }--}}
{{--    .row.testimonial .subtitle:after{--}}
{{--        content: "";--}}
{{--        width: 60px;--}}
{{--        height: 2px;--}}
{{--        background-color: #005384 ;--}}
{{--        position: absolute;--}}
{{--        bottom: 0;--}}
{{--        left: 0;--}}
{{--        right: 0;--}}
{{--        margin: 0 auto;--}}
{{--    }--}}
{{--</style>--}}
{{--@endsection--}}
