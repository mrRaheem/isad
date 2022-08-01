<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('primarydata.index')}}">
                <i class="fa-solid fa-arrow-left text-blue-600"></i>
            </a>
            {{ __('Primary Data') }}
            {{-- <a href="" class="p-2 px-3 rounded-full bg-gray-200 border border-blue-400 shadow-lg">
                <i class="fa-solid fa-pencil text-blue-600"></i> --}}
            </a>
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('primarydata.update') }}" x-data="{ privacy: false }">
        @csrf
        @method('put')

        <div class="sticky right-10 top-5 flex justify-end mr-16 mb-2 mt-20  z-10">
            <button type="submit"
                class="p-7 pl-10 px-3  rounded-bl-full bg-gray-200  border-r-0 border-2 border-green-600 shadow-2xl"
                title="Edit Personal Information">
                <i class="fa-solid fa-pencil text-blue-600 text-xl"></i>
            </button>
        </div>
        <div class="py-12 -mt-36">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 relative">

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        {{-- <div class="absolute right-0 top-2">
                            <a href="{{route('personal.edit')}}"
                                class="p-5 pl-10 px-3  rounded-bl-full bg-gray-200  border-r-0 border-2 border-green-600 shadow-2xl"
                                title="Edit Personal Information">
                                <i class="fa-solid fa-pencil text-blue-600 text-xl"></i>
                            </a>
                        </div> --}}

                        <div class="">
                            <div class="flex items-center">
                                <span class="w-1/4 font-bold">Full Name</span>
                                <x-input id="name" class="block  w-1/2" type="text" name="full_name"
                                    :value="old('full_name', $data->full_name)" required placeholder="Name...." />

                            </div>

                            <div class="flex mt-5">
                                <div class="flex items-center w-1/2">
                                    <span class="font-bold w-1/2">Identity number</span>
                                    <x-input id="identity_number" class="block" type="number" name="identity_number"
                                        minlength="10" maxlength="10"
                                        :value="old('identity_number', $data->identity_number)" required
                                        placeholder="899-231-3301" />

                                </div>
                                <div class="flex items-center w-1/2">
                                    <span class="font-bold w-1/2">Expiration identity date</span>
                                    <x-input id="expiration_identity_date" class="block " type="date"
                                        name="expiration_identity_date" :value="old('expiration_identity_date', Carbon\Carbon::parse(
                                        $data->expiration_identity_date)->format('Y-m-d') )" required />

                                </div>
                            </div>

                            <div class="flex mt-5">
                                <div class="flex items-center w-1/2">
                                    <span class="w-1/2 font-bold">Phone</span>
                                    <x-input id="phone" class="block" type="number" name="phone" minlength="10"
                                        maxlength="10" :value="old('phone', $data->phone)" required
                                        placeholder="899-231-3301" />
                                </div>
                                <div class="flex items-center w-1/2">
                                    <span class="w-1/2 font-bold">Another phone</span>
                                    <x-input id="another_phone" class="block w-1/2" type="number" name="another_phone"
                                        minlength="10" maxlength="10"
                                        :value="old('another_phone', $data->another_phone)" required
                                        placeholder="899-231-3301" />

                                </div>
                            </div>

                            <div class="flex mt-5">
                                <div class="flex items-center w-1/2">
                                    <span class="w-1/2 font-bold">Nationality</span>
                                    <x-input list="nationality" name="nationality" class="block" type="text" required
                                        :value="old('nationality', $data->nationality)"
                                        placeholder="search your country..." />
                                    <datalist id="nationality">
                                        <option value="Saudi Arabia">
                                        <option value="Yemen">
                                        <option value="Kwait">
                                        <option value="Bahrain">
                                        <option value="Emerates">
                                    </datalist>
                                    {{-- <span>{{$data->nationality}}</span> --}}
                                </div>
                                <div class="flex items-center w-1/2">
                                    <span class="w-1/2  font-bold">Education level</span>
                                    <select name="education_level" id="education_level"
                                        class="block border-gray-300 rounded-md w-1/2" required>
                                        <option value="">Choose your level</option>
                                        <option value="Did not reach school age" {{old('education_level', $data->
                                            education_level)=='Did not reach school age' ? 'selected' : '' }}>
                                            Did not reach school age</option>
                                        <option value="primary" {{old('education_level', $data->
                                            education_level)=='primary' ? 'selected' : ''
                                            }}>primary</option>
                                        <option value="Intermediate" {{old('education_level', $data->
                                            education_level)=='Intermediate'
                                            ? 'selected' : '' }}>Intermediate</option>
                                        <option value="high school" {{old('education_level', $data->
                                            education_level)=='high school' ? 'selected'
                                            : '' }}>high school</option>
                                        <option value="university" {{old('education_level', $data->
                                            education_level)=='university' ? 'selected'
                                            : '' }}>university</option>
                                        <option value="Postgraduate" {{old('education_level', $data->
                                            education_level)=='Postgraduate'
                                            ? 'selected' : '' }}>Postgraduate</option>
                                        <option value="Uneducated" {{old('education_level', $data->
                                            education_level)=='Uneducated' ? 'selected'
                                            : '' }}>
                                            Uneducated</option>
                                    </select>
                                </div>
                            </div>

                            <div class="flex mt-5">
                                <div class="flex items-center w-1/2">
                                    <span class="w-1/2 font-bold">Birthdate</span>
                                    <x-input id="birthdate" class="block" type="date" name="birthdate" :value="old('birthdate', Carbon\Carbon::parse(
                                        $data->birthdate)->format('Y-m-d') )" required />

                                </div>
                                <div class="flex items-center w-1/2">
                                    <span class="w-1/2 font-bold">Marital status</span>
                                    <select name="marital_status" id="marital_status"
                                        class="block border-gray-300 rounded-md w-1/2" required>
                                        <option value="">Choose your Status</option>
                                        <option value="Widow" {{old('marital_status', $data->marital_status)=='Widow' ?
                                            'selected' : '' }}>
                                            Widow</option>
                                        <option value="divorced" {{old('marital_status', $data->
                                            marital_status)=='divorced' ? 'selected' : ''
                                            }}>divorced</option>
                                        <option value="deserted" {{old('marital_status', $data->
                                            marital_status)=='deserted' ? 'selected' : ''
                                            }}>deserted</option>
                                        <option value="married" {{old('marital_status', $data->
                                            marital_status)=='married' ? 'selected' : '' }}>
                                            married</option>
                                        <option value="Disabled husband" {{old('marital_status', $data->
                                            marital_status)=='Disabled husband'
                                            ? 'selected' : '' }}>Disabled husband</option>
                                    </select>

                                </div>
                            </div>

                            {{-- *************************************************** --}}
                            <h2 class="mt-10 text-lg font-bold text-blue-500">Divorce</h2>

                            <div class="flex mt-5">
                                <div class="flex items-center w-1/2">
                                    <span class="w-1/2 font-bold">
                                        <span class="mr-0.5">- </span>
                                        Divorce date</span>
                                    <x-input id="divorce_date" class="block " type="date" name="divorce_date" :value="old('divorce_date', Carbon\Carbon::parse(
                                            $data->divorce_date)->format('Y-m-d') )" required />

                                </div>
                                <div class="flex items-center w-1/2">
                                    <span class="w-1/2 font-bold">Has a divorce
                                        reason?</span>
                                    <div class="flex gap-x-5 w-1/2">
                                        <div class="">
                                            <input id="has_a_divorce_reason" class="border-gray-400" type="radio"
                                                name="has_a_divorce_reason" value="1" {{old('has_a_divorce_reason'
                                                ,$data->has_a_divorce_reason)
                                            ? 'checked' : '' }} required />
                                            <span class="text-green-500">True</span>
                                        </div>
                                        <div>
                                            <input id="has_a_divorce_reason" class="border-gray-400" type="radio"
                                                name="has_a_divorce_reason" value="0" {{
                                                old('has_a_divorce_reason',$data->has_a_divorce_reason)
                                            =="0"
                                            ? 'checked' : '' }} required />
                                            <span class="text-red-500">False</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex mt-5">
                                <span class="w-1/4 font-bold">
                                    <div class="flex">
                                        <span class="mr-1">- </span>
                                        <span>
                                            Are there cases of divorce in your family?
                                        </span>
                                    </div>
                                </span>
                                <div class="flex gap-x-5 w-1/2">
                                    <div class="">
                                        <input id="are_there_cases_of_divorce" class="border-gray-400" type="radio"
                                            name="are_there_cases_of_divorce" value="1"
                                            {{old('are_there_cases_of_divorce' ,$data->are_there_cases_of_divorce)
                                        ? 'checked' : '' }} required />
                                        <span class="text-green-500">True</span>
                                    </div>
                                    <div>
                                        <input id="are_there_cases_of_divorce" class="border-gray-400" type="radio"
                                            name="are_there_cases_of_divorce" value="0" {{
                                            old('are_there_cases_of_divorce',$data->are_there_cases_of_divorce)
                                        =="0"
                                        ? 'checked' : '' }} required />
                                        <span class="text-red-500">False</span>

                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center mt-5">
                                <span class="w-1/4 font-bold">
                                    <div class="flex">
                                        <span class="mr-1">- </span>
                                        <span>
                                            Divorce reason
                                        </span>
                                    </div>
                                </span>
                                <div>
                                    <ul>
                                        <li class="flex items-center gap-x-2">
                                            <input id="divorce_reason" class="border-gray-400 rounded-sm "
                                                type="checkbox" name="divorce_reason[]" value="A lot of problems" {{
                                                array_search('A lot of problems', old(' divorce_reason',$reasons))
                                                !==false ? 'checked' : '' }} />
                                            <span>A lot of problems</span>
                                        </li>
                                        <li class="flex items-center gap-x-2">
                                            <input id="divorce_reason" class="border-gray-400 rounded-sm "
                                                type="checkbox" name="divorce_reason[]" value="financial matters" {{
                                                array_search('financial matters', old(' divorce_reason',$reasons))
                                                !==false ? 'checked' : '' }} />
                                            <span>financial matters</span>
                                        </li>
                                        <li class="flex items-center gap-x-2">
                                            <input id="divorce_reason" class="border-gray-400 rounded-sm "
                                                type="checkbox" name="divorce_reason[]" value="family intervention" {{
                                                array_search('family intervention', old('divorce_reason',$reasons))
                                                !==false ? 'checked' : '' }} />
                                            <span>family intervention</span>
                                        </li>
                                        <li class="flex items-center gap-x-2">
                                            <input id="divorce_reason" class="border-gray-400 rounded-sm "
                                                type="checkbox" name="divorce_reason[]" value="violence and abuse" {{
                                                array_search('violence and abuse', old('divorce_reason',$reasons))
                                                !==false ? 'checked' : '' }} />
                                            <span>violence and abuse</span>
                                        </li>
                                        <li class="flex items-center gap-x-2">
                                            <input id="divorce_reason" class="border-gray-400 rounded-sm "
                                                type="checkbox" name="divorce_reason[]" value="another" {{
                                                array_search('another', old('divorce_reason',$reasons)) !==false
                                                ? 'checked' : '' }} />
                                            <span>another</span>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                            <div class="flex mt-5">
                                <span class="w-1/4 items-center font-bold">
                                    <div class="flex pr-2">
                                        <span class="mr-1">- </span>
                                        <span>
                                            number of
                                            marriages
                                        </span>
                                    </div>
                                </span>
                                <x-input id="marriages" class="block" type="number" name="marriages" min="1" max="6"
                                    :value="old('marriages', $data->marriages)" required />
                            </div>

                            {{-- ******************************************************** --}}
                            <h2 class="mt-10 text-lg font-bold text-blue-500">Deed & Children</h2>

                            <div class="flex mt-5">
                                <span class="w-1/4 font-bold">
                                    <div class="flex">
                                        <span class="mr-1">- </span>
                                        <span>
                                            Do you have a
                                            custody deed?
                                        </span>
                                    </div>
                                </span>
                                <div class="flex gap-x-5 w-1/2">
                                    <div class="">
                                        <input id="have_a_custody_deed" class="border-gray-400" type="radio"
                                            name="have_a_custody_deed" value="1" {{old('have_a_custody_deed'
                                            ,$data->have_a_custody_deed)
                                        ? 'checked' : '' }} required />
                                        <span class="text-green-500">True</span>
                                    </div>
                                    <div>
                                        <input id="have_a_custody_deed" class="border-gray-400" type="radio"
                                            name="have_a_custody_deed" value="0" {{
                                            old('have_a_custody_deed',$data->have_a_custody_deed)
                                        =="0"
                                        ? 'checked' : '' }} required />
                                        <span class="text-red-500">False</span>
                                    </div>
                                </div>

                            </div>
                            <div class="flex mt-5">
                                <span class="w-1/4 font-bold">
                                    <div class="flex">
                                        <span class="mr-1">- </span>
                                        <span>Do you have a
                                            guardianship deed
                                            over the children?</span>
                                    </div>
                                </span>
                                <div class="flex gap-x-5 w-1/2">
                                    <div class="">
                                        <input id="have_a_guardianship_deed_over_the_children" class="border-gray-400"
                                            type="radio" name="have_a_guardianship_deed_over_the_children" value="1"
                                            {{old('have_a_guardianship_deed_over_the_children'
                                            ,$data->have_a_guardianship_deed_over_the_children)
                                        ? 'checked' : '' }} required />
                                        <span class="text-green-500">True</span>
                                    </div>
                                    <div>
                                        <input id="have_a_guardianship_deed_over_the_children" class="border-gray-400"
                                            type="radio" name="have_a_guardianship_deed_over_the_children" value="0" {{
                                            old('have_a_guardianship_deed_over_the_children',$data->have_a_guardianship_deed_over_the_children)
                                        =="0"
                                        ? 'checked' : '' }} required />
                                        <span class="text-red-500">False</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex mt-5">
                                <span class="w-1/4 font-bold">
                                    <div class="flex pr-2">
                                        <span class="mr-1">- </span>
                                        <span>
                                            Do you have a
                                            visitor's deed for
                                            your children?
                                        </span>
                                    </div>
                                </span>
                                <div class="flex gap-x-5 w-1/2">
                                    <div class="">
                                        <input id="have_a_visitor_deed_for_your_children" class="border-gray-400"
                                            type="radio" name="have_a_visitor_deed_for_your_children" value="1"
                                            {{old('have_a_visitor_deed_for_your_children'
                                            ,$data->have_a_visitor_deed_for_your_children)
                                        ? 'checked' : '' }} required />
                                        <span class="text-green-500">True</span>
                                    </div>
                                    <div>
                                        <input id="have_a_visitor_deed_for_your_children" class="border-gray-400"
                                            type="radio" name="have_a_visitor_deed_for_your_children" value="0" {{
                                            old('have_a_visitor_deed_for_your_children',$data->have_a_visitor_deed_for_your_children)
                                        =="0"
                                        ? 'checked' : '' }} required />
                                        <span class="text-red-500">False</span>
                                    </div>
                                </div>

                            </div>
                            <div class="flex items-center mt-5">
                                <span class="w-1/4 font-bold">
                                    <div class="flex pr-2">
                                        <span class="mr-1">- </span>
                                        <span>
                                            Do you have a
                                            car?
                                        </span>
                                    </div>
                                </span>
                                <div class="flex gap-x-5 w-1/2">
                                    <div class="">
                                        <input id="have_a_car" class="border-gray-400" type="radio" name="have_a_car"
                                            value="1" {{old('have_a_car' ,$data->have_a_car)
                                        ? 'checked' : '' }} required />
                                        <span class="text-green-500">True</span>
                                    </div>
                                    <div>
                                        <input id="have_a_car" class="border-gray-400" type="radio" name="have_a_car"
                                            value="0" {{ old('have_a_car',$data->have_a_car)
                                        =="0"
                                        ? 'checked' : '' }} required />
                                        <span class="text-red-500">False</span>
                                    </div>
                                </div>

                            </div>

                            {{-- (((((((((((((((((((((((()))))))))))))))))))))))) --}}
                            <h2 class="mt-10 text-lg font-bold text-blue-500">Health & Experiences and Desires</h2>

                            <div class="flex mt-3">
                                <span class="w-1/2 pr-20 font-bold">
                                    <div class="flex">
                                        <span class="mr-1">- </span>
                                        <span>
                                            General health
                                            condition
                                        </span>
                                    </div>
                                </span>
                                <select name="general_health_condition" id="general_health_condition"
                                    class="block border-gray-300 rounded-md w-1/2" required>
                                    <option value="">Choose your Status</option>
                                    <option value="healthy health" {{old('general_health_condition',$data->
                                        general_health_condition)=='healthy health'
                                        ? 'selected' : '' }}>
                                        healthy health</option>
                                    <option value="disabled" {{old('general_health_condition',$data->
                                        general_health_condition)=='disabled' ? 'selected'
                                        : '' }}>disabled</option>
                                    <option value="afflicted with cancer" {{old('general_health_condition',$data->
                                        general_health_condition)=='afflicted with cancer' ? 'selected' : '' }}>
                                        afflicted with cancer</option>
                                    <option value="Renal failure" {{old('general_health_condition',$data->
                                        general_health_condition)=='Renal failure'
                                        ? 'selected' : '' }}>
                                        Renal failure</option>
                                </select>
                            </div>
                            <div class="flex items-center mt-5">
                                <span class="w-1/2 pr-20 font-bold">
                                    <div class="flex">
                                        <span class="mr-1">- </span>
                                        <span>
                                            Experiences and
                                            Skills
                                        </span>
                                    </div>
                                </span>
                                <textarea name="experiences_and_skills" id="experiences_and_skills"
                                    class="block border-gray-300 rounded-md w-1/2" rows="3"
                                    placeholder="Type here Experiences and Skills...."></textarea>
                            </div>

                            <div class="flex mt-5">
                                <span class="w-1/2 pr-20 font-bold">
                                    <div class="flex">
                                        <span class="mr-1">- </span>
                                        <span>
                                            Do you have a
                                            desire to join the
                                            labor market?
                                        </span>
                                    </div>
                                </span>
                                <div class="flex gap-x-5 ">
                                    <div class="">
                                        <input id="desire_to_join_the_labor_market" class="border-gray-400" type="radio"
                                            name="desire_to_join_the_labor_market" value="1"
                                            {{old('desire_to_join_the_labor_market'
                                            ,$data->desire_to_join_the_labor_market)
                                        ? 'checked' : '' }} required />
                                        <span class="text-green-500">True</span>
                                    </div>
                                    <div>
                                        <input id="desire_to_join_the_labor_market" class="border-gray-400" type="radio"
                                            name="desire_to_join_the_labor_market" value="0" {{
                                            old('desire_to_join_the_labor_market',$data->desire_to_join_the_labor_market)
                                        =="0"
                                        ? 'checked' : '' }} required />
                                        <span class="text-red-500">False</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex mt-5">
                                <span class="w-1/2 pr-20 font-bold">
                                    <div class="flex">
                                        <span class="mr-1">- </span>
                                        <span>Do you have a
                                            desire for training
                                            courses to help you join the labor
                                            market?</span>
                                    </div>
                                </span>
                                <div class="flex gap-x-5 ">
                                    <div class="">
                                        <input id="desire_for_training_courses" class="border-gray-400" type="radio"
                                            name="desire_for_training_courses" value="1"
                                            {{old('desire_for_training_courses' ,$data->desire_for_training_courses)
                                        ? 'checked' : '' }} required />
                                        <span class="text-green-500">True</span>
                                    </div>
                                    <div>
                                        <input id="desire_for_training_courses" class="border-gray-400" type="radio"
                                            name="desire_for_training_courses" value="0" {{
                                            old('desire_for_training_courses',$data->desire_for_training_courses)
                                        =="0"
                                        ? 'checked' : '' }} required />
                                        <span class="text-red-500">False</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex mt-5">
                                <span class="w-1/2 pr-20 font-bold">
                                    <div class="flex pr-2">
                                        <span class="mr-1">- </span>
                                        <span>
                                            Do you want to
                                            benefit from
                                            psychological and
                                            social counseling?
                                        </span>
                                    </div>
                                </span>
                                <div class="flex gap-x-5 ">
                                    <div class="">
                                        <input id="want_to_benefit_from_psychological_and_social_counseling"
                                            class="border-gray-400" type="radio"
                                            name="want_to_benefit_from_psychological_and_social_counseling" value="1"
                                            {{old('want_to_benefit_from_psychological_and_social_counseling'
                                            ,$data->want_to_benefit_from_psychological_and_social_counseling)
                                        ? 'checked' : '' }} required />
                                        <span class="text-green-500">True</span>
                                    </div>
                                    <div>
                                        <input id="want_to_benefit_from_psychological_and_social_counseling"
                                            class="border-gray-400" type="radio"
                                            name="want_to_benefit_from_psychological_and_social_counseling" value="0" {{
                                            old('want_to_benefit_from_psychological_and_social_counseling',$data->want_to_benefit_from_psychological_and_social_counseling)
                                        =="0"
                                        ? 'checked' : '' }} required />
                                        <span class="text-red-500">False</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex mt-5">
                                <span class="w-1/2 pr-20 font-bold">
                                    <div class="flex pr-2">
                                        <span class="mr-1">- </span>
                                        <span>
                                            Do you want to
                                            take benefits of
                                            the financial
                                            support program?
                                        </span>
                                    </div>
                                </span>
                                <div class="flex gap-x-5 ">
                                    <div class="">
                                        <input id="want_to_take_benefits_of_the_financial_support_program"
                                            class="border-gray-400" type="radio"
                                            name="want_to_take_benefits_of_the_financial_support_program" value="1"
                                            {{old('want_to_take_benefits_of_the_financial_support_program'
                                            ,$data->want_to_take_benefits_of_the_financial_support_program)
                                        ? 'checked' : '' }} required />
                                        <span class="text-green-500">True</span>
                                    </div>
                                    <div>
                                        <input id="want_to_take_benefits_of_the_financial_support_program"
                                            class="border-gray-400" type="radio"
                                            name="want_to_take_benefits_of_the_financial_support_program" value="0" {{
                                            old('want_to_take_benefits_of_the_financial_support_program',$data->want_to_take_benefits_of_the_financial_support_program)
                                        =="0"
                                        ? 'checked' : '' }} required />
                                        <span class="text-red-500">False</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex mt-5">
                                <span class="w-1/2 pr-20 font-bold">
                                    <div class="flex pr-2">
                                        <span class="mr-1">- </span>
                                        <span>
                                            Do you want to
                                            help in a judicial
                                            or legal case for
                                            you or your
                                            children?
                                        </span>
                                    </div>
                                </span>
                                <div class="flex gap-x-5 ">
                                    <div class="">
                                        <input id="want_to_help_in_a_judicial" class="border-gray-400" type="radio"
                                            name="want_to_help_in_a_judicial" value="1"
                                            {{old('want_to_help_in_a_judicial' ,$data->want_to_help_in_a_judicial)
                                        ? 'checked' : '' }} required />
                                        <span class="text-green-500">True</span>
                                    </div>
                                    <div>
                                        <input id="want_to_help_in_a_judicial" class="border-gray-400" type="radio"
                                            name="want_to_help_in_a_judicial" value="0" {{
                                            old('want_to_help_in_a_judicial',$data->want_to_help_in_a_judicial)
                                        =="0"
                                        ? 'checked' : '' }} required />
                                        <span class="text-red-500">False</span>
                                    </div>
                                </div>
                            </div>

                            {{-- ******************************************************** --}}
                            <h2 class="mt-10 text-lg font-bold text-blue-500">Banking</h2>

                            <div class="flex mt-5">
                                <span class="w-1/4 font-bold">
                                    <div class="flex">
                                        <span class="mr-1">- </span>
                                        <span>
                                            The name of your
                                            bank
                                        </span>
                                    </div>
                                </span>
                                <x-input id="name_bank" class="block  w-1/2" type="text" name="name_bank"
                                    :value="old('name_bank', $data->name_bank)" required placeholder="Bank Name...." />

                            </div>

                            <div class="flex mt-5">
                                <span class="w-1/4 font-bold">
                                    <div class="flex">
                                        <span class="mr-1">- </span>
                                        <span>
                                            IBAN account
                                            number
                                        </span>
                                    </div>
                                </span>
                                <x-input id="IBAN_account_number" class="block  w-1/2" type="text"
                                    name="IBAN_account_number"
                                    :value="old('IBAN_account_number', $data->IBAN_account_number)" required
                                    placeholder="IBAN Bank Account...." />

                            </div>

                            <div class="flex mt-5">
                                <span class="w-1/4 font-bold">
                                    <div class="flex">
                                        <span class="mr-1">- </span>
                                        <span>
                                            Do you have
                                            suspended
                                            services?
                                        </span>
                                    </div>
                                </span>
                                <div class="flex gap-x-5 ">
                                    <div class="">
                                        <input id="have_suspended_services" class="border-gray-400" type="radio"
                                            name="have_suspended_services" value="1" {{old('have_suspended_services'
                                            ,$data->have_suspended_services)
                                        ? 'checked' : '' }} required />
                                        <span class="text-green-500">True</span>
                                    </div>
                                    <div>
                                        <input id="have_suspended_services" class="border-gray-400" type="radio"
                                            name="have_suspended_services" value="0" {{
                                            old('have_suspended_services',$data->have_suspended_services)
                                        =="0"
                                        ? 'checked' : '' }} required />
                                        <span class="text-red-500">False</span>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="flex items-center justify-end mt-4 mb-2 mr-10">
                        <button class=" bg-blue-800 hover:bg-blue-500 p-2 px-4 rounded-md text-white" type="submit">
                            {{ __('Edit') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <script>
        // document.getElementById('expiration_identity_date').valueAsDate = new Date();
    </script>
</x-app-layout>
