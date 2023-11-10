@php use App\Http\Utilities\Arrays; @endphp
@extends('layouts.master')

@section('title', isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Payment Success | '.config('app.name') )

@section('styles')
    @if(isset($page['seo_tags']))
        @foreach($page['seo_tags'] as $meta_name => $meta_content)
            @if($meta_name != 'title')
                <meta name="{{ $meta_name }}" content="{{ $meta_content }}"/>
            @endif
        @endforeach
    @endif

    <style>
        .pre-loading {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 99999;
            background: url('{{asset('/images/header-logo.png')}}') center no-repeat #fff;
        }

        .success-page .intro {
            background-color: #005384;
            color: #FFFFFF;
            padding: 20px 0;
            text-align: center;
            font-size: 1.1rem;
            border: 1px solid #f2f2f2;
        }

        .success-page .container h4 {
            padding: 20px;
        }

        .success-page .container > .row {
            /*border: 1px solid #c9c9c9;*/
        }

        .success-page .col-md-6.information-details {
            padding: 0;
        }

        .success-page .col-md-6.information-details h4 {
            border-left: 1px solid #f2f2f2;
        }

        .success-page .col-md-6.information-details table {
            border-spacing: 0px;
            border-collapse: collapse;
            margin-bottom: 0;
        }

        .success-page .col-md-6.information-details table tr th {
            text-transform: uppercase;
        }

        .success-page .col-md-6.course-details {
            padding: 0;
        }

        .success-page .col-md-6.course-details h4 {
            border-left: 1px solid #f2f2f2;
            border-right: 1px solid #f2f2f2;
        }

        .success-page .col-md-6.course-details table {
            border-spacing: 0px;
            border-collapse: collapse;
            margin-bottom: 0;
        }

        .success-page .table-bordered th, .success-page .table-bordered td {
            border: 1px solid #cccccc;
        }

        .success-page .col-md-6.course-details table tr:first-of-type th {
            text-align: left;
            background: #f2f2f2;
        }

        .bg-yellow {
            background-color: #F0BC32;
        }

        .bg-mgrey {
            background-color: #c9c9c9;
        }

        .login-div > p {
            width: 31%;
            margin: 0 1%;
            display: inline-block;
        }

        .login-div p label {
            padding: 10px 20px;
            display: inline-block;
            border-radius: 10px;
            width: 100%;
            color: #000000;
        }

        /* For shopper approved modal link */
        strong > #init-survey-tag {
            color: white !important;
            margin-top: 5px !important;
            font-weight: bold;
            cursor: pointer;
        }

        /* Rate us button */
        .rate-us-btn {
            background-color: #F0BC32;
            border: none;
            /*color: white;*/
            font-weight: bold;
            padding: 3px 9px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
        }

        .rate-us-btn:hover {
            background-color: #d9a92b;
        }
        .startYourTrainingBtn {
            background: #005384;
            padding: 5px 20px;
            display: inline-block;
            border-radius: 10px;
            width: 100%;
            color: #fff !important;
            text-decoration: none;
            text-align: center;
            font-weight: 700;
            font-size: 18px;
            border: 1px solid #005384;
            transition: ease all 0.25s;
        }

        .startYourTrainingBtn:hover {
            background: rgba(0, 0, 0, 0);
            color: #005384 !important;
        }

        /* For shopper approved modal link */

        @media (max-width: 991px) {
            .login-div > p {
                width: 320px;
                margin: 0 auto 10px;
                display: block;
            }
        }

        .login-div a {
            color: #000000;
        }

        .login-div a:hover {
            color: #666666;
        }
    </style>
@endsection

@section('content')
    <div x-data="orderDetails" x-init="getOrder()">
        <div
            x-show="!order"
            x-transition:leave.duration.800ms
            class="pre-loading"
        ></div>
        <template x-if="order">
            <section class="sec-padding ptpx-20 success-page">
                <div class="container">
                    <div class="row">
                        <p class="subtitle intro">
                            <picture style="width: 50px;margin: 0 auto 5px;">
                                <source srcset="{{ asset('/images/green-tick.webp') }}" type="image/webp">
                                <source srcset="{{ asset('/images/green-tick.png') }}" type="image/png">
                                <img src="{{ asset('/images/green-tick.png') }}" alt="Green Check">
                            </picture>
                            Thankyou! your order has been placed successfully.<br>
                            Order# <span x-text="order.uoid"></span><br/>
                            <strong></strong>
                            <br/>
                            <strong>
                            <span id="init-survey-tag">
                                What did you think of your recent purchase?
                                <button id="init-survey-btn" @click="showSAReviewModal"
                                        class="rate-us-btn">Rate Us</button>
                            </span>
                            </strong>
                        </p>
                        <div class="bg-lgrey login-div col-md-12">
                            <h4>LOGIN DETAILS</h4>
                            <p>
                                <strong>LOGIN TO LEARNING MANAGEMENT SYSTEM</strong><br>
                                <a
                                    href="{{ env('LMS_URL') }}"
                                    target="_blank"
                                    class="fc-primary td-underline startYourTrainingBtn"
                                >
                                    START YOUR TRAINING
                                </a>
                            </p>
                            <p>
                                <strong>USERNAME</strong><br>
                                <label class="bg-yellow" x-text="order.user.userName"></label>
                            </p>
                            <p class="pbpx-40">
                                <strong>PASSWORD</strong><br>
                                <label class="bg-mgrey">Check Order Confirmation Email/SMS</label>
                            </p>
                        </div>
                        <div class="col-md-6 information-details">
                            <h4>INFORMATION</h4>
                            <table class="table table-bordered">
                                <tr>
                                    <th align="left">First Name:</th>
                                    <td align="left" id="first_name" x-text="order.user.firstName"></td>
                                </tr>
                                <tr>
                                    <th align="left">Last Name:</th>
                                    <td align="left" id="last_name" x-text="order.user.lastName"></td>
                                </tr>
                                <tr>
                                    <th align="left">Email:</th>
                                    <td align="left" id="email" x-text="order.email"></td>
                                </tr>
                                <tr>
                                    <th align="left">Contact #:</th>
                                    <td align="left" id="contact_no" x-text="order.user.contactNo"></td>
                                </tr>
                                <tr>
                                    <th align="left">Street Address:</th>
                                    <td align="left" id="address" x-text="order.address"></td>
                                </tr>
                                <tr>
                                    <th align="left">Zip/Postal Code:</th>
                                    <td align="left" id="zip_code" x-text="order.zipCode"></td>
                                </tr>
                                <tr>
                                    <th align="left">City:</th>
                                    <td align="left" id="city" x-text="order.city"></td>
                                </tr>
                                <tr>
                                    <th align="left">State/Province:</th>
                                    <td align="left" id="state" x-text="order.state"></td>
                                </tr>
                                <tr>
                                    <th align="left">Country</th>
                                    <td align="left" id="country" x-text="order.country"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6 course-details">
                            <h4>COURSE DETAILS</h4>
                            <table class="table table-bordered ">
                                <tr>
                                    <th>PRODUCT</th>
                                    <th>RATE</th>
                                    <th>DISCOUNT</th>
                                    <th>QTY</th>
                                    <th>AMOUNT</th>
                                </tr>
                                <template x-for="item in order.items">
                                    <tr>
                                        <td x-text="item.title"></td>
                                        <td x-text="item.actual_price"></td>
                                        <td x-text="item.discount"></td>
                                        <td x-text="item.quantity"></td>
                                        <td x-text="item.price"></td>
                                    </tr>
                                </template>
                                <tr class="fs-medium bg-lgrey">
                                    <th colspan="4" class="ta-right">Discount</th>
                                    <th
                                        class="label-info ta-left fs-medium"
                                        style="color:green;"
                                        x-text="'$'+discount.toFixed(2)"
                                    >
                                    </th>
                                </tr>
                                <template x-if="order.promo_code">
                                    <tr class="fs-medium bg-lgrey">
                                        <th colspan="4" class="ta-right">Coupon Discount</th>
                                        <th class="label-info ta-left fs-medium" style="color:green;"
                                            x-text="'-$'+couponDiscountSuccessPage()">
                                    </tr>
                                </template>
                                <tr class="fs-medium bg-lgrey">
                                    <th colspan="4" class="ta-right">Total Amount:</th>
                                    <th class="label-info ta-left fs-medium" x-text="'$'+order.total.toFixed(2)"></th>
                                </tr>

                                <template x-if="order.buying_for == 'Group'">
                                    <tr class="fs-medium bg-lgrey">
                                        <th colspan="5" class="ta-left fc-primary">
                                            You also have
                                            <span x-text="order.free_course_qty"></span>
                                            free Courses, which you can assign from our LMS
                                        </th>
                                    </tr>
                                </template>
                            </table>
                        </div>
                    </div>
                    <br><br>
                    <p class="subtitle ta-center"><a class="fc-primary" href="{{ route('home') }}">Go Back to Home
                            Page</a></p>
                </div>
            </section>
        </template>
    </div>
@endsection

@section('scripts')
    {{--Include AlpineJS--}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script type="text/javascript">
        var authToken = getCookie("osha-outreach-token");
        document.addEventListener('alpine:init', () => {
            Alpine.data('orderDetails', () => ({
                order: null,
                discount: 0,
                couponDiscountSuccessPage() {
                    const amountAfterDiscount = this.order.total;
                    const couponAmount = this.order.promo_code.discount;
                    const couponType = this.order.promo_code.type;
                    let couponDiscount = couponAmount;

                    /* Coupon is of Percent type */
                    if (couponType === 2) {
                        /* Calculate total amount from after discount amount */
                        const totalAmount = amountAfterDiscount / (1 - (couponAmount / 100));

                        couponDiscount = totalAmount * couponAmount / 100;
                    }

                    return couponDiscount.toFixed(2);
                },
                showSAReviewModal() {
                    $('#shopper_background').show();
                    $('#shopper_approved').fadeIn();
                },
                getOrder() {
                    fetch("{{ url(env('LMS_API_URL')) }}" + '/shop/orders/' + "{{ $order_id }}", {
                        headers: {Authorization: `Bearer ${authToken}`}
                    })
                        .then(res => {
                            {{--if(res.status >= 400) {--}}
                            {{--    window.location.href = "{{ env('LMS_URL') }}"--}}
                            {{--}--}}

                                return res.json()
                        })
                        .then(res => {
                            this.order = res;
                            window._order = res;
                            sa_products = {};

                            {{-- Recording Conversions --}}
                            if(!window._order.isCodeTriggered) {
                                /*Bing Conversion*/
                                var bingTimer = setInterval(function() {
                                    if (window.uetq) {
                                        // <!-- Bing Track Variable Revenue -->
                                        window.uetq = window.uetq || [];
                                        // window.uetq.push('event', 'Purchase', {'revenue_value': GetRevenueValue(), 'currency': 'USD'});
                                        window.uetq.push('event', '', {
                                            'revenue_value': window._order.total,
                                            'currency': 'USD'
                                        });

                                        clearInterval(bingTimer);
                                    }
                                }, 100);

                                /*Gtag Conversion event*/
                                gtag('event', 'conversion', {
                                    'send_to': _order.buying_for === "Group"
                                        ? 'AW-945079766/P0x0COuPvs4DENaL08ID' : 'AW-945079766/Yq-QCKmk7MgBENaL08ID',
                                    'value': window._order.total,
                                    'currency': 'USD',
                                    'transaction_id': window._order.transaction_id
                                });

                                /*Gtag Purchase event*/
                                gtag('event', 'purchase', {
                                    "transaction_id": window._order._id,
                                    "affiliation": "OSHA Outreach Courses",
                                    'value': window._order.total,
                                    "currency": "USD",
                                    "tax": 0,
                                    "shipping": 0,
                                    "items": window._order.items.map(item => (
                                        {
                                            "id": `SKU-${item.sku.toString().padStart(4, '0')}`,
                                            "name": item.title,
                                            "brand": "OSHA Outreach Courses",
                                            "category": "Online Courses",
                                            "quantity": item.quantity,
                                            "price": item.price
                                        }
                                    ))
                                });

                                /*Twitter purchase event*/
                                var twitterTimer = setInterval(function() {
                                    if (window.twq) {
                                        // <!-- Twitter Conversion Tracking -->
                                        window.twq('track', 'Purchase', {
                                            //required parameters
                                            value: window._order.total,
                                            currency: 'USD',
                                            num_items: `${window._order.items.length}`,
                                        });
                                        clearInterval(twitterTimer);
                                    }
                                }, 100);

                                /*Facebook purchase event*/
                                var facebookTimer = setInterval(function() {
                                    if (window.fbq) {
                                        // <!-- Event snippet for Purchase - Facebook Pixel Code -->
                                        window.fbq('track', 'Purchase',
                                            // begin parameter object data
                                            {
                                                value: window._order.total,
                                                currency: 'USD',
                                                contents: window._order.items.map(item => (
                                                    {
                                                        "id": `SKU-${item.sku.toString().padStart(4, '0')}`,
                                                        "quantity": item.quantity,
                                                    }
                                                )),
                                                content_type: 'product',
                                                transaction_id: window._order.transaction_id
                                            },
                                            // end parameter object data
                                            {
                                                eventID: window._order._id
                                            }
                                        );
                                        clearInterval(facebookTimer);
                                    }
                                }, 100);

                                {{-- Update code triggered status --}}
                                fetch("{{ url(env('LMS_API_URL')) }}" + "/shop/orders/{{ $order_id }}/" + 'update/code-trigger-status', {
                                    headers: {Authorization: `Bearer ${authToken}`},
                                    method: 'PATCH'
                                })
                                    .then(res => res.json())
                                    .then(res => {
                                        window._order = res.order;
                                    });
                            }

                            {{-- Recording Conversions --}}


                            /* Calculate discount */
                            res.items.forEach(o => {
                                this.discount += ((o.actual_price - o.price) * o.quantity) + o.discount;

                                let paddedSku = o.sku.toString().padStart(4, '0')

                                sa_products[paddedSku] = o.title;
                            })

                            /*SA Script work*/
                            if (sa_products.length === 0)
                                sa_products = {};

                            sa_values = {
                                "site": 33391,
                                "token": "ca02PjdF",
                                'orderid': res._id,
                                'name': `${res.firstName} ${res.lastName}`,
                                'email': res.email,
                                'country': 'United States',
                                'state': res.state
                            };

                            function saLoadScript(src) {
                                var js = window.document.createElement("script");
                                js.src = src;
                                js.type = "text/javascript";
                                document.getElementsByTagName("head")[0].appendChild(js);

                                /* Custom Code */
                                js.onload = function () {
                                    setTimeout(function () {
                                        if ($('#router_shopper_approved').length === 1) {
                                            $('#init-survey-tag').show();

                                            /* Hide Custom modal opening link, when survey is completed */
                                            var observer = new MutationObserver(function (mutations, currentObserver) {
                                                if ($('#sa_thankyou').is(':visible')) {
                                                    $('#init-survey-tag').hide();
                                                    currentObserver.disconnect();
                                                }
                                            });

                                            var target = document.querySelector('#sa_thankyou');

                                            observer.observe(target, {
                                                attributes: true
                                            });
                                            /* Hide Custom modal opening link, when survey is completed */
                                        }
                                    }, 2500)
                                }
                                /* Custom Code */
                            }


                            var d = new Date();
                            if (d.getTime() - 172800000 > 1477399567000)
                                saLoadScript("https://www.shopperapproved.com/thankyou/rate/33391.js?d=" + d.getTime());
                            else
                                saLoadScript("//direct.shopperapproved.com/thankyou/rate/33391.js?d=" + d.getTime());
                            /*SA Script work*/
                        })
                        .catch(error => console.log(error.message))
                }
            }))


        })


    </script>
@endsection
