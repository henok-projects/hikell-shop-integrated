<div>
    <style>
    </style>
        <main id="main" class="main-site">
            <div class="container">
                <div class="wrap-breadcrumb">
                </div>
            </div>
            <div class="container pb-60">
                <div class="row">
                    <div class="text-center col-md-12">
                        <h2>Thankyou for your Order</h2>
                        <p>A Confirmation email will sent to your email </p>
                        <p>please confirm your email</p>
                        <a href="#" class="neon-button" style="font-size:1.6em;text-decoration:none;color:#f5f928;display:inline-block;width:180px;">Give Rate<i class="fas fa-arrow-right"></i></a>
                        <a href="/shop" class="btn btn-submit btn-success">Continue shipping</a>
                    </div>
                    {{-- popup --}}
                    <script>
                        $(document).ready(function(){
                            $("#subscribe").modal('show');
                        });
                    </script>
                    <div id="subscribe" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">Subscribe to the newsletter</h3>
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                </div>
                                <div class="modal-body">
                                    <p>Subscribe to our newsletter to receive the latest news and updates in your inbox.</p>
                                    <form action="subscription.html">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter your name">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Enter your email">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Subscribe</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                                    {{--  --}}
                </div>
            </div>
        </main>
    
    
    
  {{--  @if($rate==5)
    <div class="text-primary mb-2">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star-half-alt"></i>
        <i class="far fa-star"></i>
    </div>
    @endif
    @if($rate==4)
    <div class="text-primary mb-2">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        {{-- <i class="fas fa-star-half-alt"></i> 
        <i class="far fa-star"></i>
    </div>
    @endif
    @if($rate==3)
    <div class="text-primary mb-2">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        {{-- <i class="fas fa-star-half-alt"></i>
        <i class="far fa-star"></i> 
    </div>
    @endif
    @if($rate==2)
    <div class="text-primary mb-2">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        {{-- <i class="fas fa-star"></i>
        <i class="fas fa-star-half-alt"></i>
        <i class="far fa-star"></i> 
    </div>
    @endif
    @if($rate==1)
    <div class="text-primary mb-2">
        <i class="fas fa-star"></i>
        {{-- <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star-half-alt"></i>
        <i class="far fa-star"></i> 
    </div>
    @endif
    --}}
</div>
