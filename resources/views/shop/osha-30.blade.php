@extends('layouts.master')

@section('title', isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'OSHA 10 and 30 |
'.config('app.name') )

@section('styles')
    @if(isset($page['seo_tags']))
        @foreach($page['seo_tags'] as $meta_name => $meta_content)
            @if($meta_name != 'title')
                <meta name="{{ $meta_name }}" content="{{ $meta_content }}" />
            @endif
        @endforeach
    @endif
    <meta property="og:title"
          content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'OSHA 30-HOUR TRAINING' }}">
    <meta property="twitter:title"
          content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'OSHA 30-HOUR TRAINING' }}">
    <meta property="og:description"
          content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'OSHA 30-HOUR TRAINING' }}">
    <meta property="twitter:description"
          content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'OSHA 30-HOUR TRAINING' }}">
    <meta property="og:image" content="{{ url('/images/osha-10-30-og/osha-30-hour-online.png') }}">
    <meta property="twitter:image" content="{{ url('/images/osha-10-30-og/osha-30-hour-online.png') }}">
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
        "name": "{{ isset($page['h1_heading']) ? $page['h1_heading'] : 'OSHA 30-HOUR TRAINING' }}"
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
                <h1 class="h3 ta-center mtpx-0 mbpx-0">OSHA 30-HOUR TRAINING</h1>
                <p class="subtitle"></p>
            </div>
            <div class="box --course-objectives">
                <p class="desc mbpx-20 mtpx-20">
                    The OSHA 30-Hour online training enhances the growth of your career by dispensing comprehensive site
                    safety education through advanced-level safety topics conforming to OSHA standards and guidelines.
                </p>
            </div>
        </div>





        {{-- <div class="container mbpx-30 bnpl_img_wrapper after_pay_desktop">
            <a href="#courses"> <img src="{{ asset('images/BNPL-Banner-new.desktop.png')}}" alt=""></a>
        </div>
        <div class="container mbpx-30 bnpl_img_wrapper after_pay_mobile">
            <a href="#courses"> <img src="{{ asset('images/BNPL-Banner-new-mobile.png') }}" alt=""></a>

        </div> --}}


        <style>
            .after_pay_desktop{
                display: block;
            }
            .after_pay_mobile{
                display: none;
            }
            .bnpl_img_wrapper img{
                margin: 0 auto;
                width: 65%;
            }

            html {
                scroll-behavior: smooth;
            }
            @media (max-width:1400px ){
                .bnpl_img_wrapper img {
                    margin: 0 auto;
                    width: 70%;
                }
            }

            @media (max-width:1200px ){
                .bnpl_img_wrapper img {
                    margin: 0 auto;
                    width: 75%;
                }
            }
            @media (max-width:992px ){
                .bnpl_img_wrapper img {
                    margin: 0 auto;
                    width: 100%;
                }
            }
            @media (max-width:768px ){
                .after_pay_desktop{
                    display: none;
                }
                .after_pay_mobile{
                    display: block;
                }
            }
        </style>

        {{--@include('partials._free-signup-cta')--}}

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
            @include('partials._why_to_enroll_video_section', ['classes' => '', 'slug' => 'marcos-osha-30'])
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

        {{--     @include('partials._free-study-guide-cta')--}}

        <div class="container">
            <div class="box --lpDescription">
                <div class="page-heading">
                <h2 class="title">
                    Introduction to OSHA 30-Hour Training
                </h2>
                </div>
                <p class="desc">
                    Over the past five decades, the Occupational Safety and Health Administration (OSHA) has formed a
                    great example of its unwavering dedication to enhancing and sustaining workplace health and safety
                    standards nationwide. Through its steadfast formulation and implementation of strict OSHA regulations,
                    OSHA has significantly transformed diverse industries, including Construction and General Industry.
                </p>
                <div  class="moretext_osh_30_hour_training_readmore">
                <p class="desc">
                    Central to OSHA’s multidimensional approach is the OSHA 30-Hour Outreach course, which empowers
                    individuals with safety responsibilities with an in-depth knowledge of advanced-level safety
                    management protocols. Though OSHA 30-hour online training is optional, it is a testament to workers'
                    commitment to professionalism and a healthy workplace culture.
                </p>


                    <p class="desc">
                        Therefore, the OSHA 30-Hour training comes in two of the following categories:
                    </p>
                    <ul>
                        <li>
                            <p class="desc">
                                <a href="{{ url('osha-30-hour-construction') }}" class="custom-anchor" target="_blank">
                                    OSHA 30-Hour Construction
                                </a>
                                is an advanced online safety training course for workers designated with supervisory roles
                                and site safety responsibilities in the construction sector. The 30-Hour OSHA Construction
                                course comprises a wide range of detailed safety topics. It provides extensive knowledge to
                                equip professionals with management skills and safety expertise to identify and mitigate
                                potential risks and hazards, preventing accidents and injuries
                                while ensuring the safety of everyone.
                            </p>
                        </li>
                        <li>
                            <p class="desc">
                                <a href="{{ url('osha-30-hour-general-industry') }}" class="custom-anchor" target="_blank">
                                    OSHA 30-Hour General Industry
                                </a>
                                is a comprehensive online safety training course designed for individuals with site safety
                                responsibilities associated with various jobs, including manufacturing, distribution, retail,
                                and storage within the general industry sector. The 30-Hour General Industry course provides a
                                detailed outline of essential safety topics to equip workers with end-to-end knowledge of
                                workplace management protocols, best practices, hazard identification, and mitigation to avoid
                                accidents and injuries.
                            </p>
                        </li>
                    </ul>
                    </p>
                    <p class="desc">
                        With an extensive range of essential safety topics, the following are the primary goals of OSHA 30
                        Online Courses:
                    </p>
                    <ul>
                        <li>
                            <p class="desc">
                                To educate employees on their fundamental roles and responsibilities pertinent to their
                                designations as per OSHA’s Standards.
                            </p>
                        </li>
                        <li>
                            <p class="desc">
                                To equip employees with the management procedures in their industrial facilities, such as
                                disciplinary and hazard-preventative measures.
                            </p>
                        </li>
                        <li>
                            <p class="desc">
                                To enable employees to enforce OSHA’s regulations on the workers under their supervision.
                            </p>
                        </li>
                    </ul>
                </div>
                {{--            read more start--}}
                <div class="readmore_button_text_center">
                <button class="moreless-button_osha_30_hour read_more_less_btn">Read more</button>
                </div>
            </div>
            <style>

                .moretext_osh_30_hour_training_readmore {
                    display: none;
                }

            </style>
        {{--            read more end--}}
        <!-- Cta -->
        @include('partials._newProm_Cta')
        <!-- Cta -->
            <div class="box --lpDescription">
                <div class="page-heading">
{{--            <h2 class="headDesc">--}}
                <h2 class="title">
                Benefits of Completing OSHA 30-Hour Online Course
            </h2>
                </div>

            <p class="desc">
                With its broad range of fundamental site safety topics and encompassing every detail of the
                OSHA regulations pertinent to the relevant industries, OSHA 30-hour training takes a proactive
                approach to staying up-to-date with evolving OSHA safety standards and guidelines to mitigate
                potential hazards. By investing and participating in OSHA 30-Hour training courses, individuals
                avail several benefits such as:
            </p>
            <div class="benefits_moretext">
                <ul>
                    <li>
                        <p class="desc">
                            OSHA 30-hour training provides a deep understanding to participants of their fundamental roles
                            and site safety responsibilities as required by the OSHA.
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            OSHA 30-Hour course equips site supervisors and managers with correct safety management
                            practices, such as disciplinary and hazard-preventative measures in their respective
                            occupational facilities.
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            By taking OSHA 30-hour training, managers can enforce and regulate tasks according to OSHA
                            guidelines on the workforce under their supervision, thus evading OSHA inspections and
                            heavy penalties.
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            The OSHA 30-Hour course will not only enhance participants’ prior knowledge about OSHA safety
                            regulation, but they will collectively contribute and actively participate in the ongoing
                            narrative of employees’ well-being and operational excellence.
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            Obtaining the OSHA 30 card will enable individuals to upgrade the financial position of their
                            workplace by improving safety and productivity and also reduce workers’ compensation claims for
                            getting injured.
                        </p>
                    </li>
                </ul>
            </div>
            </div>

            <div class="readmore_button_text_center">
            <button class="moreless-button-benefits read_more_less_btn">Read more</button>
            </div>
            <style>
                .benefits_moretext {
                    display: none;
                }
                .osha_30_hour_img{
                    margin:40px 0px;
                }
            </style>
            <div class="imgWrapper osha_30_hour_img">
                {{--                <img src="{{ asset('osha-30-hour-online/osha-30-hour-online-infographic.webp') }}" alt="">--}}
                <img src="{{ asset('images/osha-30-hour-online-infographic.webp') }}" alt="">
            </div>
            <div class="ta-center cBtnWrapper">
                <a class="fs-large fw-medium" target="_blank"
                   href="{{ asset('osha-30-hour-online/osha-30-hour-online-infographic.pdf') }}">
                    View PDF Version
                </a>
            </div>
            <div class="box --lpDescription">
                <div class="page-heading">
            <h2 class="title">
                The 30-Hour OSHA Online Training Curriculum
            </h2>
                </div>

            <p class="desc">
                In a nutshell, the OSHA 30-Hour certification course stresses and expands upon the safety measures
                introduced in the OSHA 10-Hour training, diving even deeper into the scope of workplace safety.
                Geared towards emphasizing comprehensive insights and skills, the OSHA 30-Hour course empowers
                participants to recognize potential risks and carry out more detailed safety protocols.
            </p>
            <div class="moretext_curriculum">
            <p class="desc">
                Moreover, participants get a strong understanding of the complex safety guidelines administering
                their respective industries (Construction and General Industry) through a thorough exploration of
                crucial OSHA standards. By addressing effective strategies for complex safety challenges, participants
                will emerge firmly committed to tackling complex scenarios while upholding the best
                workplace safety standards.
            </p>
            <p class="desc">
                With OSHA 30-Hour training, participants will cover essential topics including but not limited to:
            </p>
            <ul class="curriculum_sec">
                <li>
                    <p class="desc">
                        Understand the detailed criteria of OSHA standards and regulations.
                    </p>
                </li>
                <li>
                    <p class="desc">
                        Identify, manage, and prevent OSHA's Focus Four Hazards.
                    </p>
                </li>
                <li>
                    <p class="desc">
                        Appropriately select personal protective equipment as per the situation's requirement and
                        understand its maintenance and usage.
                    </p>
                </li>
                <li>
                    <p class="desc">
                        Conduct a thorough inspection of any potential hazards or risks before allowing work permits in
                        confined spaces.
                    </p>
                </li>
                <li>
                    <p class="desc">
                        Perform correct measures involving OSHA work-related injury and illness record keeping.
                    </p>
                </li>
                <li>
                    <p class="desc">
                        Recognize the health concerns associated with jobs involving silica, asbestos,
                        and lead exposure.
                    </p>
                </li>
                <li>
                    <p class="desc">
                        Address correct safety practices when dealing with electrical appliances, conveyors, forklifts,
                        fire extinguishers, etc.
                    </p>
                </li>
            </ul>
            </div>
            </div>
            <div class="readmore_button_text_center">
            <button class="moreless-button-curriculum read_more_less_btn" >Read more</button>
            </div>
        </div>
        </div>
        <style>
            .curriculum_sec{
                /*margin:0px 0px 40px 0;*/
                padding-left: 20px;
            }
            .moretext_curriculum {
                display: none;
            }
            .moreless-button-curriculum{
                /*margin-top:10px;*/
                margin-bottom: 40px !important;
            }
        </style>
        {{--  Not changed  --}}
        <div class="enrollMentProcedSect bg-secondary sec-padding">
            <div class="container">
                <div class="headDescWrapper">
                    <h2 class="headDesc">
                        Enrollment Procedure For OSHA 30 Courses
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
        {{--  Not changed  --}}
        <div class="container sec-padding">
            <div class="box --lpDescription">
                <div class="page-heading">
                <h2 class="title">
                    Essential Guidelines to Remember When Starting OSHA 30-Hour Course:
                </h2>
                </div>
                <ul>
                    <li>
                        <p class="desc">
                            Participants are given THREE generous attempts to qualify for the quizzes and the final exam
                            of OSHA 30-Hour certification. If you fail all three attempts or let your course expire
                            after six months, you will be given a one-time opportunity to use the Course Reset Button to
                            start over. If you fail to succeed again, you’ll be locked out of the course and will have to
                            repurchase it.
                        </p>
                    </li>
                    <div class="moretext_essential_guidelines">
                    <li>
                        <p class="desc">
                            To qualify for the OSHA 30-Hour online, participants must score at least 70% or more to
                            pass the course within the three attempts they get.
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            Finishing the OSHA 30 safety training within the 30-hour duration is not compulsory since the
                            safety program allows participants to get a maximum training of 7.5 hours per day.
                            In addition, since you get six months of course validity, you can save progress and complete
                            the OSHA 30 course whenever you want.
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            After completing the OSHA 30-Hour online certification and filling in the course evaluation
                            survey, participants will obtain a printable OSHA 30 certificate.
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            The DOL/OSHA 30 card will be delivered via mail within 90 days to your doorstep on behalf of
                            the U.S. Department of Labor.
                        </p>
                    </li>
                </div>
                </ul>
                <div class="readmore_button_text_center">
                <button class="moreless-button-essential-guidelines read_more_less_btn" >Read more</button>
                </div>

                <style>
                    .moretext_essential_guidelines {
                        display: none;
                    }
                    .moreless-button-essential-guidelines{
                        margin-bottom: 0 !important;
                        margin-left:10px;
                    }
                </style>
            </div>
        </div>
    </section>
    @include('partials._reviews_sa')

    {{-- @include('partials._whyus_without_desc', ['backgroundWhite' => true]) --}}


    @include('partials._faqs', ['blueBackground' => true])

    {{--why to enroll video section here--}}
    @stack('modal_content')

    {{--    @include('partials._banner_strip_new')--}}


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
        {{-- .osha-course-box figure img{--}}
        {{-- display: none;--}}
        {{-- }--}}
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
    </script>

    <script>
        $('.moreless-button_osha_30_hour').click(function() {
            $('.moretext_osh_30_hour_training_readmore').slideToggle();
            if ($('.moreless-button_osha_30_hour').text() == "Read more") {
                $(this).text("Read less")
            } else {
                $(this).text("Read more")
            }
        });

        $('.moreless-button-benefits').click(function() {
            $('.benefits_moretext').slideToggle();
            if ($('.moreless-button-benefits').text() == "Read more") {
                $(this).text("Read less")
            } else {
                $(this).text("Read more")
            }
        });

        $('.moreless-button-curriculum').click(function() {
            $('.moretext_curriculum').slideToggle();
            if ($('.moreless-button-curriculum').text() == "Read more") {
                $(this).text("Read less")
            } else {
                $(this).text("Read more")
            }
        });


        $('.moreless-button-essential-guidelines').click(function() {
            $('.moretext_essential_guidelines').slideToggle();
            if ($('.moreless-button-essential-guidelines').text() == "Read more") {
                $(this).text("Read less")
            } else {
                $(this).text("Read more")
            }
        });
    </script>
@endsection
