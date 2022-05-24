@php
$currentRoute = \Route::current();
$curUser = auth()->user();
use \App\Models\Site;
$sts = Site::all();
@endphp
<div class="container-fluid">
    <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
        <div class="col-lg-4">
            @foreach($sts as $stss)
            @if($currentRoute->site_id == $stss->site_id)
            <img src="{{asset('/storage/theme/'.$stss->site_avatar)}}" class="" style="width: 100px;"
                alt="Avatar" />
            @endif
            @endforeach
            </a>
            @foreach($sts as $sts)
            @if($currentRoute->site_id == $sts->site_id)
            <span class="px-2 ml-n1">
                <a href="{{ url($currentRoute->site_id.'/store' ) }}">
                    <span class="btn btn-white" style="font-size: 1.8em; font-family:bold;">
                        {{ ucfirst($sts->site_name) }}
                    </span></a>
            </span>
            @endif
            @endforeach
            </a>
        </div>
        @livewire('site-search-component')
        <div class="col-lg-4 col-6 text-right">
            <div class="btn-group">
                <img src="{{asset('/storage/avatars/'.$curUser->avatar)}}" class="rounded-circle dropdown-toggle"
                    data-toggle="dropdown" style="width: 60px;" alt="Avatar" />
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid bg-dark mb-30">
    <div class="row px-xl-5">
        <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                <span class="px-2 ml-n1">@if(auth()->user()->site)
                    @if(auth()->user()->site->connected_account_id != "")
                    <a href="{{ url(auth()->user()->site->site_id.'/store' ) }}"
                        class="text-decoration-none d-block d-lg-none">
                        <span class="btn btn-secondary" style="font-size: 1.8em; font-family:bold;">
                            {{ ucfirst($curUser->site->site_name) }}
                        </span></a>
                    @else
                    <a href="/stripeConnect" class="text-decoration-none d-block d-lg-none">
                        <span class="badge badge-secondary" style="font-size: 1.5em;">
                        </span></a>
                    @endif
                    @endif</span>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="/{{$currentRoute->site_id}}/store" class="nav-item nav-link navc active">Home</a>
                   @if(Cart::instance('cart')->count() > 0)
                        <a href="/{{$currentRoute->site_id}}/cart" class="nav-item nav-link navc">My Cart</a>
                    @endif
                        <a href="/{{$currentRoute->site_id}}/upload" class="nav-item nav-link navc">Upload</a>
                        <a href="/{{$currentRoute->site_id}}/allproduct" class="nav-item nav-link navc">My Product</a>
                        <a href="/{{$currentRoute->site_id}}/orders" class="nav-item nav-link navc">My Orders</a>
                    </div>
                    <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                        @livewire('site-cart-count-component')
                        @livewire('site-wishlist-count-component')
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>