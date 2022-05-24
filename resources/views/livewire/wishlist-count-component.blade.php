
<a href="{{ route('product.wishlist') }}" class="btn px-0 ml-3">
   <i class="fas fa-heart text-blck"></i>
 @if(Cart::instance('wishlist')->count() > 0 )
    <span class="badge text-blck" style="padding-bottom: 2px;">{{ Cart::instance('wishlist')->count()}} item</span>
@endif
</a>