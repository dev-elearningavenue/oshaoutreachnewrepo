<section class="study_guide_cta_section">
    <div class="container">
        <div class="row">
            <div class=" col-lg-9 col-md-6 col-sm-12 col-12">
                <div class="study_guide_titile">
                    <h2><span class="study_guide_cta_span"><i>FREE</i></span> STUDY GUIDE</h2>
                </div>
                <div class="study_guide_cta_3button_wrapper">
                    <div><a href="{{ route('free-study-guide-osha10-30') }}">UPDATED CONTENT</a></div>
                    <div><a href="{{ route('free-study-guide-osha10-30') }}">FREE ACTIVE SHOOOTER TRAINING</a></div>
                    <div><a href="{{ route('free-study-guide-osha10-30') }}">ACCESS TO LMS</a></div>
                </div>
            </div>

            <div class=" col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="study_guide_cta_btn">
                    {{-- <a href="">SIGN UP NOW</a> --}}
                    <a href="{{ route('free-study-guide-osha10-30') }}">DOWNLOAD NOW </a>
                </div>

            </div>
        </div>
    </div>
</section>

<style>
    .study_guide_cta_3button_wrapper a:hover {
        color: #ffffff !important;
        background: #000000 !important;
        border: 2px solid #000000;
    }

    .study_guide_cta_3button_wrapper {
        display: flex;
        margin-top: 15px;
    }

    .study_guide_cta_section {
        background-image: linear-gradient(to right, #CEF0FF, #038CCA);
        padding: 50px 0 50px 0;
        margin-bottom: 50px;
    }

    .study_guide_cta_span {
        color: #FAFF00;
    }

    .study_guide_cta_3button_wrapper a {
        font-size: 18px;
        color: #000000;
        border: 2px solid #ffffff;
        border-radius: 10px;
        padding: 5px 10px;
        background: #d4f0fd;
        margin-right: 25px;
        transition: ease all 0.25s;
    }

    .study_guide_cta_btn a {
        border-radius: 45px;
        background: #000;
        padding: 15px 50px 15px 50px;
        display: inline-block;
        cursor: pointer;
        transition: ease all 0.25s;
        color: #FFF;
        font-size: 18px;
        font-weight: 600;
        line-height: normal;
        letter-spacing: 1.8px;
        text-transform: uppercase;
    }

    .study_guide_cta_btn a:hover {
        background: #ffffff !important;
        color: #000000 !important;
    }

    .study_guide_cta_section .row {
        display: flex;
        justify-content: center;
        align-items: center
    }

    .study_guide_titile h2 {
        font-size: 44px;
    }

    @media (max-width: 1400px) {
        .study_guide_cta_btn a {
            padding: 15px 30px 15px 30px;
        }
    }

    @media (max-width: 1200px) {
        .study_guide_cta_3button_wrapper a {
            font-size: 16px;
        }

        .study_guide_cta_btn a {
            font-size: 16px;
        }
    }

    @media (max-width: 992px) {
        .study_guide_titile h2 {
            font-size: 30px;
        }

        .study_guide_cta_3button_wrapper {
            flex-direction: column;
        }

        .study_guide_cta_3button_wrapper a {
            display: inline-block;
            margin: 0 0 15px 0;
        }

    }

    @media (max-width: 768px) {
        .study_guide_cta_section .row {
            text-align: center;
            flex-direction: column;
        }

        .study_guide_cta_section {
            padding: 25px 25px 25px 25px;
            margin-bottom: 30px;
        }

        .study_guide_cta_btn a {
            padding: 10px 30px 10px 30px;
        }
    }
</style>
