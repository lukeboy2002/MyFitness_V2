@props([
    'value',
    'name',
    'checked' => false,
    'icon' => null,
])

<label aria-label="{{ $value }}"
    {{ $attributes->merge(['class' => 'group relative flex items-center justify-center rounded-md border border-border bg-secondary p-3 has-checked:border-secondary has-checked:bg-secondary/60 has-focus-visible:outline-2 has-focus-visible:outline-offset-2 has-focus-visible:outline-border has-disabled:border-border has-disabled:bg-secondary/10 has-disabled:opacity-25 cursor-pointer']) }}>
    <input type="radio"
           name="{{ $name }}"
           value="{{ $value }}"
           {{ $checked ? 'checked' : '' }}
           {{ $attributes->only(['wire:model', 'wire:model.live', 'wire:click', 'required', 'disabled']) }}
           class="hidden absolute inset-0 appearance-none focus:outline-none disabled:cursor-not-allowed"/>

    <span class="text-sm font-medium text-primary uppercase group-has-checked:text-primary flex items-center gap-2">
        @if($icon)
            <x-dynamic-component :component="$icon" class="h-4 w-4"/>
        @endif

        {{ $slot->isEmpty() ? ucfirst($value) : $slot }}
    </span>
</label>
