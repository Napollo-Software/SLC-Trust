<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmergencyContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergency_contacts', function (Blueprint $table) {
            $table->id();
            $table->integer('referral_id');
            $table->string('emergency_first_name');
            $table->string('emergency_last_name');
            $table->string('emergency_relationship');
            $table->string('emergency_phone_number');
            $table->integer('emergency_ext_number');
            $table->string('emergency_email');
            $table->string('email_status')->nullable();
            $table->string('emergency_city');
            $table->string('emergency_state');
            $table->string('emergency_address');
            $table->integer('emergency_zip_code');
            $table->string('emegergency_apt_suite');
            $table->boolean('have_keys');
            $table->boolean('live_with_parents');
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
        Schema::dropIfExists('emergency_contacts');
    }
}
