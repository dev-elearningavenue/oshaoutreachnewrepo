<?php

namespace App\Http\Traits;

use App\Models\Cart;
use App\Models\GroupEnrollmentEnquiries;
use App\Models\Order;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

trait LmsApiTrait
{
    use SMSTrait;

    protected function generateOrder($order_id)
    {
        try {
            $freeCourseReferences = [
                "63c958133a6d120a3e590956" => "Active Shooter",
                "63c958133a6d120a3e590957" => "Human Trafficking Awareness",
            ];

            $courseReferences = [
                1 => '616f13206455b7adbf7306eb',
                2 => '616fd3866455b7adbf730852',
                3 => '616fd21d6455b7adbf730820',
                5 => '617951be6455b7adbf731f95',
                6 => '617828066455b7adbf731af2',
                7 => '6213af9785cf23488626bbbf',
                8 => '617952e36455b7adbf731fc1',
                9 => '63cfc8abf46ad2be65e92dd8',
                99 => '6225e7099225414cd5899a26',
                2310 => '6290d773cc29d723b9e267de',
                2311 => '63cfca2ef46ad2be65e92e19',
                2312 => '63cfb3e9f46ad2be65e92ccc',
                2313 => '63cfb55df46ad2be65e92cdd',
                2314 => '63cfcb53f46ad2be65e92e3e',
                2315 => '63cfcbddf46ad2be65e92e50',
                2316 => '63cfcc81f46ad2be65e92e60',
                2317 => [2, 1]
            ];

            $order = Order::find($order_id);
            // dump($order->toArray());
            try {
                $cart = new Cart(unserialize($order->cart));
            } catch (\Exception $ex) {
                $cart = new Cart();
            }
            // dump($cart);
            $courses = [];
            $freeCourseQty = 0;
            $isManager = false;
            if (count($cart->items) > 0) {
                foreach ($cart->items as $item) {
                    // if user purchases more than one course or is a manager previously
                    if (($item['qty'] > 1 || $order->user_type == 2) && !$isManager) {
                        $isManager = true;
                    }

                    // Calculate Free Course Qty
                    $freeCourseQty += $item['qty'];

                    if ($item['item']['id'] === 2317) {
                        foreach ($courseReferences[$item['item']['id']] as $bundleCourseId) {
                            $course = [
                                'id' => $item['item']['id'],
                                'course_lms_id' => $courseReferences[$bundleCourseId],
                                'name' => $item['item']['title'],
                                'language' => $item['item']['language'],
                                'quantity' => $item['qty']
                            ];

                            $courses[] = $course;
                        }
                    } else {
                        $course = [
                            'id' => $item['item']['id'],
                            'course_lms_id' => $courseReferences[$item['item']['id']],
                            'name' => $item['item']['title'],
                            'language' => $item['item']['language'],
                            'quantity' => $item['qty']
                        ];

                        $courses[] = $course;
                    }
                }

                // Add Free Courses to Courses Array when user not manager and user opted for free course
                if ($isManager === false && $order->free_courses !== null) {
                    $orderFreeCourses = json_decode($order->free_courses);

                    if (is_array($orderFreeCourses)) {
                        foreach ($orderFreeCourses as $orderFreeCourseId) {
                            $freeCourseName = $freeCourseReferences[$orderFreeCourseId] ?? "N/A";

                            $courses[] = [
                                'id' => "N/A",
                                'course_lms_id' => $orderFreeCourseId,
                                'name' => $freeCourseName,
                                'language' => "English",
                                'quantity' => 1,
                                'is_free_course' => true
                            ];
                        }
                    }
                }
            }

            // $data
            $post_data = [
                'uoid' => $order->uoid,
                'firstName' => $order->first_name,
                'lastName' => $order->last_name,
                'userName' => $order->username,
                'email' => $order->email,
                'password' => $order->password,
                'contactNo' => $order->contact_no,
                'address' => $order->address,
                'city' => $order->city,
                'state' => $order->state,
                'zipCode' => $order->zip_code,
                'country' => $order->country,
                'orderDetails' => $courses,
                'companyName' => '-',
                'isManager' => $isManager,
                'userLmsId' => $order->user_lms_id,
                'free_course_tot_qty' => $isManager === true ? $freeCourseQty : 0
            ];

            $response = Http::post(env('LMS_API_URL') . '/signup', $post_data);

            if ($response->successful()) {
                Log::info("User Added to LMS");
                Log::info($response->body());
                return true;
            } else {
                Log::error("Error in User Added to LMS");
                Log::error($response->body());

                // Send Error SMS to Manager
                $this->sendSMS(
                    "There was an error in User Creation on Outreach LMS\n OrderID: $order->uoid",
                    env('OUTREACH_MANAGER_PHONE')
                );

                return false;
            }
        } catch (\Exception $e) {
            Log::error("Error in Normal Order: " . $e->getMessage() . ' ' . $e->getLine() . " Order id: " .$order_id);
            dump($e->getMessage());
        }

    }

    protected function generateGroupOrder($group_order_id)
    {
        try {
            $groupCourseReferences = [
                1 => '616f13206455b7adbf7306eb',
                2 => '616fd3866455b7adbf730852',
                3 => '616fd21d6455b7adbf730820',
                5 => '617951be6455b7adbf731f95',
                6 => '617828066455b7adbf731af2',
                7 => '6213af9785cf23488626bbbf',
                8 => '617952e36455b7adbf731fc1',
                9 => '63cfc8abf46ad2be65e92dd8',
                99 => '6225e7099225414cd5899a26',
                2310 => '6290d773cc29d723b9e267de',
                2311 => '63cfca2ef46ad2be65e92e19',
                2312 => '63cfb3e9f46ad2be65e92ccc',
                2313 => '63cfb55df46ad2be65e92cdd',
                2314 => '63cfcb53f46ad2be65e92e3e',
                2315 => '63cfcbddf46ad2be65e92e50',
                2316 => '63cfcc81f46ad2be65e92e60',
                2317 => [2, 1]
            ];

            $groupOrder = GroupEnrollmentEnquiries::find($group_order_id);
            try {
                $cart = unserialize($groupOrder->cart);
            } catch (\Exception $ex) {
                $cart = ['items' => []];
            }

            $courses = [];

            if (count($cart['items']) > 0) {
                foreach ($cart['items'] as $item) {
                    if ($item['id'] === 2317) {

                        foreach ($groupCourseReferences[$item['id']] as $bundleCourseId) {
                            $course = [
                                'id' => $item['id'],
                                'course_lms_id' => $groupCourseReferences[$bundleCourseId],
                                'name' => $item['title'],
                                'quantity' => $item['quantity']
                            ];

                            $courses[] = $course;
                        }

                    } else {
                        $course = [
                            'id' => $item['id'],
                            'course_lms_id' => $groupCourseReferences[$item['id']],
                            'name' => $item['title'],
                            'quantity' => $item['quantity']
                        ];

                        $courses[] = $course;
                    }
                }
            }

            // $data
            $post_data = [
                'uoid' => $groupOrder->guoid,
                'firstName' => $groupOrder->first_name,
                'lastName' => $groupOrder->last_name,
                'userName' => $groupOrder->username,
                'email' => $groupOrder->email,
                'password' => $groupOrder->password,
                'contactNo' => $groupOrder->contact_no,
                'address' => $groupOrder->address,
                'city' => $groupOrder->city,
                'state' => $groupOrder->state,
                'zipCode' => $groupOrder->zip_code,
                'country' => '-',
                'orderDetails' => $courses,
                'companyName' => $groupOrder->company_name,
                'companyType' => $groupOrder->company_type ?? "",
                'isManager' => true,
                'userLmsId' => $groupOrder->user_lms_id,
                'free_course_tot_qty' => $groupOrder->free_course_qty,
            ];

            $response = Http::post(env('LMS_API_URL') . '/signup', $post_data);

            if ($response->successful()) {
                Log::info("Manager Added to LMS from GE Page");
                Log::info($response->body());
                return true;
            } else {
                Log::error("Error in Manager Added to LMS");
                Log::error($response->body());

                // Send Error SMS to Manager
                $this->sendSMS(
                    "There was an error in User Creation on Outreach LMS\n Group OrderID: $groupOrder->guoid",
                    env('OUTREACH_MANAGER_PHONE')
                );

                return false;
            }
        } catch (\Exception $e) {
            Log::error("Error in Group Order: " . $e->getMessage() . ' ' . $e->getLine() . " Order id: " .$group_order_id);
            dump($e->getMessage() . ' ' . $e->getLine());
        }

    }
}
