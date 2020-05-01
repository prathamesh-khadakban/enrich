<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qcs', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->string('container');
            $table->string('video_codec');
            $table->string('video_aspect_ratio');
            $table->string('video_frame_size');
            $table->string('video_frame_rate');
            $table->string('video_bitrate');
            $table->string('h_264_profile');
            $table->string('audio_sampling_rate');
            $table->string('audio_bitrate');
            $table->string('audio_codec');
            $table->string('audio_channels');
            $table->string('key_frame_interval');
            $table->string('duration');
            $table->tinyInteger('status')->default('1');
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
        Schema::dropIfExists('qcs');
    }
}
