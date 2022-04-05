@extends('layouts.app')

@section('content')
    <div class="px-2 lg:px-14 py-4 text-lg" :class="{'text-gray-800': !dark, 'text-gray-100': dark}">

        <h1 class="text-3xl font-semibold">Who are we? What are we doing?</h1>
        <p class="mt-2">Hikell.com is a USA based website founded by Hikel LLC, to establish the goals of any worldwide user or company to create, modify and sell their video and other digital contents as well as re use other third party contents on their behalf and even sell their own knowledge.</p>  
        <p class="text-xl font-medium py-2">What we are having for you</p>
        <ul class="list-disc lg:px-8 px-4 py-3">
            <li><b>Hikel’s Got Talent</b> : You share your talent to the world and win more than 10,000$ in every single computation. You can also get 250$ per 1000 golden buzzer hits without winning the computation.</li>
            <li><b>Launch your own Site</b> :  Why do you upload your contents on other platforms for free or to gain small amount of cash? You need a better platform to stream your contents. With hikell.com , You can directly sell your  own movies, music, Tutorials, E-books, Podcasts and other services with fully integrated payment option (credit card and net banking)  directly from your own site and sell worldwide without worrying about hosting, storage, security, bandwidth and even having US bank account (You don’t need US bank account for receiving payments if you are not in USA)</li>
            <li><b>EK</b> : Don’t you have contents to sell? Talents to share to the world? Or don’t you have a job at all? Here is the good news to earn real benefit without creating contents. You can just apply for our EK and sell hikell.com services on your behalf  to earn real cash or just send your referral link to at least three of your friends and get 250$  every week (if you are the top one to share)</li>
            <li><b>Reuse and sell other third party contents</b> : if you don’t have any content to sell or don’t want to sell our services, you can still generate revenue by re using third party contents on our behalf. (this is one of EK service)</li>
            <li><b>Promote your services and products</b> : It is really hard to address your products to the people. With our promotion platform you can exactly know how many people watches your products because we always put your promotions on front. You will pay not by the number of people your ad get watched instead you will pay for how long your advertisement will be stay and watched on our website. Everyone enters into our website can see your ads weather they use our services or not. You may get millions of people watch your ads with even 100$.</li>
        </ul> 
        <div class="flex items-center justify-center flex-col space-y-2">
            <p>We do border less. You can work from wherever you are living without worrying about getting US bank accounts to receive payments (You can use your local bank account if you live outside U.S), server or domain name costs, security, SSL, storage and other issues. We resolve your stresses for you, you only worry about selling your contents and get paid.</p>

            <p>Need any other service or interested on contacting us? Don’t hesitate to meet; we are here to serve you.</p>
            <p><a href="mailto:support@hikell.com" class="font-semibold text-blue-800 hover:text-blue-700">support@hikell.com</a></p>
        </div>
        
    </div>
          
@endsection