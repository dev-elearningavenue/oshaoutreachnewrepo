{{--@inject('string','App\Http\Utilities\String')--}}
@extends('layouts.master')

@section('title')
    {{--{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Courses'}}--}}
    Courses
    @if(!empty(request()->input('page')))
        - Page {{ request()->input('page') }}
    @endif
    {{ '| '.config('app.name') }}
@endsection

@section('styles')
    @if(isset($page['seo_tags']))
        @foreach($page['seo_tags'] as $meta_name => $meta_content)
            @if($meta_name != 'title')
                <meta name="{{ $meta_name }}" content="{{ $meta_content }}"/>
            @endif
        @endforeach
    @endif
    @if(route('courses') !== url()->full())
        <meta name="robots" content="noindex, follow"/>
        <link rel="canonical" href="{{ url()->full() }}"/>
    @endif
    <meta property="og:title"
          content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Courses' }}">
    <meta property="twitter:title"
          content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Courses' }}">
    <meta property="og:description"
          content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'Courses' }}">
    <meta property="twitter:description"
          content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'Courses' }}">
    <meta property="og:image" content="{{ url('/images/osha-outreach-courses.png') }}">
    <meta property="twitter:image" content="{{ url('/images/osha-outreach-courses.png') }}">
    <!-- Meta Tags for Social Media -->
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="OSHA Outreach Courses">
    <meta property="fb:app_id" content="817832821974771"/>
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->full() }}">
    <meta property="twitter:site" content="@OshaOutreach">
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "BreadcrumbList",
        "name": "Breadcrumb",
        "itemListElement": {
            "@type": "ListItem",
            "position": 1,
            "name": "{{ isset($page['h1_heading']) ? $page['h1_heading'] : 'Courses' }}"
        }
    }

    </script>
    <style>
        .box.\--courses-box {
            /*position: relative;*/
            border: 1px solid #e9e9e9;
        }

        .box.\--courses-box img {
            border-bottom: 1px solid #e9e9e9;
            /*margin-bottom: 10px;*/
            margin: 0 auto;
            width:100%;
        }

        .box.\--courses-box .title {
            color: #1f1d1e !important;
            margin-bottom: 5px;
        }

        .pagination {
            display: inline;
            list-style-type: none;
        }

        .pagination li {
            color: #1f1d1e;
            display: inline-block;
            text-decoration: none;
            transition: background-color .3s;
            border: 1px solid #ddd;
            font-size: 18px;
            margin: 0;
        }

        .pagination li.active {
            background-color: #005384;
            color: white;
        }

        .pagination li:hover:not(.active) {
            background-color: #e9e9e9;
        }

        .pagination li a, .pagination li span {
            padding: 10px 15px;
            line-height: 3;
        }

        h4.price {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #005384;
        }

        .box.\--courses-box {
            text-align: left;
            margin-top: 10px;
        }

        /*.price-time{
            position: absolute;
            bottom: 0px;
            left: 0;
            right: 0;
        }*/
        .box.\--courses-box:first-of-type {
            margin-top: 0;
        }

        .box.\--courses-box .desc {
            font-size: 15px;
            line-height: 1.2;
        }

        .box.\--courses-box .course-price {
            text-align: center;
            padding: 30px 0 10px;
            font-size: 30px;
        }

        .box.\--courses-box .enroll_now_btn,
        .box.\--courses-box .details_btn {
            display: inline-block;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            /*padding: 5px 15px;*/
            /*margin: 0px 12px 30px;*/
            padding: 5px 0;
            margin: 0 auto;
            width: 100%;
            max-width: 160px;
        }

        /*.box.\--courses-box .details_btn{*/
        /*padding: 5px 36px;*/
        /*}*/
        .btn.search-btns.\--btn-secondary {
            border: 1px solid #e9e9e9;
            background-color: #FFFFFF;
            color: #000000;
        }

        .btn.search-btns.\--btn-primary, .btn.search-btns.\--btn-secondary {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            font-size: 16px;
        }
        .group-stars .ind_cnt{
            margin-left: 15px!important;
            display:inline-block!important;
            width: auto!important;
        }
        form #language {
            display: none;
        }
        @media (min-width: 768px) and (max-width: 1199px) {
            .box.\--courses-box .enroll_now_btn,
            .box.\--courses-box .details_btn {
                font-size: 16px;
            }
        }

        @media (min-width: 991px) {
            .box.\--courses-box.mobile-box {
                display: none;
            }
        }
        @media (max-width: 991px) {
            h3.course-price small {
                display: inline-block;
                width: fit-content;
                width: -webkit-fit-content;
                width: -moz-fit-content;
                margin: 0 15px;
            }
            .box.\--courses-box.mobile-box .course-price {
                padding: 0;
                font-size: 22px;
                display:flex;
                justify-content: center;
                align-items: center;
            }
            form #language {
                display: block !important;
            }
        }

        @media (min-width: 767px) {
            button.btn .icon-search {
                display: none !important;
            }

            button.btn {
                padding: 10px 40px;
            }

        }

        @media (max-width: 767px) {
            .pagination li {
                font-size: 13px;
            }

            .pagination li a, .pagination li span {
                padding: 0 12px;
                line-height: 2.5;
            }

            button.btn .icon-search {
                /*padding: 10px 15px !important;*/
            }

            .box.\--courses-box.mobile-box .title {
                font-size: 18px;
                line-height: 1;
            }

            .box.\--courses-box.mobile-box .desc {
                font-size: 13px;
                line-height: 1.2;
                margin: 20px 5px 14px 0px;
            }


            .box.\--courses-box.mobile-box .enroll_now_btn,
            .box.\--courses-box.mobile-box .details_btn {
                font-size: 14px;
                padding: 5px;
                width: auto;
            }

            .box.\--courses-box.mobile-box .details_btn {
                margin-left: 5px;
            }

            .courses-container {
                margin: 15px auto;
            }

            .box.\--courses-box .enroll_now_btn,
            .box.\--courses-box .details_btn {
                margin: 0;
            }
        }

        .clear-search {
            position: absolute;
            z-index: 20;
            right: 9px;
            top: 6px;
            color: #666;
            font-size: 24px;
        }

        span.ind_cnt.low {
            display: none;
        }

        {{-- For diagonal line--}}
        h3.course-price small {
            position: relative;
        }

        small.fs-medium.price-lt:before, small.fs-small.price-lt:before {
            display: block;
            content: "";
            position: absolute;
            left: 5%;
            top: 51%;
            width: 100%;
            height: 1.5px;
            background-color: #fc4a1a;
            transform: rotate(
                -22deg
            );
        }
        {{-- For diagonal line--}}
        {{-- For laguage modal --}}
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
        {{-- For laguage modal --}}
        @media screen and (max-width:991px){
            .smDesc{
                padding:10px 15px 0 0;
            }
        }
        @media screen and (max-width:575px){
            .smpx-10{
                padding:0 15px;
            }
            .box.\--courses-box.mobile-box .course-price{
                display: block;
                text-align: left;
                padding:0 15px;
            }
            h3.course-price  strong {
                margin: 0 5px;
            }
            .box.\--courses-box.mobile-box .ctaWrap a{
                margin:0!important;
                display:block;
                width:100%;
                max-width: inherit;
            }
            .box.\--courses-box.mobile-box .desc{
                margin:10px 0 0;
                font-size:14px;
            }
            .box.\--courses-box.mobile-box .title{
                font-size: 25px;
            }
            .group-stars .ind_cnt{
                font-size:12px!important;
            }
            .smDesc{
                padding:10px 15px;
            }
            h3.course-price small{
                font-size: 16px;
                margin-right:0px;
            }
            h3.course-price strong{
                font-size:30px;
            }
            .alCenter{
                display: flex;
                justify-content: center;
            }
        }
    </style>
@endsection

@section('content')

    @include('partials._banner_strip')

    <section class="home-intro mtpx-30">
        <div class="container">
            <form action="{{ route('courses') }}" method="GET" id="search_form">
                {{--<h4 class="title ta-left" style="margin-bottom: 0;">Filters:</h4>--}}
                <div class="row">
                    <div class="col-md-10 col-xs-9" style="padding-right: 0;">
                        <input class="form-field" type="text" name="keyword" placeholder="Search here..."
                               value="{{ $keyword }}" style="height: 42px;"/>
                        <a href="{{ route('courses') }}" class="clear-search"
                           @if(empty($keyword)) style="display: none;" @endif>
                            <i class="xicon icon-close-solid" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="col-md-2 col-xs-3">
                        <button type="submit" class="btn --btn-primary" style="padding:10px 0;border: none;width:100%;">
                            <span class="hidden-sm-down">Search</span>
                            <i class="xicon icon-search" style="font-size: 18px;"></i>
                        </button>
                        {{--<a href="{{ route('courses') }}" class="btn bg-grey fc-white" style="padding: 6px 40px 8px;" >Clear</a>--}}
                    </div>
                </div>
                <div class="row" style="margin:0;">
                    <div class="col-12">
                        <select name="language" id="language" class="mtpx-20">
                            <option value="all" @if($language == 'all') selected @endif >All Languages
                                ({{ $total_courses }})
                            </option>
                            @foreach($languages as $lang => $display_lang)
                                <option value="{{ $lang }}"
                                        @if($lang == $language) selected @endif >{{ $display_lang }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
            <div class="page-heading mtpx-30 mbpx-30">
                <h1 class="title mbpx-0">
                    {{-- isset($page['h1_heading']) ? $page['h1_heading'] --}}
                    @if(!empty($keyword))
                        Search Results for "{{ $keyword }}"
                    @else
                        @if($language == 'all')
                            All Courses
                        @else
                            All {{ $language }} Courses
                        @endif
                    @endif
                    @if(!empty(request()->input('page')))
                        - Page {{ request()->input('page') }}
                    @endif
                </h1>
                <p class="subtitle mbpx-0"></p>
            </div>
            @php($i = 0)
            <div class="row">
                <div class="col-md-3  hidden-md-down">
                    <div style="border: 1px solid #e9e9e9;padding: 10px 10px;">


                        <h5 class="fw-semi-bold">LANGUAGES</h5>
                        <ul class="unstyled mtpx-10">
                            <li>
                                <a class="btn search-btns @if($language == 'all') --btn-primary @else --btn-secondary @endif"
                                   href="{{ route('courses') }}?keyword={{ $keyword }}&language=all">All
                                    ({{ $total_courses }})</a>
                            </li>
                            @foreach($languages as $lang => $display_lang)
                                <li>
                                    <a class="btn search-btns @if($lang == $language) --btn-primary @else --btn-secondary @endif"
                                       href="{{ route('courses') }}?keyword={{ $keyword }}&language={{ $lang }}">{{ $display_lang }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 courses-container">
                    @forelse($courses as $course)
                        <div class="row box --courses-box hidden-md-down">
                            <div class="col-lg-4 col-md-12 padding-0 ta-center">
                                @if($course->lms == LMS_TYPE_OSHA_OUTREACH || in_array($course->id, [9, 2311, 2313]))
                                    <img
                                         src="{{ asset(ALL_COURSE_IMG_PATH.$course->slug.".webp") }}"
                                         class="img-resp"
                                         alt="{{ $course->title }}"
                                         title="{{ $course->title }}"
                                    />
                                @else
                                    <img
                                        src="https://oshaoutreachcourses.puresafety.com/Training/Image/thumbnail/{{ $course->course_id }}"
                                        class="img-resp" alt="{{ $course->title }}" title="{{ $course->title }}">
                                @endif
                            </div>
                            <div class="col-lg-5 col-md-12 ptpx-10 mbpx-10">
                                <a href="{{ route('course.single', [$course->slug]) }}">
                                    <h5 class="title">{{ $course->title }}</h5>
                                </a>
                                <p class="desc mtpx-5">
                                    {{ \App\Http\Utilities\StringUtil::limitTextWords(strip_tags($course->description), 22) }}
                                    @if(str_word_count($course->description) > 22)...
{{--                                    <a class="fc-primary" href="{{route('course.single', [$course->slug])}}">Read--}}
{{--                                        more</a>--}}
                                    @endif
                                </p>
                                {{-- Shopper Approved Product Reviews (Stars) --}}
                                <div class="star_container {{ str_pad($course->id, 4, '0', STR_PAD_LEFT) }}"></div>
                                {{-- Shopper Approved Product Reviews (Stars) --}}
                            </div>
                            <div class="col-lg-3 col-md-12">
                                @if($course->discounted_price > 0)
                                    <h3 class="course-price">
                                        <strong
                                            class="fc-red">${{ number_format($course->discounted_price, 0) }}</strong>
                                        <small class="fs-medium price-lt">${{ number_format($course->price, 0) }}</small>
                                    </h3>
                                @else
                                    <h3 class="course-price">${{ number_format($course->price, 2) }}</h3>
                                @endif
                                @if($course->lms === LMS_TYPE_OSHA_OUTREACH)
                                    <a href="{{ route('product.addToCart', ['id' => $course->id]) }}"
                                        onclick="fbq('track', 'AddToCart', {currency: 'USD', value: '{{ $course->price }}' });"
                                        class="btn enroll_now_btn float-left --btn-primary mbpx-10 enrollBtnText"
                                        style="color:#000000;background-color:#ffb900;"></a>
                                @else
                                    <a href="https://oshaoutreachcourses.puresafety.com/Ondemand/ShoppingCart/AddToCart/301-{{$course->course_id}}"
                                        onclick="fbq('track', 'AddToCart', {currency: 'USD', value: '{{ $course->price }}' });"
                                        class="btn enroll_now_btn float-left --btn-primary mbpx-10 enrollBtnText"
                                        style="color:#000000;background-color:#ffb900;"></a>
                                @endif
                                <a href="{{ route('course.single', [$course->slug]) }}"
                                   class="btn details_btn float-left --btn-primary mbpx-20">Details</a>
                            </div>
                        </div>

                        @if(in_array($course->id, [1,5,7,9]))
                            @include('partials._enroll_lang_modal', ['course' => $course, 'variants' => json_decode($course->variants, true), 'modalId' => 'enroll-lang-modal-'.$course->id])
                        @endif

                        <div class="box --courses-box mobile-box">
                            <div class="row">
                                <!-- <div class="col-sm-4 col-12 ta-center">
                                    @if($course->lms == LMS_TYPE_OSHA_OUTREACH)
                                        <img
                                            src="{{ asset(ALL_COURSE_IMG_PATH.$course->slug.".webp") }}"
                                            class="img-resp"
                                            alt="{{ $course->title }}"
                                            title="{{ $course->title }}"
                                        />
                                    @else
                                        <img
                                            src="https://oshaoutreachcourses.puresafety.com/Training/Image/thumbnail/{{ $course->course_id }}"
                                            class="img-resp"
                                            alt="{{ $course->title }}"
                                            title="{{ $course->title }}"
                                        />
                                    @endif
                                </div> -->
                                <div class="col-sm-8 col-12">
                                    <div class="smDesc">
                                        <a href="{{ route('course.single', [$course->slug]) }}">
                                            <h5 class="title">{{ $course->title }}</h5>
                                        </a>
                                        {{-- Shopper Approved Product Reviews (Stars) --}}
                                        <div class="star_container {{ str_pad($course->id, 4, '0', STR_PAD_LEFT) }}"></div>
                                        {{-- Shopper Approved Product Reviews (Stars) --}}
                                        <p class="desc mtpx-5">
                                            {{ \App\Http\Utilities\StringUtil::limitTextWords(strip_tags($course->description), 12) }}
                                            @if(str_word_count($course->description) > 12)...
                                            <a class="fc-primary" href="{{route('course.single', [$course->slug])}}">Read
                                                more</a>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @if($course->discounted_price > 0)
                                    <h3 class="course-price col-sm-4 col-xs-12">
                                        <small class="fs-small price-lt">${{ number_format($course->price, 0) }}</small>
                                        <strong
                                            class="fc-red">${{ number_format($course->discounted_price, 0) }}</strong>
                                    </h3>
                                @else
                                    <h3 class="course-price col-sm-4 col-xs-12">${{ number_format($course->price, 2) }}</h3>
                                @endif
                                <div class="col-sm-8 col-xs-12">
                                    <div class="row ctaWrap" style="margin:0;">
                                        <div class="col-xs-6" style="padding:0;">
                                            @if($course->lms === LMS_TYPE_OSHA_OUTREACH)
                                                <a href="{{ route('product.addToCart', ['id' => $course->id]) }}"
                                                    onclick="fbq('track', 'AddToCart', {currency: 'USD', value: '{{ $course->price }}' });"
                                                    class="btn enroll_now_btn float-left --btn-primary mbpx-20 enrollBtnText"
                                                    style="color:#000000;background-color:#ffb900;"></a>
                                            @else
                                                <a href="https://oshaoutreachcourses.puresafety.com/Ondemand/ShoppingCart/AddToCart/301-{{$course->course_id}}"
                                                    onclick="fbq('track', 'AddToCart', {currency: 'USD', value: '{{ $course->price }}' });"
                                                    class="btn enroll_now_btn float-left --btn-primary mbpx-20 enrollBtnText"
                                                    style="color:#000000;background-color:#ffb900;"></a>
                                            @endif
                                        </div>
                                        <div class="col-xs-6" style="padding:0;">
                                            <a href="{{ route('course.single', [$course->slug]) }}"
                                            class="btn details_btn float-left --btn-primary mbpx-20">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="row">
                            <div class="col-md-12 mtpx-40">
                                <h4>No course found.</h4>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="ta-center mtpx-30 mbpx-30">
            {{ $courses->appends(request()->input())->links() }}
        </div>
    </section>

    @include('partials._reviews_sa')
@endsection

@section('scripts')
    <script type="text/javascript">
        function showEnrollLangModal(modalId) {
            $('body').addClass('modal-open');
            $('.shopperlink').hide();

            $('#'+modalId).fadeIn(250);
        }
    </script>

    <script defer>
        $(function () {
            $('.--courses-box .title').matchHeight();

            $('#language').change(function () {
                $('#search_form').submit();
            });

            /* $('#search_form input[name=keyword]').keyup(function(){
                 if($(this).val()){
                     $('.clear-search').show();
                 } else {
                     $('.clear-search').hide();
                 }
             });*/
        });
    </script>
    {{-- Shopper Approved Product Reviews (Stars) --}}
    <script type="text/javascript">
        function saLoadScript(src) {
            var js = window.document.createElement('script');
            js.src = src;
            js.type = 'text/javascript';
            document.getElementsByTagName("head")[0].appendChild(js);
        }

        saLoadScript("https://www.shopperapproved.com/widgets/group2.0/33391.js");
    </script>
    {{-- Shopper Approved Product Reviews (Stars) --}}
@endsection
