<?php

namespace App\Http\Controllers;

use App\Jobs\SendDiscountOfferSMS;
use App\Models\FAQ;
use App\Jobs\SendSuccessEmail;
use App\Jobs\SendSuccessSMS;
use App\Models\GroupSlabs;
use App\Models\Leed;
use App\Models\OrderLog;
use App\Models\Product;
use App\Models\SEO_Tag;
use App\Models\User;
use App\Models\UserDetailLogs;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use libphonenumber\PhoneNumberUtil;
use Mail;
use App\Models\Cart;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\GroupEnrollmentEnquiries;
use App\Jobs\SendDiscountOfferEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $userType = \auth()->user()->type;
        $userId = \auth()->user()->id;

        // Date Filters
        $date_filtered_days_before = Carbon::now()->subDay(30)->format('Y-m-d');
        if (!empty($request->start_date) && !empty($request->end_date)) {
            $date_filtered_condition = " HAVING full_date >= '" . $request->start_date . "' ";
            $date_filtered_condition .= " AND full_date <= '" . $request->end_date . "' ";
        } elseif (!empty($request->start_date)) {
            $date_filtered_condition = " HAVING full_date >= '" . $request->start_date . "' ";
        } elseif (!empty($request->end_date)) {
            $date_filtered_condition = " HAVING full_date <= '" . $request->end_date . "' ";
        } else {
            $date_filtered_condition = " HAVING full_date >= '" . $date_filtered_days_before . "' ";
        }

        if (in_array(Auth::user()->type, [USER_TYPE_ADMIN, USER_TYPE_DIGITAL_MARKETER, USER_TYPE_BDM])) {
            $clientOf = 0;
            $clientOfQueryString = "AND amount > 0";

            if ($userType === USER_TYPE_BDM) {
                $userIdToBdm = [
                    3 => 1,
                    4 => 2,
                    5 => 3,
                    9 => 4
                ];

                $clientOf = $userIdToBdm[$userId];
                $clientOfQueryString = "AND client_of = $clientOf AND amount > 0";
            }

            $total_orders = Order::where('client_of', $clientOf)->count();
            $total_payments = Order::where('client_of', $clientOf)->where('payment_status', '!=', 0)->count();
            $total_group_enrollment_enquiries = GroupEnrollmentEnquiries::where('client_of', $clientOf)->count();

            $orders_sum_for_today = \DB::select('SELECT
                                                  SUM(total_orders_amount) as total_orders_amount,
                                                  SUM(orders_count) as orders_count,
                                                  day
                                                FROM
                                                  (
                                                    SELECT
                                                      SUM(
                                                        IF(
                                                          discounted_price IS NOT NULL, discounted_price,
                                                          amount
                                                        )
                                                      ) as total_orders_amount,
                                                      COUNT(id) as orders_count,
                                                      DATE_FORMAT(
                                                        CONVERT_TZ(created_at, "+00:00", "-04:00"),
                                                        "%Y-%m-%d"
                                                      ) as day
                                                    FROM
                                                      `orders`
                                                    WHERE
                                                      payment_status = 1
                                                    ' . $clientOfQueryString . '
                                                     GROUP BY
                                                      day
                                                    HAVING
                                                      day = DATE_FORMAT(NOW(), "%Y-%m-%d")
                                                    UNION
                                                    SELECT
                                                      SUM(amount) as total_orders_amount,
                                                      COUNT(id) as orders_count,
                                                      DATE_FORMAT(
                                                        CONVERT_TZ(created_at, "+00:00", "-04:00"),
                                                        "%Y-%m-%d"
                                                      ) as day
                                                    FROM
                                                      `group_enrollment_enquiries`
                                                    WHERE
                                                      payment_status = 1
                                                    ' . $clientOfQueryString . '
                                                    GROUP BY
                                                    day
                                                    HAVING
                                                      day = DATE_FORMAT(NOW(), "%Y-%m-%d")
                                                    UNION
                                                    SELECT
                                                      0 as total_orders_amount,
                                                      0 as orders_count,
                                                      DATE_FORMAT(NOW(), "%Y-%m-%d") as day
                                                  ) daily_sale
                                                GROUP BY
                                                  day');
            $orders_sum_for_this_week = \DB::select('SELECT
                                                      SUM(total_orders_amount) as total_orders_amount,
                                                      SUM(orders_count) as orders_count,
                                                      week
                                                    FROM
                                                      (
                                                        SELECT
                                                          SUM(
                                                            IF(
                                                              discounted_price IS NOT NULL, discounted_price,
                                                              amount
                                                            )
                                                          ) as total_orders_amount,
                                                          COUNT(id) as orders_count,
                                                          DATE_FORMAT(
                                                            CONVERT_TZ(created_at, "+00:00", "-04:00"),
                                                            "%Y-%u"
                                                          ) as week
                                                        FROM
                                                          `orders`
                                                        WHERE
                                                          payment_status = 1
                                                        ' . $clientOfQueryString . '
                                                        GROUP BY
                                                          week
                                                        HAVING
                                                          week = DATE_FORMAT(NOW(), "%Y-%u")
                                                        UNION
                                                        SELECT
                                                          SUM(amount) as total_orders_amount,
                                                          COUNT(id) as orders_count,
                                                          DATE_FORMAT(
                                                            CONVERT_TZ(created_at, "+00:00", "-04:00"),
                                                            "%Y-%u"
                                                          ) as week
                                                        FROM
                                                          `group_enrollment_enquiries`
                                                        WHERE
                                                          payment_status = 1
                                                          ' . $clientOfQueryString . '
                                                        GROUP BY
                                                          week
                                                        HAVING
                                                          week = DATE_FORMAT(NOW(), "%Y-%u")
                                                        UNION
                                                        SELECT
                                                          0 as total_orders_amount,
                                                          0 as orders_count,
                                                          DATE_FORMAT(NOW(), "%Y-%u") as week
                                                      ) weekly_sale
                                                    GROUP BY
                                                      week');
            $orders_sum_for_this_month = \DB::select('SELECT
                                                      SUM(total_orders_amount) as total_orders_amount,
                                                      SUM(orders_count) as orders_count,
                                                      month
                                                    FROM
                                                      (
                                                        SELECT
                                                          SUM(
                                                            IF(
                                                              discounted_price IS NOT NULL, discounted_price,
                                                              amount
                                                            )
                                                          ) as total_orders_amount,
                                                          COUNT(id) as orders_count,
                                                          DATE_FORMAT(
                                                            CONVERT_TZ(created_at, "+00:00", "-04:00"),
                                                            "%Y-%m"
                                                          ) as month
                                                        FROM
                                                          `orders`
                                                        WHERE
                                                          payment_status = 1
                                                        ' . $clientOfQueryString . '
                                                        GROUP BY
                                                          month
                                                        HAVING
                                                          month = DATE_FORMAT(NOW(), "%Y-%m")
                                                        UNION
                                                        SELECT
                                                          SUM(amount) as total_orders_amount,
                                                          COUNT(id) as orders_count,
                                                          DATE_FORMAT(
                                                            CONVERT_TZ(created_at, "+00:00", "-04:00"),
                                                            "%Y-%m"
                                                          ) as month
                                                        FROM
                                                          `group_enrollment_enquiries`
                                                        WHERE
                                                          payment_status = 1
                                                        ' . $clientOfQueryString . '
                                                        GROUP BY
                                                          month
                                                        HAVING
                                                          month = DATE_FORMAT(NOW(), "%Y-%m")
                                                        UNION
                                                        SELECT
                                                          0 as total_orders_amount,
                                                          0 as orders_count,
                                                          DATE_FORMAT(NOW(), "%Y-%m") as month
                                                      ) monthly_sale
                                                    GROUP BY
                                                      month');

            $orders_sum_till_today_by_month = \DB::select('SELECT SUM(IF(discounted_price IS NOT NULL, discounted_price, amount)) as total_orders_amount,
                                                COUNT(id) as orders_count,
                                                DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%b, %Y") as day,
                                                DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%Y-%m") as full_date
                                                FROM `orders`
                                                WHERE payment_status = 1
                                                            AND client_of = ' . $clientOf . '
                                                            AND amount > 0
                                                GROUP BY day
                                                ORDER BY full_date');
            $orders_sum_bdm1_till_today_by_month = \DB::select('SELECT SUM(IF(discounted_price IS NOT NULL, discounted_price, amount)) as total_orders_amount,
                                                COUNT(id) as orders_count,
                                                DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%b, %Y") as day,
                                                DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%Y-%m") as full_date
                                                FROM `orders`
                                                WHERE payment_status = 1
                                                            AND client_of = 1
                                                            AND amount > 0
                                                GROUP BY day
                                                ORDER BY full_date');
            $orders_sum_bdm2_till_today_by_month = \DB::select('SELECT SUM(IF(discounted_price IS NOT NULL, discounted_price, amount)) as total_orders_amount,
                                                COUNT(id) as orders_count,
                                                DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%b, %Y") as day,
                                                DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%Y-%m") as full_date
                                                FROM `orders`
                                                WHERE payment_status = 1
                                                            AND client_of = 2
                                                            AND amount > 0
                                                GROUP BY day
                                                ORDER BY full_date');
            $orders_sum_bdm3_till_today_by_month = \DB::select('SELECT SUM(IF(discounted_price IS NOT NULL, discounted_price, amount)) as total_orders_amount,
                                                COUNT(id) as orders_count,
                                                DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%b, %Y") as day,
                                                DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%Y-%m") as full_date
                                                FROM `orders`
                                                WHERE payment_status = 1
                                                            AND client_of = 3
                                                            AND amount > 0
                                                GROUP BY day
                                                ORDER BY full_date');

            $orders_sum_till_today_by_month_all = \DB::select('SELECT SUM(IF(discounted_price IS NOT NULL, discounted_price, amount)) as total_orders_amount,
                                                COUNT(id) as orders_count,
                                                DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%b, %Y") as day,
                                                DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%Y-%m") as full_date
                                                FROM `orders`
                                                WHERE payment_status = 1
                                                ' . $clientOfQueryString . '
                                                GROUP BY day
                                                ORDER BY full_date');

            $orders_group_sum_till_today_by_month_all = \DB::select('SELECT SUM(amount) as total_orders_amount,
                                                COUNT(id) as orders_count,
                                                DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%b, %Y") as day,
                                                DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%Y-%m") as full_date
                                                FROM `group_enrollment_enquiries`
                                                WHERE payment_status = 1
                                                ' . $clientOfQueryString . '
                                                GROUP BY day
                                                ORDER BY full_date');

            $orders_sum_for_last_filtered_days = \DB::select('SELECT SUM(IF(discounted_price IS NOT NULL, discounted_price, amount)) as total_orders_amount,
                                            COUNT(id) as orders_count,
                                            DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%a, %D %b") as day,
                                            DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%Y-%m-%d") as full_date
                                            FROM `orders`
                                            WHERE payment_status = 1
                                            AND client_of = ' . $clientOf . '
                                            AND amount > 0
                                            GROUP BY day
                                            ' . $date_filtered_condition . '
                                            ORDER BY full_date');
            $orders_sum_for_bdm1_last_filtered_days = \DB::select('SELECT SUM(IF(discounted_price IS NOT NULL, discounted_price, amount)) as total_orders_amount,
                                            COUNT(id) as orders_count,
                                            DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%a, %D %b") as day,
                                            DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%Y-%m-%d") as full_date
                                            FROM `orders`
                                            WHERE payment_status = 1
                                            AND client_of = 1
                                            AND amount > 0
                                            GROUP BY day
                                            ' . $date_filtered_condition . '
                                            ORDER BY full_date');
            $orders_sum_for_bdm2_last_filtered_days = \DB::select('SELECT SUM(IF(discounted_price IS NOT NULL, discounted_price, amount)) as total_orders_amount,
                                            COUNT(id) as orders_count,
                                            DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%a, %D %b") as day,
                                            DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%Y-%m-%d") as full_date
                                            FROM `orders`
                                            WHERE payment_status = 1
                                            AND client_of = 2
                                            AND amount > 0
                                            GROUP BY day
                                            ' . $date_filtered_condition . '
                                            ORDER BY full_date');
            $orders_sum_for_bdm3_last_filtered_days = \DB::select('SELECT SUM(IF(discounted_price IS NOT NULL, discounted_price, amount)) as total_orders_amount,
                                            COUNT(id) as orders_count,
                                            DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%a, %D %b") as day,
                                            DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%Y-%m-%d") as full_date
                                            FROM `orders`
                                            WHERE payment_status = 1
                                            AND client_of = 3
                                            AND amount > 0
                                            GROUP BY day
                                            ' . $date_filtered_condition . '
                                            ORDER BY full_date');

            $group_orders_sum_for_last_filtered_days = \DB::select('SELECT SUM(amount) as total_orders_amount,
                                            COUNT(id) as orders_count,
                                            DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%a, %D %b") as day,
                                            DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%Y-%m-%d") as full_date
                                            FROM `group_enrollment_enquiries`
                                            WHERE payment_status = 1
                                            AND client_of = ' . $clientOf . '
                                            AND amount > 0
                                            GROUP BY day
                                            ' . $date_filtered_condition . '
                                            ORDER BY full_date DESC');

            $group_orders_sum_for_bdm1_last_filtered_days = \DB::select('SELECT SUM(amount) as total_orders_amount,
                                            COUNT(id) as orders_count,
                                            DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%a, %D %b") as day,
                                            DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%Y-%m-%d") as full_date
                                            FROM `group_enrollment_enquiries`
                                            WHERE payment_status = 1
                                            AND client_of = 1
                                            AND amount > 0
                                            GROUP BY day
                                            ' . $date_filtered_condition . '
                                            ORDER BY full_date DESC');

            $group_orders_sum_for_bdm2_last_filtered_days = \DB::select('SELECT SUM(amount) as total_orders_amount,
                                            COUNT(id) as orders_count,
                                            DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%a, %D %b") as day,
                                            DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%Y-%m-%d") as full_date
                                            FROM `group_enrollment_enquiries`
                                            WHERE payment_status = 1
                                            AND client_of = 2
                                            AND amount > 0
                                            GROUP BY day
                                            ' . $date_filtered_condition . '
                                            ORDER BY full_date DESC');

            $group_orders_sum_for_bdm3_last_filtered_days = \DB::select('SELECT SUM(amount) as total_orders_amount,
                                            COUNT(id) as orders_count,
                                            DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%a, %D %b") as day,
                                            DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%Y-%m-%d") as full_date
                                            FROM `group_enrollment_enquiries`
                                            WHERE payment_status = 1
                                            AND client_of = 3
                                            AND amount > 0
                                            GROUP BY day
                                            ' . $date_filtered_condition . '
                                            ORDER BY full_date DESC');


            $group_orders_sum_all_last_filtered_days = \DB::select('SELECT SUM(amount) as total_orders_amount,
                                            COUNT(id) as orders_count,
                                            DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%a, %D %b") as day,
                                            DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%Y-%m-%d") as full_date
                                            FROM `group_enrollment_enquiries`
                                            WHERE payment_status = 1
                                            ' . $clientOfQueryString . '
                                            GROUP BY day
                                            ' . $date_filtered_condition . '
                                            ORDER BY full_date DESC');

            $orders_sum_all_last_filtered_days = \DB::select('SELECT SUM(IF(discounted_price IS NOT NULL, discounted_price, amount)) as total_orders_amount,
                                            COUNT(id) as orders_count,
                                            DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%a, %D %b") as day,
                                            DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%Y-%m-%d") as full_date
                                            FROM `orders`
                                            WHERE payment_status = 1
                                            ' . $clientOfQueryString . '
                                            GROUP BY day
                                            ' . $date_filtered_condition . '
                                            ORDER BY full_date DESC');

            $orders_sum_all_last_filtered_weekly = \DB::select('SELECT SUM(IF(discounted_price IS NOT NULL, discounted_price, amount)) as total_orders_amount,
                                            COUNT(id) as orders_count,
                                            DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%v %Y") as week,
                                            DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%Y-%m-%d") as full_date
                                            FROM `orders`
                                            WHERE payment_status = 1
                                            ' . $clientOfQueryString . '
                                            GROUP BY week
                                            ' . $date_filtered_condition . '
                                            ORDER BY full_date');

            $group_sum_all_last_filtered_weekly = \DB::select('SELECT SUM(amount) as total_orders_amount,
                                            COUNT(id) as orders_count,
                                            DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%v %Y") as week,
                                            DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%Y-%m-%d") as full_date
                                            FROM `group_enrollment_enquiries`
                                            WHERE payment_status = 1
                                            ' . $clientOfQueryString . '
                                            GROUP BY week
                                            ' . $date_filtered_condition . '
                                            ORDER BY full_date');

            $individual_filtered_orders = [];
            $bdms_monthly_orders = [];
            $filtered_group_orders = [];
            if ($userType !== USER_TYPE_BDM) {
                // build data for individual_filtered_orders array
                foreach ($orders_sum_for_last_filtered_days as $order) {
                    $individual_filtered_orders[0][$order->full_date] = [
                        'amount' => $order->total_orders_amount,
                        'count' => $order->orders_count
                    ];
                }

                foreach ($orders_sum_for_bdm1_last_filtered_days as $order) {
                    $individual_filtered_orders[1][$order->full_date] = [
                        'amount' => $order->total_orders_amount,
                        'count' => $order->orders_count
                    ];
                }
                foreach ($orders_sum_for_bdm2_last_filtered_days as $order) {
                    $individual_filtered_orders[2][$order->full_date] = [
                        'amount' => $order->total_orders_amount,
                        'count' => $order->orders_count
                    ];
                }
                foreach ($orders_sum_for_bdm3_last_filtered_days as $order) {
                    $individual_filtered_orders[3][$order->full_date] = [
                        'amount' => $order->total_orders_amount,
                        'count' => $order->orders_count
                    ];
                }

                // build data for bdms_monthly_orders array
                foreach ($orders_sum_bdm1_till_today_by_month as $order) {
                    $bdms_monthly_orders[1][$order->full_date] = [
                        'amount' => $order->total_orders_amount,
                        'count' => $order->orders_count
                    ];
                }
                foreach ($orders_sum_bdm2_till_today_by_month as $order) {
                    $bdms_monthly_orders[2][$order->full_date] = [
                        'amount' => $order->total_orders_amount,
                        'count' => $order->orders_count
                    ];
                }
                foreach ($orders_sum_bdm3_till_today_by_month as $order) {
                    $bdms_monthly_orders[3][$order->full_date] = [
                        'amount' => $order->total_orders_amount,
                        'count' => $order->orders_count
                    ];
                }


                // build data for filtered_group_orders array & reverse Array
                $group_orders_sum_for_last_filtered_days = array_reverse($group_orders_sum_for_last_filtered_days);
                $group_orders_sum_for_bdm1_last_filtered_days = array_reverse($group_orders_sum_for_bdm1_last_filtered_days);
                $group_orders_sum_for_bdm2_last_filtered_days = array_reverse($group_orders_sum_for_bdm2_last_filtered_days);
                $group_orders_sum_for_bdm3_last_filtered_days = array_reverse($group_orders_sum_for_bdm3_last_filtered_days);

                foreach ($group_orders_sum_for_last_filtered_days as $order) {
                    $filtered_group_orders[0][$order->full_date] = [
                        'amount' => $order->total_orders_amount,
                        'count' => $order->orders_count
                    ];
                }

                foreach ($group_orders_sum_for_bdm1_last_filtered_days as $order) {
                    $filtered_group_orders[1][$order->full_date] = [
                        'amount' => $order->total_orders_amount,
                        'count' => $order->orders_count
                    ];
                }
                foreach ($group_orders_sum_for_bdm2_last_filtered_days as $order) {
                    $filtered_group_orders[2][$order->full_date] = [
                        'amount' => $order->total_orders_amount,
                        'count' => $order->orders_count
                    ];
                }
                foreach ($group_orders_sum_for_bdm3_last_filtered_days as $order) {
                    $filtered_group_orders[3][$order->full_date] = [
                        'amount' => $order->total_orders_amount,
                        'count' => $order->orders_count
                    ];
                }
            }

            /* labels for monthly (individual + group) chart */
            $orders_sum_till_today_by_month_all_date = collect($orders_sum_till_today_by_month_all)->pluck('full_date');
            $orders_group_sum_till_today_by_month_all_date = collect($orders_group_sum_till_today_by_month_all)->pluck('full_date');

            $labelsForIndividualGroupMonthlyChart = $orders_sum_till_today_by_month_all_date
                ->merge($orders_group_sum_till_today_by_month_all_date)
                ->unique()
                ->values()
                ->all();

            usort($labelsForIndividualGroupMonthlyChart, function ($a, $b) {
                return strtotime($a) - strtotime($b);
            });
            /* labels for monthly (individual + group) chart */

            /* labels for weekly (individual + group) chart */
            $orders_sum_all_last_filtered_weekly_date = collect($orders_sum_all_last_filtered_weekly)->pluck('week', 'full_date');
            $group_sum_all_last_filtered_weekly_date = collect($group_sum_all_last_filtered_weekly)->pluck('week', 'full_date');


            $labelsForIndividualGroupWeeklyChart = $orders_sum_all_last_filtered_weekly_date
                ->merge($group_sum_all_last_filtered_weekly_date)
                ->unique()
                ->all();

            uksort($labelsForIndividualGroupWeeklyChart, function ($a, $b) {
                return strtotime($a) - strtotime($b);
            });

            $labelsForIndividualGroupWeeklyChart = array_values($labelsForIndividualGroupWeeklyChart);
            /* labels for weekly (individual + group) chart */


            /* labels for individual filtered chart */
            $orders_sum_for_last_filtered_days_date = collect($orders_sum_for_last_filtered_days)->pluck('full_date');

            if ($userType !== USER_TYPE_BDM) {
                $orders_sum_for_bdm1_last_filtered_days_date = collect($orders_sum_for_bdm1_last_filtered_days)->pluck('full_date');
                $orders_sum_for_bdm2_last_filtered_days_date = collect($orders_sum_for_bdm2_last_filtered_days)->pluck('full_date');
                $orders_sum_for_bdm3_last_filtered_days_date = collect($orders_sum_for_bdm3_last_filtered_days)->pluck('full_date');

                $labelsForIndividualFilteredChart = $orders_sum_for_last_filtered_days_date
                    ->merge($orders_sum_for_bdm1_last_filtered_days_date)
                    ->merge($orders_sum_for_bdm2_last_filtered_days_date)
                    ->merge($orders_sum_for_bdm3_last_filtered_days_date)
                    ->unique()
                    ->values()
                    ->all();
            } else {
                $labelsForIndividualFilteredChart = $orders_sum_for_last_filtered_days_date
                    ->unique()
                    ->values()
                    ->all();
            }

            usort($labelsForIndividualFilteredChart, function ($a, $b) {
                return strtotime($a) - strtotime($b);
            });
            /* labels for individual filtered chart */

            /* labels for group chart */
            $group_orders_sum_for_last_filtered_days_date = collect($group_orders_sum_for_last_filtered_days)->pluck('full_date');

            if ($userType !== USER_TYPE_BDM) {
                $group_orders_sum_for_bdm1_last_filtered_days_date = collect($group_orders_sum_for_bdm1_last_filtered_days)->pluck('full_date');
                $group_orders_sum_for_bdm2_last_filtered_days_date = collect($group_orders_sum_for_bdm2_last_filtered_days)->pluck('full_date');
                $group_orders_sum_for_bdm3_last_filtered_days_date = collect($group_orders_sum_for_bdm3_last_filtered_days)->pluck('full_date');

                $labelsForGroupChart = $group_orders_sum_for_last_filtered_days_date
                    ->merge($group_orders_sum_for_bdm1_last_filtered_days_date)
                    ->merge($group_orders_sum_for_bdm2_last_filtered_days_date)
                    ->merge($group_orders_sum_for_bdm3_last_filtered_days_date)
                    ->unique()
                    ->values()
                    ->all();
            } else {
                $labelsForGroupChart = $group_orders_sum_for_last_filtered_days_date
                    ->unique()
                    ->values()
                    ->all();
            }

            usort($labelsForGroupChart, function ($a, $b) {
                return strtotime($a) - strtotime($b);
            });
            /* labels for group chart */

            /* for individual and group merged chart */
            $group_orders_sum_all_last_filtered_days = array_reverse($group_orders_sum_all_last_filtered_days);
            $orders_sum_all_last_filtered_days = array_reverse($orders_sum_all_last_filtered_days);

            $individualOrderAllLabels = collect($group_orders_sum_all_last_filtered_days)->pluck('full_date')->all();
            $groupOrderAllLabels = collect($orders_sum_all_last_filtered_days)->pluck('full_date')->all();
            $allLabelsForGroupIndividual = collect($individualOrderAllLabels)->merge($groupOrderAllLabels)->unique()->values()->all();

            usort($allLabelsForGroupIndividual, function ($a, $b) {
                return strtotime($a) - strtotime($b);
            });
            /* for individual and group merged chart */

            /* for current Day, Week and Month Sales Count */
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

            return view(
                'admin.dashboard',
                compact(
                    'sales_count',
                    'total_orders',
                    'total_payments',
                    'total_group_enrollment_enquiries',
                    'orders_sum_till_today_by_month',
                    'bdms_monthly_orders',
                    'individual_filtered_orders',
                    'labelsForIndividualFilteredChart',
                    'filtered_group_orders',
                    'labelsForGroupChart',
                    'group_orders_sum_all_last_filtered_days',
                    'orders_sum_all_last_filtered_days',
                    'allLabelsForGroupIndividual',
                    'orders_sum_till_today_by_month_all',
                    'orders_group_sum_till_today_by_month_all',
                    'labelsForIndividualGroupMonthlyChart',
                    'labelsForIndividualGroupWeeklyChart',
                    'group_sum_all_last_filtered_weekly',
                    'orders_sum_all_last_filtered_weekly'
                )
            );

            //            return view('admin.marketer_dashboard', compact('total_orders', 'total_payments',  'total_group_enrollment_enquiries'));

        }

        //        else if (Auth::user()->type == USER_TYPE_BDM) {
        //            $total_orders = Order::where('amount', '>', 0)
        //                ->where('client_of', $this->getBDMId())->count();
        //            $total_payments = Order::where('payment_status', '!=', 0)
        //                ->where('client_of', $this->getBDMId())->count();
        //            $total_group_enrollment_enquiries
        //                = GroupEnrollmentEnquiries::where('client_of', $this->getBDMId())->count();
        //            return view('admin.bdm_dashboard', compact('total_orders', 'total_payments',
        //                'total_group_enrollment_enquiries'));
        //        }
    }


    public function getSignin()
    {
        return view('admin.signin', ['login_failed' => false]);
    }

    public function postSignin(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required',
        ]);

        $checkUser = User::where('email', $request->email)->first();


        if ($checkUser !== null && $checkUser->status == 0) {
            return view('admin.signin', ['user_inactive' => true]);
        }

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            if (Session::has('oldUrl')) {
                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
                return redirect()->to($oldUrl);
            }

            return redirect()->route('admin.dashboard');
        }

        return view('admin.signin', ['login_failed' => true]);
    }

    public function getAllOrders(Request $request)
    {
        $offset = $request->start ? $request->start : 0;
        $limit = $request->length ? $request->length : 50;
        $orders = Order::latest();

        $all_input = $request->all();

        $search_value = $all_input['search']['value'];

        if (!empty($search_value)) {
            $orders = $orders->where('uoid', 'LIKE', '%' . $search_value . '%')
                ->orWhere('first_name', 'LIKE', '%' . $search_value . '%')
                ->orWhere('last_name', 'LIKE', '%' . $search_value . '%')
                ->orWhere('email', 'LIKE', '%' . $search_value . '%')
                ->orWhere('contact_no', 'LIKE', '%' . $search_value . '%')
                ->orWhere('address', 'LIKE', '%' . $search_value . '%')
                ->orWhere('zip_code', 'LIKE', '%' . $search_value . '%')
                ->orWhere('city', 'LIKE', '%' . $search_value . '%')
                ->orWhere('state', 'LIKE', '%' . $search_value . '%')
                ->orWhere('country', 'LIKE', '%' . $search_value . '%')
                ->orWhere('username', 'LIKE', '%' . $search_value . '%');

            $recordsFiltered = $orders->count();
        } else {
            $recordsFiltered = Order::count();
        }

        if ($limit > 0) {
            $orders = $orders->offset($offset)->limit($limit);
        }
        $orders = $orders->get();

        $orders_array = [];

        foreach ($orders as $order) {
            $order_obj = [];
            $order_obj['created_at'] = "<strong>" . \Carbon\Carbon::parse($order->created_at)->timezone('Canada/Eastern')->format('Y/m/d H:i A') . "</strong>";
            $order_obj['is_completed'] = $order->uoid . '<br>';
            if ($order->is_completed) {
                $order_obj['is_completed'] .= '<span class="badge badge-complete">Completed</span>';
            } else {
                $order_obj['is_completed'] .= '<span class="badge badge-incomplete">Incomplete</span>';
            }
            $order_obj['user_details'] = "{$order->first_name} {$order->last_name}<br/>";
            $order_obj['user_details'] .= "Email: {$order->email}<br/>";
            $order_obj['user_details'] .= "Username: {$order->username}<br/>";
            $order_obj['user_details'] .= "Password: {$order->password}<br/>";
            $order_obj['user_details'] .= "Contact#: {$order->contact_no}<br/>";
            $order_obj['user_details'] .= "Address: {$order->address}, {$order->zip_code}<br/>";
            $order_obj['user_details'] .= "{$order->city}, {$order->state}, {$order->country}";

            $cart = new Cart(unserialize($order->cart));
            $order_obj['order_details'] = '';
            if ($cart->items) {
                foreach ($cart->items as $product) {
                    $order_obj['order_details'] .= "{$product['item']['title']}<br/>";
                    $order_obj['order_details'] .= "Qty: <strong>{$product['qty']}</strong>,";
                    $order_obj['order_details'] .= "Price/Unit: <strong>$" . number_format($product['item']['price'], 2) . "</strong><br/>";
                }
            }
            $order_obj['course_for'] = $order->course_for ? "Yes" : "No";
            $order_obj['amount'] = "$" . $order->amount;
            $order_obj['payment_details'] = "<strong>";
            $order_obj['payment_details'] .= $order->payment_status ? "Paid" : "Unpaid";
            $order_obj['payment_details'] .= "</strong><br/>";
            if (!$order->payment_status) {
                $order_obj['payment_details'] .= '<input type="checkbox" name="order_ids[]" class="order_ids" value="' . $order->id . '"/> Offer Discount';
            } else {
                $order_obj['payment_details'] .= '<button style="font-size: 12px;padding: 5px 4px;" class="btn --btn-primary --btn-small create-account-btn" target="_blank"
                        data-first-name="' . $order->first_name . '" data-last-name="' . $order->last_name . '" data-email="' . $order->email . '"
                        data-username="' . $order->username . '" data-address="' . $order->address . '" data-city="' . $order->city . '" data-state="' . $order->state . '"
                        data-zipcode="' . $order->zip_code . '" data-phone="' . $order->contact_no . '" data-password="' . $order->password . '">Create Account</button><br><br>';
                $order_obj['payment_details'] .= '<a href="' . url('lms') . '?uoid=' . $order->uoid . '" target="_blank" >
                        <button style="font-size: 12px;padding: 5px 4px;"class="btn --btn-primary --btn-small">Login as User</button>
                    </a>';
            }
            $orders_array[] = $order_obj;
        }

        $response = [
            'draw' => $request->draw ? $request->draw : 1,
            'recordsTotal' => Order::count(),
            'recordsFiltered' => $recordsFiltered,
            'orders' => $orders_array
        ];

        return response()->json($response);
    }

    public function zeroDollarOrders(Request $request)
    {
        if (Auth::user()->type != USER_TYPE_ADMIN) {
            return redirect()->route('admin.dashboard');
        }

        $download_link = route('admin.orders.download') . "?start_date=" . $request->input('start_date') . "&end_date=" . $request->input('end_date') . "&zero_amount=1";

        $request->request->add(['zero_amount' => 1]);

        $orders = $this->getOrdersData($request);

        return view('admin.orders', compact('orders', 'download_link'));
    }

    public function orders(Request $request)
    {
        if (!in_array(Auth::user()->type, [USER_TYPE_ADMIN, USER_TYPE_BDM, USER_TYPE_SUPPORT])) {
            return redirect()->route('admin.dashboard');
        }

        $user_id = $request->input('user_id');
        $download_link = route('admin.orders.download') . "?start_date=" . $request->input('start_date') . "&end_date=" . $request->input('end_date') . "&user_id=" . $user_id;

        $orders = $this->getOrdersData($request, $user_id);

        return view('admin.orders', compact('orders', 'download_link'));
    }

    public function getDeletedOrders(Request $request)
    {
        //        $orders = Order::onlyTrashed()->limit(10)->get();
        $orders = $this->getDeletedOrdersData($request);

        return view('admin.deleted-orders', compact('orders'));
    }

    public function markOrderAsPaid(Request $request, Order $order)
    {
        if ($order->payment_status === 1) {
            return response()->json(['order' => 'Order is already paid'], 422);
        }

        $request->validate([
            'transaction_id' => 'required|min:17|max:20'
        ]);

        $order->transaction_id_from_email = $request->transaction_id;
        $order->payment_status = 1;
        $order->is_completed = 1;
        $order->save();

        return response()->json(['message' => 'Order # ' . $order->uoid . ' marked as paid', 'type' => 'success', 'order' => $order]);
    }

    public function orderLogs(Request $request, $uoid, $log_type)
    {
        $logs = OrderLog::where('uoid', $uoid);
        if ($log_type === LOG_TYPE_INDIVIDUAL) {
            $logs = $logs->where('type', '!=', LOG_TYPE_GROUP);
        } else {
            $logs = $logs->where('type', $log_type);
        }

        $logs = $logs->latest()->get();
        return view('admin.order_logs', compact('logs'));
    }


    public function userDetailLogs(Request $request, $uoid)
    {
        $logs = UserDetailLogs::where('uoid', $uoid);

        $logs = $logs->latest()->get();

        return view('admin.user_details_logs', compact('logs'));
    }

    public function regenerateSitemap()
    {
        try {
            Artisan::queue('sitemap:generate');

            // Just to add a little delay
            sleep(2);

            return redirect()->back()
                ->with(['message' => "Re generate Sitemap Command Queued, please re check in some time.", 'type' => 'success']);
        } catch (\Throwable $e) {
            return redirect()->back() ->with(['message' => "Something went wrong.", 'type' => 'danger']);
        }

    }

    public function optimizeCacheClear()
    {
        try {
            Artisan::call('optimize:clear');

            return redirect()->back()
                ->with(['message' => "Cache Cleared", 'type' => 'success']);
        } catch (\Throwable $e) {
            return redirect()->back() ->with(['message' => "Something went wrong.", 'type' => 'danger']);
        }

    }

    public function deleteOrder(Order $order)
    {
        $deleteResp = $order->delete();

        if ($deleteResp === true) {
            return response()->json(['order-del-message' => 'Order # ' . $order->uoid . ' ' . 'deleted successfully.', 'type' => 'success']);
        } else {
            return response()->json(['order-del-message' => 'Something went wrong', 'type' => 'danger']);
        }
    }

    public function restoreOrder($id)
    {
        $order = Order::onlyTrashed()->find($id);

        if ($order) {
            $order->restore();
            return response()->json(['order-restore-message' => 'Order # ' . $order->uoid . ' ' . 'restored successfully.', 'type' => 'success']);
        }

        return response()->json(['order-restore-message' => 'Something went wrong', 'type' => 'danger']);
    }

    protected function getOrdersData(Request $request, $user_id = null)
    {
        $orders = Order::orderByDesc('updated_at');
        if ($request->input('zero_amount')) {
            $orders = $orders->where('amount', 0);
        } else {
            $orders = $orders->where('amount', '>', 0);
        }

        if (Auth::user()->type == USER_TYPE_BDM && !$request->has('all')) {
            $bdm_id = $this->getBDMId();
            $orders = $orders->where('client_of', $bdm_id);
        } elseif (Auth::user()->type == USER_TYPE_ADMIN) {
            if (!empty($user_id)) {
                $bdm_id = $this->getBDMId($user_id);
                //                dump($user_id);
                //                dump($bdm_id);
                $orders = $orders->where('client_of', $bdm_id);
            } else {
                $orders = $orders->where('client_of', 0);
            }
        }

        if (!empty($request->input('start_date'))) {
            $orders = $orders->where('created_at', '>=', $request->input('start_date'));
        }
        if (!empty($request->input('end_date'))) {
            $orders = $orders->where('created_at', '<=', $request->input('end_date'));
        }

        return $orders->get();
    }

    protected function getDeletedOrdersData(Request $request)
    {
        $orders = Order::onlyTrashed()->orderByDesc('deleted_at');

        if (!empty($request->input('start_date'))) {
            $orders = $orders->where('created_at', '>=', $request->input('start_date'));
        }
        if (!empty($request->input('end_date'))) {
            $orders = $orders->where('created_at', '<=', $request->input('end_date'));
        }

        return $orders->get();
    }

    public function ordersDownload(Request $request)
    {
        $orders = Order::orderByDesc('updated_at');
        if ($request->input('zero_amount')) {
            $orders = $orders->where('amount', 0);
        } else {
            $orders = $orders->where('amount', '>', 0);
        }

        $user_id = $request->input('user_id');
        if (!empty($user_id)) {
            $orders = $orders->where('client_of', $this->getBDMId($user_id));
        }

        if (!empty($request->input('start_date'))) {
            $orders = $orders->where('created_at', '>=', $request->input('start_date'));
        }
        if (!empty($request->input('end_date'))) {
            $orders = $orders->where('created_at', '<=', $request->input('end_date'));
        }
                $orders = $orders->where('payment_status', 0);
        $orders = $orders->get();

        try {
            // tell the browser it's going to be a csv file
            header('Content-Type: application/csv');
            // tell the browser we want to save it instead of displaying it
            header('Content-Disposition: attachment; filename="orders-sheet-' . date('Y-m-d-h-i') . '.csv";');

            // loop over the input array
            $data = "OrderID, DateTime, FirstName, LastName, Email, Contact, Amount, Order\n";
            foreach ($orders as $order) {
                $row = array();
                $row[] = $order->uoid;
                $row[] = Carbon::parse($order->created_at)->timezone('Canada/Eastern')->format('m/d/Y H:i A');
                $row[] = $order->first_name ?? "-";
                $row[] = $order->last_name ?? "-";
                $row[] = $order->email ?? "-";
//                $row[] = $order->username ? $order->username : "-";
//                $row[] = $order->password ? $order->password : "-";
                $row[] = $order->contact_no ?? "-";
                $row[] = "$" . $order->amount;

                try {
                    $cart = new Cart(unserialize($order->cart));
                }catch(\Exception $ex){
                    $cart = new Cart();
                }
                $order_details = "\"";
                if (isset($cart->items)) {
                    foreach ($cart->items as $product) {
                        $order_details .= $product['item']['title'] . ", ";
                        $order_details .= "Qty: " . $product['qty'] . " Price / Unit: $" . number_format($product['item']['price'], 2) . " | ";
                    }
                }
                $row[] = $order_details . "\"";
//                $row[] = "\"" . $order->address . "\"";
//                $row[] = "\"" . $order->zip_code . "\"";
//                $row[] = "\"" . $order->city . "\"";
//                $row[] = "\"" . $order->state . "\"";
//                $row[] = "\"" . $order->country . "\"";
//                $row[] = $order->course_for ? "Yes" : "No";
//                $row[] = $order->transaction_reference;
//                $row[] = $order->payment_status ? "Paid" : "Unpaid";
//                $row[] = ";\n";
                $row[] = "\n";
                $data .= implode(',', $row);
            }
            echo $data;
            exit();
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

    }

    public function ordersDownloadBDM(Request $request)
    {
        try {
            $bdmNo = $request->input('bdm', 0);

            $orders = Order::query()
                ->select('first_name', 'last_name', 'email', 'uoid', 'cart', 'amount', 'created_at', 'updated_at')
                ->where('client_of', $bdmNo)
                ->where('payment_status', 1);

            $groupOrders = GroupEnrollmentEnquiries::query()
                ->select('first_name', 'last_name', 'email', 'guoid', 'cart', 'amount', 'created_at', 'updated_at')
                ->where('client_of', $bdmNo)
                ->where('payment_status', 1);

            if (!empty($request->input('start_date'))) {
                $orders = $orders->where('created_at', '>=', $request->input('start_date'));
                $groupOrders = $groupOrders->where('created_at', '>=', $request->input('start_date'));
            }
            if (!empty($request->input('end_date'))) {
                $orders = $orders->where('created_at', '<=', $request->input('end_date'));
                $groupOrders = $groupOrders->where('created_at', '<=', $request->input('end_date'));
            }
            $orders = $orders->get();
            $groupOrders = $groupOrders->get();
            $allOrdersSum = 0;

            // tell the browser it's going to be a csv file
            header('Content-Type: application/csv');
            // tell the browser we want to save it instead of displaying it
            header('Content-Disposition: attachment; filename="orders-sheet-' . date('Y-m-d-h-i') . '.csv";');

            // loop over the input array
            $data = "Date, Full Name, Email Address, Order ID, Course(s), Qty, Cart Type, Total Paid;\n";

            /* Normal Orders */


            foreach ($orders as $order) {
                $row = array();
                $row[] = date("M jS Y", strtotime($order->created_at));
                $row[] = $order->first_name . ' ' . $order->last_name;
                $row[] = $order->email;
                $row[] = $order->uoid;

                /* Cart Items */
                $cart = new Cart(unserialize($order->cart));
                $courseNames = "\"";
                $coursesQtys = "\"";
                if (isset($cart->items)) {
                    foreach ($cart->items as $key => $product) {
                        if(count($cart->items) == $key + 1) {
                            $courseNames .= $product['item']['title'] . ", ";
                            $coursesQtys .= $product['qty'] . " , ";
                        } else {
                            $courseNames .= $product['item']['title'];
                            $coursesQtys .= $product['qty'];
                        }
                    }
                }
                $row[] = $courseNames . "\"";
                $row[] = $coursesQtys . "\"";
                /* Cart Items */

                $row[] = "Normal";
                $row[] = "$" . $order->amount;
                $row[] = ";\n";
                $data .= implode(',', $row);

                // Increment Orders Sum
                $allOrdersSum += $order->amount;
            }

            /* Group Orders */
            foreach ($groupOrders as $groupOrder) {
                $row = array();
                $row[] = date("M jS Y", strtotime($groupOrder->created_at));
                $row[] = $groupOrder->first_name . ' ' . $groupOrder->last_name;
                $row[] = $groupOrder->email;
                $row[] = $groupOrder->guoid;

                /* Cart Items */
                $groupCart = unserialize($groupOrder->cart);
                $courseNames = "\"";
                $coursesQtys = "\"";
                if (isset($groupCart['items'])) {
                    foreach ($groupCart['items'] as $k => $group_product) {
                        if(count($groupCart['items']) == $k + 1) {
                            $courseNames .= $group_product['title'];
                            $coursesQtys .= $group_product['quantity'];
                        } else {
                            $courseNames .= $group_product['title'] . ", ";
                            $coursesQtys .= $group_product['quantity'] . " , ";
                        }
                    }
                }
                $row[] = $courseNames . "\"";
                $row[] = $coursesQtys . "\"";
                /* Cart Items */

                $row[] = "Group";
                $row[] = "$" . $groupOrder->amount;
                $row[] = ";\n";
                $data .= implode(',', $row);

                // Increment Orders Sum
                $allOrdersSum += $groupOrder->amount;
            }

            // For total row
            $data .= ";\n,,,,,,,$".$allOrdersSum;
            echo $data;
            exit();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }

    public function groupEnrollmentsEnquiries(Request $request)
    {
        if (!in_array(Auth::user()->type, [USER_TYPE_ADMIN, USER_TYPE_BDM])) {
            return redirect()->route('admin.dashboard');
        }

        $enquiries = GroupEnrollmentEnquiries::latest();

        if (Auth::user()->type == USER_TYPE_BDM && !$request->has('all')) {
            $bdm_id = $this->getBDMId();
            $enquiries = $enquiries->where('client_of', $bdm_id);
        } elseif (Auth::user()->type == USER_TYPE_ADMIN) {
            $user_id = $request->input('user_id');
            if (!empty($user_id)) {
                $bdm_id = $this->getBDMId($user_id);
                $enquiries = $enquiries->where('client_of', $bdm_id);
            } else {
                $enquiries = $enquiries->where('client_of', 0);
            }
        }

        $enquiries = $enquiries->get();
        return view('admin.group_enrollments_enquiries', compact('enquiries'));
    }

    public function groupEnrollmentsEnquiriesDownload(Request $request)
    {
        $enquiries = GroupEnrollmentEnquiries::latest();
        //        if (!empty($request->input('start_date'))) {
        //            $enquiries = $enquiries->where('created_at', '>=', $request->input('start_date'));
        //        }
        //        if (!empty($request->input('end_date'))) {
        //            $enquiries = $enquiries->where('created_at', '<=', $request->input('end_date'));
        //        }
        $enquiries = $enquiries->get();

        // tell the browser it's going to be a csv file
        header('Content-Type: application/csv');
        // tell the browser we want to save it instead of displaying it
        header('Content-Disposition: attachment; filename="groupenrollment-enquiries-sheet-' . date('Y-m-d-h-i') . '.csv";');

        // loop over the input array
        $data = "CompanyName, ContactPerson, Email, Phone, NoOfEmployees, Type, Course, Address, City, State, ZipCode, DateTime\n";
        foreach ($enquiries as $enquiry) {
            $row = array();
            $row[] = "\"" . $enquiry->company_name . "\"";
            $row[] = "\"" . $enquiry->contact_person . "\"";
            $row[] = "\"" . $enquiry->email . "\"";
            $row[] = "\"" . $enquiry->contact_no . "\"";
            $row[] = "\"" . $enquiry->no_of_employees . "\"";
            $row[] = "\"" . $enquiry->company_type . "\"";
            $row[] = "\"" . $enquiry->course_name . "\"";
            $row[] = "\"" . $enquiry->address . "\"";
            $row[] = "\"" . $enquiry->city . "\"";
            $row[] = "\"" . $enquiry->state . "\"";
            $row[] = "\"" . $enquiry->zip_code . "\"";
            $row[] = Carbon::parse($enquiry->created_at)->timezone('Canada/Eastern')->format('m/d/Y H:i A');
            $row[] = ";\n";
            $data .= implode(',', $row);
        }
        echo $data;
        exit();
    }

    public function offerDiscount(Request $request)
    {
        $order_ids = $request->orderIds;
        //        dump($order_ids);
        $status = false;
        $count = 0;

        foreach ($order_ids as $order_id) {
            $order = Order::where('id', $order_id)->first();
            if ($order) {
                $order_cart = @unserialize($order->cart);

                if (!isset($order_cart->items) || !is_array($order_cart->items) || count($order_cart->items) == 0) {
                    continue;
                }

                /*
                    Admin Offering Discount will not make any change to Order or Cart,
                    but will only send Reminder Email/SMS to customer
                    Commenting the code in block below for achieving this
                */
                /*
                    $order->discount = intval($request->input('discount'));
                    $discount_amount = $order->amount * $request->input('discount') / 100;
                    $order->discounted_price = $order->amount - $discount_amount;

                    //update discount amount in cart
                    $order_cart->discount = $discount_amount;
                    $order->cart = @serialize($order_cart);


                    $order->save();
                */

                $products = [];
                foreach ($order_cart->items as $product) {
                    $products[] = [
                        'title' => $product['item']['title'],
                        'qty' => $product['qty']
                    ];
                }

                $productCount = count($products);
                // Send Order Special Offer Email
                // Validate Email to Send Jobs
                if (filter_var($order->email, FILTER_VALIDATE_EMAIL)) {
                    dispatch(new SendDiscountOfferEmail($order, $products, $productCount));
                    $count++;
                    $status = true;
                }

                // Send Order Special Offer SMS
                // if (isset($order->contact_no)) {
                //     $phoneUtil = PhoneNumberUtil::getInstance();
                //     try {
                //         $orderNo = $phoneUtil->parse($order->contact_no);
                //         // Validate Email to Send Jobs
                //         if ($phoneUtil->isValidNumber($orderNo)) {
                //             dispatch(new SendDiscountOfferSMS($order));
                //             $count++;
                //             $status = true;
                //         }
                //     } catch (\Exception $e) {
                //         Log::error("{$e->getMessage()}, OrderNo: $order->no, Contact: $order->contact_no");
                //     }
                // }
            }
        }

        return response()->json(['status' => $status, 'count' => $count]);
        //        return "Discount of " . $request->input('discount') . "% added successfully, sent email to user(s).";
    }

    public function courses(Request $request)
    {
        // $courses = Product::where('id', '!=', 99)->get();
        $courses = Product::all();

        return view('admin.courses.index', compact('courses'));
    }

    public function coursesEdit(Request $request, Product $course)
    {
        //        if($course->id < 100){
        //            return redirect()->route('admin.courses');
        //        }

        $prev_course = Product::where('id', '<', $course->id)
            ->where('id', '!=', 99)
            ->orderBy('id', 'desc')
            ->first();
        $next_course = Product::where('id', '>', $course->id)
            ->where('id', '!=', 99)
            ->first();

        if (empty($course->related_courses)) {
            $course->related_courses = [];
        } else {
            $course->related_courses = json_decode($course->related_courses);
        }

        if (empty($course->variants)) {
            $course->variants = [];
        } else {
            $course->variants = json_decode($course->variants);
        }

        $languages = [
            "" => "Select",
            "english" => "English",
            "spanish" => "Spanish",
            "portuguese" => "Portuguese",
            "german" => "German",
            "chinese" => "Chinese",
            "dutch" => "Dutch",
            "polish" => "Polish",
            "thai" => "Thai",
            "canadian french" => "Canadian French",
            "japanese" => "Japanese",
            "czech" => "Czech",
            "french" => "French",
            "italian" => "Italian",
            "korean" => "Korean",
            "russian" => "Russian",
            "hungarian" => "Hungarian",
            "arabic" => "Arabic"
        ];

        return view('admin.courses.edit', compact('course', 'languages', 'prev_course', 'next_course'));
    }

    public function coursesUpdate(Request $request, Product $course)
    {
        $course->title = $request->input('title');
        if ($course->id > 99) {
            $new_slug = $request->input('slug');
            if ($course->slug != $new_slug) {
                $course_found = Product::where('slug', $new_slug)->count();
                if ($course_found) {
                    return redirect()->route('admin.courses_edit', [$course->id])->with('error', 'Same slug found in another course.');
                }
                $course->slug = $new_slug;
            }
        }

        $course->description = $request->input('description');
        $course->outline = str_replace("\r\n", "<br />", $request->input('outline'));
        $course->learning_objective = str_replace("\r\n", "<br />", $request->input('learning_objective'));
        $course->price = $request->input('price');
        $course->discounted_price = $request->input('discounted_price'); // update discounted_price
        $course->published = $request->input('published') ? 1 : 0;
        //        dd($request->all());

        $variants_count = $request->input('variants_count');
        $variants = [];
        if ($variants_count > 0) {
            for ($ii = 0; $ii < $variants_count; $ii++) {
                $variant_language = strip_tags($request->input('variant_language')[$ii]);
                $variant_sku = strip_tags($request->input('variant_sku')[$ii]);

                if (!empty($variant_language) && !empty($variant_sku)) {
                    $variants[] = [
                        "language" => $variant_language,
                        "sku" => $variant_sku
                    ];
                }
            }
        }
        $course->variants = json_encode($variants);

        $seo_tags_count = $request->input('seo_tags_count');
        if ($seo_tags_count > 0) {
            $course->seoTags()->delete();
            for ($ii = 0; $ii < $seo_tags_count; $ii++) {

                $meta_name = strip_tags($request->input('name')[$ii]);
                $meta_content = strip_tags($request->input('content')[$ii]);

                if (!empty($meta_name) && !empty($meta_content)) {
                    $seo_tag = new SEO_Tag();
                    $seo_tag->meta_name = $meta_name;
                    $seo_tag->meta_content = $meta_content;
                    $seo_tag->product_id = $course->id;
                    $seo_tag->page_type = PAGE_TYPE_COURSE;
                    $seo_tag->save();
                }
            }
        }

        $faqs_count = $request->input('faqs_count');
        if ($faqs_count > 0) {
            // Delete all Old FAQs for Course
            FAQ::where('product_id', $course->id)->delete();

            for ($ii = 0; $ii < $faqs_count; $ii++) {

                $question = strip_tags($request->input('faq_question')[$ii]);
                $answer = strip_tags($request->input('faq_answer')[$ii]);

                if (!empty($question) && !empty($answer)) {
                    $faq = new FAQ();
                    $faq->question = $question;
                    $faq->answer = $answer;
                    $faq->product_id = $course->id;
                    $faq->page_type = PAGE_TYPE_COURSE;
                    $faq->save();
                }
            }
        }

        //        dump($request->related_courses);
        // Related Courses
        if (!isset($request->related_courses)) {
            $request->related_courses = [];
        }
        $course->related_courses = json_encode($request->related_courses);
        //        dd($course->related_courses);
        $course->save();

        Cache::flush();

        return redirect()->back()->with('success', 'Course has been successfully updated.');
    }

    public function pages(Request $request)
    {
        $static_pages = [
            'home',
            'about_us',
            'partner_with_us',
            'courses',
            'group_enrollment',
            'group_enrollment_thankyou',
            'order_details',
            'payment_success',
            'payment_failed',
            'reviews',
            'lms',
            'contact_us',
            'contact_us_thankyou',
            'terms_and_conditions',
            'refund_policy',
            'privacy_policy',
            'osha_10_and_30',
            'osha_10_hour_online',
            'osha_30_hour_online',
            'promotions',
            'faq'
        ];
        $pages = [];
        foreach ($static_pages as $page) {
            $pages[$page] = SEO_Tag::getAllTagsByPage($page);
        }
        //        dd($pages);

        return view('admin.pages.index', compact('pages'));
    }

    public function pagesEdit(Request $request, $page)
    {
        $content = SEO_Tag::getAllTagsByPage($page);
        $lmsCourses = Product::query()->select('id', 'title', 'slug')->where('lms', LMS_TYPE_OSHA_OUTREACH)->get();

        $faqs = FAQ::where('page_name', $page)->get();
        return view('admin.pages.edit', compact('page', 'content', 'faqs', 'lmsCourses'));
    }

    public function listGroupSlabs()
    {
        $groupSlabs = GroupSlabs::all();

        return view('admin.group_slabs.index', compact('groupSlabs'));
    }

    public function editGroupSlab(GroupSlabs $groupSlab)
    {
        $lmsCourses = Product::query()->select('id', 'title', 'slug')->where('lms', LMS_TYPE_OSHA_OUTREACH)->get();

        return view('admin.group_slabs.edit', compact('lmsCourses', 'groupSlab'));
    }

    public function updateGroupSlab(Request $request, GroupSlabs $groupSlab)
    {
        // TODO: Validate this request later
        try {
            $minSlabs = $request->min_slab;
            $maxSlabs = $request->max_slab;
            $slabPrice = $request->slab_price;

            $groupSlab->update([
                'min_slab' => $minSlabs,
                'max_slab' => $maxSlabs,
                'courses' => $request->courses,
                'slab_price' => $slabPrice
            ]);

            return redirect()->back()->with('success', 'Page has been successfully updated.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }

    }

    public function pagesUpdate(Request $request, $page)
    {
        $tags = ['h1_heading', 'img_alt'];
        foreach ($tags as $tag) {
            $seo_tag = SEO_Tag::where(['page_name' => $page, 'meta_name' => $tag])->first();
            if (is_null($seo_tag)) {
                $seo_tag = new SEO_Tag;
                $seo_tag->page_name = $page;
                $seo_tag->page_type = PAGE_TYPE_STATIC;
                $seo_tag->meta_name = $tag;
            }
            $seo_tag->meta_content = $request->input($tag);
            if (!empty($seo_tag->meta_content)) {
                $seo_tag->save();
            }
        }

        $seo_tags_count = $request->input('seo_tags_count');
        if ($seo_tags_count > 0) {
            // Delete all Old SEO tags for Page
            SEO_Tag::deleteExtraTagsByPage($page);

            for ($ii = 0; $ii < $request->input('seo_tags_count'); $ii++) {

                $meta_name = strip_tags($request->input('name')[$ii]);
                $meta_content = strip_tags($request->input('content')[$ii]);

                if (!empty($meta_name) && !empty($meta_content)) {
                    $seo_tag = new SEO_Tag();
                    $seo_tag->meta_name = $meta_name;
                    $seo_tag->meta_content = $meta_content;
                    $seo_tag->page_name = $page;
                    $seo_tag->page_type = PAGE_TYPE_STATIC;
                    $seo_tag->save();
                }
            }
        }

        // Add Promotion courses on Page
        $promotion_course = $request->input('promotion_courses');
        $promotion_course_seo = SEO_Tag::query()
            ->where('page_name',$page)
            ->where('meta_name',"promotion_courses")
            ->first();

        if(!$promotion_course_seo) {
            $promotion_course_seo = new SEO_Tag();
        }

        $promotion_course_seo->meta_name = "promotion_courses";
        $promotion_course_seo->meta_content = "";
        $promotion_course_seo->page_name = $page;
        $promotion_course_seo->page_type = PAGE_TYPE_STATIC;
        $promotion_course_seo->promotion_products = $promotion_course;
        $promotion_course_seo->save();

        $faqs_count = $request->input('faqs_count');
        if ($faqs_count > 0) {
            // Delete all Old FAQs for Page
            FAQ::where('page_name', $page)->delete();

            for ($ii = 0; $ii < $faqs_count; $ii++) {

                $question = strip_tags($request->input('faq_question')[$ii]);
                $answer = strip_tags($request->input('faq_answer')[$ii]);

                if (!empty($question) && !empty($answer)) {
                    $faq = new FAQ();
                    $faq->question = $question;
                    $faq->answer = $answer;
                    $faq->page_name = $page;
                    $faq->page_type = PAGE_TYPE_STATIC;
                    $faq->save();
                }
            }
        }

        Cache::flush();

        return redirect()->back()->with('success', 'Page has been successfully updated.');
    }

    public function cloudinaryImageUpload(Request $request) {
        try {
            $request->validate([
                'upload' => 'required|image|mimes:jpg,png,webp|max:2048',
            ]);

            $result = $request->upload->storeOnCloudinaryAs(env('CLOUDINARY_UPLOAD_DIRECTORY'), "img_" . time());

            return response()->json(['url' => $result->getSecurePath(), 'message' => 'success']);
        } catch (\Throwable $th) {
            $errMsg = $th->getMessage();
            return response()->json(['error' => ['message' => $errMsg == "The given data was invalid." ? $errMsg : "Something went wrong"]], 500);
        }
    }

    public function deleteCloudinaryImage(Request $request) {
        $request->validate([
            'images' => 'required|array',
        ]);

        $imagesToDelete = $request->images;
        $deletedPublicIds = [];

        foreach ($imagesToDelete as $imageUrl) {
            // Sample: https://res.cloudinary.com/demo/image/upload/v1576664570/yolo/samples/bike.jpg

            $publicId = preg_replace('/^https?:\/\/.*?\/v[^\/]*\/(.*)\..*$/', '$1', $imageUrl);

            Cloudinary::destroy($publicId);

            $deletedPublicIds[] = $publicId;
        }

        return response()->json(['success' => true, 'ids' => $deletedPublicIds]);
    }

    private function getBDMId($user_id = null)
    {
        if (empty($user_id)) {
            $user_id = Auth::user()->id;
        }

        $bdm_id = null;

        if ($user_id == 3) {
            $bdm_id = 1;
        } else if ($user_id == 4) {
            $bdm_id = 2;
        } else if ($user_id == 5) {
            $bdm_id = 3;
        } else if ($user_id == 9) {
            $bdm_id = 4;
        }

        return $bdm_id;
    }

    function removeUnpaidOrdersOfPaidOrders(Request $request)
    {
        $unpaid_orders_emails = Order::where('payment_status', 0)->groupBy('email')->pluck('email')->toArray();
        $paid_orders_emails = Order::where('payment_status', 1)->groupBy('email')->pluck('email')->toArray();

        $common_emails = array_intersect($unpaid_orders_emails, $paid_orders_emails);

        $orders = Order::whereIn('email', $common_emails)
            ->where('payment_status', 0);

        echo $orders->count() . " orders deleted." . "<br/>";
        $orders->delete();

        // for deleting duplicates in unpaid orders
        $duplicateUnpaidOrders = DB::table('orders')
            ->where('deleted_at', null)
            ->select('email', DB::raw('count(`email`) as occurences'))
            ->groupBy('email')
            ->having('occurences', '>', 1)
            ->get();

        $duplicateUnpaidOrdersCount = 0;
        foreach ($duplicateUnpaidOrders as $duplicateUnpaidOrder) {
            $duplicateUnpaidOrdersCount += Order::where('email', $duplicateUnpaidOrder->email)
                ->latest()
                ->count() - 1;

            Order::where('email', $duplicateUnpaidOrder->email)
                ->latest()
                ->take($duplicateUnpaidOrder->occurences)
                ->skip(1)
                ->get()
                ->each(function ($row) {
                    $row->delete();
                });
        }

        echo $duplicateUnpaidOrdersCount . " duplicate unpaid orders deleted.";
        // for deleting duplicates in unpaid orders
    }

    function getOrderById(Order $order)
    {
        return response()->json($order);
    }

    function updateOrderById(Request $request, Order $order)
    {
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->email = $request->email;
        $order->contact_no = $request->contact_no;
        $order->username = $request->username;
        $order->password = $request->password;
        $order->save();

        return response()->json($order);
    }

    function getEnquiryById(GroupEnrollmentEnquiries $enquiry)
    {
        return response()->json($enquiry);
    }

    function updateEnquiryById(Request $request, GroupEnrollmentEnquiries $enquiry)
    {
        $enquiry->company_name = $request->company_name;
        $enquiry->no_of_employees = $request->no_of_employees;
        $enquiry->company_type = $request->company_type;
        $enquiry->amount = $request->amount;
        $enquiry->course_name = $request->course_name;
        $enquiry->address = $request->address;
        $enquiry->city = $request->city;
        $enquiry->state = $request->state;
        $enquiry->zip_code = $request->zip_code;
        $enquiry->contact_no = $request->contact_no;
        $enquiry->contact_person = $request->contact_person;
        $enquiry->email = $request->email;
        $enquiry->save();

        return response()->json($enquiry);
    }

    function sendSuccessCommunications(Request $request, Order $order)
    {
        if ($request->comm == COMMUNICATION_EMAIL) {
            dispatch(new SendSuccessEmail($order));
            return 1;
        } elseif ($request->comm == COMMUNICATION_SMS) {
            dispatch(new SendSuccessSMS($order));
            return 1;
        }
        return 0;
    }

    function fetchLatestBlogs()
    {
        Log::info('Blog fetch Job started running' . ' ' . Carbon::now());

        try {
            $content = json_decode(file_get_contents('https://www.oshaoutreachcourses.com/blog/wp-json/wp/v2/posts?per_page=5&_embed'));

            $posts = [];
            foreach ($content as $post) {
                $posts[] = [
                    'title' => $post->title->rendered,
                    'publish_date' => $post->date,
                    'featured_image' => $post->featured_image_url,
                    'featured_image_thumbnail' => $post->_embedded->{'wp:featuredmedia'}[0]->media_details->sizes->medium->source_url ?? $post->featured_image_url,
                    'link' => $post->link,
                    'excerpt' => \Illuminate\Support\Str::words(strip_tags($post->excerpt->rendered), 30, '...'),
                ];
            }

            file_put_contents(base_path('public/articles.json'), json_encode($posts));

            Log::info('Blog fetch success' . ' ' . Carbon::now());

            Mail::send('emails.blog-fetch', ['status' => 'success'], function ($mail) {
                $mail
                    ->to('support@oshaoutreachcourses.com')
                    ->subject('Blogs fetched successfully on main website');
            });
        } catch (\Exception $e) {

            Log::error('Blog fetch Error in Job' . ' ' . Carbon::now() . ' Error Message: ' . '`' . $e->getMessage() . '`' . ' Line Number: ' . $e->getLine());

            Mail::send('emails.blog-fetch', ['status' => 'error', 'errorMsg' => $e->getMessage()], function ($mail) {
                $mail
                    ->to('support@oshaoutreachcourses.com')
                    ->subject('Error fetching blogs on main website');
            });
        }

        Log::info('Blog fetch Job completed running' . ' ' . Carbon::now());
    }

    function exportOrdersToExpressServer()
    {
        try {
            $time_start = microtime(true);
            $exportedRecords = 0;

            DB::table('orders')->orderBy('id', 'asc')
//                    ->where('id', '<=', 10)
                ->chunk(100, function ($orders) use (&$exportedRecords) {

                    foreach ($orders as $order) {
                        $order->unserializedCart = @unserialize($order->cart);
                        $order->unserializedPaymentDetails = @unserialize($order->payment_details);
                        $orderFrom = $order->transaction_reference !== null ? (str_starts_with($order->transaction_reference, 'pi_') ? "stripe" : "paypal") : null;
                        $orderFromPromotionPage = false;
                        $buyingFor = "Yourself";
                        $promoCode = null;
                        $newCartItems = [];

                        if($order->unserializedCart) {
                            $cart = new Cart($order->unserializedCart);
                            /*Determine Order from Promotion Page & Order Type*/
                            $orderFromPromotionPage = $cart->disallowCoupon;
                            $buyingFor = $cart->totalQty > 1 ? "Group" : "Yourself";
                            $promoCode = !empty($cart->coupon) ? $cart->coupon : null;
                            $cartItems = $cart->items ?? [];

                            foreach ($cartItems as $courseId => $cartItem) {

                                // Attempt to get MongoDB Course ID and Category
                                $courseRes = Http::get(env('LMS_API_URL') . '/shop/courses/sku_'.$courseId);
                                $mongoCourse = $courseRes->json();

                                $newCartItems[] = [
                                    'course_id' => $mongoCourse['_id'] ?? "PSlCNcqbEeVU", // default 12 byte str
                                    'category' => $mongoCourse['category'] ?? "-",
                                    'sku' => $courseId,
                                    'title' => $cartItem['item']['title'],
                                    'actual_price' => $cartItem['item']['price'],
                                    'price' => $cartItem['item']['discounted_price'] ?? $cartItem['item']['price'],
                                    'quantity' => $cartItem['qty'],
                                    'discount' => 0
                                ];
                            }

                        }

                        $reqBody = [
                            'legacy_id' => $order->id,
                            'uoid' => $order->uoid ?? "-",
                            'order_from_promotion_page' => $orderFromPromotionPage,
                            'promo_code' => $promoCode,
                            'buying_for' => $buyingFor,
                            'firstName' => $order->first_name,
                            'lastName' => $order->last_name,
                            'email' => $order->email,
                            'contactNo' => $order->contact_no,
                            'password' => $order->password,
                            'address' => $order->address,
                            'zipCode' => $order->zip_code,
                            'city' => $order->city,
                            'state' => $order->state,
                            'country' => $order->country,
                            'items' => $newCartItems,
                            'transaction_id' => $order->transaction_reference,
                            'total' => $order->amount,
                            'isPaid' => (bool) $order->payment_status,
                            'bdm' => $order->client_of == 0 ? null : $order->client_of,
                            // legacy keys
                            'legacy_createdAt' => date(DATE_ATOM, strtotime($order->created_at)),
                            'legacy_updatedAt' => date(DATE_ATOM, strtotime($order->updated_at)),
                            'legacy_username' => $order->username,
                            'order_from' => $orderFrom,
                            'is_legacy' => true,
                            'legacy_checkout_type' => "normal",
                            'paymentDetails' => $order->unserializedPaymentDetails ?: null
                        ];

                        $response = Http::post(
                            env('LMS_API_URL') . '/shop/orders/import-from-sql',
                            ["order" => $reqBody]
                        );

                        logger()->info($response);

                        if ($response->successful()) {
                            $exportedRecords++;
                            dump($exportedRecords);
                        }
                    }
                });
        } catch (\Exception $e) {
            logger()->error($e->getMessage());
        }

        $time_end = microtime(true);
        $completionTime = round(($time_end - $time_start)/60, 2);

        logger()->info("Total $exportedRecords Normal Orders exported to Express Server in: $completionTime minutes.");
    }

    function exportGroupOrdersToExpressServer()
    {
        try {
            $time_start = microtime(true);
            $exportedRecords = 0;

            DB::table('group_enrollment_enquiries')->orderBy('id')
                ->chunk(100, function ($groupOrders) use (&$exportedRecords) {

                    foreach ($groupOrders as $groupOrder) {
                        $groupOrder->unserializedCart = @unserialize($groupOrder->cart);
                        $groupOrder->unserializedPaymentDetails = @unserialize($groupOrder->payment_details);
                        $orderFrom = $groupOrder->transaction_reference !== null ? (str_starts_with($groupOrder->transaction_reference, 'pi_') ? "stripe" : "paypal") : null;
                        $promoCode = null;
                        $newCartItems = [];

                        if($groupOrder->unserializedCart) {
                            $cart = $groupOrder->unserializedCart;
                            /* Determine Order from Promotion Page & Order Type */
                            $promoCode = isset($cart['coupon']) ? $cart['coupon']->toArray() : null;
                            $cartItems = $cart["items"] ?? [];

                            foreach ($cartItems as $cartItem) {
                                // Attempt to get MongoDB Course ID and Category
                                $courseRes = Http::get(env('LMS_API_URL') . '/shop/courses/sku_'.$cartItem['id']);
                                $mongoCourse = $courseRes->json();

                                $newCartItems[] = [
                                    'course_id' => $mongoCourse['_id'] ?? "PSlCNcqbEeVU", // default 12 byte str
                                    'category' => $mongoCourse['category'] ?? "-",
                                    'sku' => $cartItem['id'],
                                    'title' => $cartItem['title'],
                                    'actual_price' => $cartItem['original_price'],
                                    'price' => $cartItem['price'],
                                    'quantity' => $cartItem['quantity'],
                                    /*
                                     * This discount is different from MongoDB Cart Discount,
                                     * bcz discount is calculated from original price (89, 189)
                                     * and not from discounted price (70, 150)
                                    */
                                    'discount' => $cartItem['discount']
                                ];
                            }

                        }

                        $reqBody = [
                            'legacy_id' => $groupOrder->id,
                            'uoid' => "G-" . $groupOrder->guoid,
                            'order_from_promotion_page' => false,
                            'promo_code' => $promoCode,
                            'buying_for' => "Group",
                            'firstName' => $groupOrder->first_name,
                            'lastName' => $groupOrder->last_name,
                            'email' => $groupOrder->email,
                            'contactNo' => $groupOrder->contact_no,
                            'password' => $groupOrder->password,
                            'address' => $groupOrder->address,
                            'zipCode' => $groupOrder->zip_code,
                            'city' => $groupOrder->city,
                            'state' => $groupOrder->state,
                            'country' => "-",
                            'items' => $newCartItems,
                            'transaction_id' => $groupOrder->transaction_reference,
                            'total' => $groupOrder->amount,
                            'isPaid' => (bool) $groupOrder->payment_status,
                            'bdm' => $groupOrder->client_of == 0 ? null : $groupOrder->client_of,
                            'free_course_qty' => $groupOrder->free_course_qty ?? 0,
                            'companyName' => $groupOrder->company_name ?? "",
                            'companyType' => $groupOrder->company_type ?? "",
                            // legacy keys
                            'legacy_username' => $groupOrder->username,
                            'legacy_createdAt' => date(DATE_ATOM, strtotime($groupOrder->created_at)),
                            'legacy_updatedAt' => date(DATE_ATOM, strtotime($groupOrder->updated_at)),
                            'order_from' => $orderFrom,
                            'is_legacy' => true,
                            'legacy_checkout_type' => "group_enrollment",
                            'paymentDetails' => $groupOrder->unserializedPaymentDetails ?: null,
                        ];

                        $response = Http::post(
                            env('LMS_API_URL') . '/shop/orders/import-from-sql',
                            ["order" => $reqBody]
                        );

                        logger()->info($response);

                        if ($response->successful()) {
                            $exportedRecords++;
                            dump($exportedRecords);
                        }
                    }
                });
        } catch (\Exception $e) {
            logger()->error($e->getMessage());
        }

        $time_end = microtime(true);
        $completionTime = round(($time_end - $time_start)/60, 2);

        logger()->info("Total $exportedRecords Group Enrollment Orders exported to Express Server in: $completionTime minutes.");
    }


    function uploadLeedsList(Request $request)
    {
        $request->validate([
            'leeds_list' => 'required|mimes:text/csv,csv,application/csvm+json|max:2048'
        ]);

        $leedsFilePath = null;

        try {
            $leedsListFile = $request->file('leeds_list');

            // Store Temp File for processing
            $leedsFilePath = $leedsListFile->storeAs('temp', 'leeds_' . date('d-m-Y-H-i-s') . '.csv');

            DB::beginTransaction();

            $fileContent = File::get(storage_path("app/" . $leedsFilePath));

            $fileContentToArr = explode("\r\n", $fileContent);

            foreach ($fileContentToArr as $key => $row) {
                if ($row != "" && $key > 0) {
                    $rowToArr = str_getcsv($row);

                    $leed = [
                        'company_name' => trim($rowToArr[0]),
                        'contact_person' => trim($rowToArr[1]),
                        'email' => trim($rowToArr[2]),
                        'phone' => trim($rowToArr[3]),
                        'no_of_employees' => trim($rowToArr[4]),
                        'type' => trim($rowToArr[5]),
                        'course' => trim($rowToArr[6]),
                        'address' => trim($rowToArr[7]),
                        'city' => trim($rowToArr[8]),
                        'state' => trim($rowToArr[9]),
                        'zip_code' => trim($rowToArr[10]),
                        'bdm' => trim($rowToArr[11])
                    ];

                    // Create Leed Entry
                    Leed::create($leed);
                }
            }

            // Delete Temp File
            if (isset($leedsFilePath)) {
                File::delete(storage_path("app/" . $leedsFilePath));
            }

            DB::commit();

            return redirect()->back()->with(['message' => "Leeds List Uploaded", 'type' => 'success']);
        } catch (\Throwable $th) {
            DB::rollBack();

            // Delete Temp File
            if (isset($leedsFilePath)) {
                File::delete(storage_path("app/" . $leedsFilePath));
            }

            return redirect()->back()->with(['message' => "Leeds List Uploaded", 'type' => 'danger']);
        }
    }


}
