<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGuoidToGroupEnrollmentEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('group_enrollment_enquiries', function ($table) {
            $table->string("guoid");
            $table->text('cart')->nullable(); // check after
            $table->float('amount', 20, 2)->default(0.00);
            $table->float('discount', 20, 2)->default(0.00);
            $table->string('transaction_reference')->nullable();
            $table->string('payment_details')->nullable();
            $table->tinyInteger('payment_status')->default(0);
            $table->tinyInteger('is_gtag_submitted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('group_enrollment_enquiries', function (Blueprint $table) {
            $table->dropColumn(['guoid', 'cart', 'amount', 'discount', 'transaction_reference', 'payment_details', 'payment_status', 'is_gtag_submitted']);
        });
    }
}
