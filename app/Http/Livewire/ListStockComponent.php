<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Stock;
use App\Models\StockCategory;
use Carbon\Carbon;
use App\Models\Site;
use Livewire\WithFileUploads;;
use App\Http\Controllers\FunctionsController;
class ListStockComponent extends Component
{     use WithFileUploads;
      public $name;
      public $slug;
      public $short_description;
      public $description;
      public $regular_price;
      public $sale_price;
      public $SKU;
      public $stock_status;
      public $featured;
      public $quantity;
      public $image;
      public $product_id;
      public $category_id;
      
public function mount()
{
   $this->stock_status = 'instock';
   $this->featured = 0;
}
public function generateSlug()
{
  $this->slug = Str::slug($this->name.$this->id,'-');
}
public function addProduct(){
           $curUser = auth()->user();
           $this->validate([
            'image' => 'image|max:10024', // 1MB Max
             'slug'=>'required',
             'short_description'=>'required',
             'regular_price'=>'required',
             'quantity'=>'required',
             'name'=>'required',
        ]);

     //$pid =FunctionsController::generateID($this->product_id);
     $product = new Stock();
       $product->user_id = auth()->user()->user_id;
       $product->site_id = $curUser->site ? $curUser->site->site_id : null;
       $product->product_id =Str::random(15);
       $product->name = $this->name;
       $product->slug = $this->slug;
       $product->short_description = $this->short_description;
       $product->description = $this->description;
       $product->regular_price = $this->regular_price;
       $product->sale_price = $this->sale_price;
       $product->SKU = $this->SKU;
       $product->stock_status = $this->stock_status;
       $product->featured = $this->featured;
       $product->quantity = $this->quantity;
       $imagename = Carbon::now()->timestamp.'.'.$this->image->extension();
       $this->image->storeAs('products',$imagename);
       $product->image = $imagename;
       $product->category_id = $this->category_id;
       $product->save();
       return redirect()->to('/shop');
       session()->flash('product add sucessfuly');

}

    public function render()
    {    $this->stockcategory = StockCategory::all();
        return view('livewire.add-stock-component',['stockcategory'=>$this->stockcategory])->layout("layouts.base");
    }
    // <ahref ="{{route('edit.product',['product_slug'=>$product->slug])}}
}
