<?php

namespace App\Jobs;

use Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendDiscountOfferEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;
    protected $products;
    protected $productCount;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($order, $products, $productCount)
    {
        $this->order = $order;
        $this->products = $products;
        $this->productCount = $productCount;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $order = $this->order;
//         Mail::send('emails.order-reminder-new', ['order' => $this->order, 'products' => $this->products, 'productCount' => $this->productCount], function ($mail) use ($order) {
//             $mail->to($order->email)
// //                ->to('support@oshaoutreachcourses.com')
// //                ->subject('Complete your OSHA order with ' . $order->discount . '% Discount');
//                 ->subject('We noticed you left something behind');
//         });

         // Order Reminder December
         Mail::send('emails.order-reminder-dec22', ['order' => $this->order, 'products' => $this->products, 'productCount' => $this->productCount], function ($mail) use ($order) {
            $mail->to($order->email)
                ->subject('Your OSHA Enrollment Advisor is waiting for you.');
        });
    }
}
