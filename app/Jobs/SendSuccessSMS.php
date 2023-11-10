<?php

namespace App\Jobs;

use App\Http\Traits\BitlyTrait;
use App\Http\Traits\SMSTrait;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendSuccessSMS implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, SMSTrait, BitlyTrait;

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
        $msg_body = "Hello " . $this->order->first_name . ",\n";
        $msg_body .= "Thank you for choosing OSHA Outreach Courses.\n";
        $msg_body .= "Please use the following Login details to access LMS :\n";
        $msg_body .= $this->shortenUrl("https://www.oshaoutreachcourses.com/lms?uoid={$this->order->uoid}");
        $msg_body .= "Username: " . $this->order->username . "\n";
        $msg_body .= "Password: " . $this->order->password . "\n";
        $msg_body .= "Call for Assistance: +1 (833) 212-6742";

        $this->sendSMS($msg_body, $this->order->contact_no);
    }
}
