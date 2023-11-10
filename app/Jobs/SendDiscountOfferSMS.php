<?php

namespace App\Jobs;

use App\Http\Traits\BitlyTrait;
use App\Http\Traits\SMSTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendDiscountOfferSMS implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, SMSTrait, BitlyTrait;

    protected $order;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($order)
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

        // $msg_body = "Hi $order->first_name $order->last_name,\n";
        // $msg_body .= "We noticed you left something behind.\n";
        // $msg_body .= "Looks like you didn't finish checking out. Would you like to complete your online training?\n";
        // $msg_body .= "Resume your Order: " . $this->shortenUrl(url("/order-special-offer/$order->uoid")) . "\n";
        // $msg_body .= "OSHA Outreach Courses\n";
        // $msg_body .= "Call for Assistance: +1 (833) 212-6742";

        $msg_body = "Hello $order->first_name,\n";
        $msg_body .= "We've noticed that you left OSHA 30-Hour Course in your cart.\n";
        $msg_body .= "Are you sure you want to let it go?\n";
        $msg_body .= "We have saved it for you!\n";
        $msg_body .= $this->shortenUrl(url("/order-special-offer/$order->uoid")) . "\n";
        $msg_body .= "Your OSHA enrolment advisor is waiting for you.\n";
        $msg_body .= "CALL +1 (833) 212-6742\n";
        $msg_body .= "OSHA OUTREACH COURSES";

        $this->sendSMS($msg_body, $order->contact_no);
    }
}
