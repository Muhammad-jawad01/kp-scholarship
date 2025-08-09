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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('per_month_edu_expenditure');
            $table->string('total_monthly_income');
          
            $table->string('accommodation_type');
            $table->string('house_structure');
            $table->string('house_status')->nullable();
            $table->integer('num_rooms')->nullable();
            $table->integer('home_size')->nullable();
            $table->integer('covered_area')->nullable();
            $table->integer('num_air_conditioners')->nullable();
            $table->integer('num_servants')->nullable();
            $table->integer('monthly_rent')->nullable();
            $table->text('address')->nullable();
            $table->boolean('other_house_owned')->nullable();
            $table->text('other_house_details')->nullable();

            $table->string('average_telephone_bill_six_months')->nullable();
            $table->string('average_electricity_bill_six_months')->nullable();
            $table->string('average_gas_bill_six_months')->nullable();
            $table->string('average_water_bill_six_months')->nullable();
            $table->string('average_mobile_bill_six_months')->nullable();
            $table->string('average_educational_expenditure_siblings')->nullable();
            $table->string('average_educational_expenditure_applicant')->nullable();
            $table->string('average_kitchen_expenditure')->nullable();
            $table->string('average_medical_expenditure')->nullable();
            $table->string('accommodation_expenditure_case_rent')->nullable();
            $table->string('average_family_misc_expenditure')->nullable();
            $table->string('family_own_transport')->nullable();
            $table->string('family_own_cattle')->nullable();
            $table->string('detail_assets_lease')->nullable();
            $table->string('admission_first_semester_charges')->nullable();
            $table->string('KPEF_merit_Needsbased_scholarships_program')->nullable();
            $table->string('statement_purpose')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
};
