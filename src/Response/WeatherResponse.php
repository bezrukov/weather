<?php

namespace Bezrukov\Weather\Response;

interface WeatherResponse
{
    public function setFromArray($weatherData);

    public function getTemperature():string;
}