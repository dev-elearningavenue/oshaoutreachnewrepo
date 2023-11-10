@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row mtpx-40 ta-center">
        <div class="col-md-3">
            <strong class="fs-large">Total Orders</strong>
            <h4 class="fc-primary">{{ number_format($total_orders) }}</h4>
        </div>
        <div class="col-md-3">
            <strong class="fs-large">Total Payments</strong>
            <h4 class="fc-primary">{{ number_format($total_payments) }}</h4>
        </div>
        <div class="col-md-3">
            <strong class="fs-large">Total Group Enquiries</strong>
            <h4 class="fc-primary">{{ number_format($total_group_enrollment_enquiries) }}</h4>
        </div>
    </div>

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


@endsection

@section('scripts')
    <script type="text/javascript">
        var default_bar_color = "#E5E5E5";
        var bdm1_bar_color = "#ADD8E6";
        var bdm2_bar_color = "#00BFFF";
        var bdm3_bar_color = "#1E90FF";

        var filtered_amount_chart_line_color = "#50C878";
        var filtered_count_chart_line_color = "#F1BD33";
    </script>

    <script src="{{ asset('src/js/Chart.min.js') }}"></script>
    <script>
        var thirtyDaysCtx = document.getElementById('thirtyDaysChart').getContext('2d');
        var thirtyDaysChart = new Chart(thirtyDaysCtx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach($orders_sum_for_last_filtered_days as $order)
                        '{{ $order->day }}',
                    @endforeach
                ],
                datasets: [{
                    label: 'Sum of Order Amount ($)',
                    data: [
                        @foreach($orders_sum_for_last_filtered_days as $order)
                                @php
                                    $total = $order->total_orders_amount;
                                    if(isset($bdms_filtered_orders[1][$order->full_date])){
                                        $total += $bdms_filtered_orders[1][$order->full_date]['amount'];
                                    }
                                    if(isset($bdms_filtered_orders[2][$order->full_date])){
                                        $total += $bdms_filtered_orders[2][$order->full_date]['amount'];
                                    }
                                    if(isset($bdms_filtered_orders[3][$order->full_date])){
                                        $total += $bdms_filtered_orders[3][$order->full_date]['amount'];
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
                            @foreach($orders_sum_for_last_filtered_days as $order)
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
                            @foreach($orders_sum_for_last_filtered_days as $order)
                                    @if(isset($bdms_filtered_orders[1][$order->full_date]))
                                '{{ $bdms_filtered_orders[1][$order->full_date]['amount'] }}',
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
                            @foreach($orders_sum_for_last_filtered_days as $order)
                                    @if(isset($bdms_filtered_orders[2][$order->full_date]))
                                '{{ $bdms_filtered_orders[2][$order->full_date]['amount'] }}',
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
                            @foreach($orders_sum_for_last_filtered_days as $order)
                                    @if(isset($bdms_filtered_orders[3][$order->full_date]))
                                '{{ $bdms_filtered_orders[3][$order->full_date]['amount'] }}',
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
                legend: { display: false },
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
                    @foreach($orders_sum_for_last_filtered_days as $order)
                        '{{ $order->day }}',
                    @endforeach
                ],
                datasets: [{
                    label: 'Orders Count',
                    data: [
                        @foreach($orders_sum_for_last_filtered_days as $order)
                                @php
                                    $total = $order->orders_count;
                                    if(isset($bdms_filtered_orders[1][$order->full_date])){
                                        $total += $bdms_filtered_orders[1][$order->full_date]['count'];
                                    }
                                    if(isset($bdms_filtered_orders[2][$order->full_date])){
                                        $total += $bdms_filtered_orders[2][$order->full_date]['count'];
                                    }
                                    if(isset($bdms_filtered_orders[3][$order->full_date])){
                                        $total += $bdms_filtered_orders[3][$order->full_date]['count'];
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
                            @foreach($orders_sum_for_last_filtered_days as $order)
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
                            @foreach($orders_sum_for_last_filtered_days as $order)
                                    @if(isset($bdms_filtered_orders[1][$order->full_date]))
                                '{{ $bdms_filtered_orders[1][$order->full_date]['count'] }}',
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
                            @foreach($orders_sum_for_last_filtered_days as $order)
                                    @if(isset($bdms_filtered_orders[2][$order->full_date]))
                                '{{ $bdms_filtered_orders[2][$order->full_date]['count'] }}',
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
                            @foreach($orders_sum_for_last_filtered_days as $order)
                                    @if(isset($bdms_filtered_orders[3][$order->full_date]))
                                '{{ $bdms_filtered_orders[3][$order->full_date]['count'] }}',
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
                legend: { display: false },
                scales: {
                    xAxes: [{
                        stacked:true,
                    }],
                    yAxes: [{
                        stacked:true,
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }]
                }
            }
        });
    </script>
@endsection