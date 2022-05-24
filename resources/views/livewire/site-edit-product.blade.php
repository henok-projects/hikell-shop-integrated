<div>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12 bg-light">
                <div class="panel panel-default">
                    <div class="panel panel-default">
                        <div class="p-4" style="padding-left: 3%; font-size: 2rem;">Edit Product</div>
                    </div class="panel-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>
                    @endif
                    <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="update">
                        <div class="form-group">
                            <label class="col-md-8 control-label">Name</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="Name" class="form-control input-md" wire:model="name" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-8 control-label">Slug</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="Slug" class="form-control input-md" wire:model="slug"
                                    wire:keyup="generateSlug" />

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-8 control-label">Short description</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="short_deacription" class="form-control input-md"
                                    wire:model="short_description" required />

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-8 control-label">Description</label>
                            <div class="col-md-8">
                                <textarea type="text" placeholder="description" class="form-control input-md"
                                    wire:model="description" required></textarea>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-8 control-label">Regular price</label>
                            <div class="col-md-8">
                                <input type="number" placeholder="Regular price" class="form-control input-md"
                                    wire:model="regular_price" required/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-8 control-label">selling price</label>
                            <div class="col-md-8">
                                <input type="number" placeholder="Regular price" class="form-control input-md"
                                    wire:model="sale_price" required/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-8 control-label">Weight</label>
                            <div class="col-md-8">
                                <input type="number" placeholder="Weight" class="form-control input-md"
                                    wire:model="SKU" required/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-8 control-label">Storck</label>
                            <div class="col-md-8">
                                <select class="form-control" wire:model="stock_status" required>
                                    <option value="instock">In Stock</option>
                                    <option value="outofstock">Out Of Stock</option>
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-8 control-label">Category</label>
                            <div class="col-md-8">
                                <select class="form-control" wire:model="category_id" required>
                                    @foreach ($stockcategory as $category)
                                    <option value="{{$category->id}}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-8 control-label">Featured</label>
                            <div class="col-md-8">
                                <select class="form-control" wire:model="featured" required>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-8 control-label">Quantity</label>
                            <div class="col-md-8">
                                <input type="number" placeholder="Quantity" class="form-control input-md"
                                    wire:model="quantity" required />

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-8 control-label">image</label>
                            <div class="col-md-8">
                                <input type="file" class="form-control input-md" wire:model="image" />
                                @if($newimage)
                                 <img src="{{$newimage->temporaryUrl()}}" width="120" />
                                @else
                                <img src="{{asset('/products/'.$image)}}" width="120" />
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-8 control-label"></label>
                            <div class="col-md-8">
                                <button  type="submit" class="btn btn-primary">update</button>

                            </div>
                        </div>
                  </form>
                </div>

            </div>

        </div>
    </div>

</div>
</div>

</div>
