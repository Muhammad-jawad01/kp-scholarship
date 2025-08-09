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
        // Update applicant_financial_records table
        Schema::table('applicant_financial_records', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id')->nullable()->after('user_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('CASCADE');
        });

        // Update scholarship_assets table
        Schema::table('scholarship_assets', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id')->nullable()->after('user_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('CASCADE');
        });

        // Update scholarship_documents table
        Schema::table('scholarship_documents', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id')->nullable()->after('user_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('CASCADE');
        });

        // Update applicant_educations table
        Schema::table('applicant_educations', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id')->nullable()->after('user_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applicant_financial_records', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropColumn('student_id');
        });

        Schema::table('scholarship_assets', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropColumn('student_id');
        });

        Schema::table('scholarship_documents', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropColumn('student_id');
        });

        Schema::table('applicant_educations', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropColumn('student_id');
        });
    }
};
