@inject('arrays','App\Http\Utilities\Arrays')

@php
    if(isset($product)) {
        $related_courses = json_decode($product->related_courses);

        if(!isset($product->related_courses)) {
            $related_courses = [];
        }
    }
@endphp

@push('component-script')
    <script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.2.js"></script>
@endpush

@if(isset($related_courses) && count($related_courses) > 0)
<section class="container sec-padding">
    <div class="page-heading mbpx-40">
        <h2 class="title mbpx-0">
            Related Courses</h2>
        <p class="subtitle"></p>
    </div>

    <amp-carousel height="425" width="300" layout="responsive" type="slides" role="region" loop controls autoplay
                  delay="2000"
                  aria-label="Reviews Carousel">
        @foreach($arrays::relatedCourses() as $arr_course_id => $arr_course)
            @if(in_array($arr_course_id, $related_courses))
                @php
                    $related_course = App\Models\Product::find($arr_course_id);
                @endphp

                @if(!isset($related_course))
                    @continue
                @endif

                <div class="item-banner">
                    <div class="banner-box margin-auto">
                        <a href="{{ url($related_course->slug) }}?outputType=amp">
                            <amp-img
                                src="{{ $arr_course['image'] }}"
                                alt="{{ strip_tags($arr_course['title']) }}"
                                title="{{ strip_tags($arr_course['title']) }}"
                                layout="responsive"
                                width="360"
                                height="400"
                            ></amp-img>
{{--                            <div class="content">--}}
{{--                                <h3 class="title">{!! $arr_course['title'] !!}</h3>--}}
{{--                            </div>--}}
                        </a>
                        <div class="banner-bottom">
                            @if(in_array($arr_course_id, [1, 2, 3]))
                                <a href="{{ route('product.addToCart', ['id' => $arr_course_id]) }}"
                                   class="banner-btn">
                                    enroll now
                                </a>
                            @else
                                <a href="https://oshaoutreachcourses.puresafety.com/Ondemand/ShoppingCart/AddToCart/301-{{$related_course->course_id}}"
                                   class="banner-btn">
                                    enroll now
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
    </amp-carousel>
</section>
@endif

@push('custom-css')
    .banner-price strong{
    font-size: 25px;
    }
    .banner-price small{
    font-size: 15px;
    }
    .banner-box .banner-bottom .banner-btn {
    display: table-cell;
    padding: 10px 20px;
    text-align: center;
    color: #ffffff;
    text-transform: uppercase;
    font-weight: bold;
    font-size: 20px;
    background-color: #005384;
    width: 100%;
    }
    .banner-box .banner-bottom .banner-price {
    background-color: #ffb900;
    color: #000000;
    padding: 0 35px;
    text-align: center;
    font-size: 30px;
    font-weight: bold;
    display: table-cell;
    width: 100%;
    }
    .banner-bottom {
    display: flex;
    flex-wrap: wrap;
    }
    .banner-box .content .title {
    position: absolute;
    bottom: 135px;
    left: 18px;
    color: #ffffff;
    font-size: 24px;
    font-weight: bold;
    line-height: 1;
    }
    .banner-box .content .title span {
    display: block;
    font-size: 18px;
    font-weight: normal;
    }
@endpush
