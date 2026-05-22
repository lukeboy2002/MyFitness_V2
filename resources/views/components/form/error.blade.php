@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'mt-2 mb-4 font-medium text-xs text-error flex gap-2 items-center']) }}>
        @foreach ((array) $messages as $message)
            <li class="flex items-center">
                <x-lucide-triangle-alert class="h-4 w-4 mr-1"/>
                {{ $message }}
            </li>
        @endforeach
    </ul>
@endif


