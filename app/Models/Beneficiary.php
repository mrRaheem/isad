<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Beneficiary extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'identity_number',
        'expiration_identity_date',
        'birthdate',
        'marital_status',
        'divorce_date',
        'has_a_divorce_reason',
        'are_there_cases_of_divorce',
        'divorce_reason',
        'have_a_custody_deed',
        'have_a_guardianship_deed_over_the_children',
        'have_a_visitor_deed_for_your_children',
        'marriages',
        'phone',
        'another_phone',
        'have_a_car',
        'nationality',
        'education_level',
        'general_health_condition',
        'experiences_and_skills',
        'desire_to_join_the_labor_market',
        'desire_for_training_courses',
        'want_to_benefit_from_psychological_and_social_counseling',
        'want_to_take_benefits_of_the_financial_support_program',
        'want_to_help_in_a_judicial',
        'name_bank',
        'IBAN_account_number',
        'have_suspended_services',
        'gender',
        'language',
        'time_zone',
    ];

    /**
     * Get the user associated with the Beneficiary
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the beneficiary associated with the Beneficiary
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function beneficiaryEditRequest(): HasOne
    {
        return $this->hasOne(BeneficiariesEditRequest::class);
    }
}
