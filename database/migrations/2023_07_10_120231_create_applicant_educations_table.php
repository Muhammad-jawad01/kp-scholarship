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
        Schema::create('applicant_educations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->string('level')->nullable();
            $table->string('institute_university_name')->nullable();
            $table->integer('passing_year')->nullable();
            $table->integer('per_month_kpef')->nullable();
            $table->integer('total_marks_cgpa')->nullable();
            $table->integer('obtained_marks_cgpa')->nullable();
            $table->boolean('currently_studying')->default(false);

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
        Schema::dropIfExists('applicant_educations');
    }
};
