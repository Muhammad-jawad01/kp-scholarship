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
        Schema::table('scholarships', function (Blueprint $table) {
            // Education requirements
            $table->boolean('requires_education_documents')->default(true);
            $table->json('required_education_levels')->nullable(); // ['matriculation', 'intermediate', 'bachelor', 'master']
            $table->decimal('minimum_percentage', 5, 2)->nullable();

            // Document requirements
            $table->boolean('requires_profile_document')->default(true);
            $table->boolean('requires_cnic')->default(true);
            $table->boolean('requires_domicile')->default(false);
            $table->boolean('requires_income_certificate')->default(false);
            $table->boolean('requires_electricity_bill')->default(false);
            $table->boolean('requires_gas_bill')->default(false);
            $table->boolean('requires_telephone_bill')->default(false);
            $table->json('additional_documents')->nullable(); // For custom document requirements

            // Financial requirements
            $table->boolean('requires_financial_details')->default(true);
            $table->decimal('maximum_family_income', 10, 2)->nullable();
            $table->boolean('requires_asset_details')->default(false);

            // Eligibility criteria
            $table->integer('minimum_age')->nullable();
            $table->integer('maximum_age')->nullable();
            $table->json('eligible_districts')->nullable(); // Array of district IDs
            $table->enum('gender_eligibility', ['male', 'female', 'both'])->default('both');

            // Application settings
            $table->date('application_start_date')->nullable();
            $table->date('application_end_date')->nullable();
            $table->boolean('requires_signature')->default(true);
            $table->boolean('requires_guardian_signature')->default(false);
            $table->text('terms_and_conditions')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scholarships', function (Blueprint $table) {
            $table->dropColumn([
                'requires_education_documents',
                'required_education_levels',
                'minimum_percentage',
                'requires_profile_document',
                'requires_cnic',
                'requires_domicile',
                'requires_income_certificate',
                'requires_electricity_bill',
                'requires_gas_bill',
                'requires_telephone_bill',
                'additional_documents',
                'requires_financial_details',
                'maximum_family_income',
                'requires_asset_details',
                'minimum_age',
                'maximum_age',
                'eligible_districts',
                'gender_eligibility',
                'application_start_date',
                'application_end_date',
                'requires_signature',
                'requires_guardian_signature',
                'terms_and_conditions'
            ]);
        });
    }
};
