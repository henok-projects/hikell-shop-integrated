<div class="w-full px-8 leading-normal lg:w-4/5">
    <div class="font-sans">
        <h1 class="pt-6 pb-2 font-sans text-xl uppercase break-normal">{{ $content  }}</h1>
        <hr class="border-b border-gray-400">
    </div>
    @if(session('message'))
        <x-request-response class="mb-4" :message="session('message')" />
    @endif
    <div class="flex flex-col w-full">
        <form action="{{ route('setting.password',auth()->user()->user_id) }}" class="relative w-full" method="post">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            @csrf
            @method('put')
            <div class="flex flex-col space-y-3">
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="current_password" :value="__('Current Password')" />
                    <x-input placeholder="Current Password" id="current_password" class="mt-1" type="password" name="current_password" required autofocus />
                </div>
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="new_password" :value="__('New Password')" />
                    <x-input placeholder="New Password" id="new_password" class="mt-1" type="password" name="new_password" required />
                </div>
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="new_password_confirmation" :value="__('Confirm Password')" />
                    <x-input placeholder="Confirm Password" id="new_password_confirmation" class="mt-1" type="password" name="new_password_confirmation" required />
                </div>
                <div class="absolute bottom-0 right-0 flex items-center justify-end mt-9">
                    <button class="flex items-center justify-between px-3 py-1 text-lg text-white bg-blue-800 rounded hover:bg-blue-900">
                        <span>Change</span>
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
