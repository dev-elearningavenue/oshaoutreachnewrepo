<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupEnrollmentEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_enrollment_enquiries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name')->nullable();
            $table->integer('no_of_employees')->nullable();
            $table->string('company_type')->nullable();
            $table->string('course_name')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('contact_person')->nullable();
            $table->integer('client_of')->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::drop('group_enrollment_enquiries');
    }
}
