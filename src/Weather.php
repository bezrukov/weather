<?php

namespace Bezrukov\Weather;

use Bezrukov\Weather\Services\WeatherInterface;
use Bezrukov\Weather\Services\WeatherServiceFactory;

class Weather
{
    /** @var WeatherInterface */
    private $weatherService;

    public function __construct($service)
    {
        $this->weatherService = WeatherServiceFactory::getWeatherService($service);
    }

    public function getWeatherFromCity($city)
    {
        return $this->weatherService->getWeatherFromCity($city);
    }
}