@extends('layouts.admin')

@section('title')
    Leeds List
@endsection

@section('content')
    <div class="row">
        <div id="delete-message-alert"
             class="alert alert-success c-alert-danger"
             style="margin: 0 10px 30px 10px; display: none;">
            <span class="closebtn" onclick="closeAlert()">&times;</span>
        </div>
        {!! Form::open(['route' => 'bdm.leeds_list', 'method' => 'get']) !!}
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
    </div>
    <table class="table table-bordered table-striped" id="orders-table">
        <thead>
        <tr>
            <th>Created Date</th>
            <th>Updated Date</th>
            <th>Contact Details</th>
            <th>Other Details</th>
            <th>Contacted</th>
            <th>Outcome</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($leeds as $leed)
            <tr>
                <td>
                    <strong>{{ \Carbon\Carbon::parse($leed->created_at)->timezone('Canada/Eastern')->format('Y/m/d H:i A') }}</strong>
                </td>
                <td>
                    <strong>{{ \Carbon\Carbon::parse($leed->updated_at)->timezone('Canada/Eastern')->format('Y/m/d H:i A') }}</strong>
                </td>
                <td>
                    <div id="leed-details-{{$leed->id}}">
                        <b>Email:</b> {{ $leed->email }}<br/>
                        <b>Contact#:</b> {{ $leed->phone }}<br/>
                        <b>Address:</b> {{ $leed->address }}<br/>
                        <b>City:</b> {{ $leed->city }}<br/>
                        <b>State:</b> {{ $leed->state }}<br/>
                        <b>Zip Code:</b> {{ $leed->zip_code }}<br/>
                    </div>
                </td>
                <td>
                    <div id="leed-details-{{$leed->id}}">
                        <b>Company Name:</b> {{ $leed->company_name }}<br/>
                        <b>Contact Person:</b> {{ $leed->contact_person }}<br/>
                        <b>No. of Employees:</b> {{ $leed->no_of_employees }}<br/>
                        <b>Type:</b> {{ $leed->type }}<br/>
                        <b>Course:</b> {{ $leed->course }}<br/>
                    </div>
                </td>
                <td id="contacted-{{$leed->id}}" data-value="{{$leed->contacted}}">{{ $leed->contacted == 1 ? "Yes" : "No" }}</td>
                <td id="outcome-{{$leed->id}}">{{ $leed->outcome }}</td>
                <td>
                    <a href="javascript:;" class="fc-primary fw-bold edit-leed"
                       data-leed-id="{{ $leed->id }}">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{-- Add New call log modal --}}
    <section class="edit-leed-modal x-modal hidden" style="z-index: 999999">
        <div class="modal-content">
            <a href="javascript:;" class="close-btn modal-close">
                <i class="xicon icon-close">X</i>
            </a>

            <div class="inner-content">
                <h3 class="pagetitle">Edit Leed</h3>
                <span class="edit-leed-id"></span>
                <form action="#">
                    <input type="text" value="" name="edit-leed-id" class="hidden edit-leed-id"
                    />
                    <div class="row mtpx-50">
                        <div class="col-md-12">
                            <div class="control-group focused">
                                <label class="form-label mbpx-10" style="font-size: 16px;">Outcome</label>
                                <textarea class="form-field" name="outcome" id="outcome"
                                          rows="2" maxlength="100"></textarea>
                                <p style="color: red" class="err-outcome"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="control-group focused">
                                <label class="form-label mbpx-10" style="font-size: 16px;">Contacted</label>
                                <input class="form-field" name="contacted" id="contacted" type="checkbox" />
                                <p style="color: red" class="err-contacted"></p>
                            </div>
                        </div>
                    </div>
                    <a href="javascript:;" class="btn --btn-primary --btn-small set-edit-leed">Update</a>
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

            var editLeedModal = $('.edit-leed-modal');
            var editLeedLink = $('.edit-leed');
            var editLeedBtn = $('.set-edit-leed');
            var editLeedId = $('.edit-leed-id');


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('.close-btn, .cancel-btn').click(function () {
                editLeedModal.hide(50, function () {
                    emptyModalFields();
                });
            });

            initiate();

            $('#orders-table').on('draw.dt', function () {
                initiate();
            });

            function emptyModalFields() {
                $('#outcome').val("");
                $('#contacted').prop("checked", false);
                editLeedId.val("");
            }

            function initiate() {
                // for adding new call logs
                editLeedLink.off('click').on('click', function () {
                    // Empty Fields
                    emptyModalFields()

                    var leedId = $(this).data("leed-id");

                    // Set existing values if present
                    var outcomeVal = $("#outcome-"+leedId).text()
                    $("#outcome").val(outcomeVal)

                    var contactedVal = $("#contacted-"+leedId).attr("data-value");

                    if(contactedVal == "1") {
                        $("#contacted").attr("checked", true)
                    } else {
                        $("#contacted").attr("checked", false)
                    }

                    editLeedId.val($(this).data("leed-id"));

                    editLeedModal.show();
                });

                editLeedBtn.off('click').on('click', function () {
                    var outcome = $('#outcome').val();
                    var contacted = $('#contacted').is(':checked') ? 1 : 0;
                    var leedId = editLeedId.val();

                    // Empty old errors
                    $("[class^=err-]").text("");

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: 'PATCH',
                        url: '/admin/leeds_list/' + leedId,
                        data: {
                            "outcome": outcome,
                            "contacted": contacted,
                        },
                        success: function (res) {
                            editLeedModal.hide(50, function () {
                                showAlert('Leed Updated successfully', 'success');
                                var outcomeElem = $("#outcome-"+leedId);
                                var contactedElem = $("#contacted-"+leedId);

                                console.log(res);
                                // Update Outcome
                                outcomeElem.text(res.data.outcome);

                                // Update Contacted
                                var contactedValue = res.data.contacted;

                                contactedElem.attr("data-value", contactedValue);
                                contactedElem.text(parseInt(contactedValue) ? "Yes" : "No");
                            });
                        },
                        error: function (err) {
                            if (err.status === 422) {
                                var errorObj = JSON.parse(err.responseText);

                                console.log(errorObj.errors);

                                for (let errKey in errorObj.errors) {
                                    $('.err-' + errKey).text(errorObj.errors[errKey][0]);
                                }

                            } else {
                                showAlert('Something went wrong', 'danger');

                                editLeedModal.hide(50, function () {

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
