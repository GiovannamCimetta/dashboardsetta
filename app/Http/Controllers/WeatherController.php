<?php
// app/Http/Controllers/WeatherController.php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    // Método para exibir o formulário
    public function showForm()
    {
        return view('weather.teste');
    }

    // Método para obter a temperatura com base no nome do local
    public function getWeatherByLocation(Request $request)
    {
        $location = $request->input('location');

        // Obter as coordenadas do local usando uma API de geocodificação
        $geocodeResponse = Http::get('http://api.openweathermap.org/geo/1.0/direct', [
            'q' => $location,
            'limit' => 1,
            'appid' => env('OPENWEATHERMAP_API_KEY'),
        ]);

        $geocodeData = $geocodeResponse->json();




            $lat = $geocodeData[0]['lat'];
            $lon = $geocodeData[0]['lon'];

            // Obter a temperatura usando o serviço WeatherService
            $weatherData = $this->weatherService->getWeather($lat, $lon);
            // dd($weatherData);
            return view('weather.teste', compact('weatherData', 'location'));

        }
    }

