<div>
    <div class="container" style="padding 30px">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-uppercase">
                        Ordered_items
                    </div>
                    <div class="col-md-6">
                    </div>

                </div>
                <div class="panel-body">
                    <div class="col-lg-8 table-responsive mb-5">
                        <table class="table table-light table-borderless table-hover text-center mb-0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                @foreach ($order->orderItems as $item)
                                <tr>
                                    <td class="align-middle"><img src="{{ asset('assets/img/product-1.jpg') }}" alt=""
                                            style="width: 50px;"> {{ $item->order->order_id }}</td>
                                    <td class="align-middle">${{ $item->price }}</td>
                                    <td class="align-middle">{{ $item->qty }}
                                    </td>
                                    <td class="align-middle">${{ $item->price * $item->qty }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ml-4">
                <div class="panel panel-default">
                    <div class="panel-heading font-bold">
                        Order Summary
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Subtotal</th>
                                <td>${{ $order->subtotal }}</td>
                            </tr>
                            <tr>
                                <th>tax</th>
                                <td>{{ $order->tax }}</td>
                            </tr>
                            <tr>
                                <th>Shipping Method</th>
                                <td>DHL</td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td>{{ $order->total }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 ml-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Billing DetailInfo
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>First name</th>
                                <td>{{ $order->fname }}</td>
                                <th>Last name</th>
                                <td>{{ $order->lname }}</td>
                            </tr>
                            <tr>
                                <th>phone</th>
                                <td>{{ $order->mobile }}</td>
                                <th>Email</th>
                                <td>{{ $order->email }}</td>
                            </tr>
                            <tr>
                                <th>Address 1</th>
                                <td>{{ $order->line1 }}</td>
                                <th>Address 2</th>
                                <td>{{ $order->line2 }}</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>{{ $order->city }}</td>
                                <th>Province</th>
                                <td>{{ $order->province }}</td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td>{{ $order->country }}</td>
                                <th>ZIP code</th>
                                <td>{{ $order->zipcode }}</td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        @if ($order->is_shipping_different)
        <div class="row">
            <div class="col-md-12 ml-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Shipping detail
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>First name</th>
                                <td>{{ $order->shipping->fname }}</td>
                                <th>Last name</th>
                                <td>{{ $order->shipping->lname }}</td>
                            </tr>
                            <tr>
                                <th>phone</th>
                                <td>{{ $order->shipping->mobile }}</td>
                                <th>Email</th>
                                <td>{{ $order->shipping->email }}</td>
                            </tr>
                            <tr>
                                <th>Address 1</th>
                                <td>{{ $order->shipping->line1 }}</td>
                                <th>Address 2</th>
                                <td>{{ $order->shipping->line2 }}</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>{{ $order->shipping->city }}</td>
                                <th>Province</th>
                                <td>{{ $order->shipping->province }}</td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td>{{ $order->shipping->country }}</td>
                                <th>ZIP code</th>
                                <td>{{ $order->shipping->zipcode }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-md-12 ml-4">
                <div class="panel panel-default">
                    <div class="panel-heading font-bold">
                        Transaction
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Transaction mode</th>
                                <td>{{ $order->transaction->mode }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ $order->transaction->status }}</td>
                            </tr>
                            <tr>
                                <th>Transaction Date</th>
                                <td>{{ $order->transaction->created_at }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>