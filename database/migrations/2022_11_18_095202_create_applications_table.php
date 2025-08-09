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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('participant_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('competition_category_id')->nullable();
            $table->unsignedBigInteger('competition_sub_category_id')->nullable();
            $table->boolean('status')->default(1);
            
            $table->unsignedBigInteger('levels_or_stage_id')->nullable();
            $table->unsignedBigInteger('stage')->nullable();
            $table->unsignedBigInteger('rank')->nullable();
            $table->unsignedBigInteger('event_type')->default(1)->comment('1 for normal, 2 for provicional level');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('levels_or_stage_id')->references('id')->on('levels_or_stages')->onDelete('cascade');
            $table->foreign('participant_id')->references('id')->on('participants')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->foreign('competition_category_id')->references('id')->on('competition_categories')->onDelete('cascade');
            $table->foreign('competition_sub_category_id')->references('id')->on('competition_sub_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
};
