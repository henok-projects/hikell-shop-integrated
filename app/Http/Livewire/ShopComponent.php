<?php
namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Stock;
use Illuminate\Support\Facades\Storage;
use Cart;
use Livewire\WithPagination;

class ShopComponent extends Component
{use WithPagination;
protected $listeners = ['refreshComponent' => '$refresh'];
public function store($product_id,$product_name,$product_price)
    {
       Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Stock');
        session()->flash('success_message',"Item added to cart");
        return redirect()->route('product.cart');
        $this->render();
    }
    public function render()
    {   
        $products = Stock::paginate(12);
        $banner = Stock::inRandomOrder()->limit(1)->get();
        $popular_products = Stock::inRandomOrder()->limit(4)->get();
        return view('livewire.shop-component',['products' => $products, 'popular_products'=>$popular_products,'banner'=>$banner])->layout("layouts.base");
        $this->emitTo('cart-count-component','refreshComponent');
    }
     public function addToWishList($product_id,$product_name,$product_price)
    {

        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Stock');
        $this->emitTo('whishlist-count-component','refreshComponent');
         $this->render();
    }
    public function removeFromWishlist($product_id)
    {
            foreach(Cart::instance('wishlist')->content() as $witem )
            {
             if($witem->id == $product_id)
             {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('whishlist-count-component','refreshComponent');
                return;
             }
            } $this->render();
    }
}

