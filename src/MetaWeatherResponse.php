<?php

namespace Bezrukov\Weather;

class MetaWeatherResponse implements WeatherResponse
{

    private $temperature;

    public function setFromArray($weatherData)
    {
        if (isset($weatherData['consolidated_weather'][0]['the_temp'])) {
            $this->temperature = $weatherData['consolidated_weather'][0]['the_temp'];
        }
    }

    public function getTemperature(): string
    {
        return $this->temperature;
    }
}