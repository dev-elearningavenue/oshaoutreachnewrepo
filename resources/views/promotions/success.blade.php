@extends('layouts.promotional_sale')

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
        .bg-yellow{
            background-color: #F0BC32;
        }
        .bg-mgrey{
            background-color: #c9c9c9;
        }
        .login-div > p {
            width: 31%;
            margin: 0 1%;
            display: inline-block;
        }
        .login-div p label{
            padding: 10px 20px;
            display: inline-block;
            border-radius: 10px;
            width: 100%;
            color: #000000;
        }
        @media(max-width: 991px){
            .login-div > p {
                width: 320px;
                margin: 0 auto 10px;
                display: block;
            }
        }
        .login-div a{
            color: #000000;
        }
        .login-div a:hover{
            color: #666666;
        }
    </style>
@endsection

@section('content')
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
                    Order# {{ $order->uoid }}<br/>
                    <strong>Your Account will be ready in 2 Hours</strong>
                </p>
                <div class="bg-lgrey login-div col-md-12">
                    <h4>LOGIN DETAILS</h4>
                    <p>
                        <strong>LOGIN TO LEARNING MANAGEMENT SYSTEM</strong><br>
                        <label class="bg-yellow"><a href="{{ url('lms') }}?uoid={{$order->uoid}}" target="_blank" class="fc-primary td-underline">{{ url('lms') }}</a></label>
                    </p>
                    <p>
                        <strong>USERNAME</strong><br>
                        <label class="bg-yellow">{{ $order->username }}</label>
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
                            <td align="left">{{ $order->first_name }}</td>
                        </tr>
                        <tr>
                            <th align="left">Last Name:</th>
                            <td align="left">{{ $order->last_name }}</td>
                        </tr>
                        <tr>
                            <th align="left">Email:</th>
                            <td align="left">{{ $order->email }}</td>
                        </tr>
                        <tr>
                            <th align="left">Contact #:</th>
                            <td align="left">{{ $order->contact_no }}</td>
                        </tr>
                        <tr>
                            <th align="left">Street Address:</th>
                            <td align="left">{{ $order->address }}</td>
                        </tr>
                        <tr>
                            <th align="left">Zip/Postal Code:</th>
                            <td align="left">{{ $order->zip_code }}</td>
                        </tr>
                        <tr>
                            <th align="left">City:</th>
                            <td align="left">{{ $order->city }}</td>
                        </tr>
                        <tr>
                            <th align="left">State/Province:</th>
                            <td align="left">{{ $order->state }}</td>
                        </tr>
                        <tr>
                            <th align="left">Country</th>
                            <td align="left">United States</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6 course-details">
                    <h4>COURSE DETAILS</h4>
                    <table class="table table-bordered ">
                        <tr>
                            <th>PRODUCT</th>
                            <th>RATE</th>
                            <th>QTY</th>
                            <th>AMOUNT</th>
                        </tr>
                        @if(count($cart->items))
                            @foreach($cart->items as $key => $product)
                                <tr>
                                    <td>{{ $product['item']['title'] }}</td>
                                    <td>${{ number_format($product['item']['price'] - $cart->discount, 2) }}</td>
                                    <td>{{ $product['qty'] }}</td>
                                    <td>${{ number_format($product['price']- $cart->discount, 2) }}</td>
                                </tr>
                            @endforeach
                        @endif
                        <tr class="fs-medium bg-lgrey">
                            <th colspan="3" class="ta-right">Total Amount:</th>
                            <th class="label-info ta-left fs-large">${{ number_format($order->amount, 2) }}</th>
                        </tr>
                        <tr class="fs-medium bg-lgrey">
                            <th colspan="3" class="ta-right">You just saved:</th>
                            <th class="label-info ta-left fs-large" style="color:green;">${{ number_format($order->discount, 2) }}</th>
                        </tr>
                    </table>
                </div>
            </div>
            <br><br>
            <p class="subtitle ta-center"><a class="fc-primary" href="{{ route('home') }}">Go Back to Home Page</a></p>
        </div>
    </section>
@endsection

@section('scripts')
@endsection