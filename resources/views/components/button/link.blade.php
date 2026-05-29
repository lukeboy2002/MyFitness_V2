<button {{ $attributes->merge(['type' => 'submit', 'class' => 'text-secondary hover:text-primary text-xs']) }}>
    {{ $slot }}
</button>
