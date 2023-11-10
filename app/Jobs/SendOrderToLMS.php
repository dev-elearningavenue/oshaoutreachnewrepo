<?php

namespace App\Jobs;

use App\Http\Traits\LmsApiTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendOrderToLMS implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, LmsApiTrait;
    protected $order_id;
    protected $is_group_order;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($order_id, $groupOrder = false)
    {
        $this->order_id = $order_id;
        $this->is_group_order = $groupOrder;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->is_group_order === true) {
            $this->generateGroupOrder($this->order_id);
        } else {
            $this->generateOrder($this->order_id);
        }
    }
}
