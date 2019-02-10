<?php

namespace Bezrukov\Weather\Services;

use Bezrukov\Weather\Response\WeatherResponse;

interface WeatherInterface
{
    public function getWeatherFromCity(string $city): WeatherResponse;
}