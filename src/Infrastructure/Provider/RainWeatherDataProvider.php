<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Infrastructure\Provider;

class RainWeatherDataProvider implements RainWeatherDataProviderInterface
{
    private const LIGHT_RAIN = 500;

    private const MODERATE_RAIN = 501;

    private const HEAVY_INTENSITY_RAIN = 502;

    private const VERY_HEAVY_RAIN = 503;

    private const EXTREME_RAIN = 504;

    private const FREEZING_RAIN = 511;

    private const LIGHT_INTENSITY_SHOWER_RAIN = 520;

    private const SHOWER_RAIN = 521;

    private const HEAVY_INTENSITY_SHOWER_RAIN= 522;

    private const RAGGED_SHOWER_RAIN = 531;

    public function getRainWeatherConditionCodes(): array
    {
        return [
            self::LIGHT_RAIN,
            self::MODERATE_RAIN,
            self::HEAVY_INTENSITY_RAIN,
            self::VERY_HEAVY_RAIN,
            self::EXTREME_RAIN,
            self::FREEZING_RAIN,
            self::LIGHT_INTENSITY_SHOWER_RAIN,
            self::SHOWER_RAIN,
            self::HEAVY_INTENSITY_SHOWER_RAIN,
            self::RAGGED_SHOWER_RAIN
        ];
    }
}