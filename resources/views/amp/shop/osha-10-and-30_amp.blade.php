@extends('layouts.amp')

@section('title', isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'OSHA 10 and 30 | '.config('app.name') )

@section('preload')
    @if(isset($page['seo_tags']))
        @foreach($page['seo_tags'] as $meta_name => $meta_content)
            @if($meta_name != 'title')
                <meta name="{{ $meta_name }}" content="{{ $meta_content }}"/>
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
    <meta property="og:image" content="{{ url('/images/osha-outreach-courses.png') }}">
    <meta property="twitter:image" content="{{ url('/images/osha-outreach-courses.png') }}">
    <!-- Meta Tags for Social Media -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="OSHA Outreach Courses">
    <meta property="fb:app_id" content="817832821974771"/>
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:site" content="@OshaOutreach">

    @include('amp.partials._general_amp_schema', ['fallbackName' => 'OSHA 10-HOUR & 30-HOUR TRAINING', 'breadCrumbList' => true])
@endsection

@section('content')

    @include('amp.partials._why_to_enroll_video_section')

    <section class="osha-courses">
        <div class="container">
            <div class="page-heading mbpx-20">
                <h1 class="h3 ta-center mtpx-0 mbpx-0">30-HOUR TRAINING</h1>
                <p class="subtitle"></p>
            </div>
            <div class="box --course-objectives">
                <p class="desc mbpx-20 mtpx-20">30-Hour Construction courses are designed for construction entry
                    level workers to understand safety associated with the construction industry.</p>
            </div>
            <div class="row courses-10">
                @foreach($osha30 as $osha30Course)
                    @php
                        $osha30CourseAltTitle = removeOSHAFromCourseTitle($osha30Course->title);
                    @endphp
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 mbpx-20">
                        <div class="osha-course-box">
                            <a href="/{{ $osha30Course->slug }}">
                                <amp-img
                                    src="{{ asset($osha30Course->imagePath.'.jpg') }}"
                                    alt="{{ $osha30CourseAltTitle }}"
                                    title="{{ $osha30CourseAltTitle }}"
                                    layout="responsive"
                                    width="50"
                                    height="55"
                                ></amp-img>
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
                                @endif<br/>
                                @if($osha30Course->lms === LMS_TYPE_OSHA_OUTREACH)
                                    <a href="{{ route('product.addToCart', ['id' => $osha30Course->id]) }}"
                                       class="btn --btn-primary --btn-small osha-course-purchase-btn">
                                        Enroll Now
                                    </a><br>
                                @else
                                    <a href="https://oshaoutreachcourses.puresafety.com/Ondemand/ShoppingCart/AddToCart/301-{{$osha30Course->course_id}}"
                                       class="btn --btn-primary --btn-small osha-course-purchase-btn">
                                        Enroll Now
                                    </a><br>
                                @endif
                                <a href="/{{ $osha30Course->slug }}?outputType=amp" class="view-course-link">VIEW COURSE</a>
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
                <p class="desc mbpx-20 mtpx-20">10-Hour courses are designed for entry level workers to understand
                    safety associated with workplace.</p>
            </div>

            <div class="row courses-30">
                @foreach($osha10 as $osha10Course)
                    @php
                        $osha10CourseAltTitle = removeOSHAFromCourseTitle($osha10Course->title);
                    @endphp
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 mbpx-20">
                        <div class="osha-course-box">
                            <a href="/{{ $osha10Course->slug }}">
                                <amp-img
                                    src="{{ asset($osha10Course->imagePath.'.jpg') }}"
                                    alt="{{ $osha10CourseAltTitle }}"
                                    title="{{ $osha10CourseAltTitle }}"
                                    layout="responsive"
                                    width="50"
                                    height="55"
                                ></amp-img>
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
                                @endif<br/>
                                @if($osha10Course->lms === LMS_TYPE_OSHA_OUTREACH)
                                    <a href="{{ route('product.addToCart', ['id' => $osha10Course->id]) }}"
                                       class="btn --btn-primary --btn-small osha-course-purchase-btn">
                                        Enroll Now
                                    </a><br>
                                @else
                                    <a href="https://oshaoutreachcourses.puresafety.com/Ondemand/ShoppingCart/AddToCart/301-{{$osha10Course->course_id}}"
                                       class="btn --btn-primary --btn-small osha-course-purchase-btn">
                                        Enroll Now
                                    </a><br>
                                @endif
                                <a href="/{{ $osha10Course->slug }}?outputType=amp" class="view-course-link">VIEW COURSE</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="page-heading mbpx-20">
                <h1 class="h3 ta-center mtpx-0 mbpx-0">10 & 30 TRAINING</h1>
                <p class="subtitle"></p>
            </div>
            <div class="box --course-objectives">
                <p class="desc mbpx-20 mtpx-20">According to OSHA 29 CFR 1926, OSHA 10 & 30 Hour Construction Package educates you to take the necessary precautions for Site Health and Safety for Workers and Supervisors.</p>
            </div>

            <div class="row courses-30">
                @foreach($bundle as $bundleCourse)
                    @php
                        $bundleCourseAltTitle = removeOSHAFromCourseTitle($bundleCourse->title);
                    @endphp
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 mbpx-20">
                        <div class="osha-course-box">
                            <a href="/{{ $bundleCourse->slug }}">
                                <amp-img
                                    src="{{ asset($bundleCourse->imagePath.'.jpg') }}"
                                    alt="{{ $bundleCourseAltTitle }}"
                                    title="{{ $bundleCourseAltTitle }}"
                                    layout="responsive"
                                    width="50"
                                    height="55"
                                ></amp-img>
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
                                @endif<br/>
                                @if($bundleCourse->lms === LMS_TYPE_OSHA_OUTREACH)
                                    <a href="{{ route('product.addToCart', ['id' => $bundleCourse->id]) }}"
                                       class="btn --btn-primary --btn-small osha-course-purchase-btn">
                                        Enroll Now
                                    </a><br>
                                @else
                                    <a href="https://oshaoutreachcourses.puresafety.com/Ondemand/ShoppingCart/AddToCart/301-{{$bundleCourse->course_id}}"
                                       class="btn --btn-primary --btn-small osha-course-purchase-btn">
                                        Enroll Now
                                    </a><br>
                                @endif
                                <a href="/{{ $bundleCourse->slug }}?outputType=amp" class="view-course-link">VIEW COURSE</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @push('component-script')
        <script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.2.js"></script>
    @endpush

    {{--    @include('amp.partials._reviews_amp')--}}
    @include('amp.partials._banner_strip_amp')

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

        .fc-red {
        color: #ff0000;
        }

        .fc-black {
        color: black;
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
    @endpush
@endsection
@section('scripts')
    <script>
        $(window).load(function () {
            resizeCourses();
        });

        $(document).ready(function () {
            $(window).resize(function () {
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
            $('.courses-10').find('figure').each(function () {
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
            $('.courses-30').find('figure').each(function () {
                temp = $(this).height();
                if (temp > height) {
                    height = temp;
                }
                // console.log(height);
            });
            // console.log(height);
            $('.courses-30 .content').height(height - 26);
        }
    </script>
@endsection
