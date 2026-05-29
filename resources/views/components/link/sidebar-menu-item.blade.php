@props(['route', 'icon', 'label', 'active' => null])

@php
    $isActive = $active ?? request()->routeIs(str_replace('.index', '.*', $route));
@endphp

<a href="{{ $route !== '#' && Route::has($route) ? route($route) : '#' }}"
    {{ $attributes->merge([
        'class' => 'flex items-center px-4 py-3 transition-colors ' . ($isActive
            ? 'text-secondary bg-surface-hover'
            : 'text-primary hover:text-secondary hover:bg-surface-hover')
    ]) }}>
    <x-dynamic-component :component="'lucide-' . $icon" class="w-6 h-6 shrink-0"/>
    <span
        class="ml-4 font-medium overflow-hidden whitespace-nowrap transition-opacity duration-300"
        :class="sidebarOpen ? 'opacity-100' : 'opacity-0 lg:opacity-100'">
        {{ $label }}
    </span>
</a>
