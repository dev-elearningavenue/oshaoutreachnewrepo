@php
    $priceValidUntil = date('Y-m-d', strtotime('12/31'));
@endphp
<section class="courses courses_slider_mobile" id="courses">
    <div class="container">
        @foreach ($courses as $course)
            @php
                $specialCookie = request()->cookie('special');
                $displayPrice = $course->promotion_price && isset($specialCookie) ? $course->{'promotion_price'}[$specialCookie] ?? $course->{'promotion_price'}[0] : $course->{'discounted_price'};
            @endphp
            {{-- Structured Data --}}
            <script type="application/ld+json">
                {
                    "@context": "https://schema.org",
                    "@type": "Course",
                    "name": "{{ $course->title }}",
                "description": "{{ strip_tags($course->description) }}",
                "provider": {
                    "@type": "Organization",
                    "name": "OSHA Outreach Courses",
                    "logo": {
                        "url": "{{ url('/images/osha-outreach-courses.png') }}",
                        "width": 310,
                        "height": 60,
                        "@type": "ImageObject"
                    },
                    "sameAs": "{{ url('/') }}"
                }
            }
            </script>
            <script type="application/ld+json">
                {
                    "@context": "http://schema.org",
                    "@type": "Product",
                    "name": "{{ $course->title }}",
                "description": "{{  strip_tags($course->description)  }}",
                "image": ["{{ asset($course->imagePath.'.jpg') }}"],
                "sku": "SKU-{{ str_pad($course->id, 4, '0', STR_PAD_LEFT) }}",
                "offers": {
                    "@type": "Offer",
                    "url": "{{ url()->full() }}",
                    "priceCurrency": "USD",
                    "price": "{{  $displayPrice }}",
                    "priceValidUntil": "{{ $priceValidUntil }}",
                    "availability": "https://schema.org/InStock"
                }
            }
            </script>
            {{-- Structured Data --}}

            <style>
                .info_sign_up_btn{
                    text-align: right;
                }
                .info_modal_inner_btn{
                    border-radius: 45px;
                    background: #0195E5;
                    color: #FFF;
                    font-family: Poppins;
                    font-size: 12px;
                    text-transform: uppercase;
                    border: none;
                    padding: 4px 22px 4px 22px;
                    cursor: pointer;
                    transition: ease all 0.25s;
                    margin: 11px 0 0 12px;
                    display: inline-block;
                    align-items: center;
                }
                .info_modal_inner_btn:hover{
                    background: #000000;
                    color: #ffffff;
                }
                .modal ul li    {
                    font-weight: 400 !important;
                    margin-top: 5px !important;
                    margin-left: 15px !important;
                    font-size: 16px !important;
                    /* color: #00a900 !important; */
                    color: #1f1d1e !important; ;
                    font-size: 14px !important;
                    font-family: "Source Sans Pro", sans-serif !important;
                    list-style: disc !important;
                    text-transform: none !important;
                    line-height: revert !important;

                }
                .modal ul    {
                    line-height: revert !important;
                }
                .close_info_popup_table {
                    color: #aaaaaa !important;
                    float: right !important;
                    font-size: 28px !important;
                    font-weight: bold !important;
                    margin: -22px -6px 0px 0px !important;
                    line-height: normal !important;
                    font-family: "Source Sans Pro", sans-serif !important;
                }

                .close_info_popup_table:hover,
                .close_info_popup_table:focus {
                    color: #000;
                    text-decoration: none;
                    cursor: pointer;
                }
                /* close popup */
                .course_modal_contetent_title{
                    font-size: 20px !important;
                    color: #4098cf !important;
                    text-transform: none !important;
                    font-weight: inherit !important;
                    letter-spacing: normal !important;
                    line-height: normal !important;
                    text-align: left !important;
                    font-family: "Source Sans Pro", sans-serif !important;
                    margin: 0 0 0 0 !important;
                    display: inline-block !important;
                }
                .text_info_wrapper{
                    display: flex
                }
                .info_new_wrapper_detail {
                    display: flex;
                    align-items: center;
                }
                .price{{ $course->price }}:before {
                    content: '${{ $course->price }}'
                }

                .price{{ $displayPrice }}:before {
                    content: '${{ $displayPrice }}'
                }
            </style>
        @endforeach
        {{--<div class="row osha1030-course-slider">--}}
        <div class="row osha1030-course-slider">
            @foreach ($courses as $course)
                @php
                    $specialCookie = request()->cookie('special');
                    $displayPrice = $course->promotion_price && isset($specialCookie) ? $course->{'promotion_price'}[$specialCookie] ?? $course->{'promotion_price'}[0] : $course->{'discounted_price'};
                @endphp
            {{-- Courses Section --}}
            <div class="col-md-12 col-lg-4">
                    <div class="courseBox">
                        <div class="courseDesc">
                            <h3 class="name">
                                <a href="/{{ $course->slug }}">
                                    {!! customCourseName_10_30($course->slug) !!}
                                </a>
                            </h3>
                            <div class="desc">
                                <p>
                                    {{ $course->promotion_page_excerpt ?? '' }}
                                </p>
                                <a href="/{{ $course->slug }}" class="readMoreLink">
                                </a>
                                <div class="courseFeatures">
                                    <p>
                                        <b class="textIncludes"></b>
                                    </p>
                                    <h5 class="textOfficialOshaDolCard">

                                    </h5>
                                    <ul>
                                        <li class="textDownloadableCertificate">
                                        </li>
                                        <li class="textFreeStudyGuide text_info_wrapper">
                                            <div class="info_new_wrapper_detail">
{{--                                                <div id="study_guide" class="modal">--}}
{{--                                                    <!-- Modal content -->--}}
{{--                                                    <div class="modal-content">--}}
{{--                                                        <span class="closeModal close_info_popup_table">&times;</span>--}}
{{--                                                        <p class="course_modal_contetent_title"><b>Get FREE Study Guide Now</b>--}}
{{--                                                        </p>--}}
{{--                                                        <div>--}}
{{--                                                            <ul>--}}
{{--                                                                --}}{{-- <li>Get FREE Study Guide Now</li> --}}
{{--                                                                <li>Learn From The First OSHA-Approved Guide For 2024 </li>--}}
{{--                                                            </ul>--}}
{{--                                                            <div class="info_sign_up_btn">--}}
{{--                                                                <a href="{{ route('free-study-guide-osha10-30') }}" class="info_modal_inner_btn" >Download Now</a>--}}
{{--                                                            </div>--}}

{{--                                                        </div>--}}
{{--                                                    </div>--}}

{{--                                                </div>--}}
                                                <img id="free_course_btn" class="openModal info" data-modal="study_guide"
                                                     src="{{ asset("/images/information.png") }}"/>

                                            </div>

                                        </li>
                                        @if($course->lms == LMS_TYPE_OSHA_OUTREACH)
                                            <li class="textAFreeCourse text_info_wrapper" style="color: #1bb300;">
                                                <div class="info_new_wrapper_detail">
{{--                                                    <div id="free_course" class="modal">--}}
{{--                                                        <!-- Modal content -->--}}
{{--                                                        <div class="modal-content">--}}
{{--                                                            <span class="closeModal close_info_popup_table">&times;</span>--}}
{{--                                                            <p class="course_modal_contetent_title"><b>Select one free course out of these two on checkout</b>--}}
{{--                                                            </p>--}}
{{--                                                            <div>--}}
{{--                                                                <ul>--}}
{{--                                                                    <li>Active Shooter</li>--}}
{{--                                                                    <li>Human trafficking </li>--}}
{{--                                                                </ul>--}}

{{--                                                            </div>--}}
{{--                                                        </div>--}}

{{--                                                    </div>--}}
                                                    <img id="free_course_btn" class="openModal info" data-modal="free_course"
                                                         src="{{ asset("/images/information.png") }}"/>
                                                    {{-- <span class="new">Exclusive</span> --}}
                                                </div>

                                                <!-- The Modal -->
                                            </li>
                                            <li class="buy_now_pay_later text_info_wrapper">
                                                <div class="info_new_wrapper_detail">
{{--                                                    <div id="buy_now" class="modal">--}}

{{--                                                        <!-- Modal content -->--}}
{{--                                                        <div class="modal-content">--}}
{{--                                                            <span class="closeModal close_info_popup_table">&times;</span>--}}
{{--                                                            <p class="course_modal_contetent_title"> <b>You can avail this offer on checkout</b>--}}
{{--                                                            </p>--}}
{{--                                                            <div>--}}
{{--                                                                <ul>--}}
{{--                                                                    <li>Pay $32.25 to start your OSHA 30 Course Now</li>--}}
{{--                                                                    <li>Pay $13.75 to start your OSHA 10 Course Now</li>--}}
{{--                                                                    <li>Pay in 4 interest-free installments  </li>--}}
{{--                                                                    <li>Payable every 2 weeks</li>--}}
{{--                                                                </ul>--}}

{{--                                                            </div>--}}
{{--                                                        </div>--}}

{{--                                                    </div>--}}
                                                    <img id="buy_now_btn" class="openModal info" data-modal="buy_now"
                                                         src="{{ asset("/images/information.png") }}"/>
                                                    <span class="new">NEW</span>
                                                </div>

                                                <!-- The Modal -->
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="courseFooter">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="pricing">
                                        <span class="lt-price price{{ $course->price }}"></span>
                                        <h5 class="price{{ $displayPrice }}"></h5>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    @if ($course->lms === LMS_TYPE_OSHA_OUTREACH)
                                        <div class="buyNowCta">
                                            <a href="{{ url('/add-to-cart/' . $course->id) }}">
                                            </a>
                                        </div>
                                    @else
                                        <div class="buyNowCta">
                                            <a
                                                href="https://oshaoutreachcourses.puresafety.com/Ondemand/ShoppingCart/AddToCart/301-{{ $course->course_id }}">
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- Courses Section --}}
            @endforeach
        </div>

            {{--Study Guide Modal--}}
            <div id="study_guide" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="closeModal close_info_popup_table">&times;</span>
                    <p class="course_modal_contetent_title"><b>Get FREE Study Guide Now</b>
                    </p>
                    <div>
                        <ul>
                            {{-- <li>Get FREE Study Guide Now</li> --}}
                            <li>Learn From The First OSHA-Approved Guide For 2024 </li>
                        </ul>
                        <div class="info_sign_up_btn">
                            <a href="{{ route('free-study-guide-osha10-30') }}" class="info_modal_inner_btn" >Download Now</a>
                        </div>

                    </div>
                </div>
            </div>
            {{--Study Guide Modal--}}
            {{-- free study guide modal--}}
            <div id="free_course" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="closeModal close_info_popup_table">&times;</span>
                    <p class="course_modal_contetent_title"><b>Select one free course out of these two on checkout</b>
                    </p>
                    <div>
                        <ul>
                            <li>Active Shooter</li>
                            <li>Human trafficking </li>
                        </ul>

                    </div>
                </div>

            </div>
            {{--  free study guide modal--}}
            {{--  buy now modal--}}
            <div id="buy_now" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="closeModal close_info_popup_table">&times;</span>
                    <p class="course_modal_contetent_title"> <b>You can avail this offer on checkout</b>
                    </p>
                    <div>
                        <ul>
                            <li>Pay $32.25 to start your OSHA 30 Course Now</li>
                            <li>Pay $13.75 to start your OSHA 10 Course Now</li>
                            <li>Pay in 4 interest-free installments  </li>
                            <li>Payable every 2 weeks</li>
                        </ul>

                    </div>
                </div>
            </div>
            {{--  buy now modal--}}
    </div>
</section>
{{-- Styling --}}
<style>
    .course .btn.\--btn-small.enroll-now-btn:hover {
        color: #FFFFFF;
        opacity: 1;
    }

    section.courses>.container>.row {
        display: flex;
        flex-wrap: wrap;
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
        height: 100%;
        /* padding-bottom: 20px; */
    }

    section.courses>.container>.row>.col-md-12.col-lg-4 {
        margin-bottom: 30px;
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
        font-size: 30px;
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
        transform-origin: bottom right;
        transition: transform 0.25s ease-out;
    }

    section.courses .courseBox .courseDesc .desc a.readMoreLink:hover:after {
        transform: scaleX(1);
        transform-origin: bottom left;
    }
    .courseFeatures {
        height: 182px;
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
    section.courses .courseBox .courseDesc .courseFeatures .buy_now_pay_later:before {
        content: 'Buy Now Pay Later'

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
        /* line-height: 1.2; */
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

        section.courses .courseBox .courseFooter .pricing h5 {
            font-size: 33px;
        }
        .courseDesc .name{
        height: 70px;
    }

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
        .courseFeatures{
            height: auto;
        }
        .courseDesc .name {
    height: auto;
}
        .col-sm-6 {
            float: left;
            width: 50%;
        }
    }

    @media (max-width: 500px) {
        .courses_slider_mobile    .slick-next {
            right: -15px;
        }
        .courses_slider_mobile   .slick-prev {
            left: -15px;
        }
        section.courses {
            padding: 50px 30px;
        }
        .buyNowCta a {
            width: 100% !important;
        }

        .modal-content {
            width: 70% !important;
    }
}
    .modal ul li    {
          font-weight: 400 !important;
         margin-top: 5px !important;
         margin-left: 15px !important;
         font-size: 18px !important;
         color: #1f1d1e !important; ;
         font-size: 18px !important;
         font-family: "Source Sans Pro", sans-serif !important;
         list-style: disc !important;
         text-transform: none !important;
         line-height: revert !important;
}


</style>
{{-- Styling --}}





 {{-- start conparison fetrures script --}}
 @include('partials._comparison_features_script')
 {{-- end conparison fetrures script --}}
