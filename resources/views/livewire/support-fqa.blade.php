@if(isset($supports) && $supports->count() > 0)

<div class="flex-auto w-full p-3 mt-5 lg:ml-32 sm:ml-2">
    @foreach($supports as $support)
    <div x-data="{ open: false }" @click.away = "open = false" id="id{{ $support->id }}">
        <div class="mt-3">
        <button
        @click="open = !open"
            @click.away = 'open=false'
            :class="{'text-gray-900 hover:bg-gray-200': !dark, 'text-white hover:bg-gray-800': dark}"
            class="w-full flex justify-between items-center text-left lg:text-xl sm:text-base font-serif leading-relaxed py-2">
                {{ $support->question }}
        </button>
        <div x-show = "open" 
        :class="{'text-gray-900': !dark, 'text-white': dark}"
        class="w-full text-base px-6 font-serif leading-relaxed py-2">
            {{ $support->answer}}
        </div>
    </div>
</div>
@endforeach
<div
:class="{'text-gray-900 ': !dark, 'text-white': dark}" 
class="w-full text-xl font-mono p-8 mt-12">
    If you still have extra question contact us at <a href="mailto:support@hikell.com" class="text-green-600">support@hikell.com</a>
</div>
@else
    <div> No Data found!</div>
@endif
</div>
