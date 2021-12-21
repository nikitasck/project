<button {{ $attributes->merge(['type' => 'submit', 'class' => 'dropdown-item bg-danger']) }}>
    {{ $slot }}
</button>
