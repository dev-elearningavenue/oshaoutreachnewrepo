@extends('layouts.admin')

@section('title')
    Order Logs
@endsection

@section('content')
    <table class="table table-bordered table-striped" id="logs-table">
        <thead>
        <tr>
            <th>Created At</th>
{{--            <th>Type</th>--}}
            <th>UOID</th>
            <th>Order Snapshot</th>
        </tr>
        </thead>
        <tbody>
            @foreach($logs as $log)
                <tr>
                    <td class="ta-center"><strong>{{ \Carbon\Carbon::parse($log->created_at)->timezone('Canada/Eastern')->format('Y/m/d H:i A') }}</strong></td>
                    <td>{{ $log->uoid }}</td>
                    @php
                      $orderDetails = json_decode($log->order_details);
                    @endphp
                    <td>
                        Name: {{ $orderDetails->first_name }} {{ $orderDetails->last_name }}<br/>
                        Email: {{ $orderDetails->email }}<br/>
{{--                        Username: {{ $orderDetails->username ?? 'NULL' }}<br/>--}}
                        Contact #: {{ $orderDetails->contact_no }}<br/>
                        Password: {{ $orderDetails->password }}<br/>
                        Address: {{ $orderDetails->address }}, {{ $orderDetails->zip_code }}<br/>
                        {{ $orderDetails->city }}, {{ $orderDetails->state }}, {{ $orderDetails->country }}<br/>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>



@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            table = $('#logs-table').DataTable({
                paging: true,
                pageLength: 50,
                lengthMenu: [[10, 25, 50, 100, 250, 500, -1], [10, 25, 50, 100, 250, 500, "All"]],
                order: [[0, 'desc']]
            });
        });
    </script>
@endsection
