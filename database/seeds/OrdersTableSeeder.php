<?php

use App\Order;
use App\Product;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();

        factory(Order::class, 1000)->create()->each(function (Order $order) use ($products) {
            $ids = $products->random(random_int(1, 3))->pluck('id')->toArray();

            /** @var Product $products */
            $order->products()->attach($ids, [
                'quantity' => random_int(1, 3),
            ]);
        }, 300);
    }
}
