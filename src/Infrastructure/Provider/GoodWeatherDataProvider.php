<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Infrastructure\Provider;

class GoodWeatherDataProvider implements GoodWeatherDataProviderInterface
{
    private const CLEAR_SKY = 800;

    private const FEW_CLOUDS = 801;

    private const SCATTERED_CLOUDS = 802;

    private const BROKEN_CLOUDS = 803;

    private const OVERCAST_CLOUDS = 804;

    public function getGoodWeatherConditionCodes(): array
    {
        return [
            self::CLEAR_SKY,
            self::FEW_CLOUDS,
            self::SCATTERED_CLOUDS,
            self::BROKEN_CLOUDS,
            self::OVERCAST_CLOUDS
        ];
    }
}