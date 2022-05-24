<div class="content">
    <style>
        .content {
            padding-top: 40px;
            padding-bottom: 40px;
        }

        .icon-stat {
            display: block;
            overflow: hidden;
            position: relative;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 1em;
            background-color: wheat;
            border: 1px solid #ddd;
        }

        .icon-stat-label {
            display: block;
            color: #999;
            font-size: 13px;
        }

        .icon-stat-value {
            display: block;
            font-size: 28px;
            font-weight: 600;
        }

        .icon-stat-footer {
            padding: 10px 0 0;
            margin-top: 10px;
            color: gray;
            font-size: 12px;
            border-top: 1px solid #eee;
        }

        .bg-primary {
            color: #fff;
            background: pink;
        }

        .bg-secondary {
            color: #fff;
            background: #6685a4;

        }

        .icon-stat-visual {
            position: relative;
            top:22px;
            width: 32px;
            height: 32px;
            border-radius: 4px;
            display: inline-block;
            text-align: center;
            font-size: 16px;
            line-height: 30px;
        }

    </style>

    <div class="container">

        <div class="col-md-3 col-sm-6">
            <div class="icon-stat">
                <div class="row">
                    <div class="col-xs-8 text-left">
                        <span class="icon-stat-label">Total Cost</span>
                        <span class="icon-stat-value">${{ $totalcost }}</span>
                    </div>
                    <div class="col-xs-4 text-center">
                        <i class="fa fa-dollar icon-stat-visual bg-primary"></i>
                    </div>
                </div>
                <div class="icon-stat-footer">
                    <i class="fa fa-clock"></i>
                </div>
            </div>
        </div>



        <div class="col-md-3 col-sm-6">
            <div class="icon-stat">
                <div class="row">
                    <div class="col-xs-8 text-left">
                        <span class="icon-stat-label">Total Purchase</span>
                        <span class="icon-stat-value">{{ $totalPurchase }}</span>
                    </div>
                    <div class="col-xs-4 text-center">
                        <i class="fa fa-gift icon-stat-visual bg-secondary"></i>
                    </div>
                </div>
                <div class="icon-stat-footer">
                    <i class="fa fa-clock"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="icon-stat">
                <div class="row">
                    <div class="col-xs-8 text-left">
                        <span class="icon-stat-label">Total Delivered</span>
                        <span class="icon-stat-value">{{ $totalDelivered }}</span>
                    </div>
                    <div class="col-xs-4 text-center">
                        <i class="fa fa-gift icon-stat-visual bg-primary"></i>
                    </div>
                </div>
                <div class="icon-stat-footer">
                    <i class="fa fa-clock"></i>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="icon-stat">
                    <div class="row">
                        <div class="col-xs-8 text-left">
                            <span class="icon-stat-label">Total Canceled</span>
                            <span class="icon-stat-value">{{ $totalCanceled }}</span>
                        </div>
                        <div class="col-xs-4 text-center">
                            <i class="fa fa-gift icon-stat-visual bg-primary"></i>
                        </div>
                    </div>
                    <div class="icon-stat-footer">
                        <i class="fa fa-clock"></i>
                    </div>

                </div>
            </div>
        </div>


    </div>





    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        All Orders
                    </div>
                    <div class="panel-body">
                        @if (Session::has('order_message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('order_message') }}</div>
                        @endif
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
                                    <th colspan="2" class="text-center">Action</th>

                                </tr>

                            </thead>

                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->order_id }}</td>
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
                                        <td><a href="{{ route('user.orderdetails', ['order_id' => $order->id]) }}"
                                                class="btn btn-info">Details</a></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-success btn-sm dropdown-toggle" type="button"
                                                    data-toggle="dropdown">
                                                    Status
                                                    <span class="caret">
                                                    </span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#"
                                                            wire:click.prevent="updateOrderStatus({{ $order->id }},'delivered')">Delivered</a>
                                                    </li>
                                                    <li><a href="#"
                                                            wire:click.prevent="updateOrderStatus({{ $order->id }},'canceled')">Canceled</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
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
