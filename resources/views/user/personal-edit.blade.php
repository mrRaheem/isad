<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('personal.index')}}">
                <i class="fa-solid fa-arrow-left text-blue-600"></i>
            </a>

            {{ __('Edit Personal Information') }}

            {{-- <a href="" class="p-2 px-3 rounded-full bg-gray-200 border border-blue-400 shadow-lg">
                <i class="fa-solid fa-pencil text-blue-600"></i> --}}
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 relative">

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('personal.update') }}">
                        @csrf
                        @method('put')

                        <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Full Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="full_name"
                                :value="old('full_name', Auth::user()->beneficiary->full_name)" required autofocus
                                placeholder="Name...." />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email' , Auth::user()->email)" required placeholder="example@mail.com" />
                        </div>

                        <!-- phone -->
                        <div class="w-full mt-4">
                            <x-label for="phone" :value="__('Mobile number')" />

                            <x-input id="phone" class="block mt-1 w-full" type="tel" name="phone"
                                :value="old('phone', Auth::user()->beneficiary->phone)" required
                                placeholder="+967 289 331 6461" />
                        </div>

                        <div class="flex  mt-5 gap-x-12">
                            <!-- gender -->
                            <div class="w-full">
                                <x-label for="gender" :value="__('Gender')" />

                                <select name="gender" id="gender" class="block mt-1 w-full" required>
                                    <option value=""> Your Gender</option>
                                    <option value="male" {{old('gender', Auth::user()->beneficiary->gender)=='male' ?
                                        'selected' : '' }}>male</option>
                                    <option value="female" {{old('gender', Auth::user()->beneficiary->gender)=='female'
                                        ? 'selected' : '' }}>female
                                    </option>
                                </select>
                            </div>

                            <!-- language -->
                            <div class="w-full">
                                <x-label for="language" :value="__('Language')" />

                                <select name="language" id="language" class="block mt-1 w-full" required>
                                    <option value=""> Your language</option>
                                    <option value="Arabic" selected>Arabic</option>
                                </select>
                            </div>

                            <!-- timezone -->
                            <div class="w-full">
                                <x-label for="timezone" :value="__('Time zone')" />

                                <x-input list="timezone" name="timezone" class="block mt-1 w-full" type="text" required
                                    :value="old('timezone', Auth::user()->beneficiary->time_zone)" />
                                <datalist id="timezone">
                                    <option value="SU">
                                    <option value="YE-Sa">
                                </datalist>
                            </div>



                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <button class=" bg-blue-800 hover:bg-blue-500 p-2 px-4 rounded-md text-white">
                                {{ __('Edit') }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
