<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Domain\Weather\Model;

class WeatherCondition
{
    private bool $isRaining;

    public function __construct(bool $isRaining)
    {
        $this->isRaining = $isRaining;
    }

    public function isRaining(): bool
    {
        return $this->isRaining;
    }
}