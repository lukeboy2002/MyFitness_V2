@props([
    'title',
    'description' => null,
    'back' => null,
    'link' => null,
    'linkText' => null,
])

<div class="flex items-center justify-between mb-6">
    <div>
        <h2 class="text-2xl font-bold text-primary">{{ $title }}</h2>
        @if($description)
            <p class="mt-1 mb-2 text-sm text-muted">{{ $description }}</p>
        @endif
        @if($back)
            <x-link.default href="{{ $back }}" class="flex items-center gap-2">
                <x-lucide-arrow-big-left-dash class="h-4 w-4"/>
                {{ __('Back') }}
            </x-link.default>
        @endif
    </div>
    {{--    @if($link && $linkText)--}}
    {{--        <x-link.btn_small_primary href="{{ $link }}">--}}
    {{--            {{ $linkText }}--}}
    {{--        </x-link.btn_small_primary>--}}
    {{--    @endif--}}
</div>
