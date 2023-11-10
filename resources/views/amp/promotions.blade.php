@extends('layouts.amp')

@section('title', isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : env('PROMOTION_TEXT') . ' | ' . config('app.name') )

@section('preload')
@endsection

@push('component-script')
@endpush

@push('custom-css')
    .videoWrapper {
    border: 4px solid #FFF;
    }
    .bg-secondary {
    background: white;
    }
    .bg-light-blue {
    background: #e9f3f9;
    }
    .page-heading .title {
    font-weight: 700;
    font-size: 22px;
    line-height: 1.2;
    }
    .row.course {
    margin: 20px 15px;
    }
    .course {
    border: 1px solid #e9e9e9;
    margin-top: 30px;
    }
    .course h3 {
    font-size: 1.5rem;
    line-height: 1.2;
    }
    .course .desc-div {
    text-align: center;
    }
    .course .desc-div {
    padding: 10px 25px 0;
    }
    .course .discounted_price {
    font-size: 2.5rem;
    font-family: 'POPPINS';
    }
    .fc-red {
    color: #ff0000;
    }
    .fc-grey {
    color: #666666;
    }
    .course .cutout {
    font-size: 1.2rem;
    font-family: 'POPPINS';
    text-decoration: line-through;
    }
    .bullet-points-tick {
    width: 16px;
    border-radius: 25px;
    display: inline-block;
    vertical-align: middle;
    }
    .course .btn.\--btn-small.enroll-now-btn {
    background-color: #ffb900;
    font-weight: bold;
    padding: 8px 10px;
    position: relative;
    bottom: auto;
    left: auto;
    display: inline-block;
    margin: 15px 0 5px;
    }
    .course .btn.\--btn-small.course-outline-btn {
    color: #FFFFFF;
    background-color: #005384;
    font-weight: bold;
    padding: 8px 10px;
    position: relative;
    bottom: auto;
    left: auto;
    display: inline-block;
    margin: 0 0 15px;
    }
@endpush
@push('structure-data')
@endpush

@section('content')
    <amp-img
        src="{{ asset('/images/promotions/'.env('PROMOTION_NAME').'/homepage-banner-mobile-425x250.jpg') }}"
        alt="Promotions banner"
        title="{{ env('PROMOTION_NAME') }}"
        layout="responsive"
        width="360"
        height="212"
    ></amp-img>

    {{--<div style="background: #ffb900;">
        <div id="countdown-timer">
            <h6>SALE ENDS IN</h6>
            <div id="timer"></div>
        </div>
    </div>--}}

    <section class="sec-padding" id="courses">
        <div class="container">
            <div class="page-heading">
                <h4 class="title mbpx-0">Get Discounted OSHA Training</h4>
                <p class="subtitle"></p>
            </div>

            @foreach($courses as $course)
                <div class="row course">
                    <div class="col-md-6 desc-div">
                        <h3>{{ $course->title }}</h3>
                        <div class="pricing"><strong class="fc-red discounted_price">${{ $course->discounted_price }}</strong><span class="fc-grey cutout">${{ $course->price }}</span></div>
                        <p class="desc">{{ $course->promotion_page_excerpt }}</p>
                        <p class="desc mtpx-10 fw-bold">
                            <amp-img
                                src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                                layout="fixed" width="16px" height="16px"
                                title="Bullet Points Green Tick" class="bullet-points-tick"></amp-img>
                            Laminated Official OSHA DOL Card
                            <br>
                            <amp-img
                                src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                                layout="fixed" width="16px" height="16px"
                                title="Bullet Points Green Tick" class="bullet-points-tick"></amp-img>
                            Downloadable Certificate
                            <br>
                            <amp-img
                                src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                                layout="fixed" width="16px" height="16px"
                                title="Bullet Points Green Tick" class="bullet-points-tick"></amp-img>
                            Job Aid (Study guide)
                            <br>
                            <amp-img
                                src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                                layout="fixed" width="16px" height="16px"
                                title="Bullet Points Green Tick" class="bullet-points-tick"></amp-img>
                            Free Course Included
                            <br>
                        </p>
                        <a class="btn --btn-small enroll-now-btn enrollBtnText" href="{{ route('product.addToCart', [$course->id]) }}" tabindex="0"></a>
                        <a class="btn --btn-small course-outline-btn" href="{{ route('course.single', [$course->slug]) }}?outputType=amp" tabindex="1">COURSE DETAILS</a>
                    </div>
                </div>
            @endforeach


        </div>
    </section>

    {{-- Push amp-youtube to header --}}
{{--    @push('component-script')--}}
{{--        <script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>--}}
{{--    @endpush--}}

{{--    @php--}}
{{--        $youtube_video_code = "vwry_Pl4unQ";--}}
{{--        $youtube_video_heading = "We wish you a very Happy Independence Day";--}}
{{--        $youtube_duration = "PT39S";--}}
{{--        $youtube_upload_date = "2021-06-22";--}}
{{--    @endphp--}}
{{--    <script type="application/ld+json">--}}
{{--        {--}}
{{--          "@context": "https://schema.org",--}}
{{--          "@type": "VideoObject",--}}
{{--          "name": "Promotions Video",--}}
{{--          "description": "We wish you a very Happy Independence Day",--}}
{{--          "thumbnailUrl": [--}}
{{--            "https://i.ytimg.com/vi_webp/{{$youtube_video_code}}/maxresdefault.webp"--}}
{{--           ],--}}
{{--          "uploadDate": "{{ $youtube_upload_date }}",--}}
{{--          "duration": "{{ $youtube_duration }}",--}}
{{--          "contentUrl": "https://www.youtube.com/watch?v={{$youtube_video_code}}&ab_channel=OshaOutreachCourses",--}}
{{--          "embedUrl": "https://www.youtube.com/embed/{{$youtube_video_code}}"--}}
{{--        }--}}
{{--    </script>--}}
{{--    <section class="bg-light-blue sec-padding" style="background-color: #1d81c2;">--}}
{{--        <div class="container pr-5 pl-5" style="max-width:800px;">--}}
{{--            <div class="page-heading mbpx-40">--}}
{{--                <h2 class="title mbpx-0 fc-white" style="font-size: 26px;">{{ $youtube_video_heading }}</h2>--}}
{{--            </div>--}}

{{--            <div class="videoWrapper" style="--aspect-ratio: 9 / 16;" data-nosnippet>--}}
{{--                <amp-youtube width="480" height="270" layout="responsive" data-videoid="{{ $youtube_video_code }}">--}}
{{--                </amp-youtube>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    <section class="bg-light-blue sec-padding why-us" id="why-us">
        <div class="container">
            <div class="page-heading">
                <h2 class="title mbpx-20">Why Us?</h2>
            </div>
            <p class="desc ta-center">We specialize in online safety training for OSHA. Our interactive online courses include the OSHA 10-hour and OSHA 30-hour for construction and general industry.</p>
            <div class="row ta-center mtpx-30">
                <div class="col-md-4">
                    <div class="item">
                        <div class="usp-icon usp_lowest_price_guaranteed" title="Lowest Price Guaranteed"></div>
                        <p class="desc">LOWEST PRICE GUARANTEED</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <div class="usp-icon usp_laminated_official_osha_dol_card" title="Laminated Official OSHA DOL Card"></div>
                        <p class="desc">LAMINATED OFFICIAL OSHA DOL CARD</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <div class="usp-icon usp_24_7_customer_support" title="24/7 Customer Support"></div>
                        <p class="desc">24/7 CUSTOMER SUPPORT</p>
                    </div>
                </div>
            </div>

            <div class="row ta-center">
                <div class="col-md-4">
                    <div class="item">
                        <div class="usp-icon usp_bulk_registrations" title="Bulk Registrations Available For Discounted Rates"></div>
                        <p class="desc">BULK REGISTRATIONS AVAILABLE FOR DISCOUNTED RATES</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <div class="usp-icon usp_complete_online" title="Accessible From Anywhere, Complete Online"></div>
                        <p class="desc">ACCESSIBLE FROM ANYWHERE, COMPLETE ONLINE</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <div class="usp-icon usp_downloadable_certificate" title="Post Completion Downloadable Certificate"></div>
                        <p class="desc">POST COMPLETION DOWNLOADABLE CERTIFICATE</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


{{--    <section class="testimonials" id="reviews" style="background-color: white">--}}
{{--        @include('amp.partials._reviews_amp')--}}
{{--    </section>--}}
@endsection
