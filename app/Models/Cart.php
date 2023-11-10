<?php

namespace App\Models;

use App\Models\Coupon;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Http;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    public $discount = 0;
    public $couponDiscount = 0;
    public $coupon = [];
    public $disallowCoupon = false;
    public $promotionPriceIndex = 0;

    public function __construct($oldCart = null)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
            $this->discount = $oldCart->discount;
            $this->couponDiscount = $oldCart->couponDiscount;
            $this->coupon = $oldCart->coupon;
            $this->disallowCoupon = $oldCart->disallowCoupon ?? false;
            $this->promotionPriceIndex = $oldCart->promotionPriceIndex ?? 0;
        }
    }

    public function add($item, $id, $disallowCoupon = false, $promotionPriceIndex = 0) {
        $storedItem = [
            'qty' => 1,
            'price' => 0,
            'item' => [
                'id' => $item['id'],
                'title' => $item['title'],
                'slug' => $item['slug'],
                'price' => $item['price'],
                'discounted_price' => $item['discounted_price'],
                'original_discounted_price' => $item['discounted_price'],
                'course_id' => $item['course_id'],
                'language' => $item['language'],
                'discount_slabs' => json_decode($item->discount_slabs)
            ]
        ];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }

        $this->items[$id] = $storedItem;

        $this->calculateTotalPrice();
        $this->calculateDiscount();

        /* Update disallowCoupon only if new value is true */
        if(!$this->disallowCoupon) {
            $this->disallowCoupon = $disallowCoupon;
        }

        /* Update Promotion Price Index */
        $this->promotionPriceIndex = (int) $promotionPriceIndex;
    }

    /*For Abandoned Cart/Order Reminder*/
    public function addForReminder($item, $id, $qty = 1) {
        $storedItem = [
            'qty' => $qty,
            'price' => 0,
            'item' => [
                'id' => $item['id'],
                'title' => $item['title'],
                'slug' => $item['slug'],
                'price' => $item['price'],
                'discounted_price' => $item['discounted_price'],
                'original_discounted_price' => $item['discounted_price'],
                'course_id' => $item['course_id'],
                'language' => $item['language'],
                'discount_slabs' => json_decode($item->discount_slabs)
            ]
        ];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }

        $this->items[$id] = $storedItem;

        $this->calculateTotalPrice();
        $this->calculateDiscount();
    }

    private function quantityDiscountCalculator($discountSlabs, $qty, $currentPrice) {
        $quantityDiscountedPrice = $currentPrice;

        if($discountSlabs && !$this->disallowCoupon) {
            if ($qty > 1 && $qty <= 5) {
                $quantityDiscountedPrice = $discountSlabs[0];
            } else if ($qty > 5 && $qty <= 15) {
                $quantityDiscountedPrice = $discountSlabs[1];
            } else if ($qty > 15) {
                $quantityDiscountedPrice = $discountSlabs[2];
            }
        }

        return $quantityDiscountedPrice;
    }

    public function reduceByOne($id) {
        $this->items[$id]['qty']--;
        $this->items[$id]['item']['discounted_price'] = $this->quantityDiscountCalculator(
            $this->items[$id]['item']['discount_slabs'],
            $this->items[$id]['qty'],
            $this->items[$id]['item']['original_discounted_price']
        );

        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }

        $this->calculateTotalPrice();
        $this->calculateDiscount();
    }

    public function increaseByOne($id) {
        $this->items[$id]['qty']++;
        $this->items[$id]['item']['discounted_price'] = $this->quantityDiscountCalculator(
            $this->items[$id]['item']['discount_slabs'],
            $this->items[$id]['qty'],
            $this->items[$id]['item']['original_discounted_price']
        );

        $this->calculateTotalPrice();
        $this->calculateDiscount();
    }

    public function removeItem($id) {
        unset($this->items[$id]);

        $this->calculateTotalPrice();
        $this->calculateDiscount();
    }

    public function applyCoupon($code)
    {
        $getCoupon = Http::post(env('LMS_API_URL') . '/shop/promocodes', [
            'promo_code' => $code
        ]);

        if($getCoupon->failed()) {
            return false;
        }

        $coupon = $getCoupon->object()->promo_code;

        $this->coupon = $coupon;

        if($coupon->type == COUPON_TYPE_FIXED){
            $this->couponDiscount = $coupon->discount;
        } else {
            $this->couponDiscount = ($this->totalPrice - $this->discount) * $coupon->discount / 100;
        }

        return true;
    }

    public function removeCoupon()
    {
        $this->coupon   = [];
        $this->couponDiscount = 0;

        return true;
    }

    protected function calculateTotalPrice()
    {
        $this->totalPrice = 0;
        $this->discount = 0;
        $this->totalQty = 0;

        foreach ($this->items as $key => $item){
            $discount = $item['item']['discounted_price'] > 0 ? $item['item']['price'] - $item['item']['discounted_price'] : 0;

            $updated_item = $this->items[$key];

            $updated_item['price'] = $item['item']['price'] * $item['qty'];

            $this->items[$key] = $updated_item;

            $this->totalPrice += $updated_item['price'];
            $this->discount   += $discount * $item['qty'];
            $this->totalQty++;
        }
    }

    /* this function for calculating % discount on Qty change */
    protected function calculateDiscount()
    {
        if($this->coupon){
            if($this->coupon->type == COUPON_TYPE_PERCENT){
                $this->couponDiscount = ($this->totalPrice - $this->discount) * $this->coupon->discount / 100;
            }
        }
    }
}
