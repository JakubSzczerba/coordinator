<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Domain\Activity\Service;

use App\Domain\Activity\Model\Activity;
use App\Infrastructure\Api\BoredApi;
use App\Infrastructure\Api\OpenWeatherMapApi;
use App\Infrastructure\Provider\ActivityTypeProvider;
use App\Infrastructure\Provider\GoodWeatherDataProvider;

class ActivityService implements ActivityServiceInterface
{
    private OpenWeatherMapApi $openWeatherMapApi;

    private GoodWeatherDataProvider $goodWeatherDataProvider;

    private ActivityTypeProvider $activityTypeProvider;

    private BoredApi $boredApi;

    public function __construct(
        OpenWeatherMapApi       $openWeatherMapApi,
        GoodWeatherDataProvider $goodWeatherDataProvider,
        ActivityTypeProvider    $activityTypeProvider,
        BoredApi                $boredApi
    ) {
        $this->openWeatherMapApi = $openWeatherMapApi;
        $this->goodWeatherDataProvider = $goodWeatherDataProvider;
        $this->activityTypeProvider = $activityTypeProvider;
        $this->boredApi = $boredApi;
    }

    public function whatToDo(float $lat, float $lon): Activity
    {
        $currentWeather = $this->openWeatherMapApi->getWeatherCondition($lat, $lon);

        if (in_array($currentWeather['id'], $this->goodWeatherDataProvider->getGoodWeatherConditionCodes())) {
            $activityTypes = $this->activityTypeProvider->getAllActivity();
        } else {
            $activityTypes = $this->activityTypeProvider->getActivityForBadWeather();
        }
        $activityType =  $activityTypes[array_rand($activityTypes)];

        $selectedActivity = $this->boredApi->getActivity($activityType);

        return new Activity(
            $selectedActivity['activity']
        );
    }
}