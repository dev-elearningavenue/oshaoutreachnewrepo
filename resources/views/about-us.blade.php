@extends('layouts.master')

@section('title', isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'About Us | '.config('app.name') )

@section('styles')
    <style>
        div#whyus-about {
            padding-top: 50px;
            margin-top: -50px;
        }
    </style>
    @if(isset($page['seo_tags']))
        @foreach($page['seo_tags'] as $meta_name => $meta_content)
            @if($meta_name != 'title')
                <meta name="{{ $meta_name }}" content="{{ $meta_content }}"/>
            @endif
        @endforeach
    @endif
    <meta property="og:title"
          content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Reviews' }}">
    <meta property="twitter:title"
          content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Reviews' }}">
    <meta property="og:description"
          content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'About Us' }}">
    <meta property="twitter:description"
          content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'About Us' }}">
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
            "name": "{{ isset($page['h1_heading']) ? $page['h1_heading'] : 'About Us' }}"
        }
    }

    </script>
@endsection

@section('content')
    <section class="--inner-banner">
        <div class="inner-content inner-banner"
             style="background-image: url('{{ asset('images/banner/about-banner.jpg') }}');background-position:center 10%;">
            <div class="container">
                <h1 class="title fc-white ta-center">{{ isset($page['h1_heading']) ? $page['h1_heading'] : 'About Us' }}</h1>
            </div>
        </div>
    </section>

    {{--why to enroll video section here--}}
    @include('partials._why_to_enroll_video_section', ['classes' => 'mt-4', 'slug' => 'dowell-osha-30'])

    <section class="home-intro sec-padding">
        <div class="container">
            <div class="box --course-objectives">
                <p class="desc fw-bold">OSHA Outreach Courses is a leading eLearning platform for OSHA compliance
                    training and certifications. Our 1200+ courses are designed by authoritative safety experts and are
                    fully OSHA-approved. Our strategic affiliation with HSI is a great initiative to promote
                    Occupational safety and health. Our diverse distance learning library contains hands-on Occupational
                    safety courses which provide companies with optimum safety and efficiency. Experience our flexible
                    Learning Management System (LMS) at the price you simply can't beat!</p>
                <p class="desc">At OSHA Outreach Courses, we provide virtual learning for the convenience of our working
                    professional clients. Our online courses are self-paced, easily accessible from anywhere, effective,
                    and at the lowest price! We foster a culture of continuous quality improvement and provide
                    remarkable 24/7 customer support services. Our cost-effective courses are designed for both general
                    and construction industries.</p>

                <div class="row">
                    <div class="col-md-6">
                        <h2 style="color:#1d81c2">Our Vision</h2>
                        <p class="desc">
                            Occupational safety and health are our foremost priorities. We aim to help and eliminate
                            fatal injuries, non-fatal injuries, and OSHA violation penalties in both general and
                            construction industries.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h2 style="color:#1d81c2">Our Mission</h2>
                        <p class="desc">
                            Our sole mission is to introduce and promote safety culture in all industries at a very
                            affordable price. Providing an easily assessable and effective solution to our clients.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sec-padding" style="background-color: #ffb900;">
        <div class="container">
            <div class="row ta-center">
                <div class="col-md-6">
                    <h2 style="font-size: 3rem;">1200+</h2>
                    <p style="font-size: 1.5rem;">Courses Available on Safety Training</p>
                </div>
                <div class="col-md-6">
                    <h2 style="font-size: 3rem;">25,000+</h2>
                    <p style="font-size: 1.5rem;">Training has been completed</p>
                </div>
            </div>
        </div>
    </section>

    {{-- <div id="whyus-about">
        @include('partials._banner_strip_new')
    </div> --}}
    @include('partials._comparison_features')

    @include('partials._our_clients',['classes' => 'bg-secondary'])

    {{--why to enroll video section here--}}
    @stack('modal_content')

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.usp-col').matchHeight();
        });
    </script>
@endsection
