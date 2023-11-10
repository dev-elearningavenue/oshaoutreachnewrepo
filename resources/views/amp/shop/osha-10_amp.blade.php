@extends('layouts.amp')

@section('title', isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'OSHA 10 and 30 |
'.config('app.name') )

@section('preload')
@if(isset($page['seo_tags']))
@foreach($page['seo_tags'] as $meta_name => $meta_content)
@if($meta_name != 'title')
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

@include('amp.partials._general_amp_schema', ['fallbackName' => 'OSHA 10-HOUR TRAINING', 'breadCrumbList' =>
true])
@endsection

@section('content')



<section class="osha-courses">
    <div class="container">

        <div class="page-heading mbpx-20">
            <h1 class="h3 ta-center mtpx-0 mbpx-0">OSHA 10 HOUR ONLINE</h1>
            <p class="subtitle"></p>
        </div>
        <div class="box --course-objectives">
            <p class="desc mbpx-20 mtpx-20">OSHA 10 builds your career by dispensing common yet practical knowledge of site safety and its hazards at the lowest prices possible.</p>
        </div>

        @include('amp.partials._why_to_enroll_video_section')

        <div class="row courses-30">
           @include('amp.partials._course_boxes_with_schema_amp')
        </div>

        <div class="box --lpDescription">
            <h2 class="headDesc">
                Introduction to OSHA 10 Hour Training
            </h2>
            <p class="desc">
                During the past 50 years, the Occupational Safety and Health Administration (OSHA) has focused on
                workplace safety. Although OSHA online courses do not certify any employees, OSHA nonetheless advises
                workers to complete their safety training to obtain the DOL Card. The Online OSHA 10 Hour course is
                divided into two main categories:
            </p>
            <ul>
                <li>
                    <p class="desc">
                        <a style="text-decoration: underline;color: #005384;" href="{{ url('osha-10-hour-construction') }}" target="_blank">
                            OSHA 10 Hour Construction
                        </a>
                        is an entry-level course designed for employees who are about to or
                        starting their career in a Construction facility. This course dispenses common yet useful
                        knowledge of the practical safety measures you must take to protect yourself from any worksite
                        hazards that can cause accidents or incidents.
                    </p>
                </li>
                <li>
                    <p class="desc">
                        <a style="text-decoration: underline;color: #005384;" href="{{ url('osha-10-hour-general-industry') }}" target="_blank">
                            OSHA 10 Hour General Industry
                        </a>
                        dispenses general awareness of site safety and its hazards.
                        This course is designed to meet the requirements for employees who are considered to be
                        entry-level workers at a General Industry facility. This course will educate you on preventing
                        and identifying any site hazards while taking practical safety measures against them.
                    </p>
                </li>
            </ul>
            <p class="desc">
                The primary purpose of OSHA 10 Hour training online is to dispense general site safety knowledge
                under the light of OSHA Standards and Regulations. This is why OSHA focuses primarily on these
                two industries. As a result, you will not only benefit from OSHA/DOL Card,
                but you will also gain perks like:
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
                        It helps you take practical safety measures against any site hazards
                    </p>
                </li>
            </ul>
            <h2 class="headDesc">
                Advantages Of Completing OSHA 10
            </h2>
            <p class="desc">
                As discussed above, OSHA 10 certificate is one of the most in-demand Online OSHA Training, which is
                widely opted for by employees in the initial stages of their careers. Like other OSHA training, 10 Hour
                OSHA training online has its benefits, which are:
            </p>
            <ul>
                <li>
                    <p class="desc">
                        Online OSHA 10 Hour training helps you comply with OSHA through the OSHA 10 Hour Card, which
                        you will receive after completing the course and also makes you meet your company’s training
                        requirements, automatically giving you an edge over other employees.

                    </p>
                </li>
                <li>
                    <p class="desc">
                        This course also cuts down employee medical compensation cost, saves employees from sudden
                        OSHA Inspections, and also reduce the chances to near none of getting subjected to harsh OSHA
                        fines or penalties. This creates a win-win situation for both employees and employers.
                    </p>
                </li>
                <li>
                    <p class="desc">
                        Once you complete your OSHA 10 certification online, you will automatically build a sense of
                        safety for yourself, your work site, and your colleagues. This course will make you never give
                        safety a day off once you understand the importance of site safety and safe operations.
                    </p>
                </li>
                <li>
                    <p class="desc">
                        This course also helps you understand what OSHA is and why it emphasizes making worksites safe
                        and hazard free with references to OSHA Standards and Regulations.
                    </p>
                </li>
            </ul>
            <amp-img
                src="{{ asset('osha-10-hour-online/osha-10-hour-online-infographic.webp') }}"
                alt="OSHA 10 HOUR INFOGRAPHIC"
                layout="responsive"
                width="80"
                height="110"
            ></amp-img>
            <div class="ta-center cBtnWrapper" style="margin-bottom: 10px;">
                <a class="fs-medium fw-semi-bold" target="_blank" href="{{ asset('osha-10-hour-online/osha-10-hour-online-infographic.pdf') }}">View PDF Version</a>
            </div>
            <h2 class="headDesc">
                10 Hour OSHA Training Curriculum
            </h2>
            <p class="desc">
                As discussed, OSHA 10 Hour is considered an initial orientation on how hazardous a worksite can be and
                what an employee can do to avoid such hazards, which can lead to brutal accidents and even fatalities.
                This course comprises brief yet essential safety guidelines and common hazard recognition methods and
                techniques. Moreover, OSHA 10 online will also educate you on accident prevention methods, creating a
                sense of being responsible and vigilant on hazardous worksites and operations. You will also learn about
                Personal Protective Equipment (PPE), how to use it, and its benefits. This course also highlights fall
                protection, chemical handling, material handling, ladder safety, etc. Through OSHA 10 Hour course, you
                will be able to build an understanding on:
            </p>
            <ul>
                <li>
                    <p class="desc">
                        How to keep your worksite safe
                    </p>
                </li>
                <li>
                    <p class="desc">
                        What safety measures do you need to take in order to make your site safe
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
                        How to efficiently and safely handle materials related to Construction
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
                Adding more, this course comes in 2 niches: OSHA 10 Hour General Industry and Construction Industry, and
                can be taken at your convenience as this course is self-paced and also has a feature of saving your
                progress. Additionally, OSHA grips over all 52 states of the United States, so we tend to provide safety
                training solutions for every state possible as we aim to promote safety culture through our
                budget-friendly OSHA training prices. These courses are also available in Spanish while being charged at
                the same price as English courses.
            </p>
            <h2 class="headDesc">
                Enrollment Procedure For OSHA 10 Course
            </h2>
            <p class="desc">
                We always try to make your virtual training experience easy yet understandable and so we have kept our
                enrollment process as accessible as possible. Listed down below are few steps you need to follow to get
                done with the enrollment procedure:
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
                        To proceed with the payment method, you need to click Proceed to Checkout
                    </p>
                </li>
                <li>
                    <p class="desc">
                        You need to fill out your payment details and all the necessary credentials
                    </p>
                </li>
                <li>
                    <p class="desc">
                        As soon as you complete your payment procedure you will receive your LMS credentials through
                        SMS and Email
                    </p>
                </li>
                <li>
                    <p class="desc">
                        Log in through your LMS credentials and then you can start your course as per your ease
                    </p>
                </li>
            </ul>
            <p class="desc">
            Every training comes with some guidelines and conditions which are needed to be fulfilled in order to obtain a successful completion of the course. Listed down below are some guidelines you need to follow for OSHA 10 Hour certification:
            </p>
            <ul>
                <li>
                    <p class="desc">
                    You will be given 3 generous attempts to clear the course. In the case of failing all 3 attempts, you can opt for the course again by purchasing it again.
                    </p>
                </li>
                <li>
                    <p class="desc">
                    Since the courses are not complicated or hard to understand, you need to score 70% or more marks to pass the course within the 3 attempts you get
                    </p>
                </li>
                <li>
                    <p class="desc">
                    It's not mandatory to complete the course within 10 Hours. You get 6 months of course validity, and so you can save your progress and complete your course wherever and whenever you want
                    </p>
                </li>
                <li>
                    <p class="desc">
                    After successfully completing the course, you will receive a printable certificate which will later complement your resume
                    </p>
                </li>
                <li>
                    <p class="desc">
                    The DOL/OSHA Card for OSHA 10 will be delivered within 90 days on your doorstep or by mail.
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
position:Relative;
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
</script>
@endsection
