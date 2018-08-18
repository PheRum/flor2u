<?php

declare(strict_types = 1);

namespace App\Services;

use App\Exceptions\WeatherException;
use Cache;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class WeatherAPI
{
    /**
     * @see https://tech.yandex.ru/weather/doc/dg/concepts/forecast-docpage/#forecast
     * @var string
     */
    const API_URL = 'https://api.weather.yandex.ru/v1/forecast?';

    /** @var \GuzzleHttp\Client */
    protected $client;

    /**
     * WeatherAPI constructor.
     *
     * @throws \App\Exceptions\WeatherException
     */
    public function __construct()
    {
        if (empty(config('services.yandex-weather.secret'))) {
            throw new WeatherException('API Key is required');
        }

        $this->client = new Client([
            'headers' => [
                'X-Yandex-API-Key' => config('services.yandex-weather.secret'),
            ],
        ]);
    }

    /**
     * Get weather
     *
     * @param float $lat
     * @param float $lon
     * @param array $options
     * @return mixed
     * @throws \App\Exceptions\WeatherException
     */
    public function getWeather(float $lat, float $lon, array $options = [])
    {
        try {
            $url = self::API_URL . http_build_query(compact('lat', 'lon'));

            $response = Cache::remember("weather-{$lat}-{$lon}", 5, function () use ($url, $options) {
                return json_decode($this->client->get($url, $options)->getBody()->getContents());
            });

            return $response;
        } catch (ClientException $e) {
            throw new WeatherException($e->getMessage(), $e->getCode());
        }
    }
}
