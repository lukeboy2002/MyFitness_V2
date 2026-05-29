<x-card.default class="relative">
    <x-heading.card-top>
        {{ __('Avatar') }}
    </x-heading.card-top>


    <p class="mt-1 text-sm text-muted">
        {{ __('Update the avatar for your account') }}
    </p>


    <div class="mt-6">
        <div class="relative">
            @if ($avatar)
                <img src="{{ $avatar->temporaryUrl() }}"
                     alt="{{ $user->name }}"
                     class="w-24 h-24 rounded-full object-cover border-2 border-border">
            @elseif ($user->avatar)
                <img src="{{ asset ($user->avatar) }}"
                     alt="{{ $user->name }}"
                     class="w-24 h-24 rounded-full object-cover border-2 border-border">
            @else
                <div class="w-24 h-24 rounded-full border-2 border-border flex items-center justify-center bg-surface">
                    <x-lucide-user class="w-18 h-18 text-muted"/>
                </div>
            @endif

            <div wire:loading wire:target="avatar"
                 class="absolute inset-0 flex items-center justify-center bg-black/50 rounded-full">
                <x-lucide-loader-2 class="w-6 h-6 animate-spin text-white"/>
            </div>
        </div>

        <form wire:submit="updateAvatar" class="space-y-6 flex-1 mt-6">
            <div>
                <x-form.label class="sr-only" for="avatar" :value="__('Avatar')"/>
                <input type="file" wire:model="avatar" id="avatar" class="mt-1 px-4 block w-full text-sm text-muted
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-md file:border-0
                    file:text-sm file:font-semibold
                    file:bg-surface-hover file:text-primary
                    hover:file:bg-surface-alt">
                <x-form.error class="mt-2" :messages="$errors->get('avatar')"/>

            </div>

            <div class="flex items-center">
                <x-button.primary class="w-full" type="submit" wire:loading.attr="disabled" wire:target="avatar">
                    {{ __('Upload') }}
                </x-button.primary>

                <p x-data="{ show: false }"
                   x-show="show"
                   x-on:avatar-updated.window="show = true; setTimeout(() => show = false, 2000)"
                   x-transition
                   style="display: none;"
                   class="text-sm text-success flex items-center gap-2"
                >
                    <x-lucide-check class="h-4 w-4"/>{{ __('Updated.') }}</p>
            </div>
        </form>
    </div>
</x-card.default>
