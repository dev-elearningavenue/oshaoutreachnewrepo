@if (in_array(Route::currentRouteName(), ['order.details', 'promotions.checkout', 'order_special-offer.details']))
    <!-- Rotating Widget Selected Reviews -->
    <div class="mtpx-30 ta-center">
        <strong class="fs-medium mbpx-10 mtpx-10">REVIEWS</strong>

        <div id="SA_wrapper"></div>
        <script type="text/javascript">
            var sa_interval = 5000;

            function saLoadScript(src) {
                var js = window.document.createElement('script');
                js.src = src;
                js.type = 'text/javascript';
                document.getElementsByTagName("head")[0].appendChild(js);
            }

            if (typeof(shopper_first) == 'undefined')
                saLoadScript('https://www.shopperapproved.com/widgets/33391/merchant/rotating-widget/f9fzQcn4dXTs.js');
            shopper_first = true;
        </script>
    </div>
    <style>
        {{-- Hide Arrows --}} .SA__prev,
        .SA__next {
            display: none;
        }

        {{-- Change Background color --}} .SA__widget_content,
        .SA__widget_content.SA__overall {
            background: #e9f3f9 !important;
        }

        #SA_wrapper .SA__widget .SA__widget_item.SA__has_border .SA__widget_content {
            border: 1px solid #d3d3d3 !important;
        }
    </style>
    <!-- Rotating Widget Selected Reviews -->
@else
    <section class="{{ isset($backgroundWhite) ? '' : 'bg-secondary' }} sec-padding" {!! isset($reviewsId) ? 'id="reviews"' : '' !!}>
        <div class="container">
            <div class="page-heading">
                <h3 class="title mbpx-0" style="line-height: 1;">Our Reviews</h3>

                <!-- Rotating Widget Selected Reviews -->
                <div id="SA_wrapper" class="{{ isset($backgroundWhite) ? '' : 'bg-secondary' }}"></div>
                <span class="view-all-btn ta-center">
                    <a href="{{ url('/reviews') }}" target="_blank" tabindex="0">View All</a>
                </span>

                <script type="text/javascript">
                    var sa_interval = 5000;

                    function saLoadScript(src) {
                        var js = window.document.createElement('script');
                        js.src = src;
                        js.type = 'text/javascript';
                        document.getElementsByTagName("head")[0].appendChild(js);
                    }

                    if (typeof(shopper_first) == 'undefined')
                        saLoadScript('https://www.shopperapproved.com/widgets/33391/merchant/rotating-widget/4d18c4931mGM.js');
                    shopper_first = true;
                </script>
                <!-- Rotating Widget Selected Reviews -->

            </div>
        </div>
        <style>
            #SA_wrapper .SA__more_review {
                text-align: center;
                padding: 10px 0px;
            }

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

                #SA_wrapper .SA__widget .SA__prev,
                #SA_wrapper .SA__widget .SA__next {

                    top: calc(140% - 9px);

                }

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
                margin-top: 60px;
            }

            .view-all-btn a {
                border-radius: 10px;
                background-color: rgb(0, 83, 132);
                display: inline-block;
                text-align: center;
                border: 1px solid rgb(0, 83, 132);
                padding: 10px 15px;
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
