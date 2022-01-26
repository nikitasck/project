<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <h1>Set delivery Information</h1>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="/register-adress-info">
            @csrf

            <!-- firstname -->
            <div>
                <x-label for="country" :value="__('Country')" />

                <x-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')" required autofocus />
            </div>

            <!-- lastname -->
            <div>
                <x-label for="city" :value="__('City')" />

                <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="street" :value="__('Street')" />

                <x-input id="street" class="block mt-1 w-full" type="text" name="street" :value="old('street')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="house_number" :value="__('House_number')" />

                <x-input id="house_number" class="block mt-1 w-full" type="text" name="house_number" :value="old('house_number')" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/">
                    {{ __('Set later') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Next') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
