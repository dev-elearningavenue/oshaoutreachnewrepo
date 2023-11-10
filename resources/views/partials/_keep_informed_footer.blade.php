<section class="" style="background-color: #8b909a">
    <div class="container ptpx-20 pbpx-20">
        <form class="row" method="POST" id="subscribe_form">
            <div class="col-md-4 col-sm-12 ">
                <h4>KEEP INFORMED</h4>
                <p class="p-0 fc-white">Stay upto date with all the latest news, Industry updates and promotions</p>
            </div>

            <div class="col-md-3 col-sm-12 ">
                <input type="text" required name="name" placeholder="Enter your name"/>
            </div>
            <div class="col-md-3 col-sm-12 ">
                <input type="email" required name="email" placeholder="Enter your email"/>
            </div>
            <div class="col-md-2 col-sm-12">
                <button class="subscribe-btn">
                    Subscribe
                </button>
            </div>
        </form>
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
                var subscribeBtn = $(this).find(".subscribe-btn");

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
    .subscribe-btn {
        padding-left: 10px;
        display: block;
        margin-top: 30px;
    }

    .subscribe-btn {
        border-radius: 4px;
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

    .subscribe-btn:hover {
        /*background-color: rgba(0, 83, 132, 0);*/
        color: black;
        background-color: #ffffff;

    }

    .subscribe-btn:disabled {
        opacity: 50%;
        cursor: not-allowed;
    }

    form#subscribe_form {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #subscribe_form input{
        height: auto;
        padding: 8px 20px;
    }

    @media only screen and (max-width: 991px) {
        #subscribe_form input {
            padding: 8px 10px;
        }

    }

    @media only screen and (max-width: 767px) {
        #subscribe_form {
            flex-direction: column;
        }

        button.subscribe-btn {
            margin-top: 10px;
        }

        #subscribe_form inputinput {
            margin-top: 15px !important;
        }

        #subscribe_form input[type="text"], #subscribe_form input[type="email"] {
            margin-top: 15px !important;
        }

        button.subscribe-btn {
            margin: 15px 5px 0 0;
        }

    }

</style>
