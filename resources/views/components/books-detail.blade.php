    @foreach ($books as $book )
    <p type="element" class="pl-4 text-xl font-serif overflow-ellipsis">
        {{ $book->book_detail }}
        @endforeach

