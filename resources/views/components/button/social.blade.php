@props([
    'icon' => 'user-key',
])

<button {{ $attributes->merge([
    'class' => 'w-full bg-surface flex items-center justify-center hover:bg-surface-hover border border-border px-3 py-2 rounded-xl text-sm transition ease-in-out duration-150'
]) }}>

    @svg('lucide-' . $icon, 'w-4 h-4 mr-2')

    {{ $slot }}
</button>
