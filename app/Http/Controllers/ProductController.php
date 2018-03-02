<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Manufacturer;// pridedam modeli

class ProductController extends Controller
{


  public function show(Request $request){

    $product = Product::findOrFail($request->id);
    //sql uzklausa SELECT FROM products WHERE id = $id
  //  dd($product);
    return view('product/show', ['product'=> $product]);

  }

  public function create(){
      $categories = Category::all();
      $manufacturers = Manufacturer::all();

   return view('product/create', ['categories'=>$categories,
                                  'manufacturers'=>$manufacturers
                                ]);

  }


  public function store(Request $request){
    // dd($request);
    $this->validation($request);
//jei nepavaliduoja, tai kodas cia sustoja. o jei validuoja, eina toliau
//errorus grazina i create metoda, ten glob kintamaje errors.
//vaizde galima ji atvaizduoti
    $product = new Product();
    $product->title = $request->title;
    $product->price = $request->price;
    $product->quantity = $request->quantity;
    $product->description = $request->description;
    $product->category = $request->category;
    $product->manufacturer = $request->manufacturer;
    $product->save();

    return redirect()->route('products.show',$product->id);
  }


  public function edit(Request $request){

    $categories = Category::all();
    $manufacturers = Manufacturer::all(); //isidedam sasajas
    $product = Product::find($request->id);

    return view ('product/edit', [
      'categories' => $categories,
      'manufacturers' => $manufacturers,
      'product' => $product
    ]);
  }


  public function update(Request $request){
    //  dd($request);
      $this->validation($request);

      $product =  Product::find($request->id);
      $product->title = $request->title;
      $product->price = $request->price;
      $product->quantity = $request->quantity;
      $product->description = $request->description;
      $product->category = $request->category;
      $product->manufacturer = $request->manufacturer;
      $product->save();
      return redirect()->route('products.show',$product->id);
  }


  private function validation(Request $request){
    $request->validate([ // reikia derint su migracijom
    'title' => 'required|max:300',//iki 300 simboliu
    'price' => 'required|numeric',
    'quantity' => 'required|integer|digits_between:0,8',
    'description' => 'required|max:1000',
    'category' => 'nullable',
    'manufacturer' => 'required|numeric|digits_between:0,8'
    ],
    ['required' => 'Laukelis :attribute privalomas', //visiem required perraso taisykle
    'title.required' => 'Antraste privaloma'//tik title required perraso taisykle
    ]);
  }

  public function destroy(Request $request){
    $product = Product::find($request->id);
    $product->delete();

    return redirect()->route('home');

  }





}
