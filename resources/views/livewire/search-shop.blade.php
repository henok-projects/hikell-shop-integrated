<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Featured
            Products</span></h2>
    <div class="row px-xl-5">
        @foreach($products as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
            <div class="product-item bg-light mb-4">
                <div class="product-img position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="{{asset('storage/thumbnails/'.$product->image)}}" alt="">
                    <div class="product-action">
                        <a class="btn btn-outline-dark btn-square" wire:click.prevent="store({{ $product->id}},'{{ $product->name }}',{{ $product->regular_price }})"><i class="fa fa-shopping-cart" title="Add to cart"></i></a>
                        <a class="btn btn-outline-dark btn-square" wire:click.prevent="addToWishList({{ $product->id }},'{{ $product->name }}',{{ $product->regular_price }})"><i class="far fa-heart" title="Add to wishlist"></i></a>
                        <a class="btn btn-outline-dark btn-square" href="{{route('product.details',['slug' =>$product->slug])}}"><i class="fa fa-eye" title="View details"></i></a>

                    </div>
                </div>
                <div class="text-center py-4">
                    <a class="h6 text-decoration-none text-truncate" href="{{route('product.details',['slug' =>$product->slug])}}">{{$product->name}}</a>
                    <div class="d-flex align-items-center justify-content-center mt-2">
                        <h5>${{$product->regular_price}}</h5>
                        <h6 class="text-muted ml-2"><del>${{$product->regular_price}}</del></h6>
                    </div>
                    <div class="d-flex align-items-center justify-content-center mb-1">
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small>(99)</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
