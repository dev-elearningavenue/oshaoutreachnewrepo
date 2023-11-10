@extends('layouts.amp')

@section('title', isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'OSHA 10 and 30 | '.config('app.name') )

@section('preload')
    @if(isset($page['seo_tags']))
        @foreach($page['seo_tags'] as $meta_name => $meta_content)
            @if($meta_name != 'title')
                <meta name="{{ $meta_name }}" content="{{ $meta_content }}"/>
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
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="OSHA Outreach Courses">
    <meta property="fb:app_id" content="817832821974771"/>
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:site" content="@OshaOutreach">

    @include('amp.partials._general_amp_schema', ['fallbackName' => 'OSHA 30-HOUR TRAINING', 'breadCrumbList' => true])
@endsection

@section('content')

    <section class="osha-courses">
        <div class="container">
            <div class="page-heading mbpx-20">
                <h1 class="h3 ta-center mtpx-0 mbpx-0">OSHA 30-HOUR ONLINE</h1>
                <p class="subtitle"></p>
            </div>
            <div class="box --course-objectives">
                <p class="desc mbpx-20 mtpx-20">
                OSHA 30-Hour Online course, designed to provide comprehensive training on essential regulations, hazard recognition, and prevention strategies. Earn your OSHA 30 card today and enhance your career!
                </p>
            </div>

            @include('amp.partials._why_to_enroll_video_section')

            <div class="row courses-10">
                @include('amp.partials._course_boxes_with_schema_amp')
            </div>

            <div class="box --lpDescription">
                <h2 class="headDesc">
                    Introduction to OSHA 30 Hour Training
                </h2>
                <p class="desc">
                    Since its establishment, the Federal OSHA, which stands for Occupational Safety and Health
                    Administration, has promoted workers' rights by ensuring all industrial facilities in
                    the United States have a safe and healthy work culture. With its OSHA 30 Hour courses,
                    which comprise mainly two industries:

                    <ul>
                        <li>
                            <p class="desc">
                                <a style="text-decoration: underline;color: #005384;" href="{{ url('osha-30-hour-construction') . '?outputType=amp' }}" target="_blank">
                                    OSHA 30 Hour Construction
                                </a>
                                is designed for employees in Managerial or Supervisory roles at a Construction facility.
                                This course dispenses detailed knowledge on how to efficiently handle and manage hazards
                                related to Construction worksites and operations by taking useful safety measures against the
                                hazards. You will also develop an in-depth understanding of OSHA and its Standards through
                                30 Hour OSHA Construction.
                            </p>
                        </li>
                        <li>
                            <p class="desc">
                                <a style="text-decoration: underline;color: #005384;" href="{{ url('osha-30-hour-general-industry') . '?outputType=amp' }}" target="_blank">
                                    OSHA 30 Hour General Industry
                                </a>
                                , a detailed course that helps you gain end-to-end knowledge
                                of on-site safety and its related hazards that can cause accidents or incidents while
                                performing operations at General Industry facilities. This course consists of a detailed
                                outline that consists of different modules which will help you take practical safety measures
                                against any hazardous operations.
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
                            designations as per OSHA's Standards.
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
                            To enable employees to enforce OSHA's regulations on the workers under their supervision.
                        </p>
                    </li>
                </ul>
                <h2 class="headDesc">
                    Advantages Of Completing OSHA 30 Online Training
                </h2>
                <p class="desc">
                    Since OSHA 30 Hour online training courses are 30 hours long and primarily emphasize the basic details
                    of the comprehensive site safety topics such as hazard prevention, these training programs allow
                    employees to learn every aspect of knowledge required by OSHA’s laws.
                </p>
                <p class="desc">
                    Upon completing their 30 Hour OSHA certifications, employees will be able to become more advanced in
                    their job operations, particularly identifying and preventing site hazards, administering workers as
                    well as providing them adequate training and instructions required by their different fields of work,
                    and upgrading the financial position of their industrial facility by being productive and efficient.
                </p>
                <p class="desc">
                    In addition, effective management can also reduce workers’ medical compensation fees and lost workdays,
                    which often result in accidents and severe injuries. Moreover, the industries will stay protected from
                    heavy penalties and harsh fines from OSHA’s inspections.
                </p>
                <p class="desc">
                    Having capable and responsible OSHA-trained supervisors or managers will ensure that the workplace is
                    safeguarded from potential site hazards since they can precisely implement the preventative control
                    measures and actions taught in OSHA 30 online training. Furthermore, by training and giving appropriate
                    instructions to workers under their supervision, there will be a healthy work environment based on
                    mutual coordination between workers and their managers or supervisors.
                </p>
                <p class="desc">
                    Another significant advantage of completing OSHA 30 online training is that since most industrial
                    organizations emphasize maintaining their financial performance and reputation for efficiency, employers
                    usually prefer hiring those employees who have already obtained and fulfilled the necessary training
                    requirements and are professionally skilled from an OSHA-approved online training provider.
                </p>
                <p class="desc">
                    This way, employers feel satisfied that the workers they’re hiring already know how to perform their
                    roles and duties pertinent to their job operations and uphold a secure work culture. Last but not least,
                    employees also avail this exclusive benefit of learning their fundamental rights provided by OSHA. Since
                    OSHA’s Whistleblower protection cover workers’ rights and privileges, they are allowed to discuss their
                    concerns and encouraged to report a safety violation complaint against their organization or employer
                    without feeling threatened by the fear of discrimination or retaliation afterward.
                </p>
                <amp-img
                    src="{{ asset('osha-30-hour-online/osha-30-hour-online-infographic.webp') }}"
                    alt="OSHA 30 HOUR INFOGRAPHIC"
                    layout="responsive"
                    width="80"
                    height="110"
                >
                </amp-img>
                <div class="ta-center cBtnWrapper" style="margin-bottom: 10px;">
                    <a class="fs-medium fw-semi-bold" target="_blank" href="{{ asset('osha-30-hour-online/osha-30-hour-online-infographic.pdf') }}">
                        View PDF Version
                    </a>
                </div>
                <h2 class="headDesc">
                    OSHA 30 Hour Training Curriculum
                </h2>
                <p class="desc">
                    Compared to the basic level courses of OSHA, which only provide workers a general overview of site
                    safety topics, OSHA 30 Hour Online Training Courses are particularly advanced in comprehensively
                    covering site safety topics. In addition, since this training program complies with the obligations
                    mandated by OSHA 29 CFR 1926, completing your 30 Hour OSHA certification will benefit your career in the
                    long run.
                </p>
                <p class="desc">
                    The course outlines 30 Hour OSHA online training that includes various site safety topics pertinent to
                    different job operations, functions, and areas of expertise. The essential site safety topics this
                    program provides education for include hazard identification, control, and prevention, how to precisely
                    choose Personal Protective Equipment (PPE), and fire protection.
                </p>
                <p class="desc">
                    Therefore, after completing OSHA 30 Online Certification, candidates will be able to:
                </p>
                <ul>
                    <li>
                        <p class="desc">
                            Understand the general criteria of OSHA, its standards, and regulations.
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            Identify, manage, and prevent OSHA Focus Four Hazards.
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            Comprehend back safety, injury prevention, slips, trips, and falls.
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            Select Personal Protective Equipment (PPE) such as head, hand, and foot protection as per the
                            need and requirement of the situation.
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            Acknowledge the general awareness, hazards, controls, and best practices relevant to Electrical
                            safety.
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            Efficiently manage Stairways, Ladders, Hand and Power tools, Cranes, Derricks, Hoists,
                            Elevators, and Conveyors.
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            Understand the scaffold techniques, active shooter response, fire extinguisher safety, and
                            chemical and compressed gas safety.
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            Manage job operations about permit-required confined work spaces.
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            Understand how to prevent and control lead, silica, and asbestos exposure.
                        </p>
                    </li>
                </ul>
                <h2 class="headDesc">
                    Enrollment procedure for OSHA 30 Hour Online Training Course
                </h2>
                <p class="desc">
                    We always try to make your virtual training experience easy yet understandable, so we have kept our
                    enrollment process as accessible as possible. Listed down below are a few steps you need to follow to
                    get done with the enrollment procedure:
                </p>
                <ul>
                    <li>
                        <p class="desc">
                            Press the Enroll Now button and add the desired OSHA course to the cart which you want to opt
                            for.
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            To proceed with the payment method, click Proceed to Checkout.
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            You need to fill out your payment details and all the necessary credentials.
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            You will receive your LMS credentials through SMS and Email as soon as you complete your payment
                            procedure.
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            Log in through your LMS credentials, and then you can start your course with your ease.
                        </p>
                    </li>
                </ul>
                <p class="desc">
                    Every training comes with some guidelines and conditions which are needed to be fulfilled to obtain a
                    successful completion of the course. Listed down below are some guidelines you need to follow for OSHA
                    30 Hour certification:
                </p>
                <ul>
                    <li>
                        <p class="desc">
                            You will be given THREE generous attempts to clear the course. If failing all THREE attempts,
                            you can opt for the course again by repurchasing it.
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            Since the courses are simple and easy to understand, you need to score 70% or more marks to pass
                            the course within the THREE attempts you are given.
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            It's optional to complete the course within 30 Hours. You get six months of course validity, so
                            you can save your progress and complete your course wherever and whenever you want
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            After completing the course, you can download your printable certificate, which will later
                            complement your resume.
                        </p>
                    </li>
                    <li>
                        <p class="desc">
                            The DOL/OSHA Card for OSHA 30 will be delivered within 90 days on your doorstep or in your
                            mailbox on behalf of the U.S. Department of Labor.
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    @push('component-script')
        <script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.2.js"></script>
    @endpush

    {{--    @include('amp.partials._reviews_amp')--}}
    @include('amp.partials._banner_strip_amp')

    @include('amp.partials._faqs_amp')

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
        margin-bottom: 30px;
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
        }
        .osha-course-box h3{
        position: absolute;
        bottom: 25px;
        left: 20px;
        right: 20px;
        font-size: 18px;
        font-weight: 300;
        text-align: left;
        line-height:1.02;
        z-index:9;
        text-transform:uppercase;
        }
        .osha-course-box h3 span.spec {
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
        color:#1f1d1e;
        font-weight: bold;
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
        .osha-course-box h3{
        font-size: 14px;
        }
        .osha-course-box h3 span.spec {
        font-size: 18px;
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

        .fc-red {
        color: #ff0000;
        }

        .fc-black {
        color: black;
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
    @endpush
@endsection
@section('scripts')
    <script>
        $(window).load(function () {
            resizeCourses();
        });

        $(document).ready(function () {
            $(window).resize(function () {
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
            $('.courses-10').find('figure').each(function () {
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
            $('.courses-30').find('figure').each(function () {
                temp = $(this).height();
                if (temp > height) {
                    height = temp;
                }
                // console.log(height);
            });
            // console.log(height);
            $('.courses-30 .content').height(height - 26);
        }
    </script>
@endsection
