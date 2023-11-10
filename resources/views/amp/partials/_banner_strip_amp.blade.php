{{--@push('component-script')--}}
{{--    <script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.2.js"></script>--}}
{{--@endpush--}}

@if(in_array(Route::currentRouteName(), ['courses', 'home', 'osha-10-and-30', 'customPromotion', 'osha-10-hour-online', 'osha-30-hour-online']))
    <div class="banner-strip">
        <amp-carousel height="150" width="300" layout="responsive" type="slides" role="region" loop controls autoplay
                      delay="2000"
                      aria-label="Carousel with arbitrary HTML content">
            <div class="item">
                <a class="item" href="{{ route('about-us') }}?outputType=amp#whyus-about">
                    <div class="usp-icon usp_lowest_price_guaranteed" title="Lowest Price Guaranteed"></div>
                    <h3 class="fs-default ta-center">LOWEST PRICE GUARANTEED</h3>
                </a>
            </div>
            @if(!in_array(Route::currentRouteName(), ['course.single', 'courses']))
                <div class="item">
                    <a class="item" href="{{ route('about-us') }}?outputType=amp#whyus-about">
                        <div class="usp-icon usp_laminated_official_osha_dol_card"
                             title="Laminated Official OSHA DOL Card"></div>
                        <h3 class="fs-default ta-center">LAMINATED OFFICIAL OSHA DOL CARD</h3>
                    </a>
                </div>
            @else
                <div class="item">
                    <a class="item" href="{{ route('about-us') }}?outputType=amp#whyus-about">
                        <div class="usp-icon usp_free_study_guide" title="Free Study Guide"></div>
                        <h3 class="fs-medium ta-center mb-5">FREE STUDY GUIDE</h3>
                    </a>
                </div>
            @endif
            <div class="item">
                <a class="item" href="{{ route('about-us') }}?outputType=amp#whyus-about">
                    <div class="usp-icon usp_downloadable_certificate"
                         title="Post Completion Downloadable Certificate"></div>
                    <h3 class="fs-default ta-center">DOWNLOADABLE CERTIFICATE</h3>
                </a>
            </div>

            <div class="item">
                <a class="item" href="{{ route('about-us') }}?outputType=amp#whyus-about">
                    <div class="usp-icon usp_bulk_registrations"
                         title="Bulk Registrations Available For Discounted Rates"></div>
                    <h3 class="fs-default ta-center">BULK REGISTRATIONS</h3>
                </a>
            </div>

            <div class="item">
                <a class="item" href="{{ route('about-us') }}?outputType=amp#whyus-about">
                    <div class="usp-icon usp_24_7_customer_support" title="24/7 Customer Support"></div>
                    <h3 class="fs-default ta-center">24/7 CUSTOMER SUPPORT</h3>
                </a>
            </div>

            <div class="item">
                <a class="item" href="{{ route('about-us') }}?outputType=amp#whyus-about">
                    <div class="usp-icon usp_complete_online" title="Accessible From Anywhere, Complete Online"></div>
                    <h3 class="fs-default ta-center">COMPLETE ONLINE</h3>
                </a>
            </div>
        </amp-carousel>
    </div>
@else
    <div class="banner-strip why-us">
        <div class="page-heading mbpx-40">
            <h2 class="title mbpx-0">Why Us?</h2>
            <p class="subtitle"></p>
        </div>

        <amp-carousel height="335" width="300" layout="responsive" type="slides" role="region" loop autoplay
                      delay="3000"
                      aria-label="Carousel with arbitrary HTML content">
            <div class="item">
                <div class="usp-icon usp_lowest_price_guaranteed" title="Lowest Price Guaranteed"></div>
                <h3 class="fs-default ta-center">LOWEST PRICE GUARANTEED</h3>
                <p class="ta-center">
                    All of our courses are carefully created with affordability in mind. In order to minimize the
                    costs, we work hard to offer high-quality training courses at the lowest price feasible. Our
                    online courses are available for as low as $10. With that pricing, we guarantee you will not be
                    able to beat it!
                </p>
            </div>
            @if(!in_array(Route::currentRouteName(), ['course.single', 'courses']))
                <div class="item">
                    <div class="usp-icon usp_laminated_official_osha_dol_card"
                         title="Laminated Official OSHA DOL Card"></div>
                    <h3 class="fs-default ta-center">LAMINATED OFFICIAL OSHA DOL CARD</h3>
                    <p class="ta-center">
                        Get your Department of labor “DOL” card with our hands-on online training courses. DOL card
                        is
                        issued by the Department of labor and received via courier. With DOL card you can gain a
                        competitive edge in the job market.
                    </p>
                </div>
            @else
                <div class="item">
                    <div class="usp-icon usp_free_study_guide" title="Free Study Guide"></div>
                    <h3 class="fs-medium ta-center mb-5">FREE STUDY GUIDE</h3>
                    <p class="ta-center">
                        We provide our students with a free study guide. We strive to offer our students the
                        greatest possible learning experience and outcome. Enroll in our online training course and
                        get a free study guide that will assist you in successfully completing the course. The study
                        guides are available in PDF format and provide practical information on the online course.
                    </p>
                </div>
            @endif
            <div class="item">
                <div class="usp-icon usp_downloadable_certificate"
                     title="Post Completion Downloadable Certificate"></div>
                <h3 class="fs-default ta-center">DOWNLOADABLE CERTIFICATE</h3>
                <p class="ta-center">
                    Waiting for the certificate to come via courier is just wasting time. Immediately after
                    satisfactory completion of the online training program, print your certificate at home. In order
                    to offer customers with the option of printing their certificates, we provide the certificate
                    print feature.
                </p>
            </div>

            <div class="item">
                <div class="usp-icon usp_bulk_registrations"
                     title="Bulk Registrations Available For Discounted Rates"></div>
                <h3 class="fs-default ta-center">BULK REGISTRATIONS</h3>
                <p class="ta-center">
                    By using Bulk registration, you may get fantastic savings and exclusive deals. To take advantage
                    of this promotion, order two or more of the same training courses to get a bulk discount. The
                    good news for businesses and employers who want to purchase in bulk is that it is a
                    wonderful bargain. Registering in bulk means that you receive more safety at a lower price.
                </p>
            </div>

            <div class="item">
                <div class="usp-icon usp_24_7_customer_support" title="24/7 Customer Support"></div>
                <h3 class="fs-default ta-center">24/7 CUSTOMER SUPPORT</h3>
                <p class="ta-center">
                    Our customer support staff is remarkable, as they are able to assist customers with questions and
                    quickly solve any technical problems. We provide 24/7 customer support, and our phone number is
                    1-833-212-6742. We have a quick response time and provide 100% satisfaction.
                </p>
            </div>

            <div class="item">
                <div class="usp-icon usp_complete_online" title="Accessible From Anywhere, Complete Online"></div>
                <h3 class="fs-default ta-center">COMPLETE ONLINE</h3>
                <p class="ta-center">
                    There are several Training choices and program in our vast collection of OSHA Outreach Courses.
                    Gain access to interactive, self-paced training that gives you all you need to succeed. You have
                    6 months to finish the course once you begin. We are well aware of your daily routine
                    complications, and therefore we have designed a very adaptable solution.
                </p>
            </div>
        </amp-carousel>
    </div>
@endif
@push('custom-css')
    .page-heading .title {
    font-size: 25px;
    padding-top: 10px;
    }

    .banner-strip .learn-more:hover {
    text-decoration: underline;
    }

    .banner-strip {
    background-color: #e9f3f9;
    padding: 10px;
    }

    .banner-strip .fs-default.ta-center, .banner-strip p.ta-center {
    margin-bottom: 10px;
    }

    .banner-strip figure img {
    margin: 0 auto;
    }

    .banner-strip .desc {
    font-weight: bold;
    text-align: center;
    }

    .banner-strip-slider .item {
    padding: 0 10px;
    }

    .banner-strip-slider .slick-prev:before, .banner-strip-slider .slick-next:before {
    background-color: transparent;
    color: #000000;
    font-size: 20px;
    }
    .usp-icon {
    width: 82px;
    height: 82px;
    margin: 0 auto;
    }

    .webp .usp_24_7_customer_support {
    background: url('/images/usp_sprites.webp') -10px -10px;
    }

    .webp .usp_bulk_registrations {
    background: url('/images/usp_sprites.webp') -112px -10px;
    }

    .webp .usp_complete_online {
    background: url('/images/usp_sprites.webp') -214px -10px;
    }

    .webp .usp_downloadable_certificate {
    background: url('/images/usp_sprites.webp') -316px -10px;
    }

    .webp .usp_laminated_official_osha_dol_card {
    background: url('/images/usp_sprites.webp') -418px -10px;
    }

    .webp .usp_lowest_price_guaranteed {
    background: url('/images/usp_sprites.webp') -520px -10px;
    }

    .amp-carousel-slide {
    padding: 0 60px;
    height:150px;
    }

@endpush
