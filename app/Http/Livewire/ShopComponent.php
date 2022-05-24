<?php
namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Site;
use App\Models\Stock;
use App\Models\StockCategory;
use Illuminate\Support\Facades\Storage;
use Cart;
use Livewire\WithPagination;
class ShopComponent extends Component
{   public $isloading = true;
    public $site_stocks = 0;
    public $site_podcasts = 0;
    public $fileName = "";
    public $asUser;
    public $asStore;
    public $search;
    public $site = ''; // holds value of site_id
    public $site_user;
    protected $listeners = ['refreshContent' => '$refresh'];
    public $freeTrial;
    use WithPagination;
    public $searchproduct = "";
    public $userid;
    public $product=[];
    public $stock_category;
    public  $stock_products;
    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Stock');
        session()->flash('success_message', "Item added to cart");
        return redirect()->route('home');
        $this->render();
    }
    public function render()
    {  
        $this->userid = auth()->user()->user_id;
        if ($this->searchproduct != "") {
                $products = Stock::where('name', 'like', '%' . $this->searchproduct . '%')->get();
            } else

            {

                $products = Stock::where('stock_status', 'instock')->orderBy('created_at' ,'desc')->paginate(12);
            }
        $products = Stock::where('stock_status','instock')->orderBy('created_at' ,'desc')->paginate(12);
        $category = Stock::join('stock_categories', 'stock_categories.id', '=', 'stocks.category_id')->distinct('category_id','stock_categories.name')->get();



        $banner = Stock::inRandomOrder()->limit(10)->get();
        $specialoffer = Stock::inRandomOrder()->limit(2)->get();
        $popular_products = Stock::where('featured', '1')->orderBy('created_at' ,'desc')->limit(6)->get();
        return view('livewire.shop-component', ['products' => $products, 'popular_products' => $popular_products, 'banner' => $banner,'category' => $category,'specialoffer'=>$specialoffer])->layout("stores.home");
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

    public function viewCategory($name)
    {
        if (StockCategory::where('name',$name)->exists()) {
           $stock_category = StockCategory::where('name',$name)->first();
           $stock_products = Stock::where('category_id',$stock_category->id)->where('stock_status','instock')->get();
           return view('components.productwithcategory', compact('stock_category','stock_products'));

        }
        else {
            return redirect('/home')->with('This category name does not exists');
        }
    }
}
