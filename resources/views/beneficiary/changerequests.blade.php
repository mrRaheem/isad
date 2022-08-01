<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center gap-x-4">

            {{ __('Beneficiaries Data Change Requests') }}

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 relative">

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full">
                                        <thead class="border-b font-bold text-blue-600">
                                            <tr>
                                                <th scope="col" class="text-sm  px-6 py-4 text-left">
                                                    #
                                                </th>
                                                <th scope="col" class="text-sm  px-6 py-4 text-left">
                                                    Full Name
                                                </th>
                                                <th scope="col" class="text-sm  px-6 py-4 text-left">
                                                    Identity Number
                                                </th>
                                                <th scope="col" class="text-sm  px-6 py-4 text-left">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($requests as $i => $request)
                                            <tr class="border-b">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{++$i}}
                                                </td>
                                                <td class="text-sm font-medium px-6 py-4 whitespace-nowrap">
                                                    {{$request->full_name}}
                                                </td>
                                                <td class="text-sm text-gray-900 px-6 py-4 whitespace-nowrap">
                                                    {{$request->identity_number}}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 px-6 py-4 whitespace-nowrap flex gap-x-4">
                                                    <a href="{{route('primarydata.show', $request->id)}}"
                                                        class="inline-flex font-bold text-base sm:ml-2 ">
                                                        <i
                                                            class="fas fa-edit text-yellow-500 text-xl hidden sm:inline-block"></i>
                                                    </a>
                                                    <a href=""
                                                        onclick="event.preventDefault();
                                                        if(confirm('Are you sure to refuse this changement')){ document.getElementById('elelment{{$request->id}}').submit();} else {return false;}"
                                                        class="align-bottom inline-flex font-bold text-base ">
                                                        <i
                                                            class="fas fa-trash text-red-500 text-xl hidden sm:inline-block"></i>

                                                    </a>
                                                    <form id="elelment{{$request->id}}"
                                                        action="{{route('primarydata.destroy', $request->id)}}"
                                                        method="POST" class="hidden">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>

                                            @empty
                                            <tr>
                                                <td colspan="4" class="text-center py-4">No Requests Yet</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>

</x-app-layout>
