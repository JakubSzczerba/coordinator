<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Application\Common\DTO;

abstract class LocationDTO
{
    private float $latitude;
    private float $longitude;

    public function __construct(string $latitude, string $longitude)
    {
        $this->latitude = $this->convertToFloat($latitude);
        $this->longitude = $this->convertToFloat($longitude);
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    private function convertToFloat(string $value): float
    {
        return (float)str_replace(['{', '}'], '', $value);
    }
}