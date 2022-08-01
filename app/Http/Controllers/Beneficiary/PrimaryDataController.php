<?php

namespace App\Http\Controllers\Beneficiary;

use App\Http\Controllers\Controller;
use App\Models\BeneficiariesEditRequest;
use App\Models\Beneficiary;
use App\Models\User;
use Illuminate\Http\Request;

class PrimaryDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('beneficiary.primarydata');
    }

    // for admin
    public function changerequests()
    {
        $requests = BeneficiariesEditRequest::latest()->get();

        return view('beneficiary.changerequests', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $newdata = BeneficiariesEditRequest::find($id);
        $maindata = $newdata->beneficiary;
        return view('beneficiary.changerequest', compact('maindata', 'newdata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = auth()->user();
        $data = $user->beneficiary->beneficiaryEditRequest ?? $user->beneficiary;

        $reasons = explode(',', $data->divorce_reason);

        return view('beneficiary.primarydata-edit', compact('data', 'reasons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // check if the beneficiary has edit request row int the beneficiary_edit_request table , if so update that row
        // if not, create new edit request row

        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'identity_number' => ['required', 'numeric', 'digits:10'],
            'expiration_identity_date' => ['required', 'date', 'before_or_equal:' . date('Y-m-d')],
            'phone' => ['required', 'numeric', 'digits_between:9,15'],
            'another_phone' => ['required', 'numeric', 'digits_between:9,15'],
            'nationality' => ['required', 'string'],
            'education_level' => ['required', 'string'],
            'birthdate' => ['required', 'date', 'before_or_equal:' . date('Y-m-d')],
            'marital_status' => ['required', 'string'],
            'divorce_date' => ['required', 'date', 'before_or_equal:' . date('Y-m-d')],
            'has_a_divorce_reason' => ['required'],
            'are_there_cases_of_divorce' => ['required'],
            'divorce_reason' => ['required'],
            'marriages' => ['required', 'numeric'],
            'have_a_custody_deed' => ['required'],
            'have_a_guardianship_deed_over_the_children' => ['required'],
            'have_a_visitor_deed_for_your_children' => ['required'],
            'have_a_car' => ['required'],
            'general_health_condition' => ['required'],
            // 'experiences_and_skills' => ['required'],
            'desire_to_join_the_labor_market' => ['required'],
            'desire_for_training_courses' => ['required'],
            'want_to_benefit_from_psychological_and_social_counseling' => ['required'],
            'want_to_take_benefits_of_the_financial_support_program' => ['required'],
            'want_to_help_in_a_judicial' => ['required'],
            'name_bank' => ['required'],
            'IBAN_account_number' => ['required', 'same:full_name'],
            'have_suspended_services' => ['required'],
        ]);

        $data['full_name'] = $request->full_name;
        $data['identity_number'] = $request->identity_number;
        $data['expiration_identity_date'] = $request->expiration_identity_date;
        $data['phone'] = $request->phone;
        $data['another_phone'] = $request->another_phone;
        $data['nationality'] = $request->nationality;
        $data['education_level'] = $request->education_level;
        $data['birthdate'] = $request->birthdate;
        $data['marital_status'] = $request->marital_status;
        $data['divorce_date'] = $request->divorce_date;
        $data['has_a_divorce_reason'] = $request->has_a_divorce_reason;
        $data['are_there_cases_of_divorce'] = $request->are_there_cases_of_divorce;
        $data['divorce_reason'] = implode(',', $request->divorce_reason);
        $data['marriages'] = $request->marriages;
        $data['have_a_custody_deed'] = $request->have_a_custody_deed;
        $data['have_a_guardianship_deed_over_the_children'] = $request->have_a_guardianship_deed_over_the_children;
        $data['have_a_visitor_deed_for_your_children'] = $request->have_a_visitor_deed_for_your_children;
        $data['have_a_car'] = $request->have_a_car;
        $data['general_health_condition'] = $request->general_health_condition;
        $data['desire_to_join_the_labor_market'] = $request->desire_to_join_the_labor_market;
        $data['desire_for_training_courses'] = $request->desire_for_training_courses;
        $data['want_to_benefit_from_psychological_and_social_counseling'] = $request->want_to_benefit_from_psychological_and_social_counseling;
        $data['want_to_take_benefits_of_the_financial_support_program'] = $request->want_to_take_benefits_of_the_financial_support_program;
        $data['want_to_help_in_a_judicial'] = $request->want_to_help_in_a_judicial;
        $data['name_bank'] = $request->name_bank;
        $data['IBAN_account_number'] = $request->IBAN_account_number;
        $data['have_suspended_services'] = $request->have_suspended_services;

        BeneficiariesEditRequest::updateOrCreate(
            ['beneficiary_id' => auth()->user()->beneficiary->id],
            $data
        );

        return redirect()->route('primarydata.index')->with('status', 'Primary Data Update Under Approvement By System Officials');
    }

    public function approveRequest($id)
    {
        // for approvement, update the main beneficiary row with the corsponding row in the beneficiary edit request table
        // after update remove the beneficiary edit request row
        $editRequest = BeneficiariesEditRequest::findOrFail($id);
        $beneficiary = $editRequest->Beneficiary;

        $updated = $beneficiary->update($editRequest->toArray());
        if ($updated) {
            $editRequest->delete();
        }

        return redirect()->route('primarydata.changerequests')->with('status', 'Change Request Approved Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $editRequest = BeneficiariesEditRequest::findOrFail($id);

        $editRequest->delete();
        if (auth()->user()->hasRole('superadmin')) {
            return redirect()->route('primarydata.changerequests')->with('status', 'Change Request Rejected Successfully');
        }
        return redirect()->back()->with('status', 'Change Request deketed Successfully');
    }
}
