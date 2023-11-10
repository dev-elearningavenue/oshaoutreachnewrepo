<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('imagePath')->nullable();
            $table->string('title');
            $table->text('description');
            $table->string('slug');
            $table->float('price');
            $table->integer('course_id')->nullable();
            $table->text('language')->nullable();
            $table->text('variants')->nullable();
            $table->longText('outline')->nullable();
            $table->text('learning_objective')->nullable();
            $table->text('related_courses')->nullable();
            $table->tinyInteger('published')->default(STATUS_ACTIVE);
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
        Schema::drop('products');
    }
}
