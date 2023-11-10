@extends('layouts.master')

@section('title')
    {{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Payment Success | '.config('app.name') }}
@endsection

@section('styles')
    @if(isset($page['seo_tags']))
        @foreach($page['seo_tags'] as $meta_name => $meta_content)
            @if($meta_name != 'title')
                <meta name="{{ $meta_name }}" content="{{ $meta_content }}" />
            @endif
        @endforeach
    @endif
    <style>
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

        .bg-yellow {
            background-color: #F0BC32;
        }

        .bg-mgrey {
            background-color: #c9c9c9;
        }

        .success-page .intro{
            background-color: #005384 ;
            color: #FFFFFF;
            padding: 20px 0;
            text-align: center;
            font-size: 1.1rem;
            border: 1px solid #f2f2f2;
        }
        .success-page .container h4{
            padding: 20px;
        }
        .success-page .container > .row{
            /*border: 1px solid #c9c9c9;*/
        }
        .success-page .col-md-6.information-details{
            padding: 0;
        }
        .success-page .col-md-6.information-details h4{
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
        .success-page .col-md-6.course-details{
            padding: 0;
        }
        .success-page .col-md-6.course-details h4{
            border-left: 1px solid #f2f2f2;
            border-right: 1px solid #f2f2f2;
        }
        .success-page .col-md-6.course-details table {
            border-spacing: 0px;
            border-collapse: collapse;
            margin-bottom: 0;
        }
        .success-page .table-bordered th, .success-page .table-bordered td{
            border: 1px solid #cccccc;
        }
        .success-page .col-md-6.course-details table tr:first-of-type th{
            text-align: left;
            background: #f2f2f2;
        }

        /* strike through price */
       .price-lt {
            text-decoration: line-through;
        }
        /* strike through price */

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
        /* For shopper approved modal link */
    </style>
@endsection

@section('content')
    {{--<section class="hero-banner --inner-banner" style="background-image: url('{{ asset('images/banner-about-us.jpg') }}')">
        <div class="inner-content">
            <div class="container">
                <h2 class="title">Thank you!</h2>
            </div>
        </div>
    </section>--}}

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
                    <strong>Group Order# {{ $group_order->guoid }}</strong>
                    <br/>
                    <strong>
                        <span id="init-survey-tag" style="display: none">
                            What did you think of your recent purchase?
                            <button id="init-survey-btn" class="rate-us-btn">Rate Us</button>
                        </span>
                    </strong>
                    {{--<strong>Your Account will be ready in 2 Hours</strong>--}}
                </p>
                <div class="bg-lgrey login-div col-md-12">
                    <h4>LOGIN DETAILS</h4>
                    <p>
                        <strong>LOGIN TO LEARNING MANAGEMENT SYSTEM</strong><br>
                        <label class="bg-yellow"><a href="{{ url('lms') }}?guoid={{$group_order->guoid}}" target="_blank"
                                                    class="fc-primary td-underline">{{ url('lms') }}</a></label>
                    </p>
                    <p>
                        <strong>USERNAME</strong><br>
                        <label class="bg-yellow">{{ $group_order->username }}</label>
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
                            <th align="left">Company Name:</th>
                            <td align="left">{{ $group_order->company_name }}</td>
                        </tr>
                        <tr>
                            <th align="left">Company Type:</th>
                            <td align="left">{{ $group_order->company_type }}</td>
                        </tr>
                        <tr>
                            <th align="left">First Name:</th>
                            <td align="left" id="first_name">{{ $group_order->first_name }}</td>
                        </tr>
                        <tr>
                            <th align="left">Last Name:</th>
                            <td align="left" id="last_name">{{ $group_order->last_name }}</td>
                        </tr>
                        <tr>
                            <th align="left">Email:</th>
                            <td align="left" id="email">{{ $group_order->email }}</td>
                        </tr>
                        <tr>
                            <th align="left">Contact #:</th>
                            <td align="left" id="contact_no">{{ $group_order->contact_no }}</td>
                        </tr>
                        <tr>
                            <th align="left">Street Address:</th>
                            <td align="left" id="address">{{ $group_order->address }}</td>
                        </tr>
                        <tr>
                            <th align="left">Zip/Postal Code:</th>
                            <td align="left" id="zip_code">{{ $group_order->zip_code }}</td>
                        </tr>
                        <tr>
                            <th align="left">City:</th>
                            <td align="left" id="city">{{ $group_order->city }}</td>
                        </tr>
                        <tr>
                            <th align="left">State/Province:</th>
                            <td align="left" id="state">{{ $group_order->state }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6 course-details">
                    <h4>COURSE DETAILS</h4>
                    <table class="table table-bordered ">
                        <tr>
                            <th>COURSE NAME</th>
                            <th>PRICE</th>
                            <th>QTY</th>
                            <th>AMOUNT</th>
                        </tr>
                        @php
                            $sa_products = [];
                        @endphp
                        @foreach($cart['items'] as $key => $product)
                            @php
                                $sa_products[(string) str_pad($product['id'], 4, '0', STR_PAD_LEFT)] = $product['title'];
                            @endphp
                            <tr>
                                <td>{{ $product['title'] }}</td>
                                <td>
                                    <span class="price-lt fc-grey">
                                        <small>
                                            ${{ number_format($product['original_price'], 2) }}
                                        </small>
                                    </span>
                                    <span>${{ number_format($product['price'], 2) }}</span>
                                </td>
                                <td>{{ $product['quantity'] }}</td>
                                <td>${{ number_format($product['subtotal'], 2) }}</td>
                            </tr>
                        @endforeach
                        <tr class="fs-medium bg-lgrey">
                            <th colspan="3" class="ta-right">Total Amount:</th>
                            <th class="label-info ta-left fs-large">${{ number_format($group_order->amount, 2) }}</th>
                        </tr>
                        @if(isset($cart['couponDiscount']) && $cart['couponDiscount'] > 0)
                            <tr class="fs-medium bg-lgrey">
                                <th colspan="3" class="ta-right">Coupon Discount:</th>
                                <th class="label-info ta-left fs-large" style="color:green;">${{ number_format($cart['couponDiscount'], 2) }}</th>
                            </tr>
                        @endif
                        <tr class="fs-medium bg-lgrey">
                            <th colspan="3" class="ta-right">Total Savings:</th>
                            <th class="label-info ta-left fs-large" style="color:green;">${{ number_format($group_order->discount, 2) }}</th>
                        </tr>
                        @if(isset($group_order->free_course_qty))
                            <tr class="fs-medium bg-lgrey">
                                <th colspan="4" class="ta-left fc-primary">You also have {{ $group_order->free_course_qty }} free Courses, which you can assign from our LMS</th>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
            <br><br>
            <p class="subtitle ta-center"><a class="fc-primary" href="{{ route('home') }}">Go Back to Home Page</a></p>
        </div>
    </section>
    <style>
        @media(max-width: 426px){
            #order-div{
                padding: 10px 0 !important;
            }
        }
        .login-details-div{
            text-align: left;
            max-width: 450px;
            margin: 10px auto 0;
            border: 2px solid #dadada;
            border-radius: 7px;
            outline: none;
            border-color: #5ec23a;
            box-shadow: 0 0 10px #5ec23a;
            padding: 15px;
        }
    </style>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#init-survey-btn').click(function () {
                $('#shopper_background').show();
                $('#shopper_approved').fadeIn();
            })
        });

        var orderId = "{{ $group_order->guoid }}";
        var name = "{{ $group_order->contact_person }}";
        var email = "{{ $group_order->email }}";
        var state = "{{ $group_order->state }}";
        var sa_products = @json($sa_products);

        if(sa_products.length === 0)
            sa_products = {};

        var sa_values = {
            "site": 33391,
            "token": "ca02PjdF",
            'orderid': orderId,
            'name': name,
            'email': email,
            'country': 'United States',
            'state': state
        };

        function saLoadScript(src) {
            var js = window.document.createElement("script");
            js.src = src;
            js.type = "text/javascript";
            document.getElementsByTagName("head")[0].appendChild(js);

            /* Custom Code */
            js.onload = function () {
                setTimeout(function () {
                    if ($('#outer_shopper_approved').length === 1) {
                        $('#init-survey-tag').show();

                        /* Hide Custom modal opening link, when survey is completed */
                        var observer = new MutationObserver(function (mutations, currentObserver) {
                            if($('#sa_thankyou').is(':visible')) {
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
    </script>
    <!--
    <h1>{{ \Carbon\Carbon::parse($group_order->created_at)  }}</h1>
    <h1>{{ \Carbon\Carbon::now() }}</h1>
    -->
    {{--@if(\Carbon\Carbon::now()->diffInMinutes(\Carbon\Carbon::parse($group_order->created_at)) < 3 )--}}
    {{--@endif--}}
@endsection
