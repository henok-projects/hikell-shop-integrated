<div class="flex items-center justify-center pt-8 w-full">
    <form action="/search" method="POST">
        @csrf
    <input wire:model="searchQu" type="text" name="q" class="px-12 py-1 flex text-center rounded-full lg:text-3xl sm:text-xl" placeholder="Search...">
    </form>    
</div>
<div class="absolute z-20 flex flex-col w-full text-white bg-gray-700" id="searchResults">

</div>
@if(isset($supports))
<div class="px-32 py-1 md:py-2 lg:py-3 flex text-center text-2xl text-blue-400">
    @foreach($supports as $support)
        <div>{{ $support->question }}</div>
    @endforeach

</div>

@endif
