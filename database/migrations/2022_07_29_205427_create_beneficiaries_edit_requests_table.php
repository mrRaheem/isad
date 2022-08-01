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
        Schema::create('beneficiaries_edit_requests', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', '255');
            $table->bigInteger('identity_number');
            $table->dateTime('expiration_identity_date')->useCurrent();
            $table->dateTime('birthdate')->useCurrent();
            $table->string('marital_status')->nullable();
            $table->dateTime('divorce_date')->useCurrent();
            $table->boolean('has_a_divorce_reason')->nullable();
            $table->boolean('are_there_cases_of_divorce')->nullable();
            $table->text('divorce_reason')->nullable();
            $table->boolean('have_a_custody_deed')->nullable();
            $table->boolean('have_a_guardianship_deed_over_the_children')->nullable();
            $table->boolean('have_a_visitor_deed_for_your_children')->nullable();
            $table->integer('marriages')->nullable();
            $table->integer('phone');
            $table->integer('another_phone')->nullable();
            $table->boolean('have_a_car')->nullable();
            $table->string('nationality')->nullable();
            $table->string('education_level')->nullable();
            $table->string('general_health_condition')->nullable();
            $table->text('experiences_and_skills')->nullable();
            $table->boolean('desire_to_join_the_labor_market')->nullable();
            $table->boolean('desire_for_training_courses')->nullable();
            $table->boolean('want_to_benefit_from_psychological_and_social_counseling')->nullable();
            $table->boolean('want_to_take_benefits_of_the_financial_support_program')->nullable();
            $table->boolean('want_to_help_in_a_judicial')->nullable();
            $table->string('name_bank')->nullable();
            $table->string('IBAN_account_number')->nullable();
            $table->boolean('have_suspended_services')->nullable();
            $table->string('gender')->nullable();
            $table->string('language')->default('Arabic');
            $table->string('time_zone')->nullable();
            $table->foreignId('beneficiary_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beneficiaries_edit_requests');
    }
};
