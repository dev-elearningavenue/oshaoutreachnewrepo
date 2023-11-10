<section class="safety_compliance_section">
    <div class="container ">
        <div class="row ">
            <div class="col-md-12 ">
                <div class="start_journey">
                    <div class="start_journey_ineer_wrapper">
                        <div>
                            <h3 class="start_journey_title">{{ $title ?? "Start Your Journey Towards Safety Compliance" }}</h3>
                        </div>
                        <a href="{{ $btnLink }}" class="journey_sign_up_btn journey_sign_up_btn_wrapper">{{ $btn_text ?? "sign up
                            now"}}</a>
                    </div>
                    <div class="journey_img_col">
                        <div class="journey_img_wrapper">
                            <img src="images/safety-compliance.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    html {
        scroll-behavior: smooth;
    }

    .start_journey {
        border-radius: 20px;
        background: linear-gradient(90deg, #0093E5 0.14%, #00C3C3 99.28%);
        margin-bottom: 70px;
        padding: 0 60px 10px 60px;
        margin-top: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }

    .start_journey_ineer_wrapper {
        width: 50%;
    }

    .journey_img_col {
        width: 50%;
    }

    .start_journey_title {
        color: #FFF;
        font-family: Poppins;
        font-size: 40px;
        font-style: normal;
        font-weight: 700;
        line-height: 55px;
    }

    .journey_sign_up_btn_wrapper {
        border-radius: 45px;
        background: #000;
        padding: 10px 50px 10px 50px;
        margin-top: 30px;
        display: inline-block;
        cursor: pointer;
        transition: ease all 0.25s;
    }

    .journey_sign_up_btn_wrapper:hover {
        background: #ffffff !important;
        color: #000000 !important;
    }

    .journey_sign_up_btn_wrapper:hover .journey_sign_up_btn {
        color: #000000 !important;
    }

    .journey_sign_up_btn {
        color: #FFF;
        font-size: 18px;
        font-style: normal;
        font-weight: 800;
        line-height: normal;
        letter-spacing: 1.8px;
        text-transform: uppercase;
    }

    .journey_img_wrapper {
        position: relative;
        top: -69px;
        width: 500px;
        right: 50px;
        height: 330px
    }

    @media screen and (max-width: 992px) {
        .start_journey_title {
            font-size: 30px;
            line-height: 35px;
        }

        .journey_img_wrapper {
            position: relative;
            top: -68px;
            width: 412px;
            right: 108px;
            height: 260px;
        }

        .start_journey {
            margin-top: 55px;
        }
    }

    @media screen and (max-width: 768px) {
        .start_journey {
            padding: 0 60px 60px 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            flex-direction: column-reverse;
            text-align: center;
        }

        .journey_img_wrapper {
            position: relative;
            top: -68px;
            width: 380px;
            right: 50px;
            height: 260px;
        }

        .journey_img_col {
            width: 100%;
        }

        .start_journey_ineer_wrapper {
            width: 100%;
        }
    }

    @media screen and (max-width: 600px) {
        .start_journey {
            margin-bottom:30px;
        }

        .safety_compliance_section {
            padding: 0 30px 0 30px;
        }

        .journey_img_wrapper {
            right: 66px;
            height: 244px;
        }
    }

    @media screen and (max-width: 500px) {
        .start_journey {
            padding: 0 40px 40px 40px;
        }

        .journey_img_wrapper {
            right: 38px;
            width: 300px;
            height: 186px;
        }

        .start_journey_title {
            font-size: 25px;
            line-height: 30px;
        }

        .journey_sign_up_btn_wrapper {
            padding: 10px 25px 10px 25px;
        }

        .journey_sign_up_btn {
            font-size: 16px;
        }
    }

    @media screen and (max-width: 450px) {
        .journey_img_wrapper {
            right: 50px;
        }
    }

    @media screen and (max-width: 415px) {
        .journey_img_wrapper {
            right: 73px;
        }
    }

    @media screen and (max-width: 400px) {
        .journey_img_wrapper {
            right: 80px;
        }
    }

    @media screen and (max-width: 375px) {
        .journey_img_wrapper {
            right: 85px;
        }
    }
</style>
