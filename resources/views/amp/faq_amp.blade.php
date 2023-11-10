@extends('layouts.amp')

@section('title', isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'FAQ | '.config('app.name') )

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

@include('amp.partials._general_amp_schema', ['fallbackName' => 'FAQ', 'breadCrumbList' => true])

@section('content')
    <section class="--inner-banner">
        <div class="inner-content inner-banner" style="background-image: url('{{ asset('images/banner/about-banner.jpg') }}');background-position:20% 10%;">
            <div class="container">
                <h1 class="title fc-white ta-center" >{{ isset($page['h1_heading']) ? $page['h1_heading'] : 'FAQ' }}</h1>
            </div>
        </div>
    </section>

    @include('amp.partials._faqs_amp')

    @include('amp.partials._our_clients_amp')
@endsection
