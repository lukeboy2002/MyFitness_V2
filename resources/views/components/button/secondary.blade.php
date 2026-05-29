<button {{ $attributes->merge(['class' => 'w-full bg-surface hover:bg-surface-hover active:bg-surface-hover text-primary font-semibold border border-border px-2 py-1 rounded-md text-lg shadow-sm transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>