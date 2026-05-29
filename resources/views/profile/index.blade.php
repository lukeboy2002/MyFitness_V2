<x-profile-layout pageTitle="Profile Settings">


    <div class="px-4 pb-1 text-lg text-secondary font-semibold">
        Account
    </div>

    <nav class="bg-surface flex flex-col gap-4 sm:rounded-lg py-2">
        <x-link.menu-item :href="route('profile.edit')" icon="user">
            Profile
        </x-link.menu-item>

        <x-link.menu-item :href="route('profile.password')" icon="lock">
            Change password
        </x-link.menu-item>

        <x-link.menu-item :href="route('profile.passkeys')" icon="fingerprint-pattern">
            Passkeys
        </x-link.menu-item>
    </nav>


    <div class="px-4 pt-4 pb-1 text-lg text-secondary font-semibold">
        Preferences
    </div>

    <nav class="bg-surface flex flex-col gap-4 sm:rounded-lg py-2">
        <x-link.menu-item :href="route('profile.units')" icon="ruler">
            Units
        </x-link.menu-item>
        <x-link.menu-item :href="route('profile.language')" icon="flag">
            Language
        </x-link.menu-item>

        <x-link.menu-item :href="route('profile.appearance')" icon="sun-moon">
            Theme
        </x-link.menu-item>
    </nav>

    <div class="px-4 pt-4 pb-1 text-lg text-secondary font-semibold">
        Danger Zone
    </div>

    <nav class="bg-error hover:bg-error/80 flex flex-col gap-4 sm:rounded-lg py-2 text-primary">
        <x-link.menu-item :href="route('profile.delete')" icon="trash">
            Delete account
        </x-link.menu-item>
    </nav>

</x-profile-layout>
