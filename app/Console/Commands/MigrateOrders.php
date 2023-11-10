<?php

namespace App\Console\Commands;

use App\Http\Controllers\AdminController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class MigrateOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate Orders from Laravel to Express Server';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $adminController = new AdminController();
            $adminController->exportOrdersToExpressServer();
            $adminController->exportGroupOrdersToExpressServer();
        } catch (\Throwable $th) {
            Log::error($th->getMessage() . ' Error generating sitemap');
            dump($th->getMessage());
            $this->error('Error generating sitemap');
        }

    }
}
