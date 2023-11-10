<?php

namespace App\Jobs;

use App\Http\Traits\CartFormatForEmailTrait;
use App\Mail\OrderSuccessEmail;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendSuccessEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, CartFormatForEmailTrait;
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
        try {
            $order = $this->order;

            $cart = new Cart(unserialize($order->cart));

            $cartData = $this->cartFormatCombineFreeCourses($order, $cart);

            // Send Order Successful Email
            Mail::to($order->email)
                ->cc(env('MAIL_FROM_ADDRESS', 'support@oshaoutreachcourses.com'))
                ->send(new OrderSuccessEmail($order, $cart, $cartData));

//             Mail::send('emails.order-successful', ['order' => $order, 'cart' => $cart], function ($mail) use ($order) {
//                 $mail->to($order->email)
//                     ->cc("gmtalha9@gmail.com")
//                     // ->to('support@oshaoutreachcourses.com')
////                     ->replyTo($order->email)
//                     //->bcc('saad.5690@gmail.com')
//                     ->subject('Your order#' . $order->uoid . ' has been successfully placed');
//             });

//            Mail::raw('Your order#' . $order->uoid . ' has been successfully placed', function ($message) use ($order) {
//                $message->to($order->email);
//                $message->subject('Your order#' . $order->uoid . ' has been successfully placed');
//            });
        } catch (\Exception $e) {
            echo 'Exception when Sending Email: ', $e->getMessage(), PHP_EOL;
        }
    }
}
