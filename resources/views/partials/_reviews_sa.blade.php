@if(in_array(Route::currentRouteName(), ['order.details', 'promotions.checkout', 'order_special-offer.details']))
{{--    <div class="row" id="accepted-payment-methods">--}}
{{--        <div class="col-md-12">--}}
{{--            <strong class="fs-medium mbpx-10 mtpx-10">ACCEPTED PAYMENT MODES</strong>--}}
{{--        </div>--}}
{{--        <div class="col-md-12 ta-center">--}}
{{--            <picture>--}}
{{--                <source srcset="{{ asset('/images/payment-methods.webp') }}" type="image/webp">--}}
{{--                <source srcset="{{ asset('/images/payment-methods.png') }}" type="image/png">--}}
{{--                <img src="{{ asset('/images/payment-methods.png') }}" alt="Accepted Payment Methods">--}}
{{--            </picture>--}}
{{--        </div>--}}
{{--        <div id="payment-alert" class="offset-md-1 col-md-10 offset-xs-1 col-xs-10 alert alert-danger"--}}
{{--             style="display: none">--}}
{{--            Please Complete the User Details First--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="row mtpx-15">
        <div class="col-md-12">
            <strong class="fs-medium mbpx-10 mtpx-10">REVIEWS</strong>
        </div>
    </div>

    <!-- Rotating Widget Selected Reviews -->
    <div style="min-height: 100px; margin-top: 15px !important;" id="review_section_div"
         class="shopperapproved_widget sa_rotate sa_count sa_horizontal sa_bgInherit sa_colorInherit sa_borderGray sa_rounded sa_jMy sa_fixed sa_showlinks sa_large sa_showdate ">
    </div>
    <div class="mtpx-5 sa-shopper_approved-reviews-link">
        <a aria-label="oshaoutreachcourses.com certificate URL" title="Reviews"
           class="sa_footer"
           href="https://www.shopperapproved.com/reviews/oshaoutreachcourses.com/"
           target="_blank" rel="nofollow">
            <img class="sa_widget_footer"
                 style="border: 0;"
                 alt="oshaoutreachcourses.com widget logo"
                 data-src=https://www.shopperapproved.com/widgets/widgetfooter-darklogo.png>
        </a>
    </div>
    {{--  Script will be include in parent --}}
    <!-- Rotating Widget Selected Reviews -->
@else
    <section class="{{ isset($backgroundWhite) ? '' : 'bg-secondary' }} sec-padding" {!! isset($reviewsId) ? 'id="reviews"' : "" !!}>
        <div class="container">
            <div class="page-heading">
                <h2 class="title mbpx-0" style="line-height: 1;">Our Reviews</h2>

                <!-- Rotating Widget Selected Reviews -->
                <div style="min-height: 100px; margin-top: 15px !important;" id="review_section_div"
                     class="shopperapproved_widget sa_rotate sa_count3 sa_horizontal sa_colorInherit sa_borderGray sa_rounded sa_jMy sa_fixed sa_showlinks sa_large sa_showdate ">
                </div>
                <div class="mtpx-5 sa-shopper_approved-reviews-link">
                    <a aria-label="oshaoutreachcourses.com certificate URL" title="Reviews"
                       class="sa_footer"
                       href="https://www.shopperapproved.com/reviews/oshaoutreachcourses.com/"
                       target="_blank" rel="nofollow">
                        <img class="sa_widget_footer"
                             style="border: 0;"
                             alt="oshaoutreachcourses.com widget logo"
                             src=https://www.shopperapproved.com/widgets/widgetfooter-darklogo.png>
                    </a>
                </div>
                <span class="view-all-btn ta-center">
                    <a href="{{ url('/reviews') }}" target="_blank" tabindex="0">View All</a>
                </span>
                <script type="text/javascript">
                    var sa_interval = 3000;

                    function saLoadScript(src) {
                        var js = window.document.createElement('script');
                        js.src = src;
                        js.type = 'text/javascript';
                        document.getElementsByTagName("head")[0].appendChild(js);
                    }

                    if (typeof (shopper_first) == 'undefined')
                        saLoadScript(
                            'https://www.shopperapproved.com/widgets/testimonial/3.0/33391-134875132-134836734-140727333-139765614-139684707-139493782-138707651-' +
                            '139042896-138845769-136006660-137160903-136783770-136570262-135845352-134875132-134836734-134715480-132690742-130329121-130541346.js'
                        );
                    shopper_first = true;


                </script>
                <!-- Rotating Widget Selected Reviews -->

            </div>
        </div>
        <style>
            .sa-shopper_approved-reviews-link {
                display: flex;
                justify-content: center;
            }

            .sa_borderGray .sa_review {
                border: lightgray solid 1px;
            }

            .sa_review {
                margin-bottom: 5px !important;
            }

            /* (width >= 1229px) */
            @media (min-width: 1229px) {
                #review_section_div table tr td {
                    width: 33% !important;
                }
            }

            /* (width <= 1228px) */
            @media (max-width: 1228px) {
                #review_section_div table tr td:nth-child(n+3) {
                    display: none;
                }

                #review_section_div table tr td {
                    width: 50% !important;
                }
            }

            /* (width <= 768px) */
            @media (max-width: 768px) {
                #review_section_div table tr td:nth-child(n+2) {
                    display: none;
                }

                #review_section_div table tr td {
                    width: 100% !important;
                }

                .sa_info {
                    padding: 0;
                    margin-bottom: 2px;
                }
            }

            .view-all-btn {
                padding-left: 10px;
                display: block;
                margin-top: 30px;
            }

            .view-all-btn a {
                border-radius: 10px;
                background-color: rgb(0, 83, 132);
                display: inline-block;
                text-align: center;
                border: 1px solid rgb(0, 83, 132);
                padding:10px 15px;
                font-size: 14px;
                font-family: "Poppins";
                color: white;
                text-transform: uppercase;
                letter-spacing: 1px;
                font-weight: bold;
                line-height: 1.2;
                transition: ease all 0.25s;
                margin: 0 auto;
            }

            .view-all-btn a:hover {
                background-color: rgba(0, 83, 132, 0);
                color: black;
            }

        </style>
    </section>
@endif
