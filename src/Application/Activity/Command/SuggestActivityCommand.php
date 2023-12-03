<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Application\Activity\Command;

use App\Application\Activity\DTO\ActivityDTO;

class SuggestActivityCommand
{
    private ActivityDTO $activityDTO;

    public function __construct(ActivityDTO $activityDTO)
    {
        $this->activityDTO = $activityDTO;
    }

    public function getActivityDTO(): ActivityDTO
    {
        return $this->activityDTO;
    }
}