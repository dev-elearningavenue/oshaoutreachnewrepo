<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSEOTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('meta_name')->nullable();
            $table->string('meta_content')->nullable();
            $table->tinyInteger('page_type')->default(PAGE_TYPE_COURSE);
            $table->string('page_name')->nullable();
            $table->integer('product_id')->nullable();
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
        Schema::dropIfExists('seo_tags');
    }
}
