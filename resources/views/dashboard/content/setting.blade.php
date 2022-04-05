<div class="w-full px-8 leading-normal lg:w-4/5">
    <div class="font-sans">
        <h1 class="pt-6 pb-2 font-sans text-xl uppercase break-normal">{{ $content  }}</h1>
        <hr class="border-b border-gray-400">
    </div>
    @if(session('message'))
        <x-request-response class="mb-4" :message="session('message')" />
    @endif

    <div class="flex flex-col w-full">
        <form action="{{ route('setting.profile',auth()->user()->user_id) }}" enctype="multipart/form-data" class="relative w-full" method="post">
            @csrf
            @method('put')
            <div class="flex flex-col space-y-3">
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="first_name" :value="__('First Name')" />
                    <x-input placeholder="First Name" id="first_name" class="mt-1" type="text" name="first_name" :value="auth()->user()->first_name" required autofocus />
                </div>
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="last_name" :value="__('Last Name')" />
                    <x-input placeholder="Last Name" id="last_name" class="mt-1" type="text" name="last_name" :value="auth()->user()->last_name" required />
                </div>
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="email" :value="__('Email')" />
                    <x-input placeholder="Email" id="email" class="mt-1" type="email" name="email" :value="auth()->user()->email" required />
                </div>
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="avatar" :value="__('Avatar')" />
                    <div class="flex flex-col items-start space-y-2">
                        <label class="relative flex items-center px-6 py-4 tracking-wide uppercase border border-gray-500 border-dashed rounded-lg shadow-lg cursor-pointer text-blue hover:text-white"  :class="{'hover:border-gray-500 hover:bg-gray-500': !dark, 'hover:border-gray-800 hover:bg-gray-700': dark}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                            <input type='file' class="absolute left-0 hidden w-full bottom-3" accept="image/*" id="avatar" name="avatar" />
                        </label>
                        <span class="text-green-700 break-all" id="selectedAvatar">&nbsp;</span>
                    </div>
                </div>
                <div class="flex items-center justify-end">
                    <button class="absolute bottom-0 right-0 flex items-center justify-between px-3 py-1 text-lg text-white bg-blue-800 rounded hover:bg-blue-900">
                        <span>Update</span>
                    </button>
                </div>
            </div>

        </form>

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
