<?php

namespace Bezrukov\Weather;

use Bezrukov\Weather\Response\WeatherResponse;
use Bezrukov\Weather\Services\WeatherInterface;

class Weather
{
    /** @var WeatherInterface */
    private $weatherService;

    public function __construct(WeatherInterface $service)
    {
        $this->weatherService = $service;
    }

    public function getWeatherFromCity($city): WeatherResponse
    {
        return $this->weatherService->getWeatherFromCity($city);
    }
}