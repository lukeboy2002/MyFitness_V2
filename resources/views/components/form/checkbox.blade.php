@props([
    'id',
    'name',
    'value' => '1',
    'checked' => false,
    'label' => null,
])

<div {{ $attributes->class(['block'])->only('class') }}>
    <label for="{{ $id }}" class="inline-flex items-center cursor-pointer">
        <input
            id="{{ $id }}"
            type="checkbox"
            name="{{ $name }}"
            value="{{ $value }}"
            {{ $checked ? 'checked' : '' }}
            {{ $attributes->whereDoesntStartWith('class')->merge(['class' => 'bg-surface-secondary rounded-sm border-border text-secondary shadow-xs focus:ring-secondary']) }}
        >

        <span class="ms-2 text-sm text-muted">
            {{ $slot->isEmpty() ? $label : $slot }}
        </span>
    </label>
</div>
