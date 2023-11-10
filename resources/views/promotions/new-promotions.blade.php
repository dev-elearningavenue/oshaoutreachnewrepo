@extends('layouts.promotional_sale')

@section('title', env('PROMOTION_PAGE_TITLE') . ' | ' . config('app.name') )

@section('styles')
    @if(isset($page['seo_tags']))
        @foreach($page['seo_tags'] as $meta_name => $meta_content)
            @if($meta_name != 'title')
                <meta name="{{ $meta_name }}" content="{{ $meta_content }}"/>
            @endif
        @endforeach
    @endif
    <meta property="og:title"
          content="{{ env('PROMOTION_PAGE_TITLE') }}">
    <meta property="twitter:title"
          content="{{ env('PROMOTION_PAGE_TITLE') }}">
    <meta property="og:description"
          content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : env('PROMOTION_TEXT') }}">
    <meta property="twitter:description"
          content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : env('PROMOTION_TEXT') }}">
    <meta property="og:image" content="{{ url('/images/promotions/'.env('PROMOTION_NAME').'/og-image.jpg') }}">
    <meta property="twitter:image" content="{{ url('/images/promotions/'.env('PROMOTION_NAME').'/og-image.jpg') }}">
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
            "name": "{{ isset($page['h1_heading']) ? $page['h1_heading'] : env('PROMOTION_TEXT') }}"
        }
    }



    </script>
    @php
        $courses_list = [
            [
                'name' => 'OSHA 30-Hour Construction',
                'description' => 'Enroll In OSHA 30-Hour Construction Training Online At Discounted Price. Authorized, OSHA Accepted Training Courses.',
                'id' => '2',
                'price' => 99,
                'img' => 'images/promotions/product-thumbnails/osha_30_hours_construction.jpg'
            ],
            [
                'name' => 'New York OSHA 30-Hour Construction',
                'description' => 'Enroll In New York OSHA 30-Hour Construction Training Online At Discounted Price. Authorized, OSHA Accepted Training Courses.',
                'id' => '6',
                'price' => 99,
                'img' => 'images/promotions/product-thumbnails/new_york_osha_30_hours_construction.jpg'
            ],
            [
                'name' => 'OSHA 10-Hour Construction',
                'description' => 'Enroll In OSHA 10-Hour Construction Training Online At Discounted Price. Authorized, OSHA Accepted Training Courses.',
                'id' => '1',
                'price' => 49,
                'img' => 'images/promotions/product-thumbnails/osha_10_hours_construction.jpg'
            ],
            [
                'name' => 'New York OSHA 10-Hour Construction',
                'description' => 'Enroll In New York OSHA 10-Hour Construction Training Online At Discounted Price. Authorized, OSHA Accepted Training Courses.',
                'id' => '5',
                'price' => 49,
                'img' => 'images/promotions/product-thumbnails/new_york_osha_10_hours_construction.jpg'
            ],
            [
                'name' => 'OSHA 10-Hour General Industry',
                'description' => 'Enroll In OSHA 10-Hour General Industry Training Online At Discounted Price. Authorized, OSHA Accepted Training Courses.',
                'id' => '3',
                'price' => 49,
                'img' => 'images/promotions/product-thumbnails/osha_10_hours_general_industry.jpg'
            ],
            [
                'name' => 'New York OSHA 10-Hour General',
                'description' => 'Enroll In New York OSHA 10-Hour General Training Online At Discounted Price. Authorized, OSHA Accepted Training Courses.',
                'id' => '8',
                'price' => 49,
                'img' => 'images/promotions/product-thumbnails/new_york_osha_10_hours_general.jpg'
            ]
        ];
    @endphp
    @foreach($courses_list as $course)
        <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Course",
        "name": "{{ $course['name'] }}",
        "description": "{{ $course['description'] }}",
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
    }



        </script>
        <script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "Product",
        "name": "{{ $course['name'] }}",
        "description": "{{ $course['description'] }}",
        "image": ["{{ asset($course['img']) }}"],
        "sku": "SKU-{{ str_pad($course['id'], 4, '0', STR_PAD_LEFT) }}",
        "offers": {
            "@type": "Offer",
            "url": "{{ url()->full() }}",
            "priceCurrency": "USD",
            "price": "{{ $course['price'] }}",
            "priceValidUntil": "2021-04-30",
            "availability": "https://schema.org/InStock"
        }
    }



        </script>
    @endforeach
    <style>
        #sale-banner {
            width: 100%;
            display: block;
        }

        #sale-banner img {
            width: 100%;
        }

        #sale-banner-mobile {
            display: none;
        }

        .why-us img {
            display: inline-block;
        }

        .why-us > p.desc {
            font-size: 1.1rem;
        }

        .why-us .item {
            padding: 0 50px;
        }

        .why-us .item p {
            font-weight: bold;
        }

        .course {
            border: 1px solid #e9e9e9;
            margin-top: 30px;
        }

        .course h3 {
            font-size: 2rem;
            line-height: 1.2;
        }

        .course .discounted_price {
            font-size: 3rem;
            font-family: 'POPPINS';
        }

        .course .cutout {
            font-size: 1.5rem;
            font-family: 'POPPINS';
            text-decoration: line-through;
        }

        .course p.desc {
            line-height: 1.4;
        }

        .course .image-div {
            padding: 0;
        }

        .course .desc-div {
            padding: 10px 25px 0;
        }

        .course .btn.\--btn-small.enroll-now-btn {
            background-color: #ffb900;
            margin-bottom: 10px;
            position: absolute;
            bottom: 10px;
            left: 25px;
            font-weight: bold;
            padding: 8px 35px;
        }

        .course .btn.\--btn-small.course-outline-btn {
            color: #FFFFFF;
            background-color: #005384;
            margin-bottom: 10px;
            position: absolute;
            bottom: 10px;
            left: 200px;
            font-weight: bold;
        }

        .group-discount .col-md-3 {
            text-align: right;
        }

        .group-discount .find-more-btn {
            background-color: #ffb900;
        }

        .group-discount .find-more-btn:hover,
        .course .btn.\--btn-small.enroll-now-btn:hover {
            color: #FFFFFF;
            opacity: 1;
        }

        .course .btn.\--btn-small.course-outline-btn:hover {
            color: #000000;
            opacity: 1;
        }

        .course-outline-popup {
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            left: 0;
            top: 0;
            right: 0;
            margin: 0 auto;
            height: 100%;
            width: 100%;
            background: rgba(0, 0, 0, 0.9);
            z-index: 1000;
            /*overflow-y: scroll;*/
        }

        .course-outline-popup div.popup-inner-div {
            margin: 0 auto;
            position: absolute;
            left: 0;
            right: 0;
            top: 5%;
            background: #ffff;
            width: 90%;
            text-align: center;
            max-width: 800px;
            bottom: 5%;
            height: 90%;
            overflow: hidden;
            overflow-y: auto;
            padding: 0 5px;
        }

        .course-outline-popup div.popup-inner-div div.row {
            /*padding: 10px 40px;*/
        }

        .course-outline-popup div.popup-inner-div div.col-md-6 {
            text-align: left;
            padding: 20px 15px 15px 0;
        }

        .course-outline-popup div.popup-inner-div .row div.col-md-6:nth-child(2n+0) {
            padding-left: 40px;
        }

        .course-outline-popup div.popup-inner-div .btn.\--btn-small.enroll-now-btn {
            position: relative;
            bottom: auto;
        }

        .course-outline-popup .close {
            position: fixed;
            right: 10px;
            top: 10px;
            color: #fff;
        }

        #countdown-timer {
            padding: 10px 25px;
            width: 300px;
            font-size: 2rem;
            font-weight: bold;
            color: #1f1e1e;
            line-height: 1;
            text-align: center;
            margin: 0 auto;
        }

        #countdown-timer h6 {
            color: #751c10;
        }

        .course-outline-popup div.popup-inner-div .btn.\--btn-small.enroll-now-btn {
            position: relative;
            bottom: auto;
            left: inherit;
            margin-left: 15px;
            margin-right: 15px;
        }

        @media (max-width: 991px) {
            .course .btn.\--btn-small.course-outline-btn,
            .course .btn.\--btn-small.enroll-now-btn {
                padding: 8px 10px;
                position: relative;
                bottom: auto;
                left: auto;
                display: inline-block;
                margin: 20px 10px 20px 0;
            }
        }

        @media (max-width: 767px) {
            .course .image-div {
                display: none;
            }

            .course .desc-div {
                text-align: center;
            }

            .group-discount, .group-discount .col-md-3 {
                text-align: center;
            }

            .course-outline-popup div.popup-inner-div div.col-md-6 {
                padding-left: 40px;
            }

            .course-outline-popup div.popup-inner-div div.col-md-6:nth-child(1) {
                padding-bottom: 0;
            }

            .course-outline-popup div.popup-inner-div div.col-md-6:nth-child(2) {
                padding-top: 0;
            }

            #countdown-timer {
                font-size: 1.5rem;
            }

            #countdown-timer h6 {
                font-size: 1rem;
            }
        }

        @media (max-width: 575px) {
            .row.course {
                margin: 20px 15px;
            }
        }

        @media (max-width: 425px) {
            #sale-banner {
                display: none;
            }

            #sale-banner-mobile {
                display: block;
            }
        }

        @media (max-width: 425px) {
            .course .btn.\--btn-small.enroll-now-btn {
                margin: 15px 0 5px;
            }

            .course .btn.\--btn-small.course-outline-btn {
                margin: 0 0 15px;
            }

            .course h3 {
                font-size: 1.5rem;
            }

            .course .discounted_price {
                font-size: 2.5rem;
            }

            .course .cutout {
                font-size: 1.2rem;
            }
        }

         body.modal-open {
            overflow: hidden;
            /*position: fixed;*/
        }

        {{-- For laguage modal --}}
        .lang {
            width: 30px;
            height: 20px;
            display: inline-block;
            margin: 0px 5px -5px;
            border: 1px solid #000;
        }

        .no-webp .lang.lang-en {
            background: url('{{ asset('images/flags_sprites.png') }}') -90px -0;
        }

        .no-webp .lang.lang-es {
            background: url('{{ asset('images/flags_sprites.png') }}') -120px -0;
        }

        .webp .lang.lang-en {
            background: url('{{ asset('images/flags_sprites.webp') }}') -90px -0;
        }

        .webp .lang.lang-es {
            background: url('{{ asset('images/flags_sprites.webp') }}') -120px -0;
        }
        {{-- For laguage modal --}}
    </style>
@endsection

@section('content')
    <a href="#courses">
        <picture class="img-resp" id="sale-banner">
            <source
                srcset="{{ asset('/images/promotions/'.env('PROMOTION_NAME').'/homepage-banner-desktop-1920x500.webp') }}"
                type="image/webp">
            <source
                srcset="{{ asset('/images/promotions/'.env('PROMOTION_NAME').'/homepage-banner-desktop-1920x500.jpg') }}"
                type="image/jpeg">
            <img src="{{ asset('/images/promotions/'.env('PROMOTION_NAME').'/homepage-banner-desktop-1920x500.jpg') }}"
                 alt="{{ env('PROMOTION_TEXT') }}" title="{{ env('PROMOTION_TEXT') }}">
        </picture>
        <picture class="img-resp" id="sale-banner-mobile">
            <source
                srcset="{{ asset('/images/promotions/'.env('PROMOTION_NAME').'/homepage-banner-mobile-425x250.webp') }}"
                type="image/webp">
            <source
                srcset="{{ asset('/images/promotions/'.env('PROMOTION_NAME').'/homepage-banner-mobile-425x250.jpg') }}"
                type="image/jpeg">
            <img src="{{ asset('/images/promotions/'.env('PROMOTION_NAME').'/homepage-banner-mobile-425x250.jpg') }}"
                 alt="{{ env('PROMOTION_TEXT') }}" title="{{ env('PROMOTION_TEXT') }}">
        </picture>
    </a>


    <section class="sec-padding" id="courses">
        <div class="container">
            <div class="page-heading">
                <h4 class="title mbpx-0">Get Discounted OSHA Training</h4>
                <p class="subtitle"></p>
            </div>

            <!-- OSHA 30-Hour Construction -->
            <div class="row course">
                <div class="col-md-6 desc-div">
                    <h3>OSHA 30-Hour Construction</h3>
                    <div class="pricing"><strong class="fc-red discounted_price">$99</strong><span
                            class="fc-grey cutout">$189</span></div>
                    <p class="desc">Specifically devised for safety directors, foremen, and field supervisors; this
                        program provides complete information on compliance issues for safety hazards. Recommended by
                        experts, Outreach Training Programs is an orientation to occupational safety and health for
                        workers covered by OSHA 29 CFR 1926.</p>
                    <p class="desc mtpx-10 fw-bold">
                        <img src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                             title="Bullet Points Green Tick" class="bullet-points-tick"> Laminated Official OSHA DOL
                        Card<br>
                        <img src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                             title="Bullet Points Green Tick" class="bullet-points-tick"> Downloadable Certificate<br>
                        <img src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                             title="Bullet Points Green Tick" class="bullet-points-tick"> Job Aid (Study guide)<br>
                    </p>
                    <a class="btn --btn-small enroll-now-btn" href="{{ route('product.addToCart', [2]) }}" tabindex="0">ENROLL
                        NOW</a>
                    <a class="btn --btn-small course-outline-btn" href="#" tabindex="1">COURSE DETAILS</a>
                    <div class="course-outline-popup" style="display: none;">
                        <div class="popup-inner-div">
                            <div class="page-heading bg-lgrey ptpx-20 pbpx-20">
                                <a href="#" title="Click to close" class="fs-large float-right close">X</a>
                                <h4 class="title mbpx-0">Course Details</h4>
                                <p class="subtitle">OSHA 30-Hour Construction</p>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="mtpx-20">Learning Objectives</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="box --course-objectives">
                                        <ul class="unstyled">
                                            <li>Given OSHA historical events and current information, the student will
                                                be able to explain the importance of OSHA in providing a safe and
                                                healthful workplace to workers covered by OSHA
                                            </li>
                                            <li>Locate OSHA Standards references applicable to specific hazardous
                                                conditions and practices (Introduction to OSHA Standards)
                                            </li>
                                            <li>Recognize the aspects of 1926 Subpart C (General Safety and Health
                                                Provisions)
                                            </li>
                                            <li>Implement preventative measures for accidents in their workplace
                                                (Subpart D – Occupational health and Environmental Controls)
                                            </li>
                                            <li>Describe types of personal protective equipment (PPE), and the
                                                requirements for use in OSHA standards (Subpart E – Personal Protective
                                                Equipment)
                                            </li>
                                            <li>Understand the requirements for fire protection in the workplace
                                                (Subpart F – Fire Protection and Prevention)
                                            </li>
                                            <li>Identify types of rigging equipment used to protect employees (Subpart H
                                                – Rigging; Subpart N – Cranes and Rigging)
                                            </li>
                                            <li>Identify the critical health and safety hazards of welding and cutting
                                                in the construction industry (Subpart J – Welding and Cutting)
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="box --course-objectives">
                                        <ul class="unstyled">
                                            <li>Implement measures for protecting workers and equipment from dangerous
                                                falls (Subpart M – Fall Protection)
                                            </li>
                                            <li>Recognize the hazards associated with working in or around excavation
                                                sites (Subpart P – Excavations)
                                            </li>
                                            <li>Understand the safety requirements necessary to protect workers around
                                                concrete and masonry jobs (Subpart Q – Concrete and Masonry)
                                            </li>
                                            <li>Identify the precautions and hazards to protect workers using explosives
                                                or blasting agents (Subpart T – Demolition)
                                            </li>
                                            <li>Protect workers who perform jobs on or around stairways or ladders at
                                                worksites (Subpart X – Stairways and Ladders)
                                            </li>
                                            <li>List and describe the hazards and prevalence of confined spaces</li>
                                            <li>Identify common electrical hazards and related OSHA standards (Subpart K
                                                – Electrical Standards)
                                            </li>
                                            <li>Understand the importance of scaffolding for workers in elevated
                                                workplaces (Subpart L – Scaffolding)
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4 style="margin-top: -20px;">Course Outline</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="box --outline-box">
                                        <ul class="unstyled">
                                            <li>1. Orientation</li>
                                            <li>2. Introduction to OSHA and the OSH Act</li>
                                            <li>3. Recordkeeping</li>
                                            <li>4. Basic Safety Orientation</li>
                                            <li>5. General Safety and Health Provisions</li>
                                            <li>6. Health Hazards: Hazard Communication</li>
                                            <li>7. Health Hazards: Hazardous Materials</li>
                                            <li>8. Process Safety Management: (PSM)</li>
                                            <li>9. Personal Protective Equipment</li>
                                            <li>10. Fire Protection</li>
                                            <li>11. Materials Handling and Storage</li>
                                            <li>12. Hand and Power Tools</li>
                                            <li>13. Welding and Cutting</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="box --outline-box">
                                        <ul class="unstyled">
                                            <li>14. Focus Four Electrical Safety</li>
                                            <li>15. Focus Four Struck-By and Caught in Between Hazards</li>
                                            <li>16. Focus Four Fall Protection</li>
                                            <li>17. Cranes and Rigging</li>
                                            <li>18. Motor Vehicles</li>
                                            <li>19. Excavations</li>
                                            <li>20. Concrete and Masonry Construction</li>
                                            <li>21. Stairways and Ladders</li>
                                            <li>22. Confined Spaces</li>
                                            <li>23. Lead Safety in the Workplace</li>
                                            <li>24. Use of Explosives in the Workplace</li>
                                            <li>25. Scaffolds</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 ta-center">
                                    <a class="btn --btn-small --btn-primary close-btn-back" href="#" tabindex="1">BACK</a>
                                    <a class="btn --btn-small enroll-now-btn enrollBtnText"
                                       href="{{ route('product.addToCart', [2]) }}" tabindex="0"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 image-div">
                    <picture>
                        <source
                            srcset="{{ asset('images/promotions/product-thumbnails/osha_30_hours_construction.webp') }}"
                            type="image/webp">
                        <source
                            srcset="{{ asset('images/promotions/product-thumbnails/osha_30_hours_construction.jpg') }}"
                            type="image/jpeg">
                        <img src="{{ asset('images/promotions/product-thumbnails/osha_30_hours_construction.jpg') }}"
                             alt="OSHA 30-Hour Construction" title="OSHA 30-Hour Construction">
                    </picture>
                </div>
            </div>

            <!-- New York OSHA 30-Hour Construction -->
            <div class="row course">
                <div class="col-md-6 image-div">
                    <picture>
                        <source
                            srcset="{{ asset('images/promotions/product-thumbnails/new_york_osha_30_hours_construction.webp') }}"
                            type="image/webp">
                        <source
                            srcset="{{ asset('images/promotions/product-thumbnails/new_york_osha_30_hours_construction.jpg') }}"
                            type="image/jpeg">
                        <img
                            src="{{ asset('images/promotions/product-thumbnails/new_york_osha_30_hours_construction.jpg') }}"
                            alt="New York OSHA 30-Hour Construction Industry"
                            title="New York OSHA 30-Hour Construction Industry">
                    </picture>
                </div>
                <div class="col-md-6 desc-div">
                    <h3>New York OSHA 30-Hour Construction</h3>
                    <div class="pricing"><strong class="fc-red discounted_price">$99</strong><span
                            class="fc-grey cutout">$189</span></div>
                    <p class="desc">This course contains Declaration and has been accepted by New York Department of
                        Buildings to comply with the actively proctored online training requirements of New York City
                        Site Safety Training Local Law 196.</p>
                    <p class="desc mtpx-10 fw-bold">
                        <img src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                             title="Bullet Points Green Tick" class="bullet-points-tick"> Laminated Official OSHA DOL
                        Card<br>
                        <img src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                             title="Bullet Points Green Tick" class="bullet-points-tick"> Downloadable Certificate<br>
                        <img src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                             title="Bullet Points Green Tick" class="bullet-points-tick"> Job Aid (Study guide)<br>
                    </p>
                    <a class="btn --btn-small enroll-now-btn" href="{{ route('product.addToCart', [6]) }}" tabindex="0">ENROLL
                        NOW</a>
                    <a class="btn --btn-small course-outline-btn" href="#" tabindex="1">COURSE DETAILS</a>
                    <div class="course-outline-popup" style="display: none;">
                        <div class="popup-inner-div">
                            <div class="page-heading bg-lgrey ptpx-20 pbpx-20">
                                <a href="#" title="Click to close" class="fs-large float-right close">X</a>
                                <h4 class="title mbpx-0">Course Details</h4>
                                <p class="subtitle">New York OSHA 30-Hour Construction</p>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="mtpx-20">Learning Objectives</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="box --course-objectives">
                                        <ul class="unstyled">
                                            <li>Given OSHA historical events and current information, the student will
                                                be able to
                                                explain the importance of OSHA in providing a safe and healthful
                                                workplace to workers
                                                covered by OSHA
                                            </li>
                                            <li>Locate OSHA Standards references applicable to specific hazardous
                                                conditions and
                                                practices (Introduction to OSHA Standards)
                                            </li>
                                            <li>Recognize the aspects of 1926 Subpart C (General Safety and Health
                                                Provisions)
                                            </li>
                                            <li>Implement preventative measures for accidents in their workplace
                                                (Subpart D –
                                                Occupational health and Environmental Controls)
                                            </li>
                                            <li>Describe types of personal protective equipment (PPE), and the
                                                requirements for use in
                                                OSHA standards (Subpart E – Personal Protective Equipment)
                                            </li>
                                            <li>Understand the requirements for fire protection in the workplace
                                                (Subpart F – Fire
                                                Protection and Prevention)
                                            </li>
                                            <li>Identify types of rigging equipment used to protect employees (Subpart H
                                                – Rigging;
                                                Subpart N – Cranes and Rigging)
                                            </li>
                                            <li>Identify the critical health and safety hazards of welding and cutting
                                                in the
                                                construction industry (Subpart J – Welding and Cutting)
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="box --course-objectives">
                                        <ul class="unstyled">
                                            <li>Implement measures for protecting workers and equipment from dangerous
                                                falls (Subpart M
                                                – Fall Protection)
                                            </li>
                                            <li>Recognize the hazards associated with working in or around excavation
                                                sites (Subpart P –
                                                Excavations)
                                            </li>
                                            <li>Understand the safety requirements necessary to protect workers around
                                                concrete and
                                                masonry jobs (Subpart Q – Concrete and Masonry)
                                            </li>
                                            <li>Identify the precautions and hazards to protect workers using explosives
                                                or blasting
                                                agents (Subpart T – Demolition)
                                            </li>
                                            <li>Protect workers who perform jobs on or around stairways or ladders at
                                                worksites (Subpart
                                                X – Stairways and Ladders)
                                            </li>
                                            <li>List and describe the hazards and prevalence of confined spaces</li>
                                            <li>Identify common electrical hazards and related OSHA standards (Subpart K
                                                – Electrical
                                                Standards)
                                            </li>
                                            <li>Understand the importance of scaffolding for workers in elevated
                                                workplaces (Subpart L –
                                                Scaffolding)
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4 style="margin-top: -20px;">Course Outline</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="box --outline-box">
                                        <ul class="unstyled">
                                            <li>1. Orientation</li>
                                            <li>2. Introduction to OSHA and the OSH Act</li>
                                            <li>3. Recordkeeping</li>
                                            <li>4. Basic Safety Orientation</li>
                                            <li>5. General Safety and Health Provisions</li>
                                            <li>6. Health Hazards: Hazard Communication</li>
                                            <li>7. Health Hazards: Hazardous Materials</li>
                                            <li>8. Process Safety Management: (PSM)</li>
                                            <li>9. Personal Protective Equipment</li>
                                            <li>10. Fire Protection</li>
                                            <li>11. Materials Handling and Storage</li>
                                            <li>12. Hand and Power Tools</li>
                                            <li>13. Welding and Cutting</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="box --outline-box">
                                        <ul class="unstyled">
                                            <li>14. Focus Four Electrical Safety</li>
                                            <li>15. Focus Four Struck-By and Caught in Between Hazards</li>
                                            <li>16. Focus Four Fall Protection</li>
                                            <li>17. Cranes and Rigging</li>
                                            <li>18. Motor Vehicles</li>
                                            <li>19. Excavations</li>
                                            <li>20. Concrete and Masonry Construction</li>
                                            <li>21. Stairways and Ladders</li>
                                            <li>22. Confined Spaces</li>
                                            <li>23. Lead Safety in the Workplace</li>
                                            <li>24. Use of Explosives in the Workplace</li>
                                            <li>25. Scaffolds</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 ta-center">
                                    <a class="btn --btn-small --btn-primary close-btn-back" href="#" tabindex="1">BACK</a>
                                    <a class="btn --btn-small enroll-now-btn enrollBtnText"
                                       href="{{ route('product.addToCart', [6]) }}" tabindex="0"></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- OSHA 10-Hour Construction -->
            <div class="row course">
                <div class="col-md-6 desc-div">
                    <h3>OSHA 10-Hour Construction</h3>
                    <div class="pricing"><strong class="fc-red discounted_price">$55</strong><span
                            class="fc-grey cutout">$89</span></div>
                    <p class="desc">This training is based on health and safety hazards associated with construction
                        workplace, additionally students will get a deep understanding, and responsibilities of employer
                        and employee rights. Outreach 10-hour construction is recommended by OSHA as an understanding to
                        workers for their health and safety during the course of employment, to minimize injuries and
                        save lives.</p>
                    <p class="desc mtpx-10 fw-bold">
                        <img src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                             title="Bullet Points Green Tick" class="bullet-points-tick"> Laminated Official OSHA DOL
                        Card<br>
                        <img src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                             title="Bullet Points Green Tick" class="bullet-points-tick"> Downloadable Certificate<br>
                        <img src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                             title="Bullet Points Green Tick" class="bullet-points-tick"> Job Aid (Study guide)<br>
                    </p>
                    <a href="{{ route('product.addToCart', [1]) }}" class="btn --btn-small enroll-now-btn enrollBtnText" tabindex="0"></a>
                    <a class="btn --btn-small course-outline-btn" href="#" tabindex="1">COURSE DETAILS</a>
                    <div class="course-outline-popup" style="display: none;">
                        <div class="popup-inner-div">
                            <div class="page-heading bg-lgrey ptpx-20 pbpx-20">
                                <a href="#" title="Click to close" class="fs-large float-right close">X</a>
                                <h4 class="title mbpx-0">Course Details</h4>
                                <p class="subtitle">OSHA 10-Hour Construction</p>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="mtpx-20">Learning Objectives</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="box --course-objectives">
                                        <ul class="unstyled">
                                            <li>Recognize the aspects of 1926 Subpart C (General Safety and Health
                                                Provisions).
                                            </li>
                                            <li>List the OSHA inspection priorities and describe the inspection
                                                process.
                                            </li>
                                            <li>Given OSHA historical events and current information, the student will
                                                be able to explain the importance of OSHA in providing a safe and
                                                healthful workplace to workers covered by OSHA.
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="box --course-objectives">
                                        <ul class="unstyled">
                                            <li>State the purpose of the OSH Act and list the functions of OSHA</li>
                                            <li>Given OSHA historical events and current information, the student will
                                                be able to explain the importance of OSHA in providing a safe and
                                                healthful workplace to workers covered by OSHA.
                                            </li>
                                            <li>State the purpose of the OSH Act and list the functions of OSHA</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 style="margin-top: -20px;">Course Outline</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="box --outline-box">
                                        <ul class="unstyled">
                                            <li>1. Introduction to OSHA and the OSH Act</li>
                                            <li>2. General safety and Health Provisions</li>
                                            <li>3. Health Hazards: Hazard Communication</li>
                                            <li>4. Health Hazards: Hazardous Materials</li>
                                            <li>5. Cranes and Rigging</li>
                                            <li>6. Focus Four: Electrical Safety</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="box --outline-box">
                                        <ul class="unstyled">
                                            <li>7. Struck- By and Caught in Between</li>
                                            <li>8. Fall Protection</li>
                                            <li>9. Personal Protective Equipment</li>
                                            <li>10 .Hand and Power tools</li>
                                            <li>11. Scaffolds</li>
                                            <li>12. Stairways and Ladders</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 ta-center">
                                    <a class="btn --btn-small --btn-primary close-btn-back" href="#" tabindex="1">BACK</a>
                                    <a href="{{ route('product.addToCart', [1]) }}" class="btn --btn-small enroll-now-btn enrollBtnText" tabindex="0"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 image-div">
                    <picture>
                        <source
                            srcset="{{ asset('images/promotions/product-thumbnails/osha_10_hours_construction.webp') }}"
                            type="image/webp">
                        <source
                            srcset="{{ asset('images/promotions/product-thumbnails/osha_10_hours_construction.jpg') }}"
                            type="image/jpeg">
                        <img src="{{ asset('images/promotions/product-thumbnails/osha_10_hours_construction.jpg') }}"
                             alt="OSHA 10-Hour Construction" title="OSHA 10-Hour Construction">
                    </picture>
                </div>
            </div>

            <!-- New York OSHA 10-Hour Construction -->
            <div class="row course">
                <div class="col-md-6 image-div">
                    <picture>
                        <source
                            srcset="{{ asset('images/promotions/product-thumbnails/new_york_osha_10_hours_construction.webp') }}"
                            type="image/webp">
                        <source
                            srcset="{{ asset('images/promotions/product-thumbnails/new_york_osha_10_hours_construction.jpg') }}"
                            type="image/jpeg">
                        <img
                            src="{{ asset('images/promotions/product-thumbnails/new_york_osha_10_hours_construction.jpg') }}"
                            alt="New York OSHA 10-Hour Construction Industry"
                            title="New York OSHA 10-Hour Construction Industry">
                    </picture>
                </div>
                <div class="col-md-6 desc-div">
                    <h3>New York OSHA 10-Hour Construction</h3>
                    <div class="pricing"><strong class="fc-red discounted_price">$55</strong><span
                            class="fc-grey cutout">$89</span></div>
                    <p class="desc">This course contains Declaration and has been accepted by New York Department of
                        Buildings to comply with the actively proctored online training requirements of New York City
                        Site Safety Training Local Law 196.</p>
                    <p class="desc mtpx-10 fw-bold">
                        <img src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                             title="Bullet Points Green Tick" class="bullet-points-tick"> Laminated Official OSHA DOL
                        Card<br>
                        <img src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                             title="Bullet Points Green Tick" class="bullet-points-tick"> Downloadable Certificate<br>
                        <img src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                             title="Bullet Points Green Tick" class="bullet-points-tick"> Job Aid (Study guide)<br>
                    </p>
                    <a href="{{ route('product.addToCart', [5]) }}" class="btn --btn-small enroll-now-btn enrollBtnText" tabindex="0"></a>
                    <a class="btn --btn-small course-outline-btn" href="#" tabindex="1">COURSE DETAILS</a>
                    <div class="course-outline-popup" style="display: none;">
                        <div class="popup-inner-div">
                            <div class="page-heading bg-lgrey ptpx-20 pbpx-20">
                                <a href="#" title="Click to close" class="fs-large float-right close">X</a>
                                <h4 class="title mbpx-0">Course Details</h4>
                                <p class="subtitle">New York OSHA 10-Hour Construction</p>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="mtpx-20">Learning Objectives</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="box --course-objectives">
                                        <ul class="unstyled">
                                            <li>Recognize the aspects of 1926 Subpart C (General Safety and Health
                                                Provisions).
                                            </li>
                                            <li>List the OSHA inspection priorities and describe the inspection
                                                process.
                                            </li>
                                            <li>Given OSHA historical events and current information, the student will
                                                be able to
                                                explain the importance of OSHA in providing a safe and healthful
                                                workplace to workers
                                                covered by OSHA
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="box --course-objectives">
                                        <ul class="unstyled">
                                            <li>State the purpose of the OSH Act and list the functions of OSHA</li>
                                            <li>Given OSHA historical events and current information, the student will
                                                be able to
                                                explain the importance of OSHA in providing a safe and healthful
                                                workplace to workers
                                                covered by OSHA.
                                            </li>
                                            <li>State the purpose of the OSH Act and list the functions of OSHA</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4 style="margin-top: -20px;">Course Outline</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="box --outline-box">
                                        <ul class="unstyled">
                                            <li>1. Introduction to OSHA and the OSH Act</li>
                                            <li>2. General safety and Health Provisions</li>
                                            <li>3. Health Hazards: Hazard Communication</li>
                                            <li>4. Health Hazards: Hazardous Materials</li>
                                            <li>5. Cranes and Rigging</li>
                                            <li>6. Focus Four: Electrical Safety</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="box --outline-box">
                                        <ul class="unstyled">
                                            <li>7. Struck- By and Caught in Between</li>
                                            <li>8. Fall Protection</li>
                                            <li>9. Personal Protective Equipment</li>
                                            <li>10 .Hand and Power tools</li>
                                            <li>11. Scaffolds</li>
                                            <li>12. Stairways and Ladders</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 ta-center">
                                    <a class="btn --btn-small --btn-primary close-btn-back" href="#" tabindex="1">BACK</a>
                                    <a class="btn --btn-small enroll-now-btn enrollBtnText"
                                       href="{{ route('product.addToCart', [5]) }}"
                                       tabindex="0"></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- OSHA 10-Hour General Industry -->
            <div class="row course">
                <div class="col-md-6 desc-div">
                    <h3>OSHA 10-Hour General Industry</h3>
                    <div class="pricing"><strong class="fc-red discounted_price">$55</strong><span
                            class="fc-grey cutout">$89</span></div>
                    <p class="desc">This training is based on health and safety hazards associated with the General
                        Industry workplace, additionally students will get the understanding of OSHA, responsibilities
                        of employer and employee rights. Outreach 10-hour General Industry is recommended by OSHA as an
                        understanding to workers for their health and safety during the course of employment, to
                        minimize injuries and save lives.</p>
                    <p class="desc mtpx-10 fw-bold">
                        <img src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                             title="Bullet Points Green Tick" class="bullet-points-tick"> Laminated Official OSHA DOL
                        Card<br>
                        <img src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                             title="Bullet Points Green Tick" class="bullet-points-tick"> Downloadable Certificate<br>
                        <img src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                             title="Bullet Points Green Tick" class="bullet-points-tick"> Job Aid (Study guide)<br>
                    </p>
                    <a class="btn --btn-small enroll-now-btn" href="{{ route('product.addToCart', [3]) }}" tabindex="0">ENROLL
                        NOW</a>
                    <a class="btn --btn-small course-outline-btn" href="#" tabindex="1">COURSE DETAILS</a>
                    <div class="course-outline-popup" style="display: none;">
                        <div class="popup-inner-div">
                            <div class="page-heading bg-lgrey ptpx-20 pbpx-20">
                                <a href="#" title="Click to close" class="fs-large float-right close">X</a>
                                <h4 class="title mbpx-0">Course Details</h4>
                                <p class="subtitle">OSHA 10-Hour General Industry</p>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="mtpx-20">Learning Objectives</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="box --course-objectives">
                                        <ul class="unstyled">
                                            <li>Understand the OSH Act, the functions and resources of OSHA</li>
                                            <li>Become aware of the OSHA inspection priorities and describe the
                                                inspection process
                                            </li>
                                            <li>Know the rights and responsibilities of employers and employees under
                                                the OSH Act
                                            </li>
                                            <li>Hazards associated with slips, trips, falls associated with walking and
                                                working surfaces
                                            </li>
                                            <li>Hazards associated with effective Egress and fire protection program
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="box --course-objectives">
                                        <ul class="unstyled">
                                            <li>Hazards associated with outline the general requirements for general
                                                safety standards
                                            </li>
                                            <li>Hazards associated with flammable and combustible liquids and gasses
                                            </li>
                                            <li>Hazards associated with chemicals</li>
                                            <li>Hazards associated with electrical equipments</li>
                                            <li>Hazards associated with value of personal protective equipment, usage
                                                and limitations
                                            </li>
                                            <li>Hazards associated with the basic elements of a safety and health
                                                program
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4 style="margin-top: -20px;">Course Outline</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="box --outline-box">
                                        <ul class="unstyled">
                                            <li>1. Introduction to OSHA and the OSH Act</li>
                                            <li>2. Walking &amp; Working Surfaces</li>
                                            <li>3. Emergency Action Plan</li>
                                            <li>4. Hazardous Materials</li>
                                            <li>5. Personal Protective Equipment</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="box --outline-box">
                                        <ul class="unstyled">
                                            <li>6. Machine Guarding Safety</li>
                                            <li>7. Electrical Safety</li>
                                            <li>8. Hazard Communication</li>
                                            <li>9. Hazardous Substances &amp; Industrial Hygiene</li>
                                            <li>10. Safety and Health Programs</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 ta-center">
                                    <a class="btn --btn-small --btn-primary close-btn-back" href="#" tabindex="1">BACK</a>
                                    <a class="btn --btn-small enroll-now-btn enrollBtnText"
                                       href="{{ route('product.addToCart', [3]) }}" tabindex="0"></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 image-div">
                    <picture>
                        <source
                            srcset="{{ asset('images/promotions/product-thumbnails/osha_10_hours_general_industry.webp') }}"
                            type="image/webp">
                        <source
                            srcset="{{ asset('images/promotions/product-thumbnails/osha_10_hours_general_industry.jpg') }}"
                            type="image/jpeg">
                        <img
                            src="{{ asset('images/promotions/product-thumbnails/osha_10_hours_general_industry.jpg') }}"
                            alt="OSHA 10-Hour General Industry" title="OSHA 10-Hour General Industry">
                    </picture>
                </div>
            </div>

            <!-- New York OSHA 10-Hour General -->
            <div class="row course">
                <div class="col-md-6 image-div">
                    <picture>
                        <source
                            srcset="{{ asset('images/promotions/product-thumbnails/new_york_osha_10_hours_general.webp') }}"
                            type="image/webp">
                        <source
                            srcset="{{ asset('images/promotions/product-thumbnails/new_york_osha_10_hours_general.jpg') }}"
                            type="image/jpeg">
                        <img
                            src="{{ asset('images/promotions/product-thumbnails/new_york_osha_10_hours_general.jpg') }}"
                            alt="New York OSHA 10-Hour General Industry" title="New York OSHA 10-Hour General Industry">
                    </picture>
                </div>
                <div class="col-md-6 desc-div">
                    <h3>New York OSHA 10-Hour General</h3>
                    <div class="pricing"><strong class="fc-red discounted_price">$55</strong><span
                            class="fc-grey cutout">$89</span></div>
                    <p class="desc">This course contains Declaration and has been accepted by New York Department of
                        Buildings to comply with the actively proctored online training requirements of New York City
                        Site Safety Training Local Law 196.</p>
                    <p class="desc mtpx-10 fw-bold">
                        <img src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                             title="Bullet Points Green Tick" class="bullet-points-tick"> Laminated Official OSHA DOL
                        Card<br>
                        <img src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                             title="Bullet Points Green Tick" class="bullet-points-tick"> Downloadable Certificate<br>
                        <img src="{{ asset('images/green-tick.png') }}" alt="Bullet Points Green Tick"
                             title="Bullet Points Green Tick" class="bullet-points-tick"> Job Aid (Study guide)<br>
                    </p>
                    <a class="btn --btn-small enroll-now-btn" href="{{ route('product.addToCart', [8]) }}" tabindex="0">ENROLL
                        NOW</a>
                    <a class="btn --btn-small course-outline-btn" href="#" tabindex="1">COURSE DETAILS</a>
                    <div class="course-outline-popup" style="display: none;">
                        <div class="popup-inner-div">
                            <div class="page-heading bg-lgrey ptpx-20 pbpx-20">
                                <a href="#" title="Click to close" class="fs-large float-right close">X</a>
                                <h4 class="title mbpx-0">Course Details</h4>
                                <p class="subtitle">New York OSHA 10-Hour General</p>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="mtpx-20">Learning Objectives</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="box --course-objectives">
                                        <ul class="unstyled">
                                            <li>Recognize the aspects of 1926 Subpart C (General Safety and Health
                                                Provisions).
                                            </li>
                                            <li>List the OSHA inspection priorities and describe the inspection
                                                process.
                                            </li>
                                            <li>Given OSHA historical events and current information, the student will
                                                be able to
                                                explain the importance of OSHA in providing a safe and healthful
                                                workplace to workers
                                                covered by OSHA
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="box --course-objectives">
                                        <ul class="unstyled">
                                            <li>State the purpose of the OSH Act and list the functions of OSHA</li>
                                            <li>Given OSHA historical events and current information, the student will
                                                be able to
                                                explain the importance of OSHA in providing a safe and healthful
                                                workplace to workers
                                                covered by OSHA.
                                            </li>
                                            <li>State the purpose of the OSH Act and list the functions of OSHA</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4 style="margin-top: -20px;">Course Outline</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="box --outline-box">
                                        <ul class="unstyled">
                                            <li>1. Introduction to OSHA and the OSH Act</li>
                                            <li>2. Walking &amp; Working Surfaces</li>
                                            <li>3. Emergency Action Plan</li>
                                            <li>4. Hazardous Materials</li>
                                            <li>5. Personal Protective Equipment</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="box --outline-box">
                                        <ul class="unstyled">
                                            <li>6. Machine Guarding Safety</li>
                                            <li>7. Electrical Safety</li>
                                            <li>8. Hazard Communication</li>
                                            <li>9. Hazardous Substances &amp; Industrial Hygiene</li>
                                            <li>10. Safety and Health Programs</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 ta-center">
                                    <a class="btn --btn-small --btn-primary close-btn-back" href="#" tabindex="1">BACK</a>
                                    <a class="btn --btn-small enroll-now-btn enrollBtnText"
                                       href="{{ route('product.addToCart', [8]) }}" tabindex="0"></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{--GE Benefits Section--}}
    @include('partials._ge_benefits')
    {{--GE Benefits Section--}}

    <section class="bg-secondary sec-padding why-us" id="why-us">
        <div class="container">
            <div class="page-heading">
                <h2 class="title mbpx-20">Why Us?</h2>
            </div>
            <p class="desc ta-center">We specialize in online safety training for OSHA. Our interactive online courses
                include the OSHA 10-hour and OSHA 30-hour for construction and general industry.</p>
            <div class="row ta-center mtpx-30">
                <div class="col-md-4">
                    <div class="item">
                        <div class="usp-icon usp_lowest_price_guaranteed" title="Lowest Price Guaranteed"></div>
                        <p class="desc">LOWEST PRICE GUARANTEED</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <div class="usp-icon usp_laminated_official_osha_dol_card"
                             title="Laminated Official OSHA DOL Card"></div>
                        <p class="desc">LAMINATED OFFICIAL OSHA DOL CARD</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <div class="usp-icon usp_24_7_customer_support" title="24/7 Customer Support"></div>
                        <p class="desc">24/7 CUSTOMER SUPPORT</p>
                    </div>
                </div>
            </div>

            <div class="row ta-center">
                <div class="col-md-4">
                    <div class="item">
                        <div class="usp-icon usp_bulk_registrations"
                             title="Bulk Registrations Available For Discounted Rates"></div>
                        <p class="desc">BULK REGISTRATIONS AVAILABLE FOR DISCOUNTED RATES</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <div class="usp-icon usp_complete_online"
                             title="Accessible From Anywhere, Complete Online"></div>
                        <p class="desc">ACCESSIBLE FROM ANYWHERE, COMPLETE ONLINE</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <div class="usp-icon usp_downloadable_certificate"
                             title="Post Completion Downloadable Certificate"></div>
                        <p class="desc">POST COMPLETION DOWNLOADABLE CERTIFICATE</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--    <section class="sec-padding testimonials" id="reviews">--}}
    {{--        <div class="container">--}}
    {{--            <div class="page-heading">--}}
    {{--                <h2 class="title mbpx-20">Our Reviews</h2>--}}
    {{--                <div class="sale-page-slider">--}}
    {{--                    @foreach(App\Models\Review::orderBy('id', 'desc')->get() as $review)--}}
    {{--                        <div class="item-banner">--}}
    {{--                            <div class="row testimonial">--}}
    {{--                                <div class="col-md-12">--}}
    {{--                                    <div class="testimonial-logo testimonial_{{ $review->logo }}" id="testimonial-{{ $review->id }}"></div>--}}
    {{--                                    <strong>{{ $review->user }} @ {{ $review->company }}</strong><br>--}}
    {{--                                    @for($i = 1; $i <= 5; $i++)--}}
    {{--                                        @if($i <= $review->rating)--}}
    {{--                                            <i class="xicon icon-star-full"></i>--}}
    {{--                                        @else--}}
    {{--                                            <i class="xicon icon-star-empty"></i>--}}
    {{--                                        @endif--}}
    {{--                                    @endfor--}}
    {{--                                    <br>--}}
    {{--                                    <p>{{ $review->comment }}</p>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    @endforeach--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <br><br>--}}
    {{--    </section>--}}

    @include('partials._reviews_sa', ['backgroundWhite' => true, 'reviewsId' => true])


    {{--<section class="sec-padding group-discount bg-primary" id="group-discount">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h3 class="fc-white">GET UPTO <span style="background-color: #fdba33;color: black;border-radius: 20px;padding: 0 10px;">26% DISCOUNT</span> ON GROUP ENROLLMENT</h3>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('group-enrollment') }}" class="btn --btn-small find-more-btn fw-bold">LEARN MORE</a>
                </div>
            </div>
        </div>
    </section>--}}
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js"></script>
    <script>
        function createCookie(name, value, days) {
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                var expires = "; expires=" + date.toGMTString();
            } else var expires = "";
            document.cookie = name + "=" + value + expires + "; path=/";
        }

        createCookie('promotions-disable', 1, 1);

        /*$('#timer').countdown('2021/01/11')
            .on('update.countdown', function(event) {
            var format = '%H:%M:%S';
            if(event.offset.totalDays > 0) {
                format = '%D DAY ' + format;
            }
            $(this).html(event.strftime(format));
        });*/
        $(window).load(function () {
            resizeDivs();
            $(window).resize(function () {
                resizeDivs();
            });
        });

        function resizeDivs() {
            if ($(window).width() > 991) {
                $('.course').each(function () {
                    var height = $(this).find('.image-div').height() - 20;
                    console.log(height);
                    $(this).find('.desc-div').height(height);
                })
            } else {
                $('.course').each(function () {
                    $(this).find('.desc-div').removeAttr('style');
                });
            }
        }

        $('.close').click(function (e) {
            $('body').removeClass('modal-open');
            $('.shopperlink').show();
            $(this).parent().parent().parent().hide();
            //Enable Smooth Scroll js
            var isChrome = /chrome/i.test(window.navigator.userAgent);
            var isMouseWheelSupported = 'onmousewheel' in document;

            if (isMouseWheelSupported && isChrome) {
                addEvent("mousedown", mousedown);
                addEvent("mousewheel", wheel);
                addEvent("load", init);
            }
            ;
            //Enable Smooth Scroll js
            e.stopPropagation();
            e.preventDefault();
        });

        $('.close-btn-back').click(function (e) {
            $('body').removeClass('modal-open');
            $('.shopperlink').show();
            $(this).parent().parent().parent().parent().hide();
            //Enable Smooth Scroll js
            var isChrome = /chrome/i.test(window.navigator.userAgent);
            var isMouseWheelSupported = 'onmousewheel' in document;

            if (isMouseWheelSupported && isChrome) {
                addEvent("mousedown", mousedown);
                addEvent("mousewheel", wheel);
                addEvent("load", init);
            }
            //Enable Smooth Scroll js
            e.stopPropagation();
            e.preventDefault();
        });

        $('.course-outline-btn').click(function (e) {
            e.preventDefault();
            $(this).siblings('.course-outline-popup').show();
            $('body').addClass('modal-open');
            //Disable Smooth Scroll js
            removeEvent("mousedown", mousedown);
            removeEvent("mousewheel", wheel);
            removeEvent("load", init);
            //Disable Smooth Scroll js
            $('.shopperlink').hide();
        });
    </script>
@endsection
