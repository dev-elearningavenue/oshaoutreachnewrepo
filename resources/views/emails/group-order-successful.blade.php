@extends('layouts.email')

@section('content')
    {{--<p>Your order has been successfully placed with the following details:</p>--}}
    <p>Thankyou! your order has been placed successfully.</p>
    <div style="padding: 10px; border: 1px solid #ccc; border-radius: 10px; margin-top:5px; background-color: #FFFFFF;">
        <h2 style="text-decoration: underline; text-align: center; font-size: 16px;">Group Order# {{ $group_order->guoid }}</h2>
        <h1 style="text-decoration: underline; font-size: 20px;">Login details</h1>
        <table border="0">
            <tr>
                <th width="201px" align="left">Login Page:</th>
                <td align="left"><a href="https://www.oshaoutreachcourses.com/lms?guoid={{ $group_order->guoid }}" target="_blank" style="color: #005384 ;text-decoration: underline;">https://www.oshaoutreachcourses.com/lms</a></td>
            </tr>
            <tr>
                <th width="201px" align="left">Username:</th>
                <td align="left">{{ $group_order->username }}</td>
            </tr>
            <tr>
                <th width="201px" align="left">Password:</th>
                <td align="left">{{ $group_order->password }}</td>
            </tr>
        </table>
        <br/>
        <h1 style="text-decoration: underline; font-size: 20px;">User details</h1>
        <table border="0">
            <tr>
                <th colspan="2"></th>
            </tr>
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
                <td align="left">{{ $group_order->first_name }}</td>
            </tr>
            <tr>
                <th align="left">Last Name:</th>
                <td align="left">{{ $group_order->last_name }}</td>
            </tr>
            <tr>
                <th align="left">Email:</th>
                <td align="left">{{ $group_order->email }}</td>
            </tr>
            <tr>
                <th align="left">Contact #:</th>
                <td align="left">{{ $group_order->contact_no }}</td>
            </tr>
            <tr>
                <th align="left">Street Address:</th>
                <td align="left">{{ $group_order->address }}</td>
            </tr>
            <tr>
                <th align="left">Zip/Postal Code:</th>
                <td align="left">{{ $group_order->zip_code }}</td>
            </tr>
            <tr>
                <th align="left">City:</th>
                <td align="left">{{ $group_order->city }}</td>
            </tr>
            <tr>
                <th align="left">State/Province:</th>
                <td align="left">{{ $group_order->state }}</td>
            </tr>
            <tr>
                <th align="left">Country:</th>
                <td align="left">United States</td>
            </tr>
        </table>
        <br>
        <h1 style="text-decoration: underline; font-size: 20px;">Order details</h1>
        <table id="cart" border="1" cellspacing="0" width="100%">
            <tr>
                <th>COURSE NAME</th>
                <th>PRICE</th>
                <th>QTY</th>
                <th>AMOUNT</th>
            </tr>
            @foreach($cart['items'] as $key => $product)
                <tr>
                    <td>{{ $product['title'] }}</td>
                    <td>
                        <span style="text-decoration: line-through;" class="fc-grey">
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
                <th colspan="3" class="ta-right" style="text-align: right">Total Amount:</th>
                <th class="label-info ta-left fs-large">${{ number_format($group_order->amount, 2) }}</th>
            </tr>
            @if(isset($cart['couponDiscount']) && $cart['couponDiscount'] > 0)
                <tr class="fs-medium bg-lgrey">
                    <th colspan="3" class="ta-right" style="text-align: right">Coupon Discount:</th>
                    <th class="label-info ta-left fs-large" style="color:green;">${{ number_format($cart['couponDiscount'], 2) }}</th>
                </tr>
            @endif
            <tr class="fs-medium bg-lgrey">
                <th colspan="3" class="ta-right" style="text-align: right">Total Savings:</th>
                <th class="label-info ta-left fs-large" style="color:green;">${{ number_format($group_order->discount, 2) }}</th>
            </tr>
            @if(isset($group_order->free_course_qty))
                <tr class="fs-medium bg-lgrey">
                    <th colspan="4" class="ta-left fc-primary">You also have {{ $group_order->free_course_qty }} free Courses, which you can assign from our LMS</th>
                </tr>
            @endif
        </table>
    </div>
@endsection
