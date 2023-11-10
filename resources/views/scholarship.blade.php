@extends('layouts.master')

@section('title', isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'SCHOLARSHIP | '.config('app.name') )

@section('styles')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <style>
        div#whyus-about {
            padding-top: 50px;
            margin-top: -50px;
        }

        section.bg-grey {
            background: #efefef;
        }

        .imgMainBox .imgWrapper {
            box-shadow: 0px 0px 20px -4px rgba(0, 0, 0, 0.3);
            margin-bottom: 50px;
            border-radius: 10px;
        }

        .imgMainBox .imgWrapper img {
            border-radius: 10px;
        }

        .fancybox-button svg path {
            stroke-width: 2px !important;
        }

        .fancybox-button[disabled] {
            display: none;
        }

        .text-center {
            text-align: center;
        }

        .bg-yellow {
            background: #ffef00;
        }

        .box.\--course-objectives p.desc.heavyDesc {
            font-size: 24px;
            color: rgb(0, 0, 0);
            line-height: 1.5;
        }

        .black-btn {
            margin-top: 20px;
            border-radius: 10px;
            background-color: rgb(0, 0, 0);
            border: 1px solid rgb(0, 0, 0);
            font-size: 21px;
            font-family: "Poppins";
            color: rgb(254, 254, 254);
            font-weight: bold;
            padding: 15px 25px;
            display: inline-block;
            cursor: pointer;
            transition: ease all 0.25s;
            text-transform:uppercase;
        }

        .black-btn:hover {
            background: rgba(0, 0, 0, 0);
            color: rgba(0, 0, 0, 1);
        }
        .black-btn:hover a{
            color: rgba(0, 0, 0, 1);
        }

        div#partnerWithUsForm {
            font-family: 'Open Sans', sans-serif;
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 99999999999;
        }

        div#partnerWithUsForm .underlay {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.5);
            cursor: pointer;
            -webkit-animation: fadein 0.5s;
            animation: fadein 0.5s;
        }

        div#partnerWithUsForm .partnerWithUsFormWrapper {
            z-index: 999999;
            position: absolute;
            width: 900px;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: #fff;
            padding: 15px;
            height: fit-content;
            height: -webkit-fit-content;
            height: -moz-fit-content;
            margin: auto;
            border-radius: 5px;
        }

        div#partnerWithUsForm .partnerWithUsFormWrapper span.partnerWithUsFormCloseBtn {
            right: 10px;
            position: absolute;
            top: 10px;
            display: inline-block;
            padding: 5px 5px;
            -webkit-transition: 0.4s;
            -moz-transition: 0.4s;
            -o-transition: 0.4s;
            transition: 0.4s;
            line-height: 1;
            text-transform: uppercase;
            font-weight: 600;
            cursor: pointer;
            z-index: 9999999;
            border-radius: 100%;
            font-size: 30px;
        }

        .home-intro .title {
            font-size: 36px;
            font-family: "Poppins";
            color: rgb(0, 0, 0);
            font-weight: bold;
            line-height: 1.333;
            text-align: center;

        }

        .formWrapper {
            padding: 0 15PX;
        }

        @media screen and (max-width: 767px) {
            .home-intro .title {
                font-size: 25px;
            }

            .box.\--course-objectives .desc {
                font-size: 16px;
            }

            .box.\--course-objectives p.desc.heavyDesc {
                font-size: 18px;
            }

            section.sec-padding.bg-yellow.text-center h2.title {
                font-size: 24px;
            }

            .black-btn {
                font-size: 16px;
            }
        }

        form input[type="submit"] {
            font-weight: 700;
            font-size: 14px;
            border-radius: 5px;
            padding: 10px 15px;
        }

        .error-msg {
            right: inherit;
            left: 0;
            position: relative;
        }

        .home-intro .title highlight {
            background: yellow;
            padding: 0 5px;
        }

        div#partnerWithUsForm .partnerWithUsFormWrapper {
            max-width: 90%;
        }

        .g-recaptcha.ta-left.pb-20 > div,
        .g-recaptcha.ta-left.pb-20 iframe {
            max-width: 100%;
        }

/* scholarship */

.scholarship_exclusive{
    display: flex;
    align-items: center;
}

.scholarship_seminar_amount{
    font-size: 20px;
    color: #000000 !important;
    font-weight: 500;
}
.scholarship_seminar_upto{
    font-size: 22px;
    color: #000000;
}

.scholarship_seminar_btn{
    background: #FDBB33;
    color: #1c1c1c;
    padding: 10px 15px;
    font-size: 16px;
    font-weight: 900;
    cursor: pointer;
    transition: ease all 0.25s;
}
.scholarship_seminar_btn:hover{
    color: #ffffff;
}






.scholarship_description_first_section{
    padding: 70px 0px;
    background:#E9F3F9;
}



.scholarship_description_first_img_wrapper{
    width:100%;
}
.scholarship_description_first_img_wrapper img{
    width: 100%;
}
.scholarship_description_first_section_row{
    align-items: center;
    display: flex;
}
.scholarship_description_right{
    padding-left:40px;
}

.scholarship_description_second_section_row{
    align-items: center;
    display: flex;
}
.scholarship_description_second_section{
    padding: 0px 0px 70px 0px;
    background:#E9F3F9;

}

.scholarship_description_second_right{
    padding-left:40px;
}
.scholarship_description_second_sec_img_wrapper{
    width: 100%;
}
.scholarship_description_second_sec_img_wrapper img{
    width: 100%;
}
.scholarship_description_left p{
    font-size: 16px;
    margin-bottom:25px;
}

.apply_title_wrapper{
    text-align: center;
    margin-bottom: 35px;
    font-size: 30px;
    font-weight: bold;

}
.scholarship_description_second_right p{
    margin-bottom: 25px;
    font-size: 16px;
}

.uppercase{
    text-transform:uppercase;
}

.click_to_apply{
    color:#ffffff;
}
.scholarship_title{
    font-size:38px;
}


.font_38{
    font-size: 38px !important;
}


@media screen and (max-width: 991px) {
.scholarship_seminar_btn {
    padding: 10px 10px;
}

}

        @media screen and (max-width: 768px) {
            .font_38 {
    font-size: 26px !important;
}
.scholarship_exclusive {
    display: flex;
    align-items: center;
    flex-direction: column;

}
.scholarship_seminar_upto {
    font-size: 22px;
    color: #000000;
    margin-bottom: 24px;
}
.Scholarship_overview{
    padding-top: 20px;
}
.scholarship_description_first_section_row {
    align-items: center;
    display: flex;
    flex-direction: column-reverse;
}
.scholarship_description_second_section_row {
    align-items: center;
    display: flex;
    flex-direction: column;
}
.scholarship_description_first_img_wrapper{
    margin:0 auto;
}
.scholarship_description_second_sec_img_wrapper {
    width: 100%;
    margin-bottom: 25px;

}
.scholarship_description_right{
    padding: 0px;
    margin-bottom:25px;

}
.scholarship_description_first_img_wrapper {
    width: 100%;
}

.scholarship_description_first_section {
    padding-bottom: 25px;
}

.scholarship_description_second_right {
    padding-left: 40px;
    padding: 0px;
}

        }




















    </style>
    @if(isset($page['seo_tags']))
        @foreach($page['seo_tags'] as $meta_name => $meta_content)
            @if($meta_name != 'title')
                <meta name="{{ $meta_name }}" content="{{ $meta_content }}"/>
            @endif
        @endforeach
    @endif
    <meta property="og:title"
          content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Reviews' }}">
    <meta property="twitter:title"
          content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Reviews' }}">
    <meta property="og:description"
          content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'PARTNER WITH US' }}">
    <meta property="twitter:description"
          content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'PARTNER WITH US' }}">
    <meta property="og:image" content="{{ url('/images/osha-outreach-courses.png') }}">
    <meta property="twitter:image" content="{{ url('/images/osha-outreach-courses.png') }}">
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
                "name": "Scholarship OSHA Outreach Courses",
                "item": "{{ url('osha-10-hour-construction') }}"
        }
    }


    </script>
@endsection

@section('content')
    <section class="--inner-banner">
        <div class="inner-content inner-banner"
             style="background-image: url('{{ asset('images/partner-with-us-banner.webp') }}');background-position:center 10%;">
            <div class="container">
                <h1 class="title fc-white ta-center pulse-button uppercase scholarship_title">
                    Scholarship
                    </h1>
            </div>
        </div>
    </section>


    <section class="home-intro bg-grey sec-padding">
        <div class="container">
            <h2 class="mb-3 font_38">OSHA Outreach Courses Providing Exclusive Scholarships</h2>
            <div class="box --course-objectives">

                <div class="row scholarship_exclusive">
                    <div class="col-md-3 col-6">
                        <div>
                            <div>
                            <p class="scholarship_seminar_amount"> Percentage:</p>
                            </div>

                            <div>
                            <p class="scholarship_seminar_upto"><b> Upto 100% </b></p>
                            </div>
                         </div>

                    </div>
                    <div class="col-md-3 col-6">
                        <div>
                            <div>
                            <p class="scholarship_seminar_amount"> Validity:</p>
                            </div>

                            <div>
                            <p class="scholarship_seminar_upto"><b>Until July 20, 2024</b></p>
                            </div>
                         </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div>
                            <div>
                            <p class="scholarship_seminar_amount"> Awards Available:</p>
                            </div>

                            <div>
                            <p class="scholarship_seminar_upto"><b> 100 </b></p>
                            </div>
                         </div>
                    </div>
                    <div class="col-md-3">
                        <a class="scholarship_seminar_btn" target="_blank" href="https://docs.google.com/forms/d/e/1FAIpQLSf-6RGQaB7MNd8pzrISQQMxDHuW03ElH9F1E-i5tIeEwdr8VA/viewform"> See If You Qualify</a>

                    </div>

                </div>
                <h2 class="title mbpx-10 mt-5 font_38   Scholarship_overview">
                    Scholarship Overview:

                </h2>
                <p class="desc heavyDesc">
                    To accompany OSHA in its mission of promoting safe work culture and enforcing measures to bring workplaces and employees in compliance with OSHA standards and regulations, we are thrilled to announce exclusive scholarships to individuals who feel passionate about workplace safety and are interested in strengthening their careers by taking professional OSHA safety training. By consulting with our professional team, we have made the procedure for availing scholarships faster by getting verification and approval from the concerned departments. The minimum time for your scholarship approval is 2 hours and can not be delayed for more than 24 hours.
                </p>
            </div>
        </div>
    </section>



    <section class="scholarship_description_first_section">

        <div class="container">
            <div>       <h2 class="apply_title_wrapper uppercase font_38">Apply for our incredible scholarship offer if you fit the following categories: </h2></div>
            <div class="row scholarship_description_first_section_row">
                <div class="col-md-6">
                    <div class="scholarship_description_left">
                        <div>
                        <h3>Working Students: </h3>
                    </div>
                    <div>
                       <p>
                        We understand that keeping a balance between work and education can be tricky. Since we value your commitment, we offer you a fantastic scholarship, so seize this opportunity to enhance your workplace safety knowledge.
                        </p>
                    </div>
                    <div>
                        <h3>Employed in High-Risk Industries:
                        </h3>
                    </div>
                    <div>
                      <p>
                        Individuals working in industries recognized for high occupational risks, such as construction and manufacturing, are encouraged to strengthen workplace safety measures and expertise to establish safer work culture.
                        </p>
                    </div>
                    <div>
                        <h3>Employer Recommendations:  </h3>
                    </div>
                    <div>
                       <p>Individuals recommended by employers from well-known industries and organizations are provided with special recognition when considering scholarship applications.</p>
                    </div>
                </div>


                </div>
                <div class="col-md-6 ">
                    <div class="scholarship_description_right">

                    <div class="scholarship_description_first_img_wrapper">
                        <img src="images/scholarship-1.jpg" alt="">

                    </div>
                </div>

                </div>

            </div>

        </div>
    </section>

    <section class="scholarship_description_second_section">
        <div class="container">
            <div class="row scholarship_description_second_section_row">
                <div class="col-md-6">
                    <div class="scholarship_description_second_left">

                    <div class="scholarship_description_second_sec_img_wrapper">
                        <img src="images/scholarship-2.jpg" alt="">
                    </div>
                </div>




                </div>
                <div class="col-md-6 ">

                    <div class=" scholarship_description_second_right">
                        <div>
                        <h3>Financial Barrier:  </h3>
                    </div>
                    <div>
                       <p>At our core, it is acknowledged that financial hindrances can slow down your professional growth and development. Don’t let your financial barrier stop you from getting OSHA safety training. Apply now for a scholarship and unlock your potential to align with your goals.</p>
                    </div>

                    <div>
                        <h3>Essay or Statement:   </h3>
                    </div>
                    <div>
                <p>You can also avail scholarship if your reasons align with your aspirations to pursue OSHA safety training through a written statement or a detailed essay. Explain your story, goals, passion, and commitment to molding workplaces safer for all. </p>                    </div>
                </div>


                </div>

            </div>

        </div>
    </section>

    <section class="sec-padding bg-yellow text-center">
        <div class="container">
            <div class="desc">
                <h2 class="title mbpx-10 uppercase">
                    Apply now for fastest scholarship?
                </h2>
                <div class="box --course-objectives">
                    <p class="desc pl-2 pr-2 mbpx-0">
                        By applying today for the OSHA safety training scholarship, you’ll gain exposure to in-depth safety education, awareness, and expertise to execute best safety practices. Take advantage of this once-in-a-lifetime opportunity to enhance your career.
                    </p>
                </div>

                <a class="click_to_apply" target="_blank " href="https://docs.google.com/forms/d/e/1FAIpQLSf-6RGQaB7MNd8pzrISQQMxDHuW03ElH9F1E-i5tIeEwdr8VA/viewform">

                <span class="black-btn  ">    click to apply </span>
            </a>
            </div>
        </div>
    </section>


    <div id="partnerWithUsForm">
        <div class="underlay"></div>
        <div class="partnerWithUsFormWrapper">
            <span class="partnerWithUsFormCloseBtn ">
            <i class="x-icon icon-close-solid"></i>

            </span>
            <div class="formWrapper">
                <h4 class="title mbpx-40 mtpx-20">
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSf-6RGQaB7MNd8pzrISQQMxDHuW03ElH9F1E-i5tIeEwdr8VA/viewform">
                    BECOME A PARTNER
                </a>
                </h4>
                {{-- <form id="partner_with_us" method="POST" action="{{ route('partner-with-us.post') }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="control-group pb-40 focused">
                                <label class="form-label">First Name</label>
                                {{ Form::text('first_name', null, ['class' => 'form-field']) }}
                                <p class="error-msg"></p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="control-group pb-40 focused">
                                <label class="form-label">Last Name</label>
                                {{ Form::text('last_name', null, ['class' => 'form-field']) }}
                                <p class="error-msg"></p>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="control-group pb-40 focused">
                                <label class="form-label">Company Name</label>
                                {{ Form::text('company_name', null, ['class' => 'form-field']) }}
                                <p class="error-msg"></p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="control-group pb-40 focused">
                                <label class="form-label">Email</label>
                                {{ Form::text('email', null, ['class' => 'form-field']) }}
                                <p class="error-msg"></p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="control-group pb-40 focused">
                                <label class="form-label">Phone Number</label>
                                {{ Form::text('phone', null, ['class' => 'form-field']) }}
                                <p class="error-msg"></p>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="g-recaptcha ta-left pb-20"
                                 data-sitekey="6Ld0AZUUAAAAAIjZ8e5MGt4VzAODXJ-IwidgDKm0"></div>
                            <p class="error-msg pb-20"></p>
                            <br/>
                            <div class="control-group ta-left">
                                <input type="submit" value="SUBMIT">
                            </div>
                        </div>
                    </div>

                </form> --}}
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.usp-col').matchHeight();
        });
    </script>

    <!-- Add fancyBox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"
          type="text/css" media="screen"/>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".popups a").fancybox({
                thumbs: false,
                hash: false,
                loop: false,
                keyboard: false,
                toolbar: true,
                animationEffect: true,
                arrows: false,
            });
        });
    </script>
    <script defer>
        document.addEventListener('DOMContentLoaded', function () {
            function showToast(msg, icon) {
                Swal.fire({
                    width: 425,
                    icon: icon,
                    html: msg,
                    showConfirmButton: false,
                    timer: 2500,
                    timerProgressBar: true,
                    toast: true,
                    position: 'top-right'
                })
            }

            $('.show-modal').on('click', function () {
                $('#partnerWithUsForm').show();
            });
            $(document).keyup(function (e) {
                if (e.key === "Escape") {
                    $('#partnerWithUsForm').hide();
                }
            });
            $('.partnerWithUsFormCloseBtn, .underlay').on('click', function () {
                $('#partnerWithUsForm').hide();
            });

            $("#partner_with_us").submit(function (event) {
                event.preventDefault();
                var formModal = $('#partnerWithUsForm');

                $.ajax({
                    url: $(this).attr("action"),
                    type: $(this).attr("method"),
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },

                    success: function (response) {
                        formModal.hide();
                        $('.error-msg').empty();
                        $(".show-modal").off("click");

                        $(".show-modal").on("click", function() {
                            showToast(
                                '<b>Thank you for your interest in becoming a partner. We will get back to you shortly!</b>',
                                'success'
                            )
                        });

                        showToast(
                            '<b>Thank you for your interest in becoming a partner. We will get back to you shortly!</b>',
                            'success'
                        )
                    },

                    error: function (xhr, status, error) {
                        if (xhr.status === 422) {
                            var responseJSON = JSON.parse(xhr.responseText);
                            var errors = responseJSON.errors;

                            for (var key in errors) {
                                if (errors.hasOwnProperty(key)) {

                                    if (key === 'g-recaptcha-response') {
                                        $(".g-recaptcha").siblings(".error-msg").first().text(errors[key][0]);
                                    }

                                    $(`input[name="${key}"]`).siblings(".error-msg").first().text(errors[key][0]);
                                }
                            }
                        } else {
                            formModal.hide();
                            $('.error-msg').empty();

                            showToast(
                                '<b>Something went wrong</b>',
                                'error'
                            )

                        }

                    }
                });
            });
        });
    </script>
@endsection
