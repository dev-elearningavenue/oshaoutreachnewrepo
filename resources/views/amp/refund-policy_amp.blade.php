@extends('layouts.amp')

@section('title', isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Refund Policy | '.config('app.name') )

@section('preload')
    <meta property="og:title" content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Refund Policy' }}">
    <meta property="twitter:title" content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Refund Policy' }}">
    <meta property="og:description" content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'Refund Policy' }}">
    <meta property="twitter:description" content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'Refund Policy' }}">
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
@endsection

@section('component-script')
@endsection

@section('structure-data')
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "BreadcrumbList",
        "name": "Breadcrumb",
        "itemListElement": {
            "@type": "ListItem",
            "position": 1,
            "name": "{{ isset($page['h1_heading']) ? $page['h1_heading'] : 'Refund Policy' }}"
        }
    }
    </script>
@endsection

@section('content')
    <section class="home-intro sec-padding">
        <div class="container">
            <h1 class="title" style="text-decoration: underline;">{{ isset($page['h1_heading']) ? $page['h1_heading'] : 'Refund Policy' }}</h1>
            <div class="box --course-objectives ta-left">
                <p class="desc" style="text-align: left;">It is our top priority that you are completely satisfied with your purchase. However, if you have any concerns, please feel free to contact our US-based support team to help assist you with technical issues or any other queries. Our US-based support team is available 24/7.</p>
                <p class="desc" style="text-align: left;">In the unfortunate event that you are unsatisfied, you might be qualified for a refund subject to the conditions mentioned underneath.</p>
                <h6>Terms and conditions for the refund:</h6>
                <ul class="unstyled">
                    <li class="mb-0">Your purchase was made no more than 48-hours prior to your refund request.</li>
                    <li class="mb-0">You have not attempted any portion of a test, quiz or exam</li>
                    <li class="mb-0">You have not requested or been issued a certificate of completion</li>
                    <li>You have not completed 30% or more of the purchased course</li>
                </ul>

                <p class="desc" style="text-align: left;">Customers who meet all above requirements must apply for their claim in writing via e-mail to <a href="mailto:help@oshaoutreachcourses.com"><strong>help@oshaoutreachcourses.com</strong></a> with proof of payment and a description of a reason for the refund within 48-hours of the purchase.</p>

                <p class="desc" style="text-align: left;">
                    <strong>NOTE</strong>: Requested refunds that are approved may take up to 10 business days to reflect in your account. Refunds will only be issued to the same payment method used during the initial purchase.
                </p>

                <h6>No Refund Will Be Provided to:</h6>
                <ul class="unstyled">
                    <li class="mb-0">Inability to pass tests, final test, or some other in-course evaluation prerequisites in the allocated attempts (as per certification guidelines)</li>
                    <li class="mb-0">Inability to pass Identity verification prerequisites (counting biometrics, security questions, or some other required strategies (as per certification guidelines)</li>
                    <li class="mb-0">Course validity and expiration (as per certification guideline)</li>
                    <li>Urgent processing or mailing of certificates, once the expedited request has been fulfilled to the customer as promised.</li>
                </ul>

                <h6>Course-Specific Policies</h6>
                <p class="desc" style="text-align: left;">A few courses or items may incorporate more specified refund arrangements and discounts; kindly allude to the terms and conditions during course enrollment. any course-specific terms, conditions, or policies presented during registration that may be inconsistent with the refund policy specified above, will supersede those listed in this refund policy. If you have any concerns or questions in regards to course guidelines, refund, discount, and enrollment. Please reach us before the purchase.</p>
                <strong class="desc">Please contact our support team at <a href="tel:+18332126742">+1-833-212-6742</a> for assistance with technical troubleshooting or any other issues or concerns you may have.</strong>
            </div>
        </div>
    </section>
@endsection
