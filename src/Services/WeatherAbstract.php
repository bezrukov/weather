<?php

namespace Bezrukov\Weather\Services;

abstract class WeatherAbstract
{
    private $httpClient;

    public function __construct($httpClient)
    {
        $this->httpClient = $httpClient;
    }

    protected function request($baseUrl, $url ,$params)
    {
        $result = $this->httpClient->request(
            'GET',
            $baseUrl.$url,
            [
                'query' => $params
            ]
        );

        $content = $result->getBody()->getContents();

        return json_decode($content, true) ?? [];
    }
}