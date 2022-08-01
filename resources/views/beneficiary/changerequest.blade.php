<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center gap-x-4">
            <div>
                {{ __('Beneficiaries Data Change Requests') }}
                -
                <span class="text-green-500 text-lg">{{$maindata->full_name}}</span>
        </h2>
    </x-slot>

    {{-- <div class="sticky right-10 top-20 flex justify-end mr-16 mb-2 mt-20  z-10">
        <a href="{{route('primarydata.edit')}}"
            class="p-7 pl-10 px-3  rounded-bl-full bg-gray-200  border-r-0 border-2 border-green-600 shadow-2xl"
            title="Edit Personal Information">
            <i class="fa-solid fa-pencil text-blue-600 text-xl"></i>
        </a>
    </div> --}}


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 relative">

                    <h1 class="text-center text-3xl  font-bold mb-4">New Data</h1>
                    @if ($newdata)

                    {{-- new Data --}}
                    <div class="">

                        <hr class="mb-4">

                        <div class="flex ">
                            <span class="w-1/4 font-bold">Full Name</span>
                            <span class="">{{$newdata->full_name}}</span>
                        </div>

                        <div class="flex mt-3">
                            <div class="flex w-1/2">
                                <span class="font-bold w-1/2">Identity number</span>
                                <span>{{$newdata->identity_number}}</span>
                            </div>
                            <div class="flex w-1/2">
                                <span class="font-bold w-3/5">Expiration identity date</span>
                                <span>{{Carbon\Carbon::parse(
                                    $newdata->expiration_identity_date)->format('Y M d')}}</span>
                            </div>
                        </div>

                        <div class="flex mt-3">
                            <div class="flex w-1/2">
                                <span class="w-1/2 font-bold">Phone</span>
                                <span>{{$newdata->phone}}</span>
                            </div>
                            <div class="flex w-1/2">
                                <span class="w-3/5 font-bold">Another phone</span>
                                <span>{{$newdata->another_phone ?? '-'}}</span>
                            </div>
                        </div>

                        <div class="flex mt-3">
                            <div class="flex w-1/2">
                                <span class="w-1/2 font-bold">Nationality</span>
                                <span>{{$newdata->nationality}}</span>
                            </div>
                            <div class="flex w-1/2">
                                <span class="w-3/5 font-bold">Education level</span>
                                <span>{{$newdata->education_level ?? '-'}}</span>
                            </div>
                        </div>

                        <div class="flex mt-3">
                            <div class="flex w-1/2">
                                <span class="w-1/2 font-bold">Birthdate</span>
                                <span>{{Carbon\Carbon::parse(
                                    $newdata->birthdate)->format('Y M d')}}</span>
                            </div>
                            <div class="flex w-1/2">
                                <span class="w-3/5 font-bold">Marital status</span>
                                <span>{{$newdata->marital_status ?? '-'}}</span>
                            </div>
                        </div>

                        <h2 class="mt-10 text-lg font-bold text-blue-500">Divorce</h2>

                        <div class="flex mt-3">
                            <div class="flex w-1/2">
                                <span class="w-1/2 font-bold">
                                    <span class="mr-0.5">- </span>
                                    Divorce date</span>
                                <span>{{Carbon\Carbon::parse(
                                    $newdata->divorce_date)->format('Y M d')}}</span>
                            </div>
                            <div class="flex w-1/2">
                                <span class="w-3/5 font-bold">Has a divorce
                                    reason?</span>
                                <span>{!!$newdata->has_a_divorce_reason === null ? '-' :
                                    ($newdata->has_a_divorce_reason ? '<span class="text-green-500">True</span>'
                                    :
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
                            <span>{!!$newdata->are_there_cases_of_divorce === null ? '-' :
                                ($newdata->are_there_cases_of_divorce ? '<span class="text-green-500">True</span>' :
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
                            <span>{{$newdata->divorce_reason ?? '-'}}</span>
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
                            <span>{{$newdata->marriages ?? '-'}}</span>
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

                            <span>{!!$newdata->have_a_custody_deed === null ? '-' :
                                ($newdata->have_a_custody_deed ? '<span class="text-green-500">True</span>' :
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
                            <span>{!!$newdata->have_a_guardianship_deed_over_the_children === null ?
                                '-' :
                                ($newdata->have_a_guardianship_deed_over_the_children ?
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
                            <span>{!!$newdata->have_a_visitor_deed_for_your_children === null ? '-' :
                                ($newdata->have_a_visitor_deed_for_your_children ?
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
                            <span>{!!$newdata->have_a_car === null ? '-' :
                                ($newdata->have_a_car
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
                            <span>{{$newdata->general_health_condition ?? '-'}}</span>
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
                            <span>{{$newdata->experiences_and_skills ?? '-'}}</span>
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

                            <span>{!!$newdata->desire_to_join_the_labor_market === null ? '-' :
                                ($newdata->desire_to_join_the_labor_market ? '<span class="text-green-500">True</span>'
                                :
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
                            <span>{!!$newdata->desire_for_training_courses === null ? '-' :
                                ($newdata->desire_for_training_courses ?
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
                            <span>{!!$newdata->want_to_benefit_from_psychological_and_social_counseling
                                === null ? '-' :
                                ($newdata->want_to_benefit_from_psychological_and_social_counseling
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
                            <span>{!!$newdata->want_to_take_benefits_of_the_financial_support_program
                                === null ? '-' :
                                ($newdata->want_to_take_benefits_of_the_financial_support_program
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
                            <span>{!!$newdata->want_to_help_in_a_judicial === null ? '-' :
                                ($newdata->want_to_help_in_a_judicial
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

                            <span>{{$newdata->name_bank ?? '-' }}</span>
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

                            <span>{{$newdata->IBAN_account_number ?? '-' }}</span>
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

                            <span>{!!$newdata->have_suspended_services === null ? '-' :
                                ($newdata->have_suspended_services
                                ?
                                '<span class="text-green-500">True</span>' :
                                '<span class="text-red-500">False</span>')!!}</span>
                        </div>

                    </div>


                    <div class="w-min mx-auto flex items-center gap-x-3 translate-y-10">
                        <a href="{{route('primarydata.approveRequest', $newdata->id)}}" onclick="event.preventDefault();
                            if(confirm('Are you sure to approve this changement')){ document.getElementById('approve{{$newdata->id}}').submit();}
                            else {return false;}"
                            class=" bg-blue-800 hover:bg-blue-500 p-2 px-4 rounded-md text-white whitespace-nowrap inline-flex items-center gap-x-2">
                            {{ __('Approve Change') }}
                            <i class="fas fa-check  text-2xl"></i>
                        </a>
                        <a href="" onclick="event.preventDefault();
                            if(confirm('Are you sure to refuse this changement')){ document.getElementById('refuse{{$newdata->id}}').submit();}
                            else {return false;}"
                            class=" bg-red-500 hover:bg-red-400 p-2 px-4 rounded-md text-white whitespace-nowrap inline-flex items-center gap-x-2">
                            {{ __('Reject') }}
                            <i class="fas fa-trash  text-2xl"></i>
                        </a>
                        <form id="approve{{$newdata->id}}"
                            action="{{route('primarydata.approveRequest', $newdata->id)}}" method="POST" class="hidden">
                            @csrf
                            @method('PUT')
                        </form>
                        <form id="refuse{{$newdata->id}}" action="{{route('primarydata.destroy', $newdata->id)}}"
                            method="POST" class="hidden">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>

                    @else
                    <h2 class="text-sm text-center">No Update Requested</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- main data --}}
    <div class=" py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-amber-100 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 relative">

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    {{-- old Data --}}
                    <div class="">

                        <h1 class="text-center text-3xl  font-bold mb-4">Old Data</h1>
                        <hr class="mb-4">

                        <div class="flex ">
                            <span class="w-1/4 font-bold">Full Name</span>
                            <span class="">{{$maindata->full_name}}</span>
                        </div>

                        <div class="flex mt-3">
                            <div class="flex w-1/2">
                                <span class="font-bold w-1/2">Identity number</span>
                                <span>{{$maindata->identity_number}}</span>
                            </div>
                            <div class="flex w-1/2">
                                <span class="font-bold w-3/5">Expiration identity date</span>
                                <span>{{Carbon\Carbon::parse(
                                    $maindata->expiration_identity_date)->format('Y M d')}}</span>
                            </div>
                        </div>

                        <div class="flex mt-3">
                            <div class="flex w-1/2">
                                <span class="w-1/2 font-bold">Phone</span>
                                <span>{{$maindata->phone}}</span>
                            </div>
                            <div class="flex w-1/2">
                                <span class="w-3/5 font-bold">Another phone</span>
                                <span>{{$maindata->another_phone ?? '-'}}</span>
                            </div>
                        </div>

                        <div class="flex mt-3">
                            <div class="flex w-1/2">
                                <span class="w-1/2 font-bold">Nationality</span>
                                <span>{{$maindata->nationality}}</span>
                            </div>
                            <div class="flex w-1/2">
                                <span class="w-3/5 font-bold">Education level</span>
                                <span>{{$maindata->education_level ?? '-'}}</span>
                            </div>
                        </div>

                        <div class="flex mt-3">
                            <div class="flex w-1/2">
                                <span class="w-1/2 font-bold">Birthdate</span>
                                <span>{{Carbon\Carbon::parse(
                                    $maindata->birthdate)->format('Y M d')}}</span>
                            </div>
                            <div class="flex w-1/2">
                                <span class="w-3/5 font-bold">Marital status</span>
                                <span>{{$maindata->marital_status ?? '-'}}</span>
                            </div>
                        </div>

                        <h2 class="mt-10 text-lg font-bold text-blue-500">Divorce</h2>

                        <div class="flex mt-3">
                            <div class="flex w-1/2">
                                <span class="w-1/2 font-bold">
                                    <span class="mr-0.5">- </span>
                                    Divorce date</span>
                                <span>{{Carbon\Carbon::parse(
                                    $maindata->divorce_date)->format('Y M d')}}</span>
                            </div>
                            <div class="flex w-1/2">
                                <span class="w-3/5 font-bold">Has a divorce
                                    reason?</span>
                                <span>{!!$maindata->has_a_divorce_reason === null ? '-' :
                                    ($maindata->has_a_divorce_reason ? '<span class="text-green-500">True</span>'
                                    :
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
                            <span>{!!$maindata->are_there_cases_of_divorce === null ? '-' :
                                ($maindata->are_there_cases_of_divorce ? '<span class="text-green-500">True</span>' :
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
                            <span>{{$maindata->divorce_reason ?? '-'}}</span>
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
                            <span>{{$maindata->marriages ?? '-'}}</span>
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

                            <span>{!!$maindata->have_a_custody_deed === null ? '-' :
                                ($maindata->have_a_custody_deed ? '<span class="text-green-500">True</span>' :
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
                            <span>{!!$maindata->have_a_guardianship_deed_over_the_children === null ?
                                '-' :
                                ($maindata->have_a_guardianship_deed_over_the_children ?
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
                            <span>{!!$maindata->have_a_visitor_deed_for_your_children === null ? '-' :
                                ($maindata->have_a_visitor_deed_for_your_children ?
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
                            <span>{!!$maindata->have_a_car === null ? '-' :
                                ($maindata->have_a_car
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
                            <span>{{$maindata->general_health_condition ?? '-'}}</span>
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
                            <span>{{$maindata->experiences_and_skills ?? '-'}}</span>
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

                            <span>{!!$maindata->desire_to_join_the_labor_market === null ? '-' :
                                ($maindata->desire_to_join_the_labor_market ? '<span class="text-green-500">True</span>'
                                :
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
                            <span>{!!$maindata->desire_for_training_courses === null ? '-' :
                                ($maindata->desire_for_training_courses ?
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
                            <span>{!!$maindata->want_to_benefit_from_psychological_and_social_counseling
                                === null ? '-' :
                                ($maindata->want_to_benefit_from_psychological_and_social_counseling
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
                            <span>{!!$maindata->want_to_take_benefits_of_the_financial_support_program
                                === null ? '-' :
                                ($maindata->want_to_take_benefits_of_the_financial_support_program
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
                            <span>{!!$maindata->want_to_help_in_a_judicial === null ? '-' :
                                ($maindata->want_to_help_in_a_judicial
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

                            <span>{{$maindata->name_bank ?? '-' }}</span>
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

                            <span>{{$maindata->IBAN_account_number ?? '-' }}</span>
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

                            <span>{!!$maindata->have_suspended_services === null ? '-' :
                                ($maindata->have_suspended_services
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
