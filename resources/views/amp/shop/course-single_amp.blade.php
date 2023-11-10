@php
    $amp_param = isset(request()->outputType) && request()->outputType == 'amp' ? ['outputType' => 'amp'] : [];

    function getLanguageISO($language){
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
@extends('layouts.amp')

@section('title')
    {{ $course_content['title'] }}
@endsection

@section('preload')
    <link rel="preload"
          href="https://oshaoutreachcourses.puresafety.com/Training/Image/thumbnail/{{ $course_content['training_id'] }}"
          as="image">
    @include('partials._meta_tags')
@endsection

@section('structure-data')

@endsection

@if($course->id < 10)
    @if($course->id == 1)
        @php($youtube_video_code = "pulpxmUCxtA")
        @php($youtube_video_heading = "Watch OSHA 10 Hour Construction Video")
        @php($youtube_duration = "PT1M21S")
        @php($youtube_upload_date = "2021-04-08")
    @elseif($course->id == 2)
        @php($youtube_video_code = "S7zaVBJjsXQ")
        @php($youtube_video_heading = "Watch OSHA 30 Hour Construction Video")
        @php($youtube_duration = "PT1M29S")
        @php($youtube_upload_date = "2021-04-19")
    @elseif($course->id == 3)
        @php($youtube_video_code = "b6_Dib9s0B0")
        @php($youtube_video_heading = "Watch OSHA 10 Hour General Industry Video")
        @php($youtube_duration = "PT1M28S")
        @php($youtube_upload_date = "2021-04-26")
    @elseif($course->id == 4)
        {{-- OSHA 30 GENERAL INDUSTRY - NOT AVAILABLE --}}
    @elseif($course->id == 5)
        @php($youtube_video_code = "2WepUGaZTn0")
        @php($youtube_video_heading = "Watch New York Osha 10 Construction Video")
        @php($youtube_duration = "PT1M50S")
        @php($youtube_upload_date = "2021-05-25")
    @elseif($course->id == 6)
        @php($youtube_video_code = "N7WHwfI4q8Q")
        @php($youtube_video_heading = "Watch New York Osha 30 Construction Video")
        @php($youtube_duration = "PT1M49S")
        @php($youtube_upload_date = "2021-07-08")
    @elseif($course->id == 7)

    @elseif($course->id == 8)
        @php($youtube_video_code = "XCISzROE2Zw")
        @php($youtube_video_heading = "Watch New York Osha 10 General Industry")
        @php($youtube_duration = "PT1M49S")
        @php($youtube_upload_date = "2021-07-10")
    @elseif($course->id == 9)
    @endif
    {{--<script>
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
        //    The function indicates that when playing a video (state=1),
        //    the player should play for six seconds and then stop.
        function onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.ENDED) {
                player.seekTo(0);
                player.playVideo();
            }
        }
        function stopVideo() {
            player.stopVideo();
        }
    </script>--}}
@endif

@push('custom-css')
    .lang {
    width: 30px;
    height: 20px;
    display: inline-block;
    margin: 0px 5px -5px;
    border: 1px solid #000;
    }

    .lang.lang-ar {
    background: url('{{ asset('images/flags_sprites.png') }}') -0 -0;
    }

    .lang.lang-cs {
    background: url('{{ asset('images/flags_sprites.png') }}') -30px -0;
    }

    .lang.lang-de {
    background: url('{{ asset('images/flags_sprites.png') }}') -60px -0;
    }

    .lang.lang-en {
    background: url('{{ asset('images/flags_sprites.png') }}') -90px -0;
    }

    .lang.lang-es {
    background: url('{{ asset('images/flags_sprites.png') }}') -120px -0;
    }

    .lang.lang-fr {
    background: url('{{ asset('images/flags_sprites.png') }}') -150px -0;
    }

    .lang.lang-fr-ca {
    background: url('{{ asset('images/flags_sprites.png') }}') -180px -0;
    }

    .lang.lang-hu {
    background: url('{{ asset('images/flags_sprites.png') }}') -210px -0;
    }

    .lang.lang-it {
    background: url('{{ asset('images/flags_sprites.png') }}') -240px -0;
    }

    .lang.lang-ja {
    background: url('{{ asset('images/flags_sprites.png') }}') -270px -0;
    }

    .lang.lang-ko {
    background: url('{{ asset('images/flags_sprites.png') }}') -300px -0;
    }

    .lang.lang-nl {
    background: url('{{ asset('images/flags_sprites.png') }}') -330px -0;
    }

    .lang.lang-pl {
    background: url('{{ asset('images/flags_sprites.png') }}') -360px -0;
    }

    .lang.lang-pt {
    background: url('{{ asset('images/flags_sprites.png') }}') -390px -0;
    }

    .lang.lang-ru {
    background: url('{{ asset('images/flags_sprites.png') }}') -420px -0;
    }

    .lang.lang-th {
    background: url('{{ asset('images/flags_sprites.png') }}') -450px -0;
    }

    .lang.lang-zh {
    background: url('{{ asset('images/flags_sprites.png') }}') -480px -0;
    }

    .home-intro.sec-padding.ptpx-30{
    padding-top: 30px;
    }
    .hero-banner.\--inner-banner{
    height: auto;
    margin-bottom: 0;
    }
    .page-heading .title {
    font-weight: 700;
    font-size: 22px;
    }
    .home-intro .price-time{
    margin: 0;
    }
    .home-intro .price-time .xicon {
    width: 16px;
    display: inline-block;
    text-align: center;
    }
    .bullet-points-tick {
    width: 16px;
    border-radius: 25px;
    display: inline-block;
    vertical-align: middle;
    }
    .green_bullets, .blue_bullets{
    display: block;
    margin-bottom: 10px;
    }
    .green_bullets > span, .blue_bullets > span{
    display: block;
    }
    .green_bullets{
    font-size: 16px;
    font-weight: 600;
    }
    .hero-banner .title {
    text-align: center;
    color: #ffffff;
    font-size: 26px;
    }
    .green_bullets, .blue_bullets .price-time .xicon, .blue_bullets .price-time span, .blue_bullets .price-time strong {
    font-size: 14px;
    font-weight: 600;
    }
    .home-intro .title {
    font-size: 18px;
    font-weight: 600;
    text-transform: unset;
    margin-bottom: 40px;
    }
    .btn {
    padding: 10px 20px;
    font-size: 16px;
    }
    .videoWrapper {
    border: 4px solid #FFF;
    }
    .blue_bullets {
    display: flex;
    justify-content: initial;
    flex-wrap: wrap;
    align-items: flex-end;
    text-align: center;
    }
    .green_bullets {
    margin-left: 25%;
    }

    #course-info-div>span:nth-child(n+5) {
    margin-left: 25%;
    }

    .mb-0 {
    margin-bottom: 0%;
    }

    .inner-banner {
    background-size: cover;
    background-position: center;
    height: 150px;
    display: flex;
    justify-content: center;
    position: relative;
    align-items: center;
    z-index: 1
    }

    .inner-banner:before {
    position: absolute;
    content: '';
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    background: rgba(0,0,0,0.5);
    z-index: -1
    }

    .inner-banner h1 {
    background: none;
    padding: 0;
    }

    {{-- For diagonal line--}}
    small.price-lt:before {
    display: block;
    content: "";
    position: absolute;
    left: 5%;
    top: 51%;
    width: 100%;
    height: 1px;
    background-color: #fc4a1a;
    transform: rotate(
    -12deg
    );
    }

    span small.price-lt {
    position: relative;
    }
    {{-- For diagonal line--}}
    {{--  For osha 10 and osha 30 infographic image  --}}
    @if(in_array($course->id, [1,2,9,7,6,3,5,8]))
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
        background-color: #005384;
        position: absolute;
        bottom: 0;
        left: 0;
        margin: 0 auto;
        }

        .osha-info-img {
        margin: auto;
        width: 75%;
        }

        .page-heading .title {
        margin-left: 0;
        }

        .box.\--course-objectives-sp .desc {
        font-size: 18px;
        text-align: left;
        line-height: 1.8;
        margin-bottom: 30px;
        }

        .osha-info-img {
        border-radius: 25px;
        box-shadow: 0px 0px 18px -3px rgb(0 0 0 / 30%);
        }
        .col-md-3.img-container{
        padding:0;
        }
    @endif
    {{--  For osha 10 and osha 30 infographic image  --}}
@endpush

@section('content')

    @if($course->lms === LMS_TYPE_OSHA_OUTREACH)
{{--        <section class="hero-banner --inner-banner">--}}
{{--            <div class="container">--}}
{{--                <h1 class="title mbpx-0">{{ $course_content['title'] }}</h1>--}}
{{--                <amp-img src="{{ asset('/images/osha-10-30-banners/mobile/'.$course_content['slug'].'.webp') }}"--}}
{{--                         layout="responsive" width="480" height="192" class="img-resp m-auto"--}}
{{--                         alt="{{ $course_content['title'] }}"></amp-img>--}}
{{--            </div>--}}
{{--        </section>--}}

        <section class="hero-banner --inner-banner mb-0">
            <div class="inner-banner"
                 style="background-image: url('{{ asset('/images/banner/'.$course_content['slug'].'.jpg') }}');">
                <div class="container">
                    <h1 class="title mbpx-0">{{ $course_content['title'] }}</h1>
                </div>
            </div>
        </section>
    @else
        @php(define("OSHA_COURSE_HOUR", 0))
        <section>
            <div class="container mtpx-30 mbpx-30">
                <div class="page-heading">
                    <h1 class="title mbpx-0">{{ $course_content['title'] }}</h1>
                </div>
            </div>
        </section>
        <section class="hero-banner hidden-sm-down" style="">
            <div class="container">
                @if($course->id >= 2252 && $course->id <= 2309)
                    <amp-img src="{{ asset('/images/course_placeholder.jpg') }}"
                             alt="{{ $course_content['title'] }}" layout="fixed" width="362px" height="242px"></amp-img>
                @else
                    <amp-img
                        src="https://oshaoutreachcourses.puresafety.com/Training/Image/thumbnail/{{ $course_content['training_id'] }}"
                        alt="{{ $course_content['title'] }}" layout="fixed" width="362px" height="242px"
                        class="img-resp m-auto" alt="{{ $course_content['title'] }}"></amp-img>
                @endif
            </div>
        </section>
    @endif

    <section class="home-intro sec-padding ptpx-30">
        <div class="container">
            @if($course->lms === LMS_TYPE_OSHA_OUTREACH)
                @if(in_array($course->id,[5,6,8,2316]))
                    <p class="fs-large fw-bold mbpx-40">This course contains Declaration and has been accepted by New
                        York Department of Buildings to comply with the actively proctored online training requirements
                        of New York City Site Safety Training Local Law 196.</p>
                @elseif(in_array($course->id,[9,2311,2313]))
                    <p class="fs-large fw-bold mbpx-40">Este curso contiene declaración y ha sido aceptado por el
                        Departamento de Edificios de Nueva York para cumplir con los requisitos de capacitación en línea
                        supervisados activamente de la Ley Local de Capacitación de Seguridad de la Ciudad de New York
                        196.</p>
                @endif
                <p class="title">
                    @if($course->id == 1)
                        OSHA 10-Hour Construction course is designed for construction entry level workers to understand
                        safety associated with the Construction Industry.
                    @elseif($course->id == 2)
                        OSHA 30-Hour Construction Industry Outreach Training course is a comprehensive safety program
                        designed for anyone involved in the Construction Industry.
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
                    @endif
                </p>
            @else
                <p class="subtitle">{!! $course_content['description'] !!}</p>
            @endif

            <div class="row mbpx-10">
                <div class="col-md-12 col-xs-12 blue_bullets ta-left" id="course-info-div">
                    <span class="col-lg-4 col-md-6 col-xs-6 price-time" style="margin-top: 1% ;"><i
                            class="xicon icon-dollar"></i> <span
                            class="">PRICE</span>
                        <div>
                            <strong>
                                <span class="hidden-xs-down">$</span>
                                @if($course_content['discounted_price'] > 0)
                                    {{ $course_content['discounted_price'] }}
                                    <small
                                        class="price-lt"
                                        style="color:#000;font-size: 12px;">${{ $course_content['price'] }}
                                    </small>
                                @else
                                    {{ $course_content['price'] }}
                                @endif
                            </strong>
                        </div>
                    </span>
                    <span class="col-lg-4 col-md-6 col-xs-6 price-time" style="margin-top: 1% ;"><i
                            class="xicon icon-clock"></i> <span
                            class="">DURATION</span> <div><strong>{{ $course_content['time'] }}</strong></div></span>
                    @if($course_content['lang'])
                        <span class="col-lg-4 col-md-6 col-xs-6 price-time" style="margin-top: 1% ;"><i
                                class="xicon icon-language"></i> <span
                                class="">LANGUAGE</span>
                            <div>
                                <strong>
                                    {{ $course_content['lang'] }}
                                </strong>
                            </div>
                        </span>
                    @endif
                    @if($course_content['ceu'] !== '')
                        <span class="col-lg-4 col-md-6 col-xs-6 price-time" style="margin-top: 1% ;"><i
                                class="xicon icon-credit"></i> <span
                                class="">CEU</span>
                            <div>
                                <strong>
                                    <span class="hidden-md-up">CEU </span>
                                    {{ number_format($course_content['ceu'], 1) }}
                                </strong>
                            </div>
                        </span>
                    @endif
                    <span class="col-lg-4 col-md-6 col-xs-6 price-time" id="sku" style="margin-top: 1% ;"><i
                            class="xicon icon-book"></i> <span
                            class="">SKU</span> <div><strong>SKU-{{ str_pad($course->id, 4, '0', STR_PAD_LEFT) }}</strong></div></span>
                </div>
                <div class="col-md-12 offset-xs-3 col-xs-8 green_bullets ta-left hidden-md-up">
                    <span>
                        @if($course->id <= 10)
                            <amp-img
                                src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                                layout="fixed" width="16px" height="16px"
                                title="Bullet Points Green Tick" class="bullet-points-tick"></amp-img> OSHA Authorized DOL Card
                        @else
                            <amp-img src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                                     layout="fixed" width="16px" height="16px"
                                     title="Bullet Points Green Tick" class="bullet-points-tick"></amp-img> Complete Online
                        @endif
                    </span>
                    <span>
                        <amp-img src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                                 layout="fixed" width="16px" height="16px"
                                 title="Bullet Points Green Tick"
                                 class="bullet-points-tick">
                        </amp-img> Completion Certificate
                    </span>
                    <span>
                        <amp-img src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                                   layout="fixed" width="16px" height="16px"
                                   title="Bullet Points Green Tick"
                                   class="bullet-points-tick">
                        </amp-img> Job Aid (Study guide)
                    </span>
                </div>
            </div>

            @if($course->lms === LMS_TYPE_OSHA_OUTREACH)
                <a href="{{ route('product.addToCart', ['id' => $course_content['id']]) }}"
                   class="btn --btn-primary enroll_now_btn">ENROLL NOW</a>
            @else
                <a href="https://oshaoutreachcourses.puresafety.com/Ondemand/ShoppingCart/AddToCart/301-{{$course_content['training_id']}}"
                   class="btn --btn-primary enroll_now_btn">ENROLL NOW</a>
            @endif
            {{--            <br><br>--}}
            {{--            <strong>SHARE</strong>--}}
            {{--            <div class="sharethis-inline-share-buttons"></div>--}}
            {{--<p class="subtitle mtpx-40 mbpx-0">All our OSHA courses are authorised under name of <strong>HSI</strong> with OSHA.gov</p>--}}
            @if(count($course_content['variants']))
                <div class="row mtpx-20">
                    <div class="col-xs-12 ta-center price-time">
                        Also Available in : @foreach($course_content['variants'] as $v => $variant)
                            @if($v != 0), @endif
                            <a href="{{ url($variant['slug']) }}?outputType=amp">
                                <span class="lang lang-{{ getLanguageISO($variant['language']) }}"></span>
                                <strong>{{ $variant['language'] }}</strong>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>


    {{-- For infographics image popup --}}
    @if(in_array($course->id, [1,2,9,7,6,3,5,8]))
        <!-- Import the amp-lightbox-gallery component in the header.  -->
        @push('component-script')
            <script async custom-element="amp-lightbox-gallery" src="https://cdn.ampproject.org/v0/amp-lightbox-gallery-0.1.js"></script>
        @endpush
    @endif

    @if(in_array($course->id, [1,2,3,5,6,8]))
        {{-- Push amp-youtube to header --}}
        @push('component-script')
            <script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
        @endpush


        @php($course_title = $course_content['title'])
        @php($course_description = $course_content['description'])
        @foreach($course->seoTags as $seo_tag)
            @if($seo_tag->meta_name == 'title')
                @php($course_title = $seo_tag->meta_content)
            @elseif($seo_tag->meta_name == 'description')
                @php($course_description = $seo_tag->meta_content)
            @endif
        @endforeach
        <section class="bg-secondary sec-padding" style="background-color: #1d81c2;">
            <div class="container pr-5 pl-5" style="max-width:800px;">
                <div class="page-heading mbpx-40">
                    <h2 class="title mbpx-0 fc-white" style="font-size: 26px;line-height: 1.2;font-weight: 700;">
                        Learn More About OSHA Outreach Courses
                    </h2>
                </div>

                <div class="videoWrapper" style="--aspect-ratio: 9 / 16;" data-nosnippet>
                    <amp-youtube width="480" height="270" layout="responsive" data-videoid="{{ $youtube_video_code }}">
                    </amp-youtube>
                </div>
            </div>
        </section>
    @endif


    <section class="bg-secondary sec-padding">
        <div class="container pr-5 pl-5">
            <div class="page-heading mbpx-40">
                <h2 class="title mbpx-0">Why Us?</h2>
                <p class="subtitle"></p>
            </div>

            <div class="box --course-objectives">
                <div class="row">
                    <div class="col-xs-6 usp-col">
                        <div class="usp-icon usp_lowest_price_guaranteed" title="Lowest Price Guaranteed"></div>
                        <h3 class="fs-medium ta-center">LOWEST PRICE GUARANTEED</h3>
                    </div>
                    @if(!in_array(Route::currentRouteName(), ['course.single']))
                        <div class="col-xs-6 usp-col">
                            <div class="usp-icon usp_laminated_official_osha_dol_card"
                                 title="Laminated Official OSHA DOL Card"></div>
                            <h3 class="fs-medium ta-center">LAMINATED OFFICIAL OSHA DOL CARD</h3>
                        </div>
                    @else
                        <div class="col-xs-6 usp-col">
                            <div class="usp-icon usp_free_study_guide" title="Free Study Guide"></div>
                            <h3 class="fs-medium ta-center">FREE STUDY GUIDE</h3>
                        </div>
                    @endif
                    <div class="col-xs-6 usp-col">
                        <div class="usp-icon usp_downloadable_certificate"
                             title="Post Completion Downloadable Certificate"></div>
                        <h3 class="fs-medium ta-center">DOWNLOADABLE CERTIFICATE</h3>
                    </div>

                    <div class="col-xs-6 usp-col">
                        <div class="usp-icon usp_bulk_registrations"
                             title="Bulk Registrations Available For Discounted Rates"></div>
                        <h3 class="fs-medium ta-center">BULK REGISTRATIONS</h3>
                    </div>

                    <div class="col-xs-6 usp-col">
                        <div class="usp-icon usp_24_7_customer_support" title="24/7 Customer Support"></div>
                        <h3 class="fs-medium ta-center">24/7 CUSTOMER SUPPORT</h3>
                    </div>

                    <div class="col-xs-6 usp-col">
                        <div class="usp-icon usp_complete_online"
                             title="Accessible From Anywhere, Complete Online"></div>
                        <h3 class="fs-medium ta-center">COMPLETE ONLINE</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @if($course->id == 2)
        <section class="container sec-padding">

            <div class="col-md-9">
                <div class="page-heading mbpx-40">
                    <h2 class="title mbpx-10" style="text-align: left;">{{ $course->title }} Overview</h2>
                    <p class="subtitle-sp"></p>
                </div>

                <div class="box --course-objectives-sp" style="text-align: left;">
                    {!! $course_content['description'] !!}
                </div>
            </div>

            <div class="col-md-3 img-container">
                <amp-img class="osha-info-img"
                     src="{{ asset('images/osha-30-construction.jpg') }}"
                     alt="OSHA 30 Construction"
                     layout="responsive"
                     width="100"
                     height="225"
                     lightbox
                ></amp-img>
            </div>

        </section>
    @elseif($course->id == 1)
        <section class="container sec-padding">

            <div class="col-md-9">
                <div class="page-heading mbpx-40">
                    <h2 class="title mbpx-10" style="text-align: left;">{{ $course->title }} Overview</h2>
                    <p class="subtitle-sp"></p>
                </div>

                <div class="box --course-objectives-sp" style="text-align: left;">
                    {!! $course_content['description'] !!}
                </div>
            </div>

            <div class="col-md-3 img-container">
                <amp-img class="osha-info-img"
                         src="{{ asset('images/osha-10-construction.jpg') }}"
                         alt="OSHA 10 Construction"
                         layout="responsive"
                         width="100"
                         height="225"
                         lightbox
                ></amp-img>
            </div>

        </section>
    @elseif($course->id == 9)
        <section class="container sec-padding">

            <div class="col-md-9">
                <div class="page-heading mbpx-40">
                    <h2 class="title mbpx-10" style="text-align: left;">{{ $course->title }} Overview</h2>
                    <p class="subtitle-sp"></p>
                </div>

                <div class="box --course-objectives-sp" style="text-align: left;">
                    {!! $course_content['description'] !!}
                </div>
            </div>

            <div class="col-md-3 img-container">
                <amp-img class="osha-info-img"
                         src="{{ asset('images/ny-osha-10-spanish.jpg') }}"
                         alt="ny osha 10 spanish"
                         layout="responsive"
                         width="100"
                         height="225"
                         lightbox
                ></amp-img>
            </div>

        </section>
    @elseif($course->id == 7)
        <section class="container sec-padding">

            <div class="col-md-9">
                <div class="page-heading mbpx-40">
                    <h2 class="title mbpx-10" style="text-align: left;">{{ $course->title }} Overview</h2>
                    <p class="subtitle-sp"></p>
                </div>

                <div class="box --course-objectives-sp" style="text-align: left;">
                    {!! $course_content['description'] !!}
                </div>
            </div>

            <div class="col-md-3 img-container">
                <amp-img class="osha-info-img"
                         src="{{ asset('images/osha-10-spanish.jpg') }}"
                         alt="osha 10 spanish"
                         layout="responsive"
                         width="100"
                         height="225"
                         lightbox
                ></amp-img>
            </div>

        </section>
    @elseif($course->id == 3)
        <section class="container sec-padding">

            <div class="col-md-9">
                <div class="page-heading mbpx-40">
                    <h2 class="title mbpx-10" style="text-align: left;">{{ $course->title }} Overview</h2>
                    <p class="subtitle-sp"></p>
                </div>

                <div class="box --course-objectives-sp" style="text-align: left;">
                    {!! $course_content['description'] !!}
                </div>
            </div>

            <div class="col-md-3 img-container">
                <amp-img class="osha-info-img"
                         src="{{ asset('images/osha-10-general-industry.jpg') }}"
                         alt="osha 10 general"
                         layout="responsive"
                         width="100"
                         height="225"
                         lightbox
                ></amp-img>
            </div>

        </section>
    @elseif($course->id == 6)
        <section class="container sec-padding">

            <div class="col-md-9">
                <div class="page-heading mbpx-40">
                    <h2 class="title mbpx-10" style="text-align: left;">Overview</h2>
                    <p class="subtitle-sp"></p>
                </div>

                <div class="box --course-objectives-sp" style="text-align: left;">
                    {!! $course_content['description'] !!}
                </div>
            </div>

            <div class="col-md-3 img-container">
                <amp-img class="osha-info-img"
                         src="{{ asset('images/ny-30-construction.jpg') }}"
                         alt="ny osha 30"
                         layout="responsive"
                         width="100"
                         height="225"
                         lightbox
                ></amp-img>
            </div>

        </section>
    @elseif($course->id == 5)
        <section class="container sec-padding">

            <div class="col-md-9">
                <div class="page-heading mbpx-40">
                    <h2 class="title mbpx-10" style="text-align: left;">{{ $course->title }} Overview</h2>
                    <p class="subtitle-sp"></p>
                </div>

                <div class="box --course-objectives-sp" style="text-align: left;">
                    {!! $course_content['description'] !!}
                </div>
            </div>

            <div class="col-md-3 img-container">
                <amp-img class="osha-info-img"
                         src="{{ asset('images/ny-osha-10-construction.jpg') }}"
                         alt="ny osha 10"
                         layout="responsive"
                         width="100"
                         height="225"
                         lightbox
                ></amp-img>
            </div>

        </section>
    @elseif($course->id == 8)
        <section class="container sec-padding">

            <div class="col-md-9">
                <div class="page-heading mbpx-40">
                    <h2 class="title mbpx-10" style="text-align: left;">{{ $course->title }} Overview</h2>
                    <p class="subtitle-sp"></p>
                </div>

                <div class="box --course-objectives-sp" style="text-align: left;">
                    {!! $course_content['description'] !!}
                </div>
            </div>

            <div class="col-md-3 img-container">
                <amp-img class="osha-info-img"
                         src="{{ asset('images/ny-osha-10-general.jpg') }}"
                         alt="ny osha 10 general"
                         layout="responsive"
                         width="100"
                         height="225"
                         lightbox
                ></amp-img>
            </div>

        </section>
    @elseif($course->id <= 10)
        <section class="container sec-padding">
            <div class="page-heading mbpx-40">
                @if($course->id <= 10)
                    <h2 class="title mbpx-10">
                        {{ $course->title }}
                        Overview</h2>
                    <p class="subtitle"></p>
                @else
                    <h2 class="title mbpx-10">Overview</h2>
                    <p class="subtitle">{{ $course_content['title'] }}</p>
                @endif
            </div>

            <div class="box --course-objectives">
                <p class="desc">{!! $course_content['description'] !!}</p>
            </div>
        </section>
    @endif

    @if(isset($course_content['objective']) && $course_content['objective']['count'])
        <section class="bg-secondary course-outline sec-padding" style="width: 100%;">
            <div class="container">
                <div class="page-heading mbpx-40">
                    <h2 class="title mbpx-10">Learning Objectives</h2>
                    @if($course->lms === LMS_TYPE_OSHA_OUTREACH)
                        <p class="subtitle"></p>
                    @else
                        <p class="subtitle">{{ $course_content['title'] }}</p>
                    @endif
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="box --course-objectives">
                            <ul class="unstyled">
                                @for($i = 1; $i <= $course_content['objective']['ul_1_length']; $i++)
                                    @if(isset($course_content['objective'][$i-1]))
                                        <li>{!! $course_content['objective'][$i-1] !!}</li>
                                    @endif
                                @endfor
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="box --course-objectives">
                            <ul class="unstyled">
                                @for($i = $course_content['objective']['ul_1_length'] + 1; $i <= $course_content['objective']['ul_2_length']; $i++)
                                    @if(isset($course_content['objective'][$i-1]))
                                        <li>{!! $course_content['objective'][$i-1] !!}</li>
                                    @endif
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($course->id <= 10)
        <section class="container sec-padding">
            <div class="page-heading mbpx-40">
                <h2 class="title mbpx-0">Exam &amp; Quiz Information</h2>
                <p class="subtitle"></p>
            </div>

            <div class="box --course-objectives">
                <p class="desc">You must score at least 70% on each module quiz to move forward in
                    the {{ $course_content['title'] }} safety Training. You will be given up to THREE opportunities to
                    pass each module quiz. Failure to successfully pass the quiz will result in being locked out of this
                    online training program, but the learner can repurchase and start back from the beginning. Once you
                    have successfully completed all of the modules, you must pass a final exam to receive full credit
                    for the 10 hour construction safety training. The exam is 20 questions long and will test your
                    knowledge on information covered throughout the
                    {{ $course_content['title'] }} safety course. You must make a score of at least 70% to pass this
                    OSHA 10 hour training. You will be given up to THREE opportunities to pass the final exam. Failure
                    to successfully pass the Final Exam will result in being locked out of this online training program,
                    but the learner can repurchase and start back from the beginning. Upon successful completion of this
                    OSHA 10 construction training and the accompanying survey, you will receive a OSHA 10 construction
                    card from the provider of this OSHA training on behalf of the Department of Labor. Each student who
                    successfully completes the program will receive a completion card issued by the U.S. Department of
                    Labor. YOU MUST COMPLETE THE SURVEY AT THE END OF THIS TRAINING TO RECEIVE YOUR DOL CARD.</p>

                <p class="desc">Once you complete the {{ $course->duration }} hour, you will be provided with a
                    completion confirmation which will be available through your My Training page. Please be aware the
                    confirmation is not an official document. It serves only as evidence of your completion of
                    the {{ $course->duration }} hour training until you receive your official Department of Labor card in
                    the mail. There is a 6 month time limit to complete the 10 hour construction course.</p>
            </div>
        </section>
    @endif

    @include('amp.partials._faqs_amp')

    @include('amp.partials._related_courses_amp')

    @stack('related_courses_lang_modals')

{{--    @include('amp.partials._reviews_amp')--}}

    @include('amp.partials._cta_amp', ['product' => $course])
@endsection

@section('scripts')
    <script src="{{ asset('src/js/background-blur.min.js') }}"></script>
    <script>

        {{--$(window).load(function() {--}}
        {{--$('.hero-banner').backgroundBlur({--}}
        {{--imageURL : 'https://oshaoutreachcourses.puresafety.com/Training/Image/thumbnail/{{ $course_content['training_id'] }}',--}}
        {{--blurAmount : 50,--}}
        {{--imageClass : 'bg-blur',--}}
        {{--});--}}

        {{--var h2 = $('h2.title');--}}
        {{--var cur_height = h2.height();--}}
        {{--while (cur_height > 50) {--}}
        {{--h2.css('font-size', parseInt(h2.css("font-size")) - 2);--}}
        {{--cur_height = h2.height();--}}
        {{--}--}}
        {{--});--}}
    </script>
@endsection
