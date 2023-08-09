<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('positions',function (Blueprint $table){
            $table->foreign('interaction_id')->references('id')->on('interactions')->onDelete('cascade');
            $table->foreign('text_id')->references('id')->on('texts')->onDelete('cascade');
        });
        Schema::table('texts',function (Blueprint $table){
            $table->foreign('audio_id')->references('id')->on('audios')->onDelete('cascade');
        });
        Schema::table('pages',function (Blueprint $table){
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
            $table->foreign('story_id')->references('id')->on('stories')->onDelete('cascade');
        });
        Schema::table('interactions',function (Blueprint $table){
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
            $table->foreign('text_id')->references('id')->on('texts')->onDelete('cascade');
        });
        Schema::table('text_config',function (Blueprint $table){
            $table->foreign('text_id')->references('id')->on('texts')->onDelete('cascade');
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('positions',function (Blueprint $table){
            $table->dropForeign(['interaction_id']);
            $table->dropForeign(['text_id']);
        });
        Schema::table('texts',function (Blueprint $table){
            $table->dropForeign(['audio_id']);
        });
        Schema::table('pages',function (Blueprint $table){
            $table->dropForeign(['image_id']);
            $table->dropForeign(['story_id']);

        });
        Schema::table('interactions',function (Blueprint $table){
            $table->dropForeign(['page_id']);
            $table->dropForeign(['image_id']);
            $table->dropForeign(['text_id']);
        });
        Schema::table('text_config',function (Blueprint $table){
            $table->dropForeign(['text_id']);
            $table->dropForeign(['page_id']);
        });
    }
};
