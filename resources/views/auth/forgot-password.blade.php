<x-guest-layout pageTitle="Forgot Password">

    <x-card.default class="relative">
        <x-heading.card-top>{{ __('Forgot Password') }}</x-heading.card-top>
        <div class="mt-4 mb-6 text-xs text-muted">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <form method="POST" action="{{ route('password.email') }}" class="mt-4 space-y-4">
            @csrf

            <!-- Email Address -->
            <div>
                <x-form.auth_input name="email" :label="__('Email')" type="email" :value="old('email')" required
                                   autocomplete="username"/>
                <x-form.error :messages="$errors->get('email')" class="mt-2"/>
                <x-auth-session-status class="mb-4" :status="session('status')"/>
            </div>

            <div class="flex items-center justify-end">
                <x-button.primary class="w-full">
                    {{ __('Email Password Reset Link') }}
                </x-button.primary>
            </div>
        </form>
    </x-card.default>
</x-guest-layout>
