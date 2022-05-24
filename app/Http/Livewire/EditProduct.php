<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Stock;
use App\Models\StockCategory;
use Livewire\WithFileUploads;;
use Carbon\Carbon;

class EditProduct extends Component
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
      public $newimage;
public function mount($slug)
{
      $product = Stock::where('slug',$slug)->get()->first();
      $this->name= $product->name;
      $this->slug= $product->slug;
      $this->short_description = $product->short_description;
      $this->description= $product->description;
      $this->regular_price= $product->regular_price;
      $this->sale_price= $product->sale_price;
      $this->SKU= $product->SKU;
      $this->stock_status= $product->stock_status;
      $this->featured= $product->featured;
      $this->quantity= $product->quantity;
      $this->image= $product->image;
      $this->product_id = $product->product_id;
      $this->category_id= $product->category_id;

}
public function generateSlug()
{
  $this->slug = Str::slug($this->name.$this->id,'-');
}
  public function update(){
      $product= Stock::where('product_id',$this->product_id)->get()->first();
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
       if($this->newimage){
       $imagename = Carbon::now()->timestamp.'.'.$this->newimage->extension();
       $this->newimage->storeAs('products',$imagename);
       $product->image = $imagename;
        }
       $product->category_id = $this->category_id;
       $product->save();
       return redirect()->to('/home');
       session()->flash('product add sucessfuly');

}
    public function render()
    {    $this->stockcategory = StockCategory::all();
        return view('livewire.edit-product',['stockcategory'=>$this->stockcategory])->layout('layouts.sitebase');
    }
}
