<div class="w-full px-8 leading-normal lg:w-4/5">
    <div class="flex items-center justify-between font-sans">
        <h1 class="pt-3 font-sans text-xl uppercase break-normal">{{ $content  }}</h1>
    </div>
    <hr class="border-b border-gray-400">
    <livewire:dashboard-content-list :content="$content"/>
</div>
