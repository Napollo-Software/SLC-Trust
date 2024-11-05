<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followups', function (Blueprint $table) {
            $table->id();
            $table->string('from');
            // $table->foreign('from')->references('id')->on('users')->onDelete('cascade');
            $table->string('to');
            // $table->foreign('to')->references('id')->on('users')->onDelete('cascade');
            $table->string('date');
            $table->string('time');
            $table->string('note')->nullable();
            $table->boolean('completed')->default(false);
            $table->string('completed_by')->nullable();
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
        Schema::dropIfExists('followups');
    }
}
