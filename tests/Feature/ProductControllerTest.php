<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    /**
     * @covers \App\Http\Controllers\ProductController::index
     */
    public function testAllProduct()
    {
        $response = $this->get(route('product.index'));

        $response->assertStatus(200);
    }

    /**
     * @covers \App\Http\Controllers\ProductController::show
     */
    public function testProductById()
    {
        $response = $this->get(route('product.show', 1));

        $response->assertStatus(200);
    }
}
