<div>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel panel-default">
                        <div class="p-4">Add New Product</div>
                    </div class="panel-body">

                    @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>
                    @endif
                    <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="addProduct">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Name</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Name" class="form-control input-md" wire:model="name" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Slug</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Slug" class="form-control input-md" wire:model="slug"
                                    wire:keyup="generateSlug" />

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Short description</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="short_deacription" class="form-control input-md"
                                    wire:model="short_description" required />

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Description</label>
                            <div class="col-md-4">
                                <textarea type="text" placeholder="description" class="form-control input-md"
                                    wire:model="description" required></textarea>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Regular price</label>
                            <div class="col-md-4">
                                <input type="number" placeholder="Regular price" class="form-control input-md"
                                    wire:model="regular_price" required/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Weight</label>
                            <div class="col-md-4">
                                <input type="number" placeholder="Weight" class="form-control input-md"
                                    wire:model="SKU" required/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Storck</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="stock_status">
                                    <option value="instock">Instock</option>
                                    <option value="outofstock">Out Of Stock</option>
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Category</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="category_id">
                                    @foreach ($stockcategory as $category)
                                    <option value="{{$category->id}}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Featured</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="featured">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Quantity</label>
                            <div class="col-md-4">
                                <input type="number" placeholder="Quantity" class="form-control input-md"
                                    wire:model="quantity" required />

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">image</label>
                            <div class="col-md-4">
                                <input type="file" class="form-control input-md" wire:model="image" />
                                @if($image)
                                 <img src="{{$image->temporaryUrl()}}" width="120" />
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">submit</button>

                            </div>
                        </div>
                </div>
            </div>

        </div>
    </div>

</div>
</div>

</div>