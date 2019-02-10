<?php

namespace Bezrukov\Weather\Services;

use GuzzleHttp\Client;

abstract class WeatherAbstract
{
    protected function request($baseUrl, $url ,$params)
    {
        $client = new Client(['base_uri' => $baseUrl]);

        $result = $client->request(
            'GET',
            $url,
            [
                'query' => $params
            ]
        );

        $content = $result->getBody()->getContents();

        return json_decode($content, true) ?? [];
    }
}