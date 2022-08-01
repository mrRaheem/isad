<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center gap-x-4">
            <div>
                {{ __('Primary Data') }}
                @if (Auth::user()->beneficiary->beneficiaryEditRequest)

                <div class="flex items-center gap-1">
                    <span class="text-xs text-red-600">!Waiting for approved</span>
                    <a href=""
                        onclick="event.preventDefault();
                                                                            if(confirm('Are you sure to delete this changement request')){ document.getElementById('elelment').submit();} else {return false;}"
                        class="text-xs ">
                        <i class="fas fa-trash text-red-600 "></i>

                    </a>
                    <form id="elelment"
                        action="{{route('primarydata.destroy', Auth::user()->beneficiary->beneficiaryEditRequest->id)}}"
                        method="POST" class="hidden">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
                @endif
            </div>
            @if (Auth::user()->beneficiary->beneficiaryEditRequest)
            <a href="" class="p-2 px-3 rounded-full bg-gray-200 border border-red-400 shadow-lg">
                <i class="fa-solid fa-clock text-yellow-600"></i>
            </a>
            @endif
        </h2>
    </x-slot>

    <div class="sticky right-10 top-20 flex justify-end mr-16 mb-2 mt-20  z-10">
        <a href="{{route('primarydata.edit')}}"
            class="p-7 pl-10 px-3  rounded-bl-full bg-gray-200  border-r-0 border-2 border-green-600 shadow-2xl"
            title="Edit Personal Information">
            <i class="fa-solid fa-pencil text-blue-600 text-xl"></i>
        </a>
    </div>
    <div class="py-12 -mt-36">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 relative">

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    {{-- <div class="absolute right-0 top-2">
                        <a href="{{route('personal.edit')}}"
                            class="p-5 pl-10 px-3  rounded-bl-full bg-gray-200  border-r-0 border-2 border-green-600 shadow-2xl"
                            title="Edit Personal Information">
                            <i class="fa-solid fa-pencil text-blue-600 text-xl"></i>
                        </a>
                    </div> --}}

                    <div class="">
                        <div class="flex ">
                            <span class="w-1/4 font-bold">Full Name</span>
                            <span class="text-green-500 text-lg">{{auth()->user()->beneficiary->full_name}}</span>
                        </div>

                        <div class="flex mt-3">
                            <div class="flex w-1/2">
                                <span class="font-bold w-1/2">Identity number</span>
                                <span>{{auth()->user()->beneficiary->identity_number}}</span>
                            </div>
                            <div class="flex w-1/2">
                                <span class="font-bold w-3/5">Expiration identity date</span>
                                <span>{{Carbon\Carbon::parse(
                                    auth()->user()->beneficiary->expiration_identity_date)->format('Y M d')}}</span>
                            </div>
                        </div>

                        <div class="flex mt-3">
                            <div class="flex w-1/2">
                                <span class="w-1/2 font-bold">Phone</span>
                                <span>{{auth()->user()->beneficiary->phone}}</span>
                            </div>
                            <div class="flex w-1/2">
                                <span class="w-3/5 font-bold">Another phone</span>
                                <span>{{auth()->user()->beneficiary->another_phone ?? '-'}}</span>
                            </div>
                        </div>

                        <div class="flex mt-3">
                            <div class="flex w-1/2">
                                <span class="w-1/2 font-bold">Nationality</span>
                                <span>{{auth()->user()->beneficiary->nationality}}</span>
                            </div>
                            <div class="flex w-1/2">
                                <span class="w-3/5 font-bold">Education level</span>
                                <span>{{auth()->user()->beneficiary->education_level ?? '-'}}</span>
                            </div>
                        </div>

                        <div class="flex mt-3">
                            <div class="flex w-1/2">
                                <span class="w-1/2 font-bold">Birthdate</span>
                                <span>{{Carbon\Carbon::parse(
                                    auth()->user()->beneficiary->birthdate)->format('Y M d')}}</span>
                            </div>
                            <div class="flex w-1/2">
                                <span class="w-3/5 font-bold">Marital status</span>
                                <span>{{auth()->user()->beneficiary->marital_status ?? '-'}}</span>
                            </div>
                        </div>

                        <h2 class="mt-10 text-lg font-bold text-blue-500">Divorce</h2>

                        <div class="flex mt-3">
                            <div class="flex w-1/2">
                                <span class="w-1/2 font-bold">
                                    <span class="mr-0.5">- </span>
                                    Divorce date</span>
                                <span>{{Carbon\Carbon::parse(
                                    auth()->user()->beneficiary->divorce_date)->format('Y M d')}}</span>
                            </div>
                            <div class="flex w-1/2">
                                <span class="w-3/5 font-bold">Has a divorce
                                    reason?</span>
                                <span>{!!auth()->user()->beneficiary->has_a_divorce_reason === null ? '-' :
                                    (auth()->user()->beneficiary->has_a_divorce_reason ? '<span
                                        class="text-green-500">True</span>' :
                                    '<span class="text-red-500">False</span>')!!}</span>
                            </div>
                        </div>

                        <div class="flex mt-3">
                            <span class="w-1/4 font-bold">
                                <div class="flex">
                                    <span class="mr-1">- </span>
                                    <span>
                                        Are there cases of divorce in your family?
                                    </span>
                                </div>
                            </span>
                            <span>{!!auth()->user()->beneficiary->are_there_cases_of_divorce === null ? '-' :
                                (auth()->user()->beneficiary->are_there_cases_of_divorce ? '<span
                                    class="text-green-500">True</span>' :
                                '<span class="text-red-500">False</span>')!!}</span>
                        </div>

                        <div class="flex mt-3">
                            <span class="w-1/4 font-bold">
                                <div class="flex">
                                    <span class="mr-1">- </span>
                                    <span>
                                        Divorce reason
                                    </span>
                                </div>
                            </span>
                            <span>{{auth()->user()->beneficiary->divorce_reason ?? '-'}}</span>
                        </div>

                        <div class="flex mt-3">
                            <span class="w-1/4 font-bold">
                                <div class="flex pr-2">
                                    <span class="mr-1">- </span>
                                    <span>
                                        number of
                                        marriages
                                    </span>
                                </div>
                            </span>
                            <span>{{auth()->user()->beneficiary->marriages ?? '-'}}</span>
                        </div>

                        {{-- ******************************************************** --}}
                        <h2 class="mt-10 text-lg font-bold text-blue-500">Deed & Children</h2>

                        <div class="flex mt-3">
                            <span class="w-1/4 font-bold">
                                <div class="flex">
                                    <span class="mr-1">- </span>
                                    <span>
                                        Do you have a
                                        custody deed?
                                    </span>
                                </div>
                            </span>

                            <span>{!!auth()->user()->beneficiary->have_a_custody_deed === null ? '-' :
                                (auth()->user()->beneficiary->have_a_custody_deed ? '<span
                                    class="text-green-500">True</span>' :
                                '<span class="text-red-500">False</span>')!!}</span>
                        </div>
                        <div class="flex mt-3">
                            <span class="w-1/4 font-bold">
                                <div class="flex">
                                    <span class="mr-1">- </span>
                                    <span>Do you have a
                                        guardianship deed
                                        over the children?</span>
                                </div>
                            </span>
                            <span>{!!auth()->user()->beneficiary->have_a_guardianship_deed_over_the_children === null ?
                                '-' :
                                (auth()->user()->beneficiary->have_a_guardianship_deed_over_the_children ?
                                '<span class="text-green-500">True</span>' :
                                '<span class="text-red-500">False</span>')!!}</span>
                        </div>
                        <div class="flex mt-3">
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
                            <span>{!!auth()->user()->beneficiary->have_a_visitor_deed_for_your_children === null ? '-' :
                                (auth()->user()->beneficiary->have_a_visitor_deed_for_your_children ?
                                '<span class="text-green-500">True</span>' :
                                '<span class="text-red-500">False</span>')!!}</span>
                        </div>
                        <div class="flex mt-3">
                            <span class="w-1/4 font-bold">
                                <div class="flex pr-2">
                                    <span class="mr-1">- </span>
                                    <span>
                                        Do you have a
                                        car?
                                    </span>
                                </div>
                            </span>
                            <span>{!!auth()->user()->beneficiary->have_a_car === null ? '-' :
                                (auth()->user()->beneficiary->have_a_car
                                ?
                                '<span class="text-green-500">True</span>' :
                                '<span class="text-red-500">False</span>')!!}</span>
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
                            <span>{{auth()->user()->beneficiary->general_health_condition ?? '-'}}</span>
                        </div>
                        <div class="flex mt-3">
                            <span class="w-1/2 pr-20 font-bold">
                                <div class="flex">
                                    <span class="mr-1">- </span>
                                    <span>
                                        Experiences and
                                        Skills
                                    </span>
                                </div>
                            </span>
                            <span>{{auth()->user()->beneficiary->experiences_and_skills ?? '-'}}</span>
                        </div>

                        <div class="flex mt-3">
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

                            <span>{!!auth()->user()->beneficiary->desire_to_join_the_labor_market === null ? '-' :
                                (auth()->user()->beneficiary->desire_to_join_the_labor_market ? '<span
                                    class="text-green-500">True</span>' :
                                '<span class="text-red-500">False</span>')!!}</span>
                        </div>
                        <div class="flex mt-3">
                            <span class="w-1/2 pr-20 font-bold">
                                <div class="flex">
                                    <span class="mr-1">- </span>
                                    <span>Do you have a
                                        desire for training
                                        courses to help you join the labor
                                        market?</span>
                                </div>
                            </span>
                            <span>{!!auth()->user()->beneficiary->desire_for_training_courses === null ? '-' :
                                (auth()->user()->beneficiary->desire_for_training_courses ?
                                '<span class="text-green-500">True</span>' :
                                '<span class="text-red-500">False</span>')!!}</span>
                        </div>
                        <div class="flex mt-3">
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
                            <span>{!!auth()->user()->beneficiary->want_to_benefit_from_psychological_and_social_counseling
                                === null ? '-' :
                                (auth()->user()->beneficiary->want_to_benefit_from_psychological_and_social_counseling
                                ?
                                '<span class="text-green-500">True</span>' :
                                '<span class="text-red-500">False</span>')!!}</span>
                        </div>
                        <div class="flex mt-3">
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
                            <span>{!!auth()->user()->beneficiary->want_to_take_benefits_of_the_financial_support_program
                                === null ? '-' :
                                (auth()->user()->beneficiary->want_to_take_benefits_of_the_financial_support_program
                                ?
                                '<span class="text-green-500">True</span>' :
                                '<span class="text-red-500">False</span>')!!}</span>
                        </div>
                        <div class="flex mt-3">
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
                            <span>{!!auth()->user()->beneficiary->want_to_help_in_a_judicial === null ? '-' :
                                (auth()->user()->beneficiary->want_to_help_in_a_judicial
                                ?
                                '<span class="text-green-500">True</span>' :
                                '<span class="text-red-500">False</span>')!!}</span>
                        </div>

                        {{-- ******************************************************** --}}
                        <h2 class="mt-10 text-lg font-bold text-blue-500">Banking</h2>

                        <div class="flex mt-3">
                            <span class="w-1/4 font-bold">
                                <div class="flex">
                                    <span class="mr-1">- </span>
                                    <span>
                                        The name of your
                                        bank
                                    </span>
                                </div>
                            </span>

                            <span>{{auth()->user()->beneficiary->name_bank ?? '-' }}</span>
                        </div>

                        <div class="flex mt-3">
                            <span class="w-1/4 font-bold">
                                <div class="flex">
                                    <span class="mr-1">- </span>
                                    <span>
                                        IBAN account
                                        number
                                    </span>
                                </div>
                            </span>

                            <span>{{auth()->user()->beneficiary->IBAN_account_number ?? '-' }}</span>
                        </div>

                        <div class="flex mt-3">
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

                            <span>{!!auth()->user()->beneficiary->have_suspended_services === null ? '-' :
                                (auth()->user()->beneficiary->have_suspended_services
                                ?
                                '<span class="text-green-500">True</span>' :
                                '<span class="text-red-500">False</span>')!!}</span>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
