<div>
    @include('passkeys::components.partials.authenticateScript')

    <form id="passkey-login-form" method="POST" action="{{ route('passkeys.login') }}">
        @csrf
    </form>
    
    <div onclick="authenticateWithPasskey()">
        @if ($slot->isEmpty())
            <div
                class="cursor-pointer flex justify-center items-center space-x-2 px-4 py-2 bg-secondary border border-transparent rounded-md font-semibold text-xs text-primary uppercase tracking-widest hover:bg-secondary/50 focus:bg-secondary/50 active:bg-secondary/50 focus:outline-hidden focus:ring-2 focus:ring-secondary focus:ring-offset-2 transition ease-in-out duration-150">
                <x-lucide-fingerprint-pattern class="h-4 w-4"/>
                <div>{{ __('passkeys::passkeys.authenticate_using_passkey') }}</div>
            </div>
        @else
            {{ $slot }}
        @endif
    </div>
    @if($message = session()->get('authenticatePasskey::message'))
        <div class="mt-2 mb-4 font-medium text-xs text-error flex gap-2 items-center">
            <x-lucide-triangle-alert class="h-4 w-4 mr-1"/>{{ $message }}
        </div>
    @endif
</div>
