<div>
    <style>
        nav svg {
            height: 20px;

        }

        nav .hidden {
            display: block !important;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        All product
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>name</th>
                                    <th>shortdesch</th>
                                    <th>Discount</th>
                                    <th>Tax</th>
                                    <th>Total</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone</th>
                                    {{-- <th>Email</th>
                                    <th>Order Date</th>
                                    <th>Zip Code</th>
                                    <th>Status</th> --}}

                                </tr>

                            </thead>

                            <tbody>
                                @foreach ($product as $order)
                                <tr>
                                    <td>1 </td>
                                    <td>${{ $order->name }} </td>
                                    <td>${{ $order->short_description }} </td>
                                    <td>${{ $order->tax }} </td>
                                    <td>${{ $order->regular_price }} </td>
                                    <td>{{ $order->SKU }} </td>
                                    <td>{{ $order->stock_status }} </td>
                                    <td>{{ $order->quantity}} </td>
                                    {{-- <td>{{ $order->email }} </td>
                                    <td>{{ $order->created_at }} </td>
                                    <td>{{ $order->zipcode }} </td>
                                    <td>{{ $order->status }} </td> --}}
                                    <td><a href="{{route('product.edit',['slug' =>$order->slug])}}" >edit </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $orders->links() }} --}}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>