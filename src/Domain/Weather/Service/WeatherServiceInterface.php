<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Domain\Weather\Service;

use App\Domain\Weather\Model\WeatherCondition;

interface WeatherServiceInterface
{
    public function checkIfRaining(float $lat, float $lon): WeatherCondition;
}