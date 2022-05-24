<div>
    <div class="container" style="padding:30px 0;">
        <div class="col-12">
            <div class="col-md-12 bg-light">
                <div class="panel panel-default ">
                    <div class="panel panel-default">
                        <div class="p-4" style="padding-left: 3%; font-size: 2rem;">Add Product</div>
                    </div class="panel-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>
                    @endif
                    <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="addProduct">
                        <div class="form-group">
                            <label class="col-md-8 control-label">Name</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="Name" class="form-control input-md" wire:model="name"
                                    required />
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
                        {{--  --}}
                        <div class="" style="width:63%; display: flex; margin-left:14px">
                            <div class="form-group" style="width: 100%;margin-right:20px">
                                <label class="">Regular price</label>
                                <div class="" style="display: flex;">
                                    <span class="currency" style="font-size:20px;padding:0 10px 0 10px;color:#999;border:2px solid #ccc">$</span>
                                    <input type="number" placeholder="Regular price" class="form-control input-md" style="border-right-radius:5px"
                                        wire:model="regular_price" required />
                                </div>
                            </div>
                            <div class="form-group" style="width: 100%">
                                <label class="">Selling Price</label>
                                <div class="" style="display: flex">
                                    <span class="currency" style="font-size:20px;padding:0 10px 0 10px;color:#999;border:2px solid #ccc">$</span>
                                    <input type="number" placeholder="Selling price" class="form-control input-md"
                                        wire:model="sale_price" required />
                                        <span class="currency" style=""></span>
                                </div>
                            </div>    
                        </div>
                        {{--  --}}
                        <div class="form-group" style="width: 50%;margin-right:20px">
                            <label class="col-md-8 control-label">Weight</label>
                            <div class="col-md-8" style="display: flex">
                                <span class="currency" style="font-size:20px;padding:0 10px 0 10px;color:#999;border:2px solid #ccc">lb</span>
                                <input type="number" placeholder="Weight" class="form-control input-md" wire:model="SKU" style="border:2px solid #ccc"
                                    required />
                            </div>
                        </div>
                        <div class="form-group" style="display:flex;">
                           <div><label class="col-md-8 control-label" style="width: 180px">Allow Reuse</label></div> 
                            <div style="margin-left: -40px"><input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" wire:model="allow_reuse" required  /></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-8 control-label">Storck</label>
                            <div class="col-md-8">
                                <select class="form-control" wire:model="stock_status">
                                    <option value="instock">Instock</option>
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
                                <select class="form-control" wire:model="featured">
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
                                @if($image)
                                <img src="{{$image->temporaryUrl()}}" width="120" />
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-8 control-label"> product image</label>
                            <div class="col-md-8">
                                <input type="file" class="form-control input-md" wire:model="images" multiple />
                                @if($images)
                                @foreach ($images as $image )
                                <img src="{{$image->temporaryUrl()}}" width="120" />
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-8 control-label"></label>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">submit</button>
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