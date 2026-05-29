@props(['pageTitle' => ''])

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{
    sidebarOpen: localStorage.getItem('sidebarOpen') === 'true',
    toggleSidebar() {
        this.sidebarOpen = !this.sidebarOpen;
        localStorage.setItem('sidebarOpen', this.sidebarOpen);
    }
}"
      x-on:appearance-updated.window="
        if ($event.detail.theme === 'dark' || ($event.detail.theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
      "
      x-on:language-updated.window="window.location.reload()">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script data-navigate-once>
        window.applyTheme = () => {
            const theme = @js(auth()->user()?->preferred_theme ?? 'system');

            if (theme === 'dark' || (theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark')
            }
        }

        window.applyTheme();

        document.addEventListener('livewire:navigated', window.applyTheme);
    </script>
    @livewireStyles

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
    @stack('styles')
</head>
<body class="bg-background text-primary font-sans antialiased transition-colors duration-200 min-h-dvh">

<x-menu.sidebar/>

<div>
    <div class="flex flex-col min-h-screen transition-all duration-300"
         :class="sidebarOpen ? 'md:pl-48' : 'md:pl-16 lg:pl-48'">
        <x-menu.top/>

        <main class="pb-24 md:pb-8 flex-1">
            <div class="px-4 py-5 max-w-5xl mx-auto w-full">
                {{ $slot }}
            </div>
        </main>
    </div>
</div>

<x-menu.phone/>

@livewireScripts
@stack('scripts')

</body>
</html>
