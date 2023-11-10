<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('uoid')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('password')->nullable();
            $table->string('address')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('course_for')->nullable();
            $table->text('cart')->nullable();
            $table->string('payerID')->nullable();
            $table->string('token')->nullable();
            $table->string('transaction_reference')->nullable();
            $table->float('amount')->default(0);
            $table->string('coupon_code')->nullable();
            $table->integer('discount')->nullable();
            $table->float('discounted_price')->nullable();
            $table->text('payment_details')->nullable();
            $table->tinyInteger('payment_status')->default(0);
            $table->tinyInteger('is_completed')->default(0);
            $table->string('username')->nullable();
            $table->integer('client_of')->nullable();
            $table->tinyInteger('is_gtag_submitted')->default(0);
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
        Schema::drop('orders');
    }
}
