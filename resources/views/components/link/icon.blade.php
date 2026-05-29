@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'flex flex-col items-center justify-center py-2 text-secondary transition duration-150 ease-in-out'
                : 'flex flex-col items-center justify-center py-2 text-primary transition duration-150 ease-in-out';
@endphp

<a wire:navigate {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
