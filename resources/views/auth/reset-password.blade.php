<x-guest-layout pageTilte="Reset Password">

    <x-card.default class="relative">
        <x-heading.card-top>{{ __('Reset Password') }}</x-heading.card-top>
        <form method="POST" action="{{ route('password.store') }}" class="mt-4 space-y-4">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-form.auth_input name="email" :label="__('Email')" type="email" :value="old('email', $request->email)"
                                   required
                                   autocomplete="username"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-form.auth_input name="password" :label="__('Password')" type="password" required
                                   autocomplete="new-password"/>
                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-form.auth_input name="password_confirmation" :label="__('Confirm Password')" type="password" required
                                   autocomplete="new-password"/>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button.primary class="w-full">
                    {{ __('Reset Password') }}
                </x-button.primary>
            </div>
        </form>
    </x-card.default>
</x-guest-layout>
