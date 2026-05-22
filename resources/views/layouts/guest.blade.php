@props(['pageTitle' => ''])

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

    <title>{{ $pageTitle }} - {{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.bunny.net/css?family=anton-sc:400" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @stack('styles')
</head>
<body class="bg-background text-primary font-sans antialiased transition-colors duration-200 min-h-dvh">

<div class="lg:hidden w-full relative shrink-0">
    <livewire:carousel-index/>
</div>
<div class="flex flex-row">
    <div class="hidden lg:flex lg:justify-center lg:items-center lg:w-1/2 lg:min-h-dvh">
        <img src="{{ asset('storage/logo/logo.png') }}" alt="logo" class="w-1/2">
    </div>
    <div
        class="w-full lg:w-1/2 min-h-[calc(100dvh-36rem)] lg:min-h-dvh flex flex-col justify-center items-center">
        <div class="w-full lg:max-w-2xl mx-auto px-8">
            <x-heading.h1 class="hidden lg:block text-center">{{ config('app.name', 'Laravel') }}</x-heading.h1>
            {{ $slot }}
        </div>
    </div>
</div>


@livewireScripts
@stack('scripts')
</body>
</html>
