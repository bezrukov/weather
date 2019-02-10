<?php

namespace Bezrukov\Weather\Services;

use Bezrukov\Weather\WeatherResponse;

interface WeatherInterface
{
    public function getWeatherFromCity(string $city):WeatherResponse;
}