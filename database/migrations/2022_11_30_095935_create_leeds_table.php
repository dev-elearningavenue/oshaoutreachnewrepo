<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leeds', function (Blueprint $table) {
            $table->id();

            /* Fields From Upload Sheet */
            $table->string('company_name')->nullable();
            $table->string('contact_person');
            $table->string('email');
            $table->string('phone');
            $table->string('no_of_employees')->nullable();
            $table->string('type')->nullable(); // Corporation, LLC, Partnership
            $table->string('course')->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');
            $table->integer('bdm');
            /* Fields From Upload Sheet */

            $table->tinyInteger('contacted')->default(0);
            $table->text('outcome')->default("");

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
        Schema::dropIfExists('leeds');
    }
}
