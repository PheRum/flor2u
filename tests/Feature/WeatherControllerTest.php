<?php

namespace Tests\Feature;

use Tests\TestCase;

class WeatherControllerTest extends TestCase
{
    /**
     * @covers \App\Http\Controllers\ProductController::index
     */
    public function testWeatherIndex()
    {
        $response = $this->get(route('weather.index'));

        $response->assertStatus(200);
    }
}
