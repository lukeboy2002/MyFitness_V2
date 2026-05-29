<div class="space-y-10 px-4 sm:px-6 lg:px-8">
    <x-card.default class="relative">
        <x-heading.card-top>
            {{ __('Language') }}
        </x-heading.card-top>


        <p class="mt-1 text-sm text-muted">
            {{ __('Update the language settings for your account') }}
        </p>

        <fieldset aria-label="Choose a language option">
            <div class="mt-6 grid grid-cols-2 gap-3">
                <x-form.radio-card wire:model.live="language" name="language" value="en" icon="lucide-flag">
                    {{ __('English') }}
                </x-form.radio-card>

                <x-form.radio-card wire:model.live="language" name="language" value="nl" icon="lucide-flag">
                    {{ __('Dutch') }}
                </x-form.radio-card>
            </div>
        </fieldset>
    </x-card.default>
</div>
