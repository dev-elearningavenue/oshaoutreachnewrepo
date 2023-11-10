@inject('arrays','App\Http\Utilities\Arrays')
@extends('layouts.master')

@section('title')
    Checkout
@endsection

@section('content')
    <div class="page-heading">
        <h1 class="title mbpx-0">Checkout</h1>
        <p class="subtitle"></p>
    </div>
    
<section class="sec-padding">
        <div class="container">
            <h3 class="title mbpx-20">Cart Details</h3>
            <div class="shopping-cart cart-form">
                <table class="table table-bordered table-striped cart-table">
                    <tr>
                        <th>Product</th>
                        <th>Price / Unit</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                    </tr>
                    @foreach($cart->items as $product)
                        <tr>
                            <td><strong class="fs-large">{{ $product['item']['title'] }}</strong></td>
                            <td><strong class="fs-large">${{ number_format($product['item']['price'], 2) }}</strong></td>
                            <td><strong class="fs-large">{{ $product['qty'] }}</strong></td>
                            <td><strong class="fs-large">${{ number_format($product['price'], 2) }}</strong></td>
                        </tr>
                    @endforeach
                    <tr>
                        <th colspan="3">Total price you are going to pay:</th>
                        <th class="label-info">${{ number_format($total, 2) }}</th>
                    </tr>
                </table>

                <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : ''  }}">
                    {{ Session::get('error') }}
                </div>
            </div>

            <h3 class="title mbpx-20">User Details</h3>

            {!! Form::open(['route' => 'checkoutPost', 'method' => 'post', 'id' => 'checkout-form']) !!}
            <div class="row">
                <div class="col-md-6">
                    <div class="control-group">
                        <label for="email">First Name</label>
                        <label class="desc">{{ $order->first_name }}</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="control-group">
                        <label for="email">Last Name</label>
                        <label class="desc">{{ $order->last_name }}</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="control-group">
                        <label for="email">E-Mail</label>
                        <label class="desc">{{ $order->email }}</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Contact #</label>
                        <label class="desc">{{ $order->contact_no }}</label>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="control-group">
                        <label for="email">Street Address</label>
                        <label class="desc">{{ $order->address }}</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="control-group">
                        <label for="email">ZIP/Postal Code</label>
                        <label class="desc">{{ $order->zip_code }}</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="control-group">
                        <label for="email">City</label>
                        <label class="desc">{{ $order->city }}</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="control-group">
                        <label for="email">State/Province</label>
                        <label class="desc">{{ $order->state }}</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="control-group">
                        <label for="email">Country</label>
                        <label class="desc">{{ $order->country }}</label>
                    </div>
                </div>
            </div>

            <div class="row mtpx-30">
                <div id="paypal-button" class="col-md-6"></div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
        paypal.Button.render({
            // Configure environment
            env: 'sandbox',
            client: {
                sandbox: 'AeArJVidCzrZD8sRv_0_vxcrqWguBdpbTsPJO0FFhJfMNYErjA5IVU1TAoY-OXmzzpll9q9_fYokYLpi',
                production: 'demo_production_client_id'
            },
            // Customize button (optional)
            locale: 'en_US',
            style: {
                layout: 'horizontal',
                size: 'medium',
                color: 'blue',
                shape: 'rect',
            },
            // Set up a payment
            payment: function(data, actions) {
                console.log('payment data:');
                console.log(data);
                console.log('payment data:');
                console.log(actions);
                return actions.payment.create({
                    transactions: [{
                        amount: {
                            total: '{{ number_format($total, 2) }}',
                            currency: 'USD',
//                            details: {
                                {{--subtotal: '{{ number_format($total, 2) }}',--}}
                                {{--tax: '{{ number_format($total * 0.9, 2) }}'--}}
//                            }
                        },
                        description: 'Course(s) bought - OSHA Out Reach',
                        custom: '{{ $order->uoid }}',
                        invoice_number: '{{ $order->id }}',
                        item_list: {
                            items: [
                                @foreach($cart->items as $item)
                                {
                                    name: '{{ $item['item']->title }}',
                                    description: '{{ $item['item']->description }}',
                                    quantity: '{{ $item['qty'] }}',
                                    price: '{{ number_format($item['price'] / $item['qty'], 2) }}', // required price per unit
                                    {{--tax: '{{ number_format($item['price'] * 0.1, 2) }}',--}}
                                    sku: 'ProductID_{{$item['item']['id']}}',
                                    currency: 'USD'
                                },
                                @endforeach
                            ],
                            shipping_address: {
                                recipient_name: '{{ $order->first_name }} {{ $order->last_name }}',
                                line1: '{{ $order->address }}',
                                line2: '',
                                city: '{{ $order->city }}',
                                country_code: '{{ $order->country }}',
                                postal_code: '{{ $order->zip_code }}',
                                phone: '+{{ $order->contact_no }}',
                                state: '{{ $order->state }}'
                            }
                        }
                    }]
                });
            },
            // Execute the payment
            onAuthorize: function(data, actions) {
//                console.log('onAuthorize data:');
//                console.log(data);
//                console.log('onAuthorize data:');
//                console.log(actions);
                return actions.payment.execute()
                    .then(function(data) {
                        //console.log(data);
                        window.location = '{{ route('thankyou') }}';
                        // Show a confirmation message to the buyer
                        //window.alert('Thank you for your purchase!');
                    });
            },
            onCancel: function(data, actions) {
//                console.log('onCancel data:');
//                console.log(data);
//                console.log('onCancel data:');
//                console.log(actions);
            },
            onError: function(data, actions) {
//                console.log('onError data:');
//                console.log(data);
//                console.log('onError data:');
//                console.log(actions);
            }
        }, '#paypal-button');
    </script>

    <script>
        $(document).ready(function (){

            //check_state();
            check_country();

            $('#state_select').change(function(){
                check_state();
            });
            $('#country').change(function(){
                $("#state").val('');
                check_country();
            });

            function check_state() {
                $('#state').val($('#state_select').val())
            }

            function check_country() {
                if($('#country').val() == 'United States'){
                    // Hide State Text Field
                    $('#state').hide();
                    // Show State Dropdown
                    $('#state_select').show();
                } else {
                    // Hide State Dropdown
                    $('#state_select').hide();
                    // Show State Text Field
                    $('#state').show();
                }
            }
        });
    </script>
    <style>
        label.desc{
            display: block;
            font-size: 16px;
            font-weight: normal;
        }
    </style>
@endsection
