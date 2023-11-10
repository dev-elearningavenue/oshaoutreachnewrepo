@extends('layouts.email')

@section('content')
    {{--<p>Your order has been successfully placed with the following details:</p>--}}
    <p>Thankyou! your order has been placed successfully. Your Account will be ready in 2 Hours.</p>
    <div style="padding: 10px; border: 1px solid #ccc; border-radius: 10px; margin-top:5px">
        <h2 style="text-decoration: underline; text-align: center; font-size: 16px;">Order# {{ $order->uoid }}</h2>
        <h1 style="text-decoration: underline; font-size: 20px;">Login details</h1>
        <table border="0">
            <tr>
                <th width="201px" align="left">Login Page:</th>
                <td align="left"><a href="https://www.oshaoutreachcourses.com/lms?uoid={{ $order->uoid }}" target="_blank" style="color: #005384 ;text-decoration: underline;">https://www.oshaoutreachcourses.com/lms</a></td>
            </tr>
            <tr>
                <th width="201px" align="left">Username:</th>
                <td align="left">{{ $order->username }}</td>
            </tr>
            <tr>
                <th width="201px" align="left">Password:</th>
                <td align="left">{{ $order->password }}</td>
            </tr>
        </table>
        <br/>
        <h1 style="text-decoration: underline; font-size: 20px;">User details</h1>
        <table border="0">
            <tr>
                <th colspan="2"></th>
            </tr>
            <tr>
                <th align="left">First Name:</th>
                <td>{{ $order->first_name }}</td>
            </tr>
            <tr>
                <th align="left">Last Name:</th>
                <td>{{ $order->last_name }}</td>
            </tr>
            <tr>
                <th align="left">Email:</th>
                <td>{{ $order->email }}</td>
            </tr>
            <tr>
                <th align="left">Password:</th>
                <td>{{ $order->password }}</td>
            </tr>
            <tr>
                <th align="left">Contact #:</th>
                <td>{{ $order->contact_no }}</td>
            </tr>
            <tr>
                <th align="left">Street Address:</th>
                <td>{{ $order->address }}</td>
            </tr>
            <tr>
                <th align="left">Zip/Postal Code:</th>
                <td>{{ $order->zip_code }}</td>
            </tr>
            <tr>
                <th align="left">City:</th>
                <td>{{ $order->city }}</td>
            </tr>
            <tr>
                <th align="left">State/Province:</th>
                <td>{{ $order->state }}</td>
            </tr>
            <tr>
                <th align="left">Country:</th>
                <td>{{ $order->country }}</td>
            </tr>
        </table>
        <br>
        <h1 style="text-decoration: underline; font-size: 20px;">Order details</h1>
        <table id="cart" border="1" cellspacing="0" width="100%">
            <tr>
                <th>Product</th>
                <th>Price / Unit</th>
                <th>Quantity</th>
                <th>Amount</th>
            </tr>
            @foreach($cart->items as $key => $product)
                <tr>
                    <td>{{ $product['item']['title'] }}</td>
                    <td>${{ number_format($product['item']['price'] - $cart->discount, 2) }}</td>
                    <td>{{ $product['qty'] }}</td>
                    <td>${{ number_format($product['price']- $cart->discount, 2) }}</td>
                </tr>
            @endforeach
            <tr class="fs-medium bg-lgrey">
                <th colspan="3" class="ta-right" style="text-align: right">Total Amount:</th>
                <th class="label-info ta-left fs-large">${{ number_format($order->amount, 2) }}</th>
            </tr>
            <tr class="fs-medium bg-lgrey">
                <th colspan="3" class="ta-right" style="text-align: right">You just saved:</th>
                <th class="label-info ta-left fs-large" style="color:green;">${{ number_format($order->discount, 2) }}</th>
            </tr>
        </table>
    </div>
@endsection
