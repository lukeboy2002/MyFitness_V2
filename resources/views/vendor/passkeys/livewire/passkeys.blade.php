<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('passkeys::passkeys.passkeys') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Manage your passkeys to sign in quickly and securely without using a password. Passkeys use your device’s built-in authentication, such as Face ID, Touch ID, or Windows Hello.") }}
        </p>
    </header>

    <form id="passkeyForm" wire:submit="validatePasskeyProperties" class="flex items-center space-x-2 mt-6 space-y-6">
        <div>
            <x-input-label for="name" :value="__('passkeys::passkeys.name')"/>
            <x-text-input autocomplete="off" type="text" wire:model="name"/>
            <x-input-error class="mt-2" :messages="$errors->get('name')"/>
        </div>

        <x-button.primary type="submit">
            {{ __('passkeys::passkeys.create') }}
        </x-button.primary>
    </form>

    <div class="mt-6">
        <ul class="space-y-4">
            @foreach($passkeys as $passkey)
                <li class="flex justify-between items-center p-4 bg-gray-100 rounded-lg shadow-sm">
                    <div class="text-gray-700">
                        {{ $passkey->name }}
                    </div>
                    <div class="ml-2">
                        {{ __('passkeys::passkeys.last_used') }}
                        : {{ $passkey->last_used_at?->diffForHumans() ?? __('passkeys::passkeys.not_used_yet') }}
                    </div>


                    <div>
                        <button wire:click="deletePasskey({{ $passkey->id }})"
                                class="inline-flex justify-center py-2 px-4 text-sm font-medium text-white bg-red-600">
                            {{ __('passkeys::passkeys.delete') }}
                        </button>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>

@include('passkeys::livewire.partials.createScript')
