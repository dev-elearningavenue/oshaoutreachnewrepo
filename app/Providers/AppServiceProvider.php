<?php

namespace App\Providers;

use App\Models\SEO_Tag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('recaptcha', 'App\\Validators\\ReCaptcha@validate');

        View::composer('*', function ($view)
        {
            $view->with('WEB_CREDIT', Session::get('bdm_id') ?? '');
            $globalSaDB = SEO_Tag::where('meta_name', 'sa_reviews')->first();

            $globalSaRating = [
                'ratingValue' => 4.6,
                'reviewCount' => 198
            ];

            if($globalSaDB && json_decode($globalSaDB->meta_content)) {
                $globalSaDBDecoded = json_decode($globalSaDB->meta_content);

                $globalSaRating['ratingValue'] = $globalSaDBDecoded->average_rating;
                $globalSaRating['reviewCount'] = $globalSaDBDecoded->total_reviews;
            }

            $view->with('GLOB_SA_RATING', $globalSaRating);

        });
    }
}
