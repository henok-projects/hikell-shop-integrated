@php
use \App\Models\Site;
$currentRoute = \Route::current();
$curUser = auth()->user();
$st =Site::where('site_id',$currentRoute->site_id)->first();

@endphp
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
                        @if(Session::has('order_message'))
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
                                    {{-- @if($currentRoute->site_id == $order->site_id) --}}
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
                                        <td><a href="{{ url($currentRoute->site_id.'/orders' ,['order_id'=>$order->id]) }}" class="btn btn-info">Details</a></td>
                                         {{-- @if($st->user_id == $curUser->user_id)
                                            <td>
                                             <div class="dropdown">
                                               <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                                 Status
                                                 <span class="caret">
                                                 </span>
                                               </button>
                                               <ul class="dropdown-menu">
                                                   <li><a href="#" wire:click.prevent="updateOrderStatus({{ $order->id}},'delivered')">Delivered</a></li>
                                                   <li><a href="#" wire:click.prevent="updateOrderStatus({{ $order->id}},'canceled')">Canceled</a></li>
                                               </ul>
                                             </div>
                                         </td>
                                         @endif --}}
                                    </tr>
                                   {{-- @endif --}}
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


