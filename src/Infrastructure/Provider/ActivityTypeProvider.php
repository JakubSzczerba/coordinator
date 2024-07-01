<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Infrastructure\Provider;

class ActivityTypeProvider implements ActivityTypeProviderInterface
{
    private const EDUCATION = "education";

    private const RECREATIONAL = "recreational";

    private const SOCIAL = "social";

    private const DIY = "diy";

    private const CHARITY = "charity";

    private const COOKING = "cooking";

    private const RELAXATION = "relaxation";

    private const MUSIC = "music";

    private const BUSYWORK = "busywork";

    public function getAllActivity(): array
    {
        return [
            self::EDUCATION,
            self::RECREATIONAL,
            self::SOCIAL,
            self::DIY,
            self::CHARITY,
            self::COOKING,
            self::RELAXATION,
            self::MUSIC,
            self::BUSYWORK
        ];
    }

    public function getActivityForBadWeather(): array
    {
        return [
            self::EDUCATION,
            self::RECREATIONAL,
            self::DIY,
            self::COOKING,
            self::MUSIC
        ];
    }
}