<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            //contact info
            $table->string('contact_first_name');
            $table->string('contact_last_name');
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('relation_to_patient')->nullable();
            //patient info
            $table->string('patient_first_name')->nullable();
            $table->string('patient_last_name')->nullable();
            $table->string('patient_phone')->nullable();
            $table->string('patient_email')->nullable();
            //other info
            $table->string('interested_in')->nullable();
            $table->string('sub_status')->nullable();
            $table->string('vendor_id');
            // $table->unsignedBigInteger('vendor_id')->nullable();
            // $table->foreign('vendor_id')->references('id')->on('users'); //foreign id vendors
            $table->string('case_type')->nullable();
            $table->text('note')->nullable();
            $table->integer('case_type_id')->nullable();

            $table->string('source_type')->nullable();
            $table->string('source_id')->nullable();
            // $table->foreign('source_id')->references('id')->on('contact')->onDelete('cascade');

            $table->string('source')->nullable();
            $table->date('follow_up_date')->nullable();
            $table->time('follow_up_time')->nullable();
            $table->string('follow_up_note')->nullable();
            $table->text('closing_reason')->nullable();

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
        Schema::dropIfExists('leads');
    }
}
