<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GroupOrderSuccessEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $group_order;
    private $cart;

    public function __construct($group_order, $cart)
    {
        $this->group_order = $group_order;
        $this->cart = $cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->view('emails.group-order-successful', ['group_order' => $this->group_order, 'cart' => $this->cart])
            ->subject('Your group order# '.$this->group_order->guoid.' has been successfully placed')
            ->withSwiftMessage(function ($message) {
                $message->getHeaders()->addTextHeader("X-MC-PreserveRecipients", true);
            });
    }
}
