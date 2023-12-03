<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Application\Weather\Command;

use App\Application\Weather\DTO\WeatherDTO;

class CheckWeatherCommand
{
    private WeatherDTO $weatherDTO;

    public function __construct(WeatherDTO $weatherDTO)
    {
        $this->weatherDTO = $weatherDTO;
    }

    public function getWeatherDTO(): WeatherDTO
    {
        return $this->weatherDTO;
    }
}