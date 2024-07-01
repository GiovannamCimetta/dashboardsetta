<?php
// app/Services/WeatherService.php

namespace App\Services;

use GuzzleHttp\Client;

class WeatherService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.openweathermap.org/data/2.5/weather?lat={lat}&lon={lon}&appid=',
        ]);
    }

    public function getWeather($lat, $lon)
    {
        $response = $this->client->request('GET', 'weather', [
            'query' => [
                'lat' => $lat,
                'lon' => $lon,
                'appid' => env('OPENWEATHERMAP_API_KEY'),
                'units' => 'metric', // Opcional: define a unidade para Celsius
                'lang' => 'pt_br' // Opcional: define o idioma para português
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
