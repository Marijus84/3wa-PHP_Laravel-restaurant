<?php

use Illuminate\Database\Seeder;
use App\Category; // idedam modeli kaip klase
use Faker\Factory as Faker; // faker pervadina klases pavadinima


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $faker = Faker::create('lt_LT');

      foreach (range(1,10) as $x) {
      $category = new Category();
      $category->title =   $faker->colorName;//pageneruojam categorijas su spalvos vardais
      $category->save();
      }
    }
}
