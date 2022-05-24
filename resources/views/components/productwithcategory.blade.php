@extends('layouts.base')
@section('title')
{{ $stock_category->name }}
@endsection

@section('content')
<h2 class="mb-4 section-title position-relative text-uppercase mx-xl-5">
    <span class="pr-3 bg-secondary">
    {{ $stock_category->name }}
    </span></h2>
<div class="pt-5 pb-3 container-fluid">
    
    <div class="container">
        <div class="row">
          @foreach($stock_products as $product)
        <div class="pb-1 col-lg-3 col-md-4 col-sm-6">
            <div class="mb-4 product-item bg-light">
                <div class="overflow-hidden product-img position-relative">
                    <img class="img-fluid w-100" src="{{asset('storage/thumbnails/'.$product->image)}}" alt="">
                    {{-- <div class="card-body">
                        <h5>{{ $product->name }}</h5>
                        <span>{{ $product->sale_price }}</span>
                        <span>{{ $product->regular_price }}</span>
                    </div> --}}
                    <div class="product-action">
                        <a class="btn btn-outline-dark btn-square" href=""
                            wire:click.prevent="store({{ $product->id}},'{{ $product->name }}',{{ $product->sale_price }})"><i
                                class="fa fa-shopping-cart" title="Add to cart"></i></a>
                        <a class="btn btn-outline-dark btn-square" href=""
                            wire:click.prevent="addToWishList({{ $product->id }},'{{ $product->name }}',{{ $product->sale_price }})"><i
                                class="far fa-heart" title="Add to wishlist"></i></a>
                        <a class="btn btn-outline-dark btn-square"
                            href="{{route('product.details',['slug' =>$product->slug])}}"><i class="fa fa-eye"
                                title="View details"></i></a>
                    </div>
                </div>
                <div class="py-4 text-center">
                    <a class="h6 text-decoration-none text-truncate"
                        href="{{route('product.details',['slug' =>$product->slug])}}">{{$product->name}}</a>
                    <div class="mt-2 d-flex align-items-center justify-content-center">
                        <h5>${{$product->sale_price}}</h5>
                        <h6 class="ml-2 text-muted"><del>${{$product->regular_price}}</del></h6>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </div>
    </div>
</div>
@endsection
