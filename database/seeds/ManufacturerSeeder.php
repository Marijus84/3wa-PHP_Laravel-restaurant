<?php

use Illuminate\Database\Seeder;
use App\Manufacturer;
use Faker\Factory as Faker; // faker pervadina klases pavadinima


class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {

       $faker = Faker::create('lt_Lt');

       foreach (range(1,10) as $x) {
       $manufacturer = new Manufacturer();
       $manufacturer->title = $faker->company;//pageneruojam categorijas su spalvos vardais
       $manufacturer->website = $faker->url;
       $manufacturer->country = $faker->country;
       $manufacturer->save();
       }
     }
 }
