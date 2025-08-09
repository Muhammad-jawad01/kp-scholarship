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
        Schema::create('family_infos', function (Blueprint $table) {
            $table->id();
            $table->string('father_status')->nullable();
            $table->string('father_cnic')->nullable();
            $table->string('father_profession')->nullable();
            $table->boolean('father_earning')->nullable();
            $table->string('father_guardian')->nullable();
            $table->text('employer_address')->nullable();
            $table->string('father_guardian_designation')->nullable();
            $table->string('financial_support')->nullable();
            $table->string('father_ntn_number')->nullable();
            $table->boolean('mother_status')->nullable();
            $table->string('mother_profession')->nullable();
            $table->string('professional_status')->nullable();
            $table->string('parent_marriage_relationship')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('telephone_number')->nullable();
            $table->integer('total_family_members')->nullable();
            $table->integer('dependent_family_members')->nullable();
            $table->integer('total_earning_members')->nullable();
            $table->integer('family_members_studying')->nullable();
            $table->integer('num_of_brothers')->nullable();
            $table->integer('num_of_sisters')->nullable();
            $table->unsignedBigInteger('family_income')->nullable();
            $table->unsignedBigInteger('income_from_other_sources')->nullable();
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
        Schema::dropIfExists('family_infos');
    }
};
