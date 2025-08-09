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
        Schema::table('users', function (Blueprint $table) {
            $table->string('father_name')->nullable()->after('name');
            $table->string('guardian_name')->nullable()->after('father_name');
            $table->string('marital_status')->nullable()->after('guardian_name');
            $table->string('nationality')->nullable()->after('mobile_no');
            $table->string('domicile')->nullable()->after('nationality');
            $table->string('tehsil')->nullable()->after('domicile');
            $table->string('address')->nullable()->after('tehsil');
            $table->string('university_name')->nullable()->after('tehsil');
            $table->string('degree')->nullable();
            $table->string('campus')->nullable();
            $table->string('discipline')->nullable();
            $table->string('sub_discipline')->nullable();
            $table->string('university_reg_no')->nullable();
            $table->integer('program_duration')->nullable();
            $table->string('current_semester')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
