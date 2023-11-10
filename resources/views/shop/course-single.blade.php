@extends('layouts.master')

@php
    $meta_tag = $course
        ->seoTags()
        ->where('meta_name', 'title')
        ->first();
    if (!empty($meta_tag)) {
        $meta_title = $meta_tag->meta_content;
    } else {
        $meta_title = $course_content['title'] . ' | OSHA Outreach Courses';
    }

    function getLanguageISO($language)
    {
        $language = strtolower($language);
        if ($language === 'english') {
            $iso_code = 'en';
        } elseif ($language === 'spanish') {
            $iso_code = 'es';
        } elseif ($language === 'canadian french') {
            $iso_code = 'fr-ca';
        } elseif ($language === 'portuguese') {
            $iso_code = 'pt';
        } elseif ($language === 'german') {
            $iso_code = 'de';
        } elseif ($language === 'chinese') {
            $iso_code = 'zh';
        } elseif ($language === 'dutch') {
            $iso_code = 'nl';
        } elseif ($language === 'polish') {
            $iso_code = 'pl';
        } elseif ($language === 'thai') {
            $iso_code = 'th';
        } elseif ($language === 'french') {
            $iso_code = 'fr';
        } elseif ($language === 'japanese') {
            $iso_code = 'ja';
        } elseif ($language === 'czech') {
            $iso_code = 'cs';
        } elseif ($language === 'italian') {
            $iso_code = 'it';
        } elseif ($language === 'korean') {
            $iso_code = 'ko';
        } elseif ($language === 'russian') {
            $iso_code = 'ru';
        } elseif ($language === 'hungarian') {
            $iso_code = 'hu';
        } else {
            $iso_code = 'ar';
        }
        return $iso_code;
    }
@endphp
@section('title', $meta_title)

@section('language', getLanguageISO($course->language))

@section('styles')
    <link rel="canonical" href="{{ url()->full() }}" />
    <link rel="alternate" hreflang="{{ getLanguageISO($course->language) }}" href="{{ url()->full() }}" />
    @if (getLanguageISO($course->language) == 'en')
        <link rel="alternate" hreflang="x-default" href="{{ url()->full() }}" />
    @endif
    @foreach ($course_content['variants'] as $v => $variant)
        <link rel="alternate" hreflang="{{ getLanguageISO($variant['language']) }}" href="{{ url($variant['slug']) }}" />
        @if (getLanguageISO($variant['language']) == 'en')
            <link rel="alternate" hreflang="x-default" href="{{ url($variant['slug']) }}" />
        @endif
    @endforeach
    @include('partials._meta_tags')
    <style>
        .course_detail_guid_osha_title {
            font-size: 22px;
        }



        .home-intro .title {
            font-size: 22px;
            font-weight: 600;
            text-transform: unset !important;
            margin-bottom: 40px;
        }

        .box.\--outline-box ul>li {
            padding-right: 20px;
        }

        .box.\--outline-box li ol li {
            margin-bottom: 0px;
            margin-top: 0px;
        }

        .course-outline .row {
            /*position: relative;*/
        }

        .course-outline .row h3 {
            position: relative;
            cursor: pointer;
            padding: 15px 0;
            border-top: 1px solid #d2d2d2;
            border-bottom: 1px solid #d2d2d2;
            line-height: 25px !important;
            font-size: 18px !important;
        }

        .course-outline .row h3 span.title-text {
            width: calc(100% - 35px);
            display: block;
        }

        /*.course-outline .row.open h3:after{*/
        /*top: calc(100% - 35px);*/
        /*}*/
        .course-outline .row h3:after {
            position: absolute;
            display: inline-block;
            right: 10px;
            top: 40%;
            /*background-image: url(/images/arrow-down.png);*/
            background-repeat: no-repeat;
            content: '\ea43';
            width: 18px;
            height: 14px;
            font-family: "osha" !important;
            speak: none;
            font-style: normal;
            font-weight: normal;
            font-variant: normal;
            text-transform: none;
            line-height: 1;
            /* Better Font Rendering =========== */
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .course-outline .row h3.open:after {
            /*background-image: url(/images/arrow-up.png) !important;*/
            content: '\ea41';
        }

        .course-outline ul li {
            margin-top: 15px;
            margin-bottom: 10px;
        }

        .course-outline ul li>h4 {
            position: relative;
            width: calc(100% - 35px);
        }

        .responsive_title_center {
            margin: 0 auto !important;

        }

        @if ($course->lms === LMS_TYPE_OSHA_OUTREACH)
            /*  .osha30-info-img:hover {*/
            /*    opacity: 0.8;*/
            /*}*/
            .osha30-info-img {
                border-radius: 25px;
                box-shadow: 0px 0px 18px -3px rgb(0 0 0 / 30%);
            }

            .col-md-3.img-container {
                padding: 0;
            }

            .img-overlay {
                position: relative;
                border-radius: 25px;
                cursor: pointer;
                overflow: hidden;
                padding: 15px;
            }

            .img-overlay:before {
                position: absolute;
                content: "\e986";
                top: 15px;
                bottom: 15px;
                left: 15px;
                right: 15px;
                font-size: 35px;
                display: flex;
                justify-content: center;
                opacity: 0;
                align-items: center;
                transition: .5s ease;
                background-color: #e6e6e6;
                font-family: "osha" !important;
                speak: none;
                font-style: normal;
                font-weight: normal;
                font-variant: normal;
                text-transform: none;
                line-height: 1;
                -webkit-font-smoothing: antialiased;
                border-radius: 25px;
            }

            .img-container:hover .img-overlay:before {
                opacity: 0.5;
            }

            .course-outline-popup {
                display: flex;
                justify-content: center;
                align-items: center;
                position: fixed;
                left: 0;
                top: 0;
                right: 0;
                margin: 0 auto;
                height: 100%;
                width: 100%;
                background: rgba(0, 0, 0, 0.6);
                z-index: 9999;
                /*overflow-y: scroll;*/
            }

            .course-outline-popup div.popup-inner-div {
                margin: 0 auto;
                position: absolute;
                left: 0;
                right: 0;
                top: 5%;
                background: #ffff;
                width: 90%;
                text-align: center;
                max-width: 800px;
                bottom: 5%;
                height: 90%;
                overflow: hidden;
                overflow-y: auto;
                padding: 0 5px;
            }

            body.modal-open {
                overflow: hidden;
                /*position: fixed;*/
            }

            .popclosebtn {
                position: absolute;
                top: 8px;
                right: 10px;
                padding: 0 !important;
            }

            .popclosebtn a {
                color: #fff;
            }

            .page-heading .subtitle-sp {
                font-size: 18px;
                text-align: center;
                position: relative;
                padding-bottom: 30px;
            }

            .page-heading .subtitle-sp:after {
                content: "";
                width: 60px;
                height: 2px;
                right: 0;
                background-color: #005384;
                position: absolute;
                bottom: 0;
                left: 0;
                margin: 0 auto;
            }


            @media (max-width: 767px) {
                .osha30-info-img {
                    margin: auto;
                    width: 100%;
                }

                .dol_certi_job_list {
                    position: relative;
                    left: 30%;
                    padding: 0px;
                }

                .page-heading h2.title.course-t.mbpx-10 {
                    margin-left: 0 !important;
                }
            }

        @endif

        {{--  Title not containing osha --}} @if (preg_match('/(?!.*?osha)^.*$/i', $course->title))


            .course-outline ul li>h4 {
                cursor: pointer;
            }

            .course-outline ul li>h4:after {
                position: absolute;
                display: inline-block;
                bottom: 4px;
                background-repeat: no-repeat;
                content: '\e90a';
                width: 18px;
                height: 12px;
                font-size: 14px;
                font-family: "osha" !important;
                speak: none;
                font-style: normal;
                font-weight: normal;
                font-variant: normal;
                text-transform: none;
                line-height: 1;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }

            .course-outline ul li>h4.open:after {
                content: '\e909';
            }

        @endif
        .home-intro .price-time {
            margin: 0 !important;
        }

        .home-intro .price-time .xicon {
            width: 16px;
            display: inline-block;
            text-align: center;
        }

        .text-center {
            text-align: center;
        }

        #main-banner-mobile {
            display: block;
            text-align: center;
        }

        #main-banner {
            display: none;
        }

        .green_bullets,
        .blue_bullets {
            display: block;
            margin-bottom: 10px;
        }

        .green_bullets>span,
        .blue_bullets>span {
            display: block;
        }

        .green_bullets {
            font-size: 16px;
            font-weight: 600;
        }

        .hero-banner .title {
            position: absolute;
            text-align: center;
            width: calc(100% - 30px);
            max-width: 100%;
            background: rgba(0, 0, 0, 0.6);
            color: #ffffff;
            height: 100%;
            padding-top: 30px;
            font-size: 26px;
        }

        @media (max-width: 575px) {

            .green_bullets,
            .blue_bullets .price-time .xicon,
            .blue_bullets .price-time span,
            .blue_bullets .price-time strong {
                font-size: 14px;
                font-weight: 600;
            }

            .home-intro .title {
                font-size: 18px !important;
            }

            #course-info-div>span:nth-child(n+5) {
                margin-left: 25% !important;
            }

            .blue_bullets {
                display: flex;
                justify-content: initial;
                flex-wrap: wrap;
                align-items: flex-end;
                text-align: center;
            }

        }

        @media (min-width: 576px) {

            .hero-banner .title {
                width: 510px;
            }


        }

        @media (max-width: 576px) {
            .depth-online .title {
                width: 90%;
                margin: 0 auto;
            }

            .videoWrapper {
                width: 85%;
                margin: 0 auto;
            }
        }

        @media (max-width: 767px) {
            .hero-banner .title {
                position: relative;
                width: 100%;
            }

            .inner-banner {
                height: 150px;
            }
        }

        @media (min-width: 768px) {
            .hero-banner .title {
                width: 690px;
                padding-top: 40px;
            }

            .green_bullets,
            .blue_bullets {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-evenly;
            }

            #main-banner {
                display: block;
                text-align: center;
            }

            #main-banner-mobile {
                display: none;
            }
        }

        @media (min-width: 992px) {
            .hero-banner .title {
                width: 930px;
                padding-top: 55px;
                font-size: 28px;
            }

            .green_bullets,
            .blue_bullets {
                flex-wrap: nowrap;
            }
        }

        @media (min-width: 1200px) {
            .hero-banner .title {
                width: 990px;
                padding-top: 60px;
                font-size: 45px;
                position: relative;
            }
        }

        .videoWrapper {
            border: 4px solid #FFF;
            position: relative;
            padding-bottom: 56.25%;
            /* 16:9 */
            height: 0;
            /* falls back to 16/9, but otherwise uses ratio from HTML */
            padding-bottom: calc(var(--aspect-ratio, .5625) * 100%);
        }

        .videoWrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .lang {
            width: 30px;
            height: 20px;
            display: inline-block;
            margin: 0px 5px -5px;
            border: 1px solid #000;
        }

        .box.--course-objectives-sp p {
            font-size: 18px;
            text-align: center !important;
        }

        .box.--course-objectives-sp li {
            font-size: 18px;
        }

        .box.--course-objectives-sp ul {
            padding-left: 25px;
            text-align: left !important;
            display: inline-block;
        }

        .rowCustom {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        .modal-open .row.promotion-bar.sticky-header {
            display: none;
        }

        .box.\--course-objectives li a {
            color: #005384;
            text-decoration: underline;
        }

        .no-webp .lang.lang-ar {
            background: url('{{ asset('images/flags_sprites.png') }}') -0 -0;
        }

        .no-webp .lang.lang-cs {
            background: url('{{ asset('images/flags_sprites.png') }}') -30px -0;
        }

        .no-webp .lang.lang-de {
            background: url('{{ asset('images/flags_sprites.png') }}') -60px -0;
        }

        .no-webp .lang.lang-en {
            background: url('{{ asset('images/flags_sprites.png') }}') -90px -0;
        }

        .no-webp .lang.lang-es {
            background: url('{{ asset('images/flags_sprites.png') }}') -120px -0;
        }

        .no-webp .lang.lang-fr {
            background: url('{{ asset('images/flags_sprites.png') }}') -150px -0;
        }

        .no-webp .lang.lang-fr-ca {
            background: url('{{ asset('images/flags_sprites.png') }}') -180px -0;
        }

        .no-webp .lang.lang-hu {
            background: url('{{ asset('images/flags_sprites.png') }}') -210px -0;
        }

        .no-webp .lang.lang-it {
            background: url('{{ asset('images/flags_sprites.png') }}') -240px -0;
        }

        .no-webp .lang.lang-ja {
            background: url('{{ asset('images/flags_sprites.png') }}') -270px -0;
        }

        .no-webp .lang.lang-ko {
            background: url('{{ asset('images/flags_sprites.png') }}') -300px -0;
        }

        .no-webp .lang.lang-nl {
            background: url('{{ asset('images/flags_sprites.png') }}') -330px -0;
        }

        .no-webp .lang.lang-pl {
            background: url('{{ asset('images/flags_sprites.png') }}') -360px -0;
        }

        .no-webp .lang.lang-pt {
            background: url('{{ asset('images/flags_sprites.png') }}') -390px -0;
        }

        .no-webp .lang.lang-ru {
            background: url('{{ asset('images/flags_sprites.png') }}') -420px -0;
        }

        .no-webp .lang.lang-th {
            background: url('{{ asset('images/flags_sprites.png') }}') -450px -0;
        }

        .no-webp .lang.lang-zh {
            background: url('{{ asset('images/flags_sprites.png') }}') -480px -0;
        }

        .webp .lang.lang-ar {
            background: url('{{ asset('images/flags_sprites.webp') }}') -0 -0;
        }

        .webp .lang.lang-cs {
            background: url('{{ asset('images/flags_sprites.webp') }}') -30px -0;
        }

        .webp .lang.lang-de {
            background: url('{{ asset('images/flags_sprites.webp') }}') -60px -0;
        }

        .webp .lang.lang-en {
            background: url('{{ asset('images/flags_sprites.webp') }}') -90px -0;
        }

        .webp .lang.lang-es {
            background: url('{{ asset('images/flags_sprites.webp') }}') -120px -0;
        }

        .webp .lang.lang-fr {
            background: url('{{ asset('images/flags_sprites.png') }}') -150px -0;
        }

        .webp .lang.lang-fr-ca {
            background: url('{{ asset('images/flags_sprites.webp') }}') -180px -0;
        }

        .webp .lang.lang-hu {
            background: url('{{ asset('images/flags_sprites.webp') }}') -210px -0;
        }

        .webp .lang.lang-it {
            background: url('{{ asset('images/flags_sprites.webp') }}') -240px -0;
        }

        .webp .lang.lang-ja {
            background: url('{{ asset('images/flags_sprites.webp') }}') -270px -0;
        }

        .webp .lang.lang-ko {
            background: url('{{ asset('images/flags_sprites.webp') }}') -300px -0;
        }

        .webp .lang.lang-nl {
            background: url('{{ asset('images/flags_sprites.webp') }}') -330px -0;
        }

        .webp .lang.lang-pl {
            background: url('{{ asset('images/flags_sprites.webp') }}') -360px -0;
        }

        .webp .lang.lang-pt {
            background: url('{{ asset('images/flags_sprites.webp') }}') -390px -0;
        }

        .webp .lang.lang-ru {
            background: url('{{ asset('images/flags_sprites.webp') }}') -420px -0;
        }

        .webp .lang.lang-th {
            background: url('{{ asset('images/flags_sprites.webp') }}') -450px -0;
        }

        .webp .lang.lang-zh {
            background: url('{{ asset('images/flags_sprites.webp') }}') -480px -0;
        }

        span.ind_cnt.low {
            display: none;
        }
        .read_more_btn_learning_objective{
            border: none;
            background: #00579E;
            border-radius: 5px;
            border: 1px solid #00579E;
            padding: 5px 10px;
            transition: ease all 0.25s;
            color: #fff;
            margin-bottom: 15px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            text-transform: uppercase;
            /*text-decoration: underline;*/
        }

        {{-- For diagonal line --}} small.price-lt:before {
            display: block;
            content: "";
            position: absolute;
            left: 5%;
            top: 51%;
            width: 100%;
            height: 1px;
            background-color: #fc4a1a;
            transform: rotate(-12deg);
        }

        span small.price-lt {
            position: relative;
        }


        @media (max-width: 768px) {
            .mobile_decs_learning_class{
                flex-direction: column;
            }
            .read_more_learning_objective_content{
            display: none;
        }
        .read_more_btn_learning_objective{
            /*display: block;*/
        }
        #mobile_decs{
            display: block;
        }
        .mobile_readmore_wrapper{
            padding: 0 20px 0 33px;
        }
        #mobile_decs  ::marker {
            color: #005384;
            font-size: 18px;
        }
       #mobile_decs li{
            font-size: 18px;
            margin-bottom: 20px;
        }
        }

        @media (min-width: 768px) {
            .mobile_decs_learning_class li{
                font-size:18px;
            }
            .mobile_decs_learning_class  li:first-child{
                margin-right:35px;
            }
            .mobile_decs_learning_class{
                display: flex;
            }
            #mobile_decs  ::marker {
                color: #005384;
                font-size: 18px;
            }
            .read_more_learning_objective_content{
                display:none;

            }
            .read_more_learning_objective_content{
            /*display: block;*/
        }
        .read_more_btn_learning_objective{
            /*display: none;*/
        }
        #mobile_decs{
            /*display: none;*/
        }
        }

        {{-- For diagonal line --}}
    </style>
    @if ($course->id < 10)
        @if ($course->id == 1)
            @php($youtube_video_code = 'pulpxmUCxtA')
            @php($youtube_video_heading = 'LEARN MORE')
            @php($youtube_duration = 'PT1M21S')
            @php($youtube_upload_date = '2021-04-08')
        @elseif($course->id == 2)
            @php($youtube_video_code = 'S7zaVBJjsXQ')
            @php($youtube_video_heading = 'LEARN MORE')
            @php($youtube_duration = 'PT1M29S')
            @php($youtube_upload_date = '2021-04-19')
        @elseif($course->id == 3)
            @php($youtube_video_code = 'b6_Dib9s0B0')
            @php($youtube_video_heading = 'LEARN MORE')
            @php($youtube_duration = 'PT1M28S')
            @php($youtube_upload_date = '2021-04-26')
        @elseif($course->id == 4)
            {{-- OSHA 30 GENERAL INDUSTRY - NOT AVAILABLE --}}
        @elseif($course->id == 5)
            @php($youtube_video_code = '2WepUGaZTn0')
            @php($youtube_video_heading = 'LEARN MORE')
            @php($youtube_duration = 'PT1M50S')
            @php($youtube_upload_date = '2021-05-25')
        @elseif($course->id == 6)
            @php($youtube_video_code = 'N7WHwfI4q8Q')
            @php($youtube_video_heading = 'LEARN MORE')
            @php($youtube_duration = 'PT1M49S')
            @php($youtube_upload_date = '2021-07-08')
        @elseif($course->id == 7)

        @elseif($course->id == 8)
            @php($youtube_video_code = 'XCISzROE2Zw')
            @php($youtube_video_heading = 'LEARN MORE')
            @php($youtube_duration = 'PT1M49S')
            @php($youtube_upload_date = '2021-07-10')
        @elseif($course->id == 9)
        @endif
        {{-- <script>
                // 2. This code loads the IFrame Player API code asynchronously.
                var tag = document.createElement('script');
                tag.src = "https://www.youtube.com/player_api";
                var firstScriptTag = document.getElementsByTagName('script')[0];
                firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                // 3. This function creates an <iframe> (and YouTube player)
                //    after the API code downloads.
                var player;
                function onYouTubePlayerAPIReady() {
                    player = new YT.Player('ytplayer', {
                        width: '100%',
                        height: '100%',
                        videoId: '{{ $youtube_video_code }}',
        controls: '0',
        showinfo: 0,
        events: {
        'onReady': onPlayerReady,
        'onStateChange': onPlayerStateChange
        }
        });
        }

        // 4. The API will call this function when the video player is ready.
        function onPlayerReady(event) {
        event.target.playVideo();
        player.mute(); // comment out if you don't want the auto played video muted
        }

        // 5. The API calls this function when the player's state changes.
        // The function indicates that when playing a video (state=1),
        // the player should play for six seconds and then stop.
        function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.ENDED) {
        player.seekTo(0);
        player.playVideo();
        }
        }
        function stopVideo() {
        player.stopVideo();
        }
        </script> --}}
    @endif
@endsection

@section('content')

    @if ($course->lms == LMS_TYPE_OSHA_OUTREACH)
        <section class="hero-banner --inner-banner mb-0">
            <div class="inner-banner"
                style="background-image: url('{{ asset('/images/banner/' . $course_content['slug'] . '.jpg') }}');">
                <div class="container">
                    <h1 class="title mbpx-0">{{ $course_content['title'] }}</h1>
                </div>
            </div>
        </section>
    @else
        <section>
            <div class="container mtpx-30 mbpx-30">
                <div class="page-heading">
                    <h1 class="title mbpx-0">{{ $course_content['title'] }}</h1>
                </div>
            </div>
        </section>
        <section class="hero-banner hidden-sm-down" style="">
            <div class="container">
                {{-- <img style="position: absolute;left: 50%;top: 30px;margin-left: -180px; border: 1px solid #1f1d1e;" src="https://oshaoutreachcourses.puresafety.com/Training/Image/thumbnail/{{ $course_content['training_id'] }}" alt="{{ $img_alt }}" class="img-resp m-auto hidden-sm-down"> --}}
                @if ($course->lms === LMS_TYPE_OSHA_OUTREACH)
                    <img src="{{ asset('/images/course_placeholder.jpg') }}" class="img-resp m-auto"
                        alt="{{ $course_content['title'] }}" title="{{ $course_content['title'] }}" />
                @else
                    <img src="https://oshaoutreachcourses.puresafety.com/Training/Image/thumbnail/{{ $course_content['training_id'] }}"
                        class="img-resp m-auto" alt="{{ $course_content['title'] }}"
                        title="{{ $course_content['title'] }}">
                @endif
            </div>
        </section>
    @endif

{{--    @if ($course->lms == LMS_TYPE_OSHA_OUTREACH)--}}
{{--        --}}{{-- why to enroll video section here --}}
{{--        @include('partials._why_to_enroll_video_section', [--}}
{{--            'classes' => 'mt-4',--}}
{{--            'slug' => 'rusty-osha-30',--}}
{{--        ])--}}
{{--    @endif--}}

    <section class="home-intro sec-padding ptpx-30 depth-online">
        <div class="container">
            {{-- <h4 class="title">OSHA 10-Hour Construction course is designed for construction entry level workers to understand safety associated with construction industry.</h4> --}}
            @if ($course->lms == LMS_TYPE_OSHA_OUTREACH)
                {{--            @if (in_array($course->id, [5, 6, 8])) --}}
                {{--                <p class="fs-large fw-bold mbpx-40">This course contains Declaration and has been accepted by New --}}
                {{--                    York Department of Buildings to comply with the actively proctored online training requirements --}}
                {{--                    of New York City Site Safety Training Local Law 196.</p> --}}
                {{--            @elseif($course->id == 9) --}}
                {{--                <p class="fs-large fw-bold mbpx-40">Este curso contiene declaración y ha sido aceptado por el --}}
                {{--                    Departamento de Edificios de Nueva York para cumplir con los requisitos de capacitación en línea --}}
                {{--                    supervisados activamente de la Ley Local de Capacitación de Seguridad de la Ciudad de New York --}}
                {{--                    196.</p> --}}
                {{--            @endif --}}
                <p class="title">
                    @if ($course->id == 1)
                        OSHA 10-Hour Construction course is designed for construction entry level workers to understand
                        safety associated with the Construction Industry.
                    @elseif($course->id == 2)
                        The OSHA 30-Hour Construction is an in-depth online training course designed for individuals to
                        comply with OSHA standards related to the construction sector.
                    @elseif($course->id == 3)
                        OSHA 10-Hour General Industry course is designed for General Industry entry level workers to
                        understand safety associated with General Industry.
                    @elseif($course->id == 4)
                        OSHA 30-Hour General Industry Outreach Training course is a comprehensive safety program
                        designed for anyone involved in General Industry.
                    @elseif($course->id == 5)
                        New York OSHA 10-Hour Construction course is designed for construction entry level workers to
                        understand safety associated with the Construction Industry.
                    @elseif($course->id == 6)
                        New York OSHA 30-Hour Construction Industry Outreach Training course is a comprehensive safety
                        program designed for anyone involved in the Construction Industry.
                    @elseif($course->id == 7)
                        El curso de construcción de 10 horas de OSHA está diseñado para trabajadores de nivel de entrada
                        de construcción para comprender la seguridad asociada con la industria de la construcción.
                    @elseif($course->id == 8)
                        New York OSHA 10-Hour General Industry course is designed for General Industry entry level
                        workers to understand safety associated with General Industry.
                    @elseif($course->id == 9)
                        El curso de construcción de 10 horas de New York OSHA está diseñado para los trabajadores de
                        nivel de entrada de construcción para comprender la seguridad asociada con la industria de la
                        construcción.
                    @elseif($course->id == 2310)
                        Con nuestro curso en línea de OSHA, aprenderá sobre las normas de construcción 29 CFR 1926
                        establecidas por OSHA y también conocerá sus deberes para prevenir peligros en el sitio.
                    @elseif($course->id == 2311)
                        El curso de capacitación de extensión de la industria de la construcción de 30 horas de
                        OSHA de New York es un programa de seguridad integral diseñado para cualquier persona
                        involucrada en la industria de la construcción.
                    @endif
                    {{-- TODO: Add course short description for new course --}}
                </p>
            @else
                <p class="subtitle">{!! $course_content['description'] !!}</p>
            @endif

            <div class="row mbpx-10">
                <div class="col-md-12 col-xs-12 blue_bullets ta-left" id="course-info-div">
                    <span class="col-lg-4 col-md-6 col-xs-6 price-time" style="margin-top: 1% !important;">
                        <i class="xicon icon-dollar"></i> <span class="">PRICE</span>
                        <div>
                            <strong>
                                <span class="hidden-xs-down">$</span>
                                @if ($course_content['discounted_price'] > 0)
                                    {{ $course_content['discounted_price'] }}
                                    <small class="price-lt"
                                        style="color:#000;font-size: 12px;">${{ $course_content['price'] }}
                                    </small>
                                @else
                                    {{ $course_content['price'] }}
                                @endif
                            </strong>
                        </div>
                    </span>
                    @if ($course->duration > 0)
                        <span class="col-lg-4 col-md-6 col-xs-6 price-time" style="margin-top: 1% !important;">
                            <i class="xicon icon-clock"></i>
                            <span class="">DURATION</span>
                            <div><strong>{{ $course->duration }} hour(s)</strong></div>
                        </span>
                    @endif
                    @if ($course_content['lang'])
                        <span class="col-lg-4 col-md-6 col-xs-6 price-time" style="margin-top: 1% !important;"><i
                                class="xicon icon-language"></i> <span class="">LANGUAGE</span>
                            <div>
                                <strong>
                                    {{ $course_content['lang'] }}
                                </strong>
                            </div>
                        </span>
                    @endif
                    @if ($course_content['ceu'] !== '')
                        <span class="col-lg-4 col-md-6 col-xs-6 price-time" style="margin-top: 1% !important;">
                            <i class="xicon icon-credit"></i> <span class="">CEU</span>
                            <div>
                                <strong>
                                    <span class="hidden-md-up">CEU </span>
                                    {{ number_format($course_content['ceu'], 1) }}
                                </strong>
                            </div>
                        </span>
                    @endif
                    {{-- <span class="col-lg-4 col-md-6 col-xs-6 price-time" id="sku" style="margin-top: 1% !important;">
                        <i class="xicon icon-book"></i> <span class="">SKU</span>
                        <div><strong>SKU-{{ str_pad($course->id, 4, '0', STR_PAD_LEFT) }}</strong></div>
                    </span> --}}
                    {{-- Ratings --}}
                    <span class="col-lg-4 col-md-6 col-xs-6 price-time" id="ratings"
                        style="margin-top: 1% !important; display: none">
                        <i class="xicon icon-star-full"></i>
                        <span class="">RATINGS
                        </span>
                        <div id="product_just_stars" class="reg"></div>
                    </span>
                    {{-- Ratings --}}
                </div>
                <div class="col-md-12 dol_certi_job_list green_bullets ta-left mt-2 mb-3">
                    <span>
                        @if (preg_match('/.*osha.*/i', $course->title))
                            <img src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                                title="Bullet Points Green Tick" class="bullet-points-tick"> OSHA Authorized DOL Card
                        @else
                            <img src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                                title="Bullet Points Green Tick" class="bullet-points-tick"> Complete Online
                        @endif
                    </span>
                    <span><img src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                            title="Bullet Points Green Tick" class="bullet-points-tick"> Completion Certificate</span>
                    <span><img src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                            title="Bullet Points Green Tick" class="bullet-points-tick"> Job Aid (Study guide)</span>
                </div>
            </div>

            @if ($course->lms === LMS_TYPE_OSHA_OUTREACH)
                <a href="{{ route('product.addToCart', ['id' => $course_content['id']]) }}"
                    class="btn --btn-primary enroll_now_btn enrollBtnText"></a>
            @else
                <a href="https://oshaoutreachcourses.puresafety.com/Ondemand/ShoppingCart/AddToCart/301-{{ $course_content['training_id'] }}"
                    class="btn --btn-primary enroll_now_btn enrollBtnText"></a>
            @endif
            {{-- <br><br> --}}
            {{-- <strong>SHARE</strong> --}}
            {{-- <div class="sharethis-inline-share-buttons"></div> --}}
            {{-- <p class="subtitle mtpx-40 mbpx-0">All our OSHA courses are authorised under name of <strong>HSI</strong> with OSHA.gov</p> --}}
            @if (count($course_content['variants']))
                <div class="row mtpx-20">
                    <div class="col-md-12 ta-center price-time">
                        Also Available in : @foreach ($course_content['variants'] as $v => $variant)
                            @if ($v != 0)
                                ,
                            @endif
                            <a href="{{ url($variant['slug']) }}" title="{{ $variant['language'] }}">
{{--                                <span class="lang lang-{{ getLanguageISO($variant['language']) }}"></span>--}}
                                <strong>{{ $variant['language'] }}</strong>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            {{--            @if (in_array($course->id, [1, 2, 3, 5, 6, 8])) --}}
            {{--                <style> --}}
            {{--                    .advanceOnlineImage{ --}}
            {{--                        margin:15px auto 0; --}}
            {{--                        display: flex; --}}
            {{--                        flex-direction: column; --}}
            {{--                        align-items: center; --}}
            {{--                        justify-content: center; --}}
            {{--                        font-weight:700; --}}
            {{--                    } --}}
            {{--                </style> --}}
            {{--                <p class="advanceOnlineImage"> --}}
            {{--                    Powered By: --}}
            {{--                    <img src="https://res.cloudinary.com/elearning-avenue24/image/upload/v1632751614/assets/oc_images/advance-online-badge_dx67g5.jpg" /> --}}
            {{--                </p> --}}
            {{--            @endif --}}

            {{-- @if ($course->id <= 3)
        <div class="row mtpx-20">
            <div class="col-md-12 ta-center fs-large fw-semi-bold">
                @if ($course->id == 1)
                    Living Outside US? Check Out <a href="{{ url('osha-10-equivalent-construction-international') }}{{ empty($WEB_CREDIT) ? "" : '/'.$WEB_CREDIT }}"><strong class="fc-primary">OSHA 10 (Construction) (International)</strong></a>
            @elseif($course->id == 2)
            Living Outside US? Check Out <a href="{{ url('osha-30-equivalent-international') }}{{ empty($WEB_CREDIT) ? "" : '/'.$WEB_CREDIT }}"><strong class="fc-primary">OSHA 30 (Construction) (International)</strong></a>
            @elseif($course->id == 3)
            Living Outside US? Check Out <a href="{{ url('osha-10-equivalent-general-industry-international') }}{{ empty($WEB_CREDIT) ? "" : '/'.$WEB_CREDIT }}"><strong class="fc-primary">OSHA 10 (General Industry) (International)</strong></a>
            @endif
    </div>
    </div>
    @endif --}}
        </div>
    </section>
    {{--start satisfied --}}
    <div class="course_detail_page_satisfied">
    @include('partials._our_clients')
    </div>
    {{--end satisfied --}}
    <style>
        .course_detail_page_satisfied .sec-padding {
            padding-top: 0px;
            padding-bottom: 0px;
        }
    </style>

    @if($course->lms === LMS_TYPE_OSHA_OUTREACH)
        @include('partials._comparison_features')
    @endif
    <div class="course_detail_reviews">
    @include('partials._reviews_sa')
    </div>

    <style>
        .course_detail_reviews{
            margin-bottom: 60px;
        }
    </style>


    {{-- <section class="bg-secondary sec-padding"> --}}
    {{-- <div class="container pr-5 pl-5"> --}}
    {{-- <div class="page-heading mbpx-40"> --}}
    {{-- <h2 class="title mbpx-0">Why Us?</h2> --}}
    {{-- <p class="subtitle"></p> --}}
    {{-- </div> --}}

    {{-- <div class="box --course-objectives"> --}}
    {{-- <div class="row"> --}}
    {{-- <div class="col-lg-4 col-md-4 col-xs-6 usp-col"> --}}
    {{-- <div class="usp-icon usp_lowest_price_guaranteed" title="Lowest Price Guaranteed"></div> --}}
    {{-- <h3 class="fs-medium ta-center">LOWEST PRICE GUARANTEED</h3> --}}
    {{-- </div> --}}
    {{-- @if (!in_array(Route::currentRouteName(), ['course.single'])) --}}
    {{-- <div class="col-lg-4 col-md-4 col-xs-6 usp-col"> --}}
    {{-- <div class="usp-icon usp_laminated_official_osha_dol_card" --}}
    {{-- title="Laminated Official OSHA DOL Card"></div> --}}
    {{-- <h3 class="fs-medium ta-center">LAMINATED OFFICIAL OSHA DOL CARD</h3> --}}
    {{-- </div> --}}
    {{-- @else --}}
    {{-- <div class="col-lg-4 col-md-4 col-xs-6 usp-col"> --}}
    {{-- <div class="usp-icon usp_free_study_guide" title="Free Study Guide"></div> --}}
    {{-- <h3 class="fs-medium ta-center">FREE STUDY GUIDE</h3> --}}
    {{-- </div> --}}
    {{-- @endif --}}
    {{-- <div class="col-lg-4 col-md-4 col-xs-6 usp-col"> --}}
    {{-- <div class="usp-icon usp_downloadable_certificate" --}}
    {{-- title="Post Completion Downloadable Certificate"></div> --}}
    {{-- <h3 class="fs-medium ta-center">DOWNLOADABLE CERTIFICATE</h3> --}}
    {{-- </div> --}}

    {{-- <div class="col-lg-4 col-md-4 col-xs-6 usp-col"> --}}
    {{-- <div class="usp-icon usp_bulk_registrations" --}}
    {{-- title="Bulk Registrations Available For Discounted Rates"></div> --}}
    {{-- <h3 class="fs-medium ta-center">BULK REGISTRATIONS</h3> --}}
    {{-- </div> --}}

    {{-- <div class="col-lg-4 col-md-4 col-xs-6 usp-col"> --}}
    {{-- <div class="usp-icon usp_24_7_customer_support" title="24/7 Customer Support"></div> --}}
    {{-- <h3 class="fs-medium ta-center">24/7 CUSTOMER SUPPORT</h3> --}}
    {{-- </div> --}}

    {{-- <div class="col-lg-4 col-md-4 col-xs-6 usp-col"> --}}
    {{-- <div class="usp-icon usp_complete_online" --}}
    {{-- title="Accessible From Anywhere, Complete Online"></div> --}}
    {{-- <h3 class="fs-medium ta-center">COMPLETE ONLINE</h3> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </section> --}}

    {{-- @include('partials._whyus_without_desc') --}}


    @if ($course->id == 2)
        <section class="container sec-padding rowCustom mt-0 ptpx-0" >

            <div class="col-md-12">
                <div class="page-heading mbpx-40 ">
                    <h2 class="title course-t responsive_title_center" style="text-align: center !important;">
                        Overview</h2>
                    <p class="subtitle-sp"></p>
                </div>

                <div class="box --course-objectives-sp text-center">
                    <div class="overview_limit_desc">
                        <p>{!!  \Str::words(strip_tags($course_content['description']), 50,'...')  !!}</p>
                    </div>
                    <div class="overview_hide_desc"> {!! $course_content['description'] !!} </div>
                </div>
                <div class="readmore_button_text_center">
                <button class="overview_hide_button_read_more read_more_less_btn" >Read more</button>
                </div>

            </div>

            <style>
                .overview_hide_desc {
                    display: none;
                }
                .overview_hide_button_read_more{
                    margin-top:20px;
                }
            </style>


            <div class="col-md-8 mx-auto img-container">
                <h2 class="title course-t mbpx-10 course_detail_guid_osha_title"
                    style="text-align: center !important;margin-top:25px;">Guide To OSHA 30 Construction</h2>
                <div class="img-overlay">
                    <img class="osha30-info-img" src="{{ asset('images/info_thumbnails/osha-30-construction.jpg') }}"
                        alt="OSHA 30 Construction">
                </div>
            </div>

            <div class="course-outline-popup" style="display: none;">
                <div class="popclosebtn">
                    <a href="#" title="Click to close" class="fs-large float-right close">
                        <i class="icon-close-solid" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="popup-inner-div">
                    <div>
                        <img src="{{ asset('images/osha-30-construction.jpg') }}" alt="OSHA 30 Construction">
                    </div>
                </div>

            </div>

        </section>
    @elseif($course->id == 1)
        <section class="container sec-padding rowCustom ptpx-0">

            <div class="col-md-12">
                <div class="page-heading mbpx-40">
                    <h2 class="title course-t responsive_title_center" style="">Overview</h2>
                    <p class="subtitle-sp"></p>
                </div>

                <div class="box --course-objectives-sp text-center">
{{--                    <p>{!! $course_content['description'] !!}</p>--}}
                    <div class="overview_limit_desc">
                        <p>{!!  \Str::words(strip_tags($course_content['description']), 50,'...')  !!}</p>
                    </div>
                    <div class="overview_hide_desc"> {!! $course_content['description'] !!} </div>
                </div>
                <div class="readmore_button_text_center">
                    <button class="overview_hide_button_read_more read_more_less_btn" >Read more</button>
                </div>
            </div>

            <style>
                .overview_hide_desc {
                    display: none;
                }
                .overview_hide_button_read_more{
                    margin-top:20px;
                }
            </style>

            <div class="col-md-8 mx-auto img-container">
                <h2 class="title course-t mbpx-10 course_detail_guid_osha_title"
                    style="text-align: center !important;margin-top:25px;">Guide To OSHA 10 Construction</h2>
                <div class="img-overlay">
                    <img class="osha30-info-img" src="{{ asset('images/info_thumbnails/osha-10-construction.jpg') }}"
                        alt="OSHA 10 Construction">
                </div>
            </div>

            <div class="course-outline-popup" style="display: none;">
                <div class="popclosebtn">
                    <a href="#" title="Click to close" class="fs-large float-right close">
                        <i class="icon-close-solid" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="popup-inner-div">
                    <div>
                        <img src="{{ asset('images/osha-10-construction.jpg') }}" alt="OSHA 10 Construction">
                    </div>
                </div>

            </div>

        </section>
    @elseif($course->id == 9)
        <section class="container sec-padding rowCustom ptpx-0">

            <div class="col-md-12">
                <div class="page-heading mbpx-40">
                    <h2 class="title course-t responsive_title_center" style="">Overview</h2>
                    <p class="subtitle-sp"></p>
                </div>

                <div class="box --course-objectives-sp text-center">
{{--                    <p>{!! $course_content['description'] !!}</p>--}}
                    <div class="overview_limit_desc">
                        <p>{!!  \Str::words(strip_tags($course_content['description']), 50,'...')  !!}</p>
                    </div>
                    <div class="overview_hide_desc"> {!! $course_content['description'] !!} </div>
                </div>
                <div class="readmore_button_text_center">
                    <button class="overview_hide_button_read_more read_more_less_btn" >Read more</button>
                </div>
            </div>
            <style>
                .overview_hide_desc {
                    display: none;
                }
                .overview_hide_button_read_more{
                    margin-top:20px;
                }
            </style>

            <div class="col-md-8 mx-auto img-container">
                <h2 class="title course-t mbpx-10 course_detail_guid_osha_title"
                    style="text-align: center !important;margin-top:25px;">Guide To New York OSHA 10 Construction Spanish
                </h2>
                <div class="img-overlay">
                    <img class="osha30-info-img"
                        src="{{ asset('images/info_thumbnails/newyork-osha-10-horas-construction.jpg') }}"
                        alt="New York OSHA 10 Construction Spanish">
                </div>
            </div>

            <div class="course-outline-popup" style="display: none;">
                <div class="popclosebtn">
                    <a href="#" title="Click to close" class="fs-large float-right close">
                        <i class="icon-close-solid" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="popup-inner-div">
                    <div>
                        <img src="{{ asset('images/ny-osha-10-spanish.jpg') }}"
                            alt="New York OSHA 10 Construction Spanish">
                    </div>
                </div>

            </div>

        </section>
    @elseif($course->id == 7)
        <section class="container sec-padding rowCustom ptpx-0">

            <div class="col-md-12">
                <div class="page-heading mbpx-40">
                    <h2 class="title course-t responsive_title_center" style="">Overview</h2>
                    <p class="subtitle-sp"></p>
                </div>

                <div class="box --course-objectives-sp text-center">
{{--                    <p>{!! $course_content['description'] !!}</p>--}}
                    <div class="overview_limit_desc">
                        <p>{!!  \Str::words(strip_tags($course_content['description']), 50,'...')  !!}</p>
                    </div>
                    <div class="overview_hide_desc"> {!! $course_content['description'] !!} </div>
                </div>
                <div class="readmore_button_text_center">
                    <button class="overview_hide_button_read_more read_more_less_btn" >Read more</button>
                </div>
            </div>

            <style>
                .overview_hide_desc {
                    display: none;
                }
                .overview_hide_button_read_more{
                    margin-top:20px;
                }
            </style>

            <div class="col-md-8 mx-auto img-container">
                <h2 class="title course-t mbpx-10 course_detail_guid_osha_title"
                    style="text-align: center !important;margin-top:25px;">Guide To OSHA 10 Construction Spanish</h2>
                <div class="img-overlay">
                    <img class="osha30-info-img"
                        src="{{ asset('images/info_thumbnails/osha-10-hour-construction-esponal.jpg') }}"
                        alt="OSHA 10 Construction Spanish">
                </div>
            </div>

            <div class="course-outline-popup" style="display: none;">
                <div class="popclosebtn">
                    <a href="#" title="Click to close" class="fs-large float-right close">
                        <i class="icon-close-solid" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="popup-inner-div">
                    <div>
                        <img src="{{ asset('images/osha-10-spanish.jpg') }}" alt="OSHA 10 Construction Spanish">
                    </div>
                </div>

            </div>

        </section>
    @elseif($course->id == 3)
        <section class="container sec-padding rowCustom ptpx-0">

            <div class="col-md-9">
                <div class="page-heading mbpx-40">
                    <h2 class="title course-t responsive_title_center" style="">
                        Overview</h2>
                    <p class="subtitle-sp"></p>
                </div>

                <div class="box --course-objectives-sp text-center">
{{--                    <p>{!! $course_content['description'] !!}</p>--}}
                    <div class="overview_limit_desc">
                        <p>{!!  \Str::words(strip_tags($course_content['description']), 50,'...')  !!}</p>
                    </div>
                    <div class="overview_hide_desc"> {!! $course_content['description'] !!} </div>
                </div>
                <div class="readmore_button_text_center">
                    <button class="overview_hide_button_read_more read_more_less_btn" >Read more</button>
                </div>
            </div>
            <style>
                .overview_hide_desc {
                    display: none;
                }
                .overview_hide_button_read_more{
                    margin-top:20px;
                }
            </style>

            <div class="col-md-8 mx-auto img-container">
                <h2 class="title course-t mbpx-10 course_detail_guid_osha_title"
                    style="text-align: center !important;margin-top:25px;">Guide To OSHA 10 General Industry</h2>
                <div class="img-overlay">
                    <img class="osha30-info-img"
                        src="{{ asset('images/info_thumbnails/osha-10-hour-general-industry.jpg') }}"
                        alt="osha 10 general">
                </div>
            </div>

            <div class="course-outline-popup" style="display: none;">
                <div class="popclosebtn">
                    <a href="#" title="Click to close" class="fs-large float-right close">
                        <i class="icon-close-solid" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="popup-inner-div">
                    <div>
                        <img src="{{ asset('images/osha-10-general-industry.jpg') }}" alt="osha 10 general">
                    </div>
                </div>

            </div>

        </section>
    @elseif($course->id == 6)
        <section class="container sec-padding rowCustom ptpx-0">

            <div class="col-md-12">
                <div class="page-heading mbpx-40">
                    <h2 class="title course-t responsive_title_center" style="">Overview</h2>
                    <p class="subtitle-sp"></p>
                </div>

                <div class="box --course-objectives-sp text-center">
{{--                    <p>{!! $course_content['description'] !!}</p>--}}
                    <div class="overview_limit_desc">
                        <p>{!!  \Str::words(strip_tags($course_content['description']), 50,'...')  !!}</p>
                    </div>
                    <div class="overview_hide_desc"> {!! $course_content['description'] !!} </div>
                </div>
                <div class="readmore_button_text_center">
                    <button class="overview_hide_button_read_more read_more_less_btn" >Read more</button>
                </div>
            </div>

            <style>
                .overview_hide_desc {
                    display: none;
                }
                .overview_hide_button_read_more{
                    margin-top:20px;
                }
            </style>

            <div class="col-md-8 mx-auto img-container">
                <h2 class="title course-t mbpx-10 course_detail_guid_osha_title"
                    style="text-align: center !important;margin-top:25px;">Guide To New York OSHA 30 Construction</h2>
                <div class="img-overlay">
                    <img class="osha30-info-img"
                        src="{{ asset('images/info_thumbnails/newyork-osha-30-hour-construction.jpg') }}"
                        alt="ny osha 30">
                </div>
            </div>

            <div class="course-outline-popup" style="display: none;">
                <div class="popclosebtn">
                    <a href="#" title="Click to close" class="fs-large float-right close">
                        <i class="icon-close-solid" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="popup-inner-div">
                    <div>
                        <img src="{{ asset('images/ny-30-construction.jpg') }}" alt="ny osha 30">
                    </div>
                </div>

            </div>

        </section>
    @elseif($course->id == 5)
        <section class="container sec-padding rowCustom ptpx-0">

            <div class="col-md-12">
                <div class="page-heading mbpx-40">
                    <h2 class="title course-t responsive_title_center" style="">Overview</h2>
                    <p class="subtitle-sp"></p>
                </div>

                <div class="box --course-objectives-sp text-center">
{{--                    <p>{!! $course_content['description'] !!}</p>--}}
                    <div class="overview_limit_desc">
                        <p>{!!  \Str::words(strip_tags($course_content['description']), 50,'...')  !!}</p>
                    </div>
                    <div class="overview_hide_desc"> {!! $course_content['description'] !!} </div>
                </div>
                <div class="readmore_button_text_center">
                    <button class="overview_hide_button_read_more read_more_less_btn" >Read more</button>
                </div>
            </div>

            <style>
                .overview_hide_desc {
                    display: none;
                }
                .overview_hide_button_read_more{
                    margin-top:20px;
                }
            </style>

            <div class="col-md-8 mx-auto img-container">
                <h2 class="title course-t mbpx-10 course_detail_guid_osha_title"
                    style="text-align: center !important;margin-top:25px;">Guide To New York OSHA 10 Construction</h2>
                <div class="img-overlay">
                    <img class="osha30-info-img"
                        src="{{ asset('images/info_thumbnails/newyork-osha-10-hour-construction.jpg') }}"
                        alt="ny osha 10">
                </div>
            </div>

            <div class="course-outline-popup" style="display: none;">
                <div class="popclosebtn">
                    <a href="#" title="Click to close" class="fs-large float-right close">
                        <i class="icon-close-solid" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="popup-inner-div">
                    <div>
                        <img src="{{ asset('images/ny-osha-10-construction.jpg') }}" alt="ny osha 10">
                    </div>
                </div>

            </div>

        </section>
    @elseif($course->id == 8)
        <section class="container sec-padding rowCustom ptpx-0">

            <div class="col-md-12">
                <div class="page-heading mbpx-40">
                    <h2 class="title course-t responsive_title_center" style="">Overview</h2>
                    <p class="subtitle-sp"></p>
                </div>

                <div class="box --course-objectives-sp text-center">
{{--                    <p>{!! $course_content['description'] !!}</p>--}}
                    <div class="overview_limit_desc">
                        <p>{!!  \Str::words(strip_tags($course_content['description']), 50,'...')  !!}</p>
                    </div>
                    <div class="overview_hide_desc"> {!! $course_content['description'] !!} </div>
                </div>
                <div class="readmore_button_text_center">
                    <button class="overview_hide_button_read_more read_more_less_btn" >Read more</button>
                </div>
            </div>
            <style>
                .overview_hide_desc {
                    display: none;
                }
                .overview_hide_button_read_more{
                    margin-top:20px;
                }
            </style>

            <div class="col-md-8 mx-auto img-container">
                <h2 class="title course-t mbpx-10 course_detail_guid_osha_title"
                    style="text-align: center !important;margin-top:25px;">Guide To New York OSHA 10 General</h2>
                <div class="img-overlay">
                    <img class="osha30-info-img"
                        src="{{ asset('images/info_thumbnails/newyork-osha-10-hour-general.jpg') }}"
                        alt="ny osha 10 general">
                </div>
            </div>

            <div class="course-outline-popup" style="display: none;">
                <div class="popclosebtn">
                    <a href="#" title="Click to close" class="fs-large float-right close">
                        <i class="icon-close-solid" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="popup-inner-div">
                    <div>
                        <img src="{{ asset('images/ny-osha-10-general.jpg') }}" alt="ny osha 10 general">
                    </div>
                </div>

            </div>

        </section>
    @elseif($course->id == 2310)
        <section class="container sec-padding rowCustom ptpx-0">

            <div class="col-md-12">
                <div class="page-heading mbpx-40">
                    <h2 class="title course-t responsive_title_center" style="">Overview</h2>
                    <p class="subtitle-sp"></p>
                </div>

                <div class="box --course-objectives-sp text-center">
                    <div class="overview_limit_desc">
                        <p>{!!  \Str::words(strip_tags($course_content['description']), 50,'...')  !!}</p>
                    </div>
                    <div class="overview_hide_desc"> {!! $course_content['description'] !!} </div>
                </div>
                <div class="readmore_button_text_center">
                    <button class="overview_hide_button_read_more read_more_less_btn" >Read more</button>
                </div>

            </div>

            <style>
                .overview_hide_desc {
                    display: none;
                }
                .overview_hide_button_read_more{
                    margin-top:20px;
                }
            </style>

            <div class="col-md-8 mx-auto img-container">
                <h2 class="title course-t mbpx-10 course_detail_guid_osha_title"
                    style="text-align: center !important;margin-top:25px;">Guide To OSHA 30 Construction Spanish</h2>
                <div class="img-overlay">
                    <img class="osha30-info-img"
                        src="{{ asset('images/info_thumbnails/osha-30-horas-construction.jpg') }}"
                        alt="osha 30 construction spanish">
                </div>
            </div>

            <div class="course-outline-popup" style="display: none;">
                <div class="popclosebtn">
                    <a href="#" title="Click to close" class="fs-large float-right close">
                        <i class="icon-close-solid" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="popup-inner-div">
                    <div>
                        <img src="{{ asset('images/osha-30-construction-spanish-overview.jpg') }}"
                            alt="osha 30 construction spanish">
                    </div>
                </div>

            </div>

        </section>
    @elseif($course->id == 2311)
        <section class="container sec-padding rowCustom pt-0 ptpx-0">

            <div class="col-md-12">
                <div class="page-heading mbpx-40">
                    <h2 class="title course-t responsive_title_center" style="">Overview</h2>
                    <p class="subtitle-sp"></p>
                </div>

                <div class="box --course-objectives-sp text-center">
{{--                    <p>{!! $course_content['description'] !!}</p>--}}
                    <div class="overview_limit_desc">
                        <p>{!!  \Str::words(strip_tags($course_content['description']), 50,'...')  !!}</p>
                    </div>
                    <div class="overview_hide_desc"> {!! $course_content['description'] !!} </div>
                </div>
                <div class="readmore_button_text_center">
                    <button class="overview_hide_button_read_more read_more_less_btn" >Read more</button>
                </div>

            </div>

            <style>
                .overview_hide_desc {
                    display: none;
                }
                .overview_hide_button_read_more{
                    margin-top:20px;
                }
            </style>

            <div class="col-md-8 mx-auto img-container">
                <h2 class="title course-t mbpx-10 course_detail_guid_osha_title"
                    style="text-align: center !important;margin-top:25px;">Guide To New York OSHA 30 Construction Spanish
                </h2>
                <div class="img-overlay">
                    <img class="osha30-info-img"
                        src="{{ asset('images/info_thumbnails/newyork-osha-30-horas-construction-de.jpg') }}"
                        alt="ny osha 30 construction spanish">
                </div>
            </div>

            <div class="course-outline-popup" style="display: none;">
                <div class="popclosebtn">
                    <a href="#" title="Click to close" class="fs-large float-right close">
                        <i class="icon-close-solid" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="popup-inner-div">
                    <div>
                        <img src="{{ asset('images/ny-osha-30-construction-spanish-overview.jpg') }}"
                            alt="ny osha 30 construction spanish">
                    </div>
                </div>

            </div>

        </section>
    @elseif($course->lms === LMS_TYPE_OSHA_OUTREACH && $course->id != 2317)
        <section class="container sec-padding ptpx-0">
            <div class="page-heading mbpx-40">
                <h2 class="title mbpx-10">Overview</h2>
{{--                <p class="subtitle"></p>--}}
                <p class="subtitle-sp"></p>
            </div>

            <div class="box --course-objectives-sp ta-center">
{{--                <p class="desc">{!! $course_content['description'] !!}</p>--}}
                <div class="overview_limit_desc">
                    <p>{!!  \Str::words(strip_tags($course_content['description']), 50,'...')  !!}</p>
                </div>
                <div class="overview_hide_desc"> {!! $course_content['description'] !!} </div>
            </div>
            <div class="readmore_button_text_center">
                <button class="overview_hide_button_read_more read_more_less_btn" >Read more</button>
            </div>

            </div>

            <style>
                .overview_hide_desc {
                    display: none;
                }
                .overview_hide_button_read_more{
                    margin-top:20px;
                }
            </style>
        </section>
    @endif


    @if ($course->lms == LMS_TYPE_OSHA_OUTREACH)
        @include('partials._bpl_scholarship_partnerwithus')
    @endif

    @if (isset($course_content['outline']) && count($course_content['outline']))
        <section class="sec-padding" id="outline_div">
            <div class="container pr-5 pl-5">
                <div class="page-heading mbpx-40">
                    <h2 class="title mbpx-10">Course Outline</h2>
                    <p class="subtitle"></p>
                </div>

                <div class="course-outline">
                    @foreach ($course_content['outline'] as $part_key => $outline)
                        <div class="row outline_parts outline_part_{{ $part_key + 1 }}">
                            @if ($outline['title'] != '0')
                                <h3 class="tt-uppercase h6" style="line-height: 18px;">
                                    <span class="title-text">{{ $outline['title'] }}</span>
                                </h3>
                            @endif
                            @if ($outline['lessons']['count'])
                                <div class="col-md-6">
                                    <div class="box --outline-box">
                                        <ul class="unstyled">
                                            @for ($i = 1; $i <= $outline['lessons']['ul_1_length']; $i++)
                                                @if (isset($outline['lessons'][$i - 1]))
                                                    <li>
                                                        <h4 class="lesson_name fs-default">
                                                            {{ $i . '. ' . $outline['lessons'][$i - 1]['title'] }}
                                                            &nbsp;&nbsp;&nbsp;</h4>
                                                        @if ($course->lms === LMS_TYPE_PURE_SAFETY && !empty($outline['lessons'][$i - 1]['list']))
                                                            <ol class="unstyled"
                                                                style="display:none;list-style-type: disc;padding-left: 30px;">
                                                                @foreach ($outline['lessons'][$i - 1]['list'] as $list_item)
                                                                    <li>{{ $list_item }}</li>
                                                                @endforeach
                                                            </ol>
                                                        @endif
                                                    </li>
                                                @endif
                                            @endfor
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="box --outline-box">
                                        <ul class="unstyled">
                                            @for ($i = $outline['lessons']['ul_1_length'] + 1; $i <= $outline['lessons']['ul_2_length']; $i++)
                                                @if (isset($outline['lessons'][$i - 1]))
                                                    <li>
                                                        <h4 class="lesson_name fs-default">
                                                            {{ $i . '. ' . $outline['lessons'][$i - 1]['title'] }}
                                                            &nbsp;&nbsp;&nbsp;</h4>
                                                        @if ($course->lms === LMS_TYPE_PURE_SAFETY && !empty($outline['lessons'][$i - 1]['list']))
                                                            <ol class="unstyled"
                                                                style="display:none;list-style-type: disc;padding-left: 30px;">
                                                                @foreach ($outline['lessons'][$i - 1]['list'] as $list_item)
                                                                    <li>{{ $list_item }}</li>
                                                                @endforeach
                                                            </ol>
                                                        @endif
                                                    </li>
                                                @endif
                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                            @endif

                        </div>
                    @endforeach
                </div>
                <div class="row mtpx-20" id="view_more_outline_btn_div">
                    <div class="col-md-12 ta-center">
                        <button class="btn --btn-primary" type="button">View More <i class="xicon icon-arrow-down"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if (isset($course_content['objective']) && $course_content['objective']['count'])
        <section class="bg-secondary sec-padding">
            <div class="container">
                <div class="page-heading mbpx-40">
                    <h2 class="title mbpx-10">Learning Objectives</h2>
                    <p class="subtitle"></p>
                </div>

                <div class="row">
                    <div class="col-md-6 read_more_learning_objective_content">
                        <div class="box --course-objectives">
                            <ul class="unstyled">
                                @for ($i = 1; $i <= $course_content['objective']['ul_1_length']; $i++)
                                    @if (isset($course_content['objective'][$i - 1]))
                                        <li>{!! $course_content['objective'][$i - 1] !!}</li>
                                    @endif
                                @endfor
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-6 read_more_learning_objective_content">
                        <div class="box --course-objectives">
                            <ul class="unstyled">
                                @for ($i = $course_content['objective']['ul_1_length'] + 1; $i <= $course_content['objective']['ul_2_length']; $i++)
                                    @if (isset($course_content['objective'][$i - 1]))
                                        <li>{!! $course_content['objective'][$i - 1] !!}</li>
                                    @endif
                                @endfor
                            </ul>
                        </div>
                    </div>
                    <div class="mobile_readmore_wrapper">
                    <div  class="mb-3 ">
                        <ul id="mobile_decs" class="mobile_decs_learning_class"></ul>
                    </div>

                </div>

                </div>
                <div class="readmore_button_text_center">
                    <button id="toggle_learning_objective" class="read_more_btn_learning_objective  read_more_less_btn">Read More</button>
                </div>
            </div>
        </section>
    @endif

    @if (preg_match('/.*osha.*/i', $course->title))
        <section class="container sec-padding">
            <div class="page-heading mbpx-40">
                <h2 class="title mbpx-0">Exam &amp; Quiz Information</h2>
                <p class="subtitle"></p>
            </div>

            <div class="box --course-objectives">
                @if ($course->language == COURSE_LANG_SPANISH)
                    @php($spanishCourseTitle = preg_replace('/spanish/i', 'español', $course_content['title']))
                    <p class="desc" style="margin-bottom: 0;">
                        Se requiere un puntaje mínimo del 70% para calificar para el {{ $spanishCourseTitle }},
                        para el cual se le otorgarán TRES INTENTOS para aprobar las pruebas y el examen final.
                    </p>
                    <div class="course_detail_quiz_desc">
                    <p class="desc" style="margin-bottom: 0;">
                        En el caso de
                        que falle las tres veces o deje que su curso caduque, se le presentará un uso único del Botón de
                        reinicio
                        del curso para comenzar de nuevo, pero si ocurre la segunda vez, se le suspenderá el acceso al curso
                        y tendrá que
                        volver a comprar el curso para comenzar su formación. Al completar la capacitación
                        {{ $spanishCourseTitle }}
                        y completar la encuesta de evaluación del curso, puede imprimir el certificado
                        {{ $spanishCourseTitle }}
                        descargable. Además, dentro de los 90 días, se le enviará por correo la tarjeta
                        {{ $spanishCourseTitle }},
                        también conocida como tarjeta DOL, que emite el Departamento de Trabajo de EE. UU.
                    </p>
                    </div>
                    <div class="readmore_button_text_center">
                        <button class="course_detail_quiz read_more_less_btn" >Read more</button>
                    </div>
                    </p>
                    <style>
                        .course_detail_quiz_desc {
                            display: none;
                        }
                        .course_detail_quiz{
                            margin-top:20px;
                        }
                    </style>
                @else
                    <p class="desc" style="margin-bottom: 0;">
                        A minimum of 70% score is required to qualify for the {{ $course_content['title'] }} course,
                        for which you will be afforded THREE ATTEMPTS to pass the quizzes and the final exam.
                    </p>
                    <div class="course_detail_quiz_desc">
                        <p class="desc" style="margin-bottom: 0;">
                        In the event of failing all three times or letting your course expire, you will be presented with a
                        one-time use of the Course Reset Button to start over, but if it occurs the second time,
                        you will be suspended from accessing the course and will have to repurchase the course to
                        start your training. Upon completing the {{ $course_content['title'] }} training and filling in
                        the
                        course evaluation survey, you can print out the downloadable {{ $course_content['title'] }}
                        certificate. In addition, within 90 days, you will be mailed the {{ $course_content['title'] }}
                        card,
                        also known as the DOL card, which the U.S. Department of Labor issues.
                        </p>
                    </div>

{{--                    <div class="course_detail_quiz read_more_less_btn" ><button>Read more</button></div>--}}
                    <div class="readmore_button_text_center">
                        <button class="course_detail_quiz read_more_less_btn" >Read more</button>
                    </div>
                    <style>
                        .readmore_button_text_center{
                            /*display: flex;*/
                            /*justify-content: center;*/
                        }
                        .course_detail_quiz_desc {
                            display: none;
                        }
                        .course_detail_quiz{
                            margin-top:20px;
                        }
                    </style>
                @endif
            </div>
        </section>
    @endif

    @include('partials._faqs', ['blueBackground' => true])

    <div class="course_detail_page_video_testimonial">
        <div class="page-heading">
            <h2 class="title">VIDEO TESTIMONIAL</h2>
        </div>
        @include('partials._video_reviews_slider')
    </div>



    @if (in_array($course->id, [1, 2, 3, 5, 6, 8]))
        @php($course_title = $course_content['title'])
        @php($course_description = $course_content['description'])
        @foreach ($course->seoTags as $seo_tag)
            @if ($seo_tag->meta_name == 'title')
                @php($course_title = $seo_tag->meta_content)
            @elseif($seo_tag->meta_name == 'description')
                @php($course_description = $seo_tag->meta_content)
            @endif
        @endforeach
        <script type="application/ld+json">
            {
               "@context": "https://schema.org",
               "@type": "VideoObject",
               "name": "{{ $course_title }}",
                "description": "{{ strip_tags($course_description) }}",
                "thumbnailUrl": [
                    "https://i.ytimg.com/vi_webp/{{$youtube_video_code}}/maxresdefault.webp"
                ],
                "uploadDate": "{{ $youtube_upload_date }}",
                "duration": "{{ $youtube_duration }}",
                "contentUrl": "https://www.youtube.com/watch?v={{$youtube_video_code}}&ab_channel=OshaOutreachCourses",
                "embedUrl": "https://www.youtube.com/embed/{{$youtube_video_code}}",
                "interactionStatistic": {
                    "@type": "InteractionCounter",
                    "interactionType": {
                        "@type": "http://schema.org/WatchAction"
                    },
                    "userInteractionCount": 5647018
                 },
                "regionsAllowed": "US,NL"
            }

        </script>



        <section class="bg-secondary sec-padding" style="background-color: #1d81c2;">
            <div class="container pr-5 pl-5" style="max-width:800px;">
                <div class="page-heading mbpx-40">
                    <h2 class="title mbpx-0 fc-white" style="font-size: 22px; letter-spacing: 0px;">Learn More About OSHA
                        Outreach
                        Courses</h2>
                </div>

                <div class="videoWrapper" style="--aspect-ratio: 9 / 16;" data-nosnippet>
                    <iframe
                        src="https://www.youtube.com/embed/{{ $youtube_video_code }}?cc_load_policy=1&modestbranding=1&color=white&iv_load_policy=3"
                        srcdoc="
                                    <style>
                                        *{padding:0;margin:0;overflow:hidden}
                                        html,body{height:100%}
                                        img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}
                                        span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}
                                        video{width:100%;}
                                    </style>
                                    <a href=https://www.youtube.com/embed/{{ $youtube_video_code }}?autoplay=1&cc_load_policy=1&modestbranding=1&color=white&iv_load_policy=3>
                                        <img src=https://img.youtube.com/vi/{{ $youtube_video_code }}/hqdefault.jpg alt='Learn More About Us'>
                                        <span>▶</span>
                                    </a>"
                        frameborder="0" allowfullscreen title="Learn More About Us"></iframe>
                </div>
            </div>
        </section>
    @endif


    {{-- start journey section --}}
    @include('partials._start_your_journey', ['title' => 'Group Discount for Corporate Accounts ', 'btn_text' => 'CALCULATE NOW', 'btnLink' => "/group-enrollment"])
    {{-- end journey section --}}
    @stack('related_courses_lang_modals')

    <div class="course_detail_related_courses">
    @include('partials._related_courses')
    </div>
    <style>
        .course_detail_related_courses .sec-padding{
            padding-top:0px;
        }
    </style>
{{--    @include('partials._reviews_sa')--}}

     @include('partials._ctaNew')

    @stack('modal_content')

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            const total_outline_parts = $(".outline_parts").length;
            var visible_outline_parts = 4;

            if ($('.outline_parts').length > 1) {
                $('.outline_parts .col-md-6').hide();
                $('.outline_parts:first-child h3').toggleClass('open');
                $('.outline_parts:first-child .col-md-6').show();

                if (total_outline_parts > 5) {
                    $(".outline_parts:gt(4)").hide();
                }
            }

            $('.outline_parts h3').click(function() {
                var divs = $(this).siblings('.col-md-6');
                if (divs) {
                    divs.toggle({
                        speed: 300
                    });
                    $(this).toggleClass('open');
                }
            });

            if ($('.lesson_name').length > 0) {
                $('.lesson_name').click(function() {
                    var ol = $(this).siblings('ol');
                    if (ol) {
                        ol.toggle({
                            speed: 300
                        });
                        $(this).toggleClass('open');
                    }
                });
            }

            $('.usp-col').matchHeight();

            if (total_outline_parts > 5) {
                $('#view_more_outline_btn_div button').click(function() {
                    if (visible_outline_parts >= total_outline_parts) {
                        var offset = $("#outline_div").offset();
                        $('html, body').animate({
                            scrollTop: offset.top,
                            scrollLeft: offset.left
                        }, 500);
                        hideMoreOutlineParts()
                    } else {
                        viewMoreOutlineParts()
                    }
                });
            } else {
                $('#view_more_outline_btn_div').remove();
            }

            function viewMoreOutlineParts() {
                visible_outline_parts += 10;
                if (visible_outline_parts > total_outline_parts) {
                    visible_outline_parts = total_outline_parts;
                }
                toggleOutlineDivs();
                if ($('.outline_parts:last-of-type').is(":visible")) {
                    $('#view_more_outline_btn_div button').html('Show Less <i class="xicon icon-arrow-up"></i>');
                }
            }

            function hideMoreOutlineParts() {
                visible_outline_parts = 4;
                toggleOutlineDivs();
                $('#view_more_outline_btn_div button').html('View More <i class="xicon icon-arrow-down"></i>');
            }

            function toggleOutlineDivs() {
                var counter = 0;
                $(".outline_parts").each(function(outline) {
                    counter++;
                    if (counter > visible_outline_parts) {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }
                });
            }

            $('.img-overlay').click(function(e) {
                e.preventDefault();
                $('.course-outline-popup').fadeIn(300);
                $('body').addClass('modal-open');
                $('.shopperlink').hide();

            });

            $('.popclosebtn, .course-outline-popup').click(function(e) {
                $('body').removeClass('modal-open');
                $('.course-outline-popup').fadeOut(300);
                $('.shopperlink').show();

                e.preventDefault();
            });

            $(".course-outline-popup .popup-inner-div").click(function(e) {
                e.stopPropagation();
            });
        });
    </script>
    {{-- Include Product Review Script --}}
    <script type="text/javascript">
        var sa_product = "{{ str_pad($course->id, 4, '0', STR_PAD_LEFT) }}";
        (function(w, d, t, f, o, s, a) {
            o = 'shopperapproved';
            if (!w[o]) {
                w[o] = function() {
                    (w[o].arg = w[o].arg || []).push(arguments)
                };
                s = d.createElement(t), a = d.getElementsByTagName(t)[0];
                s.async = 1;
                s.src = f;
                a.parentNode.insertBefore(s, a)
            }
        })(window, document, 'script', "//www.shopperapproved.com/product/33391/" + sa_product + ".js");

        /* show stars if present */
        $(window).load(function() {
            setTimeout(function() {
                if ($('#product_just_stars').is(':empty') === false) {
                    // $('#ratings').fadeIn('fast', 'swing');
                    $('#ratings').show();
                } else {
                    // for center aligning last element
                    $('#ratings').remove();
                    $(".price-time").addClass("text-center")
                }
            }, 500);
        });
    </script>
    {{-- Include Product Review Script --}}
    {{-- learning object mobile readmore --}}
    <script>
       $(document).ready(function() {

        const listItems = document.querySelectorAll(".box.\--course-objectives li");

        // const firstTwoItems = [];

        for (let i = 0; i < 2 && i < listItems.length; i++) {

          $("#mobile_decs").append(`<li>${listItems[i].innerText}</li>`);
        }

        $("#toggle_learning_objective").click(function() {
            var elem = $("#toggle_learning_objective").text();

            if (elem == "Read More") {
                $("#toggle_learning_objective").text("Read Less");
                $(".read_more_learning_objective_content").slideDown();

            } else {
                $("#toggle_learning_objective").text("Read More");
                $(".read_more_learning_objective_content").slideUp();
            }
        });

        $(".read_more_btn_learning_objective").click(function(){

            $("#mobile_decs").toggle();

            const listItems = document.querySelectorAll(".box.\--course-objectives li");

            let firstTwoItems = "";

            for (let i = 0; i < 2 && i < listItems.length; i++) {
              firstTwoItems += `<li>${listItems[i].innerText}</li>`;
            }

            $("#mobile_decs").empty().append(firstTwoItems);

            });

            }
            );


       $('.overview_hide_button_read_more').click(function() {
           $('.overview_hide_desc').slideToggle();
           if ($('.overview_hide_button_read_more').text() == "Read more") {
               $(this).text("Read less")
               // $(".overview_limit_desc").show();
           } else {
               $(this).text("Read more")
               // $(".overview_limit_desc").hide();
           }
       });

       $('.course_detail_quiz').click(function() {
           $('.course_detail_quiz_desc').slideToggle();
           if ($('.course_detail_quiz').text() == "Read more") {
               $(this).text("Read less")
           } else {
               $(this).text("Read more")
           }
       });

    </script>

@endsection
