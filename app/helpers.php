<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

function orders_sum_for_today_bdm($bdmNo): array
{
    return DB::select('SELECT
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
                                                      AND client_of = ' . $bdmNo . ' AND amount > 0
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
                                                      AND client_of = ' . $bdmNo . ' AND amount > 0
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
}

function orders_sum_for_this_week_bdm($bdmNo): array
{
    return DB::select('SELECT
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
                                                          AND client_of = ' . $bdmNo . ' AND amount > 0
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
                                                          AND client_of = ' . $bdmNo . ' AND amount > 0
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
}

function orders_sum_for_this_month_bdm($bdmNo): array
{
    return DB::select('SELECT
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
                                                          AND client_of = ' . $bdmNo . ' AND amount > 0
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
                                                          AND client_of = ' . $bdmNo . ' AND amount > 0
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
}

function group_orders_sum_all_last_filtered_days_bdm($bdmNo, $date_filtered_condition): array
{
    return DB::select('
                    SELECT SUM(amount) as total_orders_amount,
                    COUNT(id) as orders_count,
                    DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%a, %D %b") as day,
                    DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%Y-%m-%d") as full_date
                    FROM `group_enrollment_enquiries`
                    WHERE payment_status = 1
                    AND client_of = ' . $bdmNo . ' AND amount > 0
                    GROUP BY day
                    ' . $date_filtered_condition . '
                    ORDER BY full_date DESC
                    '
    );
}

function orders_sum_for_last_filtered_days_bdm($bdmNo, $date_filtered_condition): array
{
    return DB::select('
                SELECT SUM(IF(discounted_price IS NOT NULL, discounted_price, amount)) as total_orders_amount,
                COUNT(id) as orders_count,
                DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%a, %D %b") as day,
                DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%Y-%m-%d") as full_date
                FROM `orders`
                WHERE payment_status = 1
                AND client_of = ' . $bdmNo . ' AND amount > 0
                AND amount > 0
                GROUP BY day
                ' . $date_filtered_condition . '
                ORDER BY full_date'
    );
}

function orders_sum_all_last_filtered_weekly_bdm($bdmNo, $date_filtered_condition): array
{
    return DB::select('
                SELECT SUM(IF(discounted_price IS NOT NULL, discounted_price, amount)) as total_orders_amount,
                COUNT(id) as orders_count,
                DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%v %Y") as week,
                DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%Y-%m-%d") as full_date
                FROM `orders`
                WHERE payment_status = 1
                AND client_of = ' . $bdmNo . ' AND amount > 0
                GROUP BY week
                ' . $date_filtered_condition . '
                ORDER BY full_date'
    );
}

function group_sum_all_last_filtered_weekly_bdm($bdmNo, $date_filtered_condition): array
{
    return DB::select('
                SELECT SUM(amount) as total_orders_amount,
                COUNT(id) as orders_count,
                DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%v %Y") as week,
                DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%Y-%m-%d") as full_date
                FROM `group_enrollment_enquiries`
                WHERE payment_status = 1
                AND client_of = ' . $bdmNo . ' AND amount > 0
                GROUP BY week
                ' . $date_filtered_condition . '
                ORDER BY full_date'
    );
}


function orders_sum_till_today_by_month_all_bdm($bdmNo): array
{
    return DB::select('
            SELECT SUM(IF(discounted_price IS NOT NULL, discounted_price, amount)) as total_orders_amount,
            COUNT(id) as orders_count,
            DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%b, %Y") as day,
            DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%Y-%m") as full_date
            FROM `orders`
            WHERE payment_status = 1
            AND client_of = ' . $bdmNo . ' AND amount > 0
            GROUP BY day
            ORDER BY full_date'
    );
}

function orders_group_sum_till_today_by_month_bdm($bdmNo): array
{
    return DB::select('
                SELECT SUM(amount) as total_orders_amount,
                COUNT(id) as orders_count,
                DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%b, %Y") as day,
                DATE_FORMAT(CONVERT_TZ(created_at,"+00:00","-04:00"), "%Y-%m") as full_date
                FROM `group_enrollment_enquiries`
                WHERE payment_status = 1
                AND client_of = ' . $bdmNo . ' AND amount > 0
                GROUP BY day
                ORDER BY full_date'
    );
}

function getBDMId($user_id = null)
{
    if (empty($user_id)) {
        $user_id = auth()->user()->id;
    }

    $bdm_id = null;

    if ($user_id == 3) {
        $bdm_id = 1;
    } else if ($user_id == 4) {
        $bdm_id = 2;
    } else if ($user_id == 5) {
        $bdm_id = 3;
    }

    return $bdm_id;
}

function removeOSHAFromCourseTitle($title) {
    return preg_replace('/osha\s+|osha/i', '', strip_tags($title));
}

function customCourseName($slug) {
    $custom_course_names = [
        'osha-30-hour-construction' => '<span class="spec">OSHA 30 Hour</span> Construction',
        'osha-10-hour-construction' => '<span class="spec">OSHA 10 Hour</span> Construction',
        'osha-10-hour-general-industry' => '<span class="spec">OSHA 10 Hour</span> General Industry',
        'osha-10-construction-spanish' => '<span class="spec">OSHA 10 Hour</span> Construction Spanish',
        'osha-10-hour-general-industry-spanish' => '<span class="spec">OSHA 10 Hour</span> General Industry Spanish',
        'ny-osha-10-hour-general-industry-spanish' => 'New York <span class="spec">OSHA 10 Hour</span> General Industry Spanish',
        'osha-30-hour-general-industry' => '<span class="spec">OSHA 30 Hour</span> General Industry',
        'osha-30-hour-general-industry-spanish' => '<span class="spec">OSHA 30 Hour</span> General Industry Spanish',
        'new-york-osha-10-hour-construction' => 'New York <span class="spec">OSHA 10 Hour</span> Construction',
        'new-york-osha-30-hour-construction' => 'New York <span class="spec">OSHA 30 Hour</span> Construction',
        'new-york-osha-10-hour-general' => 'New York <span class="spec">OSHA 10 Hour</span> General Industry',
        'new-york-osha-10-hour-construction-spanish' => 'New York <span class="spec">OSHA 10 Hour</span> Construction Spanish',
        'osha-30-hour-construction-spanish' => '<span class="spec">OSHA 30 Hour</span> Construction Spanish',
        'new-york-osha-30-hour-construction-spanish' => 'New York <span class="spec">OSHA 30 Hour</span> Construction Spanish',
        'ny-osha-30-hour-general-industry' => 'New York <span class="spec">OSHA 30 Hour</span> General Industry',
//        'osha-10-and-30-hour-construction' => '<span class="spec">OSHA 10 & 30 Hour</span> Construction',
        'osha-10-and-30-hour-construction' => '',
    ];

    return $custom_course_names[$slug] ?? "";
}

function customCourseName_10_30($slug) {
    $custom_course_names = [
        'osha-30-hour-construction' => '<span class="spec">OSHA 30-Hour</span> Construction',
        'osha-10-hour-construction' => '<span class="spec">OSHA 10-Hour</span> Construction',
        'osha-10-hour-general-industry' => '<span class="spec">OSHA 10-Hour</span> General Industry',
        'osha-10-construction-spanish' => '<span class="spec">OSHA 10-Hour</span> Construction Spanish',
        'osha-10-hour-general-industry-spanish' => '<span class="spec">OSHA 10-Hour</span> General Industry (Spanish)',
        'ny-osha-10-hour-general-industry-spanish' => '<span class="spec">New York OSHA</span> 10-Hour General Industry (Spanish)',
        'osha-30-hour-general-industry' => '<span class="spec">OSHA 30-Hour</span> General Industry',
        'osha-30-hour-general-industry-spanish' => '<span class="spec">OSHA 30-Hour</span> General Industry (Spanish)',
        'new-york-osha-10-hour-construction' => '<span class="spec">New York OSHA</span> 10-Hour Construction',
        'new-york-osha-30-hour-construction' => '<span class="spec">New York OSHA</span> 30-Hour Construction',
        'new-york-osha-10-hour-general' => '<span class="spec">New York OSHA</span>  10-Hour General Industry',
        'new-york-osha-10-hour-construction-spanish' => '<span class="spec">New York OSHA </span> 10-Hour Construction (Spanish)',
        'osha-30-hour-construction-spanish' => '<span class="spec">OSHA 30-Hour</span> Construction (Spanish)',
        'new-york-osha-30-hour-construction-spanish' => '<span class="spec">New York OSHA</span> 30-Hour Construction (Spanish)',
        'ny-osha-30-hour-general-industry' => '<span class="spec">New York OSHA</span> 30-Hour General Industry',
//        'osha-10-and-30-hour-construction' => '<span class="spec">OSHA 10 & 30 Hour</span> Construction',
        'osha-10-and-30-hour-construction' => '',
    ];

    return $custom_course_names[$slug] ?? "";
}

function couponDiscountSuccessPage($amountAfterDiscount, $couponAmount, $couponType) {
    $couponDiscount = $couponAmount;

    if($couponType == COUPON_TYPE_PERCENT) {
        /* Calculate total amount from after discount amount */
        $totalAmount = $amountAfterDiscount / (1 - ($couponAmount / 100));

        $couponDiscount = $totalAmount * $couponAmount / 100;
    }

    return number_format($couponDiscount, 2);
}

function generateUserName($firstName, $lastName) {
    $temp_first_name = explode(' ', trim($firstName))[0];
    $temp_last_name = explode(' ', trim($lastName))[0];

    $username = strtolower(preg_replace('/[^a-zA-Z]+/', '', $temp_first_name));
    $username .= '.' . strtolower(preg_replace('/[^a-zA-Z]+/', '', $temp_last_name)) . mt_rand(11, 99);

    return $username;
}
