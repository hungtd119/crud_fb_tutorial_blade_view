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
        Schema::create('interactions', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('bg');
            $table->unsignedBigInteger('soundText');
            $table->string('image');
            $table->unsignedBigInteger('page_id');
            $table->timestamps();
            $table->foreign('page_id')->references('id')->on('pages');
//            $table->foreign('soundText')->references('id')->on('pronouns');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interactions');
    }
};
