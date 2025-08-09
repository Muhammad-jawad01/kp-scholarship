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
        Schema::create('event_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('competition_sub_category_id');
            $table->unsignedBigInteger('level_id');
            $table->boolean('result_status')->default(0);
            $table->timestamps();
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('competition_sub_category_id')->references('id')->on('competition_sub_categories');
            $table->foreign('level_id')->references('id')->on('levels_or_stages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_results');
    }
};
