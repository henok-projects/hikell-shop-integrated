<div @switcher.window="isDark = $event.detail" class="flex z-50 block text-sm dropdown lg:inline-block lg:mt-0 float-right relative" x-data="{open: false, isDark: localStorage.getItem('theme') === 'dark'}">
    <span x-on:click="open = true" >{{ $trigger }}</span>
    <div
    x-show="open"
    x-ref="dropdownMenu"
    x-on:click.away="open = false"
    x-on:click.debounce="open = !open"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform -translate-y-2"
    x-transition:enter-end="opacity-100 transform translate-y-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-end="opacity-0 transform -translate-y-3"
    x-cloak>
        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="z-20 iconSize fill-current dropdownTri" :class="{'text-gray-100': !isDark, 'text-gray-800': isDark}" style="transform: rotate(-90deg);right:2px;" viewBox="0 0 20 20"><path d="M4 4l12 6-12 6z"/></svg> --}}
        {{ $slot }}
    </div>
</div>
