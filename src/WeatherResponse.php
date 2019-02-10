<?php

namespace Bezrukov\Weather;

interface WeatherResponse
{
    public function setFromArray($weatherData);

    public function getTemperature():string;
}