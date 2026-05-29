<header class="md:hidden sticky top-0 z-40 flex items-center justify-between px-4 h-14 bg-surface backdrop-blur-sm">
    <div class="flex items-center">
        <a href="/" class="flex items-center shrink-0 md:hidden">
            <img src="{{ asset('storage/logo/logo.png') }}" alt="logo" class="w-12 h-12">
            <span
                class="ml-1 font-bold font-theme text-lg tracking-widest text-secondary overflow-hidden whitespace-nowrap transition-opacity duration-300">
                    MyFitness
                </span>
        </a>
    </div>
    <div class="flex md:hidden items-center">

        <a href="{{ url()->previous() }}"
           class="flex items-center p-2 rounded-full text-primary hover:bg-surface-hover transition">
            <x-lucide-arrow-big-left-dash class="w-5 h-5"/>
        </a>

        <a href="{{ route('profile.edit') }}"
           class="flex items-center p-2 rounded-full text-primary hover:bg-surface-hover transition">
            <x-lucide-pen class="w-5 h-5"/>
        </a>
        <a href="{{ route('profile.index') }}"
           class="flex items-center p-2 rounded-full text-primary hover:bg-surface-hover transition">
            <x-lucide-cog class="w-5 h-5"/>
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}"
               class="flex items-center p-2 rounded-full text-primary hover:bg-surface-hover transition"
               onclick="event.preventDefault(); this.closest('form').submit();"
            >
                <x-lucide-log-out class="w-5 h-5"/>
            </a>
        </form>
    </div>
</header>
