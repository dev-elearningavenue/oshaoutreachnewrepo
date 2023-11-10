@extends('layouts.master')

@section('title', $page['seo_tags']['title'] ?? "OSHA Outreach Courses" )

@section('styles')
@if(isset($page['seo_tags']))
@foreach($page['seo_tags'] as $meta_name => $meta_content)
@if($meta_name != 'title')
<meta name="{{ $meta_name }}" content="{{ $meta_content }}" />
@endif
@endforeach
@endif
<meta property="og:title" content="{{ env('PROMOTION_PAGE_TITLE') }}">
<meta property="twitter:title" content="{{ env('PROMOTION_TEXT') }}">
<meta property="og:description"
    content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : env('PROMOTION_TEXT') }}">
<meta property="twitter:description"
    content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : env('PROMOTION_TEXT') }}">
<meta property="og:image" content="{{ url('/images/promotions/'. env('PROMOTION_NAME') .'/og-image-promotions.jpg') }}">
<meta property="twitter:image"
    content="{{ url('/images/promotions/'. env('PROMOTION_NAME') .'/og-image-promotions.jpg')  }}">
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
        "name": "{{ isset($page['h1_heading']) ? $page['h1_heading'] : env('PROMOTION_TEXT') }}"
    }
}
</script>

<style>
.videoReviewDetailPage .videoFrameWrapper iframe {
    height: 400px;
    width: 100%;
}

.videoReviewDetailPage .videoDesc .reviewBox {
    border: 1px solid #ddd;
    padding: 15px;
    margin-bottom: 15px;
    border-radius: 5px;
}

.videoReviewDetailPage .videoDesc .reviewBox p {
    color: #000;
    font-size: 18px;
    margin-bottom:15px;
}
@media screen and (max-width:580px) {
    .videoReviewDetailPage .videoFrameWrapper iframe{
        height:250px;
    }
}
</style>
@endsection

@section('content')

<section class="videoReviewDetailPage">
    <div class="container">
        <div class="videoFrameWrapper">
            <iframe
                src="https://www.youtube.com/embed/{{ $videoReview['code'] }}?cc_load_policy=1&modestbranding=1&color=white&iv_load_policy=3"
                srcdoc="
                                    <style>
                                        *{padding:0;margin:0;overflow:hidden}
                                        html,body{height:100%}
                                        img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}
                                        span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}
                                        video{width:100%;}
                                    </style>
                                    <a href=https://www.youtube.com/embed/{{ $videoReview['code'] }}?autoplay=1&cc_load_policy=1&modestbranding=1&color=white&iv_load_policy=3>
                                        <img src=https://img.youtube.com/vi/{{ $videoReview['code'] }}/hqdefault.jpg alt='OSHA OUTREACH VIDEO REVIEWS'>
                                        <span>▶</span>
                                    </a>" frameborder="0" allowfullscreen title="OSHA OUTREACH VIDEO REVIEWS"></iframe>
        </div>
        <div class="videoDesc">
            <div class="reviewBox">
                <p>
                    <b> Here's what {{ $videoReview['name'] }} had to say about oshaoutreachcourses.com in addition to
                        their video
                        testimonial:</b>
                </p>
                <p>
                    "{{ $videoReview['msg'] }}"
                </p>
                @if($reviewerCourse)
                    <p>
                        Course Taken: {{ $reviewerCourse->title }}
                    </p>
                @endif
                <p>
                    State: {{ $videoReview['location'] }}
                </p>
                <p>
                    Review Date: {{ $videoReview['course_date'] }}
                </p>
                <p>
                    {{ $videoReview['name'] }} also gave oshaoutreachcourses.com the following ratings:
                </p>
                <p>
                    Re buy: {{ $videoReview['rebuy_stars'] }}
                </p>
                <p>
                    Price: {{ $videoReview['price_stars'] }}
                </p>
                @if($videoReview['customer_service_stars'] !== "☆☆☆☆☆")
                    <p>
                        Customer Service: {{ $videoReview['customer_service_stars'] }}
                    </p>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
$(window).load(function() {
    resizeDivs();
    $(window).resize(function() {
        resizeDivs();
    });
});

function resizeDivs() {
    if ($(window).width() > 991) {
        $('.course').each(function() {
            var height = $(this).find('.image-div').height() - 20;
            console.log(height);
            $(this).find('.desc-div').height(height);
        })
    } else {
        $('.course').each(function() {
            $(this).find('.desc-div').removeAttr('style');
        });
    }
}

$('.close').click(function(e) {
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
    };
    //Enable Smooth Scroll js
    e.stopPropagation();
    e.preventDefault();
});
$('.close-btn-back').click(function(e) {
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
$('.course-outline-btn').click(function(e) {
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
@endsection
