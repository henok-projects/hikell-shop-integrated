<div class="w-full px-8 leading-normal lg:w-4/5">
    <div class="font-sans">
        <h1 class="pt-6 pb-2 font-sans text-xl uppercase break-normal">Stocks</h1>
        <hr class="border-b border-gray-400">
    </div>
    @if(session('message'))
        <x-request-response class="mb-4" :message="session('message')" />
    @endif
   
    <div class="flex flex-col w-full" onmouseenter="showPlayIcon(this)" onmouseleave="hidePlayIcon(this)">
        <div class="flex flex-col flex-1 mx-2 md:flex-row lg:flex-row">
            <div class="w-full h-auto mb-2 border border-gray-300 border-solid rounded shadow-sm">
                <div class="px-2 py-3 bg-gray-200 border-b border-gray-200 border-solid">
                    All Products
                </div>
               <livewire:dashboard-content-list :content="$content"/>
            </div>
        </div>
    </div>
    </div>
</div>
