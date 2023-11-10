@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('content')
    @if (session('message'))
        <div class="alert alert-{{session('type')}} fs-large ta-center" role="alert">
            {{ session('message') }}
        </div>

        <style>
            .alert-success {
                background-color: #04AA6D;
                color: white;
            }

            .alert-danger {
                background-color: #f44336;
                color: white;
            }
        </style>
    @endif
    <div class="row">
        <div class="col-md-4">
            <h4 style="margin: 0">{{ auth()->user()->first_name }}</h4>
        </div>
    </div>
    <div class="row mtpx-40 ta-center" style="display: flex; justify-content: space-around">
        <div class="col-md-4" style="border: 1px solid #005384;width: 30%;padding: 0;">
            <h5 style="text-align: center;background: #005384; color: #fff; padding: 10px; font-size: 18px;">
                Today: {{$sales_count['daily']['day']}}</h5>
            <div class="row" style="display: flex;justify-content: center;">
                <div class="pl-3 pr-3">
                    <strong class="fs-large">ORDERS RECEIVED</strong>
                    <h4 class="fc-primary">{{ number_format($sales_count['daily']['orders_count']) }}</h4>
                </div>
                <div class="pl-3 pr-3" style="border-left: 1px solid #005384;">
                    <strong class="fs-large">PAYMENTS RECEIVED</strong>
                    <h4 class="fc-primary">$ {{ number_format($sales_count['daily']['total_orders_amount'], 2) }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4" style="border: 1px solid #005384;width: 30%;padding: 0;">
            <h5 style="text-align: center;background: #005384; color: #fff; padding: 10px; font-size: 18px;">
                Week: {{$sales_count['weekly']['week']}}</h5>
            <div class="row" style="display: flex;justify-content: center;">
                <div class="pl-3 pr-3">
                    <strong class="fs-large">ORDERS RECEIVED</strong>
                    <h4 class="fc-primary">{{ number_format($sales_count['weekly']['orders_count']) }}</h4>
                </div>
                <div class="pl-3 pr-3" style="border-left: 1px solid #005384;">
                    <strong class="fs-large">PAYMENTS RECEIVED</strong>
                    <h4 class="fc-primary">$ {{ number_format($sales_count['weekly']['total_orders_amount'], 2) }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4" style="border: 1px solid #005384;width: 30%;padding: 0;">
            <h5 style="text-align: center;background: #005384; color: #fff; padding: 10px; font-size: 18px;">
                Month: {{$sales_count['monthly']['month']}}</h5>
            <div class="row" style="display: flex;justify-content: center;">
                <div class="pl-3 pr-3">
                    <strong class="fs-large">ORDERS RECEIVED</strong>
                    <h4 class="fc-primary">{{ number_format($sales_count['monthly']['orders_count']) }}</h4>
                </div>
                <div class="pl-3 pr-3" style="border-left: 1px solid #005384;">
                    <strong class="fs-large">PAYMENTS RECEIVED</strong>
                    <h4 class="fc-primary">$ {{ number_format($sales_count['monthly']['total_orders_amount'], 2) }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row mtpx-40 ta-center">
        <div class="col-md-4">
            <strong class="fs-large">Total Orders</strong>
            <h4 class="fc-primary">{{ number_format($total_orders) }}</h4>
        </div>
        <div class="col-md-4">
            <strong class="fs-large">Total Payments</strong>
            <h4 class="fc-primary">{{ number_format($total_payments) }}</h4>
        </div>
        <div class="col-md-4">
            <strong class="fs-large">Total Enquiries</strong>
            <h4 class="fc-primary">{{ number_format($total_group_enrollment_enquiries) }}</h4>
        </div>
    </div>

    {{--Upload Leeds List--}}
    @if(auth()->user()->type === USER_TYPE_ADMIN)
        <div class="row mtpx-40 ta-center">
            <div class="offset-md-8 col-md-4">
                <form action="{{ route('admin.upload_leeds_list') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input
                            type="file"
                            id="leeds_list"
                            name="leeds_list"
                            accept=".csv,text/csv"
                    >
                    <button
                            style="font-size: 12px;padding: 10px 20px;"
                            class="btn --btn-primary --btn-small float-right mbpx-10 add-call-log"
                    >
                        Upload Leeds
                    </button>
                </form>
                @if ($errors->has('leeds_list'))
                    <br/>
                    <p class="error-msg ta-right">{{ $errors->first('leeds_list') }}</p>
                @endif
            </div>
        </div>
    @endif
    {{--Upload Leeds List--}}

    <div class="row mtpx-40 mbpx-20">
        <div class="col-md-12">
            <div class="col-md-3"></div>
            <div class="col-md-6" style="border: 1px solid #E5E5E5; padding: 10px 10px 0;">
                <h3 class="mbpx-20">Filter by Date</h3>
                {!! Form::open(['route' => 'admin.dashboard', 'method' => 'get']) !!}
                <div class="control-group focused d-inline-block">
                    <label class="form-label">Start Date</label>
                    {{ Form::date('start_date', null, ['class' =>'form-field', 'autocomplete' => 'off', 'max' => date('Y-m-d')]) }}
                </div>&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="control-group focused d-inline-block">
                    <label class="form-label">End Date</label>
                    {{ Form::date('end_date', null, ['class' =>'form-field', 'autocomplete' => 'off', 'max' => date('Y-m-d')]) }}
                </div>&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" class="btn --btn-primary --btn-small mbpx-10" value="Search">
                <a href="{{ route('admin.dashboard') }}" class="btn --btn-primary --btn-small mbpx-10">Reset</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    {{--  ThirtyDays Individual + ThirtyDays Group Chart  --}}
    <div class="row mtpx-100">
        <div class="col-md-12">
            <canvas id="thirtyDaysNormalPlusGroupChart" width="100%" height="600"></canvas>
        </div>
    </div>
    {{--  ThirtyDays Individual + ThirtyDays Group Chart  --}}

    {{--  ThirtyDays Individual + ThirtyDays Group Chart (Weekly)   --}}
    <div class="row mtpx-100">
        <div class="col-md-12">
            <canvas id="weeklyNormalPlusGroupChart" width="100%" height="600"></canvas>
        </div>
    </div>
    {{--  ThirtyDays Individual + ThirtyDays Group Chart (Weekly)   --}}

    {{--  Individual + Group Chart (Monthly)   --}}
    <div class="row mtpx-100">
        <div class="col-md-12">
            <canvas id="monthlyGroupIndividual" width="100%" height="600"></canvas>
        </div>
    </div>
    {{--  Individual + Group Chart (Monthly)   --}}

    @if(auth()->user()->type === USER_TYPE_ADMIN)
        <div class="row mtpx-30">
            <div class="col-md-12">
                <canvas id="thirtyDaysChart" width="100%" height="600"></canvas>
            </div>
        </div>
        <div class="row mtpx-30">
            <div class="col-md-12">
                <canvas id="thirtyDaysOrdersChart" width="100%" height="600"></canvas>
            </div>
        </div>

        <div class="row mtpx-100">
            <div class="col-md-12">
                <canvas id="monthlyChart" width="100%" height="600"></canvas>
            </div>
        </div>
        <div class="row mtpx-30">
            <div class="col-md-12">
                <canvas id="monthlyOrdersChart" width="100%" height="600"></canvas>
            </div>
        </div>
        <div class="row mtpx-100 mbpx-25">
            <div class="col-md-12">
                <canvas id="thirtyDaysGroupChart" width="100%" height="600"></canvas>
            </div>
        </div>
    @endif

@endsection

@section('scripts')
    <script type="text/javascript">
        var default_bar_color = "#E5E5E5";
        var bdm1_bar_color = "#ADD8E6";
        var bdm2_bar_color = "#00BFFF";
        var bdm3_bar_color = "#1E90FF";

        var filtered_amount_chart_line_color = "#50C878";
        var filtered_count_chart_line_color = "#F1BD33";
        var monthly_amount_chart_line_color = '#50C878';
        var monthly_count_chart_line_color = '#F1BD33';
    </script>

    <script src="{{ asset('src/js/Chart.min.js') }}"></script>
    <script>
        @if(auth()->user()->type === USER_TYPE_ADMIN)
            var thirtyDaysCtx = document.getElementById('thirtyDaysChart').getContext('2d');
            var thirtyDaysChart = new Chart(thirtyDaysCtx, {
                type: 'bar',
                data: {
                    labels: [
                        @foreach($labelsForIndividualFilteredChart as $date)
                            '{{ date_format(date_create($date), 'D, jS M') }}',
                        @endforeach
                    ],
                    datasets: [{
                        label: 'Sum of Order Amount ($)',
                        data: [
                            @foreach($labelsForIndividualFilteredChart as $date)
                                @php
                                    $total = 0;
                                    if(isset($individual_filtered_orders[0][$date])){
                                        $total += $individual_filtered_orders[0][$date]['amount'];
                                    }
                                    if(isset($individual_filtered_orders[1][$date])){
                                        $total += $individual_filtered_orders[1][$date]['amount'];
                                    }
                                    if(isset($individual_filtered_orders[2][$date])){
                                        $total += $individual_filtered_orders[2][$date]['amount'];
                                    }
                                    if(isset($individual_filtered_orders[3][$date])){
                                        $total += $individual_filtered_orders[3][$date]['amount'];
                                    }
                                @endphp
                                '{{ $total }}',
                            @endforeach
                        ],
                        type: "line",
                        fill: false,
                        borderColor: filtered_amount_chart_line_color,
                    },
                        {
                            label: 'Sum of Order Amount ($)',
                            data: [
                                @foreach($labelsForIndividualFilteredChart as $date)
                                    @if(isset($individual_filtered_orders[0][$date]))
                                    '{{ $individual_filtered_orders[0][$date]['amount'] }}',
                                @else
                                    '0',
                                @endif
                                @endforeach
                            ],
                            type: "bar",
                            backgroundColor: default_bar_color,
                        },
                        {
                            label: 'Sum of Order Amount ($) - Maaz',
                            backgroundColor: bdm1_bar_color,
                            data: [
                                @foreach($labelsForIndividualFilteredChart as $date)
                                    @if(isset($individual_filtered_orders[1][$date]))
                                    '{{ $individual_filtered_orders[1][$date]['amount'] }}',
                                @else
                                    '0',
                                @endif
                                @endforeach
                            ],
                            type: "bar",
                        },
                        {
                            label: 'Sum of Order Amount ($) - Talib',
                            backgroundColor: bdm2_bar_color,
                            data: [
                                @foreach($labelsForIndividualFilteredChart as $date)
                                    @if(isset($individual_filtered_orders[2][$date]))
                                    '{{ $individual_filtered_orders[2][$date]['amount'] }}',
                                @else
                                    '0',
                                @endif
                                @endforeach
                            ],
                            type: "bar",
                        },
                        {
                            label: 'Sum of Order Amount ($) - Mohin',
                            backgroundColor: bdm3_bar_color,
                            data: [
                                @foreach($labelsForIndividualFilteredChart as $day)
                                    @if(isset($individual_filtered_orders[3][$day]))
                                    '{{ $individual_filtered_orders[3][$day]['amount'] }}',
                                @else
                                    '0',
                                @endif
                                @endforeach
                            ],
                            type: "bar",
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Comparison of Orders amount for Filtered days'
                    },
                    legend: {display: false},
                    scales: {
                        xAxes: [{
                            stacked: true
                        }],
                        yAxes: [{
                            stacked: true,
                            ticks: {
                                beginAtZero: true,
                                stepSize: 50
                            }
                        }]

                    }
                }
            });

            var thirtyDaysOrdersCtx = document.getElementById('thirtyDaysOrdersChart').getContext('2d');
            var thirtyDaysOrdersChart = new Chart(thirtyDaysOrdersCtx, {
                type: 'bar',
                data: {
                    labels: [
                        @foreach($labelsForIndividualFilteredChart as $date)
                            '{{ date_format(date_create($date), 'D, jS M') }}',
                        @endforeach
                    ],
                    datasets: [{
                        label: 'Orders Count',
                        data: [
                            @foreach($labelsForIndividualFilteredChart as $date)
                                @php
                                    $total = 0;
                                    if(isset($individual_filtered_orders[0][$date])){
                                        $total += $individual_filtered_orders[0][$date]['count'];
                                    }
                                    if(isset($individual_filtered_orders[1][$date])){
                                        $total += $individual_filtered_orders[1][$date]['count'];
                                    }
                                    if(isset($individual_filtered_orders[2][$date])){
                                        $total += $individual_filtered_orders[2][$date]['count'];
                                    }
                                    if(isset($individual_filtered_orders[3][$date])){
                                        $total += $individual_filtered_orders[3][$date]['count'];
                                    }
                                @endphp
                                '{{ $total }}',
                            @endforeach
                        ],
                        type: "line",
                        fill: false,
                        borderColor: filtered_count_chart_line_color,
                    },
                        {
                            label: 'Orders Count',
                            data: [
                                @foreach($labelsForIndividualFilteredChart as $date)
                                    @if(isset($individual_filtered_orders[0][$date]))
                                    '{{ $individual_filtered_orders[0][$date]['count'] }}',
                                @else
                                    '0',
                                @endif
                                @endforeach
                            ],
                            type: "bar",
                            backgroundColor: default_bar_color,
                        },
                        {
                            label: 'Orders Count - Maaz',
                            backgroundColor: bdm1_bar_color,
                            data: [
                                @foreach($labelsForIndividualFilteredChart as $date)
                                    @if(isset($individual_filtered_orders[1][$date]))
                                    '{{ $individual_filtered_orders[1][$date]['count'] }}',
                                @else
                                    '0',
                                @endif
                                @endforeach
                            ],
                            type: "bar",
                        },
                        {
                            label: 'Orders Count - Talib',
                            backgroundColor: bdm2_bar_color,
                            data: [
                                @foreach($labelsForIndividualFilteredChart as $date)
                                    @if(isset($individual_filtered_orders[2][$date]))
                                    '{{ $individual_filtered_orders[2][$date]['count'] }}',
                                @else
                                    '0',
                                @endif
                                @endforeach
                            ],
                            type: "bar",
                        },
                        {
                            label: 'Orders Count - Mohin',
                            backgroundColor: bdm3_bar_color,
                            data: [
                                @foreach($labelsForIndividualFilteredChart as $date)
                                    @if(isset($individual_filtered_orders[3][$date]))
                                    '{{ $individual_filtered_orders[3][$date]['count'] }}',
                                @else
                                    '0',
                                @endif
                                @endforeach
                            ],
                            type: "bar",
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Comparison of Orders count for Filtered days'
                    },
                    legend: {display: false},
                    scales: {
                        xAxes: [{
                            stacked: true,
                        }],
                        yAxes: [{
                            stacked: true,
                            ticks: {
                                beginAtZero: true,
                                stepSize: 1
                            }
                        }]
                    }
                }
            });

            var monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
            var monthlyChart = new Chart(monthlyCtx, {
                type: 'bar',
                data: {
                    labels: [
                        @foreach($orders_sum_till_today_by_month as $order)
                            '{{ $order->day }}',
                        @endforeach
                    ],
                    datasets: [{
                        label: 'Sum of Order Amount ($)',
                        data: [
                            @foreach($orders_sum_till_today_by_month as $order)
                                @php
                                    $total = $order->total_orders_amount;
                                    if(isset($bdms_monthly_orders[1][$order->full_date])){
                                        $total += $bdms_monthly_orders[1][$order->full_date]['amount'];
                                    }
                                    if(isset($bdms_monthly_orders[2][$order->full_date])){
                                        $total += $bdms_monthly_orders[2][$order->full_date]['amount'];
                                    }
                                    if(isset($bdms_monthly_orders[3][$order->full_date])){
                                        $total += $bdms_monthly_orders[3][$order->full_date]['amount'];
                                    }
                                @endphp
                                '{{ $total }}',
                            @endforeach
                        ],
                        type: "line",
                        fill: false,
                        borderColor: monthly_amount_chart_line_color,
                    },
                        {
                            label: 'Sum of Order Amount ($)',
                            data: [
                                @foreach($orders_sum_till_today_by_month as $order)
                                    '{{ $order->total_orders_amount }}',
                                @endforeach
                            ],
                            type: "bar",
                            backgroundColor: default_bar_color,
                        },
                        {
                            label: 'Sum of Order Amount ($) - Maaz',
                            backgroundColor: bdm1_bar_color,
                            data: [
                                @foreach($orders_sum_till_today_by_month as $order)
                                    @if(isset($bdms_monthly_orders[1][$order->full_date]))
                                    '{{ $bdms_monthly_orders[1][$order->full_date]['amount'] }}',
                                @else
                                    '0',
                                @endif
                                @endforeach
                            ],
                            type: "bar",
                        },
                        {
                            label: 'Sum of Order Amount ($) - Talib',
                            backgroundColor: bdm2_bar_color,
                            data: [
                                @foreach($orders_sum_till_today_by_month as $order)
                                    @if(isset($bdms_monthly_orders[2][$order->full_date]))
                                    '{{ $bdms_monthly_orders[2][$order->full_date]['amount'] }}',
                                @else
                                    '0',
                                @endif
                                @endforeach
                            ],
                            type: "bar",
                        },
                        {
                            label: 'Sum of Order Amount ($) - Mohin',
                            backgroundColor: bdm3_bar_color,
                            data: [
                                @foreach($orders_sum_till_today_by_month as $order)
                                    @if(isset($bdms_monthly_orders[3][$order->full_date]))
                                    '{{ $bdms_monthly_orders[3][$order->full_date]['amount'] }}',
                                @else
                                    '0',
                                @endif
                                @endforeach
                            ],
                            type: "bar",
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Monthly Orders Amount (Individual)'
                    },
                    legend: {display: false},
                    scales: {
                        xAxes: [{
                            stacked: true,
                        }],
                        yAxes: [{
                            stacked: true,
                            ticks: {
                                beginAtZero: true,
                                stepSize: 500
                            }
                        }]
                    }
                }
            });

            var monthlyOrdersCtx = document.getElementById('monthlyOrdersChart').getContext('2d');
            var monthlyOrdersChart = new Chart(monthlyOrdersCtx, {
                type: 'bar',
                data: {
                    labels: [
                        @foreach($orders_sum_till_today_by_month as $order)
                            '{{ $order->day }}',
                        @endforeach
                    ],
                    datasets: [{
                        label: 'Orders Count',
                        data: [
                            @foreach($orders_sum_till_today_by_month as $order)
                                @php
                                    $total = $order->orders_count;
                                    if(isset($bdms_monthly_orders[1][$order->full_date])){
                                        $total += $bdms_monthly_orders[1][$order->full_date]['count'];
                                    }
                                    if(isset($bdms_monthly_orders[2][$order->full_date])){
                                        $total += $bdms_monthly_orders[2][$order->full_date]['count'];
                                    }
                                    if(isset($bdms_monthly_orders[3][$order->full_date])){
                                        $total += $bdms_monthly_orders[3][$order->full_date]['count'];
                                    }
                                @endphp
                                '{{ $total }}',
                            @endforeach
                        ],
                        type: "line",
                        fill: false,
                        borderColor: monthly_count_chart_line_color,
                    },
                        {
                            label: 'Orders Count',
                            data: [
                                @foreach($orders_sum_till_today_by_month as $order)
                                    '{{ $order->orders_count }}',
                                @endforeach
                            ],
                            type: "bar",
                            backgroundColor: default_bar_color,
                        },
                        {
                            label: 'Orders Count - Maaz',
                            backgroundColor: bdm1_bar_color,
                            data: [
                                @foreach($orders_sum_till_today_by_month as $order)
                                    @if(isset($bdms_monthly_orders[1][$order->full_date]))
                                    '{{ $bdms_monthly_orders[1][$order->full_date]['count'] }}',
                                @else
                                    '0',
                                @endif
                                @endforeach
                            ],
                            type: "bar",
                        },
                        {
                            label: 'Orders Count - Talib',
                            backgroundColor: bdm2_bar_color,
                            data: [
                                @foreach($orders_sum_till_today_by_month as $order)
                                    @if(isset($bdms_monthly_orders[2][$order->full_date]))
                                    '{{ $bdms_monthly_orders[2][$order->full_date]['count'] }}',
                                @else
                                    '0',
                                @endif
                                @endforeach
                            ],
                            type: "bar",
                        },
                        {
                            label: 'Orders Count - Mohin',
                            backgroundColor: bdm3_bar_color,
                            data: [
                                @foreach($orders_sum_till_today_by_month as $order)
                                    @if(isset($bdms_monthly_orders[3][$order->full_date]))
                                    '{{ $bdms_monthly_orders[3][$order->full_date]['count'] }}',
                                @else
                                    '0',
                                @endif
                                @endforeach
                            ],
                            type: "bar",
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Monthly Orders Count'
                    },
                    legend: {display: false},
                    scales: {
                        xAxes: [{
                            stacked: true,
                        }],
                        yAxes: [{
                            stacked: true,
                            ticks: {
                                beginAtZero: true,
                                stepSize: 10
                            }
                        }]
                    }
                }
            });

            var thirtyDaysGroupCtx = document.getElementById('thirtyDaysGroupChart').getContext('2d');
            var thirtyDaysGroupChart = new Chart(thirtyDaysGroupCtx, {
                type: 'bar',
                data: {
                    labels: [
                        @foreach($labelsForGroupChart as $date)
                            '{{ date_format(date_create($date), 'D, jS M') }}',
                        @endforeach
                    ],
                    datasets: [{
                        label: 'Sum of Group Order Amount ($)',
                        data: [
                            @foreach($labelsForGroupChart as $date)
                                @php
                                    $total = 0;
                                    if(isset($filtered_group_orders[0][$date])){
                                        $total += $filtered_group_orders[0][$date]['amount'];
                                    }
                                    if(isset($filtered_group_orders[1][$date])){
                                        $total += $filtered_group_orders[1][$date]['amount'];
                                    }
                                    if(isset($filtered_group_orders[2][$date])){
                                        $total += $filtered_group_orders[2][$date]['amount'];
                                    }
                                    if(isset($filtered_group_orders[3][$date])){
                                        $total += $filtered_group_orders[3][$date]['amount'];
                                    }
                                @endphp
                                '{{ $total }}',
                            @endforeach
                        ],
                        type: "line",
                        fill: false,
                        borderColor: filtered_amount_chart_line_color,
                    },
                        {
                            label: 'Sum of Group Order Amount ($)',
                            data: [
                                @foreach($labelsForGroupChart as $date)
                                    @if(isset($filtered_group_orders[0][$date]))
                                    '{{ $filtered_group_orders[0][$date]['amount'] }}',
                                @else
                                    '0',
                                @endif
                                @endforeach
                            ],
                            type: "bar",
                            backgroundColor: default_bar_color,
                        },
                        {
                            label: 'Sum of Group Order Amount ($) - Maaz',
                            backgroundColor: bdm1_bar_color,
                            data: [
                                @foreach($labelsForGroupChart as $date)
                                    @if(isset($filtered_group_orders[1][$date]))
                                    '{{ $filtered_group_orders[1][$date]['amount'] }}',
                                @else
                                    '0',
                                @endif
                                @endforeach
                            ],
                            type: "bar",
                        },
                        {
                            label: 'Sum of Group Order Amount ($) - Talib',
                            backgroundColor: bdm2_bar_color,
                            data: [
                                @foreach($labelsForGroupChart as $date)
                                    @if(isset($filtered_group_orders[2][$date]))
                                    '{{ $filtered_group_orders[2][$date]['amount'] }}',
                                @else
                                    '0',
                                @endif
                                @endforeach
                            ],
                            type: "bar",
                        },
                        {
                            label: 'Sum of Group Order Amount ($) - Mohin',
                            backgroundColor: bdm3_bar_color,
                            data: [
                                @foreach($labelsForGroupChart as $date)
                                    @if(isset($filtered_group_orders[3][$date]))
                                    '{{ $filtered_group_orders[3][$date]['amount'] }}',
                                @else
                                    '0',
                                @endif
                                @endforeach
                            ],
                            type: "bar",
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Comparison of Group Orders amount'
                    },
                    legend: {display: false},
                    scales: {
                        xAxes: [{
                            stacked: true
                        }],
                        yAxes: [{
                            stacked: true,
                            ticks: {
                                beginAtZero: true,
                                stepSize: 50
                            }
                        }]

                    }
                }
            });
        @endif
        // New Chart Group + Normal
        var thirtyDaysGroupIndividualCtx = document.getElementById('thirtyDaysNormalPlusGroupChart').getContext('2d');
        var thirtyDaysGroupIndividualChart = new Chart(thirtyDaysGroupIndividualCtx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach($allLabelsForGroupIndividual as $date)
                        '{{ date_format(date_create($date), 'D, jS M') }}',
                    @endforeach
                ],
                datasets: [
                    {
                        label: 'Sum of Order Amount ($)',
                        data: [
                            @foreach($allLabelsForGroupIndividual as $date)
                                @php
                                    $total = 0;
                                    $individualIndex = array_search($date, array_column(json_decode(json_encode($orders_sum_all_last_filtered_days),TRUE), 'full_date'));
                                    $groupIndex = array_search($date, array_column(json_decode(json_encode($group_orders_sum_all_last_filtered_days),TRUE), 'full_date'));

                                    if($individualIndex !== false){
                                        $total += $orders_sum_all_last_filtered_days[$individualIndex]->total_orders_amount;
                                    }

                                    if($groupIndex !== false){
                                        $total += $group_orders_sum_all_last_filtered_days[$groupIndex]->total_orders_amount;
                                    }
                                @endphp
                                '{{ $total }}',
                            @endforeach
                        ],
                        type: "line",
                        fill: false,
                        borderColor: filtered_amount_chart_line_color, // filtered_count_chart_line_color
                    },

                    {
                        label: 'Sum of Group Orders Amount ($)',
                        data: [
                            @foreach($allLabelsForGroupIndividual as $date)
                                @php
                                    $groupIndex = array_search($date, array_column(json_decode(json_encode($group_orders_sum_all_last_filtered_days),TRUE), 'full_date'));
                                @endphp

                                @if($groupIndex !== false)
                                '{{ $group_orders_sum_all_last_filtered_days[$groupIndex]->total_orders_amount }}',
                            @else
                                '0',
                            @endif
                            @endforeach
                        ],
                        type: "bar",
                        backgroundColor: bdm3_bar_color,
                    },
                    {
                        label: 'Sum of Individual Orders Amount ($)',
                        backgroundColor: default_bar_color,
                        data: [
                            @foreach($allLabelsForGroupIndividual as $date)
                                @php
                                    $individualIndex = array_search($date, array_column(json_decode(json_encode($orders_sum_all_last_filtered_days),TRUE), 'full_date'));
                                @endphp

                                @if($individualIndex !== false)
                                '{{ $orders_sum_all_last_filtered_days[$individualIndex]->total_orders_amount }}',
                            @else
                                '0',
                            @endif
                            @endforeach
                        ],
                        type: "bar",
                    }
                ]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                title: {
                    display: true,
                    text: 'Comparison of Orders amount for Filtered days (Individual and Group)'
                },
                legend: {display: false},
                scales: {
                    xAxes: [{
                        stacked: true
                    }],
                    yAxes: [{
                        stacked: true,
                        ticks: {
                            beginAtZero: true,
                            stepSize: 50
                        }
                    }]

                }
            }
        });

        // Weekly group + Normal
        var thirtyDaysWeeklyGroupIndividualCtx = document.getElementById('weeklyNormalPlusGroupChart').getContext('2d');
        var thirtyDaysWeeklyGroupIndividualChart = new Chart(thirtyDaysWeeklyGroupIndividualCtx, {
            type: 'bar',
            data: {
                labels: [
                    @php
                        function getStartAndEndDate($week, $year) {
                          $dateTime = new DateTime();
                          $dateTime->setISODate($year, $week);
                          $result['start_date'] = $dateTime->format('d-M-y');
                          $dateTime->modify('+6 days');
                          $result['end_date'] = $dateTime->format('d-M-y');
                          return $result;
                        }
                    @endphp
                        @foreach($labelsForIndividualGroupWeeklyChart as $key => $date)
                        @php
                            $splitDate = explode(" ", $date);
                            $dateRange = getStartAndEndDate($splitDate[0], $splitDate[1]);
                        @endphp
                        '{{ $dateRange['start_date'] }} - {{ $dateRange['end_date'] }}',
                    @endforeach
                ],
                datasets: [
                    {
                        label: 'Sum of Order Amount ($)',
                        data: [
                            @foreach($labelsForIndividualGroupWeeklyChart as $date)
                                @php
                                    $total = 0;
                                    $individualIndex = array_search($date, array_column(json_decode(json_encode($orders_sum_all_last_filtered_weekly),TRUE), 'week'));
                                    $groupIndex = array_search($date, array_column(json_decode(json_encode($group_sum_all_last_filtered_weekly),TRUE), 'week'));

                                    if($individualIndex !== false){
                                        $total += $orders_sum_all_last_filtered_weekly[$individualIndex]->total_orders_amount;
                                    }

                                    if($groupIndex !== false){
                                        $total += $group_sum_all_last_filtered_weekly[$groupIndex]->total_orders_amount;
                                    }
                                @endphp
                                '{{ $total }}',
                            @endforeach
                        ],
                        type: "line",
                        fill: false,
                        borderColor: filtered_amount_chart_line_color, // filtered_count_chart_line_color
                    },
                    {
                        label: 'Sum of Group Orders Amount ($)',
                        data: [
                            @foreach($labelsForIndividualGroupWeeklyChart as $date)
                                @php
                                    $groupIndex = array_search($date, array_column(json_decode(json_encode($group_sum_all_last_filtered_weekly),TRUE), 'week'));
                                @endphp

                                @if($groupIndex !== false)
                                '{{ $group_sum_all_last_filtered_weekly[$groupIndex]->total_orders_amount }}',
                            @else
                                '0',
                            @endif
                            @endforeach
                        ],
                        type: "bar",
                        backgroundColor: bdm3_bar_color,
                    },
                    {
                        label: 'Sum of Individual Orders Amount ($)',
                        backgroundColor: default_bar_color,
                        data: [
                            @foreach($labelsForIndividualGroupWeeklyChart as $date)
                                @php
                                    $individualIndex = array_search($date, array_column(json_decode(json_encode($orders_sum_all_last_filtered_weekly),TRUE), 'week'));
                                @endphp

                                @if($individualIndex !== false)
                                '{{ $orders_sum_all_last_filtered_weekly[$individualIndex]->total_orders_amount }}',
                            @else
                                '0',
                            @endif
                            @endforeach
                        ],
                        type: "bar",
                    }
                ]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                title: {
                    display: true,
                    text: 'Comparison of Orders amount for Filtered days (Individual and Group) Weekly'
                },
                legend: {display: false},
                scales: {
                    xAxes: [{
                        stacked: true
                    }],
                    yAxes: [{
                        stacked: true,
                        ticks: {
                            beginAtZero: true,
                            stepSize: 50
                        }
                    }]

                }
            }
        });

        /* monthly (individual + group) */
        var thirtyDaysGroupIndividualCtx = document.getElementById('monthlyGroupIndividual').getContext('2d');
        var thirtyDaysGroupIndividualChart = new Chart(thirtyDaysGroupIndividualCtx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach($labelsForIndividualGroupMonthlyChart as $date)
                        '{{ date_format(date_create($date), 'M Y') }}',
                    @endforeach
                ],
                datasets: [
                    {
                        label: 'Sum of Order Amount ($)',
                        data: [
                            @foreach($labelsForIndividualGroupMonthlyChart as $date)
                                @php
                                    $total = 0;
                                    $individualIndex = array_search($date, array_column(json_decode(json_encode($orders_sum_till_today_by_month_all),TRUE), 'full_date'));
                                    $groupIndex = array_search($date, array_column(json_decode(json_encode($orders_group_sum_till_today_by_month_all),TRUE), 'full_date'));


                                    if($individualIndex !== false){
                                        $total += $orders_sum_till_today_by_month_all[$individualIndex]->total_orders_amount;
                                    }

                                    if($groupIndex !== false){
                                        $total += $orders_group_sum_till_today_by_month_all[$groupIndex]->total_orders_amount;
                                    }
                                @endphp
                                '{{ $total }}',
                            @endforeach
                        ],
                        type: "line",
                        fill: false,
                        borderColor: filtered_amount_chart_line_color,
                    },

                    {
                        label: 'Sum of Group Orders Amount ($)',
                        data: [
                            @foreach($labelsForIndividualGroupMonthlyChart as $date)
                                @php
                                    $groupIndex = array_search($date, array_column(json_decode(json_encode($orders_group_sum_till_today_by_month_all),TRUE), 'full_date'));
                                @endphp

                                @if($groupIndex !== false)
                                '{{ $orders_group_sum_till_today_by_month_all[$groupIndex]->total_orders_amount }}',
                            @else
                                '0',
                            @endif
                            @endforeach
                        ],
                        type: "bar",
                        backgroundColor: bdm3_bar_color,
                    },
                    {
                        label: 'Sum of Individual Orders Amount ($)',
                        backgroundColor: default_bar_color,
                        data: [
                            @foreach($labelsForIndividualGroupMonthlyChart as $date)
                                @php
                                    $individualIndex = array_search($date, array_column(json_decode(json_encode($orders_sum_till_today_by_month_all),TRUE), 'full_date'));
                                @endphp

                                @if($individualIndex !== false)
                                '{{ $orders_sum_till_today_by_month_all[$individualIndex]->total_orders_amount }}',
                            @else
                                '0',
                            @endif
                            @endforeach
                        ],
                        type: "bar",
                    }
                ]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                title: {
                    display: true,
                    text: 'Monthly Orders Amount (Individual and Group)'
                },
                legend: {display: false},
                scales: {
                    xAxes: [{
                        stacked: true
                    }],
                    yAxes: [{
                        stacked: true,
                        ticks: {
                            beginAtZero: true,
                            stepSize: 50
                        }
                    }]

                }
            }
        });
        /* monthly (individual + group) */
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            // $('#orders-table').DataTable({
            //     pageLength: 20,
            //     lengthMenu: [[-1], ["All"]],
            //     order: [[ 0, 'desc']]
            // });

            $(".alert").fadeTo(2000, 500).slideUp(500, function () {
                $(".alert").slideUp(1500);
            });
        });
    </script>
@endsection
