<div>
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-12">
                    <nav class="breadcrumb bg-light mb-30">
                        <a class="breadcrumb-item text-dark" href="#">Home</a>
                        <span class="breadcrumb-item active">My wishlist</span>
                    </nav>
                </div>
            </div>
        </div>
        @php
        $witems = Cart::instance('whishlist')
        ->content()
        ->pluck('id');
        @endphp
        <div class="cart-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-light table-borderless table-hover text-center mb-0">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Products</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Add to Cart</th>
                                        <th>Total</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>

                            @if (Session::has('success_message'))
                            <div>
                                <strong>Success</strong> {{ Session::get('success_message') }}
                            </div>
                            @endif

                                <tbody class="align-middle">
                                    @foreach(Cart::instance('wishlist')->content() as $item)
                                    <tr>
                                        <td class="align-middle"><img src="{{ asset('assets/img/product-1.jpg') }}" alt="" style="width: 50px;"> {{ $item->model->name }}</td>
                                        <td class="align-middle">${{  $item->model->regular_price  }}</td>
                                        <td class="align-middle">
                                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-sm btn-primary btn-minus" wire:click.prevent="DecreaseQuantity('{{ $item->rowId }}')" >
                                                    <i class="fa fa-minus"></i>
                                                    </button>
                                                </div>
                                                <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="{{ $item->qty }}"  pattern="[1-9]*">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-sm btn-primary btn-plus"  wire:click.prevent="IncreaseQuanitiy('{{ $item->rowId }}')" >
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>

                                        </td>
                                        <td>


                                        <button class="btn add-to-cart"
                                          wire:click.prevent="moveProductFromWishLIstToCart('{{ $item->rowId }}')">
                                        Move To Cart</button>

                                        </td>

                                        <td class="align-middle">${{ $item->subtotal }}</td>
                                        <td class="align-middle">
                                            @if ($witems->contains($item->model->id))
                                            <a href="" wire:click.prevent="removeFromWishlist({{ $item->model->id }})">
                                            </a>
                                        @endif
                                        <i class="fa fa-times"></i>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

