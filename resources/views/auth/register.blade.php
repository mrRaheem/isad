<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" x-data="{ privacy: false }">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Full Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="full_name" :value="old('full_name')"
                    required autofocus placeholder="Name...." />
            </div>

            <div class="flex  mt-5 gap-x-12">
                <!-- ID number -->
                <div class="w-full">
                    <x-label for="identity_number" :value="__('ID number')" />

                    <x-input id="identity_number" class="block mt-1 w-full" type="text" name="identity_number"
                        minlength="10" maxlength="10" :value="old('identity_number')" required
                        placeholder="899-231-3301" />
                </div>

                <!-- phone -->
                <div class="w-full">
                    <x-label for="phone" :value="__('Mobile number')" />

                    <x-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')" required
                        placeholder="+967 289 331 6461" />
                </div>

                <!-- city -->
                <div class="w-full">
                    <x-label for="city" :value="__('City')" />

                    <select name="city" id="city" class="block mt-1 w-full" required>
                        <option value="">Choose your city</option>
                        <option value="Aldamam" {{old('city')=='Aldamam' ? 'selected' : '' }}>Aldamam</option>
                        <option value="Alkhabar" {{old('city')=='Alkhabar' ? 'selected' : '' }}>Alkhabar</option>
                        <option value="Um Alsahik" {{old('city')=='Um Alsahik' ? 'selected' : '' }}>Um Alsahik</option>
                        <option value="Al-Ahsa Governorate" {{old('city')=='Al-Ahsa Governorate' ? 'selected' : '' }}>
                            Al-Ahsa Governorate</option>
                    </select>
                </div>
            </div>

            <!-- Email Address -->
            <div class="mt-5">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    placeholder="example@mail.com" />
            </div>

            <!-- Password -->
            <div class="mt-2">
                <div class="flex gap-x-3">
                    <x-label for="password" :value="__('Password')" />
                    <small class="text-red-500 text-xs">(5-15 Characters / Numbers, alphabetic,symbols)</small>
                </div>
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required minlength="5"
                    maxlength="15" placeholder="AZaz123@#$" autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-2">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>

            <!-- privacy policy -->
            <div class="mt-5 flex items-center">
                <input type="checkbox" name="privacy" id="privacy" class="mr-1 rounded-sm" x-model="privacy">

                <x-label for="privacy" :value="__('I am agree with approved organization privacy policy')"
                    class="text-blue-500" />
                {{old('privacy')}}
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4 disabled:cursor-not-allowed" x-bind:disabled="!privacy ">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
