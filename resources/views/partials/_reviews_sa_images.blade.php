<section
    class="{{ isset($backgroundWhite) ? '' : 'bg-secondary' }} sec-padding" {!! isset($reviewsId) ? 'id="reviews"' : "" !!}
>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12 ">
                <div class="">
                    <div class="shopper_img_wrapper">
                        <a target="_blank" href="https://www.shopperapproved.com/reviews/oshaoutreachcourses.com">
                            <img
                                alt="Shopper's Approved 1500+ Ratings"
                                src="https://www.shopperapproved.com/award/images/33391-large.png">
                        </a>
                    </div>
                    <div class="shopper_section_title ">
                        <h3 class="title mbpx-0" style="line-height: 1;">Award Winning Customer Satisfaction</h3>
                    </div>
                </div>
            </div>
        </div>
        <a target="_blank" href="https://www.shopperapproved.com/reviews/oshaoutreachcourses.com">
            <div class="row shopper_customer_img">

                <div class=" col-sm-12 col-md-4 col-12 ">
                    <div class="shopper_inner_img">

                        <img
                            alt="Would Buy Again"
                            src="https://res.cloudinary.com/elearning-avenue24/image/upload/v1691507364/assets/outreach_images/Would-Buy-Again_wdxetq.jpg">
                    </div>

                </div>
                <div class=" col-sm-12 col-md-4 col-12">
                    <div class="shopper_inner_img">
                        <img
                            alt="Price Satisfaction"
                            src="https://res.cloudinary.com/elearning-avenue24/image/upload/v1691507364/assets/outreach_images/price-satisfaction_zrbbv9.jpg">
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-12">
                    <div class="shopper_inner_img">
                        <img
                            alt="Customer Service"
                            src="https://res.cloudinary.com/elearning-avenue24/image/upload/v1691507364/assets/outreach_images/customer-service_jxiknm.jpg">
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="container" id="reviews">
        <div class="">
            <div class="shopper_section_title ">
                <h3 class="title mbpx-0" style="line-height: 1;">What Our Customers are saying</h3>
            </div>

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

                if (typeof (shopper_first) == 'undefined')
                    saLoadScript('https://www.shopperapproved.com/widgets/33391/merchant/rotating-widget/4d18c4931mGM.js');
                shopper_first = true;
            </script>
            <style>
                #SA_wrapper .SA__widget .SA__widget_item.SA__has_border .SA__widget_content {
                    border: 1px solid #d3d3d3 !important;
                }
            </style>
            <!-- Rotating Widget Selected Reviews -->

        </div>
    </div>
</section>

<style>
    #SA_wrapper .SA__more_review {
        text-align: center;
        padding: 10px 0px;
    }
    @media (max-width: 768px) {
        #SA_wrapper .SA__widget .SA__prev,
        #SA_wrapper .SA__widget .SA__next {
            top: calc(140% - 9px);

        }
        .shopper_inner_img {
            margin: 20px 0 20px 0;
        }
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

<style>
    .group-stars {
        display: flex;

    }

    .group-stars .ind_cnt {
        width: auto;
        font-size: 18px;
        font-weight: 600;
        margin: 0 0 0 20px;

    }

    .shopper_img_wrapper {
        width: 30%;
        margin: 0 auto;

    }

    .shopper_img_wrapper img {
        width: 100%;
        /* margin:0 auto; */

    }

    .shopper_section_title h3 {
        font-size: 26px;
        font-weight: bold;
        text-align: center;
        margin: 40px 0 30px 0;
        letter-spacing: 6px;
        text-transform: uppercase;
        line-height: 30px !important;
    }

    .shopper_customer_img {
        margin-top: 40px;
    }

    @media only screen and (max-width: 768px) {

        .shopper_img_wrapper {
            width: 55%;
        }
    }


</style>
