@php
    $videoReviews = [
        [
            'name' => "JOSE BEDOLLA",
            'loc' => "CALIFORNIA",
            'date' => "08 AUGUST 2022",
            'video_code' => "pCw8Gtrbk9Y",
            'video_duration' => "PT0M06S",
            'video_upload_date' => "2022-11-07",
            'course' => 'Certified OSHA 10 Hour Construction Trainee',
            'course_link' => '/osha-10-hour-construction',
            'lms' => LMS_TYPE_OSHA_OUTREACH
        ],
        [
            'name' => "DANIEL DOWELL",
            'loc' => "SOUTH CAROLINA",
            'date' => "19 OCTOBER 2022",
            'video_code' => "wrNdk2HvGzs",
            'video_duration' => "PT0M18S",
            'video_upload_date' => "2021-11-08",
            'course' => 'Certified OSHA 30 Hour Construction Trainee',
            'course_link' => '/osha-30-hour-construction',
            'lms' => LMS_TYPE_OSHA_OUTREACH
        ],
        [
            'name' => "CHIKEITHA HARIS",
            'loc' => "MICHIGAN",
            'date' => "19 OCTOBER 2022",
            'video_code' => "uLdmQuB_pq0",
            'video_duration' => "PT0M08S",
            'video_upload_date' => "2022-11-07",
            'course' => 'Certified New York OSHA 10 Hour Construction Trainee',
            'course_link' => '/new-york-osha-10-hour-construction',
            'lms' => LMS_TYPE_OSHA_OUTREACH
        ],
        [
            'name' => "EDDY ESTRADA",
            'loc' => "TEXAS",
            'date' => "06 NOVEMBER 2022",
            'video_code' => "hMMprRKQqzI",
            'video_duration' => "PT0M11S",
            'video_upload_date' => "2022-11-07",
            'course' => 'Certified OSHA 10 Hour General Industry Trainee',
            'course_link' => '/osha-10-hour-general-industry',
            'lms' => LMS_TYPE_OSHA_OUTREACH
        ],
        [
            'name' => "ROBERT HEALY",
            'loc' => "MASSACHUSETTS",
            'date' => "09 NOVEMBER 2022",
            'video_code' => "TgTTIE0u2o0",
            'video_duration' => "PT0M11S",
            'video_upload_date' => "2022-11-09",
            'course' => 'Certified OSHA 30 Hour Construction Trainee',
            'course_link' => '/osha-30-hour-construction',
            'lms' => LMS_TYPE_OSHA_OUTREACH
        ],
        [
            'name' => "JEFF STARR",
            'loc' => "SOUTH CAROLINA",
            'date' => "14 NOVEMBER 2022",
            'video_code' => "3hga9CTd43I",
            'video_duration' => "PT0M08S",
            'video_upload_date' => "2022-11-14",
            'course' => 'Certified OSHA 10 Hour General Industry Trainee',
            'course_link' => '/osha-10-hour-general-industry',
            'lms' => LMS_TYPE_OSHA_OUTREACH
        ],
        [
            'name' => "MARCO ASCENCIO",
            'loc' => "ILLINOIS",
            'date' => "15 NOVEMBER 2022",
            'video_code' => "5PlCzTvAkcM",
            'video_duration' => "PT0M53S",
            'video_upload_date' => "2022-11-15",
            'course' => 'Certified OSHA 10 Hour Construction Trainee',
            'course_link' => '/osha-10-hour-construction',
            'lms' => LMS_TYPE_OSHA_OUTREACH
        ],
        [
            'name' => "DANIEL DOWELL",
            'loc' => "SOUTH CAROLINA",
            'date' => "22 NOVEMBER 2022",
            'video_code' => "Y7h4UzOisFY",
            'video_duration' => "PT0M17S",
            'video_upload_date' => "2021-11-22",
            'course' => 'Certified OSHA 30 Hour Construction Trainee',
            'course_link' => '/osha-30-hour-construction',
            'lms' => LMS_TYPE_OSHA_OUTREACH
        ],
        [
            'name' => "RUSTY WOODARD",
            'loc' => "TEXAS",
            'date' => "22 NOVEMBER 2022",
            'video_code' => "r4f0TTSo3Po",
            'video_duration' => "PT0M12S",
            'video_upload_date' => "2022-11-22",
            'course' => 'Certified OSHA 30 Hour Construction Trainee',
            'course_link' => '/osha-30-hour-construction',
            'lms' => LMS_TYPE_OSHA_OUTREACH
        ],
    ];

    /* Sort by newest to oldest */
    usort($videoReviews, function($a, $b) {
        return strtotime($b['date']) - strtotime($a['date']);
    });
@endphp
@if(!isset($promotional))
    @foreach($videoReviews as $videoReview)
        {{-- json schema for SEO--}}
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "VideoObject",
                "name": "OSHA OUTREACH COURSES VIDEO REVIEW BY {{ $videoReview['name'] }}",
                "description": "OSHA OUTREACH COURSES VIDEO REVIEW BY {{ $videoReview['name'] }}",
                "thumbnailUrl": [
                    "https://img.youtube.com/vi/{{$videoReview['video_code']}}/hqdefault.jpg"
                ],
                "uploadDate": "{{ $videoReview['video_upload_date']  }}",
                "duration": "{{ $videoReview['video_duration'] }}",
                "contentUrl": "https://www.youtube.com/watch?v={{$videoReview['video_code']}}&ab_channel=OshaOutreachCourses",
                "embedUrl": "https://www.youtube.com/embed/{{$videoReview['video_code']}}",
                "interactionStatistic": {
                    "@type": "InteractionCounter",
                    "interactionType": {
                        "@type": "http://schema.org/WatchAction"
                    },
                    "userInteractionCount": 100
                 },
                "regionsAllowed": "US,NL"
            }

        </script>
        {{-- json schema for SEO--}}
    @endforeach
@endif
<section class="video_review_section">
    <div class="container">
        <div class="ta-center">
            <div class="video-reviews-slider">
                @foreach($videoReviews as $videoReview)
                    <div class="videoSliderItem">
                        <p class="reviewsCourseName">
                            <a
                                target="_blank"
                                href="{{ $videoReview['lms'] == LMS_TYPE_OSHA_OUTREACH ? url($videoReview['course_link']) : $videoReview['course_link'] }}"
                            >
                                {{ $videoReview['course'] }}
                            </a>
                        </p>
                        <div class="video-item" style="--aspect-ratio: 1 / 1;" data-nosnippet>
                            <iframe
                                src="https://www.youtube.com/embed/{{$videoReview['video_code']}}?cc_load_policy=1&modestbranding=1&color=white&iv_load_policy=3"
                                srcdoc="
                                    <style>
                                        *{padding:0;margin:0;overflow:hidden}
                                        html,body{height:100%}
                                        img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}
                                        span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}
                                    </style>
                                    <a href=https://www.youtube.com/embed/{{$videoReview['video_code']}}?autoplay=1&cc_load_policy=1&modestbranding=1&color=white&iv_load_policy=3>
                                        <img src=https://img.youtube.com/vi/{{$videoReview['video_code']}}/hqdefault.jpg alt='OSHA OUTREACH VIDEO REVIEWS'>
                                        <span>▶</span>
                                    </a>"
                                frameborder="0"
                                allowfullscreen
                                title="OSHA OUTREACH VIDEO REVIEWS"
                            ></iframe>
                        </div>
                        <div class="mt-2 padding-0">
                            <p class="fw-bold">{{ $videoReview['name'] }}</p>
                            <p>{{ $videoReview['loc'] }}</p>
                            @if(!isset($promotional))
                                <p>{{ $videoReview['date'] }}</p>
                                <p class="icon ">
                                    <a
                                        target="_blank"
                                        class="td-underline fc-primary fw-semi-bold"
                                        href="https://www.shopperapproved.com/reviews/oshaoutreachcourses.com"
                                    >
                                        VERIFIED REVIEW
                                    </a>
                                </p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <br><br>
</section>
@push('custom-css')
    .videoSliderItem{
    padding:0 15px;
    {{--    position:relative--}}
    }

    .video_review_section {
    padding-top: 60px;
    }
    .videoSliderItem .reviewsCourseName{
    font-size: 16px;
    max-width:75%;
    margin: 0 auto 10px;
    font-weight:600;
    }
{{--    .slick-arrow {--}}
{{--    height: 30px;--}}
{{--    right: -30px;--}}
{{--    width: 30px;--}}
{{--    top: 0;--}}
{{--    bottom: 15px;--}}
{{--    margin-top: auto;--}}
{{--    margin-bottom: auto;--}}
{{--    }--}}
{{--    .slick-arrow.slick-prev{--}}
{{--    left:-30px;--}}
{{--    }--}}
{{--    .slick-arrow:before {--}}
{{--    position:absolute;--}}
{{--    content:'';--}}
{{--    left:0;--}}
{{--    right:0;--}}
{{--    top:0;--}}
{{--    bottom:0;--}}
{{--    height:30px;--}}
{{--    width:30px;--}}
{{--    content: url("{{ asset('images/add-icons/right-chevron-grey.svg') }}");--}}
{{--    }--}}

{{--    .slick-prev {--}}
{{--    transform:rotate(180deg) translateY(18px);--}}
{{--    }--}}
    @media screen and (max-width:400px){
        .videoSliderItem .video-item{
            max-width: 75%;
            margin:0 auto;
        }
        .videoSliderItem .video-item iframe{
            width:100%;
            height: auto;
        }
    }
    @media screen and (max-width:768px){
        .slick-arrow {
            right: 0;
        }
        .slick-arrow.slick-prev {
            left: 0;
        }
    }
@endpush
