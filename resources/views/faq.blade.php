@extends('layouts.master')

@section('title', isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'FAQ | '.config('app.name') )

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
          content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'FAQ' }}">
    <meta property="twitter:title"
          content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'FAQ' }}">
    <meta property="og:description"
          content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'FAQ' }}">
    <meta property="twitter:description"
          content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'FAQ' }}">
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
            "name": "{{ isset($page['h1_heading']) ? $page['h1_heading'] : 'FAQ' }}"
        }
    }

    </script>
@endsection

@section('content')
    <section class="--inner-banner">
        <div class="inner-content inner-banner"
             style="background-image: url('{{ asset('images/banner/about-banner.jpg') }}');background-position:center 10%;">
            <div class="container">
                <h1 class="title fc-white ta-center">{{ isset($page['h1_heading']) ? $page['h1_heading'] : 'FAQ' }}</h1>
            </div>
        </div>
    </section>

    {{--why to enroll video section here--}}
    @include('partials._why_to_enroll_video_section', ['classes' => 'mt-2', 'slug' => 'jose-osha-10'])

    @include('partials._faqs')

    @include('partials._our_clients')

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
