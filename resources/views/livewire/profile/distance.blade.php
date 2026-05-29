<x-card.default class="relative">
    <x-heading.card-top>
        {{ __('Distance') }}
    </x-heading.card-top>


    <p class="mt-1 text-sm text-muted">
        {{ __('Update the distance settings for your account') }}
    </p>

    <fieldset aria-label="Choose a distance option">
        <div class="mt-6 grid grid-cols-2 gap-3">
            <x-form.radio-card wire:model.live="distance" name="distance" value="en" icon="lucide-ruler-dimension-line">
                {{ __('Miles') }}
            </x-form.radio-card>

            <x-form.radio-card wire:model.live="distance" name="distance" value="nl" icon="lucide-ruler-dimension-line">
                {{ __('Kilometer') }}
            </x-form.radio-card>
        </div>

    </fieldset>
</x-card.default>
