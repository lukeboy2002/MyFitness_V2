@props([
    'type' => 'text',
    'name',
    'label',
    'value' => '',
    'required' => false,
])

<div class="relative z-0 w-full mb-5 group">
    <input type="{{ $type }}"
           name="{{ $name }}"
           id="{{ $name }}"
           value="{{ old($name, $value) }}"
           {{ $required ? 'required' : '' }}
           {{ $attributes->merge(['class' => 'text-muted block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-border appearance-none focus:outline-none focus:ring-0 focus:border-secondary peer']) }}
           placeholder=" "/>
    <label for="{{ $name }}"
           class="absolute text-sm text-muted duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-left peer-focus:inset-s-0 peer-focus:text-secondary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
        {{ $label }}
    </label>
</div>
