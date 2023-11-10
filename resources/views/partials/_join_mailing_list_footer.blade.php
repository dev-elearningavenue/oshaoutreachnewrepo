{{-- This is same as _keep_informed_footer, just different design --}}
{{--new--}}
<section class="mailing_list_section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="mailing_list_title_para_wrapper">
                    <div>
                        <h3 class="mailing_list_title">Join our mailing list</h3>
                    </div>
                    <div>
                        <p class="mailing_list_para">Get announcements, industry updates and
                            promotional offers.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div>
                    <form method="POST" id="subscribe_form">
                        <div class="">
                            <input type="text" class="" name="name" placeholder="Enter Full Name">
                        </div>
                        <div class="">
                            <input type="email" class="" name="email" placeholder="Enter Email Address">
                        </div>
                        <div>
                            <button type="submit" class="mailing_submit_btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@push('script')
    <script type="text/javascript">
        $(document).ready(function () {
            var subscribeRoute = "{{ env('LMS_API_URL') . "/shop/contact" }}"

            $("#subscribe_form").on('submit', function (e) {
                e.preventDefault();

                var emailField = $(this).find("input[name='email']");
                var nameField = $(this).find("input[name='name']");
                var subscribeBtn = $(this).find(".mailing_submit_btn");

                subscribeBtn.prop('disabled', true)

                fetch(subscribeRoute, {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify({email: emailField.val(), name: nameField.val(), form: 2})
                })
                    .then(response => response.json())
                    .then(result => {
                        alert("You are now subscribed")

                        // clear both name & email
                        emailField.val("")
                        nameField.val("")

                        subscribeBtn.prop('disabled', true)
                    })
                    .catch(error => {
                        subscribeBtn.prop('disabled', false)
                    });

            })
        });
    </script>
@endpush

<style>
    .mailing_list_section {
        background: #F6FAFB;
        padding: 30px 0px;
    }

    .mailing_list_section form {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .mailing_list_section .row {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .mailing_list_para {
        color: #7B7B7B;
        font-family: Source Sans Pro;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .mailing_list_title {
        font-family: Poppins;
        font-size: 25px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        text-transform: uppercase;
        background: var(--Gradient-One, linear-gradient(90deg, #0093E5 0.14%, #00C3C3 99.28%));
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .mailing_list_section form input {
        border-radius: 45px;
        background: #FFF;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.10);
        width: 240px;
    }

    .mailing_submit_btn {
        border-radius: 45px;
        background: #0195E5;
        color: #FFF;
        text-align: center;
        font-family: Poppins;
        font-size: 18px;
        font-style: normal;
        font-weight: 800;
        line-height: normal;
        letter-spacing: 1.8px;
        text-transform: uppercase;
        border: none;
        padding: 7px 30px 7px 30px;
        cursor: pointer;
        transition: ease all 0.25s;
    }

    .mailing_submit_btn:hover {
        background: #000000;
        color: #ffffff;
    }

    ::placeholder {
        color: red;
        opacity: 1;
        /* Firefox */
    }

    :-ms-input-placeholder {
        /* Internet Explorer 10-11 */
        color: red;
    }

    ::-ms-input-placeholder {
        /* Microsoft Edge */
        color: red;
    }

    @media screen and (max-width: 1200px) {
        .mailing_list_section form input {
            width: 100%;
        }
    }

    @media screen and (max-width: 992px) {
        .mailing_list_section form {
            display: flex;
            justify-content: space-between;
            align-items: normal;
            flex-direction: column;
        }

        .mailing_list_title_para_wrapper {
            margin-bottom: 30px;
        }

        .mailing_list_section form input {
            width: 100%;
            margin-bottom: 20px;
        }
    }

    @media screen and (max-width: 768px) {
        .mailing_list_section .row {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .mailing_list_section {
            padding: 30px 30px;
        }
    }
</style>
