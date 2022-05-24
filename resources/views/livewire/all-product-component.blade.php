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
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>

                            </thead>

                            <tbody>
                                @foreach ($product as $product)
                                <tr>
                                    <td>{{ $product->id }} </td>
                                    <td> <img src="{{"storage/thumbnails/".$product->image}}" width="80" /> </td>
                                    <td>{{ $product->name }} </td>
                                    <td>{{ $product->stock_status }} </td>
                                    <td>${{ $product->regular_price }} </td>
                                    <td>{{ $product->created_at }} </td>

                                    <td><a href="{{route('product.edit',['slug' =>$product->slug])}}"><i class="fa fa-edit fa-2x text-info"></i>
                                  <a href="#" style="margin-left: 10px;" wire:click.prevent="deleteproduct({{$product->id}})"><i class="fa fa-times fa-2x text-danger"></i></a>
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
