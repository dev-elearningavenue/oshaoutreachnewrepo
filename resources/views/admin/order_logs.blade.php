@extends('layouts.admin')

@section('title')
    Order Logs
@endsection

@section('content')
    <table class="table table-bordered table-striped" id="orders-table">
        <thead>
        <tr>
            <th>Created At</th>
{{--            <th>Type</th>--}}
            <th>Website</th>
            <th>Status</th>
            <th>Log</th>
        </tr>
        </thead>
        <tbody>
            @foreach($logs as $log)
                <tr>
                    <td class="ta-center"><strong>{{ \Carbon\Carbon::parse($log->created_at)->timezone('Canada/Eastern')->format('Y/m/d H:i A') }}</strong></td>
                    <td class="ta-center">
                        <strong>
                        @if($log->website == 0)
                            Prime
                        @elseif($log->website == 1)
                            BDM 1
                        @elseif($log->website == 2)
                            BDM 2
                        @elseif($log->website == 3)
                            BDM 3
                        @endif
                        </strong>
                    </td>
                    <td class="ta-center">
                        @if($log->status == LOG_STATUS_SUCCESS)
                            <strong style="color:green;">Success</strong>
                        @elseif($log->status == LOG_STATUS_FAILED_AJAX_FAILURE)
                            <strong style="color:orangered;">AJAX Failure</strong>
                        @elseif($log->status == LOG_STATUS_FAILED_INTERNAL_FAILURE)
                            <strong style="color:orangered;">Internal Failure</strong>
                        @elseif($log->status == LOG_STATUS_FAILED_TO_CAPTURE)
                            <strong style="color:orangered;">Failed to Capture</strong>
                        @elseif($log->status == LOG_STATUS_ERROR)
                            <strong style="color:red;">Error</strong>
                        @endif
                    </td>
                    <td>
                        <pre>
                            @php
                                try {
                                    $log = json_decode($log->text);
                                }catch(\Exception $ex){
                                    $log = [];
                                }
                                print_r($log);
                            @endphp
                        </pre>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>



@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {

        });
    </script>
@endsection