@props([
    'type' => 'text',
])

<input type="{{ $type }}" {{ $attributes->merge([
           'class' => 'bg-surface border border-border rounded-md text-primary text-sm focus:outline-none focus:border-secondary focus:ring-0 block w-full px-3 py-2.5 shadow-xs placeholder:text-muted' ]) }}/>


{{--TODO: Add red-border when error--}}
{{--<input type="text" name="name" value="{{ old('name') }}" required--}}
{{--       class="w-full rounded-xl border @error('name') border-red-400 @else border-gray-200 dark:border-gray-700 @enderror--}}
{{--                      bg-white dark:bg-gray-900 px-3 py-2.5 text-sm--}}
{{--                      focus:outline-none focus:ring-2 focus:ring-indigo-500">--}}