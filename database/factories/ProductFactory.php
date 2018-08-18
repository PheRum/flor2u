<?php

use App\Product;
use App\Vendor;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'price' => $faker->numberBetween(100, 1000),
        'vendor_id' => Vendor::inRandomOrder()->first()->id,
    ];
});
