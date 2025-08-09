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
        Schema::create('universities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('district_id');
            $table->string('name')->unique();
            $table->string('organized_by');
            $table->string('address');
            $table->string('phone')->unique();
            $table->string('prospectus_path');
            $table->boolean('is_deleted')->default(0);
            $table->timestamps();
            $table->foreign('district_id')->references('id')->on('districts');
   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('universities');
    }
};
