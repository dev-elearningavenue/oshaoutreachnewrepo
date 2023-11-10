@php
    $groupedCourses = [];

    if(!empty($courses)) {
        $groupedCourses = $courses->groupBy('group_title');

        $groupedCoursesByCategory = [];

        foreach ($groupedCourses as $key => $groupedCourse) {
            if(str_contains($key, 'CONSTRUCTION')) {
                $groupedCoursesByCategory['CONSTRUCTION'][$key] = $groupedCourse;
            } else {
                $groupedCoursesByCategory['GENERAL INDUSTRY'][$key] = $groupedCourse;
            }
        }
    }
@endphp


{{--Courses Section--}}
<section class="courses" id="courses">
    <div class="container">
        @foreach($groupedCoursesByCategory as $categoryTitle => $groupedCourseByCategory)
            <div class="heading">
                <h3 class="uppercase">
                    OSHA ONLINE TRAINING FOR {{ $categoryTitle }}
                </h3>
            </div>
            @php
                $reviewDetailLinks = [
                    2 => "https://www.shopperapproved.com/reviews/oshaoutreachcourses.com/product/OSHA+30+Hour+Construction/71606876",
                    1 => "https://www.shopperapproved.com/reviews/oshaoutreachcourses.com/product/OSHA+10+Hour+Construction/71606875",
                    2314 => "",
                    3 => "https://www.shopperapproved.com/reviews/oshaoutreachcourses.com/product/OSHA+10+Hour+General+Industry/71606877"
                ];
            @endphp
            @foreach($groupedCourseByCategory as $cardTitle => $groupedCourses)
                <div class="row">
                    @php
                        $displayPrice = $groupedCourses[0]->promotion_price > 0 && request()->cookie('special')
                            ? $groupedCourses[0]->{'promotion_price'}
                            : $groupedCourses[0]->{'discounted_price'};
                        $originalPrice = $groupedCourses[0]->price;
                        $description = ucwords($groupedCourses[0]->promotion_page_excerpt);
                        $starCourseId = $groupedCourses[0]->id;
                    @endphp
                    <div class="col-md-12 col-lg-12">
                        <div class="promotion_training_course_wrapper bg-white">
                            <div class="promotion_training_course_left">
                                <div class="free_course_wrapper mb-2">
                                    <h3 class="course_title">{{ $cardTitle }}</h3>
                                    <p class="plus_free_course"> + free course</p>
                                </div>
                                <div class="training_courses_badge_wrapper mb-2">
                                    <div class=" training_badge_img_dol ">
                                        <img src="{{ asset("/images/simple-icons/check.svg") }}"/>
                                        <p>Dol card</p></div>
                                    <div class="training_badge badge_certificate">
                                        <img src="{{ asset("/images/simple-icons/check.svg") }}"/>
                                        <p>certificate</p></div>
                                    <div class="training_badge">
                                        <img src="{{ asset("/images/simple-icons/check.svg") }}"/>
                                        <p>study guide</p></div>

                                </div>
                                <div class=" training_course_description">
                                    <p>{{ $description }}</p>
                                </div>
                                <div class="training_courses_price_wrapper">
                                    <div class="training_courses_actual_price">${{ $originalPrice }}</div>
                                    <div class="training_courses_discount_price">${{ $displayPrice }}</div>
                                </div>

                                {{-- Shopper Approved Product Reviews (Stars) --}}
                                <a target="_blank"
                                   href="{{ $reviewDetailLinks[$starCourseId] ?? "" }}">
                                    <div class=" star_container {{ str_pad($starCourseId, 4, '0', STR_PAD_LEFT) }} "></div>
                                </a>
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

                                {{--Include Product Review Script--}}
                                {{--                            <div class="cours_training_star_wrapper">--}}
                                {{--                                <div class="">--}}
                                {{--                                    <i class="fc-yellow icon-star-full"></i>--}}
                                {{--                                    <i class="fc-yellow icon-star-full"></i>--}}
                                {{--                                    <i class="fc-yellow icon-star-full"></i>--}}
                                {{--                                    <i class="fc-yellow icon-star-full"></i>--}}
                                {{--                                    <i class="fc-yellow icon-star-full"></i></div>--}}

                                {{--                                <p class="cours_training_star_review">240 Reviews</p>--}}
                                {{--                            </div>--}}
                            </div>
                            <div class="promotion_training_course_right">
                                <div>
                                    @foreach($groupedCourses as $gCourse)
                                        <div class="promotion_lang_btn_info_wrapper mb-5">
                                            <p class="promotion_language">
                                                {{ preg_match("/(New york|NY|Proctored)/i", $gCourse->title)  ? "New York" : $gCourse->language  }}
                                            </p>
                                            <a href="{{ url('/add-to-cart/'. $gCourse->id) }}">
                                                <button class="promotion_buy_now">buy now</button>
                                            </a>
                                            <a
                                                    target="_blank"
                                                    href="{{ url('/'. $gCourse->slug) }}"
                                                    class="promotion_more_info"
                                            >
                                                More Info
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- Comparison Table --}}
            @if ($loop->first)
                @include('partials._comparison_features')
            @endif
            {{-- Comparison Table --}}
        @endforeach
    </div>
</section>
{{--Courses Section--}}

<style>
    .uppercase{
        text-transform: uppercase;
        font-size: 26px !important;
    }
    .promotion_training_course_wrapper {
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        border-radius: 25px;
        padding: 50px;
        display: flex;
        margin-bottom: 50px;
    }
    .promotion_training_course_left {
        width: 60%;
    }
    .promotion_training_course_right {
        align-items: center;
        display: flex;
        justify-content: right;
    }

    .free_course_wrapper{
        display: flex;
        align-items: center;
        text-transform: uppercase;
    }
    .training_courses_badge_wrapper {
        display: flex;
        text-transform: uppercase;
        color: #000000;
        font-weight: 700;
    }
    .training_badge{
        background: #89efa7;
        padding: 5px 15px 5px 40px;
        border-radius: 20px;
        position: relative;
    }
    .training_badge_img_dol{
        background: #89efa7;
        padding: 5px 15px 5px 40px;
        border-radius: 20px;
        position: relative;
    }
    .training_badge_img_dol img {
        position: absolute;
        width: 23%;
        left: 9px;
        top: -2px;
    }

    .training_badge img {
        position: absolute;
        width: 20%;
        left: 9px;
        top: -2px;
    }
    .plus_free_course{
        color: #ed2327;
        margin-left: 10px;
        font-size: 18px;
        font-weight: bold;
    }
    .badge_certificate{
        margin: 0 15px;
    }


    .training_course_description p {
        font-size: 16px;
        font-weight: 600;
        color: #000000;
    }
    .training_courses_price_wrapper {
        display: flex;
        align-items: center;
    }
    .training_courses_actual_price {
        color: #c1c1c1;
        font-size: 30px;
        font-weight: bold;
        margin-right: 15px;
        text-decoration: line-through;
    }
    .training_courses_discount_price {
        color: #ed2226;
        font-size: 55px;
        font-weight: bold;
    }
    .cours_training_star_wrapper {
        display: flex;
        align-items: center;
    }
    .cours_training_star_review {
        margin-left: 10px;
        color: #000000;
        font-size: 18px;
        font-weight: 600;
    }
    .promotion_lang_btn_info_wrapper {
        display: flex;
        justify-content: right;
        align-items: center;
    }
    .promotion_language {
        font-size: 18px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 2px;
    }
    .promotion_buy_now {
        background: #fccf00;
        text-transform: uppercase;
        border: none;
        padding: 10px 25px;
        font-weight: bold;
        margin: 0px 25px;
        font-size: 16px;
        cursor: pointer;
        /* color: red; */
        transition: ease all 0.25s;
        font-weight: 900;
    }
    .promotion_buy_now:hover{
        color: rgb(255, 255, 255) !important;
    }
    .fc-yellow{
        color:#f97b00;
        font-size: 20px;
    }
    .promotion_more_info {
        text-decoration: underline;
        font-size: 20px;
        color: #888888;
    }
    @media only screen and (max-width: 1400px) {
        .course_title{
            font-size: 20px;
        }
        .plus_free_course {
            font-size: 16px;

        }
        .promotion_buy_now{
            padding: 10px 15px;
            font-size: 16px;


        }
        .promotion_language{
            font-size: 18px;
        }
        .promotion_more_info{
            font-size:18px;
        }
    }

    @media only screen and (max-width: 992px) {

        .promotion_training_course_wrapper{
            display: flex;
            flex-direction: column;

        }
        .promotion_training_course_left{
            width: 100%;
            justify-content: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .promotion_training_course_right {
            align-items: center;
            display: flex;
            justify-content: center;
            margin-top: 25px;
        }

    }
    @media only screen and (max-width: 768px) {
        .course_title{
            font-size:24px;
            text-align: center;
        }
        .training_courses_badge_wrapper p{
            font-size: 13px;
        }
        .free_course_wrapper {
            display: flex;
            align-items: center;
            text-transform: uppercase;
            flex-direction: column;
            align-items: baseline;
        }
        .plus_free_course{
            margin: 0px;
        }
        .cours_training_star_review{
            font-size:16px;
        }

    }
    @media only screen and (max-width: 600px) {

        .training_courses_badge_wrapper p{
            font-size:10px;
        }
        .promotion_training_course_wrapper{
            padding: 20px;
        }


    }
    @media only screen and (max-width: 500px) {
        /* .training_badge img{
            width: 15%;

        }
        .training_badge_img_dol img{
            width: 17%;
        } */
    }
    @media only screen and (max-width: 450px) {
        .training_badge img{
            width: 16%;
            left: 6px;
            top: auto;

        }
        .training_badge_img_dol img{
            width: 18%;
            left: 6px;
            top: auto;
        }
        .training_courses_badge_wrapper p{
            font-size:10px;
        }
        .badge_certificate{
            margin:0px 4px;
        }
        .promotion_training_course_wrapper{
            padding:15px;
        }
        .training_badge_img_dol, .training_badge{
            padding: 5px 15px 5px 25px;

        }
        .promotion_language, .promotion_more_info, .promotion_buy_now{
            font-size: 16px;

        }
    }

</style>

{{--Styling--}}
<style>
.course .btn.\--btn-small.enroll-now-btn:hover {
    color: #FFFFFF;
    opacity: 1;
}
section.courses>.container>.row{
    display:flex;
    flex-wrap:wrap;
}
section.courses {
    background: #efefef;
    padding: 50px 0;
}

section.courses .heading2 {
    margin-top: 50px;
}

section.courses .heading h3 {
    font-size: 21px;
    font-family: "Poppins";
    color: rgb(0, 0, 0);
    font-weight: bold;
    line-height: 1.2;
    max-width: 750px;
    margin: 35px auto;
    text-align: center;
}

section.courses .courseBox {
    background: #ffffff;
    box-shadow: 0px 6px 9px 0px rgba(0, 0, 0, 0.13);
    padding: 20px;
    height:100%;
    /* padding-bottom: 20px; */
}
section.courses>.container>.row>.col-md-12.col-lg-4{
    margin-bottom:30px;
}
section.courses .courseBox .courseDesc h3.name {
    font-size: 16px;
    font-family: "Poppins";
    color: rgb(0, 0, 0);
    font-weight: 400;
    text-transform: uppercase;
    line-height: 1.2;
    text-align: left;
    margin-bottom: 5px;
}

section.courses .courseBox .courseDesc h3.name .spec {
    display: block;
    font-size:30px;
    font-weight: 700;
}
section.courses .courseBox .courseDesc .desc p {
    font-size: 16px;
    font-family: "Source Sans Pro";
    color: rgb(124, 124, 124);
    line-height: 1.5;
    text-align: left;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}

section.courses .courseBox .courseDesc .desc a.readMoreLink {
    font-size: 16px;
    font-family: "Source Sans Pro";
    position: relative;
    color: rgb(62, 157, 215);
    line-height: 1.2;
    text-align: left;
    margin: 5px 0;
    display: inline-block;
}

section.courses .courseBox .courseDesc .desc a.readMoreLink:before {
    content: 'Read more'
}

section.courses .courseBox .courseDesc .desc a.readMoreLink:after {
    content: '';
    position: absolute;
    width: 100%;
    transform: scaleX(0);
    height: 2px;
    bottom: 0px;
    left: 0;
    background-color: rgb(62, 157, 215);
    ;
    transform-origin: bottom right;
    transition: transform 0.25s ease-out;
}

section.courses .courseBox .courseDesc .desc a.readMoreLink:hover:after {
    transform: scaleX(1);
    transform-origin: bottom left;
}

section.courses .courseBox .courseDesc .courseFeatures {
    padding-bottom: 15px;
    margin-bottom: 15px;
    border-bottom: 1px solid rgb(232, 232, 232);
}

section.courses .courseBox .courseDesc .courseFeatures .textIncludes:before {
    content: 'Includes'
}

section.courses .courseBox .courseDesc .courseFeatures .textOfficialOshaDolCard:before {
    content: 'Official OSHA Dol Card'
}

section.courses .courseBox .courseDesc .courseFeatures .textDownloadableCertificate:before {
    content: 'Downloadable Certificate'
}

section.courses .courseBox .courseDesc .courseFeatures .textFreeStudyGuide:before {
    content: 'Free Study Guide'
}

section.courses .courseBox .courseDesc .courseFeatures .textAFreeCourse:before {
    content: 'A Free Course'
}

section.courses .courseBox .courseDesc .courseFeatures p {
    font-size: 11px;
    font-family: "Poppins";
    color: rgb(124, 124, 124);
    text-transform: uppercase;
    font-weight: bold;
    margin-top: 10px;
    letter-spacing: 2px;
    line-height: 1.2;
    text-align: left;
}

section.courses .courseBox .courseDesc .courseFeatures h5 {
    font-size: 16px;
    font-family: "Poppins";
    color: rgb(255, 174, 0);
    font-weight: bold;
    text-transform: uppercase;
    margin-top: 10px;
    line-height: 1.2;
    text-align: left;
}

section.courses .courseBox .courseDesc .courseFeatures ul li {
    list-style: none;
    margin-top: 10px;
    font-size: 14px;
    font-family: "Poppins";
    text-transform: uppercase;
    color: rgb(124, 124, 124);
    font-weight: bold;
    line-height: 1.2;
    text-align: left;
}

section.courses .courseBox .courseFooter .pricing {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;
    align-items: flex-end
}

section.courses .courseBox .courseFooter .pricing span.lt-price {
    font-size: 18px;
    font-family: "Poppins";
    color: rgb(130, 130, 130);
    font-weight: bold;
    margin-right: 5px;
    text-decoration: line-through;
    line-height: 1.2;
    text-align: left;
}

section.courses .courseBox .courseFooter .pricing h5 {
    font-size: 36px;
    font-family: "Poppins";
    color: rgb(255, 26, 26);
    font-weight: bold;
    line-height: 1;
    margin: 0;
    text-align: left;
}

section.courses .courseBox .courseFooter .row,
section.courses .courseBox .courseFooter .row>div {
    margin: 0;
    padding: 0;
}

section.courses .courseBox .courseFooter .pricing {
    padding-right: 10px;
}

section.courses .courseBox .courseFooter .buyNowCta {
    padding-left: 10px;
}

section.courses .courseBox .courseFooter .buyNowCta a {
    border-radius: 10px;
    background-color: rgb(255, 174, 0);
    display: block;
    text-align: center;
    border: 1px solid rgb(255, 174, 0);
    padding: 10px 5px;
    font-size: 14px;
    font-family: "Poppins";
    color: rgb(0, 0, 0);
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: bold;
    line-height: 1.2;
    transition: ease all 0.25s;
}

section.courses .courseBox .courseFooter .buyNowCta a:before {
    content: 'Buy Now';
}

section.courses .courseBox .courseFooter .buyNowCta a:hover {
    background-color: rgba(255, 174, 0, 0);
}

@media (max-width: 575px) {
    .row.course {
        margin: 20px 15px;
    }
}


@media (min-width: 992px) {
    .container {
        width: 970px;
        max-width: 100%;
    }
}

@media (min-width: 1200px) {
    .container {
        width: 1030px;
        max-width: 100%;
    }
}

@media (min-width: 1400px) {
    .container {
        width: 1220px;
        max-width: 100%;
    }
}

@media (max-width: 1400px) {

    section.courses .courseBox .courseDesc h3.name {
        font-size: 16px;
    }
}

@media (max-width: 1200px) {
    section.courses .courseBox .courseFooter .pricing h5 {
        font-size: 32px;
    }

    section.courses .courseBox .courseFooter .pricing span.lt-price {
        font-size: 16px;
    }
}

/* section.courses .col-md-12.col-lg-4:not(:last-child) .courseBox {
    margin-bottom: 30px
} */

@media (max-width: 992px) {
    .col-sm-6 {
        float: left;
        width: 50%;
    }
}
</style>
{{--Styling--}}
