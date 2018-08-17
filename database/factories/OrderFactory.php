<?php

use App\Order;
use App\Partner;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Order::class, function (Faker $faker) {
    return [
        'status' => $faker->randomElement([
            Order::ORDER_STATUS_NEW,
            Order::ORDER_STATUS_CONFIRMED,
            Order::ORDER_STATUS_COMPLETED,
        ]),
        'client_email' => $faker->email,
        'partner_id' => Partner::inRandomOrder()->first()->id,
        'delivery_dt' => now()->addHours(random_int(6, 50)),
    ];
});
