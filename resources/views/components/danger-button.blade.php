<button {{ $attributes->merge(['type' => 'button', 'class' => 'text-rose-500 hover:text-rose-700 mr-4 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
