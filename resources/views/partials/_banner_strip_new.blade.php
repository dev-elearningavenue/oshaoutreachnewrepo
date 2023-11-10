<section
    class="whyus-banner sec-padding {{$classes ?? ""}}"
    style="@if(in_array(Route::currentRouteName(),['osha-10-and-30']))background-color: #ffffff;@endif">
    <div class="container pr-7 pl-7">
        <div class="page-heading mbpx-40">
            <h2 class="title mbpx-0">Why Us?</h2>
            <p class="subtitle"></p>
        </div>

        <div class="box --course-objectives">
            <div class="row" style="margin-left: auto !important; margin-right: auto !important;">
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 usp-col">
                    <div class="usp-icon usp_lowest_price_guaranteed" title="Lowest Price Guaranteed"></div>
                    <h3 class="fs-medium ta-center mb-5">LOWEST PRICE GUARANTEED</h3>
                    <p class="ta-center">
                        All of our courses are carefully created with affordability in mind. In order to minimize the
                        costs, we work hard to offer high-quality training courses at the lowest price feasible. Our
                        online courses are available for as low as $10. With that pricing, we guarantee you will not be
                        able to beat it!
                    </p>
                </div>
{{--                @if(!in_array(Route::currentRouteName(), ['course.single']))--}}
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 usp-col">
                    <div class="usp-icon usp_laminated_official_osha_dol_card"
                         title="Laminated Official OSHA DOL Card"></div>
                    <h3 class="fs-medium ta-center mb-5">LAMINATED OFFICIAL OSHA DOL CARD</h3>
                    <p class="ta-center">
                        Get your Department of labor “DOL” card with our hands-on online training courses. DOL card
                        is
                        issued by the Department of labor and received via courier. With DOL card you can gain a
                        competitive edge in the job market.
                    </p>
                </div>
{{--                @else--}}
{{--                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 usp-col">--}}
{{--                    <div class="usp-icon usp_free_study_guide" title="Free Study Guide"></div>--}}
{{--                    <h3 class="fs-medium ta-center mb-5">FREE STUDY GUIDE</h3>--}}
{{--                    <p class="ta-center">--}}
{{--                        We provide our students with a free study guide. We strive to offer our students the--}}
{{--                        greatest possible learning experience and outcome. Enroll in our online training course and--}}
{{--                        get a free study guide that will assist you in successfully completing the course. The study--}}
{{--                        guides are available in PDF format and provide practical information on the online course.--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--                @endif--}}
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 usp-col row-2">
                    <div class="usp-icon usp_downloadable_certificate"
                         title="Post Completion Downloadable Certificate"></div>
                    <h3 class="fs-medium ta-center mb-5">DOWNLOADABLE CERTIFICATE</h3>
                    <p class="ta-center">
                        Waiting for the certificate to come via courier is just wasting time. Immediately after
                        satisfactory completion of the online training program, print your certificate at home. In order
                        to offer customers with the option of printing their certificates, we provide the certificate
                        print feature.
                    </p>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 usp-col row-2 m-auto">
                    <div class="usp-icon usp_bulk_registrations"
                         title="Bulk Registrations Available For Discounted Rates"></div>
                    <h3 class="fs-medium ta-center mb-5">BULK REGISTRATIONS</h3>
                    <p class="ta-center">
                        By using Bulk registration, you may get fantastic savings and exclusive deals. To take advantage
                        of this promotion, order two or more of the same training courses to get a bulk discount. The
                        good news for businesses and employers who want to purchase in bulk is that it is a
                        wonderful bargain. Registering in bulk means that you receive more safety at a lower price.
                    </p>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 usp-col row-2 m-auto">
                    <div class="usp-icon usp_24_7_customer_support" title="24/7 Customer Support"></div>
                    <h3 class="fs-medium ta-center mb-5">24/7 CUSTOMER SUPPORT</h3>
                    <p class="ta-center">
                        Our customer support staff is remarkable, as they are able to assist customers with questionsand
                        quickly solve any technical problems. We provide 24/7 customer support, and our phone number is
                        1-833-212-6742. We have a quick response time and provide 100% satisfaction.
                    </p>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 row-2 usp-col m-auto">
                    <div class="usp-icon usp_complete_online"
                         title="Accessible From Anywhere, Complete Online"></div>
                    <h3 class="fs-medium ta-center mb-5">COMPLETE ONLINE</h3>
                    <p class="ta-center">
                        There are several Training choices and program in our vast collection of OSHA Outreach Courses.
                        Gain access to interactive, self-paced training that gives you all you need to succeed. You have
                        6 months to finish the course once you begin. We are well aware of your daily routine
                        complications, and therefore we have designed a very adaptable solution.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>



@push('custom-css')
    .whyus-banner .row {
    display: flex;
    flex-wrap: wrap;
    }

    .whyus-banner .container {
    width: 100%;
    }

    .whyus-banner .learn-more:hover {
    text-decoration: underline;
    }

    .whyus-banner .col-lg-4.col-md-12.col-xs-12.usp-col {
    margin-bottom: 20px;
    padding-bottom: 1%;
    border-right: 2px solid #e5e7eb;
    }

    .whyus-banner .col-lg-4.col-md-12.col-xs-12.usp-col:nth-child(3n+3) {
    border-right: none;
    }

    @media only screen and (max-width : 992px){
    .whyus-banner .col-lg-4.col-md-12.col-xs-12.usp-col {
    border-right: none;
    }
    }

    .whyus-banner .slick-prev:before, .whyus-banner-slider .slick-next:before {
    background-color: transparent;
    color: #000000;
    font-size: 20px;
    }

    .whyus-banner .slick-dots li:before {
    display: none;
    }

    .whyus-banner .slick-dots{
    position:relative;
    margin:5px 0 5px;
    }


    /* (width <= 767px) */
    @media (max-width: 767px) {
    .whyus-banner .col-lg-4.col-md-4.col-xs-12.usp-col {
    border: none;
    }

    .whyus-banner .col-lg-4.col-md-4.col-xs-12.usp-col {
    margin-bottom: 0;
    padding-bottom: 0;
    }

    .whyus-banner {
    padding: 25px;
    }
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

@endpush
