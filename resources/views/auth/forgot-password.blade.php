<x-guest-layout>
    <x-slot:title>{{__('Forgot password')}}</x-slot:title>
    <div class="d-flex align-items-center justify-content-center min-vh-100-custom">
        <div class="form-background-color p-3  rounded border border-dark max-reset-pass-width shadow">
    <div class="mb-4 text-sm text-gray-600">
        {{ __('THIS IS ONLY PLACEHOLDER, JUST TO MAKE IT PRETTY') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
        </div>
    </div>
</x-guest-layout>
