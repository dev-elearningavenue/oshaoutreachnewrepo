@extends('layouts.master')

@section('title', isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'OSHA 10 and 30 |
'.config('app.name') )

@section('styles')
@if(isset($page['seo_tags']))
@foreach($page['seo_tags'] as $meta_name => $meta_content)
@if($meta_name != 'title')
<meta name="{{ $meta_name }}" content="{{ $meta_content }}" />
@endif
@endforeach
@endif
<meta property="og:title"
    content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'OSHA 10-HOUR & 30-HOUR TRAINING' }}">
<meta property="twitter:title"
    content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'OSHA 10-HOUR & 30-HOUR TRAINING' }}">
<meta property="og:description"
    content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'OSHA 10-HOUR & 30-HOUR TRAINING' }}">
<meta property="twitter:description"
    content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'OSHA 10-HOUR & 30-HOUR TRAINING' }}">
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
        "name": "{{ isset($page['h1_heading']) ? $page['h1_heading'] : 'OSHA 10-HOUR & 30-HOUR TRAINING' }}"
    }
}
</script>
@endsection

@section('content')
{{--why to enroll video section here--}}
@include('partials._why_to_enroll_video_section', ['classes' => 'mbpx-30', 'slug' => 'jose-osha-10'])

<section class="osha-courses">
    <div class="container">
        <div class="page-heading mbpx-20">
            <h1 class="h3 ta-center mtpx-0 mbpx-0">30-HOUR TRAINING</h1>
            <p class="subtitle"></p>
        </div>
        <div class="box --course-objectives">
            <p class="desc mbpx-20 mtpx-20">
                30-Hour Construction courses are designed for supervisory workers, making them understand the safety and
                hazards associated with the construction industry.
            </p>
        </div>
        <div class="row courses-10">
            @foreach($osha30 as $osha30Course)
            @php
            $osha30CourseAltTitle = removeOSHAFromCourseTitle($osha30Course->title);
            @endphp
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 mbpx-20">
                <div class="osha-course-box">
                    <a href="/{{ $osha30Course->slug }}">
                        <figure>
                            <picture>
                                <source srcset="{{ asset($osha30Course->imagePath.'.webp') }}" type="image/webp">
                                <source srcset="{{ asset($osha30Course->imagePath.'.jpg') }}" type="image/jpeg">
                                <img src="{{ asset($osha30Course->imagePath.'.jpg') }}"
                                    alt="{{ $osha30CourseAltTitle }}" title="{{ $osha30CourseAltTitle }}">
                            </picture>
                        </figure>
                    </a>

                    <div class="osha-course-bottom">
                        @if($osha30Course->discounted_price > 0)
                        <span class="osha-course-price fc-red">
                            ${{ $osha30Course->discounted_price }}
                            <small
                                class="fs-medium fc-black price-lt">${{ number_format($osha30Course->price, 0) }}</small>
                        </span>
                        @else
                        <span class="osha-course-price">${{ $osha30Course->price }}</span>
                        @endif<br />
                        @if($osha30Course->lms === LMS_TYPE_OSHA_OUTREACH)
                        <a href="{{ route('product.addToCart', ['id' => $osha30Course->id]) }}"
                            onclick="fbq('track', 'AddToCart', {currency: 'USD', value: '{{ $osha30Course->price }}' });"
                            class="btn --btn-primary --btn-small osha-course-purchase-btn enrollBtnText">
                        </a><br>
                        @else
                        <a href="https://oshaoutreachcourses.puresafety.com/Ondemand/ShoppingCart/AddToCart/301-{{$osha30Course->course_id}}"
                            onclick="fbq('track', 'AddToCart', {currency: 'USD', value: '{{ $osha30Course->price }}' });"
                            class="btn --btn-primary --btn-small osha-course-purchase-btn enrollBtnText">
                        </a><br>
                        @endif
                        <a href="/{{ $osha30Course->slug }}" class="view-course-link">VIEW COURSE</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="page-heading mbpx-20">
            <h1 class="h3 ta-center mtpx-0 mbpx-0">10-HOUR TRAINING</h1>
            <p class="subtitle"></p>
        </div>
        <div class="box --course-objectives">
            <p class="desc mbpx-20 mtpx-20">10-Hour courses are designed for entry level workers to understand safety
                associated with workplace.</p>
        </div>

        {{--  Bundle courses --}}
        <div class="row courses-30">
            @foreach($osha10 as $osha10Course)
            @php
            $osha10CourseAltTitle = removeOSHAFromCourseTitle($osha10Course->title);
            @endphp
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 mbpx-20">
                <div class="osha-course-box">
                    <a href="/{{ $osha10Course->slug }}">
                        <figure>
                            <picture>
                                <source srcset="{{ asset($osha10Course->imagePath.'.webp') }}" type="image/webp">
                                <source srcset="{{ asset($osha10Course->imagePath.'.jpg') }}" type="image/jpeg">
                                <img src="{{ asset($osha10Course->imagePath.'.jpg') }}"
                                    alt="{{ $osha10CourseAltTitle }}" title="{{ $osha10CourseAltTitle }}">
                            </picture>
                        </figure>
                    </a>

                    <div class="osha-course-bottom">
                        @if($osha10Course->discounted_price > 0)
                        <span class="osha-course-price fc-red">
                            ${{ $osha10Course->discounted_price }}
                            <small
                                class="fs-medium fc-black price-lt">${{ number_format($osha10Course->price, 0) }}</small>
                        </span>
                        @else
                        <span class="osha-course-price">${{ $osha10Course->price }}</span>
                        @endif<br />
                        @if($osha10Course->lms === LMS_TYPE_OSHA_OUTREACH)
                        <a href="{{ route('product.addToCart', ['id' => $osha10Course->id]) }}"
                            class="btn --btn-primary --btn-small osha-course-purchase-btn enrollBtnText"
                            onclick=" fbq('track', 'AddToCart', {currency: 'USD', value: '{{ $osha10Course->price }}' });">
                        </a><br>

                        {{-- @include('partials._enroll_lang_modal', ['course' => $osha10Course, 'variants' => json_decode($osha10Course->variants, true), 'modalId' => 'enroll-lang-modal-'.$osha10Course->id]) --}}
                        @else
                        <a href="https://oshaoutreachcourses.puresafety.com/Ondemand/ShoppingCart/AddToCart/301-{{$osha10Course->course_id}}"
                            onclick="fbq('track', 'AddToCart', {currency: 'USD', value: '{{ $osha10Course->price }}' });"
                            class="btn --btn-primary --btn-small osha-course-purchase-btn enrollBtnText">
                        </a><br>
                        @endif
                        <a href="/{{ $osha10Course->slug }}" class="view-course-link">VIEW COURSE</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="page-heading mbpx-20">
            <h1 class="h3 ta-center mtpx-0 mbpx-0">10 & 30 HOUR TRAINING</h1>
            <p class="subtitle"></p>
        </div>
        <div class="box --course-objectives">
            <p class="desc mbpx-20 mtpx-20">
                Bundle for 10 & 30 Hour Package educates you to take the necessary precautions for Site Health and
                Safety for Workers and Supervisors.
            </p>
        </div>

        <div class="row courses-30">
            @foreach($bundle as $bundleCourse)
            @php
            $bundleCourseAltTitle = removeOSHAFromCourseTitle($bundleCourse->title);
            @endphp
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 mbpx-20">
                <div class="osha-course-box">
                    <a href="/{{ $bundleCourse->slug }}">
                        <figure>
                            <picture>
                                <source srcset="{{ asset($bundleCourse->imagePath.'.webp') }}" type="image/webp">
                                <source srcset="{{ asset($bundleCourse->imagePath.'.jpg') }}" type="image/jpeg">
                                <img src="{{ asset($bundleCourse->imagePath.'.jpg') }}"
                                    alt="{{ $bundleCourseAltTitle }}" title="{{ $bundleCourseAltTitle }}">
                            </picture>
                        </figure>
                    </a>

                    <div class="osha-course-bottom">
                        @if($bundleCourse->discounted_price > 0)
                        <span class="osha-course-price fc-red">
                            ${{ $bundleCourse->discounted_price }}
                            <small
                                class="fs-medium fc-black price-lt">${{ number_format($bundleCourse->price, 0) }}</small>
                        </span>
                        @else
                        <span class="osha-course-price">${{ $bundleCourse->price }}</span>
                        @endif<br />
                        @if($bundleCourse->lms === LMS_TYPE_OSHA_OUTREACH)
                        <a href="{{ route('product.addToCart', ['id' => $bundleCourse->id]) }}"
                            class="btn --btn-primary --btn-small osha-course-purchase-btn enrollBtnText"
                            onclick=" fbq('track', 'AddToCart', {currency: 'USD', value: '{{ $bundleCourse->price }}' });">
                        </a><br>

                        {{-- @include('partials._enroll_lang_modal', ['course' => $osha10Course, 'variants' => json_decode($osha10Course->variants, true), 'modalId' => 'enroll-lang-modal-'.$osha10Course->id]) --}}
                        @else
                        <a href="https://oshaoutreachcourses.puresafety.com/Ondemand/ShoppingCart/AddToCart/301-{{$bundleCourse->course_id}}"
                            onclick="fbq('track', 'AddToCart', {currency: 'USD', value: '{{ $bundleCourse->price }}' });"
                            class="btn --btn-primary --btn-small osha-course-purchase-btn enrollBtnText">
                        </a><br>
                        @endif
                        <a href="/{{ $bundleCourse->slug }}" class="view-course-link">VIEW COURSE</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@include('partials._reviews_sa')

{{-- @include('partials._whyus_without_desc', ['backgroundWhite' => true]) --}}
@include('partials._comparison_features')

{{--why to enroll video section here--}}
@stack('modal_content')

{{--    @include('partials._banner_strip_new')--}}

@push('custom-css')
.osha-courses{
position: relative;
background-color: #ffffff;
margin-bottom: 30px;
}
.osha-course-box{
max-width: 258px;
text-align: center;
margin: 0 auto 50px;
}

.osha-course-box .content{
display: block;
background: #005384 ;
color: #FFFFFF;
padding: 20px 5px;
}

.osha-course-box .content p.title{
font-size: 18px;
line-height: 18px;
font-weight: bold;
text-transform: uppercase;
}

.osha-course-box .content p.title span{
display: block;
font-size: 18px;
font-weight: normal;
}

.osha-course-box figure{
display: block;
}

.osha-course-box .osha-course-bottom{
border: 1px solid #999;
border-top: none;
padding: 10px;
}

.osha-course-box .osha-course-price{
font-size: 36px;
font-weight: bold;
}

.osha-course-box .btn.\--btn-primary.osha-course-purchase-btn{
background-color: #ffb900;
color:#1f1d1e;
font-weight: bold;
}

.osha-course-box .view-course-link{
color: #005384 ;
font-weight: bold;
margin-top: 10px;
display: block;
text-decoration: underline;
}

@media (max-width: 767px){
.osha-course-box{
margin: 0;
}

{{-- .osha-course-box figure img{--}}
{{-- display: none;--}}
{{-- }--}}
.osha-course-box .content p.title{
font-size: 15px;
line-height: 15px;
width: 120px;
margin: 0 auto;
padding-top: 5%;
}
.osha-course-box .content p.title span{
font-size: 13px;
}
.osha-course-box .view-course-link{
margin-bottom: 10px;
}
.osha-course-box .btn.\--btn-primary.osha-course-purchase-btn{
padding: 8px 12px;
}
.osha-course-box .osha-course-bottom{
padding: 0px 10px;
}
.osha-course-box .content{
padding: 13px 5px;
}
}
@media (min-width:768px) and (max-width: 1200px) {
.osha-course-box .content p.title{
font-size: 16px;
line-height: 16px;
}
.osha-course-box .content p.title span{
font-size: 16px;
}
}

span small.fs-medium.fc-black.price-lt {
position: relative;
}

small.fs-medium.fc-black.price-lt:before {
display: block;
content: "";
position: absolute;
left: 5%;
top: 51%;
width: 100%;
height: 1.5px;
background-color: #fc4a1a;
transform: rotate(
-12deg
);
}

@media (max-width: 350px) {
span.osha-course-price.fc-red small {
display: block;
width: fit-content;
width: -webkit-fit-content;
width: -moz-fit-content;
margin: auto;
}
.osha-course-box .osha-course-bottom br {
display: none;
}
}
{{-- For language modal --}}
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
{{-- For language modal --}}
@endpush
@endsection
@section('scripts')
<script>
$(window).load(function() {
    resizeCourses();
});

$(document).ready(function() {
    $(window).resize(function() {
        // console.log($(this).width());
        resizeCourses();
    });
});

function resizeCourses() {
    $('.content').removeAttr('style');
    if ($(window).width() >= 760) {
        return false;
    }
    var height = 0;
    var temp = 0;
    $('.courses-10').find('figure').each(function() {
        temp = $(this).height();
        if (temp > height) {
            height = temp;
        }
        // console.log(height);
    });
    // console.log(height);
    $('.courses-10 .content').height(height - 26);

    height = 0;
    temp = 0;
    $('.courses-30').find('figure').each(function() {
        temp = $(this).height();
        if (temp > height) {
            height = temp;
        }
        // console.log(height);
    });
    // console.log(height);
    $('.courses-30 .content').height(height - 26);
}

function showEnrollLangModal(modalId) {
    $('body').addClass('modal-open');
    $('.shopperlink').hide();

    $('#' + modalId).fadeIn(250);
}
</script>
@endsection
