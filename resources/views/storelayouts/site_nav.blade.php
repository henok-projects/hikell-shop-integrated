@php
use \App\Models\Idol_round;
use \App\Http\Controllers\IdolRoundController;
use \App\Models\Idol;
$currentRoute = Route::currentRouteName();
$siteRoutes = ['site.reused', 'site.videos', 'show_site'];

$ext = in_array($currentRoute, $siteRoutes) && isset($site) ? '?origin-site=' . $site->site_name : '';
$promotionLink = in_array($currentRoute, $siteRoutes) && isset($site) ? '/promotion': '/promotion';
$curUser = auth()->user();
$latestRound = IdolRoundController::getLatestRound();
@endphp
<!-- mobile menu -->
	<div class="mercado-clone-wrap">
		<div class="mercado-panels-actions-wrap">
			<a class="mercado-close-btn mercado-close-panels" href="#">x</a>
		</div>
		<div class="mercado-panels"></div>
	</div>

	<!--header-->
	<header id="header" class="header header-style-1">
		<div class="container-fluid">
			<div class="row">
				{{-- <div class="topbar-menu-area">
					<div class="container">
						<div class="topbar-menu left-menu">
							<ul>
								<li class="menu-item">
									<a title="Hotline: (+123) 456 789" href="#"><span
											class="icon label-before fa fa-mobile"></span>Hotline: (+123) 456 789</a>
								</li>
							</ul>
						</div>
						<div class="topbar-menu right-menu">
							<ul>
								<li class="menu-item"><a title="Register or Login" href="login.html">Login</a></li>
								<li class="menu-item"><a title="Register or Login" href="register.html">Register</a>
								</li>
								<li class="menu-item lang-menu menu-item-has-children parent">
									<a title="English" href="#"><span class="img label-before"><img
												src="assets/images/lang-en.png" alt="lang-en"></span>English<i
											class="fa fa-angle-down" aria-hidden="true"></i></a>
									<ul class="submenu lang">
										<li class="menu-item"><a title="hungary" href="#"><span
													class="img label-before"><img src="assets/images/lang-hun.png"
														alt="lang-hun"></span>Hungary</a></li>
										<li class="menu-item"><a title="german" href="#"><span
													class="img label-before"><img src="assets/images/lang-ger.png"
														alt="lang-ger"></span>German</a></li>
										<li class="menu-item"><a title="french" href="#"><span
													class="img label-before"><img src="assets/images/lang-fra.png"
														alt="lang-fre"></span>French</a></li>
										<li class="menu-item"><a title="canada" href="#"><span
													class="img label-before"><img src="assets/images/lang-can.png"
														alt="lang-can"></span>Canada</a></li>
									</ul>
								</li>
								<li class="menu-item menu-item-has-children parent">
									<a title="Dollar (USD)" href="#">Dollar (USD)<i class="fa fa-angle-down"
											aria-hidden="true"></i></a>
									<ul class="submenu curency">
										<li class="menu-item">
											<a title="Pound (GBP)" href="#">Pound (GBP)</a>
										</li>
										<li class="menu-item">
											<a title="Euro (EUR)" href="#">Euro (EUR)</a>
										</li>
										<li class="menu-item">
											<a title="Dollar (USD)" href="#">Dollar (USD)</a>
										</li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div> --}}

				<div class="container">
					<div class="mid-section main-info-area">

						<div class="wrap-logo-top left-section">
							<a href="" class="link-to-home"><img
									src="{{asset('assets/images/logo-light.png')}}" alt="mercado"></a>
						</div>

						<div class="wrap-search center-section">
							<div class="wrap-search-form">
								<form action="#" id="form-search-top" name="form-search-top">
									<input type="text" name="search" value="" placeholder="Search here...">
									<button form="form-search-top" type="button"><i class="fa fa-search"
											aria-hidden="true"></i></button>

								</form>
							</div>
						</div>

						<div class="wrap-icon right-section">
						    @livewire('wishlist-count-component')
						    @livewire('cart-count-component')





							<div class="wrap-icon-section show-up-after-1024">
								<a href="#" class="mobile-navigation">
									<span></span>
									<span></span>
									<span></span>
								</a>
							</div>
						</div>


					</div>
				</div>

				<div class="nav-section header-sticky">
					{{-- <div class="header-nav-section">
						<div class="container">
							<ul class="nav menu-nav clone-main-menu" id="mercado_haead_menu" data-menuname="Sale Info">
								<li class="menu-item"><a href="#" class="link-term">Weekly Featured</a><span
										class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Hot Sale items</a><span
										class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Top new items</a><span
										class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Top Selling</a><span
										class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Top rated items</a><span
										class="nav-label hot-label">hot</span></li>
							</ul>
						</div>
					</div> --}}

					<div class="primary-nav-section">
						<div class="container">
							<ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu">
								<li class="menu-item home-icon">
									<a href="/shop" class="link-term mercado-item-title"><i class="fa fa-home"
											aria-hidden="true"></i></a>
								</li>
								{{-- <li class="menu-item">
									<a href="about-us.html" class="link-term mercado-item-title">About Us</a>
								</li> --}}
								<li class="menu-item">
									<a href="/shop" class="link-term mercado-item-title">Shop</a>
								</li>
								{{-- <li class="menu-item">
									<a href="/cart" class="link-term mercado-item-title">Cart</a>
								</li> --}}
                                 @if(Cart::instance('cart')->count() > 0)
								<li class="menu-item">
									<a href="/checkout" class="link-term mercado-item-title">Checkout</a>
								</li>
                                @endif
								<li class="menu-item">
									<a href="{{route('product.addtostock')}}" class="link-term mercado-item-title">Add
										Product</a>
								</li>
								<li class="menu-item">
									<a href="/orders" class="link-term mercado-item-title">My Orders</a>
								</li>
								<li class="menu-item">
									<a href="/allproduct" class="link-term mercado-item-title">My Products</a>
								</li>
								{{-- <li class="menu-item">
									<a href="contact-us.html" class="link-term mercado-item-title">Contact Us</a>
								</li> --}}
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>