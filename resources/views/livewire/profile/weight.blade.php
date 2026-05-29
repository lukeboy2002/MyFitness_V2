<x-card.default class="relative">
    <x-heading.card-top>
        {{ __('Weight') }}
    </x-heading.card-top>

    <p class="mt-1 text-sm text-muted">
        {{ __('Update the weight settings for your account') }}
    </p>

    <fieldset aria-label="Choose a weight option">
        <div class="mt-6 grid grid-cols-2 gap-3">
            <x-form.radio-card wire:model.live="weight" name="weight" value="kg" icon="lucide-weight">
                {{ __('Kilogram') }}
            </x-form.radio-card>

            <x-form.radio-card wire:model.live="weight" name="weight" value="lbs" icon="lucide-weight">
                {{ __('Ponds') }}
            </x-form.radio-card>
        </div>

    </fieldset>
</x-card.default>
