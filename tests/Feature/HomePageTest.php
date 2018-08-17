<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHomePage()
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
    }
}
