<div>
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <form wire:submit.prevent="placeorder">
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <h5 class="mb-3 section-title position-relative text-uppercase"><span
                            class="pr-3 bg-secondary">Billing Address</span></h5>
                    <div class="mb-5 bg-light p-30">


                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="fname">First Name</label>
                                <input id="fname" class="form-control" type="text" placeholder="John"
                                    wire:model="fname">
                                @error('fname') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="lname">Last Name</label>
                                <input id="lname" class="form-control" type="text" placeholder="Doe" wire:model="lname">
                                @error('lname') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="email">E-mail</label>
                                <input id="email" class="form-control" type="text" placeholder="example@email.com"
                                    wire:model="email">
                                @error('email') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="phone">Mobile No</label>
                                <input id="phone" class="form-control" type="text" placeholder="+123 456 789"
                                    wire:model="mobile">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="add">Address Line 1</label>
                                <input id="add" class="form-control" type="text" placeholder="123 Street"
                                    wire:model="line1">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="add">Address Line 2</label>
                                <input id="add" class="form-control" type="text" placeholder="123 Street"
                                    wire:model="line2">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="country">Country</label>
                                <input id="country" class="form-control" type="text" placeholder="Ethiopia"
                                    wire:model="country">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="city">City</label>
                                <input id="city" class="form-control" type="text" placeholder="New York"
                                    wire:model="city">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="city">State</label>
                                <input id="city" class="form-control" type="text" placeholder="New York"
                                    wire:model="province">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="zip-code">ZIP Code</label>
                                <input id="zip-code" class="form-control" type="text" wire:model="zipcode"
                                    placeholder="123">
                            </div>

                            <div class="col-md-12">
                                {{-- <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" wire:model="shipToDifferent"
                                        id="shipto" value="1">
                                    <label class="custom-control-label" for="shipto" data-toggle="collapse"
                                        data-target="#shipping-address">Ship to different address</label>
                                </div> --}}
                            </div>
                        </div>
                    </div>


                    <div class="mb-5 collapse" id="shipping-address">
                        <h5 class="mb-3 section-title position-relative text-uppercase"><span
                                class="pr-3 bg-secondary">Shipping Address</span></h5>
                        <div class="bg-light p-30">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" placeholder="John" wire:model="s_fname">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" placeholder="Doe" wire:model="s_lname">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>E-mail</label>
                                    <input class="form-control" type="text" placeholder="example@email.com"
                                        wire:model="s_email">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Mobile No</label>
                                    <input class="form-control" type="text" wire:model="s_mobile"
                                        placeholder="+123 456 789">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Address Line 1</label>
                                    <input class="form-control" type="text" wire:model="s_line1"
                                        placeholder="123 Street">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Address Line 2</label>
                                    <input class="form-control" type="text" wire:model="s_line2"
                                        placeholder="123 Street">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Country</label>
                                    <select class="custom-select">
                                        <option selected>United States</option>
                                        <option>Afghanistan</option>
                                        <option>Albania</option>
                                        <option>Algeria</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>City</label>
                                    <input class="form-control" type="text" wire:model="s_city" placeholder="New York">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>State</label>
                                    <input class="form-control" type="text" wire:model="s_province"
                                        placeholder="New York">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>ZIP Code</label>
                                    <input class="form-control" type="text" wire:model="s_zipcode" placeholder="123">
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-lg-4">
                    <h5 class="mb-3 section-title position-relative text-uppercase"><span
                            class="pr-3 bg-secondary">Order Total</span></h5>
                    <div class="mb-5 bg-light p-30">
                        <div class="border-bottom">
                            <h6 class="mb-3">Products</h6>
                            @foreach(Cart::instance('cart')->content() as $item)
                            <div class="d-flex justify-content-between">
                                <p>{{ $item->model->name }}</p>
                                <p>${{ $item->model->regular_price }}</p>
                            </div>
                            @endforeach
                        </div>
                        <div class="pt-3 pb-2 border-bottom">
                            <div class="mb-3 d-flex justify-content-between">
                                <h6>Subtotal</h6>
                                <h6>${{ Cart::instance('cart')->subtotal() }}</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <h6 class="font-weight-medium">${{ Cart::instance('cart')->tax() }}</h6>
                            </div>
                        </div>
                        <div class="pt-2">
                            <div class="mt-2 d-flex justify-content-between">
                                <h5>Total</h5>
                                <h5>${{Cart::instance('cart')->total() }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row px-xl-5">
                        {{-- <div class="col-lg-6">
                            <div class="mb-5">
                                <h6 class="mb-3 section-title position-relative text-uppercase"><span
                                        class="pr-3 bg-secondary">Shipping method</span></h6>
                                <div class="bg-light p-30">
                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="stripe"
                                                name="payment" wire:model="paymentmode" id="paypal">
                                            <label class="custom-control-label" for="paypal">DHL</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="paypal"
                                                name="payment" wire:model="paymentmode" id="directcheck">
                                            <label class="custom-control-label" for="directcheck">Drop shipping</label>
                                        </div>
                                    </div>
                                    <div class="mb-4 form-group">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="bank" name="payment"
                                                wire:model="paymentmode" id="banktransfer">
                                            <label class="custom-control-label" for="banktransfer">self</label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="mt-6">
                                        <div id="paypal-button-container"></div>
                                    </div>


                                </div>
                            </div>
                        </div> --}}
                        <div class="col-lg-6">
                            <div class="mb-5">
                                <h6 class="mb-3 section-title position-relative text-uppercase"><span
                                        class="pr-3 bg-secondary">Payment</span></h6>
                                <div class="bg-light p-30">
                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="stripe"
                                                name="payment" wire:model="paymentmode" id="paypal">
                                            <label class="custom-control-label" for="paypal">Paypal</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="paypal"
                                                name="payment" wire:model="paymentmode" id="directcheck">
                                            <label class="custom-control-label" for="directcheck">Direct Check</label>
                                        </div>
                                    </div>
                                    <div class="mb-4 form-group">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="bank" name="payment"
                                                wire:model="paymentmode" id="banktransfer">
                                            <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="mt-6">
                                        <div id="paypal-button-container"></div>
                                    </div>

                                    <button type="submit"
                                        class="btn btn-success">Place
                                        Order</button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
        </form>
    </div>
</div>
