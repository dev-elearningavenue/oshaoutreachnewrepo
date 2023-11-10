@inject('arrays','App\Http\Utilities\Arrays')

@php
    if(isset($product)) {
        $related_courses = json_decode($product->related_courses);

        if(!isset($product->related_courses)) {
            $related_courses = [];
        }
    }
@endphp

@if(isset($related_courses) && count($related_courses) > 0)
<section class="container sec-padding">
    <div class="page-heading mbpx-40">
        <h2 class="title mbpx-0">Related Courses</h2>
        <p class="subtitle"></p>
    </div>

    <div class="row related-course-slider">
        @foreach($arrays::relatedCourses() as $arr_course_id => $arr_course)
            @php
                $courseImgAlt = removeOSHAFromCourseTitle($arr_course['title']);
            @endphp
            @if(in_array($arr_course_id, $related_courses))
                @php
                    $related_course = App\Models\Product::find($arr_course_id);
                @endphp

                @if(!isset($related_course))
                    @continue
                @endif

                <div class="item-banner">
                    <div class="banner-box margin-auto">
                        <a href="{{ url($related_course->slug) }}"  aria-label="{{ $courseImgAlt }}">
                            <figure>
                                <img src="{{ $arr_course['image'] }}" alt="{{ $courseImgAlt }}" title="{{ $courseImgAlt }}" loading="lazy">
{{--                                <div class="content">--}}
{{--                                <h3 class="title">{!! $arr_course['title'] !!}</h3>--}}
{{--                                </div>--}}
                            </figure>
                        </a>
                        <div class="banner-bottom">

                            @if($related_course->lms === LMS_TYPE_OSHA_OUTREACH)
                            <a href="{{ route('product.addToCart', ['id' => $arr_course_id]) }}"
                                aria-label="Add to Cart"
                                class="banner-btn enrollBtnText">
                        </a>
                        @else
                        <a href="https://oshaoutreachcourses.puresafety.com/Ondemand/ShoppingCart/AddToCart/301-{{$related_course->course_id}}"
                            aria-label="Add to Cart"
                                class="banner-btn enrollBtnText">
                            </a>
                            @endif
                            @if($related_course->discounted_price > 0)
                                <span class="banner-price">
                                    <strong class="fc-red">${{ number_format($related_course->discounted_price, 0) }}</strong>
                                    <small style="text-decoration: line-through;">${{ number_format($related_course->price, 0) }}</small>
                                </span>
                            @else
                                <span class="banner-price">${{ number_format($related_course->price, 2) }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
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
