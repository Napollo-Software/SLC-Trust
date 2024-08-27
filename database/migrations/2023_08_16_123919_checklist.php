<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Checklist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist', function (Blueprint $table) {
            $table->id();
            $table->integer('referral_id');
            $table->string('doh');
            $table->string('hipaa_state')->nullable();
            $table->string('disability');
            $table->string('hipaa')->nullable();
            $table->string('joinder')->nullable();
            $table->string('map')->nullable();
            $table->string('home')->nullable();
            $table->string('mltc')->nullable();
            $table->string('source')->nullable();
            $table->string('tform')->nullable();
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
        //
    }
}
