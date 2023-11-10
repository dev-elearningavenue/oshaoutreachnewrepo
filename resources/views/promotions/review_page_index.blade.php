@extends('layouts.master')

@section('title', $page['seo_tags']['title'] ?? "OSHA Outreach Courses" )

@section('styles')
@if(isset($page['seo_tags']))
@foreach($page['seo_tags'] as $meta_name => $meta_content)
@if($meta_name != 'title')
<meta name="{{ $meta_name }}" content="{{ $meta_content }}" />
@endif
@endforeach
@endif
<meta property="og:title" content="{{ env('PROMOTION_PAGE_TITLE') }}">
<meta property="twitter:title" content="{{ env('PROMOTION_TEXT') }}">
<meta property="og:description"
    content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : env('PROMOTION_TEXT') }}">
<meta property="twitter:description"
    content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : env('PROMOTION_TEXT') }}">
<meta property="og:image" content="{{ url('/images/promotions/'. env('PROMOTION_NAME') .'/og-image-promotions.jpg') }}">
<meta property="twitter:image"
    content="{{ url('/images/promotions/'. env('PROMOTION_NAME') .'/og-image-promotions.jpg')  }}">
<!-- Meta Tags for Social Media -->
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="website" />
<meta property="og:site_name" content="OSHA Outreach Courses">
<meta property="fb:app_id" content="817832821974771" />
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
        "name": "{{ isset($page['h1_heading']) ? $page['h1_heading'] : env('PROMOTION_TEXT') }}"
    }
}
</script>

<style>
    section.reviewSect {
        padding: 40px 0;
    }

    section.reviewSect .reviewSectHead {
        margin-bottom: 30px;
        padding-bottom: 30px;
        border-bottom: 1px solid #ddd;
    }

    section.reviewSect .reviewSectHead p {
        font-size: 24px;
        font-weight: 600;
        text-align: center;
        line-height: 1.2;
        max-width: 75%;
        margin:0 auto 30px;
        color:#1d81c2;
        /*letter-spacing: 5px;*/
        text-transform: capitalize;
    }
    /* Section State Guides styling */
</style>
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
    <section class="reviewSect">
        <div class="container">
            <div class="reviewSectHead">
                <p class="desc ta-center">
                    Our valuable customers have spoken and given us 5-star reviews - experience the job safety difference today!
                </p>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap;">
                    @foreach($videoReviews as $videoReview)
                        <div class="col-md-3 col-sm-4 mb-4">
                            <div>
                                <h5>
                                    <a target="_blank" href="/video-reviews/{{$videoReview->slug}}">{{ $videoReview->name }}</a>
                                </h5>
                                <p>{{  $videoReview->title }}</p>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </section>
@endsection
