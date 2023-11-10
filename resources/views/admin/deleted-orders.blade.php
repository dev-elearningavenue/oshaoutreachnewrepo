{{--@if(count($orders) == 0)--}}
{{--    <script>--}}
{{--        window.location = '/admin/deleted-orders'--}}
{{--    </script>--}}
{{--@endif--}}

@extends('layouts.admin')

@section('title')
    All Orders
@endsection

@section('content')
    <div class="row">
        <div id="restore-message-alert"
                 class="alert alert-success c-alert-danger"
                 style="margin: 0 10px 30px 10px; display: none;">
                <span class="closebtn" onclick="closeAlert()">&times;</span>
        </div>

        {!! Form::open(['route' => 'admin.get-deleted-orders', 'method' => 'get']) !!}
        <div class="col-md-3">
            <div class="control-group focused">
                <label class="form-label">Start Date</label>
                {{ Form::date('start_date', null, ['class' =>'form-field', 'autocomplete' => 'off', 'max' => date('Y-m-d')]) }}
            </div>
        </div>
        <div class="col-md-3">
            <div class="control-group focused">
                <label class="form-label">End Date</label>
                {{ Form::date('end_date', null, ['class' =>'form-field', 'autocomplete' => 'off', 'max' => date('Y-m-d')]) }}
            </div>
        </div>
        <div class="col-md-3">
            <input type="submit" class="btn --btn-primary --btn-small mbpx-10" value="Search">
        </div>
{{--        @if(request()->input('zero_amount'))--}}
{{--            <input type="hidden" name="zero_amount" value="1"/>--}}
{{--        @endif--}}
        {!! Form::close() !!}
    </div>
    <table class="table table-bordered table-striped" id="orders-table">
        <thead>
        <tr>
            <th>Created At / Deleted At</th>
            <th>Order ID</th>
            <th>User Details</th>
            <th>Order Details</th>
            <th>Amount</th>
            <th>Payment Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>
                    <strong>{{ \Carbon\Carbon::parse($order->created_at)->timezone('Canada/Eastern')->format('Y/m/d H:i A') }}</strong>
                    <br/><br/>
                    <strong style="color: red;">{{ \Carbon\Carbon::parse($order->deleted_at)->timezone('Canada/Eastern')->format('Y/m/d H:i A') }}</strong>
                </td>
                <td>
                    @if($order->payment_status)
                        <a class="fc-primary" href="/success?uoid={{ $order->uoid }}"
                           target="_blank"><strong>{{ $order->uoid }}</strong></a><br/>
                    @else
                        {{ $order->uoid }}<br/>
                    @endif
                    @if($order->is_completed)
                        <span class="badge badge-complete">Completed</span>
                    @else
                        <span class="badge badge-incomplete">Incomplete</span>
                    @endif
                    @if(in_array($order->client_of, [1,2,3]))
                            <span class="badge badge-bdm">BDM {{ $order->client_of }}</span>
                    @endif
                </td>
                <td>
                    <div id="user-details-{{$order->id}}">
                        {{ $order->first_name }} {{ $order->last_name }}<br/>
                        Email: {{ $order->email }}<br/>
                        Username: {{ $order->username }}<br/>
                        Password: {{ $order->password }}<br/>
                        Contact#: {{ $order->contact_no }}<br/>
                    </div>
                    Address: {{ $order->address }}, {{ $order->zip_code }}<br/>
                    {{ $order->city }}, {{ $order->state }}, {{ $order->country }}<br/><br/>
                </td>
                <td>
                    @php
                        try {
                            $cart = new App\Models\Cart(unserialize($order->cart));
                        }catch(\Exception $ex){
                            $cart = new App\Models\Cart();
                        }

                        $cart->order_id = $order->id;
                    @endphp
                    @if($cart->items !== null)
                        @foreach($cart->items as $product)
                            {{ $product['item']['title'] }}<br/>
                            Qty: <strong>{{ $product['qty'] }}</strong>, Price/Unit:
                            <strong>${{ number_format($product['item']['price'], 2) }}</strong><br/>
                        @endforeach
                    @endif
                </td>
                <td>${{ $order->discounted_price > 0 ? $order->discounted_price : $order->amount }}</td>
                <td>
                    <strong>{{ $order->payment_status ? "Paid" : "Unpaid" }}</strong><br/><br/>
                    @if(auth()->user()->id === 1)
                        <button
                            style="font-size: 12px;padding: 5px 4px;"
                            class="btn --btn-primary --btn-small delete-order"
                            onclick="confirmRestore($(this),'Are you sure you want to restore Order # {{ $order->uoid }}', {{ $order->id }})"
                        >
                            Restore Order
                        </button>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <style>
        form input[type=date] {
            color: #666666;
            padding: 10px 20px;
            height: 44px;
            width: 100%;
            font-size: 14px;
            border: 1px solid #eeeeee;
            background: #ffffff;
            border-radius: 4px;
            position: relative;
            z-index: 4;
        }

        .badge {
            padding: 3px 7px;
            border-radius: 15px;
            font-size: 11px;
            margin-top: 5px;
            display: inline-block;
        }

        .badge-complete {
            background: #005384;
            color: #ffffff;
        }

        .badge-incomplete {
            background: #74787E;
            color: #ffffff;
        }

        .badge-bdm {
            background: #00b100;
            color: #ffffff;
        }


        .alert-success {
            background-color: #04AA6D;
            color: white;
        }

        .c-alert-danger {
            background-color: #f44336;
            color: white;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        div#restore-message-alert {
            z-index: 99;
            position: fixed;
            top: 50px;
            right: 30px;
            width: 19%;
        }
    </style>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            table = $('#orders-table').DataTable({
                paging: true,
                pageLength: 50,
                lengthMenu: [[10, 25, 50, 100, 250, 500, -1], [10, 25, 50, 100, 250, 500, "All"]],
                order: [[0, 'desc']]
            });
        });

        function confirmRestore(elemRef, message = 'Are you sure you want to restore', orderID) {
            var confirm = window.confirm(message);

            if (confirm) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('admin.restore-order', '') }}" + "/" + orderID,
                    success: function(res) {
                        var alertDiv = $('#restore-message-alert');

                        if(res.type === 'success') {
                            table
                                .row( elemRef.parents('tr') )
                                .remove()
                                .draw();

                            alertDiv.attr('class', 'alert alert-success');
                            alertDiv.append('<strong>'+res['order-restore-message']+'</strong>');
                        } else {
                            alertDiv.attr('class', 'alert c-alert-danger');
                            alertDiv.append('<strong>'+res['order-restore-message']+'</strong>');
                        }

                        alertDiv.fadeIn(1500);
                        alertDiv.fadeTo(2000, 500).slideUp(500, function () {
                            alertDiv.slideUp(1500);
                            $('#restore-message-alert strong').remove();
                        });
                    },
                    error: function() {
                         alert('Something went wrong');
                    }
                })
            }
        }

        function closeAlert() {
            var alertDiv = $('#restore-message-alert');

            alertDiv.hide();
            $('#restore-message-alert strong').remove();
        }
    </script>

@endsection
