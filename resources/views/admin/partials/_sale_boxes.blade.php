@php
    use Carbon\Carbon;

    $user_id = request()->input('user_id');
    $bdmNo = getBDMId($user_id);

    if($bdmNo) {
        $orders_sum_for_today = orders_sum_for_today_bdm($bdmNo);
        $orders_sum_for_this_week = orders_sum_for_this_week_bdm($bdmNo);
        $orders_sum_for_this_month = orders_sum_for_this_month_bdm($bdmNo);

        $sales_count = [
                    'daily' => [
                        'orders_count' => $orders_sum_for_today[0]->orders_count,
                        'total_orders_amount' => $orders_sum_for_today[0]->total_orders_amount,
                        'day' => Carbon::createFromFormat('Y-m-d', $orders_sum_for_today[0]->day)->format('jS F, Y')
                    ],
                    'weekly' => [
                        'orders_count' => $orders_sum_for_this_week[0]->orders_count,
                        'total_orders_amount' => $orders_sum_for_this_week[0]->total_orders_amount,
                        'week' => Carbon::createFromFormat('Y-u', $orders_sum_for_this_week[0]->week)->format('W')
                    ],
                    'monthly' => [
                        'orders_count' => $orders_sum_for_this_month[0]->orders_count,
                        'total_orders_amount' => $orders_sum_for_this_month[0]->total_orders_amount,
                        'month' => Carbon::createFromFormat('Y-m', $orders_sum_for_this_month[0]->month)->format('F, Y')
                    ],
        ];
    }
@endphp

@if($bdmNo)
    <div class="row mtpx-40 ta-center mbpx-40" style="display: flex; justify-content: space-around">
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
@endif
