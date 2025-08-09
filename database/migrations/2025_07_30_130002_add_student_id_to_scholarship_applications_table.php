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
        Schema::table('scholarship_applications', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id')->nullable()->after('user_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('CASCADE');
            $table->datetime('application_date')->nullable();

            // Change existing status column from integer to enum
            $table->dropColumn('status');
        });

        // Add the new status column
        Schema::table('scholarship_applications', function (Blueprint $table) {
            $table->enum('status', ['pending', 'approved', 'rejected', 'under_review'])->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scholarship_applications', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropColumn(['student_id', 'application_date']);
            $table->dropColumn('status');
        });

        // Restore original integer status column
        Schema::table('scholarship_applications', function (Blueprint $table) {
            $table->integer('status')->nullable();
        });
    }
};
