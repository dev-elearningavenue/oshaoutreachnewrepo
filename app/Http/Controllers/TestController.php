<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\GroupEnrollmentEnquiries;
use App\Models\Order;
use Illuminate\Http\Request;
use Auth;
use Session;

class TestController extends Controller
{
   public function getAllSaleCourses(Request $request)
   {
       /*
        $orders = Order::where('payment_status', STATUS_ACTIVE)->get();
        echo $orders->count();
        $courses_array = [];
        $ii = 0;
        foreach ($orders as $order){
            $cart = new Cart(unserialize($order->cart));
            try {
                foreach ($cart->items as $key => $product) {
//                    echo "<h4>".$product['item']['title']."</h4>";
                    if (key_exists($product['item']['title'], $courses_array)) {
                        $courses_array[$product['item']['title']] = $courses_array[$product['item']['title']] + $product['qty'];
                    } else {
                        $courses_array[$product['item']['title']] = $product['qty'];
                    }
                }
            }catch(\Exception $ex){
//                echo $order->cart;
            }
        }
//        echo "<pre>";
        arsort($courses_array);
//        var_dump($courses_array);
       echo "<table>";
       echo "<tr><th>Course</th><th>Count</th></tr>";
        foreach ($courses_array  as $course => $count){
            echo "<tr><td>{$course}</td><td>{$count}</td></tr>";
        }
        echo "</table>";

*/
       $orders = GroupEnrollmentEnquiries::where('payment_status', STATUS_ACTIVE)->get();
       echo $orders->count();
       $courses_array = [];
       $ii = 0;
       foreach ($orders as $order){
           $cart = unserialize($order->cart);
           try {
               foreach ($cart['items'] as $key => $product) {
                   //                    echo "<h4>".$product['item']['title']."</h4>";
                   if (key_exists($product['title'], $courses_array)) {
                       $courses_array[$product['title']] = $courses_array[$product['title']] + $product['quantity'];
                   } else {
                       $courses_array[$product['title']] = $product['quantity'];
                   }
               }
           }catch(\Exception $ex){
               //                echo $order->cart;
           }
       }

       arsort($courses_array);
       echo "<table>";
       echo "<tr><th>Course</th><th>Count</th></tr>";
       foreach ($courses_array  as $course => $count){
           echo "<tr><td>{$course}</td><td>{$count}</td></tr>";
       }
       echo "</table>";
   }
}
