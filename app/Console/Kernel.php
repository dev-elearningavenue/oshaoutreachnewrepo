<?php

namespace App\Console;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;
use Stripe\StripeClient;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//         $schedule->command('inspire')->everyMinute();
        $schedule->call(function () {
            $adminController = new AdminController();
            $adminController->fetchLatestBlogs();
        });

        $schedule->call(function () {
           $homeController = new HomeController();
           $homeController->fetchShoppersApprovedRatings();
        });

        $stripe = new StripeClient(env('STRIPE_SECRET_KEY'));

        $schedule->call(function () use ($stripe) {
            $homeController = new ProductController($stripe);
            $homeController->fetchSaProductRatings();
        });
//            ->cron('0 16 * * 5'); TODO: add after testing

//        $schedule->call(function () {
//            $homeController = new ProductController();
//            $homeController->getSaleCourseCount();
//        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
