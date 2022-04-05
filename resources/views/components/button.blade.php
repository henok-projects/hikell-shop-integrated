<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-1 bg-blue-800 border border-transparent font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 rounded-full focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
