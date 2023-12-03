<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Infrastructure\Provider;

interface RainWeatherDataProviderInterface
{
    public function getRainWeatherConditionCodes(): array;
}