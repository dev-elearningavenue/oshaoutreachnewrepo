@extends('layouts.amp')

@section('title', isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'About Us | '.config('app.name') )

@section('preload')
    <link rel="preload" href="{{ asset('images/banner/about-banner.jpg') }}" as="image">
@endsection

@push('component-script')
    <script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.2.js"></script>
@endpush

@push('custom-css')
    .clients-logo {
    width: 200px;
    height: 100px;
    margin: 0 auto;
    }

    .client-logo-1 {
    background: url('/images/clients_sprites.webp') -0 -0;
    }

    .client-logo-2 {
    background: url('/images/clients_sprites.webp') -0 -100px;
    }

    .client-logo-3 {
    background: url('/images/clients_sprites.webp') -200px -0;
    }

    .client-logo-4 {
    background: url('/images/clients_sprites.webp') -200px -100px;
    }

    .client-logo-5 {
    background: url('/images/clients_sprites.webp') -0 -200px;
    }

    .client-logo-6 {
    background: url('/images/clients_sprites.webp') -200px -200px;
    }

    .client-logo-7 {
    background: url('/images/clients_sprites.webp') -400px -100px;
    }

    .client-logo-8 {
    background: url('/images/clients_sprites.webp') -400px -0;
    }

    .client-logo-9 {
    background: url('/images/clients_sprites.webp') -0 -300px;
    }

    .client-logo-10 {
    background: url('/images/clients_sprites.webp') -400px -300px;
    }

    .client-logo-11 {
    background: url('/images/clients_sprites.webp') -400px -200px;
    }

    .client-logo-12 {
    background: url('/images/clients_sprites.webp') -200px -300px;
    }

    .inner-banner {
    background-size: cover;
    background-position: center;
    height: 150px;
    display: flex;
    justify-content: center;
    position: relative;
    align-items: center;
    z-index: 1
    }

    .inner-banner:before {
    position: absolute;
    content: '';
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    background: rgba(0,0,0,0.5);
    z-index: -1
    }

    .inner-banner h1 {
    background: none;
    padding: 0;
    }
@endpush

@include('amp.partials._general_amp_schema', ['fallbackName' => 'About Us', 'breadCrumbList' => true])

@section('content')

    <section class="--inner-banner">
        <div class="inner-content inner-banner" style="background-image: url('{{ asset('images/banner/about-banner.jpg') }}');background-position:20% 10%;">
            <div class="container">
                <h1 class="title fc-white ta-center" >{{ isset($page['h1_heading']) ? $page['h1_heading'] : 'About Us' }}</h1>
            </div>
        </div>
    </section>

    @include('amp.partials._why_to_enroll_video_section')

    <section class="home-intro sec-padding">
        <div class="container">
            <div class="box --course-objectives">
                <p class="desc fw-bold">OSHA Outreach Courses is a leading eLearning platform for OSHA compliance training and certifications. Our 1200+ courses are designed by authoritative safety experts and are fully OSHA-approved. Our strategic affiliation with HSI is a great initiative to promote Occupational safety and health. Our diverse distance learning library contins hads-on Occupational safety courses which provide companies with optimum safety and efficiency. Experience our flexible Learning Management System (LMS) at the price you simply can't beat!</p>
                <p class="desc">At OSHA Outreach Courses, we provide virtual learning for the convenience of our working professional clients. Our online courses are self-paced, easily accessible from anywhere, effective, and at the lowest price! We foster a culture of continuous quality improvement and provide remarkable 24/7 customer support services. Our cost-effective courses are designed for both general and construction industries.</p>

                <div class="row">
                    <div class="col-md-6">
                        <h2 style="color:#1d81c2">Our Vision</h2>
                        <p class="desc">
                            Occupational safety and health are our foremost priorities. We aim to help and eliminate fatal injuries, non-fatal injuries, and OSHA violation penalties in both general and construction industries.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h2 style="color:#1d81c2">Our Mission</h2>
                        <p class="desc">
                            Our sole mission is to introduce and promote safety culture in all industries at a very affordable price. Providing an easily assessable and effective solution to our clients.
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

    <div id="whyus-about">
        @include('amp.partials._banner_strip_amp')
    </div>

    @include('amp.partials._our_clients_amp')
@endsection
