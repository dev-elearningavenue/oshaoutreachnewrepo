@extends('layouts.email')

@section('content')
    {{--<p>Your order has been successfully placed with the following details:</p>--}}
    <p>You have successfully place your order. Please click login page and use your credentials to start your course.</p>
    <div style="padding: 10px; border: 1px solid #ccc; border-radius: 10px; margin-top:5px">
        <h2 style="text-decoration: underline; text-align: center; font-size: 16px;">Order#{{ $order->uoid }}</h2>
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
            {{--<tr>
                <th align="left">Is this course for your employee? :</th>
                <td>{{ $order->course_for == 1 ? "Yes" : "No" }}</td>
            </tr>--}}
        </table>
        <br>
        <h1 style="text-decoration: underline; font-size: 20px;">Order details</h1>
        @php
            $orderTime = new DateTime($order->created_at);
            $estTime = new DateTimeZone("America/Toronto");
            $orderTimeEST = $orderTime->setTimezone($estTime)->format("d M Y, H:i A \(\E\S\T)");
        @endphp
        <p>{{ $orderTimeEST }}</p>
        <table id="cart" border="1" cellspacing="0" width="100%">
            <tr>
                <th>Product</th>
                <th>Price / Unit</th>
                <th>Quantity</th>
                <th>Amount</th>
            </tr>
            @foreach($products as $key => $product)
                <tr>
                    <td>{{ $product['title'] }}</td>
                    <td>{{ $product['price'] }}</td>
                    <td>{{ $product['qty'] }}</td>
                    <td>{{ $product['amount'] }}</td>
                </tr>
            @endforeach
            @if(!empty($cart->discount) || !empty($cart->couponDiscount))
                <tr>
                    <td colspan="2"></td>
                    <td><strong>Discount</strong></td>
                    <td><strong>- ${{ number_format($cart->discount, 2) }}</strong></td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td><strong>Coupon Discount</strong></td>
                    <td><strong>- ${{ number_format($cart->couponDiscount, 2) }}</strong></td>
                </tr>
                <tr>
                    <th colspan="3">Total price you paid:</th>
                    <th class="label-info">${{ number_format($order->amount, 2) }}</th>
                </tr>
            @elseif(!empty($order->discount))
                <tr>
                    <td colspan="2"></td>
                    <td><strong>Discount {{ $order->discount }}%</strong></td>
                    <td><strong>- ${{ number_format($order->discount / 100 * $cart->totalPrice, 2) }}</strong></td>
                </tr>
                <tr>
                    <th colspan="3">Total price you paid:</th>
                    <th class="label-info">${{ number_format($order->discounted_price, 2) }}</th>
                </tr>
            @else
                <tr>
                    <th colspan="3">Total price you paid:</th>
                    <th class="label-info">${{ number_format($cart->totalPrice, 2) }}</th>
                </tr>
            @endif
            @if($isManager === true)
                <tr class="fs-medium bg-lgrey">
                    <th colspan="4" class="ta-left fc-primary">You also have {{ $freeCoursesQty }} free Courses, which you can assign from our LMS</th>
                </tr>
            @endif
        </table>
    </div>
@endsection
