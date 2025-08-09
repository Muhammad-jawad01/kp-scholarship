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
        Schema::table('students', function (Blueprint $table) {
            // University and Academic Information
            $table->unsignedBigInteger('university_id')->nullable()->after('name');
            $table->string('degree')->nullable()->after('university_id');
            $table->string('campus')->nullable()->after('degree');
            $table->string('discipline')->nullable()->after('campus');
            $table->string('sub_discipline')->nullable()->after('discipline');
            $table->string('university_reg_no')->nullable()->after('sub_discipline');
            $table->string('program_duration')->nullable()->after('university_reg_no');
            $table->string('current_semester')->nullable()->after('program_duration');

            // Personal Information
            $table->string('guardian_name')->nullable()->after('father_name');
            $table->integer('age')->nullable()->after('date_of_birth');
            $table->string('marital_status')->nullable()->after('age');
            $table->string('nic')->nullable()->after('cnic');  // Different from cnic
            $table->string('nationality')->default('Pakistani')->after('marital_status');
            $table->string('tehsil')->nullable()->after('domicile_district_id');

            // Foreign key constraint
            $table->foreign('university_id')->references('id')->on('universities')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            // Drop foreign key first
            $table->dropForeign(['university_id']);

            // Drop all added columns
            $table->dropColumn([
                'university_id',
                'degree',
                'campus',
                'discipline',
                'sub_discipline',
                'university_reg_no',
                'program_duration',
                'current_semester',
                'guardian_name',
                'age',
                'marital_status',
                'nic',
                'nationality',
                'tehsil'
            ]);

            // Revert gender back to enum
            $table->enum('gender', ['male', 'female', 'other'])->nullable()->change();
        });
    }
};
