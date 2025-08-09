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
        Schema::create('competition_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('competition_category_id');
            $table->string('title');
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('competition_category_id')->references('id')->on('competition_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competition_sub_categories');
    }
};
