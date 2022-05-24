@php
$currentRoute = Route::currentRouteName();
$curUser = auth()->user();
@endphp
<div wire:init="loadContent">
    @if (!$isloading)
      
<!--main area-->
<main id="main" class="main-site left-sidebar">
	<div class="container">
		<div class="wrap-breadcrumb">
			<ul>
				<li class="item-link"><a href="#" class="link">Home</a></li>
				<li class="item-link"><span>Stock</span></li>
			</ul>
		</div>
		<div class="row">
			<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

				<div class="banner-shop">
					@foreach($siteContent as $banner)
					<a href="#" class="banner-link">
						<figure><img src="{{asset('/products/'.$banner->image)}}" height="12px" alt=""></figure>
					</a>
					@endforeach
				</div>
				<div class="wrap-shop-control">

					<h1 class="shop-title">All In stock</h1>

					<div class="wrap-right">
					</div>

				</div>
				<!--end wrap shop control-->
				<style>
					.product-wish {
						position: absolute;
						top: 10%;
						left: 0;
						z-index: 99;
						right: 30px;
						text-align: right;
						padding-top: 0;

					}

					.product-wish .fa {
						color: gray;
						font-size: 32px;
					}

					.product-wish .fa:hover {
						color: orange;

					}

					.fill-heart {
						color: orange !important;
					}
				</style>
				<div class="row">
					<ul class="product-list grid-products equal-container">
						@php
						$witems = Cart::instance('whishlist')
						->content()
						->pluck('id');

						@endphp
						@foreach($siteContent as $product)
						<li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
							<div class="product product-style-3 equal-elem ">
								<div class="product-thumnail">
									<a href="{{route('product.details',['slug' =>$product->slug])}}"
										title="{{$product->name}}">
										<figure><img src="{{asset('/products/'.$product->image)}}"
											alt="{{$product->name}}"></figure>
									</a>
								</div>
								<div class="product-info">
									<a href="{{route('product.details',['slug' =>$product->slug])}}"
										class="product-name"><span>{{$product->name}}</span></a>
									<div class="wrap-price"><span
											class="product-price">{{$product->regular_price}}</span></div>
									{{-- <a href="{{route('product.edit',['slug' => $product->slug])}}"
										class="btn add-to-cart">Editt</a> --}}
									<a href="#" class="btn add-to-cart"
										wire:click.prevent="store({{ $product->id}},'{{ $product->name }}',{{ $product->regular_price }})">Add
										To Cart</a>

									<div class="product-wish">
										@if ($witems->contains($product->id))
										<a href="" wire:click.prevent="removeFromWishlist({{ $product->id }})"><i
												class="fa fa-heart fill-heart"></i></a>
										@else
										<a href=""
											wire:click.prevent="addToWishList({{ $product->id }},'{{ $product->name }}',{{ $product->regular_price }})"><i
												class="fa fa-heart"></i></a>
										@endif
									</div>
								</div>
							</div>
						</li>
						@endforeach

					</ul>
				</div>

				<div class="wrap-pagination-info">
					{{-- {{$products->links()}} --}}
				</div>
			</div>
			<!--end main products area-->
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
				<div class="widget mercado-widget filter-widget">
					{{-- <h2 class="widget-title">Size</h2> --}}
					<div class="widget-content">
						<div class="widget-banner">
							{{-- @foreach($banner as $p_banner)
							<a href="{{route('product.details',['slug' =>$p_banner->slug])}}">
								<figure><img src="{{ asset('/products/' . $p_banner->image) }}" width="270"
										height="331" alt=""></figure>
							</a>
							@endforeach --}}
						</div>
					</div>
				</div><!-- Size -->
				<div class="widget mercado-widget widget-product">
					<h2 class="widget-title">Popular Products</h2>
					<div class="widget-content">
						<ul class="products">
							@foreach($siteContent as $p_product)
							<li class="product-item">
								<div class="product product-widget-style">
									<div class="thumbnnail">
										<a href="{{route('product.details',['slug' =>$product->slug])}}"
											title="{{$p_product->name}}">
											<figure><img src="{{ asset('/products/'.$p_product->image) }}"
												alt=""></figure>
											{{-- <figure><img
													src="{{asset('storage/app/products')}}/{{$p_product->image}}"
													alt=""></figure> --}}
										</a>
									</div>
									<div class="product-info">
										<a href="{{route('product.details',['slug' =>$product->slug])}}"
											class="product-name"><span>{{$p_product->name}}</span></a>
										<div class="wrap-price"><span
												class="product-price">{{$p_product->regular_price}}</span></div>
									</div>
								</div>
							</li>
							@endforeach

						</ul>
					</div>
				</div><!-- brand widget-->

			</div>
			<!--end sitebar-->

		</div>
		<!--end row-->

	</div>
	<!--end container-->

</main>
<!--main area-->

@endif
</div>

