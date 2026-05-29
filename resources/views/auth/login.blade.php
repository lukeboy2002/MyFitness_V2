<x-guest-layout pageTitle="Login">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <x-card.default class="relative">
        <x-heading.card-top>{{ __('Login') }}</x-heading.card-top>

        <div class="mt-4">
            <x-authenticate-passkey/>
        </div>

        <div class="flex items-center my-6">
            <div aria-hidden="true" class="w-full border-t border-secondary"></div>
            <div class="relative flex justify-center">
                <span class="bg-surface px-2 text-sm text-muted">Or</span>
            </div>
            <div aria-hidden="true" class="w-full border-t border-secondary"></div>
        </div>

        <form method="POST" action="{{ route('login') }}" class="mt-4 space-y-4">
            @csrf
            <!-- Email Address / Username -->
            <div>
                <x-form.auth_input name="login" :label="__('Email or username')" type="text" :value="old('login')"
                                   required
                                   autocomplete="username"/>
                <x-form.error :messages="$errors->get('login')" class="mt-2"/>
            </div>

            <!-- Password -->
            <div>
                <x-form.auth_input name="password" :label="__('Password')" type="password" required
                                   autocomplete="current-password"/>
                <x-form.error :messages="$errors->get('password')" class="mt-2"/>
            </div>

            <div class="flex justify-between items-center">
                <!-- Remember Me -->
                <x-form.checkbox
                    id="remember_me"
                    name="remember"
                    :label="__('Remember me')"
                />
                <div class="flex items-center gap-1">
                    @if (Route::has('password.request'))
                        <x-link.default href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </x-link.default>
                    @endif
                    <span>/</span>
                    @if (Route::has('register'))
                        <x-link.default href="{{ route('register') }}">
                            {{ __('Register') }}
                        </x-link.default>
                    @endif

                </div>
            </div>

            <div class="flex items-center justify-end">
                <x-button.primary class="w-full">
                    {{ __('Log in') }}
                </x-button.primary>
            </div>


            {{--            <div class="flex flex-col items-center justify-between space-y-6">--}}
            {{--                <x-button.social icon="user-key">--}}
            {{--                    {{ __('Log in with a passkey') }}--}}
            {{--                </x-button.social>--}}
            {{--                <x-button.social icon="facebook">--}}
            {{--                    {{ __('Continue with Facebook') }}--}}
            {{--                </x-button.social>--}}
            {{--                <x-button.social icon="apple">--}}
            {{--                    {{ __('Log in with Apple') }}--}}
            {{--                </x-button.social>--}}
            {{--            </div>--}}
        </form>
    </x-card.default>
</x-guest-layout>
