@php
$currentRoute = \Route::current();
use \App\Models\Site;
$cuid = auth()->user()->user_id;
$sts = Site::where('user_id',$cuid)->first();


@endphp

@if(!$sts)
<a href="{{ url($currentRoute->site_id.'/cart' ) }}" class="btn px-0">
    <i class="fas fa-shopping-cart text-secondary"></i>
@if(Cart::instance('cart')->count() > 0)
    <span class="badge text-secondary" style="padding-bottom: 2px;">
{{ Cart::instance('cart')->count() }} items
</span>@endif
</a>
@endif