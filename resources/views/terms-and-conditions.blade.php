@extends('layouts.master')

@section('title', isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Terms &amp; Conditions | '.config('app.name') )

@section('styles')
    @if(isset($page['seo_tags']))
        @foreach($page['seo_tags'] as $meta_name => $meta_content)
            @if($meta_name != 'title')
                <meta name="{{ $meta_name }}" content="{{ $meta_content }}" />
            @endif
        @endforeach
    @endif
    <meta property="og:title" content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Terms &amp; Conditions' }}">
    <meta property="twitter:title" content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Terms &amp; Conditions' }}">
    <meta property="og:description" content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'Terms &amp; Conditions' }}">
    <meta property="twitter:description" content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'Terms &amp; Conditions' }}">
    <meta property="og:image" content="{{ url('/images/osha-outreach-courses.png') }}">
    <meta property="twitter:image" content="{{ url('/images/osha-outreach-courses.png') }}">
    <!-- Meta Tags for Social Media -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="OSHA Outreach Courses">
    <meta property="fb:app_id" content="817832821974771"/>
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
            "name": "{{ isset($page['h1_heading']) ? $page['h1_heading'] : 'Terms &amp; Conditions' }}"
        }
    }
    </script>
@endsection

@section('content')
    <section class="home-intro sec-padding">
        <div class="container">
            <h1 class="title" style="text-decoration: underline;">{{ isset($page['h1_heading']) ? $page['h1_heading'] : 'Terms &amp; Conditions' }}</h1>
            <div class="box --course-objectives ta-left">
                <p class="desc" style="text-align: left;">This website is not meant for users under the age of 13. If you are under 13 years of age, you are not eligible to request personal information or apply for our services.</p>
                <p class="desc" style="text-align: left;">By utilizing this website, you declare and affirm that you have peruse and consent to our Disclaimer and Terms and Conditions of Use.</p>
                <p class="desc" style="text-align: left;">While every endeavor is made to certify the precision of the information on this website and other data provided to you by the OSHA Outreach Courses, a portion of this information may be incorrect or obsolete. Neither the OSHA Outreach Courses nor its subsidiary organizations, their officials, chiefs, workers, specialists, data suppliers, or providers warrant the exactness, dependability, or practicality of data provided and will not be obligated for any misfortunes brought about by such dependence on the precision, unwavering quality, or timeliness of such data.</p>
                <p class="desc" style="text-align: left;">Through accessing this website, you accept that neither the OSHA Outreach Courses nor its associated firms, their officers, administrators, staff, agents, information providers or suppliers shall be responsible to you under any liability or indemnity in accordance with the use of this website or the services of the OSHA Outreach Courses.</p>
                <p class="desc" style="text-align: left;">Despite the obvious previous clause, the overall responsibility of the OSHA Outreach Courses, if any, for losses or penalties shall not exceed the costs charged by the customer for the individual information or services received. In no case will the OSHA Outreach Courses be accountable to you for any loss or damage other than the amount stated above.</p>
                <p class="desc" style="text-align: left;">The use of any product or services offered by the OSHA Outreach Courses implies an agreement that you have read and accepted these terms of use. Through accessing this platform, you specifically accept that the OSHA Outreach Courses would not be held accountable for any harm or inconvenience caused or alleged to be caused by the use of our services.</p>

                <h6>Partnerships with Training Providers</h6>
                <p class="desc" style="text-align: left;">We deliver a range of courses in collaboration with leading developers of workplace safety. The OSHA Outreach Courses has collaborated with HSI to provide OSHA-authorized outreach learning. Students who successfully complete OSHA outreach training programs will receive an official OSHA card from the U.S. Ministry of Labour.</p>
                <p class="desc" style="text-align: left;">Outreach courses are not available from any provider to any student residing outside the United States. Students may require a U.S. address for card processing and must be based within the U.S. or certain U.S. territories and commonwealths to fulfill all aspects of OSHA outreach training.</p>
                <p class="desc" style="text-align: left;">For students in locations where OSHA outreach training is not required or approved, OSHA Outreach Courses provides 10-and 30-hour training courses labelled Osha 10 Equivalent & Osha 30 Equivalent respectively. These courses are similar in content to the OSHA-authorized instruction, but do not include an official OSHA card upon completion of the course.</p>
                <p class="desc" style="text-align: left;">If you have purchased Equivalent training but are in need of OSHA-authorized training, kindly contact our support team as soon as possible.</p>

                <h6>How to inquire</h6>
                <p class="desc" style="text-align: left;">Please send an e-mail to <a href="mailto:help@oshaoutreachcourses.com"><strong>help@oshaoutreachcourses.com</strong></a> to request information. Please provide your order ID, full student name and mailing address, or call our customer support team at <a href="tel:+18332126742"><strong>+1-833-212-6742</strong></a>.</p>
            </div>
        </div>
    </section>
@endsection
