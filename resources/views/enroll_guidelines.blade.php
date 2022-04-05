@section('ext_css')
    
@endsection

@extends('layouts.app')

@section('content')
    <svg class="transform rotate-180 fill-current text-green-700 w-full h-16" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 75"> <defs> <style> .a { fill: none; } .b { clip-path: url(#a); } .c, .d { fi_ll: #b228c9; } .d { opacity: 0.5; isolation: isolate; } </style> <clipPath id="a"> <rect class="a" width="1920" height="75"></rect> </clipPath> </defs> <g class="b"> <path class="c" d="M1963,327H-105V65A2647.49,2647.49,0,0,1,431,19c217.7,3.5,239.6,30.8,470,36,297.3,6.7,367.5-36.2,642-28a2511.41,2511.41,0,0,1,420,48"></path> </g> <g class="b"> <path class="d" d="M-127,404H1963V44c-140.1-28-343.3-46.7-566,22-75.5,23.3-118.5,45.9-162,64-48.6,20.2-404.7,128-784,0C355.2,97.7,341.6,78.3,235,50,86.6,10.6-41.8,6.9-127,10"></path> </g> <g class="b"> <path class="d" d="M1979,462-155,446V106C251.8,20.2,576.6,15.9,805,30c167.4,10.3,322.3,32.9,680,56,207,13.4,378,20.3,494,24"></path> </g> <g class="b"> <path class="d" d="M1998,484H-243V100c445.8,26.8,794.2-4.1,1035-39,141-20.4,231.1-40.1,378-45,349.6-11.6,636.7,73.8,828,150"></path> </g> </svg>
    <h1 class="text-center flex items-center flex-col display-1 py-5 text-3xl font-semibold text-shadow tracking-wide" :class="{'text-gray-900': !dark, 'text-white': dark}">
        <span class="text-4xl border-b pb-2 lg:pb-4 border-red-400">Hikel's Got Talent - Enrollment Guidelines</span>
        <p class="text-sm font-base py-1 text-2xl mt-2 text-gray-500 font-normal">Thank you for sharing your talents to the world! Enroll Now and win more than US$10,000 Plus Golden buzzer Cashes.</p>
    </h1>
    {{-- <div class="w-4/5 sm:w-3/5 z-10 top-28 relative mx-auto shadow-lg px-4 py-8 bg-gray-900 text-white"> --}}
    <div class="px-4 lg:px-16 py-3 text-lg" :class="{'text-gray-900': !dark, 'text-white': dark}">

        <h1 class="text-2xl font-semibold mb-2 lg:mb-4">If you are new here or don’t know how HGT works, please read the tips and rules below.</h1>
        <h2 class="text-xl mb-1">With Hikel’s Got Talent you:</h2>
        <ul class="list-disc flex flex-col space-y-2 lg:px-8">
            <li>Will share your talent to the world.  </li>
            <li>Compute with international talented people. It doesn’t matter the place you are living in. </li>
            <li>Win more than 10,000$ in every single computation. </li>
            <li>Get 250$ when you get 1K golden buzzers (0.25$ for every single golden buzzer hit). It doesn’t matter whether you win the HGT or not, you can get real money from your golden buzzers.</li>
            <li>No need for transportation, hotel, dressing and other costs. You will act from your own sweet home without getting nervous (if you may be afraid of judges or the crowd you cannot share what you have freely. So HGT is perfect place for you). You just record your act and upload on HGT. </li>
            <li>Win by the number of votes you get. If you get the highest vote, you will win HGT. </li>
            <li>The golden buzzer helps you get more votes as well as real cash. If you get 1 golden buzzer, you may get up to 1000 votes plus cash. So encourage people to hit your golden buzzer</li>
            <li>Represent your country. You are computing not only for yourself, it’s for your county too</li>
            <li>Can work with companies like promotion, sound track, movies, modeling, standup comedy or other if someone is interested on you and tell us they need you.</li>
            <li>We will send you the certificate if you are in the top 10 lists of HGT winners</li>
            <li>conspiracy-related contents explaining this world is not existed or related explanations</li>
            <li>contents containing acts that violates the rules and laws of the constitutions of united states of America government</li>
        </ul> <br>
        <b>N.B :</b> when you record your act from your home, you must use original content of you. You cannot edit your sound (if you are a singer), your dance movies, or you do not use other people’s voice as yours. If you do that, we may remove your content. You can act with instruments or just with your own voice. It is better when you use some nice background places that may promote your country, it may help you to get more votes from your country’s fans and others who live in the world.  
        <br>
        <p class="text-xl font-medium py-2">Do not forget to express yourself with less than 30 seconds before you act. Your way of life you are living may help you to win HGT.</p> 
        <div class="flex mx-auto justify-center items-center my-6">
            <a href="{{ route('enroll') }}" class="flex items-center px-4 py-1 bg-pink-900 hover:bg-pink-800 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-white mr-2 w-3 h-3" viewBox="0 0 24 24"><path d="M17.026 22.957c10.957-11.421-2.326-20.865-10.384-13.309l2.464 2.352h-9.106v-8.947l2.232 2.229c14.794-13.203 31.51 7.051 14.794 17.675z"/></svg>
                <span>Back</span>
            </a>
        </div>
    </div>

    
@endsection
