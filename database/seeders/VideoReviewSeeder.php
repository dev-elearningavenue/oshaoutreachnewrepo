<?php

namespace Database\Seeders;

use App\Models\VideoReview;
use Illuminate\Database\Seeder;

class VideoReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $videoReviews = [
            [
                'name' => "JOSE BEDOLLA",
                'slug' => 'jose-osha-10',
                'location' => "CALIFORNIA",
                'course_date' => "2022-08-08",
                'code' => "pCw8Gtrbk9Y",
                'duration' => "PT0M06S",
                'upload_date' => "2022-11-07",
                'course_id' => 1,
                'lms' => LMS_TYPE_OSHA_OUTREACH,
                'rebuy_stars' => "★★★★★",
                'customer_service_stars' => "★★★★★",
                'price_stars' => "★★★★★",
                'msg' => "My experience was good"
            ],
            [
                'name' => "DANIEL DOWELL",
                'slug' => 'dowell-osha-30',
                'location' => "SOUTH CAROLINA",
                'course_date' => "2022-10-19",
                'code' => "wrNdk2HvGzs",
                'duration' => "PT0M18S",
                'upload_date' => "2021-11-08",
                'course_id' => 2,
                'lms' => LMS_TYPE_OSHA_OUTREACH,
                'rebuy_stars' => "★★★★★",
                'customer_service_stars' => "★★★★★",
                'price_stars' => "★★★★★",
                'msg' => "It was easy to use and understand. I've done osha 30, forklift, and Arial lift training. The forklift had a hang up with the video and testing times. Costumer service took care of it within minutes of me calling. Will definitely use them again when it is needed."
            ],
            [
                'name' => "CHIKEITHA HARIS",
                'slug' => 'chikeitha-ny-osha-10',
                'location' => "MICHIGAN",
                'course_date' => "2022-10-19",
                'code' => "uLdmQuB_pq0",
                'duration' => "PT0M08S",
                'upload_date' => "2022-11-07",
                'course_id' => 5,
                'lms' => LMS_TYPE_OSHA_OUTREACH,
                'rebuy_stars' => "★★★★★",
                'customer_service_stars' => "★★★★★",
                'price_stars' => "★★★★★",
                'msg' => "quick and easy to purchase"
            ],
            [
                'name' => "EDDY ESTRADA",
                'slug' => 'eddy-osha-10-general',
                'location' => "TEXAS",
                'course_date' => "2022-11-06",
                'code' => "hMMprRKQqzI",
                'duration' => "PT0M11S",
                'upload_date' => "2022-11-07",
                'course_id' => 3,
                'lms' => LMS_TYPE_OSHA_OUTREACH,
                'rebuy_stars' => "★★★★★",
                'customer_service_stars' => "★★★★★",
                'price_stars' => "★★★★★",
                'msg' => "it was very challenging and a good course for everyone that works should take this course"
            ],
            [
                'name' => "ROBERT HEALY",
                'slug' => 'robert-osha-30',
                'location' => "MASSACHUSETTS",
                'course_date' => "2022-11-09",
                'code' => "TgTTIE0u2o0",
                'duration' => "PT0M11S",
                'upload_date' => "2022-11-09",
                'course_id' => 2,
                'lms' => LMS_TYPE_OSHA_OUTREACH,
                'rebuy_stars' => "★★★★★",
                'customer_service_stars' => "★★★★★",
                'price_stars' => "★★★★★",
                'msg' => "it has been a good experience."
            ],
            [
                'name' => "JEFF STARR",
                'slug' => 'jeff-osha-10-general',
                'location' => "SOUTH CAROLINA",
                'course_date' => "2022-11-14",
                'code' => "3hga9CTd43I",
                'duration' => "PT0M08S",
                'upload_date' => "2022-11-14",
                'course_id' => 3,
                'lms' => LMS_TYPE_OSHA_OUTREACH,
                'rebuy_stars' => "★★★★★",
                'customer_service_stars' => "★★★★★",
                'price_stars' => "★★★★★",
                'msg' => "A great experience from start to finish. Earned my certificate and couldn't be happier with the process."
            ],
            [
                'name' => "MARCO ASCENCIO",
                'slug' => 'marco-osha-10',
                'location' => "ILLINOIS",
                'course_date' => "2022-11-15",
                'code' => "5PlCzTvAkcM",
                'duration' => "PT0M53S",
                'upload_date' => "2022-11-15",
                'course_id' => 1,
                'lms' => LMS_TYPE_OSHA_OUTREACH,
                'rebuy_stars' => "★★★★★",
                'customer_service_stars' => "★★★★★",
                'price_stars' => "★★★★★",
                'msg' => "Very well laid out course. I was able to retain the information very well and passed all of my tests on the first try!!"
            ],
            [
                'name' => "DANIEL DOWELL",
                'slug' => 'daniel-osha-30',
                'location' => "SOUTH CAROLINA",
                'course_date' => "2022-11-22",
                'code' => "Y7h4UzOisFY",
                'duration' => "PT0M17S",
                'upload_date' => "2021-11-22",
                'course_id' => 2,
                'lms' => LMS_TYPE_OSHA_OUTREACH,
                'rebuy_stars' => "★★★★★",
                'customer_service_stars' => "★★★★★",
                'price_stars' => "★★★★☆",
                'msg' => "Easy to use. Easy to understand and customer service was fast and easy to use. Will definitely use oshaoutreachcourses again.",
            ],
            [
                'name' => "RUSTY WOODARD",
                'slug' => 'rusty-osha-30',
                'location' => "TEXAS",
                'course_date' => "2022-11-22",
                'code' => "r4f0TTSo3Po",
                'duration' => "PT0M12S",
                'upload_date' => "2022-11-22",
                'course_id' => 1,
                'lms' => LMS_TYPE_OSHA_OUTREACH,
                'rebuy_stars' => "★★★★★",
                'customer_service_stars' => "★★★★★",
                'price_stars' => "★★★★★",
                'msg' => "Calm cool and collective"
            ],
        ];

        foreach ($videoReviews as $videoReview) {
            VideoReview::create($videoReview);
        }

        dump("Video Review Seeding complete");
    }
}
