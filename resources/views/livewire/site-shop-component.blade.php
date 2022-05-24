@php
$currentRoute = \Route::current();
$curUser = auth()->user();
@endphp
<div>
	<!-- Carousel Start -->
	<div class="mb-3 container-fluid">
		<div class="row px-xl-5">
			<div class="col-lg-8">
				<div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#header-carousel" data-slide-to="0" class="active"></li>
						<li data-target="#header-carousel" data-slide-to="1"></li>
						<li data-target="#header-carousel" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						@foreach($products as $p)
		                @if($currentRoute->site_id == $p->site_id)
						<div class="carousel-item position-relative active" style="height: 430px;">
							<img class="position-absolute w-100 h-100" src="{{asset('storage/thumbnails/'.$p->image)}}"
								style="object-fit: cover;">
							<div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
								<div class="p-3" style="max-width: 700px;">
									<h1 class="mb-3 text-white display-4 animate__animated animate__fadeInDown">
										{{$p->name}}</h1>
									<p class="px-5 mx-md-5 animate__animated animate__bounceIn">{{$p->description}}</p>
									<a class="px-4 py-2 mt-3 btn btn-outline-light animate__animated animate__fadeInUp"
										href="#" wire:click.prevent="store({{ $p->id}},'{{ $p->name }}',{{ $p->regular_price }})" >Shop Now</a>
								</div>
							</div>
						</div>
                     @endif
						@endforeach
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="product-offer mb-30" style="height: 200px;">
					@foreach($banner as $pr)
					@if($currentRoute->site_id == $pr->site_id)
					<img class="img-fluid" src="{{asset('storage/thumbnails/'.$pr->image)}}" alt="">
					<div class="offer-text">
						<h6 class="text-white text-uppercase">Save 20%</h6>
						<h3 class="mb-3 text-white">Special Offer</h3>
						<a href="" wire:click.prevent="store({{ $pr->id}},'{{ $pr->name }}',{{ $pr->sale_price }})" class="btn btn-secondary">Shop Now</a>
					</div>
					@endif
					@endforeach
				</div>
				<div class="product-offer mb-30" style="height: 200px;">
					@foreach($products as $pr)
					@if($currentRoute->site_id == $pr->site_id)
					<img class="img-fluid" src="img/offer-2.jpg" alt="">
					<div class="offer-text">
						<h6 class="text-white text-uppercase">Save 20%</h6>
						<h3 class="mb-3 text-white">Special Offer</h3>
						<a href="" wire:click.prevent="store({{ $pr->id}},'{{ $pr->name }}',{{ $pr->regular_price }})" class="btn btn-secondary">Shop Now</a>
					</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<!-- Carousel End -->
	<!-- support -->
	<div class="pt-5 container-fluid">
		<div class="pb-3 row px-xl-5">
			<div class="pb-1 col-lg-3 col-md-6 col-sm-12">
				<div class="mb-4 d-flex align-items-center bg-light" style="padding: 30px;">
					<h1 class="m-0 mr-3 fa fa-check text-secondary"></h1>
					<h5 class="m-0 font-weight-semi-bold">Quality Product</h5>
				</div>
			</div>
			<div class="pb-1 col-lg-3 col-md-6 col-sm-12">
				<div class="mb-4 d-flex align-items-center bg-light" style="padding: 30px;">
					<h1 class="m-0 mr-2 fa fa-shipping-fast text-secondary"></h1>
					<h5 class="m-0 font-weight-semi-bold">drop Shipping</h5>
				</div>
			</div>
			<div class="pb-1 col-lg-3 col-md-6 col-sm-12">
				<div class="mb-4 d-flex align-items-center bg-light" style="padding: 30px;">
					<h1 class="m-0 mr-3 fas fa-exchange-alt text-secondary"></h1>
					<h5 class="m-0 font-weight-semi-bold">14-Day Return</h5>
				</div>
			</div>
			<div class="pb-1 col-lg-3 col-md-6 col-sm-12">
				<div class="mb-4 d-flex align-items-center bg-light" style="padding: 30px;">
					<h1 class="m-0 mr-3 fa fa-phone-volume text-secondary"></h1>
					<h5 class="m-0 font-weight-semi-bold">24/7 Support</h5>
				</div>
			</div>
		</div>
	</div>
	<!-- endof support -->

	<!-- Categories Start -->
	<div class="pt-5 container-fluid">
		<h2 class="mb-4 section-title position-relative text-uppercase mx-xl-5"><span
				class="pr-3 bg-secondary">Categories</span></h2>
		<div class="pb-3 row px-xl-5">
			@foreach($category->unique('category_id') as $banners)
			@if($currentRoute->site_id == $banners->site_id)
			<div class="pb-1 col-lg-3 col-md-4 col-sm-6">
				<a class="text-decoration-none" href="">
					<div class="mb-4 cat-item d-flex align-items-center">
						<div class="overflow-hidden" style="width: 100px; height: 100px;">
							<img class="img-fluid" src="{{asset('storage/thumbnails/'.$banners->image)}}" alt="">
						</div>
						<div class="pl-3 flex-fill">
							<h6>{{$banners->name}}</h6>
							{{-- <small class="text-body">100 Products</small> --}}
						</div>

					</div>

				</a>
			</div>
			@endif
			@endforeach
		</div>
	</div>
	<!-- Categories End -->
	<!-- Products Start -->
	<div class="pt-5 pb-3 container-fluid">
		<h2 class="mb-4 section-title position-relative text-uppercase mx-xl-5"><span class="pr-3 bg-secondary">Featured
				Products</span></h2>
		<div class="row px-xl-5">
			@foreach($popular_products as $product)
			@if($currentRoute->site_id == $product->site_id)
			<div class="pb-1 col-lg-3 col-md-4 col-sm-6">
				<div class="mb-4 product-item bg-light">
					<div class="overflow-hidden product-img position-relative">
						<img class="img-fluid w-100" src="{{asset('storage/thumbnails/'.$product->image)}}" alt="">
						<div class="product-action">
							<a class="btn btn-outline-dark btn-square" href="" wire:click.prevent="store({{ $product->id}},'{{ $product->name }}',{{ $product->regular_price }})"><i class="fa fa-shopping-cart"
									title="Add to cart"></i></a>
							<a class="btn btn-outline-dark btn-square" href="" wire:click.prevent="addToWishList({{ $product->id }},'{{ $product->name }}',{{ $product->regular_price }})"><i class="far fa-heart"
									title="Add to wishlist"></i></a>
							<a class="btn btn-outline-dark btn-square"
								href="{{route('product.sitedetails',['slug' =>$product->slug,'site_id'=>$product->site_id])}}"><i class="fa fa-eye"
									title="View details"></i></a>

						</div>
					</div>
					<div class="py-4 text-center">
						<a class="h6 text-decoration-none text-truncate"
							href="{{route('product.sitedetails',['slug' =>$product->slug,'site_id'=>$product->site_id])}}">{{$product->name}}</a>
						<div class="mt-2 d-flex align-items-center justify-content-center">
							<h5>${{$product->regular_price}}</h5>
							<h6 class="ml-2 text-muted"><del>${{$product->regular_price}}</del></h6>
					</div>
				</div>
			</div>
		</div>
		@endif
		@endforeach
	</div>
</div>
<!-- Products End -->
<!-- Offer Start -->
<div class="pt-5 pb-3 container-fluid">
	<div class="row px-xl-5">

            @foreach($specialoffer as $sp)
		@if($currentRoute->site_id == $sp->site_id)
			<div class="col-md-6">
				<div class="product-offer mb-30" style="height: 300px;">
					<img class="img-fluid" src="{{asset('storage/thumbnails/'.$sp->image)}}" alt="">
					<div class="offer-text">
						<h6 class="text-white text-uppercase">Save 10%</h6>
						<h3 class="mb-3 text-white">Special Offer</h3>
						<a href="" wire:click.prevent="store({{ $sp->id}},'{{ $sp->name }}',{{ $sp->regular_price }})" class="btn btn-secondary">Shop Now</a>
					</div>
				</div>
			</div>
          @endif
            @endforeach

	</div>
</div>
<!-- Offer End -->
<!-- Products Start -->
<div class="pt-5 pb-3 container-fluid">
	<h2 class="mb-4 section-title position-relative text-uppercase mx-xl-5"><span class="pr-3 bg-secondary">Recent
			Products</span></h2>
	<div class="row px-xl-5">
		@foreach($products as $product)
		@if($currentRoute->site_id == $product->site_id)
		<div class="pb-1 col-lg-3 col-md-4 col-sm-6">
			<div class="mb-4 product-item bg-light">
				<div class="overflow-hidden product-img position-relative">
					<a href="{{route('product.sitedetails',['slug' =>$product->slug,'site_id'=>$product->site_id])}}">
						<img class="img-fluid w-100" src="{{asset('storage/thumbnails/'.$product->image)}}" alt="">
					</a>
					<div class="product-action">
						<a class="btn btn-outline-dark btn-square" href="" wire:click.prevent="store({{ $product->id}},'{{ $product->name }}',{{ $product->regular_price }})"><i class="fa fa-shopping-cart"
								title="Add to cart"></i></a>
						<a class="btn btn-outline-dark btn-square" href="" wire:click.prevent="addToWishList({{ $product->id }},'{{ $product->name }}',{{ $product->regular_price }})"><i class="far fa-heart"
								title="Add to wishlist"></i></a>
						<a class="btn btn-outline-dark btn-square"
							href="{{route('product.sitedetails',['slug' =>$product->slug,'site_id'=>$product->site_id])}}"><i class="fa fa-eye"
								title="view details"></i></a>
					</div>
				</div>

				<div class="py-4 text-center">

					<a class="h6 text-decoration-none text-truncate"
						href="{{route('product.sitedetails',['slug' =>$product->slug,'site_id'=>$product->site_id])}}">{{$product->name}}</a>
					<div class="mt-2 d-flex align-items-center justify-content-center">
						<h5>${{$product->regular_price}}</h5>
						<h6 class="ml-2 text-muted"><del>${{$product->regular_price}}</del></h6>
					</div>
				</div>
			</div>
		</div>
		@endif
		@endforeach
	</div>
</div>
<!-- Products End -->
</div>
