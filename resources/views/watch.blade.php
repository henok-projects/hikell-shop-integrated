@php
$curUser = auth()->user();
$masterLayout = $is_hgt === "1" ? 'layouts.app' : 'layouts.site_master';
@endphp

@extends($masterLayout)

@section('ext_css')
<link rel="stylesheet" href="/css/mediaelementplayer.min.css">
<style>
input#comment {
    border: none;
    border: 1px solid rgb(54, 54, 54) !important;
    /* border-radius: 100%; */
}
</style>
<script>
function openFullscreen() {
    var vid = document.getElementById('video_player')
    vid.play().catch(err => console.log(err));
    if (vid.requestFullscreen) {
        vid.requestFullscreen();
    } else if (vid.mozRequestFullScreen) {
        vid.mozRequestFullScreen();
    } else if (vid.webkitRequestFullscreen) {
        vid.webkitRequestFullscreen();
    } else if (vid.msRequestFullscreen) {
        vid.msRequestFullscreen();
    }
}
</script>
@endsection
@section('content')
<div class="flex py-2 pb-3 pl-2 lg:pl-8">
    <div class="flex flex-col items-start justify-between w-full text-white lg:flex-row"
        :class="{'text-white': dark, 'text-gray-600': !dark}">
        <div class="flex flex-col w-full pr-2 lg:w-10/12 lg:pr-0">
            {{-- Video, title, category, comments.... --}}
            <livewire:watch-video :watch="$video_id" :watch_user="$curUser->user_id" :free_trial="$freeTrial" />
            {{-- Video Category task buttons --}}
            {{-- Category GoldenBuzzer, Reuse, Vote, Like, Dislike --}}
            <livewire:watch-tasks :tasks="$video_id" :task_user="$curUser->user_id" />
            {{-- Video Comments --}}
            <livewire:watch-comments :comment_id="$video_id" :comment_user="$curUser->user_id" />
        </div>
        {{-- Owner name, subscribe btn, Ads, --}}
        <livewire:watch-subscription :subscribe="$video_id" :subscribe_user="$curUser->user_id" />
    </div>
</div>
</div>
@endsection

@section('ext_js')
<script src="/js/mediaplayer.min.js"></script>
<script>
var playTimeout;

$(".video-player").on("timeupdate", function(e) {
    playTimeout = setTimeout(function() {
        $(".video-player").get(0).pause();
        $(".video-player").get(0).currentTime = 0; // Restarts video
    }, 30000); // 30 seconds in ms
});

$(".video-player").on("pause", function(e) {
    clearTimeout(playTimeout);
    var confirm = window.confirm("Please, Select your payment plan and pay to continue watching this video.")
    if (confirm) {
        //got to payment
        window.location.href = "/launch_site"
    }
});
</script>

<script src="https://www.paypal.com/sdk/js?client-id={{ env('paypal_client_id') }}" defer></script>
<script defer src="https://js.stripe.com/v3/"></script>
<script src="/js/payments.js"></script>
    <script>
    window.addEventListener('showReporter', event => {
        $('div.vidReporter').removeClass('hidden');
    });

    window.addEventListener('hideReporter', event => {
        $('div.vidReporter').addClass('hidden');
    });

    window.addEventListener('closeReuse', event => {
        $('div#reuse-button').html('');
        $("#reuse-alert").html(event.detail.message);
        window.setTimeout(function() {
            $("#reuse-alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 2000);
    });

    function goldenBuzzerPayment(votes = 0) {
        var price = 0;
        // prices are in cents
        if (votes == 210) {
            votes = 210;
            price = 257;
        } else if (votes == 470) {
            votes = 470;
            price = 899;
        } else if (votes == 1000) {
            votes = 1000;
            price = 1499;
        }



        cardEndpoint = '/goldenbuzzer'; // get the votes amount using the paid price amount from payment session.
        if (price != 0) {
            var descr = "Hikel goldenbuzzer payment";
            var payload = {
                amount: parseFloat(price) / 100,
                success_url: '{{ url("/") }}' + cardEndpoint,
                descr,
                csrf_token: '{{ csrf_token() }}',
                video_id: '{{ $video_id }}',
                votes,
            }
            $("div#gb-paypal-button-container").remove();
            var newBtn = $('<div/>', {
                id: 'gb-paypal-button-container',
                class: 'w-full mt-3 mx-auto'
            });
            $(".gb-paypalOption").append(newBtn);
            if (newBtn)
                payWithPaypal(payload, "#gb-paypal-button-container")

            console.log(price, descr, "card", null, cardEndpoint, {
                video_id: '{{ $video_id }}',
                votes
            });

            requestPayment(price, descr, "card", null, cardEndpoint, {
                video_id: '{{ $video_id }}',
                votes
            });
        }
        $("div#gb-paypal-button-container").remove();
        var newBtn = $('<div/>', {
            id: 'gb-paypal-button-container',
            class: 'w-full mt-3 mx-auto'
        });
        $(".gb-paypalOption").append(newBtn);
        if (newBtn)
            payWithPaypal(payload, "#gb-paypal-button-container")

        console.log(price, descr, "card", null, cardEndpoint, {
            video_id: '{{ $video_id }}',
            votes
        });

        requestPayment(price, descr, "card", null, cardEndpoint, {
            video_id: '{{ $video_id }}',
            votes
        });
    }


window.addEventListener('closeGBModal', event => {
    $("#").addClass('hidden');
})

window.addEventListener('successReused', event => {
    $("reuse-message").html(
        "<i class='bg-green-5000'>Congratulations! you have successfully reused this video</i>");
    setTimeout(() => {
        window.livewire.emit('closeReuse');
    }, 2000);
})
</script>
<script>
// window.addEventListener('initiate', event => {
//     document.getElementById('video_player').src = " {{ asset('storage/videos') }}" + "/" + event
//         .detail
//         .source;
//     document.getElementById('video_player').poster = " {{ asset('storage/thumbnails') }}" + "/" +
//         event
//         .detail.poster;
//     window.livewire.emit('loadvideo');
// });
</script>
@endsection
