<?php

namespace Bezrukov\Weather\Services;

use Exception;
use GuzzleHttp\Client;

class WeatherServiceFactory
{
    /**
     * @param string $service
     * @param Client $httpClient
     * @return WeatherInterface
     * @throws Exception
     */
    public static function getWeatherService(string $service, $httpClient) :WeatherInterface
    {
        switch ($service) {
            case 'metaweather':
                return new MetaWeatherService($httpClient);
            case 'oceandrivers':
                return new OceanDriversService($httpClient);
            default:
                throw new Exception('we not match service');
        }
    }
}