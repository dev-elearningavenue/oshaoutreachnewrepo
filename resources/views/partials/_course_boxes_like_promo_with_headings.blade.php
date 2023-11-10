@php
    $groupedCourses = [];

    if (!empty($courses)) {
        $groupedCourses = $courses->groupBy('group_title');
    }
@endphp


{{-- Courses Section --}}
<section class="courses" id="courses">
    <div class="container">
        @foreach ($groupedCourses as $groupTitle => $groupedCourse)
            <!-- Cta -->
            @if ($groupTitle == 'OSHA Training For New York')
                @include('partials._newProm_Cta', ['promotional' => true])
            @endif
            <!-- Cta -->
            @if ($loop->index == 1)
                <div class="row customRowForBanners">
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <img src="/images/promotions_newBanners/1-BNPL.png" alt="Buy Now Pay Later" />
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <img src="/images/promotions_newBanners/2-Bulk-Discount.png" alt="Bulk Discount" />
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <img src="/images/promotions_newBanners/3-No-Hidden-Charges.png" alt="No Hidden Charges" />
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <img src="/images/promotions_newBanners/4-FREE-Course.png" alt="Enroll Your Free Course" />
                    </div>
                </div>
            @endif
            <div class="heading">
                <h3>
                    {{ $groupTitle }}
                </h3>
            </div>
            <div class="row">
                @foreach ($groupedCourse as $gCourse)
                    @php
                        $specialCookie = request()->cookie('special');
                        $displayPrice = $gCourse->promotion_price && isset($specialCookie)
                            ? $gCourse->{'promotion_price'}[$specialCookie] ?? $gCourse->{'promotion_price'}[0]
                            : $gCourse->{'discounted_price'};
                    @endphp
                    <div class="col-md-12 col-lg-4">
                        <div class="courseBox">
                            <div class="courseDesc">
                                <h3 class="name">
                                    <a href="/{{ $gCourse->slug }}">
                                        {!! customCourseName_10_30($gCourse->slug) !!}
                                    </a>
                                </h3>
                                <div class="desc">
                                    <p>
                                        {{ $gCourse->promotion_page_excerpt ?? '' }}
                                    </p>
                                    <a href="/{{ $gCourse->slug }}" class="readMoreLink">
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
                                            <li class="textFreeStudyGuide">

                                            </li>
                                            <li class="textAFreeCourse" style="color: #1bb300;">

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="courseFooter">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="pricing">
                                            <span class="lt-price price{{ $gCourse->price }}"></span>
                                            <h5 class="price{{ $displayPrice }}"></h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="buyNowCta">
                                            <a href="{{ url('/add-to-cart/' . $gCourse->id) }}">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Custom Styling --}}
                    <style>
                        .price{{ $gCourse->price }}:before {
                            content: '${{ $gCourse->price }}'
                        }

                        .price{{ $displayPrice }}:before {
                            content: '${{ $displayPrice }}'
                        }
                    </style>
                    {{-- Custom Styling --}}
                @endforeach
            </div>
        @endforeach
    </div>
</section>
{{-- Courses Section --}}
{{-- Styling --}}
<style>
    .customRowForBanners {
        margin: 0 -5px;
    }

    .customRowForBanners img {
        width: 100%;
        box-shadow: 0px 6px 9px 0px rgba(0, 0, 0, 0.13);
        border-radius: 15px;
    }

    .customRowForBanners>div {
        padding: 0 5px;
    }

    .customRowForBanners>div:nth-child(2),
    .customRowForBanners>div:nth-child(1) {
        margin-bottom: 10px;
    }

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

    @media (max-width: 768px) {
        section.courses .heading h3 {
            margin: 0px auto 30px;
        }

        section.courses {
            padding: 30px 0px;
        }
    }

    @media (max-width: 500px) {
        section.courses .courseBox .courseDesc .desc a.readMoreLink {
            display: none !important;
        }

        .buyNowCta a {
            width: 100% !important;
        }

        section.courses .courseBox .courseDesc .courseFeatures h5 {
            font-size: 12px;
        }

        section.courses .courseBox .courseDesc .courseFeatures ul li {
            font-size: 12px;
        }
    }
</style>
{{-- Styling --}}
