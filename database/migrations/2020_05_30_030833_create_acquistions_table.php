<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcquistionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acquistions', function (Blueprint $table) {
            $table->id();
            $table->string('research_background');
            $table->string('coach_name');
            $table->string('coach_contact_details');
            $table->string('area_of_expertise');
            $table->string('current_content_request_details');
            $table->string('status');
            $table->string('status_reason');
            $table->string('agreement');
            $table->string('content_ownership_period');
            $table->string('time_bound_starting_date')->nullable();
            $table->string('time_bound_ending_date')->nullable();
            $table->string('details_of_content_files_received');
            $table->tinyInteger('acquistions_status')->default('1');
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
        Schema::dropIfExists('acquistions');
    }
}
