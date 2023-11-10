<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Log;

trait CartFormatForEmailTrait
{

    protected function cartFormatCombineFreeCourses($order, $cart)
    {
        try {
            $freeCourseReferences = [
                "63c958133a6d120a3e590956" => "Active Shooter",
                "63c958133a6d120a3e590957" => "Human Trafficking Awareness",
            ];
            $sa_products = [];
            $freeCoursesQty = 0;
            $isManager = false;
            $cartItems = $cart->items ?? [];
            $products = [];
            $freeCourses = [];

            /* Format Cart Items*/
            foreach ($cartItems as $key => $product) {
                $sa_products[(string)str_pad($key, 4, '0', STR_PAD_LEFT)] = $product['item']['title'];
                $freeCoursesQty += $product['qty'];
                if ($isManager === false && $product['qty'] > 1) {
                    $isManager = true;
                }

                $products[] = [
                    'title' => $product['item']['title'],
                    'price' => "$" . number_format($product['item']['price'], 2),
                    'qty' => $product['qty'],
                    'amount' => "$" . number_format($product['price'], 2)
                ];
            }

            /*Format Free Course Items*/
            if ($order->free_courses !== null && $isManager === false) {
                $orderFreeCourses = json_decode($order->free_courses);

                if (is_array($orderFreeCourses)) {
                    foreach ($orderFreeCourses as $orderFreeCourseId) {
                        $freeCourseName = $freeCourseReferences[$orderFreeCourseId] ?? "N/A";

                        $freeCourses[] = [
                            'title' => $freeCourseName,
                            'price' => "Free",
                            'qty' => 1,
                            'amount' => "$0",
                            'is_free_course' => true
                        ];
                    }
                }
            }


            /*Merge Normal & Free Courses Array*/
            $products = array_merge($products, $freeCourses);

            return [
                'products' => $products,
                'sa_products' => $sa_products,
                'freeCoursesQty' => $freeCoursesQty,
                'isManager' => $isManager
            ];
        } catch (\Exception $e) {
            Log::error("Cart Format Error " . $e->getMessage());
            return [
                'products' => [],
                'sa_products' => [],
                'freeCoursesQty' => 0,
                'isManager' => false
            ];
        }
    }
}
