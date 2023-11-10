@inject('arrays','App\Http\Utilities\Arrays')
@extends('layouts.admin')

@section('title')
    Group Enrollment Enquiries
@endsection

@section('content')
    @if(Auth::user()->type == USER_TYPE_ADMIN)
        @include('admin.partials._sale_boxes')

        <a href="{{ route('admin.group_enrollments_enquiries.download') }}" target="_blank"
           class="btn --btn-primary --btn-small float-right mbpx-10">Download Enquiries</a>
    @endif
    <table class="table table-bordered table-striped" id="group-enrollment-table">
        <thead>
        <tr>
            <th>Group Order ID</th>
            <th>Company Details</th>
            <th>Course(s)</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Created At</th>
        </tr>
        </thead>
        <tbody>
        @foreach($enquiries as $enquiry)
            <tr>
                <td>GUOID# {{ $enquiry->guoid }}<br><br>{{$enquiry->id}}
                    <br/>
                    <a class="fc-primary mtpx-10" href="{{ route('admin.orders.logs', [$enquiry->guoid, LOG_TYPE_GROUP]) }}"
                       target="_blank"><strong>Logs</strong></a><br/></td>
                <td>
                    <div id="company-details-{{$enquiry->id}}">
                        {{ $enquiry->company_name }}<br/>
                        Company Type: {{ $enquiry->company_type }}<br/>
                        @if($enquiry->no_of_employees)
                            No. of Emp: {{ $enquiry->no_of_employees }}<br/>
                        @endif
                        Contact Person: {{ $enquiry->contact_person }}<br/>
                        Email: {{ $enquiry->email }}<br/>
                        Contact#: {{ $enquiry->contact_no }}<br/>
                        Address: {{ $enquiry->address }}<br/>
                        City: {{ $enquiry->city }}<br/>
                        State: {{ $enquiry->state }}<br/>
                        Zip Code: {{ $enquiry->zip_code }}<br/>
                    </div>
                    @if(Auth::user()->type == USER_TYPE_ADMIN)
                        <a href="javascript:;" class="fc-primary fw-bold edit-enquiry"
                           data-enquiry-id="{{ $enquiry->id }}">Edit Enquiry</a>
                    @endif
                </td>
                <td id="course-{{$enquiry->id}}">
                    @if($enquiry->course_name)
                        {{ $enquiry->course_name }}
                    @else
                        @php
                            $cart = unserialize($enquiry->cart);
                        @endphp
                        @if($cart && is_array($cart['items']))
                            @foreach($cart['items'] as $key => $product)
                                {{ $product['title'] }}<br/>
                                Qty: <strong>{{ $product['quantity'] }}</strong>, Price/Unit:
                                <strong>${{ number_format($product['price'], 2) }}</strong><br/>
                            @endforeach
                            @if(isset($cart['coupon']))
                                Coupon Applied: <b class="fc-primary">{{ $cart['coupon']['code'] }}</b>
                            @endif
                        @endif
                    @endif
                </td>
                <td id="amount-{{ $enquiry->id }}" class="fw-bold">${{ number_format($enquiry->amount, 2) }}<br/>
                    @if($enquiry->discount)
                        <label style="color: #1f5d1f;">${{ number_format($enquiry->discount, 2) }}</label>
                    @endif
                </td>
                <td>
                    {!! $enquiry->payment_status == 1 ? "<strong class='ta-center' style='color: #1f5d1f; font-size:24px;'>Paid</strong>" : "Unpaid" !!}
                    <br/>
                </td>
                <td>{{ \Carbon\Carbon::parse($enquiry->created_at)->timezone('Canada/Eastern')->format('d/m/y H:i a') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <section class="enquiry-detail x-modal hidden">
        <div class="modal-content">
            <a href="javascript:;" class="close-btn modal-close">
                <i class="xicon icon-close">X</i>
            </a>

            <div class="inner-content">
                <h3 class="pagetitle">Update Group Order Details</h3>
                <form action="#">
                    <div class="row mtpx-20">
                        <div class="col-md-6">
                            <div class="control-group focused">
                                <label class="form-label">Company Name</label>
                                <input type="text" class="form-field" name="popup_company_name"
                                       id="popup_company_name"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="control-group focused">
                                <label class="form-label">Number Of Employees Required Training</label>
                                <input type="number" class="form-field" name="popup_number_of_employees"
                                       id="popup_number_of_employees"/>
                            </div>
                        </div>
                    </div>
                    <div class="row mtpx-20">
                        <div class="col-md-6">
                            <div class="control-group focused">
                                <label class="form-label">Company Type</label>
                                <select class="form-field" name="popup_company_type" id="popup_company_type">
                                    <option value="Partnership">Partnership</option>
                                    <option value="Sole Proprietorship">Sole Proprietorship</option>
                                    <option value="LLC">LLC</option>
                                    <option value="Corporation">Corporation</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="control-group focused">
                                <label class="form-label">Order Amount</label>
                                <input type="text" class="form-field" name="popup_amount" id="popup_amount"/>
                            </div>
                        </div>
                    </div>
                    <div class="row mtpx-20">
                        <div class="col-md-6">
                            <div class="control-group focused">
                                <label class="form-label">Select Course</label>
                                <select name="popup_course_name" id="popup_course_name">
                                    <option value="OSHA 10-Hour Construction">OSHA 10-Hour Construction</option>
                                    <option value="OSHA 10 Construction (Spanish)">OSHA 10 Construction (Spanish)
                                    </option>
                                    <option value="OSHA 30-Hour Construction">OSHA 30-Hour Construction</option>
                                    <option value="OSHA 10-Hour General Industry">OSHA 10-Hour General Industry</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="control-group focused">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-field" name="popup_address" id="popup_address"/>
                            </div>
                        </div>
                    </div>
                    <div class="row mtpx-20">
                        <div class="col-md-6">
                            <div class="control-group focused">
                                <label class="form-label">City</label>
                                <input type="text" class="form-field" name="popup_city" id="popup_city"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="control-group focused">
                                <label class="form-label">State</label>
                                {{ Form::select('popup_state', $arrays::states(), 'AL', ['class' => $errors->has('state') ? 'form-field error ' : 'form-field', 'id' => 'popup_state']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row mtpx-20">
                        <div class="col-md-6">
                            <div class="control-group focused">
                                <label class="form-label">Zip Code</label>
                                <input type="text" class="form-field" name="popup_zip_code" id="popup_zip_code"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="control-group focused">
                                <label class="form-label">Phone</label>
                                <input type="number" class="form-field" name="popup_contact_no" id="popup_contact_no"/>
                            </div>
                        </div>
                    </div>
                    <div class="row mtpx-20">
                        <div class="col-md-6">
                            <div class="control-group focused">
                                <label class="form-label">Contact Person</label>
                                <input type="text" class="form-field" name="popup_contact_person"
                                       id="popup_contact_person"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="control-group focused">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-field" name="popup_email" id="popup_email"/>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="" name="popup_enquiry_id" id="popup_enquiry_id"/>

                    <a href="javascript:;" class="btn --btn-primary --btn-small update-details-btn">Update</a>
                    <a href="javascript:;" class="btn --btn-primary --btn-small cancel-btn">Cancel</a>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('/src/js/moment.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $.extend($.fn.dataTableExt.oSort, {
                "date-cn-pre": function (date) {
                    // console.log(date);
                    if (moment(date, 'DD/MM/YY hh:mm a').isValid()) {
                        return moment(date, 'DD/MM/YY hh:mm a');
                    }
                    return 0;
                },

                "date-cn-asc": function (a, b) {
                    return ((a < b) ? -1 : ((a > b) ? 1 : 0));
                },

                "date-cn-desc": function (a, b) {
                    return ((a < b) ? 1 : ((a > b) ? -1 : 0));
                }
            });
            $('#group-enrollment-table').DataTable({
                paging: false,
                "order": [[0, 'desc']],
                // columnDefs: [
                //     { type: 'date-cn', targets: 4 }
                // ]
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.edit-enquiry').click(function () {
                var enquiry_id = $(this).data('enquiryId');
                // alert(order_id);
                $('#popup_company_name').val('');
                $('#popup_number_of_employees').val('');
                $('#popup_company_type').val('');
                $('#popup_course_name').val('');
                $('#popup_address').val('');
                $('#popup_city').val('');
                $('#popup_state').val('');
                $('#popup_zip_code').val('');
                $('#popup_contact_no').val('');
                $('#popup_contact_person').val('');
                $('#popup_email').val('');
                $('#popup_amount').val('');
                $('#popup_enquiry_id').val(enquiry_id);

                $.get('/admin/group-enquiry/' + enquiry_id,
                    function (data) {
                        console.log(data);
                        $('#popup_amount').val(data.amount);
                        $('#popup_company_name').val(data.company_name);
                        $('#popup_company_name').val(data.company_name);
                        $('#popup_number_of_employees').val(data.no_of_employees);
                        $('#popup_company_type').val(data.company_type);
                        $('#popup_course_name').val(data.course_name);
                        $('#popup_address').val(data.address);
                        $('#popup_city').val(data.city);
                        $('#popup_state').val(data.state);
                        $('#popup_zip_code').val(data.zip_code);
                        $('#popup_contact_no').val(data.contact_no);
                        $('#popup_contact_person').val(data.contact_person);
                        $('#popup_email').val(data.email);
                        $('#popup_enquiry_id').val(enquiry_id);
                        $('.enquiry-detail').show();
                    });
            });

            $('.update-details-btn').click(function () {
                var enquiry_id = $('#popup_enquiry_id').val();

                $.post('/admin/group-enquiry/' + enquiry_id,
                    {
                        "amount": $('#popup_amount').val(),
                        "company_name": $('#popup_company_name').val(),
                        "no_of_employees": $('#popup_number_of_employees').val(),
                        "company_type": $('#popup_company_type').val(),
                        "course_name": $('#popup_course_name').val(),
                        "address": $('#popup_address').val(),
                        "city": $('#popup_city').val(),
                        "state": $('#popup_state').val(),
                        "zip_code": $('#popup_zip_code').val(),
                        "contact_no": $('#popup_contact_no').val(),
                        "contact_person": $('#popup_contact_person').val(),
                        "email": $('#popup_email').val(),
                    },
                    function (data) {
                        console.log(data);

                        $('#company-details-' + data.id).html(data.company_name + "<br/>"
                            + "No. of Emp: " + data.no_of_employees + "<br/>"
                            + "Company Type: " + data.company_type + "<br/>");
                        $('#course-' + data.id).html(data.course_name);
                        $('#address-details-' + data.id).html(data.address + "<br/>"
                            + data.city + "<br/>"
                            + data.state + "<br/>"
                            + data.zip_code);
                        $('#contact-details-' + data.id).html(data.contact_person + "<br/>"
                            + data.email + "<br/>"
                            + data.contact_no);
                        $('#amount-' + data.id).html(data.amount);

                        $('.enquiry-detail').hide();
                    });
            });

            $('.enquiry-detail .close-btn, .enquiry-detail .cancel-btn').click(function () {
                $('.enquiry-detail').hide();
            });
        });
    </script>
@endsection
