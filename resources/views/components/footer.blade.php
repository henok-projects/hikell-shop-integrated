<div class="flex relative sm:flex-row py-4 px-3 shadow lg:px-6 flex-col-reverse justify-between items-center"
    :class="{'bg-gray-200 text-gray-900': !dark, 'bg-gray-800 text-gray-200': dark}">
    <div class="_lg:w-2/3 _w-full text-sm p-2 whitespace-no-wrap">
        <span class="lg:ml-6">Copyright © {{ date('Y') }} Hikel LLC. All rights reserved.</span>
    </div>
    <div class="flex items-center flex-col md:flex-row">
        <div class="flex items-center text-sm justify-center py-1 md:mr-6">
            <a href="/terms"
                :class="{'text-gray-900 hover:text-gray-600': !dark, 'text-gray-400 hover:text-gray-300': dark}"
                class="px-2 md:tracking-wider md:mr-2 tracking-wide">Terms of use</a>
            <a href="/privacy"
                :class="{'text-gray-900 hover:text-gray-600': !dark, 'text-gray-400 hover:text-gray-300': dark}"
                class="px-2 md:tracking-wider md:mr-2 tracking-wide">Privacy policy</a>
            <a href="/about"
                :class="{'text-gray-900 hover:text-gray-600': !dark, 'text-gray-400 hover:text-gray-300': dark}"
                class="px-2 md:tracking-wider md:mr-2 tracking-wide">About us</a>
            <a href="/support"
                :class="{'text-gray-900 hover:text-gray-600': !dark, 'text-gray-400 hover:text-gray-300': dark}"
                class="px-2 md:tracking-wider md:mr-2 tracking-wide">Contact us</a>
        </div>
    </div>
</div>