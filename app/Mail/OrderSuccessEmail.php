<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderSuccessEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $order;
    private $cart;
    private $cartData;

    public function __construct($order, $cart, $cartData)
    {
        $this->order = $order;
        $this->cart = $cart;
        $this->cartData = $cartData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->view('emails.order-successful',
                [
                    'order' => $this->order,
                    'cart' => $this->cart,
                    'products' => $this->cartData['products'],
                    'freeCoursesQty' => $this->cartData['freeCoursesQty'],
                    'isManager' => $this->cartData['isManager'],
                ]
            )
            ->subject('Your order#' . $this->order->uoid . ' has been successfully placed')
            ->withSwiftMessage(function ($message) {
               $message->getHeaders()->addTextHeader("X-MC-PreserveRecipients", true);
            });
    }
}
