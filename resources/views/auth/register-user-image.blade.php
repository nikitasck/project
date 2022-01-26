<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <h1>Set your image</h1>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="/register-user-image" enctype="multipart/form-data">
            @csrf

            <div>
                <x-label for="image" :value="__('Image')" />
                <p>Choose image or hit next button to set picture later</p>
                <x-input id="image" class="block mt-1 w-full" type="file" name="image" placeholder="Enter picture" :value="old('image')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Next') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
