<?php

namespace Bezrukov\Weather\Tests;

use Bezrukov\Weather\Services\WeatherServiceFactory;
use Bezrukov\Weather\Weather;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class WeatherTest extends TestCase
{
    public function testGetWeatherFromCity()
    {
        $client = $this->getHttpClientMock(200, '{"TEMPERATURE":"12.5"}');

        $service = WeatherServiceFactory::getWeatherService('oceandrivers', $client);

        $weather = new Weather($service);

        $this->assertEquals('12.5', $weather->getWeatherFromCity('test')->getTemperature());
    }

    /**
     * @param int $code
     * @param string $responseBody
     * @return Client
     */
    private function getHttpClientMock(int $code = 200, string $responseBody = '{}'): Client
    {
        $mock = new MockHandler(
            [
                new Response($code, [], $responseBody),
            ]
        );
        $handler = HandlerStack::create($mock);
        return new Client(['handler' => $handler]);
    }
}