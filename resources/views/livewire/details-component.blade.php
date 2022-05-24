<div>
     <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <span class="breadcrumb-item active">Shop Detail</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Detail Start -->
    <div class="pb-5 container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{asset('storage/thumbnails/'.$product->image)}}" alt="Image">
                        </div>
                        @php
                        $images=explode (",", $product->images);
                        @endphp
                        @foreach($images as $image)
                        @if($image)
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="{{asset('storage/thumbnails/'.$image)}}" alt="Image">
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="h-auto col-lg-7 mb-30">
                <style>
                    .color-gray{
                        color: #e6e6e6 importat!;
                    }
                </style>
                <div class="h-100 bg-light p-30">
                    <div class="product-rating">
                    </div>
                    <h3>{{$product->name}}</h3>
                    <h3 class="mb-4 font-weight-semi-bold">${{$product->sale_price}}</h3>
                    @php $ratenum = number_format($ratingvalue) @endphp
                    <div class="ratings">
                         <style>
                             .checked{
                                 color: #ffd900;
                             }
                         </style>
                    @for ($i=1;$i<=$ratenum;$i++)
                        <i class="fa fa-star checked"></i>
                    @endfor
                    @for ($j =$ratenum+1;$j<=5;$j++)
                        <i class="fa fa-star"></i>
                    @endfor
                    {{-- <span> {{ $ratings->count() }} Ratings</span> --}}
                    <span> 
                        @if ($ratings->count()>0)
                            {{ $ratings->count() }} Ratings
                        @else
                            No Ratings 
                        @endif
                       
                    </span>  
                    </div>   
                    <p class="mb-4">{{$product->description}}</p>
                   
                    <div class="pt-2 mb-4 d-flex align-items-center">
                        <div class="mr-3 input-group quantity" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="text-center border-0 form-control bg-secondary" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <button class="px-3 btn btn-primary"><i class="mr-1 fa fa-shopping-cart"></i> Add To
                            Cart</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="mb-4 nav nav-tabs">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab"
                            href="#tab-pane-1">Description</a>
                            
                         
                        {{-- <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Information</a> --}}
                        {{-- <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a> --}}
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">{{$product->name}}</h4>
                            <p>{{$product->description}}</p>
                            
                        </div>
                         {{--  --}}
                        <!-- Button trigger modal -->
                        <style>
                            /* rating */
                        .rating-css div {
                            color: #ffe400;
                            font-size: 30px;
                            font-family: sans-serif;
                            font-weight: 800;
                            text-align: center;
                            text-transform: uppercase;
                            padding: 20px 0;
                        }
                        .rating-css input {
                            display: none;
                        }
                        .rating-css input + label {
                            font-size: 60px;
                            text-shadow: 1px 1px 0 #8f8420;
                            cursor: pointer;
                        }
                        .rating-css input:checked + label ~ label {
                            color: #b4afaf;
                        }
                        .rating-css label:active {
                            transform: scale(0.8);
                            transition: 0.3s ease;
                        }

                        /* End of Star Rating */
                        </style>
                        <div class="col-md-12">
                            <hr>
                            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">
                                Rate This Product
                            </button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ url('/add-rating') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id  }}">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Rate {{$product->name}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="rating-css">
                                            <div class="star-icon">
                                                <input type="radio" value="1" name="product_rating" checked id="rating1">
                                                <label for="rating1" class="fa fa-star"></label>
                                                <input type="radio" value="2" name="product_rating" id="rating2">
                                                <label for="rating2" class="fa fa-star"></label>
                                                <input type="radio" value="3" name="product_rating" id="rating3">
                                                <label for="rating3" class="fa fa-star"></label>
                                                <input type="radio" value="4" name="product_rating" id="rating4">
                                                <label for="rating4" class="fa fa-star"></label>
                                                <input type="radio" value="5" name="product_rating" id="rating5">
                                                <label for="rating5" class="fa fa-star"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">submit</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                        

                       {{--  --}}
                        <div class="tab-pane fade" id="tab-pane-2">
                            <h4 class="mb-3">Additional Information</h4>
                            <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam
                                invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod
                                consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum
                                diam. Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam
                                sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor
                                aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam
                                kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="px-0 list-group-item">
                                            Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                        </li>
                                        <li class="px-0 list-group-item">
                                            Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                        </li>
                                        <li class="px-0 list-group-item">
                                            Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                        </li>
                                        <li class="px-0 list-group-item">
                                            Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="px-0 list-group-item">
                                            Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                        </li>
                                        <li class="px-0 list-group-item">
                                            Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                        </li>
                                        <li class="px-0 list-group-item">
                                            Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                        </li>
                                        <li class="px-0 list-group-item">
                                            Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-4">1 review for "Product Name"</h4>
                                    <div class="mb-4 media">
                                        <img src="img/user.jpg" alt="Image" class="mt-1 mr-3 img-fluid"
                                            style="width: 45px;">
                                        <div class="media-body">
                                            <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                            <div class="mb-2 text-primary">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam
                                                ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod
                                                ipsum.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="mb-4">Leave a review</h4>
                                    <small>Your email address will not be published. Required fields are marked
                                        *</small>
                                    <div class="my-3 d-flex">
                                        <p class="mb-0 mr-2">Your Rating * :</p>
                                        <div class="text-primary">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                    <form>
                                        <div class="form-group">
                                            <label for="message">Your Review *</label>
                                            <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Your Name *</label>
                                            <input type="text" class="form-control" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Your Email *</label>
                                            <input type="email" class="form-control" id="email">
                                        </div>
                                        <div class="mb-0 form-group">
                                            <input type="submit" value="Leave Your Review" class="px-3 btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="py-5 container-fluid">
        <h2 class="mb-4 section-title position-relative text-uppercase mx-xl-5"><span class="pr-3 bg-secondary">You May
                Also Like</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                     @foreach($related_products as $r_product)
                    <div class="product-item bg-light">
                        <div class="overflow-hidden product-img position-relative">
                            <img class="img-fluid w-100" src="{{asset('storage/thumbnails/'.$r_product->image)}}" alt="">
                            <div class="product-action">
							<a class="btn btn-outline-dark btn-square" href="" wire:click.prevent="store({{ $r_product->id}},'{{ $r_product->name }}',{{ $r_product->sale_price }})"><i class="fa fa-shopping-cart" title="Add to cart"></i></a>
							<a class="btn btn-outline-dark btn-square" href="" wire:click.prevent="addToWishList({{ $r_product->id }},'{{ $r_product->name }}',{{ $r_product->sale_price }})"><i class="far fa-heart" title="Add to wishlist"></i></a>
							<a class="btn btn-outline-dark btn-square" href="{{route('product.details',['slug' =>$r_product->slug])}}"><i class="fa fa-eye" title="view details"></i></a>
							{{-- <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a> --}}
						</div>
                        </div>
                        <div class="py-4 text-center">
                            <a class="h6 text-decoration-none text-truncate" href="">{{$r_product->name}}</a>
                            <div class="mt-2 d-flex align-items-center justify-content-center">
                                <h5>${{$r_product->sale_price}}</h5>
                                <h6 class="ml-2 text-muted"><del>${{$r_product->regular_price}}</del></h6>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
</div>