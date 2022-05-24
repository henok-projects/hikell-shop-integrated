@php
$currentRoute = \Route::current();

@endphp
<div>
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <span class="breadcrumb-item active">My Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
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
                        @foreach(Cart::instance('cart')->content() as $item)
                        <tr>
                            <td class="align-middle"><img src="{{ asset('/storage/thumbnails/' .$item->model->image) }}" alt="" style="width: 50px;"> {{ $item->model->name }}</td>
                            <td class="align-middle">${{  $item->model->regular_price  }}</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" wire:click.prevent="DecreaseQuantity('{{ $item->rowId }}')" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="number" class="form-control form-control-sm bg-secondary border-0 text-center" min="1" value="{{ $item->qty }}"  pattern="[1-9]*">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus"  wire:click.prevent="IncreaseQuanitiy('{{ $item->rowId }}')" >
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">${{ $item->subtotal }}</td>
                            <td class="align-middle">
                                <a href="#" class="btn btn-sm btn-danger" wire:click="$refresh" wire:click.prevent="destroy('{{ $item->rowId}}')"}}>
                                    <i class="fa fa-times"></i>
                                    </a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>${{ Cart::instance('cart')->subtotal() }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">${{ Cart::instance('cart')->tax() }}</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>{{Cart::instance('cart')->total() }}</h5>
                        </div>
                        <a href="/{{$currentRoute->site_id}}/checkout" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
