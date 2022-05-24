@php
$currentRoute = \Route::current();
use \App\Models\Site;
$cuid = auth()->user()->user_id;
$sts = Site::where('user_id',$cuid)->first();
@endphp

@if(!$sts)
<a href="{{ url($currentRoute->site_id.'/wishlist' ) }}" class="btn px-0 ml-3">
   <i class="fas fa-heart text-secondary"></i>
 @if(Cart::instance('wishlist')->count() > 0 )
    <span class="badge text-secondary" style="padding-bottom: 2px;">{{ Cart::instance('wishlist')->count()}} item</span>
@endif
</a>
@endif

