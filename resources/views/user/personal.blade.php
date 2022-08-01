<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Personal Information') }}
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

                    <div class="absolute right-0 top-2">
                        <a href="{{route('personal.edit')}}"
                            class="p-5 pl-10 px-3  rounded-bl-full bg-gray-200  border-r-0 border-2 border-green-600 shadow-2xl"
                            title="Edit Personal Information">
                            <i class="fa-solid fa-pencil text-blue-600 text-xl"></i>
                        </a>
                    </div>

                    <div class="w-3/4 m-auto">
                        <div class="flex ">
                            <span class="w-1/5 font-bold">Full Name</span>
                            <span>{{auth()->user()->beneficiary->full_name}}</span>
                        </div>
                        <div class="flex mt-3">
                            <span class="w-1/5 font-bold">E-mail</span>
                            <span>{{auth()->user()->email}}</span>
                        </div>
                        <div class="flex mt-3">
                            <span class="w-1/5 font-bold">Phone</span>
                            <span>{{auth()->user()->beneficiary->phone}}</span>
                        </div>
                        <div class="flex mt-3">
                            <span class="w-1/5 font-bold">Gender</span>
                            <span>{{auth()->user()->beneficiary->gender ?? '-'}}</span>
                        </div>
                        <div class="flex mt-3">
                            <span class="w-1/5 font-bold">Language</span>
                            <span>{{auth()->user()->beneficiary->language}}</span>
                        </div>
                        <div class="flex mt-3">
                            <span class="w-1/5 font-bold">Time zone</span>
                            <span>{{auth()->user()->beneficiary->time_zone ?? '-'}}</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
