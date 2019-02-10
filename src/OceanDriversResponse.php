<?php

namespace Bezrukov\Weather;

class OceanDriversResponse implements WeatherResponse
{
    private $temperature;

    public function setFromArray($weatherData)
    {
        if (isset($weatherData['TEMPERATURE'])) {
            $this->temperature = $weatherData['TEMPERATURE'];
        }
    }

    /**
     * @return string
     */
    public function getTemperature():string
    {
        return $this->temperature;
    }
}