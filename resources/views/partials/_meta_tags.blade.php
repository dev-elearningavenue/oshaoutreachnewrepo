@php
    $img_alt = $course_content['title'];
    $sa_review = json_decode($course->sa_review);

    $title = $course_content['title'];
    $description = $course_content['description'];

    $coursePrice = $course_content['discounted_price'] > 0 ? $course_content['discounted_price'] : $course_content['price'];
@endphp
@if(Route::currentRouteName() == 'course.single')
    @php
        $img_src = 'https://oshaoutreachcourses.puresafety.com/Training/Image/thumbnail/'.$course_content['training_id']
    @endphp
@else
    @php
        $img_src = $course_content['image']
    @endphp
@endif
@if($course->id >= 2252 && $course->id <= 2309) @php $img_src=asset('/images/course_placeholder.jpg') @endphp @else @php
    $img_src='https://oshaoutreachcourses.puresafety.com/Training/Image/thumbnail/' .$course_content['training_id']
@endphp @endif {{--Condition for og:image osha10 and osha30 --}}

{{--@if($course->id == 1 && Route::currentRouteName()--}}
{{--    == 'course.'.$course->slug)--}}
{{--    @php--}}
{{--        $img_src = asset('/images/OG-10-Hour-Construction.png')--}}
{{--    @endphp--}}
{{--@elseif($course->id == 2 && Route::currentRouteName() == 'course.'.$course->slug)--}}
{{--    @php--}}
{{--        $img_src = asset('/images/OG-30-Hour-Construction.png')--}}
{{--    @endphp--}}
{{--@endif--}}

@if($course->lms === LMS_TYPE_OSHA_OUTREACH)
    @php
        $img_src = asset('/images/promotions/'. env('PROMOTION_NAME') . '/course_og/' . $course->slug . '.jpg')
    @endphp
@endif

{{--Condition for og:image osha10 and osha30 --}}
@foreach($course->seoTags as $seo_tag)
    @if($seo_tag->meta_name == 'img_alt')
        @php
            $img_alt = $seo_tag->meta_content
        @endphp
    @elseif($seo_tag->meta_name == 'title')
        @php
            $title = $seo_tag->meta_content
        @endphp
    @elseif($seo_tag->meta_name == 'description')
        @php
            $description = $seo_tag->meta_content
        @endphp
    @elseif($seo_tag->meta_name == 'keywords')
        @php
            $keywords = $seo_tag->meta_content;
            $keywordsArr = array_map('trim', explode(',', $keywords));
        @endphp
    @endif

    @if($seo_tag->meta_name != 'img_alt')
        <meta name="{{ $seo_tag->meta_name }}" content="{{ $seo_tag->meta_content }}"/>
    @endif
@endforeach
<meta property="og:title" content="{!! $title !!}">
<meta property="twitter:title" content="{!! $title !!}">
{{--<meta name="description" content="{{ strip_tags($description) }}"/>--}}
<meta property="og:description" content="{{ strip_tags($description) }}">
<meta property="twitter:description" content="{{ strip_tags($description) }}">
<meta property="og:image" content="{{ $img_src }}">
<meta property="twitter:image" content="{{ $img_src }}">
<!-- Meta Tags for Social Media -->
<meta property="og:url" content="{{ url()->full() }}">
<meta property="og:type" content="website"/>
<meta property="og:site_name" content="OSHA Outreach Courses">
<meta property="fb:app_id" content="817832821974771"/>
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ url()->full() }}">
<meta property="twitter:site" content="@OshaOutreach">
{{--@if( !(isset(request()->outputType) && request()->outputType == 'amp') )--}}
{{--<link rel="amphtml" href="{{ url()->full() }}?outputType=amp">--}}
{{--@endif--}}
    @if((isset(request()->outputType) && request()->outputType == 'amp'))
    <script type="application/ld+json">
            {
            "@context": "https://schema.org",
            "@graph": [{
                    "@type": "Organization",
                    "additionalType": "EducationalOrganization",
                    "@id": "{{ url('/') }}#organization",
                    "name": "OSHA Outreach Courses",
                    "description": "OSHA Outreach Courses is an online training platform for OSHA courses. It provides OSHA-approved 10 & 30-hour online training for construction & general industry in multiple languages. Get an Official DOL Card Now.",
                    "url": "{{ url('/') }}",
                    "Brand": {
                        "@type": "Brand",
                        "name": "{{ env('BRAND_NAME', 'OSHA Outreach Courses') }}",
                        "url": "{{ url('/') }}"
                    },
                    "logo": "{{ url('/images/osha-outreach-courses.png') }}",
                    "contactPoint": {
                        "@type": "ContactPoint",
                        "telephone": "+1 (833) 212-6742",
                        "email": "help@oshaoutreachcourses.com",
                        "url": "{{ url('/') }}",
                        "availableLanguage": "English",
                        "contactType": "customer service",
                        "contactOption": "TollFree"
                    },
                    "sameAs": [
                        "https://www.linkedin.com/company/osha-outreach-courses/",
                        "https://www.facebook.com/OSHAOutreachCourses/",
                        "https://twitter.com/oshaoutreach",
                        "https://www.pinterest.com/oshaoutreachcourses/",
                        "https://www.instagram.com/oshaoutreach/"

                    ],
                    "aggregateRating": {
                        "@type": "AggregateRating",
                        "ratingValue": "{{ $GLOB_SA_RATING['ratingValue'] }}",
                        "reviewCount": "{{ $GLOB_SA_RATING['reviewCount'] }}"
                    },
                    "address": {
                        "@type": "PostalAddress",
                        "streetAddress": "17350 TX-249 Ste 220 19204",
                        "addressLocality": "Houston, TX",
                        "addressRegion": "TX",
                        "postalCode": "77064",
                        "addressCountry": "USA"
                    }

                },
                {
                    "@type": "WebSite",
                    "url": "{{ url('/') }}",
                    "potentialAction": {
                        "@type": "SearchAction",
                        "query": "{{ url('/') }}/courses?keyword={course_name}&language=all",
                        "query-input": "required name=course_name",
                        "target": {
                            "@type": "EntryPoint",
                            "urlTemplate": "{{ url('/') }}/courses?keyword={course_name}&language=all",
                            "inLanguage": "en-US"
                        }
                    }
                },
                {
                    "@type": "Course",
                    "name": "{{ $course_content['title'] }}",
                    "description": "{{ strip_tags($description) }}",
                    "provider": {
                        "@type": "Organization",
                        "name": "OSHA Outreach Courses",
                        "logo": {
                            "url": "{{ url('/images/osha-outreach-courses.png') }}",
                            "width": 310,
                            "height": 60,
                            "@type": "ImageObject"
                        },
                        "sameAs": "{{ url('/') }}"
                    }
                },
                @if($course->lms == LMS_TYPE_OSHA_OUTREACH)
                {
                    "@context": "https://schema.org/",
                    "@type": "BreadcrumbList",
                    "itemListElement": [{
                    "@type": "ListItem",
                    "position": 1,
                    "name": "{{ in_array($course->duration, [40 , 30]) ? "OSHA 30-HOUR Training" : "OSHA 10-HOUR Training" }}",
                    "item": "{{ $course->duration == 30 ? url('osha-30-hour-online') : url('osha-10-hour-online') }}"
                    },{
                    "@type": "ListItem",
                    "position": 2,
                    "name": "{{ $course_content['title'] }}",
                    "item": "{{ url($course_content['slug']) }}"
                    }]
                },
                @else
                {
                    "@type": "BreadcrumbList",
                    "name": "Breadcrumb",
                    "itemListElement": {
                        "@type": "ListItem",
                        "position": 1,
                        "name": "{{ $course_content['title'] }}",
                        "item": "{{ url($course_content['slug']) }}"
                    }
                },
                @endif
                {
                    "@type": "Product",
                    "name": "{!! $title !!}",
                    "description": "{{ strip_tags($description) }}",
                    "image": ["{{ $img_src }}"],
                    "sku": "SKU-{{ str_pad($course->id, 4, '0', STR_PAD_LEFT) }}",
                    "mpn": "MPN-{{ str_pad($course->id, 4, '0', STR_PAD_LEFT) }}",
                    "brand": {
                        "@type": "Brand",
                        "name": "{{ env('BRAND_NAME', 'OSHA Outreach Courses') }}"
                    },
                    @if($sa_review)
                    "review": {
                        "@type": "Review",
                        "reviewRating": {
                            "@type": "Rating",
                            "ratingValue": "{{ number_format($sa_review->rating, 1) }}"
                        },
                        "name": "{{ $course_content['title'] }}",
                        "author": {
                            "@type": "Person",
                            "name": "{{ $sa_review->display_name }}"
                        },
                        "datePublished": "{{ date('Y-m-d', strtotime($sa_review->date)) }}",
                        "reviewBody": "{{ $sa_review->comments }}",
                        "publisher": {
                            "@type": "Organization",
                            "name": "{{ env('BRAND_NAME', 'OSHA Outreach Courses') }}"
                        }
                    },
                    @endif
                    "aggregateRating": {
                        "@type": "AggregateRating",
                        "ratingValue": "{{ $GLOB_SA_RATING['ratingValue'] }}",
                        "reviewCount": "{{ $GLOB_SA_RATING['reviewCount'] }}"
                    },
                    "offers": {
                        "@type": "Offer",
                        "url": "{{ url()->full() }}",
                        "priceCurrency": "USD",
                        "price": "{{ $coursePrice }}",
                        "priceValidUntil": "{{ date('Y-12-31') }}",
                        "availability": "https://schema.org/InStock"
                    }
                }
            ]
        }
    </script>
    @else
        @push('structured-data')
            ,
            {
                "@type": "Course",
                "name": "{{ $course_content['title'] }}",
                "description": "{{ strip_tags($description) }}",
                "provider": {
                    "@type": "Organization",
                    "name": "OSHA Outreach Courses",
                    "logo": {
                        "url": "{{ url('/images/osha-outreach-courses.png') }}",
                        "width": 310,
                        "height": 60,
                        "@type": "ImageObject"
                    },
                    "sameAs": "{{ url('/') }}"
                }
                @if(isset($keywordsArr))
                ,"keywords": @json($keywordsArr)
                @endif
            },
            @if($course->lms == LMS_TYPE_OSHA_OUTREACH)
            {
                "@context": "https://schema.org/",
                "@type": "BreadcrumbList",
                "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "name": "{{ in_array($course->duration, [40 , 30]) ? "OSHA 30-HOUR Training" : "OSHA 10-HOUR Training" }}",
                "item": "{{ $course->duration == 30 ? url('osha-30-hour-online') : url('osha-10-hour-online') }}"
                },{
                "@type": "ListItem",
                "position": 2,
                "name": "{{ $course_content['title'] }}",
                "item": "{{ url($course_content['slug']) }}"
                }]
            },
            @else
            {
                "@type": "BreadcrumbList",
                "name": "Breadcrumb",
                "itemListElement": {
                    "@type": "ListItem",
                    "position": 1,
                    "name": "{{ $course_content['title'] }}",
                    "item": "{{ url($course_content['slug']) }}"
                }
            },
            @endif
            {
                "@type": "Product",
                "name": "{!! $title !!}",
                "description": "{{ strip_tags($description) }}",
                "image": ["{{ $img_src }}"],
                "sku": "SKU-{{ str_pad($course->id, 4, '0', STR_PAD_LEFT) }}",
                "mpn": "MPN-{{ str_pad($course->id, 4, '0', STR_PAD_LEFT) }}",
                "brand": {
                    "@type": "Brand",
                    "name": "{{ env('BRAND_NAME', 'OSHA Outreach Courses') }}"
                },
                @if($sa_review)
                "review": {
                    "@type": "Review",
                    "reviewRating": {
                        "@type": "Rating",
                        "ratingValue": "{{ number_format($sa_review->rating, 1) }}"
                    },
                    "name": "{{ $course_content['title'] }}",
                    "author": {
                        "@type": "Person",
                        "name": "{{ $sa_review->display_name }}"
                    },
                    "datePublished": "{{ date('Y-m-d', strtotime($sa_review->date)) }}",
                    "reviewBody": "{{ $sa_review->comments }}",
                    "publisher": {
                        "@type": "Organization",
                        "name": "{{ env('BRAND_NAME', 'OSHA Outreach Courses') }}"
                    }
                },
                @endif
                "aggregateRating": {
                    "@type": "AggregateRating",
                    "ratingValue": "{{ $GLOB_SA_RATING['ratingValue'] }}",
                        "reviewCount": "{{ $GLOB_SA_RATING['reviewCount'] }}"
                },
                "offers": {
                    "@type": "Offer",
                    "url": "{{ url()->full() }}",
                    "priceCurrency": "USD",
                    "price": "{{ $coursePrice }}",
                    "priceValidUntil": "{{ date('Y-12-31') }}",
                    "availability": "https://schema.org/InStock"
                }
                @if(isset($keywordsArr))
                    ,"keywords": @json($keywordsArr)
                @endif
            }

        @endpush
    @endif
