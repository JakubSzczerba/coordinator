<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Domain\Weather\Service;

use App\Domain\Weather\Model\WeatherCondition;
use App\Infrastructure\Api\OpenWeatherMapApi;
use App\Infrastructure\Provider\RainWeatherDataProvider;

class WeatherService implements WeatherServiceInterface
{
    private OpenWeatherMapApi $openWeatherMapApi;

    private RainWeatherDataProvider $rainDataProvider;

    public function __construct(OpenWeatherMapApi $openWeatherMapApi, RainWeatherDataProvider $rainDataProvider)
    {
        $this->openWeatherMapApi = $openWeatherMapApi;
        $this->rainDataProvider = $rainDataProvider;
    }

    public function checkIfRaining(float $lat, float $lon): WeatherCondition
    {
        $currentWeather = $this->openWeatherMapApi->getWeatherCondition($lat, $lon);

        return new WeatherCondition(
            in_array($currentWeather['id'], $this->rainDataProvider->getRainWeatherConditionCodes())
        );
    }
}