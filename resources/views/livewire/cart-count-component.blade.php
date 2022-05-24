
<a href="/cart" class="btn px-0">
    <i class="fas fa-shopping-cart text-black"></i>
@if(Cart::instance('cart')->count() > 0)
    <span class="badge text-black " style="padding-bottom: 2px;">
{{ Cart::instance('cart')->count() }} items
</span>@endif
</a>