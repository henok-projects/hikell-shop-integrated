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
                        All Orders
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>OrderId</th>
                                    <th>Subtotal</th>
                                    <th>Discount</th>
                                    <th>Tax</th>
                                    <th>Total</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Order Date</th>
                                    <th>Zip Code</th>
                                    <th>Status</th>

                                </tr>

                            </thead>

                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>1 </td>
                                        <td>${{ $order->subtotal }} </td>
                                        <td>${{ $order->discount }} </td>
                                        <td>${{ $order->tax }} </td>
                                        <td>${{ $order->total }} </td>
                                        <td>{{ $order->fname }} </td>
                                        <td>{{ $order->lname }} </td>
                                        <td>{{ $order->mobile }} </td>
                                        <td>{{ $order->email }} </td>
                                        <td>{{ $order->created_at }} </td>
                                        <td>{{ $order->zipcode }} </td>
                                        <td>{{ $order->status }} </td>

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
