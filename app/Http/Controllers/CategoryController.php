<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth')->except('index');
    //uzdedama auth ant visu kontrolerio routu, isskyrus 'index'
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= Category::orderBy('id','desc')->get(); //

        return view('category.index', ['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validationCategory($request);

        $category = new Category();
        $category->title = $request->title;
        $category->save();

        return redirect()->route('categories.show',$category->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('category/show', ['category'=> $category]);
        //nereikia findo, nes jau paeme duomenis
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

      return view('category.edit',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
      $this->validationCategory($request);

      $category->title = $request->title;
      $category->save();

      return redirect()->route('categories.show',$category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)//automatiskai paima kategorija
    //del to nebereikia Findo daryti ir kreiptis i duomenu baze.
    {
        $category->delete();
        return redirect()->route('categories.index');
    }

    private function validationCategory(Request $request){
      $request->validate(['title' => 'required|max:300']);
    }
}
