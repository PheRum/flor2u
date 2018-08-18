<?php

namespace App\Http\Controllers;

use Weather;

class WeatherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \App\Exceptions\WeatherException
     */
    public function index()
    {
        $data = Weather::getWeather(53.243325, 34.363731);

        return view('weather.index', compact('data'));
    }
}
