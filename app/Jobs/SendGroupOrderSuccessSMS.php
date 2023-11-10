<?php

namespace App\Jobs;

use App\Http\Traits\BitlyTrait;
use App\Http\Traits\SMSTrait;
use App\Models\GroupEnrollmentEnquiries;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendGroupOrderSuccessSMS implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, SMSTrait, BitlyTrait;
    protected $group_order;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(GroupEnrollmentEnquiries $group_order)
    {
        $this->group_order = $group_order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $msg_body  = "Hello ".$this->group_order->contact_person.",\n";
        $msg_body .= "Thank you for choosing OSHA Outreach Courses.\n";
        $msg_body .= "Your group enrollment order has been placed successfully.\n";
        $msg_body .= "Please use the following Login details to access LMS :\n";
        $msg_body .= $this->shortenUrl("https://www.oshaoutreachcourses.com/lms?guoid={$this->group_order->guoid}");
        $msg_body .= "Username: " . $this->group_order->username . "\n";
        $msg_body .= "Password: " . $this->group_order->password . "\n";
        $msg_body .= "Call for Assistance: +1 (833) 212-6742";

        $this->sendSMS($msg_body, $this->group_order->contact_no);
    }
}
