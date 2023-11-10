<?php

namespace App\Jobs;

use Mail;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendPromotionsOrderSuccessEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $order;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $order = $this->order;
        $cart = new Cart(unserialize($order->cart));
        try {
            // Send Order Successful Email
            Mail::send('emails.promotions-order-successful', ['order' => $order, 'cart' => $cart], function ($mail) use ($order){
                $mail->to($order->email)
                    ->to('support@oshaoutreachcourses.com')
                    ->replyTo($order->email)
                    //->bcc('saad.5690@gmail.com')
                    ->subject('Your order#'.$order->uoid.' has been successfully placed');
            });
        } catch (Exception $e) {
            echo 'Exception when Sending Email: ', $e->getMessage(), PHP_EOL;
        }
    }
}
