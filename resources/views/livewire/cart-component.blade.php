<div>
<!--main area-->
<main id="main" class="main-site" >

	<div class="container">

		<div class="wrap-breadcrumb">
			<ul>
				<li class="item-link"><a href="#" class="link">home</a></li>
				<li class="item-link"><span>login</span></li>
			</ul>
		</div>
		<div class=" main-content-area">
			{{-- @if(Cart::instance('cart')->count() >0) --}}

			<div class="wrap-iten-in-cart">
				@if (Session::has('success_message'))
				<div>
					<strong>Success</strong> {{ Session::get('success_message') }}
				</div>
				@endif
				@if(Cart::instance('cart')->count() > 0)
				<h3 class="box-title">Products Name</h3>
				<ul class="products-cart">
					@foreach(Cart::instance('cart')->content() as $item)
					<li class="pr-cart-item">
						<div class="product-image">
							<figure><img src="{{ 'assets/products' }}/{{ $item->model->image }}" alt=""></figure>
						</div>
						<div class="product-name">
							<a class="link-to-product"
								href="{{ route('product.details', ['slug' => $item->model->slug]) }}">{{
								$item->model->name }}</a>
						</div>
						<div class="price-field produtc-price">
							<p class="price">{{ $item->model->regular_price }}</p>
						</div>
						<div class="quantity">
							<div class="quantity-input">
								<input type="text" name="product-quatity" value="{{ $item->qty }}" data-max="120"
									pattern="[0-9]*">
								<a href="#"  onclick="history.go(0);" class="btn btn-increase" 
									wire:click.prevent="IncreaseQuanitiy('{{ $item->rowId }}')"></a>
								<a class="btn btn-reduce" onClick="history.go(0);" 
									wire:click.prevent="DecreaseQuantity('{{ $item->rowId }}')"></a>
							</div>
						</div>
						<div class="price-field sub-total">
							<p class="price">${{ $item->subtotal }}</p>
						</div>
						<div class="delete">
							<a href="#" class="btn btn-delete" title="" onClick="history.go(0);"
								wire:click.prevent="destroy('{{ $item->rowId}}')">
								<span>Delete from your cart</span>
								<i class="fa fa-times-circle" aria-hidden="true"></i>
							</a>
						</div>
					</li>

					@endforeach
				</ul>
				@else
				<p>NO Item</p>

				@endif
			</div>

			<div class="summary">
				<div class="order-summary">
					<h4 class="title-box">Order Summary</h4>
					<p class="summary-info"><span class="title">Subtotal</span><b class="index">${{ Cart::instance('cart')->subtotal()
							}}</b></p>
					<p class="summary-info"><span class="title">Shipping</span><b class="index">${{ Cart::instance('cart')->tax() }}</b>
					</p>
					<p class="summary-info total-info "><span class="title">Total</span><b class="index">${{
							Cart::instance('cart')->total() }}</b></p>
				</div>
				<div class="checkout-info">
					<label class="checkbox-field">
						<input class="frm-input " name="have-code" id="have-code" value="" type="checkbox"><span>I have
							promo code</span>
					</label>
					<a class="btn btn-checkout" href="/checkout">Check out</a>
					<a class="link-to-shop" href="shop.html">Continue Shopping<i class="fa fa-arrow-circle-right"
							aria-hidden="true"></i></a>
				</div>
				<div class="update-clear">
					<a class="btn btn-clear" href="#" wire:click.prevent="destroyall()" >Clear Shopping Cart</a>
					<a class="btn btn-update" href="#">Update Shopping Cart</a>
				</div>
			</div>
			
{{-- @endif --}}
		</div>
		<!--end main content area-->
	</div>
	<!--end container-->

</main>
<!--main area-->
</div>