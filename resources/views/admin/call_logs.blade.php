@extends('layouts.admin')

@section('title')
    Call Logs
@endsection

@section('content')
    <div class="row">
        <div id="delete-message-alert"
             class="alert alert-success c-alert-danger"
             style="margin: 0 10px 30px 10px; display: none;">
            <span class="closebtn" onclick="closeAlert()">&times;</span>
        </div>
        {!! Form::open(['route' => 'admin.call_logs', 'method' => 'get']) !!}
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
        {!! Form::close() !!}

        <div class="col-md-3">
            <button
                style="font-size: 12px;padding: 10px 20px;"
                class="btn --btn-primary --btn-small float-right mbpx-10 add-call-log"
            >
                Add Call Log
            </button>
        </div>
    </div>
    <table class="table table-bordered table-striped" id="orders-table">
        <thead>
        <tr>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Platform</th>
            <th>Reference No</th>
            <th>User Details</th>
            <th>Message</th>
        </tr>
        </thead>
        <tbody>
        @foreach($callLogs as $callLog)
            <tr>
                <td>
                    <strong>{{ \Carbon\Carbon::parse($callLog->created_at)->timezone('Canada/Eastern')->format('Y/m/d H:i A') }}</strong>
                </td>
                <td>
                    <strong>{{ \Carbon\Carbon::parse($callLog->updated_at)->timezone('Canada/Eastern')->format('Y/m/d H:i A') }}</strong>
                </td>
                <td>{{ strtoupper($callLog->platform) }}</td>
                <td>
                    {{ $callLog->ref_no }}
                    @if($callLog->client_of !== 0)
                        <br/>
                        <span class="badge badge-complete">BDM {{ $callLog->client_of }}</span>
                    @endif
                </td>
                <td>
                    <div id="user-details-{{$callLog->id}}">
                        Name: {{ $callLog->name }}<br/>
                        Email: {{ $callLog->email }}<br/>
                        Contact#: {{ $callLog->contact }}<br/>
                    </div>
                    @if(Auth::user()->type == USER_TYPE_ADMIN)
                        <a href="javascript:;" class="fc-primary fw-bold edit-user-details"
                           data-order-id="{{ $callLog->id }}">Edit Details</a>
                    @endif
                </td>
                <td>
                    <p>{{ $callLog->message }}</p>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{-- Add New call log modal --}}
    <section class="add-call-log-modal x-modal hidden" style="z-index: 999999">
        <div class="modal-content">
            <a href="javascript:;" class="close-btn modal-close">
                <i class="xicon icon-close">X</i>
            </a>

            <div class="inner-content">
                <h3 class="pagetitle">Add New Call Log</h3>
                <form action="#">
                    <div class="row mtpx-50">
                        <div class="col-md-6">
                            <div class="control-group focused">
                                <label class="form-label mbpx-10" style="font-size: 14px;">Name</label>
                                <input type="text" class="form-field" name="name" id="name"
                                       maxlength="50"/>
                                <p style="color: red" class="err-name"></p>
                            </div>
                            </div>
                        <div class="col-md-6">
                            <div class="control-group focused">
                                <label class="form-label mbpx-10" style="font-size: 14px;">Email</label>
                                <input type="email" class="form-field" name="email" id="email"
                                       maxlength="50"/>
                                <p style="color: red" class="err-email"></p>
                            </div>
                            </div>
                        <div class="col-md-6">
                            <div class="control-group focused">
                                <label class="form-label">Platform</label>
                                <select class="form-field" name="platform" id="platform">
                                    <option value="">Select Platform</option>
                                    <option value="outreach">OSHA Outreach Courses</option>
                                    <option value="ooc">OSHA Online Center</option>
                                    <option value="oes">OSHA Education School</option>
                                </select>
                                <p style="color: red" class="err-platform"></p>
                            </div>
                            </div>
                        <div class="col-md-6">
                            <div class="control-group focused">
                                <label class="form-label mbpx-10" style="font-size: 14px;">Contact</label>
                                <input type="text" class="form-field" name="contact" id="contact"
                                       maxlength="50"/>
                                <p style="color: red" class="err-contact"></p>
                            </div>
                            </div>
                        <div class="col-md-12">
                            <div class="control-group focused">
                                <label class="form-label mbpx-10" style="font-size: 14px;">Company Details</label>
                                <input type="text" class="form-field" name="company_details" id="company_details"
                                       maxlength="50"/>
                                <p style="color: red" class="err-company_details"></p>
                            </div>
                            </div>
                        <div class="col-md-12">
                            <div class="control-group focused">
                                <label class="form-label mbpx-10" style="font-size: 14px;">Message</label>
                                <textarea class="form-field" name="message" id="message"
                                          rows="2" maxlength="100"></textarea>
                                <p style="color: red" class="err-message"></p>
                            </div>
                        </div>
                    </div>
                    <a href="javascript:;" class="btn --btn-primary --btn-small set-add-call-log">Update</a>
                    <a href="javascript:;" class="btn --btn-primary --btn-small cancel-btn">Cancel</a>
                </form>
            </div>
        </div>
    </section>
    {{-- Add New call log modal --}}

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

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('.close-btn, .cancel-btn').click(function () {
                $('.user-detail').hide();
                $('.add-call-log-modal').hide(50, function () {
                    $('#transaction_id').val("");
                });
            });

            initiate();

            $('#orders-table').on('draw.dt', function () {
                initiate();
            });

            function emptyAddCallLogModalFields() {
                $('#name').val("");
                $('#email').val("");
                $('#contact').val("");
                $('#company_details').val("");
                $('#message').val("");
                $("#platform").val("");
            }

            function initiate() {
                // for adding new call logs
                $('.add-call-log').click(function () {
                    // Empty Fields
                    emptyAddCallLogModalFields()


                    $('.add-call-log-modal').show();
                });

                $('.set-add-call-log').off('click').on('click', function () {
                    var name = $('#name').val();
                    var email = $('#email').val();
                    var contact = $('#contact').val();
                    var companyDetails = $('#company_details').val();
                    var message = $('#message').val();
                    var platform = $("#platform").val();

                    // Empty old errors
                    $("[class^=err-]").text("");


                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: 'POST',
                        url: '/admin/call_logs/store',
                        data: {
                            "name": name,
                            "email": email,
                            "contact": contact,
                            "company_details": companyDetails,
                            "message": message,
                            "platform": platform
                        },
                        success: function (res) {
                          showAlert('Log added successfully', 'success');

                          window.location.reload();
                        },
                        error: function (err) {
                            if (err.status === 422) {
                                var errorObj = JSON.parse(err.responseText);

                                console.log(errorObj.errors);

                                for(let errKey in errorObj.errors) {
                                    $('.err-' + errKey ).text(errorObj.errors[errKey][0]);
                                }

                            } else {
                                showAlert('Something went wrong', 'danger');

                                $('.add-call-log-modal').hide(50, function () {

                                });
                            }
                        }
                    })
                });
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

        function closeAlert() {
            var alertDiv = $('#delete-message-alert');

            alertDiv.hide();
            $('#delete-message-alert strong').remove();
        }


    </script>
@endsection
