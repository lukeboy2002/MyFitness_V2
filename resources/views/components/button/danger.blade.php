<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full text-primary text-center bg-error hover:bg-error/80 active:bg-error/80 text-primary font-semibold px-2 py-1 rounded-md text-lg shadow-sm transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>


