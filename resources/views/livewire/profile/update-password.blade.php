<div class="space-y-10 px-4 sm:px-6 lg:px-8">
    <x-card.default class="relative">

        <x-heading.card-top>
            {{ __('Update Password') }}
        </x-heading.card-top>


        <p class="mt-1 text-sm text-muted">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>

        <form wire:submit="updatePassword" class="mt-6 space-y-6">
            <div>
                <x-form.label for="update_password_current_password" :value="__('Current Password')"/>
                <x-form.input wire:model="current_password" id="update_password_current_password"
                              name="current_password"
                              type="password" class="mt-1 block w-full" autocomplete="current-password"/>
                <x-input-error :messages="$errors->get('current_password')" class="mt-2"/>
            </div>

            <div>
                <x-form.label for="update_password_password" :value="__('New Password')"/>
                <x-form.input wire:model="password" id="update_password_password" name="password" type="password"
                              class="mt-1 block w-full" autocomplete="new-password"/>
                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>

            <div>
                <x-form.label for="update_password_password_confirmation" :value="__('Confirm Password')"/>
                <x-form.input wire:model="password_confirmation" id="update_password_password_confirmation"
                              name="password_confirmation" type="password" class="mt-1 block w-full"
                              autocomplete="new-password"/>
                <x-form.error :messages="$errors->get('password_confirmation')" class="mt-2"/>
            </div>

            <div class="flex items-center gap-4">
                <x-button.primary class="w-full">{{ __('Save') }}</x-button.primary>

                @if (session('status') === 'password-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-success flex items-center"
                    >
                        <x-lucide-check-circle class="h-4 w-4 mr-1"/>{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </x-card.default>
</div>
