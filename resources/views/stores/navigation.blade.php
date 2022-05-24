<div class="container-fluid">
    <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
        <div class="col-lg-4">
            <a href="/home" >
                <img src="{{asset('assets/img/hikel-dark.png')}}" class="rounded-circle"
                     style="width: 150px;" alt="Avatar" />
                {{-- <span class="h4 text-uppercase text-white bg-dark px-2">Hikell store</span> --}}
                <span class="px-2 ml-n1">@if(auth()->user()->site)
                    @if(auth()->user()->site->connected_account_id != "")
                    <a href="{{ url(auth()->user()->site->site_id.'/store' ) }}">
                        <span class="btn btn-white" style="font-size: 1.8em; font-family:bold;">
                            {{ ucfirst($curUser->site->site_name) }}
                        </span></a>
                    @else
                    <a href="/stripeConnect" class="link-to-home">
                        <span class="badge badge-secondary" style="font-size: 1.5em;">

                        </span></a>
                    @endif
                    @endif</span>
            </a>
        </div>
             @livewire('search-component')
        <div class="col-lg-4 col-6 text-right">
            <div class="btn-group">
                <img src="{{asset('storage/theme/'.$curUser->avatar)}}" class="rounded-circle dropdown-toggle"
                    data-toggle="dropdown" style="width: 50px;" alt="Avatar" />

            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid bg-lighten mb-30">
    <div class="row px-xl-5">
        <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg bg-lighten navbar-dark py-3 py-lg-0 px-0">
                 <span class="px-2 ml-n1">@if(auth()->user()->site)
                    @if(auth()->user()->site->connected_account_id != "")
                    <a href="{{ url(auth()->user()->site->site_id.'/store' ) }}" class="text-decoration-none d-block d-lg-none">
                        <span class="btn btn-secondary" style="font-size: 1.8em; font-family:bold;">
                            {{ ucfirst($curUser->site->site_name) }}
                        </span></a>
                    @else
                    <a href="/stripeConnect" class="text-decoration-none d-block d-lg-none">
                        <span class="badge badge-secondary" style="font-size: 1.5em;">

                        </span></a>
                    @endif
                    @endif</span>
                {{-- </a> --}}
                <button type="button" class="navbar-toggler bg-dark" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon bg-black"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="/home" class="nav-item bg-black nav-link overridec active">Home</a>
                    @if(Cart::instance('cart')->count() > 0)
                        <a href="/cart" class="nav-item bg-black nav-link overridec active">My cart</a>
                     @endif
                    </div>
                    <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
							@livewire('cart-count-component')
                           @livewire('wishlist-count-component')
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>