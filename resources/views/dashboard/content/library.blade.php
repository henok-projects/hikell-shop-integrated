<div class="w-full px-8 leading-normal lg:w-4/5">
    <div class="flex justify-between font-sans">
        <h1 class="pt-6 pb-2 font-sans text-xl uppercase break-normal">{{ $content  }}</h1>
    </div>
    <div class="flex flex-col w-full px-3 py-2 text-sm text-gray-300 bg-gray-700 rounded shadow hover:bg-gray-800">
        You can add and use this video as intro for your HGT video.
    </div>
    <video id="video-player" class="flex flex-col w-full mt-3 text-sm text-gray-300 bg-gray-700 rounded shadow hover:bg-gray-800"
    controls poster="{{ asset('/hgtlibrary/hgt.jpeg') }}" src="{{ asset('/hgtlibrary/hgt.mp4') }}"/>

</div>
