@props(['books', 'icon', 'title'])

<div class="relative" style="padding-top: 56.25%">

    <iframe class="absolute inset-0 w-full h-full"  src="{{ asset("storage/books/" . $books->location) }}#toolbar=0" frameborder="0" </iframe>
        {{-- <iframe class="absolute inset-0 w-full h-full"  src="{{ Storage::disk('s3')->temporaryUrl("books/".$books->location, '+2 minutes') }}#toolbar=0" frameborder="0"iframe>
 --}}

</div>


