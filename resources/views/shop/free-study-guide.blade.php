@extends('layouts.master')

@section('title', 'Free Study Guide | OSHA Outreach Courses')
{{--@section('title', isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Home | ' . config('app.name'))--}}

@section('styles')
    @if (isset($page['seo_tags']))
        @foreach ($page['seo_tags'] as $meta_name => $meta_content)
            @if ($meta_name != 'title')
                <meta name="{{ $meta_name }}" content="{{ $meta_content }}" />
            @endif
        @endforeach
    @endif
    <meta property="og:title" content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Free Study Guide | OSHA Outreach Courses' }}">
    <meta property="twitter:title" content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Free Study Guide | OSHA Outreach Courses' }}">
        <meta property="og:description"
              content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'Free Study Guide | OSHA Outreach Courses' }}">
    <meta property="og:description"
        content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'Free Study Guide | OSHA Outreach Courses' }}">
    <meta property="twitter:description"
        content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'Free Study Guide | OSHA Outreach Courses' }}">
    <meta property="og:image"
        content="{{ url('/images/Free-Study-Guide-OG.jpg') }}">
    <meta property="twitter:image"
        content="{{ url('/images/Free-Study-Guide-OG.jpg') }}">
    <!-- Meta Tags for Social Media -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="OSHA Outreach Courses">
    <meta property="fb:app_id" content="817832821974771" />
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:site" content="@OshaOutreach">
@endsection

@section('content')
    {{-- start free sign up form --}}
    @include('partials._free_study_guide_form')
    {{-- end free sign up form --}}

    {{-- clients --}}
    {{-- @include('partials._our_clients_new') --}}
    @include('partials._study_guide_get_a_head')
    {{-- clients --}}

    {{-- start why us --}}
    {{-- @include('partials._whyus_new_design') --}}
    @include('partials._whyus_new_study_guide')
    {{-- @include('partials._comparison_features') --}}
    {{-- end why us --}}

    {{-- start reviews --}}
    @include('partials._reviews_sa', ['backgroundWhite' => true, 'reviewsId' => true])
    {{-- end reviews --}}

    {{-- start journey section --}}
    {{-- @include('partials._start_your_journey', ['btnLink' => "#scroll_to_top"]) --}}
    @include('partials._study_guide_journey', ['btnLink' => "#scroll_to_top"])
    {{-- end journey section --}}

@endsection
