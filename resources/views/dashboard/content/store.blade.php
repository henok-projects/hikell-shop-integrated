<div class="w-full px-8 leading-normal lg:w-4/5">
    <div class="font-sans">
        <h1 class="pt-6 pb-2 font-sans text-xl uppercase break-normal">{{ $content  }}</h1>
        <hr class="border-b border-gray-400">
    </div>
    @if(session('message'))
        <x-request-response class="mb-4" :message="session('message')" />
    @endif

    <div class="flex flex-col w-full">
    <h2>Overview</h2>
      <livewire:dashboard-content-list :content="$content"/>
    </div>
</div>
@section('ext_js')
    <script>
        $("input[name='avatar']").change(function(e) {
            var file = e.target.value.split('\\');
            var fileName = file[file.length - 1];

            $("span#selectedAvatar").text(fileName);
        });
    </script>
@endsection
