@extends('layouts.master')

@section('title',
    isset($page['seo_tags']['title'])
    ? $page['seo_tags']['title']
    : 'OSHA 10 and 30 |
    ' . config('app.name'))

@section('styles')
    @if (isset($page['seo_tags']))
        @foreach ($page['seo_tags'] as $meta_name => $meta_content)
            @if ($meta_name != 'title')
                <meta name="{{ $meta_name }}" content="{{ $meta_content }}" />
            @endif
        @endforeach
    @endif
    <meta property="og:title"
        content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'OSHA 10-HOUR TRAINING' }}">
    <meta property="twitter:title"
        content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'OSHA 10-HOUR TRAINING' }}">
    <meta property="og:description"
        content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'OSHA 10-HOUR TRAINING' }}">
    <meta property="twitter:description"
        content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'OSHA 10-HOUR TRAINING' }}">
    <meta property="og:image" content="{{ url('/images/osha-10-30-og/osha-10-hour-online.png') }}">
    <meta property="twitter:image" content="{{ url('/images/osha-10-30-og/osha-10-hour-online.png') }}">
    <!-- Meta Tags for Social Media -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="OSHA Outreach Courses">
    <meta property="fb:app_id" content="817832821974771" />
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:site" content="@OshaOutreach">
    <script type="application/ld+json">
{
    "@context": "https://schema.org/",
    "@type": "BreadcrumbList",
    "name": "Breadcrumb",
    "itemListElement": {
        "@type": "ListItem",
        "position": 1,
        "name": "{{ isset($page['h1_heading']) ? $page['h1_heading'] : 'OSHA 10-HOUR TRAINING' }}"
    }
}
</script>
@endsection

@section('content')
    <style>
        .custom-anchor {
            text-decoration: underline;
            color: #005384;
        }
    </style>
    <section class="osha-courses">
        <div class="container">
            <div class="page-heading mbpx-20">
                <h1 class="h3 ta-center mtpx-0 mbpx-0">OSHA 10-HOUR TRAINING</h1>
                <p class="subtitle"></p>
            </div>
            <div class="box --course-objectives">
                <p class="desc mbpx-20 mtpx-20">
                    OSHA 10-Hour courses build your career by dispensing common yet practical knowledge of workplace safety
                    and its hazards at the lowest prices possible.
                </p>
            </div>
        </div>

{{--        @include('partials._free-signup-cta')--}}


        <div class="courses-30 mbpx-20">
            @include('partials._course_boxes_like_promo_with_schema')
        </div>

        <div class="osha_30_comparison_features_wrapper">
            @include('partials._comparison_features')
        </div>
        <style>
            .osha_30_comparison_features_wrapper  .sec-padding
                {
                    padding-top: 40px;
                    padding-bottom: 60px;
                }
                @media (max-width: 768px) {
                    .osha_30_comparison_features_wrapper .sec-padding {
                        padding-top: 10px;
                        padding-bottom: 40px;
                    }
                }


        </style>

        {{--why to enroll video section here--}}
        <div class="video_section_space">
            @include('partials._why_to_enroll_video_section', ['classes' => '', 'slug' => 'jose-osha-10',])
           </div>
           <style>
               .video_section_space{
                   margin-bottom: 60px;
               }
               @media (max-width: 768px) {
                   .video_section_space{
                   margin-bottom: 30px;
               }
                   }
           </style>


{{--@include('partials._free-study-guide-cta')--}}
        <div class="container">
            <div class="box --lpDescription">
                <div class="page-heading">
                <h2 class="title">
                    Introduction to OSHA 10-Hour Training
                </h2>
                </div>

                <p class="desc">
                    During the past 50 years, the Occupational Safety and Health Administration (OSHA) has focused on
                    workplace safety. Although OSHA online courses do not certify any employees, OSHA advises workers to
                    get done with their safety training to obtain the DOL Card. The Online OSHA 10-Hour training is divided
                    into two
                    main categories:
                </p>
                <div class="moretext_osha_10_hour_training">
                <ul>
                    <li>
                        <p class="desc">
                            <a href="{{ url('osha-10-hour-construction') }}" class="custom-anchor" target="_blank">
                                OSHA 10-Hour Construction
                            </a>
                            is an entry-level course designed for employees who are about to or starting their career in a
                            workplace. This course dispenses common yet valuable knowledge of the practical safety measures
                            you must take to protect yourself from any worksite hazards that can cause accidents or
                            incidents.
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            <a href="{{ url('osha-10-hour-general-industry') }}" class="custom-anchor" target="_blank">
                                OSHA 10-Hour General Industry
                            </a>
                            dispenses essential awareness of workplace safety and its hazards. OSHA 10 Hour General Industry
                            is designed to
                            meet the requirements for employees who are considered to be entry-level workers in a workplace.
                            This course will educate you on preventing and identifying workplace hazards while taking
                            practical safety measures against them.
                        </p>
                    </li>
                </ul>
                <p class="desc">
                    The primary purpose of OSHA 10 online courses is to dispense workplace safety knowledge under the light
                    of OSHA Standards and Regulations. This is why OSHA focuses primarily on these two industries. As a
                    result, you will not only benefit from OSHA/DOL Card, but you will also gain perks like:
                </p>
                <ul>
                    <li>
                        <p class="desc">
                            Helps you meet OSHA Training Requirements and your company requirements
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            It saves you from harsh OSHA penalties and fines
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            Promotes a safety culture and reduces the chances of accidents or incidents
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            It helps you take practical safety measures against any workplace hazards
                        </p>
                    </li>
                </ul>
                </div>
                <div class="readmore_button_text_center">
                <button class="moreless-button-10-hour-training-button read_more_less_btn" >Read more</button>
                </div>
                <style>
                    .moretext_osha_10_hour_training {
                        display: none;
                    }
                </style>

                <!-- Cta -->
                @include('partials._newProm_Cta')
                <!-- Cta -->
                <div class="page-heading">
{{--                <h2 class="headDesc">--}}
                    <h2 class="title">
                    Advantages Of Completing OSHA 10 Training
                </h2>
                </div>
                <p class="desc">
                    As discussed above, the OSHA 10-Hour course is one of the most in-demand Online OSHA Training,
                    which is widely opted for by employees in the initial stages of their careers. Like other OSHA training,
                    10-Hour OSHA training online has its benefits, which are:
                </p>
                <div class="moretext_advantage_completing">
                <ul>
                    <li>
                        <p class="desc">
                            Online OSHA 10 training helps you comply with OSHA through the OSHA 10-Hour Card, which you will
                            receive after completing the course and also makes you meet your company’s training
                            requirements, automatically giving you an edge over other employees.
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            OSHA 10-Hour also cuts down employee medical compensation cost, saves employees from sudden OSHA
                            Inspections, and also reduce the chances to near none of getting subjected to harsh OSHA fines
                            or penalties. This creates a win-win situation for both employees and employers.
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            Once you are done with your OSHA 10-Hour course you will automatically build a sense
                            of safety for yourself, your workplace, and your colleagues. OSHA 10 Hour will make you never
                            give safety a day off once you understand the importance of workplace safety and safe
                            operations.
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            OSHA 10-Hour also helps you understand what OSHA is and why it emphasizes making workplaces safe
                            and hazard free with references to OSHA Standards and Regulations.
                        </p>
                    </li>
                </ul>
                </div>
                <div class="readmore_button_text_center">
                <button class="moreless-button-advantage-completing read_more_less_btn">Read more</button>
                </div>
                <style>
                    .moretext_advantage_completing {
                        display: none;
                    }
                    .moreless-button-advantage-completing{
                        margin-bottom:40px;
                    }

                </style>

                <div class="imgWrapper">
                    <img src="{{ asset('osha-10-hour-online/osha-10-hour-online-infographic.webp') }}" alt="">
                </div>
                <div class="ta-center cBtnWrapper">
                    <a class="fs-large fw-medium" target="_blank"
                        href="{{ asset('osha-10-hour-online/osha-10-hour-online-infographic.pdf') }}">View PDF Version</a>
                </div>
                <div class="page-heading">
                <h2 class="title">
                    OSHA 10 Hour Online Training Curriculum
                </h2>
                </div>
                <p class="desc">
                    As discussed, OSHA 10-Hour training is considered an initial orientation on how hazardous a worksite can
                    be and what an employee can do to avoid such hazards, which can lead to brutal accidents and even
                    fatalities. OSHA 10-Hour comprises brief, essential safety guidelines and common hazard recognition
                    methods and techniques.
                </p>
                <div  class="moretext-10-hourtraining-curriculum">
                <p class="desc"> Moreover, OSHA 10 Hour online will educate you on accident prevention methods,
                    creating a sense of responsibility and safety in hazardous locations and operations. You will also learn
                    about Personal Protective Equipment (PPE), how to use it, and its benefits. also highlights
                    fall protection, chemical handling, material handling, ladder safety, etc. Through OSHA 10-Hour courses,
                    you will be able to build an understanding on:</p>

                <ul>
                    <li>
                        <p class="desc">
                            How to keep your worksite safe
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            What safety measures do you need to take to make your workplace safe
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            What type of PPE should you use
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            What are Focus Four Hazards and how to take practical prevention measures to avoid them
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            How to safely use Cranes, Derricks, Hoists, Elevators, and Conveyors
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            How to efficiently and safely handle materials
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            How to take practical safety measures against workplace Fires and Emergencies
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            How to protect yourself from Electrocutions
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            Which type of Personal Protective Equipment should be used
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            How to efficiently perform GHS Hazard Communication
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            How safely handle Bloodborne Pathogens
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            How to use and work with Forklift safely
                        </p>
                    </li>
                </ul>
                <p class="desc">
                    Adding more, OSHA 10-Hour comes in 2 niches: General Industry and Construction Industry, and
                    can be taken at your convenience as this course is self-paced and also has a feature of saving your
                    progress. Additionally, OSHA grips over all 52 states of the United States, so we tend to provide safety
                    training solutions for every state possible as we aim to promote safety culture through our
                    budget-friendly OSHA training prices. OSHA 10-Hour are also available in Spanish while being charged at
                    the same price as English courses.
                </p>
                </div>
            </div>
            <div class="readmore_button_text_center">
            <button class="moreless-button-10-hour-training-curriculum read_more_less_btn" >Read more</button>
            </div>
        </div>

        <style>
            .moretext-10-hourtraining-curriculum {
                display: none;
            }
            .moreless-button-10-hour-training-curriculum{
                margin-bottom: 40px;
            }
        </style>
        <div class="enrollMentProcedSect bg-secondary sec-padding">
            <div class="container">
                <div class="headDescWrapper">
                    <h2 class="headDesc">
                        Enrollment Procedure For OSHA 10-Hour Courses
                    </h2>
                    <p class="desc">
                        We always try to make your virtual training experience easy yet understandable and so we have kept
                        our enrollment process as accessible as possible. Listed down below are few steps you have to follow
                        to get done with the enrollment procedure:
                    </p>
                </div>
                <div class="CustomRow">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="boxPadd">
                            <div class="iconWrapper">
                                <img src="/images/osha-10-30-icons/icon_enrollnow.svg" alt="Enroll Now Icon">
                            </div>
                            <p>
                                Press the Enroll Now button and add the desired OSHA course to the cart which you want
                                to opt for.
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="boxPadd">
                            <div class="iconWrapper">
                                <img src="/images/osha-10-30-icons/icon_add-to-cart.svg" alt="Enroll Now Icon">
                            </div>
                            <p>
                                To proceed with the payment method, you have to click Proceed to Checkout
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="boxPadd">
                            <div class="iconWrapper">
                                <img src="/images/osha-10-30-icons/icon_payymentMethod.svg" alt="Enroll Now Icon">
                            </div>
                            <p>
                                You must fill out your payment details and all the necessary credentials
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="boxPadd">
                            <div class="iconWrapper">
                                <img src="/images/osha-10-30-icons/icon_emailsms.svg" alt="Enroll Now Icon">
                            </div>
                            <p>
                                As soon as you complete your payment procedure you will receive your LMS credentials through
                                SMS and Email
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="boxPadd">
                            <div class="iconWrapper">
                                <img src="/images/osha-10-30-icons/icon_loginDetails.svg" alt="Enroll Now Icon">
                            </div>
                            <p>
                                Log in through your LMS credentials and then you can start your course as per your ease
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container sec-padding">
            <div class="box --lpDescription">
                <p class="desc">
                    Listed down below are some guidelines you have to follow for OSHA 10-Hour certification:
                </p>

                <ul>
                    <li>
                        <p class="desc">
                            You will be given three generous attempts to clear the course. If failing all three attempts,
                            you can opt for the course again by purchasing it again.
                        </p>
                    </li>
                    <div class="moretext-listed-down">
                    <li>
                        <p class="desc">
                            Since OSHA 10 Hour are not complicated or hard to understand, you need to score 70% or more
                            marks
                            to pass the course within the three attempts you get
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            It’s not mandatory to complete the course within 10 Hours. You get six months of course
                            validity, so you can save your progress and complete your course wherever and whenever you want
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            After completing OSHA 10-Hour, you will receive a printable certificate which will later
                            complement your resume
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            The DOL/OSHA Card for OSHA 10 Hour will be delivered within 90 days on your doorstep or by mail.
                        </p>
                    </li>
                    </div>


                </ul>
                <div class="readmore_button_text_center">
                <button class="moreless-button-listed-down read_more_less_btn">Read more</button>
                </div>

            </div>
        </div>
    </section>
    <style>
        .moretext-listed-down {
            display: none;
        }
    </style>
    @include('partials._reviews_sa')

    {{-- @include('partials._whyus_without_desc', ['backgroundWhite' => true]) --}}
{{--    @include('partials._comparison_features')--}}

    @include('partials._faqs', ['blueBackground' => true])

    {{-- why to enroll video section here --}}
    @stack('modal_content')

    {{--    @include('partials._banner_strip_new') --}}

    @push('custom-css')
        .cBtnWrapper {
        padding: 15px 0;
        }
        .cBtnWrapper a {text-decoration: underline;}
        .box.\--lpDescription .imgWrapper img,
        .box.\--lpDescription .imgWrapper{
        width:100%;
        }
        .box.\--lpDescription .desc {
        font-size: 18px;
        text-align: left;
        line-height: 1.8;
        margin-bottom: 30px;
        }
        .box.\--lpDescription .headDesc{
        font-size: 18px;
        text-align: left;
        line-height: 1.8;
        margin-bottom: 15px;
        }

        .box.\--lpDescription ul{
        margin-bottom:30px;
        padding-left:25px;
        }
        .box.\--lpDescription ul li .desc{
        margin-bottom:10px;
        }
        .osha-courses{
        position: relative;
        background-color: #ffffff;
{{--        margin-bottom: 30px;--}}
        }
        .osha-course-box{
        max-width: 258px;
        text-align: center;
        margin: 0 auto 50px;
        }

        .osha-course-box .content{
        display: block;
        background: #005384 ;
        color: #FFFFFF;
        padding: 20px 5px;
        }

        .osha-course-box .content p.title{
        font-size: 18px;
        line-height: 18px;
        font-weight: bold;
        text-transform: uppercase;
        }

        .osha-course-box .content p.title span{
        display: block;
        font-size: 18px;
        font-weight: normal;
        }

        .osha-course-box figure{
        display: block;
        position:Relative;
        }
        .osha-course-box figure h3{
        position: absolute;
        bottom: 25px;
        left: 20px;
        right: 20px;
        font-size: 18px;
        font-weight: 300;
        text-align: left;
        line-height:1.02;
        text-transform:uppercase;
        }
        .osha-course-box figure h3 span.spec {
        font-size: 22px;
        font-weight: 700;
        display: block;
        }

        .osha-course-box .osha-course-bottom{
        border: 1px solid #999;
        border-top: none;
        padding: 10px;
        }

        .osha-course-box .osha-course-price{
        font-size: 36px;
        font-weight: bold;
        }

        .osha-course-box .btn.\--btn-primary.osha-course-purchase-btn{
        background-color: #ffb900;
        color: #1f1d1e;
        font-weight: bold;
        background: transparent;
        display: block;
        }
        .osha-course-box .btn.\--btn-primary.osha-course-purchase-btn img{
        width:calc(100% - 30px);
        margin:auto
        }

        .osha-course-box .view-course-link{
        color: #005384 ;
        font-weight: bold;
        margin-top: 10px;
        display: block;
        text-decoration: underline;
        }
        @media (max-width: 767px){
        .osha-course-box{
        margin: 0;
        }
        {{-- .osha-course-box figure img{ --}}
        {{-- display: none; --}}
        {{-- } --}}
        .osha-course-box .content p.title{
        font-size: 15px;
        line-height: 15px;
        width: 120px;
        margin: 0 auto;
        padding-top: 5%;
        }
        .osha-course-box .content p.title span{
        font-size: 13px;
        }
        .osha-course-box .view-course-link{
        margin-bottom: 10px;
        }
        .osha-course-box .btn.\--btn-primary.osha-course-purchase-btn{
        padding: 8px 12px;
        }
        .osha-course-box .osha-course-bottom{
        padding: 0px 10px;
        }
        .osha-course-box .content{
        padding: 13px 5px;
        }
        }
        @media (min-width:768px) and (max-width: 1200px) {
        .osha-course-box .content p.title{
        font-size: 16px;
        line-height: 16px;
        }
        .osha-course-box .content p.title span{
        font-size: 16px;
        }
        .osha-course-box figure h3{
        font-size: 16px;
        }
        .osha-course-box figure h3 span.spec {
        font-size: 20px;
        }
        }
        @media (max-width: 767px) {
        .osha-course-box figure h3{
        font-size: 14px;
        }
        .osha-course-box figure h3 span.spec {
        font-size: 18px;
        }
        }

        span small.fs-medium.fc-black.price-lt {
        position: relative;
        }

        small.fs-medium.fc-black.price-lt:before {
        display: block;
        content: "";
        position: absolute;
        left: 5%;
        top: 51%;
        width: 100%;
        height: 1.5px;
        background-color: #fc4a1a;
        transform: rotate(
        -12deg
        );
        }

        @media (max-width: 350px) {
        span.osha-course-price.fc-red small {
        display: block;
        width: fit-content;
        width: -webkit-fit-content;
        width: -moz-fit-content;
        margin: auto;
        }
        .osha-course-box .osha-course-bottom br {
        display: none;
        }
        }
        {{-- For language modal --}}
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
        {{-- For language modal --}}
    @endpush
@endsection
@section('scripts')
    <script>
        $(window).load(function() {
            resizeCourses();
        });

        $(document).ready(function() {
            $(window).resize(function() {
                // console.log($(this).width());
                resizeCourses();
            });
        });

        function resizeCourses() {
            $('.content').removeAttr('style');
            if ($(window).width() >= 760) {
                return false;
            }
            var height = 0;
            var temp = 0;
            $('.courses-10').find('figure').each(function() {
                temp = $(this).height();
                if (temp > height) {
                    height = temp;
                }
                // console.log(height);
            });
            // console.log(height);
            $('.courses-10 .content').height(height - 26);

            height = 0;
            temp = 0;
            $('.courses-30').find('figure').each(function() {
                temp = $(this).height();
                if (temp > height) {
                    height = temp;
                }
                // console.log(height);
            });
            // console.log(height);
            $('.courses-30 .content').height(height - 26);
        }

        function showEnrollLangModal(modalId) {
            $('body').addClass('modal-open');
            $('.shopperlink').hide();

            $('#' + modalId).fadeIn(250);
        }



        $('.moreless-button-10-hour-training-button').click(function() {
            $('.moretext_osha_10_hour_training').slideToggle();
            if ($('.moreless-button-10-hour-training-button').text() == "Read more") {
                $(this).text("Read less")
            } else {
                $(this).text("Read more")
            }
        });


        $('.moreless-button-advantage-completing').click(function() {
            $('.moretext_advantage_completing').slideToggle();
            if ($('.moreless-button-advantage-completing').text() == "Read more") {
                $(this).text("Read less")
            } else {
                $(this).text("Read more")
            }
        });


        $('.moreless-button-10-hour-training-curriculum').click(function() {
            $('.moretext-10-hourtraining-curriculum').slideToggle();
            if ($('.moreless-button-10-hour-training-curriculum').text() == "Read more") {
                $(this).text("Read less")
            } else {
                $(this).text("Read more")
            }
        });


        $('.moreless-button-listed-down').click(function() {
            $('.moretext-listed-down').slideToggle();
            if ($('.moreless-button-listed-down').text() == "Read more") {
                $(this).text("Read less")
            } else {
                $(this).text("Read more")
            }
        });
    </script>
@endsection
