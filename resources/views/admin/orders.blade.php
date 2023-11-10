{{--@if(count($orders) == 0)--}}
{{--    <script>--}}
{{--        window.location = '/admin/orders'--}}
{{--    </script>--}}
{{--@endif--}}

@extends('layouts.admin')

@section('title')
    All Orders
@endsection

@section('content')
    @if(auth()->user()->type === USER_TYPE_ADMIN)
        @include('admin.partials._sale_boxes')
    @endif

    <div class="row">
        <div id="delete-message-alert"
             class="alert alert-success c-alert-danger"
             style="margin: 0 10px 30px 10px; display: none;">
            <span class="closebtn" onclick="closeAlert()">&times;</span>
        </div>
        {!! Form::open(['route' => 'admin.orders', 'method' => 'get']) !!}
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
        @if(request()->input('zero_amount'))
            <input type="hidden" name="zero_amount" value="1"/>
        @endif
        {!! Form::close() !!}
        <div class="col-md-3">
            @if(Auth::user()->type == USER_TYPE_ADMIN)
                <a href="{{ $download_link }}" target="_blank"
                   class="btn --btn-primary --btn-small float-right mbpx-10">Download Orders</a>
            @endif
        </div>
    </div>
    @if(Auth::user()->type == USER_TYPE_ADMIN)
        <div class="row">
            <div class="col-md-3">
                <button class="btn --btn-primary --btn-small" id="btnDoOrderDiscount">Offer Discount</button>
            </div>
            <div class="col-md-4">
                <button class="btn --btn-white --btn-small" data-checked="false" id="btnSelectAll">Select All Offer
                    Discount
                </button>
            </div>
        </div>
    @endif
    <table class="table table-bordered table-striped" id="orders-table">
        <thead>
        <tr>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Order ID</th>
            <th>User Details</th>
            <th>Order Details</th>
            <th>Amount</th>
            <th>Payment Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            @php
                $paymentStatus = PAYMENT_STATUS[$order->payment_status]
            @endphp
            <tr>
                <td>
                    <strong>{{ \Carbon\Carbon::parse($order->created_at)->timezone('Canada/Eastern')->format('Y/m/d H:i A') }}</strong>
                </td>
                <td>
                    <strong>{{ \Carbon\Carbon::parse($order->updated_at)->timezone('Canada/Eastern')->format('Y/m/d H:i A') }}</strong>
                </td>
                <td>
                    @if($paymentStatus == "Paid")
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
                    @if($paymentStatus == "Paid")
                        <br><br>
                        <a href="javascript:;" class="send-comm" data-order-id="{{ $order->id }}"
                           data-comm="{{ COMMUNICATION_EMAIL }}">
                            <button style="font-size: 12px;padding: 5px 4px;" class="btn --btn-primary --btn-small">Send
                                Success Email
                            </button>
                        </a>
                        <br><br>
                        <a href="javascript:;" class="send-comm" data-order-id="{{ $order->id }}"
                           data-comm="{{ COMMUNICATION_SMS }}">
                            <button style="font-size: 12px;padding: 5px 4px;" class="btn --btn-primary --btn-small">Send
                                Success SMS
                            </button>
                        </a>
                    @endif
                    <br/>
                    @if($order->uoid !== null)
                        <a class="fc-primary mtpx-10"
                           href="{{ route('admin.orders.logs', ['uoid' => $order->uoid, 'log_type' => LOG_TYPE_INDIVIDUAL]) }}"
                           target="_blank"><strong>Logs</strong></a><br/>
                        <a class="fc-primary mtpx-10"
                           href="{{ route('admin.user_detail.logs', ['uoid' => $order->uoid]) }}"
                           target="_blank"><strong>User Detail Logs</strong></a><br/>
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
                    @if(Auth::user()->type == USER_TYPE_ADMIN)
                        <a href="javascript:;" class="fc-primary fw-bold edit-user-details"
                           data-order-id="{{ $order->id }}">Edit Details</a>
                    @endif
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
                    @if(isset($cart->coupon->code))
                        <br/>
                        <b>COUPON:
                            <span class="fc-primary">
                                {{$cart->coupon->code}}
                            </span>
                        </b>
                    @endif
                </td>
                <td>${{ $order->discounted_price > 0 ? $order->discounted_price : $order->amount }}</td>
                <td>
                    <strong>{{ $paymentStatus }}</strong><br/>
                @if(in_array(Auth::user()->type, [USER_TYPE_ADMIN, USER_TYPE_SUPPORT]))
                    @if($paymentStatus != "Paid")
                        <!-- <button onclick="offerDiscount({{$order->id}})">Offer Discount</button> -->
                            <input type="checkbox" name="order_ids[]" class="order_ids" value="{{ $order->id }}"/>
                            Offer Discount
                        @else
                            <button style="font-size: 12px;padding: 5px 4px;"
                                    class="btn --btn-primary --btn-small create-account-btn"
                                    data-first-name="{{ $order->first_name }}"
                                    data-last-name="{{ $order->last_name }}"
                                    data-email="{{ $order->email }}"
                                    data-username="{{ $order->username }}"
                                    data-address="{{ $order->address }}"
                                    data-city="{{ $order->city }}"
                                    data-state="{{ $order->state }}"
                                    data-zipcode="{{ $order->zip_code }}"
                                    data-phone="{{ $order->contact_no }}"
                                    data-password="{{ $order->password }}"
                            >Create Account
                            </button>
                            <br><br>
                            <a href="{{ url('lms') }}?uoid={{ $order->uoid }}" target="_blank">
                                <button style="font-size: 12px;padding: 5px 4px;" class="btn --btn-primary --btn-small">
                                    Login as User
                                </button>
                            </a>
                            {{--Paypal Transaction ID:<br/>
                                    <strong>{{ $order->transaction_reference }}</strong><br />
                            Date:
                            <strong>{{ \Carbon\Carbon::parse(unserialize($order->payment_details)['TIMESTAMP'])->timezone('Canada/Eastern')->format('m/d/Y H:i:s A') }}</strong>--}}
                        @endif
                    @endif
                    @if(auth()->user()->id === 1)
                        <br><br>
                        <button
                            style="font-size: 12px;padding: 5px 4px;"
                            class="btn --btn-primary --btn-small"
                            onclick="confirmDeletion($(this), 'Are you sure you want to delete Order # {{ $order->uoid }}', {{ $order->id }})"
                        >
                            Delete Order
                        </button>
                        @if($paymentStatus != "Paid")
                            <br/><br/>
                            <button
                                style="font-size: 12px;padding: 5px 4px;"
                                class="btn --btn-primary --btn-small mark-paid-btn"
                                data-order-id="{{ $order->id }}"
                                data-order-no="{{ $order->uoid }}"
                            >
                                Mark Paid
                            </button>
                        @endif
                    @endif

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{-- Mark paid modal --}}
    <section class="mark-paid-modal x-modal hidden">
        <div class="modal-content">
            <a href="javascript:;" class="close-btn modal-close">
                <i class="xicon icon-close">X</i>
            </a>

            <div class="inner-content">
                <h3 class="pagetitle">Mark Order as completed</h3>
                <form action="#">
                    <div class="row mtpx-50">
                        <div class="col-md-12">
                            <div class="control-group focused">
                                <label class="form-label mbpx-5" style="font-size: 14px;">Transaction ID</label>
                                <input type="text" class="form-field" name="transaction_id" id="transaction_id"
                                       maxlength="20"/>
                                <p style="color: red" class="mark-as-paid-err"></p>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="" name="mark_paid_order_id" id="mark_paid_order_id"/>

                    <a href="javascript:;" class="btn --btn-primary --btn-small set-mark-paid-btn">Update</a>
                    <a href="javascript:;" class="btn --btn-primary --btn-small cancel-btn">Cancel</a>
                </form>
            </div>
        </div>
    </section>
    {{-- Mark paid modal --}}

    <section class="user-detail x-modal hidden">
        <div class="modal-content">
            <a href="javascript:;" class="close-btn modal-close">
                <i class="xicon icon-close">X</i>
            </a>

            <div class="inner-content">
                <h3 class="pagetitle">Update User Details</h3>
                <form action="#">
                    <div class="row mtpx-20">
                        <div class="col-md-6">
                            <div class="control-group focused">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-field" name="popup_first_name" id="popup_first_name"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="control-group focused">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-field" name="popup_last_name" id="popup_last_name"/>
                            </div>
                        </div>
                    </div>
                    <div class="row mtpx-20">
                        <div class="col-md-6">
                            <div class="control-group focused">
                                <label class="form-label">E-Mail</label>
                                <input type="email" class="form-field" name="popup_email" id="popup_email"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="control-group focused">
                                <label class="form-label">Contact #</label>
                                <input type="text" class="form-field" name="popup_contact_no" id="popup_contact_no"/>
                            </div>
                        </div>
                    </div>
                    <div class="row mtpx-20">
                        <div class="col-md-6">
                            <div class="control-group focused">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-field" name="popup_username" id="popup_username"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="control-group focused">
                                <label class="form-label">Password</label>
                                <input type="text" class="form-field" name="popup_password" id="popup_password"/>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="" name="popup_order_id" id="popup_order_id"/>

                    <a href="javascript:;" class="btn --btn-primary --btn-small update-details-btn">Update</a>
                    <a href="javascript:;" class="btn --btn-primary --btn-small cancel-btn">Cancel</a>
                </form>
            </div>
        </div>
    </section>
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

        div#delete-message-alert {
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

            $('#btnSelectAll').click(function () {
                $(this).toggleClass('--btn-primary').toggleClass('--btn-white');
                // console.log($(this).data('checked'));
                if ($(this).data('checked') == true) {
                    $(".order_ids").prop("checked", false);
                    $(this).data('checked', false);
                    $(this).text('Select All Offer Discount')
                } else {
                    $(".order_ids").prop("checked", true);
                    $(this).data('checked', true);
                    $(this).text('All Offer Discount Selected')
                }
            });

            $('#btnDoOrderDiscount').click(function () {
                var orderIds = [];
                $('.order_ids').each(function () {
                    if ($(this).is(':checked')) {
                        orderIds.push($(this).val());
                    }
                });
                if (orderIds.length == 0) {
                    alert('Kindly select some orders first.');
                    return false;
                }
                var discount = prompt("Please enter discount in percentage: ", "");
                // console.log(orderIds);
                if (discount) {
                    $.ajax({
                        type: 'POST',
                        url: '/admin/offer-discount',
                        data: {
                            discount: discount,
                            orderIds: orderIds
                        },
                        success: function (data) {
                            console.log(data);
                            if (data.status) {
                                alert("Discount of " + discount + "% added successfully, sent email to " + data.count + " user(s).");
                                // Uncheck all checkboxes
                                $(".order_ids").prop("checked", false);
                            }
                        },
                        error: function () {
                            alert("error!!!!");
                        }
                    });
                }
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.update-details-btn').click(function () {
                var order_id = $('#popup_order_id').val();

                $.post('/admin/orders/' + order_id,
                    {
                        "first_name": $('#popup_first_name').val(),
                        "last_name": $('#popup_last_name').val(),
                        "email": $('#popup_email').val(),
                        "contact_no": $('#popup_contact_no').val(),
                        "username": $('#popup_username').val(),
                        "password": $('#popup_password').val(),
                    },
                    function (data) {
                        console.log(data);

                        var html = data.first_name + ' ' + data.last_name + '<br/>' +
                            'Email: ' + data.email + '<br/>' +
                            'Username: ' + data.username + '<br/>' +
                            'Password: ' + data.password + '<br/>' +
                            'Contact#: ' + data.contact_no + '<br/>';

                        $('#user-details-' + order_id).html(html);

                        $('.user-detail').hide();
                    });
            });

            $('.close-btn, .cancel-btn').click(function () {
                $('.user-detail').hide();
                $('.mark-paid-modal').hide(50, function () {
                    $('#transaction_id').val("");
                });
            });

            initiate();

            $('#orders-table').on('draw.dt', function () {
                initiate();
            });

            function initiate() {
                $('.edit-user-details').click(function () {
                    var order_id = $(this).data('orderId');
                    // alert(order_id);
                    $('#popup_first_name').val('');
                    $('#popup_last_name').val('');
                    $('#popup_email').val('');
                    $('#popup_contact_no').val('');
                    $('#popup_username').val('');
                    $('#popup_password').val('');
                    $('#popup_order_id').val(order_id);

                    $.get('/admin/orders/' + order_id,
                        function (data) {
                            console.log(data);
                            $('#popup_first_name').val(data.first_name);
                            $('#popup_last_name').val(data.last_name);
                            $('#popup_email').val(data.email);
                            $('#popup_contact_no').val(data.contact_no);
                            $('#popup_username').val(data.username);
                            $('#popup_password').val(data.password);
                            $('.user-detail').show();
                        });
                });

                $('#orders-table').off('click').on('click', '.send-comm', function () {
                    var order_id = $(this).data('orderId');
                    var comm = $(this).data('comm');

                    $.post('/admin/orders/' + order_id + '/send-success-communitcations',
                        {
                            "comm": comm
                        },
                        function (data) {
                            console.log(data);
                        });
                });

                // for marking order as paid
                $('.mark-paid-btn').click(function () {
                    var order_id = $(this).data('orderId');
                    var order_no = $(this).data('orderNo');

                    $('#mark_paid_order_id').val(order_id);

                    $('.mark-paid-modal .pagetitle').text('Mark Order # ' + order_no + ' as paid');

                    $('.mark-paid-modal').show();
                });

                $('.set-mark-paid-btn').off('click').on('click', function () {
                    var order_id = $('#mark_paid_order_id').val();
                    var transaction_id = $('#transaction_id').val();

                    var markedRowRef = $(".mark-paid-btn[data-order-id='" + order_id + "']");

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: 'POST',
                        url: '/admin/orders/' + order_id + '/mark-as-paid',
                        data: {
                            "transaction_id": transaction_id
                        },
                        success: function (res) {
                            $('#transaction_id').val("");
                            $('.mark-paid-modal').hide(50, function () {
                                $('#transaction_id').val("");
                            });

                            var updatedOrder = res.order;
                            var changedRowColumns = markedRowRef.parents('tr').find("td");

                            $(changedRowColumns[1]).replaceWith(`<td>
                                                    ${updatedOrder.uoid}
                                                    <br/>
                                                    <span class="badge badge-complete">Completed</span>
                                                    <br><br>
                                                    <a href="javascript:;" class="send-comm" data-order-id="${updatedOrder.id}" data-comm="{{ COMMUNICATION_EMAIL }}">
                                                    <button style="font-size: 12px;padding: 5px 4px;" class="btn --btn-primary --btn-small">
                                                        Send Success Email
                                                    </button>
                                                    </a>
                                                    <br><br>
                                                    <a href="javascript:;" class="send-comm" data-order-id="${updatedOrder.id}" data-comm="{{ COMMUNICATION_SMS }}">
                                                    <button style="font-size: 12px;padding: 5px 4px;" class="btn --btn-primary --btn-small">
                                                        Send Success SMS
                                                    </button>
                                                    </a>
                                                    <br>
                                                    <a class="fc-primary mtpx-10" href="{{ url('/admin/orders') }}/${updatedOrder.uoid}/{{ LOG_TYPE_INDIVIDUAL }}" target="_blank">
                                                        <strong>Logs</strong>
                                                    </a>
                                                    <br>
                                                    <a class="fc-primary mtpx-10" href="{{ url('/admin/orders') }}/${updatedOrder.uoid}/user-detail-logs" target="_blank">
                                                        <strong>User Detail Logs</strong>
                                                    </a>
                                                    <br>
                                                    </td>`);

                            $(changedRowColumns[5]).replaceWith(`<td>
                                                    <strong>Paid</strong>
                                                    <br/>
                                                    <button style="font-size: 12px;padding: 5px 4px;"
                                                    class="btn --btn-primary --btn-small create-account-btn"
                                                    data-first-name="${updatedOrder.first_name}"
                                                    data-last-name="${updatedOrder.last_name}"
                                                    data-email="${updatedOrder.email}"
                                                    data-username="${updatedOrder.username}"
                                                    data-address="${updatedOrder.address}"
                                                    data-city="${updatedOrder.city}"
                                                    data-state="${updatedOrder.state}"
                                                    data-zipcode="${updatedOrder.zip_code}"
                                                    data-phone="${updatedOrder.contact_no}"
                                                    data-password="${updatedOrder.password}"
                                                    >Create Account
                                                    </button>
                                                    <br><br>
                                                    <a href="{{ url('lms') }}?uoid=${updatedOrder.uoid}" target="_blank">
                                                        <button style="font-size: 12px;padding: 5px 4px;" class="btn --btn-primary --btn-small">
                                                            Login as User
                                                        </button>
                                                    </a>
                                                    @if(auth()->user()->id === 1)
                            <br><br>
                            <button
                            style="font-size: 12px;padding: 5px 4px;"
                            class="btn --btn-primary --btn-small"
                            onclick="confirmDeletion($(this), 'Are you sure you want to delete Order # ${updatedOrder.uoid}', ${updatedOrder.id})"
                                                    >
                                                        Delete Order
                                                    </button>
                                                    @endif
                            </td>`);

                            // table.row(markedRowRef.parents('tr')).data(updatedOrder).draw();

                            showAlert(res['message']);
                        },
                        error: function (err) {
                            if (err.status === 422) {
                                var errorObj = JSON.parse(err.responseText);
                                $('.mark-as-paid-err').text(errorObj.errors.transaction_id[0]);
                            } else {
                                showAlert('Something went wrong', 'danger');

                                $('#transaction_id').val("");
                                $('.mark-paid-modal').hide(50, function () {
                                    $('#transaction_id').val("");
                                });
                            }
                        }
                    })
                });

                // $('#transaction_id').bind('input', function() {
                //     $('.mark-as-paid-err').text("");
                // })
                // for marking order as paid
            }

        });

        function showAlert(message, type = 'success') {
            var alertDiv = $('#delete-message-alert');

            alertDiv.append('<strong>' + message + '</strong>');

            if (type === 'danger')
                alertDiv.attr('class', 'alert c-alert-danger');
            else
                alertDiv.attr('class', 'alert alert-success');

            alertDiv.fadeIn(1500);
            alertDiv.fadeTo(2000, 500).slideUp(500, function () {
                alertDiv.slideUp(1500);
                $('#delete-message-alert strong').remove();
            });
        }

        function confirmDeletion(elemRef, message = 'Are you sure you want to delete', orderID) {
            var confirm = window.confirm(message);

            if (confirm) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('admin.delete-order', '') }}" + "/" + orderID,
                    success: function (res) {
                        if (res.type === 'success') {
                            table
                                .row(elemRef.parents('tr'))
                                .remove()
                                .draw();

                            showAlert(res['order-del-message']);
                        } else {
                            showAlert(res['order-del-message'], 'danger');
                        }
                    },
                    error: function () {
                        showAlert('Something went wrong', 'danger');
                    }
                })
            }
        }

        function closeAlert() {
            var alertDiv = $('#delete-message-alert');

            alertDiv.hide();
            $('#delete-message-alert strong').remove();
        }


    </script>
@endsection
