<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Infrastructure\Api;

class OpenWeatherMapApi
{
    private string $apiKey;

    private string $apiUrl;

    public function __construct(string $apiKey, string $apiUrl)
    {
        $this->apiKey = $apiKey;
        $this->apiUrl = $apiUrl;
    }

    public function getWeatherCondition(float $lat, float $lon): array
    {
        $response = file_get_contents(
            $this->apiUrl . "lat={$lat}&lon={$lon}&appid={$this->apiKey}&units=metric"
        );

        $data = json_decode($response, true);

        return $data['weather'][0];
    }
}