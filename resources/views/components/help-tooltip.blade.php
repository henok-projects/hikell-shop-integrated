<div class="flex flex-col items-center ml-2 md:flex-row">
    <!--Code Block for white tooltip starts-->
    <a  x-cloak x-data="{tooltip:false}" @click = "tooltip=!tooltip" @click.away = "tooltip = false" role="link" aria-label="tooltip" class="relative rounded-full focus:ring-offset-2 focus:ring-2 focus:bg-gray-200 md:mt-0" @mouseover="tooltip=true" @mouseout="tooltip=false">
        <div class="text-green-800 cursor-pointer mr-2" @click = "tooltip = !tooltip">
            <svg aria-haspopup="true" xmlns="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-help-circle">
                <circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line>
            </svg>
        </div>
        <div x-show="tooltip" role="tooltip" class="absolute left-0 z-20 w-64 px-4 py-2 -ml-6 transition duration-150 ease-in-out bg-gray-800 border border-gray-700 rounded shadow-lg ">
            <p class="pb-3 text-xs leading-4 text-white">{{ $tooltip }}</p>
        </div>
    </a>
</div>
