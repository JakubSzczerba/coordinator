<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Application\Activity\CommandHandler;
use App\Application\Activity\Command\SuggestActivityCommand;
use App\Domain\Activity\Service\ActivityService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class SuggestActivityHandler
{
    public ActivityService $activityService;

    public function __construct(ActivityService $activityService)
    {
        $this->activityService = $activityService;
    }

    public function __invoke(SuggestActivityCommand $command): JsonResponse
    {
        $coordinates = $command->getActivityDTO();
        $activity = $this->activityService->whatToDo($coordinates->getLatitude(), $coordinates->getLongitude());

        return new JsonResponse(['ok' => 'Activity: ' . $activity->getActivity()], 200);
    }
}