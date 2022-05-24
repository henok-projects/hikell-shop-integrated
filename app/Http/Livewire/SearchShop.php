<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Site;
use App\Models\Stock;
use App\Models\StockCategory;
use Illuminate\Support\Facades\Storage;
use Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class SearchShop extends Component
{
    use WithPagination;
    public $searchproduct = "";
    public $userid;
    public $site_user;
    public $product;
    public $pagesize;
    public $site = '';
    protected $listeners = ['refreshComponent' => '$refresh'];

    public $search;
    public $product_cate;
    public $product_cate_id;



    public function mount()
    {
        $this->pagesize=12;
        $this->fill(request()->only('search', 'product_cate', 'product_cate_id'));
    }
    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Stock');
        session()->flash('success_message', "Item added to cart");
        return redirect()->route('product.cart');
        $this->render();
    }


    public function render()

    {
        $this->userid = auth()->user()->user_id;
        if ($this->searchproduct != "")
          {
            $products = Stock::where('user_id', $this->userid)->where('name', 'like', '%' .$this->search . '%')->where('id','like','%' . $this->product_cate_id .'%')->get();
        } else {

            $products = Stock::where('user_id', $this->userid)->where('name', 'like', '%' .$this->search . '%')->where('id','like','%' . $this->product_cate_id .'%')->where('stock_status', 'instock')->paginate(12);
        }
        // $products = Stock::where('user_id',$this->userid)->paginate(12);

        $categories=StockCategory::all();
       return view('livewire.search-shop', ['products' => $products,'categories'=>$categories])->extends('layouts.stockapp')->section('content');
        $this->emitTo('cart-count-component', 'refreshComponent');
    }
    public function addToWishList($product_id, $product_name, $product_price)
    {

        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Stock');
        $this->emitTo('whishlist-count-component', 'refreshComponent');
        $this->render();
    }
    public function removeFromWishlist($product_id)
    {
        foreach (Cart::instance('wishlist')->content() as $witem) {
            if ($witem->id == $product_id) {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('whishlist-count-component', 'refreshComponent');
                return;
            }
        }
        $this->render();
    }
}
