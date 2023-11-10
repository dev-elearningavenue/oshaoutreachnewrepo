<section
    class="@if(!in_array(Route::currentRouteName(),['courses'])) hidden-md-up sec-padding @endif {{ $classes }}"
    style="@if(in_array(Route::currentRouteName(),['osha-10-and-30']))padding:60px 0; @else @endif ">
    <div class="container">
    <div class="page-heading mbpx-40">
            <h2 class="title mbpx-0">Why Us?</h2>
            <p class="subtitle"></p>
        </div>
        <div
            class="@if(in_array(Route::currentRouteName(), ['course.single', 'courses'])) banner-strip-slider-sc @else banner-strip-slider @endif ">
            <div class="item">
                @if(isset($noLinks))
                    <div class="usp-icon usp_lowest_price_guaranteed" title="Lowest Price Guaranteed"></div>
                    <h3 class="fs-default ta-center">LOWEST PRICE GUARANTEED</h3>
                @else
                    <a href="{{ route('about-us') }}#whyus-about">
                        <div class="usp-icon usp_lowest_price_guaranteed" title="Lowest Price Guaranteed"></div>
                        <h3 class="fs-default ta-center">LOWEST PRICE GUARANTEED</h3>
                    </a>
                @endif
            </div>
            @if(!in_array(Route::currentRouteName(), ['course.single', 'courses']))
                <div class="item">
                    @if(isset($noLinks))
                        <div class="usp-icon usp_laminated_official_osha_dol_card"
                             title="Laminated Official OSHA DOL Card"></div>
                        <h3 class="fs-default ta-center">LAMINATED OFFICIAL OSHA DOL CARD</h3>
                    @else
                        <a href="{{ route('about-us') }}#whyus-about">
                            <div class="usp-icon usp_laminated_official_osha_dol_card"
                                 title="Laminated Official OSHA DOL Card"></div>
                            <h3 class="fs-default ta-center">LAMINATED OFFICIAL OSHA DOL CARD</h3>
                        </a>
                    @endif
                </div>
            @endif
            @if(in_array(Route::currentRouteName(), ['course.single']))
                <div class="item">
                    @if(isset($noLinks))
                        <div class="usp-icon usp_free_study_guide" title="Free Study Guide"></div>
                        <h3 class="fs-default ta-center">FREE STUDY GUIDE</h3>
                    @else
                        <a href="{{ route('about-us') }}#whyus-about">
                            <div class="usp-icon usp_free_study_guide" title="Free Study Guide"></div>
                            <h3 class="fs-default ta-center">FREE STUDY GUIDE</h3>
                        </a>
                    @endif
                </div>
            @endif
            <div class="item">
                @if(isset($noLinks))
                    <div class="usp-icon usp_downloadable_certificate"
                         title="Post Completion Downloadable Certificate"></div>
                    <h3 class="fs-default ta-center">DOWNLOADABLE CERTIFICATE</h3>
                @else
                <a href="{{ route('about-us') }}#whyus-about">
                    <div class="usp-icon usp_downloadable_certificate"
                         title="Post Completion Downloadable Certificate"></div>
                    <h3 class="fs-default ta-center">DOWNLOADABLE CERTIFICATE</h3>
                </a>
                @endif
            </div>

            <div class="item">
                @if(isset($noLinks))
                    <div class="usp-icon usp_bulk_registrations"
                         title="Bulk Registrations Available For Discounted Rates"></div>
                    <h3 class="fs-default ta-center">BULK REGISTRATIONS</h3>
                @else
                    <a href="{{ route('about-us') }}#whyus-about">
                        <div class="usp-icon usp_bulk_registrations"
                             title="Bulk Registrations Available For Discounted Rates"></div>
                        <h3 class="fs-default ta-center">BULK REGISTRATIONS</h3>
                    </a>
                @endif
            </div>

            <div class="item">
                @if(isset($noLinks))
                    <div class="usp-icon usp_24_7_customer_support" title="24/7 Customer Support"></div>
                    <h3 class="fs-default ta-center">24/7 CUSTOMER SUPPORT</h3>
                @else
                    <a href="{{ route('about-us') }}#whyus-about">
                        <div class="usp-icon usp_24_7_customer_support" title="24/7 Customer Support"></div>
                        <h3 class="fs-default ta-center">24/7 CUSTOMER SUPPORT</h3>
                    </a>
                @endif
            </div>

            <div class="item">
                @if(isset($noLinks))
                    <div class="usp-icon usp_complete_online" title="Accessible From Anywhere, Complete Online"></div>
                    <h3 class="fs-default ta-center">COMPLETE ONLINE</h3>
                @else
                    <a href="{{ route('about-us') }}#whyus-about">
                        <div class="usp-icon usp_complete_online" title="Accessible From Anywhere, Complete Online"></div>
                        <h3 class="fs-default ta-center">COMPLETE ONLINE</h3>
                    </a>
                @endif
            </div>
        </div>
    </div>
</section>
@push('custom-css')

    .banner-strip {
    background-color: #e9f3f9;
    padding: 10px;
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

    .banner-strip-slider, .banner-strip-slider-sc {
        visibility: hidden;
    }

    .banner-strip-slider.slick-initialized, .banner-strip-slider-sc.slick-initialized  {
        visibility: visible;
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
