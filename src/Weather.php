<?php

namespace Bezrukov\Weather;

use Bezrukov\Weather\Services\WeatherInterface;
use Bezrukov\Weather\Services\WeatherServiceFactory;
use GuzzleHttp\Client;

class Weather
{
    /** @var WeatherInterface */
    private $weatherService;

    public function __construct($service)
    {
        $this->weatherService = WeatherServiceFactory::getWeatherService($service, new Client());
    }

    public function getWeatherFromCity($city): WeatherResponse
    {
        return $this->weatherService->getWeatherFromCity($city);
    }
}