@php
$icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
    <path fill="#e91e63"
        d="M3 6c-.55 0-1 .45-1 1v13c0 1.1.9 2 2 2h13c.55 0 1-.45 1-1s-.45-1-1-1H5c-.55 0-1-.45-1-1V7c0-.55-.45-1-1-1zm17-4H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8 12.5v-9l5.47 4.1c.27.2.27.6 0 .8L12 14.5z">
    </path>
</svg>';
$icon1 = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
    <path fill="#2196F3"
        d="M16.85 6.85l1.44 1.44-4.88 4.88-3.29-3.29c-.39-.39-1.02-.39-1.41 0l-6 6.01c-.39.39-.39 1.02 0 1.41.39.39 1.02.39 1.41 0L9.41 12l3.29 3.29c.39.39 1.02.39 1.41 0l5.59-5.58 1.44 1.44c.31.31.85.09.85-.35V6.5c.01-.28-.21-.5-.49-.5h-4.29c-.45 0-.67.54-.36.85z">
    </path>';
    @endphp
    @extends('layouts.app')


    @section('ext_css')
    <style>
    section.landing {
        background: url('{{ asset("images/hgt2.jpg") }}');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>

    @endsection



    @section('content')

    <!--Modal-->
    <div x-cloak id="helpMenu" x-data="{isModalOpen:true}" @keydown.escape="isModalOpen=false"
        class="z-50 fixed w-full h-full top-0 left-0 flex items-center justify-center" x-show="isModalOpen">
        <div class="absolute w-full h-full bg-white opacity-95"></div>
        <div class="modal-container fixed w-full h-full z-50 overflow-y-auto ">
            <div @click="isModalOpen=false"
                class="absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-black text-sm z-50">
                <svg @click="isModalOpen=false" class="fill-current text-black" xmlns="http://www.w3.org/2000/svg"
                    width="18" height="18" viewBox="0 0 18 18">
                    <path
                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                    </path>
                </svg>
                (Esc)
            </div>

            <!-- Add margin if you want to see grey behind the modal-->
            <div class="container mx-auto h-auto text-left p-4">

                <!--Title-->
                <div class="flex flex-col justify-center items-center pb-2">
                    <h1 class="text-lg font-bold mb-4 lg:mb-10 md:text-xl lg:text-3xl">Thank for your interest working
                        with hikell.com</h1>
                    <h2 class="mb-4 lg:mb-10 text-lg md:text-xl lg:text-2xl font-semibold">What are you looking for?
                        Below are some tips to help you choose your needs.</h2>
                </div>

                <!--Body-->
                <div class="container mx-auto px-2 py-2" x-data="{first:false,second:false,third:false}">
                    <div class="leading-loose text-lg mt-6">
                        <div>
                            <button class="w-full font-bold  py-3 flex justify-between items-center mt-1 lg:mt-4"
                                @click="first=!first" @click.away="first = false">
                                <div>Launch your site or Sell your contents over 200+ countries</div>
                                <svg x-show="!first" class="fill-current" viewBox="0 0 24 24" width="24" height="24">
                                    <path class="heroicon-ui"
                                        d="M12 22a10 10 0 110-20 10 10 0 010 20zm0-2a8 8 0 100-16 8 8 0 000 16zm1-9h2a1 1 0 010 2h-2v2a1 1 0 01-2 0v-2H9a1 1 0 010-2h2V9a1 1 0 012 0v2z" />
                                </svg>
                                <svg x-show="first" class="fill-current" viewBox="0 0 24 24" width="24" height="24">
                                    <path class="heroicon-ui"
                                        d="M12 22a10 10 0 110-20 10 10 0 010 20zm0-2a8 8 0 100-16 8 8 0 000 16zm4-8a1 1 0 01-1 1H9a1 1 0 010-2h6a1 1 0 011 1z" />
                                </svg>
                            </button>

                            <div class=" mt-1" x-show="first">
                                <p>What do you have? Videos like movies, TV shows, Music, tutorials, funny videos?
                                    eBooks or podcasts? </p>
                                <p>Whether you are an owner of the content or a distributor, you can sell your contents
                                    worldwide; receive your money from <b>200+</b> countries.</p>
                                <p>We help you accept payments like <span class="font-bold"> visa, MasterCard, American
                                        Express, JCB, Discover, Cartes Bancaires, Interac and all available card
                                        payments including China Union pay, PayPal, apple pay, Google pay, stripe,
                                        etc.</span></p>
                                <p>You do not need a US merchant or bank account if you live outside the US. Sell
                                    borderless from your home country. </p>
                                <p>You don't need to build your own website. If you do, It costs you for storage,
                                    bandwidth, SEO, email service, employees to build and maintain it, US merchant
                                    account to receive international payments, etc. </p>
                                <p>But, you can build your own video streaming site like your own YouTube or Netflix
                                    from hikell.com with the cheapest price. It won't take 2 minutes to build that or
                                    cost you a lot of money. </p>
                                <p>Don't bother about the number of customers you will get after you start selling. Your
                                    contents will be watched and sold from your site and also hikell.com site without
                                    you paying an extra single fee to <a href="https://hikell.com"
                                        class="text-blue-500">hikell.com</a> (free for on demand videos).</p>
                                <p>We also prepared an affiliate program for you (optional). That means people will help
                                    you to sell your contents worldwide and they get paid by selling your contents for
                                    you. You can also Re-use other people's contents and make
                                    money through their affiliate program if your contents don't get sold as you
                                    expected.</p>
                                <p>So, to do this, please visit <a href="https://hikell.com/launch_site"
                                        class="text-blue-500">Launch Site</a> and start selling now.</p>

                            </div>
                        </div>
                        <div>
                            <button class="w-full font-bold  py-3 flex justify-between items-center mt-1 lg:mt-4"
                                @click="second=!second" @click.away="second = false">
                                <div>Hikel's (world) Got Talent (HGT)</div>
                                <svg x-show="!second" class="fill-current" viewBox="0 0 24 24" width="24" height="24">
                                    <path class="heroicon-ui"
                                        d="M12 22a10 10 0 110-20 10 10 0 010 20zm0-2a8 8 0 100-16 8 8 0 000 16zm1-9h2a1 1 0 010 2h-2v2a1 1 0 01-2 0v-2H9a1 1 0 010-2h2V9a1 1 0 012 0v2z" />
                                </svg>
                                <svg x-show="second" class="fill-current" viewBox="0 0 24 24" width="24" height="24">
                                    <path class="heroicon-ui"
                                        d="M12 22a10 10 0 110-20 10 10 0 010 20zm0-2a8 8 0 100-16 8 8 0 000 16zm4-8a1 1 0 01-1 1H9a1 1 0 010-2h6a1 1 0 011 1z" />
                                </svg>
                            </button>

                            <div class=" mt-1" x-show="second">
                                <p>Do you have talents like singing, dancing, comedy, drama, imitating, sports, or other
                                    skills to show the world?
                                </p>
                                <p>
                                </p>
                                <p>With Hikel's Got Talent, you can share your talents to the world without leaving your
                                    home or losing money for hotel, meal or transportation. You don't need to go live
                                    either.</p>
                                <p>Wherever you are, you simply record your talent and upload it on HGT. You win by the
                                    number of votes you will get. If you get the highest votes, you will win more that
                                    10,000$ in each computation. If you don't win,
                                    you can still get paid by the number of golden buzzers you earn. </p>
                                <p>So don't waste your talent. Share it now to the world and let it be the starter of
                                    your dream life.</p>
                                <p>To apply for HGT please enroll now here: <a href="https://hikell.com/enroll"
                                        class="text-blue-500"> Click Now</a> </p>
                            </div>
                        </div>
                        <div>
                            <button class="w-full font-bold py-3 flex justify-between items-center mt-1 lg:mt-4"
                                @click="third=!third" @click.away="third = false">
                                <div>Hikel EK- No contents needed to earn</div>
                                <svg x-show="!third" class="fill-current" viewBox="0 0 24 24" width="24" height="24">
                                    <path class="heroicon-ui"
                                        d="M12 22a10 10 0 110-20 10 10 0 010 20zm0-2a8 8 0 100-16 8 8 0 000 16zm1-9h2a1 1 0 010 2h-2v2a1 1 0 01-2 0v-2H9a1 1 0 010-2h2V9a1 1 0 012 0v2z" />
                                </svg>
                                <svg x-show="third" class="fill-current" viewBox="0 0 24 24" width="24" height="24">
                                    <path class="heroicon-ui"
                                        d="M12 22a10 10 0 110-20 10 10 0 010 20zm0-2a8 8 0 100-16 8 8 0 000 16zm4-8a1 1 0 01-1 1H9a1 1 0 010-2h6a1 1 0 011 1z" />
                                </svg>
                            </button>

                            <div class=" mt-0" x-show="third">
                                <p>Don't you have any content to sell, enough money to create contents, talents to share
                                    worldwide or even not having a job at all? Don't worry; we have got your back. </p>
                                <p>Well with EK, you can easily make money without creating a single content.</p>
                                <h4>How? Easy! </h4>
                                <p>By re-using other people's contents through their affiliate program and also by
                                    selling hikell.com services on your behalf.</p>
                                <p>Have you ever imagined if you can re-use someone else's movie, TV show, music,
                                    tutorials or other video contents on your site without a copyright strike? With
                                    Hikel Ek, you can make 10% commission revenue from those contents
                                    you re-used (through their affiliate program) and 9% commission fee from hikell.com
                                    services. </p>
                                <p>To apply for EK <a href="https://hikell.com/eklink" class="text-blue-500"> Click
                                        Here</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="text-lg font-semibold mt-6">
                    Thank you for visiting hikell.com.
                    If you have extra questions about our services,
                    please don't hesitate to ask <a href="/support" class="text-blue-500">Here</a></h3>
                <div class="flex flex-col mt-4">
                    <span>Hikell LLC,</span>
                    <span>United States</span>
                    <span>30 N Gould St, Sheridan,WY</span>
                </div>
                <!--Footer-->
                <div class="flex justify-center pt-2 mb-10">
                    <button @click="isModalOpen=false"
                        class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Close</button>
                </div>

            </div>
        </div>
    </div>
    <div>

        <section
            class="relative flex flex-col items-center justify-center w-full space-y-4 text-xl text-white bg-gray-400 h-52 landing">
            <div class="absolute fixed z-10 w-full h-full bg-gray-800 opacity-30"></div>
            <h1 class="z-10 text-2xl font-bold md:text-5xl sm:text-3xl text-shadow">Hikel's Got Talent!</h1>
            <h3 class="z-10 text-lg font-semibold tracking-wider md:text-2xl">Create. Stream. Win $10,000+</h3>
            <div>
                <a href="{{ route('enroll') }}"
                    class="flex items-center px-2 py-1 text-white bg-blue-700 rounded shadow hover:bg-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="z-40 w-7 h-7" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M17,10.5L21,6.5V17.5L17,13.5V17A1,1 0 0,1 16,18H4A1,1 0 0,1 3,17V7A1,1 0 0,1 4,6H16A1,1 0 0,1 17,7V10.5M14,16V15C14,13.67 11.33,13 10,13C8.67,13 6,13.67 6,15V16H14M10,8A2,2 0 0,0 8,10A2,2 0 0,0 10,12A2,2 0 0,0 12,10A2,2 0 0,0 10,8Z">
                        </path>
                    </svg>
                    <span class="z-10 ml-1">Enroll now</span>
                </a>
            </div>
        </section>


        <div class="my-2"></div>
        @if(auth()->check() && auth()->user()->paid_for_site())
        <x-finish-creating-site class="w-20 h-20 text-gray-500 fill-current" />
        @endif
        <livewire:lead-board />
        <livewire:promotion-lists :promotionType="$premium" />
        <section class="flex flex-col px-6">
            <livewire:video-lists :videoType="$hgtVideos" :icon="$icon1" title="Hgt Videos" />
        </section>
        <section class="flex flex-col px-6 pb-6">
            <livewire:video-lists :videoType="$latestVideos" :icon="$icon" title="Latest Videos" />
        </section>
        @endsection

        @section('ext_js')
        <script>
        var helpMenuClosed = localStorage.getItem('helpMenuClosed');
        if (helpMenuClosed !== null) document.getElementById("helpMenu").remove();
        else localStorage.setItem('helpMenuClosed', true)


        function showPlayIcon(e) {
            $(e).find("svg.playCover,div.playCover").removeClass("hidden")
            $(e).find("span.playCover").removeClass("opacity-60")
        }

        function hidePlayIcon(e) {
            $(e).find("svg.playCover,div.playCover").addClass("hidden")
            $(e).find("span.playCover").addClass("opacity-60")
        }

        function windowSize() {
            var w = window.innerWidth;
            window.livewire.emit('grid', w);
        }
        window.addEventListener("resize", windowSize);
        </script>
        @endsection
