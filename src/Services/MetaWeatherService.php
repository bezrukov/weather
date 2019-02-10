<?php

namespace Bezrukov\Weather\Services;

use Bezrukov\Weather\MetaWeatherResponse;
use Bezrukov\Weather\WeatherResponse;

class MetaWeatherService extends WeatherAbstract implements WeatherInterface
{

    public function getWeatherFromCity(string $city): WeatherResponse
    {
        try {
            $locationData = $this->request(
                'https://www.metaweather.com/api/location/search/',
                '',
                ['query' => $city]
            );
        } catch (\Exception $e) {
            throw $e;
        }

        $woeid = $locationData[0]['woeid'] ?? null;

        if (!$woeid) {
            throw new \Exception('we cannot find place');
        }

        try {
            $weatherData = $this->request(
                'https://www.metaweather.com/api/location/',
                $woeid,
                []
            );
        } catch (\Exception $e) {
            throw $e;
        }

        $response = new MetaWeatherResponse();

        $response->setFromArray($weatherData);

        return $response;
    }
}