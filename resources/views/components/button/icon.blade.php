<button {{ $attributes->merge(['class' => 'bg-surface hover:bg-surface-hover border border-border px-3 py-2 rounded-xl text-sm transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
