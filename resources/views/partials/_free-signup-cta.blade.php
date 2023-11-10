<section class="sign_up_cta_section">
    <div class="container">
        <div class="row">
            <div class=" col-lg-9 col-md-8 col-sm-12 col-12">
                <div class="sign_up_titile">
                    <h2> SIGN UP FOR <span class="sign_up_cta_span"><i>FREE</i></span> TODAY</h2>
                </div>
                <div class="sign_up_cta_3button_wrapper">
                    <div><a href="{{ route('free-signup') }}">EXCLUSIVE SAVINGS</a></div>
                    <div><a href="{{ route('free-signup') }}">FREE ACTIVE SHOOOTER TRAINING</a></div>
                    <div><a href="{{ route('free-study-guide-osha10-30') }}">FREE STUDY GUIDE</a></div>
                </div>
            </div>

            <div class=" col-lg-3 col-md-4 col-sm-12 col-12">
                <div class="sign_up_cta_btn">
                    {{-- <a href="">SIGN UP NOW</a> --}}
                    <a href="{{ route('free-signup') }}">SIGN UP NOW </a>
                </div>

            </div>
        </div>
    </div>
</section>

<style>
    .sign_up_cta_3button_wrapper a:hover {
        color: #ffffff !important;
        background: #000000 !important;
        border: 2px solid #000000;
    }

    .sign_up_cta_3button_wrapper {
        display: flex;
        margin-top: 15px;
    }

    .sign_up_cta_section {
        background-image: linear-gradient(to right, #CEF0FF, #038CCA);
        padding: 50px 0 50px 0;
        margin-bottom: 60px;
        margin-top:30px;
    }

    .sign_up_cta_span {
        color: #FAFF00;
    }

    .sign_up_cta_3button_wrapper a {
        font-size: 18px;
        color: #000000;
        border: 2px solid #ffffff;
        border-radius: 10px;
        padding: 5px 10px;
        background: #d4f0fd;
        margin-right: 25px;
        transition: ease all 0.25s;
    }

    .sign_up_cta_btn a {
        border-radius: 45px;
        background: #000;
        padding: 15px 50px 15px 50px;
        display: inline-block;
        cursor: pointer;
        transition: ease all 0.25s;
        color: #FFF;
        font-size: 20px;
        font-weight: 600;
        line-height: normal;
        letter-spacing: 1.8px;
        text-transform: uppercase;
    }

    .sign_up_cta_btn a:hover {
        background: #ffffff !important;
        color: #000000 !important;
    }

    .sign_up_cta_section .row {
        display: flex;
        justify-content: center;
        align-items: center
    }

    .sign_up_titile h2 {
        font-size: 44px;
    }

    @media (max-width: 1400px) {
        .sign_up_cta_btn a {
            padding: 15px 30px 15px 30px;
        }
    }

    @media (max-width: 1200px) {
        .sign_up_cta_3button_wrapper a {
            font-size: 16px;
        }
    }

    @media (max-width: 992px) {
        .sign_up_titile h2 {
            font-size: 30px;
        }

        .sign_up_cta_3button_wrapper {
            flex-direction: column;
        }

        .sign_up_cta_3button_wrapper a {
            display: inline-block;
            margin: 0 0 15px 0;
        }

    }

    @media (max-width: 768px) {
        .sign_up_cta_section .row {
            text-align: center;
            flex-direction: column;
        }

        .sign_up_cta_section {
            padding: 25px 25px 25px 25px;
            margin-bottom: 30px;
        }

        .sign_up_cta_btn a {
            padding: 10px 30px 10px 30px;
            font-size: 16px;
        }
        .sign_up_cta_section {
        margin-top:0px;
    }


    }
</style>
