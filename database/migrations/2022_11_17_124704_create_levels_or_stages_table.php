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
        Schema::create('levels_or_stages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('competition_sub_category_id');
            $table->string('title');
            $table->boolean('status')->default(1);
            $table->integer('initial');
            $table->timestamps();
            
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
        Schema::dropIfExists('levels_or_stages');
    }
};
