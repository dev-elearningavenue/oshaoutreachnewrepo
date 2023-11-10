@extends('layouts.master')

@section('title', 'Free Sign Up | OSHA Outreach Courses')
@section('title', isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Free Sign Up | ' . config('app.name'))

@section('styles')
   @if (isset($page['seo_tags']))
       @foreach ($page['seo_tags'] as $meta_name => $meta_content)
           @if ($meta_name != 'title')
               <meta name="{{ $meta_name }}" content="{{ $meta_content }}" />
           @endif
       @endforeach
   @endif
   <meta property="og:title" content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Free Sign Up' }}">
   <meta property="twitter:title" content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Free Sign Up' }}">
     <meta property="og:description"
           content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'Free Sign Up' }}">
   <meta property="og:description"
       content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'Free Sign Up' }}">
   <meta property="twitter:description"
       content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'Free Sign Up' }}">
   <meta property="og:image" content="{{ url('/images/Free-Signup-OG.jpg') }}">
   <meta property="twitter:image" content="{{ url('/images/Free-Signup-OG.jpg') }}">
    {{-- Meta Tags for Social Media --}}
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
    @include('partials._free_signup_form')
    {{-- end free sign up form --}}

    {{-- clients --}}
    @include('partials._our_clients_new')
    {{-- clients --}}

    {{-- start why us --}}
    @include('partials._whyus_new_design')
    {{-- @include('partials._comparison_features') --}}
    {{-- end why us --}}

    {{-- start reviews --}}
    @include('partials._reviews_sa', ['backgroundWhite' => true, 'reviewsId' => true])
    {{-- end reviews --}}

    {{-- start journey section --}}
    @include('partials._start_your_journey', ['btnLink' => "#scroll_to_top"])
    {{-- end journey section --}}

      {{-- start mailing list section --}}
      {{-- @include('partials._download_free_study_form') --}}
      {{-- end mailing list section --}}

    {{-- start mailing list section --}}
    @include('partials._join_mailing_list_footer')
    {{-- end mailing list section --}}

@endsection
