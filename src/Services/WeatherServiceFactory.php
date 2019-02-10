<?php

namespace Bezrukov\Weather\Services;

use Exception;

class WeatherServiceFactory
{
    /**
     * @param string $service
     * @return WeatherInterface
     * @throws Exception
     */
    public static function getWeatherService(string $service) :WeatherInterface
    {
        switch ($service) {
            case 'metaweather':
                return new MetaWeatherService();
            case 'oceandrivers':
                return new OceanDriversService();
            default:
                throw new Exception('we not match service');
        }
    }
}