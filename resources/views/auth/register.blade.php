<x-guest-layout pageTitle="Register">

    <x-card.default class="relative">
        <x-heading.card-top>{{ __('Register') }}</x-heading.card-top>
        <form method="POST" action="{{ route('register') }}" class="mt-4 space-y-4">
            @csrf
            <div class="flex justify-end">
                <x-link.default href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </x-link.default>
            </div>

            <!-- Name -->
            <div>
                <x-form.input name="name" :label="__('Name')" :value="old('name')" required autofocus
                              autocomplete="name"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>

            <!-- Username -->
            <div class="mt-4">
                <x-form.input name="username" :label="__('Username')" :value="old('username')" required
                              autocomplete="username"/>
                <x-input-error :messages="$errors->get('username')" class="mt-2"/>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-form.input name="email" :label="__('Email')" type="email" :value="old('email')" required
                              autocomplete="username"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-form.input name="password" :label="__('Password')" type="password" required
                              autocomplete="new-password"/>
                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-form.input name="password_confirmation" :label="__('Confirm Password')" type="password" required
                              autocomplete="new-password"/>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button.primary class="w-full">
                    {{ __('Register') }}
                </x-button.primary>
            </div>
        </form>
    </x-card.default>
</x-guest-layout>
