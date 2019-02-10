<?php

namespace Bezrukov\Weather\Services;

use Bezrukov\Weather\Response\OceanDriversResponse;
use Bezrukov\Weather\Response\WeatherResponse;

class OceanDriversService extends WeatherAbstract implements WeatherInterface
{
    /**
     * @param string $city
     * @return WeatherResponse
     * @throws \Exception
     */
    public function getWeatherFromCity(string $city): WeatherResponse
    {
        try {
            $weatherData = $this->request(
                'http://api.oceandrivers.com/v1.0/getAemetStation/',
                $city.'/lastdata',
                []
            );
        } catch (\Exception $e) {
            throw $e;
        }

        $response = new OceanDriversResponse();
        $response->setFromArray($weatherData);

        return $response;
    }
}