<?php

namespace Tests\Feature;

use App\Order;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    /**
     * @covers \App\Http\Controllers\OrderController::current
     */
    public function testCurrentOrders()
    {
        $response = $this->get(route('order.current'));

        $response->assertStatus(200);
    }

    /**
     * @covers \App\Http\Controllers\OrderController::new
     */
    public function testNewOrders()
    {
        $response = $this->get(route('order.new'));

        $response->assertStatus(200);
    }

    /**
     * @covers \App\Http\Controllers\OrderController::outdated
     */
    public function testOutdatedOrders()
    {
        $response = $this->get(route('order.outdated'));

        $response->assertStatus(200);
    }

    /**
     * @covers \App\Http\Controllers\OrderController::completed
     */
    public function testCompletedOrders()
    {
        $response = $this->get(route('order.completed'));

        $response->assertStatus(200);
    }

    /**
     * @covers \App\Http\Controllers\OrderController::index
     */
    public function testAllOrders()
    {
        $response = $this->get(route('order.index'));

        $response->assertStatus(200);
    }

    /**
     * @covers \App\Http\Controllers\OrderController::show
     */
    public function testOrderById()
    {
        $response = $this->get(route('order.show', 1));

        $response->assertStatus(200);
    }

    /**
     * @covers \App\Http\Controllers\OrderController::edit
     */
    public function testOrderByIdEdit()
    {
        $response = $this->get(route('order.edit', 1));

        $response->assertStatus(200);
    }

    public function testOrderStore()
    {
        $order = factory(Order::class)->create();

        $response = $this->get(route('order.show', $order->id));

        $response->assertStatus(200);
    }
}
