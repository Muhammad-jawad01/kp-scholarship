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
        Schema::create('scholarship_application_history', function (Blueprint $table) {
            $table->id();

            // Original application reference
            $table->unsignedBigInteger('original_application_id')->nullable();

            // Student/User Information
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('student_name');
            $table->string('father_name');
            $table->string('nic');
            $table->string('email');
            $table->string('mobile_no');

            // Application Details
            $table->unsignedBigInteger('scholarship_id');
            $table->string('scholarship_name');
            $table->text('scholarship_description')->nullable();
            $table->unsignedInteger('applied_year');
            $table->date('application_date');
            $table->integer('status')->default(1); // 1=pending, 2=approved, 3=rejected

            // University Information
            $table->integer('university_id')->nullable();
            $table->string('university_name')->nullable();
            $table->string('degree')->nullable();

            // Family Information Snapshot
            $table->json('family_info_data')->nullable();

            // Expense Information Snapshot
            $table->json('expense_data')->nullable();

            // Documents Information Snapshot
            $table->json('document_data')->nullable();

            // Additional Tables Snapshots
            $table->json('financial_records_data')->nullable(); // applicant_financial_records
            $table->json('education_records_data')->nullable(); // applicant_educations
            $table->json('scholarship_assets_data')->nullable(); // scholarship_assets
            $table->json('scholarship_documents_data')->nullable(); // scholarship_documents with media files

            // Additional Information
            $table->json('additional_data')->nullable(); // For any extra fields

            // Terms & Conditions
            $table->boolean('terms_conditions')->default(false);

            // Status tracking
            $table->string('submission_ip')->nullable();
            $table->text('admin_notes')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->unsignedBigInteger('processed_by')->nullable(); // Admin who processed

            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->index(['student_id', 'scholarship_id']);
            $table->index('applied_year');
            $table->index('status');
            $table->index('application_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scholarship_application_history');
    }
};
