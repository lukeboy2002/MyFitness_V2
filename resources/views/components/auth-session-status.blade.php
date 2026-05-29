@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'flex font-medium text-xs text-success']) }}>
        <x-lucide-check class="h-4 w-4 mr-1"/>
        {{ $status }}
    </div>
@endif
