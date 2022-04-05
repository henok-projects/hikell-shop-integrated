<div class="py-5 flex flex-col sm:justify-center items-center pt-6 sm:pt-10" :class="{'bg-gray-100': !dark, 'bg-transparent border-gray-900 md:border-gray-700': dark}">
    <div class="text-2xl" :class="{'text-gray-800': !dark, 'text-gray-100': dark}">
        {{ $logo }}
    </div>

    <div class="w-full mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg sm:{{ $size }}" :class="{'bg-white': !dark, 'bg-gray-800 text-white': dark}">
        {{ $slot }}
    </div>
</div>
