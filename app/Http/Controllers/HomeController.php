<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      // $request->input('category');
      // $request->category -- abu yra lygus, paima input is requesto

      if(!$request->category) {
          $products = Product::all();
      }
      else {
        //select 8 from products where category = category id = 5
          $products = Product::where('category', $request->category)->get();
      }

      $categories = Category::all();


      return view('home', ['products' => $products,
                          'categories' => $categories]);
    }
}
