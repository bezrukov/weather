<?php

namespace Bezrukov\Weather\Services;

use Exception;
use GuzzleHttp\Client;

class WeatherServiceFactory
{

    private static $serviceList = [
        'metaweather'  => MetaWeatherService::class,
        'oceandrivers' => OceanDriversService::class,
    ];

    /**
     * @param string $serviceName
     * @param Client $httpClient
     * @return WeatherInterface
     * @throws Exception
     */
    public static function getWeatherService(string $serviceName, $httpClient = null): WeatherInterface
    {
        if (!isset(self::$serviceList[$serviceName])) {
            throw new Exception('we not match service');
        }

        return new self::$serviceList[$serviceName]($httpClient);
    }
}