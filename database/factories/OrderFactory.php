<?php

use App\Order;
use App\Partner;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Order::class, function (Faker $faker) {
    $createdAt = now()->subDays(random_int(0, 4));

    return [
        'status' => $faker->randomElement([
            Order::ORDER_STATUS_NEW,
            Order::ORDER_STATUS_CONFIRMED,
            Order::ORDER_STATUS_COMPLETED,
        ]),
        'client_email' => $faker->unique()->email,
        'partner_id' => Partner::inRandomOrder()->first()->id,
        'delivery_dt' => $createdAt->copy()->addHours(random_int(6, 50)),
        'created_at' => $createdAt,
        'updated_at' => $createdAt->copy()->addHours(random_int(1, 5)),
    ];
});
