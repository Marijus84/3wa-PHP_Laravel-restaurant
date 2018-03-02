<?php

namespace App\Http\Controllers;

use App\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller

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
      $manufacturers= Manufacturer::orderBy('id','desc')->get(); //

      return view('manufacturer.index', ['manufacturers'=>$manufacturers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('manufacturer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validationManufacturer($request);
      $manufacturer = new Manufacturer();
      $manufacturer->title = $request->title;
      $manufacturer->website = $request->website;
      $manufacturer->country = $request->country;

      $manufacturer->save();

      return redirect()->route('manufacturers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufacturer $manufacturer)
    {
      return view('manufacturer.edit',['manufacturer'=>$manufacturer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manufacturer $manufacturer)
    {
      $this->validationManufacturer($request);

      $manufacturer->title = $request->title;
      $manufacturer->website = $request->website;
      $manufacturer->country = $request->country;
      $manufacturer->save();

      return redirect()->route('manufacturers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufacturer $manufacturer)
    {
      $manufacturer->delete();
      return redirect()->route('manufacturers.index');
    }

    private function validationManufacturer(Request $request){
      $request->validate([
      'title' => 'required|max:300',
      'website' => 'required|max:2200',
      'country' => 'required|max:2200'

      ],
      ['required' => 'Laukelis :attribute privalomas' //visiem required perraso taisykle

      ]);
    }
}
