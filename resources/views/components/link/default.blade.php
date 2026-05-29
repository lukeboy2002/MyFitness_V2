<a wire:navigate {{ $attributes->merge(['class' => 'text-secondary hover:text-primary text-xs']) }}>
    {{ $slot }}
</a>
