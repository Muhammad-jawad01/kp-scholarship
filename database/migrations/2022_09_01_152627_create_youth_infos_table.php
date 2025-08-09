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
        Schema::create('youth_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender');
            $table->string('nic')->unique();
            $table->unsignedBigInteger('domicile_district_id');
            $table->string('mobile_no')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('image_path')->default('user.jpg');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('domicile_district_id')->references('id')->on('districts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('youth_infos');
    }
};
