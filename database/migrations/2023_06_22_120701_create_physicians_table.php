<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysiciansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physicians', function (Blueprint $table) {
            $table->id();
            $table->string('physician_name')->nullable();
            $table->string('practice_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('referral_name');
            $table->string('ext')->nullable();
            $table->string('email')->nullable();
            $table->string('physician_address')->nullable();
            $table->string('fax')->nullable();
            $table->string('npi')->nullable();
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
        Schema::dropIfExists('physicians');
    }
}
