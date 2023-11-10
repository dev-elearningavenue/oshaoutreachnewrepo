@php
    $amp_param = isset(request()->outputType) && request()->outputType == 'amp' ? ['outputType' => 'amp'] : [];
@endphp
@extends('layouts.amp_sale')

@section('title')
    {{ $course_content['title'] }}
@endsection

@section('preload')
    <link rel="preload"
          href="https://oshaoutreachcourses.puresafety.com/Training/Image/thumbnail/{{ $course_content['training_id'] }}"
          as="image">
    @include('partials._meta_tags')
@endsection

@php($youtube_video_code = "S7zaVBJjsXQ")
@php($youtube_video_heading = "Watch OSHA 30 Hour Construction Video")
@php($youtube_duration = "PT1M29S")
@php($youtube_upload_date = "2021-04-19")


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
    {{--  For osha 10 and osha 30 infographic image/
{{--    Promotion Page styling--}}
    .saleBanner h1{
    font-size: 30px;
    font-weight:500;
    color: #fff;
    line-height: 1;
    }
    .saleBanner h2 {
    display:flex;
    justify-content: flex-start;
    align-items:center;
    }
    .saleBanner h2 .heading{
    width: 60%;
    font-size: 40px;
    color: #fff;
    line-height: 1;
    }
    .saleBanner h2 .course-box {
    border: 3px solid #000;
    border-bottom-right-radius: 20px;
    overflow: hidden;
    width: 250px;
    padding: 0;
    background: #fff;
    }
    .saleBanner h2 .course-box h3.name {
    font-size: 22px;
    font-family: "Source Sans Pro";
    color: rgb(0 0 0);
    line-height: 1.2;
    font-weight: 600;
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    padding: 0 15px;
    }
    .saleBanner h2 .course-box h3.name b {
    font-weight: 900;
    margin-left: 5px;
    }
    .saleBanner h2 .course-box .row {
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    }
    .saleBanner h2 .course-box .row .col-md-6 {
    padding: 0;
    height: 40px;
    display: block;
    float: left;
    position: relative;
    }
    .saleBanner h2 .course-box .pricing {
    font-size: 30px;
    background: #005384;
    font-family: "Source Sans Pro";
    color: rgb(255 255 255);
    line-height: 1.2;
    font-weight: 800;
    height: 100%;
    border-top: 3px solid #000;
    text-align: center;
    margin: 0;
    display: flex;
    justify-content: space-around;
    align-items: center;
    padding: 0 14%;
    }
    .saleBanner h2 .course-box .actual-pricing {
    background: #db0000;
    text-align: center;
    height: 100%;
    justify-content: center;
    align-items: center;
    display: flex;
    border-top: 3px solid #000;
    border-left: 3px solid #000;
    height: 100%;
    }

    .saleBanner h2 .course-box .pricing span.fs-medium.lt-price {
    font-size:20px;
    position:relative;
    font-weight:300;
    }

    .saleBanner h2 .course-box .pricing span.fs-medium.lt-price:before{
    position:absolute;
    content:'';
    left: 0%;
    top: 47%;
    height:2px;
    width:100%;
    background:red;
    transform: rotate(-20deg);
    }
    .saleBanner h2 {
    display: block;
    }
    @media (max-width: 767px) {
    .inner-banner.saleBanner {
    height: auto;
    padding: 25px 0;
    }
    }
    @media (max-width: 500px) {
    .saleBanner h1{
    font-size:20px;
    text-align:center;
    }
    .saleBanner h2 .heading {
    font-size: 30px;
    text-align: center;
    width: 100%;
    display: block;
    margin: 15px 0 0;
    }
    .saleBanner h2 .course-box{
    margin:15px auto 0;
    }
    }
    {{--    Promotion Page styling--}}
    {{-- Shopper's Approved Ratings --}}
        #product_just_stars .on {
            width: 20px;
            height: 19px;
            background-image: url('https://www.shopperapproved.com/page/images_svg/star-full.svg');
            display: inline-block;
        }
        #product_just_stars .half {
            width: 20px;
            height: 19px;
            background-image: url('https://www.shopperapproved.com/page/images_svg/star-half.svg');
            display: inline-block;
        }
        #product_just_stars .off {
            width: 20px;
            height: 19px;
            background-image: url('https://www.shopperapproved.com/page/images_svg/star-empty.svg');
            display: none;
        }
        .ind_cnt {
            font-size: 9px;
            display: block;
            text-align: center;
            width: 100%;
        }
        .big .ind_cnt {
            width: 125px;
        }
    {{-- Shopper's Approved Ratings --}}
@endpush

@section('content')

    @php(define('OSHA_COURSE_HOUR', 30))

    <section class="hero-banner --inner-banner mb-0">
        <div class="inner-banner saleBanner"
             style="background-image: url('{{ asset('/images/banner/'.$course_content['slug'].'.jpg') }}');">
            <div class="container">
                <h1 class="">
                    {{ env('PROMOTION_TEXT') }}
                </h1>
                <h2 class="">
                        <span class="heading">
                        {{ $course_content['title'] }}
                            Authorized Online Training
                        </span>
                    <div class="course-box">
                        <h3 class="name">Best Prices Possible </h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="pricing">
                                    <span class="fs-medium lt-price">${{ $course_content['price'] }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="pricing actual-pricing">
                                    ${{ $course_content['discounted_price'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                </h2>
            </div>
        </div>
    </section>

    <section class="home-intro sec-padding ptpx-30">
        <div class="container">
            @if($course->id <= 10)
                @if(in_array($course->id,[5,6,8]))
                    <p class="fs-large fw-bold mbpx-40">This course contains Declaration and has been accepted by New
                        York Department of Buildings to comply with the actively proctored online training requirements
                        of New York City Site Safety Training Local Law 196.</p>
                @elseif($course->id == 9)
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
                <p class="subtitle">{{ $course_content['description'] }}</p>
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
                    {{--                    <span class="col-lg-4 col-md-6 col-xs-6 price-time" id="sku" style="margin-top: 1% ;"><i--}}
                    {{--                            class="xicon icon-book"></i> <span--}}
                    {{--                            class="">SKU</span> <div><strong>SKU-{{ str_pad($course->id, 4, '0', STR_PAD_LEFT) }}</strong></div></span>--}}
                    {{-- Ratings --}}
                    <span class="col-lg-4 col-md-6 col-xs-6 price-time" id="ratings"
                          style="margin-top: 1%;">
                        <i class="xicon icon-star-full"></i>
                        <span class="">RATINGS
                        </span>
                        <div id="product_just_stars" class="reg">
                            <span class="on"></span>
                            <span class="on"></span>
                            <span class="on"></span>
                            <span class="on"></span>
                            <span class="on half"></span>
                            <span class="ind_cnt med">
                                    32
                                    <span class="ind_cnt_desc">reviews</span>
                            </span>
                        </div>
                    </span>
                    {{-- Ratings --}}
                </div>
                <div class="col-md-12 offset-xs-3 col-xs-8 green_bullets ta-left hidden-md-up">
                    <span>
                        @if($course->id <= 10)
                            <amp-img
                                src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                                layout="fixed" width="16px" height="16px"
                                title="Bullet Points Green Tick" class="bullet-points-tick"></amp-img> OSHA Authorized
                            DOL Card
                        @else
                            <amp-img src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                                     layout="fixed" width="16px" height="16px"
                                     title="Bullet Points Green Tick" class="bullet-points-tick"></amp-img> Complete
                            Online
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

            @if(in_array($course->id, [1,2,3]))
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
        </div>
    </section>

    {{-- For infographics image popup --}}
    @if(in_array($course->id, [1,2,9,7,6,3,5,8]))
        <!-- Import the amp-lightbox-gallery component in the header.  -->
        @push('component-script')
            <script async custom-element="amp-lightbox-gallery"
                    src="https://cdn.ampproject.org/v0/amp-lightbox-gallery-0.1.js"></script>
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
                        {{ $youtube_video_heading }}
                    </h2>
                </div>

                <div class="videoWrapper" style="--aspect-ratio: 9 / 16;" data-nosnippet>
                    <amp-youtube width="480" height="270" layout="responsive" data-videoid="{{ $youtube_video_code }}">
                    </amp-youtube>
                </div>
            </div>
        </section>
    @endif


    {{-- Whyus section   --}}
    @include('amp.partials._banner_strip_amp')

    <section class="container sec-padding">
        <div class="col-md-9">
            <div class="page-heading mbpx-40">
                <h2 class="title mbpx-10" style="text-align: left;">OSHA {{OSHA_COURSE_HOUR}} Hour Construction
                    Overview</h2>
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

    @include('amp.partials._faqs_amp')

    @include('amp.partials._related_courses_amp')

    @stack('related_courses_lang_modals')

    {{--    @include('amp.partials._reviews_amp')--}}

    @include('amp.partials._cta_amp')
@endsection
