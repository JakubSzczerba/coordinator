<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Domain\Activity\Model;

class Activity
{
    private string $activity;

    public function __construct(string $activity)
    {
        $this->activity = $activity;
    }

    public function getActivity(): string
    {
        return $this->activity;
    }

}