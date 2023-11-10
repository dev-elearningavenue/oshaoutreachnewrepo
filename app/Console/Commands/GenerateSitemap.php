<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Psr\Http\Message\UriInterface;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates sitemap.xml File';

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
     * @return void
     */
    public function handle()
    {
        try {
            $sitemap = SitemapGenerator::create('https://www.oshaoutreachcourses.com')
                ->shouldCrawl(function (UriInterface $url) {
                    /* Skip adding unpublished courses in sitemap.xml */
                    $pathArr = explode("/", $url->getPath());
                    $manualExcludes = ['osha-10-and-30', 'group-discount'];

                    if(count($pathArr) === 2) {
                        $courseSlug = $pathArr[1];

                        /*Exclude Manual Links*/
                        if(in_array($courseSlug, $manualExcludes)) {
                            return false;
                        }

                        $course = Product::query()
                            ->where('slug', $courseSlug)
                            ->first();

                        /*
                         Do not add course link from crawler,
                         We will add courses in sitemap separately
                        */
                        if($course) {
                            return false;
                        }
                    }

                    return true;
                })->getSitemap();

                /* Add all Published Courses to Sitemap */
                Product::query()
                    ->where('published', STATUS_ACTIVE)
                    ->chunk(100, function ($courses) use ($sitemap) {
                        foreach ($courses as $course) {
                            dump($course->slug);
                            $sitemap->add(Url::create('/'.$course->slug));
                        }
                    });

                $sitemap
                ->writeToFile(public_path().'/sitemap.xml');

            $this->info('Sitemap Generated Successfully');
            Log::info('Sitemap Generated Successfully');
        } catch (\Throwable $th) {
            Log::error($th->getMessage() . ' Error generating sitemap');
            dump($th->getMessage());
            $this->error('Error generating sitemap');
        }

    }
}
