<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Application\Activity\Controller;

use App\Application\Activity\Command\SuggestActivityCommand;
use App\Application\Activity\DTO\ActivityDTO;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

class ActivityController
{
    private MessageBusInterface $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    public function suggestActivity(Request $request): JsonResponse
    {
        $lat = $request->query->get('lat');
        $lon = $request->query->get('lon');

        if ($lat === null || $lon === null) {
            return new JsonResponse(['error' => 'Coordinates required'], 400);
        }

        try {
            $activityDTO = new ActivityDTO(
                $lat,
                $lon
            );

            $command = new SuggestActivityCommand($activityDTO);

            $envelope = $this->messageBus->dispatch($command);
            $handledStamp = $envelope->last(HandledStamp::class);

            return $handledStamp->getResult();
        } catch (\Exception $e) {

            return new JsonResponse(['error' => $e->getMessage()], 500);
        }
    }
}