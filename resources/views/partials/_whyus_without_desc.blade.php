<section class="{{ isset($backgroundWhite) ? '' : 'bg-secondary' }}  hidden-sm-down sec-padding whyus-without-desc">
    <div class="container pr-5 pl-5">
        <div class="page-heading mbpx-40">
            <h2 class="title mbpx-0">Why Us?</h2>
            <p class="subtitle"></p>
        </div>

        <div class="box --course-objectives">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12 usp-col">
                    @if(isset($noLinks))
                        <div class="usp-icon usp_lowest_price_guaranteed" title="Lowest Price Guaranteed"></div>
                        <h3 class="fs-medium ta-center">LOWEST PRICE GUARANTEED</h3>
                    @else
                        <a href="{{ route('about-us') }}#whyus-about">
                            <div class="usp-icon usp_lowest_price_guaranteed" title="Lowest Price Guaranteed"></div>
                            <h3 class="fs-medium ta-center">LOWEST PRICE GUARANTEED</h3>
                        </a>
                    @endif
                </div>
                @if(!in_array(Route::currentRouteName(), ['course.single']))
                    <div class="col-lg-4 col-md-4 col-xs-12 usp-col">
                        @if(isset($noLinks))
                            <div class="usp-icon usp_laminated_official_osha_dol_card"
                                 title="Laminated Official OSHA DOL Card"></div>
                            <h3 class="fs-medium ta-center">LAMINATED OFFICIAL OSHA DOL CARD</h3>
                        @else
                        <a href="{{ route('about-us') }}#whyus-about">
                            <div class="usp-icon usp_laminated_official_osha_dol_card"
                                 title="Laminated Official OSHA DOL Card"></div>
                            <h3 class="fs-medium ta-center">LAMINATED OFFICIAL OSHA DOL CARD</h3>
                        </a>
                        @endif
                    </div>
                @else
                    <div class="col-lg-4 col-md-4 col-xs-12 usp-col">
                        @if(isset($noLinks))
                            <div class="usp-icon usp_free_study_guide" title="Free Study Guide"></div>
                            <h3 class="fs-medium ta-center">FREE STUDY GUIDE</h3>
                        @else
                        <a href="{{ route('about-us') }}#whyus-about">
                            <div class="usp-icon usp_free_study_guide" title="Free Study Guide"></div>
                            <h3 class="fs-medium ta-center">FREE STUDY GUIDE</h3>
                        </a>
                        @endif
                    </div>
                @endif
                <div class="col-lg-4 col-md-4 col-xs-12 usp-col">
                    @if(isset($noLinks))
                        <div class="usp-icon usp_downloadable_certificate"
                        title="Post Completion Downloadable Certificate"></div>
                        <h3 class="fs-medium ta-center">DOWNLOADABLE CERTIFICATE</h3>
                    @else
                    <a href="{{ route('about-us') }}#whyus-about">
                        <div class="usp-icon usp_downloadable_certificate"
                             title="Post Completion Downloadable Certificate"></div>
                        <h3 class="fs-medium ta-center">DOWNLOADABLE CERTIFICATE</h3>
                    </a>
                    @endif
                </div>

                <div class="col-lg-4 col-md-4 col-xs-12 usp-col">
                    @if(isset($noLinks))
                        <div class="usp-icon usp_bulk_registrations"
                             title="Bulk Registrations Available For Discounted Rates"></div>
                        <h3 class="fs-medium ta-center">BULK REGISTRATIONS</h3>
                    @else
                    <a href="{{ route('group-enrollment') }}">
                        <div class="usp-icon usp_bulk_registrations"
                             title="Bulk Registrations Available For Discounted Rates"></div>
                        <h3 class="fs-medium ta-center">BULK REGISTRATIONS</h3>
                    </a>
                    @endif
                </div>

                <div class="col-lg-4 col-md-4 col-xs-12 usp-col">
                    @if(isset($noLinks))
                        <div class="usp-icon usp_24_7_customer_support" title="24/7 Customer Support"></div>
                        <h3 class="fs-medium ta-center">24/7 CUSTOMER SUPPORT</h3>
                    @else
                    <a href="{{ route('about-us') }}#whyus-about">
                        <div class="usp-icon usp_24_7_customer_support" title="24/7 Customer Support"></div>
                        <h3 class="fs-medium ta-center">24/7 CUSTOMER SUPPORT</h3>
                    </a>
                    @endif
                </div>

                <div class="col-lg-4 col-md-4 col-xs-12 usp-col">
                    @if(isset($noLinks))
                        <div class="usp-icon usp_complete_online"
                             title="Accessible From Anywhere, Complete Online"></div>
                        <h3 class="fs-medium ta-center">COMPLETE ONLINE</h3>
                    @else
                        <a href="{{ route('about-us') }}#whyus-about">
                            <div class="usp-icon usp_complete_online"
                                 title="Accessible From Anywhere, Complete Online"></div>
                            <h3 class="fs-medium ta-center">COMPLETE ONLINE</h3>
                        </a>
                    @endif
                </div>
            </div>
        </div>

    </div>
</section>
@include('partials._banner_strip_home', ['classes' => isset($backgroundWhite) ? '' : ' bg-secondary'])
@push('custom-css')
    .whyus-without-desc .row {
    display: flex;
    flex-wrap: wrap;
    }
@endpush
