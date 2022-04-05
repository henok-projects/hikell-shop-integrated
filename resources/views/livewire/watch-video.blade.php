@php
$curUser = auth()->user();
$rentExpired = false;
if($subscription && $subscription->type === "rent")
{
    // check if rent has expired.
    $startTime = strtotime($subscription->created_at);
    $endTime = strtotime(Carbon::now());
    $startTime = Carbon::parse($subscription->created_at);
    $endTime = Carbon::parse(Carbon::now());
    $mins = $endTime->diffInMinutes($startTime, true);
    $hourSinceRented = $mins / 60;
    $rentExpired = $hourSinceRented > 72 ? true : false;
}
@endphp
<div wire:init='loadVideo' class="relative">
    @if (!$isloading)
        <video controls class="max-h-lg w-full object-cover vidElement mejs__player" id="mejs__player_id" {!! $video->video_type == "movie" ||
            $video->video_type == "tv_show" ? 'onplay="openFullscreen()"' : '' !!}
            style="height: 100% !important;"
            poster="{{ asset('storage/thumbnails/'.$video->thumbnail) }}"
            src="{{ asset('storage/videos/' . $video->location) }}"
            type="video/mp4" data-mejsoptions='{"pluginPath": "/path/to/shims/", "alwaysShowControls": "true"}'>
        </video>
    <!-- Video payment modal  -->
    <div class="absolute top-0 left-0 z-50 flex items-center justify-center hidden w-full h-full vidPayment"
        style="background-color: rgba(0,0,0,.5);">
        <!-- A basic modal dialog with title, body and one button to close -->
        <div class="w-1/2 h-auto p-4 mx-auto my-auto text-left bg-gray-800 rounded shadow-xl md:p-4 lg:p-6"
            @click.away="$('div.vidPayment').addClass('hidden')">
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="py-2 text-2xl font-medium leading-6 text-gray-200">
                    Video Payment
                </h3>

                <div class="mt-2">
                    <div class="flex items-center">
                        <x-label class="mr-3 text-base" for="buy_or_rent" :value="__('Buy or rent:')" />
                        @if($video->buy_fee)
                        <input type="radio" name="buy_or_rent" value="buy" class="mr-2 text-blue-500" /> Buy
                        @endif
                        @if($video->rent_fee)
                        <input type="radio" name="buy_or_rent" value="rent" class="ml-2 ml-6 mr-2 text-blue-500" /> Rent
                        @endif

                        <input type="radio" name="buy_or_rent" value="subscribe" class="ml-2 ml-6 mr-2 text-blue-500" />
                        Subscribe
                    </div>
                    <input type="hidden" name="payment_id" value="rent" class="ml-2 ml-6 mr-2 text-blue-500" />
                </div>
                <div id="msgBox" class="mt-3"></div>
            </div>
            <div class="flex items-center justify-between w-full">
                <div class="flex flex-col items-start paypalOption">
                    <div id="paypal-button-container" class="w-full mx-auto mt-3"></div>
                </div>
                <button class="px-2 py-1 mt-3 text-white bg-blue-800 rounded hover:bg-blue-900"
                    name="continue">Continue</button>
            </div>

            <!-- One big close button.  --->
            <div class="mt-5 sm:mt-6">
                <span class="flex rounded-md shadow-sm w-ful_l">
                    <button @click="$('div.vidPayment').addClass('hidden')"
                        class="inline-flex justify-center w-full px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">
                        Close
                    </button>
                </span>
            </div>

        </div>
    </div>

    <script>
        // $(document).ready(function(){

            $('.mejs__player').mediaelementplayer({
                pluginPath: "/path/to/shims/",
                // When using jQuery's `mediaelementplayer`, an `instance` argument
                // is available in the `success` callback
                success: function(mediaElement, originalNode, instance) {
                    // do things
                }
            });



            $('svg.mejs__icon-fullscreen, svg.mejs__icon-unfullscreen').click(function() {
                let isFull = $('video#mejs__player_id_html5').hasClass('vidElement')
                console.log('Is FullScreen: ', isFull);
                if(isFull)
                    $('video#mejs__player_id_html5').removeClass("vidElement")
                else
                    $('video#mejs__player_id_html5').addClass("vidElement")
            });


        // });
    </script>
        @if($video->hgt==0&& (($watch_user != $video->user_id || $watch_user != $video->original_owner)) &&(!$subscription
        && $video->rent<1 && $video->buy<1 ) && !$free_trial )
        <script>
            $("#mejs__player_id").on("timeupdate", function(e) {
                var second = parseInt($("#mejs__player_id").get(0).currentTime);
                if (second > 5) {
                    $("#mejs__player_id").get(0).currentTime = 0;
                    $("#mejs__player_id").get(0).pause();
                    $("#mejs__player_id").prop('muted', true);
                    $("#seek").prop("disabled", "disabled");
                    $("div.vidPayment").removeClass('hidden')
                }
            });
            $("input[name='buy_or_rent']").change(function(e) {
                let choice = e.target.value;
                let cardEndpoint = "/video/pay";
                let descr = "Hikel video payment - buy"; // for stripe
                let rent_fee = '{{ $video->rent_fee * 100 }}';
                let buy_fee = '{{ $video->buy_fee * 100 }}';
                var sub_fee = '{{ $video->site->sub_fee * 100 }}';
                var fee = choice === "rent" && rent_fee != '' ? rent_fee : buy_fee;
                var title = choice === "rent" && rent_fee != '' ? "Rent" : "Buy"
                var caid = "{{$video->site->connected_account_id}}";

                if (choice === "subscribe" && sub_fee != '') {
                    window.location.href = `/subscription_pricing/${caid}/watch${"{{$video->video_id}}"}`
                } else {
                    $("button[name='continue']").click(function(e) {
                        let urlParam = `subscribe-any-service/${title}/${fee}/${caid}/watch${"{{$video->video_id}}"}`;
                        window.location.href = `/${urlParam}`
                    })
                }
            });
        </script>
        @endif
    @else
    <video controls width="100%" style="height:auto;max-height:500px;max-width:1150px;object-fit: cover;"
        class="max-h-screen mejs__player_id" id="mejs__player_id_2"
        poster="{{ asset('images/icon.png') }}"
        type="video/mp4">
    </video>
    @endif
</div>
