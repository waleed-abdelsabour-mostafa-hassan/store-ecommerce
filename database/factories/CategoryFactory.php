<?php


/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class,function (Faker $faker){
   return[
       'name' => $this->faker->word(),
       'slug' => $this->faker->slug(),
       'is_active' => $this->faker->boolean(),
   ] ;
});
