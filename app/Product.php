<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // public $store = 'ebay'; - esavybes prilipdymas prie modelio
    // ja galima pasiimti vaizde ir kontroleryje
    public function categories()
  {//sukuria sasaja su category modeliu
    //metodas turi buti lenteles pavadinimas
      return $this->hasOne('App\Category', 'id', 'category');
  }

  public function manufacturers()
  {//sukuria sasaja su Manufacturer modeliu
      return $this->hasOne('App\Manufacturer','id', 'manufacturer');
  }
}
