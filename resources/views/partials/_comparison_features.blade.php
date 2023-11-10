{{-- table start --}}
<section class="sec-padding">
    <div class="container">
        <div class="row ">
            <div class="">
                <div class="page-heading mbpx-40">
                    <h2 class="title mbpx-0">Why Us?</h2>
                    <p class="subtitle"></p>
                </div>
                <div class="promotion_table_wrapper bg-white"  id="promotions-table">
                    {{-- <h3 class="table_title mb-4">get the most for your money with us!</h3> --}}


                    <div class="table_content_wrapper ">

                        <table class="promotion_table">
                            <tr>
                                <th class="60%">features</th>
                                <th class="td_img_center promotion_th_responsive" width="15%"><img
                                        src="https://res.cloudinary.com/elearning-avenue24/image/upload/v1691492291/assets/outreach_images/ooc-logo-chart_pi0yuo.png"
                                        alt=""></th>
                                <th class="td_img_center promotion_th_responsive" width="15%">other providers</th>
                            </tr>
                            <tr>
                                <td>Plastic Durable DOL Card</td>
                                <td class="td_img_center"><img class="td_img_center" width="15%" height="20%"
                                                               src="{{ asset("/images/simple-icons/check.svg") }}"/>
                                </td>
                                <td><img class="td_img_center" width="15%" height="20%"
                                         src="{{ asset("/images/simple-icons/check.svg") }}"/></td>
                            </tr>
                            <tr>
                                <td>Instant Downloadable Certificate</td>
                                <td><img class="td_img_center" width="15%" height="20%"
                                         src="{{ asset("/images/simple-icons/check.svg") }}"/></td>
                                <td><img class="td_img_center" width="15%" height="20%"
                                         src="{{ asset("/images/simple-icons/check.svg") }}"/></td>
                            </tr>
                            <tr>
                                <td class="info_td">Study Guide
                                    <div class="info_new_wrapper">
                                        <div id="Study_Guide_Modal" class="modal">

                                            <!-- Modal content -->
                                            <div class="modal-content">
                                              <span class="closeModal close_info_popup_table">&times;</span>
                                              <p class="modal_contetent_title"> <b>Get FREE Study Guide Now</b>
                                              </p>
                                              <div>
                                                  <ul>
                                                      {{-- <li>Get FREE Study Guide Now</li> --}}
                                                      <li>Learn From The First OSHA-Approved Guide For 2024</li>

                                                  </ul>
                                                  <div class="info_sign_up_btn">
                                                     <a href="{{ route('free-study-guide-osha10-30') }}" class="info_modal_inner_btn" >Download Now</a>
                                                    </div>

                                              </div>
                                            </div>

                                          </div>
                                    <img id="discount_info" class="openModal info" data-modal="Study_Guide_Modal"
                                         src="{{ asset("/images/information.png") }}"/>


                                    {{-- <span class="new">NEW</span> --}}
                                </div>
                                </td>
                                <td><img class="td_img_center" width="15%" height="20%"
                                         src="{{ asset("/images/simple-icons/check.svg") }}"/></td>
                                <td><img class="td_img_center" width="15%" height="20%"
                                         src="{{ asset("/images/simple-icons/check.svg") }}"/></td>
                            </tr>
                            <tr>
                                <td class="info_td">Discount on bulk buying
                                    <div class="info_new_wrapper">
                                        <div id="Discount_Modal" class="modal">

                                            <!-- Modal content -->
                                            <div class="modal-content">
                                              <span class="closeModal close_info_popup_table">&times;</span>
                                              {{-- <p class="modal_contetent_title"> <b>You can avail this offer on checkout</b>
                                              </p> --}}
                                              <div>
                                                  <ul>
                                                      <li>Sign up with a free account and avail exclusive discounts</li>
                                                      <li>Directly manage your teams and assign courses as preferred</li>

                                                  </ul>
                                                  <div class="info_sign_up_btn"> <a  href="{{ route('free-signup') }}" class="info_modal_inner_btn">Signup now</a></div>

                                              </div>
                                            </div>

                                          </div>
                                    <img id="discount_info" class="openModal info" data-modal="Discount_Modal"
                                         src="{{ asset("/images/information.png") }}"/>


                                    {{-- <span class="new">NEW</span> --}}
                                </div>
                                </td>
                                <td><img class="td_img_center" width="15%" height="20%"
                                         src="{{ asset("/images/simple-icons/check.svg") }}"/></td>
                                <td><img class="td_img_center" width="15%" height="20%"
                                         src="{{ asset("/images/simple-icons/close.svg") }}"/></td>
                            </tr>
                            <tr>
                                <td class="info_td" >Buy Now Pay Later
                                    <div class="info_new_wrapper">
                                        <div id="buy_now" class="modal">

                                            <!-- Modal content -->
                                            <div class="modal-content">
                                              <span class="closeModal close_info_popup_table">&times;</span>
                                              <p class="modal_contetent_title"> <b>You can avail this offer on checkout</b>
                                              </p>
                                              <div>
                                                  <ul>
                                                      <li>Pay $32.25 to start your OSHA 30 Course Now</li>
                                                      <li>Pay $13.75 to start your OSHA 10 Course Now</li>
                                                      <li>Pay in 4 interest-free installments  </li>
                                                      <li>Payable every 2 weeks</li>
                                                  </ul>

                                              </div>
                                            </div>

                                          </div>
                                    <img id="buy_now_btn" class="openModal info" data-modal="buy_now"
                                         src="{{ asset("/images/information.png") }}"/>
                                    <span class="new">NEW</span>
                                </div>

                                    <!-- The Modal -->

                                </td>
                                <td><img class="td_img_center" width="15%" height="20%"
                                         src="{{ asset("/images/simple-icons/check.svg") }}"/></td>
                                <td><img class="td_img_center" width="15%" height="20%"
                                         src="{{ asset("/images/simple-icons/close.svg") }}"/></td>
                            </tr>
{{--                            <tr>--}}
{{--                                <td>24/ Customer Support</td>--}}
{{--                                <td><img class="td_img_center" width="15%" height="20%"--}}
{{--                                         src="{{ asset("/images/simple-icons/check.svg") }}"/></td>--}}
{{--                                <td><img class="td_img_center" width="15%" height="20%"--}}
{{--                                         src="{{ asset("/images/simple-icons/close.svg") }}"/></td>--}}
{{--                            </tr>--}}
                            <tr>
                                <td class="info_td">Free Course
                                    <div class="info_new_wrapper">
                                        <div id="free_course" class="modal">
                                            <!-- Modal content -->
                                            <div class="modal-content">
                                              <span class="closeModal close_info_popup_table">&times;</span>
                                              <p class="modal_contetent_title"> <b>Select one free course out of these two on checkout </b>
                                              </p>
                                              <div>
                                                  <ul>
                                                      <li>Active Shooter</li>
                                                      <li>Human trafficking </li>
                                                  </ul>

                                              </div>
                                            </div>

                                          </div>
                                    <img id="free_course_btn" class="openModal info" data-modal="free_course"
                                         src="{{ asset("/images/information.png") }}"/>
                                    {{-- <span class="new">EXCLUSIVE</span> --}}
                                </div>

                                    <!-- The Modal -->
                                </td>
                                <td><img class="td_img_center" width="15%" height="20%"
                                         src="{{ asset("/images/simple-icons/check.svg") }}"/></td>
                                <td><img class="td_img_center" width="15%" height="20%"
                                         src="{{ asset("/images/simple-icons/close.svg") }}"/></td>
                            </tr>
{{--                            <tr>--}}
{{--                                <td>Lifetime Access</td>--}}
{{--                                <td><img class="td_img_center" width="15%" height="20%"--}}
{{--                                         src="{{ asset("/images/simple-icons/check.svg") }}"/></td>--}}
{{--                                <td><img class="td_img_center" width="15%" height="20%"--}}
{{--                                         src="{{ asset("/images/simple-icons/close.svg") }}"/></td>--}}
{{--                            </tr>--}}
                            <tr>
                                <td>Tax Free Transaction</td>
                                <td><img class="td_img_center" width="15%" height="20%"
                                         src="{{ asset("/images/simple-icons/check.svg") }}"/></td>
                                <td><img class="td_img_center" width="15%" height="20%"
                                         src="{{ asset("/images/simple-icons/close.svg") }}"/></td>
                            </tr>
                            <tr>
                                <td class="info_td">Mobile Compatibility
                                    <div class="info_new_wrapper">
                                        <div id="mogile_compatibility" class="modal">
                                            <!-- Modal content -->
                                            <div class="modal-content">
                                              <span class="closeModal close_info_popup_table">&times;</span>
                                              <p class="modal_contetent_title"> <b>Learn on the go.
                                            </b>
                                              </p>
                                              <div>
                                                  <ul>
                                                      <li>Courses are optimized for smartphone and tablet</li>
                                                      <li>You can study on any device </li>
                                                  </ul>

                                              </div>
                                            </div>

                                          </div>
                                    <img id="mogile_compatibility_btn" class="openModal info" data-modal="mogile_compatibility"
                                         src="{{ asset("/images/information.png") }}"/>
                                    {{-- <span class="new">NEW</span> --}}
                                </div>

                                    <!-- The Modal -->
                                </td>
                                <td><img class="td_img_center" width="15%" height="20%"
                                         src="{{ asset("/images/simple-icons/check.svg") }}"/></td>
                                <td><img class="td_img_center" width="15%" height="20%"
                                         src="{{ asset("/images/simple-icons/close.svg") }}"/></td>
                            </tr>
{{--                            <tr>--}}
{{--                                <td>Exclusive Access to OSHA Community</td>--}}
{{--                                <td><img class="td_img_center" width="15%" height="20%"--}}
{{--                                         src="{{ asset("/images/simple-icons/check.svg") }}"/></td>--}}
{{--                                <td><img class="td_img_center" width="15%" height="20%"--}}
{{--                                         src="{{ asset("/images/simple-icons/close.svg") }}"/></td>--}}
{{--                            </tr>--}}
                            <tr>
                                <td class="info_td">Flexible Learning
                                    <div class="info_new_wrapper">
                                        <div id="flexible" class="modal">
                                            <!-- Modal content -->
                                            <div class="modal-content">
                                              <span class="closeModal close_info_popup_table">&times;</span>
                                              <p class="modal_contetent_title"> <b>Learn on your time.
                                            </b>
                                              </p>
                                              <div>
                                                  <ul>
                                                      <li>Complete the course at your own pace  </li>
                                                      <li>Study anytime, within six months period </li>
                                                  </ul>

                                              </div>
                                            </div>

                                          </div>
                                    <img id="flexible_btn" class="openModal info" data-modal="flexible"
                                         src="{{ asset("/images/information.png") }}"/>
                                    {{-- <span class="new">NEW</span> --}}
                                </div>

                                    <!-- The Modal -->
                                </td>
                                <td><img class="td_img_center" width="15%" height="20%"
                                         src="{{ asset("/images/simple-icons/check.svg") }}"/></td>
                                <td><img class="td_img_center" width="15%" height="20%"
                                         src="{{ asset("/images/simple-icons/close.svg") }}"/></td>
                            </tr>
{{--                            <tr>--}}
{{--                                <td>Progress Tracking</td>--}}
{{--                                <td><img class="td_img_center" width="15%" height="20%"--}}
{{--                                         src="{{ asset("/images/simple-icons/check.svg") }}"/></td>--}}
{{--                                <td><img class="td_img_center" width="15%" height="20%"--}}
{{--                                         src="{{ asset("/images/simple-icons/close.svg") }}"/></td>--}}
{{--                            </tr>--}}
                        </table>


                    </div>
                </div>


            </div>

        </div>

    </div>
</section>
{{-- table start --}}

{{--Styling--}}
<style>
    .info_sign_up_btn{
        text-align: right;
    }
    .info_new_wrapper{
        display: flex;
        align-items: center;
        margin: -30px 0px 0 3px;
    }
    .info_td{
        display: flex;
        align-items: center;

    }
    .info{
        width: 17px;
        height: 17px;
        cursor: pointer;
        margin-left: 5px;
    }

    .modal_contetent_title{
        font-size: 20px;
        margin-bottom: 10px;
        color: #4098cf;
    }
    .info_modal_inner_btn{
        border-radius: 45px;
        background: #0195E5;
        color: #FFF;
        font-family: Poppins;
        font-size: 12px;
        text-transform: uppercase;
        border: none;
        padding: 4px 22px 4px 22px;
        cursor: pointer;
        transition: ease all 0.25s;
        margin: 11px 0 0 12px;
        display: inline-block;
        align-items: center;
    }
    .info_modal_inner_btn:hover{
        background: #000000;
        color: #ffffff;
    }
    .info_td li{
        font-size:18px;
        font-weight: 400;
        margin-top: 5px;
        margin-left: 15px;
        /* color: #00a900; */
    }
    /* The Modal (background) */
    .modal {
       display: none; /* Hidden by default */
       position: fixed; /* Stay in place */
       z-index: 1; /* Sit on top */
       left: 0;
       top: 0;
       width: 100%; /* Full width */
       height: 100%; /* Full height */
       overflow: auto; /* Enable scroll if needed */
       background-color: rgb(0,0,0); /* Fallback color */
       background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
       /* padding-top: 100px; Location of the box */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px 20px;
        border: 1px solid #888;
        /* width: 40%; */
        border-radius: 20px;
        position: relative;
        top: 37%;
        width: 20%;
        }

        /* The Close Button */
        .close_info_popup_table {
            color: #aaaaaa;
            font-size: 28px;
            font-weight: bold;
            margin: -22px -6px 0px 0px;
            float: right;
            background: transparent;
        }

        .close_info_popup_table:hover,
        .close_info_popup_table:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        /* close popup */
        .new{
            color: white;
            background: red;
            border-radius: 20px;
            padding: 0px 7px;
            margin: 0 0 0 5px;
            display: inline-block;
            font-size: 12px;
        }
        .promotion_table  tr:nth-child(even) {
            background: #EEF3FF;
        }

    .promotion_table_wrapper {
        box-shadow: rgb(99 99 99 / 40%) 0px 2px 8px 0px;
        border-radius: 20px;
        padding: 50px;
    }

    .promotion_table th {
        text-transform: uppercase;
    }

    .promotion_table {
        /* font-family: arial, sans-serif; */
        border-collapse: collapse;
        width: 100%;
    }

    .promotion_table th {
        border-bottom: 1px solid #dddddd;
        border-right: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        font-size: 22px;

    }

    .promotion_table td {
        border-bottom: 1px solid #dddddd;
        border-right: 1px solid #dddddd;
        text-align: left;
        padding: 15px 8px;
        font-size: 20px;
        font-weight: 600;

    }

    .td_img_center {
        text-align: center !important;
        margin: 0 auto
    }


    .table_title {
        text-align: center;
        text-transform: uppercase;
        color: #000000;
    }
    @media only screen and (max-width: 1024px) {
    .modal-content {
        width: 27%;

    }

    }

    @media only screen and (max-width: 992px) {
        .td_img_center{
            width:20px;
        }
        .promotion_table th {
            font-size: 14px;

        }

        .promotion_table td {
            font-size: 14px;

        }

        .promotion_th_responsive {
            width: 100px !important;
        }


    }
    @media only screen and (max-width: 600px) {
        .info_td{
            flex-direction: column;
            align-items: flex-start;
        }
        .modal-content{
            width:60%;
        }
        .info_new_wrapper{
            margin: 5px 0 0px 0;
            align-items: flex-start;

        }

    .promotion_table_wrapper{
        padding: 15px 15px;
        width: 90%;
        margin: 0 auto;
    }
}
@media only screen and (max-width: 500px) {
.modal-content{
    width: 70%;
}

}
    @media only screen and (max-width: 450px) {
        .td_img_center{
            width:16px;
        }

    .promotion_table_wrapper{
        padding: 15px 15px;

    }

    }


</style>
{{--Styling--}}

 {{-- start conparison fetrures script --}}
 @include('partials._comparison_features_script')
 {{-- end conparison fetrures script --}}






