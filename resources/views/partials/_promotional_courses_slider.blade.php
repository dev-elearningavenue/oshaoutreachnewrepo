@if(isset($coursesForSlider) && count($coursesForSlider) > 0)
<section class="container sec-padding">

    @if(isset($heading))
        <div class="page-heading mbpx-40">
            <h2 class="title mbpx-0">{{ $heading }}</h2>
            <p class="subtitle"></p>
        </div>
    @else
        <div class="page-heading">
            <h2 class="title">POPULAR COURSES</h2>
        </div>
    @endif
    <div class="related-course-slider"  aria-label="carousel">

        @foreach($coursesForSlider as $course)
            @php
                $courseImgAlt = removeOSHAFromCourseTitle($course->title);
            @endphp
            <div class="item-banner">
                    <div class="banner-box margin-auto">

                        <a href="{{ url($course->slug) }}">
                            <figure>
                                <img src="{{ asset($course->imagePath) }}.webp" width="258" height="288" alt="{{ $courseImgAlt }}" title="{{ $courseImgAlt }}" loading="lazy">
{{--                                <div class="content">--}}
{{--                                <h3 class="title">{{ $course->title }}</h3>--}}
{{--                                </div>--}}
                            </figure>
                        </a>
                        <div class="banner-bottom">
                            @if($course->lms === LMS_TYPE_OSHA_OUTREACH)
                                <a href="{{ route('product.addToCart', ['id' => $course->id]) }}"
                                   aria-label="Add to Cart"
                                   class="banner-btn enrollBtnText">
                                </a>
                            @else
                                <a href="https://oshaoutreachcourses.puresafety.com/Ondemand/ShoppingCart/AddToCart/301-{{$course->course_id}}"
                                   aria-label="Add to Cart"
                                   class="banner-btn enrollBtnText">
                                </a>
                            @endif

{{--                            <a href="{{ route('product.addToCart', ['id' => $course->id]) }}"--}}
{{--                                class="banner-btn enrollBtnText">--}}
{{--                            </a>--}}

                            @if($course->discounted_price > 0)
                                <span class="banner-price">
                                    <strong class="fc-red">${{ number_format($course->discounted_price, 0) }}</strong>
                                    <small style="text-decoration: line-through;">${{ number_format($course->price, 0) }}</small>
                                </span>
                            @else
                                <span class="banner-price">${{ number_format($course->price, 2) }}</span>
                            @endif
                        </div>
                    </div>
                </div>
        @endforeach
    </div>

    @if(isset($social))
        <div class="row mtpx-40">
            <div class="col-md-6 offset-md-3 ta-center">
                <div class="sharethis-inline-follow-buttons"></div>
                <strong style="font-size: 16px;">Get Connected for latest updates on OSHA!</strong><br/><br/>
                <div class="a2a_kit a2a_default_style a2a_follow"
                     style="text-align: center;width: 295px;margin: 0 auto;">
                    <a class="a2a_button_facebook" data-a2a-follow="OSHAOutreachCourses"></a>
                    <a class="a2a_button_twitter" data-a2a-follow="OshaOutreach"></a>
                    <a class="a2a_button_linkedin_company" data-a2a-follow="osha-outreach-courses"></a>
                    <a class="a2a_button_instagram" data-a2a-follow="oshaoutreach"></a>
                    <a class="a2a_button_pinterest" data-a2a-follow="oshaoutreachcourses"></a>
                </div>
            </div>
        </div>
    @endif
    <style>
        .banner-price strong{
            font-size: 25px;
        }
        .banner-price small{
            font-size: 15px;
        }
    </style>
    <script type="text/javascript">
        function showEnrollLangModalRelated(modalId) {
            $('body').addClass('modal-open');
            $('.shopperlink').hide();

            //Disable Smooth Scroll js
            if(typeof removeEvent === 'function') {
                removeEvent("mousedown", mousedown);
                removeEvent("mousewheel", wheel);
                removeEvent("load", init);
            }
            //Disable Smooth Scroll js

            $('#'+modalId).fadeIn(250);
        }
    </script>
</section>
@endif
