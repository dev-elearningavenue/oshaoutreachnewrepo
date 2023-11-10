<section class="{{ isset($backgroundWhite) ? '' : 'bg-secondary' }} sec-padding bpl_partner_scholarship">
    <div class="pr-5 pl-5">
        <div class="box --course-objectives">
            <div class="page-heading">
                <h2 class="title">What We Offer</h2>
            </div>
            <div class="row bpl-sc-pws-slider row_wrapper_bpl_slider">
                <div class="col-lg-2 col-md-3 col-xs-12 usp-col">
                    @if(isset($noLinks))
                        <div class="usp-icon usp_buy_now_paylater" title="Lowest Price Guaranteed"></div>
                        <h3 class="fs-medium ta-center">BUY NOW PAY LATER</h3>
                    @else
                        <a href="https://www.oshaoutreachcourses.com/blog/buy-now-pay-later-osha-courses" target="_blank">
                            <div class="usp-icon usp_buy_now_paylater" title="Lowest Price Guaranteed"></div>
                            <h3 class="fs-medium ta-center scholarship_partner_bpl_text">BUY NOW PAY LATER</h3>
                        </a>
                    @endif
                </div>

                <div class="col-lg-2 col-md-3 col-xs-12 usp-col">
                    @if(isset($noLinks))
                        <div class="usp-icon usp_scholarship" title="Lowest Price Guaranteed"></div>
                        <h3 class="fs-medium ta-center">SCHOLARSHIPS</h3>
                    @else
                        <a href="{{ route('scholarship') }}" target="_blank">
                            <div class="usp-icon usp_scholarship" title="Lowest Price Guaranteed"></div>
                            <h3 class="fs-medium ta-center scholarship_partner_bpl_text">SCHOLARSHIPS</h3>
                        </a>
                    @endif
                </div>

                <div class="col-lg-2 col-md-3 col-xs-12 usp-col">
                    @if(isset($noLinks))
                        <div class="usp-icon usp_partner_with_us" title="Lowest Price Guaranteed"></div>
                        <h3 class="fs-medium ta-center ">PARTNER WITH US</h3>
                    @else
                        <a href="{{ route('partner-with-us') }}" target="_blank">
                            <div class="usp-icon usp_partner_with_us" title="Lowest Price Guaranteed"></div>
                            <h3 class="fs-medium ta-center scholarship_partner_bpl_text">PARTNER WITH US</h3>
                        </a>
                    @endif
                </div>

                <div class="col-lg-2 col-md-3 col-xs-12 usp-col">
                    @if(isset($noLinks))
                        <div class="usp-icon usp_partner_with_us" title="Lowest Price Guaranteed"></div>
                        <h3 class="fs-medium ta-center ">FREE SIGN UP</h3>
                    @else
                        <a href="{{ route('free-signup') }}" target="_blank">
                            <div class="usp-icon usp_sign_up" title="Lowest Price Guaranteed"></div>
                            <h3 class="fs-medium ta-center scholarship_partner_bpl_text">FREE SIGN UP</h3>
                        </a>
                    @endif
                </div>

                <div class="col-lg-2 col-md-3 col-xs-12 usp-col">
                    @if(isset($noLinks))
                        <div class="usp-icon usp_partner_with_us" title="Lowest Price Guaranteed"></div>
                        <h3 class="fs-medium ta-center ">FREE STUDY GUIDE</h3>
                    @else
                        <a href="{{ route('free-study-guide-osha10-30') }}" target="_blank">
                            <div class="usp-icon free_study_guide" title="Lowest Price Guaranteed"></div>
                            <h3 class="fs-medium ta-center scholarship_partner_bpl_text">FREE STUDY GUIDE</h3>
                        </a>
                    @endif
                </div>

            </div>
        </div>

    </div>
</section>


    <style>

        .row_wrapper_bpl_slider{
            display: flex;
            justify-content: center;
        }
         .scholarship_partner_bpl_text{
        padding-top: 20px;
        }
    @media (max-width: 768px){
        .bpl_partner_scholarship{
        padding:30px;
        }

        .scholarship_partner_bpl_text{
        padding-top: 15px;
        }
        .bpl_partner_scholarship .slick-prev{
            z-index: 109;
        }
     }

    </style>


@push('custom-css')
    .whyus-without-desc .row {
    display: flex;
    flex-wrap: wrap;
    }
@endpush
