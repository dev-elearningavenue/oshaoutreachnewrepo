@extends('layouts.new-email')

@section('content')
            <tr>
                <td height=" 40"
                    style="font-size:40px;line-height:40px;">
                </td>
            </tr>
            <tr>
                <td class="type48" align="left" width="400"
                    style="width:400px;max-width:400px;font-size: 21px;font-weight:600;text-align: center;
                                                                            font-family: 'Inter', 'Roboto', sans-serif;line-height: 50px; color: rgb(0,0,0); text-decoration: none; letter-spacing: 0px;line-height: 1.2;">
                    Hi {{$order->first_name}} {{$order->last_name}},
                </td>
            </tr>
            <tr>
                <td height="20"
                    style="font-size:20px;line-height:20px;">
                </td>
            </tr>
            <tr>
                <td class="type48" align="center" width="400"
                    style="width:400px;max-width:400px;display:block;margin:0 auto;font-size: 29px;font-family: 'Inter', 'Roboto', sans-serif;color: rgb(1, 78, 128);font-weight: 700;text-transform: uppercase;line-height: 1.2;text-align: center;text-decoration: none; letter-spacing: 2px;">
                    Did you forget something?
                </td>
            </tr>
            <tr>
                <td height="20"
                    style="font-size:20px;line-height:20px;">
                </td>
            </tr>
            <tr>
                <td class="type48" align="left" width="360"
                    style="width:360px;max-width:360px;font-size: 16px;display:block;margin:0 auto;font-family: 'Inter', 'Roboto', sans-serif;font-weight:500;color: rgb(1, 1, 1);line-height: 1.4;text-align: center;">
                    Looks like you didn't finish checking
                    out.<br/>
                    You have the following course(s) in the cart:
                </td>
            </tr>
            <tr>
                <td height="20"
                    style="font-size:20px;line-height:20px;">
                </td>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td class="type48" align="center" width="360"
                        style="font-size: 14px;font-family: 'Inter', 'Roboto', sans-serif;letter-spacing:1px;color: rgb(0, 0, 0);font-weight: bold;text-transform: uppercase;line-height: 1.2;text-align: center;">
                        {{ $product['qty'] }} x {{ $product['title'] }}
                    </td>
                </tr>
            @endforeach
            <tr>
                <td height="30"
                    style="font-size:30px;line-height:30px;">
                </td>
            </tr>
            <tr>
                <td class="type48" align="center" width="360">
                    <a href="{{ url('/order-special-offer/'.$order->uoid) }}"
                       target="_blank"
                       style="padding:10px 25px;letter-spacing:2px;font-size: 21px;font-family: 'Inter', 'Roboto', sans-serif;color: rgb(255, 255, 255);font-weight: bold;text-transform: uppercase;line-height: 1.2;text-align: center;background-color: #014e80;text-decoration: none;">
                        Resume Your ORDER
                    </a>
                </td>
            </tr>
            <tr>
                <td height=" 40"
                    style="font-size:40px;line-height:40px;">
                </td>
            </tr>
@endsection
