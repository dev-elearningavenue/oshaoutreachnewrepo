@push('structure-data')
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
        }
        @if(isset($breadCrumbList) && $breadCrumbList == true),
        {
            "@type": "BreadcrumbList",
            "name": "Breadcrumb",
            "itemListElement": {
                "@type": "ListItem",
                "position": 1,
                "name": "{{ isset($page['h1_heading']) ? $page['h1_heading'] : $fallbackName }}"
            }
        }
        @endif
        ]
    }
</script>
@endpush
