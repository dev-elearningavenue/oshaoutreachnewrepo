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
<div class="hear_your_self_video_wrapper">
    @foreach($videoReviews as $videoReview)
        <div class="hear_yourself_video iframe_767">
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
                                        <img height='70' src='{{asset('/images/simple-icons/play-button.svg')}}'/>
                                    </a>"
                frameborder="0"
                allowfullscreen
                title="OSHA OUTREACH VIDEO REVIEWS"
            ></iframe>
        </div>
    @endforeach
</div>

@push('custom-css')
    .hear_your_self_video_wrapper {
    display: flex;
    }

    .hear_your_self_video_wrapper {
    display: flex;
    justify-content: space-between;
    margin: 25px 0px;
    }

    .hear_yourself_video iframe {
    border-radius: 10px;
    width: 100%;
    }

    .hear_yourself_video {
    width: 48%;
    }

    @media only screen and (max-width: 1400px) {
        .hear_yourself_video {
            width: 48%;
        }

        .hear_yourself_video iframe {
            border-radius: 10px;
            width: 100%;
        }
    }

    @media only screen and (max-width: 767px) {
        .hear_your_self_video_wrapper {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .iframe_767 {
            margin-bottom: 20px;
        }

        .hear_yourself_video iframe {
            height: 220px;
        }

        .hear_yourself_video {
            width: 80%;
        }
    }

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
