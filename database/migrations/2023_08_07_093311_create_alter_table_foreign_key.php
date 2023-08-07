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
        Schema::table('pages', function (Blueprint $table) {
            $table->foreign('story_id')->references('id')->on('stories')->onDelete('cascade');
        });
        Schema::table('pronouns',function (Blueprint $table){
            $table->foreign('text')->references('id')->on('texts')->onDelete('cascade');
            $table->foreign('audio')->references('id')->on('audios')->onDelete('cascade');
        });
        Schema::table('pronoun_page',function (Blueprint $table){
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
            $table->foreign('pronoun_id')->references('id')->on('pronouns')->onDelete('cascade');
        });
        Schema::table('words',function (Blueprint $table){
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
        });
        Schema::table('interactions',function (Blueprint $table){
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
        });
        Schema::table('pronoun_interaction',function (Blueprint $table){
            $table->foreign('interaction_id')->references('id')->on('interactions')->onDelete('cascade');
            $table->foreign('pronoun_id')->references('id')->on('pronouns')->onDelete('cascade');
        });
        Schema::table('positions',function (Blueprint $table){
            $table->foreign('interaction_id')->references('id')->on('interactions')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alter_table_foreign_key');
    }
};
