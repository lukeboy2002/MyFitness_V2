<x-guest-layout pageTitle="Login">

    <x-card.default class="relative">
        <x-heading.card-top>{{ __('Verify Email') }}</x-heading.card-top>
        <div class="my-4 text-sm text-muted">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-success flex items-center">
                <x-lucide-check-circle class="h-4 w-4 mr-2"/>
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button.primary>
                        {{ __('Resend Verification Email') }}
                    </x-button.primary>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-button.link type="submit"
                               class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    {{ __('Log Out') }}
                </x-button.link>
            </form>
        </div>
    </x-card.default>
</x-guest-layout>
