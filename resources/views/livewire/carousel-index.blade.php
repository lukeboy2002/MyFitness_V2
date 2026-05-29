<div id="default-carousel" class="relative w-full" data-carousel="slide">

    <!-- Carousel wrapper -->
    <div class="relative overflow-hidden rounded-base aspect-video w-full lg:max-h-36">
        <!-- Logo overlay -->
        <div class="absolute z-100 flex justify-center items-center gap-3">
            <img src="{{ asset('storage/logo/logo.png') }}"
                 class="w-20"
                 alt="logo">
            <div class="font-theme text-3xl text-secondary">
                {{ config('app.name') }}
            </div>
        </div>

        @foreach($items as $item)
            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">

                <img src="{{ asset('storage/'. $item->image_path) }}"
                     class="absolute inset-0 w-full h-full object-cover opacity-50"
                     alt="{{ $item->author }}">
                @if($item->author)
                    <div
                        class="absolute z-100 right-0 bottom-0 flex justify-center items-center gap-1 py-2 px-2 text-muted text-xs ">
                        <span>
                            image by:
                        </span>
                        <a class="hover:underline" href="{{ $item->link }}" target="_blank">{{ $item->author }}</a>
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <!-- Indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                data-carousel-slide-to="4"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 6"
                data-carousel-slide-to="5"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 7"
                data-carousel-slide-to="6"></button>
    </div>
    <!-- Controls -->
    {{--    <button type="button"--}}
    {{--            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"--}}
    {{--            data-carousel-prev>--}}
    {{--                <span--}}
    {{--                    class="inline-flex items-center justify-center w-10 h-10 rounded-base bg-surface/30 group-hover:bg-surface/50 group-focus:ring-2 group-focus:ring-secondary group-focus:outline-none">--}}
    {{--                    <x-lucide-chevron-left class="w-5 h-5 text-secondary" aria-hidden="true"/>--}}
    {{--                    <span class="sr-only">Previous</span>--}}
    {{--                </span>--}}
    {{--    </button>--}}
    {{--    <button type="button"--}}
    {{--            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"--}}
    {{--            data-carousel-next>--}}
    {{--                <span--}}
    {{--                    class="inline-flex items-center justify-center w-10 h-10 rounded-base bg-surface/30 group-hover:bg-surface/50 group-focus:ring-2 group-focus:ring-secondary group-focus:outline-none">--}}
    {{--                    <x-lucide-chevron-right class="w-5 h-5 text-secondary" aria-hidden="true"/>--}}
    {{--                    <span class="sr-only">Next</span>--}}
    {{--                </span>--}}
    {{--    </button>--}}
</div>
