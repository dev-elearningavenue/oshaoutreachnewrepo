@extends('layouts.master')

@section('content')
    <section class="hero-banner --inner-banner" style="background: url({{ asset('images/contact-banner.jpg') }})">
        <div class="inner-content">
            <div class="container">
                <h3 class="title">Error {{ $error_code }}</h3>
            </div>
        </div>
    </section>

    <section class="sec-padding fix-screen">
        <div class="container">
            <div class="ta-center">
                <h4 class="title ta-center mbpx-20">{{ $error_title }}</h4>
                <p class=" ta-center">{{ $error_description }}.
                    @if(str_replace(url('/'), '', url()->current()) != '/courses')
                    We will try to automatically redirect you to our home page in 5 seconds.<br>
                    @endif
                    Please go to the {{ config('app.name', 'Laravel') }} home page by clicking the button below.</p><br>
                <p class=" ta-center"><a href="{{ route('home') }}" class="btn --btn-primary">Home Page</a></p>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    @if(str_replace(url('/'), '', url()->current()) != '/courses')
    <script>
        var timer = setTimeout(function() {
            window.location = '{{ route('home') }}';
        }, 5000);
    </script>
    @endif
@endsection