<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referrals', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('age');
            $table->string('status')->nullable();
            $table->string('phone_number');
            $table->string('gender');
            $table->date('date_of_birth');
            $table->string('email');
            $table->string('country');
            $table->string('city');
            $table->string('state');
            $table->string('address');
            $table->integer('zip_code');
            $table->string('apt_suite');
            $table->string('patient_ssn');
            $table->string('medicaid_number');
            $table->string('medicaid_plan');
            $table->string('medicare_number');
            $table->string('convert_to_customer')->nullable();
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
        Schema::dropIfExists('referrals');
    }
}
