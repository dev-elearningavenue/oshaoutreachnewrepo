@extends('layouts.master')

@section('title', isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'PARTNER WITH US | '.config('app.name') )

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
        }

        .black-btn:hover {
            background: rgba(0, 0, 0, 0);
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
                "name": "{{ isset($page['h1_heading']) ? $page['h1_heading'] : 'PARTNER WITH US' }}"
        }
    }


    </script>
@endsection

@section('content')
    <section class="--inner-banner">
        <div class="inner-content inner-banner"
             style="background-image: url('{{ asset('images/partner-with-us-banner.webp') }}');background-position:center 10%;">
            <div class="container">
                <h1 class="title fc-white ta-center pulse-button">PARTNER WITH US</h1>
            </div>
        </div>
    </section>

    <section class="home-intro bg-grey sec-padding">
        <div class="container">
            <div class="box --course-objectives">
                <h2 class="title mbpx-10">
                    ESTABLISH A PARTNERSHIP ALLIANCE
                </h2>
                <p class="desc heavyDesc">
                    At OSHA OUTREACH COURSES, a healthy collaboration is believed to be the essence of fostering and
                    advocating workplace safety and creating a long-lasting influence in the industrial sectors
                    nationwide. We are actively welcoming strategic alliances with like-minded businesses and companies
                    that complement and share our passion for delivering OSHA-authorized health and safety courses and
                    are dedicated to offering customers growth and exceptional career opportunities.
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="title mbpx-0">
                            Mission
                        </h2>
                        <p class="desc">
                            We aim to expand market reach for each other. Joining hands with us means accessing and
                            opening new doors to an extensive range of customers and introducing your products and
                            services to reach a diverse audience.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h2 class="title mbpx-0">
                            Vision
                        </h2>
                        <p class="desc">
                            Collaborating with a well-recognized brand like ours can improve your company’s visibility
                            and credibility. Our combined marketing efforts and strengths will enhance your recognition
                            in the occupational safety and health community and beyond.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="home-intro sec-padding popups">
        <div class="container">
            <div class="imgMainBox">
                <h2 class="title mbpx-20">
                    DISPLAYING
                    <highlight>OUR</highlight>
                    BRAND NAME ON YOUR PLATFORM
                </h2>
                <div class="imgWrapper">
                    <a href="images/Mock1.webp">
                        <img src="images/Mock1.webp" alt="">
                    </a>
                </div>
            </div>
            <div class="imgMainBox">
                <h2 class="title mbpx-20">
                    EXHIBITING
                    <highlight>YOUR</highlight>
                    BRAND’S NAME ON OUR PLATFORM
                </h2>
                <div class="imgWrapper">
                    <a href="images/Mock2.webp">
                        <img src="images/Mock2.webp" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="sec-padding bg-yellow text-center">
        <div class="container">
            <div class="desc">
                <h2 class="title mbpx-10">
                    READY TO JOIN HANDS WITH US?
                </h2>
                <div class="box --course-objectives">
                    <p class="desc pl-2 pr-2 mbpx-0">
                        Whether you are a startup business, an already thriving company, or a renowned industry leader,
                        we are excited and interested in the prospect of forming a partnership alliance with your
                        business. Let’s discuss how we can develop a strong and mutually beneficial connection that
                        transforms the landscape of occupational health and safety. We look forward to advancing on this
                        expedition together!
                    </p>
                </div>
                <span class="black-btn show-modal">
                    BECOME A PARTNER
                </span>
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
                    BECOME A PARTNER
                </h4>
                <form id="partner_with_us" method="POST" action="{{ route('partner-with-us.post') }}">
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

                </form>
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
