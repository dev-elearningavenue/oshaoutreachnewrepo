<section class="banner_sec" id="scroll_to_top">
    <div class="container">
        <div class="row banner_sec_row">
            <div class="col-md-7 banner_left_col">
                <div class="banner_sec_title banner_desktop_show">
                    <h1><span class="banner_free_span"> <i>FREE</i></span> STUDY GUIDE</h1>
                    <h2>Learn From The First OSHA-Approved Guide For 2024</h2>
                </div>
                <div class="banner_list mt-4 mb-4">
                    <div class="banner_img_p_wrapper banner_points_mb">
                        <div class="banner_tic_img_wrapper">
                            <img src="{{ asset('/images/check-mark.png') }}">
                            </div>
                            <div class="banner_points_p_wrapper  ">
                            <p>PLASTIC DOL CARD</p>
                            </div>
                    </div>
                    <div class="banner_img_p_wrapper banner_points_mb">
                        <div class="banner_tic_img_wrapper">
                            <img src="{{ asset('/images/check-mark.png') }}">
                            </div>
                            <div class="banner_points_p_wrapper  ">
                            <p>INSTANT CERTIFICATE </p>
                            </div>
                    </div>
                    <div class="banner_img_p_wrapper banner_points_mb">
                        <div class="banner_tic_img_wrapper">
                            <img src="{{ asset('/images/check-mark.png') }}">
                            </div>
                            <div class="banner_points_p_wrapper  ">
                            <p>FREE STUDY GUIDE</p>
                            </div>
                    </div>
                    <div class="banner_img_p_wrapper banner_points_mb">
                        <div class="banner_tic_img_wrapper">
                            <img src="{{ asset('/images/check-mark.png') }}">
                            </div>
                            <div class="banner_points_p_wrapper  ">
                            <p>BUY NOW PAY LATER</p>
                            </div>
                    </div>
                    <div class="banner_img_p_wrapper banner_points_mb">
                        <div class="banner_tic_img_wrapper">
                            <img src="{{ asset('/images/check-mark.png') }}">
                            </div>
                            <div class="banner_points_p_wrapper  ">
                            <p>ONE FREE COURSE AT CHECKOUT </p>
                            </div>
                    </div>
                    <div class="banner_img_p_wrapper banner_points_mb">
                        <div class="banner_tic_img_wrapper">
                            <img src="{{ asset('/images/check-mark.png') }}">
                            </div>
                            <div class="banner_points_p_wrapper  ">
                            <p>GROUP DISCOUNT ON BULK

                            </p>
                            </div>
                    </div>

                     <!-- <ul>
                        <li><span>Custom LMS:</span> Tailor-Made Training Platform For Your Business</li>
                        <li><span>Exclusive Savings:</span> Save On Multiple Course Orders</li>
                        <li><span>Dedicated Support:</span> Get Expert Help Navigating The Courses</li>
                        <li><span>Free Study Guide:</span> Study the ins and outs of OSHA training for free</li>
                    </ul>  -->
                </div>

                <div>
                    <form action="" class="banner_form_wrapper" id="free_sign_up_form" method="POST">
                        <div class="banner_input_fileds_names">
                            <div>
                                <label for="">FIRST NAME</label>
                                <input type="text" required name="first_name"
                                       class="banner_input_style">
                            </div>
                            <div>
                                <label for="">LAST NAME</label>
                                <input type="text" required name="last_name"
                                       class="banner_input_style">
                            </div>
                        </div>
                        <div class="banner_input_fileds_names">
                            <div>
                                <label for="">EMAIL ADDRESS </label>
                                <input type="email" required name="email"
                                       class="banner_input_style">
                            </div>
                            <div>
                                <label for="">PHONE NUMBER</label>
                                <input type="text" required name="contactNo"
                                       id="contact_no"
                                       style="margin-top: 10px !important;"
                                       class="banner_input_style">
                                <p id="error-msg-phone" class="fc-red mt-2"></p>
                            </div>
                        </div>
                        <div class="banner_input_fileds_radio">
                            <div class="banner_radio banner_label_pad">
                                <label for="" class=" label_letter_spacing">SELECT ACCOUNT TYPE
                                </label>
                                </br>
                                <div class="banner_radio_pad">
                                    <input type="radio" required value="4" id="Individual" class="radio_input"
                                           name="accountType">
                                    <label for="Individual" class="">Individual</label>
                                    <input type="radio" value="2" id="Business" name="accountType" class="radio_input">
                                    <label for="Business">Business</label>
                                </div>
                            </div>
                            <div>
                                <input type="submit" value="SIGN UP NOW" class="banner_sign_btn">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-5 banner_right_col">
                <div class="banner_sec_title banner_mobile_show">
                    <h1><span class="banner_free_span"> <i>FREE</i></span> STUDY GUIDE</h1>
                    <h2>Learn From The First OSHA-Approved Guide For 2024 </h2>
                </div>
                <div class="banner_laptop_img">
                    <img src="images/device-1.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="banner_bottom_call_now">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>If you need any help,
                        <u onclick="jivo_api.open();" style="cursor: pointer"><b>Start a Chat</b></u>
                        or Call us now:
                        <a href="tel:+1 833 212 6742">+1 833 212 6742</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .iti--separate-dial-code .iti__selected-flag {
        border-radius: 25px 0 0 25px !important;
    }

    .banner_form_wrapper .iti__flag-container {
        position: absolute;
        top: 10px !important;
        bottom: 0;
        right: 0;
        padding: 1px;
    }

    .banner_desktop_show {
        display: block;
    }

    .banner_mobile_show {
        display: none;
        padding-top: 40px;
    }

    .banner_bottom_call_now a {
        transition: ease all 0.25s;
    }

    .banner_bottom_call_now a:hover {
        color: #f5c769;
    }

    .banner_sec {
        background-image: linear-gradient(to right, #CEF0FF, #038CCA);
        padding: 50px 0px 0px 0px;
        font-family: "Poppins";
    }

    .banner_sec_title h1 {
        color: #000000;
        font-size: 40px;
        font-style: normal;
        font-weight: 700;
    }

    .banner_sec_title h2 {
        font-size: 30px;
        color: #000000;
        font-weight: 600;
        padding-right: 70px;
        font-family: "Poppins";
    }

    .banner_free_span {
        color: #FAFF00;
    }

    .banner_list span {
        font-weight: 700;
    }

    .banner_list ul {
        line-height: 30px;
    }

    .banner_list ul li {
        list-style: none;
        font-size: 14px;
        font-family: "Poppins";
        padding-right: 20px;
    }

    .banner_input_fileds_names {
        display: flex;
        margin-bottom: 20px;
    }

    .banner_input_fileds_radio {
        display: flex;
    }

    .banner_laptop_img {
        width: 600px;
        position: relative;
    }

    .banner_laptop_img img {
        width: 100%;
        height: auto;
        position: absolute;
        left: -50px;
    }

    .banner_form_wrapper label {
        color: #45616F;
        font-weight: 600;
        font-size: 12px;
        padding-left: 20px;
        font-family: "Poppins";
    }

    .banner_input_style {
        border-radius: 50px !important;
        width: 260px !important;
        padding: 10px 20px;
        height: 50px !important;
        border: none;
        margin-top: 10px;
    }

    .banner_bottom_call_now {
        background: #000000;
        margin-top: 50px;
        padding: 10px 0 10px 0;
    }

    .banner_bottom_call_now p {
        color: #ffffff;
        font-family: "Poppins";
    }

    .banner_bottom_call_now a {
        color: #ffffff;
        font-weight: bold;
        text-decoration: underline;
        font-family: "Poppins";
    }

    .banner_sign_btn {
        width: 260px;
        border-radius: 50px;
        height: 50px;
        background: #000000 !important;
        font-weight: 600;
        font-family: "Poppins";
        letter-spacing: 1px;
        cursor: pointer;
        border: none !important;
        z-index: 1;
        position: relative;
    }

    .banner_sign_btn:hover {
        background: #ffffff !important;
        color: #000000 !important;
    }

    .banner_input_fileds_radio label {
        padding: 0px;
    }

    .banner_input_fileds_radio {
        padding-top: 5px;
    }

    .banner_radio {
        width: 50%;
    }

    .banner_label_pad {
        padding-left: 20px !important;
    }

    .banner_radio_pad {
        padding-left: 10px !important;
        margin-top: 5px;
    }

    .label_letter_spacing {
        letter-spacing: 1px;
        font-family: "Poppins";
    }

    .banner_radio_pad label {
        color: #000000;
        padding-right: 10px;
        font-size: 16px;
        padding-left: 5px;
        font-family: "Poppins";
        cursor: pointer;
    }

    .banner_radio_pad input {
        cursor: pointer;
    }

    @media screen and (max-width: 1280px) {
        .banner_laptop_img img {
            left: -50px;
            top: 20px;
        }

        .banner_laptop_img {
            width: 530px;
            position: relative;
        }
    }

    @media screen and (max-width: 1200px) {
        .banner_laptop_img {
            width: 450px;
        }

        .banner_input_style {
            width: 250px !important;
        }
    }

    @media screen and (max-width: 992px) {
        .banner_desktop_show {
            display: none;
        }

        .banner_mobile_show {
            display: block;
        }

        .banner_right_col {
            width: 100%;
        }

        .banner_laptop_img {
            position: static;
            margin: 0 auto;
        }

        .banner_laptop_img img {
            position: static;

        }

        .banner_sec_row {
            flex-direction: column-reverse;
            display: flex;
        }

        .banner_left_col {
            width: 100%
        }

        .banner_sec_title h2 {
            padding-right: 0px;
        }

        .banner_input_fileds_names > div {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .banner_input_style {
            width: 300px !important;
        }

        .banner_sign_btn {
            width: 300px;
        }

        .banner_sec {
            padding: 0px;
        }
    }

    @media screen and (max-width: 768px) {
        .banner_list ul li {
            padding-right: 0px;
        }

        .banner_bottom_call_now {
            background: #000000;
            margin-top: 30px;
            padding: 15px 0 15px 0;
        }

        input.banner_sign_btn {
            margin-top: 20px;
        }

        .banner_laptop_img {
            width: 90%;
        }

        .banner_input_fileds_names {
            flex-direction: column
        }

        .banner_input_fileds_radio {
            flex-direction: column;
        }

        .banner_input_fileds_names {
            margin-bottom: 0px;
        }

        .banner_form_wrapper input {
            margin-bottom: 15px;
        }

        .banner_input_style {
            width: 500px !important;
        }

        .banner_sign_btn {
            width: 500px;
        }
    }

    @media screen and (max-width: 600px) {
        .banner_mobile_show {
            padding-top: 30px;
        }

        .banner_list ul {
            line-height: 20px;
        }

        .banner_sec_row {
            padding: 0 30px 0 30px;
        }

        .banner_sec_title h1 {
            font-size: 35px;
        }

        .banner_radio {
            width: auto;
        }

        .banner_form_wrapper input {
            width: auto !important;
            width: 100% !important;

        }

        .banner_form_wrapper input[type="radio"] {
            width: auto !important;

        }

        .banner_sign_btn {
            display: inline-block;
            padding: 10px 50px 12px 50px !important;
        }

        .banner_sec_title h2 {
            font-size: 25px;
        }

        .banner_list ul li {
            font-size: 14px;
            font-weight: 500;
            line-height: 25px;
        }

        .banner_bottom_call_now p {
            padding: 0 30px 0 30px;
            font-size: 12px;
        }

        .banner_sec_row form input[type="submit"] {
            padding: 8px;
            margin-top: 5px;
            width: 100% !important;
        }
    }

    @media screen and (max-width: 480px) {
        .banner_sec_title h1 {
            font-size: 25px;
        }

        .banner_sec_title h2 {
            font-size: 22px;
        }
    }
</style>
{{--Swal CSS--}}
<style>

    div:where(.swal2-container) div:where(.swal2-actions):not(.swal2-loading) .swal2-styled {
        transition: ease all 0.25s;
    }

    div:where(.swal2-container) div:where(.swal2-actions):not(.swal2-loading) .swal2-styled:hover {
        background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1));
        background: var(--Gradient-One, linear-gradient(270deg, #0093E5 0.14%, #00C3C3 99.28%));
    }

    div:where(.swal2-container) button:where(.swal2-styled).swal2-confirm:focus {
        box-shadow: none;
    }

    div:where(.swal2-container) .swal2-html-container {
        margin-top: 5px;
    }

    div:where(.swal2-container) div:where(.swal2-actions) {
        margin-top: 10px;
    }

    div:where(.swal2-icon) {
        border: none;
    }

    div:where(.swal2-container).swal2-center > .swal2-popup {
        border-radius: 34px;
        padding: 30px;
    }

    .popup_congratulation {
        background: var(--Gradient-One, linear-gradient(90deg, #0093E5 0.14%, #00C3C3 99.28%));
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-align: center;
        font-family: Poppins;
        font-size: 30px;
        font-style: normal;
        font-weight: 700;
        line-height: 40px;
        text-transform: uppercase;
    }

    .success_para {
        color: #000;
        font-family: Poppins;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        margin-bottom: 20px;
    }


    .free_course_para {
        color: #000;
        text-align: center;
        font-family: Poppins;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
    }

    div:where(.swal2-container) button:where(.swal2-styled).swal2-confirm {
        border: 0;
        border-radius: 0.25em;
        background: initial;
        background-color: #7066e0;
        color: #fff;
        font-size: 1em;
        border-radius: 10px;
        background: var(--Gradient-One, linear-gradient(90deg, #0093E5 0.14%, #00C3C3 99.28%));
        padding: 10px 40px 10px 40px;
    }

    .footer_para_one {
        color: #000;
        text-align: center;
        font-family: Poppins;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        margin-bottom: 15px;
    }

    .footer_para_two {
        color: #7D7D7D;
        text-align: center;
        font-family: Poppins;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
    }

    .popup_btn_start {
        color: #FFF;
        text-align: center;
        font-family: Poppins;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        line-height: 28px;
    }

    div:where(.swal2-container) div:where(.swal2-popup) {
        width: 45em;
    }

    div:where(.swal2-container) div:where(.swal2-footer) {
        margin: 1em 0 0;
        padding: 1em 1em 0;
        color: inherit;
        font-size: 1em;
        text-align: center;
        border: none;
        margin: 0;
    }

    div:where(.swal2-container) h2:where(.swal2-title) {
        padding: 10px 0 0 0;
    }

    div:where(.swal2-icon) {
        margin: 0.5em auto 0.6em;
    }

    @media screen and (max-width: 768px) {
        div:where(.swal2-container) div:where(.swal2-popup) {
            width: 32em;
        }
    }

    @media screen and (max-width: 600px) {
        div:where(.swal2-container) div:where(.swal2-popup) {
            width: 26em;
        }

        .popup_congratulation {
            font-size: 24px;
        }

        .success_para {
            font-size: 16px;
        }

        .popup_btn_start {
            font-size: 16px;
        }
    }

    @media screen and (max-width: 450px) {
        div:where(.swal2-container) div:where(.swal2-popup) {
            width: 23em;
        }

        div:where(.swal2-container).swal2-center > .swal2-popup {
            padding: 20px;
        }

        .popup_congratulation {
            font-size: 18px;
        }

        .success_para {
            font-size: 14px;
        }

        .popup_btn_start {
            font-size: 14px;
        }

        .footer_para_one {
            font-size: 14px;

        }

        .free_course_para {
            font-size: 14px;

        }

        div:where(.swal2-container) div:where(.swal2-footer) {

            padding: 10px 0 0 0;
        }

        .footer_para_one {
            margin-bottom: 10px;
        }

        div:where(.swal2-container) div:where(.swal2-actions) {

            margin-top: 5px;
        }

        .success_para {
            margin-bottom: 10px;
        }

        div:where(.swal2-container) .swal2-html-container {

            margin: 0px;
        }

        div:where(.swal2-container) h2:where(.swal2-title) {
            padding: 0px 0 0 0;
        }
    }

    @media screen and (max-width: 400px) {

        div:where(.swal2-container) div:where(.swal2-popup) {
            width: 20em;
        }
    }
</style>
{{--Swal CSS--}}
@push('script')
    <script src="{{ asset('/src/js/intlTelInput.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/src/css/intlTelInput.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            window.phoneInput = document.querySelector("#contact_no");
            window.iti = intlTelInput(window.phoneInput, {
                initialCountry: "us",
                utilsScript: "{{ asset('src/js/utils.js') }}",
                separateDialCode: true
            });

            window.errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

            // on blur: validate
            phoneInput.addEventListener('blur', function () {
                validatePhoneNumber();
            });

            window.validatePhoneNumber = function () {
                // console.log(iti.getNumber());
                if (phoneInput.value.trim()) {
                    if (iti.isValidNumber()) {
                        $('#error-msg-phone').html('');
                        return true;
                    } else {
                        var errorCode = iti.getValidationError();
                        // console.log(errorCode);
                        if (errorCode == -99) {
                            errorCode = 4;
                        }
                        $('#error-msg-phone').html(errorMap[errorCode]);
                        return errorMap[errorCode];
                    }
                }
            }


            $('#free_sign_up_form').submit(function (e) {
                e.preventDefault()

                var contactNoValidated = validatePhoneNumber();
                if (contactNoValidated !== true) {
                    return false;
                }

                var formData = {
                    first_name: $('input[name="first_name"]').val(),
                    last_name: $('input[name="last_name"]').val(),
                    email: $('input[name="email"]').val(),
                    contactNo: window.iti.getNumber(),
                    accountType: $('input[name="accountType"]:checked').val(),
                    freeStudyGuide: true
                }

                $.ajax({
                    type: 'POST',
                    url: "{{ env('LMS_API_URL') }}/shop/orders/free-sign-up",
                    data: JSON.stringify(formData),
                    contentType: 'application/json',
                    headers: {
                        Authorization: `Bearer ${getCookie("osha-outreach-token")}`
                    },
                    success: function (response) {
                        let myDate = new Date();
                        myDate.setDate(myDate.getDate() + 7);

                        /*Set Auth Cookie*/
                        document.cookie = `osha-outreach-token=${response.auth_token};expires=${myDate};domain={{ env('COOKIE_DOMAIN') }};path=/`;

                        /*Set Profile Cookie*/
                        document.cookie = `osha-outreach-profile=${JSON.stringify(response.profile)};expires=${myDate};domain={{ env('COOKIE_DOMAIN') }};path=/`;

                        var partyPopperLink = "{{ asset('/images/party-popper.png') }}"
                        var mainContent = `
        <p class="success_para"> You’re On The Right Track </p>
        <p class="free_course_para mb-3"> Congratulations on downloading your FREE Study Guide</p>
        <p class="free_course_para">We’ve provided you access to <b> FREE Course(s) </b> along with the other discounted courses.</p>
        `
                        var footer =
                            `<p class="footer_para_one"> Your login credentials have been delivered to your email and cellphone. </p>
            <p class="footer_para_two">For further assistance, don’t hesitate to
            <u onclick="jivo_api.open();" style="cursor: pointer"><b>Chat</b></u>
            with our agent or call us at <a href="tel:+1 833 212 6742"><u> +1 833 212 6742 </u></a></p>`
                        Swal.fire({
                            title: '<strong class="popup_congratulation">Congratulations!</strong>',
                            iconHtml: `<img src="${partyPopperLink}">`,
                            customClass: {
                                icon: 'no-border'
                            },
                            html: mainContent,
                            footer: footer,
                            showCloseButton: true,
                            confirmButtonText: '<span class="popup_btn_start">Begin Learning Now</span>',
                            confirmButtonAriaLabel: 'Thumbs up, great!',
                            cancelButtonAriaLabel: 'Thumbs down'
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                window.location.href = "{{ env('LMS_URL') }}"
                            }
                        })
                    },
                    error: function (xhr, status, error) {
                        var errorMsg = "Something went wrong! Please try again"
                        if (xhr.status === 422 || xhr.status === 400) {
                            errorMsg = JSON.parse(xhr.responseText).message
                        }

                        Swal.fire({
                            width: 425,
                            icon: 'error',
                            text: errorMsg,
                            showConfirmButton: false,
                            timer: 2500,
                            timerProgressBar: true,
                            toast: true,
                            position: 'top-right'
                        })

                    }
                });

            })


        })
    </script>
@endpush

