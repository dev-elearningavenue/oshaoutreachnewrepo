@php
    $amp_param = isset(request()->outputType) && request()->outputType == 'amp' ? ['outputType' => 'amp'] : [];
@endphp
@extends('layouts.amp')

@section('title')
    Courses
@endsection

@push('component-script')
    <script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
    <script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.2.js"></script>
@endpush

@include('amp.partials._general_amp_schema', ['fallbackName' => 'OSHA 10-HOUR & 30-HOUR TRAINING', 'breadCrumbList' => true])

@push('custom-css')
    .box.\--courses-box.mobile-box .desc {
    font-size: 13px;
    line-height: 1.2;
    margin: 20px 5px 14px 0px;
    }

    .discounted-price {
    color: red;
    font-size: 22px;
    }

    .details_btn, .enroll_now_btn {
    font-size: 14px;
    padding: 5px;
    width: auto
    }

    .title {
    font-size: 18px;
    line-height: 1;
    }

    .course-price {
    padding: 0;
    text-align: center;
    font-size: 24px;
    }

    .clear-search {
    position: absolute;
    z-index: 20;
    right: 9px;
    top: 6px;
    color: #666;
    font-size: 24px;
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
@endpush

@section('content')

    @include('amp.partials._banner_strip_amp')

    <section class="home-intro">
        <div class="container">
            <form action="{{ route('courses', $amp_param) }}" target="_top" method="GET" id="search_form"
                  style="margin-top: 10px">
                <div class="row">
                    <div class="col-xs-8" style="padding-right: 0;">
                        <input class="form-field" type="text" name="keyword" placeholder="Search here..."
                               value="{{ $keyword }}" style="height: 42px;"/>
                        <a href="{{ route('courses', $amp_param) }}" class="clear-search"
                           @if(empty($keyword)) style="display: none;" @endif>
                            <i class="xicon icon-close-solid" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="col-xs-2">
                        <input type="hidden" name="outputType" value="amp"/>
                        <button type="submit" class="btn --btn-primary" style="border: none;padding: 10px 20px">
                            <i class="xicon icon-search" style="font-size: 18px;"></i>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
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

            @forelse($courses as $course)
                <div class="box --courses-box mobile-box">
                    <div class="row">
                        <div class="col-xs-4 ta-center">
                            @if($course->lms == LMS_TYPE_OSHA_OUTREACH)
                                <amp-img
                                    src="{{ asset(ALL_COURSE_IMG_PATH.$course->slug.".webp") }}"
                                    alt="{{ $course->title }}"
                                    title="{{ $course->title }}"
                                    layout="intrinsic"
                                    width="255px"
                                    height="171px"
                                ></amp-img>
                            @else
                                <amp-img
                                    src="https://oshaoutreachcourses.puresafety.com/Training/Image/thumbnail/{{ $course->course_id }}"
                                    alt="{{ $course->title }}"
                                    title="{{ $course->title }}"
                                    layout="intrinsic"
                                    width="255px"
                                    height="171px"
                                ></amp-img>
                            @endif
                        </div>
                        <div class="col-xs-8" style="padding-top: 10px">
                            <a href="{{ route('course.single', [$course->slug]) }}?outputType=amp">
                                <h5 class="title"
                                    style="color: black; line-height: 1;margin-bottom: 0">{{ $course->title }}</h5>
                            </a>
                            <p class="desc" style="margin-top: 5px">
                                {{ \App\Http\Utilities\StringUtil::limitTextWords(strip_tags($course->description), 12) }}
                                @if(str_word_count($course->description) > 12)...
{{--                                <a class="fc-primary" href="{{route('course.single', [$course->slug])}}?outputType=amp">Read--}}
{{--                                    more</a>--}}
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        @if($course->discounted_price > 0)
                            <h3 class="course-price col-xs-4">
                                <strong
                                    class="discounted-price">${{ number_format($course->discounted_price, 0) }}</strong>
                                <small class="fs-small price-lt">${{ number_format($course->price, 0) }}</small>
                            </h3>
                        @else
                            <h3 class="course-price col-xs-4">${{ number_format($course->price, 2) }}</h3>
                        @endif
                        <div class="col-xs-8">
                            @if(in_array($course->id, [1,2,3]))
{{--                                @include('amp.partials._enroll_lang_modal', ['course' => $course, 'variants' => json_decode($course->variants, true), 'modalId' => 'enroll-lang-modal-'.$course->id])--}}

                                <a href="{{ route('product.addToCart', ['id' => $course->id]) }}"
                                   class="btn enroll_now_btn float-left --btn-primary mbpx-20"
                                   style="color:#000000;background-color:#ffb900;">ENROLL NOW</a>
                            @else
                                <a href="https://oshaoutreachcourses.puresafety.com/Ondemand/ShoppingCart/AddToCart/301-{{$course->course_id}}"
                                   {{-- commentend because amp does'nt support onclick on anchor tag --}}
                                   {{-- onclick="fbq('track', 'AddToCart', {currency: 'USD', value: '{{ $course->price }}' });" --}}
                                   class="btn enroll_now_btn float-left --btn-primary mbpx-20"
                                   style="color:#000000;background-color:#ffb900;">ENROLL NOW</a>
                            @endif
                            <a href="{{ route('course.single', [$course->slug]) }}?outputType=amp"
                               class="btn details_btn float-left --btn-primary mbpx-20">Details</a>
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
        <div class="ta-center mtpx-30 mbpx-30">
            {{ $courses->appends(request()->input())->links() }}
        </div>
    </section>

    {{--    @include('amp.partials._reviews_amp')--}}
@endsection

