<div class="px-2 py-2">

    <div class="flex justify-center items-center text-white shadow-lg py-2 px-2 rounded-lg" :class="{'bg-yellow-600': !dark, 'bg-indigo-900': dark}">
        <div class="text-sm mr-2">
            {{ __('Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
    
            <div class="flex-shrink">
                <button type="submit" class="px-2 py-1 text-sm rounded"  :class="{'text-white bg-blue-600 hover:bg-blue-800': !dark, 'text-white bg-green-800 hover:bg-green-900': dark}">Resend Verification Email</button>
            </div>
        </form>
    </div>
    
</div>