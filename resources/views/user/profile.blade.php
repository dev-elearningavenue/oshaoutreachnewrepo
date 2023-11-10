@extends('layouts.master')

@section('title')
    Profile
@endsection

@section('content')
    <div class="page-heading">
        <h2 class="title mbpx-0">Profile</h2>
        <p class="subtitle"></p>
    </div>
    <section class="sec-padding cart-form mtpx-30">
        <div class="container">
            <h3 class="title">My Orders</h3>
        </div>
        <div class="container">
            @if($orders->count() > 0)
            <div class="row">
                <div class="shopping-cart cart-form">
                    <table class="table table-bordered table-striped cart-table">
                        <tr>
                            <th>User Details</th>
                            <th>Products Details</th>
                            <th>Total Amount</th>
                            <th>Payment Status</th>
                            {{--<th>Actions</th>--}}
                        </tr>
                        @foreach($orders as $order)
                            <tr>
                                <td>
                                    <strong class="fs-large">{{ $order->first_name }} {{ $order->last_name }}<br/>
                                    {{ $order->email }}<br/>
                                        {{ $order->contact_no }}</strong>
                                </td>
                                <td>
                                    @foreach($order->cart->items as $item)
                                        <strong class="fs-large">${{ $item['price'] }} - {{ $item['item']['title'] }} | {{ $item['qty'] }} Units</strong><br/>
                                    @endforeach
                                </td>
                                <td><strong class="fs-large">${{ number_format($order->cart->totalPrice, 2) }}</strong></td>
                                <td><strong class="fs-large {{ $order->payment_id != "" ? 'fc-primary': 'fc-red' }}">{{ $order->payment_id != "" ? 'Paid' : 'UnPaid' }}</strong></td>
                                {{--<td></td>--}}
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            @else
                <div class="row">
                    <div class="col-sm-6 col-md-6 offset-md-3 offset-sm-3 ta-center">
                        <h4>No Orders!</h4>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection