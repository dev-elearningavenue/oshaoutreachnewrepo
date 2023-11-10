<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('location');
            $table->date('course_date');
            $table->string('code');
            $table->string('duration');
            $table->date('upload_date');
            $table->integer('course_id');
            $table->tinyInteger('lms')->default(LMS_TYPE_OSHA_OUTREACH);
            $table->string('rebuy_stars');
            $table->string('customer_service_stars');
            $table->string('price_stars');
            $table->tinyText('msg')->default("");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_reviews');
    }
}
