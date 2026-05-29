@php

    $navItems = [
        ['route' => 'dashboard',        'icon' => 'house', 'label' => 'Home', 'adminOnly' => false],
//                ['route' => 'bodyparts.index',  'icon' => 'person-standing', 'label' => __('Body Parts'), 'adminOnly' => true],
//                ['route' => 'muscle.index',     'icon' => 'biceps-flexed', 'label' => __('Muscles'), 'adminOnly' => false],
//                ['route' => 'exercises.index',  'icon' => 'activity', 'label' => __('Exercises'), 'adminOnly' => false],
//                ['route' => 'workouts.index',   'icon' => 'layers', 'label' => 'Workouts', 'adminOnly' => false],
//                ['route' => 'statistics.index', 'icon' => 'chart-bar', 'label' => 'Stats', 'adminOnly' => false],
//                ['route' => 'calendar.index',   'icon' => 'calendar-days', 'label' => 'Calendar', 'adminOnly' => false],
//                ['route' => 'watchinfo.index',   'icon' => 'watch', 'label' => 'Watch Info', 'adminOnly' => false],
    ];

$navProfileItems = [
    ['route' => 'profile.edit',        'icon' => 'user', 'label' => __('Edit'), 'adminOnly' => false],
    ['route' => 'profile.password',  'icon' => 'lock', 'label' => __('Password'), 'adminOnly' => false],
    ['route' => 'profile.passkeys',  'icon' => 'fingerprint', 'label' => __('Passkeys'), 'adminOnly' => false],
    ['route' => 'profile.units',   'icon' => 'ruler', 'label' => __('Units'), 'adminOnly' => false],
    ['route' => 'profile.language', 'icon' => 'flag', 'label' => __('Language'), 'adminOnly' => false],
    ['route' => 'profile.appearance',   'icon' => 'sun-moon', 'label' => __('Theme'), 'adminOnly' => false],
]
@endphp

<nav
    class="hidden md:flex flex-col fixed left-0 top-0 bottom-0 z-50 bg-surface border-r border-border transition-all duration-300"
    :class="sidebarOpen ? 'w-48' : 'w-16 lg:w-48'">
    {{-- Sidebar Toggle Button --}}
    <div class="flex justify-end">
        <button @click="toggleSidebar()"
                class="hidden md:block lg:hidden p-1.5 rounded-md text-secondary transition-colors cursor-pointer">
            <x-lucide-menu x-show="!sidebarOpen" class="w-5 h-5"/>
            <x-lucide-x x-show="sidebarOpen" class="w-5 h-5"/>
        </button>
    </div>
    <div class="flex flex-col h-full py-4 overflow-hidden">
        <!-- Logo / Home icon -->
        <div class="flex items-center justify-between px-2 mb-8">
            <a href="{{ route('dashboard') }}" class="flex items-center shrink-0">
                <img src="{{ asset('storage/logo/logo.png') }}" alt="logo" class="w-12 h-12">
                <span
                    class="ml-1 font-bold font-theme text-lg tracking-widest text-secondary overflow-hidden whitespace-nowrap transition-opacity duration-300"
                    :class="sidebarOpen ? 'opacity-100' : 'opacity-0 lg:opacity-100'">
                    MyFitness
                </span>
            </a>
        </div>

        <div class="flex-1 space-y-2">
            @foreach ($navItems as $item)
                @if (!($item['adminOnly'] ?? false) || Auth::user()->is_admin)
                    <x-link.sidebar-menu-item
                        :route="$item['route']"
                        :icon="$item['icon']"
                        :label="$item['label']"
                    />
                @endif
            @endforeach

            {{-- Quick start session --}}
            <x-link.sidebar-menu-item
                route="#"
                icon="play-circle"
                label="{{ __('Start Workout') }}"
                onclick="event.preventDefault(); document.getElementById('sidebar-quick-start-form').submit();"
                class="lg:hidden"
                :active="false"
            />
        </div>

        <div class="border-y border-border space-y-2">
            <div class="flex-1 space-y-2">
                <div x-data="{ open: {{ request()->routeIs('profile.*') ? 'true' : 'false' }} }" class="w-full">
                    <!-- Hoofd knop -->
                    <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-3 transition-colors
                    {{ request()->routeIs('profile.*') ? 'text-secondary bg-surface-hover' : 'text-primary hover:text-secondary hover:bg-surface-hover' }}">
                        <div class="flex items-center">
                            @if (Auth::user()->avatar)
                                <img src="{{ asset (Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}"
                                     class="w-8 h-8 rounded-full object-cover shrink-0">
                            @else
                                <x-lucide-user-circle class="w-6 h-6 shrink-0"/>
                            @endif

                            <span
                                class=" hidden lg:block ml-4 font-medium overflow-hidden whitespace-nowrap transition-opacity duration-300"
                                :class="sidebarOpen ? 'opacity-100' : 'opacity-0 lg:opacity-100'">
                                {{ __("Profile") }}
                            </span>
                        </div>

                        <!-- Pijltje -->
                        <svg
                            class="w-4 h-4 transition-transform duration-200"
                            :class="open ? 'rotate-180' : ''"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <div x-show="open" x-collapse class="mt-1 flex flex-col space-y-2">
                        @foreach ($navProfileItems as $profile)
                            @if (!($profileitem['adminOnly'] ?? false) || Auth::user()->is_admin)
                                <x-link.sidebar-menu-item
                                    :route="$profile['route']"
                                    :icon="$profile['icon']"
                                    :label="$profile['label']"
                                    :active="request()->routeIs($profile['route'])"
                                />
                            @endif
                        @endforeach
                        <a href="{{ route('profile.delete') }}"
                           class="flex items-center px-4 py-3 transition-colors mb-2 bg-error
                           {{ request()->routeIs('profile.delete')
                            ? 'text-primary bg-error/80'
                            : 'text-primary hover:bg-error/80' }}">

                            <x-lucide-trash class="w-6 h-6 shrink-0"/>

                            <span
                                class="ml-4 font-medium overflow-hidden whitespace-nowrap transition-opacity duration-300"
                                :class="sidebarOpen ? 'opacity-100' : 'opacity-0 lg:opacity-100'">
        {{ __('Delete') }}
    </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-link.sidebar-menu-item
                route="#"
                icon="log-out"
                label="{{ __('Log Out') }}"
                onclick="event.preventDefault(); this.closest('form').submit();"
                :active="false"
            />
        </form>
    </div>
</nav>

{{-- Hidden form voor quick start (geen workout) --}}
{{--<form id="sidebar-quick-start-form" method="POST" action="{{ route('sessions.start') }}" class="hidden">--}}
<form id="sidebar-quick-start-form" method="POST" action="#" class="hidden">
    @csrf
</form>
