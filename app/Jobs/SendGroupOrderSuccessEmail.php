<?php

namespace App\Jobs;

use App\Mail\GroupOrderSuccessEmail;
use App\Models\GroupEnrollmentEnquiries;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendGroupOrderSuccessEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
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
        $group_order = $this->group_order;
        $cart = unserialize($group_order->cart);
        try {
            // Send Order Successful Email
            Mail::to($group_order->email)
                ->cc(env('MAIL_FROM_ADDRESS', 'support@oshaoutreachcourses.com'))
                ->send(new GroupOrderSuccessEmail($group_order, $cart));

//            Mail::send('emails.group-order-successful', ['group_order' => $group_order, 'cart' => $cart], function ($mail) use ($group_order){
//                $mail->to($group_order->email)
//                    ->to('support@oshaoutreachcourses.com')
//                    ->replyTo($group_order->email)
////                    ->bcc('saad.5690@gmail.com')
//                    ->subject('Your group order# '.$group_order->guoid.' has been successfully placed');
//            });
        } catch (Exception $e) {
            echo 'Exception when Sending Email: ', $e->getMessage(), PHP_EOL;
        }
    }
}
