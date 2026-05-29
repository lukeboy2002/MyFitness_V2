<div class="flex flex-col space-y-10 px-4 sm:px-6 lg:px-8">
    <x-card.default class="relative">
        <x-heading.card-top>
            {{ __('Appearance') }}
        </x-heading.card-top>


        <p class="mt-1 text-sm text-muted">
            {{ __('Update the appearance settings for your account') }}
        </p>

        <fieldset aria-label="Choose a theme option">
            <div class="mt-6 grid grid-cols-3 gap-3">
                <x-form.radio-card wire:model.live="theme" name="appearance" value="light" icon="lucide-sun">
                    {{ __('Light') }}
                </x-form.radio-card>

                <x-form.radio-card wire:model.live="theme" name="appearance" value="dark" icon="lucide-moon">
                    {{ __('Dark') }}
                </x-form.radio-card>

                <x-form.radio-card wire:model.live="theme" name="appearance" value="system" icon="lucide-computer">
                    {{ __('System') }}
                </x-form.radio-card>
            </div>
        </fieldset>
    </x-card.default>
</div>
