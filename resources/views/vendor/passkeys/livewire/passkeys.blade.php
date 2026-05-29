<div class="space-y-10 px-4 sm:px-6 lg:px-8">
    <x-card.default class="relative" x-data="{ passkeyToDelete: null }">
        <x-heading.card-top>
            {{ __('Passkeys') }}
        </x-heading.card-top>

        <p class="mt-1 text-sm text-muted">
            {{ __("Manage your passkeys to sign in quickly and securely without using a password. Passkeys use your device’s built-in authentication, such as Face ID, Touch ID, or Windows Hello.") }}
        </p>

        <form id="passkeyForm" wire:submit="validatePasskeyProperties"
              class="mt-6 space-y-6">
            <div class="w-full">
                <x-form.label for="name" :value="__('passkeys::passkeys.name')"/>
                <x-form.input name="name" autocomplete="off" type="text" wire:model="name" class="w-2/3"/>
                <x-form.error class="mt-2" :messages="$errors->get('name')"/>
            </div>

            <x-button.primary type="submit" class="w-full">
                {{ __('passkeys::passkeys.create') }}
            </x-button.primary>
        </form>

        <div class="mt-6">
            <ul class="space-y-4">
                @foreach($passkeys as $passkey)
                    <li class="flex justify-between items-center p-4 bg-surface-secondary rounded-lg shadow-sm">
                        <div class="text-primary text-sm">
                            {{ $passkey->name }}
                        </div>
                        <div class="ml-2 text-muted text-xs">
                            {{ __('passkeys::passkeys.last_used') }}
                            : {{ $passkey->last_used_at?->diffForHumans() ?? __('passkeys::passkeys.not_used_yet') }}
                        </div>


                        <div>
                            <x-button.icon class="text-error"
                                           x-on:click.prevent="passkeyToDelete = {{ $passkey->id }}; $dispatch('open-modal', 'confirm-passkey-deletion')"
                            >
                                <x-lucide-trash class=" w-4 h-4"/>
                            </x-button.icon>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <x-modal name="confirm-passkey-deletion" :show="$errors->isNotEmpty()" focusable>
            <div class="p-6">
                <h2 class="text-lg font-medium text-primary">
                    {{ __('Are you sure you want to delete this passkey?') }}
                </h2>

                <p class="mt-1 text-sm text-muted">
                    {{ __('Once this passkey is deleted, you will no longer be able to use it to sign in. You can always create a new one later.') }}
                </p>

                <div class="mt-6 flex justify-end">
                    <x-button.secondary x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-button.secondary>

                    <x-button.danger class="ms-3" x-on:click="$wire.deletePasskey(passkeyToDelete); $dispatch('close')">
                        {{ __('Delete Passkey') }}
                    </x-button.danger>
                </div>
            </div>
        </x-modal>
    </x-card.default>
</div>
@include('passkeys::livewire.partials.createScript')
