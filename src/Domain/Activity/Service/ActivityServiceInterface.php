<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Domain\Activity\Service;

use App\Domain\Activity\Model\Activity;

interface ActivityServiceInterface
{
    public function whatToDo(float $lat, float $lon): Activity;
}