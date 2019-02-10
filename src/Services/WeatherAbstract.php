<?php

namespace Bezrukov\Weather\Services;

use GuzzleHttp\Client;

abstract class WeatherAbstract
{
    private $httpClient;

    public function __construct($httpClient)
    {
        if (!$httpClient) {
            $this->httpClient = new Client();
        } else {
            $this->httpClient = $httpClient;
        }
    }

    protected function request($baseUrl, $url, $params)
    {
        $result = $this->httpClient->request(
            'GET',
            $baseUrl.$url,
            [
                'query' => $params,
            ]
        );

        $content = $result->getBody()->getContents();

        return json_decode($content, true) ?? [];
    }
}